<?php 
   require_once('class/sesiones.php');

   $sesion = new Sesion();
   $usuario = $sesion->get('usuario');
   if ($usuario == false){

   	   header('Location: login.php');

   }else{

?>
<?php
	if(isset($_POST['Guardar']) and $_POST['Guardar']=='Guardar'){
		require_once 'class/categorias.php';
		$cat = new Categorias();
		$cat->insert();
	}
?>
<!DOCTYPE html>
<html lang='es'>
   <head>
      <title>MySQLi</title>
      <meta charset='UTF-8'>
   </head>
   <body>
		<form action='' method='post'>
			categoria:<br>
			<input type='text' name='categoria' id='categoria'><br>
			<input type='submit' name='Guardar' value='Guardar' title='Guardar'>
		</form>
   </body>
</html>
<?php 
}
 ?>