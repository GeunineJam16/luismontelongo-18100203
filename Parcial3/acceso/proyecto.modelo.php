<?php

 
require_once "Conexion.php";

class ModeloProyecto{

	static public function mdlConectar(){

		return Conexion::conectar();

	}

	static public function mdlValidarSession($User,$Pass){

	 $stmt = Conexion::conectar()->prepare("SELECT * FROM proyecto.usuarios where Usuario = :User");

		$stmt->bindValue(":User", $User, PDO::PARAM_STR);

		if($stmt->execute()){

			$_SESSION['username'] = $User;
			return "ok";

		}else{

			
			return "error";

		}
		
		$stmt -> close();
		$stmt = null;
	}













}










}
