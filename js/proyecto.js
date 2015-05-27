$(document).ready(inicializarEventos);
var i=0;

function inicializarEventos()
{
	$("#agregar").click(AgregarEstudiante);
  	$("#crear_estuciante").click(CrearEstudiante);
  	
}
function AgregarEstudiante(){
  
  $("#estudiante").append('<label for="">Estudiante '+(i+1)+'</label><input type="text" class="form-control" name="estudiantes['+i+']" value="'+$("#estudiantes option:selected").val()+"."+$("#estudiantes option:selected").text()+'" readonly="readonly" />');
  i++;
}

function CrearEstudiante(){
	$("#nuevo").modal();
	alert("s")
        $.post("/pgt/index.php/Estudiante/nuevo",{
		    Codigo: $("#Codigo").val(),
		    Cedula: $("#Cedula").val(),
		    Nombre: $("#Nombre").val(),
		    Apellido: $("#Apellido").val(),
		    Telefono: $("#Telefono").val(),
		    Email: $("#Email").val()
		  },procesar); 
}

function procesar(datos){
	$("#estudiante").append('<label for="">Estudiante '+(i+1)+'</label><input type="text" class="form-control" name="estudiantes['+i+']" value="'+$("#Cedula").val()+"."+$("#Nombre").val()+" "+$("#Apellido").val()+'" readonly="readonly" />');
  	i++;
}
