<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/inicioSesion.css?v=<?php echo time();?>"/>
    <title>Rent a Professional - RAP</title>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@300&display=swap" rel="stylesheet">
    <?php
    error_reporting(0);
    ?>
</head>
<body>
    <form method="POST" action="../controlador/inicioSesion.php">
	<section>
   		<div class="flex-caja">
           
           <div class="flex1">
               <img src="../css/img/logo.png" alt="Rent a Professional">
            </div>
           <div class="flex2">
               <input type="text" placeholder="Email:" id="email" name="mail" autocomplete="off">
               <br>
               <input type="password" placeholder="Password:" id="pass" name="pass" autocomplete="off">
           </div>
           <div class="flex3">
               <input type="submit" value="Login" name="login">
           </div>
			<?php
			if(isset($errorlogin)){
				echo $errorlogin; 
                echo '<div class="flex4">
                   <p>si aun no te registras: Registrate como</p>
                   <a href="../vistas/vis.registroProfesional.php"> Profesional</a>
                <p>o como un</p>
                   <a href="../vistas/vis.registroCliente.php"> Cliente</a>
           </div>';
			}else{
                echo '<div class="flex4">
                   <p>si aun no te registras: Registrate como</p>
                   <a href="vis.registroProfesional.php"> Profesional</a>
                <p>o como un</p>
                   <a href="vis.registroCliente.php"> Cliente</a>
           </div>';
            }
			?>
		</div>
	</section>
   </form>  
</body>
</html>
