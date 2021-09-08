<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/vis.perfilAdministrador.css?v=<?php echo time();?>"/>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
    <script defer src="../JavaScript/menuHamburguesa.js"></script>
    <title>Administradores</title>
	<?php
        require_once('../modelo/class.conexion.php');
        require_once('../modelo/class.administrador.php');
        require_once('../modelo/class.publicacion.php');
        require_once('../modelo/class.userSession.php');

		error_reporting(0);

        $userSession = new userSession();
		$id = $_GET['id'];

        //verifica si la sesion esta iniciada
        if(isset($_SESSION['admin']) && !isset($id)){
        	$adm = new Administrador();
            $adm->setAdm($userSession->getCurrentAdm());	
		}elseif(isset($_SESSION['admin']) && isset($id)){
			$adm = new Administrador();
			$adm->mostrarPerfil($id);
		}else{
            header('location: ../vistas/vis.inicioSesion.php');
        }
	?>
</head>
<body>
    <div class="containerKing">
        <div class="header">
			<h3 class="nombreUsuario">Bienvenido: <?php echo $adm->getNombre(). ' ' .$adm->getApellido(); ?></h3>
            <button class="endSesion"><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
        </div>
        <header class="encabezado">
            <nav class="navigationBar">
                <button class="nav-toggle" aria-label="Abrir menú"><i class="fas fa-bars"></i></button>
                <ul class="navButtons">
                    <a href="#" class="links"><li class="buttonActive">Información General</li></a>
                    <a href="vis.listadoAdministrador.html" class="links"><li class="buttons">Administradores</li></a>
                    <a href="#" class="links"><li class="buttons">Reportes</li></a>
                </ul>
            </nav>
        </header>
        <div class="header2">
            <h3 class="nombreUsuario">Bienvenido: <?php echo $adm->getNombre(). ' ' .$adm->getApellido(); ?> </h3>
            <button class="endSesion"><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
        </div>
        <div class="container">
            <div class="container2">
                <div class="subContainer">
                    <div class="contProfile">
                        <div class="contProfTit">
                            <h2>Administrador</h2>
                        </div>
                        <div class="contenidoProfile">
                            <div class="contFormProfile">
                                <img src="../img/foto-perfil.png" alt="Foto Perfil" class="fotoPerfil">
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
                    </div>
                    <div class="contName">
                        <h4>Nombre:</h4>
                        <h3><?php echo $adm->getNombre()?></h3>
                    </div>
                    <div class="contLastN">
                        <h4>Apellido:</h4>
                        <h3><?php echo $adm->getApellido()?></h3>
                    </div>
                    <div class="contEmail">
                        <h4>Correo Electrónico:</h4>
                        <h3><?php echo $adm->getCorreo()?></h3>
                    </div>
                    <div class="contDate">
                        <h4>Fecha de Nacimiento:</h4>
                        <h3><?php echo $adm->getFechaNac();?></h3>
                    </div>
                </div>          
            </div>
            <button class="endSesion2"><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
        </div>
    </div>
</body>
</html>
