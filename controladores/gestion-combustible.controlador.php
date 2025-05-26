<?php
class ControladorGestionCombustible
{

   /*=============================================
   CREAR GESTION COMBUSTIBLE
   =============================================*/
   public function ctrCrearGestionCombustible($request)
   {

      if ($this->validate($request, ["fechaAbastecimiento", "horaAbastecimiento", "estacionServicio", "litrosCargados", "costoPorLitro", "totalPagado", "placaVehiculo", "tipoCombustible", "rucProveedor", "kilometrosRecorridos", "formaPago"])) {

         $list = $this->validateFileData($request, ["documento1", "documento2", "documento3", "documento4"]);
         $doc1 = "";
         $doc2 = "";
         $doc3 = "";
         $doc4 = "";

         foreach ($list as $key => $value) {
            switch ($value) {
               case 'documento1':
                  $doc1 = $this->guardarDoc($request, ['documento1']);
                  break;
               case 'documento2':
                  $doc2 = $this->guardarDoc($request, ['documento2']);
                  break;
               case 'documento3':
                  $doc3 = $this->guardarDoc($request, ['documento3']);
                  break;
               case 'documento4':
                  $doc4 = $this->guardarDoc($request, ['documento4']);
                  break;
            }
         }

         $tabla = "gestion_combustible";
         $datos = array(
            "fecha_abastecimiento" => $request["fechaAbastecimiento"],

            "hora_abastecimiento" => $request["horaAbastecimiento"],
            "estacion_servicio" => $request["estacionServicio"],
            "litros_cargados" => $request["litrosCargados"],
            "costo_litro" => $request["costoPorLitro"],
            "total_pagado" => $request["totalPagado"],
            "placa_vehiculo" => $request["placaVehiculo"],
            "tipo_combustible" => $request["tipoCombustible"],
            "ruc_probeedor" => $request["rucProveedor"],
            "kilometros_recorridos" => $request["kilometrosRecorridos"],
            "forma_pago" => $request["formaPago"],
            "notas_adicionales" => $request["notasAdicionales"],
            "doc1" => $doc1,
            "doc2" => $doc2,
            "doc3" => $doc3,
            "doc4" => $doc4
         );
         $respuesta = ModeloGestionCombustible::mdlIngresarGestionCombustible($tabla, $datos);
         if ($respuesta == "ok") {
            echo '<script>
                     swal({
                        type: "success",
                        title: "Gestion de combustible ha sido registrado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                     }).then((result) => {
                        if (result.value) {
                           window.location = "gestion-combustible";
                        }
                     })
                  </script>';
         } else {
            echo "no se cargo";
         }
      }
   }
   public function ctrActualizarGestionCombustible($request)
   {

      $list = $this->validateFileData($request, ["editarDocumento1", "editarDocumento2", "editarDocumento3", "editarDocumento4"]);

      $doc1 = $request['editarDocumento1Db'];
      $doc2 = $request['editarDocumento2Db'];
      $doc3 = $request['editarDocumento3Db'];
      $doc4 = $request['editarDocumento4Db'];

      foreach ($list as $key => $value) {
         switch ($value) {
            case 'editarDocumento1':
               $this->eliminarDoc($request, $doc1);
               $doc1 = $this->guardarDoc($request, ["editarDocumento1"]);
               break;
            case 'editarDocumento2':
               $this->eliminarDoc($request, $doc2);
               $doc2 = $this->guardarDoc($request, ['editarDocumento2']);
               break;
            case 'editarDocumento3':
               $this->eliminarDoc($request, $doc3);
               $doc3 = $this->guardarDoc($request, ['editarDocumento3']);
               break;
            case 'editarDocumento4':
               $this->eliminarDoc($request, $doc4);
               $doc4 = $this->guardarDoc($request, ['editarDocumento4']);
               break;
         }
      }

      $tabla = "gestion_combustible";
      $datos = array(
         "id" => $request["idGestionCombustibleEditar"],
         "fecha_abastecimiento" => $request["editarFechaAbastecimiento"],
         "hora_abastecimiento" => $request["editarHoraAbastecimiento"],
         "estacion_servicio" => $request["editarEstacionServicio"],
         "litros_cargados" => $request["editarLitrosCargados"],
         "costo_litro" => $request["editarCostoPorLitro"],
         "total_pagado" => $request["editarTotalPagado"],
         "placa_vehiculo" => $request["editarPlacaVehiculo"],
         "tipo_combustible" => $request["editarTipoCombustible"],
         "ruc_probeedor" => $request["editarRucProveedor"],
         "kilometros_recorridos" => $request["editarKilometrosRecorridos"],
         "forma_pago" => $request["editarFormaPago"],
         "notas_adicionales" => $request["editarNotasAdicionales"],
         "doc1" => $doc1,
         "doc2" => $doc2,
         "doc3" => $doc3,
         "doc4" => $doc4
      );

      $respuesta = ModeloGestionCombustible::mdlActualizarGestionCombustible($tabla, $datos);
      if ($respuesta == "ok") {
         echo '<script>
            
            swal({
               type: "success",
               title: "Gestion de combustible ha sido editado correctamente",
               showConfirmButton: true,
               confirmButtonText: "Cerrar",
               closeOnConfirm: false
               }).then((result) => {
               if (result.value) {
                           window.location = "gestion-combustible";
                        }
                     })
                  </script>';
      } else {
         echo "no se cargo";
      }
   }

   /*=============================================
   GUARDAMOS LA DOC EN EL DIRECTORIO
   =============================================*/
   private function guardarDoc($request, $fileds)
   {
      foreach ($fileds as $key) {
         $ruta = $_SERVER['DOCUMENT_ROOT'] . "/vistas/img/gestion_combustible/";

         $extension = pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);

         $aleatorio = date('YmdHis');


         $nombre = $aleatorio . '.' . $extension;

         $nombreDb = "vistas/img/gestion_combustible/" . $nombre;

         $ruta_carga = $ruta . $nombre;

         if (!file_exists($ruta)) {

            mkdir($ruta, 0777);
         }
         if (move_uploaded_file($_FILES[$key]['tmp_name'], $ruta_carga)) {
         }
         return $nombreDb;
      }
   }

   /*=============================================
   VALIDA SI LOS CAMPOS IMPUT
   =============================================*/
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

   /*=============================================
   VALIDA SI EL FILE
   =============================================*/
   public function validateFile($resquest, $fileds)
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
   public static function eliminarDoc($requests, $fileds)
   {
      $rutaExterna = $_SERVER['DOCUMENT_ROOT']."/";
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
