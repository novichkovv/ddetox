<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_DIR; ?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_DIR; ?>css/style.css">
</head>
<body>
<div class="row" style="margin-top: 5%;">
    <div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
        <div class="panel panel-info" id="main-panel">
            <div class="panel-heading text-center">
                <h3>DR. COLBERT'S 21 DAY DETOX</h3>
            </div>
            <div class="panel-body">
                <div class="row text-center">
                    <div class="col-sm-8 col-sm-offset-2">
                        <?php if($success): ?>
                            <h1>These emails will not disturb you any more!</h1>
                        <?php endif; ?>
                        <?php if(!$success): ?>
                            <form action="" method="post">
                                <h1>Do you want to sign out from 21 day detox program with <b><?php echo $_GET['mail']; ?></b>?</h1>
                                <input type="submit" name="sign_out_btn" value="Sign Out" class="btn btn-lg btn-warning">
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
                <hr>
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