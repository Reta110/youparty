$(document).ready(function()
{
    $('.btn-delete').click(function(e){

        e.preventDefault();

        var row = $(this).parents('tr');
        var id = row.data('id');
        var form = $('#form-delete');
        var url = form.attr('action').replace(':USER_ID', id);
        var data = form.serialize();



        $.post(url, data, function(result){

            row.fadeOut();

            $('.top-left').notify({
                message: {
                    text: result.message}
            }).show();

        }).fail(function(){

            row.fadeIn();

            $('.top-left').notify({
                message: { text: 'El usuario no fue eliminado' },
                type: 'danger'
            }).show();
        });
    });
});