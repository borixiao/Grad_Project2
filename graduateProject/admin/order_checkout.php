<?php
include("top.inc.php");
include("left.inc.php");
include("footer.inc.php");

//針對該id做delete動作
if(isset($_GET['id']) && $_GET['id']!='' && csrf_verify($_GET['csrf_token'] ?? '')) {
    $id = mysqli_real_escape_string($conn,$_GET['id']);
    $delete = mysqli_query($conn, "DELETE FROM `user_order` WHERE id = '$id'");
}
$token = csrf_token();
?>

<div class="rightDiv">
    <div class="headTitle">
        <h2>Order Page 會員結帳訂單頁面</h2>
    </div>
    <div class="view">
        <table width="100%" border="1px" cellpadding="0" cellspacing="0">
            <tr>
                <th>S1 No</th>
                <th>訂單會員名稱</th>
                <th>訂單會員Email</th>
                <th>訂單會員連絡電話</th>
                <th>訂單會員地址</th>
                <!-- <th>訂單會員付款方式</th> -->
                <th>訂單商品</th>
                <th>會員ID確認</th>
                <th>訂單商品數量</th>
                <th>操作</th>

            </tr>
            <?php
                $display = mysqli_query($conn,"select * from user_order");
                
                $i=1;
                while($data = mysqli_fetch_assoc($display)){
                    echo "
                    <tr>
                        <td>".$i++."</td>
                        <td>".$data['order_name']."</td>
                        <td>".$data['order_email']."</td>
                        <td>".$data['order_phone']."</td>
                        <td>".$data['order_address']."</td>
                        
                        <td>".$data['oid']."</td>
                        <td>".$data['order_user_id']."</td>
                        <td>".$data['qty']."</td>
                        <td>&nbsp;<a href='?id=".$data['id']."&csrf_token=".urlencode($token)."' onclick=\"return confirm('確定要刪除嗎？');\">Delete</a>&nbsp;</td>
                    </tr>
                    ";
                }
            ?>
        </table>
    </div>
</div>

<!-- 按下Edit,針對該id連結到manage_categories.php -->