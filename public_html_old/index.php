<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 13.12.14
 * Time: 1:59
 */
session_start();
	$_SESSION['jigowatt']['user_level'] = array(3);
	$_SESSION['jigowatt']['email'] = 'guest@example.com';
	$_SESSION['jigowatt']['username'] = 'guest';
	$_SESSION['jigowatt']['user_id'] = '9183';
	$_SESSION['jigowatt']['gravatar'] = '<img class="gravatar thumbnail" src="http://gravatar.com/avatar/45ed43fcbadf28f1c0aecc6ea700bdae?s=26&d=mm&r=g" />';
require_once('detox/model.php');
$model = new model('login_users');
if(isset($_POST['signin']) || $_GET['email'])
{
	$email = $_POST['email'] ? $_POST['email'] : $_GET['email'];
	if($_POST['firstname']) {
        $firstname = $_POST['firstname'];
    } elseif($_GET['firstname']) {
        $firstname = $_GET['firstname'];
	} else {
		$arr = explode('@', $email);
		if(is_array($arr)) {
			$firstname = array_shift($arr);		
		}
	}
    $phone = $_POST['phone'];
    $u = $model->getByField('username', $firstname);
    $warning = false;
    if(!$firstname)
        $warning = 'First name required!';
    elseif(!$email)
        $warning = 'Email required!';
    elseif(!preg_match("/^.+@.+\..+$/",$email))
        $warning = 'Incorrect email!';
//    elseif($user = $model->getByField('email', $email))
//        $warning = 'Somebody already uses this email';
//    elseif(trim($u['email']) && trim(strtolower($email)) != trim(strtolower($u['email'])))
//        $warning = 'Somebody already uses this username';
    if(!$warning)
    {
        $row['username'] = $firstname;
        $row['email'] = strtolower($email);
        $row['phone'] = $phone;
        $letters = array();
        for($i = 'a'; $i < 'z'; $i++)
        {
            $letters[] = $i;
            $letters[] = strtoupper($i);
        }
        $password = '';
        for($i = 0; $i <= 6; $i++)
        {
            if(rand(1,2) == 1)
                $password .= $letters[rand(1,40)];
            else
                $password .= rand(1,9);

        }
        $row['password'] = md5($password);
        $row['user_level'] = 'a:1:{i:0;s:1:"3";}';
        $user = $model->getByField('email', strtolower($email));
        if($user['username'] == $firstname)
        {
            $row = array();
            $row['user_id'] = $user['user_id'];
            $password = null;
        }
        if($_GET['firstname']) {
            $row['name'] = $_GET['firstname'];
        }
        $row['sdate'] = date('Y-m-d H:i:s');
        $row['sent'] = 0;

        $user_id = $model->insert($row);

        require_once('detox/mailing_data.php');
        $subject = $subjects[0];
        $to = $email;
        $video = $videos[0];
        require_once('detox/message_templates' . DS . 'subscribe_message.php');
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        $headers .= 'To: ' . $firstname . ' <'.$to.'>' . "\r\n";
        $headers .= 'From: 21 Day Detox <info@divinehealthdetox.com>' . "\r\n";

        mail($to, $subject, $mail, $headers);
        $row = $model->getByField('user_id', $user_id);
        $_SESSION['jigowatt']['user_level'] = array(3);
        $_SESSION['jigowatt']['email'] = $row['email'];
        $_SESSION['jigowatt']['username'] = $row['username'];
        $_SESSION['jigowatt']['user_id'] = $row['user_id'];
        $_SESSION['jigowatt']['gravatar'] = '<img class="gravatar thumbnail" src="http://gravatar.com/avatar/45ed43fcbadf28f1c0aecc6ea700bdae?s=26&d=mm&r=g" />';
        setcookie('user_id', $user_id, time() + 3600*24*365);
        header('Location: ' . SITE_DIR . 'success.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_DIR; ?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_DIR; ?>css/style.css">
    <script type="text/javascript" src="<?php echo SITE_DIR; ?>js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo SITE_DIR; ?>js/wow.js"></script>
    <script type="text/javascript" src="<?php echo SITE_DIR; ?>js/script.js"></script>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>
        21 Days Detox Challenge | Sign In
    </title>
    <link rel="shortcut icon" href="<?php echo SITE_DIR; ?>images/favicon.ico" />
</head>
<body>
<video autoplay="" class="hidden-xs" poster="images/flowers.jpg" id="bg_video">
    <source src="<?php echo SITE_DIR; ?>images/water.mp4" type="video/webm">
</video>
<div>
    <a target="__blank" style="color: #3989A4;  font-size: 30px; text-decoration: underline;" href="http://divinehealthdetox.com/backend/">
        <img src="<?php echo SITE_DIR; ?>images/logo.png" id="logo" />
    </a>
</div>
<h3 style="color: #666; margin-left: 20px;">Questions About the Detox?<br>
 Call: <span style="color: black; font-size: 30px;">407-732-6952<span></h3>
<!-- <div class="text-center">Go to Web Site</a></div>-->

<div id="bg">
</div>
<div style="margin-left: 40px; margin-right: 40px;">
    <div class="row" style="margin-top: 20px;">
        <div class="col-sm-6 col-xs-12">
            <div class="video-container">
                <iframe id="video_frame" src="https://www.youtube.com/embed/UAvAEzuuI9E?list=UUxObFUbx4nYwWVCelOUQtKA" frameborder="0" allowfullscreen="allowfullscreen" width="560" height="315"></iframe>
                <img src="detox/images/video.jpg" />
            </div>
        </div>
        <div class="col-sm-6 col-xs-12">
            <div class="panel panel-info" id="main-panel">
                <div class="panel-heading text-center">
                    <h3>DR. COLBERT'S 21 DAY DETOX</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form name="sign_in" action="" method="post">
                            <div class="col-sm-8 col-sm-offset-2 col-xs-12">
                                <div class="text-danger text-center"><h3><?php echo $warning; ?></h3></div>
                                <ul id="description">
                                    <li>RESTORE your health to a youthful state</li>
                                    <li>REBUILD your immune system</li>
                                    <li>RENEW your mind by riding yourself of harmful toxins</li>
                                </ul>
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" name="firstname" placeholder="Enter Your First Name" value="<?php echo $firstname; ?>" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control input-lg" name="email" placeholder="Enter Your E-mail"  value="<?php echo $email; ?>" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" name="phone" placeholder="Enter Your Phone #" value="<?php echo $phone; ?>" />
                                </div>
                                <div class="form-group text-center">
                                    <input type="submit" class="btn btn-lg btn-primary" name="signin" value="JOIN THE 21 DAY DETOX" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>