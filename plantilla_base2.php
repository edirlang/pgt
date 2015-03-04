<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Unicundi</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <script type="text/javascript" src="/Smart-Solutions/engine1/jquery.js"></script>
  <link rel="stylesheet" href="/Smart-Solutions/css/bootstrap.css">
</head>

<body>
  
    <nav class="navbar navbar-default" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">PGP</a>
      </div>
    
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="">Estudiantes</a></li>
          <li><a href="">Proyectos</a></li>
          <li><a href="#">Consultas</a></li>
        </ul>
        
      </div><!-- /.navbar-collapse -->
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
          <?php echo $contenido; ?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
          <div class="panel panel-success">
          <div class="panel-heading">
            <h3 class="panel-title">Login</h3>
          </div>
          <div class="panel-body">
            <form action="login" method="POST" role="form">
              <div class="form-group">
                <label for="">Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario">

                <label>Contraseña</label>
                <input type="password" name="contrasena" id="input" class="form-control" required="required" title="">
              </div>
              <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
            </form>
          </div>
        </div>
        </div>
      </div>  
    </div>

    <script language="javascript" type="text/javascript" src="/Smart-Solutions/js/jquery.js"></script>
    <script language="javascript" type="text/javascript" src="/Smart-Solutions/js/jquery.validate.js"></script>
    <script src="/Smart-Solutions/js/bootstrap.min.js"></script>
    <script src="/Smart-Solutions/js/jquery-ui.js"></script>
  </body>   
  </html>