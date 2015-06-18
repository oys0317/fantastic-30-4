<?php

		$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
		$userID = $_COOKIE['userID'];
		$OwnerID = $_GET['OwnerID'];
		$AvailabilityID = $_GET['AvailabilityID'];
		$sql = "UPDATE contracttositter 
				SET status = 1
				WHERE OwnerID = '$OwnerID' 
				AND SitterID = '$userID' 
				AND AvailabilityID = '$AvailabilityID'";

				// UPDATE contracttoowner 
				// SET status = 1
				// WHERE OwnerID = '$userID' 
				// AND RequestID = :RequestID;
		$db->query($sql);

		$sql = "DELETE FROM contracttositter 
				WHERE OwnerID <> '$OwnerID'  
				AND SitterID = '$userID'
				AND AvailabilityID = '$AvailabilityID'";
		$db->query($sql);

		header('Location: ./inbox.php');
?>