<head>
	<link rel="stylesheet" href="../bootstrap.min.css">
	<title>Pet Owners</title>
</head>
<body>
	<?php include './include/header.php'; ?>
	<div style="padding: 80px 0; background-color:951152; !important" class="jumbotron">
  		<div class="container">
  			<h1 style="color:white">Add Pet</h1>
  			<p style="color:white">Please add your infomation</p>
  		</div>
	</div>
	<div class="container">
		<form action="createpet.php" method="post">
			<legend>Enter your pet information here:</legend>
		  	<div class="form-group">
			    <label for="PetName">Pet Name</label>
			    <input type="text" class="form-control" name="PetName" placeholder="Enter Pet Name">
		  	</div>
		  	<div class="form-group">
			    <label for="Size">Select Pet Size</label>
			    <select type="text" class="form-control" name="Size">
			    <option value="small">Small</option>
			    <option value="medium">Medium</option>
			    <option value="large">Large</option>
			    </select>		 	</div>
		  	<div class="form-group">
			    <label for="Species">Select Pet Species</label>
			    <select type="text" class="form-control" name="Species">
			    <option value="cat">Cat</option>
			    <option value="dog">Dog</option>
			    <option value="others">Others</option>
			    </select>
		 	</div>
		  	<button type="submit" class="btn btn-warning">Submit</button>
		</form>
	</div>
</body>