<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_DIR; ?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_DIR; ?>css/style.css">
    <script type="text/javascript" src="<?php echo SITE_DIR; ?>js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo SITE_DIR; ?>js/wow.js"></script>
    <script src="//www.youtube.com/player_api"></script>
<!--    <script type="text/javascript" src="--><?php //echo SITE_DIR; ?><!--js/script.js"></script>-->
    <script type="text/javascript" src="<?php echo SITE_DIR; ?>js/uppod-curtain.js"></script>
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
    <div class="pull-left">
        <a target="__blank" style="color: #3989A4;  font-size: 30px; text-decoration: underline;" href="http://divinehealthdetox.com/">
            <img src="<?php echo SITE_DIR; ?>images/logo.png" id="logo" />
        </a>
    </div>
    <div class="pull-right" style="font-family: Impact; padding: 20px 40px;">
            CALL US FREE: &nbsp;&nbsp;&nbsp;<span style="color: #4a8bc5; font-size: 30px;">407.732.6952<span>
    </div>
</div>
<div class="clearfix" style="background-color: #fff;"></div>
<div id="bg">
</div>
<div class="container">
    <div class="row" style="margin-top: 80px;">
        <div class="col-md-8 col-xs-12">
            <div class="video-container">
                <iframe id="video_frame" src="//www.youtube.com/embed/<?php echo $video; ?>?rel=0&enablejsapi=1" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                <img class="hidden-sm hidden-xs" id="play_btn" src="<?php echo SITE_DIR; ?>images/video.jpg" />
            </div>
        </div>
        <script>
            $ = jQuery.noConflict();
            $(".video-container").click(function()
            {
                var frame = $("#video_frame");
                $(".video-container img").fadeOut('slow');
                $(frame).attr('src',$(frame).attr('src') + '&autoplay=1');
            });
            $(document).ready(function()
            {
                var height = $("#video_frame").height();
                if(height > 375) {
                    $("#main-panel").height(height);
                }
            });
        </script>
        <div class="col-md-4 col-xs-12">
            <div class="panel panel-default" id="main-panel" style="background-color: #8CBF02">
                <div class="panel-heading text-center" style="background-color: #8CBF02; border: none;">
                    <h3 style="color: #fff; font-family: Impact; font-size: 40px;">SIGN UP NOW</h3>
                    <span style="color: #fff;">DR. COLBERT'S 21 DAY DETOX</span>
                </div>
                <div class="panel-body">
                    <form name="sign_in" action="" method="post">
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1 col-xs-12">
                                <div class="text-danger text-center"><h3><?php echo $warning; ?></h3></div>
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" name="user[login]" placeholder="Enter Your First Name" value="<?php echo $user['login']; ?>" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control input-lg" name="user[email]" placeholder="Enter Your E-mail"  value="<?php echo $user['email']; ?>" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" name="user[phone]" placeholder="Enter Your Phone #" value="<?php echo $user['phone']; ?>" />
                                </div>

                            </div>
                         </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="form-group text-center">
                                    <input type="submit" class="btn btn-lg btn-primary" name="sign_in_btn" value="JOIN THE 21 DAY DETOX" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once(TEMPLATE_DIR . 'google_analytics.php'); ?>
<script type="text/javascript">
    adroll_adv_id = "XM3SHKW6KBEXZENOSGYMWT";
    adroll_pix_id = "X6KE4ONVTRASHLN65VKOU7";
    (function () {
        var _onload = function(){
            if (document.readyState && !/loaded|complete/.test(document.readyState)){setTimeout(_onload, 10);return}
            if (!window.__adroll_loaded){__adroll_loaded=true;setTimeout(_onload, 50);return}
            var scr = document.createElement("script");
            var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com");
            scr.setAttribute('async', 'true');
            scr.type = "text/javascript";
            scr.src = host + "/j/roundtrip.js";
            ((document.getElementsByTagName('head') || [null])[0] ||
            document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
        };
        if (window.addEventListener) {window.addEventListener('load', _onload, false);}
        else {window.attachEvent('onload', _onload)}
    }());
</script>
</body>
</html>