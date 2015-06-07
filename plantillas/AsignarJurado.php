<?php ob_start(); ?>

<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
	<form action="/pgt/index.php/AsignarJurado" method="POST" role="form">
		<legend>Agregar Jurado</legend>

		<div class="form-group">
			<label for="">Selecione Proyeto</label>
			<select name="proyecto" id="proyecto" class="form-control">
				<option value="0">--Selecione un proyecto --</option>
				<?php foreach ($proyectos as $proyecto) { ?>
				<option value="<?php echo $proyecto['cod_proyecto'] ?>"><?php echo $proyecto['titulo'] ?></option>	
				<?php } ?>
			</select>
			

			<label>Jurado 1</label>
			<select name="jurado1" id="jurado1" class="form-control">
			</select>	
			<label for="">Jurado 2</label>
			<select name="jurado2" id="jurado2" class="form-control"></select>	

			<label for="">Fecha de Sustentacion</label>
			
			<input type="date" name="fecha" id="input" class="form-control" value="" required="required" pattern="" title="">

		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<button type="submit" class="btn btn-primary">Asignar</button>	
		</div>
		
	</form>
</div>
<script type="text/javascript" src="/pgt/js/jurado.js"></script>
<?php $contenido = ob_get_clean(); ?>
<?php include "plantilla_base.php"; ?>