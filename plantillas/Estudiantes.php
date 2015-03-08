<?php ob_start(); ?>
<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
  <div class="panel panel-danger">
    <div class="panel-heading">
      <h3 class="panel-title">Estudiantes</h3>
    </div>
    <div class="panel-body">
      <table class="table table-condensed table-hover">
        <thead>
         <tr>
          <th>Codigo</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody id="Filas">
       <?php foreach($estudiantes as $row){ ?>
       <tr id='<?php echo $row['cod_estudiante']; ?>'>
         <td><?php echo $row['cod_estudiante']; ?></td>
         <td id="1"><?php echo $row['nom_estudiante']; ?></td>
         <td id="2"><?php echo $row['ape_estudiante']; ?></td>
         <td>
          <a class="btn btn-success" id="<?php echo $row['cod_estudiante']; ?>" href="/pgt/index.php/Estudiante?<?php echo $row['cod_estudiante']; ?> "><span class="glyphicon glyphicon-edit"></span> Detalles</a>

        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</div>
</div>


    <?php $contenido = ob_get_clean(); ?>
    <?php include "plantilla_base.php"; ?>