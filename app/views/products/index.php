<div class="main">
    <?php require APPROOT . '/views/template/head.php' ?>

    <div class="row">

        <?php foreach ($data['products'] as $product) { ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xxl-2 pb-3">

                <div class="card" style="width: auto;">
                    <div class="form-check delete-checkbox-div">
                        <input class="form-check-input delete-checkbox" type="checkbox" value="1" id="flexCheckDefault">
                    </div>
                    <div class="card-body text-center">
                        <p class="card-title"><?= $product->sku ?></p>
                        <p class="card-title"><?= $product->name ?></p>
                        <p class="card-title"><?= $product->price ?> $</p>
                        <p class="card-title">Size: 700MB</p>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</div>