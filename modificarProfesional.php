<?php
require_once("../modelo/class.conexion.php");
require_once("../modelo/class.profecional.php");
require_once("../modelo/class.userSession.php");

error_reporting(0);

$prof= new Profesional();
$userSession = new userSession();

if(isset($_SESSION['profesional'])){
		//echo "hay sesion de un profecional";
		$prof->setProfesional($userSession->getCurrentProfesional());
		if(strlen($_POST['nombre'])>0 && strlen($_POST['apellido'])>0 && strlen($_POST['mail'])>0){
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$correo = $_POST['mail'];

			try{
				$prof->modificarPro($nombre,$apellido,$correo);
				echo "Modificacion exitosa";
				echo "<a href='../controlador/cerrarSesion.php'>Volver a inicia sesión</a>";
			}catch(Exception $e){
				$errorModificar = $e->getMessage();
			}
		}
}else{
	header("location: ../vistas/vis.inicioSesion.php");
}

?>
