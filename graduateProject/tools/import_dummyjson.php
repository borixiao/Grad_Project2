<?php
/**
 * 一次性匯入工具：從 DummyJSON (https://dummyjson.com) 抓運動鞋類商品，
 * 補進目前商品數量比較少的品牌／分類，湊出更完整的展示用商品清單。
 *
 * 只能用 CLI 執行，不接受網頁請求：
 *   php tools/import_dummyjson.php
 *
 * 跑完建議直接刪除這支檔案，不要留在網站目錄裡。
 */

if (php_sapi_name() !== 'cli') {
    http_response_code(403);
    exit('This script can only be run from the command line.');
}

chdir(__DIR__ . '/..');
require 'connection.inc.php';
require 'function.inc.php';

function fetch_json($url)
{
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 15,
        CURLOPT_USERAGENT => 'WinhornSports-DemoImport/1.0',
    ]);
    $body = curl_exec($ch);
    $err = curl_error($ch);
    if ($body === false) {
        fwrite(STDERR, "下載失敗：$url ($err)\n");
        return null;
    }
    $data = json_decode($body, true);
    return $data;
}

function download_image($url, $destDir)
{
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 15,
        CURLOPT_USERAGENT => 'WinhornSports-DemoImport/1.0',
    ]);
    $bytes = curl_exec($ch);
    if ($bytes === false || $bytes === '') {
        return '';
    }

    $tmp = tempnam(sys_get_temp_dir(), 'dj_img_');
    file_put_contents($tmp, $bytes);

    // 沿用後台上傳商品圖片的同一套驗證：白名單副檔名 + getimagesize() 驗證內容
    $imageInfo = @getimagesize($tmp);
    if ($imageInfo === false) {
        unlink($tmp);
        return '';
    }
    $extByMime = [
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'image/gif' => 'gif',
        'image/webp' => 'webp',
    ];
    $ext = $extByMime[$imageInfo['mime']] ?? '';
    if ($ext === '') {
        unlink($tmp);
        return '';
    }

    $filename = uniqid('dummyjson_', true) . '.' . $ext;
    rename($tmp, rtrim($destDir, '/') . '/' . $filename);
    return $filename;
}

// --- 讀取現有分類/子分類，並依目前商品數量由少到多排序，優先填補比較少的 ---
function sparsest_first($conn, $table, $idCol, $nameCol, $productCol)
{
    $sql = "SELECT t.id, t.$nameCol AS name, COUNT(p.id) AS cnt
            FROM $table t
            LEFT JOIN products p ON p.$productCol = t.id
            GROUP BY t.id
            ORDER BY cnt ASC, t.id ASC";
    $res = mysqli_query($conn, $sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($res)) {
        $rows[] = $row;
    }
    return $rows;
}

$categories = sparsest_first($conn, 'categories', 'id', 'catname', 'cat_id');
$subcategories = sparsest_first($conn, 'subcategories', 'id', 'subname', 'subcat_id');

if (empty($categories) || empty($subcategories)) {
    fwrite(STDERR, "categories / subcategories 是空的，請先確認資料庫已經匯入 seed 資料。\n");
    exit(1);
}

echo "目前各品牌商品數（由少到多）：\n";
foreach ($categories as $c) {
    echo "  - {$c['name']}：{$c['cnt']} 件\n";
}
echo "目前各分類商品數（由少到多）：\n";
foreach ($subcategories as $s) {
    echo "  - {$s['name']}：{$s['cnt']} 件\n";
}
echo "\n";

// --- 從 DummyJSON 抓運動鞋相關分類的商品 ---
$sourceCategories = ['mens-shoes', 'womens-shoes', 'sports-accessories'];
$products = [];
foreach ($sourceCategories as $slug) {
    $data = fetch_json("https://dummyjson.com/products/category/$slug?limit=12");
    if (!$data || empty($data['products'])) {
        continue;
    }
    foreach ($data['products'] as $p) {
        $products[] = $p;
    }
}

if (empty($products)) {
    fwrite(STDERR, "DummyJSON 沒有回傳任何商品，請檢查網路連線。\n");
    exit(1);
}

echo "從 DummyJSON 抓到 " . count($products) . " 件商品，開始匯入...\n\n";

$destDir = __DIR__ . '/../admin/assets/images';
$catCursor = 0;
$subCursor = 0;
$inserted = 0;
$skipped = 0;

foreach ($products as $p) {
    $title = trim($p['title'] ?? '');
    if ($title === '') {
        continue;
    }

    // 品牌名稱能對到現有分類就用現有分類，對不到就照「目前數量最少」的順序輪流分配，
    // 藉此把目前比較少商品的品牌／分類補起來。
    $brand = trim($p['brand'] ?? '');
    $cat_id = null;
    foreach ($categories as $c) {
        if ($brand !== '' && stripos($c['name'], $brand) !== false) {
            $cat_id = $c['id'];
            break;
        }
    }
    if ($cat_id === null) {
        $cat_id = $categories[$catCursor % count($categories)]['id'];
        $catCursor++;
    }
    $subcat_id = $subcategories[$subCursor % count($subcategories)]['id'];
    $subCursor++;

    // DummyJSON 的 title 有時已經包含品牌名稱（例如 "Nike Air Jordan 1"），
    // 避免湊出 "Nike Nike Air Jordan 1" 這種重複。
    if ($brand !== '' && stripos($title, $brand) !== 0) {
        $pname = "$brand $title";
    } else {
        $pname = $title;
    }
    $pname = mb_substr($pname, 0, 250);

    // 名稱已存在就跳過，避免重複匯入
    $checkStmt = mysqli_prepare($conn, "SELECT id FROM products WHERE pname = ?");
    mysqli_stmt_bind_param($checkStmt, "s", $pname);
    mysqli_stmt_execute($checkStmt);
    if (mysqli_fetch_assoc(mysqli_stmt_get_result($checkStmt))) {
        echo "略過（已存在）：$pname\n";
        $skipped++;
        continue;
    }

    $price = (float) ($p['price'] ?? 0);
    $sprice = round($price * 31, 0); // 粗略換算成台幣展示用價格
    $mrp = round($sprice * 1.25, 0);
    $shortDesc = mb_substr(trim($p['description'] ?? ''), 0, 120);
    $longDesc = trim($p['description'] ?? '');
    $keywords = trim(($brand !== '' ? $brand . ' ' : '') . ($p['category'] ?? ''));

    $imageUrl = $p['thumbnail'] ?? ($p['images'][0] ?? '');
    $pimage = $imageUrl !== '' ? download_image($imageUrl, $destDir) : '';
    if ($pimage === '') {
        echo "略過（圖片下載/驗證失敗）：$pname\n";
        $skipped++;
        continue;
    }

    $stmt = mysqli_prepare($conn, "INSERT INTO products
        (cat_id, subcat_id, pname, mrp, sprice, short_desc, long_desc, keywords, pimage, status, create_at)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 1, NOW())");
    mysqli_stmt_bind_param(
        $stmt,
        "iisddssss",
        $cat_id,
        $subcat_id,
        $pname,
        $mrp,
        $sprice,
        $shortDesc,
        $longDesc,
        $keywords,
        $pimage
    );

    if (mysqli_stmt_execute($stmt)) {
        echo "已匯入：{$pname} (cat_id={$cat_id}, subcat_id={$subcat_id}, \${$sprice})\n";
        $inserted++;
    } else {
        echo "匯入失敗：$pname - " . mysqli_error($conn) . "\n";
        $skipped++;
    }
}

echo "\n完成。新增 $inserted 筆，略過 $skipped 筆。\n";
echo "建議現在就把 tools/import_dummyjson.php 這支檔案刪掉，不要留在網站目錄裡。\n";
