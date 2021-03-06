<!DOCTYPE html>
<html lang="en">
<head>
  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rent It</title>
  <!-- PLUGINS CSS STYLE -->
  <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
  <!-- Bootstrap -->
  <link href="plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Owl Carousel -->
  <link href="plugins/slick-carousel/slick/slick.css" rel="stylesheet">
  <link href="plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
  <!-- Fancy Box -->
  <link href="plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
  <link href="plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
  <link href="plugins/seiyria-bootstrap-slider/dist/css/bootstrap-slider.min.css" rel="stylesheet">
  <!-- CUSTOM CSS -->
  <link href="css/style.css" rel="stylesheet">
  <!-- FAVICON -->
  <link href="img/favicon.png" rel="shortcut icon">

</head>

<?php
   session_start(); //starts the session
   if($_SESSION['user']){ // checks if the user is logged in  
   }
   else{
      header("location: index.php"); // redirects if user is not logged in
   }
   $user = $_SESSION['user']; //assigns user value
?>

<body class="body-wrapper">

<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <nav class="navbar navbar-expand-lg  navigation">
          <a class="navbar-brand" href="index.php">
            <!--<img src="images/logo.png" alt="">-->
            <big>RENT IT</big>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto main-nav ">
              <!--<li class="nav-item active">-->
              <li class="nav-item">
                <a class="nav-link" href="home.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="mydashboard.php">My Posts</a>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto mt-10">
              <li class="nav-item">
                <a class="nav-link login-button" href="login.php">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link login-button" href="../../MVC/Controller/logout.php">Logout</a>
              </li>
              <li class="nav-item">
                <a class="nav-link add-button" href="post.php"><i class="fa fa-plus-circle"></i> Post Ad</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
</section>
<!--=================================
=            Single Blog            =
==================================-->


<section class="hero-area bg-1 text-center overly">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="content-block col-md-12">
          <p>Sign Up today and oin the millions in finding affordable<br>accommodation at the comfort of your own home.</p>
          

          <div class="row">
          <div class="col-md-3"></div>
          <div class="block comment col-md-6">
          <form action="addpost.php" method="POST">
           Sell, Rent or Lease: <input type="text" name="PostType"/> <br/>
           <br/>
           Duration (months): <input type="int" name="Duration" /> <br/>
           <br/>
           Accommodation Type: <input type="text" name="AccType" /> <br/>
           <br/>
           Property Size (sq.ft.) : <input type="int" name="PropSize" /> <br/>
           <br/>
           Floor No.: <input type="int" name="Floor" /> <br/>
           <br/>
           Flat No.: <input type="int" name="Flat" /> <br/>
           <br/>
           Direcrtion Facing: <input type="text" name="DirecFacing" /> <br/>
           <br/>
           Area: <input type="text" name="Area" /> <br/>
           Street: <input type="text" name="Street" /> <br/>
           HouseNo: <input type="text" name="House" /> <br/>
           <br/>
           Price (BDT): <input type="int" name="Price" /> <br/>
           <br/>
           Additional Details: <input type="text" name="AddDetails" /> <br/>
           <br/>
           Parking: <input type="text" name="Parking" /> <br/>
           <br/>
           Lift: <input type="text" name="Lift" /> <br/>
           <br/>
           Generator: <input type="text" name="Generator" /><br/>
           <br/>
           Description: <input type="text" name="Description" /><br/>
           <br/>
           <input type="submit" value="POST" name='but_upload'/>
         </form>
        </div>
        <div class="col-md-3"></div>


        </div>
        </div>      
      </div>
    </div>
  </div>
  <!-- Container End -->
</section>


<!--============================
=            Footer            =
=============================-->

<footer class="footer section section-sm">
  <!-- Container Start -->
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-7 offset-md-1 offset-lg-0">
        <!-- About -->
        <div class="block about">
          <!-- footer logo -->
          <big class="alt-color">RENT IT</big>
          <!-- description -->
          <p class="alt-color">Classifieds accomooodation to rent, sell or lease. Wheter you're posting or looking for posts, join today</p>
        </div>
      </div>
      <!-- Link list -->
      <div class="col-lg-2 offset-lg-1 col-md-3">
        <div class="block">
          <h4>Site Pages</h4>
          <ul>
            <li><a href="#">How It works</a></li>
            <li><a href="#">Articls & Tips</a></li>
            <li><a href="#">Terms of Services</a></li>
          </ul>
        </div>
      </div>
      <!-- Link list -->
      <!--<div class="col-lg-2 col-md-3 offset-md-1 offset-lg-0">
        <div class="block">
          <h4>Admin Pages</h4>
          <ul>
            <li><a href="#">How It works</a></li>
            <li><a href="#">Articls & Tips</a></li>
            <li><a href="#">Terms of Services</a></li>
          </ul>
        </div>
      </div>-->
      <!-- Promotion -->
      <div class="col-lg-4 col-md-7">
        <!-- App promotion -->
        <div class="block-2 app-promotion">
          <a href="">
            <!-- Icon -->
            <img src="images/footer/phone-icon.png" alt="mobile-icon">
          </a>
          <p>Mobile app coming soon on Android and IOS</p>
        </div>
      </div>
    </div>
  </div>
  <!-- Container End -->
</footer>
<!-- Footer Bottom -->
<footer class="footer-bottom">
    <!-- Container Start -->
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-12">
          <!-- Copyright -->
          <div class="copyright">
            <p>Copyright © 2018. All Rights Reserved</p>
          </div>
        </div>
        <div class="col-sm-4 col-12">
          <!-- Social Icons -->
          <ul class="social-media-icons text-right">
              <li><a class="fa fa-facebook" href=""></a></li>
              <li><a class="fa fa-pinterest-p" href=""></a></li>
            </ul>
        </div>
      </div>
    </div>
    <!-- Container End -->
    <!-- To Top -->
    <div class="top-to">
      <a id="top" class="" href=""><i class="fa fa-angle-up"></i></a>
    </div>
</footer>

  <!-- JAVASCRIPTS -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <script src="plugins/tether/js/tether.min.js"></script>
  <script src="plugins/raty/jquery.raty-fa.js"></script>
  <script src="plugins/bootstrap/dist/js/popper.min.js"></script>
  <script src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="plugins/seiyria-bootstrap-slider/dist/bootstrap-slider.min.js"></script>
  <script src="plugins/slick-carousel/slick/slick.min.js"></script>
  <script src="plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
  <script src="plugins/fancybox/jquery.fancybox.pack.js"></script>
  <script src="plugins/smoothscroll/SmoothScroll.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
  <script src="js/scripts.js"></script>

</body>

</html>

