<?php 	
	
	function getAccommodationRequest() {
		try{
			$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
			$sql = 'SELECT Name, PetName, Species, Size, Address, WithinDistance, StartDate, EndDate, a.OwnerID 
			FROM AccommodationRequest a, OwnsPet op, PetOwner po, User u 
			WHERE a.OwnerID = op.OwnerID and op.OwnerID = po.OwnerID and po.OwnerID = u.UserID and a.PetID = op.PetID and a.RequestID NOT IN (SELECT RequestID FROM Contract WHERE RequestID IS NOT NULL and Status=1)';

			echo '<table class="table table-striped">';

			echo '<th>name</th>';

			echo '<th>';
			echo "Pet Name";
			echo '</th>';

			echo '<th>';
			echo "species";
			echo '</th>';

			echo '<th>';
			echo "Size";
			echo '</th>';

			echo '<th>';
			echo "Address";
			echo '</th>';

			echo '<th>';
			echo "Within Distance";
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
				echo $row['PetName'];
				echo '</td>';

				echo '<td>';
				echo $row['Species'];
				echo '</td>';

				echo '<td>';
				echo $row['Size'];
				echo '</td>';

				echo '<td>';
				echo $row['Address'];
				echo '</td>';

				echo '<td>';
				echo $row['WithinDistance'];
				echo ' km</td>';

				echo '<td>';
				echo $row['StartDate'];
				echo '</td>';

				echo '<td>';
				echo $row['EndDate'];
				echo '</td>';
				
				if (isset($_COOKIE['userID'])) {
					echo '<td>';
					echo'<form action="contractToOwner.php" get="">
							<input type="submit" value="Contract">
						</form>';
					echo '</td>';

					echo '</tr>';
				}
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
	<div style="padding: 80px 0; background-color:337ab7; !important" class="jumbotron">
  		<div class="container">
  			<h1 style="color:white">Pet Owners</h1>
  			<p style="color:white">Cras venenatis ullamcorper diam vel accumsan. Morbi elit ipsum, semper vitae erat at, semper finibus risus. In vitae rhoncus ipsum. Aliquam sit amet finibus massa. Morbi non risus eu nibh ullamcorper hendrerit vel vitae mauris. Suspendisse ut felis placerat ante vehicula euismod. Nunc ornare ipsum urna, eget finibus lacus efficitur id. Vivamus dapibus tempor augue at hendrerit. Integer tincidunt, turpis sit amet interdum pellentesque, eros est mollis libero, tempus ullamcorper dui sem a arcu. Maecenas fermentum pellentesque egestas. Aliquam euismod, lectus non elementum posuere, mi turpis interdum velit, quis bibendum ipsum enim vel lacus.</p>
  		</div>
	</div>
	<div class="container">
		<?php getAccommodationRequest(); ?>
		<?php if(isset($_COOKIE['userID'])): ?>
			<a href="accomodationRequest.php" class="btn btn-primary" role="button">Add Accomodation Request</a>
		<?php endif; ?>
	</div>
</body>
