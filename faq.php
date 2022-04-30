<?php
	include ('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="css/stylefaq.css">
	<meta charset="utf-8">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<title>FAQ</title>
</head>
<body>
	<div class="box">
		<h1 class="heading">FAQs<h1>
		<div class="faqs">
			<details>
				<summary>Q1. How can I upload a photo?</summary>
				<p class="text">->After logging into the site, users can upload the photo to the site by clicking the upload photo icon in the top navigation.</p>
			</details>
			<details>
				<summary>Q2. How many photos can I upload in a day?</summary>
				<p class="text">->Users can upload up to 3 photos per day.</p>
			</details>
			<details>
				<summary>Q3. How users can contact us ?</summary>
				<p class="text">->By clicking the <a class="contact-link" href="contact.php"> "contact" </a> page in the top navigation.</p>
			</details>
			<details>
				<summary>Q4. How do I register on the site?</summary>
				<p class="text">->You can easily become a new member of the Photo Portal family by clicking <a class="contact-link" href="signup.php"> "sign up" </a> in the login page .</p>
			</details>
			<details>
				<summary>Q5. How do I change my password?</summary>
				<p class="text">->You can change your password by clicking the <a class="contact-link" href="forgotpass.php"> "forgot password" </a> section on the login page.</p>
			</details>
		</div>
	</div>
</body>
</html>

<?php 
	include ('footer.php');
?>
