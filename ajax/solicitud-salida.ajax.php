<?php
// solicitud-salida.ajax.php - MANEJADOR DE PETICIONES AJAX

require_once "../controladores/solicitud_salida.controlador.php";
require_once "../modelos/solicitud_salida.modelo.php";

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
                $respuestadat = ModeloSolicitudSalida::mdlMostrarSolicitudes("solicitudes_salida", "id", $_POST["idaa"]);
                
                if ($respuestadat && !is_string($respuestadat)) {
                    enviarRespuesta('success', $respuestadat);
                } else {
                    enviarRespuesta('error', null, 'No se encontró la solicitud o error en la consulta');
                }
            } else {
                enviarRespuesta('error', null, 'ID de solicitud no proporcionado');
            }
            break;

        case 'loadProductosPorAlmacen':
            if (isset($_POST["almacenId"]) && !empty($_POST["almacenId"])) {
                $almacenId = $_POST["almacenId"];
                $productos = ModeloSolicitudSalida::mdlMostrar("productos_ingresos", "fk_almacen", $almacenId, "=");
                
                if (is_array($productos)) {
                    enviarRespuesta('success', $productos);
                } else {
                    enviarRespuesta('error', null, 'Error al cargar productos del almacén');
                }
            } else {
                enviarRespuesta('error', null, 'ID de almacén no proporcionado');
            }
            break;

        case 'loadAuditorProductoPreseleccionado':
            if (isset($_POST["codigo"]) && !empty($_POST["codigo"])) {
                $productoAudi = ModeloSolicitudSalida::mdlMostrarAuditorProductoPreseleccionado("", "", $_POST["codigo"]);
                
                if (is_array($productoAudi)) {
                    enviarRespuesta('success', $productoAudi);
                } else {
                    enviarRespuesta('error', null, 'Error al cargar auditoría del producto');
                }
            } else {
                enviarRespuesta('error', null, 'Código de producto no proporcionado');
            }
            break;

        case 'cargarTodasSolicitudes':
            $solicitudes = ModeloSolicitudSalida::mdlMostrarSolicitudes("solicitudes_salida", null, null);
            
            if (is_array($solicitudes)) {
                enviarRespuesta('success', $solicitudes);
            } else {
                enviarRespuesta('error', null, 'Error al cargar todas las solicitudes');
            }
            break;

        case 'crearSolicitud':
            if (isset($_POST["datos"]) && is_array($_POST["datos"])) {
                $respuesta = ModeloSolicitudSalida::mdlIngresarSolicitud("solicitudes_salida", $_POST["datos"]);
                
                if ($respuesta == "ok") {
                    enviarRespuesta('success', null, 'Solicitud creada correctamente');
                } else {
                    enviarRespuesta('error', null, 'Error al crear la solicitud: ' . $respuesta);
                }
            } else {
                enviarRespuesta('error', null, 'Datos de solicitud no proporcionados');
            }
            break;

        case 'editarSolicitud':
            if (isset($_POST["datos"]) && is_array($_POST["datos"])) {
                $respuesta = ModeloSolicitudSalida::mdlEditarSolicitud("solicitudes_salida", $_POST["datos"]);
                
                if ($respuesta == "ok") {
                    enviarRespuesta('success', null, 'Solicitud editada correctamente');
                } else {
                    enviarRespuesta('error', null, 'Error al editar la solicitud: ' . $respuesta);
                }
            } else {
                enviarRespuesta('error', null, 'Datos de solicitud no proporcionados');
            }
            break;

        case 'registrarSalida':
            if (isset($_POST["datos"]) && is_array($_POST["datos"])) {
                $respuesta = ModeloSolicitudSalida::mdlSalidaAlmacen("salidas_almacen", $_POST["datos"]);
                
                if ($respuesta == "ok") {
                    enviarRespuesta('success', null, 'Salida de almacén registrada correctamente');
                } else {
                    enviarRespuesta('error', null, 'Error al registrar la salida: ' . $respuesta);
                }
            } else {
                enviarRespuesta('error', null, 'Datos de salida no proporcionados');
            }
            break;

        case 'verificarStock':
            if (isset($_POST["codigo"]) && isset($_POST["almacen"]) && isset($_POST["cantidad"])) {
                $productos = ModeloSolicitudSalida::mdlMostrar("productos_ingresos", "codigo", $_POST["codigo"], "=");
                
                if (is_array($productos) && count($productos) > 0) {
                    $stockDisponible = 0;
                    foreach ($productos as $producto) {
                        if ($producto['fk_almacen'] == $_POST["almacen"]) {
                            $stockDisponible = $producto['stock'];
                            break;
                        }
                    }
                    
                    $cantidadSolicitada = (int)$_POST["cantidad"];
                    
                    if ($stockDisponible >= $cantidadSolicitada) {
                        enviarRespuesta('success', [
                            'disponible' => true,
                            'stock' => $stockDisponible,
                            'mensaje' => 'Stock suficiente'
                        ]);
                    } else {
                        enviarRespuesta('success', [
                            'disponible' => false,
                            'stock' => $stockDisponible,
                            'mensaje' => 'Stock insuficiente'
                        ]);
                    }
                } else {
                    enviarRespuesta('error', null, 'Producto no encontrado');
                }
            } else {
                enviarRespuesta('error', null, 'Parámetros insuficientes para verificar stock');
            }
            break;

        default:
            enviarRespuesta('error', null, 'Servicio no encontrado: ' . $_POST["ajaxservice"]);
            break;
    }

} catch (Exception $e) {
    error_log("Error en solicitud-salida.ajax.php: " . $e->getMessage());
    enviarRespuesta('error', null, 'Error interno del servidor');
}
?>