
<head>
  <link rel="stylesheet" href="bootstrap.min.css">
  <style>
  .bg {
    margin-top:30px;
    background: url('./background.jpg') no-repeat center center;
    position: fixed;
    width: 100%;
    height: 500px; 
    top:0;
    left:0;
    z-index: -1;
  }

  .jumbotron {
    margin-top: 65px;
    margin-bottom: 0px;
    height: 467px;
    color: black;
    background:transparent;
  }

  .container .abc {
    margin-left:-40px;
  }

  .gifs{
    text-align: center;
  }
  .gifs img{
    width:24%; 
    height:30%;
  }

  </style>
  <title>Pet Care</title>
</head>
<body>
  <?php include './include/header.php'; ?>
  <div class="bg"></div>
  <div class="jumbotron">
      <div class="container">
        <div class="abc">
          <h1>PET CARE</h1>
          <p>Do you love to travel, but never know what to do with your pet?</br>
          Never spend another day searching for pet-friendly motels.</br>
          Never again force your fuzzy friends upon reluctant relatives. <br>
          Simply find a sitter withour easy website and <b>get travelling!</b><br></p>
          <div class="btn" role="group" style="margin-top:50px; margin-left:0px;">
            <a href="user/sitter.php" class="btn btn-success btn-lg">Pet Sitters</a>
            <a href="user/owner.php" class="btn btn-primary btn-lg">Pet Owners</a>
        </div>
        </div>
      </div>
  </div>
  <div class="gifs">
    <img src="gif/giphy1.gif">
    <img src="gif/giphy2.gif">
    <img src="gif/giphy3.gif">
    <img src="gif/giphy4.gif">
  </div>
</body>
