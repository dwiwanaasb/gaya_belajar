$(function () {
    $('#keyword').on('keyup', function () {
        $('#content-table').load('./ajaxCiri.php?keyword=' + $('#keyword').val() + '&id_jenis=' + $('#id_jenis').val());
    });
});
