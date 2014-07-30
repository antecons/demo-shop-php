<?php

$page_title = "$product->name";
$suggestions = getSuggestions($product->id);
$productTrackingId = $product->id;
include(INCLUDE_PATH . 'html/header.php');
include(INCLUDE_PATH . 'html/product_single.php');
include(INCLUDE_PATH . 'html/footer.php');
