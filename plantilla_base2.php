<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>UNICUNDI</title>
  <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
  <link rel="stylesheet" href="/pgt/css/bootstrap.css">
  <link rel="stylesheet" href="/pgt/css/estilos.css">
  <link rel="stylesheet" href="/pgt/css/font.css">
  <link rel="stylesheet" href="/pgt/css/estil.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
 <header >
  <div class="tabbable">
   <nav id="header" class="navbar navbar-default navbar-fixed-top" role="navigation"><span id="raya"></span>
    <div  class="container">

      <div id="menu-header" class="navbar-header">
        <button type="button"  class="navbar-toggle collapsed margen" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon icon-list2" ></span>
        </button>
        <a class="navbar-brand margen_mithir" href="/pgt/index.php/Proyectos" >Proyectos de Grado</a>
      </div>
      
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul id="menu-body" class="nav navbar-nav navbar-right">
          <li class="active"><a href="inicio">Inicio<span class="sr-only">(current)</span></a></li>
          <li><a href="Aboutus">Acerca de</a></li>
          <li><a href="contacto">Contacto</a></li>

          <li><a href="/pgt/index.php/login">Sign in</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </div>
</nav>
</header> 
<section>
  <div class="container">
    <div class="row">

    </div>
  </div>
</section>
<div id="social-bar">
  <ul>
    <li><a href="https://www.facebook.com/pages/UNIVERSIDAD-DE-CUNDINAMARCA/442228652502115" target="_blank"  class="icon-facebook"><span></span></a></li>
    <li><a href="https://twitter.com/Ucundinamarca" target="_blank"  class="icon-twitter"><span></span></a></li>
    <li><a href="https://plus.google.com/u/0/photos/101990631920094915928/albums" target="_blank"  class="icon-googleplus"><span></span></a></li>
    <li><a href="#" target="_blank"  class="icon-instagram"><span></span></a></li>
    <li><a href="#"  target="_blank" class="icon-pinterest"><span></span></a></li>
  </ul>
</div>


<article  color="Black">
  <section id="container">
    <div class="row">
      <?php echo $contenido; ?>
    </div>
  </section>
</article>

<footer class="panel-footer color1"> 

  <div class="container text-left">
    <div class="row"> 
      <h4>Universidad de Cundinamarca</h4>
      <hr>
      <div class="col-xs-12 col-sm-6 col-md-6">
        <h4 class="text-left">FOLLOW ME</h4>
        <a href="http://www.youtube.com/"class="btn btn-circle btn-circle-facebook "><i class="icon icon-facebook "></i></a>
        <a class="btn btn-circle btn-circle-twitter"><i class="icon icon-twitter"></i></a>
        <a class="btn btn-circle btn-circle-googleplus"><i class="icon icon-googleplus"></i></a> 
        <a class="btn btn-circle btn-circle-pinterest"><i class="icon icon-pinterest"></i></a> 
        <p class="color1">Copyright &copy 2014 pgt</p>
      </div>      
      <div class="col-xs-12 col-sm-6 col-md-6">
        <a href="">About us</a> |
        <a href="">Contacto</a>|
        <a href="">Noticias</a>|
        <a href="">Ayuda</a>
      </div>  
    </div>
  </div>

</footer>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="/pgt/js/jquery.slides.js"></script>  
<script type="text/javascript" src="/pgt/js/bootstrap.min.js"></script>

</body>
</html>