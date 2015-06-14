<?php 	
	
	function getSitterAvailability() {
		try{
			$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
			$sql = 'SELECT Name, Address, Species, Size, StartDate, EndDate, sa.AvailabilityID as AvailabilityID, sa.SitterID as SitterID
					FROM SitterAvailability sa, PetSitter ps, User u, CanTakeCareOf c 
					WHERE sa.SitterID = ps.SitterID and ps.SitterID = u.UserID and sa.SitterID = c.SitterID and sa.AvailabilityID = c.AvailabilityID and NOT EXISTS (SELECT * FROM Contract cn WHERE cn.AvailabilityID IS NOT NULL and Status=1 and cn.AvailabilityID = sa.AvailabilityID and cn.SitterID = sa.SitterID)';
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
				echo "Contract";
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
					echo '<a href="contractToSitter.php?AvailabilityID='.$row['AvailabilityID'].'&SitterID='.$row['SitterID'].'" class="btn btn-warning btn-sm" role="button">Contract</a>';
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
	<title>PetCare</title>
</head>
<body>
	<?php include '../include/header.php' ?>
	<div style="padding: 80px 0; background-color:5cb85c; !important" class="jumbotron">
  		<div class="container">
  			<h1 style="color:white">Pet Sitters</h1>
  			<p style="color:white">Cras venenatis ullamcorper diam vel accumsan. Morbi elit ipsum, semper vitae erat at, semper finibus risus. In vitae rhoncus ipsum. Aliquam sit amet finibus massa. Morbi non risus eu nibh ullamcorper hendrerit vel vitae mauris. Suspendisse ut felis placerat ante vehicula euismod. Nunc ornare ipsum urna, eget finibus lacus efficitur id. Vivamus dapibus tempor augue at hendrerit. Integer tincidunt, turpis sit amet interdum pellentesque, eros est mollis libero, tempus ullamcorper dui sem a arcu. Maecenas fermentum pellentesque egestas. Aliquam euismod, lectus non elementum posuere, mi turpis interdum velit, quis bibendum ipsum enim vel lacus.</p>
  		</div>
	</div>
	<div class="container">
		<?php getSitterAvailability(); ?>
		<?php if(isset($_COOKIE['userID'])): ?>
			<a href="sitterAddAvailability.php" class="btn btn-success" role="button">Add Availability</a>
		<?php endif; ?>
	</div>

</body>
