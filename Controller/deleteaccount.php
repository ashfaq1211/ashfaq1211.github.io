<?php
	session_start(); //starts the session
	if($_SESSION['user']){ //checks if user is logged in
	}
	else{
		header("location:index.php"); // redirects if user is not logged in
	}
	if($_SERVER['REQUEST_METHOD'] == "GET")
	{
		$link = mysqli_connect("localhost", "root","") or die(mysql_error());//Connect to server
		mysqli_select_db($link, "rent_it_3") or die("Cannot connect to database"); //Connect to database
		$id = $_GET['id'];
		mysqli_query($link, "DELETE FROM posts WHERE post_id='$id'");
		mysqli_query($link, "DELETE FROM pictures WHERE post_id='$id'");
		mysqli_query($link, "DELETE FROM comments_and_reviews WHERE post_id='$id'");
		mysqli_query($link, "DELETE FROM users WHERE username='$user'");
		header("location: logout.php");
	}
?>