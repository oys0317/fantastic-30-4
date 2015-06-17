<?php
	

	
	$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");



	// delete requsted
	if ($_POST["delete"]=="yes") {
		$sql1 = 'DELETE FROM AccommodationRequest WHERE RequestID='.$_POST["RequestID"].' and PetID='.$_POST["PetID"].';';
		$db->query($sql1);
		$RequestID = $_POST["RequestID"];

		//check if deleted
		$sql2 = $db->prepare('SELECT * FROM AccommodationRequest WHERE RequestID='.$_POST["RequestID"].' and PetID='.$_POST["PetID"].';');
		$sql2->execute();
		$row = $sql2->fetch();

		if (isset($row["RequestID"])) {
			echo "<script>alert(\"You can't delete request if a contract exists.\");
			window.location.href=\"./owner.php\";
			</script>";
		} else {
			echo "<script>alert(\"Accommodation Request Deleted!\");
			window.location.href=\"./owner.php\";
			</script>";
		}
	}

	// if updating then delete original first then add.
	elseif (isset($_POST["RequestID"])) {
		$sql1 = 'DELETE FROM AccommodationRequest WHERE RequestID='.$_POST["RequestID"].' and PetID='.$_POST["PrevPetID"].';';
		$db->query($sql1);
		$RequestID = $_POST["RequestID"];

		//create new
		$stmt = $db->prepare("INSERT INTO AccommodationRequest (OwnerID,PetID,RequestID,WithinDistance,StartDate,EndDate) VALUES(:OwnerID,:PetID,:RequestID,:WithinDistance,:StartDate,:EndDate);");
		$stmt->bindParam(':OwnerID', $_COOKIE['userID']);
		$stmt->bindParam(':PetID', $_POST['PetID']);
		$stmt->bindParam(':RequestID', $RequestID);
		$stmt->bindParam(':WithinDistance', $_POST['WithinDistance']);
		$stmt->bindParam(':StartDate', $_POST['StartDate']);
		$stmt->bindParam(':EndDate', $_POST['EndDate']);
		$stmt->execute();

		//check if updated
		$sql2 = $db->prepare('SELECT * FROM AccommodationRequest WHERE RequestID='.$_POST["RequestID"].' and PetID='.$_POST["PetID"].';');
		$sql2->execute();
		$row = $sql2->fetch();

		if (($row["PetID"]==$_POST["PetID"]) && ($row["PetID"]!= NULL)) {
			if ($_POST['From'] == "owner"){
				echo "<script>alert(\"Accommodation Request Updated!\");
				window.location.href=\"./owner.php\";  
				</script>"; // go to owner
			}
			else{
				echo "<script>alert(\"Accommodation Request Updated!\");
				window.location.href=\"../myaccount.php\";  
				</script>"; // go to my account
			}
		} else {
			echo "<script>alert(\"Cannot Update Accommodation Request.\");
			window.location.href=\"./owner.php\";
			</script>";
		}
		

	}
	else {
		$sql2 = 'INSERT INTO petOwner VALUES("'.$_COOKIE['userID'].'")';
		$db->query($sql2);


		$sql = 'SELECT MAX(RequestID)
				FROM AccommodationRequest
				WHERE OwnerID ="'.$_COOKIE['userID'].'"';
		$RequestID = 0;
		foreach($db->query($sql) as $row){
			$RequestID = $row['MAX(RequestID)'];
		}
		$RequestID += 1;

		//create new
	
		$stmt = $db->prepare("INSERT INTO AccommodationRequest (OwnerID,PetID,RequestID,WithinDistance,StartDate,EndDate) VALUES(:OwnerID,:PetID,:RequestID,:WithinDistance,:StartDate,:EndDate);");
		$stmt->bindParam(':OwnerID', $_COOKIE['userID']);
		$stmt->bindParam(':PetID', $_POST['PetID']);
		$stmt->bindParam(':RequestID', $RequestID);
		$stmt->bindParam(':WithinDistance', $_POST['WithinDistance']);
		$stmt->bindParam(':StartDate', $_POST['StartDate']);
		$stmt->bindParam(':EndDate', $_POST['EndDate']);
		$stmt->execute();

		//check if updated
		$sql2 = $db->prepare('SELECT * FROM AccommodationRequest WHERE RequestID='.$RequestID.' and PetID='.$_POST["PetID"].';');
		$sql2->execute();
		$row = $sql2->fetch();

		if (($row["PetID"]==$_POST["PetID"]) && ($row["PetID"]!= NULL)) {
			if ($_POST['From'] == "owner"){
				echo "<script>alert(\"Accommodation Request Updated!\");
				window.location.href=\"./owner.php\";  
				</script>"; // go to owner
			}
			else{
				echo "<script>alert(\"Accommodation Request Updated!\");
				window.location.href=\"../myaccount.php\";  
				</script>"; // go to my account
			}
		} else {
			echo "<script>alert(\"Failed to create new request. Please make sure to fill in all information!\");
			window.location.href=\"{$_SERVER['HTTP_REFERER']}\";
			</script>";
		}

	}
	

?>

