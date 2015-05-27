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
            <th>Estado</th>
            <th></th>       
          </tr>
        </thead>
        <tbody id="Filas">
         <?php foreach($director_proyecto as $row){ ?>
         <tr>
           <td><?php echo $row['cod_proyecto']; ?></td>
           <td><?php echo $row['titulo']; ?></td>
           <td><?php echo $row['fecha_inicio']; ?></td>
           <td><?php echo $row['fecha_aprovacion']; ?></td>
           <td><?php echo $row['estado']; ?></td>
           <th><a id="<?php echo str_replace(".", "_", $row['cod_proyecto']); ?>" class="btn btn-primary" onclik=''>Calificar Proyecto</a></th>
         </tr>
          <script language="JavaScript" type="text/javascript">
            $("#<?php echo str_replace(".", "_", $row['cod_proyecto']); ?>").click(function(){
              $("#cod_proyecto").text(<?php echo $row['cod_proyecto']; ?>);
              $("#director").text(<?php echo $row['cod_persona']; ?>);
              $("#modalcalificacion").modal();
            });
          </script>
           
         <?php } ?>
         </tbody>
       </table>
      </div>
    </div>
  </div>  
</div>
  <p class='hide' id="cod_proyecto"></p>
  <p class='hide' id="director"></p>  
<div class="modal fade" id="modalcalificacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center><h4>Calificar Proyecto</h4><center>
      </div>

      <div class="modal-body">
        <form action="" method="POST" role="form">
           <div class="form-group">
             <label for="">Calificacion</label>
            <select name="calificacion" id="calificacion" class="form-control">
              <option value="rechazado">Rechazado</option>
              <option value="finalizado">Finalizado</option>
              <option value="en proceso">En proceso</option>
            </select>   
          </div>
         </form> 
      </div>

    <div class="modal-footer">
      <center>
        <button id="calificar" type="submit" class="btn btn-primary">Calificar</button>
        <button type="submit" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cerrar</button>
      </center>
    </div>
  </div>
</div>
<script type="text/javascript" src="/pgt/js/calificar.js"></script>
<script language="JavaScript" type="text/javascript">
<?php $contenido = ob_get_clean(); ?>
<?php include "plantilla_base.php"; ?>