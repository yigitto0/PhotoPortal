<?php
include ('st-header.php');

require_once ('config/config.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/stream.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Tangerine&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link href='https://css.gg/add.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Tinos:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>Photo Portal</title>
</head>
<body>
<script type="text/javascript" src="js/rating.js"></script>
    <div class="content">
    <?php
        include ('addphoto.php');
    ?>
        <div class="column">
            <div class="left">
            <?php 
            
            $upload_query = "SELECT * FROM posts ORDER BY photoid DESC";
            $upload_rs = mysqli_query($conn, $upload_query);

            while ($row = mysqli_fetch_array($upload_rs)) {
                $userid = $row['userid'];
                $username = $_SESSION['username'];
                $photoid = $row['photoid'];
                $rating_query = "SELECT * FROM votes WHERE userid = '$username' and postid = '$photoid'";
                $result_rating = mysqli_query($conn, $rating_query);
                $rating_row = mysqli_fetch_assoc($result_rating);
                echo "<div class='cards'>";
                    echo "<div class='left-name'>". $userid ."</div>";
                    echo "<div class='left-title'>". $row['title'] ."</div>";
                    echo "<div class='left-img'><img id='img' src='". "uploads/". $row['urlimg'] . "' alt='image'></div>";
                    if (mysqli_num_rows($result_rating) == 0) {
                        echo "<div class='rating'>
            <i class='fas fa-star' onmouseout='ratingstarsout(". $row['photoid'] .",1)' onmouseover='ratingstarsin(". $row['photoid'] .",1)' onclick='rating(". $row['photoid'] .",1)'></i>
            <i class='fas fa-star' onmouseout='ratingstarsout(". $row['photoid'] .",2)' onmouseover='ratingstarsin(". $row['photoid'] .",2)' onclick='rating(". $row['photoid'] .",2)'></i>
            <i class='fas fa-star' onmouseout='ratingstarsout(". $row['photoid'] .",3)' onmouseover='ratingstarsin(". $row['photoid'] .",3)'onclick='rating(". $row['photoid'] .",3)'></i>
            <i class='fas fa-star' onmouseout='ratingstarsout(". $row['photoid'] .",4)' onmouseover='ratingstarsin(". $row['photoid'] .",4)' onclick='rating(". $row['photoid'] .",4)'></i>
        <i class='fas fa-star' onmouseout='ratingstarsout(". $row['photoid'] .",5)' onmouseover='ratingstarsin(". $row['photoid'] .",5)' onclick='rating(". $row['photoid'] .",5)'></i>
    </div>";
                    } else {
                        echo "<div class='rating'>";
                        for ($i=0; $i < $rating_row['rate']; $i++) { 
                            
                            echo "<i class='fas fa-star' style='color: #d8b106;'></i>";
                        }

                        for ($i=0; $i < 5 - $rating_row['rate']; $i++) { 
                            
                            echo "<i class='fas fa-star'></i>";
                        }     echo "</div>";

                    }

                echo "</div>";
            }
            ?>
            </div>

            <div class="right">
                <h2>Photos of The Day</h2>
                <?php 
  
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
                $daily_query = "SELECT * FROM posts WHERE postdate > '$date2' ORDER BY rating DESC LIMIT 3 ";
                $daily_rs = mysqli_query($conn, $daily_query);

                if ($daily_rs) {
                    while ($fetch = mysqli_fetch_assoc($daily_rs)) {
                        echo "<div class='right-title'>". $fetch['title'] ."</div>";
                        echo '<img src="uploads/'. $fetch['urlimg'] .'" class="right-img">';
                    } 
                } else {
                    echo '
                    <p class="right-name">name</p>
                    <img class="right-img">
                    <p class="right-name">name</p>
                    <img class="right-img">
                    <p class="right-name">name</p>
                    <img class="right-img">';
                }
                
                
                
                ?>
            </div>


        </div>
    </div>
    <script type="text/javascript" src="js/rating.js"></script>
</body>
</html>