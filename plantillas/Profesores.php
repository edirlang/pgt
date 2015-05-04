<?php ob_start(); ?>
<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
  <div class="panel panel-danger">
    <div class="panel-heading">
      <h3 class="panel-title">Docentes</h3>
    </div>
    <div class="panel-body">
      <table id="hola" class="table table-striped table-bordered table-condensed table-hover display color2 " cellspacing="0" width="100%">
        <thead>
         <tr>
          <th>Cedula</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th></th>
            <th></th>
           <th></th>
        </tr>
      </thead>
      <tbody id="Fila">
       <?php foreach($profesores as $row){ ?>
       <tr id='<?php echo $row['cedula']; ?>'>
          <td id="1"><?php echo $row['cedula']; ?></td>
          <td id="2"><?php echo $row['nom_profesor']; ?></td>
          <td id="3"><?php echo $row['ape_profesor']; ?></td>
          <td>
          <a class="btn btn-success" id="<?php echo $row['cedula']; ?>" href="/pgt/index.php/profesor?id=<?php echo $row['cedula']; ?> "><span class="glyphicon glyphicon-edit"></span> Detalles   </a>
          </td>
          <td>
          <a class="btn btn-primary" id="<?php echo $row['cedula']; ?>" href="/pgt/index.php/profesor_proyectos?id=<?php echo $row['cedula']; ?> "><span class="glyphicon glyphicon-search"></span> Director de</a>
          </td>
          <td>
         <a class="btn btn-primary" id="<?php echo $row['cedula']; ?>" href="/pgt/index.php/eliminar_profesor?id=<?php echo $row['cedula']; ?> "><span class="glyphicon glyphicon-remove"></span></a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</div>
</div>
<script type="text/javascript" src="/pgt/js/usuario.js"></script>
<?php $contenido = ob_get_clean(); ?>
<?php include "plantilla_base.php"; ?>