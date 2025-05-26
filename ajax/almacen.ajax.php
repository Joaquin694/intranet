<?php

require_once "../modelos/almacen.modelo.php";
require_once "../config/conexion.php";

if (isset($_POST["ajaxservice"])) {
    switch ($_POST["ajaxservice"]) {
        case 'loadEdit':
            if (isset($_POST["idaalmacen"])) {
                $respuestadat = ModeloAlmacenes::mdlMostrarAlmacenes("almacenes", "id", $_POST["idaalmacen"]);
                echo json_encode($respuestadat);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'No se especificó el ID del almacén'
                ]);
            }
            break;
            
        case 'cargarData':
            $respuestadat = ModeloAlmacenes::mdlMostrarAlmacenes("almacenes", null, null);
            echo json_encode($respuestadat);
            break;
            
        default:
            echo json_encode([
                'status' => 'error',
                'message' => 'Servicio no encontrado'
            ]);
            break;
    }
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'No se especificó el servicio AJAX'
    ]);
}

?>