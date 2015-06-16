<?php

		$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
		$ownerID = $_COOKIE['userID'];

		if(isset($_POST['reqID'])) {
			$sql = "DELETE FROM AccommodationRequest 
					WHERE RequestID = :RequestID";
			$stmtc = $db->prepare($sql);
			$stmtc->bindParam(':RequestID', $_POST['reqID']);
			$stmtc->execute();

			header('Location: ./myaccount.php');
		}
		else {
			echo "Error removing accommodation request";
		}

?>