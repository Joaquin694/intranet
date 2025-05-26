<?php

class ControladorTipoDocumentos{

	/*=============================================
	MOSTRAR TipoDocumentos
	=============================================*/

	static public function ctrMostrarTipoDocumentos($item, $valor){

		$tabla = "tipos_documentos";

		$respuesta = ModeloTipoDocumentos::mdlMostrarTipoDocumentos($tabla, $item, $valor);

		return $respuesta;
	
	}
	
}
