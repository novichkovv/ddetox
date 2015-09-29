<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 07.03.15
 * Time: 15:48
 */
class default_controller extends controller
{
    public function index()
    {
        $this->not_found();
    }

    public function index_ajax()
    {
        exit;
    }
}