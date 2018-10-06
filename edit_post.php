<?php 
   require_once('class/sesiones.php');

   $sesion = new Sesion();
   $usuario = $sesion->get('usuario');
   if ($usuario == false){

         header('Location: login.php');

   }else{

?>
<?php
	require_once 'class/posts.php';
	$post = new Posts();
	$datos = $post->find($_GET['id']);
?> 
<!DOCTYPE html>
<html>
<head>
		<title>Editar</title>
		    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="container">
        <div class="row">
         <div class="col-xs-12">
             <div class="jumbotron">


                <form action="update_post.php" method="post" class="form-horizontal">

                    <div class="form-group">
                       <label for="titulo" class="col-sm-2 control-label">Titulo:</label>
                         <div class="col-sm-10"> 
                         <input type="text" name="titulo" class="form-control" id="titulo" value="<?php echo $datos['titulo']; ?>" />
                         </div> 
                    </div>
                    <div class="form-group">
                       <label for="subtitulo" class="col-sm-2 control-label">Subtitulo:</label>
                         <div class="col-sm-10">
                         <input type="text" name="subtitulo" class="form-control" id="subtitulo" value="<?php echo $datos['subtitulo']; ?>"/>
                         </div>
                    </div>
                    <div class="form-group">
                       <label for="contenido" class="col-sm-2 control-label">Contenido:</label>
                         <div class="col-sm-10">
                         <textarea class="form-control" rows="4" name="cuerpo" id="contenido"><?php echo $datos['cuerpo']; ?></textarea>
                         </div>
                    </div>
                    <div class="form-group">
                       <label for="fecha" class="col-sm-2 control-label">Fecha:</label>
                         <div class="col-sm-10">
                         <input class="form-control" id="fecha" type="date" name="fecha" value="<?php echo $datos['fecha']; ?>"/>
                         </div>
                    </div>
                    <div class="form-group">
                       <label for="categoria" class="col-sm-2 control-label">Categoria:</label>
                         <div class="col-sm-10">
                         <select name="idcategoria"  id="categoria" class="form-control">
                    <?php 
                         $mysql = new mysqli("localhost","root","","examenphpoop");
                                    if ($mysql->connect_error){
                                    die("error en la conexion");
                                    }
                          
                          $registros2 = $mysql->query("SELECT idcategoria, categoria FROM categorias") or die($mysql->error);

                            while ($reg2=$registros2->fetch_array()){

                              if ($reg2['idcategoria']==$reg['idcategoria']){

                                   echo "<option value=\"".$reg2['idcategoria']."\" selected>".$reg2['categoria']."</option>";
                                
                                 }
                              else{

                                echo "<option value=\"".$reg2['idcategoria']."\">".$reg2['categoria']."</option>";

                              }
                            
                            }


                     ?>
                         </select>
                         </div>
                    </div>

                    <input type="hidden" name="idpost" value="<?php echo $datos['idpost']; ?>" />
                    
                    <div class="form-group">
                       <div class="col-sm-10 col-sm-push-2">
                       <input type="submit" name="confirmar" value="Confirmar" class="btn btn-primary"/>
                       </div>
                    </div>
                        
                 </form>
                 <br/>

                  <a class="btn btn-info" href="index_post.php">Volver</a>
                         
             </div> 
                         
         </div>
       
     </div>
    
  </div>



     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	</body>
</html>
<?php 
}
 ?>