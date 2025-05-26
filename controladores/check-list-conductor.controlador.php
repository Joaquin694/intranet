<?php
class ControladorCheckListConductor
{

   /*=============================================
   CREAR 
   =============================================*/
   public function ctrCrearCheckListConductor($requests)
   {


      if (
         $this->validate(
            $requests,
            [
               "options",
               "day",
               "placadb",
               "input_1",
               "input_2",
               "input_3",
               "input_4",
               "input_5",
               "input_6",
               "input_7",
               "input_8",
               "input_9",
               "input_10",
               "input_11",
               "input_12",
               "input_13",
               "input_14",
               "input_15",
               "input_16",
               "input_17",
               "input_18",
               "input_19",
               "input_20",
               "input_21",
               "input_22",
               "input_23",
               "input_24",
               "input_25",
               "input_26",
               "input_27",
               "input_28",
               "input_29",
               "input_30",
               "input_31",
               "input_32",
               "input_33",
               "input_34",
               "input_35",
               "input_36",
               "input_37",
               "input_38",
               "input_39",
               "input_40",
               "input_41",
               "input_42",
               "input_43",
               "input_44",
               "input_45",
               "input_46",
               "input_47",
               "input_48",
               "input_49",
               "input_50",
               "input_51",
               "input_52",
               "input_53",
               "input_54",
               "input_55",
               "input_56",
               "input_57",
               "input_58"
            ]
         ) &&
         $this->validateFile(
            $requests,
            ["frontalImage", "rearImage", "leftImage", "rightImage"]
         )
      ) {


         $frontImg = $this->guardarDoc($requests, ["frontalImage"]);
         $rearImg = $this->guardarDoc($requests, ["rearImage"]);
         $leftImg = $this->guardarDoc($requests, ["leftImage"]);
         $right = $this->guardarDoc($requests, ["rightImage"]);

         $tabla = "check_list_conductor_2";
         $datos = array(
            "options" => $requests["options"],
            "day" => $requests["day"],
            "placadb" => $requests["placadb"],

            "input_1" => $requests["input_1"],
            "com_input_1" => $requests["com_input_1"],
            "input_2" => $requests["input_2"],
            "com_input_2" => $requests["com_input_2"],
            "input_3" => $requests["input_3"],
            "com_input_3" => $requests["com_input_3"],
            "input_4" => $requests["input_4"],
            "com_input_4" => $requests["com_input_4"],
            "input_5" => $requests["input_5"],
            "com_input_5" => $requests["com_input_5"],
            "input_6" => $requests["input_6"],
            "com_input_6" => $requests["com_input_6"],
            "input_7" => $requests["input_7"],
            "com_input_7" => $requests["com_input_7"],
            "input_8" => $requests["input_8"],
            "com_input_8" => $requests["com_input_8"],
            "input_9" => $requests["input_9"],
            "com_input_9" => $requests["com_input_9"],
            "input_10" => $requests["input_10"],
            "com_input_10" => $requests["com_input_10"],
            "input_11" => $requests["input_11"],
            "com_input_11" => $requests["com_input_11"],
            "input_12" => $requests["input_12"],
            "com_input_12" => $requests["com_input_12"],
            "input_13" => $requests["input_13"],
            "com_input_13" => $requests["com_input_13"],
            "input_14" => $requests["input_14"],
            "com_input_14" => $requests["com_input_14"],
            "input_15" => $requests["input_15"],
            "com_input_15" => $requests["com_input_15"],
            "input_16" => $requests["input_16"],
            "com_input_16" => $requests["com_input_16"],
            "input_17" => $requests["input_17"],
            "com_input_17" => $requests["com_input_17"],
            "input_18" => $requests["input_18"],
            "com_input_18" => $requests["com_input_18"],
            "input_19" => $requests["input_19"],
            "com_input_19" => $requests["com_input_19"],
            "input_20" => $requests["input_20"],
            "com_input_20" => $requests["com_input_20"],
            "input_21" => $requests["input_21"],
            "com_input_21" => $requests["com_input_21"],
            "input_22" => $requests["input_22"],
            "com_input_22" => $requests["com_input_22"],
            "input_23" => $requests["input_23"],
            "com_input_23" => $requests["com_input_23"],
            "input_24" => $requests["input_24"],
            "com_input_24" => $requests["com_input_24"],
            "input_25" => $requests["input_25"],
            "com_input_25" => $requests["com_input_25"],
            "input_26" => $requests["input_26"],
            "com_input_26" => $requests["com_input_26"],
            "input_27" => $requests["input_27"],
            "com_input_27" => $requests["com_input_27"],
            "input_28" => $requests["input_28"],
            "com_input_28" => $requests["com_input_28"],
            "input_29" => $requests["input_29"],
            "com_input_29" => $requests["com_input_29"],
            "input_30" => $requests["input_30"],
            "com_input_30" => $requests["com_input_30"],
            "input_31" => $requests["input_31"],
            "com_input_31" => $requests["com_input_31"],
            "input_32" => $requests["input_32"],
            "com_input_32" => $requests["com_input_32"],
            "input_33" => $requests["input_33"],
            "com_input_33" => $requests["com_input_33"],
            "input_34" => $requests["input_34"],
            "com_input_34" => $requests["com_input_34"],
            "input_35" => $requests["input_35"],
            "com_input_35" => $requests["com_input_35"],
            "input_36" => $requests["input_36"],
            "com_input_36" => $requests["com_input_36"],
            "input_37" => $requests["input_37"],
            "com_input_37" => $requests["com_input_37"],
            "input_38" => $requests["input_38"],
            "com_input_38" => $requests["com_input_38"],
            "input_39" => $requests["input_39"],
            "com_input_39" => $requests["com_input_39"],
            "input_40" => $requests["input_40"],
            "com_input_40" => $requests["com_input_40"],
            "input_41" => $requests["input_41"],
            "com_input_41" => $requests["com_input_41"],
            "input_42" => $requests["input_42"],
            "com_input_42" => $requests["com_input_42"],
            "input_43" => $requests["input_43"],
            "com_input_43" => $requests["com_input_43"],
            "input_44" => $requests["input_44"],
            "com_input_44" => $requests["com_input_44"],
            "input_45" => $requests["input_45"],
            "com_input_45" => $requests["com_input_45"],
            "input_46" => $requests["input_46"],
            "com_input_46" => $requests["com_input_46"],
            "input_47" => $requests["input_47"],
            "com_input_47" => $requests["com_input_47"],
            "input_48" => $requests["input_48"],
            "com_input_48" => $requests["com_input_48"],
            "input_49" => $requests["input_49"],
            "com_input_49" => $requests["com_input_49"],
            "input_50" => $requests["input_50"],
            "com_input_50" => $requests["com_input_50"],
            "input_51" => $requests["input_51"],
            "com_input_51" => $requests["com_input_51"],
            "input_52" => $requests["input_52"],
            "com_input_52" => $requests["com_input_52"],
            "input_53" => $requests["input_53"],
            "com_input_53" => $requests["com_input_53"],
            "input_54" => $requests["input_54"],
            "com_input_54" => $requests["com_input_54"],
            "input_55" => $requests["input_55"],
            "com_input_55" => $requests["com_input_55"],
            "input_56" => $requests["input_56"],
            "com_input_56" => $requests["com_input_56"],
            "input_57" => $requests["input_57"],
            "com_input_57" => $requests["com_input_57"],
            "input_58" => $requests["input_58"],
            "com_input_58" => $requests["com_input_58"],

            "frontImg" => $frontImg,
            "rearImg" => $rearImg,
            "leftImg" => $leftImg,
            "rightImg" => $right

         );
         $respuesta = ModeloCheckListConductor::mdlIngresarCheckListConductor($tabla, $datos);
         if ($respuesta == "ok") {
            echo '<script>
                     swal({
                        type: "success",
                        title: "Check List del Conductor ha sido registrado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                     }).then((result) => {
                        if (result.value) {
                           window.location = "check-list-conductor";
                        }
                     })
                  </script>';
         } else {
            echo "error";
         }
      }
   }

   public function ctrActualizarCheckListConductor($requests)
   {

      $list = $this->validateFileData($requests, ["editarFrontalImage", "editRearImage", "editLeftImage", "editRightImage"]);

      $frontalImg = $requests['editFrontalImageDb'];
      $rearImg = $requests['editRearImageDb'];
      $leftImg = $requests['editLeftImageDb'];
      $rightImg = $requests['editRightImageDb'];

      foreach ($list as $key => $value) {
         switch ($value) {
            case 'editarFrontalImage':
               $this->eliminarDoc($requests, $frontalImg);
               $frontalImg = $this->guardarDoc($requests, ["editarFrontalImage"]);
               break;
            case 'editRearImage':
               $this->eliminarDoc($requests, $rearImg);
               $rearImg = $this->guardarDoc($requests, ["editRearImage"]);
               break;
            case 'editLeftImage':
               $this->eliminarDoc($requests, $leftImg);
               $leftImg = $this->guardarDoc($requests, ["editLeftImage"]);
               break;
            case 'editRightImage':
               $this->eliminarDoc($requests, $rightImg);
               $rightImg = $this->guardarDoc($requests, ["editRightImage"]);
               break;
         }
      }

      $tabla = 'check_list_conductor_2';
      $datos = array(
         "id" => $requests["idCheckListConductor"],
         "options" => $requests["editaroptions"],
         "day" => $requests["editarday"],
         "placadb" => $requests["editarplacadb"],

         "input_1" => $requests["up_input_1"],
         "com_input_1" => $requests["up_com_input_1"],
         "input_2" => $requests["up_input_2"],
         "com_input_2" => $requests["up_com_input_2"],
         "input_3" => $requests["up_input_3"],
         "com_input_3" => $requests["up_com_input_3"],
         "input_4" => $requests["up_input_4"],
         "com_input_4" => $requests["up_com_input_4"],
         "input_5" => $requests["up_input_5"],
         "com_input_5" => $requests["up_com_input_5"],
         "input_6" => $requests["up_input_6"],
         "com_input_6" => $requests["up_com_input_6"],
         "input_7" => $requests["up_input_7"],
         "com_input_7" => $requests["up_com_input_7"],
         "input_8" => $requests["up_input_8"],
         "com_input_8" => $requests["up_com_input_8"],
         "input_9" => $requests["up_input_9"],
         "com_input_9" => $requests["up_com_input_9"],
         "input_10" => $requests["up_input_10"],
         "com_input_10" => $requests["up_com_input_10"],
         "input_11" => $requests["up_input_11"],
         "com_input_11" => $requests["up_com_input_11"],
         "input_12" => $requests["up_input_12"],
         "com_input_12" => $requests["up_com_input_12"],
         "input_13" => $requests["up_input_13"],
         "com_input_13" => $requests["up_com_input_13"],
         "input_14" => $requests["up_input_14"],
         "com_input_14" => $requests["up_com_input_14"],
         "input_15" => $requests["up_input_15"],
         "com_input_15" => $requests["up_com_input_15"],
         "input_16" => $requests["up_input_16"],
         "com_input_16" => $requests["up_com_input_16"],
         "input_17" => $requests["up_input_17"],
         "com_input_17" => $requests["up_com_input_17"],
         "input_18" => $requests["up_input_18"],
         "com_input_18" => $requests["up_com_input_18"],
         "input_19" => $requests["up_input_19"],
         "com_input_19" => $requests["up_com_input_19"],
         "input_20" => $requests["up_input_20"],
         "com_input_20" => $requests["up_com_input_20"],
         "input_21" => $requests["up_input_21"],
         "com_input_21" => $requests["up_com_input_21"],
         "input_22" => $requests["up_input_22"],
         "com_input_22" => $requests["up_com_input_22"],
         "input_23" => $requests["up_input_23"],
         "com_input_23" => $requests["up_com_input_23"],
         "input_24" => $requests["up_input_24"],
         "com_input_24" => $requests["up_com_input_24"],
         "input_25" => $requests["up_input_25"],
         "com_input_25" => $requests["up_com_input_25"],
         "input_26" => $requests["up_input_26"],
         "com_input_26" => $requests["up_com_input_26"],
         "input_27" => $requests["up_input_27"],
         "com_input_27" => $requests["up_com_input_27"],
         "input_28" => $requests["up_input_28"],
         "com_input_28" => $requests["up_com_input_28"],
         "input_29" => $requests["up_input_29"],
         "com_input_29" => $requests["up_com_input_29"],
         "input_30" => $requests["up_input_30"],
         "com_input_30" => $requests["up_com_input_30"],
         "input_31" => $requests["up_input_31"],
         "com_input_31" => $requests["up_com_input_31"],
         "input_32" => $requests["up_input_32"],
         "com_input_32" => $requests["up_com_input_32"],
         "input_33" => $requests["up_input_33"],
         "com_input_33" => $requests["up_com_input_33"],
         "input_34" => $requests["up_input_34"],
         "com_input_34" => $requests["up_com_input_34"],
         "input_35" => $requests["up_input_35"],
         "com_input_35" => $requests["up_com_input_35"],
         "input_36" => $requests["up_input_36"],
         "com_input_36" => $requests["up_com_input_36"],
         "input_37" => $requests["up_input_37"],
         "com_input_37" => $requests["up_com_input_37"],
         "input_38" => $requests["up_input_38"],
         "com_input_38" => $requests["up_com_input_38"],
         "input_39" => $requests["up_input_39"],
         "com_input_39" => $requests["up_com_input_39"],
         "input_40" => $requests["up_input_40"],
         "com_input_40" => $requests["up_com_input_40"],
         "input_41" => $requests["up_input_41"],
         "com_input_41" => $requests["up_com_input_41"],
         "input_42" => $requests["up_input_42"],
         "com_input_42" => $requests["up_com_input_42"],
         "input_43" => $requests["up_input_43"],
         "com_input_43" => $requests["up_com_input_43"],
         "input_44" => $requests["up_input_44"],
         "com_input_44" => $requests["up_com_input_44"],
         "input_45" => $requests["up_input_45"],
         "com_input_45" => $requests["up_com_input_45"],
         "input_46" => $requests["up_input_46"],
         "com_input_46" => $requests["up_com_input_46"],
         "input_47" => $requests["up_input_47"],
         "com_input_47" => $requests["up_com_input_47"],
         "input_48" => $requests["up_input_48"],
         "com_input_48" => $requests["up_com_input_48"],
         "input_49" => $requests["up_input_49"],
         "com_input_49" => $requests["up_com_input_49"],
         "input_50" => $requests["up_input_50"],
         "com_input_50" => $requests["up_com_input_50"],
         "input_51" => $requests["up_input_51"],
         "com_input_51" => $requests["up_com_input_51"],
         "input_52" => $requests["up_input_52"],
         "com_input_52" => $requests["up_com_input_52"],
         "input_53" => $requests["up_input_53"],
         "com_input_53" => $requests["up_com_input_53"],
         "input_54" => $requests["up_input_54"],
         "com_input_54" => $requests["up_com_input_54"],
         "input_55" => $requests["up_input_55"],
         "com_input_55" => $requests["up_com_input_55"],
         "input_56" => $requests["up_input_56"],
         "com_input_56" => $requests["up_com_input_56"],
         "input_57" => $requests["up_input_57"],
         "com_input_57" => $requests["up_com_input_57"],
         "input_58" => $requests["up_input_58"],
         "com_input_58" => $requests["up_com_input_58"],

         "frontImg" => $frontalImg,
         "rearImg" => $rearImg,
         "leftImg" => $leftImg,
         "rightImg" => $rightImg
      );

      $respuesta = ModeloCheckListConductor::mdlActualizarCheckListConductor($tabla, $datos);
      if ($respuesta == "ok") {
         echo '<script>
            
            swal({
               type: "success",
               title: "Check list ha sido editado correctamente",
               showConfirmButton: true,
               confirmButtonText: "Cerrar",
               closeOnConfirm: false
               }).then((result) => {
               if (result.value) {
                           window.location = "check-list-conductor";
                        }
                     })
                  </script>';
      } else {
         echo "no se cargo";
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
   public function list($request, $fields)
   {
      $list = [];
      foreach ($fields as $key) {
         if (!isset($request[$key]) || empty($request[$key])) {

            $list[] = $key;
         }
      }
      return $list;
   }
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
   private function guardarDoc($request, $fileds)
   {
      foreach ($fileds as $key) {
         $ruta = $_SERVER['DOCUMENT_ROOT'] . "/vistas/img/check_list_conductor/";

         $extension = pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);

         $aleatorioDoc = date('YmdHis') . uniqid();

         $nombre = $aleatorioDoc . '.' . $extension;

         $nombreDb = "vistas/img/check_list_conductor/" . $nombre;

         $ruta_carga = $ruta . $nombre;

         if (!file_exists($ruta)) {

            mkdir($ruta, 0777);
         }
         if (move_uploaded_file($_FILES[$key]['tmp_name'], $ruta_carga)) {
         }
         return $nombreDb;
      }
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
