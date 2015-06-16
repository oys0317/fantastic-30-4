<?php 

	$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");

//create when sitter sends contract to owner
	if ($_POST['Where'] == 'ContractToOwner') {

		//incase of duplicates, or re-contracting, delete if exist.
		$sql = $db->prepare("DELETE FROM ContractToOwner WHERE SitterID='".$_COOKIE[userID]."' and PetID=".$_POST['PetID']." and RequestID=".$_POST['RequestID'].";");
		$sql->execute();

		//create contract
		$stmt = $db->prepare("INSERT INTO ContractToOwner VALUES('".$_POST['OwnerID']."',".$_POST['PetID'].",".$_POST['RequestID'].",'".$_COOKIE[userID]."','".$_POST['StartDate']."','".$_POST['EndDate']."',".$_POST['Compensation'].",0);");
		$stmt->execute();

		//check if contract is made successfully
		$sql2 = $db->prepare("SELECT * FROM ContractToOwner WHERE SitterID='".$_COOKIE[userID]."' and PetID=".$_POST['PetID']." and RequestID=".$_POST['RequestID']." and Compensation=".$_POST['Compensation'].";");
		$sql2->execute();
		$row = $sql2->fetch();

		if ($_COOKIE[userID] == $row['SitterID']){
			echo "<script>alert(\"Contract Successfully Sent! You can go to 'My Account' in order to view the contracts.\");
			window.location.href=\"./owner.php\";
			</script>";
		}
		else {
			echo "<script>alert(\"Something went wrong! Make sure to enter Compensation.\");
			window.location.href=\"{$_SERVER['HTTP_REFERER']}\";
			</script>";
		}

	}

//create when owner sends contract to sitter
	elseif ($_POST['Where'] == 'ContractToSitter') {
		//incase of duplicates, or re-contracting, delete if exist.
		$sql = $db->prepare("DELETE FROM ContractToSitter WHERE OwnerID='".$_COOKIE[userID]."' and SitterID='".$_POST['SitterID']."' and AvailabilityID=".$_POST['AvailabilityID'].";");
		$sql->execute();

		//create contract
		$stmt = $db->prepare("INSERT INTO ContractToSitter VALUES('".$_COOKIE[userID]."',".$_POST['AvailabilityID'].",'".$_POST['SitterID']."','".$_POST['StartDate']."','".$_POST['EndDate']."',".$_POST['Compensation'].",0);");
		$stmt->execute();

		//check if contract is made successfully
		$sql2 = $db->prepare("SELECT * FROM ContractToSitter WHERE OwnerID='".$_COOKIE[userID]."' and SitterID='".$_POST['SitterID']."' and AvailabilityID=".$_POST['AvailabilityID'].";");
		$sql2->execute();
		$row = $sql2->fetch();
		
		if ($_COOKIE[userID] == $row['OwnerID']){
			echo "<script>alert(\"Contract Successfully Sent! You can go to 'My Account' in order to view the contracts.\");
			window.location.href=\"./sitter.php\";
			</script>";
		}
		else {
			echo "<script>alert(\"Something went wrong! Make sure to enter Compensation.\");
			window.location.href=\"{$_SERVER['HTTP_REFERER']}\";
			</script>";
		}
	}



?>
