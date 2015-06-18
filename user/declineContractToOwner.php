<?php

		$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
		$ownerID = $_COOKIE['userID'];
		$SitterID = $_GET['SitterID'];
		$RequestID = $_GET['RequestID'];

		$sql = "DELETE FROM contracttoowner 
				WHERE RequestID = '$RequestID' AND SitterID = '$SitterID'";
		$stmtc = $db->prepare($sql);
		$stmtc->execute();

		header('Location: ./inbox.php');
?>