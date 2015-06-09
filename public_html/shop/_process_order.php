<?php
if (!defined('IN_PAGE')) {
    header("Location: /");
}


include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '_config.php';

do if (isset($_POST['submit'])) {       
     
    $etdb = false;
    try {
        $etdb = new PDO('mysql:host=' . GC_DB_HOST . ';dbname=' . GC_DB_NAME . ';charset=utf8', GC_DB_USER, GC_DB_KEY);
        $etdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $etdb->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch(PDOException $ex) {
        $errorMsg[] = "Server error occured! Try again later. _process_order.php"; 
        $debugMsg[] = __FILE__ . ' PDO unable to connect ' . $ex->getMessage();
    }

    $debugMsg[] = "Checking inputs...";
    
    $selectedProductID = 0;
    if (isset($_POST['selected_product_SN']) && $_POST['selected_product_SN'] > 0 && $_POST['selected_product_SN'] <= sizeof($productIDs)) {
        $selectedProductID = $productIDs[$_POST['selected_product_SN'] - 1];
    }
    if (!$selectedProductID || !array_key_exists($selectedProductID, $products)) {    
        $errorMsg[] = 'Product not found.';
    }
	
    if(!isset($_POST['username']) || trim($_POST['username']) == '')
    {
        $errorMsg[] = 'Username is required.';
    }
	else {
		$statement = $etdb->prepare("select * from login_users where username=:username");
		$statement->execute(array(':username' => $_POST[username]));
		$count=$statement->rowCount();
		  if($count>0){		
				$errorMsg[] = 'Username has been taken.';
		   }
	}
	if(!isset($_POST['password']) || trim($_POST['password']) == '')
    {
        $errorMsg[] = 'Password is required.';
    }
	else {
		if (strlen($_POST['password']) < 5) {
			$errorMsg[] = 'Password must be at least 5 characters.';
		}
	}	
    if(!isset($_POST['fname']) || trim($_POST['fname']) == '')
    {
        $errorMsg[] = 'First Name is required.';
    }
    if(!isset($_POST['lname']) || trim($_POST['lname']) == '')
    {
        $errorMsg[] = 'Last Name is required.';
    }
    if(!isset($_POST['email']) || trim($_POST['email']) == '' || !(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)))
    {
        $errorMsg[] = 'Valid Email Address is required.';
    }
    if(!isset($_POST['address1']) || trim($_POST['address1']) == '')
    {
        $errorMsg[] = 'Address Line 1 is required.';
    }
    if(!isset($_POST['address2']) || trim($_POST['address2']) == '')
    {
        //$errorMsg[] = 'Address Line 2 is required.';
    }
    if(!isset($_POST['city']) || trim($_POST['city']) == '')
    {
        $errorMsg[] = 'City is required.';
    }
    if(!isset($_POST['state']) || trim($_POST['state']) == '')
    {
        $errorMsg[] = 'State is required.';
    }
    if(!isset($_POST['zip']) || trim($_POST['zip']) == '')
    {
        $errorMsg[] = 'Zip Code is required.';
    }
    if(!isset($_POST['phone']) || trim($_POST['phone']) == '')
    {
        $errorMsg[] = 'Phone Number is required.';
    }
	
	if ($selectedProductID !== 743) {//IF BY JOEL
		if(!isset($_POST['cc_type']) || trim($_POST['cc_type']) == '')
		{
			$errorMsg[] = 'Credit Card Type is required.';
		}
		if(!isset($_POST['cc_number']) || trim($_POST['cc_number']) == '')
		{
			$errorMsg[] = 'Credit Card Number is required.';
		}
		
		if(!isset($_POST['expmonth']) || trim($_POST['expmonth']) == '')
		{
			$errorMsg[] = 'Credit Card Expiry (Month) is required.';
		}
		if(!isset($_POST['expyear']) || trim($_POST['expyear']) == '')
		{
			$errorMsg[] = 'Credit Card Expiry (Year) is required.';
		}
		if(!isset($_POST['cc_cvv']) || trim($_POST['cc_cvv']) == '')
		{
			$errorMsg[] = 'Credit Card Security Code is required.';
		}
	}
    if(!isset($_POST['check_terms']))
    {
        $errorMsg[] = 'Please agree to Terms and Conditions before placing your order.';
    }
    
    
    
    if (sizeof($errorMsg) > 0) {
        $debugMsg[] = 'Input checked: NOT OK';
    
    } else {
        $debugMsg[] = 'Input checked: OK';
                
        // insert order into database
        $order = false;
        
        $subscriptionStartDate = '';
        $subscriptionNextPaymentDate = '';
		if ($products[$selectedProductID]['subscription'] == 1) {
			$subscriptionStartDate = getNextMonthDate(date('Y-m-d'));
			$subscriptionNextPaymentDate = getNextMonthDate(date('Y-m-d'));
		}
		
        $shippingOption = (isset($_POST['shipping'])) ? 'Expedite Shipping' : $DEFAULT_SHIPPING_OPTION;
        $shippingAmount = $SHIPPING_OPTIONS[$shippingOption];
        $totalAmount = $products[$selectedProductID]['price'] + $shippingAmount;
		
        $billingAddress = $_POST['address1'] . "\n" . $_POST['address2'] . "\n" . $_POST['city'] . ', ' . $_POST['state'] . ' ' . $_POST['zip'];
		$shippingAddress = $billingAddress;
		
		//INCLUDE USER REGISTRATION
        include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '_process_order_local_data.php';
		
		include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '_process_order_local_data.php';        
        
		$orderNumber = $order['id'];
        if ($order) {
			if ($totalAmount > 0) {//IF, ELSE, and ALL IN ELSE ADDED BY JOEL
				// process paypal call
				$isPaymentPayPalOK = false;
				include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '_process_order_paypal.php';
			
				if ($isPaymentPayPalOK) {
                // call magento API 
                include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '_process_order_mag_api.php';
            	}
			}
			else {
				$isPaymentPayPalOK = true;
				$_SESSION['detoxType'] = $products[$selectedProductID]['type'];
				$_SESSION['detoxName'] = $_POST['fname'] . $_POST['lname'];
				$_SESSION['detoxEmail'] = $_POST['email'];
				$_SESSION['detoxPhone'] = $_POST['phone'];
				$_SESSION['free'] = true;
				$_SESSION['orderTotal'] = $totalAmount;
			}
			include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '_process_registration.php';
        }
        
        if (sizeof($errorMsg) > 0) break;  
		else {
			
            // send email 
			if (IS_SEND_EMAIL) {
				if (isset($_SESSION['flashOrderId'])) $orderNumber = $_SESSION['flashOrderId'];
				if ($selectedProductID == 743) {//IF Added by Joel
					$emailSubject = 'Thank You for Order';
				}
				else {
					$emailSubject = 'Thank You for Order #' . $orderNumber;
				}
				include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '_process_send_email.php';
			}
			
			// redirect to success
			if (defined('SUCCESS_REDIRECT_PAGE')) {
				header("Location: " .  SUCCESS_REDIRECT_PAGE);
				exit();
			}
		}            
    }    
        
} while (false);


//var_dump($errorMsg);
//var_dump($successMsg);
//var_dump($debugMsg);


