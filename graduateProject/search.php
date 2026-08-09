<?php
include "top.inc.php";

$keyword = isset($_GET['q']) ? trim($_GET['q']) : '';
$get_product = array();

if ($keyword !== '') {
    $like = '%' . $keyword . '%';
    $stmt = mysqli_prepare($conn, "SELECT * FROM products WHERE status = 1 AND (pname LIKE ? OR keywords LIKE ? OR short_desc LIKE ?) ORDER BY id DESC");
    mysqli_stmt_bind_param($stmt, "sss", $like, $like, $like);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($res)) {
        $get_product[] = $row;
    }
}
?>

<head>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/search.css">
</head>

<body>
    <section class="newProducts">
        <div class="search-heading">
            <?php if ($keyword !== '') { ?>
                <h1>「<?php echo h($keyword) ?>」的搜尋結果</h1>
                <p><?php echo count($get_product) ?> 件商品</p>
            <?php } else { ?>
                <h1>搜尋商品</h1>
                <p>請輸入商品名稱或關鍵字</p>
            <?php } ?>
        </div>
        <div class="Indexrow">
            <?php
            if (count($get_product) > 0) {
                foreach ($get_product as $list) { ?>
                    <div class="itemouter">
                        <div class="Indexcol">
                            <div class="imgBx">
                                <img src="./admin/assets/images/<?php echo h($list['pimage']) ?>">
                            </div>
                        </div>
                        <div class="details">
                            <a href="products-detail.php?id=<?php echo h($list['id']) ?>">
                                <h3><?php echo h($list['pname']) ?></h3>
                                <p> $ <?php echo h($list['sprice']) ?> </p>
                            </a>
                        </div>
                    </div>
            <?php }
            } elseif ($keyword !== '') {
                echo "<p class='search-empty'>找不到符合「" . h($keyword) . "」的商品，換個關鍵字試試看。</p>";
            }
            ?>
        </div>
    </section>
</body>

<?php
include "footer.inc.php";
?>
