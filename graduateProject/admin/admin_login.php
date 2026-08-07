<?php
include 'inc/connection.inc.php';
$msg="";//紅色警語

// 帳號登入 uname、pswd皆為admin
if(isset($_POST['submit'])){
    $uname = $_POST['uname'];
    $pswd = $_POST['pswd'];

    $stmt = mysqli_prepare($conn, "SELECT pswd FROM admin WHERE uname = ?");
    mysqli_stmt_bind_param($stmt, "s", $uname);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if($row && password_verify($pswd, $row['pswd'])){
        session_start();
        $_SESSION['uname'] = $uname;
        header("location:index.php");
    }else{
        $msg = "請輸入正確";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Login Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <style type="text/css">
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body{
            width: 100%;
            min-height: 100vh;
            display: flex;
            background: #fff;
            justify-content: center;
            align-items: center;
            background-image: url("../images/hermes-rivera-OX_en7CXMj4-unsplash.jpg");
            /* background-size: contain; */
        }
        .container{
            width: 500px;
            height: 360px;
            border: 1px solid #f2f2f2;
            background-color: #f2f2f2;
        }
        .container h1{
            padding-left: 120px;
            padding-top: 20px;
        }
        .container .loginForm{
            width: 100%;
            position: relative;
            padding: 40px;
        }
        .container .loginForm .data{
            width: 100%;
            padding: 15px 10px;
            outline: none;
            border: 1px solid #111;
            color: #111;
            margin: 8px 0;
        }
        .btn{
            width: 100%;
            padding: 15px;
            background: #1abc9c;
            color: #fff;
            outline: none;
            cursor: pointer;
            border: 0;
            font-size: 1em;
        }
        .msg{
            color: #e74c3c;
            padding: 5px;
        }
    </style>
</head>

<body>
<div class="container">
    <h1>Commerce CMS</h1>
    <form action="" method="post" class="loginForm">
        <input type="text" name="uname" placeholder="使用者名稱" class="data" required>
        <input type="password" name="pswd" placeholder="密碼" class="data" required>
        <input type="submit" name="submit" value="登入" class="btn">
        <div class="msg"><?php echo $msg; ?></div>
    </form>
</div>
</body>

</html>