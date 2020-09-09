<?php
   session_start(); //starts the session
   if($_SESSION['user']){ // checks if the user is logged in  
   }
   else{
      header("location: index.php"); // redirects if user is not logged in
   }
   $user = $_SESSION['user']; //assigns user value
?>
<?php
	$link = mysqli_connect("localhost", "root","") or die(mysql_error());
	  mysqli_select_db($link, "rent_it_3") or die("Cannot connect to database");
	  $temp = $_GET['id'];
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

	      $sql2 = "SELECT * FROM users WHERE username = '$userdisp'";
          $query = mysqli_query($link, $sql2);
          $row = mysqli_fetch_array($query);
          $email_poster = $row['email'];

          $sql3 = "SELECT * FROM users WHERE username = '$user'";
          $query = mysqli_query($link, $sql3);
          $row = mysqli_fetch_array($query);
          $email_responder = $row['email'];


    $headers =  'MIME-Version: 1.0' . "\r\n"; 
	$headers .= 'From: Your name <".$email_responder.">' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
    $subject = 'A Post On RENT IT Has Been Booked';
    $message = 'Your post, ".$acc." for ".$post." at Road: ".$street.", ".$area.", on RENT IT has been booked. Please respond to the following email address: ".$emal_responder."';

    mail($email_poster, $subject, $message, $headers);
?>