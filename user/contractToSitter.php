<?php
		$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root"); 
		$stmt = $db->prepare('SELECT Name, Address, Species, Size, StartDate, EndDate, PhoneNum, sa.SitterID as SitterID
					FROM SitterAvailability sa, PetSitter ps, User u, CanTakeCareOf c 
					WHERE sa.SitterID = ps.SitterID and ps.SitterID = u.UserID and sa.SitterID = c.SitterID and sa.AvailabilityID = c.AvailabilityID and sa.SitterID=:SitterID and sa.AvailabilityID=:AvailabilityID');
		$stmt->execute(array(':SitterID' => $_GET[SitterID], ':AvailabilityID' => $_GET[AvailabilityID]));
		$row = $stmt->fetch();
?>

<head>
	<link rel="stylesheet" href="../bootstrap.min.css">
	<title>PetCare</title>
</head>
<body>
	<?php include '../include/header.php'; ?>
	<div style="padding: 80px 0; background-color:5cb85c; !important" class="jumbotron">
  		<div class="container">
  			<h1 style="color:white">Send Contract</h1>
  			<p style="color:white">to <?= $row['Name'] ?></p>
  		</div>
	</div>
	<div class="container">
		<table class="table">
			<tr>
				<td>Sitter's Name:</td>
				<td><?= $row['Name'] ?></td>
			</tr>
			<tr>
				<td>Address:</td>
				<td><?= $row['Address'] ?></td>
			</tr>
			<tr>
				<td>Phone Number:</td>
				<td><?= $row['PhoneNum'] ?></td>
			</tr>
			<tr>
				<td>Can Take Care Of:</td>
				<td><?php echo $row['Size']." sized ".$row['Species'] ?></td>
			</tr>
			<tr>
				<td>Available From:</td>
				<td><?= $row['StartDate'] ?></td>
			</tr>
			<tr>
				<td>Available Until:</td>
				<td><?= $row['EndDate'] ?></td>
			</tr>
		</table>
	</div>
	<div class="container">
		<form action="createContract.php" method="post">
		  	<div class="form-group">
			    <label for="Compensation">Compensation Per Day (CAD)</label>
			    <input type="Integer" class="form-control" name="compensation" placeholder="Enter Compensation">
		 	</div>	 		
		  	<button type="submit" class="btn btn-warning">Send Contract</button>
		</form>
	</div>
	
</body>