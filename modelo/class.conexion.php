<?php

class Conexion{
	public function get_conexion(){
		$user = 'root';
		$pass = '';
		$host = "localhost";
		$db = 'rent_a_profesional';
		try{
			$dsn = "mysql:host=$host;dbname=$db;";
			$dbh = new PDO($dsn, $user, $pass);
			return $dbh;
		}catch (PDOException $e){
			echo "Error en la base de datos" . $e->getMessage();
		}
	}
}

?>
