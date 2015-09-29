<?php include_once('classes/check.class.php'); ?>
<?php include_once('../header.php'); ?>

<!-- Main Section Start -->
<div class="main-section">
<div class="wrapper">
    <div class="newspaper-left">
		<div class="mobileOnly support-left newspaper-border">
        <h2 class="newspaper-header">Companion Package</h2>
        	<div class="newspaper-body">
        <a href="http://www.drcolbert.com/21-day-detox-package.html"><img src="http://divinehealthdetox.com/img/detoxpackage.png" />Detox Package</a>
        	</div>
        </div>
        <div class="tips newspaper-border">
        <h2 class="newspaper-header">Tip of The Day</h2>
           <div class="newspaper-body">
           <?php
		   $startDate=date_create("2014-09-30");
			$today = date_create(date("Y-m-d"));
			$diff=date_diff($startDate,$today);
			$day = date_interval_format($diff, '%R%a');
			echo "<!-- Currently: " . $day . " -->";
		   switch ($day)
			{
			case "-10":
			case "-5":
			case "+1":
			case "+6":
			case "+11":
			case "+16":
			case "+21":
			  $image = "tip1";
			  break;
			case "-9":
			case "-4":
			case "+2":
			case "+7":
			case "+12":
			case "+17":
			  $image = "tip2";
			  break;
			case "-8":
			case "-3":
			case "+3":
			case "+8":
			case "+13":
			case "+18":
			$image = "tip3";
			  break;
			case "-7":
			case "-2":
			case "+4":
			case "+9":
			case "+14":
			case "+19":
			$image = "tip4";
			  break;
			case "-6":
			case "-1":
			case "+5":
			case "+10":
			case "+15":
			case "+20":
			$image = "tip5";
			  break;
			default:
			$image = "tip1";
			}
		   ?>
			<a href="<?php if( !protectThis("1,2,3, 4") ) {echo "https://divinehealthdetox.com/backend/login.php"; } else { echo "http://divinehealthdetox.com/backend/home.php"; } ?>"><img src="http://divinehealthdetox.com/backend/assets/img/<?php echo $image; ?>.png" alt="Tip 1" /></a>
        	</div>
        </div>
        <div class="facebook newspaper-border">
        <h2 class="newspaper-header">Facebook</h2>
           <div class="newspaper-body">
				<div class="fb-like-box" data-href="https://www.facebook.com/DonColbertMD" data-width="200px" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="yes" data-show-border="false"></div>
        	</div>
        </div>
		<div class="instagram newspaper-border">
        <h2 class="newspaper-header">Instagram</h2>
           <div class="newspaper-body">
<img alt="" src="http://candoweightloss.com/wp-content/uploads/2013/12/instagram.png" />
<b><a href="http://instagram.com/divinehealthnutrition">@divinehealthnutrition</a></b><!-- www.intagme.com -->
<iframe src="http://www.intagme.com/in/?u=ZGl2aW5laGVhbHRobnV0cml0aW9ufGlufDIwMHwxfDJ8fHllc3w1fHVuZGVmaW5lZHxubw==" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:215px; height: 430px" ></iframe>
</div>
        	</div>
        </div>
    </div>
    <div class="newspaper-center">
        <div class="welcome-center newspaper-border">
        <h2 class="newspaper-header">Dr. Colbert's 21 Day Detox</h2>
        	<div class="newspaper-body">
            <div class="mobileOnly signup-buttons">
     <!-- Closed Button <img src="/img/closedbutton2.jpg" alt="Closed" /><br /><br /> -->
     <a href="https://divinehealthdetox.com/backend/login.php">Register<div class="diva-icon"> &#128237; </div> <div class="diva"></div>  </a><br /><br />
     <a href="backend/login.php"> Login  <div class="diva-icon"> &#128273; </div> <div class="diva"></div>  </a>
	
	 <!-- New Signup Button <img src="img/nextdetoxbtn.jpg" alt="Signup for the 21 Day Detox is Now Closed" /> -->
     <br />
     		</div>
            <p style="font-weight:bold; line-height:1.5; text-align:left; text-indent:50px;"><!-- Join Dr. Colbert for a 21 Day Detox. The 21 Day Detox is created to restore the body’s ability to heal itself. It aims to cleanse and detoxify the body by making healthy changes in diet and taking the right supplements. A few of the outstanding health benefits from the 21 Day Detox can include great skin health, more energy, improved digestion, better sleep, clarity of mind and reduced headaches, bloating, constipation and joint pain. --> <!-- <a href="http://divinehealthdetox.com/backend/login.php">Sign up for free now.</a></p> -->
                <div id="home-check">
                	<p id="check-head"><b>THANK YOU FOR REGISTERING</b></p>
                    <br /><iframe width="420" height="280" src="//www.youtube.com/embed/DnYedd-S4z8" frameborder="0" allowfullscreen></iframe><br /><br />
                    <p class="center"><a href="/backend/login.php"><img src="/img/login.png" alt="Register for your 21 Day Detox" /></a></p>
              </div>
            </p>
			</span>
            </div>   
        </div>
        <div class="blog newspaper-border">
        <h2 class="newspaper-header">Community Support</h2>
        	<div class="newspaper-body <?php if( !protectThis("1,2,3, 4") ) {echo "clickable-div"; } ?> blog-content">
				<iframe src="http://www.divinehealthdetox.com/backend/yshout/example/light.html" scrolling="no" frameborder="0" height="600px" width="400px" scrolling="yes"></iframe>
				<a href="https://divinehealthdetox.com/backend/login.php"></a>
        	</div>
        </div>
        <div class="videos newspaper-border">
        <h2 class="newspaper-header">Latest Videos</h2>
        	<div class="newspaper-body  <?php if( !protectThis("1,2,3, 4") ) {echo "clickable-div"; } ?> ">
			<a href="https://divinehealthdetox.com/backend/login.php"></a>
            <?php
			$startDate=date_create("2014-09-30");
			$today = date_create(date("Y-m-d"));
			$diff=date_diff($startDate,$today);
			$day = date_interval_format($diff, '%R%a');
		   switch ($day)
			{
			case "+1":
			  $video = "FAAbBPFuICQ";
			  $video2 = "TmM-k7dkMBA";
			  break;
			case "+2":
			  $video = "FAAbBPFuICQ";
			  $video2 = "TmM-k7dkMBA";
			  break;
			case "+3":
			  $video = "FAAbBPFuICQ";
			  $video2 = "TmM-k7dkMBA";
			  break;
			case "+4":
			  $video = "Pk87STJs-zI";
			  $video2 = "FAAbBPFuICQ";
			  break;
			case "+5":
			$video = "idhtN-E2nvM";
			$video2 = "Pk87STJs-zI";
			  break;
			case "+6":
			$video = "jpSL_ZeB_Dg";
			$video2 = "idhtN-E2nvM";
			  break;
			case "+7":
			$video = "kDmUVntfk6A";
			$video2 = "jpSL_ZeB_Dg";
			  break;
			case "+8":
			$video = "DAY 8";
			$video2 = "kDmUVntfk6A";
			  break;
			  case "+9":
			$video = "DAY 9";
			$video2 = "DAY 8";
			  break;
			  case "+10":
			$video = "_Oq15UjDit8";
			$video2 = "kDmUVntfk6A";
			  break;
			  case "+11":
			$video = "umWufE8HYUs";
			$video2 = "_Oq15UjDit8";
			  break;
			  case "+12":
			$video = "DAY 12";
			$video2 = "umWufE8HYUs";
			  break;
			  case "+13":
			$video = "DAY 13";
			$video2 = "DAY 12";
			  break;
			  case "+14":
			$video = "DAY 14";
			$video2 = "DAY 13";
			  break;
			  case "+15":
			$video = "DAY 15";
			$video2 = "DAY 14";
			  break;
			  case "+16":
			$video = "DAY 16";
			$video2 = "DAY 15";
			  break;
			  case "+17":
			$video = "Yk0wwPwj2OY";
			$video2 = "umWufE8HYUs";
			  break;
			  case "+18":
			$video = "DAY 18";
			$video2 = "Yk0wwPwj2OY";
			  break;
			  case "+19":
			$video = "DAY 19";
			$video2 = "DAY 18";
			  break;
			  case "+20":
			$video = "D6mrUPrnbIQ";
			$video2 = "DAY 19";
			  break;
			  case "+21":
			$video = "3iYxBBeKmQE";
			$video2 = "D6mrUPrnbIQ";
			  break;
			default:
			$video = "Zrw39vnRTOk";
			$video2 = "Zrw39vnRTOk";
			}
		   ?>
				<ul>
                	<li>
						<iframe src="//www.youtube.com/embed/<?php echo $video; ?>?feature=player_embedded&showinfo=0&controls=0" frameborder="0" allowfullscreen></iframe>
					</li>
			
            <!--                    
                	<li>
						<iframe src="//www.youtube.com/embed/<?php echo $video2; ?>?feature=player_embedded&showinfo=0&controls=0" frameborder="0" allowfullscreen></iframe>
					</li>
            -->
					<!-- <li>
						<p class="bold">Foods to Avoid</p>
						<iframe src="//www.youtube.com/embed/DnYedd-S4z8?feature=player_embedded&showinfo=0&controls=0" frameborder="0" allowfullscreen></iframe>
					</li> -->
				</ul>
            </div>
        </div>
    </div>
    <div class="newspaper-right">
        <div class="support newspaper-border">
        <h2 class="newspaper-header">Companion Package</h2>
        	<div class="newspaper-body">
       <a href="http://www.drcolbert.com/21-day-detox-package.html"><img src="http://divinehealthdetox.com/img/detoxpackage.png" />Detox Package</a>
        	</div>
        </div>
        <div class="twitter newspaper-border">
        <h2 class="newspaper-header">Twitter</h2>        
        	<div class="newspaper-body">
				<a class="twitter-timeline" href="https://twitter.com/Detox21Days" data-widget-id="393394989771669504" style="opacity:1;">Tweets by @Detox21Days</a>
  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				</div>
        </div>
		<div class="pinterest newspaper-border">
        <h2 class="newspaper-header">Pinterest</h2>        
        	<div class="newspaper-body">
				<a data-pin-do="embedBoard" href="http://www.pinterest.com/divinehealth1/21-day-detox/" data-pin-scale-width="150" data-pin-scale-height="400" data-pin-board-width="200">Follow Don Colbert's board "Can Do" Weightloss Challenge on Pinterest.</a>
<!-- Please call pinit.js only once per page -->
<script type="text/javascript" async src="//assets.pinterest.com/js/pinit.js"></script>
				</div>
        </div>
        </div>
    </div>



     
</div>
<!-- Main Section End -->


<div class="customer">
<div class="wrapper">

<ul class="row-fluid testio-cont">
   
</ul>
</div>	
</div>

<!--

-->


<?php include_once('../footer.php'); ?>