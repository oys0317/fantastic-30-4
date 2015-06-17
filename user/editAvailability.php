<?php 
	$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
	$sql = $db->prepare("SELECT Species, Size, StartDate, EndDate, s.SitterID as SitterID, s.AvailabilityID as AvailabilityID 
		FROM SitterAvailability s, CanTakeCareOf c 
		WHERE s.AvailabilityID = c.AvailabilityID and s.SitterID = c.SitterID and s.AvailabilityID = ".$_GET['AvailabilityID']." and s.SitterID = '".$_COOKIE['userID']."';");
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
				<?php if($row['Species']=="cat"): ?>
			    	<option value="cat" selected="selected">Cat</option>
			    	<option value="dog">Dog</option>
			    	<option value="others">Others</option>
				<?php elseif($row['Species']=="dog"): ?>
			    	<option value="cat">Cat</option>
			   		<option value="dog" selected="selected">Dog</option>
			   		<option value="others">Others</option>
			    <?php else: ?>
			   		<option value="cat">Cat</option>
			   		<option value="dog">Dog</option>
			   		<option value="others" selected="selected">Others</option>
			    <?php endif; ?>
			    </select>
		 	</div>
		  	<div class="form-group">
			    <label for="petSize">Select Pet Size You Prefer</label>
			    <select type="text" class="form-control" name="petSize">
			    <?php if($row['Size']=="small"): ?>
			    	<option value="small" selected="selected">Small</option>
			    	<option value="medium">Medium</option>
			    	<option value="large">Large</option>
				<?php elseif($row['Size']=="medium"): ?>
			    	<option value="small">Small</option>
			   		<option value="medium" selected="selected">Medium</option>
			   		<option value="large">Large</option>
			    <?php else: ?>
			   		<option value="small">Small</option>
			   		<option value="medium">Medium</option>
			   		<option value="large" selected="selected">Large</option>
			    <?php endif; ?>	    
			    </select>
		 	</div>
		  	<div class="form-group">
			    <label for="StartDate">Start Date</label>
			    <input type="date" class="form-control" name="StartDate" value="<?= $row["StartDate"]?>">
		 	</div>
		  	<div class="form-group">
			    <label for="EndDate">End Date</label>
			    <input type="date" class="form-control" name="EndDate" value="<?= $row["EndDate"]?>">
			    <input type="hidden" name="AvailabilityID" value="<?= $row['AvailabilityID']?>">
		 	</div>	 		
		  	<button type="submit" class="btn btn-warning">Submit</button>
		</form>
		<!--Delete Form-->
		<form action="createSitterAvailability.php" method="post" onsubmit="return confirm('Are you sure you want to delete this Availability?')">
			<input type="hidden" name="delete" value="yes">
			<input type="hidden" name="AvailabilityID" value="<?= $_GET['AvailabilityID'] ?>">
			<button type="submit" class="btn btn-danger">Delete Availability</button>
		</form>
	</div>
</body>
