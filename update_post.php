 <?php
	require_once 'class/posts.php';
	$post = new Posts();
	$post->update($_POST['idpost']);
 ?>
