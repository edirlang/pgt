var x = $(document).ready(inicializarEventos);

function inicializarEventos()
{
  $("#Enviar").click(presionBoton);
  $("#guardar").click(actualizar);
}

function actualizar(){
    $.post("actualizar_empleado",{
      cedula: $("#cedula").val(),
      nombre: $("#nombre").val(),
      apellido: $("#apellido").val(),
      telefono: $("#telefono").val(),
      cargo: $("#cargo").val()
    },function(datos){

      $("#"+$("#cedula").val()+" #-1").text($("#nombre").val());
      $("#"+$("#cedula").val()+" #-2").text($("#apellido").val());
      $("#"+$("#cedula").val()+" #-3").text($("#telefono").val());
      $("#"+$("#cedula").val()+" #-4").text($("#cargo").val());
    });  
}

function presionBoton()
{
  $('#formulario').validate({
    rules: {
     'Cedula': 'required',
     'Nombre': 'required',
     'Apellido': 'required',
     'Telefono': 'required',
     'rol': 'required',
     'Contrasena': 'required'
   },
   messages: {
     'Cedula': 'Debe ingresar cedula del cliente',
     'Nombre': 'Debe ingresar el nombre del cliente',
     'Apellido': 'Debe ingresar el apellido del cliente',
     'Telefono': 'ingrese telefono',
     'rol': 'selecione el cargo',
     'Contrasena': 'defina contrseña por defaul'
   }, submitHandler: function(form){
     
    $.post("crear_empleado",{
      Cedula: $("#Cedula").val(),
      Nombre: $("#Nombre").val(),
      Apellido: $("#Apellido").val(),
      Telefono: $("#Telefono").val(),
      Contrasena: $("#Contrasena").val(),
      Rol: $("#rol option:selected").val()
    },procesar); 
  }
});
  
}

function procesar(datos){

 if(datos==1){
  alert("Correcto");
  $("<tr>").append(
          $('<td>', { text: $("#Cedula").val()
        }), $('<td>', { text: $("#Nombre").val()
      }), $('<td>', { text: $("#Apellido").val() 
    }), $('<td>', { text: $("#Telefono").val()  
  }), $('<td>', { text: $("#rol").val()  
}),$('<td><a class="btn btn-success" href="editar_empleado.php?id='+$("#Cedula").val()+'">Editar</a></td>'
),$('<td><a class="btn btn-danger" href="eliminar_empleado.php?id='+$("#Cedula").val()+'">Eliminar</a></td>'
)
).hide().appendTo('#Filas').fadeIn('slow');
        VaciarFormulario();
  }else{
    alert("No se pudo crear debido a: "+datos);
  }
}

function VaciarFormulario(){
  $('#formulario').each (function(){
    this.reset();
  });

}