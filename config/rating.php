<?php
    require_once 'config.php';
    session_start();

    if (isset($_POST['submit'])) {
        $rate = $_POST['rate'];
        $username = $_SESSION['username'];
        $postid = $_POST['postid'];

        $rate_query = "INSERT INTO votes (userid, postid, rate) VALUES ('$username', '$postid', '$rate');";
        $rate_query .= "UPDATE posts SET rating = rating + $rate WHERE photoid = '$postid'";
        $rate_result = mysqli_multi_query($conn, $rate_query);

        if ($rate_result) {
            echo "1";
        } else {
            echo "0";
        }
    } 
?>
