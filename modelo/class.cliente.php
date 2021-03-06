<?php
	class Cliente{
		private $nombre;
		private $apellido;
		private $correo;
		private $pass;
		private $fechaNac;
		private $id;
		private $estado;

		//Se verifican que todos los campos estan completos (Es para el registro)
		public function veriCliente($nombre, $apellido, $correo, $pass, $pass2, $fechaNac){
			if(strlen($nombre)>0 && strlen($apellido)>0 && strlen($correo)>0 && strlen($pass)>0 && strlen($pass2)>0 && strlen($fechaNac)>0){	
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

		//Inserta un nuevo cliente
		public function nuevoCliente(){
			$modelo = new Conexion();
			$conexion = $modelo->get_conexion();
			$sql = "insert into cliente (nombre, apellido, correo, contrasena, fecha_nac) values (:nombre, :apellido, :correo, md5(:contrasena), :fecha_nac)";
			$stm = $conexion->prepare($sql);
			$stm->bindParam(":nombre", $this->nombre);
			$stm->bindParam(":apellido", $this->apellido);
			$stm->bindParam(":correo", $this->correo);
			$stm->bindParam(":contrasena", $this->pass);
			$stm->bindParam(":fecha_nac", $this->fechaNac);
			if(!$stm){
				throw new Exception("Error. No se pudo ejecutar el comando");	
			}else{
				$stm->execute();
			}
		}
		
		//Verifica si el correo ya esta en uso
		public function searchClnt($user){
			$conexion = new Conexion();
			$dbh = $conexion->get_conexion();
			$sql = ('select * from cliente where correo = :correo');		
			$stm = $dbh->prepare($sql);
			$stm->bindParam(':correo',$user);
			if(!$stm){
				throw new Exception("Error al buscar al usuario");
			}else{
				$stm->execute();
				if($stm->rowCount()){
					return true;
				}else{
					return false;
				}
			}
		}

		//Verifica si existe el cliente
		public function clienteExt($user, $pass){
			$md5pass = md5($pass);
			$conexion = new Conexion();
			$dbh = $conexion->get_conexion();
			$sql = ('select * from cliente where correo = :correo and contrasena = :pass');		
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

		//Setea el cliente y todos sus datos
		public function setCliente($user){
			$modelo = new Conexion();
			$conexion = $modelo->get_conexion();
			$sql = 'select * from cliente where correo = :correo';
			$stm = $conexion->prepare($sql);
			$stm->bindParam(':correo',$user);
			if(!$stm){
				return 'Error al ejecutar el comando';
			}else{
				$stm->execute();
				$currentUser = $stm->fetch(PDO::FETCH_ASSOC);
				$this->id = $currentUser['id'];
				$this->correo = $currentUser['correo'];	
				$this->nombre = $currentUser['nombre'];	
				$this->apellido = $currentUser['apellido'];
				$this->fechaNac = $currentUser['fecha_nac'];
				$this->estado = $currentUser['estado'];
			}
		}	

		public function setId($user){
			$modelo = new Conexion();
			$conexion = $modelo->get_conexion();
			$sql = 'select * from cliente where correo = :correo';
			$stm = $conexion->prepare($sql);
			$stm->bindParam(':correo',$user);
			if(!$stm){
				return 'Error al ejecutar el comando';
			}else{
				$stm->execute();
				$currentUser = $stm->fetch(PDO::FETCH_ASSOC);
				$this->id = $currentUser['id'];
			}
		}	

		public function datosPubli($titulo,$datos,$precio){
			if(!empty($titulo) && !empty($datos) && !empty($precio)){
				$this->titulo = $titulo;	
				$this->datos = $datos;
				$this->precio = $precio;
			}else{
				throw new Exception("Complete todos los campos");
			}
		}

		public function nuevaPubli(){
			$conexion = new Conexion();
			$dbh = $conexion->get_conexion();
			$sql = "insert into publicaciones (titulo, descripcion, precio, idcliente) values (:titulo, :descripcion, :precio, :idcliente)";
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(":titulo",$this->titulo); 
			$stmt->bindParam(":descripcion",$this->datos);
			$stmt->bindParam(":precio",$this->precio);
			$stmt->bindParam(":idcliente",$this->id);
			if(!$stmt){
				throw new Exception("Error. no se pudo guardar la publicacion");
			}else{
				$stmt->execute();
			}
		}

		public function estadoPubli($id){
			$conexion = new Conexion();
			$dbh = $conexion->get_conexion();
			$sql = "UPDATE publicaciones set estado=1 where id=:id";
			$stmt= $dbh -> prepare($sql);
			$stmt -> bindParam(":id",$id);
			$stmt -> execute();
		}

		public function deletePubli($id){
			$conexion = new Conexion();
			$dbh = $conexion->get_conexion();
			$sql = "DELETE FROM publicaciones where id=:id";
			$stmt= $dbh -> prepare($sql);
			$stmt -> bindParam(":id",$id);
			$stmt -> execute();
		}
		//Modifica el nombre
		public function modifyName($nombre,$apellido){
			$conexion = new Conexion;
			$dbh = $conexion -> get_conexion();
			$sql = "Update cliente set nombre = :nombre, apellido = :apellido where id=:id";
			$stmt= $dbh -> prepare($sql);
			$stmt -> bindParam(":nombre",$nombre);
			$stmt -> bindParam(":apellido",$apellido);
			$stmt->bindParam(":id",$this->id);
			if(!$stmt){
				throw new Exception("Error al modificar datos");
			}else{
				$stmt -> execute();
			}
		}

		//Modificar el correo
		public function modifyEmail($correo){
			$conexion = new Conexion;
			$dbh = $conexion -> get_conexion();
			$sql = "Update cliente set correo=:correo where id=:id";
			$stmt= $dbh -> prepare($sql);
			$stmt -> bindParam(":correo",$correo);
			$stmt->bindParam(":id",$this->id);
			if(!$stmt){
				throw new Exception("Error al modificar datos");
			}else{
				$stmt -> execute();
			}
		}

		//Modificar la contraseña
		public function modifyPass($contrasena){
			$md5pass = md5($contrasena);
			$conexion = new Conexion;
			$dbh = $conexion -> get_conexion();
			$sql = "Update cliente set contrasena=:contrasena where id=:id";
			$stmt= $dbh -> prepare($sql);
			$stmt -> bindParam(":contrasena",$md5pass);
			$stmt->bindParam(":id",$this->id);
			if(!$stmt){
				throw new Exception("Error al modificar datos");
			}else{
				$stmt -> execute();
			}
		}


		
		//Muestra el perfil cliente a las demas personas
		public function mostrarPerfil($id){
		$conexion = new Conexion();
		$dbh = $conexion->get_conexion();
		$sql = "Select * from cliente where id=:id";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":id",$id);
		$stmt->execute();
		$data = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->id = $data['id'];
		$this->nombre = $data['nombre'];
		$this->apellido = $data['apellido'];
		$this->correo = $data['correo'];
		$this->fechaNac = $data['fecha_nac'];
	}
// verifica a que chats pertenece el Cliente con su nombre y apellido y luego se usa para mostrar estos chats con el nombre de el otro partipante
	public function verChat($name,$ape){
		$conexion = new Conexion();
	$dbh = $conexion->get_conexion();
	$sql = "Select * from chat where nameC=:name and apeC=:apeC";
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(":name",$name);
	$stmt->bindParam(":apeC",$ape);
	$stmt->execute();
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $data;
	}

		//Todas la funciones get del cliente
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

		public function getEstado(){
			return $this->estado;	
		}
	}

?>
