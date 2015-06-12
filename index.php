<?php
	//include 'database.php';
	//TODO: check if id and password is correct. $_POST["id"]
	if (($_POST["id"] == TRUE) && ($_POST["password"] == TRUE)) {
		$cookie_id = $_POST["id"];
		setcookie($cookie_id);
		unset($_POST["id"]);
		unset($_POST["password"]);
	}
?>

<head>
	<link rel="stylesheet" href="bootstrap.min.css">
	<title>PetCare</title>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
	    	<a class="navbar-brand" href="#">Fantastic304</a>
			<?php if(!isset($_COOKIE[$cookie_id])) : ?>
				<form class="navbar-form navbar-right" action="index.php" method="post">
	        		<div class="form-group">
	         			<input type="text" class="form-control" name="id"placeholder="id">
	         			<input type="text" class="form-control" name="password"placeholder="password">
	        		</div>
	        		<button type="submit" class="btn btn-default">Submit</button>
	      		</form>
	      	<?php else : ?>
	      		<ul class="nav navbar-nav navbar-right">
        			<li><a href="#"><?php echo $_COOKIE[$cookie_id] ?></a></li>
        			<li><a href="#">Logout</a></li>
			<?php endif; ?>
      	</div>
	</nav>
	<div class="jumbotron" style="padding: 80px 0">
  		<div class="container">
  			<h1>PETCARE</h1>
  			<p>Cras venenatis ullamcorper diam vel accumsan. Morbi elit ipsum, semper vitae erat at, semper finibus risus. In vitae rhoncus ipsum. Aliquam sit amet finibus massa. Morbi non risus eu nibh ullamcorper hendrerit vel vitae mauris. Suspendisse ut felis placerat ante vehicula euismod. Nunc ornare ipsum urna, eget finibus lacus efficitur id. Vivamus dapibus tempor augue at hendrerit. Integer tincidunt, turpis sit amet interdum pellentesque, eros est mollis libero, tempus ullamcorper dui sem a arcu. Maecenas fermentum pellentesque egestas. Aliquam euismod, lectus non elementum posuere, mi turpis interdum velit, quis bibendum ipsum enim vel lacus.</p>
  			<div class="btn-group" role="group">
 				<a href="sitter.php" class="btn btn-success btn-lg">Pet Sitters</a>
 				<a href="owner.php" class="btn btn-primary btn-lg">Pet Owners</a>
			</div>
  		</div>
	</div>
</body>