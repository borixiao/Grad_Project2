<?php
include("top.inc.php");
include("left.inc.php");

$product_count = (int) mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM products"))[0];
$active_product_count = (int) mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM products WHERE status = 1"))[0];
$member_count = (int) mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM user_registration"))[0];
$order_count = (int) mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM user_order"))[0];

$cat_labels = [];
$cat_counts = [];
$cat_result = mysqli_query($conn, "SELECT c.catname AS name, COUNT(p.id) AS cnt FROM categories c LEFT JOIN products p ON p.cat_id = c.id GROUP BY c.id, c.catname ORDER BY c.id");
while ($row = mysqli_fetch_assoc($cat_result)) {
    $cat_labels[] = $row['name'];
    $cat_counts[] = (int) $row['cnt'];
}

$subcat_labels = [];
$subcat_counts = [];
$subcat_result = mysqli_query($conn, "SELECT s.subname AS name, COUNT(p.id) AS cnt FROM subcategories s LEFT JOIN products p ON p.subcat_id = s.id GROUP BY s.id, s.subname ORDER BY s.id");
while ($row = mysqli_fetch_assoc($subcat_result)) {
    $subcat_labels[] = $row['name'];
    $subcat_counts[] = (int) $row['cnt'];
}
?>

<div class="cardBox">
    <div class="card">
        <div>
            <div class="numbers"><?php echo $product_count; ?></div>
            <div class="cardName">商品總數</div>
        </div>
        <div class="iconBx">
            <ion-icon name="pricetags-outline"></ion-icon>
        </div>
    </div>

    <div class="card">
        <div>
            <div class="numbers"><?php echo $active_product_count; ?></div>
            <div class="cardName">上架中商品</div>
        </div>
        <div class="iconBx">
            <ion-icon name="storefront-outline"></ion-icon>
        </div>
    </div>

    <div class="card">
        <div>
            <div class="numbers"><?php echo $member_count; ?></div>
            <div class="cardName">會員總數</div>
        </div>
        <div class="iconBx">
            <ion-icon name="people-outline"></ion-icon>
        </div>
    </div>

    <div class="card">
        <div>
            <div class="numbers"><?php echo $order_count; ?></div>
            <div class="cardName">訂單總數</div>
        </div>
        <div class="iconBx">
            <ion-icon name="bag-check-outline"></ion-icon>
        </div>
    </div>
</div>

<!--Add Charts -->
<div class="graphBox">
    <div class="box">
        <canvas id="myChart"></canvas>
    </div>
    <div class="box">
        <canvas id="myChart1"></canvas>
    </div>
</div>

<script>
    const chartData = {
        categoryLabels: <?php echo json_encode($cat_labels, JSON_UNESCAPED_UNICODE); ?>,
        categoryCounts: <?php echo json_encode($cat_counts); ?>,
        subcategoryLabels: <?php echo json_encode($subcat_labels, JSON_UNESCAPED_UNICODE); ?>,
        subcategoryCounts: <?php echo json_encode($subcat_counts); ?>
    };
</script>

<?php
include("footer.inc.php");
?>