<?php ob_start(); ?>
<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
      <div class="panel panel-danger">
        <div class="panel-heading">
          <h3 class="panel-title">Clientes</h3>
        </div>
        <div class="panel-body">
          <table class="table table-condensed table-hover">
            <thead>
             <tr>
               <th>Cedula</th>
               <th>Nombre</th>
               <th>Apellido</th>
               <th>Telefono</th>
               <th></th>
             </tr>
           </thead>
           <tbody id="Filas">
             <?php foreach($clientes as $row){ ?>
             <tr id='<?php echo $row['Cedula']; ?>'>
               <td><?php echo $row['Cedula']; ?></td>
               <td id="1"><?php echo $row['Nombre']; ?></td>
               <td id="2"><?php echo $row['Apellido']; ?></td>
               <td id="3"><?php echo $row['Telefono']; ?></td>
               <td>
                <a class="btn btn-success" data-toggle="modal" data-target="#ventana" id="<?php echo $row['Cedula']; ?>"><span class="glyphicon glyphicon-edit"></span> Editar</a>
                <script language="JavaScript" type="text/javascript">
                $("#<?php echo $row['Cedula']; ?>").click(function(){
                
                  $.post('consultar_cliente',{
                    id: <?php echo $row['Cedula']; ?>
                  },function(datos){
                      datos = $.parseJSON(datos);
                      document.getElementById('cedula').value =datos['Cedula'];
                      document.getElementById('nombre').value =datos['Nombre'];
                      document.getElementById('apellido').value =datos['Apellido'];
                      document.getElementById('telefono').value =datos['Telefono'];
                      }
                    )
                  }
                );
                </script>
               </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>

  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
   <div class="panel panel-success">
     <div class="panel-heading">
       <h3 class="panel-title">Nuevo Cliente</h3>
     </div>
     <div class="panel-body">

      <form id="formulario" name="formulario" role="form" method="post">
        <div class="form-group">
          <label for="">Cedula</label>
          <input type="text" class="form-control" id="Cedula"  name="Cedula" placeholder="Cedula">
          <label for="">Nombre</label>
          <input type="text" class="form-control" id="Nombre"  name="Nombre" placeholder="primer nombre">
          <label for="">Apellido</label>
          <input type="text" class="form-control" id="Apellido" name="Apellido" placeholder="primer apellido">
          <label for="">Telefono</label>
          <input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="telefono">
        </div>
        <button id="Enviar" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
      </form>  
    </div>
  </div>
</div> 

<div class="modal fade" id="ventana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4>Editar Cliente</h4>
      </div>

      <div class="modal-body">
       <form id="editar" name="editar" action="actualizar_cliente.php" method="post">
        <div class="form-group">
          <label for="">Cedula</label>
          <input type="text" name="cedula" class="form-control"  id="cedula"  readonly="readonly"/>

          <label for="">Nombre</label>
          <input type="text" class="form-control" name="nombre" id="nombre" />

          <label for="">Apellido</label>
          <input type="text" class="form-control" name="apellido" id="apellido"/>

          <label for="">Telefono</label>
          <input type="text" class="form-control" name="telefono" id="telefono">
        </div>
      </form>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-success" id="guardar" data-dismiss="modal"><span class="glyphicon glyphicon-refresh"></span> Actualizar</button>
      <button type="submit" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cerrar</button>
    </div>
  </div>
  </div>
</div>
 
 <script type="text/javascript" src="/Smart-Solutions/js/clientes.js"></script>

<?php $contenido = ob_get_clean(); ?>
<?php include "plantilla_base.php"; ?>