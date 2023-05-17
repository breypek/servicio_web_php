<?php

  require_once './config/config.php';

	class Conexion
	{
	   
		private static $instance = NULL;
		private $connection;
	   
		private $host_name;
		private $db_name;
		private $db_username;
		private $db_password;
	   

		private function __construct() {

			 $host_name= constant('DB_HOST');
			 $db_name=constant('DB_DATABASE_NAME');
			 $db_username= constant('DB_USERNAME');
			 $db_password= constant('DB_PASSWORD');
					
			try{
			 $this->connection = new PDO("mysql:host=$host_name;dbname=$db_name", $db_username,  $db_password);
			}catch(PDOExepction $e){
               echo $e->getMessage();
			}		
	 }
	
	

		public function getConexion(){

			return $this->connection;
		}
		
		
		public static function getInstance()
		{
			if ( !self::$instance ) {
				self::$instance = new self(); //new Singleton();
			}

			return self::$instance;
		}


		public function select($sql="", $values=array()){
         
			$consulta =  $this->connection->prepare($sql);
			$consulta->execute($values);
			$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
			return $datos;

		}


		public function insertar($sql="", $values=array()){
         
			$consulta =  $this->connection->prepare($sql);
			$consulta->execute($values);
			$filas_afectadas = $consulta->rowCount();
			return $filas_afectadas;

		}


		
	}

	?>