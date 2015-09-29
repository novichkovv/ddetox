<?php include_once('classes/check.class.php'); ?>
<?php include_once('header.php'); ?>


<!-- Main Section Start -->
<div class="main-section">
<div class="wrapper">
    <div class="newspaper-left">
		<div class="signup newspaper-border">
        <h2 class="newspaper-header">Subcribe</h2>
        	<div class="newspaper-body signup-buttons">
     <!-- Closed Button <img src="/img/closedbutton2.jpg" alt="Closed" /><br /><br /> -->
     <a href="https://www.divinehealthdetox.com/shop/home.php">Free Signup<div class="diva-icon"> &#128237; </div> <div class="diva"></div>  </a><br /><br />
     <a href="backend/login.php"> Login  <div class="diva-icon"> &#128273; </div> <div class="diva"></div>  </a>
	
	 <!-- New Signup Button <img src="img/nextdetoxbtn.jpg" alt="Signup for the 21 Day Detox is Now Closed" /> -->
     		</div>
        </div> 
        <div class="members newspaper-border">
        <h2 class="newspaper-header">Members</h2>
        	<div class="newspaper-body">
			<?php
            
				$dbhost="localhost";
				$dbname="ddetox_backend";
				$dbuser="ddetox_admin";
				$dbpasswd="Starcraft12";
				
				
				// connect to the db
				$link = mysql_connect($dbhost, $dbuser, $dbpasswd);
				if (!$link) {
					die('Could not connect: ' . mysql_error());
				}
				$db_selected = mysql_select_db($dbname, $link);
				if (!$db_selected) {
					die ('Can\'t use dbreviews : ' . mysql_error());
				}
				
				?>
				<!-- <p style="text-align:center;"><span style="font-weight:bold;">Registered<br /></span><span style="color:#F00; font-weight:bold; font-size:24px;"><?php
				
				//$result = mysql_query("SELECT * FROM  `login_users` WHERE  `user_level` LIKE '%5%' OR  `user_level` LIKE '%4%'");
				//$result = mysql_query("SELECT * FROM  `login_users` WHERE  `year` LIKE '2014'");
				$result = mysql_query("SELECT * FROM  `login_users` WHERE  `timestamp` >= '2014-02-16 00:00:00'");
				$num_rows = mysql_num_rows($result);
				
				
				//echo $num_rows . "<br />";
				?>
				
				<p style="text-align:center;"><span style="font-weight:bold;">Joined in Fall 2014<br /></span><span style="color:#F00; font-weight:bold; font-size:24px;"> -->
				<p style="text-align:center;"><span style="font-weight:bold;">Registered<br /></span><span style="color:#F00; font-weight:bold; font-size:24px;">
				<?php
				
				//$result = mysql_query("SELECT * FROM  `login_users` WHERE  `user_level` LIKE '%4%'")
				//$result = mysql_query("SELECT * FROM  `login_users` WHERE  `timestamp` >= '2013-11-23 00:00:00' AND `timestamp` <= '2014-03-07 23:59:59'");
				//$result = mysql_query("SELECT * FROM  `login_users` WHERE  `year` = '2014'");
				$result = mysql_query("SELECT * FROM  `login_users`");
				$num_rows2014 = mysql_num_rows($result);
				
				
				echo $num_rows2014;
                
              ?>
    		</span></p>
            </div>
        </div>
		<div class="mobileOnly support-left newspaper-border">
        <h2 class="newspaper-header">Support</h2>
        	<div class="newspaper-body">
        <p>Your detox experience is important to us. If you need support outside of the community provided here, call us at (407) 732-6952 or <a href="mailto:info@drcolbert.com">send us an email.</a></p>
        	</div>
        </div>
        <div class="tips newspaper-border">
        <h2 class="newspaper-header">Tip of The Day</h2>
           <div class="newspaper-body">
           <?php
		   $today = date('m-d-Y');
		   switch ($today)
			{
			case "04-21-2014":
			case "04-26-2014":
			case "05-01-2014":
			case "05-06-2014":
			case "05-10-2014":
			  $image = "tip1";
			  break;
			case "04-22-2014":
			case "04-27-2014":
			case "05-02-2014":
			case "05-07-2014":
			case "05-11-2014":
			  $image = "tip2";
			  break;
			case "04-23-2014":
			case "04-28-2014":
			case "05-03-2014":
			case "05-08-2014":
			case "05-12-2014":
			$image = "tip3";
			  break;
			case "04-24-2014":
			case "04-29-2014":
			case "05-04-2014":
			case "05-09-2014":
			case "05-13-2014":
			$image = "tip4";
			  break;
			case "04-25-2014":
			case "04-30-2014":
			case "05-05-2014":
			case "05-10-2014":
			case "05-14-2014":
			$image = "tip5";
			  break;
			default:
			$image = "tip1";
			}
		   ?>
			<a href="<?php if( !protectThis("1,2,3, 4") ) {echo "https://www.divinehealthdetox.com/shop/home.php"; } else { echo "http://divinehealthdetox.com/backend/home.php"; } ?>"><img src="http://divinehealthdetox.com/backend/assets/img/<?php echo $image; ?>.png" alt="Tip 1" /></a>
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
     <a href="https://www.divinehealthdetox.com/shop/home.php">Signup<div class="diva-icon"> &#128237; </div> <div class="diva"></div>  </a><br /><br />
     <a href="backend/login.php"> Login  <div class="diva-icon"> &#128273; </div> <div class="diva"></div>  </a>
	
	 <!-- New Signup Button <img src="img/nextdetoxbtn.jpg" alt="Signup for the 21 Day Detox is Now Closed" /> -->
     <br />
     		</div>
            <p style="font-weight:bold; line-height:1.5; text-align:left; text-indent:50px;">Dr. Colbert's Health Report - Detoxification</p>
            <p><iframe width="420" height="280" src="//www.youtube.com/embed/pKrjQ-wy97A" frameborder="0" allowfullscreen></iframe></p>
            <p style="font-weight:bold; line-height:1.5; text-align:left; text-indent:50px;">Join Dr. Colbert for a 21 Day Detox. The 21 Day Detox is created to restore the body’s ability to heal itself. It aims to cleanse and detoxify the body by making healthy changes in diet and taking the right supplements. A few of the outstanding health benefits from the 21 Day Detox can include great skin health, more energy, improved digestion, better sleep, clarity of mind and reduced headaches, bloating, constipation and joint pain.  <a href="https://www.divinehealthdetox.com/shop/home.php">Subscribe.</a></p>
			<img src="img/nextdetox_cal.png" alt="Calendar for the 21 Day Detox" />
            <span class="mobileOnly registered-numbers" style="text-align:center"><p style="text-align:center;"><span style="font-weight:bold;">Registered<br /></span><span style="color:#F00; font-weight:bold; font-size:24px;"><?php
				
				echo $num_rows . "<br />";
				?>
				
				<p style="text-align:center;"><span style="font-weight:bold;">Joined in Fall 2014<br /></span><span style="color:#F00; font-weight:bold; font-size:24px;"><?php
	
				echo $num_rows2014;
                
              ?></span>
            </div>   
        </div>
        <div class="blog newspaper-border">
        <h2 class="newspaper-header">Community Support</h2>
        	<div class="newspaper-body <?php if( !protectThis("1,2,3, 4") ) {echo "clickable-div"; } ?> blog-content">
				<iframe src="http://www.divinehealthdetox.com/backend/yshout/example/light.html" scrolling="no" frameborder="0" height="600px" width="400px" scrolling="yes"></iframe>
				<a href="https://www.divinehealthdetox.com/shop/home.php"></a>
        	</div>
        </div>
        <div class="videos newspaper-border">
        <h2 class="newspaper-header">Latest Videos</h2>
        	<div class="newspaper-body  <?php if( !protectThis("1,2,3, 4") ) {echo "clickable-div"; } ?> ">
			<a href="http://www.divinehealthdetox.com/backend/sign_up.php"></a>
				<ul>
					<li>
						<p class="bold">Dr. Don Colbert unveils 21 Day Detox Challenge</p>
						<iframe src="//www.youtube.com/embed/x6fCfVg01v4?feature=player_embedded&showinfo=0&controls=0" frameborder="0" allowfullscreen></iframe>
					</li>
					<li>
						<p class="bold">Foods to Avoid</p>
						<iframe src="//www.youtube.com/embed/DnYedd-S4z8?feature=player_embedded&showinfo=0&controls=0" frameborder="0" allowfullscreen></iframe>
					</li>
				</ul>
            </div>
        </div>
    </div>
    <div class="newspaper-right">
        <div class="support newspaper-border">
        <h2 class="newspaper-header">Support</h2>
        	<div class="newspaper-body">
        <p>Your detox experience is important to us. If you need support outside of the community provided here, call us at (407) 732-6952 or <a href="mailto:info@drcolbert.com">send us an email.</a></p>
        	</div>
        </div>
        <div class="recipes newspaper-border">
        <h2 class="newspaper-header">Latest Recipes</h2>
        	<div class="newspaper-body" style="display:inline-block;">
                <div class="list"><a href="<?php if( !protectThis("1,2,3, 4") ) {echo "https://www.divinehealthdetox.com/shop/home.php"; } else { echo "http://divinehealthdetox.com/backend/soups.php"; } ?>"><img class="recipe-image" src="http://divinehealthdetox.com/img/hot-sour-soup.jpg" /><br />Hot and Sour Soup</a></div>
                <div class="list"><a href="<?php if( !protectThis("1,2,3, 4") ) {echo "https://www.divinehealthdetox.com/shop/home.php"; } else { echo "http://divinehealthdetox.com/backend/salads.php"; } ?>"><img class="recipe-image" src="http://divinehealthdetox.com/img/warm-salad.jpg" /><br />Warm Spring Salad</a></div>
            </div>
        </div>
        <div class="articles newspaper-border">
        <h2 class="newspaper-header">Latest Articles</h2>
        	<div class="newspaper-body" style="display:inline-block;">
                <div class="list"><a href="http://www.drcolbert.com/blog/2013/05/got-glutathione/"><img class="recipe-image" src="http://drcolbert.com/wp/wp-content/uploads/2013/05/magnesium-1.jpg" /><br />Got Glutathione?</a></div>
                <div class="list"><a href="http://www.drcolbert.com/blog/2013/02/is-your-body-saying-its-time-for-a-detox/"><img class="recipe-image" src="http://drcolbert.com/wp/wp-content/uploads/2013/03/Untitled-2-150x70.jpg" /><br />Is Your Body Saying It’s Time for a Detox?</a></div>
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

<!-- Features Start -->
<div class="features" id="books">
<div class="wrapper">
	
     <h3> Books and Recipes </h3>	
     <div class="title-div"></div>
     <p class="subti">Aid your Detox</p>

     <!-- Features list Start -->
     <div class="featu">
     <div class="slider1">
                 
           <ul class="row-fluid"><!--Books Slide-->
           <li class="span4"> <div class="featu-icon"><img src="img/detox_book.png" /></div> <h6> Amazon Kindle </h6> <p> <a href="http://www.amazon.com/Healthy-Through-Detox-Fasting-ebook/dp/B001RGEHXW/ref=tmm_kin_swatch_0?_encoding=UTF8&sr=8-1&qid=1382710261"><img src="img/AKlogo.jpg" alt="Amazon Kindle" /></a> </p>
             </li>
           <li class="span4"> <div class="featu-icon"><img src="img/detox_book.png" /></div> <h6> DrColbert.com </h6> <p> <a href="http://www.drcolbert.com/get-healthy-through-detox-and-fasting.html"><img src="img/DHlogo.jpg" alt="DrColbert.com" /></a> </p> </li>
           <li class="span4"> <div class="featu-icon"><img src="img/detox_book.png" /></div> <h6> Barnes & Nobles </h6> <p> <a href="http://www.barnesandnoble.com/w/get-healthy-through-detox-and-fasting-donald-colbert/1031043419?ean=9781591859611"><img src="img/b&nlogo.jpg" alt="Barnes & Noble" /></a> </p> </li>
           </ul>
          
           <ul class="row-fluid">
           <li class="span4"> <div class="featu-icon"> <a href="backend/soups.php"><img src="img/food icons/soup_icon.png" /></a> </div> <h6> Soups </h6> <!--<p> Mastrer your tasks &#38; improve your work easily. </p>--> </li>
           <li class="span4"> <div class="featu-icon"> <a href="backend/salads.php"><img src="img/food icons/salad_icon.png" /></a> </div> <h6> Salads </h6> <!--<p> Mastrer your tasks &#38; improve your work easily. </p>--> </li>
           <li class="span4"> <div class="featu-icon"> <a href="backend/smoothies.php"><img src="img/food icons/smoothie_icon.png" /></a> </div> <h6> Smoothies </h6> <!--<p> Mastrer your tasks &#38; improve your work easily. </p>--> </li>
           </ul>
          
     </div>
     </div>
     <!-- Features list End -->

     <div class="clear"></div>
     <div id="navi2"></div> 

</div>
</div>
<!-- Features End -->

<!-- Extras Top Arrow Divider -->
<div class="arrow-divi"><span></span></div>

<!-- Extras Start -->

<div class="extras">
<div class="wrapper">
<div class="slider2">
	<div class="slide1">
		<div class="slide-img"> <img src="img/package_deal.png" alt="" />
		</div>
		<div class="slide-txt">
			<h3> 21 Day Detox Package </h3>
			<p class="subtitle"> Learn More at <a href="http://www.drcolbert.com/21-day-detox-package-640.html">DrColbert.com</a></p>
            <p>This Newly Developed 21 Day Detox Package Contains Four Key Nutritional Products designed to detoxify the colon, blood, liver, brain, kidneys and all tissue throughout the body. </p>
			

		</div>
	</div>
	
	<div class="slide1">
		<div class="slide-img"> <a href="http://www.drcolbert.com/maxone.html"><img src="img/maxone.jpg" alt="" /></a>
		</div>
		<div class="slide-txt">
			<h3> MaxOne </h3>
			<p class="subtitle"> Learn More at <a href="http://www.drcolbert.com/maxone.html">DrColbert.com</a> </p>
			<p> MaxOne will boost glutathione, which is the master detoxifier in the body. Glutathione is a sulfur based molecule that sticks to heavy metals and escorts them out of the body. </p>
		</div>
	</div>
    
    <div class="slide1">
		<div class="slide-img"> <a href="http://www.drcolbert.com/plant-protein.html"><img src="img/plantprotein.jpg" alt="" /></a>
		</div>
		<div class="slide-txt">
			<h3> All-in-One Plant Protein </h3>
			<p class="subtitle"> Learn More at <a href="http://www.drcolbert.com/plant-protein.html">DrColbert.com</a> </p>
			<p> Plant Protein is designed to supply protein to your diet since the program removes all meats. Divine Health's plant protein is a gentle way to include all the essential amino acids that may be lacking in the detox diet.</p>
		</div>
	</div>
    
    <div class="slide1">
		<div class="slide-img"> <a href="http://www.drcolbert.com/living-green-superfood.html"><img src="img/gsf.jpg" alt="" /></a>
		</div>
		<div class="slide-txt">
			<h3> Living Green Supremefood </h3>
			<p class="subtitle"> Learn More at <a href="http://www.drcolbert.com/living-green-superfood.html">DrColbert.com</a> </p>
			<p> Green Supremefood Canister is intended to aid in liver detox and blood detox. </p>
		</div>
	</div>
    
    <div class="slide1">
		<div class="slide-img"> <a href="http://www.drcolbert.com/fiber-formula-powdered.html"><img src="img/fiberformula.jpg" alt="" /></a>
		</div>
		<div class="slide-txt">
			<h3> Fiber Formula </h3>
			<p class="subtitle"> Learn More at <a href="http://www.drcolbert.com/fiber-formula-powdered.html">DrColbert.com</a> </p>
			<p> Fiber Formula is wonderful for binding to the toxins in the colon and removing them from the body.  </p>
		</div>
	</div>
</div>		
</div>
</div>
<!-- Extras End -->

<!-- Recommended Wellness Products --->
<div class="essentials">
<div class="wrapper">
<div class="slider3">
	<div class="slide1">
		<div class="slide-img"> <a href="http://www.drcolbert.com/life-ionizers-life-m7.html"><img src="http://www.drcolbert.com/media/catalog/product/cache/1/image/650x650/9df78eab33525d08d6e5fb8d27136e95/m/7/m7.jpg" alt="" height="375px"/></a>
		</div>
		<div class="slide-txt">
			<h3>Life Ionizers LIFE M7</h3>
			<p class="subtitle"> Learn More at <a href="http://www.drcolbert.com/life-ionizers-life-m7.html">DrColbert.com</a></p>
            <p>The New 2014 LIFE Next Generation M-7 is the mid-grade ionizer that gives top-of-the-line performance, none of our competitors even comes close! Why wait for an underpowered ionizer that takes forever to fill your glass?</p>

		</div>
	</div>
	
	<div class="slide1">
		<div class="slide-img"> <a href="http://www.drcolbert.com/life-ionizers-life-m11.html"><img src="http://www.drcolbert.com/media/catalog/product/cache/1/image/650x650/9df78eab33525d08d6e5fb8d27136e95/m/1/m11_black.jpg" alt="" height="375px"/></a>
		</div>
		<div class="slide-txt">
			<h3>Life Ionizers LIFE M11</h3>
			<p class="subtitle"> Learn More at <a href="http://www.drcolbert.com/life-ionizers-life-m11.html">DrColbert.com</a> </p>
			<p>The New 2014 LIFE Next Generation M-11 is the high-end ionizer that gives top-of-the-line performance, none of our competitors even comes close! Why wait for an underpowered ionizer that takes forever to fill your glass?</p>
		</div>
	</div>
</div>
</div>		
</div>
</div>
<!-- Essentials End -->
<!-- Cta Start -->
<div class="cta">
<div class="wrapper">

     <h3> are you Ready to detox yet ? </h3>	
     <div class="title-div2"></div>
     <p class="subti">Get started today to learn more about detox and <br>
how to maximize your results!</p>
         <center><a href="https://www.divinehealthdetox.com/shop/home.php"> Signup  <div class="diva-icon"> &#128273; </div> <div class="diva"></div>  </a>
   <a href="backend/login.php"> Login  <div class="diva-icon"> &#128273; </div> <div class="diva"></div>  </a></center>

</div>
</div>
<!-- Cta End -->

<div class="gallery" id="faq">
<div class="wrapper">

<h3> FAQ </h3>	
     <div class="title-div"></div>
     <p class="subti">Below are common questions about the 21 Day Detox program and other general questions about Detoxification.</p>

<ul class="row-fluid" style="padding-top:30px">
<li class="span12" style="color:#82898c; line-height:18px;"><center><span style="color:#175373; font-size:20px;">When should I eat my meals?</span></center><br><center><img src="backend/assets/img/detox_timeline.jpg" width="100%" /></center>
</li></ul>

<ul class="row-fluid" style="padding-bottom:20px; padding-top: 20px;">
<li class="span4" style="color:#82898c; line-height:18px;"><center><span style="color:#175373; font-size:20px;">How Much MaxOne Should I take?</span></center><br>Take one capsule in the morning after breakfast and one capsule after dinner before bed. It is critical.
</li>
<li class="span4" style="color:#82898c; line-height:18px;"><center><span style="color:#175373; font-size:20px;">How much Green Supremefood should I take? </span></center><br>
Take one scoop of green supreme food in 4-6oz of water or any desired smoothie first thing in the morning. </li>
<li class="span4" style="color:#82898c; line-height:18px;"><center><span style="color:#175373; font-size:20px;">How much Plant Protein should I take? </span></center><br>
Take one scoop of Plant Protein first thing in the morning in 6-8oz of water, almond milk or any desired smoothie. You can take 3 scoops of plant protein throughout the day, up to 3 times/daily. </li>
</ul>
<ul class="row-fluid" style="padding-bottom:20px;">
<li class="span4" style="color:#82898c; line-height:18px;"><center><span style="color:#175373; font-size:20px;">How much Fiber Should I take? </span></center><br>
Take one scoop of fiber with green supreme food or separately in 4-6oz of water. Stir and drink quickly as the fiber can coagulate quickly. </li>
<li class="span4" style="color:#82898c; line-height:18px;"><center><span style="color:#175373; font-size:20px;">Do I need to take all four products during the 21 day detox? </span></center><br>
If you are able to it is best to take all four nutritional products during the 21 day detox to maximize excretion of toxins. Even though it's best to aid the detox with all 4 products, you can a-la-carte the package or take none at all. </li>
<li class="span4" style="color:#82898c; line-height:18px;"><center><span style="color:#175373; font-size:20px;">What are common symptoms of a detox? </span></center><br>
During a detox, you are ridding your body of chemicals, toxins, pesticides and heavy metals that have been building up for years. A common side effect of removing these toxins is dry mouth, brain fog and sweating. The best way to diminish these symptoms is to drink lots of water.
</li>
</ul>
<ul class="row-fluid" style="padding-bottom:20px;">
<li class="span4" style="color:#82898c; line-height:18px;"><center><span style="color:#175373; font-size:20px;">When should I not detox?  </span></center><br>
Consult your physicians before starting the detox program if you are: pregnant, nursing, or taking any medications.</li>

<li class="span4" style="color:#82898c; line-height:18px;"><center>
<span style="color:#175373; font-size:20px;">How do I know if I need to  detox?  </span>
</center><br>
You may need to detox if you are experiencing any of the following symptoms: fatigue, memory loss, premature aging, skin disorders, arthritis, hormone imbalances, anxiety, emotional disorders, cancer, heart disease.</li>
<li class="span4" style="color:#82898c; line-height:18px;"><center><span style="color:#175373; font-size:20px;">What foods should I avoid during this 21 Day Detox? </span></center><br>
You need to avoid all meats, peppers, potatoes, tomatoes, grains, corn and dairy. Processed foods and sugars. <span class="span12" style="color:#82898c; line-height:18px;">Alcohol, processed vegetable oils, deep fried foods, microwaved foods, hydrogenated and partially hydrogenated fats and oils which are found in butter, margarine and shortening, soy, fish and poultry. </span></li>


</ul>
<ul class="row-fluid" style="padding-bottom:20px;">
<li class="span4" style="color:#82898c; line-height:18px;"><center><span style="color:#175373; font-size:20px;">How much water should I drink? </span></center><br>
Divide your weight by 2.2 (For example. If you weigh 140lbs (143 ÷ 2.2 = 65), so you should drink 65 oz water/ daily) </li>
<li class="span4" style="color:#82898c; line-height:18px;"><center><span style="color:#175373; font-size:20px;">What water do you recommend? </span></center><br>
I recommend drinking alkaline water. I have recommended Kagan and LifeIonizer for years. They are two brands I trust. </li>
<li class="span4" style="color:#82898c; line-height:18px;"><center><span style="color:#175373; font-size:20px;">After the challenge begins, can I still sign up?  </span></center><br>
No, but we will re-launch a detox program once each season. You can sign up next Winter for the 21 Day Detox program that begins Feb 15th, the day after Valentine's Day. </li>
</ul>


<ul class="row-fluid" style="padding-bottom:30px">
<li class="span12" style="color:#82898c; line-height:18px;"><center><span style="color:#175373; font-size:20px;">What foods can I eat during the 21 day detox? </span></center><br>
During the 21 Day Detox you can eat beans, peas, lentils, all fruits, grasses and most vegetables including:

Artichoke, Arugula, Asparagus, Legumes, Broccoli, Brussels sprouts, Cabbage
,Calabrese, Carrots, Cauliflower, Celery, Chard, Collard greens, Herbs, Chamomile, Dill, Fennel, Lavender, Lemon Grass, Marjoram, Oregano, Parsley, Rosemary, Sage, Thyme, Kale, Kohlrabi, Lettuce, Mushrooms, Mustard greens, Nettles, Okra, Chives, Garlic, Leek, Onion, Parsley, Beetroot, Celeriac, Daikon, Ginger, Parsnip, Rutabaga, Turnip, Radish, Spinach, Topinambur, Squashes, Acorn squash, Butternut squash, Banana squash, Zucchini, Cucumber, Delicata, Gem squash, Hubbard squash, Marrow, Squash,Patty pans, Pumpkin, Spaghetti squash, Watercress.</li></ul>


</div>	
</div>

<div class="row-fluid">
	<div class="span12">
		<center><a href="https://www.divinehealthdetox.com/shop/home.php"><img width="800" src="http://www.drcolbert.com/files/images/promotions/Banners_Detox468x60.png" /></a><br />
	</div>
</div>

<?php include_once('footer.php'); ?>