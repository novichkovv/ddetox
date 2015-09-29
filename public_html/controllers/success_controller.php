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
        $this->view_only('success' . DS . 'index');
    }
}