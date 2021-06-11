<?php

require_once "proyecto.controlador.php";
require_once "proyecto.modelo.php";

$method = $_SERVER['REQUEST_METHOD'];

class AjaxProyecto{

  public function ajaxValidarSession(){;

    $User = $this->User;
    $Pass = $this->Pass;

    $respuesta = ControladorProyecto::ctrValidarSession($User,$Pass);
    //echo json_encode(["data"=>$respuesta,"TotalCount"=>count($respuesta)]); 
    echo json_encode($respuesta);
  }

  //traes datos del datagrid de articulos
  public function ajaxDataGridArticulos(){

    $filter = $this->filter;

    $respuesta = ControladorProyecto::ctrDataGridArticulos();

    echo $respuesta;
  }

  //elimina datos del datagrid de articulos
  public function ajaxDataGridArticulosEliminar(){


    $parse = parse_str(file_get_contents("php://input"), $_DELETE);

    $query = "DELETE FROM montelongoza.articulos WHERE id = '".$_DELETE["id"]."'";

    $respuesta = ControladorProyecto::ctrDataGridArticulosEliminar($query);

    echo $respuesta;
  }

  //guarda los datos de los articulos
  public function ajaxGuardarArticulo(){;

    $CodArticulo = $this->CodArticulo;
    $NombreArti = $this->NombreArti;
    $MarcaArticulo = $this->MarcaArticulo;
    $selectUM = $this->selectUM;
    $selectProveedores = $this->selectProveedores;
    $selectTipodeArticulo = $this->selectTipodeArticulo;

    $respuesta = ControladorProyecto::ctrGuardarArticulo($CodArticulo,$NombreArti,$MarcaArticulo,$selectUM,$selectProveedores,$selectTipodeArticulo);

    echo json_encode($respuesta);
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

//guardar datos articulos
if(isset($_POST['CodArticulo'])){

  $datosArticulos = new AjaxProyecto();

  $datosArticulos -> CodArticulo = $_POST['CodArticulo'];
  $datosArticulos -> NombreArti = $_POST['NombreArti'];
  $datosArticulos -> MarcaArticulo = $_POST['MarcaArticulo'];
  $datosArticulos -> selectUM = $_POST['selectUM'];
  $datosArticulos -> selectProveedores = $_POST['selectProveedores'];
  $datosArticulos -> selectTipodeArticulo = $_POST['selectTipodeArticulo'];

  $datosArticulos -> ajaxGuardarArticulo();  
}

if($method == "DELETE"){

  $datagridEliminar = new AjaxProyecto();

  $datagridEliminar -> ajaxDataGridArticulosEliminar();  
}

