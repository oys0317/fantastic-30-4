<?php

		$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
		$OwnerID = $_GET['OwnerID'];
		$AvailabilityID = $_GET['AvailabilityID'];

		$sql = "DELETE FROM contracttositter 
				WHERE AvailabilityID = '$AvailabilityID' AND ownerID = '$OwnerID'";
		$stmtc = $db->prepare($sql);
		$stmtc->execute();

		header('Location: ./inbox.php');
?>