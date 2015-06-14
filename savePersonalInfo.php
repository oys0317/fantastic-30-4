<?php

$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
$userID = $_COOKIE['userID'];

// Update the user's info
$stmt = $db->prepare("	UPDATE User
						SET Name=:Name, Address=:Address, PhoneNum=:PhoneNum
						WHERE UserID = '$userID'");
$stmt->bindParam(':Name', $_POST['editName']);
$stmt->bindParam(':Address', $_POST['editAddress']);
$stmt->bindParam(':PhoneNum', $_POST['editPhoneNum']);
$stmt->execute();

// TODO: Tell user error occurred if a field is blank

header('Location: ./myaccount.php');

?>