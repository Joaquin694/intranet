<?php
if (!class_exists('ModeloGestionTransporte')) {
    require_once "../modelos/gestion-transporte.modelo.php";
}
set_exception_handler("customExceptionHandler");

// Configurar el manejador de cierre
register_shutdown_function("shutdownHandler");


// Manejador de errores
function customErrorHandler($errno, $errstr, $errfile, $errline)
{
    $errorMessage = "Error [$errno]: $errstr in $errfile on line $errline";
    //  error_log($errorMessage); // Log el error
    //  echo "Se ha producido un error. Por favor, consulta el log para más detalles.";
    echo $errorMessage;
    /* No ejecutar el gestor de errores interno de PHP */
    return true;
}


// Manejador de excepciones
function customExceptionHandler($exception)
{
    $errorMessage = "Uncaught exception: " . $exception->getMessage() . " in " . $exception->getFile() . " on line " . $exception->getLine();
    //  error_log($errorMessage); // Log la excepción
    echo $errorMessage;
    //  echo "Se ha producido una excepción. Por favor, consulta el log para más detalles.";
}
class ControladorGestionTransporte
{
    public function RegistratRuta($request, $files)
    {
        $list = $this->validateFileData($request, ["doc-activo_activo", "doc_res", "doc_1_info", "doc_2_info", "doc_3_info"]);
        $doc1 = "";
        $doc2 = "";
        $doc3 = "";
        $doc4 = "";
        $doc5 = "";
        foreach ($list as $key => $value) {
            switch ($value) {
                case 'doc-activo_activo':
                    $doc1 = $this->guardarDoc($request, ['doc-activo_activo']);
                    break;
                case 'doc_res':
                    $doc2 = $this->guardarDoc($request, ['doc_res']);
                    break;
                case 'doc_1_info':
                    $doc3 = $this->guardarDoc($request, ['doc_1_info']);
                    break;
                case 'doc_2_info':
                    $doc4 = $this->guardarDoc($request, ['doc_2_info']);
                    break;
                case 'doc_3_info':
                    $doc5 = $this->guardarDoc($request, ['doc_3_info']);
                    break;
            }
        }
        $tabla = "gestion_ruta_transporte";
        $datos = array(
            "cotizacion" => $request["cotizacion"],
            // "activoFijo" => $request["activoFijo"],
            "activoFijo_id" => $request["activo"],
            "conductor" => $request["conductor"],

            "distancia" => $request["distancia"],
            "tiempo" => $request["tiempo"],

            "description_activo" => $request["description_activo"],
            "placa_activo" => $request["placa_activo"],
            "tipo_activo" => $request["tipo_activo"],
            "marca_activo" => $request["marca_activo"],
            "modelo_activo" => $request["modelo_activo"],
            "capacidad_activo" => $request["capacidad_activo"],
            "doc-activo_activo" => $doc1,

            "nom_res" => $request["nom_res"],
            "dni_res" => $request["dni_res"],
            "n_licencia_res" => $request["n_licencia_res"],
            "contacto_nom_res" => $request["contacto_nom_res"],
            "doc_res" => $doc2,

            "doc_1_info" => $doc3,
            "doc_2_info" => $doc4,
            "doc_3_info" => $doc5,
            "observacion" => $request["observacion"],
            "startM_lat" => $request["startM_lat"],
            "startM_lng" => $request["startM_lng"],
            "endM_lat" => $request["endM_lat"],
            "endM_lng" => $request["endM_lng"],
            "dificultad" => $request["dificultad"],
            "ruta" => $request["ruta_pp"],
            "state" => '1'
        );
        $respuesta = ModeloGestionTransporte::mdlIngresarRutaTransporte($tabla, $datos);
        if ($respuesta['status'] == "ok") {
            $return_Api = $this->Api_rupa();
            // return "ok";
            return ['status' => 'ok', 'message' => $return_Api];
        } else {
            // echo "error";
            return $respuesta;
        }
    }
    public function EditarRuta($request, $files)
    {
        if (isset($request["id"])) {
            $list = $this->validateFileData($request, ["doc-activo_activo", "doc_res", "doc_1_info", "doc_2_info", "doc_3_info"]);

            $doc1 = $request['doc-activo_db'];
            $doc2 = $request['doc_res_db'];
            $doc3 = $request['doc_1_info_db'];
            $doc4 = $request['doc_2_info_db'];
            $doc5 = $request['doc_3_info_db'];

            foreach ($list as $key => $value) {
                switch ($value) {
                    case 'doc-activo_activo':
                        $this->eliminarDoc($request, $doc1);
                        $doc1 = $this->guardarDoc($request, ['doc-activo_activo']);
                        break;
                    case 'doc_res':
                        $this->eliminarDoc($request, $doc2);
                        $doc2 = $this->guardarDoc($request, ['doc_res']);
                        break;
                    case 'doc_1_info':
                        $this->eliminarDoc($request, $doc3);
                        $doc3 = $this->guardarDoc($request, ['doc_1_info']);
                        break;
                    case 'doc_2_info':
                        $this->eliminarDoc($request, $doc4);
                        $doc4 = $this->guardarDoc($request, ['doc_2_info']);
                        break;
                    case 'doc_3_info':
                        $this->eliminarDoc($request, $doc5);
                        $doc5 = $this->guardarDoc($request, ['doc_3_info']);
                        break;
                }
            }
            $tabla = "gestion_ruta_transporte";
            $datos = array(
                "cotizacion" => $request["cotizacion"],
                // "activoFijo" => $request["activoFijo"],
                "activoFijo_id" => $request["activo"],
                "conductor" => $request["conductor"],

                "distancia" => $request["distancia"],
                "tiempo" => $request["tiempo"],

                "description_activo" => $request["description_activo"],
                "placa_activo" => $request["placa_activo"],
                "tipo_activo" => $request["tipo_activo"],
                "marca_activo" => $request["marca_activo"],
                "modelo_activo" => $request["modelo_activo"],
                "capacidad_activo" => $request["capacidad_activo"],
                "doc-activo_activo" => $doc1,

                "nom_res" => $request["nom_res"],
                "dni_res" => $request["dni_res"],
                "n_licencia_res" => $request["n_licencia_res"],
                "contacto_nom_res" => $request["contacto_nom_res"],
                "doc_res" => $doc2,
                "doc_1_info" => $doc3,
                "doc_2_info" => $doc4,
                "doc_3_info" => $doc5,
                "observacion" => $request["observacion"],
                "startM_lat" => $request["startM_lat"],
                "startM_lng" => $request["startM_lng"],
                "endM_lat" => $request["endM_lat"],
                "endM_lng" => $request["endM_lng"],
                "dificultad" => $request["dificultad"],
                "ruta" => $request["ruta_pp"],
                "id" => $request["id"]
            );
            $respuesta = ModeloGestionTransporte::mdlActualizarRutaTransporte($tabla, $datos);
            if ($respuesta['status'] == "ok") {
                $return_Api = $this->Api_rupa();
                // return "ok";
                return ['status' => 'ok', 'message' => $return_Api];
            } else {
                // echo "error";
                return $respuesta;
            }

        }
    }
    public function serrarRuta($request)
    {
        $list = $this->validateFileData($request, ["doc_1_info", "doc_2_info", "doc_3_info"]);
        $doc1 = "";
        $doc2 = "";
        $doc3 = "";
        foreach ($list as $key => $value) {
            switch ($value) {
                case 'doc_1_info':
                    $doc1 = $this->guardarDoc($request, ['doc_1_info']);
                    break;
                case 'doc_2_info':
                    $doc2 = $this->guardarDoc($request, ['doc_2_info']);
                    break;
                case 'doc_3_info':
                    $doc3 = $this->guardarDoc($request, ['doc_3_info']);
                    break;
            }
        }
        $tabla = "gestion_rutas_cerrada";
        $datos = array(
            "ruta" => $request["ruta_red"],
            "distancia_aprox" => $request["distancia_aprox"],
            "tiempo_aprox" => $request["tiempo_aprox"],
            "dificultad_final" => $request["dificultad_final"],
            "adversidades" => $request["adversidad_final"],
            "distancia_final" => $request["distancia_final"],
            "tiempo_final" => $request["tiempo_final"],
            "doc_in_1" => $doc1,
            "doc_in_2" => $doc2,
            "doc_in_3" => $doc3,
            "id" => $request["id"]
        );
        $respuesta = ModeloGestionTransporte::mdlIngresarRutaCerrada($tabla, $datos);
        if ($respuesta['status'] == "ok") {
            //     // return $respuesta;
            //     $return_Api = $this->prueba_api();
            //     return ['status' => 'ok', 'message' => $return_Api];
            $return_Api = $this->Api_rupa_load();
            return ['status' => 'ok', 'message' => $return_Api];
        } else {
            // echo "error";
            return $respuesta;
        }
    }
    static public function ctrMostrar($tabla, $item, $valor, $formato)
    {
        $respuesta = ModeloGestionTransporte::mdlMostrar($tabla, $item, $valor, $formato);
        return $respuesta;
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
            $ruta = $_SERVER['DOCUMENT_ROOT'] . "/vistas/img/gestion_ruta/";

            $extension = pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);

            $aleatorio = date('YmdHis') . uniqid();


            $nombre = $aleatorio . '.' . $extension;

            $nombreDb = "vistas/img/gestion_ruta/" . $nombre;

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
    public function Api_rupa()
    {
        $ruta = $_POST['ruta_pp'];
        $dist_aprox = $_POST['distancia'];
        $tiempo_aprox = $_POST['tiempo'];
        $difucultad = $_POST['dificultad'];

        $time = $tiempo_aprox;

        // Separar las partes de la hora, minuto, segundo y fracción
        list($hours, $minutes, $seconds) = explode(":", $time);
        list($seconds, $milliseconds) = explode(".", $seconds);

        // Convertir todo a minutos
        $totalMinutes = $hours * 60 + $minutes + ($seconds + ($milliseconds / 100)) / 60;

        ////////////////////////////
        $distancia_kilometros = $this->metrosAKilometros($dist_aprox);


        // Iniciar cURL
        $curl = curl_init();

        $url = 'http://136.243.200.123:5000/predict';
        $data = array(
            "Ruta" => $ruta,
            "Distancia_aprox" => $distancia_kilometros,
            "Tiempo_aprox" => $totalMinutes,
            "Dificultad" => $difucultad,
        );
        $json_data = json_encode($data);

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $json_data,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_TIMEOUT => 30,
        ));

        $response = curl_exec($curl);

        if ($response === false) {
            $error_msg = 'Error en la solicitud: ' . curl_error($curl);
            curl_close($curl);
            return $error_msg;  // Retornar el mensaje de error
        }

        curl_close($curl);
        return $response;  // Retornar la respuesta
    }
    public function prueba_api()
    {
        $data = array(
            "Ruta" => $_POST['ruta_red'],
            "Distancia_aprox" => floatval($_POST['distancia_aprox']), // Convertir a número
            "Tiempo_aprox" => $this->calcularMinutosTotales($_POST['tiempo_aprox']),
            "Dificultad" => $_POST['dificultad_final'],
            "Adversidades" => $_POST['adversidad_final'],
            "Distancia_final" => floatval($_POST['distancia_final']), // Convertir a número
            "Tiempo_final" => $this->calcularMinutosTotales($_POST['tiempo_final'])
        );
        return $data;
    }

    public function Api_rupa_load()
    {
        // $ruta = $_POST['ruta_red'];
        // $dist_aprox = $_POST['distancia_aprox'];
        // $tiempo_aprox = calcularMinutosTotales($_POST['tiempo_aprox']);
        // $difucultad = $_POST['dificultad_final'];
        // $adversidades = $_POST['adversidad_final'];
        // $distancia_final = $_POST['distancia_final'];
        // $tiempo_final = calcularMinutosTotales($_POST['tiempo_aprox']);
        // calcularMinutosTotales($_POST['tiempo_aprox']);

        // $time = $tiempo_aprox;

        // // Separar las partes de la hora, minuto, segundo y fracción
        // list($hours, $minutes, $seconds) = explode(":", $time);
        // list($seconds, $milliseconds) = explode(".", $seconds);

        // // Convertir todo a minutos
        // $totalMinutes = $hours * 60 + $minutes + ($seconds + ($milliseconds / 100)) / 60;

        // ////////////////////////////
        // $distancia_kilometros = $this->metrosAKilometros($dist_aprox);


        // Iniciar cURL
        $curl = curl_init();

        $url = 'http://136.243.200.123:5000/load_data';
        $data = array(
            "Ruta" => $_POST['ruta_red'],
            "Distancia_aprox" => floatval($_POST['distancia_aprox']), // Convertir a número
            "Tiempo_aprox" => $this->calcularMinutosTotales($_POST['tiempo_aprox']),
            "Dificultad" => $_POST['dificultad_final'],
            "Adversidades" => $_POST['adversidad_final'],
            "Distancia_final" => floatval($_POST['distancia_final']), // Convertir a número
            "Tiempo_final" => $this->calcularMinutosTotales($_POST['tiempo_final'])
        );

        $json_data = json_encode($data);

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $json_data,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_TIMEOUT => 30,
        ));

        $response = curl_exec($curl);

        if ($response === false) {
            $error_msg = 'Error en la solicitud: ' . curl_error($curl);
            curl_close($curl);
            return $error_msg;  // Retornar el mensaje de error
        }

        curl_close($curl);
        return $response;  // Retornar la respuesta
    }
    function calcularMinutosTotales($tiempo)
    {
        // Separar las partes de la hora, minuto, segundo y fracción
        list($hours, $minutes, $seconds) = explode(":", $tiempo);
        list($seconds, $milliseconds) = explode(".", $seconds);

        // Convertir todo a minutos
        $totalMinutes = $hours * 60 + $minutes + ($seconds + ($milliseconds / 1000)) / 60;

        // Redondear el resultado a 2 decimales
        return round($totalMinutes, 2);
    }


    function metrosAKilometros($metros)
    {
        $kilometros = $metros / 1000; // Conversión
        return number_format($kilometros, 2); // Limitar a 2 decimales
    }

}

switch ($_POST['accion']) {
    case 'trazarRuta':

        $CorStart = $_POST['cor_start'];
        $CorEnd = $_POST['cor_end'];

        $curl = curl_init();

        $start = rawurlencode($CorStart);
        $end = rawurlencode($CorEnd);
        $url = 'https://api.openrouteservice.org/v2/directions/driving-hgv?start=' . $start . '&end=' . $end;

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array(
                'Authorization: 5b3ce3597851110001cf624850bd9b02484b4e76b4e3fdc53dfbd8ca'
            ),
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_TIMEOUT => 30,
        ));



        $response = curl_exec($curl);

        curl_close($curl);

        if ($response === false) {
            echo 'Error en la solicitud: ' . curl_error($curl);
            exit;
        }

        header('Content-type: application/geo+json');
        echo $response;

        break;

    case 'getActivo':
        $respuesta = ControladorGestionTransporte::ctrMostrar('activo_fijo', null, null, 'not-num');
        echo json_encode($respuesta);
        break;
    case 'getConductor':
        $respuesta = ControladorGestionTransporte::ctrMostrar('proveedores', 'rubro', 'conductor', 'not-num');
        echo json_encode($respuesta);
        break;
    case 'crearTrazo':
        $ControladorGestionTransporte = new ControladorGestionTransporte();
        $respuesta = $ControladorGestionTransporte->RegistratRuta($_POST, $_FILES);
        echo json_encode($respuesta);
        break;
    case 'EditarTrazo':
        $ControladorGestionTransporte = new ControladorGestionTransporte();
        $respuesta = $ControladorGestionTransporte->EditarRuta($_POST, $_FILES);
        echo json_encode($respuesta);
        break;
    case 'serrar_ruta':
        $ControladorGestionTransporte = new ControladorGestionTransporte();
        $respuesta = $ControladorGestionTransporte->serrarRuta($_POST);
        echo json_encode($respuesta);
        break;
}

