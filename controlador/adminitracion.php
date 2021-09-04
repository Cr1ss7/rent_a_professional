<?php
require_once('../modelo/class.conexion.php');
require_once('../modelo/class.administrador.php');

$accion = isset($_REQUEST['accion'])?$_REQUEST['accion']:"";
$id = isset($_GET['id'])?$_GET['id']:"";

if($id != "" && $accion=="eliminar"){
	$adm = new Administrador();
	try{
	$adm->eliminarCliente($id);
	echo "Se ha eliminado correctamente";
	echo "<a href='../vistas/vis.administracion.php'>Volver al listado</a>";	
	}catch (Exception $e){
		$error = $e->getMessage();
		echo $error;
	}
}else{
	echo "error"; 
}
?>
