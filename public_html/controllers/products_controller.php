<?php
/**
 * Created by PhpStorm.
 * User: enovichkov
 * Date: 20.10.2015
 * Time: 9:37
 */
class products_controller extends controller
{
    public function index()
    {
        $this->render('products', $this->model('detox_products')->getAll());
        $this->view('products' . DS . 'index');
    }
}