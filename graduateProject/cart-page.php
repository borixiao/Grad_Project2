<?php
include "top.inc.php";
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website</title>
    <!-- main css -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- this page's exclusive css -->
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
</head>

<body>
    <div class="cartTable">
        <table>
            <tr>
                <th>已選商品</th>
                <th>數量</th>
                <th>個別總額</th>
            </tr>
            
            <?php
            $ip = getIP();

            if (isset($user_id)) { // -----------------------User-cart---------------------------
                $stmt = mysqli_prepare($conn, "SELECT * FROM `user_cart` WHERE `user_id` = ? AND `ip_address` = ?");
                mysqli_stmt_bind_param($stmt, "is", $user_id, $ip);
                mysqli_stmt_execute($stmt);
                $con = mysqli_stmt_get_result($stmt);
                $check = mysqli_num_rows($con);
                $Total_price = 0;
                $Total_total = 0;
                if ($check > 0) {
                    while ($row = mysqli_fetch_assoc($con)) {
                        $id = (int) $row['pid'];
                        $prodStmt = mysqli_prepare($conn, "SELECT * FROM products WHERE id = ?");
                        mysqli_stmt_bind_param($prodStmt, "i", $id);
                        mysqli_stmt_execute($prodStmt);
                        $data = mysqli_fetch_assoc(mysqli_stmt_get_result($prodStmt));
                        $sub_total = $row['qty'] * $data['sprice'];
                        $Total_price = $Total_price + $sub_total;
                        $Total_total = $Total_price;
            ?>
                        <tr>
                            <td>
                                <div class="cart-info">
                                    <img src="./admin/assets/images/<?php echo $data['pimage'] ?>" width="80px">
                                    <div>
                                        <p><?php echo $data['pname'] ?></p>
                                        <small>價格 : $<?php echo $data['sprice'] ?></small>
                                        <br>
                                        <a href="add_cart.php?id=<?php echo $row['id'] ?>">移出</a>
                                    </div>
                                </div>
                            </td>
                            <td><?php echo $row['qty'] ?></td>
                            <td>$<?php echo $sub_total ?></td>
                        </tr>
                    <?php }
                } else {
                    // echo "購物車已空 !";
                    header("location:index.php");
                }
            } else { // -----------------------Guest-cart---------------------------
                $stmt = mysqli_prepare($conn, "SELECT * FROM `guest_cart` WHERE `ip_address` = ?");
                mysqli_stmt_bind_param($stmt, "s", $ip);
                mysqli_stmt_execute($stmt);
                $con = mysqli_stmt_get_result($stmt);
                $check = mysqli_num_rows($con);
                $Total_price = 0;
                $Total_total = 0;
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
                    ?>
                        <tr>
                            <td>
                                <div class="cart-info">
                                    <img src="./admin/assets/images/<?php echo $data['pimage'] ?>" width="80px">
                                    <div>
                                        <p><?php echo $data['pname'] ?></p>
                                        <small>價格 : $<?php echo $data['sprice'] ?></small>
                                        <br>
                                        <a href="add_cart.php?id=<?php echo $row['id'] ?>">移出</a>
                                    </div>
                                </div>
                            </td>
                            <td><?php echo $row['qty'] ?></td>
                            <td>$<?php echo $sub_total ?></td>
                        </tr>
            <?php }
                } else {
                    // echo "購物車已空 !";
                    header("location:index.php");
                }
            }
            ?>
        </table>

        <div class="total_price">
            <table>
                <!-- <tr>
                    <td>個別總額</td>
                    <td>$<?php echo $Total_price ?></td>
                </tr> -->
                <!-- <tr>
                    <td>運費</td>
                    <td>$110</td>
                </tr> -->
                <tr>
                    <td>消費總額</td>
                    <td>$<?php echo $Total_total ?></td>
                </tr>
            </table>
        </div>
        <div class="checkoutbtn">
            <a href="index.php" class="continue-btn">繼續購物</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="checkout.php"><button type="button" class="check-btn" id="checkout">結帳</button></a>
        </div>
    </div>
</body>


<?php
include "footer.inc.php"
?>