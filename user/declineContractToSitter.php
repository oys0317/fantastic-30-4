<?php

		$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
		$ownerID = $_COOKIE['userID'];

		$sql = "DELETE FROM contracttositter 
				WHERE AvailabilityID = :AvailabilityID";
		$stmtc = $db->prepare($sql);
		$stmtc->bindParam(':AvailabilityID', $_POST['AvailabilityID']);
		$stmtc->execute();

		header('Location: ./inbox.php');
?>