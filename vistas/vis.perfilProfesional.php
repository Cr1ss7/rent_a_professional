<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/vis.perfilProfesional.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
    <script defer src="../JavaScript/menuHamburguesa.js"></script>
    
    <?php
        require_once('../modelo/class.conexion.php');
        require_once('../modelo/class.profecional.php');
        require_once('../modelo/class.userSession.php');

		error_reporting(0);

        $userSession = new userSession();
		$id = $_GET['id'];

        if(isset($_SESSION['profesional']) && !isset($id)){
        	$prof = new Profesional();
            $prof->setProfesional($userSession->getCurrentProfesional());	
		}elseif(isset($_SESSION['profesional']) && isset($id) || isset($_SESSION['cliente']) && isset($id)){
			$prof = new Profesional();
			$prof->mostrarPerfil($id);
			$userV = true;
		}else{
            header("location: ../vistas/vis.inicioSesion.php");
        }
    ?>
</head>
<body>
    <div class="containerKing">
        <div class="header">
            <h3 class="nombreUsuario"><?php if($userV != true) echo "Bienvenido:" ?> <?php echo $prof->getNombre(). ' ' .$prof->getApellido();; ?> </h3>
            <button class="endSesion"><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
        </div>
        <header class="encabezado">
            <nav class="navigationBar">
                <button class="nav-toggle" aria-label="Abrir menú"><i class="fas fa-bars"></i></button>
                <ul class="navButtons">
                    <a href="vistaPublicacionesPro.html" class="links"><li class="buttons">Inicio</li></a>
                    <a href="vistaChatPro.html" class="links"><li class="buttons">Chat</li></a>
                    <a href="#" class="links"><li class="buttonActive">Perfil</li></a>
                </ul>
            </nav>
        </header>
        <div class="header2">
            <h3 class="nombreUsuario">Bienvenido: <?php echo $prof->getNombre(). ' ' .$prof->getApellido();; ?> </h3>
            <button class="endSesion"><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
        </div>
        <div class="container">
            <div class="container2">
                <div class="subContainer">
                    <div class="contProfile">
                        <div class="contProfTit">
                            <h2>Profesional</h2>
                        </div>
                        <div class="contenidoProfile">
                            <div class="contFormProfile">
                                <img src="../img/foto-perfil.png" alt="Foto Perfil" class="fotoPerfil">
                                <input type="file" name="subir" value="Cambiar foto de perfil" class="submitFoto" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="calification">
                    <div class="rate">
                        <h2>Calificación:</h2>
                    </div>
                    <div class="rating">
                        <!--<input type="radio" name="star" id="star1" checked="checked">-->
                        <label for="star1"><span class="fa fa-star" id="star" onclick="rate(this)"></span></label>

                        <!--<input type="radio" name="star" id="star2">-->
                        <label for="star2"><span class="fa fa-star" id="star" onclick="rate(this)"></span></label>

                        <!--<input type="radio" name="star" id="star3">-->
                        <label for="star3"><span class="fa fa-star" id="star" onclick="rate(this)"></span></label>

                        <!--<input type="radio" name="star" id="star4">-->
                        <label for="star4"><span class="fa fa-star" id="star" onclick="rate(this)"></span></label>

                        <!--<input type="radio" name="star" id="star5">-->
                        <label for="star5"><span class="fa fa-star" id="star" onclick="rate(this)"></span></label>
                    </div>
                    <!--Script para validar el sistema de califiación-->
                    <script></script>
                </div>
            </div>
            <div class="contInfo">
                <div class="contDetails">
                    <div class="contInfoTitulo">
                        <h2>Información de Contacto</h2>
					<?php if($userV != true) echo '<a href="vis.menuModificacionDatos.php" class="edit">editar</a>'?>
                    </div>
                    <div class="contName">
                        <h4>Nombre:</h4>
                        <h3><?php echo $prof->getNombre(); ?></h3>
                    </div>
                    <div class="contLastN">
                        <h4>Apellido:</h4>
                        <h3><?php echo $prof->getApellido(); ?></h3>
                    </div>
                    <div class="contEmail">
                        <h4>Correo Electrónico:</h4>
                        <h3><?php echo $prof->getCorreo(); ?></h3>
                    </div>
                    <div class="contDate">
                        <h4>Fecha de Nacimiento:</h4>
                        <h3><?php echo $prof->getFechaNac(); ?></h3>
                    </div>
                    <div class="curriculum">
                        <h4>Curriculum:</h4>
                        <input type="file">
                    </div>
                </div>          
            </div>
            <button class="endSesion2"><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
        </div> 
    </div>   
</body>
</html>

