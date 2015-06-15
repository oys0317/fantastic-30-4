<?php 
	setcookie('userID', null, time()-7200);
	header('Location: ./index.php');
	die();
?>