<?php session_start(); ?>
<?php
	require_once ('../modelo/class.conexion.php');
	require_once ('../modelo/class.profecional.php');
	require_once ('../modelo/class.cliente.php');
	require_once ('../modelo/class.administrador.php');
	require_once ('../modelo/class.userSession.php');

	$userSession = new userSession();
	$prof = new Profesional(); 
	$clnt = new Cliente();
	$adm = new Administrador();

	//Se verifica si hay algun tipo de sesion iniciada
	if(isset($_SESSION['profesional'])){
		//echo "hay sesion de un profecional";
		$prof->setProfesional($userSession->getCurrentProfesional());
		header("location: ../vistas/vis.perfilProfesional.php");
	}elseif(isset($_SESSION['cliente'])){
		$clnt->setCliente($userSession->getCurrentCliente());
		header('location: ../vistas/vis.perfilCliente.php');
	}elseif(isset($_SESSION['admin'])){
		$adm->setAdm($userSession->getCurrentAdm());
		//echo "hay sesion de adm";
		header("location: ../vistas/vis.perfilAdministrador.php");
	}elseif(isset($_POST['mail']) && isset($_POST['pass'])){ //Si no hay ninguna sesion iniciada verifica los datos
		//echo "Validacion de login";	

		$userForm = $_POST['mail'];
		$passForm = $_POST['pass'];


		//Busca al usuario existente
		//Profesional
		if($prof->profesionalExt($userForm, $passForm)){
				$prof->setProfesional($userForm);
				$estado = $prof->getEstado();
			if ($estado == "0"){
				$userSession->setCurrentProfesional($userForm);
				$prof->setProfesional($userForm);
				header('location: ../vistas/vis.perfilProfesional.php');
			}else{
				$errorlogin = "Esta cuenta ha sido baneada";
				include '../vistas/vis.inicioSesion.php';
			}
			//include '../vistas/vis.perfilProfesional.php';
		//Cliente
		}elseif($clnt->clienteExt($userForm,$passForm)){
			$clnt->setCliente($userForm);
			$estado=$clnt->getEstado();
			if ($estado == "0"){
				$userSession->setCurrentCliente($userForm);
				header('location: ../vistas/vis.perfilCliente.php');
				$prof->setProfesional($userForm);
			}else{
				$errorlogin = "Esta cuenta ha sido baneada";
				include '../vistas/vis.inicioSesion.php';
			}
		//Administrador
		}elseif($adm->admExt($userForm,$passForm)){
            $userSession->setCurrentAdm($userForm);
            $adm->setAdm($userForm);
            $aumento = $adm->admAumento($userForm);
            $contador = $adm->getContador();
            if($contador == 0){
                $aumento;
                //echo $contador;
                //header("location: ../vistas/vis.modificarContrasena.php");
                $cambio = '<script>alert("Debido a que su cuenta fue creada por un usuario ajeno, debera cambiar su contraseña por seguridad.");</script>';
                include '../vistas/vis.modificarContrasena.php';
            }else{
                //echo "Sesion de adm";
                header("location: ../vistas/vis.perfilAdministrador.php");

            }
		}else{ //Redirecciona al inicio de sesion
			$errorlogin = "nombre de usuario y/o password es incorrecto";
			include '../vistas/vis.inicioSesion.php';
		}
	}else{
		echo "login";
		include_once '../vistas/vis.inicioSesion.php';
	}
?>
