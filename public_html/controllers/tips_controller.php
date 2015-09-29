<?php
/**
 * Created by PhpStorm.
 * User: enovichkov
 * Date: 28.09.2015
 * Time: 13:06
 */
class tips_controller extends controller
{
    public function index()
    {
        $this->view('tips' . DS . 'index');
    }
}