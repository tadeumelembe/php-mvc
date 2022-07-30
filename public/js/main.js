$(document).ready(function () {
    $('#size-form-section').hide();
    $('#weight-form-section').hide();
    $('#dimenssions-form-section').hide();

    //Listen to product checkbox click (Mass Delete)
    var arrChecked = [];
    // $(':checkbox').change(function () {
    //     arrChecked = [];
    //     $('input:checkbox:checked').each(function () {
    //         arrChecked.push($(this).val());
    //     });
    //     console.log(arrChecked)
    // });

    //mass delete function
    $("#delete-product-btn").click(function () {

        checkboxes = $('.delete-checkbox');
        for (i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked == true) {
                if (!arrChecked.includes(checkboxes[i].defaultValue)) {
                    arrChecked.push(checkboxes[i].defaultValue);
                }
            } else {
                arrChecked = arrChecked.filter(a => a !== checkboxes[i].defaultValue);
            }
        }

        if (arrChecked.length == 0)
            return;
        $("input:hidden").val(arrChecked);
        $("#delete-products-form").submit();
    });

    //type switcher
    $('#productType').change(function () {
        let product_type = $('#productType').val();
        if (product_type == 'DVD') {
            $('#size-form-section').show();
            $('#size').attr("required", true);

            $('#weight-form-section').hide();
            $('#weight').attr("required", false);

            $('#dimenssions-form-section').hide();
            $('#height').attr("required", false);
            $('#length').attr("required", false);
            $('#width').attr("required", false);

        } else if (product_type == 'Book') {
            $('#size-form-section').hide();
            $('#size').attr("required", false);

            $('#weight-form-section').show();
            $('#weight').attr("required", true);

            $('#dimenssions-form-section').hide();
            $('#height').attr("required", false);
            $('#length').attr("required", false);
            $('#width').attr("required", false);
        } else if (product_type == 'Furniture') {
            $('#size-form-section').hide();
            $('#size').attr("required", false);

            $('#weight-form-section').hide();
            $('#weight').attr("required", false);

            $('#dimenssions-form-section').show();
            $('#height').attr("required", true);
            $('#length').attr("required", true);
            $('#width').attr("required", true);
        }
    });

    //submit product form
    $("#save-products").click(function () {
        //form validation
        let product_form = $('#product_form');
        product_form.validate({
            rules: {
                sku: {
                    required: true,
                    number: false,
                    decimal: false
                },
                name: {
                    required: true,
                    number: false,
                    decimal: false
                },
                productType: {
                    required: true,
                    number: false
                },
                price: {
                    required: true,
                    number: true
                },
                size: {
                    //required: true,
                    number: true
                },
                weight: {
                    //required: true,
                    number: true
                },
                height: {
                    //required: true,
                    number: true
                },
                width: {
                    //required: true,
                    number: true
                },
                length: {
                    //required: true,
                    number: true
                },
            }
        });
        if (product_form.valid()) {
            console.log('hello')

            product_form.submit();
            return;
        } else {
            return
        }
    });

});
