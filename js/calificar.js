
$(document).ready(inicializarEventos);


function inicializarEventos() {
	$("#calificar").click(enviar)
}
function enviar(){

	$("#modalcalificacion").modal('hide');
	
	$.post('/pgt/index.php/director/calificarproyecto',{
		proyecto: $("#cod_proyecto").text(),
		director: $("#director").text(),
		calificacion: $("#calificacion option:selected").val()
	},function(datos){
		alert(datos);
	}
	)
}
