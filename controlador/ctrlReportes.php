<?php
    require_once '../modelo/Class.Reportes.php';

    $titulo = isset($_POST['titulo'])?$_POST['titulo']:"";
    $descripcion = isset($_POST['descripcion'])?$_POST['descripcion']:"";

    $reportes = new Reportes($titulo, $descripcion);
    $reportes->subirReporte();

?>