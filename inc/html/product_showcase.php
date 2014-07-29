<div class="product product-showcase well">
    <div class="image">
        <a href="<?= productUrl($product->id) ?>">
            <img src="<?= $product->image ?>" class="img-responsive">
        </a>
    </div>
    <div class="title">
        <h3>
        <a href="<?= productUrl($product->id) ?>">
            <?= $product->name ?>
        </a>
        </h3>
    </div>
    <div class="description">
        <?= $product->description ?>
    </div>
</div>
