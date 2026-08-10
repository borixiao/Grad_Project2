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
    <title>後台登入 | 文宏運動用品店</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;500;700&display=swap" rel="stylesheet">
    <style type="text/css">
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Noto Sans TC', sans-serif;
        }
        :root{
            --ink: #17150f;
            --ink-soft: #5b5644;
            --bg: #f7f4ee;
            --accent: #1f3d2e;
            --line: #ded8c7;
        }
        body{
            width: 100%;
            min-height: 100vh;
            display: flex;
            background: var(--bg);
            justify-content: center;
            align-items: center;
        }
        .container{
            width: 420px;
            border: 1px solid var(--line);
            background-color: #fff;
            box-shadow: 0 20px 50px rgba(23, 21, 15, 0.08);
        }
        .container .brand{
            padding: 32px 40px 0;
            font-size: 0.78rem;
            font-weight: 600;
            letter-spacing: 0.18em;
            color: var(--ink-soft);
            text-transform: uppercase;
        }
        .container h1{
            padding: 6px 40px 24px;
            font-size: 1.5rem;
            color: var(--ink);
        }
        .container .loginForm{
            width: 100%;
            position: relative;
            padding: 0 40px 40px;
        }
        .container .loginForm .data{
            width: 100%;
            padding: 15px 10px;
            outline: none;
            border: 1px solid var(--line);
            color: var(--ink);
            margin: 8px 0;
        }
        .container .loginForm .data:focus{
            border-color: var(--accent);
        }
        .btn{
            width: 100%;
            padding: 15px;
            background: var(--accent);
            color: #fff;
            outline: none;
            cursor: pointer;
            border: 0;
            font-size: 1em;
            margin-top: 8px;
        }
        .msg{
            color: #b3261e;
            padding: 5px;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="brand">WINHORN 文宏運動用品店</div>
    <h1>後台管理登入</h1>
    <form action="" method="post" class="loginForm">
        <input type="text" name="uname" placeholder="使用者名稱" class="data" required>
        <input type="password" name="pswd" placeholder="密碼" class="data" required>
        <input type="submit" name="submit" value="登入" class="btn">
        <div class="msg"><?php echo $msg; ?></div>
    </form>
</div>
</body>

</html>