<?php
/**
 * @copyright	Copyright (c) 2013 Skyline Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

define('PATH_ROOT', dirname(dirname(__FILE__)));
define('PATH_BASE', dirname(__FILE__));

require_once PATH_ROOT . '/config.php';
require_once PATH_ROOT . '/libraries/func.php';

define('LIVE_SITE', livesite(true));
define('BASE_SITE', livesite());

session_start();
if (empty($_SESSION['authorized']) && @$_GET['load'] != 'users/login') {
	redirect(getRoute('users/login'));
}

// Bootstrap
$controller	= 'polls';
$action		= 'index';
$query		= '';

if (isset($_GET['load'])) {
	$params		= explode('/', $_GET['load']);
	$controller	= ucwords($params[0]);

	if (isset($params[1]) && !empty($params[1])) {
		$action	= $params[1];
	}

	if (isset($params[2]) && !empty($params[2])) {
		$query	= $params[2];
	}
}

$modelName	= $controller;
$controller	.= 'Controller';
$load		= new $controller($modelName, $action);

if (method_exists($load, $action)) {
	$load->$action($query);
} else {
	redirect(getRoute('/'), 'Invalid method. Please check the URL.', 'error');
}