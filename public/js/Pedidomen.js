$(function() {

    selectSedes();
    
    $("#buscar").click(function() {
        filtro();
    });
});

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




