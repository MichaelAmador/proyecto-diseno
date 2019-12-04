<?php
	require_once dirname(__FILE__,2)."./Config/conexion.php";

	class Inventario{
	
		private $pdo;
        
		public function __CONSTRUCT()
	    {
            try
            {
                $this->pdo = Conexion::StartUp();     
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
	    }	
	
		public function listar(){
            try{
                $result = array();
                $stm = $this->pdo->prepare("select inventario.idInventario,producto.nombre,inventario.cantidad FROM inventario, producto WHERE inventario.idProducto = producto.idProducto;");                
                $stm->execute();

                return $stm->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }
    }
?>