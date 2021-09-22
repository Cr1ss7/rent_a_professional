<?php session_start(); ?>
<?php
require_once('../modelo/class.conexion.php');
require_once('../modelo/class.chat.php');
require_once('../modelo/class.userSession.php');
require_once('../modelo/class.cliente.php');
require_once('../modelo/class.profecional.php');

$chat = new Chat();
$userSession = new userSession();
$id = $_GET['id'];
$msg = $_POST['msg'];

if(isset($_SESSION['cliente'])){
	$clnt = new Cliente();
	$clnt->setCliente($userSession->getCurrentCliente());
	$chat->enviarMsg($clnt->getNombre(), $msg,$id,$clnt->getId(),0);	
	header("location: ../vistas/vis.chat.php?id=".$id);
}elseif(isset($_SESSION['profesional'])){
	$prof= new Profesional();
	$prof->setProfesional($userSession->getCurrentProfesional());
	$chat->enviarMsg($prof->getNombre(), $msg,$prof->getId(),$id,1);	
	header("location: ../vistas/vis.chat.php?id=".$id);
}else
	header("location: ../vistas/vis.inicioSesion.php");

?>
