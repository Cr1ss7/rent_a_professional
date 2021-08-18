<?php
	require_once('../modelo/class.conexion.php');
	require_once('../modelo/class.curriculo.php');
	require_once('../modelo/class.profecional.php');
	require_once('../modelo/class.userSession.php');

	error_reporting(0);

	$mensajeDoc = null;
	$prof = new Profesional();
	$userSesion = new UserSession();
	$prof->setProfesional($userSesion->getCurrentProfesional());
	$dir = 'c:/xampp/htdocs/RAP/uploads/';

	$id = $prof->getId();

	$name = basename($_FILES['curriculo']['name']);
	$ext = strtolower(pathinfo($name,PATHINFO_EXTENSION));
	$tmp = $_FILES['curriculo']['tmp_name'];

	try{
	$curriculo = new Curriculo($id,$name, $ext);
	$curriculo->setRoute();
	$mensajeDoc = $curriculo->docProfesional();		
	move_uploaded_file($_FILES['curriculo']['tmp_name'],$dir.$id.'/'.$name);
	echo $mensajeDoc;
	}catch (Exception $e){
		$e->getMessage();
	}
	

?>
