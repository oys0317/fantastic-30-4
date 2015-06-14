<?php
		$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root"); 
		echo $_GET[RequestID];

		$sql = 'SELECT Name, Address, Species, Size, StartDate, EndDate, PhoneNum, sa.SitterID as SitterID
					FROM SitterAvailability sa, PetSitter ps, User u, CanTakeCareOf c 
					WHERE sa.SitterID = ps.SitterID and ps.SitterID = u.UserID and sa.SitterID = c.SitterID and sa.AvailabilityID = c.AvailabilityID and sa.SitterID = "'.$_GET[SitterID].'"and sa.AvailabilityID = '.$_GET[AvailabilityID];

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
  			<p style="color:white">to <?php foreach ($db->query($sql) as $row) { echo $row['Name'];} ?></p>
  		</div>
	</div>
	<div class="container">
		<table class="table">
			<tr>
				<td>Sitter's Name:</td>
				<td><?php foreach ($db->query($sql) as $row) { echo $row['Name'];} ?></td>
			</tr>
			<tr>
				<td>Address:</td>
				<td><?php foreach ($db->query($sql) as $row) { echo $row['Address'];} ?></td>
			</tr>
			<tr>
				<td>Phone Number:</td>
				<td><?php foreach ($db->query($sql) as $row) { echo $row['PhoneNum'];} ?></td>
			</tr>
			<tr>
				<td>Can Take Care Of:</td>
				<td><?php foreach ($db->query($sql) as $row) { echo $row['Size']." sized ".$row['Species'];} ?></td>
			</tr>
			<tr>
				<td>Available From:</td>
				<td><?php foreach ($db->query($sql) as $row) { echo $row['StartDate'];} ?></td>
			</tr>
			<tr>
				<td>Available Until:</td>
				<td><?php foreach ($db->query($sql) as $row) { echo $row['EndDate'];} ?></td>
			</tr>
		</table>
	</div>
	<div class="container">
		<form action="createuser.php" method="post">
		  	<div class="form-group">
			    <label for="Compensation">Compensation Per Day (CAD)</label>
			    <input type="Integer" class="form-control" name="compensation" placeholder="Enter Compensation">
		 	</div>	 		
		  	<button type="submit" class="btn btn-warning">Send Contract</button>
		</form>
	</div>
	
</body>