$(function() {

    $('form').parsley();

    $("#form_edit").submit(function(event) {
        event.preventDefault();
        update();
    });
    showEdit();
});


//actualizar-editform
const update = () => {
    let form = $('#form_edit');
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: form.attr('method'),
        dataType: 'json',
        success: function(data) {

            if (data.success) {
                success(data.success);
                $('#modalEdit').modal('hide');
                updateTable();
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


const showEdit = () => {
    $('#modalEdit').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget)
        let id = button.data('id');
        let nombre = button.data('nombre');
        let telefono = button.data('telefono');
        let correo = button.data('correo');
        let direccion = button.data('direccion');
        let web = button.data('web');
        let representante = button.data('representante');
        let modal = $(this);

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #nombre_e').val(nombre);
        modal.find('.modal-body #telefono_e').val(telefono);
        modal.find('.modal-body #correo_e').val(correo);
        modal.find('.modal-body #direccion_e').val(direccion);
        modal.find('.modal-body #web_e').val(web);
        modal.find('.modal-body #representante_e').val(representante);

    });
}

//FUNCION DE ESTADOS
const changeEstado = (url) => {
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            if (data.success) {
                success(data.success);
                updateTable();
            } else {
                warning(data.warning);
            }
        },
    });
}