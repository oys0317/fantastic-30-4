<?php
	$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
<<<<<<< HEAD
	//$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root","root"); //for jenny
=======
>>>>>>> 0d3042896f7b634f81b8c499d37fbad234406e22
	$stmt = $db->prepare("select Password from User where UserID=:UserID");
	$stmt->execute(array(':UserID' => $_POST["id"]));
	$row = $stmt->fetch();


	if ($_POST["password"] == $row[0]) {
		setcookie('userID', $_POST["id"], time() + 3600);
		header('Location: ./index.php');
		die();
	}
	else {
		header('Location: ./index.php');
		die();
	}

?>
