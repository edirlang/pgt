<?php ob_start(); ?>

<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
	<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Detalle Proyecto</h3>
	</div>
	<div class="panel-body">
		<p>Codigo: <?php echo $proyecto_d['cod_proyecto']?></p>
		<p>Titulo: <?php echo $proyecto_d['titulo']; ?></p>
			  <div class="thumbnail">
			      <div class="caption">
			           <h3>Resumen:</h3>
			          <p> <?php echo $proyecto_d['resumen']; ?></p>
			      </div>
	         </div>

		<p>Estado: <?php echo $proyecto_d['estado']; ?></p>
		<p>Fecha Inicio: <?php echo $proyecto_d['fecha_inicio']; ?></p>
		<p>Fecha Aprobacion: <?php echo $proyecto_d['fecha_aprovacion']; ?></p>
		<p>Programa:  <?php echo  $programa_d['nom_programa']; ?></p>
		<p>Linea:  <?php echo  $linea_d['nom_linea']; ?></p>
               <?php 

         $i=1; foreach ($proyecto_d_jurado as $value) {?>
    		 <p>Jurado <?php echo $i.': '.$value['nom_persona'].$value['ape_persona']; ?></p>
		<?php	$i++;}
         ?>
	
        <p>Director :  <?php echo  $detalles_proyecto_director['nom_persona']." ".$detalles_proyecto_director['ape_persona'];; ?></p>
        <p>Descargar Proyecto</p>
         <a target="_blank" href="<?php echo  "/pgt/".$proyecto_d['archivo']; ?>"><?php echo $proyecto_d['titulo']; ?> </a>
         <br>
    <a class="btn btn-success"  data-toggle="modal" data-target="#ventana2"  id="<?php echo $proyecto_d['cod_proyecto'];?>"><span class="icon icon-pencil"></span> Editar</a></td>

</div>

</div>

<div class="modal fade color2" id="ventana2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center><h3>Editar Proyecto</h3></center>
      </div>
      <div class="modal-body">
       <form action="/pgt/index.php/modificar_proyecto" method="post" enctype="multipart/form-data" >
        <div class="form-group">
          <label for="">Titulo</label>
          <input type="hidden" class="form-control" name="cod_proyecto" value="<?php echo $proyecto_d['cod_proyecto'];?>"  id="cedula"   />
          <input type="text" class="form-control" name="titulo" value="<?php echo $proyecto_d['titulo'];?>"  id="cedula"   />
          <label for="">Resumen</label>
          <textarea name="resumen" id="inputResumen" class="form-control" rows="3" required="required"><?php echo $proyecto_d['resumen'];?></textarea>
          
          
<?php /*
          <label for="">Director</label>
          <input type="text" name="director_viejo" class="form-control" value="<?php  echo $detalles_proyecto_director['nom_persona'].' '.$detalles_proyecto_director['ape_persona'];?>" id="" READONLY/>
          <input type="hidden" name="director_c" class="form-control" value="<?php  echo $detalles_proyecto_director['cedula'];?>" id="" />
          <label for="">Cambiar Director</label>
              <select class="form-control" id="director" name="director">
          <?php foreach ($profesores_n as $profesor) { ?>
          <option value="<?php echo $profesor['cedula'] ?>"><?php echo $profesor['nom_persona']." ".$profesor['ape_persona'] ; ?></option>    
          <?php } ?>
        </select>
         
*/ ?>
          <label for="">Archivo Proyecto</label>
              <input type="text" name="archivo_v" class="form-control" value="<?php echo $proyecto_d['archivo'];?>" id="" READONLY/>
          <label for="">Cambiar Archivo Proyecto</label>
          <input type="file" class="form-control" id="archivo" name="archivo" >

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
<?php 


if (isset($_SESSION['usuario'])) {
  include "plantilla_base.php";  
}else{
  include "plantilla_base.php"; 
}
 ?>
