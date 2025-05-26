<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";
require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxProductos{

  /*=============================================
  GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
  =============================================*/
  public $idCategoria;

  public function ajaxCrearCodigoProducto(){
  	$item = "id_categoria";
  	$valor = $this->idCategoria;
    $orden = null;

  	$respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
  	echo json_encode($respuesta);
  }

  /*=============================================
  EDITAR PRODUCTO
  =============================================*/ 
  public $idProducto;
  public $traerProductos;
  public $nombreProducto;

  public function ajaxEditarProducto(){
    if($this->traerProductos == "ok"){
      $item = null;
      $valor = null;
      $orden = "id";

      $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
      echo json_encode($respuesta);

    }else if($this->nombreProducto != ""){
      $item = "descripcion";
      $valor = $this->nombreProducto;
      $orden = null;

      $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
      echo json_encode($respuesta);

    }else{
      $item = "id";
      $valor = $this->idProducto;
      $orden = null;

      $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
      echo json_encode($respuesta);
    }
  }

  /*=============================================
  CARGAR TODOS LOS PRODUCTOS
  =============================================*/
  public function ajaxCargarData(){
    $item = null;
    $valor = null;
    $orden = "id";

    $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
    echo json_encode($respuesta);
  }
}

/*=============================================
GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
=============================================*/	
if(isset($_POST["idCategoria"])){
	$codigoProducto = new AjaxProductos();
	$codigoProducto -> idCategoria = $_POST["idCategoria"];
	$codigoProducto -> ajaxCrearCodigoProducto();
}

/*=============================================
EDITAR PRODUCTO
=============================================*/ 
if(isset($_POST["idProducto"])){
  $editarProducto = new AjaxProductos();
  $editarProducto -> idProducto = $_POST["idProducto"];
  $editarProducto -> ajaxEditarProducto();
}

/*=============================================
TRAER PRODUCTOS
=============================================*/ 
if(isset($_POST["traerProductos"])){
  $traerProductos = new AjaxProductos();
  $traerProductos -> traerProductos = $_POST["traerProductos"];
  $traerProductos -> ajaxEditarProducto();
}

/*=============================================
TRAER PRODUCTO POR NOMBRE
=============================================*/ 
if(isset($_POST["nombreProducto"])){
  $traerProductos = new AjaxProductos();
  $traerProductos -> nombreProducto = $_POST["nombreProducto"];
  $traerProductos -> ajaxEditarProducto();
}

/*=============================================
CARGAR DATA (NUEVA FUNCIONALIDAD)
=============================================*/ 
if(isset($_POST["accion"]) && $_POST["accion"] == "cargarData"){
  $cargarData = new AjaxProductos();
  $cargarData -> ajaxCargarData();
}

/*=============================================
EDITAR PRODUCTO VIA AJAX
=============================================*/ 
if(isset($_POST["accion"]) && $_POST["accion"] == "EdiatarProducto"){
  $respuesta = ControladorProductos::ctrEditarProducto();
  echo json_encode([
    'status' => $respuesta == 'ok' ? 'success' : 'error',
    'message' => $respuesta
  ]);
}

?>