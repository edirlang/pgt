var x;
x=$(document);
x.ready(inicializarEventos);
var transacion=[];
function inicializarEventos()
{
  var x;
  transaciones= new Array();
  x=$("#boton1");
  x.click(presionBoton)
  
  $("#Enviar").click(EnviarBD)
}

function presionBoton()
{
  $('#formulario').validate({
    rules: {
     'Cedula': 'required',
     'Codigo': 'required',
     'Fecha': 'required',
     'Naturaleza': 'required',
     'Descripcion': 'required',
     'Valor': { required: true, number: true }
   },
   messages: {
     'Cedula': 'Debe ingresar su usuario',
     'Codigo': 'Debe ingresar el codigo de transacion',
     'Fecha': 'Debe ingresar una fecha valida',
     'Naturaleza': 'Selecione una Naturaleza',
     'Descripcion': 'Descripcion de la transacion invalida',
     'Valor': 'Digite el valor de la transacion'
   },
       //errorElement: 'div',
       //errorContainer: $('#errores'),
       submitHandler: function(form){
        var datos = new Array($("#Cedula").val(),$("#codigo option:selected").val(),$("#Fecha").val(),$("#Naturaleza").val(),$("#Descripcion").val(),$("#Valor").val());
        transacion.push(datos);

        $("<tr>").append(
          $('<td>', { text: $("#Cedula").val()
        }), $('<td>', { text: $("#codigo option:selected").val()
      }), $('<td>', { text: $("#Fecha").val() 
    }), $('<td>', { text: $("#Naturaleza").val()  
  }), $('<td>', { text: $("#Descripcion").val()  
}), $('<td>', { text: $("#Valor").val()  
})
).hide().appendTo('#Filas').fadeIn('slow');
        VaciarFormulario();
      }
    });
}

function VaciarFormulario(){
  $('#formulario').each (function(){
    this.reset();
  });

}

function EnviarBD(){

  var jdatos = JSON.stringify(transacion); 
  $.post("guardar_transaiones",{
    jdatos: jdatos
  },procesar); 
}

function procesar(datos){
 if(datos==1){
  alert("Correcto");
  setTimeout("location.href='Transacion-manual'", 50);
}else{
  alert(datos);
  if($('#error').length){
      
  }else{
    
    $('#Mensaje').append("<div id='error' class='alert alert-danger'>Error: No se cumplio la doble partida </div>");
  }
}
}