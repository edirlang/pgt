<?php ob_start(); ?>
<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
  <div class="panel panel-danger">
    <div class="panel-heading">
      <h3 class="panel-title">Proyecto</h3>
    </div>
    <div class="panel-body">
      <table id="hola" class="table table-striped table-bordered table-condensed table-hover display color2 " cellspacing="0" width="100%">
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
         <td id="2"><?php echo $row['fecha_aprovacion']; ?></td>
         <td id="2"><?php echo $row['estado']; ?></td>
           <td>
          <a class="btn btn-success" id="<?php echo $row['cod_proyecto']; ?>" href="/pgt/index.php/detalle_proyecto?id=<?php echo $row['cod_proyecto']; ?> "><span class="glyphicon glyphicon-edit"></span> Detalles   </a>
          </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  </table>
</div>
</div>
</div>
<script type="text/javascript" src="/pgt/js/usuario.js"></script>
<?php $contenido = ob_get_clean(); ?>
<?php 

if (isset($_SESSION['usuario'])) {
  include "plantilla_base.php";  
}else{
  include "plantilla_base2.php"; 
}
 ?>

