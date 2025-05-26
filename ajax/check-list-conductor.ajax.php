<?php
// check-list-conductor.ajax.php - MANEJADOR DE PETICIONES AJAX

require_once "../controladores/check-list-conductor.controlador.php";
require_once "../modelos/check-list-conductor.modelo.php";

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
            $respuesta = ModeloCheckListConductor::mdlMostrarCheckListConductor("check_list_conductor_2", null, null);
            
            if (is_array($respuesta)) {
                enviarRespuesta('success', $respuesta);
            } else {
                enviarRespuesta('error', null, 'Error al cargar los datos del check list');
            }
            break;

        case 'loadEdit':
            if (isset($_POST["idaa"]) && !empty($_POST["idaa"])) {
                $respuesta = ModeloCheckListConductor::mdlMostrarCheckListConductor("check_list_conductor_2", "id", $_POST["idaa"]);
                
                if ($respuesta && !is_string($respuesta)) {
                    enviarRespuesta('success', $respuesta);
                } else {
                    enviarRespuesta('error', null, 'No se encontró el check list o error en la consulta');
                }
            } else {
                enviarRespuesta('error', null, 'ID del check list no proporcionado');
            }
            break;

        case 'eliminar':
            if (isset($_POST["idEliminar"]) && !empty($_POST["idEliminar"])) {
                $respuesta = ModeloCheckListConductor::mdlEliminarCheckListConductor("check_list_conductor_2", "id", $_POST["idEliminar"]);
                
                if ($respuesta == "ok") {
                    enviarRespuesta('success', null, 'Check list eliminado correctamente');
                } else {
                    enviarRespuesta('error', null, 'Error al eliminar el check list: ' . $respuesta);
                }
            } else {
                enviarRespuesta('error', null, 'ID del check list no proporcionado para eliminación');
            }
            break;

        case 'crearCheckList':
            if (isset($_POST["datos"]) && is_array($_POST["datos"])) {
                $respuesta = ModeloCheckListConductor::mdlIngresarCheckListConductor("check_list_conductor_2", $_POST["datos"]);
                
                if ($respuesta == "ok") {
                    enviarRespuesta('success', null, 'Check list creado correctamente');
                } else {
                    enviarRespuesta('error', null, 'Error al crear el check list: ' . $respuesta);
                }
            } else {
                enviarRespuesta('error', null, 'Datos del check list no proporcionados');
            }
            break;

        case 'actualizarCheckList':
            if (isset($_POST["datos"]) && is_array($_POST["datos"])) {
                $respuesta = ModeloCheckListConductor::mdlActualizarCheckListConductor("check_list_conductor_2", $_POST["datos"]);
                
                if ($respuesta == "ok") {
                    enviarRespuesta('success', null, 'Check list actualizado correctamente');
                } else {
                    enviarRespuesta('error', null, 'Error al actualizar el check list: ' . $respuesta);
                }
            } else {
                enviarRespuesta('error', null, 'Datos del check list no proporcionados para actualización');
            }
            break;

        case 'buscarPorPlaca':
            if (isset($_POST["placa"]) && !empty($_POST["placa"])) {
                $respuesta = ModeloCheckListConductor::mdlBuscarPorPlaca("check_list_conductor_2", $_POST["placa"]);
                
                if (is_array($respuesta)) {
                    enviarRespuesta('success', $respuesta);
                } else {
                    enviarRespuesta('error', null, 'Error al buscar por placa');
                }
            } else {
                enviarRespuesta('error', null, 'Placa no proporcionada para la búsqueda');
            }
            break;

        case 'buscarPorFecha':
            if (isset($_POST["fecha_inicio"]) && isset($_POST["fecha_fin"]) && 
                !empty($_POST["fecha_inicio"]) && !empty($_POST["fecha_fin"])) {
                
                $respuesta = ModeloCheckListConductor::mdlBuscarPorFecha("check_list_conductor_2", $_POST["fecha_inicio"], $_POST["fecha_fin"]);
                
                if (is_array($respuesta)) {
                    enviarRespuesta('success', $respuesta);
                } else {
                    enviarRespuesta('error', null, 'Error al buscar por fechas');
                }
            } else {
                enviarRespuesta('error', null, 'Fechas no proporcionadas para la búsqueda');
            }
            break;

        case 'validarFormulario':
            if (isset($_POST["datos"]) && is_array($_POST["datos"])) {
                $datos = $_POST["datos"];
                $errores = [];

                // Validar campos obligatorios
                $camposObligatorios = ['options', 'day', 'placadb'];
                foreach ($camposObligatorios as $campo) {
                    if (!isset($datos[$campo]) || empty($datos[$campo])) {
                        $errores[] = "El campo $campo es obligatorio";
                    }
                }

                // Validar que al menos algunos inputs tengan valor
                $inputsCompletos = 0;
                for ($i = 1; $i <= 58; $i++) {
                    if (!empty($datos["input_$i"])) {
                        $inputsCompletos++;
                    }
                }

                if ($inputsCompletos < 10) {
                    $errores[] = "Debe completar al menos 10 elementos del check list";
                }

                if (empty($errores)) {
                    enviarRespuesta('success', null, 'Formulario válido');
                } else {
                    enviarRespuesta('error', $errores, 'Errores de validación encontrados');
                }
            } else {
                enviarRespuesta('error', null, 'Datos no proporcionados para validación');
            }
            break;

        case 'obtenerEstadisticas':
            $respuesta = ModeloCheckListConductor::mdlMostrarCheckListConductor("check_list_conductor_2", null, null);
            
            if (is_array($respuesta)) {
                $estadisticas = [
                    'total_registros' => count($respuesta),
                    'por_placa' => [],
                    'por_fecha' => [],
                    'por_opciones' => []
                ];

                // Contar por placa
                $placas = array_column($respuesta, 'placadb');
                $estadisticas['por_placa'] = array_count_values(array_filter($placas));

                // Contar por opciones (conductor)
                $opciones = array_column($respuesta, 'options');
                $estadisticas['por_opciones'] = array_count_values(array_filter($opciones));

                // Contar por mes
                foreach ($respuesta as $item) {
                    if (!empty($item['day'])) {
                        $mes = date('Y-m', strtotime($item['day']));
                        if (!isset($estadisticas['por_fecha'][$mes])) {
                            $estadisticas['por_fecha'][$mes] = 0;
                        }
                        $estadisticas['por_fecha'][$mes]++;
                    }
                }

                enviarRespuesta('success', $estadisticas);
            } else {
                enviarRespuesta('error', null, 'Error al generar estadísticas');
            }
            break;

        case 'duplicarCheckList':
            if (isset($_POST["id_original"]) && !empty($_POST["id_original"])) {
                // Obtener el registro original
                $registroOriginal = ModeloCheckListConductor::mdlMostrarCheckListConductor("check_list_conductor_2", "id", $_POST["id_original"]);
                
                if ($registroOriginal && !is_string($registroOriginal)) {
                    // Remover el ID para crear uno nuevo
                    unset($registroOriginal['id']);
                    unset($registroOriginal['fecha_registro']);
                    
                    // Actualizar la fecha a hoy
                    $registroOriginal['day'] = date('Y-m-d');
                    
                    // Limpiar imágenes para que se suban nuevas
                    $registroOriginal['frontImg'] = '';
                    $registroOriginal['rearImg'] = '';
                    $registroOriginal['leftImg'] = '';
                    $registroOriginal['rightImg'] = '';
                    
                    $respuesta = ModeloCheckListConductor::mdlIngresarCheckListConductor("check_list_conductor_2", $registroOriginal);
                    
                    if ($respuesta == "ok") {
                        enviarRespuesta('success', null, 'Check list duplicado correctamente');
                    } else {
                        enviarRespuesta('error', null, 'Error al duplicar el check list: ' . $respuesta);
                    }
                } else {
                    enviarRespuesta('error', null, 'No se encontró el check list original para duplicar');
                }
            } else {
                enviarRespuesta('error', null, 'ID del check list original no proporcionado');
            }
            break;

        case 'exportarDatos':
            if (isset($_POST["formato"]) && in_array($_POST["formato"], ['json', 'csv'])) {
                $respuesta = ModeloCheckListConductor::mdlMostrarCheckListConductor("check_list_conductor_2", null, null);
                
                if (is_array($respuesta)) {
                    if ($_POST["formato"] === 'json') {
                        header('Content-Type: application/json');
                        header('Content-Disposition: attachment; filename="checklist_conductor_' . date('Y-m-d') . '.json"');
                        echo json_encode($respuesta, JSON_PRETTY_PRINT);
                        exit;
                    } else if ($_POST["formato"] === 'csv') {
                        header('Content-Type: text/csv');
                        header('Content-Disposition: attachment; filename="checklist_conductor_' . date('Y-m-d') . '.csv"');
                        
                        $output = fopen('php://output', 'w');
                        
                        // Escribir encabezados
                        if (!empty($respuesta)) {
                            fputcsv($output, array_keys($respuesta[0]));
                            
                            // Escribir datos
                            foreach ($respuesta as $row) {
                                fputcsv($output, $row);
                            }
                        }
                        
                        fclose($output);
                        exit;
                    }
                } else {
                    enviarRespuesta('error', null, 'Error al obtener datos para exportar');
                }
            } else {
                enviarRespuesta('error', null, 'Formato de exportación no válido');
            }
            break;

        case 'resumenChecklist':
            if (isset($_POST["id"]) && !empty($_POST["id"])) {
                $respuesta = ModeloCheckListConductor::mdlMostrarCheckListConductor("check_list_conductor_2", "id", $_POST["id"]);
                
                if ($respuesta && !is_string($respuesta)) {
                    $resumen = [
                        'info_basica' => [
                            'conductor' => $respuesta['options'],
                            'fecha' => $respuesta['day'],
                            'placa' => $respuesta['placadb']
                        ],
                        'estado_items' => [],
                        'comentarios' => [],
                        'imagenes' => [
                            'frontal' => $respuesta['frontImg'],
                            'trasera' => $respuesta['rearImg'],
                            'izquierda' => $respuesta['leftImg'],
                            'derecha' => $respuesta['rightImg']
                        ]
                    ];

                    // Analizar estado de items
                    $itemsOk = 0;
                    $itemsNoOk = 0;
                    $itemsNA = 0;
                    
                    for ($i = 1; $i <= 58; $i++) {
                        $inputKey = "input_$i";
                        $comKey = "com_input_$i";
                        
                        if (isset($respuesta[$inputKey])) {
                            switch (strtolower($respuesta[$inputKey])) {
                                case 'ok':
                                case 'si':
                                case 'bueno':
                                    $itemsOk++;
                                    break;
                                case 'no ok':
                                case 'no':
                                case 'malo':
                                    $itemsNoOk++;
                                    break;
                                case 'n/a':
                                case 'na':
                                    $itemsNA++;
                                    break;
                            }
                        }
                        
                        // Recopilar comentarios no vacíos
                        if (!empty($respuesta[$comKey])) {
                            $resumen['comentarios'][] = [
                                'item' => $i,
                                'comentario' => $respuesta[$comKey]
                            ];
                        }
                    }

                    $resumen['estado_items'] = [
                        'ok' => $itemsOk,
                        'no_ok' => $itemsNoOk,
                        'na' => $itemsNA,
                        'total' => $itemsOk + $itemsNoOk + $itemsNA
                    ];

                    enviarRespuesta('success', $resumen);
                } else {
                    enviarRespuesta('error', null, 'No se encontró el check list para generar resumen');
                }
            } else {
                enviarRespuesta('error', null, 'ID del check list no proporcionado para resumen');
            }
            break;

        case 'validarPlaca':
            if (isset($_POST["placa"]) && !empty($_POST["placa"])) {
                $placa = trim($_POST["placa"]);
                
                // Validar formato de placa (ejemplo para Perú)
                if (preg_match('/^[A-Z0-9]{6,8}$/', $placa)) {
                    // Verificar si ya existe un checklist para esta placa hoy
                    $hoy = date('Y-m-d');
                    $existing = ModeloCheckListConductor::mdlBuscarPorFecha("check_list_conductor_2", $hoy, $hoy);
                    
                    $placaExiste = false;
                    if (is_array($existing)) {
                        foreach ($existing as $item) {
                            if ($item['placadb'] === $placa) {
                                $placaExiste = true;
                                break;
                            }
                        }
                    }
                    
                    if ($placaExiste) {
                        enviarRespuesta('warning', null, 'Ya existe un checklist para esta placa el día de hoy');
                    } else {
                        enviarRespuesta('success', null, 'Placa válida y disponible');
                    }
                } else {
                    enviarRespuesta('error', null, 'Formato de placa no válido');
                }
            } else {
                enviarRespuesta('error', null, 'Placa no proporcionada para validación');
            }
            break;

        default:
            enviarRespuesta('error', null, 'Servicio no encontrado: ' . $_POST["ajaxservice"]);
            break;
    }

} catch (Exception $e) {
    error_log("Error en check-list-conductor.ajax.php: " . $e->getMessage());
    enviarRespuesta('error', null, 'Error interno del servidor');
}
?>