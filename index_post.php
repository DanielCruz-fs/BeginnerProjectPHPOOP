<?php 
   require_once('class/sesiones.php');

   $sesion = new Sesion();
   $usuario = $sesion->get('usuario');
   if ($usuario == false){

         header('Location: login.php');

   }else{

?>
<?php
   require_once 'class/posts.php';
   $obj = new Posts();
   $datos = $obj->all();
?>
<!DOCTYPE html>
<html lang='es'>
   <head>
      <title>Posts</title>
      <meta charset='UTF-8'>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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

	   <?php if(sizeof($datos)>0): ?>
        

      <?php foreach($datos as $row): ?>
        <?php 
          
          echo '<h2>';
          echo $row['titulo'].'/'.$row['subtitulo'];
          echo '</h2>';
          echo '<h4>';
          echo $row['categoria'].'/'.$row['fecha'];
          echo '</h4>';

          echo '<p>';
          echo $row['cuerpo'];
          echo '</p>';

          echo '<a href="index_comentarios.php?id='.$row['idpost'].'">Comentarios</a>';
          echo '<a href="edit_post.php?id='.$row['idpost'].'">Editar</a>';
          echo '<a href="delete_post.php?id='.$row['idpost'].'">Eliminar</a>';

          echo '<hr/>';

         $idusuario = $row['idusuario'];
        

         ?>
      <?php endforeach; ?>
         <?php echo '<a href="add_post.php?id='.$idusuario.'">Agregar Post</a>'; ?>
         <?php echo '<a href="index_cat.php">Categorias</a>'; ?>
         <?php echo '<a href="cerrarsesion.php">Log Out</a>'; ?>
      <?php endif; ?>

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
        })
      </script>
   </body>
</html>
<?php 
}
 ?>