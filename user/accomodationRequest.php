<head>
	<link rel="stylesheet" href="../bootstrap.min.css">
	<title>Pet Owners</title>
</head>
<body>
	<?php include '../include/header.php'; ?>
	<div style="padding: 80px 0; background-color:60c0dc; !important" class="jumbotron">
  		<div class="container">
  			<h1 style="color:white">Add Accomodation Request</h1>
  			<p style="color:white">Please add your infomation</p>
  		</div>
	</div>
	<div class="container">
		<form action="createAccomodationRequest.php" method="post">
		  	<div class="form-group">
			    <label for="SelectYourPet">Select Your Pet</label>
			    <select type="number" class="form-control" id="PetID">
			    <?php
			    	try{
						$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
						$sql = 'SELECT PetID, PetName 
						FROM OwnsPet
						WHERE OwnerID = "jennysong"';
						foreach($db->query($sql) as $row){
							echo'<option value=';
							echo $row['PetID'];
							echo '>';
							echo $row['PetName'];
							echo '</option>';
						}
					} catch(Exception $e){
					echo "Could not connect to the database";
					exit;
					}
			    ?>
			    </select>
		 	</div>
		  	<div class="form-group">
			    <label for="PetName">Pet Name</label>
			    <input type="text" class="form-control" id="PetName" placeholder="Enter Pet Name">
		  	</div>
		  	<div class="form-group">
			    <label for="Size">Size</label>
			    <input type="text" class="form-control" id="Size" placeholder="Enter Pet Size (small, medium or large)">
		 	</div>
		  	<div class="form-group">
			    <label for="Species">Species</label>
			    <input type="text" class="form-control" id="Species" placeholder="Enter Pet Species">
		 	</div>
		  	<button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>
</body>