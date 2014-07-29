<?php

/**
 * Main entry point for the demo shop.
 *
 * @copyright   Copyright (c) 2014 Antecons
 * @license     http://www.opensource.org/licenses/mit-license.html  MIT License
 */

// config.php sets up everything.
require_once(dirname( __FILE__ ) . '/config.php');

// Initialize a cart if it does not exist already.
if (!isset($_COOKIE['cart'])) {
    setcookie('cart', '{}', NULL, '/');
}

// Routing rules
$rules = array( 
    'product'   => "/product(?<product_id>/[\w\d\-]+)?", 
    'about'     => "/about",
    'cart'      => "/cart",
    'home'      => "/"
);

// Parse the URI
$uri = rtrim(dirname($_SERVER["SCRIPT_NAME"]), '/');
$uri = '/' . trim(str_replace($uri, '', $_SERVER['REQUEST_URI']), '/');
$uri = urldecode($uri);

// Find appropriate rewrite rule.
foreach ($rules as $action => $rule) {
    if (preg_match( '~^'.$rule.'$~i', $uri, $params)) {
        include(INCLUDE_PATH . $action . '.php');

        // Exit to avoid the 404 message 
        exit();
    }
}

// Nothing is found so return a 404.
show404();
