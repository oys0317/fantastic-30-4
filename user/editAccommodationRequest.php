<?php 
	$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
	$sql = $db->prepare('SELECT * FROM AccommodationRequest WHERE RequestID = '.$_GET["RequestID"].' and PetID = '.$_GET["PetID"].';');
	$sql->execute();
	$row = $sql->fetch();
?>


<head>
	<link rel="stylesheet" href="../bootstrap.min.css">
	<title>PetCare</title>
</head>
<body>
	<?php include '../include/header.php' ?>
	<div style="padding: 80px 0; background-color:337ab7; !important" class="jumbotron">
  		<div class="container">
  			<h1 style="color:white">Edit Accommodation Request</h1>
  		</div>
	</div>
	<div class="container">
		<form action="createAccomodationRequest.php" method="post">
		  	<div class="form-group">
			    <label for="SelectYourPet">Your Pet</label>
			    <select type="number" class="form-control" name="PetID">
			    <?php
			    	try{
						$sql = 'SELECT PetID, PetName FROM OwnsPet WHERE OwnerID = "'.$_COOKIE['userID'].'"';
						foreach($db->query($sql) as $row2){
							if($row2["PetID"]==$_GET["PetID"]){
								echo"<option value=".$row2["PetID"]." selected='selected'>".$row2["PetName"]."</option>";
							} else{
								echo"<option value=".$row2["PetID"].">".$row2["PetName"]."</option>";
							}
						}
					} catch(Exception $e){
					echo "Could not connect to the database";
					exit;
					} 
				?>
			    </select>
		 	</div>
		  	<div class="form-group">
			    <label for="WithinDistance">Within Distance</label>
			    <input type="text" class="form-control" name="WithinDistance" value= "<?= $row["WithinDistance"] ?>" >
		  	</div>
		  	<div class="form-group">
			    <label for="StartDate">Start Date</label>
			    <input type="date" class="form-control" name="StartDate" value="<?= $row["StartDate"] ?>">
		 	</div>
		  	<div class="form-group">
			    <label for="EndDate">End Date</label>
			    <input type="date" class="form-control" name="EndDate" value="<?= $row["EndDate"] ?>">
			    <input type="hidden" name="RequestID" value="<?= $_GET['RequestID'] ?>">
			    <input type="hidden" name="PrevPetID" value="<?= $_GET['PetID'] ?>">
			    <input type="hidden" name="From" value="<?= $_GET['From'] ?>">
		 	</div>
		  	<button type="submit" class="btn btn-warning">Submit</button>
		</form>
		<form action="createAccomodationRequest.php" method="post" onsubmit="return confirm('Are you sure you want to delete this request?')">
			<input type="hidden" name="delete" value="yes">
			<input type="hidden" name="RequestID" value="<?= $_GET['RequestID'] ?>">
			<input type="hidden" name="PetID" value="<?= $_GET['PetID'] ?>">
			<button type="submit" class="btn btn-danger">Delete Accommodation Request</button>
		</form>
	</div>
</body>
