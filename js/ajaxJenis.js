$(function () {
    $('#keyword').on('keyup', function () {
        $('#content-table').load('./ajaxJenis.php?keyword=' + $('#keyword').val());
    });
});
