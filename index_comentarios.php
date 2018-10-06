<?php 
   require_once('class/sesiones.php');

   $sesion = new Sesion();
   $usuario = $sesion->get('usuario');
   if ($usuario == false){

         header('Location: login.php');

   }else{

?>
<?php
   require_once 'class/comentarios.php';
   $obj = new Comentarios();
   $datos = $obj->all($_GET['id']);
?>
<!DOCTYPE html>
<html lang='es'>
   <head>
      <title>MySQLi</title>
      <meta charset='UTF-8'>
   </head>
   <body>

         <?php if(sizeof($datos)>0): ?>
        

      <?php foreach($datos as $row): ?>
        <?php 
          
          echo '<h2>';
          echo $row['nick'].'/'.$row['fecha'];
          echo '</h2>';
          

          echo '<p>';
          echo $row['comentario'];
          echo '</p>';
          
          echo '<a href="delete_comentario.php?id='.$row['idcomentario'].'">Eliminar</a>';
          echo '<hr/>';
          
          $idpost = $row['idpost'];

         ?>
      <?php endforeach; ?>
         <?php echo '<a href="add_comentario.php?id='.$idpost.'">Agregar Comentario</a>'; ?>
      <?php endif; ?>
      <a href="index_post.php">Volver</a>
   </body>
</html>
<?php 
}
 ?>