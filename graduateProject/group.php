<?php
include "top.inc.php";
// include "function.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文宏運動用品店</title>
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;500&display=swap" rel="stylesheet">
    <!-- aos animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- this page's exclusive css -->
    <link rel="stylesheet" href="./css/grouppage.css">
        <!-- main css -->
        <link rel="stylesheet" href="./css/style.css">
    <!-- this page's exclusive css -->
    <link rel="stylesheet" href="./css/homepage.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/sitemap.css">
</head>

<body>

    <!-- <div class="creator-container">
        <div class="creator-con-font">
            <h1>創建團隊</h1>
            <div class="creator-con-font-underline" data-aos="flip-left"></div>
        </div>
        <div class="creator-inf-con container">
            <div class="leader-con col-sm-12">
                <div class="leader-con-img"><img src="../img/leader.PNG" alt=""></div>
                <div class="leader-title">
                    <h1>指導老師</h1>
                </div>
                <div class="leader-info">
                    <img src="../img/leader01.jpeg" alt="">
                    <h2>指導老師 俞旗山</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui laborum tenetur, nostrum veniam
                        molestiae quis ratione mollitia exercitationem deleniti, eveniet, fugiat quia molestias
                        voluptatibus enim dolorum fugit? Modi, rerum quidem.</p>
                </div>
            </div>
            <div class="member-container">
                <div class="member-con col-md-3" data-aos="zoom-in-up">
                    <div class="member-con-img"><img src="../img/member1.png" alt=""></div>
                    <div class="member-title">
                        <h1>組長</h1>
                    </div>
                    <div class="member-info">
                        <img src="../img/member1.1.png" alt="">
                        <h2>組長 曾國綸</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui laborum tenetur, nostrum veniam
                            molestiae quis ratione mollitia exercitationem deleniti, eveniet, fugiat quia molestias
                            voluptatibus enim dolorum fugit? Modi, rerum quidem.</p>
                    </div>
                </div>
                <div class="member-con col-md-3" data-aos="zoom-in-up">
                    <div class="member-con-img"><img src="../img/member2.jpg" alt=""></div>
                    <div class="member-title">
                        <h1>組員</h1>
                    </div>
                    <div class="member-info">
                        <img src="../img/member2.1.png" alt="">
                        <h2>組員 蕭鈞鴻</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui laborum tenetur, nostrum veniam
                            molestiae quis ratione mollitia exercitationem deleniti, eveniet, fugiat quia molestias
                            voluptatibus enim dolorum fugit? Modi, rerum quidem.</p>
                    </div>
                </div>
                <div class="member-con col-md-3" data-aos="zoom-in-up">
                    <div class="member-con-img"><img src="../img/member3.jpeg" alt=""></div>
                    <div class="member-title">
                        <h1>組員</h1>
                    </div>
                    <div class="member-info">
                        <img src="../img/member3.1.jpeg" alt="">
                        <h2>組員 蕭柏睿</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui laborum tenetur, nostrum veniam
                            molestiae quis ratione mollitia exercitationem deleniti, eveniet, fugiat quia molestias
                            voluptatibus enim dolorum fugit? Modi, rerum quidem.</p>
                    </div>
                </div>
                <div class="member-con col-md-3" data-aos="zoom-in-up">
                    <div class="member-con-img"><img src="../img/member4.jpeg" alt=""></div>
                    <div class="member-title">
                        <h1>組員</h1>
                    </div>
                    <div class="member-info">
                        <img src="../img/member4.1.jpeg" alt="">
                        <h2>組員 莊子賢</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui laborum tenetur, nostrum veniam
                            molestiae quis ratione mollitia exercitationem deleniti, eveniet, fugiat quia molestias
                            voluptatibus enim dolorum fugit? Modi, rerum quidem.</p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- grouppage 修改版 -->
    <div class="creator-container">
        <article class="creator-con-header">
            <div class="header-bg">
                <img src="./images/grouppage-bg.jpg" alt="">
            </div>
            <h1>創建團隊</h1>
            <div class="title-bottom-line" data-aos="flip-left"></div>
        </article>
        <article class="creator-info container">
            <section class="row">
                <div class="creator-info-card col-lg-6" data-aos="flip-up" style="transition: all 0.3s ease;">
                    <div class="info-img">
                        <img src="./images/member1.JPG" alt="">
                    </div>
                    <div class="info">
                        <h1>曾國綸</h1>
                        <p>國立台北教育大學數位設計系，負責專案規劃、進度整合、後端程式與資料庫架構設計，協助團隊完成前後台功能串接。</p>
                    </div>
                </div>
                <div class="creator-info-card col-lg-6" data-aos="flip-up" data-aos-delay="100" style="transition: all 0.3s ease;">
                    <div class="info-img">
                        <img src="./images/member2.jpg" alt="">
                    </div>
                    <div class="info">
                        <h1>蕭鈞鴻</h1>
                        <p>國立台北教育大學數位設計系，負責前端版面製作、互動效果與頁面切版，讓網站在不同裝置上維持清楚的瀏覽體驗。</p>
                    </div>
                </div>
                <div class="creator-info-card col-lg-6" data-aos="flip-up" style="margin-bottom: 100px; transition: all 0.3s ease;">
                    <div class="info-img">
                        <img src="./images/member3.jpeg" alt="">
                    </div>
                    <div class="info">
                        <h1>蕭柏睿</h1>
                        <p>國立台北教育大學數位設計系，負責前端開發、企劃內容與視覺素材整理，協助建立網站品牌形象與頁面內容。</p>
                    </div>
                </div>
                <div class="creator-info-card col-lg-6" data-aos="flip-up" data-aos-delay="100" style="margin-bottom: 100px; transition: all 0.3s ease;">
                    <div class="info-img">
                        <img src="./images/member4.jpeg" alt="">
                    </div>
                    <div class="info">
                        <h1>莊子賢</h1>
                        <p>國立台北教育大學數位設計系，負責資料整理、功能測試與頁面內容校對，協助確認購物流程與後台管理功能。</p>
                    </div>
                </div>
            </section>
        </article>
    </div>

    <!-- creator container in phone -->
    <div class="creator-con-phone">
        <div class="creator-con-phone-header">
            <div class="bg-phone">
                <img src="./images/grouppage-bg-ph.jpg" alt="">
            </div>
            <h1>創建團隊</h1>
            <div class="title-bottom-line" data-aos="flip-left"></div>
        </div>
        <div class="creator-inf-phone">
            <div class="member-con-phone" data-aos="fade-right">
                <img src="./images/leader.PNG" alt="">
                <div class="member-inf">
                    <h2>指導老師 俞旗山</h2>
                    <div class="h2-underline"></div>
                    <p>協助專案方向規劃與成果檢視，提供網站開發、互動設計與專題呈現上的建議，讓團隊能完成完整的電商網站作品。</p>
                </div>
            </div>
            <div class="member-con-phone" data-aos="fade-right">
                <img src="./images/member1.png" alt="">
                <div class="member-inf">
                    <h2>組長 曾國綸</h2>
                    <div class="h2-underline"></div>
                    <p>負責專案規劃、後端程式與資料庫設計，整合前台商品流程與後台管理功能。</p>
                </div>
            </div>
            <div class="member-con-phone" data-aos="fade-right">
                <img src="./images/member2.jpg" alt="">
                <div class="member-inf">
                    <h2>組員 蕭鈞鴻</h2>
                    <div class="h2-underline"></div>
                    <p>負責前端頁面製作與互動效果，協助優化導覽、商品展示與手機版瀏覽體驗。</p>
                </div>
            </div>
            <div class="member-con-phone" data-aos="fade-right">
                <img src="./images/member3.jpeg" alt="">
                <div class="member-inf">
                    <h2>組員 蕭柏睿</h2>
                    <div class="h2-underline"></div>
                    <p>負責前端開發、企劃內容與素材整理，協助網站呈現更完整的品牌與服務資訊。</p>
                </div>
            </div>
            <div class="member-con-phone" data-aos="fade-right">
                <img src="./images/member4.jpeg" alt="">
                <div class="member-inf">
                    <h2>組員 莊子賢</h2>
                    <div class="h2-underline"></div>
                    <p>負責資料整理、功能測試與內容校對，協助確認購物流程、會員流程與後台管理狀態。</p>
                </div>
            </div>
        </div>
    </div>
    <!-- creator container in phone end -->

    <?php
    include "footer.inc.php";
    ?>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>

    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        referrerpolicy="no-referrer"></script>
    <script src="../js/main.js"></script>

    <!-- aos animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
