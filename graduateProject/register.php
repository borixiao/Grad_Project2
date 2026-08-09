<?php
include "connection.inc.php";

$uname = $_POST['uname'] ?? '';
$email = $_POST['email'] ?? '';
$mnumber = $_POST['mnumber'] ?? '';
$password = password_hash($_POST['password'] ?? '', PASSWORD_DEFAULT);

$check = mysqli_prepare($conn, "SELECT user_id FROM user_registration WHERE email = ?");
mysqli_stmt_bind_param($check, "s", $email);
mysqli_stmt_execute($check);
mysqli_stmt_store_result($check);

if (mysqli_stmt_num_rows($check) > 0) {
	echo 1;
} else {
	$stmt = mysqli_prepare($conn, "INSERT INTO `user_registration`(`uname`, `email`, `mnumber`, `password`, `create_at`)
			VALUES (?, ?, ?, ?, NOW())");
	mysqli_stmt_bind_param($stmt, "ssss", $uname, $email, $mnumber, $password);

	if (mysqli_stmt_execute($stmt)) {
		echo 0;
	}
}
?>
