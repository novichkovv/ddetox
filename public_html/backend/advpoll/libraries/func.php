<?php
/**
 * @copyright	Copyright (c) 2013 Skyline Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

function __autoload($class) {
	$class	= strtolower($class);

	if (file_exists(PATH_ROOT . '/libraries/' . $class . '.php')) {
		require_once PATH_ROOT . '/libraries/' . $class . '.php';
	} else if (file_exists(PATH_BASE . '/models/' . $class . '.php')) {
		require_once PATH_BASE . '/models/' . $class . '.php';
	} else if (file_exists(PATH_BASE . '/controllers/' . $class . '.php')) {
		require_once PATH_BASE . '/controllers/' . $class . '.php';
	}
}

function redirect($url, $message = '', $type = 'success') {
	if ($message) {
		Message::addItem($message, $type);
	}

	header('Location: ' . $url);
	exit();
}

function getRoute($url, $base = true) {
	if ($url && $url[0] == '/') {
		return ($base ? BASE_SITE : LIVE_SITE) . $url;
	} else {
		return ($base ? BASE_SITE : LIVE_SITE) . '/index.php?load=' . $url;
	}
}

function livesite($admin = false) {
	$s			= empty($_SERVER['HTTPS']) ? '' : ($_SERVER['HTTPS'] == 'on') ? 's' : '';
	$protocol	= substr(strtolower($_SERVER['SERVER_PROTOCOL']), 0, strpos(strtolower($_SERVER['SERVER_PROTOCOL']), '/')) . $s;
	$port		= ($_SERVER['SERVER_PORT'] == '80') ? '' : (':' . $_SERVER['SERVER_PORT']);
	$uri		= $protocol . '://' . $_SERVER['SERVER_NAME'] . $port . $_SERVER['PHP_SELF'];
	$segments	= explode('?', $uri, 2);
	$url		= dirname($segments[0]);

	if ($admin) {
		$url	= dirname($url);
	}

	return $url;
}

function getUserStateFromRequest($name, $request) {
	if (isset($_REQUEST[$request])) {
		$_SESSION[$name]	= $_REQUEST[$request];
	}

	return isset($_SESSION[$name]) ? $_SESSION[$name] : null;
}