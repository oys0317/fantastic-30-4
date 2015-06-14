<head>
	<link rel="stylesheet" href="../bootstrap.min.css">
	<title>Add Your Availability</title>
</head>
<body>
	<?php $db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root"); ?>
	<?php include '../include/header.php'; ?>
	<div style="padding: 80px 0; background-color:337ab7; !important" class="jumbotron">
  		<div class="container">
  			<h1 style="color:white">Add Accomodation Request</h1>
  			<p style="color:white">Please add your infomation</p>
  		</div>
	</div>
	<div class="container">
		<form action="createAccomodationRequest.php" method="post">
		  	<div class="form-group">
			    <label for="SelectYourPet">Select Your Pet</label>
			    <div>
			    <?php
			    	$stmt = $db->prepare('SELECT count(PetID) FROM OwnsPet WHERE OwnerID=:OwnerID');
			    	$stmt->execute(array(':OwnerID' => $_COOKIE['userID']));
			    	$row = $stmt->fetch();
			    	if ($row[0] == 0){
			    		echo '<a href="../newpet.php" class="btn btn-primary" role="button">Add Pet</a>';
			    	} else {
				   		echo '<select type="number" class="form-control" name="PetID">';
				    	try{
							
							$sql = 'SELECT PetID, PetName 
							FROM OwnsPet
							WHERE OwnerID = "'.$_COOKIE['userID'].'"';
							foreach($db->query($sql) as $row){
								echo"<option value=";
								echo $row["PetID"];
								echo ">";
								echo $row["PetName"];
								echo "</option>";
							}
						} catch(Exception $e){
						echo "Could not connect to the database";
						exit;
						}
				    	echo '</select>';
					}

				?>
				</div>
		 	</div>
		  	<div class="form-group">
			    <label for="WithInDistance">With In Distance</label>
			    <input type="text" class="form-control" name="WithInDistance" placeholder="Enter Distance that you can bring your pet in km">
		  	</div>
		  	<div class="form-group">
			    <label for="StartDate">Start Date</label>
			    <input type="date" class="form-control" name="StartDate">
		 	</div>
		  	<div class="form-group">
			    <label for="EndDate">End Date</label>
			    <input type="date" class="form-control" name="EndDate">
		 	</div>
		  	<button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>
</body>