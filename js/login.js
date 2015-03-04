x=$(document);
x.ready(inicializarEventos);
function inicializarEventos()
{
  $("#Enviar").click(presionBoton);
  $(".ws_next").remove();
  $(".ws_prev").remove();
  $(".ws_playpause").remove();
}

function presionBoton()
{
  $('#Formulario').validate({
    rules: {
     'cedula': 'required',
     'contrasena': 'required',
   },
   messages: {
     'cedula': 'Debe ingresar su usuario',
     'contrasena': 'Ingrese su contraseña',
   },
       //errorElement: 'div',
       //errorContainer: $('#errores'),
       submitHandler: function(form){
        var datos = new Array($("#cedula").val(),$("#contrasena").val());
        var jdatos = JSON.stringify(datos); 
        $.post("login",{
          jdatos: jdatos
        },procesar); 
      }
    });
}

function procesar(datos){
  
 switch(datos){
    case 'admin':
      setTimeout("location.href='admin'", 50);
    break;
    case 'contador':
      setTimeout("location.href='contador'", 50);
    break;
    case 'cajero':
      setTimeout("location.href='cajero'", 50);
    break;
    default:
      if($('#error').length){

      }else{
        $('#Mensaje').append("<div id='error' class='alert alert-danger'><button type='button' id='cerrar' class='close'>&times;</button>Error: "+datos+"</div>");
      }
    break;
  }
  $("#cerrar").click(function(){
    $("#error").remove();
  });
}