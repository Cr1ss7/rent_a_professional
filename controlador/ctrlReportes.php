<?php
    require_once '../modelo/Class.Reportes.php';

    $titulo = isset($_POST['titulo'])?$_POST['titulo']:"";
    $descripcion = isset($_POST['descripcion'])?$_POST['descripcion']:"";
    $idCliente = isset($_POST['idClient'])?$_POST['idClient']:"";
    $idProfesional = isset($_POST['idPro'])?$_POST['idPro']:"";
    $tipo = isset($_POST['tipo'])?$_POST['tipo']:"";
    echo $idProfesional;
    $reportes = new Reportes();
    $reportes->setReporte($titulo, $descripcion,$idCliente,$idProfesional,$tipo);
    $reportes->subirReporte();

?>