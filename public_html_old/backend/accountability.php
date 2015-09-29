<?php include_once('classes/check.class.php'); ?>
<?php include_once('header.php'); ?>


<?php if( protectThis("1,2,3,4") ) : ?>
<div class="row">

	<div class="span12">
	<?php if( protectThis("1,2,3,4") ) : ?>
		<h1 class="page-header"><?php _e('Accountability Scriptures'); ?></h1>
	<?php endif; ?>
	</div>

</div>



<br><hr><br>


<?php else : ?>
		<div class="alert-margin alert alert-error"><?php _e('You must be logged in or signed up to view this content. Go <a href="login.php">here</a> to Login or Sign Up.'); ?></div>
	<?php endif; ?>


<?php include_once('footer.php'); ?>