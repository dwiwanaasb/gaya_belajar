$(function () {
    $('#keyword').on('keyup', function () {
        $('#content-table').load('./ajaxSearch.php?keyword=' + $('#keyword').val());
    });
});
