<?php ob_start(); ?>

<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
	<form action="/pgt/index.php/AgregarJurado" method="POST" role="form">
		<legend>Agregar Jurado</legend>
	
		<div class="form-group">
			<label for="">Selecione Proyeto</label>
			<select name="proyecto" id="proyecto" class="form-control">
				<option value="0">--Selecione un proyecto --</option>
				<?php foreach ($proyectos as $proyecto) { ?>
					<option value="<?php echo $proyecto['cod_proyecto'] ?>"><?php echo $proyecto['titulo'] ?></option>	
				<?php } ?>
			</select>
		</div>
	
		<label for="" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">Jurado 1</label>
		<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
			<select name="jurado1" id="jurado1" class="form-control">
			</select>	
		</div>
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Calificacion </div>
			
		<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
			<select name="calificacion1" id="" class="form-control">
				<option value="Aprovado">Aprovado</option>
				<option value="Rechazado">Rechazado</option>
			</select>
		</div>

		<label for="" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">Jurado 2</label>
		<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
			<select name="jurado2" id="jurado2" class="form-control"></select>	
		</div>
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Calificacion </div>
			
		<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
			<select name="calificacion2" id="" class="form-control">
				<option value="Aprovado">Aprovado</option>
				<option value="Rechazado">Rechazado</option>
			</select>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<button type="submit" class="btn btn-primary">Calificar</button>	
		</div>
		
	</form>
</div>
<script type="text/javascript" src="/pgt/js/jurado.js"></script>
<?php $contenido = ob_get_clean(); ?>
<?php include "plantilla_base.php"; ?>