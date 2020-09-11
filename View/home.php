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


<section class="page-search">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!-- Advance Search -->
        <div class="advance-search">
          <form action="home.php?searchmethod=1" method="POST">
          Search <input type ="text" name="search"/> 
          <select name="drop">
            <option value="sale_rent_lease">Post Type</option>
            <option value="duration">Duration</option>
            <option value="acc_type">Accommodation Type</option>
            <option value="floor">Floor No.</option>
            <option value="flat">Flat No.</option>
            <option value="prop_size">Property Size</option>
            <option value="direc_facing">Direction Facing</option>
            <option value="area">Area</option>
            <option value="street">Street</option>
            <option value="house">House</option>
            <option value="price">Price</option>
            <option value="add_details">Additioal Details</option>
            <option value="parking">Parking</option>
            <option value="lift">Lift</option>
            <option value="generator">Generator</option>
          </select>
          <input type="submit" value="Search"/>
        </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!--Search Tag Display-->

<section class="section-sm">
  <div class="container">

    <?php
    if(isset($_GET['searchmethod']) ){
    $search_temp = mysql_real_escape_string($_POST['search']);
    ?>
    <div class="row">
      <div class="col-md-12">
        <div class="search-result bg-gray">
          <h2>Showing Results For "<?php echo $search_temp ?>"</h2>
        </div>
      </div>
    </div>
    <?php
    }
    else if(isset($_GET['range1'])){
    $temp1 = mysql_real_escape_string($_POST['prange1']);
    $temp2 = mysql_real_escape_string($_POST['prange2']);
    ?>
    <div class="row">
      <div class="col-md-12">
        <div class="search-result bg-gray">
          <h2>Showing Results For: Price Between "<?php echo $temp1?> and <?php echo $temp2?>"</h2>
        </div>
      </div>
    </div>
    <?php
    }
    else if(isset($_GET['range2'])){
    $temp1 = mysql_real_escape_string($_POST['srange1']);
    $temp2 = mysql_real_escape_string($_POST['srange2']);
    ?>
    <div class="row">
      <div class="col-md-12">
        <div class="search-result bg-gray">
          <h2>Showing Results For: Size Between "<?php echo $temp1?> and <?php echo $temp2?>"</h2>
        </div>
      </div>
    </div>
    <?php
    }
    ?>


    <div class="row">
      <div class="col-md-3">
        <div class="category-sidebar">
          <div class="widget category-list">
          <h4 class="widget-header">Sort</h4>
          <ul class="category-list">
          <form action="home.php" method="POST">
            <a class="edit" href="editpost.php?id=<?php echo $id ?>">
            <li><a href="home.php?sort=1">Most Recent</a></li>
            <li><a href="home.php?sort=2">Lowest Price</a></li>
            <li><a href="home.php?sort=3">Highest Price</a></li>
          </form>
          </ul>
        </div>
          <div class="widget category-list">
          <h4 class="widget-header">Categories</h4>
          <ul class="category-list">
          <form action="home.php" method="POST">
            <a class="edit" href="editpost.php?id=<?php echo $id ?>">
            <li><a href="home.php?temp=all">All Categories</a></li>
            <li><a href="home.php?temp=Flat">Flats</a></li>
            <li><a href="home.php?temp=Room">Rooms</a></li>
            <li><a href="home.php?temp=Sublet">Sublets</a></li>
            <li><a href="home.php?temp=Office">Offices</a></li>
            <li><a href="home.php?temp=Restaurant">Restaurants</a></li>
          </form>
          </ul>
        </div>

<div class="widget price-range">
  <h4 class="widget-header">Price Range</h4>
  <div class="block">
    <form action="home.php?range1=1" method="POST">
          <input type="int" name="prange1"/><br>
          <button class="btn btn-transparent" type="submit">Find</button><br>
          <input type="int" name="prange2"/>
    </form>
  </div>
</div>

<div class="widget price-range">
  <h4 class="widget-header">Size Range</h4>
  <div class="block">
    <form action="home.php?range2=2" method="POST">
          <input type="int" name="srange1"/><br>
          <button class="btn btn-transparent" type="submit">Find</button><br>
          <input type="int" name="srange2"/>
    </form>
  </div>
</div>

        </div>
      </div>
      <div class="col-md-9">
        <div class="category-search-filter">
          <div class="row">
            <div class="col-md-6">
            </div>
            <div class="col-md-6">
            </div>
          </div>
        </div>


        <?php
        
        if(isset($_GET['range1']) || isset($_GET['range2'])){
          ?>
                  <div class="product-grid-list">
                  <div class="row mt-30">
                  <?php
                      $link = mysqli_connect("localhost", "root","") or die(mysql_error());
                      mysqli_select_db($link, "rent_it_3") or die("Cannot connect to database");
                      if(isset($_GET['range1'])){
                        $range1 = mysqli_real_escape_string($link, $_POST['prange1']);
                        $range2 = mysqli_real_escape_string($link, $_POST['prange2']);
                        $sql = "SELECT * FROM posts WHERE price>=$range1 AND price<=$range2";
                      }
                      else if(isset($_GET['range2'])){
                        $range1 = mysqli_real_escape_string($link, $_POST['srange1']);
                        $range2 = mysqli_real_escape_string($link, $_POST['srange2']);
                        $sql = "SELECT * FROM posts WHERE prop_size>=$range1 AND prop_size<=$range2";
                      }
                      $query = mysqli_query($link, $sql)or die( mysqli_error($link));
                      while($row = mysqli_fetch_array($query)){
                        $post_id = $row['post_id'];
                          $post_id = $row['post_id'];
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
                             $sql = "select image from pictures where post_id = $temp";
                             $result = mysqli_query($con,$sql);
                             $row = mysqli_fetch_array($result);

                             $image_src2 = $row['image'];

                  ?>
                    <div class="col-sm-12 col-lg-4 col-mg-6">
                    <!-- product card -->
                    <div class="product-item bg-light">
                      <div class="card">
                        <div class="thumb-content">
                          <!-- <div class="price">$200</div> -->
                          <a href="">
                            <!--<img class="card-img-top img-fluid" src="images/products/products-1.jpg" alt="Card image cap">-->
                            <?php echo '<img value="$temp" src="'.$image_src2.'" width="255" height="255"/>' ?>
                          </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><a href="singlepost.php?temp=<?php echo $temp ?>"><?php echo $post ?>  <i class="fa fa-angle-right"></i></a></h4>
                            <!--<button="btn btn-main" name="type" value="<?= $type ?>" ><p><?php echo $type ?></p></button>-->
                            <ul class="list-inline product-meta">
                              <li class="list-inline-item">
                                <a href=""><i class="fa fa-folder-open-o"></i><?php echo $acc ?></a>
                              </li>
                              <li class="list-inline-item">
                                <a href=""><i class="fa fa-calendar"></i><?php echo $date ?></a>
                              </li>
                            </ul>
                            <p class="card-text">BDT: <?php echo $price ?></p>
                            <p class="card-text"><?php echo $prop ?> (sq.ft.)</p>
                            <p class="card-text">Road <?php echo $street ?>, <?php echo $area ?></p>
                            <p class="card-text">More: <?php echo $add ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
                }
              ?>
        </div>
        </div>
        <?php
        }
        else if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['drop'])){
          ?>
                  <div class="product-grid-list">
                  <div class="row mt-30">
                  <?php
                      $link = mysqli_connect("localhost", "root","") or die(mysql_error());
                      mysqli_select_db($link, "rent_it_3") or die("Cannot connect to database");
                      $search = mysqli_real_escape_string($link, $_POST['search']);
                      $drop = mysqli_real_escape_string($link, $_POST['drop']);
                      $query = mysqli_query($link, "SELECT * FROM posts WHERE $drop='$search'")or die( mysqli_error($link) );;
                      while($row = mysqli_fetch_array($query)){
                          $post_id = $row['post_id'];
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
                             $sql = "select image from pictures where post_id = $temp";
                             $result = mysqli_query($con,$sql);
                             $row = mysqli_fetch_array($result);

                             $image_src2 = $row['image'];

                  ?>
                    <div class="col-sm-12 col-lg-4 col-mg-6">
                    <!-- product card -->
                    <div class="product-item bg-light">
                      <div class="card">
                        <div class="thumb-content">
                          <!-- <div class="price">$200</div> -->
                          <a href="">
                            <!--<img class="card-img-top img-fluid" src="images/products/products-1.jpg" alt="Card image cap">-->
                            <?php echo '<img value="$temp" src="'.$image_src2.'" width="255" height="255"/>' ?>
                          </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><a href="singlepost.php?temp=<?php echo $temp ?>"><?php echo $post ?>  <i class="fa fa-angle-right"></i></a></h4>
                            <!--<button="btn btn-main" name="type" value="<?= $type ?>" ><p><?php echo $type ?></p></button>-->
                            <ul class="list-inline product-meta">
                              <li class="list-inline-item">
                                <a href=""><i class="fa fa-folder-open-o"></i><?php echo $acc ?></a>
                              </li>
                              <li class="list-inline-item">
                                <a href=""><i class="fa fa-calendar"></i><?php echo $date ?></a>
                              </li>
                            </ul>
                            <p class="card-text">BDT: <?php echo $price ?></p>
                            <p class="card-text"><?php echo $prop ?> (sq.ft.)</p>
                            <p class="card-text">Road <?php echo $street ?>, <?php echo $area ?></p>
                            <p class="card-text">More: <?php echo $add ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
                }
              ?>
        </div>
        </div>
        <?php
        }
        else if(isset($_GET['temp']) && $_GET['temp'] != "all"){
          ?>
                  <div class="product-grid-list">
                  <div class="row mt-30">
                  <?php
                      $link = mysqli_connect("localhost", "root","") or die(mysql_error());
                      mysqli_select_db($link, "rent_it_3") or die("Cannot connect to database");
                      $post = mysqli_real_escape_string($link, $_GET['temp']);
                      $query = mysqli_query($link, "SELECT * FROM posts WHERE acc_type = '$post'")or die( mysqli_error($link) );;
                      while($row = mysqli_fetch_array($query)){
                        $post_id = $row['post_id'];
                          $post_id = $row['post_id'];
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
                             $sql = "select image from pictures where post_id = $temp";
                             $result = mysqli_query($con,$sql);
                             $row = mysqli_fetch_array($result);

                             $image_src2 = $row['image'];

                  ?>
                    <div class="col-sm-12 col-lg-4 col-mg-6">
                    <!-- product card -->
                    <div class="product-item bg-light">
                      <div class="card">
                        <div class="thumb-content">
                          <!-- <div class="price">$200</div> -->
                          <a href="">
                            <!--<img class="card-img-top img-fluid" src="images/products/products-1.jpg" alt="Card image cap">-->
                            <?php echo '<img value="$temp" src="'.$image_src2.'" width="255" height="255"/>' ?>
                          </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><a href="singlepost.php?temp=<?php echo $temp ?>"><?php echo $post ?>  <i class="fa fa-angle-right"></i></a></h4>
                            <!--<button="btn btn-main" name="type" value="<?= $type ?>" ><p><?php echo $type ?></p></button>-->
                            <ul class="list-inline product-meta">
                              <li class="list-inline-item">
                                <a href=""><i class="fa fa-folder-open-o"></i><?php echo $acc ?></a>
                              </li>
                              <li class="list-inline-item">
                                <a href=""><i class="fa fa-calendar"></i><?php echo $date ?></a>
                              </li>
                            </ul>
                            <p class="card-text">BDT: <?php echo $price ?></p>
                            <p class="card-text"><?php echo $prop ?> (sq.ft.)</p>
                            <p class="card-text">Road <?php echo $street ?>, <?php echo $area ?></p>
                            <p class="card-text">More: <?php echo $add ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
                }
              ?>
        </div>
        </div>
        <?php
        }
          else if(isset($_GET['sort'])){
          ?>
                  <div class="product-grid-list">
                  <div class="row mt-30">
                  <?php
                      $link = mysqli_connect("localhost", "root","") or die(mysql_error());
                      mysqli_select_db($link, "rent_it_3") or die("Database connection error!");
                      $sort = mysqli_real_escape_string($link, $_GET['sort']);
                      $sql = "SELECT * FROM posts ORDER BY (date_posted) DESC";
                      if($_GET['sort'] == "1"){
                        $sql = "SELECT * FROM posts ORDER BY (date_posted) DESC";
                      }
                      else if($_GET['sort'] == "2"){
                        $sql = "SELECT * FROM posts ORDER BY (price) ASC";
                      }
                      else if($_GET['sort'] == "3"){
                        $sql = "SELECT * FROM posts ORDER BY (price) DESC";
                      }
                      $query = mysqli_query($link, $sql)or die( mysqli_error($link) );;
                      while($row = mysqli_fetch_array($query)){
                          $post_id = $row['post_id'];
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
                             $sql = "select image from pictures where post_id = $temp";
                             $result = mysqli_query($con,$sql);
                             $row = mysqli_fetch_array($result);

                             $image_src2 = $row['image'];

                  ?>
                    <div class="col-sm-12 col-lg-4 col-mg-6">
                    <!-- product card -->
                    <div class="product-item bg-light">
                      <div class="card">
                        <div class="thumb-content">
                          <!-- <div class="price">$200</div> -->
                          <a href="">
                            <!--<img class="card-img-top img-fluid" src="images/products/products-1.jpg" alt="Card image cap">-->
                            <?php echo '<img value="$temp" src="'.$image_src2.'" width="255" height="255"/>' ?>
                          </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><a href="singlepost.php?temp=<?php echo $temp ?>"><?php echo $post ?><i class="fa fa-angle-right"></i></a></h4>
                            <!--<button="btn btn-main" name="type" value="<?= $type ?>" ><p><?php echo $type ?></p></button>-->
                            <ul class="list-inline product-meta">
                              <li class="list-inline-item">
                                <a href=""><i class="fa fa-folder-open-o"></i><?php echo $acc ?></a>
                              </li>
                              <li class="list-inline-item">
                                <a href=""><i class="fa fa-calendar"></i><?php echo $date ?></a>
                              </li>
                            </ul>
                            <p class="card-text">BDT: <?php echo $price ?></p>
                            <p class="card-text"><?php echo $prop ?> (sq.ft.)</p>
                            <p class="card-text">Road <?php echo $street ?>, <?php echo $area ?></p>
                            <p class="card-text">More: <?php echo $add ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
                }
              ?>
        </div>
        </div>
        <?php
        }
        else{
          ?>
                  <div class="product-grid-list">
                  <div class="row mt-30">
                  <?php
                      $link = mysqli_connect("localhost", "root","") or die(mysql_error());
                      mysqli_select_db($link, "rent_it_3") or die("Cannot connect to database");
                      $query = mysqli_query($link, "SELECT * from posts");
                      while($row = mysqli_fetch_array($query)){
                          $post_id = $row['post_id'];
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
                             $sql = "select image from pictures where post_id = $temp";
                             $result = mysqli_query($con,$sql);
                             $row = mysqli_fetch_array($result);

                             $image_src2 = $row['image'];

                  ?>
                    <div class="col-sm-12 col-lg-4 col-mg-6">
                    <!-- product card -->
                    <div class="product-item bg-light">
                      <div class="card">
                        <div class="thumb-content">
                          <!-- <div class="price">$200</div> -->
                          <a href="">
                            <!--<img class="card-img-top img-fluid" src="images/products/products-1.jpg" alt="Card image cap">-->
                            <?php echo '<img value="$temp" src="'.$image_src2.'" width="255" height="255"/>' ?>
                          </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><a href="singlepost.php?temp=<?php echo $temp ?>"><?php echo $post ?>  <i class="fa fa-angle-right"></i></a></h4>
                            <!--<button="btn btn-main" name="type" value="<?= $type ?>" ><p><?php echo $type ?></p></button>-->
                            <ul class="list-inline product-meta">
                              <li class="list-inline-item">
                                <a href=""><i class="fa fa-folder-open-o"></i><?php echo $acc ?></a>
                              </li>
                              <li class="list-inline-item">
                                <a href=""><i class="fa fa-calendar"></i><?php echo $date ?></a>
                              </li>
                            </ul>
                            <p class="card-text">BDT: <?php echo $price ?></p>
                            <p class="card-text"><?php echo $prop ?> (sq.ft.)</p>
                            <p class="card-text">Road <?php echo $street ?>, <?php echo $area ?></p>
                            <p class="card-text">More: <?php echo $add ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
                }
              ?>
        </div>
        </div>
        <?php
        }
        ?>


      </div>
    </div>
  </div>
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

