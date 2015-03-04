var x= $(document).ready(menu);
function menu(){
var input = $( "input:file" ).css({
  background: "blue",
  border: "3px red solid"
});
$("#guardar_producto").click(ingreso_producto);

}

function ingreso_producto(){
    $.post('guardar_producto',{
    archivo:$("#archivo").val(),
    id:$("#id_pro").val(),
    nombre:$("#nombre").val(),	
    descripcion:$("#descripcion").val(),	
    cantidad:$("#cantidad").val(),	
    precio:$("#precio").val()
    },function(datos){
    alert("Producto Ingresado");
 


    });
 


    
}