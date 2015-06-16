<?php

		$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
		$userID = $_COOKIE['userID'];

		$sql = "DELETE FROM OwnsPet WHERE OwnerID = '$userID' AND PetID = :PetID";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':PetID', $_POST['petid']);
		$stmt->execute();

		header('Location: ./myaccount.php');
?>