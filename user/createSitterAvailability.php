<?php
	//create new user
	$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
	
	$sql = 'INSERT INTO petSitter
			VALUES("'.$_COOKIE['userID'].'")
			';
	$db->query($sql);

	$sql = 'SELECT MAX(AvailabilityID)
			FROM SitterAvailability
			WHERE SitterID ="'.$_COOKIE['userID'].'"';
	$AvailabilityID = 0;
	foreach($db->query($sql) as $row){
		$AvailabilityID = $row['MAX(AvailabilityID)'];
	}
	$AvailabilityID += 1;
	
	$stmt = $db->prepare("INSERT INTO SitterAvailability (SitterID,AvailabilityID,StartDate,EndDate) VALUES(:SitterID,:AvailabilityID,:StartDate,:EndDate);");
	$stmt->bindParam(':SitterID', $_COOKIE['userID']);
	$stmt->bindParam(':AvailabilityID', $AvailabilityID);
	$stmt->bindParam(':StartDate', $_POST['StartDate']);
	$stmt->bindParam(':EndDate', $_POST['EndDate']);
	$stmt->execute();

	$stmt = $db->prepare("INSERT INTO CanTakeCareOf (Size,Species,SitterID,AvailabilityID) VALUES(:Size,:Species,:SitterID,:AvailabilityID);");
	$stmt->bindParam(':Size', $_POST['petSize']);
	$stmt->bindParam(':Species', $_POST['petSpecies']);
	$stmt->bindParam(':SitterID', $_COOKIE['userID']);
	$stmt->bindParam(':AvailabilityID', $AvailabilityID);
	$stmt->execute();



	
		setcookie('userID', $_POST["userid"], time() + 3600);
		header('Location: ./sitter.php');
		die();
	

?>

