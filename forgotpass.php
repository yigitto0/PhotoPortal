<?php
    include 'header.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <meta name="description" content=""> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/stylefp.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Tangerine&display=swap" rel="stylesheet">
    <title>Forgot Password</title>
</head>
<body>
	<div class="container">
        <section id="fp-box">
            <h3 id="fpht">Forgot Your Password?</h3>
            <h3 id="fptht">Please type your email. We will send your username and password.</h3><br>
            <form action="config/forgotten_password.php" method="POST">
            <?php if (isset($_SESSION['success'])) { ?>
            <div id="success"><?php echo $_SESSION['success']; unset($_SESSION['success']);?></div>
            <?php } ?>
            <?php if (isset($_SESSION['error-msg'])) { ?>
            <div id="error-msg"><?php echo $_SESSION['error-msg']; unset($_SESSION['error-msg']);?></div>
            <?php } ?>
                <div class="fp-textbox">
                    <i class="fas fa-envelope"></i>
                    <input type="textbox" name="email" placeholder="Your e-mail adress"required>
                </div>
                <input class="fp-btn" type="submit" name="forgotpass" value="Send">
                <div class="extras">Don't have an account? <a class="extra" href="signup.php" target="_parent">Sign Up</a></div>
            </form>
        </section>
        </div>
    </form>
</body>
</html>
<?php 
    include ('footer.php');
?>