$(document).ready(inicializarEventos);
var transacion=[];
var fecha;
function inicializarEventos()
{
  var d = new Date();
  fecha = d.getFullYear()+"-"+d.getMonth()+"-"+d.getDate();
  transaciones= new Array();
  $("#boton1").click(presionBoton)
  $("#Enviar").click(EnviarBD)
}

function presionBoton()
{
  
  $('#formulario').validate({
    rules: {
     'proveedor': 'required',
     'Codigo': 'required',
     'cantidad': { required: true, number: true },
     'vlr_unidad': { required: true, number: true },
     'iva': 'required'
   },
   messages: {
     'proveedor': '<p class="alert alert-danger">Debe ingresar su usuario</p>',
     'Codigo': '<p class="alert alert-danger">Debe selecionar el codigo de producto</p>',
     'cantidad': '<p class="alert alert-danger">digita la cantidad</p>',
     'vlr_unidad': '<p class="alert alert-danger">Digita el valor de unidad</p>',
     'iva': '<p class="alert alert-danger">Digite el iva</p>'
   },
       //errorElement: 'div',
       //errorContainer: $('#errores'),
       submitHandler: function(form){
        var datos = new Array($("#proveedor").val(),fecha,$("#codigo").val(),$("#cantidad").val(),$("#vlr_unidad").val(),$("#iva").val());
        transacion.push(datos);
        subtotal = $("#cantidad").val()*$("#vlr_unidad").val();

        $("<tr>").append(
          $('<td>', { text: $("#codigo").val()
        }), $('<td>', { text: $("#cantidad").val()
      }), $('<td>', { text: $("#vlr_unidad").val() 
    }), $('<td>', { text: $("#iva").val()  
  }), $('<td>', { text: subtotal  
  })
  ).hide().appendTo('#Filas').fadeIn('slow');
        var cantidad = $("#cantidad").val();
        var iva = $("#iva").val();
        var vlr_unidad = (($("#vlr_unidad").val()*iva)/100)+($("#vlr_unidad").val()*1);
        var subtotal = cantidad*vlr_unidad;
        var total=($("#total").val()*1) + subtotal;
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
  $.post("GuardarPedido.php",{
    jdatos: jdatos,
    pago: $("#pago").val()
  },procesar); 
}
function procesar(datos){
 if(datos==1){
  alert("Correcto");
  setTimeout("location.href='Proveedor.php'", 50);
  }else{
    if($('#error').length){

    }else{
      alert(datos);
      $('#Mensaje').append("<div id='error' class='alert alert-danger'>Error: No se almaceno el pedido </div>");
    }
  }
}