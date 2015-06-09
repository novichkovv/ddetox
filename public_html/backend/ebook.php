<?php include_once('classes/check.class.php'); ?>
<?php include_once('header.php'); ?>

<div class="row">
	<div class="span12">
	<?php if( protectThis("1,2,3,4") ) : ?>
		<h1 class="page-header"><?php _e('E-Booklet'); ?></h1>
        <p></p>
	<?php endif; ?>
	</div>

</div>
<?php if( protectThis("1,2,3,4") ) : ?>

<div class="row">

<div class="span8 offset2">
	<iframe src="http://www.divinehealthdetox.com/ebook/ebook_iframe.php" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:965px; height:840px;" ></iframe>
</div>


<?php else : ?>
		<div class="alert-margin alert alert-error"><?php _e('You must be logged in or signed up to view this content. Go <a href="login.php">here</a> to Login or Sign Up.'); ?></div>
	<?php endif; ?>


<?php include_once('footer.php'); ?>