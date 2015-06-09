<?php
if (!defined('IN_PAGE')) {
    header("Location: /");
}


define('GC_DB_NAME', 'ddetox_backend');
define('GC_DB_HOST', 'localhost');
define('GC_DB_USER', 'ddetox_admin');
define('GC_DB_KEY', 'Starcraft12');

$sandbox = false;

$developer_account_email = 'sales@drcolbert.com';
$payflow_username = 'garcinia';
$payflow_password = '4douVfGVQHDE';
$payflow_vendor = 'divinehealth';
$payflow_partner = 'Paypal';

//$developer_account_email = 'louis.drax@gmail.com';
//$payflow_username = 'testbizs6';
//$payflow_password = 'thevoices6';
//$payflow_vendor = 'testbizs6';
//$payflow_partner = 'Paypal';


$mageUrl    = 'https://www.drcolbert.com/api/?wsdl'; 
$mageUser   = 'garcinia'; 
$mageApiKey = '74pLaWFoVakQ'; 
//define('MAGENTO_WEBSITE_ID', 'main');//5
//define('MAGENTO_STORE_ID', 'default');//9
define('MAGENTO_WEBSITE_ID', '7');
define('MAGENTO_STORE_ID', '11');


define('SUCCESS_REDIRECT_PAGE', '/shop/success.php');

define('DEFAULT_PAYMENT_METHOD', 'checkmo');
$SHIPPING_METHODS_MAPS = array(
	'Standard Shipping' => 'freeshipping_freeshipping',
	//'Expedite Shipping' => 'usps_Priority Mail'
	'Expedite Shipping' => 'flatrate_flatrate'
);

define('IS_SEND_EMAIL', true);
define('IS_SIMULATE_MAGENTO_PLACE_ORDER', false);