<!-- index.php的上半部 -->
<?php
//當user 登入錯誤時將錯誤訊息隱藏
error_reporting(0);
session_start();

$user_id = $_SESSION['id'];

include "connection.inc.php";
include "function.inc.php";
$query = mysqli_query($conn, "select * from categories");
$subquery = mysqli_query($conn, "select * from subcategories");

$ip = getIP();

if(isset($user_id)) {
    $stmt = mysqli_prepare($conn, "SELECT * FROM user_cart WHERE user_id = ? AND ip_address = ?");
    mysqli_stmt_bind_param($stmt, "is", $user_id, $ip);
    mysqli_stmt_execute($stmt);
    $cart = mysqli_stmt_get_result($stmt);
    $num = mysqli_num_rows($cart);
}else{
    $stmt = mysqli_prepare($conn, "SELECT * FROM guest_cart WHERE ip_address = ?");
    mysqli_stmt_bind_param($stmt, "s", $ip);
    mysqli_stmt_execute($stmt);
    $cart = mysqli_stmt_get_result($stmt);
    $num = mysqli_num_rows($cart);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文宏運動用品店</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- product slider css -->
    <script src="https://kit.fontawesome.com/8851e3786a.js"></script>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;500&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="./css/header.css">

</head>

<body>
    <!-----------------------Header Part------------------------->
    <div class="header">
        <div class="header-container">
            <div class="header-logo">
                <a href="./index.php"><img class="w-100" src="./images/WHlogo-719px.png" alt=""></a>
            </div>
            <button class="header-button" type="button" aria-label="開啟選單" aria-expanded="false">
                <span class="list-line"></span>
            </button>
            <div class="header-list-container">
                <ul class="header-list" style="display: flex;">
                    <li class="brand-list">
                        <a href="">品牌列表</a>
                        <div class="brand-list-item">
                            <ul class="sub-list">
                                <?php
                                while ($data = mysqli_fetch_assoc($query)) {
                                    echo " 
                                        <li><a href='categories.php?cat_id=" . $data['id'] . "'>" . $data['catname'] . "</a></li>
                                    ";
                                }
                                ?>
                            </ul>

                            <ul class="sub-list2">
                                <?php
                                while ($data = mysqli_fetch_assoc($subquery)) {
                                    echo " 
                                        <li><a href='subcategories.php?subcat_id=" . $data['id'] . "'>" . $data['subname'] . "</a></li>
                                    ";
                                }
                                ?>

                            </ul>

                        </div>
                    </li>

                    <li class="sport-list">
                        <a href="">專業運動</a>
                        <div class="sport-list-item">
                            <ul>
                                <h5><a href="">球類用品</a></h5>
                                <li><a href="">籃球</a></li>
                                <li><a href="">棒球</a></li>
                                <li><a href="">排球</a></li>
                                <li><a href="">羽毛球</a></li>
                                <li><a href="">網球</a></li>
                                <li><a href="">桌球</a></li>
                                <li><a href="">足球</a></li>
                            </ul>
                            <ul>
                                <h5><a href="">訓練器材</a></h5>
                                <li><a href="">啞鈴</a></li>
                                <li><a href="">彈力帶</a></li>
                                <li><a href="">瑜珈墊</a></li>
                                <li><a href="">滾筒</a></li>
                            </ul>
                            <ul>
                                <h5><a href="">登山器具</a></h5>
                                <li><a href="">登山服飾</a></li>
                                <li><a href="">登山鞋</a></li>
                                <li><a href="">登山杖</a></li>
                                <li><a href="">背包</a></li>
                                <li><a href="">睡袋</a></li>
                            </ul>
                            <ul>
                                <h5><a href="">自行車</a></h5>
                                <li><a href="">自行車衣</a></li>
                                <li><a href="">自行車褲</a></li>
                                <li><a href="">配件</a></li>
                                <li><a href="">背包</a></li>
                            </ul>
                            <ul>
                                <h5><a href="">游泳</a></h5>
                                <li><a href="">泳衣</a></li>
                                <li><a href="">泳褲</a></li>
                                <li><a href="">配件</a></li>
                            </ul>
                            <ul>
                                <h5><a href="">滑板</a></h5>
                                <li><a href="">滑板</a></li>
                                <li><a href="">蛇板</a></li>
                                <li><a href="">雙龍板</a></li>
                            </ul>
                            <ul>
                                <h5><a href="">直排輪</a></h5>
                            </ul>
                        </div>
                    </li>
                    <li class="service-list">
                        <a href="">特色服務</a>
                        <div class="service-list-item">
                            <div class="badmin">
                                <div class="service-img">
                                    <a href="./badminton.php"><img src="./images/badmin-header.jpg" alt=""></a>
                                </div>
                                <h2>羽球專區</h2>
                                <div class="service-title-underline"></div>
                            </div>
                            <div class="baseball">
                                <div class="service-img">
                                    <img src="./images/baseball-header.jpg" alt="">
                                </div>
                                <h2>棒球專區</h2>
                                <div class="service-title-underline"></div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="./story.php">故事屋</a>

                    </li>
                    <li>
                        <div class="right-items">
                
                            <a href="cart-page.php"><i class="fas fa-shopping-cart"></i><sup><?php echo $num ?></sup></a>
                        </div>
                    </li>
                </ul>

            </div>

            <div class="header-phone-list-container" aria-hidden="true">
                <ul class="header-phone-list">
                    <li>
                        <details>
                            <summary>品牌列表</summary>
                            <div class="brand-list-phone">
                                <ul>
                                    <?php
                                    mysqli_data_seek($query, 0);
                                    while ($data = mysqli_fetch_assoc($query)) {
                                        echo "<li><a href='categories.php?cat_id=" . $data['id'] . "'>" . $data['catname'] . "</a></li>";
                                    }
                                    mysqli_data_seek($subquery, 0);
                                    while ($data = mysqli_fetch_assoc($subquery)) {
                                        echo "<li><a href='subcategories.php?subcat_id=" . $data['id'] . "'>" . $data['subname'] . "</a></li>";
                                    }
                                    ?>
                                </ul>
                            </div>
                        </details>
                    </li>
                    <li>
                        <details>
                            <summary>專業運動</summary>
                            <div class="sports-list-phone">
                                <ul>
                                    <li><a href="">籃球</a></li>
                                    <li><a href="">棒球</a></li>
                                    <li><a href="">排球</a></li>
                                    <li><a href="">羽毛球</a></li>
                                    <li><a href="">網球</a></li>
                                    <li><a href="">桌球</a></li>
                                    <li><a href="">足球</a></li>
                                    <li><a href="">登山器具</a></li>
                                    <li><a href="">游泳用品</a></li>
                                </ul>
                            </div>
                        </details>
                    </li>
                    <li><a href="./badminton.php">羽球專區</a></li>
                    <li><a href="./story.php">故事屋</a></li>
                    <li><a href="cart-page.php">購物車（<?php echo $num ?>）</a></li>
                    <?php
                    if (isset($user_id)) {
                        echo "<li><a href='logout.php'>登出</a></li>";
                    }
                    ?>
                </ul>
            </div>
            <div class="header-phone-list-container-bg"></div>


        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".header-button").on("click", function() {
                $(".header-phone-list-container, .header-phone-list-container-bg").toggleClass("active");
                $(".list-line").toggleClass("active");
                var expanded = $(this).attr("aria-expanded") === "true";
                $(this).attr("aria-expanded", !expanded);
                $(".header-phone-list-container").attr("aria-hidden", expanded);
            });
            $(".header-phone-list-container-bg, .header-phone-list a").on("click", function() {
                $(".header-phone-list-container, .header-phone-list-container-bg").removeClass("active");
                $(".list-line").removeClass("active");
                $(".header-button").attr("aria-expanded", "false");
                $(".header-phone-list-container").attr("aria-hidden", "true");
            });

            $("#signup").on("click", function(e) {
                e.preventDefault();
                var uname = $("#uname").val();
                var email = $("#email").val();
                var mnumber = $("#mnumber").val();
                var password = $("#password").val();
                $.ajax({
                    url: "register.php",
                    type: "POST",
                    data: {uname:uname, email:email, mnumber:mnumber, password:password},
                    success:function(result){
                        if(result==1){
                            $("#msg").html("Email已重疊 !");                          
                        }else{
                            window.location.href=window.location.href;
                            $("#reg_form").trigger("reset");
                        }
                    }
                })
            });

            $("#login").on("click", function(e) {
                e.preventDefault();
                var email = $("#login_email").val();
                var password = $("#login_password").val();
                $.ajax({
                    url: "login.php",
                    type: "POST",
                    data: {email:email, password:password},
                    success:function(result){
                        if(result==1){
                            window.location.href=window.location.href;
                            $("#login_form").trigger("reset");
                                                     
                        }else{
                            $("#msg1").html("尚未註冊 !"); 
                        }
                    }
                })
            });
            $("#checkout").on("click", function(e) {
                e.preventDefault();
                $.ajax({
                    url: "user_checkout.php",
                    type: "POST",
                    success: function(result) {
                        if (result == 1) {
                            window.location.href = "checkout.php";
                        } else {
                            alert(" 請先登入 ");
                        }
                    }
                })
            });
        });
    </script>
</body>
