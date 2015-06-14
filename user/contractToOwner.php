<?php
		$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root"); 
		echo $_GET[RequestID];

		$sql = 'SELECT Name, PetName, Species, Size, Address,PhoneNum, WithinDistance, StartDate, EndDate
				FROM AccommodationRequest a, OwnsPet op, PetOwner po, User u 
				WHERE a.OwnerID = op.OwnerID and op.OwnerID = po.OwnerID and po.OwnerID = u.UserID and a.PetID = op.PetID and a.RequestID='.$_GET[RequestID].' and a.PetID='.$_GET[PetID];

?>

<head>
	<link rel="stylesheet" href="../bootstrap.min.css">
	<title>PetCare</title>
</head>
<body>
	<?php include '../include/header.php'; ?>
	<div style="padding: 80px 0; background-color:337ab7; !important" class="jumbotron">
  		<div class="container">
  			<h1 style="color:white">Send Contract</h1>
  			<p style="color:white">to <?php foreach ($db->query($sql) as $row) { echo $row['Name'];} ?></p>
  		</div>
	</div>
	<div class="container">
		<table class="table">
			<tr>
				<td>Owner's Name:</td>
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
				<td>Pet Name:</td>
				<td><?php foreach ($db->query($sql) as $row) { echo $row['PetName'];} ?></td>
			</tr>
			<tr>
				<td>Pet Species:</td>
				<td><?php foreach ($db->query($sql) as $row) { echo $row['Species'];} ?></td>
			</tr>
			<tr>
				<td>Pet Size:</td>
				<td><?php foreach ($db->query($sql) as $row) { echo $row['Size'];} ?></td>
			</tr>
			<tr>
				<td>Start Date:</td>
				<td><?php foreach ($db->query($sql) as $row) { echo $row['StartDate'];} ?></td>
			</tr>
			<tr>
				<td>End Date:</td>
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