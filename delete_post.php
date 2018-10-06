<?php
   require_once 'class/posts.php';
   $obj = new Posts();
   $obj->delete($_GET['id']);
?>