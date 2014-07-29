<?php

if ($params['product_id'] != '') {
    $product = getProduct($params['product_id']);
    if ($product) {
        $addedToCart = checkAddCart($product);
        include(INCLUDE_PATH . 'product_single.php');
    } else {
        show404();
    }
} else {
    $products = getProducts();
    include(INCLUDE_PATH . 'product_list.php');
}
