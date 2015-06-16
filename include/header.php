	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
	    	<a class="navbar-brand" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/index.php">Pet Care</a>
			<?php if(!isset($_COOKIE['userID'])): ?>
				<form class="navbar-form navbar-right" action= "<?php $_SERVER['DOCUMENT_ROOT'] ?>/login.php" method="post">
	        		<div class="form-group">
	         			<input type="text" class="form-control" name="id" placeholder="username">
	         			<input type="password" class="form-control" name="password" placeholder="password">
	        		</div>
	        		<button type="submit" class="btn btn-warning">Submit</button>
	        		<a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/register.php">Register</a>	
	      		</form>
	      	<?php else : ?>
	      		<ul class="nav navbar-nav navbar-right">
	      			<li><a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/myaccount.php"><?php echo $_COOKIE['userID'] ?></a></li>
	      			<li><a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/logout.php">Log Out</a></li>
	      	<?php endif; ?>	

      	</div>
	</nav>