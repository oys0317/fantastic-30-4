<?php
	//create new user
	$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
	$stmt = $db->prepare("INSERT INTO User (UserID,Password,Name,Address,PhoneNum) VALUES(:UserID,:Password,:Name,:Address,:PhoneNum);");
	$stmt->bindParam(':UserID', $_POST['userid']);
	$stmt->bindParam(':Password', $_POST['password']);
	$stmt->bindParam(':Name', $_POST['username']);
	$stmt->bindParam(':Address', $_POST['address']);
	$stmt->bindParam(':PhoneNum', $_POST['phone']);
	$stmt->execute();


	//check if the new user is successfully created
	$stmt = $db->prepare("select Password from User where UserID=:UserID");
	$stmt->execute(array(':UserID' => $_POST["userid"]));
	$row = $stmt->fetch();

	//if successfully created, then login
	if ($_POST["password"] == $row[0]) {
		setcookie('userID', $_POST["userid"], time() + 3600);
		header('Location: ./index.php');
		die();
	}
	//if not created, don't login. go back to register page.
	//TODO: make alert that something is wrong. none of them can be null
	else {
		header('Location: ./register.php');
		die();
	}
	
?>

