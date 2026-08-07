<?php
$msg = "";//紅色警語
$catname = "";
include("top.inc.php");
include("left.inc.php");
include("footer.inc.php");

//針對id做select DB categories的資料
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $display = mysqli_query($conn, "select * from categories where id = '$id'");
    $res = mysqli_fetch_assoc($display);
    $catname = $res['catname'];
}

//按下submit, select DB categories的資料
if (isset($_POST['submit']) && !csrf_verify($_POST['csrf_token'] ?? '')) {
    $msg = "驗證失敗，請重新整理頁面後再試一次";
} elseif (isset($_POST['submit'])) {
    $catname = mysqli_real_escape_string($conn, $_POST['catname']);
    $check = mysqli_query($conn, "select * from categories where
        catname = '$catname'");
    $num = mysqli_num_rows($check);

    //$check確認catname欄位是否有相同的名稱
    if ($num > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $res = mysqli_fetch_assoc($check);
            if ($id == $res['id']) {
            } else {
                $msg = "Category name ready exist";
            }
        } else {
            $msg = "Category name ready exist";
        }
    }

    //同樣在紅色警語沒出現的情況下,若get到該id,則就是Edit觸發，update catname欄位指定的資料名稱並返回category.php, 
    //反之,則就是Add Categories觸發，做insert
    if ($msg == "") {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $update = mysqli_query($conn, "UPDATE `categories` SET `catname`='$catname',`created_on`= NOW() WHERE id='$id'");
            header("location:category.php");
            die();
        } else {
            $query = mysqli_query($conn, "INSERT INTO `categories`(`catname`, `created_on`) VALUES ('$catname', NOW())");
            if ($query) {
                header("location:category.php");
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
        <h2>Categories Manage</h2>
        <a href="manage_categories.php">Add Categories</a>
    </div>
    <form method="post" action="">
        <?php echo csrf_field(); ?>
        <input type="text" name="catname" placeholder="Category Name" value="<?php echo h($catname); ?>" required>
        <input type="submit" name="submit" value="Submit">

        <div class="msg"><?php echo $msg; ?></div>
    </form>
</div>