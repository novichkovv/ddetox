<?php 

session_start();



$orderNumber = false;

if (isset($_SESSION['flashOrderId'])) {

    $orderNumber = $_SESSION['flashOrderId'];

    $_SESSION['flashOrderId'] = null;
}
// START ADDED BY JOEL
	$detoxType = $_SESSION['detoxType'];

    $_SESSION['detoxType'] = null;
	list($detoxUsername) = explode('@', $_SESSION['detoxEmail']);
	$detoxName = $_SESSION['detoxName'];
	$detoxEmail = $_SESSION['detoxEmail'];
	$detoxPhone = $_SESSION['detoxPhone'];
	$orderTotal = $_SESSION['orderTotal'];
	$free = $_SESSION['free'];
//END ADDED BY JOEL

//echo $orderTotal;
?>
   	<link rel="stylesheet" href="/shop/css/shop.css">
	


<div id="success">

<div class="container clearfix">


    <div id="content" class="grid_12 sub-content-success">
        <h1>Your resgisrtation has been received.</h1>
        <div id="addthis">
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5420775843475b61"></script>
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <div class="addthis_sharing_toolbox" data-url="http://www.divinehealthdetox.com" data-title="Dr. Colbert's 21 Day Detox">
		</div><br />

		<h2>Thank you for your purchase!</h2>

        <p><?php /* IF BY JOEL */ if (!$free) { echo "Your order # is: " . $orderNumber . ".<br />"; } ?>You will receive an order confirmation email with details of your order.</p>
        
        <?php 
		if ($detoxType == "21Day" || !$free) {
			$url = "http://www.divinehealthdetox.com/backend/login.php";
			$imageSrc = "/img/login.png";
			$text = "21 Day Detox";
		}
		elseif ($detoxType == "7Day") {
			$url = "http://www.detox7days.com/backend/sign_up.php";
			$imageSrc = "/img/complete_reg.png";
			$text = "7 Day Detox";
		}
		
		?>
        
        <form method="post" action="http://www.divinehealthdetox.com/backend/login.php">
        	<input style="display:none" type="text" name="name" value=<?php echo $detoxName; ?> />
        	<input style="display:none" type="text" name="email" value=<?php echo $detoxEmail; ?> />
        	<input style="display:none" type="text" name="username" value=<?php echo $detoxUsername; ?> />
            <input style="display:none" type="text" name="p-2" value=<?php echo $detoxPhone; ?> /><br /><br />
            <iframe width="450" height="253" src="//www.youtube.com/embed/DnYedd-S4z8" frameborder="0" allowfullscreen></iframe><br /><br />
            <input type="image" src="/img/login.png" alt="Register for your 21 Day Detox" />
        </form>
		
	</div>
    </div>

</div>

<!-- end .container -->

</div>
<script type="text/javascript">
adroll_conversion_value_in_dollars = <?php echo $orderTotal; ?>;
adroll_custom_data = {"ORDER_ID": "<?php echo $orderNumber ?>"}
</script>

