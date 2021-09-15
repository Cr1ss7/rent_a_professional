<?php
require_once('../modelo/class.conexion.php');
require_once('../modelo/class.chat.php');
require_once('../modelo/class.userSession.php');
require_once('../modelo/class.cliente.php');
require_once('../modelo/class.profecional.php');

$chat = new Chat();
$userSession = new userSession();
$nameC = isset($_GET['nameC'])?$_GET['nameC']:"";
$nameP = isset($_GET['NameProf'])?$_GET['NameProf']:"";
$idC = isset($_GET['idC'])?$_GET['idC']:"";
$idP = isset($_GET['idP'])?$_GET['idP']:"";
$msg = "Hola Estoy Interesado en el trabajo";

$veri = $chat->veriChat($nameP,$nameC);
try{
		if(!empty($veri['de']) && !empty($veri['para'])){
			header("location:../vistas/vis.publicaciones.php");
		}else{
			$chat->CrearChat($nameC,$nameP,$idC,$idP);
			header("location:../vistas/vistas.listadoProfesional.php");
		}
} catch (Exception $e) {
	echo  "ekisde" . $e->getMessage();
}


?>