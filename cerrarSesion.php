<?php
	require_once('../modelo/class.userSession.php');

	$userSession = new userSession();
	$userSession->closeSession();

	header('location: ../vistas/vis.inicioSesion.php');

?>
