<?php

require_once "../controladores/proveedores.controlador.php";
require_once "../modelos/proveedores.modelo.php";

class AjaxProveedores{

	/*=============================================
	EDITAR Proveedor
	=============================================*/	

	public $idProveedor;

	public function ajaxEditarProveedor(){

		$item = "proveedor_pk";
		$valor = $this->idProveedor;

		$respuesta = ControladorProveedores::ctrMostrarProveedores($item, $valor);

		echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR Proveedor
=============================================*/	

if(isset($_POST["idProveedor"])){

	$proveedor = new AjaxProveedores();
	$proveedor -> idProveedor = $_POST["idProveedor"];
	$proveedor -> ajaxEditarProveedor();

}