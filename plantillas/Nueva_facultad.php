<?php ob_start(); ?>

<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
 <div class="panel panel-success">
   <div class="panel-heading">
     <h3 class="panel-title">Nueva Facultad</h3>
   </div>
   <div class="panel-body">

    <form id="formulario" method="post" action="/pgt/index.php/facultad/nuevo">
      <div class="form-group">
        <label for="">Codigo Facultad</label>
        <input type="text" class="form-control" id="cod_facultad"  name="cod_facultad" placeholder="Cod_facultad">
        <label for="">Nombre Facultad</label>
        <input type="text" class="form-control" id="nom_facultad"  name="nom_facultad" placeholder="Nombre de facultad">
        
      </div>
      <button id="Enviar" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
    </form>  
  </div>
</div>
</div> 

</div>
</div>
<script type="text/javascript" src="/pgt/js/usuario.js"></script>
<?php $contenido = ob_get_clean(); ?>
<?php include "plantilla_base.php"; ?>