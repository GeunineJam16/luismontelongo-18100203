<?php

class ControladorProyecto{


	//Controlador par air a consultar variables de session
	static public function ctrValidarSession($User,$Pass){
		
		$respuesta = ModeloProyecto::mdlValidarSession($User,$Pass);

		return json_encode($respuesta);
	}


	
}