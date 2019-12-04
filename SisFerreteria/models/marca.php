<?php
	require_once dirname(__FILE__,2)."./Config/conexion.php";

	class Marca{
	
		private $pdo;
        public $idmarca;
        public $nombre; 
        public $buscador;      
        
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
                $stm = $this->pdo->prepare("select * from marca;");                
                $stm->execute();

                return $stm->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }
		
		public function Buscar($buscador)
		{
			try 
			{
				$stm = $this->pdo
						  ->prepare("select * from marca where nombre like ?");
						  
                $param = ["%$buscador%"];
				$stm->execute($param);
				return $stm->fetchAll(PDO::FETCH_OBJ);
			} catch (Exception $e) 
			{
				die($e->getMessage());
			}
		}
        

        public function Guardar(Producto $data)
        {
            try 
            {
            $out='';
            $result = array();
            $sql = "CALL nuevaMarca(?)";
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(1,$data->nombre,PDO::PARAM_STR);           
            $stm->execute();
             
            $out=$stm->fetchAll(PDO::FETCH_OBJ);
            return $out;
            } catch (Exception $e) 
            {
                die($e->getMessage());
            }
        }

        public function Modificar(Producto $data)
        {
            try 
            {
            $out='';
            $result = array();
            $sql = "CALL modificarMarca(?, ?)";
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(1,$data->idmarca,PDO::PARAM_INT);
            $stm->bindParam(2,$data->nombre,PDO::PARAM_STR);
           
            $stm->execute();
             
            $out=$stm->fetchAll(PDO::FETCH_OBJ);
            return $out;
            } catch (Exception $e) 
            {
                die($e->getMessage());
            }
        }        
	
	}
?>