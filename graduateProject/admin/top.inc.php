<?php
include("inc/connection.inc.php");
include("inc/csrf.inc.php");

session_start();
$uname = $_SESSION['uname'];

if ($uname) {
} else {
    header("location:admin_login.php");
    die();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Admin-Dashboard manage products</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?
    family=Poppins:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <p>管理者名稱 : <?php echo h($uname); ?></p>
        <a href="logout.php">Logout</a>
    </header>
</body>
