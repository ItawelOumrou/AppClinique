$(document).ready(function () {
    $('#create').hide();
    if ($('.de').text() != null) {
        $('#create').show();
        $('#table').hide();
    }

    $('#btn_create').click(function () {
        $('#create').show();
        $('#table').hide();
    });

    $('#submit').click(function () {


        $.ajax({
            data: $('#formajout').serialize(),
            url: "utilisateures/store",
            type: "POST",
            dataType: 'json',
            success: function (data) {

            },
            error: function (data) {
                $('#create').show();
                $('#table').hide();
            }
        });
    });
});