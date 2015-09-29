<?php
if (!defined('IN_PAGE')) {
    header("Location: /");
}


define('GC_DB_NAME', 'joel_garcinia');
define('GC_DB_HOST', 'localhost');
define('GC_DB_USER', 'joel');
define('GC_DB_KEY', 'joel');


$sandbox = TRUE;

$developer_account_email = 'louis.drax@gmail.com';
$payflow_username = 'testbizs6';
$payflow_password = 'thevoices6';
$payflow_vendor = 'testbizs6';
$payflow_partner = 'Paypal';



/*
$mageUrl    = 'http://drcolbert.local/api/?wsdl'; 
$mageUser   = 'microsite_cart_user1'; 
$mageApiKey = 'micrositeapi123'; 
*/

$mageUrl    = 'http://localhost/m/testdrc/api/?wsdl'; 
$mageUser   = 'microsite_cart_user1'; 
$mageApiKey = 'micrositeapi123'; 

define('MAGENTO_WEBSITE_ID', '1');
define('MAGENTO_STORE_ID', '1');


define('DEFAULT_PAYMENT_METHOD', 'cashondelivery');
$SHIPPING_METHODS_MAPS = array(
	'Standard Shipping' => 'freeshipping_freeshipping',
	'Expedite Shipping' => 'freeshipping_freeshipping'
);

define('IS_SEND_EMAIL', false);
define('IS_SIMULATE_MAGENTO_PLACE_ORDER', false);
