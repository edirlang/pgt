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

    </div>
    <button id="Enviar" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
  </form>  
</div>
</div>
</div> 
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

    // setup an "add a tag" link
    var $addTagLink = $('<a href="#" class="add_tag_link">Agregar otra linea de investigacion</a>');
    var $newLinkLi = $('<div></div>').append($addTagLink);

    var $addTagLink2 = $('<a href="#" class="add">Agregar Email</a>');
    var $newLinkLi2 = $('<div></div>').append($addTagLink2);

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
          });

</script>
<?php $contenido = ob_get_clean(); ?>
<?php include "plantilla_base.php"; ?>