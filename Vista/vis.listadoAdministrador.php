<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/viss.listadoAdministrador.css">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
    <script defer src="../JavaScript/menuHamburguesa.js"></script>
    <title>Administradores-Listado</title>
    <!--<?php
        require_once('../modelo/class.conexion.php');
        require_once('../modelo/class.administrador.php');
        require_once('../modelo/class.userSession.php');

        $adm = new Administrador();
        $userSession = new userSession();

        //verifica si la sesion esta iniciada
        if(isset($_SESSION['admin'])){
            $adm->setAdm($userSession->getCurrentAdm());	
        }else{
            header('location: ../vistas/vis.inicioSesion.php');
        }
	?>-->
</head>
<body>
    <div class="containerKing">
        <div class="header">
            <h3 class="nombreUsuario">Bienvenido: <!--<?php echo $prof->getNombre(). ' ' .$prof->getApellido();; ?>--> </h3>
            <button class="endSesion"><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
        </div>
        <header class="encabezado">
            <nav class="navigationBar">
                <button class="nav-toggle" aria-label="Abrir menú"><i class="fas fa-bars"></i></button>
                <ul class="navButtons">
                    <a href="vis.perfilAdministrador.html" class="links"><li class="buttons">Información General</li></a>
                    <a href="#" class="links"><li class="buttonActive">Administradores</li></a>
                    <a href="#" class="links"><li class="buttons">Reportes</li></a>
                </ul>
            </nav>
        </header>
        <div class="header2">
            <h3 class="nombreUsuario">Bienvenido: <!--<?php echo $prof->getNombre(). ' ' .$prof->getApellido();; ?>--> </h3>
            <button class="endSesion"><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
        </div>
        <div class="container">
            <div class="contInfo">
                <div class="contDetails">
                    <div class="contInfoTitulo">
                        <h2>Administradores</h2>
                    </div>
                </div>          
            </div>
            <div class="admins">
                <div class="contName">
                    <h4>Administrador:</h4>
                    <h3><?php echo $adm->getNombre()?></h3>
                </div>
                <div class="contName">
                    <h4>Administrador:</h4>
                    <h3><?php echo $adm->getNombre()?></h3>
                </div>
                <div class="contName">
                    <h4>Administrador:</h4>
                    <h3><?php echo $adm->getNombre()?></h3>
                </div>
                <div class="contNameF">
                    <h4>Administrador:</h4>
                    <h3><?php echo $adm->getNombre()?></h3>
                </div>
            </div>
            <button class="endSesion2"><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
        </div>
    </div>
</body>
</html>