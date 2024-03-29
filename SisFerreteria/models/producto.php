<?php
	require_once dirname(__FILE__,2)."./Config/conexion.php";

	class Producto{
	
		private $pdo;
        public $idproducto;
        public $nombre;
        public $marca;
        public $precio; 
        public $nombre_imagen;
        public $ruta_imagen;
        public $categoria;     
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
        public function listarcategoria(){
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
	
		public function listar(){
            try{
                $result = array();              
                $stm = $this->pdo->prepare("select idproducto, p.nombre Producto,c.nombre Categoria,m.nombre Marca,precio,ruta_imagen
                from producto p inner join marca m on m.idmarca = p.marca inner join categoria c on c.idcategoria = p.categoria;");
                $stm->execute();

                return $stm->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }
		

		public function listardetalle($idproducto){
            try{
                $result = array();
                $stm = $this->pdo->prepare("select idproducto, p.nombre Producto,c.nombre Categoria,m.nombre Marca,precio,ruta_imagen
                from producto p inner join marca m on m.idmarca = p.marca inner join categoria c on c.idcategoria = p.categoria where idproducto=?;");
                $stm->execute(array($idproducto));

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
                $sql= "CALL buscador( ? )";
                $stm = $this->pdo->prepare($sql);
                $stm->bindParam(1,$buscador,PDO::PARAM_STR);
				$stm->execute();
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
            $sql = "CALL nuevoProducto(?, ?, ? , ? , ?, ?)";
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(1,$data->nombre,PDO::PARAM_STR);
            $stm->bindParam(2,$data->marca,PDO::PARAM_STR);
            $stm->bindParam(3,$data->precio,PDO::PARAM_STR); 
            $stm->bindParam(4,$data->nombre_imagen,PDO::PARAM_STR); //Cambiar tipo de dato especifico para imagen
            $stm->bindParam(5,$data->ruta_imagen,PDO::PARAM_STR); //Cambiar tipo de dato especifico para imagen
            $stm->bindParam(6,$data->categoria,PDO::PARAM_INT);           
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
            $sql = "CALL modificarProducto(?, ?, ?, ? , ? , ?, ?)";
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(1,$data->idproducto,PDO::PARAM_INT);
            $stm->bindParam(2,$data->nombre,PDO::PARAM_STR);
            $stm->bindParam(3,$data->marca,PDO::PARAM_STR);
            $stm->bindParam(4,$data->precio,PDO::PARAM_STR); 
            $stm->bindParam(5,$data->nombre_imagen,PDO::PARAM_STR); //Cambiar tipo de dato especifico para imagen
            $stm->bindParam(6,$data->ruta_imagen,PDO::PARAM_STR); //Cambiar tipo de dato especifico para imagen
            $stm->bindParam(7,$data->categoria,PDO::PARAM_INT);           
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