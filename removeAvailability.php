<?php

		$dbc = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
		$userID = $_COOKIE['userID'];
		$availID = $_POST['AvailID'];

		if(isset($_POST['AvailID'])) {
			$sql = "DELETE FROM SitterAvailability WHERE AvailabilityID = :AvailID";
			$stmtc = $dbc->prepare($sql);
			$stmtc->bindParam(':AvailID', $availID);
			$stmtc->execute();

			header('Location: ./myaccount.php');
		}
		else {
			echo "Error removing availability";
		}

?>