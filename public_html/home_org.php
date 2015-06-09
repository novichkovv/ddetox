<?php include_once('header.php'); ?>


<!-- Main Section Start -->
<div class="main-section">
<div class="wrapper">



     
     <!-- Main Section Text -->
     
     <div class="main-left">
<center>

<p style="font-weight:bold; font-size:14pt; line-height:1.5; text-align:left; text-indent:50px;">Join Dr. Colbert for a 21 Day Detox. This detox removes inflammatory foods that have been hindering your health. This detox will rid your body of toxic chemicals, pesticides, herbicides, fungicides, and heavy metals. Sign up for free now. </p>

<img src="img/nextdetox_cal.png" alt="Calendar for the 21 Day Detox" />
          
	 <!-- Closed Button <img src="/img/closedbutton2.jpg" alt="Closed" /><br /><br /> -->
     <a href="backend/sign_up.php">Signup<div class="diva-icon"> &#128237; </div> <div class="diva"></div>  </a><br /><br />
     <a href="backend/login.php"> Login  <div class="diva-icon"> &#128273; </div> <div class="diva"></div>  </a>
	
	 <!-- New Signup Button <img src="img/nextdetoxbtn.jpg" alt="Signup for the 21 Day Detox is Now Closed" /> -->
     
     
     
     
     
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


<p><span style="color:#F00; font-weight:bold; font-size:24px;"><?php

//$result = mysql_query("SELECT * FROM  `login_users` WHERE  `user_level` LIKE '%4%'");
$result = mysql_query("SELECT * FROM  `login_users` WHERE  `year` LIKE '2014'");
$num_rows = mysql_num_rows($result);


echo $num_rows;
	
	 ?></span> <span style="font-weight:bold;">people have joined!</span></p>
</center> 
<br>     
     </div>
     
     <div class="main-right" style="margin-top:30px;">
     
     <center><iframe width="420" height="280" src="//www.youtube.com/embed/TmM-k7dkMBA" frameborder="0" allowfullscreen></iframe></center>
     
     </div>
     
     
     
     
  
</div>
</div>
<!-- Main Section End -->


<div class="customer">
<div class="wrapper">

<ul class="row-fluid testio-cont">
	<li class="span6 testio">
		 <div class="testio-txt noshow" style="width:420px;"> 
		 	 <a class="twitter-timeline" href="https://twitter.com/Detox21Days" data-widget-id="393394989771669504" style="opacity:1;">Tweets by @Detox21Days</a>
  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		 </div> 		
   </li>
   
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
         <center><a href="http://divinehealthdetox.com/backend/sign_up.php"> Signup  <div class="diva-icon"> &#128273; </div> <div class="diva"></div>  </a>
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
Multiply your weight by 0.8 (For example. If you weigh 140lbs (140 x 0.8 = 112), so you should drink 112 oz water/ daily) </li>
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
		<center><a href="http://www.divinehealthdetox.com/backend/sign_up.php"><img width="800" src="http://www.drcolbert.com/files/images/promotions/Banners_Detox468x60.png" /></a><br />
		<a href="http://1000lbschallenge.com"><img width="800" src="http://drcolbert.com/images/affiliates/cando_728x90.jpg" /></a></center>
	</div>
</div>

<?php include_once('footer.php'); ?>