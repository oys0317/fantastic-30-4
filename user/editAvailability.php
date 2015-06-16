<?php 
	$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
	$sql = $db->prepare('SELECT * FROM SitterAvailability WHERE AvailabilityID = '.$_GET[AvailabilityID].' and SitterID = '.$_COOKIE['userID'].';');
	$sql->execute();
	$row = $sql->fetch();
?>


<head>
	<link rel="stylesheet" href="../bootstrap.min.css">
	<title>PetCare</title>
</head>
<body>
	<?php include '../include/header.php' ?>
	<div style="padding: 80px 0; background-color:5cb85c; !important" class="jumbotron">
  		<div class="container">
  			<h1 style="color:white">Edit Sitter Availability</h1>
  		</div>
	</div>
	<div class="container">
		<form action="createSitterAvailability.php" method="post">
		  	<div class="form-group">
			    <label for="petSpecies">Pet Species You Can Take Care Of</label>
			    <select type="text" class="form-control" name="petSpecies">
			    
			    <option value="cat">Cat</option>
			    <option value="dog">Dog</option>
			    <option value="others">Others</option>
			    
			    </select>
		 	</div>
		  	<div class="form-group">
			    <label for="petSize">Select Pet Size You Prefer</label>
			    <select type="text" class="form-control" name="petSize">
			    <option value="small">Small</option>
			    <option value="medium">Medium</option>
			    <option value="large">Large</option>
			    </select>
		 	</div>
		  	<div class="form-group">
			    <label for="StartDate">Start Date</label>
			    <input type="date" class="form-control" name="StartDate">
		 	</div>
		  	<div class="form-group">
			    <label for="EndDate">End Date</label>
			    <input type="date" class="form-control" name="EndDate">
		 	</div>	 		
		  	<button type="submit" class="btn btn-warning">Submit</button>
		</form>
	
		<form action="createAccomodationRequest.php" method="post">
			<input type="hidden" name="delete" value="yes">
			<input type="hidden" name="RequestID" value="<?= $_GET[RequestID] ?>">
			<input type="hidden" name="PetID" value="<?= $_GET[PetID] ?>">
			<button type="submit" onclick="myFunction()" class="btn btn-danger">Delete Accommodation Request</button>
			<script>
			function myFunction() {
			    var r = confirm("Are you sure you want to delete this request?");
			}
			</script>
		</form>
	</div>
</body>
