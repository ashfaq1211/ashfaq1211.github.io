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


    $link = mysqli_connect("localhost", "root","") or die(mysql_error());//Connect to server
    mysqli_select_db($link, "rent_it_3") or die("Cannot connect to database"); //Connect to database
    //$details = mysqli_real_escape_string($link, $_POST['value']);
    $details = $_GET['value'];
    mysqli_error($link);
    $id = $_SESSION['id'];
    $user = $_SESSION['user'];
    //$column = mysqli_real_escape_string($link, $_POST['drop']);
    $column = $_GET['drop'];
    //echo $id;
    //$time = strftime("%X");//time
    //$date = strftime("%B %d, %Y");//date
    mysqli_query($link, "UPDATE `posts` SET `$column`='$details' WHERE `post_id`='$id'");

    header("location: editpost.php?id=$id");

?>