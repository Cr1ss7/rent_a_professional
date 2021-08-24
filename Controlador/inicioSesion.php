<?php
	require_once ('../modelo/class.conexion.php');
	require_once ('../modelo/class.profecional.php');
	require_once ('../modelo/class.cliente.php');
	require_once ('../modelo/class.userSession.php');

	$userSession = new userSession();
	$prof = new Profesional(); 
	$clnt = new Cliente();

	if(isset($_SESSION['profesional'])){
		//echo "hay sesion de un profecional";
		$prof->setProfesional($userSession->getCurrentProfesional());
		include_once '../vista/vis.perfilProfesional.php';
	}elseif(isset($_SESSION['cliente'])){
		$clnt->setCliente($userSession->getCurrentCliente());
		//include_once '../vistas/vis.perfilProfesional.php';
		echo "hay sesion de cliente";
	}elseif(isset($_POST['mail']) && isset($_POST['pass'])){
		//echo "Validacion de login";	

		$userForm = $_POST['mail'];
		$passForm = $_POST['pass'];

		if($prof->profesionalExt($userForm, $passForm)){
			//echo "usuario validado";
			$userSession->setCurrentProfesional($userForm);
			$prof->setProfesional($userForm);
			//include '../vistas/vis.perfilProfesional.php';
			header('location: ../vista/vis.perfilProfesional.php');
		}elseif($clnt->clienteExt($userForm,$passForm)){
			$userSession->setCurrentCliente($userForm);
			$clnt->setCliente($userForm);
			//include '../vistas/vis.perfilProfesional.php';
			echo "cliente";
		}else{
			$errorlogin = "nombre de usuario y/o password es incorrecto";
			include '../vista/vis.inicioSesion.php';
		}
	}else{
		echo "login";
		include_once '../vista/vis.inicioSesion.php';
	}
?>
