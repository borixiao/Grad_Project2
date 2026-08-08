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

            <nav class="header-nav">
                <ul class="header-list">
                    <li class="has-dropdown">
                        <a href="./sitemap.php">品牌列表</a>
                        <div class="dropdown-panel">
                            <div class="dropdown-col">
                                <h6>品牌</h6>
                                <ul>
                                    <?php
                                    while ($data = mysqli_fetch_assoc($query)) {
                                        echo "<li><a href='categories.php?cat_id=" . h($data['id']) . "'>" . h($data['catname']) . "</a></li>";
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="dropdown-col">
                                <h6>分類</h6>
                                <ul>
                                    <?php
                                    while ($data = mysqli_fetch_assoc($subquery)) {
                                        echo "<li><a href='subcategories.php?subcat_id=" . h($data['id']) . "'>" . h($data['subname']) . "</a></li>";
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li class="has-dropdown">
                        <a href="#">專業運動</a>
                        <div class="dropdown-panel dropdown-panel--wide">
                            <div class="dropdown-col">
                                <h6>球類用品</h6>
                                <ul>
                                    <li><a href="#">籃球</a></li>
                                    <li><a href="#">棒球</a></li>
                                    <li><a href="#">排球</a></li>
                                    <li><a href="#">羽毛球</a></li>
                                    <li><a href="#">網球</a></li>
                                    <li><a href="#">桌球</a></li>
                                    <li><a href="#">足球</a></li>
                                </ul>
                            </div>
                            <div class="dropdown-col">
                                <h6>訓練器材</h6>
                                <ul>
                                    <li><a href="#">啞鈴</a></li>
                                    <li><a href="#">彈力帶</a></li>
                                    <li><a href="#">瑜珈墊</a></li>
                                    <li><a href="#">滾筒</a></li>
                                </ul>
                            </div>
                            <div class="dropdown-col">
                                <h6>登山器具</h6>
                                <ul>
                                    <li><a href="#">登山服飾</a></li>
                                    <li><a href="#">登山鞋</a></li>
                                    <li><a href="#">登山杖</a></li>
                                    <li><a href="#">背包</a></li>
                                    <li><a href="#">睡袋</a></li>
                                </ul>
                            </div>
                            <div class="dropdown-col">
                                <h6>自行車</h6>
                                <ul>
                                    <li><a href="#">自行車衣</a></li>
                                    <li><a href="#">自行車褲</a></li>
                                    <li><a href="#">配件</a></li>
                                    <li><a href="#">背包</a></li>
                                </ul>
                            </div>
                            <div class="dropdown-col">
                                <h6>游泳</h6>
                                <ul>
                                    <li><a href="#">泳衣</a></li>
                                    <li><a href="#">泳褲</a></li>
                                    <li><a href="#">配件</a></li>
                                </ul>
                            </div>
                            <div class="dropdown-col">
                                <h6>滑板・直排輪</h6>
                                <ul>
                                    <li><a href="#">滑板</a></li>
                                    <li><a href="#">蛇板</a></li>
                                    <li><a href="#">雙龍板</a></li>
                                    <li><a href="#">直排輪</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li class="has-dropdown">
                        <a href="#">特色服務</a>
                        <div class="dropdown-panel">
                            <div class="dropdown-col">
                                <ul>
                                    <li><a href="./badminton.php">羽球專區</a></li>
                                    <li><a href="#">棒球專區</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li><a href="./story.php">故事屋</a></li>
                </ul>
            </nav>

            <form class="header-search" action="./search.php" method="get" role="search">
                <input type="search" name="q" placeholder="搜尋商品" aria-label="搜尋商品">
                <button type="submit" aria-label="搜尋">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="11" cy="11" r="7"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </button>
            </form>

            <div class="header-icons">
                <?php if (isset($user_id)) { ?>
                    <a href="./logout.php" class="icon-link" title="登出">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        <span class="icon-label">登出</span>
                    </a>
                <?php } else { ?>
                    <a href="./index.php" class="icon-link" title="登入 / 註冊">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        <span class="icon-label">登入</span>
                    </a>
                <?php } ?>
                <a href="cart-page.php" class="icon-link" title="購物車">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                    <span class="cart-count"><?php echo h($num) ?></span>
                </a>
            </div>

            <button class="header-button" type="button" aria-label="開啟選單" aria-expanded="false">
                <span class="list-line"></span>
            </button>

            <div class="header-phone-list-container" aria-hidden="true">
                <form class="header-search header-search--mobile" action="./search.php" method="get" role="search">
                    <input type="search" name="q" placeholder="搜尋商品" aria-label="搜尋商品">
                    <button type="submit" aria-label="搜尋">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="11" cy="11" r="7"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </button>
                </form>
                <ul class="header-phone-list">
                    <li>
                        <details>
                            <summary>品牌列表</summary>
                            <div class="dropdown-col">
                                <h6>品牌</h6>
                                <ul>
                                    <?php
                                    mysqli_data_seek($query, 0);
                                    while ($data = mysqli_fetch_assoc($query)) {
                                        echo "<li><a href='categories.php?cat_id=" . h($data['id']) . "'>" . h($data['catname']) . "</a></li>";
                                    }
                                    ?>
                                </ul>
                                <h6>分類</h6>
                                <ul>
                                    <?php
                                    mysqli_data_seek($subquery, 0);
                                    while ($data = mysqli_fetch_assoc($subquery)) {
                                        echo "<li><a href='subcategories.php?subcat_id=" . h($data['id']) . "'>" . h($data['subname']) . "</a></li>";
                                    }
                                    ?>
                                </ul>
                            </div>
                        </details>
                    </li>
                    <li>
                        <details>
                            <summary>專業運動</summary>
                            <div class="dropdown-col">
                                <ul>
                                    <li><a href="#">籃球</a></li>
                                    <li><a href="#">棒球</a></li>
                                    <li><a href="#">排球</a></li>
                                    <li><a href="#">羽毛球</a></li>
                                    <li><a href="#">網球</a></li>
                                    <li><a href="#">桌球</a></li>
                                    <li><a href="#">足球</a></li>
                                    <li><a href="#">登山器具</a></li>
                                    <li><a href="#">游泳用品</a></li>
                                </ul>
                            </div>
                        </details>
                    </li>
                    <li><a href="./badminton.php">羽球專區</a></li>
                    <li><a href="./story.php">故事屋</a></li>
                    <li><a href="cart-page.php">購物車（<?php echo h($num) ?>）</a></li>
                    <?php
                    if (isset($user_id)) {
                        echo "<li><a href='logout.php'>登出</a></li>";
                    } else {
                        echo "<li><a href='./index.php'>登入 / 註冊</a></li>";
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
