<?php
	include dirname(__FILE__,2)."/Config/conexion.php";

	class Cita{
	
		private $pdo;
        public $idsolicitud;
        public $nombre;
        public $cedula;
        public $numerocontrato;
        public $motivo;
        public $fecha;
        public $hora;
        
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
                $stm = $this->pdo->prepare("select cita.idcitas, solicitud.Idsolicitud, solicitud.Solicitante, cliente.nombre, solicitud.motivo, solicitud.numerocontrato, electrodomestico.nombre_electrodomestico, cita.fecha, cita.hora from solicitud, cita, electrodomestico, cliente WHERE solicitud.Solicitante=cliente.idcliente and solicitud.numerocontrato=electrodomestico.numero_contrato and solicitud.Idsolicitud = cita.Id_solicitud;");
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
        

        public function Guardar(Cita $data)
        {
            try 
            {
            $out='';
            $result = array();
            $sql = "CALL nuevasolicitud( ? , ? , ?, ?)";
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(1,$data->nombre,PDO::PARAM_STR);
            $stm->bindParam(2,$data->cedula,PDO::PARAM_STR);
            $stm->bindParam(3,$data->numerocontrato,PDO::PARAM_STR);
            $stm->bindParam(4,$data->motivo,PDO::PARAM_STR);
            $stm->execute();
             
            $out=$stm->fetchAll(PDO::FETCH_OBJ);
            return $out;
            } catch (Exception $e) 
            {
                die($e->getMessage());
            }
        }

        public function GuardarC(Cita $data){

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