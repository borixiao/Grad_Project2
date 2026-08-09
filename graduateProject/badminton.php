<?php
include "top.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>羽球拍專區</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./css/wh-theme.css">
    <link rel="stylesheet" href="./css/badminton.css">
</head>

<body>

    <main class="wh-theme">

        <!-- Hero -->
        <section class="bd-hero">
            <div class="bd-hero-frame">
                <img src="./images/502994.jpg" alt="老師傅專注為羽球拍手工穿線">
                <div class="bd-hero-content">
                    <span class="eyebrow">三十年經驗・手工穿線</span>
                    <h1>羽球<br>專區</h1>
                    <p>秉持最好的職業精神，用細心和嚴謹地態度以及最高的品質完成一支支的球拍。超過三十年的穿線經驗的老師傅，嫻熟的操作穿線機並用最少的時間給顧客最好的服務。</p>
                    <div class="bd-hero-actions">
                        <a href="./subcategories.php?subcat_id=5" class="wh-btn wh-btn--light">前往選購</a>
                        <a href="#process" class="wh-scroll-link">看看服務流程 <span class="arrow">→</span></a>
                    </div>
                </div>
            </div>
        </section>

        <!-- 合作品牌 -->
        <div class="bd-brands">
            <div class="wh-wrap wh-section-head">
                <div>
                    <span class="eyebrow">合作品牌</span>
                    <h2>與各大羽球品牌合作</h2>
                </div>
            </div>
            <div class="wh-marquee" aria-hidden="true">
                <div class="wh-marquee-track">
                    <span>VICTOR</span><span>LI-NING</span><span>YONEX</span>
                    <span>VICTOR</span><span>LI-NING</span><span>YONEX</span>
                    <span>VICTOR</span><span>LI-NING</span><span>YONEX</span>
                </div>
            </div>
        </div>

        <!-- 店家服務流程 -->
        <section class="bd-process" id="process">
            <div class="wh-wrap">
                <div class="wh-section-head">
                    <div>
                        <span class="eyebrow">服務流程</span>
                        <h2>店家服務流程</h2>
                    </div>
                </div>

                <div class="wh-rail">
                    <div class="wh-card">
                        <img src="./images/badminton_service1.jpg" alt="選擇球拍">
                        <div class="wh-card-body">
                            <span class="step-no">STEP 01</span>
                            <h3>選擇球拍</h3>
                            <p>選擇你需要的羽球拍，有YY、KAWASAKI品牌的球拍，可以選擇適合你的球拍，依照價格、品牌、樣式，一定可以找到你喜歡的!</p>
                        </div>
                    </div>
                    <div class="wh-card">
                        <img src="./images/badminton_service2.jpg" alt="拍線樣式">
                        <div class="wh-card-body">
                            <span class="step-no">STEP 02</span>
                            <h3>拍線樣式</h3>
                            <p>選完球框後即可選擇你要的拍線樣式，不同磅數代表網面的軟硬度不同而你可以依照自己習慣的或是想嘗試看看不同種類的拍線，選好磅數後可以交給老師傅或是其他工作人員替你服務。</p>
                        </div>
                    </div>
                    <div class="wh-card">
                        <img src="./images/badminton_service3.jpg" alt="穿線服務">
                        <div class="wh-card-body">
                            <span class="step-no">STEP 03</span>
                            <h3>穿線服務</h3>
                            <p>選好樣式就可以留下你的電話和姓名還有註記要預計拿取的時間，等時間到就可以來取貨囉，如果之後需要換線或者是更新配件等等歡迎再到門市來服務。</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="wh-cta">
            <div class="wh-wrap">
                <span class="eyebrow">羽球專區</span>
                <h2>立即參觀選購</h2>
                <a href="./subcategories.php?subcat_id=5" class="wh-btn wh-btn--invert">前往選購 →</a>
            </div>
        </section>

    </main>

    <?php
    include "footer.inc.php";
    ?>

    <script src="./js/main.js"></script>
</body>

</html>
