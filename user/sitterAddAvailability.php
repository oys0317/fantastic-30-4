<head>
	<link rel="stylesheet" href="../bootstrap.min.css">
	<title>PetCare</title>
</head>
<body>
	<?php include '../include/header.php'; ?>
	<div style="padding: 80px 0; background-color:5cb85c; !important" class="jumbotron">
  		<div class="container">
  			<h1 style="color:white">Add Your Availability</h1>
  			<p style="color:white">Cras venenatis ullamcorper diam vel accumsan. Morbi elit ipsum, semper vitae erat at, semper finibus risus. In vitae rhoncus ipsum. Aliquam sit amet finibus massa. Morbi non risus eu nibh ullamcorper hendrerit vel vitae mauris. Suspendisse ut felis placerat ante vehicula euismod. Nunc ornare ipsum urna, eget finibus lacus efficitur id. Vivamus dapibus tempor augue at hendrerit. Integer tincidunt, turpis sit amet interdum pellentesque, eros est mollis libero, tempus ullamcorper dui sem a arcu. Maecenas fermentum pellentesque egestas. Aliquam euismod, lectus non elementum posuere, mi turpis interdum velit, quis bibendum ipsum enim vel lacus.</p>
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