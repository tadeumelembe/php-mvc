
$(':checkbox').change(function () {
    var arrChecked = [];
    $('input:checkbox:checked').each(function() {
        arrChecked.push($(this).val());
    });
    console.log(arrChecked)
});