<?php
if (!class_exists('ModeloGuiaRemision')) {
    require_once "../modelos/guia-remision.modelo.php";
}


class ControladorGuiaRemision
{
    static public function ctrMostrar($tabla)
    {
        $respuesta = ModeloGuiaRemision::mdlMostrar($tabla, null, null);
        return $respuesta;
    }
    static public function ctrGuardarModal($data)
    {
        $tabla = '';
        $respuesta = ModeloGuiaRemision::mdlGuardarGuia($tabla, $data);
        if ($respuesta === 'ok') {
            return json_encode(['success' => true, 'message' => 'Registro exitoso']);
        } else {
            return json_encode(['success' => false, 'message' => 'Error en el registro']);
        }
    }
    public function ctrCrearGuiaRemi($request, $files)
    {
        if ($this->validate($request, [
            "ruc_cliente",
            "razon_social"
        ])) {
            // Lista de campos a validar y guardar
            $list = $this->validateFileData($request, [
                "doc_mtc",
                "guia_remi_ini1",
                "guia_remi_ini2",
                "guia_remi_ini3",
                "guia_con_ini",
                "guia_remi_firm",
                "guia_con_firma",
                "foto_evi_carga1",
                "foto_evi_carga2",
                "foto_evi_carga3",
                "foto_evi_desc1",
                "foto_evi_desc2",
                "foto_evi_desc3"
            ]);

            // Inicializar variables para almacenar rutas de documentos

            $docMtc = "";
            $guiaRemiIni1 = "";
            $guiaRemiIni2 = "";
            $guiaRemiIni3 = "";
            $guiaConIni = "";
            $guiaRemiFirm = "";
            $guiaConFirma = "";
            $fotoEviCarga1 = "";
            $fotoEviCarga2 = "";
            $fotoEviCarga3 = "";
            $fotoEviDesc1 = "";
            $fotoEviDesc2 = "";
            $fotoEviDesc3 = "";

            // I lista de campos para validación y gestión de documentos
            foreach ($list as $key => $value) {
                switch ($value) {
                    case 'doc_mtc':
                        $docMtc = $this->guardarDoc($request, ['doc_mtc']);
                        break;
                    case 'guia_remi_ini1':
                        $guiaRemiIni1 = $this->guardarDoc($request, ['guia_remi_ini1']);
                        break;
                    case 'guia_remi_ini2':
                        $guiaRemiIni2 = $this->guardarDoc($request, ['guia_remi_ini2']);
                        break;
                    case 'guia_remi_ini3':
                        $guiaRemiIni3 = $this->guardarDoc($request, ['guia_remi_ini3']);
                        break;
                    case 'guia_con_ini':
                        $guiaConIni = $this->guardarDoc($request, ['guia_con_ini']);
                        break;
                    case 'guia_remi_firm':
                        $guiaRemiFirm = $this->guardarDoc($request, ['guia_remi_firm']);
                        break;
                    case 'guia_con_firma':
                        $guiaConFirma = $this->guardarDoc($request, ['guia_con_firma']);
                        break;
                    case 'foto_evi_carga1':
                        $fotoEviCarga1 = $this->guardarDoc($request, ['foto_evi_carga1']);
                        break;
                    case 'foto_evi_carga2':
                        $fotoEviCarga2 = $this->guardarDoc($request, ['foto_evi_carga2']);
                        break;
                    case 'foto_evi_carga3':
                        $fotoEviCarga3 = $this->guardarDoc($request, ['foto_evi_carga3']);
                        break;
                    case 'foto_evi_desc1':
                        $fotoEviDesc1 = $this->guardarDoc($request, ['foto_evi_desc1']);
                        break;
                    case 'foto_evi_desc2':
                        $fotoEviDesc2 = $this->guardarDoc($request, ['foto_evi_desc2']);
                        break;
                    case 'foto_evi_desc3':
                        $fotoEviDesc3 = $this->guardarDoc($request, ['foto_evi_desc3']);
                        break;
                }
            }
            $tabla = "guia_remi";
            $datos = array(
                "ruc_cliente" => $request["ruc_cliente"],
                "razon_social" => $request["razon_social"],
                "doc_mtc" => $docMtc,
                "guia_remi_ini1" => $guiaRemiIni1,
                "guia_remi_ini2" => $guiaRemiIni2,
                "guia_remi_ini3" => $guiaRemiIni3,
                "guia_con_ini" => $guiaConIni,
                "guia_remi_firm" => $guiaRemiFirm,
                "guia_con_firma" => $guiaConFirma,
                "foto_evi_carga1" => $fotoEviCarga1,
                "foto_evi_carga2" => $fotoEviCarga2,
                "foto_evi_carga3" => $fotoEviCarga3,
                "foto_evi_desc1" => $fotoEviDesc1,
                "foto_evi_desc2" => $fotoEviDesc2,
                "foto_evi_desc3" => $fotoEviDesc3,
                "obervaciones" => $request["obervaciones"]
            );
            $respuesta = ModeloGuiaRemision::mdlGuardarIni($tabla, $datos);
            if ($respuesta == "ok") {
                echo "ok";
            } else {
                // echo "error";
                echo $respuesta;
            }
        }
    }

    public function ActualizarGuiaRemision($request, $files)
    {
        $list = $this->validateFileData($request, [
            "doc_mtc",
            "guia_remi_ini1",
            "guia_remi_ini2",
            "guia_remi_ini3",
            "guia_con_ini",
            "guia_remi_firm",
            "guia_con_firma",
            "foto_evi_carga1",
            "foto_evi_carga2",
            "foto_evi_carga3",
            "foto_evi_desc1",
            "foto_evi_desc2",
            "foto_evi_desc3"
        ]);

        // Inicializar variables para almacenar rutas de documentos

        $docMtc = $request['ACdoc_mtc'];
        $guiaRemiIni1 = $request['ACguia_remi_ini1'];
        $guiaRemiIni2 = $request['ACguia_remi_ini2'];
        $guiaRemiIni3 = $request['ACguia_remi_ini3'];
        $guiaConIni = $request['ACguia_con_ini'];
        $guiaRemiFirm = $request['ACguia_remi_firm'];
        $guiaConFirma = $request['ACguia_con_firma'];
        $fotoEviCarga1 = $request['ACfoto_evi_carga1'];
        $fotoEviCarga2 = $request['ACfoto_evi_carga2'];
        $fotoEviCarga3 = $request['ACfoto_evi_carga3'];
        $fotoEviDesc1 = $request['ACfoto_evi_desc1'];
        $fotoEviDesc2 = $request['ACfoto_evi_desc2'];
        $fotoEviDesc3 = $request['ACfoto_evi_desc3'];
        foreach ($list as $key => $value) {
            switch ($value) {
                case 'doc_mtc':
                    $this->eliminarDoc($request, $docMtc);
                    $docMtc = $this->guardarDoc($request, ['doc_mtc']);
                    break;

                case 'guia_remi_ini1':
                    $this->eliminarDoc($request, $guiaRemiIni1);
                    $guiaRemiIni1 = $this->guardarDoc($request, ['guia_remi_ini1']);
                    break;

                case 'guia_remi_ini2':
                    $this->eliminarDoc($request, $guiaRemiIni2);

                    $guiaRemiIni2 = $this->guardarDoc($request, ['guia_remi_ini2']);
                    break;
                case 'guia_remi_ini3':
                    $this->eliminarDoc($request, $guiaRemiIni3);
                    $guiaRemiIni3 = $this->guardarDoc($request, ['guia_remi_ini3']);
                    break;

                case 'guia_con_ini':
                    $this->eliminarDoc($request, $guiaConIni);
                    $guiaConIni = $this->guardarDoc($request, ['guia_con_ini']);
                    break;

                case 'guia_remi_firm':
                    $this->eliminarDoc($request, $guiaRemiFirm);
                    $guiaRemiFirm = $this->guardarDoc($request, ['guia_remi_firm']);
                    break;

                case 'guia_con_firma':
                    $this->eliminarDoc($request, $guiaConFirma);
                    $guiaConFirma = $this->guardarDoc($request, ['guia_con_firma']);
                    break;

                case 'foto_evi_carga1':
                    $this->eliminarDoc($request, $fotoEviCarga1);
                    $fotoEviCarga1 = $this->guardarDoc($request, ['foto_evi_carga1']);
                    break;

                case 'foto_evi_carga2':
                    $this->eliminarDoc($request, $fotoEviCarga2);
                    $fotoEviCarga2 = $this->guardarDoc($request, ['foto_evi_carga2']);
                    break;

                case 'foto_evi_carga3':
                    $this->eliminarDoc($request, $fotoEviCarga3);
                    $fotoEviCarga3 = $this->guardarDoc($request, ['foto_evi_carga3']);
                    break;

                case 'foto_evi_desc1':
                    $this->eliminarDoc($request, $fotoEviDesc1);
                    $fotoEviDesc1 = $this->guardarDoc($request, ['foto_evi_desc1']);
                    break;

                case 'foto_evi_desc2':
                    $this->eliminarDoc($request, $fotoEviDesc2);
                    $fotoEviDesc2 = $this->guardarDoc($request, ['foto_evi_desc2']);
                    break;

                case 'foto_evi_desc3':
                    $this->eliminarDoc($request, $fotoEviDesc3);
                    $fotoEviDesc3 = $this->guardarDoc($request, ['foto_evi_desc3']);
                    break;
            }
        }
        $tabla = "guia_remi";
        $datos = array(
            "ruc_cliente" => $request["ruc_cliente"],
            "razon_social" => $request["razon_social"],
            "doc_mtc" => $docMtc,
            "guia_remi_ini1" => $guiaRemiIni1,
            "guia_remi_ini2" => $guiaRemiIni2,
            "guia_remi_ini3" => $guiaRemiIni3,
            "guia_con_ini" => $guiaConIni,
            "guia_remi_firm" => $guiaRemiFirm,
            "guia_con_firma" => $guiaConFirma,
            "foto_evi_carga1" => $fotoEviCarga1,
            "foto_evi_carga2" => $fotoEviCarga2,
            "foto_evi_carga3" => $fotoEviCarga3,
            "foto_evi_desc1" => $fotoEviDesc1,
            "foto_evi_desc2" => $fotoEviDesc2,
            "foto_evi_desc3" => $fotoEviDesc3,
            "obervaciones" => $request["obervaciones"],
            "id" => $request["id"]
        );
        $respuesta = ModeloGuiaRemision::mdlActualizarIni($tabla, $datos);
        if ($respuesta == "ok") {
            echo "ok";
        } else {
            // echo "error";
            echo $respuesta;
        }
    }
    public function validate($resquest, $input)
    {
        $validation = true;
        foreach ($input as $key) {
            if (!isset($resquest[$key]) || empty($resquest[$key])) {
                $validation = false;
                break;
            }
        }
        return $validation;
    }
    public function validateFileData($resquest, $fileds)
    {
        $listNotEmpty = [];
        foreach ($fileds as $key) {
            if (isset($_FILES[$key]) && $_FILES[$key]['error'] === 0) {
                $listNotEmpty[] = $key;
            }
        }
        return $listNotEmpty;
    }
    private function guardarDoc($request, $fileds)
    {
        foreach ($fileds as $key) {
            $ruta = $_SERVER['DOCUMENT_ROOT'] . "/vistas/img/guia_remi/";

            $extension = pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);

            $aleatorio = date('YmdHis') . uniqid();


            $nombre = $aleatorio . '.' . $extension;

            $nombreDb = "vistas/img/guia_remi/" . $nombre;

            $ruta_carga = $ruta . $nombre;

            if (!file_exists($ruta)) {

                mkdir($ruta, 0777);
            }
            if (move_uploaded_file($_FILES[$key]['tmp_name'], $ruta_carga)) {
            }
            return $nombreDb;
        }
    }
    public static function eliminarDoc($requests, $fileds)
    {
        $rutaExterna = $_SERVER['DOCUMENT_ROOT'] . "/";
        $rutaCompleta = $rutaExterna . $fileds;
        if (file_exists($rutaCompleta)) {
            if (unlink($rutaCompleta)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
        return false;
    }
}

switch ($_POST['accion']) {
    case 'search_ubigeo':
        $ubigeo = $_POST['search'];
        $url = 'https://localhost/intranet/ApiAbad/get_ciudad.php?query=' . $ubigeo;
        $curl = curl_init();

        // Configura las opciones de cURL
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        // Ejecuta la solicitud
        $response = curl_exec($curl);

        // Verifica si hubo errores en la solicitud
        if (curl_errno($curl)) {
            echo 'Error: ' . curl_error($curl);
        } else {
            // Muestra la respuesta
            echo $response;
        }

        // Cierra la sesión de cURL
        curl_close($curl);

        break;
    case 'submit_modal':
        $ControladorGuia = new ControladorGuiaRemision();
        $respuesta = $ControladorGuia::ctrGuardarModal($_POST);
        echo $respuesta;
        break;
    case 'list_remision':
        $fechaini = $_POST['fechaInicio'];
        $fechafin = $_POST['fechaFinal'];
        $viewListBpm = new ModeloGuiaRemision;
        $render_remision = $viewListBpm->load_remision($fechaini, $fechafin);
        $render_remision = $render_remision['data'];
?>
        <table class="table table-bordered table-sm" id="cuerpito_tabla">
            <thead>
                <tr>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">#</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">FECHA DE REGUISTRO</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">FECHA DE TRASLADO</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">CLIENTE</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">UBIGEO DE PARTIDA</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">UBIGEO DE LLEGADA</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">PDF</th>
                </tr>
            </thead>
            <tbody class="buscar">
                <?php
                $dinero_total = 0;
                for ($i = 0; $i < count($render_remision); $i++) {
                    $total_deuda = number_format(doubleval($render_remision[$i]["total_deuda"]), 2);
                ?>
                    <tr style="background: white" id="<?php echo $id . 'painttr'; ?>">
                        <td><?php echo $i + 1; ?></td>
                        <td><?php echo $render_remision[$i]["fecha"]; ?></td>
                        <td><?php echo $render_remision[$i]["tras_fecha"]; ?></td>
                        <td><?php echo $render_remision[$i]["cli_nom_client"]; ?></td>
                        <td><?php echo $render_remision[$i]["direc_ubigeo_partida"]; ?></td>
                        <td><?php echo $render_remision[$i]["direc_ubigeo_llegada"]; ?></td>
                        <td><img onclick="window.open('./controladores/pdf.controlador.php?id=<?php echo base64_encode($render_remision[$i]['id']) ?>&deque=pdf_guia_remision','_blank'),pinta_filas('1863painttr')" src="vistas/img/plantilla/pdf.png" style="width: 35px  !important"></td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
<?php
        break;
    case 'crearGuiaRemision':
        $ControladorGuia = new ControladorGuiaRemision();
        $ControladorGuia->ctrCrearGuiaRemi($_POST, $_FILES);
        break;
    case 'ActualizarGuiaRemision':
        $ControladorGuia = new ControladorGuiaRemision();
        $ControladorGuia->ActualizarGuiaRemision($_POST, $_FILES);
        break;
}
