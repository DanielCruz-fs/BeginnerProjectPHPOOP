<?php 
   require_once('class/sesiones.php');

   $sesion = new Sesion();
   $usuario = $sesion->get('usuario');
   if ($usuario == false){

   	   header('Location: login.php');

   }else{

?>
<?php
	if(isset($_POST['Postear']) and $_POST['Postear']=='Postear'){
		require_once 'class/posts.php';
		$post = new Posts();
		$post->insert();
	}
?>
<!DOCTYPE html>
<html lang='es'>
   <head>
      <title>MySQLi</title>
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


		<form action='' method='post' class="form-horizontal">
                 <div class="form-group">
                    <label for="titulo" class="col-sm-2 control-label">Titulo:</label>
                        <div class="col-sm-10">
                        <input type="text" name="titulo" class="form-control" id="titulo" required/>
                        </div> 
                 </div>
                 <div class="form-group">
                    <label for="subtitulo" class="col-sm-2 control-label">Subtitulo:</label>
                        <div class="col-sm-10">
                        <input type="text" name="subtitulo" class="form-control" id="subtitulo" required/>
                        </div>
                 </div>
                 <div class="form-group">
                    <label for="contenido" class="col-sm-2 control-label">Contenido:</label>
                        <div class="col-sm-10">
                        <textarea class="form-control" rows="4" name="cuerpo" id="contenido" required></textarea>
                        </div>
                 </div>
                 <div class="form-group">
                    <label for="categoria" class="col-sm-2 control-label">Categoria:</label>
                        <div class="col-sm-10">
                        <select name="idcategoria" id="categoria" class="form-control">
                           <?php 
                           $mysql = new mysqli("localhost","root","","examenphpoop");
                                    if ($mysql->connect_error){
                                    die("error en la conexion");
                                    }
            
                           $registros = $mysql->query("SELECT idcategoria, categoria FROM categorias") or die($mysql->error);
 
                           while ($reg=$registros->fetch_array()){
                           echo "<option value=\"".$reg['idcategoria']."\">".$reg['categoria']."</option>";
                           }

                           ?>
                        </select>
                        </div>
                 </div>
                 <div class="form-group">
                    <label for="fecha" class="col-sm-2 control-label">Fecha:</label>
                        <div class="col-sm-10">
                        <input type="date" name="fecha" class="form-control" id="fecha"/>
                        </div>
                 </div>
                 <div class="form-group">
                    <div class="col-sm-10 col-sm-push-2">
                    <input type='hidden' name='idusuario' value="<?php echo $_GET['id']; ?>">
                    <input type="submit" name="Postear" value="Postear" class="btn btn-primary" />
                    </div>
                 </div>
               </form>


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