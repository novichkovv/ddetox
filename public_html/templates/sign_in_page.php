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
        21 Days Detox Challenge
    </title>
    <link rel="shortcut icon" href="<?php echo SITE_DIR; ?>images/favicon.ico" />
</head>
<body>
<video autoplay="" class="hidden-xs" poster="images/flowers.jpg" id="bg_video">
    <source src="<?php echo SITE_DIR; ?>images/water.mp4" type="video/webm">
</video>
<div>
    <a target="__blank" style="color: #3989A4;  font-size: 30px; text-decoration: underline;" href="http://divinehealthdetox.com/">
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
                <img src="<?php echo SITE_DIR; ?>images/video.jpg" />
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
                                    <input type="text" class="form-control input-lg" name="user[login]" placeholder="Enter Your First Name" value="<?php echo $firstname; ?>" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control input-lg" name="user[email]" placeholder="Enter Your E-mail"  value="<?php echo $email; ?>" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" name="user[phone]" placeholder="Enter Your Phone #" value="<?php echo $phone; ?>" />
                                </div>
                                <div class="form-group text-center">
                                    <input type="submit" class="btn btn-lg btn-primary" name="sign_in_btn" value="JOIN THE 21 DAY DETOX" />
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