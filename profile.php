<?php 
    include ('st-header.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="description" content=""> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylecp.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Tangerine&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link href='https://css.gg/add.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <title>Change Password</title>
</head>
<body>
	<div class="container">
        <section id="cp-box">
            <h3 id="cpht">Change Your Password</h3>
            <form id="changepass" action="config/change-pass.php" method="POST" >
            <?php if (isset($_SESSION['message'])) { ?>
            <div id="message"><?php echo $_SESSION['message']; unset($_SESSION['message']);?></div>
            <?php } ?>
                <div class="textbox">
                    <i class="fas fa-lock"></i>
                    <input id="currpass" type="password" name="currpass" placeholder="Current Password" required>
                </div>
                <div class="textbox">
                    <i class="fas fa-lock"></i>
                    <input id="newpass" type="password" name="newpass" placeholder="New Password"required>
                </div>
                <div class="textbox">
                    <i class="fas fa-lock"></i>
                    <input id="conpass" type="password" name="conpass" placeholder="Confirm Password"required>
                </div>
                <input class="btn" type="submit" name="changepass" value="Change">
            </form>
    <?php
        include ('addphoto.php');
    ?>
        </section>
    </div>
</body>
</html>
