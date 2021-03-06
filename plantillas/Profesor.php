<?php ob_start(); ?>
<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
  <div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Docente</h3>
  </div>
  <div class="panel-body">
    <p>Nombre: <?php echo $profesor['nom_persona']." ".$profesor['ape_persona'] ?></p>
    <p>Cedula: <?php echo $profesor['cedula']; ?></p>
    <p><strong>Telefonos</strong></p>
      <?php 
      $i=1;
      foreach ($telefonos as $telefono) { ?>
      <p>Telefono <?php echo $i; ?>: <?php echo $telefono['num_telefono']; ?></p>
      <?php 
      $i++;
    } ?>
  <p><strong>Correos</strong></p>
    <?php 
    $i=1;
    foreach ($correos as $correo) { ?>
    <p>E-mail <?php echo $i; ?>: <?php echo $correo['nom_correo']; ?></p>
    <?php 
    $i++;
  } ?>

</div>
</div>
    <a class="btn btn-success"  data-toggle="modal" data-target="#ventana2"  id="<?php echo $profesor['cedula'];?>"><span class="icon icon-pencil"></span> Editar</a></td>

</div>


<div class="modal fade color2" id="ventana2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center><h3>Editar Docente</h3></center>
      </div>
      <div class="modal-body">
       <form action="/pgt/index.php/modificar_estudiante" method="post" >
        <div class="form-group">
          <label for="">Cedula Docente</label>
          <input type="text" class="form-control" name="cedula" value="<?php echo $profesor['cedula'];?>"  id="cedula"   />
   
          <input type="hidden" name="cod_persona" class="form-control" value="<?php echo $profesor['cod_persona'];?>" id="cod_estudiante"/>

          <label for="">Nombre Docente</label>
          <input type="text" class="form-control" name="nom_persona"  value="<?php echo $profesor['nom_persona'];?>" id="nom_estudiante"  />

          <label for="">Apellido Docente</label>
                 <input type="text" class="form-control" name="ape_persona"  value="<?php echo $profesor['ape_persona'];?>" id="ape_estudiante"  />
        
          <?php $i=1; foreach ($telefonos as $telefono) { ?>
     <label for="">Telefono <?php  echo $i;?></label>
       <input type="hidden" name="tel[<?php  echo $i;?>]" value="<?php echo $telefono['num_telefono']; ?>">
           <input type="text" class="form-control" name="tel_persona[<?php  echo $i;?>]"  value="<?php echo $telefono['num_telefono']; ?>" id="tel_estudiante"  />
      
      <?php $i++;} ?>

         <?php  $i=1; foreach ($correos as $correo) { ?>
     <label for="">Email <?php  echo $i;?></label>
       <input type="hidden" name="correo[<?php  echo $i;?>]" value="<?php echo $correo['nom_correo']; ?>">
           <input type="text" class="form-control" name="correo_persona[<?php  echo $i;?>]"  value="<?php echo $correo['nom_correo']; ?>" id="correo_estudiante"  />
      
      <?php $i++;} ?>
 <div class="modal-footer">
      <center><button type="submit" class="btn btn-success" id="modificar_estudiante" ><span class="icon icon-checkmark-circle"></span> Actualizar</button>
      
      <button type="submit" class="btn btn-danger" data-dismiss="modal"><span class="icon icon-close"></span> Cerrar</button></center>
   
    </div>
              </div>   
       </form>
  </div>
</div>
</div> 
</div>
<?php $contenido = ob_get_clean(); ?>
<?php include "plantilla_base.php"; ?>