<?php

//Order Confirmation Email
include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'phpmailer' . DIRECTORY_SEPARATOR . 'PHPMailerAutoload.php';

$to = "joel@drcolbert.com";
$mail = new PHPMailer;
$mail->isSMTP();
// Set mailer to use SMTP
$mail->Host = 'mail.drcolbert.com';
// Specify main and backup server
$mail->SMTPAuth = true;
// Enable SMTP authentication
$mail->Username = 'info@drcolbert.com';
// SMTP username
$mail->Password = 'Drcolbert120';
// SMTP password
$mail->From = 'info@drcolbert.com';
$mail->FromName = 'Divine Health Sales Department';
$mail->addAddress($_POST['email']);
$mail->addBCC('joel@drcolbert.com');
// Name is optional
$mail->WordWrap = 50;
// Set word wrap to 50 characters
$mail->isHTML(true);
// Set email format to HTML
$mail->Subject = $emailSubject;
ob_start();
include(dirname(__FILE__).'/phpmailer/email.php');
$mail->Body = ob_get_contents();
ob_end_clean();
//$mail->Body    = $body;
$mail->AltBody = 'Thank you for your order from Divine Health.';

if(!$mail->send()) {
	echo 'Message could not be sent.';
	echo 'Mailer Error: ' . $mail->ErrorInfo;
	$error = $_POST['email'] . "did not send<br />" . $mail->ErrorInfo;
	mail("joel@drcolbert.com","Divine Health Detox Email Error", $error, "Content-Type: text/html; charset=ISO-8859-1\r\n");
}

//Welcome Email
$to = "joel@drcolbert.com";
$mail = new PHPMailer;
$mail->isSMTP();
// Set mailer to use SMTP
$mail->Host = 'mail.drcolbert.com';
// Specify main and backup server
$mail->SMTPAuth = true;
// Enable SMTP authentication
$mail->Username = 'info@drcolbert.com';
// SMTP username
$mail->Password = 'Drcolbert120';
// SMTP password
$mail->From = 'info@drcolbert.com';
$mail->FromName = 'Divine Health Sales Department';
$mail->addAddress($_POST['email']);
$mail->addBCC('joel@drcolbert.com');
// Name is optional
$mail->WordWrap = 50;
// Set word wrap to 50 characters
$mail->isHTML(true);
// Set email format to HTML
$mail->Subject = "Welcome to Divine Health Detox!";
ob_start();
include(dirname(__FILE__).'/phpmailer/email_welcome.php');
$mail->Body = ob_get_contents();
ob_end_clean();
//$mail->Body    = $body;
$mail->AltBody = 'Welcome to Divine Health Detox!';

if(!$mail->send()) {
	echo 'Message could not be sent.';
	echo 'Mailer Error: ' . $mail->ErrorInfo;
	$error = $_POST['email'] . "did not send<br />" . $mail->ErrorInfo;
	mail("joel@drcolbert.com","Divine Health Detox Email Error", $error, "Content-Type: text/html; charset=ISO-8859-1\r\n");
}
?>
