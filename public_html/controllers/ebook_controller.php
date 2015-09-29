<?php
/**
 * Created by PhpStorm.
 * User: enovichkov
 * Date: 28.09.2015
 * Time: 13:12
 */
class ebook_controller extends controller
{
    public function index()
    {
        $this->view('ebook' . DS . 'index');
    }
}