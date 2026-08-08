<?php
function h($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function get_product($conn, $limit = '', $cat_id = '', $subcat_id = '', $pro_id = '')
{
    // cat_id / subcat_id / pro_id / limit 都只允許數字，先轉成 int 再拼進 SQL，
    // 避免無引號的數值型 SQL Injection（例如 cat_id=1 UNION SELECT ...）。
    $sql = "select * from products where status=1 ";

    if ($cat_id !== '') {
        $sql .= " and cat_id=" . (int) $cat_id;
    }
    if ($subcat_id !== '') {
        $sql .= " and subcat_id=" . (int) $subcat_id;
    }
    if ($pro_id !== '') {
        $sql .= " and id=" . (int) $pro_id;
    }
    $sql .= " order by id desc";

    if ($limit !== '') {
        $sql .= " limit " . (int) $limit;
    }
    $res = mysqli_query($conn, $sql);
    $data = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
    }
    return $data;
}
// select products DB的所有資料


function get_category_name($conn, $cat_id)
{
    $cat_id = (int) $cat_id;
    if ($cat_id <= 0) {
        return '';
    }
    $stmt = mysqli_prepare($conn, "SELECT catname FROM categories WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $cat_id);
    mysqli_stmt_execute($stmt);
    $row = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
    return $row ? $row['catname'] : '';
}

function get_subcategory_name($conn, $subcat_id)
{
    $subcat_id = (int) $subcat_id;
    if ($subcat_id <= 0) {
        return '';
    }
    $stmt = mysqli_prepare($conn, "SELECT subname FROM subcategories WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $subcat_id);
    mysqli_stmt_execute($stmt);
    $row = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
    return $row ? $row['subname'] : '';
}

function getIP()
{
    $ip = $_SERVER['REMOTE_ADDR'];

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    return $ip;
}
