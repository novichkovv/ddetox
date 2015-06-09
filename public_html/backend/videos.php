<?php include_once('classes/check.class.php'); ?>
<?php include_once('header.php'); 

//GET START DATE
$DBH = new PDO("mysql:host=localhost;dbname=ddetox_backend", 'ddetox_admin', 'Starcraft12');
$statement = $DBH->query("select setting_value from detox_settings where setting_name='startDate'");
$row = $statement->fetch(PDO::FETCH_ASSOC);	
$startDate=date_create($row['setting_value']);
$today = date_create(date("Y-m-d"));
$diff=date_diff($startDate,$today);
$day = date_interval_format($diff, '%R%a');

//DAY MUST BE SET 1 LESS THAN DAY (EXAMPLE: +1 is for Day 2)
?>

<div class="row">
<?php 
if( protectThis("1,2,3,4") ) : ?>
	<div class="span12">
	<?php if( protectThis('*') ) : ?>
		<h1 class="page-header"><?php _e('21 Day Detox Videos'); ?></h1>
		<p><?php _e('Dr. Colbert will be posting videos to aid in your detox process. ')?></p>
		
	<?php endif; ?>
	</div>

</div>

	<div class="row">
	
	<div class="span12 vid_div">
	<?php if( protectThis('*') && $day >= +0) : ?>
		<h2><?php _e('Day 1 - A Tip from Dr. Colbert'); ?></h2>
		<iframe class="hidden-phone hidden-tablet" width="571" height="321" src="//www.youtube.com/embed/Oa4wm2ftna4" frameborder="0" allowfullscreen></iframe>
		<iframe class="hidden-desktop hidden-phone" width="352" height="198" src="//www.youtube.com/embed/Oa4wm2ftna4" frameborder="0" allowfullscreen></iframe>
		<iframe class="hidden-desktop hidden-tablet" width="480" height="270" src="//www.youtube.com/embed/Oa4wm2ftna4" frameborder="0" allowfullscreen></iframe>
	<?php endif; ?>
	</div>
	
</div>

<div class="row">
	
	<div class="span12 vid_div">
	<?php if( protectThis('*') && $day >= +1) : ?>
		<h2><?php _e('One Delicious Detox Smoothie '); ?></h2>
		<iframe class="hidden-phone hidden-tablet" width="571" height="321" src="//www.youtube.com/embed/LC9rk3RRBs" frameborder="0" allowfullscreen></iframe>
		<iframe class="hidden-desktop hidden-phone" width="352" height="198" src="//www.youtube.com/embed/LC9rk3RRBs" frameborder="0" allowfullscreen></iframe>
		<iframe class="hidden-desktop hidden-tablet" width="480" height="270" src="//www.youtube.com/embed/LC9rk3RRBs" frameborder="0" allowfullscreen></iframe>
	<?php endif; ?>
	</div>
	
</div>

<div class="row">

	
	<div class="span12 vid_div">
	<?php if( protectThis('*') && $day >= +2) : ?>
		<h2><?php _e('Day 3 - Healthy Snacks for the 21 Day Detox'); ?></h2>
		<iframe class="hidden-phone hidden-tablet" width="571" height="321" src="//www.youtube.com/embed/8hbQ_p0FBUU" frameborder="0" allowfullscreen></iframe>
		<iframe class="hidden-desktop hidden-phone" width="352" height="198" src="//www.youtube.com/embed/8hbQ_p0FBUU" frameborder="0" allowfullscreen></iframe>
		<iframe class="hidden-desktop hidden-tablet" width="480" height="270" src="//www.youtube.com/embed/8hbQ_p0FBUU" frameborder="0" allowfullscreen></iframe>

		
	<?php endif; ?>
	</div>
    </div>

 <div class="row">

	
	<div class="span12 vid_div">
	<?php if( protectThis('*') && $day >= +3 ) : ?>
		<h2><?php _e('Day 4 - Top Beverages to Drink During Your 21 Day Detox'); ?></h2>
		<iframe class="hidden-phone hidden-tablet" width="571" height="321" src="//www.youtube.com/embed/GQiACiMUoo0" frameborder="0" allowfullscreen></iframe>
		<iframe class="hidden-desktop hidden-phone" width="352" height="198" src="//www.youtube.com/embed/GQiACiMUoo0" frameborder="0" allowfullscreen></iframe>
		<iframe class="hidden-desktop hidden-tablet" width="480" height="270" src="//www.youtube.com/embed/GQiACiMUoo0" frameborder="0" allowfullscreen></iframe>

		
	<?php endif; ?>
	</div>
    </div>
    
     <div class="row">

	
	<div class="span12 vid_div">
	<?php if( protectThis('*') && $day >= +4) : ?>
		<h2><?php _e('Day 5 - How to Stay Full During the 21 Day Detox'); ?></h2>
		<iframe class="hidden-phone hidden-tablet" width="571" height="321" src="//www.youtube.com/embed/idhtN-E2nvM" frameborder="0" allowfullscreen></iframe>
		<iframe class="hidden-desktop hidden-phone" width="352" height="198" src="//www.youtube.com/embed/idhtN-E2nvM" frameborder="0" allowfullscreen></iframe>
		<iframe class="hidden-desktop hidden-tablet" width="480" height="270" src="//www.youtube.com/embed/idhtN-E2nvM" frameborder="0" allowfullscreen></iframe>

		
	<?php endif; ?>
	</div>
    </div>
    
    <div class="row">

	<div class="span12 vid_div">
	<?php if( protectThis('*') && $day >= +5) : ?>
		<h2><?php _e('Day 6 - 4 Nutritional Products to Aid in Detox'); ?></h2>
		<iframe class="hidden-phone hidden-tablet" width="571" height="321" src="//www.youtube.com/embed/jpSL_ZeB_Dg" frameborder="0" allowfullscreen></iframe>
		<iframe class="hidden-desktop hidden-phone" width="352" height="198" src="//www.youtube.com/embed/jpSL_ZeB_Dg" frameborder="0" allowfullscreen></iframe>
		<iframe class="hidden-desktop hidden-tablet" width="480" height="270" src="//www.youtube.com/embed/jpSL_ZeB_Dg" frameborder="0" allowfullscreen></iframe>

		
	<?php endif; ?>
	</div>
    </div>
    
 <div class="row">

<div class="span12 vid_div">
	<?php if( protectThis('*') && $day >= +6) : ?>
		<h2><?php _e('Day 7 of the 21 Day Detox: Rik Napolean and Kyle Colbert'); ?></h2>
		<iframe class="hidden-phone hidden-tablet" width="571" height="321" src="//www.youtube.com/embed/kDmUVntfk6A" frameborder="0" allowfullscreen></iframe>
		<iframe class="hidden-desktop hidden-phone" width="352" height="198" src="//www.youtube.com/embed/kDmUVntfk6A" frameborder="0" allowfullscreen></iframe>
		<iframe class="hidden-desktop hidden-tablet" width="480" height="270" src="//www.youtube.com/embed/kDmUVntfk6A" frameborder="0" allowfullscreen></iframe>

		
	<?php endif; ?>
	</div>

</div>

<div class="row">

<div class="span12 vid_div">
	<?php if( protectThis('*') && $day >= +9) : ?>
		<h2><?php _e('Day 10 - Dr. Colbert Approved Sweeteners for the 21 Day Detox'); ?></h2>
		<iframe class="hidden-phone hidden-tablet" width="571" height="321" src="//www.youtube.com/embed/_Oq15UjDit8" frameborder="0" allowfullscreen></iframe>
		<iframe class="hidden-desktop hidden-phone" width="352" height="198" src="//www.youtube.com/embed/_Oq15UjDit8" frameborder="0" allowfullscreen></iframe>
		<iframe class="hidden-desktop hidden-tablet" width="480" height="270" src="//www.youtube.com/embed/_Oq15UjDit8" frameborder="0" allowfullscreen></iframe>

		
	<?php endif; ?>
	</div>

</div>

<div class="row">

<div class="span12 vid_div">
	<?php if( protectThis('*') && $day >= +10) : ?>
		<h2><?php _e('Day 11 - Dr. Colbert Gives Helpful Tips'); ?></h2>
		<iframe class="hidden-phone hidden-tablet" width="571" height="321" src="//www.youtube.com/embed/umWufE8HYUs" frameborder="0" allowfullscreen></iframe>
		<iframe class="hidden-desktop hidden-phone" width="352" height="198" src="//www.youtube.com/embed/umWufE8HYUs" frameborder="0" allowfullscreen></iframe>
		<iframe class="hidden-desktop hidden-tablet" width="480" height="270" src="//www.youtube.com/embed/umWufE8HYUs" frameborder="0" allowfullscreen></iframe>

		
	<?php endif; ?>
	</div>

</div>

<div class="row">

<div class="span12 vid_div">
	<?php if( protectThis('*') && $day >= +13) : ?>
		<h2><?php _e('Day 14 - Key Foods to Feel Full & Stay Energized'); ?></h2>
		<iframe class="hidden-phone hidden-tablet" width="571" height="321" src="//www.youtube.com/embed/4N3mkO2tWRg" frameborder="0" allowfullscreen></iframe>
		<iframe class="hidden-desktop hidden-phone" width="352" height="198" src="//www.youtube.com/embed/4N3mkO2tWRg" frameborder="0" allowfullscreen></iframe>
		<iframe class="hidden-desktop hidden-tablet" width="480" height="270" src="//www.youtube.com/embed/4N3mkO2tWRg" frameborder="0" allowfullscreen></iframe>

		
	<?php endif; ?>
	</div>

</div>

<div class="row">

<div class="span12 vid_div">
	<?php if( protectThis('*') && $day >= +16) : ?>
		<h2><?php _e('Day 17 - Dr. Colbert & Your Body During Detox'); ?></h2>
		<iframe class="hidden-phone hidden-tablet" width="571" height="321" src="//www.youtube.com/embed/Yk0wwPwj2OY" frameborder="0" allowfullscreen></iframe>
		<iframe class="hidden-desktop hidden-phone" width="352" height="198" src="//www.youtube.com/embed/Yk0wwPwj2OY" frameborder="0" allowfullscreen></iframe>
		<iframe class="hidden-desktop hidden-tablet" width="480" height="270" src="//www.youtube.com/embed/Yk0wwPwj2OY" frameborder="0" allowfullscreen></iframe>

		
	<?php endif; ?>
	</div>

</div>

<div class="row">

<div class="span12 vid_div">
	<?php if( protectThis('*') && $day >= +19) : ?>
		<h2><?php _e('Day 20 - 5 Key Exercises to Finish Your Detox'); ?></h2>
		<iframe class="hidden-phone hidden-tablet" width="571" height="321" src="//www.youtube.com/embed/D6mrUPrnbIQ" frameborder="0" allowfullscreen></iframe>
		<iframe class="hidden-desktop hidden-phone" width="352" height="198" src="//www.youtube.com/embed/D6mrUPrnbIQ" frameborder="0" allowfullscreen></iframe>
		<iframe class="hidden-desktop hidden-tablet" width="480" height="270" src="//www.youtube.com/embed/D6mrUPrnbIQ" frameborder="0" allowfullscreen></iframe>

		
	<?php endif; ?>
	</div>

</div>


<div class="row">

<div class="span12 vid_div">
	<?php if( protectThis('*') && $day >= +20) : ?>
		<h2><?php _e('Day 21 - Dr. Colbert Congratulates You, You Did It!'); ?></h2>
		<iframe class="hidden-phone hidden-tablet" width="571" height="321" src="//www.youtube.com/embed/3iYxBBeKmQE" frameborder="0" allowfullscreen></iframe>
		<iframe class="hidden-desktop hidden-phone" width="352" height="198" src="//www.youtube.com/embed/3iYxBBeKmQE" frameborder="0" allowfullscreen></iframe>
		<iframe class="hidden-desktop hidden-tablet" width="480" height="270" src="//www.youtube.com/embed/3iYxBBeKmQE" frameborder="0" allowfullscreen></iframe>

		
	<?php endif; ?>
	</div>

</div>



<?php if( protectThis('*') && $day >= +1) : ?>
<br /><hr><br />
<?php endif; ?>

	<div class="row">
	
    
    <div class="span12 vid_div">
	<?php if( protectThis('*') ) : ?>
		<h2><?php _e('Foods to Avoid'); ?></h2>
		<iframe class="hidden-tablet hidden-phone" width="571" height="321" src="//www.youtube.com/embed/DnYedd-S4z8" frameborder="0" allowfullscreen></iframe>
		<iframe class="hidden-desktop hidden-phone" width="352" height="198" src="//www.youtube.com/embed/DnYedd-S4z8" frameborder="0" allowfullscreen></iframe>
		<iframe class="hidden-desktop hidden-tablet" width="480" height="270" src="//www.youtube.com/embed/DnYedd-S4z8" frameborder="0" allowfullscreen></iframe>
		
		
	<?php endif; ?>
	</div>

</div>

<div class="row">

	<div class="span12 vid_div">
	<?php if( protectThis('*') ) : ?>
		<h2><?php _e('Dr. Don Colbert unveils 21 Day Detox Challenge'); ?></h2>
		<iframe class="hidden-tablet hidden-phone" width="571" height="321" src="//www.youtube.com/embed/Zrw39vnRTOk" frameborder="0" allowfullscreen></iframe>
		<iframe class="hidden-desktop hidden-phone" width="352" height="198" src="//www.youtube.com/embed/Zrw39vnRTOk" frameborder="0" allowfullscreen></iframe>
		<iframe class="hidden-desktop hidden-tablet" width="480" height="270" src="//www.youtube.com/embed/Zrw39vnRTOk" frameborder="0" allowfullscreen></iframe>
		
	<?php endif; ?>
	</div>

</div>


<?php else : ?>
		<div class="alert-margin alert alert-error"><?php _e('You must be logged in or signed up to view this content. Go <a href="login.php">here</a> to Login or Sign Up.'); ?></div>
	<?php endif; ?>


<?php include_once('footer.php'); ?>