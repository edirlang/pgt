var x=$(document).ready(main);

function main(){
$("#modificar_estudiante").click(modificar_estudiante);

}
function modificar_estudiante(){
  /*
          $.post('modificar_estudiante',{
               cedula: $("#codula").val(),
               nom_estudiante: $("#nom_estudiante").val(),
               ape_estudiante: $("#ape_estudiante").val(),
               tel_estudiante: $("#tel_estudiante").val(),
               correo_estudiante: $("#correo_estudiante").val(),
              },function(datos){ 
               $("#ape_estudiante").val().text($("#ape_estudiante").val()),  
                   alert("Modificacion Correcta3232");
              })
                       
<div class="modal fade color2" id="ventana2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center><h3>Editar Cliente</h3></center>
      </div>
      <div class="modal-body">
       <form action="editar_estudiante" method="post" >
        <div class="form-group">
          <label for="">Cedula Estudiante</label>
          <input type="text" class="form-control" id="cedula" value="<?php echo $estudiante['cedula'];?>"  id="cedula"   />
          <label for="">Codigo Estudiante</label>
          <input type="text" name="cod_estudiante" class="form-control" value="<?php echo $estudiante['cod_persona'];?>" id="cod_estudiante"/>

          <label for="">Nombre Estudiante</label>
          <input type="text" class="form-control" id="nom_estudiante"  value="<?php echo $estudiante['nom_persona'];?>" id="nom_estudiante"  />

          <label for="">Apellido Estudiante</label>
                 <input type="text" class="form-control"  id="ape_estudiante"  value="<?php echo $estudiante['ape_persona'];?>" id="nom_estudiante"  />

          <?php $i=1; foreach ($telefonos as $telefono) { ?>
     <label for="">Telefono <?php  echo $i;?></label>
           <input type="text" class="form-control" id="tel_estudiante"  value="<?php echo $telefono['num_telefono']; ?>" id="nom_estudiante"  />
      
      <?php $i++;} ?>

         <?php  $i=1; foreach ($correos as $correo) { ?>
     <label for="">Email <?php  echo $i;?></label>
           <input type="text" class="form-control" id="correo_estudiante"  value="<?php echo $correo['nom_correo']; ?>" id="nom_estudiante"  />
      
      <?php $i++;} ?>

              </div>   
      </form>
 </div> 
 <div class="modal-footer">
      <center><button type="submit" class="btn btn-success" id="modificar_estudiante" data-dismiss="modal"><span class="icon icon-checkmark-circle"></span> Actualizar</button>
      
      <button type="submit" class="btn btn-danger" data-dismiss="modal"><span class="icon icon-close"></span> Cerrar</button></center>
   
    </div>
  </div>
</div>
</div> 

<script type="text/javascript" src="/pgt/js/clientes.js"></script>
<?php $contenido = ob_get_clean(); ?>
<?php include "plantilla_base.php"; ?>
*/
}
