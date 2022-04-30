<?php 
    include ('config.php');
    $username = $_POST["signup"];
    $query = ("SELECT * FROM users WHERE username = '$username' LIMIT 1");
    $result = mysqli_query($conn, $query);

    $email = $_POST["email"];
    $queryemail = ("SELECT * FROM users WHERE email = '$email' LIMIT 1");
    $resultemail = mysqli_query($conn, $queryemail);

    if ($result->num_rows == 1 && $resultemail->num_rows == 1) {
        echo "1";
    } else if ($result->num_rows == 1){
        echo "2";
    } else if ($resultemail->num_rows == 1) {
        echo "3";
    } else {
        echo "0";
    }


?>