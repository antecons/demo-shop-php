<?php

/**
 * All the functions.
 *
 * A few convenience functions that are used across several different pages.
 *
 * @copyright   Copyright (c) 2014 Antecons
 * @license     http://www.opensource.org/licenses/mit-license.html  MIT License
 */

/**
 * Fetches a single JSON product and parses the product into a PHP object.
 */
function fetchProduct($product_path)
{
    $product_json = file_get_contents($product_path);
    if ($product_json)
        return json_decode($product_json);
    return null;
}

/**
 * Returns a list of all products.
 */
function getProducts()
{
    $products = array();
    foreach (glob(DB_PATH . 'product/*.json') as $file) {
        $product = fetchProduct($file);
        $products[] = $product;
    }
    return $products;
}


/**
 * Returns a single product.
 */
function getProduct($product_id)
{
    $filepath = DB_PATH . "product/$product_id" . '.json';
    return fetchProduct($filepath);
}

/**
 * Returns all suggestions for the given product id.
 */
function getSuggestions($product_id) {
    $sg = Antecons\Suggestion::get(ANTECONS_DATASOURCE,
                                   Antecons\SuggestionFor::PRODUCT,
                                   $product_id);
    $suggestedProducts = array();
    foreach ($sg as $suggestion) {
        $product = getProduct($suggestion['suggestion']);
        if ($product) {
            $suggestedProducts[] = $product;
        }
    }
    return $suggestedProducts;
}

/**
 * Convenience method for including a product showcase.
 */
function productShowcase($product_id)
{
    $product = getProduct($product_id);
    include(INCLUDE_PATH . 'html/product_showcase.php');
}

/**
 * Returns the url to a product, given its ID.
 */
function productUrl($product_id)
{
    return "/product/$product_id";
}

/**
 * Checks if a product was added to the cart and updates the cart cookie.
 */
function checkAddCart($product)
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'add_cart') {
        $cart = json_decode($_COOKIE['cart'], true);

        // Check to see if the item is already present and increment the 
        // quantity if it is.
        $product_id = $product->id;
        if (isset($cart[$product_id]))
            $cart[$product_id] = intval($cart[$product_id]) + 1;
        else
            $cart[$product_id] = 1;
        setcookie('cart', json_encode($cart), null, '/');
        return true;
    }

    return false;
}

/**
 * Checks if an order was placed
 */
function checkOrderPlaced()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'place_order') {

        $cart = json_decode($_COOKIE['cart'], true);

        if (count($cart) > 0) {
            // Add order transaction to Antecons.
            $tr = new Antecons\Transaction();
            $tr->source = Antecons\TransactionSource::ORDER;
            $tr->transaction_items = array();
            foreach ($cart as $item_id => $quantity) {
                $q = intval($quantity);
                for ($i = 0; $i < $q; $i++) {
                    $tr->transaction_items[] = array('item_id' => $item_id);
                }
            }
            $tr->save(ANTECONS_DATASOURCE);

            // Empty the cart and set the cookie.
            setcookie('cart', '{}', null, '/');
            return true;
        }
    }

    return false;
}

/**
 * Returns a 404 error
 */
function show404()
{
    header('HTTP/1.1 404 Not Found');
    echo "404 Not found";
}
