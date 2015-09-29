<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 13.12.14
 * Time: 1:51
 */

$mail='
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<div style="min-height: 900px;">
<div style="text-align: center;color: #245269; width: 600px;"><h1 class="animate_fade">DAY ' . ($day - 3) . '</h1></div>
<div style="text-align: center; width: 600px;">
    <div class="animate_left" style="width: 600px; text-align: center;"><h2 style="color: cadetblue; margin: 0 auto 20px; position: relative;">' . preg_replace("/Day\s[0-9]{1,2}\s-/", '', $subject) . '</h2></div>
    <a href="' . SITE_DIR . 'home.php?day=' . $day . '&uid=' . $user['user_id'] . '&hash=' . md5($to) .'" target="_blank">
        <img src="' . SITE_DIR . 'mail/video.png" style="width: 460px;" />
    </a>
    <br><br>
    <img src="' . SITE_DIR . 'mail/purple-divider.jpg" style="width: 460px;">
    <br>
    <div style="width: 465px; margin: auto;">
        <div style="float: left">
            <br><br>
            <span style="font-weight: 400; color: #0782C1;">Each 21 Day Detox Package Includes:</span>
            <ul style="color: #175373; list-style:none; text-align:left; padding: 10px;">
                <li>
                    <img src="' . SITE_DIR . 'mail/checkmark.png">Maxone
                </li>
                <li>
                    <img src="' . SITE_DIR . 'mail/checkmark.png">Fiber Formula
                </li>
                <li>
                    <img src="' . SITE_DIR . 'mail/checkmark.png">Plant Protein
                </li>
                <li>
                    <img src="' . SITE_DIR . 'mail/checkmark.png">Green Supremefood
                </li>
            </ul>
        </div>
        <a href="http://www.drcolbert.com/21-day-detox-package.html" target="_blank"><img src="' . SITE_DIR . 'mail/detoxpack_2_1.jpg"  style="width: 200px; float: left"></a>
         <a href="http://www.drcolbert.com/21-day-detox-package.html" target="_blank"><img src="' . SITE_DIR . 'images/button.png" style="margin-bottom: 30px;border-radius: 5px;box-shadow: 0 0 2px inset; width: 350px;" /></a>
    </div>
    <div style="clear: both">
        <a href="' . SITE_DIR . 'home.php?day=' . $day . '&uid=' . $user['user_id'] . '&hash=' . md5($to) .'">Click here if the email is not displayed corrected</a>
        <br><br>If you don\'t want to receive these emails anymore, please click <a href="http://divinehealthdetox.com/detox/signout.php?mail='.$to.'">here</a>
    </div>
</div>
</div>
</body>
</html>
';