<?php 
   require_once('class/sesiones.php');

   $sesion = new Sesion();
   $usuario = $sesion->get('usuario');
   if ($usuario == false){

   	   header('Location: login.php');

   }else{

?>
<?php
	if(isset($_POST['Comentar']) and $_POST['Comentar']=='Comentar'){
		require_once 'class/comentarios.php';
		$com = new Comentarios();
		$com->insert();
	}
?>
<?php
   require_once 'class/usuarios.php';
   $obj = new Usuarios();
   $datos = $obj->find(1);
?>
<!DOCTYPE html>
<html lang='es'>
   <head>
      <title>MySQLi</title>
      <meta charset='UTF-8'>
   </head>
   <body>
      <form  action='' method='post'>
   Nick:
  <input type="text" name="nick" id="nick" />
  <br/>
  contenido: <textarea name="comentario" id="comentario"></textarea>
  fecha: <input type="date" name="fecha" id="fecha" />
  <br/>
  
   <input type="submit" name="Comentar" value="Comentar"/>
   
    <input type="hidden" name="idpost" value="<?php echo $_GET['id']; ?>"/>
    <input type="hidden" name="idusuario" value="<?php echo $datos['idusuario']; ?>"/>

</form>

   </body>
</html>
<?php 
}
 ?>