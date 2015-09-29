<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 13.12.14
 * Time: 1:52
 */
$mail='
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<div style="min-height: 900px;">
    <div style="text-align: center;color: #245269;">
        <img src="' . SITE_DIR . 'images/header.png" style="width: 600px;margin-top: 30px;" />
        <h1>21 Day Detox</h1>
    </div>
    <div style="text-align: center;">
        <h2 style="color: #245269">' . $subject . '</h2>
        <a href="' . SITE_DIR . 'home.php?day=0&uid=' . $user_id . '&hash=' . md5(strtolower($email)) .'" target="_blank">
            <img src="' . SITE_DIR . 'mail/video.png" style="width: 460px;" />
        </a>
        <br><br>
         <div style="clear: both">
            <a href="' . SITE_DIR . 'home.php?day=0&uid=' . $user_id . '&hash=' . md5(strtolower($email)) .'">Click here if the email is not displayed correctly</a>
        </div>
    ';
$mail .= 'You received this letter because you had registered in 21 Day Detox mailing on
         <a href="http://divinehealthdetox.com">http://divinehealthdetox.com</a><br><br>'."\n";
if($password)
{
    $mail .= 'Your user data: <br>'."\n";
    $mail .= '<b>username:</b> '.$firstname.'<br>'."\n";
    $mail .= '<b>password:</b> '.$password.'<br><br>'."\n";
}
$mail .= '<br><br>If you don\'t want to receive these emails, please click <a href="http://divinehealthdetox.com/detox/signout.php?mail='.strtolower($email).'">here</a>'."\n";
$mail .= '
    </div>
   </div>
</body>
</html>
';