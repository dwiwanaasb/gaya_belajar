$(function () {
    $('#keyword').on('keyup', function () {
        $('#content-table').load('./ajaxCiri.php?keyword=' + $('#keyword').val() + '&id_gaya=' + $('#id_gaya').val());
    });
});
