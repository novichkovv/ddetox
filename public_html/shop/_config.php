<?php
if (!defined('IN_PAGE')) {
    header("Location: /");
}

date_default_timezone_set('America/Chicago');
ini_set('error_reporting', E_ALL && E_STRICT);
ini_set('display_errors', true);
if(!session_id()) session_start();

$successMsg = array();
$debugMsg = array();
$errorMsg = array();

if(file_exists(__DIR__.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php')) {
	include_once(__DIR__.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
}
include_once dirname(__FILE__) . '/_utils.php';

//include_once dirname(__FILE__) . '/_config_localhost.php';
include_once dirname(__FILE__) . '/_config_detox.php';

/* PAYPAL SETTINGS */
if($sandbox) {
	error_reporting(E_ALL|E_STRICT);
	ini_set('display_errors', '1');	
}
$api_version = '109.0';



$SHIPPING_OPTIONS = array(
'Standard Shipping' => 0,
'Expedite Shipping' => 4.99
);
$DEFAULT_SHIPPING_OPTION = 'Standard Shipping';


/* Product Settings */
$products = array(
'743' => array('product_id' => 743, 'price' => 0.00, 'subscription' => 0, 'description' => '21 Day Detox Online Subscription', 'type'=> '21Day', 'permission'=> 'a:1:{i:0;s:1:"3";}'), 
'739' => array('product_id' => 739, 'price' => 9.99, 'subscription' => 0, 'description' => '21 Day Detox Premium Online Subscription', 'type'=> '21Day', 'permission'=> 'a:2:{i:0;s:1:"3";i:1;s:1:"9";}'), 
'736' => array('product_id' => 736, 'price' => 169.99, 'subscription' => 0, 'description' => '21 Day Detox Package', 'type'=> '21Day', 'permission'=> 'a:2:{i:0;s:1:"3";i:1;s:1:"9";}'), 
);
$productIDs = array_keys($products);


define('DEFAULT_COUNTRY_ID', 'US');
define('DEFAULT_PURCHASE_QUANTITY', 1);


define("TABLE_ORDER",           'detox_order');
define("TABLE_ORDER_API",      'detox_api_order');
define("TABLE_LOGIN_USERS",      'login_users');


$ALLOWED_REFERER_FOR_SUBSCRIPTION_PROCESSORS = array('199.167.43.200', '71.42.34.134'); //, '127.0.0.1', '58.185.30.166', '10.10.1.86');
