<?php
	require_once('../modelo/class.conexion.php');
	require_once('../modelo/class.userSession.php');
	require_once('../modelo/class.profecional.php');
	require_once('../modelo/class.curriculo.php');
	
	$profesional = new Profesional();

	$mensaje = null;
	
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$correo = $_POST['correo'];
	$pass = $_POST['pass'];
	$pass2 = $_POST['pass2'];
	$profesion = $_POST['profesion'];
	$fecha_nac = $_POST['fecha_nac'];

	try{
		$profesional->veriProfesional($nombre,$apellido,$correo,$pass,$pass2,$profesion,$fecha_nac);
		if(!$profesional->searchProf($correo)){
			$mensaje = $profesional->nuevoProfecional();
			//sesion del usuario
			$userSesion = new UserSession(); 
			$profesional->setProfesional($correo);
			$userSesion->setCurrentProfesional($correo);
			header('location: ../vistas/vis.regDocProfesional.php');
		}else{
			$errorLlenado = "El correo ya se encuentra en uso"; 
			include_once '../vistas/vis.registroProfesional.php';
		}
	}catch(Exception $e){
		$errorLlenado = $e->getMessage();
		include_once '../vistas/vis.registroProfesional.php';
	}

	echo $mensaje;

?>
