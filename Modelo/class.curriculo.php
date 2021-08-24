<?php

class Curriculo{

	private $id;
	private $nombre;
	private $ext;

	private $route;

	//funcion constructor para la verificacion de las variables
	public function __construct($id,$name,$ext){
		if(strlen($name)>0 && strlen($ext)>0){
			$this->id = $id; 
			$this->nombre = $name;
			$this->ext = $ext;
		}else{
			throw new Exception("Error. Coloque el curriculum");
		}
	}

	//Funcion que agrega los datos a la base de datos
	public function docProfesional(){
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$sql = "insert into curri (direccion,nombre,extension) values (:direccion, :nombre,:extension)";
		$stm = $conexion->prepare($sql);
		$stm->bindParam(":direccion", $this->route);
		$stm->bindParam(":nombre",$this->nombre);
		$stm->bindParam(":extension",$this->ext);
		if(!$stm){
			return "Error al subir el archivo";
		}else{
			$stm->execute();
			return "El curriculo se subio correctamente";
		}
	}

	//Funcion que setea la ruta
	public function setRoute(){
		$this->route = '../uploads/'.$this->id;	
		mkdir($this->route, 0700, false);
	}


	//Funciones getters
	public function getRoute(){
		return $this->route;
	}
	
	
}
?>
