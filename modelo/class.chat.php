<?php
class Chat{

	public function mostrarMsg($idProf, $idClnt){
		$conexion = new Conexion();
		$dbh = $conexion->get_conexion();
		$sql = "Select * from mensaje where idProfesional=:idProf and idCliente=:idClnt";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":idProf",$idProf);
		$stmt->bindParam(":idClnt",$idClnt);
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function enviarMsg($user, $msg, $idProf, $idClnt, $tipo){
		$conexion = new Conexion();
		$dbh = $conexion->get_conexion();
		$sql = "Insert into mensaje (user, msg, idProfesional, idCliente, tipo) values (:user, :msg, :idProf, :idClnt, :tipo)";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":user",$user);
		$stmt->bindParam(":msg",$msg);
		$stmt->bindParam(":idProf",$idProf);
		$stmt->bindParam(":idClnt",$idClnt);
		$stmt->bindParam(":tipo",$tipo);
		$stmt->execute();
	}

	public function verChat($idProf,$idClnt){
		$conexion = new Conexion();
		$dbh = $conexion->get_conexion();
		$sql = "Select * from mensaje where idProfesional=:idProf and idCliente=:idClnt";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":idProf",$idProf);
		$stmt->bindParam(":idClnt",$idClnt);
		$stmt->execute();
		$extChat = $stmt->rowCount();
		return $extChat;
	}
}
?>
