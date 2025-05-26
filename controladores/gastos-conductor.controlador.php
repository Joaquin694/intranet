<?php
class ControladorGastosConductor{

   /*=============================================
    CREAR GASTOS CONDUCTOR
    =============================================*/
   public function ctrCrearGastosConductor($request){

      if($this->validate($request, ["fechaGasto", "lugarPartida", "lugarDestino", "tipoMoneda", "montoGasto"])){

         $list = $this->validateFileData($request, ["foto1", "foto2", "foto3", "foto4"]);
         $doc1 = "";
         $doc2 = "";
         $doc3 = "";
         $doc4 = "";
         foreach ($list as $key => $value){
            switch($value){
               case 'foto1':
                  $doc1 = $this->guardarDoc($request, ['foto1']);
                  break;
               case 'foto2':
                  $doc2 = $this->guardarDoc($request, ['foto2']);
                  break;
               case 'foto3':
                  $doc3 = $this->guardarDoc($request, ['foto3']);
                  break;
               case 'foto4':
                  $doc4 = $this->guardarDoc($request, ['foto4']);
                  break;
            }
         }

         $tabla = "gastos_conductor";
         $datos = array(
            "fecha_gasto" => $request["fechaGasto"],
            "lugar_partida" => $request["lugarPartida"],
            "lugar_destino" => $request["lugarDestino"],
            "tipo_moneda" => $request["tipoMoneda"],
            "monto_gasto" => $request["montoGasto"],
            "comentarios_gasto" => $request["comentariosGasto"],
            "foto1" => $doc1,
            "foto2" => $doc2,
            "foto3" => $doc3,
            "foto4" => $doc4
         );
         $respuesta = ModeloGastosConductor::mdlIngresarGastosConductor($tabla, $datos);
         if($respuesta == "ok"){
            echo '<script>
                     swal({
                        type: "success",
                        title: "Gastos de conductor ha sido registrado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                     }).then((result) => {
                        if (result.value) {
                           window.location = "gastos-conductor";
                        }
                     })
                  </script>';
         }
         else{
            echo "no se cargo";
         }
      }
   }

   public function ctrActualizarGastosConductor($request){

      $list = $this->validateFileData($request, ["editarfoto1", "editarfoto2", "editarfoto3", "editarfoto4"]);
         $doc1 = $request['editarFoto1Db'];
         $doc2 = $request['editarFoto2Db'];
         $doc3 = $request['editarFoto3Db'];
         $doc4 = $request['editarFoto4Db'];

         foreach ($list as $key => $value){
            switch($value){
               case 'editarfoto1':
         $doc1 = $request['editarFoto1Db'];
                  $this->eliminarDoc($request, $doc1);
                  $doc1 = $this->guardarDoc($request, ['editarfoto1']);
                  break;
               case 'editarfoto2':
                  $this->eliminarDoc($request, $doc2);
                  $doc2 = $this->guardarDoc($request, ['editarfoto2']);
                  break;
               case 'editarfoto3':
                  $this->eliminarDoc($request, $doc3);
                  $doc3 = $this->guardarDoc($request, ['editarfoto3']);
                  break;
               case 'editarfoto4':
                  $this->eliminarDoc($request, $doc4);
                  $doc4 = $this->guardarDoc($request, ['editarfoto4']);
                  break;
            }
         }

         $tabla = "gastos_conductor";
         $datos = array(
            "id"=>$request["idGastosConductorEditar"],

            "fecha_gasto" => $request["editarFechaGasto"],
            "lugar_partida" => $request["editarLugarPartida"],
            "lugar_destino" => $request["editarLugarDestino"],
            "tipo_moneda" => $request["editarTipoMoneda"],
            "monto_gasto" => $request["editarMontoGasto"],
            "comentarios_gasto" => $request["editarComentariosGasto"],
            "foto1" => $doc1,
            "foto2" => $doc2,
            "foto3" => $doc3,
            "foto4" => $doc4
         );

         $respuesta = ModeloGastosConductor::mdlActualizarGastosConductor($tabla, $datos);
         if($respuesta == "ok"){
            echo '<script>
            
            swal({
               type: "success",
               title: "Gastos de conductor ha sido editado correctamente",
               showConfirmButton: true,
               confirmButtonText: "Cerrar",
               closeOnConfirm: false
               }).then((result) => {
               if (result.value) {
                           window.location = "gastos-conductor";
                        }
                     })
                  </script>';
         }
         else{
            echo "no se cargo";
         }
   }

   /*=============================================
   GUARDAMOS LA DOC EN EL DIRECTORIO
   =============================================*/
   private function guardarDoc($request, $fileds){
      foreach($fileds as $key){
         $ruta = $_SERVER['DOCUMENT_ROOT']. "/vistas/img/gastos-conductor/";

         $extension = pathinfo($_FILES[$key]['name'],PATHINFO_EXTENSION);
   
         $aleatorio = mt_rand(100, 999).date('YmdHis');
   
         $nombre = $aleatorio. '.'. $extension;
   
         $nombreDb = "vistas/img/gastos-conductor/". $nombre;
         
         $ruta_carga = $ruta. $nombre;
   
         if(!file_exists($ruta)){
   
               mkdir($ruta, 0777);
            }  
            if (move_uploaded_file($_FILES[$key]['tmp_name'], $ruta_carga)) {
   
               
            }
            return $nombreDb;

      }
   }

   /*=============================================
   VALIDAR INPUTS TIPO TEXT, DATE, NUMBER
   =============================================*/
   public function validate($resquest, $input){
      $validation = true;
      foreach ($input as $key) {
         if(!isset($resquest[$key]) || empty($resquest[$key])){
            $validation = false;
            break;
         }
      }
      return $validation;
   }
   /*=============================================
   LISTA DE DATOS CON CAMPOS
   =============================================*/
   public function validateFileData($resquest, $fileds){
      $listNotEmpty= [];
      foreach($fileds as $key){
         if(isset($_FILES[$key]) && $_FILES[$key]['error'] === 0){
            $listNotEmpty[]= $key;
         }
      }
      return $listNotEmpty;
   }

   public static function eliminarDoc($requests, $fileds){
      $rutaExterna = $_SERVER['DOCUMENT_ROOT']."/";
      $rutaCompleta = $rutaExterna . $fileds;
      if(file_exists($rutaCompleta)){
         if(unlink($rutaCompleta)){
            return true;
         }else{
            return false;
         }
      }else{
         return false;
      }
      return false;
   }
}