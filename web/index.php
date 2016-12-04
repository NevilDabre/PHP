<?php

session_start();

require 'database.php';

if( isset($_SESSION['user_id'])) {

  
  $sql = "select * from userdata WHERE email='" . $username . "' and password ='" . $password . "'";
  $records = $conn->prepare("select * from userdata WHERE email= :id");
  $records->bindParam(':id',$_SESSION['user_id']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC)

  $user = NULL;

  if( count($results) > 0){
    $user = $results;
  }
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8" >
<meta http-equiv="content-stype-type" content="text/css" >
<title>Diamond Fashion Store</title>
<style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
  </style>
</head>
<link rel="stylesheet" type="text/css" href="./css/common_menu.css">
<link rel="stylesheet" type="text/css" href="./css/main.css" title="main" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>

<header class="wrapper">
    <div id="logo">
        <p><img src="./img/logo.jpg" alt="company logo" width="30" height="30"/></p>
    </div>
    <div id="intro">
        <p>Welcome to Diamond Fashion Store</p>
    </div>
</header>
<nav>
    <ui>
    	<li><a href="index.html">Home</a></li>
    	<li><a href="shoppinglist.php">Shopping List</a></li>
        <li><a href="contactus.html">Contact US</a></li>
        <li><a href="login.php">Register/Login</a></li>
	</ui>
</nav>
<?php if($user) : ?>

  <br /> Welcome,<?= $user['email']; ?>
  <br /> You are succcesfully logged in!

  <a href="logout.php">Logout?</a>

<?php else: ?>

<?

<div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="./img/Banner1.jpg" alt="Banner" width="460" height="345">
        <div class="carousel-caption">
          <h3>Simply Comfort</h3>
          <p>Fall truly into comfort with our new cotton bottom wear.</p>
        </div>
      </div>

      <div class="item">
        <img src="./img/Banner2.jpg" alt="Banner" width="460" height="345">
        <div class="carousel-caption">
          <h3>Casuals</h3>
          <p>The perfect Casuals for work and for business meetings.</p>
        </div>
      </div>
    
      <div class="item">
        <img src="./img/Banner3.jpg" alt="Banner" width="460" height="345">
        <div class="carousel-caption">
          <h3>Gifts Ideas</h3>
          <p>Perfect for the party season.</p>
        </div>
      </div>

      <div class="item">
        <img src="./img/Banner4.jpg" alt="Banner" width="460" height="345">
        <div class="carousel-caption">
          <h3>Summer Collection</h3>
          <p>Beatiful Collection for Womens.</p>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <br>

        <div class="panel panel-success">
      <div class="panel-heading"><h2>Shopping Websites For Women </h2></div>
      <div class="panel-body"><p>
            Up to 70% Off on Designer Womens Apparel at Zulily. Shop and Start Saving Now!
Apparel, Home and More · New Events Every Day · Great Finds Up to 70% Off · New Deals Every Day
        </p></div>
    </div>
        
<div class="row">
    <div class="col-md-4">
      <div class="thumbnail">
        <img src="./img/item1.jpg" alt="Watches" style="width:100%">
          <div class="caption">
            <p>Shop online for watches for women at best prices.</p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
          <img src="./img/item2.jpg" alt="Shoes" style="width:100%">
          <div class="caption">
            <p>Stylish women's shoes at discount shoe clearance prices.</p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
          <img src="./img/item3.jpg" alt="Tops" style="width:100%">
          <div class="caption">
            <p>Shop Women Tops with the best women tops brands.</p>
          </div>
        </a>
      </div>
    </div>
  </div>


</div>
		<footer>
			<p>Website By Neville &copy;</p>
			<p>Tel. 519-577-0354</p>
			<p>E-mail. neville.dabre@gmail.com</p>
		</footer> 	
</body>


</html>
