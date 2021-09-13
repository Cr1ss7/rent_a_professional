<?php
  require_once('../modelo/class.conexion.php');
  require_once('../modelo/class.administrador.php');
  require_once('../modelo/class.userSession.php');
require_once ('../modelo/class.fotoAdministrador.php');
$adm = new Administrador();
$picture = new  adminFoto();
$userSession = new userSession();
$imageNNombre = $_FILES['foto']['name'];
if(isset($_REQUEST['enviar'])){
    if(isset($_SESSION['admin'])){
        $adm->setAdm($userSession->getCurrentAdm());
		$id = $adm->getid();
        try{
            if(!empty($imageNNombre)){
                $temporal = $_FILES['foto']['tmp_name'];
                $carpeta = '../foto';
                $ruta = $carpeta.'/'.$imageNNombre;
                move_uploaded_file($temporal,$carpeta.'/'.$imageNNombre);
                $picture->setDato($ruta,$id);
                $picture->InsertFoto();
                $picture->updateFoto();
                header("Location:../vistas/vis.perfilAdministrador.php");
            }else{
                header("Location:../vistas/vis.perfilAdministrador.php");
            } 
        }catch(Exception $e){
            $errorDatos = $e->getMessage();
            Include '../vistas/vis.publicaciones.php';
        }
    }else{
        header("Location:../vistas/vis.perfilProfesional.php");
    }
}

?>