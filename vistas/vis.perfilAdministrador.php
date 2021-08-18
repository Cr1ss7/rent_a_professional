<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Vis.PerfilAdmin.css">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
	<?php
	require_once('../modelo/class.conexion.php');
	require_once('../modelo/class.administrador.php');
	require_once('../modelo/class.userSession.php');

	$adm = new Administrador();
	$userSession = new userSession();

	if(isset($_SESSION['admin'])){
		$adm->setAdm($userSession->getCurrentAdm());	
	}else{
		header('location: ../vistas/vis.inicioSesion.php');
	}
	?>
</head>
<body>
    <div class="containerKing">
        <div class="header">
		<h3 class="nombreUsuario"><?php $adm->getNombre() . $adm->getApellido()?></h3>
            <a class="endSesion" href="../controlador/cerrarSesion.php">Cerrar Sesión</a>    
        </div>
        <nav class="navigationBar">
            <ul class="navButtons">
                <a href="#" class="links"><li class="buttonActive">Información General</li></a>
                <a href="#" class="links"><li class="buttons">Reportes</li></a>
                <a href="#" class="links"><li class="buttons">Administradores</li></a>
            </ul>
        </nav>
        <div class="container">
            <div class="container2">
                <div class="subContainer">
                    <div class="contProfile">
                        <div class="contProfTit">
                            <h2>Administrador</h2>
                        </div>
                        <div class="contenidoProfile">
                            <div class="contFormProfile">
                                <img src="img/foto-perfil.png" alt="Foto Perfil" class="fotoPerfil">
                                <input type="file" name="subir" value="Cambiar foto de perfil" class="submitFoto" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contInfo">
                <div class="contDetails">
                    <div class="contInfoTitulo">
                        <h2>Información de Contacto</h2>
                        <button class="edit">editar</button>
                    </div>
                    <div class="contName">
                        <h4>Nombre:</h4>
						<h3><?php $adm->getNombre()?></h3>
                    </div>
                    <div class="contLastN">
                        <h4>Apellido:</h4>
						<h3><?php $adm->getApellido()?></h3>
                    </div>
                    <div class="contEmail">
                        <h4>Correo Electrónico:</h4>
						<h3><?php $adm->getCorreo()?></h3>
                    </div>
                    <div class="contDate">
                        <h4>Fecha de Nacimiento:</h4>
						<h3><?php $adm->getFechaNac();?></h3>
                    </div>
                </div>          
            </div>
        </div> 
    </div>   
</body>
</html>

