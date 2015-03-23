<?php ob_start(); ?>


  <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
   <div class="panel panel-success">
     <div class="panel-heading">
       <h3 class="panel-title">Nuevo Proyecto</h3>
     </div>
     <div class="panel-body">

      <form id="formulario" name="formulario" role="form" method="post" action="/pgt/index.php/Proyectos/nuevo">
        <div class="form-group">
          <label for="">Codigo</label>
          <input type="text" class="form-control" id="cod_proyecto"  name="cod_proyecto" placeholder="Cedula">
          <label for="">Titulo</label>
          <input type="text" class="form-control" id="titulo"  name="titulo" placeholder="Titulo">
          <label for="">Resumen</label>
          <textarea class="form-control" id="resumen"  name="resumen" placeholder="Resumen"></textarea>
          <label for="">Fecha de Inicio</label>
          <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" placeholder="Fecha Inicio">
          <label for="">Fecha de aprovacion</label>
          <input type="date" class="form-control" id="fechaAprovacion" name="fechaAprovacion" placeholder="Fecha Aprovado">
          <label for="">Estado</label>
          <select class="form-control" id="estado" name="estado">
            <option value="Aprovado">Aprovado</option>
            <option value="Rechazado">Rechazado</option>
            <option value="Aplazado">Aplazado</option>
          </select>
          <label for="">Seleccione Director</label>
          <select class="form-control" id="director" name="director">
            <?php foreach ($profesores as $profesor) { ?>
              <option value="<?php echo $profesor['cedula'] ?>"><?php echo $profesor['nom_profesor']." ".$profesor['ape_profesor'] ; ?></option>    
           <?php } ?>
          </select>
          
          <label for="">Seleccione Programa</label>
          <select class="form-control" id="programa" name="programa">
            <?php foreach ($programas as $programa) { ?>
              <option value="<?php echo $programa['cod_programa'] ?>"><?php echo $programa['nom_programa']; ?></option>    
           <?php } ?>
          </select>
        </div>
        <button id="Enviar" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
      </form>  
    </div>
  </div>
</div> 

<?php $contenido = ob_get_clean(); ?>
<?php include "plantilla_base.php"; ?>