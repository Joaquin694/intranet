<?php
// Check if session is already started before starting a new one
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Set timezone
date_default_timezone_set('America/Lima');

// Include the model file with proper path checking
$modelFile = '../modelos/activos-fijos.modelo.php';
$altModelFile = 'modelos/activos-fijos.modelo.php'; // Alternative path

if (file_exists($modelFile)) {
    include $modelFile;
} elseif (file_exists($altModelFile)) {
    include $altModelFile;
} elseif (!class_exists('ModeloActivosFijos')) {
    die("Error: No se puede encontrar el archivo de modelo activos-fijos.modelo.php");
}

class ControladorActivosFijos
{
    /*=============================================
    CREAR ACTIVO FIJO
    =============================================*/
    public function ctrCrearActivosFijos($request)
    {
        if ($this->validate($request, [
            "descripcion",
            "categoria", 
            "ubicacion",
            "fechaAdquisicion",
            "vidaUtil",
            "tasaDepreciacion",
            "valorResidual",
            "estado",
            "usuario",
            "valorCompra_p",
            "proveedor",
            "codigoInterno",
            "fechaInicioUso",
            "metodoDepreciacion",
            "estadoOperativo",
            "marca",
            "tipo_moneda"
        ])) {

            $list = $this->validateFileData($request, ["documentosPropiedad", "fotosActivo"]);
            $doc1 = "";
            $doc2 = "";

            foreach ($list as $key => $value) {
                switch ($value) {
                    case 'documentosPropiedad':
                        $doc1 = $this->guardarImagen($request, ['documentosPropiedad']);
                        break;

                    case 'fotosActivo':
                        $doc2 = $this->guardarImagen($request, ['fotosActivo']);
                        break;
                }
            }

            $tabla = "activo_fijo";
            $datos = array(
                "descripcion" => $request["descripcion"],
                "categoria" => $request["categoria"],
                "ubicacion" => $request["ubicacion"],
                "tipo_moneda" => $request["tipo_moneda"],
                "valorCompra" => $request["valorCompra"],
                "fecha_adquisicion" => $request["fechaAdquisicion"],
                "vida_util" => $request["vidaUtil"],
                "tasa_depreciacion" => $request["tasaDepreciacion"],
                "valor_residual" => $request["valorResidual"],
                "estado" => $request["estado"],
                "usuario" => $request["usuario"],
                "proveedor" => $request["proveedor"],
                "codigo_interno" => $request["codigoInterno"],
                "fecha_inicio_uso" => $request["fechaInicioUso"],
                "metodo_depreciacion" => $request["metodoDepreciacion"],
                "garantia_marca" => isset($request["garantia_marca"]) ? $request["garantia_marca"] : 0,
                "garantia_proveedor" => isset($request["garantia_proveedor"]) ? $request["garantia_proveedor"] : 0,
                "estado_operativo" => $request["estadoOperativo"],
                "marca" => $request["marca"],
                "observaciones" => isset($request["observaciones"]) ? $request["observaciones"] : "",
                "documentos_propiedad" => $doc1,
                "foto_activo" => $doc2,
                "serie_motor" => isset($request["serie_motor"]) ? $request["serie_motor"] : "",
                "chasis_serie" => isset($request["chasis_serie"]) ? $request["chasis_serie"] : "",
                "placa" => isset($request["placa"]) ? $request["placa"] : "",
                "valor_compra_p" => $request["valorCompra_p"]
            );

            $respuesta = ModeloActivosFijos::mdlIngresarActivoFijo($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        type: "success",
                        title: "El activo fijo ha sido registrado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result) => {
                        if (result.value) {
                            window.location = "activos-fijos";
                        }
                    })
                </script>';
            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "Error al crear el activo fijo",
                        text: "' . $respuesta . '",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    })
                </script>';
            }
        } else {
            echo '<script>
                swal({
                    type: "error",
                    title: "Error en validación",
                    text: "Faltan campos obligatorios",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                })
            </script>';
        }
    }

    /*=============================================
    MOSTRAR ACTIVOS FIJOS
    =============================================*/
    static public function ctrMostrarActivosFijos($item, $valor)
    {
        $tabla = "activo_fijo";
        $respuesta = ModeloActivosFijos::mdlMostrarActivosFijos($tabla, $item, $valor);
        return $respuesta;
    }

    static public function ctrMostrar($tabla)
    {
        $respuesta = ModeloActivosFijos::mdlMostrarActivosFijos($tabla, null, null);
        return $respuesta;
    }

    static public function ctrMostrar2($tabla)
    {
        $respuesta = ModeloActivosFijos::mdlMostrarActivosFijos($tabla, null, null);
        return $respuesta;
    }

    /*=============================================
    ACTUALIZAR ACTIVOS FIJOS
    =============================================*/
    public function ctrEditarActivosFijos($request)
    {
        if (isset($request["idActivoFijoEditar"])) {

            $list = $this->validateFileData($request, ["editarFotosActivo", "editarDocumentosPropiedad"]);

            $doc1 = isset($request['editarFotosActivoDb']) ? $request['editarFotosActivoDb'] : "";
            $doc2 = isset($request['editarDocumentosPropiedadDb']) ? $request['editarDocumentosPropiedadDb'] : "";

            foreach ($list as $key => $value) {
                switch ($value) {
                    case 'editarFotosActivo':
                        if (!empty($doc1)) {
                            $this->eliminarDoc($request, $doc1);
                        }
                        $doc1 = $this->guardarImagen($request, ['editarFotosActivo']);
                        break;
                    case 'editarDocumentosPropiedad':
                        if (!empty($doc2)) {
                            $this->eliminarDoc($request, $doc2);
                        }
                        $doc2 = $this->guardarImagen($request, ['editarDocumentosPropiedad']);
                        break;
                }
            }

            $tabla = "activo_fijo";
            $datos = array(
                "id" => $request["idActivoFijoEditar"],
                "descripcion" => $request["editarDescripcion"],
                "categoria" => $request["editarCategoria"],
                "ubicacion" => $request["editarUbicacion"],
                "tipo_moneda" => $request["editartTipo_moneda"],
                "valorCompra" => $request["editarValorCompra"],
                "fecha_adquisicion" => $request["editarFechaAdquisicion"],
                "vida_util" => $request["editarVidaUtil"],
                "tasa_depreciacion" => $request["editarTasaDepreciacion"],
                "valor_residual" => $request["editarValorResidual"],
                "estado" => $request["editarEstado"],
                "usuario" => $request["editarUsuario"],
                "proveedor" => $request["editarProveedor"],
                "codigo_interno" => $request["EditarcodigoInterno"],
                "fecha_inicio_uso" => $request["editarFechaInicioUso"],
                "metodo_depreciacion" => $request["meditarMetodoDepreciacion"],
                "garantia_marca" => isset($request["editarGarantia_marca"]) ? $request["editarGarantia_marca"] : 0,
                "garantia_proveedor" => isset($request["editarGarantia_proveedor"]) ? $request["editarGarantia_proveedor"] : 0,
                "estado_operativo" => $request["editarEstadoOperativo"],
                "marca" => $request["editarMarca"],
                "observaciones" => isset($request["Editarobservaciones"]) ? $request["Editarobservaciones"] : "",
                "documentos_propiedad" => $doc2,
                "foto_activo" => $doc1,
                "serie_motor" => isset($request["serie_motorUp"]) ? $request["serie_motorUp"] : "",
                "chasis_serie" => isset($request["chasis_serieUp"]) ? $request["chasis_serieUp"] : "",
                "placa" => isset($request["placaUp"]) ? $request["placaUp"] : "",
                "valor_compra_p" => $request["up_valorCompra_p"]
            );

            $respuesta = ModeloActivosFijos::mdlActualizarActivosFijos($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        type: "success",
                        title: "El Activo Fijo ha sido editado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "activos-fijos";
                        }
                    })
                </script>';
            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "Error al editar el activo fijo",
                        text: "' . $respuesta . '",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    })
                </script>';
            }
        }
    }

    /*=============================================
    CREAR REGISTRO
    =============================================*/
    public function ctrCrearRegistro($request)
    {
        if ($this->validate($request, ['idActivoFijo', 'eventualidad', 'fechaEventualidad', 'montoGasto', 'montoReevaluado', 'userRegistraeventualidad', 'moneda'])) {
            $list = $this->validateFileData($request, ['evidencia']);
            $doc1 = '';

            if (!empty($list)) {
                if (in_array('evidencia', $list)) {
                    $doc1 = $this->guardarDocRegistro($request, ['evidencia']);
                }
            }

            $tabla = "registro";
            $datos = array(
                "activo_fk" => $request["idActivoFijo"],
                "eventualidad" => $request["eventualidad"],
                "fecha_eventualidad" => $request["fechaEventualidad"],
                "monto_gasto" => $request["montoGasto"],
                "monto_reevaluado" => $request["montoReevaluado"],
                "evidencia" => $doc1,
                "userRegistraeventualidad" => $request["userRegistraeventualidad"],
                "moneda" => $request["moneda"],
                "tipoCambio" => isset($request["tipoCambio"]) ? $request["tipoCambio"] : ""
            );

            $respuesta = ModeloActivosFijos::mdlIngresarRegistro($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        type: "success",
                        title: "El registro ha sido creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result) => {
                        if (result.value) {
                            window.location = "activos-fijos";
                        }
                    })
                </script>';
            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "Error al crear el registro",
                        text: "' . $respuesta . '",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    })
                </script>';
            }
        }
    }

    /*=============================================
    VALIDAR INPUTS TIPO TEXT, DATE, NUMBER
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
    VALIDAR INPUTS TIPO FILE
    =============================================*/
    public function validateFile($request, $fields)
    {
        $validationDoc = true;
        foreach ($fields as $key) {
            if (!isset($_FILES[$key]) || $_FILES[$key]['error'] !== 0) {
                $validationDoc = false;
                break;
            }
        }
        return $validationDoc;
    }

    /*=============================================
    VALIDAR ARCHIVOS CON DATOS
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
    GUARDAR IMAGEN EN EL DIRECTORIO
    =============================================*/
    private function guardarImagen($request, $fields)
    {
        foreach ($fields as $key) {
            $ruta = $_SERVER['DOCUMENT_ROOT'] . "/vistas/img/activos_fijos1/";
            $extension = pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);
            $aleatorio = date('YmdHis') . uniqid();
            $nombre = $aleatorio . '.' . $extension;
            $nombreDb = "vistas/img/activos_fijos1/" . $nombre;
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
    GUARDAR DOCUMENTO EN EL DIRECTORIO
    =============================================*/
    private function guardarDoc($request, $fields)
    {
        foreach ($fields as $key) {
            $rutaDoc = $_SERVER['DOCUMENT_ROOT'] . "/vistas/img/activos_fijos2/";
            $extensionDoc = pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);
            $aleatorioDoc = date('YmdHis') . uniqid();
            $nombreDoc = $aleatorioDoc . '.' . $extensionDoc;
            $nombreDocDb = "vistas/img/activos_fijos2/" . $nombreDoc;
            $ruta_cargaDoc = $rutaDoc . $nombreDoc;

            if (!file_exists($rutaDoc)) {
                mkdir($rutaDoc, 0777, true);
            }

            if (move_uploaded_file($_FILES[$key]['tmp_name'], $ruta_cargaDoc)) {
                return $nombreDocDb;
            }
        }
        return "";
    }

    /*=============================================
    GUARDAR DOCUMENTO DE REGISTRO
    =============================================*/
    private function guardarDocRegistro($request, $fields)
    {
        foreach ($fields as $key) {
            $rutaDoc = $_SERVER['DOCUMENT_ROOT'] . "/vistas/img/registro/";
            $extensionDoc = pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);
            $aleatorioDoc = date('YmdHis') . uniqid();
            $nombreDoc = $aleatorioDoc . '.' . $extensionDoc;
            $nombreDocDb = "vistas/img/registro/" . $nombreDoc;
            $ruta_cargaDoc = $rutaDoc . $nombreDoc;

            if (!file_exists($rutaDoc)) {
                mkdir($rutaDoc, 0777, true);
            }

            if (move_uploaded_file($_FILES[$key]['tmp_name'], $ruta_cargaDoc)) {
                return $nombreDocDb;
            }
        }
        return "";
    }

    /*=============================================
    ELIMINAR DOCUMENTO
    =============================================*/
    public static function eliminarDoc($request, $fields)
    {
        $rutaExterna = $_SERVER['DOCUMENT_ROOT'] . "/";
        $rutaCompleta = $rutaExterna . $fields;
        
        if (file_exists($rutaCompleta)) {
            if (unlink($rutaCompleta)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /*=============================================
    OBTENER TIPO DE CAMBIO
    =============================================*/
    public static function ctrObtenerTipoCambio($fecha)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.apis.net.pe/v2/sbs/tipo-cambio?date=' . $fecha,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer apis-token-8225.271OeJQ39f9LNNH60xhhSSEstOy6iwTk'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $responseData = json_decode($response, true);

        if (is_array($responseData) && isset($responseData['precioVenta'])) {
            return $responseData['precioVenta'];
        } else {
            return false;
        }
    }
}
?>