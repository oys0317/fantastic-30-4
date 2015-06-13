<?php
	//$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
	$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root","root"); //for jenny
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

