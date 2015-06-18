<?php

		$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
		$userID = $_COOKIE['userID'];

		$sql = "UPDATE contracttositter 
				SET status = 1
				WHERE OwnerID = $userID 
				AND SitterID = '$userID' 
				AND AvailabilityID = :AvailabilityID";

				// UPDATE contracttoowner 
				// SET status = 1
				// WHERE OwnerID = '$userID' 
				// AND RequestID = :RequestID;
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':AvailabilityID', $_POST['AvailabilityID']);
		//$stmt->bindParam(':RequestID', $_POST['RequestID']);		
		$stmt->execute();

		header('Location: ./inbox.php');
?>