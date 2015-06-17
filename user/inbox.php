<?php 	
	function CreateSitteeContractTable() {
		try{
			$userID = $_COOKIE['userID'];
			$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
			$sql = "SELECT SitterID, AvailabilityID, StartDate, EndDate, Compensation	
					FROM contracttositter c
					WHERE '$userID' = c.OwnerID and c.Status = 0";
			$row = $db->query($sql);
			
			// If there are no sitters, display a different message.
			if($row->rowCount() < 1) {
				echo "<p align='center' style='font-size:20'>You have no contracts in this category</p>";
				return;
			}

			echo '<table class="table table-striped">';
			echo '<th>';
			echo "SitterID";
			echo '</th>';

			echo '<th>';
			echo "Contract ID";
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

			// echo '<th>';
			// echo "Delete";
			// echo '</th>';
			

			foreach($db->query($sql) as $row){
				echo '<tr>';

				echo '<td>';
				echo $row['SitterID'];
				echo '</td>';

				echo '<td>';
				echo $row['AvailabilityID'];
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

				// echo "<td><form action='../removeContractSitter.php' method='post'><input type='image' name='AvailabilityID' alt='Remove pet' src='./remove.png' width='18px' type='submit' value='";
				// echo $row['AvailabilityID'];
				// echo "'/></form></td></tr>";
			

				echo '</tr>';
			}
			echo '</table>';
		} catch(Exception $e){
		echo "Could not connect to the database";
		exit;
		}
	}
	function CreateSitterContractTable() {
		try{
			$userID = $_COOKIE['userID'];
			$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
			$sql = "SELECT OwnerID, RequestID, StartDate, EndDate, Compensation	
					FROM contracttoowner c
					WHERE '$userID' = c.SitterID and c.Status = 0";
			$row = $db->query($sql);
			
			// If there are no sitters, display a different message.
			if($row->rowCount() < 1) {
				echo "<br></br>";
				echo "<p align='center' style='font-size:20'>You have no pending contracts";
				return;
			}

			echo '<table class="table table-striped">';
			echo '<th>';
			echo "OwnerID";
			echo '</th>';

			echo '<th>';
			echo "Contract ID";
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
			
			// 	echo '<th>';
			// 	echo "Delete";
			// 	echo '</th>';
		

			foreach($db->query($sql) as $row){
				echo '<tr>';

				echo '<td>';
				echo $row['OwnerID'];
				echo '</td>';

				echo '<td>';
				echo $row['RequestID'];
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
				
				// echo "<td><form action='../removeContractSitter.php' method='post'><input type='image' name='petid' alt='Remove pet' src='./remove.png' width='18px' type='submit' value='";
				// echo $row['AvailabilityID'];
				// echo "'/></form></td></tr>";

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
  			<h1 style="color:white">Inbox</h1>
  			<p style="color:white">
  					Here you can view offered contracts.
  			</p>
  		</div>
	</div>
	<div class="container">
		<font size="4"face="verdana" color="blue">Contracts offered to you. Here you can choose to accept or decline.</font>
		<?php CreateSitterContractTable();?>
		<?php CreateSitteeContractTable();?>
	</div>

</body>