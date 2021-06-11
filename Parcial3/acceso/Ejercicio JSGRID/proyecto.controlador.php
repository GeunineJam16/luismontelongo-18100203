<?php

class ControladorProyecto{


	//Controlador par air a consultar variables de session
	static public function ctrValidarSession($User,$Pass){
		
		$respuesta = ModeloProyecto::mdlValidarSession($User,$Pass);

		return $respuesta;
	}

	static public function ctrDataGridArticulos(){
		
		$respuesta = ModeloProyecto::mdlDataGridArticulos();

		foreach ($respuesta as $row) {

			$output[] = array(

				'id' => $row['id'],
				'Descripcion' => $row['Descripcion'],
				'Marca' => $row['Marca'],
				'UM' => $row['UM'],
				'Proveedor' => $row['Proveedor'],
				'TipoArticulo' => $row['TipoArticulo']
			
			);

		}

		return json_encode($output);
	}

	//guardado de la infomacion de articulos
	static public function ctrGuardarArticulo($CodArticulo,$NombreArti,$MarcaArticulo,$selectUM,$selectProveedores,$selectTipodeArticulo){
		
		$respuesta = ModeloProyecto::mdlGuardarArticulo($CodArticulo,$NombreArti,$MarcaArticulo,$selectUM,$selectProveedores,$selectTipodeArticulo);


		return $respuesta;
	}

	//Eliminacion de la infomacion de articulos
	static public function ctrDataGridArticulosEliminar($query){
		
		$respuesta = ModeloProyecto::DataGridArticulosEliminar($query);

		var_dump($respuesta);
		return $respuesta;
	}


	
}
