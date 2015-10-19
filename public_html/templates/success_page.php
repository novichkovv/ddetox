<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_DIR; ?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_DIR; ?>css/style.css">
    <script type="text/javascript" src="<?php echo SITE_DIR; ?>js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo SITE_DIR; ?>js/wow.js"></script>
<!--    <script src="//www.youtube.com/player_api"></script>-->
        <script type="text/javascript" src="<?php echo SITE_DIR; ?>js/script.js"></script>
    <script type="text/javascript" src="<?php echo SITE_DIR; ?>js/uppod-curtain.js"></script>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:video" content="https://youtu.be/jD2peUWmPak" />
    <title>
        21 Days Detox Challenge
    </title>
    <link rel="shortcut icon" href="<?php echo SITE_DIR; ?>images/favicon.ico" />
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_EN/sdk.js#xfbml=1&version=v2.5&appId=788945274461581";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
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
        <!--        <h3 style="color: #666; margin-left: 20px;">Questions About the Detox?<br>-->
        CALL US FREE: &nbsp;&nbsp;&nbsp;<span style="color: #4a8bc5; font-size: 30px;">407.732.6952<span>
    </div>
</div>
<div class="clearfix" style="background-color: #fff;"></div>

<!-- <div class="text-center">Go to Web Site</a></div>-->

<div id="bg">
</div>
<div class="container">
    <div class="row" style="margin-top: 80px;">
        <div class="col-md-12">
            <h3 id="page_title" style="color: #333; font-size: 34px; Font-family: Tahoma;">Watch this Video for Your Next Steps</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-xs-12">
            <div class="video-container">
                <iframe id="video_frame" src="//www.youtube.com/embed/<?php echo $video; ?>?rel=0&enablejsapi=1" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
<!--                <img class="hidden-sm hidden-xs" id="play_btn" src="--><?php //echo SITE_DIR; ?><!--images/video.jpg" />-->
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
                $("#page_title").animate({'color' : 'black'}, 3000);
                console.log($("#page_title"));
            });
        </script>
        <div class="col-lg-4 col-xs-12">
            <div class="panel panel-default" id="main-panel" style="background-color: #8CBF02">
                <div class="panel-heading text-center" style="background-color: #8CBF02; border: none;">
                    <h3 style="font-family: Impact; font-size: 40px; color: #ffffff;">CONGRATULATIONS</h3>
                    <span style="color: #fff;">YOU HAVE SUCCESSFULLY SIGNED UP FOR<br><span style="font-weight: bold; font-size: 22px;">DR. COLBERT'S 21 DAY DETOX</span> </span>
                </div>
                <div class="panel-body text-center">
<!--                    <h3>Watch this video to learn your next steps</h3>-->
                    <a href="<?php echo PACKAGE_URL; ?>" class="success-btn">
                        I Want to Order My 21 Day Detox Package
                    </a>
                    <a href="<?php echo SITE_DIR; ?>?next_steps" class="success-btn">
                        I Want to Access My Detox Information
                    </a>
                    <h3 style="font-size: 20px; color: #fff;">Share this Detox with Your Friends!</h3>
                    <a class="fb-share-button" href="http://www.facebook.com/share.php?u=http://divinehealthdetox.com" data-layout="button_count">
                        <img style="width: 100%;" src="<?php echo SITE_DIR; ?>images/facebook.png">
                    </a>
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
