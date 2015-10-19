<?php
/**
 * Created by PhpStorm.
 * User: enovichkov
 * Date: 19.10.2015
 * Time: 10:49
 */
class image_controller extends controller
{
    public function index()
    {
        if($_GET['recipe']) {
            $this->render('template', $this->fetch('recipes' . DS . $_GET['recipe']));
        }
        $this->view_only('print_image');
    }
}