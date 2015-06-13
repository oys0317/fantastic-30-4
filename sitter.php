<?php 	
	
	function getSitterAvailability() {
		try{
			$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
			$sql = 'Select Name, Species, Size, StartDate, EndDate from SitterAvailability sa, PetSitter ps, User u, CanTakeCareOf c where sa.SitterID = ps.SitterID and ps.SitterID = u.UserID and sa.SitterID = c.SitterID and sa.AvailabilityID = c.AvailabilityID';
			echo '<table class="table table-striped">';
			echo '<th>';
			echo "name";
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


			foreach($db->query($sql) as $row){
				echo '<tr>';

				echo '<td>';
				echo $row['Name'];
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

				echo '</br>';
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
	<link rel="stylesheet" href="bootstrap.min.css">
	<title>PetSitter</title>
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
        		<button type="submit" class="btn btn-default">Submit</button>
      		</form>
      	</div>
	</nav>
	<div style="padding: 80px 0; background-color:5cb85c; !important" class="jumbotron">
  		<div class="container">
  			<h1 style="color:white">Pet Sitters</h1>
  			<p style="color:white">Cras venenatis ullamcorper diam vel accumsan. Morbi elit ipsum, semper vitae erat at, semper finibus risus. In vitae rhoncus ipsum. Aliquam sit amet finibus massa. Morbi non risus eu nibh ullamcorper hendrerit vel vitae mauris. Suspendisse ut felis placerat ante vehicula euismod. Nunc ornare ipsum urna, eget finibus lacus efficitur id. Vivamus dapibus tempor augue at hendrerit. Integer tincidunt, turpis sit amet interdum pellentesque, eros est mollis libero, tempus ullamcorper dui sem a arcu. Maecenas fermentum pellentesque egestas. Aliquam euismod, lectus non elementum posuere, mi turpis interdum velit, quis bibendum ipsum enim vel lacus.</p>
  		</div>
	</div>
	<div class="container">
		<?php 
			getSitterAvailability();
		?>
	</div>
</body>
