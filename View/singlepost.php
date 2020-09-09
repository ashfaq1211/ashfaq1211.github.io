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
                <a class="nav-link login-button" href="logout.php">Logout</a>
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


<style>
    .indent-1 {float: left;}
    .indent-1 section {width: 50%; float: left;}
</style>

<section class="indent-1">
<section class="blog single-blog section col-md-8">
  <div class="container">



    <div class="row">
      <div class="col-md-8 offset-md-1 col-lg-12 offset-lg-0">
        <article class="single-post">
          <h3 class="algn-center">IMAGES <small> (Scroll down for more)</small></h3>
              
              <!-- The grid: four columns -->
              <?php
              $host = "localhost"; /* Host name */
              $user = "root"; /* User */
              $password = ""; /* Password */
              $dbname = "rent_it_3"; /* Database name */
              $con = mysqli_connect($host, $user, $password,$dbname);
              // Check connection
              if (!$con) {
               die("Connection failed: " . mysqli_connect_error());
              }
              $temp = $_GET['temp'];
              $sql2 = "select image from pictures where post_id = $temp";
              $result = mysqli_query($con,$sql2);
              while($row = mysqli_fetch_array($result)){
                  $image_src2 = $row['image'];
              ?>
                  <div class="card">
                    <div class="thumb-content">
                      <?php echo '<img value="$temp" src="'.$image_src2.'" width=500 height="500"/>' ?>
                    </div>
                     <?php
                    }
                 ?>
              </div>

        </article>
        
      </div>
      <div class="col-md-10 offset-md-1 col-lg-3 offset-lg-0">
      </div>
    </div>

  </div>

</section>

<section class="blog single-blog section col-md-8">
  <div class="container">
                  <?php
                      $link = mysqli_connect("localhost", "root","") or die(mysql_error());
                      mysqli_select_db($link, "rent_it_3") or die("Cannot connect to database");
                      $temp = $_GET['temp'];
                      $sql = "SELECT * FROM posts WHERE post_id = '$temp'";
                      $query = mysqli_query($link, $sql);
                      $row = mysqli_fetch_array($query);
                          //POST VALUES
                          $userdisp = $row['user'];
                          $id = $row['post_id'];
                          $post = $row['sale_rent_lease'];
                          $dur = $row['duration'];
                          $acc = $row['acc_type'];
                          $floor = $row['floor'];
                          $flat = $row['flat'];
                          $prop = $row['prop_size'];
                          $direc = $row['direc_facing'];
                          $area = $row['area'];
                          $street = $row['street'];
                          $house = $row['house'];
                          $price = $row['price'];
                          $add = $row['add_details'];
                          $parking = $row['parking'];
                          $lift = $row['lift'];
                          $generator = $row['generator'];
                          $date = $row['date_posted'];
                          $time = $row['time_posted'];
                          $desc = $row['description'];
                          //IMAGES
                          $host = "localhost"; /* Host name */
                          $user = "root"; /* User */
                          $password = ""; /* Password */
                          $dbname = "rent_it_3"; /* Database name */
                          $con = mysqli_connect($host, $user, $password,$dbname);
                          // Check connection
                          if (!$con) {
                           die("Connection failed: " . mysqli_connect_error());
                          }
                          $temp = $row['post_id'];
                          $sql2 = "select image from pictures where post_id = $temp";
                          $result = mysqli_query($con,$sql2);
                          $row = mysqli_fetch_array($result);
                          $image_src2 = $row['image'];
                          //COMMENTS AND REVIEWS
                      $sql3 = "SELECT * FROM users WHERE username = '$userdisp'";
                      $query = mysqli_query($link, $sql3);
                      $row = mysqli_fetch_array($query);
                      $email = $row['email'];

                  ?>


    <div class="row">
      <div class="col-md-10 offset-md-1 col-lg-12 offset-lg-0">
        <article class="single-post">
          <h3><big><?php echo $post ?><big></h3>
          <ul class="list">
            <li class="list-inline-item">by <?php echo $userdisp ?></a></li>
            <li class="list-inline-item"><?php echo $date ?></li>
          </ul><br>

          <h3>Accommodatoin Type: </h3> 
          <p><?php echo $acc ?></p>

          <h3>Property Size: </h3> 
          <p><?php echo $prop ?> (sq.ft.)</p>

          <h3>Price: </h3> 
          <p><?php echo $price ?> (BDT)</p>

          <h3>Duration (if any): </h3> 
          <p><?php echo $dur ?> (Months)</p>

          <h3>Location</h3> 
          <p>House: <?php echo $house ?>, Road: <?php echo $street ?>, <?php echo $area ?></p>

          <h3>Floor and Flat: </h3> 
          <p><?php echo $floor ?>, <?php echo $flat ?></p>

          <h3>Parking: </h3> 
          <p><?php echo $parking ?></p>

          <h3>Lift: </h3> 
          <p><?php echo $lift ?></p>

          <h3>Generator: </h3> 
          <p><?php echo $generator ?></p>

          <h3>Additional Details</h3> 
          <p><?php echo $add ?></p>

          <h3>Description</h3> 
          <p><?php echo $desc ?></p>

          <h4 class="card-title"><a href="emailscript.php?id=<?php echo $id ?>"> Book <i class="fa fa-angle-right"></i></a></h4>

          <p></p>
          
          <ul class="social-circle-icons list-inline">
              <li class="list-inline-item text-center"><a class="fa fa-facebook" href=""></a></li>
              <li class="list-inline-item text-center"><a class="fa fa-pinterest-p" href=""></a></li>
              <!--<li class="list-inline-item text-center"><a class="fa fa-twitter" href=""></a></li>
              <li class="list-inline-item text-center"><a class="fa fa-google-plus" href=""></a></li>
              <li class="list-inline-item text-center"><a class="fa fa-linkedin" href=""></a></li>-->
            </ul>
        </article>
        <div class="block comment">
          <h4>Leave A Comment</h4>
          <form action="addcomrev.php?temp=<?php echo $id ?>" method = "POST">
            <!-- Message -->
            <div class="form-group mb-30">
                <label for="message">Comment or Review</label>
                <textarea class="form-control" type="text" id="message" rows="8" name="comment"></textarea>
            </div>
            <!--<div class="row">
              <div class="col-sm-12 col-md-6">

                <div class="form-group mb-30">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name">
                </div>
              </div>
              <div class="col-sm-12 col-md-6">

                <div class="form-group mb-30">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email">
                </div>
              </div>
            </div>-->
            <button class="btn btn-transparent">Submit</button>
          </form>
        </div>
        <article class="single-post">
          <h3 class="algn-center"><big>Comments & Reviews</big></h3>
              <br>
              <!-- The grid: four columns -->
              <?php
              $host = "localhost"; /* Host name */
              $user = "root"; /* User */
              $password = ""; /* Password */
              $dbname = "rent_it_3"; /* Database name */
              $con = mysqli_connect($host, $user, $password,$dbname);
              // Check connection
              if (!$con) {
               die("Connection failed: " . mysqli_connect_error());
              }
              $temp = $_GET['temp'];
              $sql2 = "SELECT * FROM comments_and_reviews WHERE post_id = '$temp'";
              $result = mysqli_query($con,$sql2);
              while($row = mysqli_fetch_array($result)){
                $text = $row['comments'];
                $user_comment = $row['user'];
                $date = $row['com_date'];
              ?>
                  <div class="list">
                    <div>
                      <h3><?php echo $text ?></h3>
                      <p><?php echo $user_comment ?> - <?php echo $date?></p>
                    </div>
                     <?php
                    }
                 ?>
              </div>

        </article>
      </div>
      <div class="col-md-10 offset-md-1 col-lg-3 offset-lg-0">
      </div>
    </div>

  </div>

</section>
</section>
<section></section>


<!--============================
=            Footer            =
=============================-->


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

