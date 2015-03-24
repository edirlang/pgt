<?php ob_start(); ?>
<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
  <div class="panel panel-danger">
    <div class="panel-heading">
      <h3 class="panel-title">Lineas</h3>
    </div>
    <div class="panel-body">
      <table id="hola" class="table table-striped table-bordered table-condensed table-hover display color2 " cellspacing="0" width="100%">
        <thead>
         <tr>
          <th>Codigo Linea</th>
          <th>Nombre Linea</th>
          <th>Programa</th>
          <th></th>
         <th></th> 
        </tr>
      </thead>
      <tbody id="Filas">
       <?php foreach( $lineas as $row){ ?>
       <tr id='<?php echo $row['cod_linea']; ?>'>
         <td><?php echo $row['cod_linea']; ?></td>
         <td id="1"><?php echo $row['nom_linea']; ?></td>
         <td id="2"><?php 
         $programa = consultar_tabla($row['cod_programa'],"programa","cod_programa");
         echo $programa['cod_programa'].". ".$programa['nom_programa']; ?></td>
         <td>
          <a class="btn btn-success" data-toggle="modal" data-target="#ventana" id="<?php echo $row['cod_linea']; ?>"><span class="glyphicon glyphicon-edit"></span>Editar</a>
          <script type="text/javascript">
               $("#<?php echo $row['cod_linea']; ?>").click(function(){
             $.post('consultar_linea',{
               id:<?php echo $row['cod_linea']; ?>
             },function(datos){
                  datos=$.parseJSON(datos);  
                  document.getElementById('cod_linea').value =datos['cod_linea'];
                  document.getElementById('nom_linea').value =datos['nom_linea'];
                  
                  document.getElementById('cod_programa').value =datos['cod_programa'];
                })
              });

          </script>  
        </td>
           <td>
         <a class="btn btn-primary" id="<?php echo $row['cod_linea']; ?>" href="/pgt/index.php/eliminar_linea?id=<?php echo $row['cod_linea']; ?> "><span class="glyphicon glyphicon-remove"></span></a>
          </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  </table>
</div>
</div>


 
<div class="modal fade color2" id="ventana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center><h3>Editar Linea</h3></center>
      </div>
      <div class="modal-body">
       <form action="modificar_cliente" method="post" >
        <div class="form-group">
          <label for="">Codigo Linea</label>
          <input type="text" name="cod_linea" class="form-control"  id="cod_linea" readonly="readonly"/>

          <label for="">Nombre Linea</label>
          <input type="text" class="form-control" name="nom_linea"  id="nom_linea"  />
          
           <label for="">Programa</label>
          <input type="text" class="form-control" name="cod_programa"  id="cod_programa"  />
              </div>   
      </form>
 </div> 
 <div class="modal-footer">
      <center><button type="submit" class="btn btn-success" id="modificar_linea" data-dismiss="modal"><span class="icon icon-checkmark-circle"></span> Actualizar</button>
      
      <button type="submit" class="btn btn-danger" data-dismiss="modal"><span class="icon icon-close"></span> Cerrar</button></center>
   
    </div>
  </div>
</div>
</div> 




</div>
<script type="text/javascript" src="/pgt/js/lineas.js"></script>
<?php $contenido = ob_get_clean(); ?>
<?php 

if (isset($_SESSION['usuario'])) {
  include "plantilla_base.php";  
}else{
  include "plantilla_base.php"; 
}
 ?>

 ?>
