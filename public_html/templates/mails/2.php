<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<div style="min-height: 1800px;">
<div style="text-align: center;">
    <h2 style="color: cadetblue;"><?php echo $data['subject'] ; ?></h2>
<?php if($data['video']): ?>
    <a href="<?php echo SITE_DIR ; ?>?day=<?php echo $data['mailing_day']; ?>&uid=<?php echo $user['id']; ?>" target="_blank">
        <img src="<?php echo SITE_DIR ; ?>images/video.jpg" style="width: 460px;" />
    </a>
<?php endif; ?>
<?php if(!$data['video']): ?>
    <a href="<?php echo PACKAGE_URL; ?>" target="_blank">
        <img src="<?php echo SITE_DIR ; ?>images/2.png" style="width: 700px;" />
    </a>
     <div style="clear: both">
        <a href="<?php echo SITE_DIR ; ?>?day=<?php echo $data['mailing_day']; ?>&uid=<?php echo $user['id']; ?>">Click here if the email is not displayed correctly</a>
    </div>
<?php endif; ?>
<br><br>If you don't want to receive these emails anymore, please click <a href="<?php echo SITE_DIR; ?>index/signout/?mail=<?php echo $user['email']; ?>">here</a>
</div>
</div>
</body>
</html>
