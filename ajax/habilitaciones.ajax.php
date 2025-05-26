<?php
// habilitaciones.ajax.php - MANEJADOR DE PETICIONES AJAX

require_once "../controladores/habilitaciones.controlador.php";
require_once "../modelos/habilitaciones.modelo.php";

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

// Verificar que exista el parámetro accion
if (!isset($_POST["accion"])) {
    enviarRespuesta('error', null, 'No se especificó la acción');
}

try {
    switch ($_POST["accion"]) {
        case 'registrar':
            $controlador = new ControladorHabilitaciones();
            
            // Capturar la salida del controlador
            ob_start();
            $controlador->ctrCrearHabilitaciones($_POST);
            $output = ob_get_clean();
            
            // Si hay salida, probablemente sea un script de SweetAlert
            if (!empty($output)) {
                if (strpos($output, 'success') !== false) {
                    enviarRespuesta('success', null, 'Habilitación registrada correctamente');
                } else {
                    enviarRespuesta('error', null, 'Error al registrar la habilitación');
                }
            } else {
                enviarRespuesta('success', null, 'Habilitación registrada correctamente');
            }
            break;

        case 'editar':
            $controlador = new ControladorHabilitaciones();
            
            // Capturar la salida del controlador
            ob_start();
            $controlador->ctrActualizarHabilitaciones($_POST);
            $output = ob_get_clean();
            
            // Si hay salida, probablemente sea un script de SweetAlert
            if (!empty($output)) {
                if (strpos($output, 'success') !== false) {
                    enviarRespuesta('success', null, 'Habilitación actualizada correctamente');
                } else {
                    enviarRespuesta('error', null, 'Error al actualizar la habilitación');
                }
            } else {
                enviarRespuesta('success', null, 'Habilitación actualizada correctamente');
            }
            break;

        case 'cargar_d_h':
            $controlador = new ControladorHabilitaciones();
            $respuesta = $controlador->ctrHabilitacionDest($_POST);
            
            if ($respuesta === 'ok') {
                enviarRespuesta('success', null, 'Gasto registrado correctamente');
            } else {
                enviarRespuesta('error', null, $respuesta);
            }
            break;

        case 'obtenerHabilitacion':
            if (isset($_POST["id"]) && !empty($_POST["id"])) {
                $respuesta = ControladorHabilitaciones::ctrMostrar("habilitaciones", "id", $_POST["id"]);
                
                if ($respuesta && !is_string($respuesta)) {
                    enviarRespuesta('success', $respuesta);
                } else {
                    enviarRespuesta('error', null, 'No se encontró la habilitación');
                }
            } else {
                enviarRespuesta('error', null, 'ID de habilitación no proporcionado');
            }
            break;

        case 'listarHabilitaciones':
            $respuesta = ControladorHabilitaciones::ctrMostrar("habilitaciones", null, null);
            
            if (is_array($respuesta)) {
                enviarRespuesta('success', $respuesta);
            } else {
                enviarRespuesta('error', null, 'Error al cargar las habilitaciones');
            }
            break;

        case 'obtenerGastos':
            if (isset($_POST["id_habilitacion"]) && !empty($_POST["id_habilitacion"])) {
                $respuesta = ControladorHabilitaciones::ctrMostrar("habilitaciones_dests", "id", $_POST["id_habilitacion"]);
                
                if (is_array($respuesta) || $respuesta === null) {
                    enviarRespuesta('success', $respuesta ?: []);
                } else {
                    enviarRespuesta('error', null, 'Error al cargar los gastos');
                }
            } else {
                enviarRespuesta('error', null, 'ID de habilitación no proporcionado');
            }
            break;

        case 'calcularTotales':
            if (isset($_POST["id_habilitacion"]) && !empty($_POST["id_habilitacion"])) {
                $totales = ControladorHabilitaciones::ctrCalcularTotales($_POST["id_habilitacion"]);
                
                if (isset($totales['error'])) {
                    enviarRespuesta('error', null, $totales['error']);
                } else {
                    enviarRespuesta('success', $totales);
                }
            } else {
                enviarRespuesta('error', null, 'ID de habilitación no proporcionado');
            }
            break;

        case 'buscarPorEmpleado':
            if (isset($_POST["empleado"]) && !empty($_POST["empleado"])) {
                $respuesta = ModeloHabilitaciones::mdlBuscarPorEmpleado("habilitaciones", $_POST["empleado"]);
                
                if (is_array($respuesta)) {
                    enviarRespuesta('success', $respuesta);
                } else {
                    enviarRespuesta('error', null, 'Error al buscar habilitaciones');
                }
            } else {
                enviarRespuesta('error', null, 'Nombre de empleado no proporcionado');
            }
            break;

        case 'buscarPorFecha':
            if (isset($_POST["fecha_inicio"]) && isset($_POST["fecha_fin"])) {
                $respuesta = ModeloHabilitaciones::mdlBuscarPorFecha("habilitaciones", $_POST["fecha_inicio"], $_POST["fecha_fin"]);
                
                if (is_array($respuesta)) {
                    enviarRespuesta('success', $respuesta);
                } else {
                    enviarRespuesta('error', null, 'Error al buscar por fechas');
                }
            } else {
                enviarRespuesta('error', null, 'Fechas no proporcionadas');
            }
            break;

        case 'cambiarEstado':
            if (isset($_POST["id"]) && isset($_POST["nuevo_estado"])) {
                $respuesta = ModeloHabilitaciones::mdlCambiarEstado("habilitaciones", $_POST["id"], $_POST["nuevo_estado"]);
                
                if ($respuesta === "ok") {
                    enviarRespuesta('success', null, 'Estado actualizado correctamente');
                } else {
                    enviarRespuesta('error', null, 'Error al cambiar el estado: ' . $respuesta);
                }
            } else {
                enviarRespuesta('error', null, 'ID o estado no proporcionados');
            }
            break;

        case 'obtenerEstadisticas':
            $respuesta = ControladorHabilitaciones::ctrMostrar("habilitaciones", null, null);
            
            if (is_array($respuesta)) {
                $estadisticas = [
                    'total_habilitaciones' => count($respuesta),
                    'por_estado' => [],
                    'por_departamento' => [],
                    'total_montos' => 0,
                    'por_mes' => []
                ];

                foreach ($respuesta as $item) {
                    // Contar por estado
                    $estado = $item['estado'];
                    if (!isset($estadisticas['por_estado'][$estado])) {
                        $estadisticas['por_estado'][$estado] = 0;
                    }
                    $estadisticas['por_estado'][$estado]++;

                    // Contar por departamento
                    $departamento = $item['departamento'];
                    if (!isset($estadisticas['por_departamento'][$departamento])) {
                        $estadisticas['por_departamento'][$departamento] = 0;
                    }
                    $estadisticas['por_departamento'][$departamento]++;

                    // Sumar montos
                    $estadisticas['total_montos'] += floatval($item['monto']);

                    // Contar por mes
                    $mes = date('Y-m', strtotime($item['fecha_inicio']));
                    if (!isset($estadisticas['por_mes'][$mes])) {
                        $estadisticas['por_mes'][$mes] = 0;
                    }
                    $estadisticas['por_mes'][$mes]++;
                }

                enviarRespuesta('success', $estadisticas);
            } else {
                enviarRespuesta('error', null, 'Error al generar estadísticas');
            }
            break;

        case 'eliminarHabilitacion':
            if (isset($_POST["id"]) && !empty($_POST["id"])) {
                $respuesta = ModeloHabilitaciones::mdlEliminarHabilitacion("habilitaciones", $_POST["id"]);
                
                if ($respuesta === "ok") {
                    enviarRespuesta('success', null, 'Habilitación eliminada correctamente');
                } else {
                    enviarRespuesta('error', null, 'Error al eliminar la habilitación: ' . $respuesta);
                }
            } else {
                enviarRespuesta('error', null, 'ID de habilitación no proporcionado');
            }
            break;

        default:
            enviarRespuesta('error', null, 'Acción no reconocida: ' . $_POST["accion"]);
            break;
    }

} catch (Exception $e) {
    error_log("Error en habilitaciones.ajax.php: " . $e->getMessage());
    enviarRespuesta('error', null, 'Error interno del servidor');
}
?>