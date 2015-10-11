<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<div style="min-height: 1700px;">
    <div style="text-align: center;">
        <h2 style="color: cadetblue;"><?php echo $data['subject']; ?></h2>
        <a href="http://shop.drcolbert.com/21-day-detox-package.html" target="_blank">
            <img src="<?php echo SITE_DIR; ?>images/1.png" style="width: 728px; margin-bottom: 30px;" />
        </a>
        <br>
        <a href="<?php echo SITE_DIR; ?>?day=<?php echo $data['mailing_day']; ?>&uid=<?php echo $user['id']; ?>" target="_blank">
            <img src="<?php echo SITE_DIR; ?>images/video.jpg" style="width: 460px;" />
        </a>
        <div style="clear: both; ">
            <a href="<?php echo SITE_DIR; ?>?day=<?php echo $data['mailing_day']; ?>&uid=<?php echo $user['id']; ?>">Click here if the email is not displayed correctly</a>
        </div>
        <br><br>If you don't want to receive these emails anymore, please click <a href="<?php echo SITE_DIR; ?>index/signout/?mail=<?php echo $user['email']; ?>">here</a>
    </div>
</div>
</body>
</html>