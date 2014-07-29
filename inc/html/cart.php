<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h1>Cart</h1>
            </div>
        </div>
    </div>
    <div class="row cart">
        <div class="col-lg-12">
            <div class="well">
                <?php if (count($cart) > 0) { ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Item</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($cart as $product_id => $quantity) {
                        $product = getProduct($product_id);
                    ?>
                        <tr class="product">
                            <td class="image">
                                <img src="<?= $product->image ?>">
                            </td>
                            <td class="title">
                                <a href="<?= productUrl($product->id) ?>"><?= $product->name ?></a>
                            </td>
                            <td class="quantity">
                                <p><?= $quantity ?></p>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <form method="POST">
                    <input type="hidden" name="action" value="place_order">
                    <button class="btn btn-primary" type="submit">Place order</button>
                </form>
                <?php } else { ?>
                <p>The cart is empty. <a href="/product">Show products</a>.</p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
