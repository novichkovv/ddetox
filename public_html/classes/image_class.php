<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 19.05.2015
 * Time: 0:07
 */
class image_class {

    var $image;
    var $image_type;

    /**
     * @param string $filename
     */

    function load($filename) {
        $image_info = getimagesize($filename);
        $this->image_type = $image_info[2];
        if( $this->image_type == IMAGETYPE_JPEG ) {
            $this->image = imagecreatefromjpeg($filename);
        } elseif( $this->image_type == IMAGETYPE_GIF ) {
            $this->image = imagecreatefromgif($filename);
        } elseif( $this->image_type == IMAGETYPE_PNG ) {
            $this->image = imagecreatefrompng($filename);
        }
    }

    /**
     * @param string $filename
     * @param int $image_type
     * @param int $compression
     * @param int $permissions
     */

    function save($filename, $image_type = IMAGETYPE_JPEG, $compression = 100, $permissions = null) {
        if( $image_type == IMAGETYPE_JPEG ) {
            imagejpeg($this->image, $filename, $compression);
        } elseif( $image_type == IMAGETYPE_GIF ) {
            imagegif($this->image, $filename);
        } elseif( $image_type == IMAGETYPE_PNG ) {
            imagepng($this->image, $filename);
        }
        if( $permissions != null) {
            chmod($filename,$permissions);
        }
    }

    /**
     * @param int $image_type
     */

    function output($image_type = IMAGETYPE_JPEG) {
        if( $image_type == IMAGETYPE_JPEG ) {
            imagejpeg($this->image);
        } elseif( $image_type == IMAGETYPE_GIF ) {
            imagegif($this->image);
        } elseif( $image_type == IMAGETYPE_PNG ) {
            imagepng($this->image);
        }
    }

    /**
     * @return int
     */

    function getWidth() {
        return imagesx($this->image);
    }

    /**
     * @return int
     */

    function getHeight() {
        return imagesy($this->image);
    }

    /**
     * @param int $height
     */

    function resizeToHeight($height) {
        if($height > $this->getHeight())
            $height = $this->getHeight();
        $ratio = $height / $this->getHeight();
        $width = $this->getWidth() * $ratio;
        $this->resize($width,$height);
    }

    /**
     * @param int $width
     */

    function resizeToWidth($width) {
        if($width > $this->getWidth())
            $width = $this->getWidth();
        $ratio = $width / $this->getWidth();
        $height = $this->getheight() * $ratio;
        $this->resize($width,$height);
    }

    /**
     * @param int $scale
     */

    function scale($scale) {
        $width = $this->getWidth() * $scale/100;
        $height = $this->getheight() * $scale/100;
        $this->resize($width,$height);
    }

    /**
     * @param int $width
     * @param int $height
     */

    function resize($width, $height) {
        $new_image = imagecreatetruecolor($width, $height);
        imagealphablending($new_image, false);
        imagesavealpha($new_image, true);
        imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
        $this->image = $new_image;
    }
}