<?php
// activos-fijos.services.php - Servicios AJAX específicos

require_once "../controladores/activos-fijos.controlador.php";

// Verificar que sea una petición POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Método no permitido']);
    exit;
}

// Función para enviar respuesta JSON
function enviarRespuesta($data) {
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}

// Verificar si $_POST['accion'] está definido antes de usarlo
if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'tipo_de_cambio_dolares':
            if (!isset($_POST['fecha_contabilizacion_compra'])) {
                enviarRespuesta(['error' => 'Fecha de contabilización no proporcionada']);
            }

            $fecha_contabilizacion_compra = $_POST['fecha_contabilizacion_compra'];
            $tipoCambio = ControladorActivosFijos::ctrObtenerTipoCambio($fecha_contabilizacion_compra);
            
            if ($tipoCambio !== false) {
                echo $tipoCambio; // Mantener formato original para compatibilidad
            } else {
                enviarRespuesta(['error' => 'No se pudo obtener el tipo de cambio']);
            }
            break;

        case 'getProveedores':
            try {
                $proveedores = ControladorActivosFijos::ctrMostrar2('proveedores');
                if ($proveedores === null || empty($proveedores)) {
                    enviarRespuesta(['error' => 'No se encontraron proveedores']);
                } else {
                    enviarRespuesta($proveedores);
                }
            } catch (Exception $e) {
                error_log("Error al obtener proveedores: " . $e->getMessage());
                enviarRespuesta(['error' => 'Error interno al obtener proveedores']);
            }
            break;

        case 'getCategorias':
            try {
                $categorias = ControladorActivosFijos::ctrMostrar2('categorias');
                if ($categorias === null || empty($categorias)) {
                    enviarRespuesta(['error' => 'No se encontraron categorías']);
                } else {
                    enviarRespuesta($categorias);
                }
            } catch (Exception $e) {
                error_log("Error al obtener categorías: " . $e->getMessage());
                enviarRespuesta(['error' => 'Error interno al obtener categorías']);
            }
            break;

        case 'getUbicaciones':
            try {
                $ubicaciones = ControladorActivosFijos::ctrMostrar2('ubicaciones');
                if ($ubicaciones === null || empty($ubicaciones)) {
                    enviarRespuesta(['error' => 'No se encontraron ubicaciones']);
                } else {
                    enviarRespuesta($ubicaciones);
                }
            } catch (Exception $e) {
                error_log("Error al obtener ubicaciones: " . $e->getMessage());
                enviarRespuesta(['error' => 'Error interno al obtener ubicaciones']);
            }
            break;

        case 'validarCodigoInterno':
            if (!isset($_POST['codigo'])) {
                enviarRespuesta(['error' => 'Código no proporcionado']);
            }

            try {
                $codigo = $_POST['codigo'];
                $existe = ControladorActivosFijos::ctrMostrarActivosFijos('codigo_interno', $codigo);
                
                if ($existe && !empty($existe)) {
                    enviarRespuesta(['existe' => true, 'message' => 'El código ya existe']);
                } else {
                    enviarRespuesta(['existe' => false, 'message' => 'Código disponible']);
                }
            } catch (Exception $e) {
                error_log("Error al validar código interno: " . $e->getMessage());
                enviarRespuesta(['error' => 'Error interno al validar código']);
            }
            break;

        default:
            enviarRespuesta(['error' => 'Acción no reconocida: ' . $_POST['accion']]);
            break;
    }
} else {
    enviarRespuesta(['error' => 'No se especificó la acción']);
}
?>