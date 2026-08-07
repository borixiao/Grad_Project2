<?php
include "connection.inc.php";
include "top.inc2.php";
// include "function.inc.php";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文宏運動用品店</title>
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;500&display=swap" rel="stylesheet">
    <!-- aos animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- main css -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- this page's exclusive css -->
    <link rel="stylesheet" href="./css/homepage.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/sitemap.css">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>

<body>

    <!-- 第一部分 -->
    <article class="part1">
        <section class="part1-img">
            <img src="./images/whhompagelogo.png" alt="">
        </section>
        <section class="part1-btn">
            <a href="#partfour">了解更多</a>
        </section>
    </article>
    <!-- 第一部分END -->

    <!-- 第二部分 -->
    <div class="part2 container">
        <div class="brand row">
            <div class="br-container col-md-2 col-sm-4 col-4">
                <img src="./images/nike logo.png" alt="">
            </div>
            <div class="br-container col-md-2 col-sm-4 col-4">
                <img src="./images/adidas logo.png" alt="">
            </div>
            <div class="br-container col-md-2 col-sm-4 col-4">
                <img src="./images/mizuno logo.png" alt="">
            </div>
            <div class="br-container col-md-2 col-sm-4 col-4">
                <img src="./images/lotto logo.jpg" alt="">
            </div>
            <div class="br-container col-md-2 col-sm-4 col-4">
                <img src="./images/keds logo.png" alt="">
            </div>
            <div class="br-container col-md-2 col-sm-4 col-4">
                <img src="./images/sketchers logo.png" alt="">
            </div>
        </div>
    </div>
    <!-- 第二部分END -->

    <!-- 第三部分 -->
    <div class="part3">
        <div class="container">
            <h1>最新消息</h1>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="./images/sports pt2.jpg" class="d-block w-100 ">
                    </div>
                    <div class="swiper-slide">
                        <img src="./images/sports pt3.jpg" class="d-block w-100 ">
                    </div>
                    <div class="swiper-slide">
                        <img src="./images/sports pt4.jpg" class="d-block w-100 ">
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    <!-- 第三部分END -->

    <!-- 第四部份 -->
    <section id="partfour" class="part4">
        <h1>特色服務</h1>
        <div class="part4-slider container">
            <div class="slider-con">
                <div class="slider-part">
                    <div class="slider-img">
                        <img src="./images/badminton intro.png" alt="">
                    </div>
                    <div class="slider-intro">
                        <h2>羽毛球專區</h2>
                        <div class="underline"></div>
                        <h3>秉持最好的職業精神，用細心和嚴謹地態度以及最高的品質完成一支支的球拍。超過三十年的穿線經驗的老師傅，嫻熟的操作穿線機並用最少的時間給顧客最好的服務。</h3>
                    </div>
                </div>
            </div>
            <div class="slider-con">
                <div class="slider-part">
                    <div class="slider-intro">
                        <h2>棒球專區</h2>
                        <div class="underline"></div>
                        <h3>提供棒球手套、球棒、打擊手套與訓練配件等用品，依照不同年齡層與使用需求協助挑選合適裝備。無論是日常練習、校隊訓練或正式比賽，都能找到兼具耐用度與舒適度的棒球用品。</h3>
                    </div>
                    <div class="slider-img">
                        <img src="./images/baseball intro.png" alt="">
                    </div>
                </div>
            </div>
            <div class="slider-con">
                <div class="slider-part">
                    <div class="slider-img">
                        <img src="./images/sports info.png" alt="">
                    </div>
                    <div class="slider-intro">
                        <h2>專業運動</h2>
                        <div class="underline"></div>
                        <h3>精選跑步、籃球、排球、登山、游泳與健身訓練所需的專業運動商品，從鞋款、服飾到各式配件皆注重機能與實用性。讓顧客能依照運動習慣、場地與強度，選到真正適合自己的裝備。</h3>
                    </div>
                </div>
            </div>
            <div class="slider-con">
                <div class="slider-part">
                    <div class="slider-intro">
                        <h2>文宏故事屋</h2>
                        <div class="underline"></div>
                        <h3>文宏體育用品社在員林深耕多年，陪伴在地居民、學生與運動愛好者挑選合適的裝備。從第一雙球鞋到每一次比賽前的準備，我們重視的不只是商品，更是每位顧客投入運動時的期待與熱情。</h3>
                    </div>
                    <div class="slider-img">
                        <img src="./images/WHstore.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- 第四部份end -->

    <?php
    include "footer.inc.php";
    ?>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="../js/main.js"></script>

    <!-- aos animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <!-- slick slider-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="../js/slick.js"></script>
    <script src="./js/main.js"></script>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    </script>
</body>
