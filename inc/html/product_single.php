<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header title">
                <h1><?= $product->name ?></h1>
            </div>
        </div>
    </div>
    <div class="row product-single">
        <div class="col-lg-12">
            <div class="product well">
                <div class="row">
                    <div class="col-md-6">
                        <div class="image">
                            <img src="<?= $product->image ?>" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="description">
                            <?= $product->description ?>
                        </div>
                        <?php include(INCLUDE_PATH . 'html/product_add_to_cart.php') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include(INCLUDE_PATH . 'html/product_suggestions.php'); ?>
</div>
