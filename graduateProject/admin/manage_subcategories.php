<?php
$msg = "";//紅色警語
$subname = "";
include("top.inc.php");
include("left.inc.php");
include("footer.inc.php");

//select DB categories的資料
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $display = mysqli_query($conn, "select * from subcategories where id = '$id'");
    $res = mysqli_fetch_assoc($display);
    $subname = $res['subname'];
}

//按下submit, select DB categories的資料
if (isset($_POST['submit']) && !csrf_verify($_POST['csrf_token'] ?? '')) {
    $msg = "驗證失敗，請重新整理頁面後再試一次";
} elseif (isset($_POST['submit'])) {
    $subname = mysqli_real_escape_string($conn, $_POST['subname']);
    $check = mysqli_query($conn, "select * from subcategories where
        subname = '$subname'");
    $num = mysqli_num_rows($check);

    //$check確認catname欄位是否有相同的名稱
    if ($num > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $res = mysqli_fetch_assoc($check);
            if ($id == $res['id']) {
            } else {
                $msg = "SubCategory name ready exist";
            }
        } else {
            $msg = "SubCategory name ready exist";
        }
    }

    //同樣在紅色警語沒出現的情況下,若get到該id,則就是Edit觸發，update catname欄位指定的資料名稱並返回category.php, 
    //反之,則就是Add Categories觸發，做insert
    if ($msg == "") {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $update = mysqli_query($conn, "UPDATE `subcategories` SET `subname`='$subname',`created_on`= NOW() WHERE id='$id'");
            header("location:subcategory.php");
            die();
        } else {
            $query = mysqli_query($conn, "INSERT INTO `subcategories`(`subname`, `created_on`) VALUES ('$subname', NOW())");
            if ($query) {
                header("location:subcategory.php");
                die();
            } else {
                $msg = "Error";
            }
        }
    }
}
?>

<div class="rightDiv">
    <div class="headTitle">
        <h2>SubCategories Manage</h2>
        <a href="manage_subcategories.php">Add SubCategories</a>
    </div>
    <form method="post" action="">
        <?php echo csrf_field(); ?>
        <input type="text" name="subname" placeholder="SubCategory Name ( 請輸入中文 )" value="<?php echo h($subname); ?>" required>
        <input type="submit" name="submit" value="Submit">

        <div class="msg"><?php echo $msg; ?></div>
    </form>
</div>