<?php
   session_start(); //starts the session
   if($_SESSION['user']){ // checks if the user is logged in  
   }
   else{
      header("location: index.php"); // redirects if user is not logged in
   }
   $user = $_SESSION['user']; //assigns user value

$regValue = $_SESSION['user'];
$result = false;
$dbhost = 'localhost';
$username = 'root';
$password = '';
$db = 'rent_it_3';
$post = $_POST['PostType'];
$dur = $_POST['Duration'];
$acc = $_POST['AccType'];
$prop = $_POST['PropSize'];
$floor = $_POST['Floor'];
$flat = $_POST['Flat'];
$direc = $_POST['DirecFacing'];
$area = $_POST['Area'];
$street = $_POST['Street'];
$house = $_POST['House'];
$price = $_POST['Price'];
$add = $_POST['AddDetails'];
$parking = $_POST['Parking'];
$lift = $_POST['Lift'];
$generator = $_POST['Generator'];
$desc = $_POST['Description'];
$date = date('Y-m-d H:i:s');
$time = strftime("%X"); //time
if($_SERVER['REQUEST_METHOD']=='POST'){
	$conn = new mysqli($dbhost,$username,$password,$db);
	if($conn){
		$sql='insert into `posts`(`sale_rent_lease`,`duration`,`acc_type`,`floor`,`flat`,`prop_size`,`direc_facing`,`area`,`street`,`house`,`price`,`add_details`,`parking`,`lift`,`generator`,`user`,`date_posted`,`time_posted`,`description`) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);';
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('sssssssssssssssssss',$post, $dur, $acc, $floor, $flat, $prop, $direc, $area, $street, $house, $price, $add, $parking, $lift, $generator, $regValue, $date, $time, $desc);
		$result=$stmt->execute();
		header('Location:addimage.php');
		}
		$conn->close();	
	}
?>
