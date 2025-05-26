<?php
// Verificar si la sesión ya está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Incluir el modelo con verificación de rutas
$modeloFile = '../modelos/solicitud_salida.modelo.php';
$altModeloFile = 'modelos/solicitud_salida.modelo.php';

if (file_exists($modeloFile)) {
    require_once $modeloFile;
} elseif (file_exists($altModeloFile)) {
    require_once $altModeloFile;
} else {
    die("Error: No se puede encontrar el archivo solicitud_salida.modelo.php");
}

class ControladorSolicitudSalida {

    /*=============================================================
    REGISTRAR SALIDA
    ============================================================*/
    public function ctrSalidaAlmacen() {
        if (isset($_POST["rgtsldidSalidaAlmacen"])) {
            // Validar que los campos requeridos estén presentes
            $camposRequeridos = [
                "rgtsldidSalidaAlmacen",
                "rgtsldSalidaAlmacenCantidad", 
                "rgtsldSalidaAlmacenFechaDespacho",
                "rgtsldSalidaAlmacenEstado",
                "rgtsldSalidaAlmacenAlmacen",
                "rgtsscodigoProducto",
                "rgtsldfk_almacenid"
            ];

            $camposFaltantes = [];
            foreach ($camposRequeridos as $campo) {
                if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
                    $camposFaltantes[] = $campo;
                }
            }

            if (!empty($camposFaltantes)) {
                echo '<script>
                    swal({
                        type: "error",
                        title: "Campos requeridos faltantes",
                        text: "Faltan los siguientes campos: ' . implode(', ', $camposFaltantes) . '",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    })
                </script>';
                return;
            }

            // Asignación de variables para todos los campos del formulario
            $datos = array(
                "idSalida" => $_POST["rgtsldidSalidaAlmacen"],
                "cantidad" => $_POST["rgtsldSalidaAlmacenCantidad"],
                "fechaDespacho" => $_POST["rgtsldSalidaAlmacenFechaDespacho"],
                "comentario" => isset($_POST["rgtsldSalidaAlmacenComentario"]) ? $_POST["rgtsldSalidaAlmacenComentario"] : "",
                "estadoAtencion" => $_POST["rgtsldSalidaAlmacenEstado"],
                "beneficiario" => isset($_POST["rgtsldentidadBeneficiaria"]) ? $_POST["rgtsldentidadBeneficiaria"] : "",
                "numeroAutorizacion" => isset($_POST["rgtsldnumeroAutorizacion"]) ? $_POST["rgtsldnumeroAutorizacion"] : "",
                "nombreColaborador" => isset($_POST["rgtsldnombreColaborador"]) ? $_POST["rgtsldnombreColaborador"] : "",
                "dniColaborador" => isset($_POST["rgtslddniColaborador"]) ? $_POST["rgtslddniColaborador"] : "",
                "almacenDestino" => isset($_POST["rgtsldalmacenDestino"]) ? $_POST["rgtsldalmacenDestino"] : 0,
                "motivoTraslado" => isset($_POST["rgtsldmotivoTraslado"]) ? $_POST["rgtsldmotivoTraslado"] : "",
                "almacenOrigen" => $_POST["rgtsldSalidaAlmacenAlmacen"],
                "rgtsscodigoProducto" => $_POST["rgtsscodigoProducto"],
                "idalmacenorigen" => $_POST["rgtsldfk_almacenid"],
            );

            try {
                $respuesta = ModeloSolicitudSalida::mdlSalidaAlmacen("salidas_almacen", $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                        swal({
                            type: "success",
                            title: "La salida de almacén ha sido registrada correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result) => {
                            if (result.value) {
                                window.location = "orden-salida-inventario";
                            }
                        })
                    </script>';
                } else {
                    echo '<script>
                        swal({
                            type: "error",
                            title: "Error al registrar la salida",
                            text: "' . $respuesta . '",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        })
                    </script>';
                }
            } catch (Exception $e) {
                error_log("Error en ctrSalidaAlmacen: " . $e->getMessage());
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
    }

    /*=============================================
    MOSTRAR GENERICO
    =============================================*/
    static public function ctrMostrar($tabla, $item, $valor, $operante) {
        try {
            $respuesta = ModeloSolicitudSalida::mdlMostrar($tabla, $item, $valor, $operante);
            return $respuesta;
        } catch (Exception $e) {
            error_log("Error en ctrMostrar: " . $e->getMessage());
            return "Error: " . $e->getMessage();
        }
    }

    /*=============================================
    MOSTRAR SOLICITUDES
    =============================================*/
    static public function ctrMostrarSolicitudSalidaAlmacen($item, $valor) {
        try {
            $tabla = "solicitudes_salida";
            $respuesta = ModeloSolicitudSalida::mdlMostrarSolicitudes($tabla, $item, $valor);
            return $respuesta;
        } catch (Exception $e) {
            error_log("Error en ctrMostrarSolicitudSalidaAlmacen: " . $e->getMessage());
            return "Error: " . $e->getMessage();
        }
    }

    /*=============================================
    CREAR SOLICITUD
    =============================================*/
    static public function ctrCrearSolicitud() {
        if (isset($_POST["RegistraSolicitudAlmacen"])) {
            // Validar campos requeridos
            $camposRequeridos = [
                "RegistraSolicitudAlmacen",
                "RegistraSolicitudProducto", 
                "RegistraSolicitudCantidad",
                "RegistraSolicitudFechaNecesidad"
            ];

            foreach ($camposRequeridos as $campo) {
                if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
                    echo '<script>
                        swal({
                            type: "error",
                            title: "Campo requerido faltante",
                            text: "El campo ' . $campo . ' es obligatorio",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        })
                    </script>';
                    return;
                }
            }

            $tabla = "solicitudes_salida";
            $datos = array(
                "almacen" => $_POST["RegistraSolicitudAlmacen"],
                "producto" => $_POST["RegistraSolicitudProducto"],
                "cantidad" => $_POST["RegistraSolicitudCantidad"],
                "fecha_necesidad" => $_POST["RegistraSolicitudFechaNecesidad"],
                "usuario" => isset($_SESSION["nombre"]) && isset($_SESSION["usuario"]) 
                    ? $_SESSION["nombre"] . " (" . $_SESSION["usuario"] . ")"
                    : "Usuario desconocido",
                "comentario" => isset($_POST["RegistraSolicitudComentario"]) ? $_POST["RegistraSolicitudComentario"] : "",
                "estado" => "1"
            );

            try {
                $respuesta = ModeloSolicitudSalida::mdlIngresarSolicitud($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                        swal({
                            type: "success",
                            title: "La solicitud ha sido guardada correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result) {
                            if (result.value) {
                                window.location = "orden-salida-inventario";
                            }
                        })
                    </script>';
                } else {
                    echo '<script>
                        swal({
                            type: "error",
                            title: "Error al guardar la solicitud",
                            text: "' . $respuesta . '",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        })
                    </script>';
                }
            } catch (Exception $e) {
                error_log("Error en ctrCrearSolicitud: " . $e->getMessage());
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
    }

    /*=============================================
    EDITAR SOLICITUD
    =============================================*/
    static public function ctrEditarSolicitud() {
        if (isset($_POST["idSolicitudEditar"])) {
            // Validar campos requeridos
            $camposRequeridos = [
                "idSolicitudEditar",
                "editarSolicitudCantidad",
                "editarSolicitudFechaNecesidad"
            ];

            foreach ($camposRequeridos as $campo) {
                if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
                    echo '<script>
                        swal({
                            type: "error",
                            title: "Campo requerido faltante",
                            text: "El campo ' . $campo . ' es obligatorio",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        })
                    </script>';
                    return;
                }
            }

            $tabla = "solicitudes_salida";
            $datos = array(
                "id" => $_POST["idSolicitudEditar"],
                "cantidad" => $_POST["editarSolicitudCantidad"],
                "fecha_necesidad" => $_POST["editarSolicitudFechaNecesidad"],
                "usuario" => isset($_SESSION["nombre"]) && isset($_SESSION["usuario"]) 
                    ? $_SESSION["nombre"] . " (" . $_SESSION["usuario"] . ")"
                    : "Usuario desconocido",
                "comentario" => isset($_POST["editarSolicitudComentario"]) ? $_POST["editarSolicitudComentario"] : "",
                "estado" => 1
            );

            try {
                $respuesta = ModeloSolicitudSalida::mdlEditarSolicitud($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                        swal({
                            type: "success",
                            title: "La solicitud ha sido editada correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result) {
                            if (result.value) {
                                window.location = "orden-salida-inventario";
                            }
                        })
                    </script>';
                } else {
                    echo '<script>
                        swal({
                            type: "error",
                            title: "Error al editar la solicitud",
                            text: "' . $respuesta . '",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        })
                    </script>';
                }
            } catch (Exception $e) {
                error_log("Error en ctrEditarSolicitud: " . $e->getMessage());
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
    }

    /*=============================================
    MOSTRAR AUDITOR DE PRODUCTO
    =============================================*/
    static public function ctrMostrarAuditorProducto($codigo) {
        try {
            $respuesta = ModeloSolicitudSalida::mdlMostrarAuditorProductoPreseleccionado("", "", $codigo);
            return $respuesta;
        } catch (Exception $e) {
            error_log("Error en ctrMostrarAuditorProducto: " . $e->getMessage());
            return "Error: " . $e->getMessage();
        }
    }
}
?>