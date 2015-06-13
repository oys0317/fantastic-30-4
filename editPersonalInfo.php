<?php

?>

<head>

<link rel="stylesheet" href="bootstrap.min.css">
<style type="text/css">

#personalInfo td,th {
	padding-right: 20px;
	padding-top: 8px;
	margin-left: 0px;
}
#submitInfoDiv {
	
}

#personalInfoDiv {
	
}

</style>
<title>Edit Information</title>

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
	<div style="padding: 25px 0; background-color:a5d1ff; !important" class="jumbotron">
  		<h1 style="color:white">My Account</h1>
	</div>
	<div class="container">
	<div style="height:110px">
		<div id="personalInfoDiv">
			<table id="personalInfo">
			<tr>
				<th>Username</th>
				<td>alyssalerner</td>
			</tr>
			<tr>
				<th>Name</th>
				<td><input type="text" class="form-control" id="editName" placeholder="Alyssa Lerner"></td>
			<tr>
				<th>Street</th>
				<td><input type="text" class="form-control" id="editStreet" placeholder="1234 uncreative address"></td>
			</tr>
			<tr>
				<th>Address Line 2</th>
				<td><input type="text" class="form-control" name="editAddressLine2"placeholder=""></td>
			</tr>
			<tr>
				<th>City</th>
				<td><input type="text" class="form-control" name="editCity"placeholder="Vancouver"></td>
			</tr>
			<tr>
				<th>Province</th>
				<td><input type="text" class="form-control" name="editProvince"placeholder="BC"></td>
			</tr>
			</table>
		</div>
		<div id="submitInfoDiv">
			<form action="myaccount.php">
				<input type="submit" class="btn btn-default" value="Save Info">
			</form>
		</div>
	</div>
</body>
