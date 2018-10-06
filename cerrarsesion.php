<?php 
require_once('class/sesiones.php');

   $sesion = new Sesion();

   $usuario = $sesion->get('usuario');

   if($usuario == false){
           
       header('Location: login.php');
   }else{

   	   $usuario = $sesion->get('usuario');
   	   $sesion->terminasesion();
   	   header('Location: login.php');
   }


 ?>