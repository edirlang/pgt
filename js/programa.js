var x=$(document).ready(menu);


function  menu(){
$("#modificar_programa").click(modificar_programa);
$("#hola").dataTable();
}

function modificar_programa(){

	 $.post('modificar_programa',{
               cod_programa: $("#cod_programa").val(),
               nom_programa: $("#nom_programa").val(),
               director: $("#director_programa").val(),
  
              },function(datos){   
                 $("#"+$("#cod_programa").val()+" #1").text($("#od_programa").val()),
                 $("#"+$("#cod_programa").val()+" #2").text($("#nom_programa").val()),
                 $("#"+$("#cod_programa").val()+" #3").text($("#director_programa").val())
                   alert("Modificacion Correcta");
              }
              );
}
