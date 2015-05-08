
$(document).ready(inicializarEventos);


function inicializarEventos() {
	$("#calificar").click(enviar)
}
function enviar(){
	alert($("#calificacion option:selected").val())
	alert($("#cod_proyecto").text())
	alert($("#director").text())
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
