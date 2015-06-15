<?php 

	$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");

	$stmt = $db->prepare("INSERT INTO Contract VALUES(:ContractID,:OwnerID,:PetID,:RequestID,:SitterID,:AvailabilityID,:StartDate,:EndDate,:Compensation,:Status);");
	
	$stmt->bindParam(':ContractID', 6);
	$stmt->bindParam(':OwnerID', );
	$stmt->bindParam(':PetID', );
	$stmt->bindParam(':RequestID', );
	$stmt->bindParam(':SitterID', );
	$stmt->bindParam(':AvailabilityID', );
	$stmt->bindParam(':StartDate', );
	$stmt->bindParam(':EndDate', );
	$stmt->bindParam(':Compensation', );
	$stmt->bindParam(':Status', );
	$stmt->execute(); 


?>
