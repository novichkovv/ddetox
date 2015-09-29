<?php include_once('classes/check.class.php'); ?>
<?php include_once('header.php'); ?>

<div class="row">

	<div class="span12">
	<?php if( protectThis("1,2,3,4") ) : ?>
		<h1 class="page-header"><?php _e('Community Chat'); ?></h1>
        <p>Chat with other people on the 21 Day Detox Program. Talk about your experiences, what helped you and who else is doing the Detox. We want to keep everyone involved as much as possible.</p>
        <div class="alert alert-warning"><?php _e('This feature will be available within 1-2 days.'); ?></div>
	<?php endif; ?>
	</div>

</div>



<?php include_once('footer.php'); ?>