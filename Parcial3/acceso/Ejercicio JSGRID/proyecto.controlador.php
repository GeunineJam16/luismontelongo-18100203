<?php

class ControladorProyecto{


	//Controlador par air a consultar variables de session
	static public function ctrValidarSession($User,$Pass){
		
		$respuesta = ModeloProyecto::mdlValidarSession($User,$Pass);

		return json_encode($respuesta);
	}

	//datos de datagrid articulos
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


	
}