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

        public function listarinventario(){

            try{
                $result = array();
                $stm = $this->pdo->prepare("SELECT i.idInventario,p.nombre,i.cantidad from inventario i INNER JOIN producto p ON i.idProducto = p.idProducto;");                
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