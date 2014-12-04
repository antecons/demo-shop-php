<div class="add-to-cart">
    <form method="POST" action="<?= productUrl($product->id) ?>">
        <input type="hidden" name="action" value="add_cart">
        <button class="btn btn-primary" type="submit">Add to cart</button>
    </form>
<?php if (isset($addedToCart) && $addedToCart) { ?>
    <p>The product was added to the <a href="/cart">cart</a>.</p>
<?php } ?>
</div>
