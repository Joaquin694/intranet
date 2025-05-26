<?php
// iperc.ajax.php - MANEJADOR DE PETICIONES AJAX

require_once "../controladores/iperc.controlador.php";
require_once "../modelos/iperc.modelo.php";

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
        case 'loadData':
            $respuesta = ModeloIperc::mdlMostrarIperc("iperc", null, null);
            
            if (is_array($respuesta)) {
                enviarRespuesta('success', $respuesta);
            } else {
                enviarRespuesta('error', null, 'Error al cargar los datos de IPERC');
            }
            break;

        case 'loadEdit':
            if (isset($_POST["idaa"]) && !empty($_POST["idaa"])) {
                $respuesta = ModeloIperc::mdlMostrarIperc("iperc", "id", $_POST["idaa"]);
                
                if ($respuesta && !is_string($respuesta)) {
                    enviarRespuesta('success', $respuesta);
                } else {
                    enviarRespuesta('error', null, 'No se encontró el IPERC o error en la consulta');
                }
            } else {
                enviarRespuesta('error', null, 'ID del IPERC no proporcionado');
            }
            break;

        case 'eliminar':
            if (isset($_POST["id"]) && !empty($_POST["id"])) {
                // Primero obtener los datos para eliminar archivos
                $respuesta = ModeloIperc::mdlMostrarIperc("iperc", "id", $_POST["id"]);
                
                if ($respuesta && !is_string($respuesta)) {
                    // Eliminar archivos asociados
                    $list = ModeloIperc::validateFileData($respuesta);
                    $archivosEliminados = [];
                    $erroresArchivos = [];

                    foreach ($list as $archivo) {
                        if (ModeloIperc::eliminarDoc($archivo)) {
                            $archivosEliminados[] = $archivo;
                        } else {
                            $erroresArchivos[] = $archivo;
                        }
                    }

                    // Eliminar registro de la base de datos
                    $resultadoEliminacion = ModeloIperc::mdlEliminarIperc("iperc", "id", $_POST["id"]);
                    
                    if ($resultadoEliminacion == "ok") {
                        $mensaje = "IPERC eliminado correctamente.";
                        if (!empty($archivosEliminados)) {
                            $mensaje .= " Archivos eliminados: " . implode(", ", $archivosEliminados);
                        }
                        if (!empty($erroresArchivos)) {
                            $mensaje .= " Errores al eliminar archivos: " . implode(", ", $erroresArchivos);
                        }
                        
                        enviarRespuesta('success', null, $mensaje);
                    } else {
                        enviarRespuesta('error', null, 'Error al eliminar el IPERC de la base de datos: ' . $resultadoEliminacion);
                    }
                } else {
                    enviarRespuesta('error', null, 'No se encontró el IPERC a eliminar');
                }
            } else {
                enviarRespuesta('error', null, 'ID del IPERC no proporcionado para eliminación');
            }
            break;

        case 'crearIperc':
            if (isset($_POST["datos"]) && is_array($_POST["datos"])) {
                $respuesta = ModeloIperc::mdlIngresarIperc("iperc", $_POST["datos"]);
                
                if ($respuesta == "ok") {
                    enviarRespuesta('success', null, 'IPERC creado correctamente');
                } else {
                    enviarRespuesta('error', null, 'Error al crear el IPERC: ' . $respuesta);
                }
            } else {
                enviarRespuesta('error', null, 'Datos del IPERC no proporcionados');
            }
            break;

        case 'actualizarIperc':
            if (isset($_POST["datos"]) && is_array($_POST["datos"])) {
                $respuesta = ModeloIperc::mdlActualizarIperc("iperc", $_POST["datos"]);
                
                if ($respuesta == "ok") {
                    enviarRespuesta('success', null, 'IPERC actualizado correctamente');
                } else {
                    enviarRespuesta('error', null, 'Error al actualizar el IPERC: ' . $respuesta);
                }
            } else {
                enviarRespuesta('error', null, 'Datos del IPERC no proporcionados para actualización');
            }
            break;

        case 'verificarArchivos':
            if (isset($_POST["iperc_id"]) && !empty($_POST["iperc_id"])) {
                $respuesta = ModeloIperc::mdlMostrarIperc("iperc", "id", $_POST["iperc_id"]);
                
                if ($respuesta && !is_string($respuesta)) {
                    $archivos = ModeloIperc::validateFileData($respuesta);
                    enviarRespuesta('success', $archivos, 'Archivos verificados');
                } else {
                    enviarRespuesta('error', null, 'No se encontró el IPERC para verificar archivos');
                }
            } else {
                enviarRespuesta('error', null, 'ID del IPERC no proporcionado para verificación');
            }
            break;

        case 'buscarPorFecha':
            if (isset($_POST["fecha_inicio"]) && isset($_POST["fecha_fin"])) {
                // Esta funcionalidad requeriría un método adicional en el modelo
                // Por ahora devolvemos todos los registros
                $respuesta = ModeloIperc::mdlMostrarIperc("iperc", null, null);
                
                if (is_array($respuesta)) {
                    // Filtrar por fecha en PHP (idealmente esto se haría en SQL)
                    $fechaInicio = $_POST["fecha_inicio"];
                    $fechaFin = $_POST["fecha_fin"];
                    
                    $resultadosFiltrados = array_filter($respuesta, function($item) use ($fechaInicio, $fechaFin) {
                        $fechaItem = $item['date'];
                        return $fechaItem >= $fechaInicio && $fechaItem <= $fechaFin;
                    });
                    
                    enviarRespuesta('success', array_values($resultadosFiltrados));
                } else {
                    enviarRespuesta('error', null, 'Error al buscar IPERC por fecha');
                }
            } else {
                enviarRespuesta('error', null, 'Fechas no proporcionadas para la búsqueda');
            }
            break;

        case 'buscarPorArea':
            if (isset($_POST["area"]) && !empty($_POST["area"])) {
                // Esta funcionalidad requeriría un método adicional en el modelo
                $respuesta = ModeloIperc::mdlMostrarIperc("iperc", null, null);
                
                if (is_array($respuesta)) {
                    $area = $_POST["area"];
                    $resultadosFiltrados = array_filter($respuesta, function($item) use ($area) {
                        return stripos($item['area'], $area) !== false;
                    });
                    
                    enviarRespuesta('success', array_values($resultadosFiltrados));
                } else {
                    enviarRespuesta('error', null, 'Error al buscar IPERC por área');
                }
            } else {
                enviarRespuesta('error', null, 'Área no proporcionada para la búsqueda');
            }
            break;

        case 'estadisticas':
            $respuesta = ModeloIperc::mdlMostrarIperc("iperc", null, null);
            
            if (is_array($respuesta)) {
                $estadisticas = [
                    'total_registros' => count($respuesta),
                    'por_area' => [],
                    'por_clasificacion' => [],
                    'por_mes' => []
                ];
                
                // Contar por área
                $areas = array_column($respuesta, 'area');
                $estadisticas['por_area'] = array_count_values($areas);
                
                // Contar por clasificación
                $clasificaciones = array_column($respuesta, 'clasificacion');
                $estadisticas['por_clasificacion'] = array_count_values($clasificaciones);
                
                // Contar por mes
                foreach ($respuesta as $item) {
                    $mes = date('Y-m', strtotime($item['date']));
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

        case 'duplicar':
            if (isset($_POST["id_original"]) && !empty($_POST["id_original"])) {
                // Obtener el registro original
                $registroOriginal = ModeloIperc::mdlMostrarIperc("iperc", "id", $_POST["id_original"]);
                
                if ($registroOriginal && !is_string($registroOriginal)) {
                    // Remover el ID para crear uno nuevo
                    unset($registroOriginal['id']);
                    
                    // Limpiar archivos de firmas para que se suban nuevos
                    $registroOriginal['supervisor_signature'] = '';
                    $registroOriginal['encargado_signature'] = '';
                    $registroOriginal['worker_signature1'] = '';
                    $registroOriginal['worker_signature2'] = '';
                    $registroOriginal['worker_signature3'] = '';
                    $registroOriginal['worker_signature4'] = '';
                    $registroOriginal['worker_signature5'] = '';
                    $registroOriginal['supervisor_signature1'] = '';
                    
                    // Actualizar fecha a hoy
                    $registroOriginal['date'] = date('Y-m-d');
                    
                    $respuesta = ModeloIperc::mdlIngresarIperc("iperc", $registroOriginal);
                    
                    if ($respuesta == "ok") {
                        enviarRespuesta('success', null, 'IPERC duplicado correctamente');
                    } else {
                        enviarRespuesta('error', null, 'Error al duplicar el IPERC: ' . $respuesta);
                    }
                } else {
                    enviarRespuesta('error', null, 'No se encontró el IPERC original para duplicar');
                }
            } else {
                enviarRespuesta('error', null, 'ID del IPERC original no proporcionado');
            }
            break;

        default:
            enviarRespuesta('error', null, 'Servicio no encontrado: ' . $_POST["ajaxservice"]);
            break;
    }

} catch (Exception $e) {
    error_log("Error en iperc.ajax.php: " . $e->getMessage());
    enviarRespuesta('error', null, 'Error interno del servidor');
}
?>