<?php
use PHPMailer\PHPMailer\PHPMailer;
require_once 'config.php';

session_start();

require_once '../phpmailer/Exception.php';
require_once '../phpmailer/PHPMailer.php';
require_once '../phpmailer/SMTP.php';

$mail = new PHPMailer(true);

if(isset($_POST['forgotpass'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $sql = "SELECT password,email,username FROM  users WHERE email = '$email'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($res);

    if($row == 1){
        $r = mysqli_fetch_assoc($res);
        $password = $r['password'];
        $username = $r['username'];
        
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'photoportalsup@gmail.com';
            $mail->Password = 'photoportal123';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = '587';
    
            $mail->setFrom('photoportalsup@gmail.com');
            $mail->addAddress($r['email']);
    
            $mail->isHTML(true);
            $mail->Subject = 'Password';
            $mail->Body = "Username = '$username' <br> Your password is '$password'";
    
            
        if ($mail->send()) {
            $_SESSION['success'] = "Password has send your email.";
            header ('Location:../forgotpass.php');
        }
            else {
                $_SESSION['error-msg'] = "Progress failed!";
                header ('Location:../forgotpass.php');
            }
    
        }       
else {
    $_SESSION['error-msg'] = "Email does not exist!";
    header ('Location:../forgotpass.php');
}
} else{
    $_SESSION['error-msg'] = "Progress failed!";
    header ('Location:../forgotpass.php');
}


?>