<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<section>
		<?php 
			echo '<h1>Bienvenido '.$profesional->getNombre().'</h1>';
		?>
		<form method="POST" action="../controlador/insertarCurriculo.php" enctype="multipart/form-data">	
			<h1>Aqui coloque su Curriculo:</h1>
			<p>Recuerda que todos los usuarios van a poder ver tu curriculo para verificar tus habilidades ¡ASEGURATE QUE VAYA BIEN!</p>
			<input type="file" name="curriculo" accept=".doc,.docx,.pdf"></br>
			<input type="submit" value="Enviar Curriculo" name="enviar">
		</form>
	</section>	
</body>
</html>
