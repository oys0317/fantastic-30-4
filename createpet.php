<?php

	//create new pet
	$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
	$stmt = $db->prepare("INSERT INTO ownspet (OwnerID,PetID,PetName,Size,Species) 
						  VALUES(:OwnerID,:PetID,:PetName,:Size,:Species);");
	$stmt->bindParam(':OwnerID', $_COOKIE['userID']);
	$stmt->bindParam(':PetID', $_POST['PetID']);
	$stmt->bindParam(':PetName', $_POST['PetName']);
	$stmt->bindParam(':Size', $_POST['Size']);
	$stmt->bindParam(':Species', $_POST['Species']);
	$stmt->execute();


	//check if the new pet is successfully created
	$stmt = $db->prepare("select PetID from ownspet where PetID=:PetID");
	$stmt ->execute();
	$row = $stmt->fetch();

	//if successfully created, then login
	if ($_POST["petID"] == $row) {
		header('Location: ./myaccount.php');
		die();
	}
	//if not created, don't login. go back to register page.
	//TODO: make alert that something is wrong. none of them can be null
	else {
		header('Location: ./index.php');
		die();
	}
	
?>
