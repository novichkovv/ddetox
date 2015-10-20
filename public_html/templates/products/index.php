<div class="container">
    <a class="row">
        <?php foreach($products as $product): ?>
            <a href="http://shop.drcolbert.com/<?php echo $product['url']; ?>"  class="product_container">
                <div class="product">
                    <h3 class="product_name"><?php echo $product['name']; ?></h3>
                    <div class="product_image_container">
                        <img class="product_image" src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>"/>
                    </div>
                    <div class="product_prices">
                        <?php if($product['special_price']): ?>
                            <div class="product_special_price">
                                $<?php echo number_format($product['price'], 2, '.', ' '); ?>
                            </div>
                            <div class="product_price">
                                $<?php echo number_format($product['special_price'], 2, '.', ' '); ?>
                            </div>
                        <?php endif; ?>
                        <?php if(!$product['special_price']): ?>
                            <div class="product_price">
                                $<?php echo number_format($product['price'], 2, '.', ' '); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="mask">
                    <div class="product_link">Order</div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>
