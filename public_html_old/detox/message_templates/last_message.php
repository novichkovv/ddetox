<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 04.01.15
 * Time: 0:25
 */
$mail = '
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<div style="min-height: 1800px;">
<div style="text-align: center;">
    <h2 style="color: cadetblue;">' . $subject . '</h2>
';
$mail .= '<img src="' . SITE_DIR . 'images/certificate.png" style="width: 700px;" />
';
$mail .= '
</div>
</div>
</body>
</html>
';