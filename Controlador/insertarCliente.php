<?php
require_once('../modelo/class.conexion.php');
require_once('../modelo/class.cliente.php');
require_once('../modelo/class.userSession.php');

$clnt = new Cliente();

//Se instancian las variables
$name = isset($_POST['nombre'])?$_POST['nombre']:"";
$ape = isset($_POST['apellido'])?$_POST['apellido']:"";
$mail = isset($_POST['mail'])?$_POST['mail']:"";
$pass = isset($_POST['pass'])?$_POST['pass']:"";
$passV = isset($_POST['passV'])?$_POST['passV']:"";
$fechaN = isset($_POST['fechaNac'])?$_POST['fechaNac']:"";

try{
	//Se verifican las variables
	$clnt->veriCliente($name, $ape, $mail, $pass, $passV, $fechaN);
	$clnt->nuevoCliente();
	//Se prepara la sesion
	$userSession = new userSession();
	$clnt->setCliente($mail);
	$userSession->setCurrentCliente($mail);

}catch(Exception $e){
	$errorReg = $e->getMessage();
	include_once '../vistas/vis.registroCliente.php';
}
?>
