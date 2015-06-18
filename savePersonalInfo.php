<?php

$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
$userID = $_COOKIE['userID'];

$name = $_POST['editName'];
$address = $_POST['editAddress'];
$phoneNumber = $_POST['editPhoneNum'];

// Update the user's name if necessary
if($name) {
	$stmt = $db->prepare("	UPDATE User
							SET Name='$name'
							WHERE UserID = '$userID'");
	$stmt->execute();
}

if($address) {
	// Update the user's address if necessary
	$stmt = $db->prepare("	UPDATE User
							SET Address='$address'
							WHERE UserID = '$userID'");
	$stmt->execute();
}

if($phoneNumber) {
	// Update the user's phone number if necessary
	$stmt = $db->prepare("	UPDATE User
							SET PhoneNum='$phoneNumber'
							WHERE UserID = '$userID'");
	$stmt->execute();
}

// TODO: Tell user error occurred if a field is blank

header('Location: ./myaccount.php');

?>