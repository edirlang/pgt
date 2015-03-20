<?php ob_start(); ?>
<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
  <div class="panel panel-danger">
    <div class="panel-heading">
      <h3 class="panel-title">Estudiantes</h3>
    </div>
    <div class="panel-body">
      <table id="hola" class="table table-striped table-bordered table-condensed table-hover display color2 " cellspacing="0" width="100%">
        <thead>
         <tr>
          <th>Codigo Programa</th>
          <th>Nombre Programa</th>
          <th></th>
         
        </tr>
      </thead>
      <tbody id="Fila">
       <?php foreach($programas as $row){ ?>
       <tr id='<?php echo $row['cod_programa']; ?>'>
          <td id="1"><?php echo $row['cod_programa']; ?></td>
          <td id="2"><?php echo $row['nom_programa']; ?></td>
          <td>
          <a class="btn btn-success" id="<?php echo $row['cod_programa']; ?>" href="/pgt/index.php/programa?id=<?php echo $row['cod_programa']; ?> "><span class="glyphicon glyphicon-edit"></span> Detalles</a>
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