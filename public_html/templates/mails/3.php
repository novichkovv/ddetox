<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<div style="min-height: 900px;">
    <div style="text-align: center; width: 730px;">
        <div class="animate_left" style="width: 730px; text-align: center;"><h2 style="color: cadetblue; margin: auto; position: relative;"><?php echo $data['subject'] ; ?> </h2></div>
        <a href="<?php echo SITE_DIR; ?>ebook/" target="_blank"><img src="<?php echo SITE_DIR; ?>images/ebooklet.png"></a>
        <div style="width: 620px; margin: auto;">
            <div style="float: left">
                <br><br>
                <span style="font-weight: 400; color: #0782C1; font-size: 20px;">Each 21 Day Detox Package Includes:</span>
                <ul style="color: #175373; list-style:none; text-align:left; padding: 10px;  font-size: 22px;">
                    <li>
                        <img src="<?php echo SITE_DIR; ?>images/checkmark.png">Maxone
                    </li>
                    <li>
                        <img src="<?php echo SITE_DIR; ?>images/checkmark.png">Fiber Formula
                    </li>
                    <li>
                        <img src="<?php echo SITE_DIR; ?>images/checkmark.png">Plant Protein
                    </li>
                    <li>
                        <img src="<?php echo SITE_DIR; ?>images/checkmark.png">Green Supremefood
                    </li>
                </ul>
            </div>
            <a href="http://shop.drcolbert.com/21-day-detox-package.html"  target="_blank"><img src="<?php echo SITE_DIR; ?>images/detoxpack_2_1.jpg"  style="width: 270px; float: left"></a>
            <a href="http://shop.drcolbert.com/21-day-detox-package.html"  target="_blank"><img src="<?php echo SITE_DIR; ?>images/button.png" style="margin-bottom: 30px;border-radius: 5px;box-shadow: 0 0 2px inset;" /></a>
        </div>
        <div style="clear: both;"><a href="http://shop.drcolbert.com/21-day-detox-package.html"  target="_blank"><img src="<?php echo SITE_DIR; ?>images/detoxpromobanner.jpg" /></a></div>
        <div style="clear: both">
            <a href="<?php echo SITE_DIR; ?>?day=<?php echo $data['mailing_day'] ; ?>&uid=<?php echo $user['id']; ?>">Click here if the email is not displayed correctly</a>
            <br><br>If you don't want to receive these emails, please click <a href="<?php echo SITE_DIR; ?>index/signout/?mail=<?php echo $user['email']; ?> ">here</a>
        </div>
    </div>
</div>
</body>
</html>