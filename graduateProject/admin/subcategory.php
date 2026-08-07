<?php
include("top.inc.php");
include("left.inc.php");
include("footer.inc.php");

//針對該id做delete動作
if(isset($_GET['id']) && $_GET['id']!='' && csrf_verify($_GET['csrf_token'] ?? '')) {
    $id = mysqli_real_escape_string($conn,$_GET['id']);
    $delete = mysqli_query($conn, "DELETE FROM `subcategories` WHERE id = '$id'");
}
$token = csrf_token();
?>

<div class="rightDiv">
    <div class="headTitle">
        <h2>SubCategories Page 商品品牌部件種類</h2>
        <a href="manage_subcategories.php">Add SubCategories 新增種類</a>
    </div>
    <div class="view">
        <table width="100%" border="1px" cellpadding="0" cellspacing="0">
            <tr>
                <th>S1 No</th>
                <th>品牌部件名稱</th>
                <th>操作</th>
            </tr>
            <?php
                $display = mysqli_query($conn,"select * from subcategories");
                
                $i=1;
                while($data = mysqli_fetch_assoc($display)){
                    echo "
                    <tr>
                        <td>".$i++."</td>
                        <td>".h($data['subname'])."</td>
                        <td>
                            <a href='?id=".h($data['id'])."&csrf_token=".urlencode($token)."' onclick=\"return confirm('確定要刪除嗎？');\">Delete</a> &nbsp;
                                &nbsp;
                            <a href='manage_subcategories.php?id=".h($data['id'])."'>Edit</a>
                        </td>
                    </tr>
                    ";
                }
            ?>
        </table>
    </div>
</div>

<!-- 按下Edit,針對該id連結到manage_categories.php -->