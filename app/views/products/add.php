<div class="main">
    <?php require APPROOT . '/views/template/head.php' ?>
    <div class="row">
        <form id="product_form" action="<?= BASEURL ?>products/create" method="post" class="col-12 col-lg-6">
            <div class="row mb-3 align-items-center">
                <div class="col-12 col-md-3">
                    <label for="sku" class="col-form-label">SKU</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="sku" name="sku" class="form-control" aria-describedby="passwordHelpInline">
                </div>
            </div>
            <div class="row mb-3 align-items-center">
                <div class="col-12 col-md-3">
                    <label for="name" class="col-form-label">Name</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="name" name="name" class="form-control" aria-describedby="passwordHelpInline">
                </div>
            </div>
            <div class="row mb-3 align-items-center">
                <div class="col-12 col-md-3">
                    <label for="price" class="col-form-label">Price ($)</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="number" id="price" name="price" class="form-control">
                </div>
            </div>
            <div class="row mb-3 align-items-center">
                <div class="col-12 col-md-3">
                    <label for="productType" class="col-form-label">Product type</label>
                </div>
                <div class="col-12 col-md-9">
                    <select id="productType" name="productType" class="form-select" aria-label="Default select example">
                        <option selected disabled>Select the product type</option>
                        <option value="DVD">DVD</option>
                        <option value="Book">Book</option>
                        <option value="Furniture">Furniture</option>
                    </select>
                </div>
            </div>

            <div id="size-form-section" class="p-3 mb-3" style="border: 0.1px solid rgba(0,0,0,0.1);">
                <div class="row align-items-center">
                    <div class="col-12 col-md-3">
                        <label for="size" class="col-form-label">Size (MB)</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" id="size" name="size" class="form-control" aria-describedby="passwordHelpInline">

                    </div>
                </div>
                <span id="passwordHelpInline" class="form-text">
                    Please, provide size
                </span>
            </div>

            <div id="weight-form-section" class="p-3 mb-3" style="border: 0.1px solid rgba(0,0,0,0.1);">
                <div class="row align-items-center">
                    <div class="col-12 col-md-3">
                        <label for="weight" class="col-form-label">Weight (KG)</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" id="weight" name="weight" class="form-control">

                    </div>
                </div>
                <span id="passwordHelpInline" class="form-text">
                    Please, provide weight
                </span>
            </div>

            <div id="dimenssions-form-section" class="p-3 mb-3" style="border: 0.1px solid rgba(0,0,0,0.1);">
                <div class="row mb-3 align-items-center">
                    <div class="col-12 col-md-3">
                        <label for="height" class="col-form-label">Height (CM)</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" id="height" name="height" class="form-control">

                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <div class="col-12 col-md-3">
                        <label for="width" class="col-form-label">Width (CM)</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" id="width" name="width" class="form-control" aria-describedby="passwordHelpInline">

                    </div>
                </div>
                <div class="row mb-3 align-items-center">
                    <div class="col-12 col-md-3">
                        <label for="length" class="col-form-label">Length (CM)</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" id="length" name="length" class="form-control" aria-describedby="passwordHelpInline">

                    </div>
                </div>
                <span id="passwordHelpInline" class="form-text">
                    Please, provide dimensions
                </span>
            </div>
        </form>
    </div>
</div>