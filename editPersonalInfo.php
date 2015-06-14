<?php
	function displayInfoForm() {
		try {
			$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
			$userID = $_COOKIE['userID'];

			$userSQL = "SELECT UserID, Name, Address, PhoneNum, password
						FROM User
						WHERE UserID = '$userID'";

			if(!$userSQL) {
				echo "An error has happened!";
			}

			// Only 1 iteration should happen
			foreach($db->query($userSQL) as $row) {
				
				// Most info here
				echo "<form action='savePersonalInfo.php' method='post'>";
				echo "<table id='editPersonalInfo'><caption>Change Information</caption><tr><th>Username</th><td>";
				echo $row['UserID'];
				echo "</td></tr><tr><th>Name</th><td>";
				echo "<input type='text' class='form-control' name='editName' placeholder='";
				echo $row['Name'];
				echo "'></td></tr><tr><th>Address</th><td>";
				echo "<input type='text' class='form-control' name='editAddress' placeholder='";
				echo $row['Address'];
				echo "'></td></tr><tr><th>Phone Number</th><td>";
				echo "<input type='text' class='form-control' name='editPhoneNum' placeholder='";
				echo $row['PhoneNum'];
				echo "'></td></tr></table>";
				echo "<input type='submit' class='btn btn-default' value='Save Changes'>";
				echo "</form>";

			}
		}
		catch(Exception $e) {
			echo "Could not connect to the database to display account info";
			exit;
		}
	}
?>

<head>

<link rel="stylesheet" href="bootstrap.min.css">
<style type="text/css">

#personalInfo td,th {
	padding-right: 20px;
	padding-top: 8px;
	margin-left: 0px;
}
#submitInfoDiv {
	
}

#personalInfoDiv {
	
}

</style>
<title>Edit Information</title>

</head>


<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
	    	<a class="navbar-brand" href="index.php">PETCARE</a>
			<form class="navbar-form navbar-right">
        		<div class="form-group">
         			<input type="text" class="form-control" placeholder="id">
         			<input type="text" class="form-control" placeholder="password">
        		</div>
        		<button type="submit" class="btn btn-default">Login</button>
      		</form>
      	</div>
	</nav>
	<div style="padding: 25px 0; background-color:a5d1ff; !important" class="jumbotron">
  		<h1 style="color:white">My Account</h1>
	</div>
	<div class="container">
	<div id="personalInfoDiv" style="height:110px">
		<?php
			displayInfoForm();
		?>
		<form action='saveNewPassword.php' method='post'>
			<table id='changePassword'>
				<caption>Change Password</caption>
				<tr>
					<th>Enter your current password</th>
					<td><input type='password' class='form-control' name='currentPasswordBox'></td>
				</tr>
				<tr>
					<th>Enter your new password</th>
					<td><input type='password' class='form-control' name='newPasswordBox'></td>
				</tr>
				<tr>
					<th>Re-enter your new password</th>
					<td><input type='password' class='form-control' name='otherNewPasswordBox'></td>
				</tr>
			</table>
			<button type="submit" class="btn btn-default">Save Password</button>
		</form>
		<a href="../myaccount.php">Back to account</button>
	</div>
</body>
