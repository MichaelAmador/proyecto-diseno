<?php
	require_once dirname(__FILE__,2)."./Config/conexion.php";

	class Compras{
	
        private $pdo;
        public $idproducto;//
        public $cantidad;//
        public $nombre;
        public $precio;//
        public $subtotal;
        public $idproveedor;//
        public $fecha;//
        public $total;//
        public $Subtotal;//
        public $idusuario;//
        public $descuento;//
        public $idcompra;//
       

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
        

        public function Registrar($carrito2,$data){

            try 
            {
            $out=0;
            $result = array();
            $sql = "CALL addcompra(?, ?, ? , ? , ?, ?)";
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(1,$data->fecha,PDO::PARAM_STR);
            $stm->bindParam(2,$data->Subtotal,PDO::PARAM_STR);
            $stm->bindParam(3,$data->descuento,PDO::PARAM_STR); 
            $stm->bindParam(4,$data->total,PDO::PARAM_STR); 
            $stm->bindParam(5,$data->idproveedor,PDO::PARAM_STR); 
            $stm->bindParam(6,$data->idusuario,PDO::PARAM_INT);           
            $stm->execute();
             
            $out=$stm->fetchColumn(0);
            

            foreach($carrito2 as $d){
                $sql = "CALL detallecompra(?, ?, ? , ?)";
                $stm = $this->pdo->prepare($sql);
                $stm->bindParam(1,$out,PDO::PARAM_STR);
                $stm->bindParam(2,$d->idproducto,PDO::PARAM_STR);
                $stm->bindParam(3,$d->precio,PDO::PARAM_STR); 
                $stm->bindParam(4,$d->cantidad,PDO::PARAM_STR);           
                $stm->execute();
                
            }

            } catch (Exception $e) 
            {
                die($e->getMessage());
            }






        }











    }




?>