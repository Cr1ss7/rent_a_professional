<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/vis.perfilProfesional.css">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
<?php
require_once('../modelo/class.conexion.php');
require_once('../modelo/class.profecional.php');
require_once('../modelo/class.userSession.php');

$prof = new Profesional();
$userSession = new userSession();

if(isset($_SESSION['profesional'])){
	$prof->setProfesional($userSession->getCurrentProfesional());	
}else{
	header("location: ../vistas/vis.inicioSesion.php");
}
?>

</head>
<body>
    <div class="header">
	<h3 class="nombreUsuario">Bienvenido <?php echo $prof->getNombre(). ' ' .$prof->getApellido();; ?><h3>
        <a class="endSesion" href="../controlador/cerrarSesion.php">Cerrar Sesión</a>    
    </div>
    <nav class="navigationBar">
        <ul class="navButtons">
            <a href="#" class="links"><li class="buttonActive">Información General</li></a>
            <a href="#" class="links"><li class="buttons">Seguridad</li></a>
        </ul>
    </nav>
    <div class="container">
        <div class="container2">
            <div class="subContainer">
                <div class="contProfile">
                    <div class="contProfTit">
                        <h2>Profesional</h2>
                    </div>
                    <form method="POST" action="" enctype="multipart/form-data">
                        <input type="file" name="imagen">
                        <input type="submit" name="subir" value="Cambiar foto de perfil">
                    </form>
                </div>
            </div>
            <div class="calification">
                <div class="rate">
                    <h2>Calificación</h2>
                </div>
                <div class="rating">
                    <input type="radio" name="star" id="star1" checked="checked">
                    <label for="star1"><img src="../css/img/1.png" height="70px" width="70px"><h4>Terrible</h4></label>
                    <input type="radio" name="star" id="star2">
                    <label for="star2"><img src="../css/img/2.png" height="70px" width="70px"><h4>Malo</h4></label>
                    <input type="radio" name="star" id="star3">
                    <label for="star3"><img src="../css/img/3.png" height="70px" width="70px"><h4>Bueno</h4></label>
                    <input type="radio" name="star" id="star4">
                    <label for="star4"><img src="../css/img/4.png" height="70px" width="70px"><h4>Exelente</h4></label>
                    <input type="radio" name="star" id="star5">
                    <label for="star5"><img src="../css/img/5.png" height="70px" width="70px"><h4>Espectacular</h4></label>
                </div>
            </div>
        </div>
        <div class="contInfo">
            <div class="contDetails">
                <div class="contInfoTitulo">
                    <h2>Información de Contacto</h2>
                    <a href="../vistas/vis.modificarProfesional.php">editar</a>
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
                <div class="aboutMe">
                    <h4>Sobre mi:</h4>
                    <input type="text">
                </div>
            </div>          
        </div>
    </div>    
</body>
</html>

