<?php
/**
 * Created by PhpStorm.
 * User: enovichkov
 * Date: 29.09.2015
 * Time: 10:23
 */
class success_controller extends controller
{
    public function index()
    {
        if(!$_GET['beta']) {
            $this->view_only('success' . DS . 'index');
        } else {
            $this->view_only('success_page');
        }
    }
}