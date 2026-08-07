<?php
include("top.inc.php");
include("left.inc.php");
include("footer.inc.php");

if(isset($_GET['type']) && $_GET['type']!='' && csrf_verify($_GET['csrf_token'] ?? '')){
    $type = mysqli_real_escape_string($conn,$_GET['type']);
    if($type == 'status'){
        $opt = mysqli_real_escape_string($conn,$_GET['operation']);
        $s_id = mysqli_real_escape_string($conn,$_GET['s_id']);
        if($opt=='active'){
            $status = '1';
        }else{
            $status = '0';
        }
        $update = mysqli_query($conn,"UPDATE `products` SET `status`='$status' WHERE id='$s_id'");
    }
}



//針對該id做delete動作
if(isset($_GET['id']) && $_GET['id']!='' && csrf_verify($_GET['csrf_token'] ?? '')) {
    $id = mysqli_real_escape_string($conn,$_GET['id']);
    $img = mysqli_query($conn,"select * from products where id = '$id'");
    $result = mysqli_fetch_assoc($img);
    if (!empty($result['pimage'])) {
        @unlink("assets/images/".$result['pimage']);
    }
    $delete = mysqli_query($conn, "DELETE FROM `products` WHERE id = '$id'");
    header("location:products.php");
}
$token = csrf_token();
?>

<div class="rightDiv">
    <div class="headTitle">
        <h2>Products Page 商品</h2>
        <a href="manage_products.php">Add Products 新增產品</a>
    </div>
    <div class="view">
        <table width="100%" border="1px" cellpadding="0" cellspacing="0">
            <tr>
                <th>S1 No</th>
                <th>商品名稱</th>
                <th>操作</th>
                <th>上架狀態</th>
            </tr>
            <?php
                $display = mysqli_query($conn,"select * from products");
                
                $i=1;
                while($data = mysqli_fetch_assoc($display)){
                    echo "
                    <tr>
                        <td>".$i++."</td>
                        <td>".$data['pname']."</td>
                        <td>
                            <a href='?id=".$data['id']."&csrf_token=".urlencode($token)."' onclick=\"return confirm('確定要刪除嗎？');\">Delete</a> &nbsp;
                                &nbsp;
                            <a href='manage_products.php?id=".$data['id']."'>Edit</a>
                        </td>

                        <td>"; ?>
                        <?php
                            if($data['status']==1){
                               echo"<a href='?type=status&operation=deactive&s_id=".$data['id']."&csrf_token=".urlencode($token)."'>上架Active</a>";
                            }else{
                                echo"<a href='?type=status&operation=active&s_id=".$data['id']."&csrf_token=".urlencode($token)."'>下架Deactive</a>";
                            }
                        echo "</td>
                    </tr>
                    ";
                }
            ?>
        </table>
    </div>
</div>

<!-- 按下Edit,針對該id連結到manage_categories.php -->