<?php
class ControladorIperc
{
   public function ctrCrearIperc($request)
   {

      if (
         $this->validate($request, [
            "activityName",
            "task",
            "workOrder",
            "responsableSupervisor",
            "responsableEncargado",
            "date",
            "area",
            "clasificacion",
            "pets",
            "petar",
            "iperc",
            "location",
            "startTime",
            "endTime",
            "tools",
            "chemicals",
            "taskDescription",
            "risk",
            "probability",
            "severity",
            "exposure",
            "initialRisk",
            "controlMeasures",
            "residualRisk",
            "workerName1",
            "workerCargo1",
            "workerArea1",
            "supervisorTime1",
            "supervisorName1",
            "correctiveMeasure1"
         ]) &&
         $this->validateFile($request, ["supervisorSignature", "encargadoSignature", "workerSignature1", "supervisorSignature1"])
      ) {
         $list = $this->validateFileData($request, [
            "supervisorSignature", "encargadoSignature", "workerSignature1", "supervisorSignature1",
            "workerSignature2", "workerSignature3", "workerSignature4", "workerSignature5"
         ]);
         $doc1 = "";
         $doc2 = "";
         $doc3 = "";
         $doc4 = "";

         $doc5 = "";
         $doc6 = "";
         $doc7 = "";
         $doc8 = "";

         foreach ($list as $key => $value) {
            switch ($value) {
               case "supervisorSignature":
                  $doc1 = $this->guardarImagen($request, ['supervisorSignature']);
                  break;
               case 'encargadoSignature':
                  $doc2 = $this->guardarImagen($request, ['encargadoSignature']);
                  break;
               case 'workerSignature1':
                  $doc3 = $this->guardarImagen($request, ['workerSignature1']);
                  break;
               case 'supervisorSignature1':
                  $doc4 = $this->guardarImagen($request, ['supervisorSignature1']);
                  break;
               case 'workerSignature2':
                  $doc5 = $this->guardarImagen($request, ['workerSignature2']);
                  break;
               case 'workerSignature3':
                  $doc6 = $this->guardarImagen($request, ['workerSignature3']);
                  break;
               case 'workerSignature4':
                  $doc7 = $this->guardarImagen($request, ['workerSignature4']);
                  break;
               case 'workerSignature5':
                  $doc8 = $this->guardarImagen($request, ['workerSignature5']);
                  break;
            }
         }
         $listHands = self::validateList($request, [
            "hands1",
            "hands2",
            "hands3",
            "hands4",
            "hands5",
            "hands6"
         ]);
         $listHandsF = implode('/', $listHands);

         $listWorkArea = self::validateList($request, [
            "workArea1",
            "workArea2",
            "workArea3",
            "workArea4",
            "workArea5",
            "workArea6",
            "workArea7",
            "workArea8",
            "workArea9",
            "workArea10",
            "workArea11",
            "workArea12",
            "workArea13",
            "workArea14"
         ]);
         $listWorkAreaF = implode('/', $listWorkArea);

         $listPetar = self::validateList($request, [
            "petar1",
            "petar2",
            "petar3",
            "petar4",
            "petar5",
            "petar6",
            "petar7",
            "petar8",
            "petar9",  // Added missing "petar9"
            "petar10",
            "petar11",
            "petar12",  // This "petar12" does not exist in the provided list. It should be removed.
            "petar13",
            "petar14",
            "petar15",
            "petar16"
         ]);
         $listPetarF = implode('/', $listPetar);

         $lisEpp = self::validateList($request, [
            "epp1",
            "epp2",
            "epp3",
            "epp4",
            "epp5",
            "epp6",
            "epp7",
            "epp8",
            "epp9",
            "epp10",
            "epp11",
            "epp12",
            "epp13",
            "epp14",
            "epp15",
            "epp16",
            "epp17",
            "epp18"
         ]);
         $lisEppF = implode('/', $lisEpp);

         $lisHannCar = self::validateList($request, [
            "handCare1",
            "handCare2",
            "handCare3",
            "handCare4",
            "handCare5",
            "handCare6"
         ]);
         $lisHannCarF = implode('/', $lisHannCar);

         $lisToolsEquip = self::validateList($request, [
            "toolsEquip1",
            "toolsEquip2",
            "toolsEquip3",
            "toolsEquip4"
         ]);
         $lisToolsEquipF = implode('/', $lisToolsEquip);

         $lisCleanLiness = self::validateList($request, [
            "cleanliness1",
            "cleanliness2",
            "cleanliness3",
            "cleanliness4",
            "cleanliness5"
         ]);
         $lisCleanLinessF = implode('/', $lisCleanLiness);

         $lisAndamios = self::validateList($request, [
            "andamios1",
            "andamios2",
            "andamios3",
            "andamios4",
            "andamios5",
            "andamios6",
            "andamios7"
         ]);
         $lisAndamiosF = implode('/', $lisAndamios);

         $lisIzajes = self::validateList($request, [
            "izajes1",
            "izajes2",
            "izajes3",
            "izajes4",
            "izajes5"
         ]);
         $lisIzajesF = implode('/', $lisIzajes);

         $lisSustancias = self::validateList($request, [
            "sustancias1",
            "sustancias2",
            "sustancias3",
            "sustancias4",
            "sustancias5",
            "sustancias6"
         ]);
         $lisSustanciasF = implode('/', $lisSustancias);

         $lisEscaleras = self::validateList($request, [
            "escalera1",
            "escalera2",
            "escalera3",
            "escalera4",
            "escalera5",
            "escalera6"
         ]);
         $lisEscalerasF = implode('/', $lisEscaleras);

         $lisManejo = self::validateList($request, [
            "manejo1",
            "manejo2",
            "manejo3",
            "manejo4",
            "manejo5",
            "manejo6",
            "manejo7"
         ]);
         $lisManejoF = implode('/', $lisManejo);


         $tabla = "iperc";
         $datos = array(
            "activity_name" => $request["activityName"],
            "task" => $request["task"],
            "work_order" => $request["workOrder"],
            "responsable_supervisor" => $request["responsableSupervisor"],
            "supervisor_signature" => $doc1,
            "responsable_encargado" => $request["responsableEncargado"],
            "encargado_signature" => $doc2,
            "date" => $request["date"],
            "area" => $request["area"],
            "clasificacion" => $request["clasificacion"],
            "pets" => $request["pets"],
            "petar" => $request["petar"],
            "iperc" => $request["iperc"],
            "location" => $request["location"],
            "start_time" => $request["startTime"],
            "end_time" => $request["endTime"],
            "tools" => $request["tools"],
            "chemicals" => $request["chemicals"],
            "task_description" => $request["taskDescription"],
            "risk" => $request["risk"],
            "probability" => $request["probability"],
            "severity" => $request["severity"],
            "exposure" => $request["exposure"],
            "initial_risk" => $request["initialRisk"],
            "control_measures" => $request["controlMeasures"],
            "residual_risk" => $request["residualRisk"],

            "worker_name1" => $request["workerName1"],
            "worker_cargo1" => $request["workerCargo1"],
            "worker_area1" => $request["workerArea1"],
            "worker_signature1" => $doc3,

            "worker_name2" => $request["workerName2"],
            "worker_cargo2" => $request["workerCargo2"],
            "worker_area2" => $request["workerArea2"],
            "worker_signature2" => $doc5,

            "worker_name3" => $request["workerName3"],
            "worker_cargo3" => $request["workerCargo3"],
            "worker_area3" => $request["workerArea3"],
            "worker_signature3" => $doc6,

            "worker_name4" => $request["workerName4"],
            "worker_cargo4" => $request["workerCargo4"],
            "worker_area4" => $request["workerArea4"],
            "worker_signature4" => $doc7,

            "worker_name5" => $request["workerName5"],
            "worker_cargo5" => $request["workerCargo5"],
            "worker_area5" => $request["workerArea5"],
            "worker_signature5" => $doc8,

            "supervisor_time1" => $request["supervisorTime1"],
            "supervisor_name1" => $request["supervisorName1"],
            "corrective_measure1" => $request["correctiveMeasure1"],
            "supervisor_signature1" => $doc4,
            "list_hands" => $listHandsF,
            "list_work_area" => $listWorkAreaF,
            "list_petar" => $listPetarF,
            "list_epp" => $lisEppF,
            "list_hann_car" => $lisHannCarF,
            "list_tools_equip" => $lisToolsEquipF,
            "list_clean_liness" => $lisCleanLinessF,
            "list_andamios" => $lisAndamiosF,
            "list_izajes" => $lisIzajesF,
            "list_sustancias" => $lisSustanciasF,
            "list_escaleras" => $lisEscalerasF,
            "list_manejo" => $lisManejoF
         );
         $respuesta = ModeloIperc::mdlIngresarIperc($tabla, $datos);
         if ($respuesta == "ok") {
            echo '<script>
                     swal({
                        type: "success",
                        title: "Matriz de IPERC ha sido registrado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                     }).then((result) => {
                        if (result.value) {
                           window.location = "iperc";
                        }
                     })
                  </script>';
         }
      }
   }
   //#######################################################################
   public function ctrActualizarIperc($request)
   {

      $list = $this->validateFileData($request, [
         "supervisorSignature", "encargadoSignature", "workerSignature1", "supervisorSignature1",
         "workerSignature2", "workerSignature3", "workerSignature4", "workerSignature5"
      ]);

      $doc1 = $request['supervisorSignatureDB'];
      $doc2 = $request['encargadoSignatureDB'];
      $doc3 = $request['workerSignature1DB'];
      $doc4 = $request['supervisorSignature1DB'];
      $doc5 = $request['workerSignature2DB'];
      $doc6 = $request['workerSignature3DB'];
      $doc7 = $request['workerSignature4DB'];
      $doc8 = $request['workerSignature5DB'];

      foreach ($list as $key => $value) {
         switch ($value) {
            case "supervisorSignature":
               $this->eliminarDoc($request, $doc1);
               $doc1 = $this->guardarImagen($request, ['supervisorSignature']);
               break;
            case 'encargadoSignature':
               $this->eliminarDoc($request, $doc2);
               $doc2 = $this->guardarImagen($request, ['encargadoSignature']);
               break;
            case 'workerSignature1':
               $this->eliminarDoc($request, $doc3);
               $doc3 = $this->guardarImagen($request, ['workerSignature1']);
               break;
            case 'supervisorSignature1':
               $this->eliminarDoc($request, $doc4);
               $doc4 = $this->guardarImagen($request, ['supervisorSignature1']);
               break;
            case 'workerSignature2':
               $this->eliminarDoc($request, $doc5);
               $doc5 = $this->guardarImagen($request, ['workerSignature2']);
               break;
            case 'workerSignature3':
               $this->eliminarDoc($request, $doc6);
               $doc6 = $this->guardarImagen($request, ['workerSignature3']);
               break;
            case 'workerSignature4':
               $this->eliminarDoc($request, $doc7);
               $doc7 = $this->guardarImagen($request, ['workerSignature4']);
               break;
            case 'workerSignature5':
               $this->eliminarDoc($request, $doc8);
               $doc8 = $this->guardarImagen($request, ['workerSignature5']);
               break;
         }
      }
      $listHands = self::validateList($request, [
         "hands1",
         "hands2",
         "hands3",
         "hands4",
         "hands5",
         "hands6"
      ]);
      $listHandsF = implode('/', $listHands);

      $listWorkArea = self::validateList($request, [
         "workArea1",
         "workArea2",
         "workArea3",
         "workArea4",
         "workArea5",
         "workArea6",
         "workArea7",
         "workArea8",
         "workArea9",
         "workArea10",
         "workArea11",
         "workArea12",
         "workArea13",
         "workArea14"
      ]);
      $listWorkAreaF = implode('/', $listWorkArea);

      $listPetar = self::validateList($request, [
         "petar1",
         "petar2",
         "petar3",
         "petar4",
         "petar5",
         "petar6",
         "petar7",
         "petar8",
         "petar9",  // Added missing "petar9"
         "petar10",
         "petar11",
         "petar12",  // This "petar12" does not exist in the provided list. It should be removed.
         "petar13",
         "petar14",
         "petar15",
         "petar16"
      ]);
      $listPetarF = implode('/', $listPetar);

      $lisEpp = self::validateList($request, [
         "epp1",
         "epp2",
         "epp3",
         "epp4",
         "epp5",
         "epp6",
         "epp7",
         "epp8",
         "epp9",
         "epp10",
         "epp11",
         "epp12",
         "epp13",
         "epp14",
         "epp15",
         "epp16",
         "epp17",
         "epp18"
      ]);
      $lisEppF = implode('/', $lisEpp);

      $lisHannCar = self::validateList($request, [
         "handCare1",
         "handCare2",
         "handCare3",
         "handCare4",
         "handCare5",
         "handCare6"
      ]);
      $lisHannCarF = implode('/', $lisHannCar);

      $lisToolsEquip = self::validateList($request, [
         "toolsEquip1",
         "toolsEquip2",
         "toolsEquip3",
         "toolsEquip4"
      ]);
      $lisToolsEquipF = implode('/', $lisToolsEquip);

      $lisCleanLiness = self::validateList($request, [
         "cleanliness1",
         "cleanliness2",
         "cleanliness3",
         "cleanliness4",
         "cleanliness5"
      ]);
      $lisCleanLinessF = implode('/', $lisCleanLiness);

      $lisAndamios = self::validateList($request, [
         "andamios1",
         "andamios2",
         "andamios3",
         "andamios4",
         "andamios5",
         "andamios6",
         "andamios7"
      ]);
      $lisAndamiosF = implode('/', $lisAndamios);

      $lisIzajes = self::validateList($request, [
         "izajes1",
         "izajes2",
         "izajes3",
         "izajes4",
         "izajes5"
      ]);
      $lisIzajesF = implode('/', $lisIzajes);

      $lisSustancias = self::validateList($request, [
         "sustancias1",
         "sustancias2",
         "sustancias3",
         "sustancias4",
         "sustancias5",
         "sustancias6"
      ]);
      $lisSustanciasF = implode('/', $lisSustancias);

      $lisEscaleras = self::validateList($request, [
         "escalera1",
         "escalera2",
         "escalera3",
         "escalera4",
         "escalera5",
         "escalera6"
      ]);
      $lisEscalerasF = implode('/', $lisEscaleras);

      $lisManejo = self::validateList($request, [
         "manejo1",
         "manejo2",
         "manejo3",
         "manejo4",
         "manejo5",
         "manejo6",
         "manejo7"
      ]);
      $lisManejoF = implode('/', $lisManejo);

      $tabla = "iperc";
      $datos = array(
         "id" => $request["idIperc"],
         "activity_name" => $request["activityName"],
         "task" => $request["task"],
         "work_order" => $request["workOrder"],
         "responsable_supervisor" => $request["responsableSupervisor"],
         "supervisor_signature" => $doc1,
         "responsable_encargado" => $request["responsableEncargado"],
         "encargado_signature" => $doc2,
         "date" => $request["date"],
         "area" => $request["area"],
         "clasificacion" => $request["clasificacion"],
         "pets" => $request["pets"],
         "petar" => $request["petar"],
         "iperc" => $request["iperc"],
         "location" => $request["location"],
         "start_time" => $request["startTime"],
         "end_time" => $request["endTime"],
         "tools" => $request["tools"],
         "chemicals" => $request["chemicals"],
         "task_description" => $request["taskDescription"],
         "risk" => $request["risk"],
         "probability" => $request["probability"],
         "severity" => $request["severity"],
         "exposure" => $request["exposure"],
         "initial_risk" => $request["initialRisk"],
         "control_measures" => $request["controlMeasures"],
         "residual_risk" => $request["residualRisk"],

         "worker_name1" => $request["workerName1"],
         "worker_cargo1" => $request["workerCargo1"],
         "worker_area1" => $request["workerArea1"],
         "worker_signature1" => $doc3,

         "worker_name2" => $request["workerName2"],
         "worker_cargo2" => $request["workerCargo2"],
         "worker_area2" => $request["workerArea2"],
         "worker_signature2" => $doc5,

         "worker_name3" => $request["workerName3"],
         "worker_cargo3" => $request["workerCargo3"],
         "worker_area3" => $request["workerArea3"],
         "worker_signature3" => $doc6,

         "worker_name4" => $request["workerName4"],
         "worker_cargo4" => $request["workerCargo4"],
         "worker_area4" => $request["workerArea4"],
         "worker_signature4" => $doc7,

         "worker_name5" => $request["workerName5"],
         "worker_cargo5" => $request["workerCargo5"],
         "worker_area5" => $request["workerArea5"],
         "worker_signature5" => $doc8,

         "supervisor_time1" => $request["supervisorTime1"],
         "supervisor_name1" => $request["supervisorName1"],
         "corrective_measure1" => $request["correctiveMeasure1"],
         "supervisor_signature1" => $doc4,
         "list_hands" => $listHandsF,
         "list_work_area" => $listWorkAreaF,
         "list_petar" => $listPetarF,
         "list_epp" => $lisEppF,
         "list_hann_car" => $lisHannCarF,
         "list_tools_equip" => $lisToolsEquipF,
         "list_clean_liness" => $lisCleanLinessF,
         "list_andamios" => $lisAndamiosF,
         "list_izajes" => $lisIzajesF,
         "list_sustancias" => $lisSustanciasF,
         "list_escaleras" => $lisEscalerasF,
         "list_manejo" => $lisManejoF
      );
      $respuesta = ModeloIperc::mdlActualizarIperc($tabla, $datos);
      if ($respuesta == "ok") {
         echo '<script>
                     swal({
                        type: "success",
                        title: "Matriz de IPERC ha sido actualizada correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                     }).then((result) => {
                        if (result.value) {
                           window.location = "iperc";
                        }
                     })
                  </script>';
      }
   }
   public static function ctrMostrar($tabla)
   {
      $respuesta = ModeloIperc::mdlMostrarIperc($tabla, null, null);
      return $respuesta;
   }
   /*=============================================
   VALIDAR INPUTS TIPO TEXT, DATE, NUMBER
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
   public static function validateList($request, $input)
   {
      $listNotEmpty = [];

      foreach ($request as $key => $value) {
         if (in_array($key, $input) && isset($value)) {
            $listNotEmpty[] = $key;
         }
      }

      return $listNotEmpty;
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
   private function guardarImagen($resquest, $fileds)
   {
      foreach ($fileds as $key) {
         $ruta = $_SERVER['DOCUMENT_ROOT'] . "/vistas/img/iperc/";

         $extension = pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);

         $aleatorio = date('YmdHis').uniqid();


         $nombre = $aleatorio . '.' . $extension;

         $nombreDb = "vistas/img/iperc/" . $nombre;


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
