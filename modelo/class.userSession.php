<?php

class userSession{
	public function __construct(){
		session_start();
	}

	public function setCurrentProfesional($user){
		$_SESSION['profesional']=$user;	
	}

	public function setCurrentCliente($user){
		$_SESSION['cliente']=$user;	
	}


	public function setCurrentAdm($user){
		$_SESSION['admin']=$user;
	}

	public function getCurrentProfesional(){
		return $_SESSION['profesional'];
	}

	public function getCurrentCliente(){
		return $_SESSION['cliente'];
	}

	public function getCurrentAdm(){
		return $_SESSION['admin'];
	}

	public function closeSession(){
		session_unset();
		session_destroy();
	}
}
?>
