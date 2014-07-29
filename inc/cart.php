<?php

if (checkOrderPlaced()) {
    $page_title = "Order placed";
    include(INCLUDE_PATH . 'html/header.php');
    include(INCLUDE_PATH . 'html/order_placed.php');
    include(INCLUDE_PATH . 'html/footer.php');
} else {
    $page_title = "Cart";
    $cart = json_decode($_COOKIE['cart'], true);
    include(INCLUDE_PATH . 'html/header.php');
    include(INCLUDE_PATH . 'html/cart.php');
    include(INCLUDE_PATH . 'html/footer.php');
}
