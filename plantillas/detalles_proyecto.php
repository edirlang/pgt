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
		
        <p>Director :  <?php echo  $detalles_proyecto_director['nom_persona']." ".$detalles_proyecto_director['ape_persona'];; ?></p>
        <p>Descargar Proyecto</p>
         <a target="_blank" href="<?php echo  "/pgt/".$proyecto_d['archivo']; ?>"><?php echo $proyecto_d['titulo']; ?> </a>

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
