<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
<div class="row" style="margin-top: 5%;">
    <div class="col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
        <div class="panel panel-info" id="main-panel">
            <div class="panel-heading text-center">
                <h3>DR. COLBERT'S 21 DAY DETOX</h3>
            </div>
            <div class="panel-body">
                <div class="row text-center">
                    <div class="col-sm-8 col-sm-offset-2">
                        <span style="font-size: 19px">Congratulations! You have Successfully signed up for Dr. Colbert's 21 Day Detox.</span>
                        <br><br>
                        Check Your Email for next steps including: shopping list, tips, recipes, videos and more.
                        <br><br>
                        <h3 style="font-size: 23px; color: #245269">Your Detox will Officially Begin in 4 Days!</h3>
                        You Can view your next steps here<br><br>
                        <a class="btn btn-default" href="http://divinehealthdetox.com/detox/home.php?day=0&uid=<?php echo $_SESSION['jigowatt']['user_id']; ?>&hash=<?php echo md5($_SESSION['jigowatt']['email']); ?>">Next Steps</a></div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>
</body>
</html>