<?php
define('IN_PAGE', true);
include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '_config.php';
     
if (isset($ALLOWED_REFERER_FOR_SUBSCRIPTION_PROCESSORS) && is_array($ALLOWED_REFERER_FOR_SUBSCRIPTION_PROCESSORS)) {
	
	if (!in_array($_SERVER['REMOTE_ADDR'], $ALLOWED_REFERER_FOR_SUBSCRIPTION_PROCESSORS)) {
		echo '404';
		exit();
	}
}

	 
$etdb = false;
try {
	$etdb = new PDO('mysql:host=' . GC_DB_HOST . ';dbname=' . GC_DB_NAME . ';charset=utf8', GC_DB_USER, GC_DB_KEY);
	$etdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$etdb->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch(PDOException $ex) {
	$errorMsg[] = "Server error occured! Try again later."; 
	$debugMsg[] = __FILE__ . ' PDO unable to connect ' . $ex->getMessage();
}

$order = getNextPendingSubscriptionOrder();

if (!$order) {
	echo "NULL"; exit();
}

$selectedProductID = $order['product_id'];
populateFormDataFromOrder($order);


if (sizeof($errorMsg) > 0) {
	$debugMsg[] = 'Input checked: NOT OK';

} else {
	$debugMsg[] = 'Input checked: OK';
			        
	$subscriptionStartDate = $order['subscription_start'];
	$subscriptionNextPaymentDate = getNextMonthDate($order['next_payment']);
	
	$shippingOption = $order['shipping_option'];
	$shippingAmount = $order['shipping_amount'];
	$productAmount = $order['product_amount'];
	$totalAmount = $order['total_amount'];
	
	$billingAddress = $_POST['address1'] . "\n" . $_POST['address2'] . "\n" . $_POST['city'] . ', ' . $_POST['state'] . ' ' . $_POST['zip'];
	$shippingAddress = $billingAddress;
	       
	
	$orderNumber = $order['id'];
	if ($order) {
		// process paypal call
		$isPaymentPayPalOK = false;
		include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '_process_order_paypal_referenced.php';
	
		if ($isPaymentPayPalOK) {
			// call magento API 
			include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '_process_order_mag_api.php';
			
			updateNextPaymentDate($order, $subscriptionNextPaymentDate);
		}
	}
	
	if (sizeof($errorMsg) > 0) break;  
	else {
		
		// send email 
		if (IS_SEND_EMAIL) {
			if (isset($_SESSION['flashOrderId'])) $orderNumber = $_SESSION['flashOrderId'];
			$emailSubject = 'This Month Subscription - Order #' . $orderNumber;
			include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '_process_send_email.php';
		}
	}             
}

var_dump($errorMsg);
var_dump($successMsg);
var_dump($debugMsg);


