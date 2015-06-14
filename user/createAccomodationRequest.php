<?php
	//TODO need to check if this user is already owner or not
	//create new user
	$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
	$sql = 'SELECT MAX(RequestID)
			FROM AccommodationRequest
			WHERE OwnerID ="'.$_COOKIE['userID'].'"';
	$RequestID = 0;
	foreach($db->query($sql) as $row){
		$RequestID = $row['MAX(RequestID)'];
	}
	$RequestID += 1;
	
	$stmt = $db->prepare("INSERT INTO AccommodationRequest (OwnerID,PetID,RequestID,WithinDistance,StartDate,EndDate) VALUES(:OwnerID,:PetID,:RequestID,:WithinDistance,:StartDate,:EndDate);");
	$stmt->bindParam(':OwnerID', $_COOKIE['userID']);
	$stmt->bindParam(':PetID', $_POST['PetID']);
	$stmt->bindParam(':RequestID', $RequestID);
	$stmt->bindParam(':WithinDistance', $_POST['WithInDistance']);
	$stmt->bindParam(':StartDate', $_POST['StartDate']);
	$stmt->bindParam(':EndDate', $_POST['EndDate']);
	$stmt->execute();



		setcookie('userID', $_POST["userid"], time() + 3600);
		header('Location: ./owner.php');
		die();

	

?>

