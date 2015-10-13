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
        $this->render('video', $this->model('system_config')->getByField('config_key', 'success_page_video')['config_value']);
        if($_GET['beta']) {
            $this->view_only('success' . DS . 'index');
        } else {
            $this->view_only('success_page');
        }
    }
}