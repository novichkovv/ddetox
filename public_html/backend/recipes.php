<?php include_once('classes/check.class.php'); ?>
<?php include_once('header.php'); ?>

<!--<div class="row">

	<div class="span6">
	<?php if( protectThis(1) ) : ?>
		<h1 class="page-header"><?php _e('Admin only text <small>User level: 1</small>'); ?></h1>
		<p><?php _e('You will only be able to see this content if you have an <span class="label label-important">administrator</span> user level. ')?></p>
		<pre>Super secret code that admin only can view</pre>
	<?php else : ?>
		<div class="alert alert-warning"><?php _e('Only admins can view this content.'); ?></div>
	<?php endif; ?>
	</div>

	<div class="span6">
	<?php if( protectThis("1, 2") ) : ?>
		<h1 class="page-header"><?php _e('Why hello, special user! <small>User level: 2</small>'); ?></h1>
		<p><?php _e('You will only be able to see this content if you have a <span class="label label-info">special</span> user level. ')?></p>
	<?php else : ?>
		<div class="alert alert-warning"><?php _e('Only admins or special users can view this content.'); ?></div>
	<?php endif; ?>
	</div>

</div>-->

<div class="row">

	<div class="span12">
	<?php if( protectThis("1,2,3,4") ) : ?>
		<h1 class="page-header"><?php _e('Detox Recipes for You!'); ?></h1>
		<p><?php _e('Any user level in the entire world can see this! All that matters is that you\'re logged in.')?></p>
		<pre>All signed in users view this</pre>
	<?php else : ?>
		<div class="alert alert-warning"><?php _e('Only signed in users can view what\'s hidden here!'); ?></div>
	<?php endif; ?>
	</div>

</div>

<?php include_once('footer.php'); ?>