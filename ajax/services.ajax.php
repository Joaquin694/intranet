<?php

require_once "../controladores/service.controlador.php";
require_once "../modelos/service.modelo.php";

class AjaxServices {

    /*=============================================
    EDITAR SERVICIO
    =============================================*/  

    public $idService;

    public function ajaxEditarService() {

        $item = "idService";
        $valor = $this->idService;

        $respuesta = ControladorServices::ctrMostrarServices($item, $valor);

        echo json_encode($respuesta);

    }
}

/*=============================================
EDITAR SERVICIO
=============================================*/  
if(isset($_POST["idService"])) {

    $service = new AjaxServices();
    $service -> idService = $_POST["idService"];
    $service -> ajaxEditarService();

}
