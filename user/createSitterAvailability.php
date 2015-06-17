<?php
	
	$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");

	// DELETE
	if($_POST["delete"]=="yes") {
		$sql1 = 'DELETE FROM SitterAvailability WHERE AvailabilityID='.$_POST["AvailabilityID"].' and SitterID="'.$_COOKIE["userID"].'";';
		$db->query($sql1);

		//check if deleted
		$sql2 = $db->prepare('SELECT * FROM SitterAvailability WHERE AvailabilityID='.$_POST["AvailabilityID"].' and SitterID="'.$_COOKIE["userID"].'";');
		$sql2->execute();
		$row = $sql2->fetch();

		if (isset($row["AvailabilityID"])) {
			echo "<script>alert(\"Cannot Delete Availability When There is Existing Contract!\");
			window.location.href=\"./sitter.php\";
			</script>";
		} else {
			echo "<script>alert(\"Availability Deleted!\");
			window.location.href=\"./sitter.php\";
			</script>";
		}
	}

	// UPDATE
	elseif(isset($_POST["AvailabilityID"])) {
		//delete
		$sql1 = 'DELETE FROM SitterAvailability WHERE AvailabilityID='.$_POST["AvailabilityID"].' and SitterID="'.$_COOKIE["userID"].'";';
		$db->query($sql1);

		//create
		$stmt = $db->prepare("INSERT INTO SitterAvailability (SitterID,AvailabilityID,StartDate,EndDate) VALUES(:SitterID,:AvailabilityID,:StartDate,:EndDate);");
		$stmt->bindParam(':SitterID', $_COOKIE['userID']);
		$stmt->bindParam(':AvailabilityID', $_POST["AvailabilityID"]);
		$stmt->bindParam(':StartDate', $_POST['StartDate']);
		$stmt->bindParam(':EndDate', $_POST['EndDate']);
		$stmt->execute();

		$stmt = $db->prepare("INSERT INTO CanTakeCareOf (Size,Species,SitterID,AvailabilityID) VALUES(:Size,:Species,:SitterID,:AvailabilityID);");
		$stmt->bindParam(':Size', $_POST['petSize']);
		$stmt->bindParam(':Species', $_POST['petSpecies']);
		$stmt->bindParam(':SitterID', $_COOKIE['userID']);
		$stmt->bindParam(':AvailabilityID', $_POST["AvailabilityID"]);
		$stmt->execute();

		$sql2 = $db->prepare('SELECT * FROM SitterAvailability WHERE AvailabilityID='.$_POST["AvailabilityID"].' and SitterID="'.$_COOKIE["userID"].'";');
		$sql2->execute();
		$row = $sql2->fetch();
	
		if (($row["AvailabilityID"]==$_POST["AvailabilityID"]) && ($row["SitterID"]==$_COOKIE["userID"])) {
			echo "<script>alert(\"Availability Request Updated!\");
			window.location.href=\"./sitter.php\";
			</script>";
		} else {
			echo "<script>alert(\"Cannot Update Availability Request When There is Existing Contract!\");
			window.location.href=\"./sitter.php\";
			</script>";
		}

	}

	// CREATE NEW
	else {		
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

		echo "<script>alert(\"Availability Created!\");
				window.location.href=\"./sitter.php\";
				</script>";
	}
	

?>

