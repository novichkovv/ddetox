<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 10.12.14
 * Time: 20:36
 */

define ('DS', DIRECTORY_SEPARATOR);
define ('SITE_DIR', 'http://' . ( $_SERVER['HTTP_HOST'] ? $_SERVER['HTTP_HOST'] : 'lonty.ru') . '/detox/');
define('DB_USER', 'ddetox_admin');
define('DB_PASSWORD', 'Starcraft12');
define('DB_HOST', 'localhost');
define('DB_NAME', 'ddetox_backend');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');