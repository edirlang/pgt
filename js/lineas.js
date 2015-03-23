$(document).ready(inicializarEventos);

function inicializarEventos() {
  $("#programa").change(Buscar_lineas);
  
}

function Buscar_lineas(){
  var programa = $("#programa").val();
  var codigos=[];
  $.post("/pgt/index.php/buscar_lineas_programa",{
    cod_programa: programa
  },function(dato){
    datos=$.parseJSON(dato);
      for(var i in datos){
        $('#linea').append('<option value="'+datos[i]['cod_linea']+'" selected="selected">'+datos[i]['nom_linea']+'</option>');
      }
    
  });
}
