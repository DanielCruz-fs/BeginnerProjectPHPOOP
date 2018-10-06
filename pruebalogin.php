<?php 
   require_once('class/sesiones.php');

   $sesion = new Sesion();
   $usuario = $sesion->get('usuario');
   if ($usuario == false){

   	   header('Location: login.php');

   }else{

?>
<!DOCTYPE html>
<html>
<head>
	<title>estas logeado</title>
</head>
<body>

<h1>hola : <?php echo $sesion->get('usuario'); ?></h1>
<a href="cerrarsesion.php">Cerrar Sesion</a>
</body>
</html>
<?php 
}
 ?>