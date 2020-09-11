<?php
   session_start(); //starts the session
   if($_SESSION['user']){ // checks if the user is logged in  
   }
   else{
      header("location: ../../MVC/View/index.php"); // redirects if user is not logged in
   }
   $user = $_SESSION['user']; //assigns user value
?>

<?php
$regValue = $_SESSION['user'];
$dbhost = 'localhost';
$username = 'root';
$password = '';
$db = 'rent_it_3';
$link = mysqli_connect("localhost", "root","") or die(mysql_error());
$comment = mysqli_real_escape_string($link, $_POST['comment']);
$post_id = mysqli_real_escape_string($link, $_GET['temp']);
$user = $_SESSION['user'];
$date = date('Y-m-d H:i:s');
echo $comment;
echo $post_id;
echo $user;
if($_SERVER['REQUEST_METHOD']=='POST'){
	$conn = new mysqli($dbhost,$username,$password,$db);
	if($conn){
		$sql='insert into `comments_and_reviews`(`user`,`post_id`,`comments`,`com_date`) values(?,?,?,?);';
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('ssss',$user, $post_id, $comment, $date);
		$result=$stmt->execute();
		header('Location:../../MVC/View/home.php');
		}
		$conn->close();	
	}
?>
