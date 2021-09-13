<?php
    require_once '../modelo/Class.MostrarReportes.php';
    require_once '../modelo/Class.Administrador.php';

    $id = isset($_GET['id'])?$_GET['id']:"";
    $idRep = isset($_GET['idRe'])?$_GET['idRe']:"";
    $accion = isset($_REQUEST['accion'])?$_REQUEST['accion']:"";
    $adm = new Administrador;

    if($idRep != "" && $accion=="eliminar"){
        $adm->eliminarReporte($idRep);
        header('location: ../vistas/Reportes.php');
    }elseif($id != "" && $accion=="BanearPro"){
        $adm->banearPro($id);
        $adm->eliminarReporte($idRep);
        header('location: ../vistas/Reportes.php');
    }elseif($id != "" && $accion=="BanearClient"){
        $adm->banearCliente($id);
    }else{
        echo "error";
    }

?>