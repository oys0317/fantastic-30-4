<?php

		$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
		$userID = $_COOKIE['userID'];
		$SitterID = $_GET['SitterID'];
		$RequestID = $_GET['RequestID'];
		$sql = "UPDATE contracttoowner 
				SET status = 1
				WHERE OwnerID = '$userID' 
				AND RequestID = '$RequestID'
				AND SitterID = '$SitterID'";
		$stmt = $db->prepare($sql);	
		$stmt->execute();

		$sql = "DELETE FROM contracttoowner 
				WHERE OwnerID = '$userID'  
				AND RequestID = '$RequestID'
				AND SitterID <> '$SitterID'";
		$db->query($sql);

		header('Location: ./inbox.php');
?>