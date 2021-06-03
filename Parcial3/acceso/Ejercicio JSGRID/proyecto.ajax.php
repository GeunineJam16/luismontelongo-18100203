<?php
session_start();
require_once "proyecto.controlador.php";
require_once "proyecto.modelo.php";

class AjaxProyecto{

  public function ajaxValidarSession(){;

    $User = $this->User;
    $Pass = $this->Pass;

    $respuesta = ControladorProyecto::ctrValidarSession($User,$Pass);
    //echo json_encode(["data"=>$respuesta,"TotalCount"=>count($respuesta)]); 
    echo json_encode($respuesta);
  }

  //traes datos del datagrid de articulos
  public function ajaxDataGridArticulos(){;

    $filter = $this->filter;

    $respuesta = ControladorProyecto::ctrDataGridArticulos();

    echo $respuesta;
  }

}

//va y consulta el login de session

if(isset($_POST['User'])){


  $varssession = new AjaxProyecto();

  $varssession -> User = $_POST['User'];
  $varssession -> Pass = $_POST['Pass'];

  
  $varssession -> ajaxValidarSession();  
}

//datagrid articulos
if(isset($_POST['filter'])){

  $datagrid = new AjaxProyecto();

  $datagrid -> filter = $_POST['filter'];

  $datagrid -> ajaxDataGridArticulos();  
}

