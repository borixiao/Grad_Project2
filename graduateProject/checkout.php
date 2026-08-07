<?php
include "top.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/checkout.css">
</head>

<body>
    <div class="order_info">
        <div class="cartorder_info">
            <div class="titleText">
                <h1>您的訂單</h1>
            </div>

            <?php
            $cartItems = array();
            $Total_price = 0;
            $Total_total = 0;

            if (isset($user_id)) {
                $stmt = mysqli_prepare($conn, "SELECT * FROM `user_cart` WHERE `user_id` = ? AND `ip_address` = ?");
                mysqli_stmt_bind_param($stmt, "is", $user_id, $ip);
                mysqli_stmt_execute($stmt);
                $con = mysqli_stmt_get_result($stmt);
                $check = mysqli_num_rows($con);

                if ($check > 0) {
                    while ($row = mysqli_fetch_assoc($con)) {
                        $id = (int) $row['pid'];
                        $prodStmt = mysqli_prepare($conn, "SELECT * FROM products WHERE id = ?");
                        mysqli_stmt_bind_param($prodStmt, "i", $id);
                        mysqli_stmt_execute($prodStmt);
                        $data = mysqli_fetch_assoc(mysqli_stmt_get_result($prodStmt));
                        $sub_total = $row['qty'] * $data['sprice'];
                        $Total_price = $Total_price + $sub_total;
                        $Total_total = $Total_price + 110;

                        $cartItems[] = array(
                            'pid' => $id,
                            'qty' => $row['qty'],
                            'pimage' => $data['pimage'],
                            'pname' => $data['pname'],
                            'sub_total' => $sub_total,
                        );
                    ?>
                    <tr>
                        <td>
                            <div class="cart-info">
                                <img src="./admin/assets/images/<?php echo $data['pimage'] ?>" width="80px">
                                <div>
                                    <p><?php echo $data['pname'] ?></p>
                                    <small>數量 : <?php echo $row['qty'] ?></small><br>
                                    <small>金額 : $<?php echo $sub_total ?></small>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php }
                }
            }
            ?>

            <div class="total_price">
                <table>
                    <tr>
                        <td>小計</td>
                        <td>$<?php echo $Total_price ?></td>
                    </tr>
                    <tr>
                        <td>手續費</td>
                        <td>$110</td>
                    </tr>
                    <tr>
                        <td>總計</td>
                        <td>$<?php echo $Total_total ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="box">
            <div class="titleText">
                <h1>帳單資訊</h1>
            </div>
            <form method="post" action="user_order.php" id="order_form" class="order_form">
                <h5>姓名</h5>
                <input type="text" name="order_name" placeholder="輸入姓名" id="order_name" class="form-data" required>
                <h5>電子郵件</h5>
                <input type="email" name="order_email" placeholder="輸入Email" id="order_email" class="form-data" required>
                <h5>聯絡電話</h5>
                <input type="text" name="order_phone" placeholder="輸入電話號碼" id="order_phone" class="form-data" required>
                <h5>地址</h5>
                <input type="text" name="order_address" placeholder="輸入地址" id="order_address" class="form-data" required>
                <div class="pay_choice">
                    <input type="radio" name="order_pay" value="Paypal" />Paypal
                    <input type="radio" name="order_pay" value="LINEPAY" />LINEPAY
                    <input type="radio" name="order_pay" value="ATM" />網路ATM
                    <input type="radio" name="order_pay" value="7-eleven" />7-eleven代碼
                    <input type="radio" name="order_pay" value="Family" />全家代碼
                </div>

                <?php foreach ($cartItems as $item) { ?>
                    <input type="hidden" name="oid[]" value="<?php echo $item['pid'] ?>">
                    <input type="hidden" name="qty[]" value="<?php echo $item['qty'] ?>">
                <?php } ?>

                <input type="submit" name="order" value="送出訂單" id="order" class="orderconfirm_btn">
            </form>
        </div>

    </div>
</body>

</html>

<?php
include "footer.inc.php"
?>
