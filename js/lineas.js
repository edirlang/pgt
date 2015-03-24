var  x=$(document).ready(inicializarEventos);

function inicializarEventos() {
  $("#modificar_linea").click(modificar_linea);
  $("#hola").dataTable();
}




function modificar_linea(){

     $.post('modificar_linea',{
               cod_linea: $("#cod_linea").val(),
               nom_linea: $("#nom_linea").val(),
               cod_programa: $("#cod_programa").val(),
  
              },function(datos){   
                 $("#"+$("#cod_linea").val()+" #1").text($("#nom_linea").val()),
                 $("#"+$("#cod_linea").val()+" #2").text($("#cod_programa").val())
                   alert("Modificacion Correcta");
              }
              );
}