<?php ob_start(); ?>
<div class="panel-body">

  <form id="formulario" name="formulario" role="form" method="post" action="crear_usuario">
   <div class="form-group">
      <label for="">Cedula</label>
      <input type="text" class="form-control" id="Cedula"  name="Cedula" placeholder="Cedula">
      <label for="">Nombre</label>
      <input type="text" class="form-control" id="Nombre"  name="Nombre" placeholder="primer nombre">
      <label for="">Apellido</label>
      <input type="text" class="form-control" id="Apellido" name="Apellido" placeholder="primer apellido">
      <label for="">Telefono</label>
      <input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="telefono">
      <label for="">Cargo</label>
      <select  class="form-control" id="rol" name="rol">
        <option value="admin">Administrador</option>
        <option value="contador">Auxiliar Contables</option>
        <option value="cajero">Cajero</option>
      </select>
      <label for="">Contraseña</label>
      <input type="password" class="form-control" id="Contrasena" name="Contrasena">
    </div>
    <button id="Enviar"  class="btn btn-primary">Guardar</button>
  </form>
    
</div>
<?php $contenido = ob_get_clean(); ?>
<?php include "plantilla_base.php"; ?>