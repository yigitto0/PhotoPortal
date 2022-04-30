<?php 
include 'config/register.php';
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="description" content=""> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Tangerine&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/stylesu.css">
    <link href='https://css.gg/danger.css' rel='stylesheet'>
    <link href='https://css.gg/check-o.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>Sign Up</title>
</head>
<body>
	<div class="container">
        <section id="su-box">
            <h3 id="suht">Sign Up</h3>
            <h4 id="welcometxt">Welcome to the Photo Portal!</h4>
            <form id ="form" class="form" action="" method="POST" auto_complete="off">
                 <div id="username" class="form-control">
                    <label for="username"><i class="fa fa-user-circle"></i></label>
                    <input type="textbox" name="username" placeholder="Username">
                    <small class="error">Error message</small>
                </div>
                <div id="email" class="form-control">
                    <label for="email"><i class="fa fa-envelope"></i></label>
                    <input type="email" name="email" placeholder="email@example.com" required>
                    <small>Error message</small>
                </div>
                <div id="password" class="form-control">
                    <label for="password"><i class="fas fa-lock"></i></label>
                    <input type="Password" name="password" placeholder="Password">
                    <small>Error message</small>
                </div>
                <div id="conpass" class="form-control">
                    <label for="conpass"><i class="fas fa-lock"></i></label>
                    <input type="Password" name="confirmpassword" placeholder="Confirm Password">
                    <small>Error message</small>
                </div>   
                <button id ="reg-btn" type="submit" name="signup">Sign up
                <input type="hidden" name="signup" value=""></button>

            </form>
            <div class="su-extras"><a class="extra" href="index.php" target="_parent">Already have an account?</a></div>
        </section>
        </div>
        <script type="text/javascript" src="js/signupvalidation.js"></script>
</body>
</html>
<?php 
    include ('footer.php');
?>