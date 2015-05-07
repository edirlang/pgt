<?php ob_start(); ?>
 <div class="container">
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
          <th>Fecha Inicio</th> 
          <th>Fecha Aprovado</th>       
        </tr>
      </thead>
      <tbody id="Filas">
     <?php foreach($director_proyecto as $row){ ?>
       <tr id='<?php echo $row['cod_proyecto']; ?>'>
         <td><?php echo $row['cod_proyecto']; ?></td>
         <td id="1"><?php echo $row['titulo']; ?></td>
         <td><?php echo $row['fecha_inicio']; ?></td>
         <td><?php echo $row['fecha_aprovacion']; ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  </table>
</div>
</div>
</div>  </div>  
<?php $contenido = ob_get_clean(); ?>
<?php include "plantilla_base.php"; ?>