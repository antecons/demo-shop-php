<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h1>Products</h1>
            </div>
            <p>This is a list of all products in the shop.</p>
        </div>
    </div>
    <div class="row product-list">
        <?php foreach ($products as $product) { ?>
            <div class="col-sm-3">
                <div class="product product-small text-center">
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
                </div>
            </div>
        <?php } ?>
    </div>
</div>
