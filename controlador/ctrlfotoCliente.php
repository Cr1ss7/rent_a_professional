<?php
require_once ('../modelo/class.conexion.php');
require_once("../modelo/class.cliente.php");
require_once('../modelo/class.fotoCliente.php');
require_once("../modelo/class.userSession.php");
$clnt = new Cliente();
$userSession = new userSession();
$picture  = new clienteFoto();
$imageNNombre = $_FILES['foto']['name'];
if(isset($_REQUEST['enviar'])){
    if(isset($_SESSION['cliente'])){
        $clnt->setCliente($userSession->getCurrentCliente());
        $id = $clnt->getId();
        try{
            if(!empty($imageNNombre)){
                $temporal = $_FILES['foto']['tmp_name'];
                $carpeta = '../foto';
                $ruta = $carpeta.'/'.$imageNNombre;
                move_uploaded_file($temporal,$carpeta.'/'.$imageNNombre);
                $picture->setDato($ruta,$id);
                $picture->InsertFoto();
                $picture->updateFoto();
            
                echo "xd1";
             header("Location:../vistas/vis.perfilCliente.php");
            }else{
              header("Location:../vistas/vis.perfilCliente.php");
              echo "xd2";
            }
        }catch(Exception $e){
            echo $errorDatos = $e->getMessage();
        }
    }else{
        header("location: ../vistas/vis.inicioSesion.php");
    }
}



?>