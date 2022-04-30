<?php   
require 'config/config.php';
include 'config/login.php';
include 'header.php';


?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content=""> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Photo Portal</title>
</head>
<body>
    <div class="container">
        <section id="login">
            <div class="loginbox">
                <h3 id="loginht">Log in</h3>
                <?php if (isset($_SESSION['errormsg'])) { ?>
                <div id="errormsg"><?php echo $_SESSION['errormsg']; unset($_SESSION['errormsg']);?></div>
                <?php } ?>
                <form id="login-form" action="config/login.php" method="POST" auto_complete="off">
                    <div class="textbox">
                        <i class="fas fa-user log-icon"></i>
                        <input id="username" class="log-input" type="text" name="username" placeholder="Username" required>
                    </div>
                    <div class="textbox">
                        <i class="fas fa-lock log-icon"></i>
                        <input id="password" class="log-input" type="password" name="password" placeholder="Password" required>
                    </div>
                    <input id="log-btn" class="btn log-input" type="submit" name="login" value="Sign in">
                    <div class="index-links">
                        <div class="extras"><a class="extra" href="forgotpass.php" target="_parent">Forgot password?</a></div>
                        <div class="extras">Don't have an account? <a class="extra" href="signup.php" target="_parent">Sign Up</a></div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</body>
</html>
<?php 
    include ('footer.php');
?>