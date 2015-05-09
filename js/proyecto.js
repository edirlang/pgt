$(document).ready(inicializarEventos);
var i=0;
function inicializarEventos()
{
  $("#agregar").click(AgregarEstudiante)
}
function AgregarEstudiante(){
  
  $("#estudiante").append('<label for="">Estudiante '+(i+1)+'</label><input type="text" class="form-control" name="estudiantes['+i+']" value="'+$("#estudiantes option:selected").val()+"."+$("#estudiantes option:selected").text()+'" readonly="readonly" />');
  i++;
}
