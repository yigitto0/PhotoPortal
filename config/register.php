<?php

   require_once ("config.php");
   if(isset($_POST['signup'])) {
      $username = mysqli_real_escape_string($conn, $_POST["username"]);
      $email = mysqli_real_escape_string($conn, $_POST["email"]);
      $password = mysqli_real_escape_string($conn, $_POST["password"]);
      $confirmpassword = mysqli_real_escape_string($conn, $_POST["confirmpassword"]);

      $query = "insert into users (username, email, password) values ('$username', '$email', '$password')";
      $result = mysqli_query($conn, $query);


   }
?>