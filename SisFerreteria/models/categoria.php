<?php
	require_once dirname(__FILE__,2)."./Config/conexion.php";

	class Categoria{
	
		private $pdo;
        public $idcategoria;
        public $nombre; 
          
        
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
                $stm = $this->pdo->prepare("select * from categoria;");                
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