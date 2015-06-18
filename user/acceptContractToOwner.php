<?php

		$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
		$userID = $_COOKIE['userID'];

		$sql = "UPDATE contracttoowner 
				SET status = 1
				WHERE OwnerID = '$userID' 
				AND RequestID = :RequestID";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':RequestID', $_POST['RequestID']);		
		$stmt->execute();

		header('Location: ./inbox.php');
?>