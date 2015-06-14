<?php

$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
$userID = $_COOKIE['userID'];

// Get the real current password
$userSQL = "	SELECT Password
				FROM User
				WHERE UserID = '$userID'";
if(!$userSQL) {
	echo "An error has happened!";
}

$realOldPassword = "";
foreach($db->query($userSQL) as $row) {
	$realOldPassword = $row['Password'];
}

// Make sure user got old password correct and both new passwords match
$oldPass = $_POST['currentPasswordBox'];
$newPass0 = $_POST['newPasswordBox'];
$newPass1 = $_POST['otherNewPasswordBox'];
if($realOldPassword != $oldPass) {
	header('Location: ./editPersonalInfo.php');
	// TODO: Tell user that old password is wrong
}
else if($newPass0 != $newPass1) {
	header('Location: ./editPersonalInfo.php');
	// TODO: Tell user that new pwds don't match
}

// If password info makes sense, change user's password.
else {
	// Change the user's password
	$stmt = $db->prepare("	UPDATE User
							SET Password=:NewPassword
							WHERE UserID = '$userID'");

	$stmt->bindParam(':NewPassword', $_POST['newPasswordBox']);
	$stmt->execute();	

	header('Location: ./myaccount.php');
}
?>