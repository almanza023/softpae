


$(document).ready(function(){
  $('#bt_add').click(function(){
    agregar();
  });
});

var cont=0;
total=0;
subtotal=[];

$('#guardar').hide();

function agregar(){
 
  idarticulo=$('#idarticulo').val();
  articulo=$('#idarticulo option:selected').text();
  cantidad=$('#cantidad').val();
  precio=$('#precio').val();
  
  if(idarticulo!="" && cantidad!="" && precio!=""){
   
      subtotal[cont]=(cantidad*precio);
      total=total+subtotal[cont];
      var fila='<tr class="selected" id="fila'+cont+'"><td><button class="btn btn-sm btn-danger btn-icon-text" type="button" onclick="eliminar('+cont+');"><i class="fa fa-close"></button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="number" name="cantidad[]" readonly value="'+cantidad+'"></td><td><input type="number" name="precio[]" readonly value="'+precio+'"></td><td>'+subtotal[cont]+'</td></tr>'
      cont++;
      limpiar();
      $('#total').html("Total a Pagar $/. " + total);
      $('#total_venta').val(total);
      evaluar();
      $('#detalles').append(fila);
    
  }else{
    alert("Error, Verifique que no existan campos vacios");
  }
}

function limpiar(){
  $('#cantidad').val("");
  $('#precio').val("");
}

function evaluar(){
  if(total>0){
    $('#guardar').show();
  }else{
    $('#guardar').hide();
  }
}

function eliminar(index){
  total=total-subtotal[index];
  $('#total').html("Total a Pagar $/. " + total);
  $('#total_venta').val(total);
  $('#fila'+index).remove();
  evaluar();
}

   
            
       
