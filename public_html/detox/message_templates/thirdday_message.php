<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 13.12.14
 * Time: 1:51
 */
$mail = '
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<div style="min-height: 1700px;">
    <div style="text-align: center;">
        <h2 style="color: cadetblue;">' . $subject . '</h2>
    ';
        $mail .= '
        <a href="http://www.drcolbert.com/21-day-detox-package.html" target="_blank">
            <img src="' . SITE_DIR . 'mail/1.png" style="width: 728px; margin-bottom: 30px;" />
        </a>

    ';
    $mail .= '
        <a href="' . SITE_DIR . 'home.php?day=' . $day . '&uid=' . $user['user_id'] . '&hash=' . md5($user['email']) .'" target="_blank">
            <img src="' . SITE_DIR . 'mail/video.png" style="width: 460px;" />
        </a>
         <div style="clear: both; ">
            <a href="' . SITE_DIR . 'home.php?day=' . $day . '&uid=' . $user['user_id'] . '&hash=' . md5($user['email']) .'">Click here if the email is not displayed correctly</a>
        </div>';
    $mail .= '<br><br>If you don\'t want to receive these emails anymore, please click <a href="http://divinehealthdetox.com/detox/signout.php?mail='.$user['email'].'">here</a>'."\n";
    $mail .= '
    </div>
</div>
</body>
</html>
';