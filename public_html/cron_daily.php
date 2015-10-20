<?php
/**
 * Created by PhpStorm.
 * User: enovichkov
 * Date: 20.10.2015
 * Time: 11:57
 */
require_once 'config.php';
require_once CORE_DIR . 'autoload.php';
$model = new default_model('detox_products');
$proxy = new SoapClient('http://shop.drcolbert.com/api/soap/?wsdl');
$sessionId = $proxy->login('divinehealthdetox', 'Drcolbert120');
$list = array(
    'PHWaterBottle',
    'ThreeWaterBottles',
    'PHWaterPitcher',
    'ThreeWaterPitchers',
    'CouplesDetoxPackage',
    'SmallGroupDetox',
    '21DetoxSystem',
    '21DayDetoxCanister',
    'maxone',
    '823'
);
$products = [];

foreach ($list as $k => $sku) {
    $info = $proxy->call($sessionId, 'product.info', $sku);
    foreach($proxy->call($sessionId, 'product_media.list', $sku) as $image) {
        if(in_array('thumbnail', $image['types'])) {
            $products[$k]['image'] = $image['url'];
        }
    }
    if(!$products[$k]['image']) {
        foreach($proxy->call($sessionId, 'product_media.list', $sku) as $image) {
            if(in_array('image', $image['types'])) {
                $products[$k]['image'] = $image['url'];
            }
        }
    }
    if(!$products[$k]['image']) {
        foreach($proxy->call($sessionId, 'product_media.list', $sku) as $image) {
            if(in_array('small', $image['types'])) {
                $products[$k]['image'] = $image['url'];
            }
        }
    }
    if($id = $model->getByField('sku', $sku)['id']) {
        $products[$k]['id'] = $id;
    }
    $products[$k]['sku'] = $sku;
    $products[$k]['name'] = $info['name'];
    $products[$k]['price'] = $info['price'];
    $products[$k]['special_price'] = $info['special_price'] ? $info['special_price'] : 0;
    $products[$k]['url'] = $info['url_path'];
}
foreach($products as $product) {
    $model->insert($product);
}
