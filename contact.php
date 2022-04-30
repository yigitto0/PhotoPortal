<?php
	include 'header.php';
	session_start();
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Contact Page</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="undefined" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style-contact.css">
	
</head>
<body>
	<section id="contact-box">
		<div class="contactForm">
			<form id="contact-form" class="contact-form" action="config/sendemail.php" method="POST">
			<h3 id="contactht">Contact Us</h3>
			<h4 id="paragraph">Want to get in touch? We'd love to hear from you. Here's how you can reach us...</h4>
			<?php if (isset($_SESSION['success'])) { ?>
            <div id="success"><?php echo $_SESSION['success']; unset($_SESSION['success']);?></div>
            <?php } ?>
            <?php if (isset($_SESSION['error-msg'])) { ?>
            <div id="error-msg"><?php echo $_SESSION['error-msg']; unset($_SESSION['error-msg']);?></div>
            <?php } ?>
			<div class="inputBox">
				<input type="text" name="username" placeholder="Name" required>
			</div>
			<div class="inputBox">
				<input type="email" name="email" placeholder="Your e-mail" required>
			</div>
			<div class="inputBox">
				<textarea name="message" placeholder="Please Type your Message" required></textarea>
			</div>
			<div class="inputBox">
				<input id="send-btn" type="submit" name="submit" value="Send">
			</div>
		</div>
		</form>
	</section>
</body>
</html>
<?php
	include 'footer.php';
?>