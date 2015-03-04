var x=$(document).ready(main);

function main(){
$("#modificar_usuario").click(modificar_cliente);
$("#guardar_usuario").click(guardar_usuario);
$("#hola").dataTable();
$("#data").click(hola);
}
function hola(){

        var jdatos = JSON.stringify($("#Fila").val()); 
        alert(jdatos);
}
function modificar_cliente(){
             $.post('modificar_usuario',{
               id_usuario: $("#id_usuario").val(),
               nombre: $("#nombre").val(),
               apellido: $("#apellido").val(),
               direccion: $("#direccion").val(),
               telefono: $("#telefono").val(),
               estado: $("#estado").val(),
               email: $("#email").val(),
              },function(datos){   
                 $("#"+$("#id_usuario").val()+" #1").text($("#nombre").val()),
                 $("#"+$("#id_usuario").val()+" #2").text($("#apellido").val()),
                 $("#"+$("#id_usuario").val()+" #3").text($("#direccion").val()),
                 $("#"+$("#id_usuario").val()+" #4").text($("#telefono").val()),
                 $("#"+$("#id_usuario").val()+" #5").text($("#estado").val()),
                 $("#"+$("#id_usuario").val()+" #6").text($("#email").val()),
                   alert("Modificacion Correcta");
      });      
}
function guardar_usuario(){
                $.post('crear_usuario',{
               id_usuario: $("#id_usuarioe").val(),
               nombre: $("#nombree").val(),
               apellido: $("#apellidoe").val(),
               direccion: $("#direccione").val(),
               telefono: $("#telefonoe").val(),
               email: $("#emaile").val(),
               password: $("#password").val(),
              },function(datos){   
		      var nuevaFila="<tr>";
		      nuevaFila+="<td>"+$("#id_usuarioe").val()+"</td>"+"<td>"+$("#nombree").val()+"</td>"+"<td>"+$("#apellidoe").val()+"</td>"+"<td>"+$("#ciudade").val()+"</td>"
		      +"<td>"+$("#direccione").val()+"</td>"+"<td>"+$("#telefonoe").val()+"</td>"+"<td>"+$("#telefonoe").val()+"</td>"+"<td>"+$("#emaile").val()+"</td>"; 
		      nuevaFila+="</tr>"+"<td>";
		      $("#Fila").append(nuevaFila);
          
		       window.location='usuarios';
               }
              );

}
