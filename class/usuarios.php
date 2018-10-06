<?php
   require_once 'conexion.php';
   class Usuarios extends Conexion{
      public $mysqli;
      //-----------------------------------------------------------------------------------------------------------
      function __construct(){
         $this->mysqli = parent::conectar();
      }
      //-----------------------------------------------------------------------------------------------------------
         public function all(){
         $resultado = $this->mysqli->query("SELECT * FROM usuarios WHERE estado = 1");
         $resultado->data_seek(0);
         
         while( $fila = $resultado->fetch_assoc() ){
            $data[] = $fila;
         }
         
         return $data;
      }
      //-----------------------------------------------------------------------------------------------------------

      //-----------------------------------------------------------------------------------------------------------
		public function find($id){
			if( !($sentencia = $this->mysqli->prepare("SELECT * FROM usuarios WHERE estado = ?") ) ){
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

		//-----------------------------------------------------------------------------------------------------------

   }
?>
