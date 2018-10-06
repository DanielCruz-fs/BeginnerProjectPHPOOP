<?php 
   require_once('class/sesiones.php');

   $sesion = new Sesion();
   $usuario = $sesion->get('usuario');
   if ($usuario == false){

         header('Location: login.php');

   }else{

?>
<?php
   require_once 'class/categorias.php';
   $obj = new Categorias();
   $datos = $obj->all();
?>
<!DOCTYPE html>
<html lang='es'>
   <head>
      <title>MySQLi</title>
      <meta charset='UTF-8'>
   </head>
   <body>
	   <a href='add_cat.php'>Agregar</a>
	   <?php if(sizeof($datos)>0): ?>
      <table border='1'>
         <tr>
            <th>Codigo</th>
            <th>Categoria</th>
            <th>Accion</th>
            
         </tr>
      <?php foreach($datos as $row): ?>
         <tr>
            <td>
               <?php echo $row['idcategoria']; ?>
            </td>
            <td>
               <?php echo $row['categoria']; ?>
            </td>
            <td>
               <a href='edit_cat.php?id=<?php echo $row['idcategoria']; ?>'>Editar</a> ||
               <a href='delete_cat.php?id=<?php echo $row['idcategoria']; ?>'>Eliminar</a>
            </td>
         </tr>
      <?php endforeach; ?>
      </table>
      <?php endif; ?>
   </body>
</html>
<?php 
}
 ?>