<head>
	<link rel="stylesheet" href="../bootstrap.min.css">
	<title>Pet Owners</title>
</head>
<body>
	<?php include './include/header.php'; ?>
	<div style="padding: 80px 0; background-color:60c0dc; !important" class="jumbotron">
  		<div class="container">
  			<h1 style="color:white">Add Pet</h1>
  			<p style="color:white">Please add your infomation</p>
  		</div>
	</div>
	<div class="container">
		<form action="createpet.php" method="post">
			<legend>Enter your pet information here:</legend>
		  	<div class="form-group">
			    <label for="PetID">Pet ID</label>
			    <input type="number" class="form-control" name="PetID" placeholder="Enter Pet ID">
		 	</div>
		  	<div class="form-group">
			    <label for="PetName">Pet Name</label>
			    <input type="text" class="form-control" name="PetName" placeholder="Enter Pet Name">
		  	</div>
		  	<div class="form-group">
			    <label for="Size">Size</label>
			    <input type="text" class="form-control" name="Size" placeholder="Enter Pet Size (small, medium or large)">
		 	</div>
		  	<div class="form-group">
			    <label for="Species">Species</label>
			    <input type="text" class="form-control" name="Species" placeholder="Enter Pet Species">
		 	</div>
		  	<button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>
</body>