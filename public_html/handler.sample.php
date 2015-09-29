<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 06.03.15
 * Time: 19:20
 */
session_start();
setlocale(LC_ALL, 'fr_FR');
define('ROOT_DIR', 'C:' . DIRECTORY_SEPARATOR . 'OpenServer' . DIRECTORY_SEPARATOR . 'domains' . DIRECTORY_SEPARATOR . 'test' . DIRECTORY_SEPARATOR . 'agstrad.loc' . DIRECTORY_SEPARATOR . 'new' . DIRECTORY_SEPARATOR);
require_once('config.php');
require_once(CORE_DIR . 'registry.php');
require_once(CORE_DIR . 'autoload.php');
//require_once(ROOT_DIR . 'classes' . DIRECTORY_SEPARATOR . 'simple_html_dom_class.php');
//require_once(CORE_DIR . 'router.php');

$handler = new mail_handler_class($content);