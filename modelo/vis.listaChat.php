<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/vis.listaChat3.css?v=<?php echo time(); ?>" />
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
    <script defer src="../JavaScript/menuHamburguesa.js"></script>
    <title>Document</title>
    <?php
        include_once '../modelo/class.chat.php';
        $List = new Listchat();
    ?>
</head>
<body>
    <div class="containerKing">
        <div class="header">
            <h3 class="nombreUsuario">Bienvenido:</h3>
            <button class="endSesion"><a href="#">Cerrar Sesión</a></button>
        </div>
        <header class="encabezado">
            <nav class="navigationBar">
                <button class="nav-toggle" aria-label="Abrir menú"><i class="fas fa-bars"></i></button>
                <ul class="navButtons">
                    <a href="#" class="links"><li class="buttonActive">Información General</li></a>
                    <a href="#" class="links"><li class="buttons">Opcion 1</li></a>
                    <a href="#" class="links"><li class="buttons">Opcion 2</li></a>
                    <a href="#" class="links"><li class="buttons">Opcion 3</li></a>
                </ul>
            </nav>
        </header>
        <div class="header2">
            <h3 class="nombreUsuario">Bienvenido:</h3>
            <button class="endSesion"><a href="#">Cerrar Sesión</a></button>
        </div>
        <div class="listaChat">
            <form action="../Controlador/ctrlBusquedaChat.php" method="POST">
            <div class="busqueda" id="navegacion">
               
                <input type="text" id="textoBusqueda" name="textoBusqueda"/>
                <input type="submit" name="buscar" value="Buscar" class="buscar">
               
            </div>
        </form>
            <?php
                $publi = $List->ChatP();
                foreach ($publi as $id){
                    $List->get_P($id['idcliente']);

                }
        ?>
        </div>
        <button class="endSesion2"><a href="#">Cerrar Sesión</a></button>
    </div>
</body>
</html>