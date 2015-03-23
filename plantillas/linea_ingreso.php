<?php ob_start(); ?>

<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
 <div class="panel panel-success">
   <div class="panel-heading">
     <h3 class="panel-title">Nueva Linea de Investigacion</h3>
   </div>
   <div class="panel-body">

    <form id="formulario" method="post" action="/pgt/index.php/linea_guardar">
      <div class="form-group">
        <label for="">Codigo Linea</label>
        <input type="text" class="form-control" id="cod_programa"  name="cod_linea" placeholder="Cod_programa">
        <label for="">Nombre Linea</label>
        <input type="text" class="form-control" id="nom_programa"  name="nom_linea" placeholder="Nombre programa">
        <label for="">Programa</label>
        <select class="form-control" id="programa" name="programa">
          <?php foreach ($programas as $programa) { ?>
          <option value="<?php echo $programa['cod_programa'] ?>"><?php echo $programa['nom_programa'] ?></option>
          <?php } ?>
        </select>
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