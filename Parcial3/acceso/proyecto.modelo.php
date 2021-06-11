<?php
session_start();
require_once "Conexion.php";


class ModeloProyecto{

	static public function mdlConectar(){

		return Conexion::conectar();

	}

	static public function mdlValidarSession($User,$Pass){

	 $stmt = Conexion::conectar()->prepare("SELECT * FROM proyecto.usuarios where Usuario = :User");

		$stmt->bindValue(":User", $User, PDO::PARAM_STR);

		if($stmt->execute()){



			$_SESSION['usuario'] = $User;
			//var_dump($_SESSION);
			return "ok";
			

		}else{

			$_SESSION['usuario'] = null;
			return "error";
			

		}


		
		$stmt -> close();
		$stmt = null;
	}

	static public function mdlDataGridArticulos(){

	 $stmt = Conexion::conectar()->prepare("SELECT * FROM montelongoza.articulos");

		$stmt -> execute();
		return $stmt ->fetchAll();
		
		$stmt -> close();
		$stmt = null;
	}

	static public function mdlGuardarArticulo($CodArticulo,$NombreArti,$MarcaArticulo,$selectUM,$selectProveedores,$selectTipodeArticulo){

	 	$stmt = Conexion::conectar()->prepare("INSERT INTO montelongoza.articulos 
	 		(Descripcion, Marca,Codigo,UM,Proveedor,TipoArticulo) VALUES 
	 		(:NombreArti,:MarcaArticulo,:CodArticulo, :selectUM, :selectProveedores,:selectTipodeArticulo)");

		$stmt->bindValue(":CodArticulo", $CodArticulo, PDO::PARAM_STR);
		$stmt->bindValue(":NombreArti", $NombreArti, PDO::PARAM_STR);
		$stmt->bindValue(":MarcaArticulo", $MarcaArticulo, PDO::PARAM_STR);
		$stmt->bindValue(":selectUM", $selectUM, PDO::PARAM_STR);
		$stmt->bindValue(":selectProveedores", $selectProveedores, PDO::PARAM_STR);
		$stmt->bindValue(":selectTipodeArticulo", $selectTipodeArticulo, PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;
	}

	static public function DataGridArticulosEliminar($query){

	 	$stmt = Conexion::conectar()->prepare($query);

		if($stmt->execute()){

			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;
	}




}
