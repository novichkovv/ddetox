<div class="container">
    <div class="row" style="margin-top: 80px;">
        <div class="col-md-8 col-xs-12">
            <div class="video-container">
                <iframe id="video_frame" src="//www.youtube.com/embed/UAvAEzuuI9E?rel=0&enablejsapi=1" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                <img class="hidden-sm hidden-xs" id="play_btn" src="<?php echo SITE_DIR; ?>images/video.jpg" />
            </div>
        </div>
        <script>
            $ = jQuery.noConflict();
            function onYouTubePlayerAPIReady() {
                player = new YT.Player('video_frame', {
                    events: {
                        'onReady': onPlayerReady,
                        'onStateChange': stateChange
                    }
                });
            }
            function onPlayerReady(event) {
                var height = $("#video_frame").height();
                $("#main-panel").height(height);
                $("#play_btn").click(function()
                {
                    $(this).fadeOut(100);
                    player.playVideo();
                })
            }
            function stateChange(event) {
                if(event.data == 1) {
                    UppodCurtain('video_frame',0.9);
                }
                if(event.data == 2) {
                    CurtainClose('video_frame');
                }
            }
        </script>
        <div class="col-md-4 col-xs-12">
            <div class="panel panel-default" id="main-panel" style="background-color: #8CBF02">
                <div class="panel-heading text-center" style="background-color: #8CBF02; border: none;">
                    <h3 style="font-family: Impact; font-size: 40px;">Congatulations</h3>
                    <span style="color: #fff;">YOU HAVE SUCCESSFULLY SIGNED UP FOR<br><span style="font-weight: bold; font-size: 22px;">DR. COLBERT'S 21 DAY DETOX</span> </span>
                </div>
                <div class="panel-body text-center">
                    <h3>Watch this video to learn your next steps</h3>
                    <br><br><br><br>
                    <a class="btn btn-primary" href="http://shop.drcolbert.com/index.php/21-day-detox-package.html" style="color: white;">
                        I Want to Order My 21 Day Detox Package
                    </a>
                    <br><br>
                    <a class="btn btn-primary" href="<?php echo SITE_DIR; ?>" style="color: white;">
                        I Want to Access My Detox Information
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>