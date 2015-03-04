var x=$(document).ready(main);

function main(){
$("#modificar_cliente").click(modificar_cliente);
$("#guardar_cliente").click(guardar_cliente);
$("#hola").dataTable();
$("#data").click(hola);
}
function hola(){

        var jdatos = JSON.stringify($("#Fila").val()); 
        alert(jdatos);
}
function modificar_cliente(){
             $.post('modificar_cliente',{
               id_cliente: $("#id_cliente").val(),
               nombre: $("#nombre").val(),
               apellido: $("#apellido").val(),
               ciudad: $("#ciudad").val(),
               direccion: $("#direccion").val(),
               telefono: $("#telefono").val(),
               email: $("#email").val(),
              },function(datos){   
                 $("#"+$("#id_cliente").val()+" #1").text($("#nombre").val()),
                 $("#"+$("#id_cliente").val()+" #2").text($("#apellido").val()),
                 $("#"+$("#id_cliente").val()+" #3").text($("#ciudad").val()),
                 $("#"+$("#id_cliente").val()+" #4").text($("#direccion").val()),
                 $("#"+$("#id_cliente").val()+" #5").text($("#telefono").val()),
                 $("#"+$("#id_cliente").val()+" #6").text($("#email").val())
                   alert("Modificacion Correcta");
              }
              );
}
function guardar_cliente(){
                $.post('crear_cliente',{
               id_cliente: $("#id_clientee").val(),
               nombre: $("#nombree").val(),
               apellido: $("#apellidoe").val(),
               ciudad: $("#ciudade").val(),
               direccion: $("#direccione").val(),
               telefono: $("#telefonoe").val(),
               email: $("#emaile").val(),
              },function(datos){   
		      var nuevaFila="<tr>";
		      nuevaFila+="<td>"+$("#id_clientee").val()+"</td>"+"<td>"+$("#nombree").val()+"</td>"+"<td>"+$("#apellidoe").val()+"</td>"+"<td>"+$("#ciudade").val()+"</td>"
		      +"<td>"+$("#direccione").val()+"</td>"+"<td>"+$("#telefonoe").val()+"</td>"+"<td>"+$("#emaile").val()+"</td>"; 
		      nuevaFila+="</tr>"+"<td>";
		      $("#Fila").append(nuevaFila);
          
		       window.location='clientes';
               }
              );

}
