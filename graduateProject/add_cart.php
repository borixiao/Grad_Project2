<?php
session_start();
include "connection.inc.php";
include "function.inc.php";
if (isset($_POST['cart'])) {
    $ip = getIP();
    $id = mysqli_real_escape_string($conn, $_POST['pid']);
    $qty = mysqli_real_escape_string($conn, $_POST['qty']);
    $user_id=$_SESSION['id'];

    if (isset($user_id)) {
        // -----------------------User-cart---------------------------
        $check = mysqli_query($conn, "select * from user_cart where pid = '$id'");
        if ($num = mysqli_num_rows($check) > 0) {
            echo "<script>alert('該產品已放到購物車囉 !')</script>";
            echo "<script>window.open('index.php','_self');</script>";
        } else {
            $query = mysqli_query($conn, "INSERT INTO
                `user_cart`( `user_id`, `pid`, `qty`, `create_on`, `ip_address`) VALUES ('$user_id','$id','$qty',NOW(),'$ip')");
            header("location:cart-page.php");
            die();
        }
    } else {
        // -----------------------Guest-cart---------------------------
        $check = mysqli_query($conn, "select * from guest_cart where pid = '$id'");
        if ($num = mysqli_num_rows($check) > 0) {
            echo "<script>alert('該產品已放到購物車囉 !')</script>";
            echo "<script>window.open('index.php','_self');</script>";
        } else {
            $query = mysqli_query($conn, "INSERT INTO
                `guest_cart`(`pid`, `qty`, `create_on`, `ip_address`) VALUES ('$id','$qty',NOW(),'$ip')");
            header("location:cart-page.php");
            die();
        }
    }
}

if (isset($_GET['id']) && $_GET['id'] != '') {
    $user_id=$_SESSION['id'];
    if(isset($user_id)) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $del = mysqli_query($conn, "DELETE FROM `user_cart` WHERE `user_id` = '$user_id' and `id` = '$id'");
        header("location:cart-page.php");
        die();
    }else{
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $del = mysqli_query($conn, "DELETE FROM `guest_cart` WHERE id = '$id'");
        header("location:cart-page.php");
        die();
    }
}

?>