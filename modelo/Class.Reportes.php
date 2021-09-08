<?php
require_once("class.conexion.php");
class Reportes{
    public $titulo;
    public $descripcion;
    public $idC = 1;
    public $idP = 2;
    
    public function __construct($titulo,$descripcion){   
        if(!empty($titulo)){
            $this->titulo = $titulo;
        }else{
            throw new Exception("Error, Titulo vacio");
        }

        if(!empty($descripcion)){
            $this->descripcion = $descripcion;
        }else {
            throw new Exception("Error, Descripción vacia");
        }
    } 
// para subir la información a la base
    public function subirReporte(){
        $cn = new Conexion();
        //data base handle
        $dbh = $cn->get_conexion();
        $sql = "INSERT INTO reportes (titulo,descripcion,idPro,idClient) VALUES (:titulo, :descripcion,:idPro,:idClient)";
        try{
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':titulo', $this->titulo);
            $stmt-> bindParam(':descripcion', $this->descripcion);
            $stmt->bindParam(':idPro', $this->idP);
            $stmt->bindParam(':idClient', $this->idC);
            $stmt->execute();
            header('location: ../vistas/vis.ReadperfilProfesional.php');
        }catch(PDOException $e){
            echo "Error: ". $e->getMessage();
        }
    }//bindparam es para subir a la base de datos.

}
?>