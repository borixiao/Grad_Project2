<!-- 商品細節頁 -->
<?php
include "top.inc.php";
$pro_id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
// include "function.inc.php";
?>

<head>
    <link rel="stylesheet" href="./css/style.css">
</head>

<section class="singlePro">
    <div class="row">
        <?php
        $get_product = get_product($conn, '', '', '', $pro_id);
        foreach ($get_product as $list) { ?>

            <div class="singlecol">
                <div class="imgBx">
                    <img src="./admin/assets/images/<?php echo h($list['pimage']) ?>">
                </div>
            </div>
            <div class="singlecol">
                <h2><?php echo h($list['pname']) ?></h2>
                <label class="sprice">$ <?php echo h($list['sprice']) ?></label> &nbsp; &nbsp; <label class="mrp"><del>$ <?php echo h($list['mrp']) ?></del></label>
                <br>
                <form method="post" action="add_cart.php">
                    <input type="number" name="qty" value="1" min="1" max="5">
                    <input type="submit" name="cart" value="加入購物車" class="cartBtn">
                    <p><?php echo h($list['short_desc']) ?></p>
                    <p><?php echo h($list['long_desc']) ?></p>

                    <input type="hidden" name="pid" value="<?php echo h($list['id']) ?>">
                </form>
            </div>
        <?php } ?>
    </div>
</section>


<section class="newProducts">
    <div class="titleText">
        <h1>相關產品</h1>
    </div>
    <div class="Indexrow">
        <div class="itemouter">
            <div class="Indexcol">
                <div class="imgBx">
                    <img src="images/shoe3.jpg">
                </div>
            
            </div>
            <div class="IDLinf">
                <div class="details">
                     <h3>Nike Pegasus 慢跑鞋</h3>
                        <p> $2680</p>
                </div>
                <input type="submit" name="cart" value="加入購物車" class="cartBtn">
            </div>
        </div>

        <div class="itemouter">
            <div class="Indexcol">
                <div class="imgBx">
                    <img src="images/shoes_2.jpg">
                </div>
            
            </div>
            <div class="IDLinf">
                <div class="details">
                     <h3>adidas RUNFALCON 2.0</h3>
                        <p> $1880</p>
                </div>
                <input type="submit" name="cart" value="加入購物車" class="cartBtn">
            </div>
        </div>
        <div class="itemouter">
            <div class="Indexcol">
                <div class="imgBx">
                    <img src="images/shoes_1.jpg">
                </div>
            
            </div>
            <div class="IDLinf">
                <div class="details">
                     <h3>ASICS GEL-CUMULUS 23</h3>
                        <p> $3280</p>
                </div>
                <input type="submit" name="cart" value="加入購物車" class="cartBtn">
            </div>
        </div>
        <div class="itemouter">
            <div class="Indexcol">
                <div class="imgBx">
                    <img src="images/shoe1.jpg">
                </div>
            
            </div>
            <div class="IDLinf">
                <div class="details">
                     <h3>Nike Dri-FIT 運動上衣</h3>
                        <p> $1280</p>
                </div>
                <input type="submit" name="cart" value="加入購物車" class="cartBtn">
            </div>
        </div>

    </div>
</section>


<script type="text/javascript" src="js/main.js"></script>
</body>

</html>
<?php
include "footer.inc.php";
?>
