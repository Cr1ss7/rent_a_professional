<?php
    require_once("../modelo/class.conexion.php");
    require_once("../modelo/class.profecional.php");
    require_once("../modelo/class.cliente.php");
    require_once("../modelo/class.userSession.php");

    $prof= new Profesional();
	$clnt = new Cliente();
    $userSession = new userSession();

    if(isset($_SESSION['profesional'])){
        //echo "Se encuentra una sesion";
        $prof -> setProfesional($userSession -> getCurrentProfesional());
        if(strlen($_POST['password'])>0){
            $contrasena = $_POST['password'];
            try{
                $prof -> modifyPass($contrasena);
                header("location: ../controlador/cerrarSesion.php");
            }catch(Exception $e){
                echo $e -> getMessage();
            }
        }
	}elseif(isset($_SESSION['cliente'])){
		$clnt->setCliente($userSession->getCurrentCliente());
		if(strlen($_POST['password'])>0){
            $contrasena = $_POST['password'];
            try{
                $prof -> modifyPass($contrasena);
                header("location: ../controlador/cerrarSesion.php");
            }catch(Exception $e){
                echo $e -> getMessage();
            }
        }
	}else{
        header("location: ../vista/vis.inicioSesion.php");
    }
?>
