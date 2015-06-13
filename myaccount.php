<?php

?>

<head>

<link rel="stylesheet" href="bootstrap.min.css">
<style type="text/css">

#personalInfo td,th {
	padding-left: 20px;
	padding-top: 8px;
}

</style>
<title>My Account</title>

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
	<div style="padding: 25px 0; background-color:951152; !important" class="jumbotron">
  		<h1 style="color:white">My Account</h1>
	</div>
	<div class="container">
	<div style="height:110px">
		<div style="margin-left:10%;float:left;width:55%;overflow:hidden">
			<table id="personalInfo">
			<tr>
				<th>Username</th>
				<td>alyssalerner</th>
			</tr>
			<tr>
				<th>Name</th>
				<td>Alyssa Lerner</td>
			<tr>
				<th>Address</th>
				<td>1234 uncreative address, Vancouver BC</td>
			</tr>

			</table>
		</div>
		<div id="editinfo" style="overflow:hidden">
			<a href="editPersonalInfo.php">Edit Info</a>
		</div>
	</div>
	<div>
		<div style="margin-left:10%;float:left;width:55%;overflow:hidden">
			<h2>My Pets</h2>
			<ul>
			<li>Pet 1</li>
			<li>Pet 2</li>
			<li>Pet 3</li>
			</ul>
		</div>
		<div style="overflow:hidden">
			<h2>My Availabilities</h2>
			<ul>
			<li>Avail 1</li>
			<li>Avail 2</li>
			<li>Avail 3</li>
			</ul>
		</div>
	</div>
</body>
