<head>
	<link rel="stylesheet" href="../bootstrap.min.css">
	<title>PetCare</title>
</head>
<body>
	<?php include './include/header.php'; ?>
	<div style="padding: 80px 0; background-color:60c0dc; !important" class="jumbotron">
  		<div class="container">
  			<h1 style="color:white">REGISTER</h1>
  			<p style="color:white">Cras venenatis ullamcorper diam vel accumsan. Morbi elit ipsum, semper vitae erat at, semper finibus risus. In vitae rhoncus ipsum. Aliquam sit amet finibus massa. Morbi non risus eu nibh ullamcorper hendrerit vel vitae mauris. Suspendisse ut felis placerat ante vehicula euismod. Nunc ornare ipsum urna, eget finibus lacus efficitur id. Vivamus dapibus tempor augue at hendrerit. Integer tincidunt, turpis sit amet interdum pellentesque, eros est mollis libero, tempus ullamcorper dui sem a arcu. Maecenas fermentum pellentesque egestas. Aliquam euismod, lectus non elementum posuere, mi turpis interdum velit, quis bibendum ipsum enim vel lacus.</p>
  		</div>
	</div>
	<div class="container">
		<form>
		  	<div class="form-group">
			    <label for="userid">User ID</label>
			    <input type="text" class="form-control" id="userid" placeholder="Enter user ID">
		 	</div>
		  	<div class="form-group">
			    <label for="password">Password</label>
			    <input type="password" class="form-control" id="password" placeholder="Password">
		  	</div>
		  	<div class="form-group">
			    <label for="username">Name</label>
			    <input type="text" class="form-control" id="username" placeholder="Enter user ID">
		 	</div>
		  	<div class="form-group">
			    <label for="address">Address</label>
			    <input type="text" class="form-control" id="address" placeholder="Enter user ID">
		 	</div>
		  	<div class="form-group">
			    <label for="phone">Phone Number</label>
			    <input type="text" class="form-control" id="phone" placeholder="Enter user ID">
		 	</div>		 		
		  	<button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>
</body>