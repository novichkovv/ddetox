<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 13.12.14
 * Time: 1:08
 */
set_time_limit(0);
require_once('model.php');
require_once('mailing_data.php');
$con=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$query = 'SELECT * FROM login_users WHERE sdate > NOW() - INTERVAL 25 DAY';
$res = mysqli_query($con, $query);
$users = array();
while($row = $res->fetch_assoc())
{
    $users[] = $row;
}
$i = 0;
    foreach($users as $k => $user)
    {
        if($i == 30)break;
        $date = date('Y-m-d 05:00:00', strtotime($user['sdate']));
        $day = date_diff(new DateTime(), new DateTime($date))->days;
        if($day == 0)continue;
        if($user['sent'] >= $day)continue;
        $to = $user['email'];
        $subject = $subjects[$day];
        if(!$subject)continue;
        $video = $videos[$day];
        if($day == 1)
            include('message_templates' . DS . 'firstday_message.php');
        elseif($day == 2)
            include('message_templates' . DS . 'secondday_message.php');
        elseif($day == 3)
            include('message_templates' . DS . 'thirdday_message.php');
        else
            include('message_templates' . DS . 'detox_message.php');
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        $headers .= 'To: ' . $user['username'] . ' <'.$to.'>' . "\r\n";
        $headers .= 'From: 21 Day Detox <info@divinehealthdetox.com>' . "\r\n";
        mail($to, $subject, $mail, $headers);
        $query = 'UPDATE login_users SET sent = "' . $day . '" WHERE user_id = "' . $user['user_id'] . '"';
        mysqli_query($con, $query);
        $i ++;
    }

