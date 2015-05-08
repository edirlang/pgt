<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>UDEC</title>
  <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
  <link href="/pgt/css/bootstrap.css" rel="stylesheet" />
  <link href="/pgt/assets/css/font-awesome.css" rel="stylesheet" />
  <link href="/pgt/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
  <link href="/pgt/css/main.css" rel="stylesheet" />
  <link href="/pgt/css/font.css" rel="stylesheet" />
  <link href="/pgt/css/estilos.css" rel="stylesheet" />
  <link rel="stylesheet" href="/pgt/css/jquery.dataTables.css">

  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  <link href="/pgt/assets/css/custom.css" rel="stylesheet" />

  <script type="text/javascript" src="/pgt/js/jquery-1.11.1.min.js"></script>
</head>

<body>
  <header >
    <div id="wrapper response">
      <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="perfil">Proyecto y Pasantias</a> 
        </div>
        <div style="color: white;
        padding: 15px 50px 5px 50px;
        float: right;
        font-size: 16px;"><?php date_default_timezone_set('America/Bogota'); echo "Fecha :".strftime("%Y-%m-%d"); echo "   "."Hora :".date("H:i:s"); ?> <a href="salir" class="btn btn-danger square-btn-adjust">Logout</a> </div>
      </nav>  
    </div> 
    <!-- /. NAV TOP  -->
  <div id="h2">                                
    <nav class="  navbar-default navbar-side" role="navigation" >
      <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
          <li class="text-center">
            <img src="/pgt/assets/img/find_user.png" class="user-image img-responsive"/>
          </li>

          <li>
            <a href="#" class="active-menu"><i class="fa fa-qrcode"></i>Docentes<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li>
                <a href="/pgt/index.php/Profesores">Listado de Docentes</a>
              </li>
              <li>
                <a href="/pgt/index.php/Profesor/nuevo">Nuevo Docente</a>
              </li>
           
            </ul>
          </li>
          
          <li>
            <a href="/pgt/index.php/Proyectos"><i class="fa fa-user"></i>Proyectos<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li>
                <a href="/pgt/index.php/Proyectos">Listado</a>
              </li>
              <li>
                <a href="/pgt/index.php/Proyectos/nuevo">Nuevo Proyecto</a>
              </li>
              <li>
                <a href="/pgt/index.php/AgregarJurado">Calificar proyecto</a>
              </li>

            </ul>
          </li>

          <li>
            <a href="#" ><i class="fa fa-qrcode"></i>Estudiantes<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li>
                <a href="/pgt/index.php/Estudiantes">Listado de Estudiantes</a>
              </li>
              <li>
                <a href="/pgt/index.php/Estudiante/nuevo">Nuevo Estudiante</a>
              </li>

            </ul>
          </li>
           <li>
            <a href="#" ><i class="fa fa-qrcode"></i>Programa<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li>
                <a href="/pgt/index.php/programa">Listado de Programa</a>
              </li>
              <li>
                <a href="/pgt/index.php/programa_ingreso">Ingresar Programa</a>
              </li>

            </ul>
          </li>

          <li>
            <a href="#" ><i class="fa fa-qrcode"></i>Lineas de Investigacion<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li>
                <a href="/pgt/index.php/Lineas">Listado de lineas</a>
              </li>
              <li>
                <a href="/pgt/index.php/linea_ingresar">Nueva Linea</a>
              </li>

            </ul>
          </li>
        </ul>

      </div>
    </nav>  
    </div> 
  </header> 
  <div id="page-wrapper" >
    <div id="page-inner">
      <div class="container">
        <div class="row">
          <?php echo $contenido; ?>
        </div>  
      </div>
    </div>
  </div>

  <script src="/pgt/js/bootstrap.min.js"></script>
  <script src="/pgt/js/bootstrap-modal.js"></script> 
  <script type="text/javascript" src="/pgt/js/dataTables.min.js"></script>
  <script type="text/javascript" src="/pgt/js/dataTables.bootstrap.js"></script>
  <script src="/pgt/assets/js/jquery.metisMenu.js"></script>
  <script src="/pgt/assets/js/morris/morris.js"></script>
  <script src="/pgt/assets/js/custom.js"></script>
</body>   
</html>