var x;
x=$(document).ready(inicializarEventos);
function inicializarEventos()
{
  transaciones= new Array();
  $("#proyecto").change(buscar_jurado);
}


function buscar_jurado(){
  var opcion = $("#proyecto option:selected").val();
  $.post("buscar_jurado",{
    id: opcion
  },function(datos){
  	datos = $.parseJSON(datos);
  	
  	var opciones;
  	for(var i=0; i < datos.length ; i++) {
  		alert(datos[i].cedula);
  		opciones+="<option value="+datos[i].cedula+">"+datos[i].nom_profesor+" "+datos[i].ape_profesor+"</option>";
  	}
  	$("#jurado1").append(opciones);
  	$("#jurado2").append(opciones);
  	}
  );
}
