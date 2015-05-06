var x;
x=$(document).ready(inicializarEventos);
function inicializarEventos()
{
  transaciones= new Array();
  $("#proyecto").change(buscar_jurado);
}


function buscar_jurado(){
  var opcion = $("#proyecto option:selected").val();
  $('#jurado1').children().remove();
  $('#jurado2').children().remove();
  $.post("buscar_jurado",{
    id: opcion
  },function(datos){
    datos = $.parseJSON(datos);
  	
  	var opciones;
  	for(var i=0; i < datos.length ; i++) {
  		
  		opciones+="<option value="+datos[i].cedula+">"+datos[i].nom_persona+" "+datos[i].ape_persona+"</option>";
  	}
  	$("#jurado1").append(opciones);
  	$("#jurado2").append(opciones);
  	}
  );
}
