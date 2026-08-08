<?php
include "connection.inc.php";
include "top.inc2.php";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文宏運動用品店</title>

    <!-- google font：補上首頁需要的字重 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- main css -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <!-- this page's exclusive css -->
    <link rel="stylesheet" href="./css/homepage.css">
</head>

<body>

    <main class="wh-home">

        <!-- Hero -->
        <section class="wh-hero">
            <div class="wh-hero-frame">
                <img src="./images/head_img.jpeg" alt="文宏運動用品店員林門市夜景">
                <div class="wh-hero-content">
                    <span class="eyebrow">員林在地・專業運動用品</span>
                    <h1>為你的每一場比賽<br>做好準備</h1>
                    <p>從球拍穿線到球鞋挑選，文宏運動用品店陪你打理每一項訓練日常，把專業留給真正懂的人。</p>
                    <div class="wh-hero-actions">
                        <a href="#catalogue" class="wh-btn wh-btn--light">探索商品</a>
                        <a href="#catalogue" class="wh-scroll-link">看看有哪些分類 <span class="arrow">→</span></a>
                    </div>
                </div>
            </div>
        </section>

        <!-- 品牌跑馬燈 -->
        <div class="wh-marquee" aria-hidden="true">
            <div class="wh-marquee-track">
                <span>NIKE</span><span>ADIDAS</span><span>MIZUNO</span><span>LOTTO</span><span>KEDS</span><span>SKECHERS</span>
                <span>NIKE</span><span>ADIDAS</span><span>MIZUNO</span><span>LOTTO</span><span>KEDS</span><span>SKECHERS</span>
            </div>
        </div>

        <!-- 分類 rail -->
        <section class="wh-rail-section" id="catalogue">
            <div class="wh-wrap">
                <div class="wh-section-head">
                    <div>
                        <span class="eyebrow">依專長分類</span>
                        <h2>找到你的專屬裝備</h2>
                    </div>
                    <a href="./sitemap.php" class="wh-more">查看完整分類</a>
                </div>

                <div class="wh-rail">
                    <a href="./badminton.php" class="wh-card">
                        <img src="./images/badmin-header.jpg" alt="羽球專區">
                        <div class="wh-card-body">
                            <span class="tag">Badminton</span>
                            <h3>羽球專區</h3>
                            <p>三十年經驗老師傅穿線，球拍、球鞋一次備齊。</p>
                            <span class="go">前往選購 <span>→</span></span>
                        </div>
                    </a>
                    <div class="wh-card wh-card--solid">
                        <div class="wh-card-body">
                            <span class="tag">Baseball</span>
                            <h3>棒球專區</h3>
                            <p>手套、球棒、打擊裝備，依年齡與需求協助挑選。</p>
                            <span class="go">敬請期待 <span>→</span></span>
                        </div>
                    </div>
                    <a href="./categories.php?cat_id=1" class="wh-card">
                        <img src="./images/1F_2F 新店內擺設_210613.png" alt="專業運動用品">
                        <div class="wh-card-body">
                            <span class="tag">All Sports</span>
                            <h3>專業運動</h3>
                            <p>跑步、籃球、排球到登山，機能與實用兼具。</p>
                            <span class="go">前往選購 <span>→</span></span>
                        </div>
                    </a>
                    <a href="./story.php" class="wh-card">
                        <img src="./images/head_img.jpeg" alt="文宏故事屋">
                        <div class="wh-card-body">
                            <span class="tag">Our Story</span>
                            <h3>故事屋</h3>
                            <p>陪伴員林運動愛好者，走過每一個訓練日常。</p>
                            <span class="go">閱讀故事 <span>→</span></span>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <!-- 品牌故事 -->
        <section class="wh-story">
            <div class="wh-wrap">
                <div class="wh-story-grid">
                    <div>
                        <span class="eyebrow">關於文宏</span>
                        <h2>三十年的手感<br>藏在每一次穿線裡</h2>
                        <p>比起促銷折扣，我們更相信專業服務值得信任。從球拍維修到球鞋挑選，文宏運動用品店持續在員林，陪伴在地運動愛好者找到真正合適的裝備。</p>
                        <a href="./story.php" class="wh-btn wh-btn--dark">閱讀我們的故事</a>
                    </div>
                    <div class="wh-story-media">
                        <img src="./images/1F_2F 新店內擺設_210613.png" alt="文宏運動用品店內部陳設">
                        <div class="wh-story-stat">
                            <strong>30+</strong>
                            <span>年穿線與服務經驗</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="wh-cta">
            <div class="wh-wrap">
                <span class="eyebrow">準備出發</span>
                <h2>準備好升級你的裝備了嗎？</h2>
                <p>從羽球到日常訓練，帶齊你下一次全力以赴需要的一切。</p>
                <a href="#catalogue" class="wh-btn wh-btn--invert">立即選購</a>
            </div>
        </section>

    </main>

    <?php
    include "footer.inc.php";
    ?>

    <script src="./js/main.js"></script>
</body>
