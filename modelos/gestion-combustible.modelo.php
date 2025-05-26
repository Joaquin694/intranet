<?php 
require_once "conexion.php";
class ModeloGestionCombustible{
   
   /*=============================================
    REGISTRAR GESTION COMBUSTIBLE
    =============================================*/

   public static function mdlIngresarGestionCombustible($tabla, $datos){

         $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fecha_abastecimiento, hora_abastecimiento, estacion_servicio, litros_cargados, costo_litro, total_pagado, placa_vehiculo, tipo_combustible, ruc_probeedor, kilometros_recorridos, forma_pago, notas_adicionales, doc1, doc2, doc3, doc4) VALUES (:fecha_abastecimiento, :hora_abastecimiento, :estacion_servicio, :litros_cargados, :costo_litro, :total_pagado, :placa_vehiculo, :tipo_combustible, :ruc_probeedor, :kilometros_recorridos, :forma_pago, :notas_adicionales, :doc1, :doc2, :doc3, :doc4)");
         
         $stmt->bindParam(":fecha_abastecimiento", $datos["fecha_abastecimiento"], PDO::PARAM_STR);
         $stmt->bindParam(":hora_abastecimiento", $datos["hora_abastecimiento"], PDO::PARAM_STR);
         $stmt->bindParam(":estacion_servicio", $datos["estacion_servicio"], PDO::PARAM_STR); 
         $stmt->bindParam(":litros_cargados", $datos["litros_cargados"], PDO::PARAM_STR);
         $stmt->bindParam(":costo_litro", $datos["costo_litro"], PDO::PARAM_STR);
         $stmt->bindParam(":total_pagado", $datos["total_pagado"], PDO::PARAM_STR);
         $stmt->bindParam(":placa_vehiculo", $datos["placa_vehiculo"], PDO::PARAM_STR);
         $stmt->bindParam(":tipo_combustible", $datos["tipo_combustible"], PDO::PARAM_STR);
         $stmt->bindParam(":ruc_probeedor", $datos["ruc_probeedor"], PDO::PARAM_STR);
         $stmt->bindParam(":kilometros_recorridos", $datos["kilometros_recorridos"], PDO::PARAM_STR);
         $stmt->bindParam(":forma_pago", $datos["forma_pago"], PDO::PARAM_STR);
         $stmt->bindParam(":notas_adicionales", $datos["notas_adicionales"],  PDO::PARAM_STR);
         $stmt->bindParam(":doc1", $datos["doc1"],PDO::PARAM_STR);
         $stmt->bindParam(":doc2", $datos["doc2"],PDO::PARAM_STR);
         $stmt->bindParam(":doc3", $datos["doc3"],PDO::PARAM_STR);
         $stmt->bindParam(":doc4", $datos["doc4"],PDO::PARAM_STR);
   
         if($stmt->execute()){
            return "ok";
         }else{
            return "error";
         }
         $stmt->close();
         $stmt = null;
      
   }
   /*=============================================
   MOSTRAR GESTION COMBUSTIBLE
   =============================================*/
   public static function mdlMostrarGestionCombustible($tabla, $item, $valor){
      if($item != null){
         $valor2 = 1;
         $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :id");
         $stmt->bindParam(":id", $valor, PDO::PARAM_INT);

      $stmt ->execute();
      return $stmt->fetch();
      }else{
         $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
         $stmt->execute();
         $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
         return $result;
      }
   }

   /*=============================================
   ACTUALIZAR GESTION COMBUSTIBLE
   =============================================*/
   public static function mdlActualizarGestionCombustible($tabla, $datos){
      $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET fecha_abastecimiento = :fecha_abastecimiento, hora_abastecimiento = :hora_abastecimiento, estacion_servicio = :estacion_servicio, litros_cargados = :litros_cargados, costo_litro = :costo_litro, total_pagado = :total_pagado, placa_vehiculo = :placa_vehiculo, tipo_combustible = :tipo_combustible, ruc_probeedor = :ruc_probeedor, kilometros_recorridos = :kilometros_recorridos, forma_pago = :forma_pago, notas_adicionales = :notas_adicionales, doc1 = :doc1, doc2 = :doc2, doc3 = :doc3, doc4 = :doc4 WHERE id = :id");

      $stmt->bindParam(":fecha_abastecimiento", $datos["fecha_abastecimiento"], PDO::PARAM_STR);
      $stmt->bindParam(":hora_abastecimiento", $datos["hora_abastecimiento"], PDO::PARAM_STR);
      $stmt->bindParam(":estacion_servicio", $datos["estacion_servicio"], PDO::PARAM_STR); 
      $stmt->bindParam(":litros_cargados", $datos["litros_cargados"], PDO::PARAM_STR);
      $stmt->bindParam(":costo_litro", $datos["costo_litro"], PDO::PARAM_STR);
      $stmt->bindParam(":total_pagado", $datos["total_pagado"], PDO::PARAM_STR);
      $stmt->bindParam(":placa_vehiculo", $datos["placa_vehiculo"], PDO::PARAM_STR);
      $stmt->bindParam(":tipo_combustible", $datos["tipo_combustible"], PDO::PARAM_STR);
      $stmt->bindParam(":ruc_probeedor", $datos["ruc_probeedor"], PDO::PARAM_STR);
      $stmt->bindParam(":kilometros_recorridos", $datos["kilometros_recorridos"], PDO::PARAM_STR);
      $stmt->bindParam(":forma_pago", $datos["forma_pago"], PDO::PARAM_STR);
      $stmt->bindParam(":notas_adicionales", $datos["notas_adicionales"],  PDO::PARAM_STR);
      $stmt->bindParam(":doc1", $datos["doc1"],PDO::PARAM_STR);
      $stmt->bindParam(":doc2", $datos["doc2"],PDO::PARAM_STR);
      $stmt->bindParam(":doc3", $datos["doc3"],PDO::PARAM_STR);
      $stmt->bindParam(":doc4", $datos["doc4"],PDO::PARAM_STR);

      $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

      if ($stmt->execute()) {
         return "ok";
      } else {
      $errorInfo = $stmt->errorInfo();
      return "Error al ejecutar la consulta: " . $errorInfo[2];
      }
      $stmt->close();
      $stmt = null;
   }
   /*=============================================
   ELIMINAR GESTION COMBUSTIBLE
   =============================================*/

   public static function mdlEliminarGestionCombustible($tabla, $item, $valor){
      $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
      $stmt->bindParam(":id", $valor, PDO::PARAM_INT);
      if($stmt->execute()){
         return "ok";
      } else {
         return "error";
      }
      $stmt->close();
      $stmt = null;
   }
}
switch ($_POST["ajaxservice"]) {
   case 'loadData':
      $respuesta = ModeloGestionCombustible::mdlMostrarGestionCombustible("gestion_combustible", null, null);
      echo json_encode($respuesta);
      break;
   case 'loadEdit':
      $respuesta = ModeloGestionCombustible::mdlMostrarGestionCombustible("gestion_combustible", "id", $_POST["idaa"]);
      echo json_encode($respuesta);
      break;
   case 'eliminarGestionCombustible':
      $respuesta = ModeloGestionCombustible::mdlEliminarGestionCombustible("gestion_combustible","id", $_POST["idEliminar"]);
      echo json_encode($respuesta);
      break;
}
