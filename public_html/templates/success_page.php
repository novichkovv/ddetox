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
    <title>
        21 Days Detox Challenge
    </title>
    <link rel="shortcut icon" href="<?php echo SITE_DIR; ?>images/favicon.ico" />
</head>
<body>
<!--<script src="//www.youtube.com/player_api"></script>-->
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
            <h3 id="page_title" style="color: #fff; font-size: 20px; Font-family: Tahoma;">Watch this Video for Your Next Steps</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-xs-12">
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
                $("#main-panel").height(height);
                $("#page_title").animate({'color' : 'black'}, 3000);
                console.log($("#page_title"));
            });
//            function onYouTubePlayerAPIReady() {
//                player = new YT.Player('video_frame', {
//                    events: {
//                        'onReady': onPlayerReady,
//                        'onStateChange': stateChange
//                    }
//                });
//            }
//            function onPlayerReady(event) {
//                var height = $("#video_frame").height();
//                $("#main-panel").height(height);
//                $("#play_btn").click(function()
//                {
//                    $(this).fadeOut(100);
//                    player.playVideo();
//                })
//            }
//            function stateChange(event) {
//                if(event.data == 1) {
//                    UppodCurtain('video_frame',0.9);
//                }
//                if(event.data == 2) {
//                    CurtainClose('video_frame');
//                }
//            }
        </script>
        <div class="col-md-4 col-xs-12">
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
                </div>
            </div>
        </div>
    </div>
</div>
<div style="width: 100%; height: 800px; margin-top: 80px; background-color: #fff;"></div>
</body>
</html>
