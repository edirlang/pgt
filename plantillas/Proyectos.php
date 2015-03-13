<?php ob_start(); ?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <div class="panel panel-danger">
    <div class="panel-heading">
      <h3 class="panel-title">Proyectos</h3>
    </div>
    <div class="panel-body" color="Black">
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
         <td id="2"><?php echo $row['fecha_aprovacion']; ?></td>
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

<?php $contenido = ob_get_clean(); ?>
<?php 

if (isset($_SESSION['usuario'])) {
  include "plantilla_base.php";  
}else{
  include "plantilla_base2.php"; 
}
 ?>