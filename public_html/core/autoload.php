<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 06.03.15
 * Time: 19:20
 */

//class name MUST be of next kind:  'class_name' . '_' . 'folder name'
// folders with classes MUST have postfix "s" and MUST be in root dir.
// E.G. /controllers/index_controller.php

function autoload($class_name)
{
    $exp_arr = explode('_', $class_name);
    if (count($exp_arr) === 1) {
        $folder = 'core';
    } else {
        $n = array_pop($exp_arr);
        $folder = $n . ($n[strlen($n) - 1] == 's' ? 'es' : 's');
    }
    if (file_exists(ROOT_DIR . $folder . DS . $class_name . '.php')) {
        require_once(ROOT_DIR . $folder . DS . $class_name . '.php');
    } else {
        throw new Exception('Class file ' . $class_name . ' ' . ROOT_DIR . $folder . DS . $class_name . '.php' . ' not exists');
    }
}

spl_autoload_register('autoload');