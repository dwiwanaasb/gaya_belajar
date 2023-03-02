$(function () {
    $('#keyword').on('keyup', function () {
        $('#content-table').load('./ajaxGaya.php?keyword=' + $('#keyword').val());
    });
});
