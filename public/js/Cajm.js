$(function() {


    $("#form_edit").submit(function(event) {
        event.preventDefault();
        update();
    });


    $("#buscar").click(function() {
        filtro();
    });

    selectSedes();


});

const selectSedes = () => {

    $("#institucion_id").change(function(event) {
        if (event.target.value > 0) {
            $("#sede_id").empty();
            $.get("sedes/select/" + event.target.value, function(response, menu_id) {
                for (i = 0; i < response.length; i++) {
                    $("#sede_id").append("<option value='" + response[i].id + "'>" + response[i].nombre + "</option>");
                }
            })
        } else {
            warning("Debe Seleccionar Una Institución");
        }


    })
}


//guardar en el form
const filtro = () => {
    let form = $('#form_filtro');
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: 'GET',
        dataType: 'html',
        success: function(data) {
            $('#resultado').html(data);

        }
    });

}

//actualizar-editform
const update = () => {
    let form = $('#form_edit');
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: form.attr('method'),
        dataType: 'html',
        success: function(data) {

            if (data) {

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