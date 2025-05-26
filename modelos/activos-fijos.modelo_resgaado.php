
<?php
require_once "conexion.php";
class ModeloActivosFijos
{

   /*=============================================
    REGISTRAR ACTIVO FIJO
    =============================================*/

   public static function mdlIngresarActivoFijo($tabla, $datos)
   {

      $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(descripcion, categoria, ubicacion, valor_compra, 
      fecha_adquisicion, vida_util, tasa_depreciacion, valor_residual, estado, usuario, proveedor, codigo_interno, 
      fecha_inicio_uso, metodo_depreciacion, garantia, estado_operativo, observaciones, documentos_propiedad, foto_activo) 
      VALUES (:descripcion, :categoria, :ubicacion, :valorCompra, :fecha_adquisicion, :vida_util, :tasa_depreciacion, :valor_residual, 
      :estado, :usuario, :proveedor, :codigo_interno, :fecha_inicio_uso, :metodo_depreciacion, :garantia, :estado_operativo, 
      :observaciones, :documentos_propiedad, :foto_activo)");

      $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
      $stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
      $stmt->bindParam(":ubicacion", $datos["ubicacion"], PDO::PARAM_STR);
      $stmt->bindParam(":valorCompra", $datos["valorCompra"], PDO::PARAM_INT);
      $stmt->bindParam(":fecha_adquisicion", $datos["fecha_adquisicion"], PDO::PARAM_STR);
      $stmt->bindParam(":vida_util", $datos["vida_util"], PDO::PARAM_INT);
      $stmt->bindParam(":tasa_depreciacion", $datos["tasa_depreciacion"], PDO::PARAM_INT);
      $stmt->bindParam(":valor_residual", $datos["valor_residual"], PDO::PARAM_INT);
      $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

      $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

      $stmt->bindParam(":proveedor", $datos["proveedor"], PDO::PARAM_STR);
      $stmt->bindParam(":codigo_interno", $datos["codigo_interno"], PDO::PARAM_STR);
      $stmt->bindParam(":fecha_inicio_uso", $datos["fecha_inicio_uso"], PDO::PARAM_STR);
      $stmt->bindParam(":metodo_depreciacion", $datos["metodo_depreciacion"], PDO::PARAM_STR);
      $stmt->bindParam(":garantia", $datos["garantia"], PDO::PARAM_INT);
      $stmt->bindParam(":estado_operativo", $datos["estado_operativo"], PDO::PARAM_STR);
      $stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);

      $stmt->bindParam(":documentos_propiedad", $datos["documentos_propiedad"], PDO::PARAM_STR);
      $stmt->bindParam(":foto_activo", $datos["foto_activo"], PDO::PARAM_STR);


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
}

