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


<?php if( protectThis(1) ) : ?>


<div class="row">

	<div class="span12">
	<iframe src="https://kiwiirc.com/client/irc.kiwiirc.com/?nick=DrColbert|?&theme=mini#21DayDetox" style="border:0; width:100%; height:450px;"></iframe>
	</div>

</div>

<?php else : ?>
		<div class="alert-margin alert alert-error"><?php _e('You must be logged in or signed up to view this content. Go <a href="login.php">here</a> to Login or Sign Up.'); ?></div>
	<?php endif; ?>


<?php include_once('footer.php'); ?>