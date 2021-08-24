<?php
	class Profesional{
		private $nombre;
		private $apellido;
		private $correo;
		private $pass;
		private $profesion;
		private $fechaNac;

		private $id;

		//verifica que los campos estan completos (Es para el registro)
		public function veriProfesional($nombre, $apellido, $correo, $pass, $pass2, $profesion, $fechaNac){
			if(strlen($nombre)>0 && strlen($apellido)>0 && strlen($correo)>0 && strlen($pass)>0 && strlen($pass2)>0 && strlen($fechaNac)>0 && strlen($profesion)>0){	
				if($pass == $pass2){
					$this->nombre = $nombre;
					$this->apellido = $apellido;
					$this->correo = $correo;
					$this->pass = $pass;
					$this->profesion = $profesion;
					$this->fechaNac = $fechaNac;	
				}else{
					throw new Exception("Error. Las contraseñas no coinciden");
				}
			}else{
				throw new Exception("Error. Por favor complete todos los campos");		
			}
					}

		//Inserta un nuevo profesional (registro)
		public function nuevoProfecional(){
			$modelo = new Conexion();
			$conexion = $modelo->get_conexion();
			$sql = "insert into profesional (nombre, apellido, correo, contrasena,  profesion, fecha_nac) values (:nombre, :apellido, :correo, md5(:contrasena), :profesion, :fecha_nac)";
			$stm = $conexion->prepare($sql);
			$stm->bindParam(":nombre", $this->nombre);
			$stm->bindParam(":apellido", $this->apellido);
			$stm->bindParam(":correo", $this->correo);
			$stm->bindParam(":contrasena", $this->pass);
			$stm->bindParam(":profesion", $this->profesion);
			$stm->bindParam(":fecha_nac", $this->fechaNac);
			if(!$stm){
				throw new Exception("Error. No se pudo ejecutar el comando");	
			}else{
				$stm->execute();
			}
		}
		
		//verifica si el profesional existe (inicio de sesion)
		public function profesionalExt($user, $pass){
			$md5pass = md5($pass);
			$conexion = new Conexion();
			$dbh = $conexion->get_conexion();
			$sql = ('select * from profesional where correo = :correo and contrasena = :pass');		
			$stm = $dbh->prepare($sql);
			$stm->bindParam(':correo',$user);
			$stm->bindParam(':pass',$md5pass);	
			if(!$stm){
				return 'Error al iniciar la sesion';
			}else{
				$stm->execute();
				if($stm->rowCount()){
					return true;
				}else{
					return false;
				}
			}
		}

		//Setea el profesional y todos sus datos
		public function setProfesional($user){
			$conexion = new Conexion();
			$dbh= $conexion->get_conexion();
			$sql = 'select * from profesional where correo = :correo';
			$stm = $dbh->prepare($sql);
			$stm->bindParam(':correo',$user);
			if(!$stm){
				return 'Error al ejecutar el comando';
			}else{
				$stm->execute();
				$currentUser = $stm->fetch(PDO::FETCH_ASSOC);
				$this->id = $currentUser['id'];
				$this->nombre = $currentUser['nombre'];	
				$this->apellido = $currentUser['apellido'];	
				$this->correo = $currentUser['correo'];
				$this->profesion = $currentUser['profesion'];
				$this->fechaNac = $currentUser['fecha_nac'];
			}
		}	

		public function modificarPro($nombre,$apellido,$correo){
			$conexion = new Conexion();
			$dbh = $conexion->get_conexion();
			$sql = "Update profesional set nombre=:nombre, apellido=:apellido, correo=:correo where id=:id";
			$stmt= $dbh->prepare($sql);
			$stmt->bindParam(":nombre",$nombre);
			$stmt->bindParam(":apellido",$apellido);
			$stmt->bindParam(":correo",$correo);
			$stmt->bindParam(":id",$this->id);
			if(!$stmt){
				throw new Exception("Error. problema al modificar datos");
			}else{
				$stmt->execute();
			}
		}

		//Todas kas funciones get del profesional
		public function getId(){
			return $this->id;	
		}

		public function getNombre(){
			return $this->nombre;	
		}

		public function getApellido(){
			return $this->apellido;	
		}

		public function getCorreo(){
			return $this->correo;	
		}

		public function getProfesion(){
			return $this->profesion;
		}
		
		public function getFechaNac(){
			return $this->fechaNac;	
		}
	}

?>
