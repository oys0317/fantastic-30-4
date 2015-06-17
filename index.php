<?php
	//include 'database.php';

?>
<iframe src="//giphy.com/embed/NGALQBUgvmVTa?html5=true" width="400" height="336" frameBorder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
<iframe src="//giphy.com/embed/NGALQBUgvmVTa?html5=true" width="400" height="336" frameBorder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
<iframe src="//giphy.com/embed/NGALQBUgvmVTa?html5=true" width="400" height="336" frameBorder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
<head>
	<link rel="stylesheet" href="bootstrap.min.css">
	<title>Pet Care</title>

  <style type="text/css">

      // To get two divs side by side ref: http://stackoverflow.com/questions/17217766/two-divs-side-by-side-fluid-display
      .mainbox {
          margin: 0 0 0 20;
      }

      .introText {
          float: left;
          margin-top: 30px;
          width: 50%;
          overflow: hidden;
      }

      .sitterOwnerButtons {
          float: left;
          width: 50%;
          margin-top: 55px;
          overflow: hidden;
      }

      .mainbutton {
          width: 75%;
      }

      p {
        font-size: 20;
      }

      h1, p {
        font-family: 'helvetica';
      }

      h1 {
        font-size: 40;
        margin-bottom: 10px;
      }

  </style>
</head>
<body>
	<?php include './include/header.php'; ?>
	<div class="mainbox">
  		<div class="container introText">
  			<h1>PET CARE</h1>
  			   <p>Do you love to travel, but never know what to do with your pet?</br></br>
  			     Never spend another day searching for pet-friendly motels or reputable doggy-day-cares.</br><br>
             Never again force your fuzzy friends upon reluctant relatives. <br><br>
  			     Simply find a sitter withour easy website and <b>get travelling!</b><br><br>
           </p>
      </div>

  		<div class="container sitterOwnerButtons" role="group">
        <a href="user/owner.php"><img src='viewPetOwners.png' class='mainbutton'/></a><br/><br/>
 				<a href="user/sitter.php"><img src='viewPetSitters.png' class='mainbutton'/></a>
			</div>

	</div>
</body>