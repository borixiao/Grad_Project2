<?php

include "connection.inc.php";

session_start();
error_reporting(0);

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$stmt = mysqli_prepare($conn, "SELECT user_id, password FROM user_registration WHERE email = ?");
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if ($data && password_verify($password, $data['password'])) {
	$_SESSION['id'] = $data['user_id'];
	echo 1;
} else {
	echo 0;
}
?>
