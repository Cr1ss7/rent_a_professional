<?php session_start(); ?>
<?php
require_once("../modelo/class.conexion.php");
require_once("../modelo/class.cliente.php");
require_once("../modelo/class.publicacion.php");
require_once("../modelo/class.userSession.php");

$clnt = new Cliente();
$userSession = new userSession();
$publi = new Publicacion();
$titulo = isset($_POST['titulo'])?$_POST['titulo']:"";
$descripcion = isset($_POST['descripcion'])?$_POST['descripcion']:"";
$precio = isset($_POST['precio'])?$_POST['precio']:"";
$action = isset($_REQUEST['accion'])?$_REQUEST['accion']:"";
$idP = isset($_GET['id'])?$_GET['id']:"";

if(isset($_SESSION['cliente'])){
	// si empty tiene !empty regresa true cuando variable existe y tiene un valor no nulo, en el caso de empty regresa un false con ese mismo caso
	if(empty($action)){
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
		if($action=="eliminarP"){
			$clnt->deletePubli($idP);
			header("location: ../vistas/vis.Mispublicaciones.php");
	    }elseif($action=="PetiEnd"){
			$clnt->estadoPubli($idP);
			header("location: ../vistas/vis.Mispublicaciones.php");
		}
}
}else{
	header("location: ../vistas/vis.inicioSesion.php");
}

?>
