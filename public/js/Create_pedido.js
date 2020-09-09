$(function() {

    $('#btnGuardar').show();
    $('#btnExportar').hide();


    $("#form_create").submit(function(event) {
        event.preventDefault();
        swal({
            title: 'Confirmación',
            text: "¿Está seguro de guardar la información ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si',
            cancelButtonText: 'No',
            confirmButtonClass: 'btn btn-primary',
            cancelButtonClass: 'btn btn-danger m-l-10',
            buttonsStyling: false
        }).then(function() {
            save();
        }, function(dismiss) {

        })
    });
});





//registrar
const save = () => {
    let form = $('#form_create');
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: form.attr('method'),
        dataType: 'json',
        success: function(data) {

            if (data.success) {
                success(data.success);
                $('#btnGuardar').hide();
                $('#btnExportar').show();
            } else {
                warning(data.warning);
            }

        },
        error: function(data) {

            if (data.status === 422) {
                let errors = $.parseJSON(data.responseText);
                addErrorMessage(errors);
            }
        }
    });

}