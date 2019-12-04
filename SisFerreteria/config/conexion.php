<?php
	class Conexion{
		/*private $host;
		private $user;
		private $password;
		private $dataBase;

		public function __construct(){
			$this->host     ="localhost:3307"; //
			$this->user     ="root"; 
			$this->password =""; 
			$this->dataBase ="si_todo_hogar";
		}

		public function conectarse(){
			$enlace = mysqli_connect($this->host, $this->user, $this->password, $this->dataBase);
			if($enlace){
				
			}else{
				die('Error de Conexión (' . mysqli_connect_errno() . ') '.mysqli_connect_error());
			}
			return($enlace);
			mysqli_close($enlace); 
		}
		*/
		public static function startup(){

			$pdo = new PDO('mysql:host=localhost;dbname=ferreteria_castillo;charset=utf8', 'root', 'Myroot');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;

		}
	
	}

?>