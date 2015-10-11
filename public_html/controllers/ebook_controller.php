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
//        $pdf_file = ROOT_DIR . '21_Day_Detox_01-1.pdf';
//        $im = new Imagick($pdf_file);
//        $i=0;
//        foreach($im as $_img) {
//            $i++;
//            $_img->setResolution(480, 680);
//            $_img->setImageFormat('jpeg');
//            $_img->writeImage(ROOT_DIR . 'images' . DS . 'ebook' . DS . 'ebook_p'.$i.'.jpg');
//        }
//        $im->destroy();
        $this->view('ebook' . DS . 'index');
    }
}