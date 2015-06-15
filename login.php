<?php
	//get password of the user
	$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");

	$stmt = $db->prepare("select Password from User where UserID=:UserID");
	$stmt->execute(array(':UserID' => $_POST["id"]));
	$row = $stmt->fetch();

	//if the password and userid match, login
	if ($_POST["password"] == $row[0] && $_POST["password"] != null) {
		setcookie('userID', $_POST["id"], time() + 7200);
		echo "<script>alert(\"Successfully logged in!\");
		window.location.href=\"{$_SERVER['HTTP_REFERER']}\";
		</script>";
	}
	//if not matching, return to index page.
	else {
		echo "<script>alert(\"Username or Password was wrong!\");
		window.location.href=\"{$_SERVER['HTTP_REFERER']}\";
		</script>";
	}

?>
