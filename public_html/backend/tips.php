<?php include_once('classes/check.class.php'); ?>
<?php include_once('header.php'); ?>

<div class="row">

	<div class="span12">
	<?php if( protectThis("1,2,3,4") ) : ?>
		<h1 class="page-header"><?php _e('Tips'); ?></h1>
	<?php endif; ?>
	</div>

</div>

<?php if( protectThis("1,2,3,4") ) : ?>

<div class="row">

<div class="span4">
	<img src="assets/img/tip1.png" width="350" height="300" /> </div>


<div class="span4">
	<img src="assets/img/tip2.png" />
	</div>
    
<div class="span4">
<img src="assets/img/sweetpotatoes.jpg" width="350" />
	</div>


</div>

<div class="row">

<div class="span4">
	<img src="assets/img/tip3.png" width="350" />
	</div>


<div class="span4">
<img src="assets/img/tip4.png" width="350" />
	</div>
    
<div class="span4">
<img src="assets/img/greentea_tip.jpg" width="350" />
	</div>


</div>

<div class="row">

<div class="span4">
	<img src="assets/img/tip5.png" width="350" />
	</div>


    
<div class="span4 offset4">
<img src="assets/img/detox_bath.jpg" width="350" />
	</div>


</div>

<div class="row">

<div class="span4 offset8"><img src="assets/img/pesticides2.jpg" width="350" /></div>

</div>


<?php else : ?>
		<div class="alert-margin alert alert-error"><?php _e('You must be logged in or signed up to view this content. Go <a href="login.php">here</a> to Login or Sign Up.'); ?></div>
	<?php endif; ?>

<?php include_once('footer.php'); ?>