<?php ob_start(); ?>
<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
  <div class="panel panel-danger">
    <div class="panel-heading">
      <h3 class="panel-title">Programa</h3>
    </div>
    <div class="panel-body">
      <table id="hola" class="table table-striped table-bordered table-condensed table-hover display color2 " cellspacing="0" width="100%">
        <thead>
         <tr>
          <th>Codigo Programa</th>
          <th>Nombre Programa</th>
          <th></th>
          
        </tr>
      </thead>
      <tbody id="Fila">
       <?php foreach($programas as $row){ ?>
       <tr id='<?php echo $row['cod_programa']; ?>'>
        <td id="1"><?php echo $row['cod_programa']; ?></td>
        <td id="2"><?php echo $row['nom_programa']; ?></td>
        <td>  <a class="btn btn-success"  data-toggle="modal" data-target="#ventana"  id="<?php echo $row['cod_programa'];?>"><span class="icon icon-pencil"></span> Editar</a></td>
        <script language="JavaScript" type="text/javascript">
        $("#<?php echo $row['cod_programa']; ?>").click(function(){
          $.post('consultar_programa',{
            id: <?php echo $row['cod_programa']; ?>
          },function(datos){

            datos = $.parseJSON(datos);    
            document.getElementById('cod_programa').value =datos['cod_programa'];
            document.getElementById('nom_programa').value =datos['nom_programa'];
          }
          )
        }
        );
        </script>
      </tr>
      <?php } ?>
    </tbody>
  </table>


  
  <div class="modal fade color2" id="ventana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <center><h3>Editar Programa</h3></center>
        </div>
        <div class="modal-body">
         <form action="modificar_cliente" method="post" >
          <div class="form-group">
            <label for="">Codigo Programa</label>
            <input type="text" name="cod_programa" class="form-control"  id="cod_programa" readonly="readonly"/>

            <label for="">Nombre Programa</label>
            <input type="text" class="form-control" name="nom_programa"  id="nom_programa"  />
          </div>   
        </form>
      </div> 
      <div class="modal-footer">
        <center><button type="submit" class="btn btn-success" id="modificar_programa" data-dismiss="modal"><span class="icon icon-checkmark-circle"></span> Actualizar</button>
          
          <button type="submit" class="btn btn-danger" data-dismiss="modal"><span class="icon icon-close"></span> Cerrar</button></center>
          
        </div>
      </div>
    </div>
  </div> 

</div>
</div>
</div>



<script type="text/javascript" src="/pgt/js/programa.js"></script>
<?php $contenido = ob_get_clean(); ?>
<?php include "plantilla_base.php"; ?>