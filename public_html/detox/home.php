<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 17.12.14
 * Time: 19:20
 */
session_start();
require_once('model.php');
$model = new model('login_users');
$row = $model->getByField('user_id',$_GET['uid']);
require_once('mailing_data.php');
if(md5($row['email']) == $_GET['hash'])
{
    $_SESSION['jigowatt']['user_level'] = array(3);
    $_SESSION['jigowatt']['email'] = $row['email'];
    $_SESSION['jigowatt']['username'] = $row['username'];
    $_SESSION['jigowatt']['user_id'] = $row['user_id'];
    $_SESSION['jigowatt']['gravatar'] = '<img class="gravatar thumbnail" src="http://gravatar.com/avatar/45ed43fcbadf28f1c0aecc6ea700bdae?s=26&d=mm&r=g" />';
    if($_GET['redirect'] == 'ebook')
        header('Location: ../ebook.php');
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
    require_once('detox.php');
}
else
{
    header('Location: index.php');
    exit;
}
