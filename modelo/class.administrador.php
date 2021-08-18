<?php
class Administrador{
	private $nombre;
	private $apellido;
	private $correo;
	private $pass;
	private $fechaNac;

	private $id;

		//Verificacion de valores
		public function veriAdm($nombre, $apellido, $correo, $pass, $pass2, $fechaNac){
			if(strlen($nombre)>0 && strlen($apellido)>0 && strlen($correo)>0 && strlen($pass)>0 && strlen($pass2)>0 && strlen($fechaNac)){	
				if($pass == $pass2){
					$this->nombre = $nombre;
					$this->apellido = $apellido;
					$this->correo = $correo;
					$this->pass = $pass;
					$this->fechaNac = $fechaNac;
				}else{
					throw new Exception("Error. Las contraseñas no coinciden");
				}
			}else{
				throw new Exception("Error. Por favor complete todos los campos");		
			}
					}

		//Inserta un nuevo administrador (registro)
		public function nuevoAdm(){
			$modelo = new Conexion();
			$conexion = $modelo->get_conexion();
			$sql = "insert into administrador (nombre, apellido, correo, contrasena, fechaNac) values (:nombre, :apellido, :correo, md5(:contrasena), :fechaNac)";
			$stm = $conexion->prepare($sql);
			$stm->bindParam(":nombre", $this->nombre);
			$stm->bindParam(":apellido", $this->apellido);
			$stm->bindParam(":correo", $this->correo);
			$stm->bindParam(":contrasena", $this->pass);
			$stm->bindParam(":fechaNac",$this->fechaNac);
			if(!$stm){
				throw new Exception("Error. No se pudo ejecutar el comando");	
			}else{
				$stm->execute();
				return 'registro exitoso';
			}
		}
		
		//verifica si el administrador existe (inicio de sesion)
		public function admExt($user, $pass){
			$md5pass = md5($pass);
			$conexion = new Conexion();
			$dbh = $conexion->get_conexion();
			$sql = ('select * from administrador where correo = :correo and contrasena = :pass');		
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

		//Setea el administrador y todos sus datos
		public function setAdm($user){
			$conexion = new Conexion();
			$dbh= $conexion->get_conexion();
			$sql = 'select * from administrador where correo = :correo';
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
				$this->fechaNac= $currentUser['fechaNac'];
			}
		}	

		//Metodo para modificar los datos
		public function modificarAdm($nombre,$apellido,$correo){
			$conexion = new Conexion();
			$dbh = $conexion->get_conexion();
			$sql = "Update administrador set nombre=:nombre, apellido=:apellido, correo=:correo where id=:id";
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

		//Todas kas funciones get del administrador 
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

		public function getFechaNac(){
			return $this->fechaNac;
		}
	}

?>
