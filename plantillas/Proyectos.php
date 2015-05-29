<?php ob_start(); ?>
<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
  <div class="panel panel-danger">
    <div class="panel-heading">
      <h3 class="panel-title">Proyecto</h3>
    </div>
    <div>
      <form class="form-horizontal" action="/pgt/index.php/proyecto/consultar_estado" method="post">

        <div class="form-group">
          <div class="col-sm-2">
            <label for="input-id">Buscar por estado:</label>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <select  name="estado" id="input" class="form-control">
              <option value="Aprobado">Aprobados</option>
              <option value="En Proceso">En Curso</option>
              <option value="finalizado">Finalizado</option>
              <option value="rechazado">Rechazado</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary" id="buscar">Buscar</button>
        </div>
         
    </form>


    <form class="form-horizontal" action="/pgt/index.php/proyecto/consultar_an" method="post">

    
         <div class="form-group">
          <div class="col-sm-2">
            <label for="input-id">Buscar por Periodo:</label>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <select  name="an_buscar" id="input" class="form-control">
              <?php foreach ($periodos as $row) { ?>
                <option value="<?php echo $row; ?>"><?php echo $row; ?></option>
              <?php } ?>
            </select>
          </div>

          <button type="submit" class="btn btn-primary" id="buscar_an">Buscar</button>
        </div>
      </div>
    </form>


  </div>





  <div class="panel-body">
    <table id="hola" class="table table-striped table-bordered table-condensed table-hover display color2 " cellspacing="0" width="100%">
      <thead>
       <tr>
        <th>Titulo</th>
        <th>Estudiantes</th>
        <th>Jurados</th>
        <th>Director</th>
        <th></th>

      </tr>
    </thead>
    <tbody id="Filas">
     <?php foreach($proyectos as $row){ ?>
     <tr id='<?php echo $row['cod_proyecto']; ?>'>
       <td><?php echo $row['titulo']; ?></td>
       <td id="1"><?php echo $row['estudiante']; ?></td>
       <td id="2"><?php echo $row['jurado']; ?></td>
       <td id="2"><?php echo $row['director']; ?></td>
       <td>
        <a class="btn btn-success" id="<?php echo $row['cod_proyecto']; ?>" href="/pgt/index.php/detalle_proyecto?id=<?php echo $row['cod_proyecto']; ?> "><span class="glyphicon glyphicon-edit"></span> Detalles   </a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</table>
</div>
</div>
</div>
<?php $contenido = ob_get_clean(); ?>
<?php include "plantilla_base.php"; ?>

