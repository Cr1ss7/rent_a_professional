<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/vis.publicaciones.css">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
    <script defer src="../JavaScript/menuHamburguesa.js"></script>
    <title>Document</title>
	<?php
	require_once("../modelo/class.conexion.php");
	require_once("../modelo/class.cliente.php");
	require_once("../modelo/class.publicacion.php");
	require_once("../modelo/class.userSession.php");

	$clnt = new Cliente();
	$userSession = new userSession();
	$data = new Publicacion();

	if(isset($_SESSION['cliente']))
		$clnt->setCliente($userSession->getCurrentCliente());
	else
		header("location: ../vistas/vis.inicioSesion.php");
	?>
</head>
<body>
    <!-- seccion de menu-->
    <div class="containerKing">
        <div class="header">
		<h3 class="nombreUsuario">Bienvenido: <?php echo $clnt->getNombre() . " " . $clnt->getApellido()?></h3>
            <button class="endSesion"><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
        </div>
        <header class="encabezado">
            <nav class="navigationBar">
                <button class="nav-toggle" aria-label="Abrir menú"><i class="fas fa-bars"></i></button>
                <ul class="navButtons">
                    <a href="#" class="links"><li class="buttonActive">Inicio</li></a>
                    <a href="vistaChat.html" class="links"><li class="buttons">Chat</li></a>
                    <a href="vis.perfilCliente.html" class="links"><li class="buttons">Perfil</li></a>
                </ul>
            </nav>
        </header>
        <!-- seccion de boton de publicaciones-->
        <div class="header2">
		<h3 class="nombreUsuario">Bienvenido:<?php echo $clnt->getNombre(). " " . $clnt->getApellido()?></h3>
            <button class="endSesion"><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
        </div>



    
    
        <div class="containerHijo1">
            
            <button onclick="location.href='#popup'" class="publicar">Publicar</button>
        </div>
       

        <!-- seccion de cuadro de publicaciones-->
        <div class="containerHijo2">
           
            <div class="publicaciones">
                <?php
				$publi = $data->mostrarPubli();
  
                  foreach($publi as $peticion){
            echo "<div class='publicacionesCont'>".
                "<div class='containerDatosCliente'>".
            
                "<h5>". $data->getNombreCompleto($peticion['idcliente'])."</h5>".
                "</div>".
                "<div class='containerTitulo'>".
                    "<h3>Tìtulo: " . $peticion['titulo']."</h3>".
                "</div>".
                "<h4>Descripciòn: " . $peticion['descripcion']."</h4>".
                
                "<br>".
                "<div class='Precio'>".
                    "<h3>$ " . $peticion['precio']."</h3>".
                "</div>".
            "</div>";
                  }
        ?>
            
           </div>
        </div>



    </div>
<button class="endSesion2"><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
    
 <!-- seccion de ventana emergete -->
    <div>
    <form action="../Controlador/publicaciones.php" method="post">
            <div id="popup" class="overlay">
           
           <div id="popupBody">
               <div class="caja1">
                   <img src="../css/img/logo.png" alt="Rent a Professional">
               </div>
               <a id="cerrar" href="#">&times;</a>
              
               <div class="caja2">
                   <input type="text" placeholder="Tìtulo de peticiòn:" id="titulo" name="titulo">
                   <input type="text" placeholder="Descripciòn:" id="descripcion" name="descripcion" class="Dess">
                   <input type="text" placeholder="Precio a pagar $:" id="Precio" name="precio">

                   <select name="Profesion" class="profesion">
                           <option class="option" value="Desarrollador de Software">Desarrollador de Software</option>
                           <option class="option" value="Doctor">Doctor</option>
                           <option class="option" value="Diseñador">Diseñador</option>
                           <option class="option" calue="Profesor">Profesor</option>
                   </select>
                <?php
				if(isset($errorDatos)){
					echo "<p>".$errorDatos."</p>";
				}
				?> 
               </div>
               <div class="caja3">
               <input type="submit" value="Publicar" name="publicar">
               </div>
               </div>
           </div>
           </form>
        </div>
</body>
</html>

