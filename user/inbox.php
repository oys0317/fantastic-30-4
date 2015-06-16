<?php 	
	
	function getSitterAvailability() {
		try{
			$userID = $_COOKIE['userID'];
			$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
			$sql = "SELECT SitterID, StartDate, EndDate, Compensation	
					FROM ContractToSitter c
					WHERE '$userID' = c.SitterID";
			
			// If there are no sitters, display a different message.
			if($db->query($sql) == FALSE) {
				echo "<p align='center' style='font-size:20'>There are no sitters right now.<br>Click the button below to become one!</p>";
				return;
			}

			echo '<table class="table table-striped">';
			echo '<th>';
			echo "Sitter";
			echo '</th>';

			echo '<th>';
			echo "Start Date";
			echo '</th>';

			echo '<th>';
			echo "End Date";
			echo '</th>';

			echo '<th>';
			echo "Compensation";
			echo '</th>';

			foreach($db->query($sql) as $row){
				echo '<tr>';

				echo '<td>';
				echo $row['SitterID'];
				echo '</td>';

				echo '<td>';
				echo $row['StartDate'];
				echo '</td>';

				echo '<td>';
				echo $row['EndDate'];
				echo '</td>';

				echo '<td>';
				echo $row['Compensation'];
				echo '</td>';

				echo '</tr>';
			}
			echo '</table>';
		} catch(Exception $e){
		echo "Could not connect to the database";
		exit;
		}
	}
?>
<head>
	<link rel="stylesheet" href="../bootstrap.min.css">
	<title>Inbox</title>
</head>
<body>
	<?php include '../include/header.php' ?>
	<div style="padding: 80px 0; background-color:5cb85c; !important" class="jumbotron">
  		<div class="container">
  			<h1 style="color:white">Pet Sitters</h1>
  			<p style="color:white">
  					Here you can view your current contracts
  			</p>
  		</div>
	</div>
	<div class="container">
		<?php getSitterAvailability(); ?>
	</div>

</body>
