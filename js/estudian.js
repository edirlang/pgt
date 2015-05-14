
      var $collectionHolder3;
      var $collectionHolder2;

    // setup an "add a tag" link
    var $addTagLink3 = $('<a href="#" class="add3">Agregar Telefono</a>');
    var $newLinkLi3 = $('<div></div>').append($addTagLink3);

    var $addTagLink2 = $('<a href="#" class="add">Agregar Email</a>');
    var $newLinkLi2 = $('<div></div>').append($addTagLink2);

    jQuery(document).ready(function() {
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
    