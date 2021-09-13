<?php
require_once("../modelo/class.conexion.php");
require_once("../modelo/class.cliente.php");
require_once("../modelo/class.publicacion.php");
require_once("../modelo/class.userSession.php");

$clnt = new Cliente();
$userSession = new userSession();

$titulo = isset($_POST['titulo'])?$_POST['titulo']:"";
$descripcion = isset($_POST['descripcion'])?$_POST['descripcion']:"";
$precio = isset($_POST['precio'])?$_POST['precio']:"";

if(isset($_SESSION['cliente'])){
	$clnt->setCliente($userSession->getCurrentCliente());
	$id = $clnt->getId();
	try{
		$clnt->datosPubli($titulo,$descripcion,$precio);
		$clnt->nuevaPubli();
		header("location: ../vistas/vis.publicaciones.php");
	}catch(Exception $e){
		$errorDatos = $e->getMessage();
		include '../vistas/vis.publicaciones.php';
	}
}else{
	header("location: ../vistas/vis.inicioSesion.php");
}

?>
