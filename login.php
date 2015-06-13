id: <?php echo $_POST["id"]; ?><br>
password: <?php echo $_POST["password"]; ?>

TODO: check if they match...


<?php
	$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
	//$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root","root");

	
?>
