$(function () {
    $('#keyword').on('keyup', function () {
        $('#content-table').load('./ajaxBasis.php?keyword=' + $('#keyword').val());
    });
});
