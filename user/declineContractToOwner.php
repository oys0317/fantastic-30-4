<?php

		$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
		$ownerID = $_COOKIE['userID'];

		$sql = "DELETE FROM contracttoowner 
				WHERE RequestID = :RequestID";
		$stmtc = $db->prepare($sql);
		$stmtc->bindParam(':RequestID', $_POST['RequestID']);
		$stmtc->execute();

		header('Location: ./inbox.php');
?>