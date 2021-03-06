<?php

	if ($_POST['PetName'] != ""){

		//create new pet
		$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");

		$sql = 'INSERT INTO PetOwner
				VALUES("'.$_COOKIE['userID'].'")
				';
		$db->query($sql);

		$sql = 'SELECT MAX(PetID)
				FROM OwnsPet
				WHERE OwnerID ="'.$_COOKIE['userID'].'"';
		$PetID = 0;
		foreach($db->query($sql) as $row){
			$PetID = $row['MAX(PetID)'];
		}

		$PetID += 1;


		$stmt = $db->prepare("INSERT INTO OwnsPet (OwnerID,PetID,PetName,Size,Species) 
							  VALUES(:OwnerID,:PetID,:PetName,:Size,:Species);");
		$stmt->bindParam(':OwnerID', $_COOKIE['userID']);
		$stmt->bindParam(':PetID', $PetID);
		$stmt->bindParam(':PetName', $_POST['PetName']);
		$stmt->bindParam(':Size', $_POST['Size']);

		$petSpecies = $_POST['Species'];
		if($petSpecies == "Other") {
			$petSpecies = $_POST['OtherSpecies'];
		}
		$stmt->bindParam(':Species', $petSpecies);
		$stmt->execute();
	
		header('Location: ./myaccount.php');
		/*
		//check if the new pet is successfully created
		$stmt = $db->prepare("select PetID from ownspet where PetID=:PetID");
		$stmt->bindParam(':PetID', $PetID);
		$stmt->execute();
		$PetID = $stmt->fetch();

		//if successfully created, then go back
		if ($_POST['petID'] == $PetID) {
			echo "<script>alert(\"Pet Successfully Added!\");
			window.location.href=\"./myaccount.php\";
			</script>";
		}
		//when not created
		else {
			echo "<script>alert(\"Uhoh Something went wrong. Try Again!\");
			window.location.href=\"./newpet.php\";
			</script>";
		}*/
	}

	//when pet name is not entered	
	else {
		echo "<script>alert(\"You must enter a name for your pet!\");
		window.location.href=\"./newpet.php\";
		</script>";
	}

?>
