<?php 

	$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");


//create when sitter sends contract to owner
	if ($_POST['Where'] = 'ContractToOwner') {

		//in case the one who's sending the contract is not appointed as sitter
		$sql = $db->prepare("INSERT INTO PetSitter VALUES('younoh');");
		$sql->execute();
		
		//create contract
		$stmt = $db->prepare("INSERT INTO Contract VALUES('magnushvidsten',5,115,'younoh','15/07/20','15/08/10',40,1,0);");
		$stmt->execute();
		echo "yes";
		//echo "<script>alert(\"Contract Successfully Sent!\");
		//window.location.href="owner.php";
		//</script>";
	}
//INSERT INTO Contract VALUES(6,'magnushvidsten',5,115,'jennysong',NULL,'15/07/20','15/08/10',99,1)



//create when owner sends contract to sitter
	/*
	elseif ($_POST['Where'] = 'ContractToOwner') {
		$stmt = $db->prepare("INSERT INTO Contract VALUES('".$_POST['OwnerID']."',".$_POST['PetID'].",".$_POST['RequestID'].",'".$_COOKIE[userID]."','".$_POST['StartDate']."','".$_POST['EndDate']."',".$_POST['Compensation'].",1,0);");
		$stmt->execute();
		echo "<script>alert(\"Contract Successfully Sent!\");
		window.location.href=\"{$_SERVER['HTTP_REFERER']}\";
		</script>";
	}


	$stmt = $db->prepare("INSERT INTO Contract VALUES('".$_POST['OwnerID']."',".$_POST['PetID'].",".$_POST['RequestID'].",'".$_COOKIE[userID]."','".$_POST['StartDate']."','".$_POST['EndDate']."',".$_POST['Compensation'].",1,0);");
		
	*/



	/*$stmt = $db->prepare("INSERT INTO Contract VALUES(:ContractID,:OwnerID,:PetID,:RequestID,:SitterID,:AvailabilityID,:StartDate,:EndDate,:Compensation,:Status);");
	
	$stmt->bindParam(':ContractID', 6);
	$stmt->bindParam(':OwnerID', "magnushvidsten");
	$stmt->bindParam(':PetID', 5);
	$stmt->bindParam(':RequestID', 115);
	$stmt->bindParam(':SitterID', 'jennysong');
	$stmt->bindParam(':AvailabilityID', NULL);
	$stmt->bindParam(':StartDate', '15/07/20');
	$stmt->bindParam(':EndDate', '15/08/10');
	$stmt->bindParam(':Compensation', 99);
	$stmt->bindParam(':Status', 0);
	$stmt->execute(); */


?>
