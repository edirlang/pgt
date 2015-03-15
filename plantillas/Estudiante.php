<?php ob_start(); ?>
<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
	<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Estudiante</h3>
	</div>
	<div class="panel-body">
		<p>Nombre: <?php echo $estudiante['nom_estudiante']." ".$estudiante['ape_estudiante'] ?></p>
		<p>Codigo: <?php echo $estudiante['cod_estudiante']; ?></p>
		<p>Cedula: <?php echo $estudiante['cedula']; ?></p>
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
</div>
<?php $contenido = ob_get_clean(); ?>
<?php include "plantilla_base.php"; ?>