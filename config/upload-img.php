<?php

require_once ('config.php');

session_start();

$username = $_SESSION["username"];
$imgtitle = $_POST["imgtitle"];

$date_query = "SELECT postdate FROM posts WHERE userid = '$username' ORDER BY photoid DESC LIMIT 1";
$date_result = mysqli_query($conn, $date_query);
$data_time = mysqli_fetch_assoc($date_result)['postdate']; 


$target_dir = "../uploads/";
$query = "SELECT urlimg FROM posts ORDER BY photoid DESC LIMIT 1";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
    $array = explode('.', $_FILES['imageup']['name']);
    $extension = end($array);
    $target_file = $target_dir . "0." . $extension;
    $target_name = "0." . $extension;
} else {
    $array = explode('.', $_FILES['imageup']['name']);
    $extension = end($array);
    $strtok = strtok(mysqli_fetch_assoc($result)["urlimg"], ".");
    $target_file = $target_dir . $strtok +1 . "." . $extension;
    $target_name = $strtok +1 . "." . $extension;
}



$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["uploadBtn"])) {
  $check = getimagesize($_FILES["imageup"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $uploadOk = 0;
  }
} else {
  echo "Failed";
}

$userquery = "SELECT postright FROM users WHERE username = '$username'";
$userresult = mysqli_query($conn, $userquery);
$num = mysqli_fetch_assoc($userresult)['postright'];

if ($num == 0) {
  $a = localtime()[0];
  $b = localtime()[1];
  $c = (1+localtime()[2])-24;
  $d = localtime()[3];
  $e = 1+localtime()[4];
  $f = 1900+localtime()[5];
  if($c<=0){
  $c = 24 + $c;
  $d = $d-1;
  }
  if($a < 10){
      $a = "0".$a;
  }
  if($b < 10){
      $b = "0".$b;
  }
  if($c < 10){
      $c = "0".$c;
  }
  if($d < 10){
      $d = "0".$d;
  }
  if($e < 10){
      $e = "0".$e;
  }
  $date2 = $f ."-". $e ."-". $d." ".$c.":".$b.":".$a;
  if ($date2 >= $data_time) {
    $time_query = "UPDATE users SET postright = '3' WHERE username = '$username'";
    $time_result = mysqli_query($conn, $time_query);
    $uploadOk = 1;
    $num = 2;
  } else {
    echo "You cannot upload more than 3 photos in a day. You will be directed automatically to stream page.";
    echo "<script>
window.setTimeout(function() {
    window.location = '../stream.php';
  }, 3000)</script>";
  $uploadOk = 0;
  }

} else {
  $uploadOk = 1;
  $num = $num - 1; 
}


if ($uploadOk == 0) {

// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["imageup"]["tmp_name"], $target_file)) {
      $sql = "INSERT INTO posts (userid, title, urlimg) VALUES ('$username', '$imgtitle', '$target_name');";
      $sql .= "UPDATE users SET postright = '$num' WHERE username = '$username'";
      $rs = mysqli_multi_query($conn, $sql);
      header('Location: ../stream.php');
    } else {
      echo "Progress failed. You will be directed automatically to stream page.";
      echo "<script>
    window.setTimeout(function() {
      window.location = '../stream.php';
    }, 3000)</script>";
    }
  } 


?>