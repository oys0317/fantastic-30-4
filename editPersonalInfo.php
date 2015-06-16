<?php
	session_start();
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
				echo "<table id='editPersonalInfo' class='table'><h2>Change Information</h2><tr><th>Username</th><td>";
				echo $row['UserID'];
				echo "</td></tr><tr><th style='width:30%'>Name</th><td>";
				echo "<input type='text' class='form-control' name='editName' placeholder='";
				echo $row['Name'];
				echo "'></td></tr><tr><th>Address</th><td>";
				echo "<input type='text' class='form-control' name='editAddress' placeholder='";
				echo $row['Address'];
				echo "'></td></tr><tr><th>Phone Number</th><td>";
				echo "<input type='text' class='form-control' name='editPhoneNum' placeholder='";
				echo $row['PhoneNum'];
				echo "'></td></tr></table>";
				echo "<input type='submit' class='btn btn-warning' value='Save Changes'>";
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
	
	input[type=text], input[type=password] {
		width:	300px;
	}

	.errormsg {
		color: #ee3030;
		font-size: 16;
	}

	</style>
	<title>PetCare</title>
</head>


<body>
	<?php include './include/header.php'; ?>
	<div style="padding: 80px 0; background-color:951152; !important" class="jumbotron">
  		<div class="container">
  			<h1 style="color:white">Edit My Account</h1>
  		</div>
	</div>
	<div class="container">
		<?php
			displayInfoForm();
		?>
	</div>
	<div class="container" style="margin-top:40px">
		<form action='saveNewPassword.php' method='post'>
			<table id='changePassword' class="table">
				<h2>Change Password</h2>
				<tr>
					<th style='width:30%'>Enter your current password</th>
					<td style=''><input type='password' class='form-control' name='currentPasswordBox'></td>
					<td>
						<?php
							if($_SESSION['editPwdWrongPwd']) {
								echo "<p class='errormsg'>You entered the wrong password.</p>";
							}
						?>
					</td>
				</tr>
				<tr>
					<th>Enter your new password</th>
					<td><input type='password' class='form-control' name='newPasswordBox'></td>
					<td>
						<?php
							if($_SESSION['editPwdNoMatch']) {
								echo "<p class='errormsg'>The passwords you entered don't match!</p>";
							}
						?>
					</td>
				</tr>
				<tr>
					<th>Re-enter your new password</th>
					<td><input type='password' class='form-control' name='otherNewPasswordBox'></td>
					<td>&nbsp;</td>
				</tr>
			</table>
			<button type="submit" class="btn btn-warning">Save Password</button>
		</form>
		<a href="../myaccount.php">Back to account</button>
	</div>
</body>
