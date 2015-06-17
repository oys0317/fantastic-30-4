<head>
	<link rel="stylesheet" href="../bootstrap.min.css">
	<title>Add Accomodation Request</title>
</head>
<body>
	<?php include '../include/header.php'; ?>
	<div style="padding: 80px 0; background-color:5cb85c; !important" class="jumbotron">
  		<div class="container">
  			<h1 style="color:white">Add an Availability</h1>
  			<p style="color:white">To add an availability, please enter a date range and the type of pet you'd like to look after.</p>
  		</div>
	</div>
	<div class="container">
		<form action="createSitterAvailability.php" method="post">
		  	<div class="form-group">
			    <label for="petSpecies">Select Pet Species You Prefer</label>
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
		  	<button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>
</body>