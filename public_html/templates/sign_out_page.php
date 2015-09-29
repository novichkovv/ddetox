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
</body>
</html>