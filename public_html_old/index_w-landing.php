<?php 
if (!isset($_COOKIE['detox_choice'])) :
	$expire=time()+60*60*24*90;
	setcookie("detox_choice", "Done", $expire, "/", ".divinehealthdetox.com"); ?>
    <?php print file_get_contents("http://detox7days.com/landing.php"); ?>

<?php
else :
	header('Location: home.php'); exit(); 
endif;
?>