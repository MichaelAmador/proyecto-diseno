<?php
	include dirname(__FILE__,2)."/Config/conexion.php";

	class Producto{
	
		private $pdo;
        public $idproducto;
        public $nombre;
        public $marca;
        public $precio;       
        
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
                $stm = $this->pdo->prepare("select idproducto, p.nombre,m.nombre,precio from producto p inner join marca m 
                on m.idmarca = p.marca ;");
                $stm->execute();

                return $stm->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }
		

		public function listars(){
            try{
                $result = array();
                $stm = $this->pdo->prepare("select Idsolicitud, cliente.nombre, Solicitante, numerocontrato,motivo from solicitud, cliente WHERE solicitud.Solicitante=cliente.idcliente;");
                $stm->execute();

                return $stm->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }
		
		public function Obtener($idsolicitud)
		{
			try 
			{
				$stm = $this->pdo
						  ->prepare("select Idsolicitud, cliente.nombre, Solicitante, numerocontrato,motivo from solicitud, cliente WHERE solicitud.Solicitante=cliente.idcliente and Idsolicitud = ?");
						  
	
				$stm->execute(array($idsolicitud));
				return $stm->fetch(PDO::FETCH_OBJ);
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
            $sql = "CALL nuevaProducto( ? , ? , ?)";
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(1,$data->nombre,PDO::PARAM_STR);
            $stm->bindParam(2,$data->marca,PDO::PARAM_STR);
            $stm->bindParam(3,$data->precio,PDO::PARAM_STR);           
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
            $sql = "CALL modificarProducto(?, ? , ? , ?)";
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(1,$data->idproducto,PDO::PARAM_INT);
            $stm->bindParam(2,$data->nombre,PDO::PARAM_STR);
            $stm->bindParam(3,$data->marca,PDO::PARAM_STR);
            $stm->bindParam(4,$data->precio,PDO::PARAM_STR);           
            $stm->execute();
             
            $out=$stm->fetchAll(PDO::FETCH_OBJ);
            return $out;
            } catch (Exception $e) 
            {
                die($e->getMessage());
            }
        }

        public function GuardarC(Producto $data){

            try
            {

                $salida='';
                $result = array();
                $sql = "CALL addcita( ? , ? , ?, ?, ?)";
                $stm = $this->pdo->prepare($sql);
                $stm->bindParam(1,$data->idsolicitud,PDO::PARAM_STR);
                $stm->bindParam(2,$data->cedula,PDO::PARAM_STR);
                $stm->bindParam(3,$data->numerocontrato,PDO::PARAM_STR);
                $stm->bindParam(4,$data->fecha,PDO::PARAM_STR);
                $stm->bindParam(5,$data->hora,PDO::PARAM_STR);
                $stm->execute();
                $salida=$stm->fetchAll(PDO::FETCH_OBJ);
                return $salida;
            }catch(Exception $e)
            {
                die($e->getMessage());

            }
        }
	
	}
?>