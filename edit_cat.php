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
	$categoria = new Categorias();
	$datos = $categoria->find($_GET['id']);
?> 
<html lang='es'>
	<head>
		<meta charset='UTF-8'>
		<title>Editar</title>
	</head>
	<body>
		<form method='post' action='update_cat.php'>
			Categoria:<br>
			<input type='text' name='categoria' value="<?php echo $datos['categoria']; ?>">
			<br><br>
			<input type='hidden' name='idcategoria' value="<?php echo $_GET['id']; ?>">
			<input type='submit' name='Grabar' value='Grabar' title='Grabar'>
		</form>
	</body>
</html>
<?php 
}
 ?>