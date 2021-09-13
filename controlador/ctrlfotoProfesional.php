<?php
require_once ('../modelo/class.conexion.php');
require_once('../modelo/class.profecional.php');
require_once ('../modelo/class.fotoProfeional.php');
require_once("../modelo/class.userSession.php");
$picture = new profeionalFoto();
$prof = new Profesional();
$userSession = new userSession();
$imageNNombre = $_FILES['foto']['name'];
if(isset($_REQUEST['enviar'])){
    if(isset($_SESSION['profesional'])){
		$prof->setProfesional($userSession->getCurrentProfesional());
        $id = $prof->getId();
        try{
            
            if(!empty($imageNNombre)){
                $temporal = $_FILES['foto']['tmp_name'];
                $carpeta = '../foto';
                $ruta = $carpeta.'/'.$imageNNombre;
                move_uploaded_file($temporal,$carpeta.'/'.$imageNNombre);
                $picture->setDato($ruta,$id);
                $picture->InsertFoto();
                $picture->updateFoto();
    
                
               header("Location:../vistas/vis.perfilProfesional.php");
            }else{
                header("Location:../vistas/vis.perfilProfesional.php");
            }
           
         
        }catch(Exception $e){
            $errorDatos = $e->getMessage();
            include '../vistas/vis.publicaciones.php';
        }
    }else{
        header("location: ../vistas/vis.inicioSesion.php");
    }
}

?>