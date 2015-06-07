<?php ob_start(); ?>


<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
 <div class="panel panel-success">
   <div class="panel-heading">
     <h3 class="panel-title">Nuevo Proyecto</h3>
   </div>
   <div class="panel-body">

    <form id="formulario" name="formulario" role="form" method="post" action="/pgt/index.php/Proyectos/nuevo" enctype="multipart/form-data">
      <div class="form-group">
        <label for="">Titulo</label>
        <input type="text" class="form-control" id="titulo"  name="titulo" placeholder="Titulo">
        <label for="">Resumen</label>
        <textarea class="form-control" id="resumen"  name="resumen" placeholder="Resumen"></textarea>
        <label for="">Fecha de Inicio</label>
        <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" placeholder="Fecha Inicio">
        <label for="">Seleccione Director</label>
        <select class="form-control" id="director" name="director">
          <?php foreach ($profesores as $profesor) { ?>
          <option value="<?php echo $profesor['cedula'] ?>"><?php echo $profesor['nom_persona']." ".$profesor['ape_persona'] ; ?></option>    
          <?php } ?>
        </select>

        <label for="">Estudidantes</label>
        <select name="estidantes" id="estudiantes" class="form-control">
          <?php foreach ($estudiantes as $estudiante) { ?>
          <option value="<?php echo $estudiante['cedula'] ?>"><?php echo $estudiante['nom_persona']." ".$estudiante['ape_persona'] ; ?></option>    
          <?php } ?>
        </select>
        <button type="button" class="btn btn-xs btn-success" id="agregar">Agregar Estudiante</button>
        <a class="btn btn-xs btn-info" data-toggle="modal" href='#nuevo'>Nuevo Estudiante</a>
        
        <div id="estudiante">

        </div>

        <label for="">Seleccione lineas de investigacion</label>
        <select class="form-control" id="programa[1]" name="programa[1]">
          <?php foreach ($programas as $programa) { 
            $lineas = consultar_tabla2("linea","cod_programa",$programa['cod_programa']);
            foreach ($lineas as $linea) { ?>
            <option value="<?php echo $programa['cod_programa'].'.'.$linea['cod_linea']; ?>"><?php echo $programa['nom_programa']." - ".$linea['nom_linea']; ?></option>    
            <?php }
          } ?>
        </select>
        <div class="tags" data-prototype="
        <select class='form-control' id='programa[__name__]' name='programa[__name__]'>
          <?php foreach ($programas as $programa) { 
            $lineas = consultar_tabla2("linea","cod_programa",$programa['cod_programa']);
            foreach ($lineas as $linea) { ?>
            <option value='<?php echo $programa['cod_programa'].'.'.$linea['cod_linea']; ?>'><?php echo $programa['nom_programa']." - ".$linea['nom_linea']; ?></option>    
            <?php }
          } ?>
        </select>
        ">
      </div>
      <label for="">Archivo Proyecto</label>
      <input type="file" class="form-control" id="archivo" name="archivo" >
    </div>
    <button id="Enviar" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
  </form>  
</div>
</div>
</div> 

<div class="modal fade" id="nuevo">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Nuevo Estudiante</h4>
      </div>
      <div class="modal-body">
        <form id="formulario">
          <div class="form-group">
            <label for="">Codigo</label>
            <input type="text" class="form-control" id="Codigo"  name="Codigo" placeholder="Cedula">
            <label for="">Cedula</label>
            <input type="text" class="form-control" id="Cedula"  name="Cedula" placeholder="Cedula">
            <label for="">Nombre</label>
            <input type="text" class="form-control" id="Nombre"  name="Nombre" placeholder="Nombre">
            <label for="">Apellido</label>
            <input type="text" class="form-control" id="Apellido" name="Apellido" placeholder="Apellido">
            <label for="">Telefono 1</label>
            <input type="number" class="form-control" id="Telefono[1]" name="Telefono[1]">

            <div class="tags3" data-prototype="<label>Telefono __name__</label>
              <input type='number' class='form-control' id='Telefono[__name__]' name='Telefono[__name__]'>">
            </div>

            <label for="">Email 1</label>
            <input type="email" class="form-control" id="Email[1]" name="Email[1]">

            <div class="tags2" data-prototype="<label>Email __name__</label>
              <input type='email' class='form-control' id='Email[__name__]' name='Email[__name__]'>">
            </div>

            <label for="">Creditos</label>
            <input type="text" class="form-control" id="creditos" name="creditos">
            <label for="">Programa</label>
            <select class="form-control" id="programa" name="programa">
              <?php foreach ($programas as $programa) { ?>
              <option value="<?php echo $programa['cod_programa'] ?>"><?php echo $programa['nom_programa'] ?></option>
              <?php } ?>
            </select>
          </div>
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button id="crear_estuciante" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript" src="/pgt/js/lineas.js"></script>
<script type="text/javascript">
function addTagForm($collectionHolder, $newLinkLi) {
        // Get the data-prototype explained earlier
        var prototype = $collectionHolder.data('prototype');

        // get the new index
        var index = $collectionHolder.data('index');
        if(index == 0){
          index=2;
        }

        // Replace '__name__' in the prototype's HTML to
        // instead be a number based on how many items we have
        var newForm = prototype.replace(/__name__/g, index);

        // increase the index with one for the next item
        $collectionHolder.data('index', index + 1);

        // Display the form in the page in an li, before the "Add a tag" link li
        var $newFormLi = $('<div></div>').append(newForm);
        $newLinkLi.before($newFormLi);
      }

      var $collectionHolder;
      var $collectionHolder2;
      var $collectionHolder3;

    // setup an "add a tag" link
    var $addTagLink = $('<a href="#" class="add_tag_link">Agregar otra linea de investigacion</a>');
    var $newLinkLi = $('<div></div>').append($addTagLink);

    var $addTagLink2 = $('<a href="#" class="add">Agregar Email</a>');
    var $newLinkLi2 = $('<div></div>').append($addTagLink2);

    var $addTagLink3 = $('<a href="#" class="add3">Agregar Telefono</a>');
    var $newLinkLi3 = $('<div></div>').append($addTagLink3);

    jQuery(document).ready(function() {
        // Get the ul that holds the collection of tags
        $collectionHolder = $('div.tags');

            // add the "add a tag" anchor and li to the tags ul
            $collectionHolder.append($newLinkLi);

            // count the current form inputs we have (e.g. 2), use that as the new
            // index when inserting a new item (e.g. 2)
            $collectionHolder.data('index', $collectionHolder.find(':input').length);

            $addTagLink.on('click', function(e) {
              e.preventDefault();

            // add a new tag form (see next code block)
            addTagForm($collectionHolder, $newLinkLi);
          });

        // Get the ul that holds the collection of tags
        $collectionHolder2 = $('div.tags2');

            // add the "add a tag" anchor and li to the tags ul
            $collectionHolder2.append($newLinkLi2);

            // count the current form inputs we have (e.g. 2), use that as the new
            // index when inserting a new item (e.g. 2)
            $collectionHolder2.data('index', $collectionHolder2.find(':input').length);
            
            $addTagLink2.on('click', function(e) {

            // prevent the link from creating a "#" on the URL
            e.preventDefault();

            // add a new tag form (see next code block)
            addTagForm($collectionHolder2, $newLinkLi2);
          });

            // Get the ul that holds the collection of tags
            $collectionHolder3 = $('div.tags3');

            // add the "add a tag" anchor and li to the tags ul
            $collectionHolder3.append($newLinkLi3);

            // count the current form inputs we have (e.g. 2), use that as the new
            // index when inserting a new item (e.g. 2)
            $collectionHolder3.data('index', $collectionHolder3.find(':input').length);

        $addTagLink3.on('click', function(e) {
            e.preventDefault();

            // add a new tag form (see next code block)
            addTagForm($collectionHolder3, $newLinkLi3);
          });

          });

</script>
<script type="text/javascript" src="/pgt/js/proyecto.js"></script>
<?php $contenido = ob_get_clean(); ?>
<?php include "plantilla_base.php"; ?>