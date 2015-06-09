<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 13.12.14
 * Time: 17:45
 */
require_once('config.php');
require_once('mailing_data.php');
$con=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$query = 'SELECT * FROM detox_users WHERE id = "' . mysqli_real_escape_string($con, $_GET['uid']) . '"';
$res = mysqli_query($con, $query);
$row = $res->fetch_assoc();
if(md5($row['email']) == $_GET['hash'])
{
    if($_GET['day'] > $row['sent'])
    {
        echo 'access_denied';
        exit;
    }
    $day = $_GET['day'];
    $subject = $subjects[$day];
    if(!$subject)
    {
        echo 'no emails for this day';
        exit;
    }
    $video = $videos[$day];
    if($day == 0)
        require_once('message_templates' . DS . 'subscribe_message.php');
    elseif($day == 1)
        require_once('message_templates' . DS . 'firstday_message.php');
    elseif($day == 2)
        require_once('message_templates' . DS . 'secondday_message.php');
    elseif($day == 3)
        require_once('message_templates' . DS . 'thirdday_message.php');
    else
        require_once('message_templates' . DS . 'detox_message.php');

    echo '
    <!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" type="text/css" href="' . SITE_DIR . 'css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="' . SITE_DIR . 'css/style.css">
        <title>21 Day Detox</title>
    </head>
        <body>
            <video autoplay="" poster="images/flowers.jpg" id="bg_video">
                <source src="' . SITE_DIR . 'images/water.mp4" type="video/webm">
            </video>
            <div id="bg">
            </div>
            <div style="margin: 30px auto; width: '.($day == 1 || $day == 2 || $day == 3 ? '728' : '600').'px; box-shadow: 0 0 5px;background-color: #ffffff;padding: 30px 0;">
                ' . $mail . '
            </div>
        </body>
    </html>';
}
else
{
    echo 'access_denied';
    exit;
}