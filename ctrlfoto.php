<?php
require_once ('../modelo/class.conexion.php');

require_once ('../modelo/class.foto.php');

$foto = $_FILES['foto']['name'];

if(isset($_POST['enviar'])){
    if(empty($foto)){
        echo "esta vacia";
    }else{
        
        $ruta=$_FILES["foto"]["tmp_name"];
        $destino = "../foto/".$foto;
        copy($ruta,$destino);
        $picture = new Foto();
        $picture->setFoto($destino, $id);
        header("Location:../vista/vis.foto.php");
    }
}


?>