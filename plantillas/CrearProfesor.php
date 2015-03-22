<?php ob_start(); ?>
<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
   <div class="panel panel-success">
     <div class="panel-heading">
       <h3 class="panel-title">Nuevo Profesor</h3>
     </div>
     <div class="panel-body">

      <form id="formulario" name="formulario" role="form" method="post" action="/pgt/index.php/Profesor/nuevo">
        <div class="form-group">
          <label for="">Cedula</label>
          <input type="text" class="form-control" id="cedula"  name="cedula" placeholder="Cedula">
          <label for="">Cargo</label>
          <input type="text" class="form-control" id="cargo"  name="cargo" placeholder="Cargo">
          <label for="">Nombre</label>
          <input type="text" class="form-control" id="nombre"  name="nombre" placeholder="Nombre">
          <label for="">Apellido</label>
          <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Aoellido">
          <label for="">Telefono 1</label>
          <input type="number" class="form-control" id="Telefono[1]" name="Telefono[1]">

          <div class="tags" data-prototype="<label>Telefono __name__</label>
          <input type='number' class='form-control' id='Telefono[__name__]' name='Telefono[__name__]'>">
        </div>
        
        <label for="">Email 1</label>
        <input type="email" class="form-control" id="Email[1]" name="Email[1]">

        <div class="tags2" data-prototype="<label>Email __name__</label>
          <input type='email' class='form-control' id='Email[__name__]' name='Email[__name__]'>">
        </div>

      </div>
      <button id="Enviar" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
    </form>  
  </div>
</div>
</div> 

</div>
<script>
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
    var $addTagLink = $('<a href="#" class="add_tag_link">Agregar Telefono</a>');
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