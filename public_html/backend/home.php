<?php include_once('classes/check.class.php'); ?>
<?php include_once('header.php'); ?>
<?php require_once('../detox/model.php'); ?>
<?php require_once('../detox/mailing_data.php'); ?>
<?php
if(isset($_SESSION['jigowatt']['user_id']) && $_SESSION['jigowatt']['user_id'] != 9183) {
    $model = new model('login_users');
    $user = $model->getByField('user_id',$_SESSION['jigowatt']['user_id']);
}
if(isset($_COOKIE['user_id'])) {
    $model = new model('login_users');
    $user = $model->getByField('user_id',$_COOKIE['user_id']);
}
?>
<?php if( protectThis("1,2,3, 4") ) : ?>
<br>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" />
    <link rel="stylesheet" href="<?php echo SITE_DIR; ?>css/jquery.countdown.css" />
    <link rel="stylesheet" href="<?php echo SITE_DIR; ?>css/count-style.css" />
    <script type="text/javascript" src="<?php echo SITE_DIR; ?>js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo SITE_DIR; ?>js/jquery.countdown.js"></script>
    <script type="text/javascript" src="<?php echo SITE_DIR; ?>js/count-script.js"></script>
<!--<div class="alert alert-success">You have successfully signed up for the 21 Day Detox!</div>-->
<div class="features">
<!--Header Text-->
<div class="row">
<div class="span12">
<center>
<a href="http://www.drcolbert.com/21-day-detox-package-759.html"><img src="../img/detoxpromobanner.jpg" /></a>
</center>
<h1 style="font-size: 50px; font-weight: bold;">Welcome to the <img src="assets/img/logo.png" alt="21 Day Detox" /></h1>
<center>
<h3>Questions? Call: 407.732.6952</h3>
<a href="/backend/ebook.php"><img src="/img/ebooklet.png" alt="Dr. Colbert's 21 Day Detox E-Booklet" /></a></center>
</div>
</div>
<br><hr><br>
<div class="row">
    <div class="span12">
        <?php if(strtotime($user['sdate']) + 4*24*60*60 > strtotime(date('Y-m-d H:i:s'))): ?>
            <h3 style="color: #2c82ee; font-size: 25px; margin-top: 40px; text-align: center;">The 21 Day Detox Challnege will Begin in</h3>
            <input id="reg_date" value="<?php echo strtotime(date('Y-m-d H:06:00'), $user['sdate']); ?>000" type="hidden">
            <div id="countdown"></div>
            <p id="note"></p>
        <?php endif; ?>
        <!--        <center><iframe src="../basic.html" width="410" height="170" frameborder="0" scrolling="no"></iframe><h3>Until the 21 Day Detox Program Begins!</h3></center>-->
        <br><br><hr>
    </div>
</div>
<!--Start-->
    <div class="span1">
        &nbsp;
    </div>
	<div class="span4">
		<h1 class="box_title">Detox Tip</h1>
		<div class="tip_box">
		<img src="assets/img/alkalize_tip.jpg" width="350" />
		</div>
		
		<h1 class="box_title">Latest Video</h1>
		<div class="vid_box">
		<?php
        $video = str_replace('https://www.youtube.com/watch?v=','',$videos[$user['sent']]);
        $video = str_replace('&list=UUxObFUbx4nYwWVCelOUQtKA','',$video);
		  //GET START DATE
//			$DBH = new PDO("mysql:host=localhost;dbname=ddetox_backend", 'ddetox_admin', 'Starcraft12');
//			$statement = $DBH->query("select setting_value from detox_settings where setting_name='startDate'");
//			$row = $statement->fetch(PDO::FETCH_ASSOC);
//			$startDate=date_create($row['setting_value']);
//			if($startDate) {
//
//            }
//        echo date('Y-m-d', strtotime($user['sdate']));
//			$today = date_create(date("Y-m-d"));
//			$diff = date_diff(date('Y-m-d', strtotime($user['sdate'])),$today);
//			$day = date_interval_format($diff, '%R%a');
//			//DAY MUST BE SET 1 LESS THAN DAY (EXAMPLE: +1 is for Day 2)
//
//		   switch ($day)
//			{
//			case "+0":
//			  $video = "Oa4wm2ftna4";
//			  break;
//			case "+1":
//			  $video = "LC9rk3RRBs";
//			  break;
//			case "+2":
//			  $video = "8hbQ_p0FBUU";
//			  break;
//			case "+3":
//			  $video = "GQiACiMUoo0";
//			  break;
//			case "+4":
//			$video = "idhtN-E2nvM";
//			  break;
//			case "+5":
//			$video = "jpSL_ZeB_Dg";
//			  break;
//			case "+6":
//			$video = "kDmUVntfk6A";
//			  break;
//			case "+7":
//			$video = "kDmUVntfk6A";
//			  break;
//			  case "+8":
//			$video = "kDmUVntfk6A";
//			  break;
//			  case "+9":
//			$video = "_Oq15UjDit8";
//			  break;
//			  case "+10":
//			$video = "umWufE8HYUs";
//			  break;
//			  case "+11":
//			$video = "umWufE8HYUs";
//			  break;
//			  case "+12":
//			$video = "umWufE8HYUs";
//			  break;
//			  case "+13":
//			$video = "4N3mkO2tWRg";
//			  break;
//			  case "+14":
//			$video = "4N3mkO2tWRg";
//			  break;
//			  case "+15":
//			$video = "4N3mkO2tWRg";
//			  break;
//			  case "+16":
//			$video = "Yk0wwPwj2OY";
//			  break;
//			  case "+17":
//			$video = "Yk0wwPwj2OY";
//			  break;
//			  case "+18":
//			$video = "Yk0wwPwj2OY";
//			  break;
//			  case "+19":
//			$video = "D6mrUPrnbIQ";
//			  break;
//			  case "+20":
//			$video = "3iYxBBeKmQE";
//			  break;
//			default:
//			$video = "Zrw39vnRTOk";
//			}
		   ?>
				<iframe width="352" height="198" src="//www.youtube.com/embed/<?php echo $video; ?>" frameborder="0" allowfullscreen></iframe>
		</div>
		
	</div>	
		
		            
        <div class="span5" style="text-align: center;">
        	<h1>Detox Talk</h1>
			<iframe src="http://www.divinehealthdetox.com/backend/yshout/example/light.html" scrolling="no" frameborder="0" height="600px" width="400px" scrolling="yes"></iframe>
        </div>
 
        
        <div class="span3 " style="text-align:center; margin-top: 100px;">
        
<!--        <iframe src="http://divinehealthdetox.com/backend/advpoll/polls/view/2" frameborder="0" width="390" height="800" scrolling="no"></iframe>-->
        
        
         </div>
		
	</div>
	
</div>





	<br><br><hr>
    <!--<div class="row">
        <div class="span12">
			<div style="margin: 40px auto; cursor: pointer; width: 500px;" />
				<img src="http://www.divinehealthdetox.com/detox/mail/2.png" alt="detox"  />
				<form method="post" id="print_pdf">
			</div>
		</div>
	</div>-->





        
        
        <div class="row">
        <center><h1>Nutritional Supplements</h1></center>
        <div class="span3" style="text-align:center;"><a href="http://www.drcolbert.com/maxone.html"><img src="../img/maxone.png" /></a></div>
        <div class="span3" style="text-align:center;"><a href="http://www.drcolbert.com/living-green-superfood.html"><img src="../img/greensurpremefood.png" /></a></div>
        <div class="span3" style="text-align:center;"><a href="http://www.drcolbert.com/fiber-formula-powdered.html"><img src="../img/fiberformula.png" /></a></div>
        <div class="span3" style="text-align:center;"><a href="http://www.drcolbert.com/yellow-pea-protein.html"><img src="../img/peaprotein.png" /></a></div>
        
        
                

        
        </div>
        
        <br><br><hr/><br><br>
       
        
        <div class="row-fluid">
        
        <div class="span12">
        <center><img src="assets/img/detox_timeline.jpg" width="100%" /></center>
        </div>
        
        </div>
        
        <br><br>
                
        
        <div class="row-fluid">
        
        <div class="span4" style="text-align: center"> <a href="soups.php"><img src="../img/food icons/soup_icon.png" alt="Soup Recipes" /><h3>Soup Recipes</h3></a> </div>
        <div class="span4" style="text-align: center"> <a href="salads.php"><img src="../img/food icons/salad_icon.png" alt="Salad Recipes" /> <h3>Salad Recipes</h3></a>
        </div>
        <div class="span4" style="text-align: center"> <a href="smoothies.php"><img src="../img/food icons/smoothie_icon.png" alt="moothie Recipes" /> <h3>Smoothie Recipes</h3></a>
        </div>
        
        <br><br>
        
        <div class="row">
        
        <div class="span6 hidden-phone" style="text-align: center">
                <h1 class="box_title">Shopping List</h1><br />
                <a href="/img/shoppinglist.pdf"><p>Save As PDF</p></a>
				<a href="/img/shoppinglist.pdf"><img src="assets/img/shoppinglist_desktop.png" /></a>
		</div>
        <div class="span6 visible-phone" style="text-align: center">
        		<img src="assets/img/shoppinglist_phone.png" />
        </div>
            
            <div class="span6 hidden-phone">
    <div class="row-fluid">
    	<div class="span6" style="text-align: center;">
    	  <h2><img src="assets/img/processedicon.png" alt="No Processed Foods" width="150" /></h2>
    	  <h3>No Processed Foods</h3>
    	</div>
		<div class="span6" style="text-align: center;">
		  <h2><img src="assets/img/dairyicon.png" alt="No Dairy Products" width="150" /></h2>
		  <h3>No Dairy Products</h3>
		</div>
     </div>
     <div class="row-fluid">
		<div class="span6" style="text-align: center;">
		  <h2><img src="assets/img/meaticon.png" alt="No Meats" width="150" /></h2>
		  <h3>No Meats
</h3>
		</div>
		<div class="span6" style="text-align: center;">
		  <h2><img src="assets/img/sugaricon.png" alt="No Sugar" width="150" /></h2>
		  <h3>No Sugar</h3>
		</div>
     </div>
     <div class="row-fluid">
		<div class="span6" style="text-align: center;">
		  <h2><img src="assets/img/breadicon.png" alt="No Grains" width="150" /></h2>
		  <h3>No Grains</h3>
		</div>
		<div class="span6" style="text-align: center;">
		  <h2><img src="assets/img/nightshadeicon.png" alt="No Nightshades" width="150" /></h2>
		  <h3>No Nightshades</h3>
		</div>
      </div>
      
      
            </div>
 

        
        </div>
        
        <div class="row-fluid">
	<div class="span12">
		<center><a href="http://www.drcolbert.com/21-day-detox-package-759.html"><img width="800" src="http://www.drcolbert.com/files/images/promotions/Banners_Detox468x60.png" /></a><br />
        		<!-- <center><a href="http://www.candoweightloss.com/"><img width="800" src="/img/cando_banner.png" /></a><br /> -->

	</div>
</div>

<?php else : ?>

<?php if( protectThis("5") ) : ?>

<!--Header Text-->
<div class="row">
<div class="span12">
<center>
<h1 style="font-size: 50px; font-weight: bold;">Welcome to the <img src="assets/img/logo.png" alt="21 Day Detox" /></h1>
<h3>You have registered for the next 21 Day Detox that will start May 7th, 2014. We will send you emails letting you know of the upcoming launch.</h3>
<h3>Questions? Call: 407.732.6952</h3></center>
</div>
</div>

<?php else : ?>

		<div class="alert-margin alert alert-error"><?php _e('You must be logged in or signed up to view this content. Go <a href="login.php">here</a> to Login or Sign Up.'); ?></div>
     <?php endif; ?>   
	<?php endif; ?>

<?php exit; ?>


