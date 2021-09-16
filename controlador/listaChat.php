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
$idP = isset($_GET['idP'])?$_GET['idP']:"";
$idC = isset($_GET['idC'])?$_GET['idC']:"";
$apeC = isset($_GET['ApeC'])?$_GET['ApeC']:"";
$apeP = isset($_GET['apeP'])?$_GET['apeP']:"";

$msg = "Hola Estoy Interesado en el trabajo";

$veri = $chat->veriChat($nameP,$nameC,$apeP, $apeC);
try{
		if(!empty($veri['nameP']) && !empty($veri['nameC']) && !empty($veri['apeP']) && !empty($veri['apeC'])){
			header("location:../vistas/vis.chat.php?id=". $idC);
		}else{
			$chat->CrearChat($nameC,$nameP,$idC,$idP,$apeP,$apeC);
			header("location:../vistas/vis.chat.php?id=". $idC);
} catch (Exception $e) {
	echo  "ekisde" . $e->getMessage();
}


?>