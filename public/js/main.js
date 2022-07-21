$(document).ready(function () {
    var arrChecked = [];

    $(':checkbox').change(function () {
        arrChecked = [];
        $('input:checkbox:checked').each(function () {
            arrChecked.push($(this).val());
        });
        console.log(arrChecked)
    });

    $("#delete-product-btn").click(function () {
        console.log(arrChecked)
        $("input:hidden").val(arrChecked);
        $("#delete-products-form").submit();
    });

});
