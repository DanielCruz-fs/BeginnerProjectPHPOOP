<?php
   require_once 'conexion.php';
   class Comentarios extends Conexion{
      public $mysqli;
      //-----------------------------------------------------------------------------------------------------------
      function __construct(){
         $this->mysqli = parent::conectar();
      }
      //-----------------------------------------------------------------------------------------------------------
      public function all($id){
         $resultado = $this->mysqli->query("SELECT * FROM comentarios WHERE idpost=$id");
         $resultado->data_seek(0);
         
         while( $fila = $resultado->fetch_assoc() ){
            $data[] = $fila;
         }
         
         return $data;
      }
      //-----------------------------------------------------------------------------------------------------------
      public function delete($id){
         $resultado = $this->mysqli->query("DELETE FROM comentarios WHERE idcomentario=$id");
         header("Location: index_post.php");
      }
      //-----------------------------------------------------------------------------------------------------------
		public function find($id){
			if( !($sentencia = $this->mysqli->prepare("SELECT * FROM comentarios WHERE idpost = ?") ) ){
				echo "Falló la preparación: (" . $this->mysqli->errno . ")" . $this->mysqli->error;
			}else{
				if( !$sentencia->bind_param('i', $id) ){
					echo "Falló la vinculación de parámetros: (" . $this->mysqli->errno . ")" . $this->mysqli->error;
				}else{
					if( !$sentencia->execute() ){
						echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
					}else{
						if (!($resultado = $sentencia->get_result())){
							echo "Falló la obtención del conjunto de resultados: (" . $sentencia->errno . ") " . $sentencia->error;
						}else{
							//$data = $resultado->fetch_all();
							$data = $resultado->fetch_assoc();
						
							return $data;
						}
					}
				}
			}
		}
      //-----------------------------------------------------------------------------------------------------------
		public function insert(){
			/* Sentencia preparada, etapa 1: preparación */
			if (!($sentencia = $this->mysqli->prepare("INSERT INTO comentarios(idusuario,idpost,nick,comentario,fecha) VALUES (?,?,?,?,?)")))
				 echo "Falló la preparación: (" . $this->mysqli->errno . ") " . $this->mysqli->error;
			
			/* Sentencia preparada, etapa 2: vinculación y ejecución */
			if (!$sentencia->bind_param('iisss', $_POST['idusuario'], $_POST['idpost'], $_POST['nick'], $_POST['comentario'],$_POST['fecha']))
				echo "Falló la vinculación de parámetros: (" . $sentencia->errno . ") " . $sentencia->error;
			
			/*
			 | ---------------------------------
			 | valores para bind_param
			 | i -> variable tipo entero
			 | d -> variable tipo double
			 | s -> variable tipo string
			 | b -> variable tipo blob
			 | ---------------------------------
			 */
			
			if (!$sentencia->execute())
				echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
			
            
			header('Location:index_post.php'); 
		}
		//-----------------------------------------------------------------------------------------------------------
		public function update($id){
			if( !($sentencia = $this->mysqli->prepare("UPDATE posts SET idcategoria = ?,titulo = ?,subtitulo = ?,cuerpo = ?,fecha = ? WHERE idpost = ?") ) )
				echo "Falló la preparación: (" . $this->mysqli->errno . ")" . $this->mysqli->error;
			elseif (!$sentencia->bind_param('issssi', $_POST['idcategoria'],$_POST['titulo'],$_POST['subtitulo'],$_POST['cuerpo'],$_POST['fecha'], $id))
				echo "Falló la vinculación de parámetros: (" . $sentencia->errno . ") " . $sentencia->error;
			elseif (!$sentencia->execute())
				echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
			else
				header('Location:index_post.php');
		}
   }
?>
