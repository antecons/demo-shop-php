<?php if ($suggestions) { ?>
<div class="row">
    <div class="col-lg-12">
        <h3>You might also like <small><a href="#" onclick="return false;" data-toggle="popover" data-content="The recommendations below are created by Antecons. The webshop server fetches the recommendations from Antecons based on the product your are currently looking at (<?= $product->name ?>).">(What's this?)</a></small></h3>
    </div>
</div>
<div class="row suggestions">
    <?php foreach ($suggestions as $product) { ?>
        <div class="col-sm-4">
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
<?php } else { ?>
<p>No recommendations to show yet. Place some orders. Wait and see.</p>
<?php }
