 <?php
	require_once 'class/categorias.php';
	$categoria = new Categorias();
	$categoria->update($_POST['idcategoria']);
 ?>
