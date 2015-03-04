var productos=[];
var total=0;
var iva_t=0;

$(document).ready(inicializarEventos);

$(function() {
  var codigos=[];
  $.post("buscar_productos",
    function(dato){
      datos=$.parseJSON(dato);
      for(var i in datos){
        codigos[i]=datos[i]['Codigo'];
      }
    }
    );
  $("#tags").autocomplete({
    source: codigos
  });
});

function inicializarEventos() {
  $("#agregar").click(presionBoton);
  $("#Enviar").click(EnviarBD);
  $("#l_guardar").click(crear_cliente);
  
  $("#cerrar_v").click(cerar);
  $('#Enviar').attr("disabled", true);
  $("#nuevo").click(function(){
    $("#nuevo_cliente").modal();
  })
}

function crear_cliente(){

  $('#crear_cliente').validate({
    rules: {
     'Cedula': 'required',
     'Nombre': 'required',
     'Apellido': 'required',
     'Telefono': 'required'
   },
   messages: {
     'Cedula': 'Debe ingresar cedula del cliente',
     'Nombre': 'Debe ingresar el nombre del cliente',
     'Apellido': 'Debe ingresar el apellido del cliente',
     'Telefono': 'ingrese telefono'
   }, submitHandler: function(form){

    $.post("crear_cliente",{
      Cedula: $("#Cedula").val(),
      Nombre: $("#Nombre").val(),
      Apellido: $("#Apellido").val(),
      Telefono: $("#Telefono").val()
    },procesar_cliente); 
  }
});
}

function procesar_cliente(datos){
  if(datos == '1'){
    $("#cc_cliente").append("<option value='"+$("#Cedula").val()+"' selected='selected'>"+$("#Cedula").val()+" - "+$("#Nombre").val()+" "+$("#Apellido").val()+"</option>");

    $("#nuevo_cliente").modal('hide');
  }else{
    alert("No almecenado"+datos);
  }
}

function cerar(){
  $("#total_v").val($("#total").text());
  $("#efectivo_v").keypress(calcular_cambio);
  $("#cerar_venta").modal();
}

function calcular_cambio(evt){
  var Efectivo = $("#efectivo_v").val()+String.fromCharCode(evt.charCode);
  var total = $("#total_v").val();
  
  var cambio = (Efectivo*1)-(total*1);
  $("#cambio_v").val(cambio);
  if(cambio >= 0){
    $('#Enviar').attr("disabled", false);
  }
}

function presionBoton()
{
  $('#formulario').validate({
    rules: {
     'codigo': 'required',
     'cantidad' : { required: true, number: true }
   },
   messages: {
     'codigo': 'Debe ingresar el codigo de transacion',
     'cantidad': 'Digite el valor de la transacion'
   },

   submitHandler: function(form){
    selecion = $('input#tags').val();
    $.post("consultar_producto1",{
      id: selecion
    }, Consultar_Producto);
  }});
}

function Consultar_Producto(dato){
  var datos=[];
  datos=$.parseJSON(dato);

  if(datos.length){
    var iva = (datos[2]*datos[4])/100;
    var vlr_unid = datos[3];
    var subtotal = (vlr_unid*1)*($("#cantidad").val()*1);
    var producto = new Array($("#tags").val(),$("#cantidad").val(),iva,vlr_unid,subtotal,datos[5]);
    productos.push(producto);
    $("<tr>").append(
      $('<td>', { text: datos[0]
      }), $('<td>', { text: datos[5]
      }), $('<td>', { text:  $("#cantidad").val()
    }), $('<td>', { text: vlr_unid 
    }), $('<td>', { text: datos[2]  
    }), $('<td>', { text: subtotal  
    })
    ).hide().appendTo('#Filas').fadeIn('slow');
    VaciarFormulario();
    iva_t += iva*($("#cantidad").val()*1);
    total += subtotal;
    
    $("#subtotal").text(total);
    $("#iva").text(iva_t);
    $("#total").text(total*1+iva*1);
  }else{
    alert("producto no registrado");
  }

}

function VaciarFormulario(){
  $('#formulario').each (function(){
    this.reset();
  });

}

function EnviarBD(){
  var Efectivo = $("#efectivo_v").val();

  var jdatos = JSON.stringify(productos); 

  $.post("imprimir_factura",{
    num_fact: $("#numero").val(),
    fecha: $("#fecha").val(),
    hora: $("#hora").val(),
    cliente: $("#cc_cliente").val(),
    cajero: $("#cajero").val(),
    Efectivo: Efectivo,
    pago: 'contado',
    jdatos: jdatos
  },procesar); 
}

function procesar(datos){
  $("#factura").remove();
  document.getElementById("imp").innerHTML = datos;
  window.print();
  setTimeout("location.href='Factura.php?"+datos+"'", 10);
}