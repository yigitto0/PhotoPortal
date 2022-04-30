<?php
use PHPMailer\PHPMailer\PHPMailer;

session_start();

require_once '../phpmailer/Exception.php';
require_once '../phpmailer/PHPMailer.php';
require_once '../phpmailer/SMTP.php';

$mail = new PHPMailer(true);

if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$email = $_POST['email'];
	$message = $_POST['message'];

		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'photoportalsup@gmail.com';
		$mail->Password = 'photoportal123';
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
		$mail->Port = '587';

		$mail->setFrom('photoportalsup@gmail.com');
		$mail->addAddress('photoportalsup@gmail.com');

		$mail->isHTML(true);
		$mail->Subject = 'Message Received (Contact Page)';
		$mail->Body = "<h3>Name : '$username', <br>Email: '$email', <h3>message :'$message'<h3>";

		
		if ($mail->send()) {
            $_SESSION['success'] = "Successfully sended!";
            header ('Location:../contact.php');
        }
            else {
                $_SESSION['error-msg'] = "Failed!";
                header ('Location:../contact.php');
            }
    
        }       
else {
    $_SESSION['error-msg'] = "Progress failed!";
    header ('Location:../contact.php');
}

?>