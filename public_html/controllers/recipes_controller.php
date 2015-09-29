<?php
/**
 * Created by PhpStorm.
 * User: enovichkov
 * Date: 28.09.2015
 * Time: 11:59
 */
class recipes_controller extends controller
{
    public function index()
    {
        $this->not_found();     
    }
    
    public function soups()
    {
        $this->view('recipes' . DS . 'soups');
    }

    public function salads()
    {
        $this->view('recipes' . DS . 'salads');
    }

    public function smoothies()
    {
        $this->view('recipes' . DS . 'smoothies');
    }
}