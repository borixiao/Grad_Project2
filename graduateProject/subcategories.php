<?php
include "top.inc.php";
// include "function.inc.php";
$subcat_id = isset($_GET['subcat_id']) ? (int) $_GET['subcat_id'] : 0;
?>

<head>
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <section class="newProducts">
        <div class="Indexrow">
            <?php
            $get_product = get_product($conn, '', '', $subcat_id, '');
            if (count($get_product) > 0) {
                foreach ($get_product as $list) { ?>
                    <div class="itemouter">
                        <div class="Indexcol">
                            <div class="imgBx">
                                <img src="./admin/assets/images/<?php echo h($list['pimage']) ?>">
                            </div>

                        </div>
                        <div class="details">
                            <a href="products-detail.php?id=<?php echo h($list['id']) ?>">
                                <h3><?php echo h($list['pname']) ?></h3>
                                <p> $ <?php echo h($list['sprice']) ?> </p>
                                <form action="add_cart.php" method="post">
                                    <input type="hidden" name="pid" value="<?php echo h($list['id']) ?>">
                                    <!-- <input type="submit" name="cart" value="Add Cart" class="cartBtn"> -->
                                </form>
                            </a>
                        </div>
                    </div>
            <?php }
            } else {
                echo "尚無此產品 !";
            }
            ?>

        </div>
    </section>
</body>

<?php
include "footer.inc.php";
?>