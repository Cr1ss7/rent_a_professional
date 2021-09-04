<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/vis.perfilCliente.css">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
    <script defer src="../JavaScript/menuHamburguesa.js"></script>
	<?php
	require_once('../modelo/class.conexion.php');
	require_once('../modelo/class.cliente.php');
	require_once('../modelo/class.userSession.php');

	$clnt = new Cliente();
	$userSession = new userSession();

	if(isset($_SESSION['cliente'])){
		$clnt->setCliente($userSession->getCurrentCliente());
	}else{
		header('location: ../vistas/vis.inicioSesion.php');
	}
	?>
</head>
<body>
    <div class="containerKing">
        <div class="header">
		<h3 class="nombreUsuario">Bienvenido: <?php echo $clnt->getNombre() . " " . $clnt->getApellido() ?></h3>
            <button class="endSesion"><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
        </div>
        <header class="encabezado">
            <nav class="navigationBar">
                <button class="nav-toggle" aria-label="Abrir menú"><i class="fas fa-bars"></i></button>
                <ul class="navButtons">
                    <a href="vistaPublicaciones.html" class="links"><li class="buttons">Inicio</li></a>
                    <a href="vistaChat.html" class="links"><li class="buttons">Chat</li></a>
                    <a href="#" class="links"><li class="buttonActive">Perfil</li></a>
                </ul>
            </nav>
        </header>
        <div class="header2">
            <h3 class="nombreUsuario">Bienvenido:</h3>
            <button class="endSesion"><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
        </div>
        <div class="container">
            <div class="container2">
                <div class="subContainer">
                    <div class="contProfile">
                        <div class="contProfTit">
                            <h2>Cliente</h2>
                        </div>
                        <div class="contenidoProfile">
                            <div class="contFormProfile">
                                <img src="../css/img/foto-perfil.png" alt="Foto Perfil" class="fotoPerfil">
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
						<h3><?php echo $clnt->getNombre()?></h3>
                    </div>
                    <div class="contLastN">
                        <h4>Apellido:</h4>
                        <h3><?php echo $clnt->getApellido()?></h3>
                    </div>
                    <div class="contEmail">
                        <h4>Correo Electrónico:</h4>
                        <h3><?php echo $clnt->getCorreo()?></h3>
                    </div>
                    <div class="contDate">
                        <h4>Fecha de Nacimiento:</h4>
                        <h3><?php echo $clnt->getFechaNac()?></h3>
                    </div>
                </div>          
            </div>
            <button class="endSesion2"><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
        </div> 
    </div>   
</body>
</html>

