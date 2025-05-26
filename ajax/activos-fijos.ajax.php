<?php
// activos-fijos.ajax.php - MANEJADOR DE PETICIONES AJAX

require_once "../controladores/activos-fijos.controlador.php";
require_once "../modelos/activos-fijos.modelo.php";

// Función para enviar respuesta JSON
function enviarRespuesta($status, $data = null, $message = '') {
    $response = ['status' => $status];
    if ($data !== null) $response['data'] = $data;
    if (!empty($message)) $response['message'] = $message;
    
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

// Verificar que sea una petición POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    enviarRespuesta('error', null, 'Método no permitido');
}

// Verificar que exista el parámetro ajaxservice
if (!isset($_POST["ajaxservice"])) {
    enviarRespuesta('error', null, 'No se especificó el servicio AJAX');
}

try {
    switch ($_POST["ajaxservice"]) {
        case 'loadEdit':
            if (isset($_POST["idaa"]) && !empty($_POST["idaa"])) {
                $respuesta = ModeloActivosFijos::mdlMostrarActivosFijos("activo_fijo", "id", $_POST["idaa"]);
                
                if (is_array($respuesta)) {
                    enviarRespuesta('success', $respuesta);
                } else {
                    enviarRespuesta('error', null, 'Error al cargar los datos del activo fijo');
                }
            } else {
                enviarRespuesta('error', null, 'No se especificó el ID del activo fijo');
            }
            break;

        case 'eliminarActivoFijo':
            if (isset($_POST["idEliminar"]) && !empty($_POST["idEliminar"])) {
                $respuesta = ModeloActivosFijos::mdlEliminarActivoFijo("activo_fijo", "id", $_POST["idEliminar"]);
                
                if ($respuesta == "ok") {
                    enviarRespuesta('success', null, 'Activo fijo eliminado correctamente');
                } else {
                    enviarRespuesta('error', null, 'Error al eliminar el activo fijo: ' . $respuesta);
                }
            } else {
                enviarRespuesta('error', null, 'No se especificó el ID para eliminar');
            }
            break;

        case 'loadData':
            if (isset($_POST["idaa"]) && !empty($_POST["idaa"])) {
                $respuesta = ModeloActivosFijos::mdlMostrarRegistro("registro", "activo_fk", $_POST["idaa"]);
                
                if (is_array($respuesta)) {
                    enviarRespuesta('success', $respuesta);
                } else {
                    enviarRespuesta('error', null, 'Error al cargar los registros del activo');
                }
            } else {
                enviarRespuesta('error', null, 'No se especificó el ID para cargar datos');
            }
            break;

        case 'cargarTodos':
            $respuesta = ModeloActivosFijos::mdlMostrarActivosFijos("activo_fijo", null, null);
            
            if (is_array($respuesta)) {
                enviarRespuesta('success', $respuesta);
            } else {
                enviarRespuesta('error', null, 'Error al cargar todos los activos fijos');
            }
            break;

        case 'crearActivoFijo':
            if (isset($_POST["datos"]) && is_array($_POST["datos"])) {
                $respuesta = ModeloActivosFijos::mdlIngresarActivoFijo("activo_fijo", $_POST["datos"]);
                
                if ($respuesta == "ok") {
                    enviarRespuesta('success', null, 'Activo fijo creado correctamente');
                } else {
                    enviarRespuesta('error', null, 'Error al crear el activo fijo: ' . $respuesta);
                }
            } else {
                enviarRespuesta('error', null, 'No se proporcionaron los datos para crear el activo fijo');
            }
            break;

        case 'actualizarActivoFijo':
            if (isset($_POST["datos"]) && is_array($_POST["datos"])) {
                $respuesta = ModeloActivosFijos::mdlActualizarActivosFijos("activo_fijo", $_POST["datos"]);
                
                if ($respuesta == "ok") {
                    enviarRespuesta('success', null, 'Activo fijo actualizado correctamente');
                } else {
                    enviarRespuesta('error', null, 'Error al actualizar el activo fijo: ' . $respuesta);
                }
            } else {
                enviarRespuesta('error', null, 'No se proporcionaron los datos para actualizar el activo fijo');
            }
            break;

        case 'crearRegistro':
            if (isset($_POST["datos"]) && is_array($_POST["datos"])) {
                $respuesta = ModeloActivosFijos::mdlIngresarRegistro("registro", $_POST["datos"]);
                
                if ($respuesta == "ok") {
                    enviarRespuesta('success', null, 'Registro creado correctamente');
                } else {
                    enviarRespuesta('error', null, 'Error al crear el registro: ' . $respuesta);
                }
            } else {
                enviarRespuesta('error', null, 'No se proporcionaron los datos para crear el registro');
            }
            break;

        default:
            enviarRespuesta('error', null, 'Servicio no encontrado: ' . $_POST["ajaxservice"]);
            break;
    }

} catch (Exception $e) {
    error_log("Error en activos-fijos.ajax.php: " . $e->getMessage());
    enviarRespuesta('error', null, 'Error interno del servidor');
}
?>