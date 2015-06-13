	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
	    	<a class="navbar-brand" href="../index.php">PetCare</a>
			<?php if(!isset($_COOKIE['userID'])): ?>
				<form class="navbar-form navbar-right" action="login.php" method="post">
	        		<div class="form-group">
	         			<input type="text" class="form-control" name="id" placeholder="id">
	         			<input type="password" class="form-control" name="password" placeholder="password">
	        		</div>
	        		<button type="submit" class="btn btn-warning">Submit</button>
	        		<a href="../register.php">Register</a>
	      		</form>
	      	<?php else : ?>
	      		<ul class="nav navbar-nav navbar-right">
	      			<li><a href="../myaccount.php"><?php echo $_COOKIE['userID'] ?></a></li>
	      			<li><a href="logout.php">Log Out</a></li>
	      	<?php endif; ?>	

      	</div>
	</nav>