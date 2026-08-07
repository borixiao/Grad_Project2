<?php
session_start();
include "connection.inc.php";

if (isset($_POST['order'])) {
    $user_id = $_SESSION['id'] ?? null;

    if (isset($user_id)) {
        $order_name = $_POST['order_name'] ?? '';
        $order_email = $_POST['order_email'] ?? '';
        $order_phone = $_POST['order_phone'] ?? '';
        $order_address = $_POST['order_address'] ?? '';
        $order_pay = $_POST['order_pay'] ?? '';
        $oids = $_POST['oid'] ?? array();
        $qtys = $_POST['qty'] ?? array();

        $stmt = mysqli_prepare($conn, "INSERT INTO `user_order`(`order_name`, `order_email`, `order_phone`, `order_address`, `order_pay`,
            `oid`, `order_user_id`, `qty`, `create_at`)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())");

        foreach ($oids as $index => $oid) {
            $oid = (int) $oid;
            $qty = isset($qtys[$index]) ? (int) $qtys[$index] : 1;
            mysqli_stmt_bind_param($stmt, "sssssiii", $order_name, $order_email, $order_phone, $order_address, $order_pay, $oid, $user_id, $qty);
            mysqli_stmt_execute($stmt);
        }

        $clearCart = mysqli_prepare($conn, "DELETE FROM `user_cart` WHERE `user_id` = ?");
        mysqli_stmt_bind_param($clearCart, "i", $user_id);
        mysqli_stmt_execute($clearCart);

        header("location:order.php");
        die();
    } else {
        echo 0;
    }
}
