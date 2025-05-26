<?php
// Verificar si la sesión ya está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Incluir el modelo con verificación de rutas
$modeloFile = __DIR__ . '/../modelos/habilitaciones.modelo.php';
$altModeloFile = __DIR__ . '/../../modelos/habilitaciones.modelo.php';
$altModeloFile2 = 'modelos/habilitaciones.modelo.php';

if (file_exists($modeloFile)) {
    require_once $modeloFile;
} elseif (file_exists($altModeloFile)) {
    require_once $altModeloFile;
} elseif (file_exists($altModeloFile2)) {
    require_once $altModeloFile2;
} else {
    // Intentar con require_once directo
    try {
        require_once "../modelos/habilitaciones.modelo.php";
    } catch (Exception $e) {
        try {
            require_once "modelos/habilitaciones.modelo.php";
        } catch (Exception $e2) {
            die("Error: No se puede encontrar el archivo habilitaciones.modelo.php en ninguna ubicación");
        }
    }
}

class ControladorHabilitaciones
{
    /*=============================================
    CREAR HABILITACIONES
    =============================================*/
    public function ctrCrearHabilitaciones($request)
    {
        if ($this->validate($request, [
            "empleado_responsable",
            "departamento", 
            "motivo",
            "fecha_inicio",
            "monto",
            "estado",
            "metodo_pago",
            "detalles_pago",
            "aprobador"
        ])) {

            $tabla = "habilitaciones";
            $datos = array(
                "empleado_responsable" => $request["empleado_responsable"],
                "departamento" => $request["departamento"],
                "motivo" => $request["motivo"],
                "vehiculo" => isset($request["vehiculo"]) ? $request["vehiculo"] : "",
                "direccion_partida" => isset($request["direccion_partida"]) ? $request["direccion_partida"] : "",
                "direccion_llegada" => isset($request["direccion_llegada"]) ? $request["direccion_llegada"] : "",
                "fecha_inicio" => $request["fecha_inicio"],
                "fecha_fin" => isset($request["fecha_fin"]) ? $request["fecha_fin"] : "",
                "monto" => $request["monto"],
                "estado" => $request["estado"],
                "metodo_pago" => $request["metodo_pago"],
                "detalles_pago" => $request["detalles_pago"],
                "aprobador" => $request["aprobador"],
                "notas_adicionales" => isset($request["notas_adicionales"]) ? $request["notas_adicionales"] : ""
            );

            try {
                if (class_exists('ModeloHabilitaciones')) {
                    $respuesta = ModeloHabilitaciones::mdlIngresarHabilitaciones($tabla, $datos);
                } else {
                    $respuesta = "Error: Clase ModeloHabilitaciones no encontrada";
                }
                
                if ($respuesta == "ok") {
                    echo '<script>
                        swal({
                            type: "success",
                            title: "La habilitación ha sido registrada correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result) => {
                            if (result.value) {
                                window.location = "habilitaciones";
                            }
                        })
                    </script>';
                } else {
                    echo '<script>
                        swal({
                            type: "error",
                            title: "Error al registrar la habilitación",
                            text: "' . str_replace('"', '\\"', $respuesta) . '",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        })
                    </script>';
                }
            } catch (Exception $e) {
                error_log("Error en ctrCrearHabilitaciones: " . $e->getMessage());
                echo '<script>
                    swal({
                        type: "error",
                        title: "Error interno",
                        text: "Se produjo un error interno. Contacte al administrador.",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    })
                </script>';
            }
        } else {
            echo '<script>
                swal({
                    type: "error",
                    title: "Error de validación",
                    text: "Faltan campos obligatorios",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                })
            </script>';
        }
    }

    /*=============================================
    ACTUALIZAR HABILITACIONES
    =============================================*/
    public function ctrActualizarHabilitaciones($request)
    {
        if (!isset($request["id_habilitacion"])) {
            echo '<script>
                swal({
                    type: "error",
                    title: "Error",
                    text: "ID de habilitación no proporcionado",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                })
            </script>';
            return;
        }

        try {
            $list = $this->validateFileData($request, ["doc_final_hd"]);
            $doc1 = isset($request["doc_final_hd_db"]) ? $request["doc_final_hd_db"] : "";
            
            foreach ($list as $value) {
                switch ($value) {
                    case 'doc_final_hd':
                        if (!empty($doc1)) {
                            $this->eliminarDoc($doc1);
                        }
                        $doc1 = $this->guardarDoc($request, ['doc_final_hd']);
                        break;
                }
            }

            $tabla = "habilitaciones";
            $datos = array(
                "id" => $request["id_habilitacion"],
                "empleado_responsable" => $request["empleado_responsable"],
                "departamento" => $request["departamento"],
                "motivo" => $request["motivo"],
                "vehiculo" => isset($request["vehiculo"]) ? $request["vehiculo"] : "",
                "direccion_partida" => isset($request["direccion_partida"]) ? $request["direccion_partida"] : "",
                "direccion_llegada" => isset($request["direccion_llegada"]) ? $request["direccion_llegada"] : "",
                "fecha_inicio" => $request["fecha_inicio"],
                "fecha_fin" => isset($request["fecha_fin"]) ? $request["fecha_fin"] : "",
                "monto" => $request["monto"],
                "estado" => $request["estado"],
                "metodo_pago" => $request["metodo_pago"],
                "detalles_pago" => $request["detalles_pago"],
                "aprobador" => $request["aprobador"],
                "notas_adicionales" => isset($request["notas_adicionales"]) ? $request["notas_adicionales"] : "",
                "devolucion" => isset($request["devolucion"]) ? $request["devolucion"] : "0",
                "descuento" => isset($request["descuento"]) ? $request["descuento"] : "0",
                "gastos_tt" => isset($request["gastos_tt"]) ? $request["gastos_tt"] : "0",
                "gastos_ff" => isset($request["gastos_ff"]) ? $request["gastos_ff"] : "0",
                "doc_final" => $doc1
            );

            if (class_exists('ModeloHabilitaciones')) {
                $respuesta = ModeloHabilitaciones::mdlActualizarHabilitaciones($tabla, $datos);
            } else {
                $respuesta = "Error: Clase ModeloHabilitaciones no encontrada";
            }
            
            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        type: "success",
                        title: "La habilitación ha sido actualizada correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result) => {
                        if (result.value) {
                            window.location = "habilitaciones";
                        }
                    })
                </script>';
            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "Error al actualizar la habilitación",
                        text: "' . str_replace('"', '\\"', $respuesta) . '",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    })
                </script>';
            }
        } catch (Exception $e) {
            error_log("Error en ctrActualizarHabilitaciones: " . $e->getMessage());
            echo '<script>
                swal({
                    type: "error",
                    title: "Error interno",
                    text: "Se produjo un error interno. Contacte al administrador.",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                })
            </script>';
        }
    }

    /*=============================================
    CREAR HABILITACIÓN DESTINO
    =============================================*/
    public function ctrHabilitacionDest($request)
    {
        if (!isset($request["idhabilitacion"])) {
            return "Error: ID de habilitación no proporcionado";
        }

        try {
            $list = $this->validateFileData($request, ["evidencia_h"]);
            $doc1 = "";
            
            foreach ($list as $value) {
                switch ($value) {
                    case 'evidencia_h':
                        $doc1 = $this->guardarDoc($request, ['evidencia_h']);
                        break;
                }
            }

            $tabla = "habilitaciones_dests";
            $datos = array(
                "id" => $request["idhabilitacion"],
                "fecha_h" => isset($request["fecha_h"]) ? $request["fecha_h"] : date('Y-m-d'),
                "monto" => isset($request["montoGasto"]) ? $request["montoGasto"] : "0",
                "doc" => $doc1
            );

            if (class_exists('ModeloHabilitaciones')) {
                $respuesta = ModeloHabilitaciones::mdlIngresarHabilitaciones_dest($tabla, $datos);
            } else {
                $respuesta = "Error: Clase ModeloHabilitaciones no encontrada";
            }
            
            if ($respuesta == "ok") {
                return 'ok';
            } else {
                return "Error al registrar: " . $respuesta;
            }
        } catch (Exception $e) {
            error_log("Error en ctrHabilitacionDest: " . $e->getMessage());
            return "Error interno: " . $e->getMessage();
        }
    }

    /*=============================================
    MOSTRAR DATOS
    =============================================*/
    public static function ctrMostrar($tabla, $item, $dato)
    {
        try {
            if (class_exists('ModeloHabilitaciones')) {
                $respuesta = ModeloHabilitaciones::mdlMostrar($tabla, $item, $dato);
                return $respuesta;
            } else {
                return "Error: Clase ModeloHabilitaciones no encontrada";
            }
        } catch (Exception $e) {
            error_log("Error en ctrMostrar: " . $e->getMessage());
            return "Error: " . $e->getMessage();
        }
    }

    /*=============================================
    VALIDAR CAMPOS
    =============================================*/
    public function validate($request, $input)
    {
        $validation = true;
        foreach ($input as $key) {
            if (!isset($request[$key]) || empty($request[$key])) {
                $validation = false;
                break;
            }
        }
        return $validation;
    }

    /*=============================================
    VALIDAR ARCHIVOS
    =============================================*/
    public function validateFileData($request, $fields)
    {
        $listNotEmpty = [];
        foreach ($fields as $key) {
            if (isset($_FILES[$key]) && $_FILES[$key]['error'] === 0) {
                $listNotEmpty[] = $key;
            }
        }
        return $listNotEmpty;
    }

    /*=============================================
    GUARDAR DOCUMENTO
    =============================================*/
    private function guardarDoc($request, $fields)
    {
        foreach ($fields as $key) {
            $ruta = $_SERVER['DOCUMENT_ROOT'] . "/vistas/img/habilitacion/";
            $extension = pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);
            $aleatorio = date('YmdHis') . uniqid();
            $nombre = $aleatorio . '.' . $extension;
            $nombreDb = "vistas/img/habilitacion/" . $nombre;
            $ruta_carga = $ruta . $nombre;

            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, true);
            }

            if (move_uploaded_file($_FILES[$key]['tmp_name'], $ruta_carga)) {
                return $nombreDb;
            }
        }
        return "";
    }

    /*=============================================
    ELIMINAR DOCUMENTO
    =============================================*/
    private function eliminarDoc($ruta)
    {
        $rutaCompleta = $_SERVER['DOCUMENT_ROOT'] . "/" . $ruta;
        if (file_exists($rutaCompleta)) {
            unlink($rutaCompleta);
        }
    }

    /*=============================================
    CALCULAR TOTALES DE HABILITACIÓN
    =============================================*/
    public static function ctrCalcularTotales($idHabilitacion)
    {
        try {
            // Obtener datos de la habilitación principal
            $habilitacion = self::ctrMostrar("habilitaciones", "id", $idHabilitacion);
            
            // Obtener gastos asociados
            $gastos = self::ctrMostrar("habilitaciones_dests", "id", $idHabilitacion);
            
            if (!$habilitacion || !is_array($habilitacion)) {
                return ["error" => "Habilitación no encontrada"];
            }

            $montoInicial = floatval($habilitacion['monto']);
            $totalGastos = 0;

            if (is_array($gastos)) {
                foreach ($gastos as $gasto) {
                    $totalGastos += floatval($gasto['monto']);
                }
            }

            $devolucion = $montoInicial - $totalGastos;

            return [
                "monto_inicial" => $montoInicial,
                "total_gastos" => $totalGastos,
                "devolucion" => $devolucion,
                "estado" => $devolucion >= 0 ? "correcto" : "excedido"
            ];
        } catch (Exception $e) {
            error_log("Error en ctrCalcularTotales: " . $e->getMessage());
            return ["error" => "Error al calcular totales"];
        }
    }
}

// *** NO HAY MÁS CÓDIGO DESPUÉS DE ESTA LÍNEA ***
// *** EL MANEJO DE $_POST["accion"] SE ELIMINÓ COMPLETAMENTE ***
?>