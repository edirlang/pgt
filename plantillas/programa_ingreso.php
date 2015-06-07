<?php ob_start(); ?>

<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
 <div class="panel panel-success">
   <div class="panel-heading">
     <h3 class="panel-title">Nuevo Prograna</h3>
   </div>
   <div class="panel-body">

    <form id="formulario" method="post" action="/pgt/index.php/Programa_guardar">
      <div class="form-group">
        <label>Facultad </label>
        <select name="facultad" id="inputFacultad" class="form-control">
          <?php foreach ($facultades as $key => $facultad) { ?>
            <option value="<?php echo $facultad['cod_facultad']; ?>"><?php echo $facultad['nom_facultad'] ?></option>
          <?php } ?>
        </select>
        <label for="">Codigo Programa</label>
        <input type="text" class="form-control" id="cod_programa"  name="cod_programa" placeholder="Cod_programa">
        <label for="">Nombre Programa</label>
        <input type="text" class="form-control" id="nom_programa"  name="nom_programa" placeholder="Nombre programa">
        <label for="">Numero de Creditos</label>
        <input type="number" class="form-control" id="creditos"  name="creditos" placeholder="Creditos">
        
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