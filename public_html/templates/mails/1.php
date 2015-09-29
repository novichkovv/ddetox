<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<div style="min-height: 900px;">
    <div style="text-align: center;color: #245269;">
        <img src="<?php echo SITE_DIR; ?>images/header.png" style="width: 600px;margin-top: 30px;" />
        <h1>21 Day Detox</h1>
    </div>
    <div style="text-align: center;">
        <h2 style="color: #245269"><?php echo $data['subject']; ?></h2>
        <a href="<?php echo SITE_DIR; ?>?day=0&uid=<?php echo $user['id']; ?>" target="_blank">
            <img src="<?php echo SITE_DIR; ?>images/video.png" style="width: 460px;" />
        </a>
        <br><br>
        <div style="clear: both">
            <a href="<?php echo SITE_DIR; ?>?day=0&uid=<?php echo $user['id']; ?>">Click here if the email is not displayed correctly</a>
        </div>
        You received this letter because you had registered in 21 Day Detox mailing on
        <a href="http://divinehealthdetox.com">http://divinehealthdetox.com</a><br><br>
        <br><br>If you don't want to receive these emails, please click <a href="<?php echo SITE_DIR; ?>index/signout/?mail=<?php echo $user['email']; ?>">here</a>
    </div>
</div>
</body>
</html>