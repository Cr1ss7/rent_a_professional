<?php

require_once 'class.conexion.php';
require_once 'class.userSession.php';

class Mostrar{

    public function mostrarReportes(){
        $cn = new Conexion();
        $dbh = $cn->get_conexion();
        $sql = 'SELECT titulo, descripcion FROM reportes';
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $reporte = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $reporte;
    }

    public function getNombreReportante(){
        $cn = new Conexion();
        $dbh = $cn->get_conexion();
        $userSession = new userSession();

        if(isset($_SESSION['cliente'])){
            $sql = "select nombre, apellido from cliente where id=:id";
		    $stmt = $dbh->prepare($sql);
		    $stmt->bindParam(":id",$idCliente);
		    $stmt->execute();
		    $datos = $stmt->fetch(PDO::FETCH_ASSOC);
		    $nombre = $datos['nombre'];
		    $apellido = $datos['apellido'];
		    return $nombre. " ". $apellido;
        }elseif (isset($_SESSION['profesional'])){
            $sql = "select nombre, apellido from profesional where id=:id";
		    $stmt = $dbh->prepare($sql);
		    $stmt->bindParam(":id",$idP);
		    $stmt->execute();
		    $datos = $stmt->fetch(PDO::FETCH_ASSOC);
		    $nombre = $datos['nombre'];
		    $apellido = $datos['apellido'];
		    return $nombre. " ". $apellido;
        }
    }
    
}
?>