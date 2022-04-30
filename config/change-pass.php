<?php

include 'config.php';

session_start();

if(isset($_POST['changepass'])){

    $currpass = mysqli_real_escape_string($conn,$_POST['currpass']);
    $newpass = mysqli_real_escape_string($conn,$_POST['newpass']);
    $conpass = mysqli_real_escape_string($conn,$_POST['conpass']);
    $username = $_SESSION['username'];

    $sql=mysqli_query($conn,"SELECT password FROM users WHERE password='$currpass' and username='$username'");
    $num=mysqli_fetch_array($sql);

    if($num>0){

        if ($newpass !== $conpass) {
            $_SESSION['message'] = "Passwords are not matched!";
            header ('Location:../profile.php');  
        } else {
            $con = mysqli_query($conn,"UPDATE users SET password='$newpass' WHERE username='$username'");
            header ('Location:../stream.php');    
        }
    }
    else
    {
        $_SESSION['message'] = "Wrong password!";
        header ('Location:../profile.php');
    }
    }

?>