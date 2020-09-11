<?php
  $link = mysqli_connect("localhost", "root","") or die(mysql_error()); //Connect to server
  $username = mysqli_real_escape_string($link, $_POST['username']);
  $email = mysqli_real_escape_string($link, $_POST['email']);
  $password = mysqli_real_escape_string($link, $_POST['password']);
    $bool = true;

  mysqli_select_db($link, "rent_it_3") or die("Cannot connect to database"); //Connect to database
  $query = mysqli_query($link, "Select * from users"); //Query the users table
  while($row = mysqli_fetch_array($link, $query)) //display all rows from query
  {
    $table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
    if($username == $table_users) // checks if there are any matching fields
    {
      $bool = false; // sets bool to false
      Print '<script>alert("Username has been taken!");</script>'; //Prompts the user
      Print '<script>window.location.assign("../../MVC/View/register.php");</script>'; // redirects to register.php
    }
    $table_users_2 = $row['email'];
    if($email == $table_users_2){
      $bool = false; // sets bool to false
      Print '<script>alert("An account with used email already exists!");</script>'; //Prompts the user
      Print '<script>window.location.assign("../../MVC/View/register.php");</script>'; // redirects to register.php
    }
  }
  if($bool) // checks if bool is true
  {
    mysqli_query($link, "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')"); //Inserts the value to table users
    Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
    Print '<script>window.location.assign("../../MVC/View/index.php");</script>'; // redirects to register.php
  }
?>
