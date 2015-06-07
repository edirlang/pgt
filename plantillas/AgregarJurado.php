<?php ob_start(); ?>

<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
	<form action="/pgt/index.php/CalificarJurado" method="POST" role="form">
		<legend>Agregar Jurado</legend>
	
		<div class="form-group">
			<label for="">Proyeto</label>
			<input type="text" name="proyecto" id="input" class="form-control" value="<?php echo $_GET['id']; ?>" readonly>
		
	
		<label for="">Jurado 1</label>
		<input type="text" name="jurado1" id="inputJurado1" class="form-control" value="<?php echo $jurados[0]['cedula'].'.'.$jurados[0]['nom_persona']." ".$jurados[0]['ape_persona']; ?>" readonly>
		
		<label for="">Calificacion</label>
			<select name="calificacion1" id="" class="form-control">
				<option value="Aprobado">Aprobado</option>
				<option value="Rechazado">Rechazado</option>
			</select>
		
		<label for="">Jurado 2</label>
		<input type="text" name="jurado2" id="inputJurado1" class="form-control" value="<?php echo $jurados[1]['cedula'].'.'.$jurados[1]['nom_persona']." ".$jurados[1]['ape_persona']; ?>" readonly>
		
		<label for="">Calificacion</label>
			<select name="calificacion2" id="" class="form-control">
				<option value="Aprobado">Aprobado</option>
				<option value="Rechazado">Rechazado</option>
			</select>
		</div>
			<button type="submit" class="btn btn-primary">Calificar</button>	
		
		
	</form>
</div>
<script type="text/javascript" src="/pgt/js/jurado.js"></script>
<?php $contenido = ob_get_clean(); ?>
<?php include "plantilla_base.php"; ?>