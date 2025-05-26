<?php

if (!class_exists('ModeloPlanMantenimiento')) {
   require_once "../modelos/plan-mantenimiento.modelo.php";
}

class ControladorPlanMantenimiento
{

   /*=============================================
   CREAR GESTION COMBUSTIBLE
   =============================================*/
   public function ctrCrearPlanMantenimiento($request, $files)
   {

      if ($this->validate($request, [
         "activoFijo",
         "fechaInicio",
         "tipoProgramacion",
         "responsableMantenimiento",
         "ubicacionActivo",
         "numeroSerie",
         "prioridadMantenimiento",
         "empresaMantenimiento"
      ])) {

         $list = $this->validateFileData($request, ["documentosMantenimiento"]);
         $doc1 = "";
         foreach ($list as $key => $value) {
            switch ($value) {
               case 'documentosMantenimiento':
                  $doc1 = $this->guardarDoc($request, ['documentosMantenimiento']);
                  break;
            }
         }

         $i_hoas = isset($request["intervaloHoras"]) ? $request["intervaloHoras"] : 0;
         $i_kilometraje = isset($request["intervaloKilometraje"]) ? $request["intervaloKilometraje"] : 0;

         $tabla = "plan_mantenimiento";
         $datos = array(
            "activos_fijos" => $request["activoFijo"],
            "fecha_inicio" => $request["fechaInicio"],
            "tipo_programacion" => $request["tipoProgramacion"],
            "responsable_mantenimiento" => $request["responsableMantenimiento"],
            "ubicacion_activo" => $request["ubicacionActivo"],
            "numero_serie" => $request["numeroSerie"],
            "prioridad_mantenimiento" => $request["prioridadMantenimiento"],
            "duracion_estimada" => $request["duracionEstimada"] ?? "",
            "costo_repuestos" => $request["costoRepuestos"] ?? "",
            "empresa_mantenimiento" => $request["empresaMantenimiento"],
            "observaciones" => $request["observaciones"] ?? "",
            "documento" => $doc1,
            "intervalo_horas" => $i_hoas,
            "intervalo_kilometraje" => $i_kilometraje,
            "inter_ini" => $request["inter_ini"] ?? "",
            "tipo_moneda" => $request["tipo_moneda"] ?? "",
            "valor_cambio" => $request["valo_cambio"] ?? ""
         );
         $respuesta = ModeloPlanMantenimiento::mdlIngresarPlanMantenimiento($tabla, $datos);

         if ($respuesta['status'] == "ok") {
            $lastInsertId = $respuesta['lastInsertId'];
            $state = "PENDIENTE";

            $datos = array(
               "maintenance_docs" => "",
               "evidence_fotos" => "",
               "observations" => "",
               "cost" => "",
               "duration" => "",
               "parts_used" => "",
               "residual_parts" => "",
               "tipo_mon" => "",
               "user_register" => "",
               "proveedor" => ""
            );
            $tabla = "form_info_matenimiento";
            if (isset($request['fechas']) && is_array($request['fechas'])) {
               foreach ($request['fechas'] as $key => $value) {
                  $response = ModeloPlanMantenimiento::mdlCrearCronologia($tabla, $value, $key, $lastInsertId, $state, $datos);
               }
            }

            echo "ok";
         } else {
            echo $respuesta;
         }
      } else {
         echo "no validados";
      }
   }
   
   public function ctrCrearInfoMatenimiento($request, $files)
   {
      if ($this->validate($request, ["cost", "duration"])) {
         if ($this->validateFile($request, ["evidencePhotos"]) || $this->validate($request, ["evidencePhotosDb"])) {
            $list = $this->validateFileData($request, ["maintenanceDocs", "evidencePhotos"]);

            $foto = $request["evidencePhotosDb"] ?? "";
            $doc = $request["maintenanceDb"] ?? "";
            foreach ($list as $key => $value) {
               switch ($value) {
                  case 'maintenanceDocs':
                     if ($doc !== "") {
                        $this->eliminarDoc($request, $doc);
                        $doc = $this->guardarDoc2($request, ['maintenanceDocs']);
                     } else {
                        $doc = $this->guardarDoc2($request, ['maintenanceDocs']);
                     }
                     break;
                  case 'evidencePhotos':
                     if ($foto !== "") {
                        $this->eliminarDoc($request, $foto);
                        $foto = $this->guardarImagen($request, ['evidencePhotos']);
                     } else {
                        $foto = $this->guardarImagen($request, ['evidencePhotos']);
                     }
                     break;
               }
            }
            $user_r = "";
            $proveedor = "";
            $tates = "REGISTRADO";
            $tabla = "form_info_matenimiento";
            $datos = array(
               "cabecera" => $request["cabecera"] ?? "",
               "id_plan" => $request["id_plan"],
               "maintenance_docs" => $doc,
               "evidence_fotos" => $foto,
               "observations" => $request["observations"] ?? "",
               "cost" => $request["cost"],
               "duration" => $request["duration"],
               "parts_used" => $request["partsUsed"] ?? "",
               "residual_parts" => $request["residualParts"] ?? "",
               "tipo_mon" => $request["tipo_mon"] ?? "",
               "user_register" => $user_r,
               "id_row" => $request["id_row"],
               "proveedor" => $proveedor,
               "state_r" => $tates
            );
            $respuesta = ModeloPlanMantenimiento::mdlActualizarInfoMantenimiento($tabla, $datos);

            if ($respuesta == "ok") {
               echo "ok";
            } else {
               echo "no se cargo";
            }
         } else {
            echo " no se valido correctamente las imagenes";
         }
      } else {
         echo " no se validaron los campos";
      }
   }
   
   public function ctrCrearInfoMatenimiento2($request, $files)
   {
      if (
         $this->validate($request, ["cost", "duration", "observations", "tipo_mon", "user_register"])
      ) {
         if ($this->validateFile($request, ["evidencePhotos"]) || $this->validate($request, ["evidencePhotosDb"])) {

            $list = $this->validateFileData($request, ["maintenanceDocs", "evidencePhotos"]);

            $foto = $request["evidencePhotosDb"] ?? "";
            $doc = $request["maintenanceDb"] ?? "";
            foreach ($list as $key => $value) {
               switch ($value) {
                  case 'maintenanceDocs':
                     if ($doc !== "") {
                        $this->eliminarDoc($request, $doc);
                        $doc = $this->guardarDoc2($request, ['maintenanceDocs']);
                     } else {
                        $doc = $this->guardarDoc2($request, ['maintenanceDocs']);
                     }
                     break;
                  case 'evidencePhotos':
                     if ($foto !== "") {
                        $this->eliminarDoc($request, $foto);
                        $foto = $this->guardarImagen($request, ['evidencePhotos']);
                     } else {
                        $foto = $this->guardarImagen($request, ['evidencePhotos']);
                     }
                     break;
               }
            }

            $tates = "REGISTRADO";
            $tabla = "form_info_matenimiento";
            $datos = array(
               "cabecera" => $request["cabecera"] ?? "",
               "id_row" => $request["id_row"],
               "id_plan" => $request["id_plan"],
               "maintenance_docs" => $doc,
               "evidence_fotos" => $foto,
               "observations" => $request["observations"],
               "tipo_mon" => $request["tipo_mon"],
               "cost" => $request["cost"],
               "duration" => $request["duration"],
               "user_register" => $request["user_register"],
               "proveedor" => $request["proveedor"] ?? "",
               "parts_used" => $request["partsUsed"] ?? "",
               "residual_parts" => $request["residualParts"] ?? "",
               "state_r" => $tates
            );
            $respuesta = ModeloPlanMantenimiento::mdlActualizarInfoMantenimiento($tabla, $datos);

            if ($respuesta == "ok") {
               echo "ok";
            } else {
               echo "no se cargo";
            }
         } else {
            echo "noImage";
         }
      } else {
         echo "no se valido";
      }
   }
   
   public function ctrCerrarMantenimiento($request)
   {
      $tates = "FINALIZADO";
      $tabla = "form_info_matenimiento";
      $datos = array(
         "id_row" => $request["id_row"],
         "id_plan" => $request["id_plan"],
         "state_r" => $tates
      );
      $respuesta = ModeloPlanMantenimiento::mdlCerrarMantenimiento($tabla, $datos);
      if ($respuesta == "ok") {
         echo "ok";
      } else {
         echo "no se cargo";
      }
   }
   
   public function ctrActualizarPlanMantenimiento($request, $files)
   {
      $respuestaPreUp = ModeloPlanMantenimiento::mdlMostrarPlanMantenimiento("plan_mantenimiento", "id", $request["idPlanMantenimientoEditar"]);

      $list = $this->validateFileData($request, ["ActualizarDocumentosMantenimiento"]);

      $doc1 = $request['editarDocumentoDb'] ?? '';

      foreach ($list as $key => $value) {
         switch ($value) {
            case 'ActualizarDocumentosMantenimiento':
               $this->eliminarDoc($request, $doc1);
               $doc1 = $this->guardarDoc($request, ["ActualizarDocumentosMantenimiento"]);
               break;
         }
      }

      $i_hoas = isset($request["updateintervaloHoras"]) ? $request["updateintervaloHoras"] : 0;
      $i_kilometraje = isset($request["updateintervaloKilometraje"]) ? $request["updateintervaloKilometraje"] : 0;

      $tabla = "plan_mantenimiento";
      $datos = array(
         "id" => $request["idPlanMantenimientoEditar"],
         "activos_fijos" => $request["actualizarActivoFijo"],
         "fecha_inicio" => $request["ActualizarFechaInicio"],
         "tipo_programacion" => $request["ActualizarTipoProgramacion"],
         "responsable_mantenimiento" => $request["ActualizarResponsableMantenimiento"],
         "ubicacion_activo" => $request["ActualizarUbicacionActivo"],
         "numero_serie" => $request["ActualizarNumeroSerie"],
         "prioridad_mantenimiento" => $request["ActualizarPrioridadMantenimiento"],
         "duracion_estimada" => $request["ActualizarDuracionEstimada"] ?? "",
         "costo_repuestos" => $request["ActualizarCostoRepuestos"] ?? "",
         "empresa_mantenimiento" => $request["ActualizarEmpresaMantenimiento"],
         "observaciones" => $request["ActualizarObservaciones"] ?? "",
         "documento" => $doc1,
         "intervalo_horas" => $i_hoas,
         "intervalo_kilometraje" => $i_kilometraje,
         "inter_ini" => $request["inter_ini"] ?? "",
         "tipo_moneda" => $request["tipo_moneda"] ?? "",
         "valor_cambio" => $request["valo_cambio"] ?? ""
      );

      $respuesta = ModeloPlanMantenimiento::mdlActualizarPlanMantenimiento($tabla, $datos);
      if ($respuesta == "ok") {
         if ($respuestaPreUp && isset($respuestaPreUp['tipo_programacion'])) {
            switch ($respuestaPreUp['tipo_programacion']) {
               case 'horas':
                  ($respuestaPreUp['tipo_programacion'] == $request['ActualizarTipoProgramacion'] && 
                   $respuestaPreUp['inter_ini'] == $request['inter_ini'] && 
                   $respuestaPreUp['intervalo_horas'] == $request['updateintervaloHoras'])
                     ? $this->noEdit()
                     : $this->eliminarCrearCronograma();
                  break;

               case 'kilometraje':
                  ($respuestaPreUp['tipo_programacion'] == $request['ActualizarTipoProgramacion'] && 
                   $respuestaPreUp['inter_ini'] == $request['inter_ini'] && 
                   $respuestaPreUp['intervalo_kilometraje'] == $request['updateintervaloKilometraje'])
                     ? $this->noEdit()
                     : $this->eliminarCrearCronograma();
                  break;

               default:
                  ($respuestaPreUp['tipo_programacion'] == $request['ActualizarTipoProgramacion'] && 
                   $respuestaPreUp['fecha_inicio'] == $request['ActualizarFechaInicio'])
                     ? $this->noEdit()
                     : $this->eliminarCrearCronograma();
                  break;
            }
         } else {
            echo "ok";
         }
      } else {
         echo "Error al actualizar";
      }
   }

   function eliminarCrearCronograma()
   {
      $tabla = "form_info_matenimiento";
      $datos = $_POST["idPlanMantenimientoEditar"] ?? 0;
      $respuesta = ModeloPlanMantenimiento::mdlEliminarPlanMantenimiento($tabla, "id_plan", $datos);

      if ($respuesta == "ok") {
         $lastInsertId = $_POST["idPlanMantenimientoEditar"] ?? 0;
         $state = "PENDIENTE";

         $datos = array(
            "maintenance_docs" => "",
            "evidence_fotos" => "",
            "observations" => "",
            "cost" => "",
            "duration" => "",
            "parts_used" => "",
            "residual_parts" => "",
            "tipo_mon" => "",
            "user_register" => "",
            "proveedor" => ""
         );
         $tabla = "form_info_matenimiento";
         if (isset($_POST['fechas']) && is_array($_POST['fechas'])) {
            foreach ($_POST['fechas'] as $key => $value) {
               $response = ModeloPlanMantenimiento::mdlCrearCronologia($tabla, $value, $key, $lastInsertId, $state, $datos);
            }
            echo $response;
         } else {
            echo "ok";
         }
      } else {
         echo 'eliminado no actualizado';
      }
   }
   
   function noEdit()
   {
      echo 'no edit';
   }
   
   /*=============================================
   GUARDAMOS LA DOC EN EL DIRECTORIO
   =============================================*/
   private function guardarDoc($request, $fileds)
   {
      foreach ($fileds as $key) {
         if (!isset($_FILES[$key]) || $_FILES[$key]['error'] !== 0) {
            continue;
         }
         
         $ruta = $_SERVER['DOCUMENT_ROOT'] . "/vistas/img/pla_mantenimiento/";

         $extension = pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);
         $aleatorio = date('YmdHis') . uniqid();
         $nombre = $aleatorio . '.' . $extension;
         $nombreDb = "vistas/img/pla_mantenimiento/" . $nombre;
         $ruta_carga = $ruta . $nombre;

         if (!file_exists($ruta)) {
            mkdir($ruta, 0777, true);
         }
         
         move_uploaded_file($_FILES[$key]['tmp_name'], $ruta_carga);
         return $nombreDb;
      }
      return "";
   }

   private function guardarDoc2($request, $fileds)
   {
      foreach ($fileds as $key) {
         if (!isset($_FILES[$key]) || $_FILES[$key]['error'] !== 0) {
            continue;
         }
         
         $ruta = $_SERVER['DOCUMENT_ROOT'] . "/vistas/img/pla_mantenimiento_info/";

         $extension = pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);
         $aleatorio = date('YmdHis') . uniqid();
         $nombre = $aleatorio . '.' . $extension;
         $nombreDb = "vistas/img/pla_mantenimiento_info/" . $nombre;
         $ruta_carga = $ruta . $nombre;

         if (!file_exists($ruta)) {
            mkdir($ruta, 0777, true);
         }
         
         move_uploaded_file($_FILES[$key]['tmp_name'], $ruta_carga);
         return $nombreDb;
      }
      return "";
   }
   
   private function guardarImagen($request, $fileds)
   {
      foreach ($fileds as $key) {
         if (!isset($_FILES[$key]) || $_FILES[$key]['error'] !== 0) {
            continue;
         }
         
         $ruta = $_SERVER['DOCUMENT_ROOT'] . "/vistas/img/pla_mantenimiento_info/";

         $extension = pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);
         $aleatorio = date('YmdHis') . uniqid();
         $nombre = $aleatorio . '.' . $extension;
         $nombreDb = "vistas/img/pla_mantenimiento_info/" . $nombre;
         $ruta_carga = $ruta . $nombre;

         if (!file_exists($ruta)) {
            mkdir($ruta, 0777, true);
         }
         
         move_uploaded_file($_FILES[$key]['tmp_name'], $ruta_carga);
         return $nombreDb;
      }
      return "";
   }

   static public function ctrMostrar($tabla)
   {
      $respuesta = ModeloPlanMantenimiento::mdlMostrarPlanMantenimiento($tabla, null, null);
      return $respuesta;
   }
   
   static public function _ctrMostrarColaborador($tabla)
   {
      $respuesta = ModeloPlanMantenimiento::mdlMostrarColaboradores($tabla, 'categoria', 'colaborador');
      return $respuesta;
   }

   /*=============================================
   VALIDA SI LOS CAMPOS IMPUT
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
   VALIDA SI EL FILE
   =============================================*/
   public function validateFile($request, $fileds)
   {
      $validationDoc = true;
      foreach ($fileds as $key) {
         if (!isset($_FILES[$key]) || $_FILES[$key]['error'] !== 0) {
            $validationDoc = false;
            break;
         }
      }
      return $validationDoc;
   }

   /*=============================================
   LISTA DE DATOS CON CAMPOS
   =============================================*/
   public function validateFileData($request, $fileds)
   {
      $listNotEmpty = [];
      foreach ($fileds as $key) {
         if (isset($_FILES[$key]) && $_FILES[$key]['error'] === 0) {
            $listNotEmpty[] = $key;
         }
      }
      return $listNotEmpty;
   }
   
   public static function eliminarDoc($requests, $fileds)
   {
      if (empty($fileds)) {
         return false;
      }
      
      $rutaExterna = $_SERVER['DOCUMENT_ROOT'] . "/";
      $rutaCompleta = $rutaExterna . $fileds;
      
      if (file_exists($rutaCompleta)) {
         if (unlink($rutaCompleta)) {
            return true;
         }
      }
      return false;
   }
}

// Verificamos si se está realizando una solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificamos si existe la clave 'accion'
    $accion = $_POST["accion"] ?? null;
    
    if ($accion !== null) {
        switch ($accion) {
            case 'obtener_activos_fijos':
                $activosFijos = ModeloPlanMantenimiento::mdlMostrarPlanMantenimiento('activo_fijo', null, null);
                echo json_encode(['success' => true, 'data' => $activosFijos]);
                break;
            case 'CrearInfoMatenimiento':
                $controlador = new ControladorPlanMantenimiento();
                $controlador->ctrCrearInfoMatenimiento($_POST, $_FILES);
                break;
            case 'CrearInfoMatenimiento2':
                $controlador = new ControladorPlanMantenimiento();
                $controlador->ctrCrearInfoMatenimiento2($_POST, $_FILES);
                break;
            case 'CrearPlanMantenimiento':
                $controlador = new ControladorPlanMantenimiento();
                $controlador->ctrCrearPlanMantenimiento($_POST, $_FILES);
                break;
            case 'cerrarMantenimiento':
                $controlador = new ControladorPlanMantenimiento();
                $controlador->ctrCerrarMantenimiento($_POST);
                break;
            case 'EditarPlanMantenimiento':
                $controlador = new ControladorPlanMantenimiento();
                $controlador->ctrActualizarPlanMantenimiento($_POST, $_FILES);
                break;
            default:
                echo json_encode(['success' => false, 'message' => 'Acción no reconocida']);
                break;
        }
    } else {
        // No se proporcionó una acción - podría ser un endpoint de API o una solicitud incorrecta
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'message' => 'No se especificó ninguna acción']);
    }
}