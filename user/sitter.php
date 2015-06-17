<?php 	
	
	function getSitterAvailability() {
		try{
			$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
			$sql = 'SELECT Name, Address, Species, Size, StartDate, EndDate, sa.AvailabilityID as AvailabilityID, sa.SitterID as SitterID
					FROM SitterAvailability sa, PetSitter ps, User u, CanTakeCareOf c 
					WHERE sa.SitterID = ps.SitterID and ps.SitterID = u.UserID and sa.SitterID = c.SitterID and sa.AvailabilityID = c.AvailabilityID and NOT EXISTS (SELECT * FROM ContractToSitter cs WHERE Status=1 and cs.AvailabilityID = sa.AvailabilityID and cs.SitterID = sa.SitterID)';
			
			// If there are no sitters, display a different message.
			if($db->query($sql) == FALSE) {
				echo "<p align='center' style='font-size:20'>There are no sitters right now.<br>Click the button below to become one!</p>";
				return;
			}

			echo '<table class="table table-striped">';
			echo '<th>';
			echo "name";
			echo '</th>';

			echo '<th>';
			echo "Address";
			echo '</th>';

			echo '<th>';
			echo "Pet Type";
			echo '</th>';

			echo '<th>';
			echo "Size";
			echo '</th>';

			echo '<th>';
			echo "Start date";
			echo '</th>';

			echo '<th>';
			echo "End date";
			echo '</th>';

			if (isset($_COOKIE['userID'])) {
				echo '<th>';
				echo "&nbsp;";
				echo '</th>';
			}

			foreach($db->query($sql) as $row){
				echo '<tr>';

				echo '<td>';
				echo $row['Name'];
				echo '</td>';

				echo '<td>';
				echo $row['Address'];
				echo '</td>';

				echo '<td>';
				echo $row['Species'];
				echo '</td>';

				echo '<td>';
				echo $row['Size'];
				echo '</td>';

				echo '<td>';
				echo $row['StartDate'];
				echo '</td>';

				echo '<td>';
				echo $row['EndDate'];
				echo '</td>';
				
				if (isset($_COOKIE['userID'])) {
					echo '<td>';
					if($row['SitterID']!=$_COOKIE['userID']){
						echo '<a href="contractToSitter.php?AvailabilityID='.$row['AvailabilityID'].'&SitterID='.$row['SitterID'].'" class="btn btn-warning btn-sm" role="button">Sit my pet!</a>';
					}
					else {
						echo '<a href="editAvailability.php?AvailabilityID='.$row['AvailabilityID'].'" role="button">';
						echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../edit.png" width="18px"></a>';
					}
					echo '</td>';
				}	

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
	<title>Pet Sitters</title>
</head>
<body>
	<?php include '../include/header.php' ?>
	<div style="padding: 80px 0; background-color:5cb85c; !important" class="jumbotron">
  		<div class="container">
  			<h1 style="color:white">Pet Sitters</h1>
  			<p style="color:white">
  					Where you can view all of the available pet sitters! <br>
  					Want to ask someone to look after your pet? &nbsp;Want to list your own availability?<br>
  					Then you've come to the right place!
  			</p>
  		</div>
	</div>
	<div class="container">
		<?php getSitterAvailability(); ?>
		<?php if(isset($_COOKIE['userID'])): ?>
			<a href="sitterAddAvailability.php" class="btn btn-success" role="button">Add Availability</a>
		<?php endif; ?>
	</div>

</body>
