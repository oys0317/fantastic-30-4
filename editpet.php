<?php
	function display() {
		
		$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");

		$sql = $db->prepare("SELECT PetName, Size, Species FROM OwnsPet WHERE PetID = ".$_GET[PetID].";");
		$sql->execute();
		$row = $sql->fetch();
		echo "123";
		echo $_GET[PetID];
		echo $row[PetName];

	}
?>


<head>
	<link rel="stylesheet" href="bootstrap.min.css">
	<title>PetCare</title>
</head>
<?php if(!isset($_COOKIE['userID'])){header('Location: ./index.php');} ;?>

<body>
	<?php include './include/header.php'; ?>

	<div style="padding: 80px 0; background-color:951152; !important" class="jumbotron">
  		<div class="container">
  			<h1 style="color:white"><?= $_GET[pet]?></h1>
  		</div>
	</div>
	<div class="container">
		<?php display(); ?>
	</div>
</body>