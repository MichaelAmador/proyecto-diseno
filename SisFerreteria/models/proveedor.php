<?php
	include dirname(__FILE__,2)."/Config/conexion.php";

	class Proveedor{
	
		private $pdo;
        public $idproveedor;
        public $nombre;
        public $direccion;
        public $telefono; 
        public $web;       
        
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
                $stm = $this->pdo->prepare("select * from proveedor;");
                $stm->execute();

                return $stm->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }		
        

        public function Guardar(Proveedor $data)
        {
            try 
            {
            $out='';
            $result = array();
            $sql = "CALL nuevoProveedor(?, ? , ? , ?)";
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(1,$data->nombre,PDO::PARAM_STR);
            $stm->bindParam(2,$data->direccion,PDO::PARAM_STR);
            $stm->bindParam(3,$data->telefono,PDO::PARAM_STR); 
            $stm->bindParam(4,$data->web,PDO::PARAM_STR);               
            $stm->execute();
             
            $out=$stm->fetchAll(PDO::FETCH_OBJ);
            return $out;
            } catch (Exception $e) 
            {
                die($e->getMessage());
            }
        }

        public function Modificar(Proveedor $data)
        {
            try 
            {
            $out='';
            $result = array();
            $sql = "CALL modificarProveedor(?, ?, ? , ? , ?)";
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(1,$data->idproveedor,PDO::PARAM_INT);
            $stm->bindParam(2,$data->nombre,PDO::PARAM_STR);
            $stm->bindParam(3,$data->direccion,PDO::PARAM_STR);
            $stm->bindParam(4,$data->telefono,PDO::PARAM_STR); 
            $stm->bindParam(5,$data->web,PDO::PARAM_STR);        
            $stm->execute();
             
            $out=$stm->fetchAll(PDO::FETCH_OBJ);
            return $out;
            } catch (Exception $e) 
            {
                die($e->getMessage());
            }
        }
        
        public function Buscar($buscador)
		{
			try 
			{
				$stm = $this->pdo
					->prepare("selec * from proveedor where nombre like ?");
						  
                $param = ["%$buscador%"];
				$stm->execute($param);
				return $stm->fetchAll(PDO::FETCH_OBJ);
			} catch (Exception $e) 
			{
				die($e->getMessage());
			}
		}
	
	}
?>