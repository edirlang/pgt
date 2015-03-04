<?php ob_start(); ?>
<div class="container-fluid">
	<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-success">
                <div class="panel-body">
                   
                </div>
            </div>
        </div>
		<?php foreach ($productos as $producto) { ?>
			<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
    			<div class='panel panel-success'>
    		 		<div class='panel-heading'>
    					<h4><?php echo $producto['Nombre']; ?></h4>
    		  		</div>

    		  		<div class='panel-body'>
    		  			<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>
                            <p><b>Codigo:</b><?php echo $producto['Codigo']; ?></p>
                            <p><b>Precio:</b> <?php echo $producto['ValorVenta']; ?></p>
                            <h4>Descripcion: </h4> <p align='justify'><?php echo $producto['Descripcion']; ?></p>
                            <h4>Especificaciones: </h4> <p align='justify'><?php echo $producto['Especificaciones']; ?></p>
                        </div>
                        <div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>
                            <img class='img-rounded img-responsive' alt='2' src='/Smart-Solutions/Imagenes/<?php echo $producto['Codigo']; ?>.png'/>
                        </div>
                    </div>
    			</div>
     		</div>
		<?php } ?>
	</div>
</div>
<?php $contenido = ob_get_clean(); ?>
<?php include "plantilla_base.php"; ?>