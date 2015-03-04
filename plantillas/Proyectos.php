<?php ob_start(); ?>
<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
      <div class="panel panel-danger">
        <div class="panel-heading">
          <h3 class="panel-title">Proyectos</h3>
        </div>
        <div class="panel-body">
          <table class="table table-condensed table-hover">
            <thead>
             <tr>
              <th>Codigo</th>
               <th>Titulo</th>
               <th>Fecha Aprovacion</th>
               <th>Estado</th>
               <th></th>
              
             </tr>
           </thead>
           <tbody id="Filas">
             <?php foreach($proyectos as $row){ ?>
             <tr id='<?php echo $row['cod_proyecto']; ?>'>
               <td><?php echo $row['cod_proyecto']; ?></td>
               <td id="1"><?php echo $row['titulo']; ?></td>
               <td id="2"><?php echo $row['fechaAprovacion']; ?></td>
               <td id="2"><?php echo $row['estado']; ?></td>
               <td>
                <a class="btn btn-success" data-toggle="modal" data-target="#ventana" id="<?php echo $row['cod_proyecto']; ?>"><span class="glyphicon glyphicon-edit"></span> Editar</a>  
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
       <h3 class="panel-title">Nuevo Proyecto</h3>
     </div>
     <div class="panel-body">

      <form id="formulario" name="formulario" role="form" method="post" action="/pgt/index.php/Proyectos">
        <div class="form-group">
          <label for="">Codigo</label>
          <input type="text" class="form-control" id="cod_proyecto"  name="cod_proyecto" placeholder="Cedula">
          <label for="">Titulo</label>
          <input type="text" class="form-control" id="titulo"  name="titulo" placeholder="primer nombre">
          <label for="">Resumen</label>
          <textarea class="form-control" id="resumen"  name="resumen" placeholder="primer nombre"></textarea>
          <label for="">Fecha de Inicio</label>
          <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" placeholder="primer apellido">
          <label for="">Fecha de aprovacion</label>
          <input type="date" class="form-control" id="fechaAprovacion" name="fechaAprovacion" placeholder="telefono">
          <label for="">Estado</label>
          <select class="form-control" id="estado" name="estado">
            <option value="Aprovado">Aprovado</option>
            <option value="Rechazado">Rechazado</option>
            <option value="Aplazado">Aplazado</option>
          </select>
        </div>
        <button id="Enviar" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
      </form>  
    </div>
  </div>
</div> 

</div>

<?php $contenido = ob_get_clean(); ?>
<?php include "plantilla_base.php"; ?>