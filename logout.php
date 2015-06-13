<?php 
	setcookie('userID', null, time()-3600);
	header('Location: ./index.php');
	die();
?>