<?php
		$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root"); 

		$stmt = $db->prepare('SELECT Name, PetName, Species, Size, Address,PhoneNum, WithinDistance, StartDate, EndDate, a.OwnerID as OwnerID
				FROM AccommodationRequest a, OwnsPet op, PetOwner po, User u 
				WHERE a.OwnerID = op.OwnerID and op.OwnerID = po.OwnerID and po.OwnerID = u.UserID and a.PetID = op.PetID and a.RequestID=:RequestID and a.PetID=:PetID');
		$stmt->execute(array(':RequestID' => $_GET[RequestID], ':PetID' => $_GET[PetID]));
		$row = $stmt->fetch();
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
  			<p style="color:white">to <?= $row['Name']; ?></p>
  		</div>
	</div>
	<div class="container">
		<table class="table">
			<tr>
				<td>Owner's Name:</td>
				<td><?= $row['Name']; ?></td>
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
				<td>Pet Name:</td>
				<td><?= $row['PetName'] ?></td>
			</tr>
			<tr>
				<td>Pet Species:</td>
				<td><?= $row['Species'] ?></td>
			</tr>
			<tr>
				<td>Pet Size:</td>
				<td><?= $row['Size'] ?></td>
			</tr>
			<tr>
				<td>Start Date:</td>
				<td><?= $row['StartDate'] ?></td>
			</tr>
			<tr>
				<td>End Date:</td>
				<td><?= $row['EndDate'] ?></td>
			</tr>
		</table>
	</div>
	<div class="container">
		<form action="createContract.php" method="post">
		  	<div class="form-group">
			    <label for="Compensation">Compensation Per Day (CAD)</label>
			    <input type="Integer" class="form-control" name="compensation" placeholder="Enter Compensation">
			    <!--input type="hidden" name="OwnerID" value= '"<?php $row['EndDate'] ?>}">
			    <input type="hidden" name="PetID" value="">
			    <input type="hidden" name="RequestID" value="">
			    <input type="hidden" name="SitterID" value="">
			    <input type="hidden" name="AvailabilityID" value="">
			    <input type="hidden" name="StartDate" value="">
			    <input type="hidden" name="EndDate" value=""-->

		 	</div>	 		
		  	<button type="submit" class="btn btn-warning">Send Contract</button>
		</form>
	</div>
	
</body>