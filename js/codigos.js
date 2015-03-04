var x;
x=$(document).ready(inicializarEventos);
function inicializarEventos()
{
  transaciones= new Array();
  $("#codigo").change(buscar_cliente);
}


function buscar_cliente(){
  var op = $("#codigo option:selected").val();
  $.post("buscar_codigo",{
    codigo: op
  },function(datos){
    $("#Descripcion").val(datos);
  }
  );
}
