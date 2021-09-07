<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="../css/vis.regDocProfesional.css?v=<?php echo time();?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="containerRegisPro">
        <header>
            <!--<img src="" alt="Rent a Profesional">-->
            <h2 class="texto">Añadir Documento</h2>
        </header>
        <form method="POST" action="../controlador/insertarCurriculo.php" enctype="multipart/form-data">
             <p class="texto">Hola querido Usuario, en este  apartado, en el botón "Elegir archivo" al oprimirlo  seleccionaras tu documento que demuestre tu experiencia laboral. </p>
                <input type="file" name="curriculo" accept=".doc,.docx,.pdf" class="input-file" value="" onChange="onLoadImage(event.target.files)">
                <input type="submit" value="Enviar" class="enviar"  required>
        </form>
    </div>
    
</body>
</html>
