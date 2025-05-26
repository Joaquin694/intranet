<?php
require_once "conexion.php";

class ModeloGastosConductor{
   public static function mdlIngresarGastosConductor($tabla, $datos){

      $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fecha_gasto, lugar_partida, lugar_destino, tipo_moneda, monto_gasto, comentarios_gasto, foto1, foto2, foto3, foto4) VALUE(:fecha_gasto, :lugar_partida, :lugar_destino, :tipo_moneda, :monto_gasto, :comentarios_gasto, :foto1, :foto2, :foto3, :foto4)");

      $stmt ->bindParam(":fecha_gasto", $datos["fecha_gasto"], PDO::PARAM_STR);
      $stmt ->bindParam(":lugar_partida", $datos["lugar_partida"], PDO::PARAM_STR);
      $stmt ->bindParam(":lugar_destino", $datos["lugar_destino"], PDO::PARAM_STR);
      $stmt ->bindParam(":tipo_moneda", $datos["tipo_moneda"], PDO::PARAM_STR);
      $stmt ->bindParam(":monto_gasto", $datos["monto_gasto"], PDO::PARAM_STR);
      $stmt ->bindParam(":comentarios_gasto", $datos["comentarios_gasto"], PDO::PARAM_STR);
      $stmt ->bindParam(":foto1", $datos["foto1"], PDO::PARAM_STR);
      $stmt ->bindParam(":foto2", $datos["foto2"], PDO::PARAM_STR);
      $stmt ->bindParam(":foto3", $datos["foto3"], PDO::PARAM_STR);
      $stmt ->bindParam(":foto4", $datos["foto4"], PDO::PARAM_STR);
      
      if ($stmt->execute()) {
         return "ok";
      } else {
         $error = $stmt->errorInfo();
         $error_code = $stmt->errorCode();
         $error_msg = "Error al ejecutar la consulta. ErrorInfo: " . print_r($error, true) . "ErrorCode: " . $error_code;

         file_put_contents("debug_ARCHIVOTE.txt", $error_msg . PHP_EOL, FILE_APPEND);

         $query_string = self::recreateQueryString($stmt, $datos);
         file_put_contents("debug_ARCHIVOTE.txt", "Consulta SQL fallida: " . $query_string . PHP_EOL, FILE_APPEND);

         return "error";
      }
      $stmt->close();
      $stmt = null;
   }

   /*=============================================
   MOSTRAR GASTOS CONDUCTOR
   =============================================*/
   public static function mdlMostrarGastosConductor($tabla, $item, $valor){
      if($item != null){
         $valor2 =1;
         $stmt = Conexion::conectar()->prepare("SELECT * FROM gastos_conductor WHERE $item = :id");
         $stmt->bindParam(":id", $valor, PDO::PARAM_INT);

         $stmt->execute();
         return $stmt->fetch();
      }else{
         $stmt = Conexion::conectar()->prepare("SELECT * FROM gastos_conductor");

         $stmt->execute();

         $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
         
         return $results;
      }
   }

   /*=============================================
   ACTUALIZAR GASTOS CONDUCTOR
   =============================================*/
   public static function mdlActualizarGastosConductor($tabla, $datos){

      $stmt = Conexion::conectar()->prepare("UPDATE gastos_conductor SET fecha_gasto = :fecha_gasto, lugar_partida = :lugar_partida, lugar_destino = :lugar_destino,
      tipo_moneda = :tipo_moneda, monto_gasto = :monto_gasto, comentarios_gasto = :comentarios_gasto, foto1 = :foto1, foto2 = :foto2, foto3 = :foto3, foto4 = :foto4 WHERE id = :id");
   
      $stmt ->bindParam(":fecha_gasto", $datos["fecha_gasto"], PDO::PARAM_STR);
      $stmt ->bindParam(":lugar_partida", $datos["lugar_partida"], PDO::PARAM_STR);
      $stmt ->bindParam(":lugar_destino", $datos["lugar_destino"], PDO::PARAM_STR);
      $stmt ->bindParam(":tipo_moneda", $datos["tipo_moneda"], PDO::PARAM_STR);
      $stmt ->bindParam(":monto_gasto", $datos["monto_gasto"], PDO::PARAM_STR);
      $stmt ->bindParam(":comentarios_gasto", $datos["comentarios_gasto"], PDO::PARAM_STR);
      $stmt ->bindParam(":foto1", $datos["foto1"], PDO::PARAM_STR);
      $stmt ->bindParam(":foto2", $datos["foto2"], PDO::PARAM_STR);
      $stmt ->bindParam(":foto3", $datos["foto3"], PDO::PARAM_STR);
      $stmt ->bindParam(":foto4", $datos["foto4"], PDO::PARAM_STR);
      $stmt ->bindParam(":id", $datos["id"], PDO::PARAM_INT);

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
   ELIMINAR GASTOS CONDUCTOR
   =============================================*/
   public static function mdlEliminarGastosConductos($tabla, $item, $valor){

      $stmt = Conexion::conectar()->prepare("DELETE FROM gastos_conductor WHERE id = :id");
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
switch($_POST["ajaxservice"]){
   case 'loadData':
      $respuesta = ModeloGastosConductor::mdlMostrarGastosConductor("gastos_conductor", null, null);
      echo json_encode($respuesta);
      break;
   case 'loadEdit':
      $respuesta = ModeloGastosConductor::mdlMostrarGastosConductor("gastos_conductor", "id", $_POST["idaa"]);
      echo json_encode($respuesta);
      break;
   case 'eliminar':
      $respuesta = ModeloGastosConductor::mdlEliminarGastosConductos("gastos_conductor", "id", $_POST["idEliminar"]);
      echo json_encode($respuesta);
      break;
}