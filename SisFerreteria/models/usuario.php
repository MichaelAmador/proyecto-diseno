<?php
	require_once dirname(__FILE__,2)."./Config/conexion.php";

	class usuario{
	
		private $pdo;
        public $idusuario;
        public $nombre; 
        public $apellido;
        public $login;
        public $clave;
        public $tipoUser;
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
                $stm = $this->pdo->prepare("SELECT idUsuario,u.nombre,apellido, login,tp.Nombre 
                FROM usuario u INNER JOIN tipo_usuario tp on tp.idTipoUsuario = u.tipo_usuario;");                
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
						  ->prepare("SELECT idUsuario,u.nombre,apellido, login,tp.Nombre 
                          FROM usuario u INNER JOIN tipo_usuario tp on tp.idTipoUsuario = u.tipo_usuario where u.nombre like ?");
						  
                
				$stm->execute($buscador);
				return $stm->fetchAll(PDO::FETCH_OBJ);
			} catch (Exception $e) 
			{
				die($e->getMessage());
			}
		}
        

        public function Guardar(Usuario $data)
        {
            try 
            {
            $out='';
            $result = array();
            $sql = "CALL nuevoUsuario(?,?,?,?,?)";
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(1,$data->nombre,PDO::PARAM_STR);   
            $stm->bindParam(2,$data->apellido,PDO::PARAM_STR);   
            $stm->bindParam(3,$data->login,PDO::PARAM_STR);   
            $stm->bindParam(4,$data->clave,PDO::PARAM_STR);   
            $stm->bindParam(5,$data->tipo_user,PDO::PARAM_STR);           
            $stm->execute();
             
            return $stm->fetchAll(PDO::FETCH_OBJ);
            
            } catch (Exception $e) 
            {
                die($e->getMessage());
            }
        }

        public function Modificar(Usuario $data)
        {
            try 
            {
            $out='';
            $result = array();
            $sql = "CALL modificarUsuario(?, ?, ?, ?, ?, ?)";
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(1,$data->idusuario,PDO::PARAM_INT);
            $stm->bindParam(2,$data->nombre,PDO::PARAM_STR);
            $stm->bindParam(3,$data->apellido,PDO::PARAM_STR);
            $stm->bindParam(4,$data->login,PDO::PARAM_STR);
            $stm->bindParam(5,$data->clave,PDO::PARAM_STR);
            $stm->bindParam(6,$data->tipo_usuario,PDO::PARAM_STR);
           
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