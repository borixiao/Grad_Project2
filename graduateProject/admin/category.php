<?php
include("top.inc.php");
include("left.inc.php");
include("footer.inc.php");

//針對該id做delete動作
if(isset($_GET['id']) && $_GET['id']!='' && csrf_verify($_GET['csrf_token'] ?? '')) {
    $id = mysqli_real_escape_string($conn,$_GET['id']);
    $delete = mysqli_query($conn, "DELETE FROM `categories` WHERE id = '$id'");
}
$token = csrf_token();
?>

<div class="rightDiv">
    <div class="headTitle">
        <h2>Categories Page 商品品牌種類</h2>
        <a href="manage_categories.php">Add Categories 新增品牌</a>
    </div>
    <div class="view">
        <table width="100%" border="1px" cellpadding="0" cellspacing="0">
            <tr>
                <th>S1 No</th>
                <th>品牌種類名稱</th>
                <th>操作</th>
            </tr>
            <?php
                $display = mysqli_query($conn,"select * from categories");
                
                $i=1;
                while($data = mysqli_fetch_assoc($display))//關聯數組
                {
                    echo "
                    <tr>
                        <td>".$i++."</td>
                        <td>".$data['catname']."</td>
                        <td>
                            <a href='?id=".$data['id']."&csrf_token=".urlencode($token)."' onclick=\"return confirm('確定要刪除嗎？');\">Delete</a> &nbsp;
                                &nbsp;
                            <a href='manage_categories.php?id=".$data['id']."'>Edit</a>
                        </td>
                    </tr>
                    ";
                }
            ?>
        </table>
    </div>
</div>

<!-- 按下Edit,針對該id連結到manage_categories.php -->