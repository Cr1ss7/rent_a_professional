<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Reportes.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
    <script defer src="../JavaScript/menuHamburguesa.js"></script>
    <title>Reportes</title>
    <?php
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
	?>
</head>
<body>
    <div class="containerKing">
        <div class="header">
            <h3 class="nombreUsuario">Bienvenido: <?php echo $adm->getNombre() ." " . $adm->getApellido()?></h3>
            <button class="endSesion"><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
        </div>
        <header class="encabezado">
            <nav class="navigationBar">
                <button class="nav-toggle" aria-label="Abrir menú"><i class="fas fa-bars"></i></button>
                <ul class="navButtons">
                <a href="vis.perfilAdministrador.php" class="links"><li class="buttons">Perfil</li></a>
                <a href="#" class="links"><li class="buttonActive">Reportes</li></a>
                <a href="vis.listadoAdministrador.php" class="links"><li class="buttons">Administradores</li></a>
                </ul>
            </nav>
        </header>
        <div class="header2">
            <h3 class="nombreUsuario">Bienvenido:</h3>
            <button class="endSesion"><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
        </div>
        <div class="Reportes">
            <?php
                require_once '../modelo/Class.MostrarReportes.php';
                $a  = new Mostrar();
                $reporte = $a->mostrarReportes();
                foreach($reporte as $mostrar)
                echo '<div class="ReportesCont">'.
                        '<h3 class="UsuName">'.'JUAN'.'</h3>'.
                        '<h4 class="ReportTitulo">'. $mostrar['titulo']. '</h4>'.
                        '<p>'.$mostrar['descripcion'].'</p>'.
                        '<h4 class="Reportado">'.'MARIO'.'</h4>'.  
                        '<button class="butdelete">Eliminar</button>'.
                        '<button class="butbanear">Banear</button>'.
                    '</div>';
                
            ?>
        </div>
    </div>
</body>
</html>