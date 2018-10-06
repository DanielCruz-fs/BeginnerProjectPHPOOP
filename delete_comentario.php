<?php
   require_once 'class/comentarios.php';
   $comentario = new Comentarios();
   $comentario->delete($_GET['id']);
?>