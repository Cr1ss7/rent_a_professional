<?php
require_once("../modelo/class.conexion.php");
require_once("../modelo/class.administrador.php");
require_once("../modelo/class.userSession.php");

$adm = new Administrador();

$mensaje = null;

//Datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$pass = $_POST['pass'];
$pass2 = $_POST['passV'];
$fechaNac = $_POST['fechaNac'];

try{
	//verifica los datos
	$adm->veriAdm($nombre,$apellido,$correo,$pass,$pass2,$fechaNac);
	//Crea un nuevo Administrador
	$mensaje = $adm->nuevoAdm();	
	//Se inicia la sesion
	$userSession = new userSession();
	$adm->setAdm($correo);
	$userSession->setCurrentAdm($correo);
	//echo $mensaje;
	header('location: ../vistas/vis.perfilAdministrador.php');
}catch(Exception $e){
	//Mensaje de error
	$errorReg = $e->getMessage();
	include_once '../vistas/vis.registroAdm.php';
}

?>
