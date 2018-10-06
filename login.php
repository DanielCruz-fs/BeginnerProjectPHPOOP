<?php 
require_once('class/sesiones.php');

   $sesion = new Sesion();
 
 if (isset($_POST['iniciar'])){

 	$usuario = $_POST['usuario'];
 	$contra = $_POST['contra'];

 	  if (validarusuario($usuario,$contra) == true){
             
             $sesion->set('usuario',$usuario);
             header('Location:index_post.php');
 	  }else{

 	  	     header('Location:login.php');
 	  }

 }

 function validarusuario($usuario,$contra){
          
          $conexion = new mysqli('localhost','root','','examenphpoop');
          $consulta = "SELECT contra FROM usuarios WHERE usuario = '$usuario'";
          $result = $conexion->query($consulta);

          if ($result->num_rows > 0){
                
                $fila = $result->fetch_assoc();
                if (strcmp($contra, $fila['contra'])==0)
                	return true;
                else
                	return false;
          }else
               return false;
 }


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>LOG-IN</title>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <style type="text/css">
      
       .box{
        margin-top: 3px;
       }

      </style>
</head>
<body>
<!--Aqui va tu barra de navegacion -->
  <header>
    <div class="navbar-fixed">
      <nav>
      
        <div class="nav-wrapper  red darken-4">
        <div class="container">   
          <a href="#!" class="brand-logo">CAFT's blog</a>
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
                <li><a href="#"><i class="material-icons right">code</i>Nosotros</a></li>
                <li><a href="#"><i class="material-icons right">supervisor_account</i>Versus</a></li>
                <li><a href="#"><i class="material-icons right">speaker_notes</i>Noticias</a></li>
                <li><a href="#"><i class="material-icons right">assignment_returned</i>Sugerencias</a></li>
          </ul>
        </div>
          <ul class="side-nav" id="mobile-demo">
                <li><a href="#"><i class="material-icons left red-text">code</i>Nosotros</a></li>
                <li><a href="#"><i class="material-icons left blue-text">supervisor_account</i>Versus</a></li>
                <li><a href="#"><i class="material-icons left green-text">speaker_notes</i>Noticias</a></li>
                <li><a href="#"><i class="material-icons left yellow-text">assignment_returned</i>Ideas</a></li>
          </ul>
          

        </div>
      </nav>
    </div>
  </header>
  <!--Aqui va tu slider -->
  <section class="box">
    <div class="fullscreen">
      

          <div class="slider">
              <ul class="slides">
                <li>
                  <img src="img/caft4.jpg"> <!-- random image -->
                  <div class="caption center-align">
                    <h3>El Mejor Colegio!</h3>
                    <h5 class="light grey-text text-lighten-3">Siguenos...</h5>
                  </div>
                </li>
                <li>
                  <img src="img/caft2.jpg"> <!-- random image -->
                  <div class="caption left-align">
                    <h3>Disciplina...</h3>
                    <h5 class="light black-text text-lighten-3">Gallardia...</h5>
                  </div>
                </li>
                <li>
                  <img src="img/caft4.jpg"> <!-- random image -->
                  <div class="caption right-align">
                    <h3>Franz Tamayo</h3>
                    <h5 class="light grey-text text-lighten-3">Imponentes...</h5>
                  </div>
                </li>
                <li>
                  <img src="img/caft5.jpg"> <!-- random image -->
                  <div class="caption center-align">
                    <h3><span class="black-text text-darken-2">Lo Mejor!</span></h3>
                    <h5 class="light grey-text text-lighten-3">Unete....</h5>
                  </div>
                </li>
              </ul>
          </div>
        
      
    </div>
  </section>
  <!--Aqui va todo el contenido -->
  <section>
    <div class="container"> 
      <div class="row">

          
              <div class="col s12 m3 row">
                
                    <form  class="col s12" action="login.php" method="post">
                      <div class="row">
                        <div class="input-field col s12">
                          <i class="material-icons prefix">account_circle</i>
                          <input id="icon_prefix" type="text" name="usuario" class="validate"/>
                          <label for="icon_prefix">Usuario</label>
                        </div>
                        <div class="input-field col s12">
                          <i class="material-icons prefix">remove_red_eye</i>
                          <input id="icon_pass" type="password" name="contra" class="validate"/>
                          <label for="icon_pass">Password</label>
                        </div>
                        <div class="input-field col s12">
                          <input class="btn waves-effect waves-light" type="submit" name="iniciar" value="INICIAR"/>
                        </div>  
                      </div>
                    </form>
                
              </div>
          
          
              <div class="col s12 m9 ">
                <div class="col s12 m4">
                  <div class="card-panel orange lighten-1">
                    <div class="center">
                    <i class="medium material-icons">message</i>
                    <p class="center">Enterate de todas las noticias que estan aconteciendo en tu colegio, actividades, retiros, feriados, 
                    excursiones, desfiles, chismes, pleitos, peleas, etc...</p>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                  <div class="card-panel red lighten-2">
                    <div class="center">
                    <i class="medium material-icons">queue_music</i>
                    <p class="center">Enterate de todas las noticias que estan aconteciendo en tu colegio, actividades, retiros, feriados, 
                    excursiones, desfiles, chismes, pleitos, peleas, etc...</p>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                  <div class="card-panel orange lighten-1">
                    <div class="center">
                    <i class="medium material-icons">hearing</i>
                    <p class="center">Enterate de todas las noticias que estan aconteciendo en tu colegio, actividades, retiros, feriados, 
                    excursiones, desfiles, chismes, pleitos, peleas, etc...</p>
                    </div>
                  </div>
                </div>
              </div>
          

      </div>
    </div>
  </section>
  <!--Boton Android-->
  <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large red">
      <i class="large material-icons">touch_app</i>
    </a>
    <ul>
      <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
      <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
      <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
      <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
    </ul>
  </div>
  <!--Aqui va tu pie de pagina-->
  <footer class="page-footer red darken-4">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">No olvides comentar</h5>
                <p class="grey-text text-lighten-4">Estaremos mejorando el interfaz...</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Siguenos:</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Facebook</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Instagram</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">twitter</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Snapchat</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2016 Copyright Dnl
            <a class="grey-text text-lighten-4 right" href="#!">By DanielcC</a>
            </div>
          </div>
  </footer>
 

<!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
<!--aqui va el jquery para las inicializaciones-->
      <script>
        $( document ).ready(function(){
          $(".button-collapse").sideNav();
          $('.slider').slider({full_width: true});
        })
      </script>
</body>
</html>