<?php ob_start(); ?>
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
      
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Codigos Registrados</h3>
        </div>
        <div class="panel-body">
          <table class="table table-condensed table-hover ">
            <thead>
              <tr>
                <th>Codigo</th>
                <th>Descripcion</th>
                <th>Tipo</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              foreach ($codigos as $row){
                echo "<tr>";
                echo "<td>".$row['Codigo']."</td>";
                echo "<td>".$row['Descripcion']."</td>";
                echo "<td>".$row['Tipo']."</td>";
                echo "</tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
      <div class="panel panel-warning">
        <div class="panel-heading">
          <h3 class="panel-title">Nuevo Codigo</h3>
        </div>
        <div class="panel-body">
          <form action="Codigos" method="POST" role="form" enctype="multipart/form-data">
            <div class="form-group">
              <label for="">Codigo</label>
              <input type="text" class="form-control" name="Codigo" placeholder="Codigo de Producto">

              <label for="">Descripcion</label>
              <input type="text" class="form-control" name="Nombre" placeholder="Codigo de Producto">

              <label for="">Tipo</label>
              <select class="form-control" name="Tipo" value="activo" id="Tipo">
                <option value="activo">Activos</option>
                <option value="pasivo">Pasivos</option>
                <option value="patrimonio">Patrimonio</option>
                <option value="ingreso">Ingresos</option>
                <option value="gasto">Gastos</option>
                <option value="costo">Costos</option>
              </select>
            </div>

            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Agregar</button>
            </form>
        </div>
      </div>
    </div>
<?php $contenido = ob_get_clean(); ?>
<?php include "plantilla_base.php"; ?>