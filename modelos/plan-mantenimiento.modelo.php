<?php
require_once "conexion.php";
class ModeloPlanMantenimiento
{

   /*=============================================
    REGISTRAR PLAN MANTENIMIENTO
    =============================================*/

   public static function mdlIngresarPlanMantenimiento($tabla, $datos)
   {

      $pdo = Conexion::conectar();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt = $pdo->prepare("INSERT INTO $tabla(activos_fijos, fecha_inicio, tipo_programacion, responsable_mantenimiento, ubicacion_activo,
       numero_serie, prioridad_mantenimiento, duracion_estimada, costo_repuestos, empresa_mantenimiento, observaciones, documento, intervalo_horas ,intervalo_kilometraje, inter_ini, tipo_moneda, valor_cambio) VALUES (:activos_fijos, 
       :fecha_inicio, :tipo_programacion, :responsable_mantenimiento, :ubicacion_activo, :numero_serie, :prioridad_mantenimiento, :duracion_estimada, 
       :costo_repuestos, :empresa_mantenimiento, :observaciones, :documento, :intervalo_horas, :intervalo_kilometraje, :inter_ini, :tipo_moneda, :valor_cambio)");

      $stmt->bindParam(":activos_fijos", $datos["activos_fijos"], PDO::PARAM_STR);

      $stmt->bindParam(":fecha_inicio", $datos["fecha_inicio"], PDO::PARAM_STR);
      $stmt->bindParam(":tipo_programacion", $datos["tipo_programacion"], PDO::PARAM_STR);
      $stmt->bindParam(":responsable_mantenimiento", $datos["responsable_mantenimiento"], PDO::PARAM_STR);
      $stmt->bindParam(":ubicacion_activo", $datos["ubicacion_activo"], PDO::PARAM_STR);
      $stmt->bindParam(":numero_serie", $datos["numero_serie"], PDO::PARAM_STR);
      $stmt->bindParam(":prioridad_mantenimiento", $datos["prioridad_mantenimiento"], PDO::PARAM_STR);
      $stmt->bindParam(":duracion_estimada", $datos["duracion_estimada"], PDO::PARAM_STR);
      $stmt->bindParam(":costo_repuestos", $datos["costo_repuestos"], PDO::PARAM_STR);
      $stmt->bindParam(":empresa_mantenimiento", $datos["empresa_mantenimiento"], PDO::PARAM_STR);
      $stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
      $stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
      $stmt->bindParam(":intervalo_horas", $datos["intervalo_horas"], PDO::PARAM_INT);
      $stmt->bindParam(":intervalo_kilometraje", $datos["intervalo_kilometraje"], PDO::PARAM_INT);
      $stmt->bindParam(":inter_ini", $datos["inter_ini"], PDO::PARAM_STR);
      $stmt->bindParam(":tipo_moneda", $datos["tipo_moneda"], PDO::PARAM_STR);
      $stmt->bindParam(":valor_cambio", $datos['valor_cambio'], PDO::PARAM_STR);

      try {
         if ($stmt->execute()) {
            // Obtener el ID de la última inserción
            $lastInsertId = $pdo->lastInsertId();
            return ['status' => 'ok', 'lastInsertId' => $lastInsertId];
         } else {
            return ['status' => 'error', 'message' => 'Error al insertar en la base de datos'];
         }
      } catch (PDOException $e) {
         return "Syntax Error: " . $e->getMessage();
      }

      $stmt->closeCursor();
      $stmt = null;
   }
   public static function mdlCrearCronologia($tabla, $value, $key, $lastInsertId, $state, $datos)
   {

      $pdo = Conexion::conectar();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt = $pdo->prepare("INSERT INTO $tabla (cabecera, id_plan, maintenance_docs, evidence_fotos, observations, tipo_mon, cost, duration, user_register,id_row , proveedor, parts_used, residual_parts, state_r) 
            VALUES (:cabecera, :id_plan, :maintenance_docs, :evidence_fotos, :observations, :tipo_mon, :cost, :duration, :user_register, :id_row, :proveedor, :parts_used, :residual_parts, :state_r)");

      $stmt->bindParam(":cabecera", $value, PDO::PARAM_STR);
      $stmt->bindParam(":id_plan", $lastInsertId, PDO::PARAM_INT);
      $stmt->bindParam(":id_row", $key, PDO::PARAM_INT);
      $stmt->bindParam(":state_r", $state, PDO::PARAM_STR);

      $stmt->bindParam(":maintenance_docs", $datos["maintenance_docs"], PDO::PARAM_STR);
      $stmt->bindParam(":evidence_fotos", $datos["evidence_fotos"], PDO::PARAM_STR);
      $stmt->bindParam(":observations", $datos["observations"], PDO::PARAM_STR);
      $stmt->bindParam(":tipo_mon", $datos["tipo_mon"], PDO::PARAM_STR);
      $stmt->bindParam(":cost", $datos["cost"], PDO::PARAM_STR);
      $stmt->bindParam(":duration", $datos["duration"], PDO::PARAM_STR);
      $stmt->bindParam(":user_register", $datos["user_register"], PDO::PARAM_STR);
      $stmt->bindParam(":proveedor", $datos["proveedor"], PDO::PARAM_STR);
      $stmt->bindParam(":parts_used", $datos["parts_used"], PDO::PARAM_STR);
      $stmt->bindParam(":residual_parts", $datos["residual_parts"], PDO::PARAM_STR);

      try {
         if ($stmt->execute()) {
            return "ok";
         } else {
            return "error";
         }
      } catch (PDOException $e) {
         return "Syntax Error: " . $e->getMessage();
      }

      $stmt->close();
      $stmt = null;
   }
   public static function mdlActualizarInfoMantenimiento($tabla, $datos)
   {
      $pdo = Conexion::conectar();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt = $pdo->prepare("UPDATE $tabla SET
        cabecera = :cabecera,
        maintenance_docs = :maintenance_docs,
        evidence_fotos = :evidence_fotos,
        observations = :observations,
        tipo_mon = :tipo_mon,
        cost = :cost,
        duration = :duration,
        user_register = :user_register,
        proveedor = :proveedor,
        parts_used = :parts_used,
        residual_parts = :residual_parts,
        state_r = :state_r
        WHERE id_plan = :id_plan AND id_row = :id_row");

      $stmt->bindParam(":cabecera", $datos["cabecera"], PDO::PARAM_STR);
      $stmt->bindParam(":id_plan", $datos["id_plan"], PDO::PARAM_INT);
      $stmt->bindParam(":maintenance_docs", $datos["maintenance_docs"], PDO::PARAM_STR);
      $stmt->bindParam(":evidence_fotos", $datos["evidence_fotos"], PDO::PARAM_STR);
      $stmt->bindParam(":observations", $datos["observations"], PDO::PARAM_STR);
      $stmt->bindParam(":tipo_mon", $datos["tipo_mon"], PDO::PARAM_STR);
      $stmt->bindParam(":cost", $datos["cost"], PDO::PARAM_STR);
      $stmt->bindParam(":duration", $datos["duration"], PDO::PARAM_STR);
      $stmt->bindParam(":user_register", $datos["user_register"], PDO::PARAM_STR);
      $stmt->bindParam(":id_row", $datos["id_row"], PDO::PARAM_INT);
      $stmt->bindParam(":proveedor", $datos["proveedor"], PDO::PARAM_STR);
      $stmt->bindParam(":parts_used", $datos["parts_used"], PDO::PARAM_STR);
      $stmt->bindParam(":residual_parts", $datos["residual_parts"], PDO::PARAM_STR);
      $stmt->bindParam(":state_r", $datos["state_r"], PDO::PARAM_STR);

      try {
         if ($stmt->execute()) {
            return "ok";
         } else {
            return "error";
         }
      } catch (PDOException $e) {
         return "Syntax Error: " . $e->getMessage();
      }

      $stmt->close();
      $stmt = null;
   }
   /*=============================================
   MOSTRAR PLAN MANTENIMIENTO
   =============================================*/
   public static function mdlMostrarPlanMantenimiento($tabla, $item, $valor)
   {
      try {
         if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :id");
            $stmt->bindParam(":id", $valor, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
         } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
         }
      } catch (Exception $e) {
         return ['success' => false, 'error' => $e->getMessage()];
      }
   }
   public static function mdlMostrarColaboradores($tabla, $item, $valor)
   {

      if ($item != null) {
         $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :id");
         $stmt->bindParam(":id", $valor, PDO::PARAM_STR);
         $stmt->execute();
         return $stmt->fetchAll(PDO::FETCH_ASSOC);
      } else {
         $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
         $stmt->execute();
         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
         return $result;
      }
   }
   public static function mdlMostrarInfoPlan($tabla, $item, $valor)
   {
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :id");
      $stmt->bindParam(":id", $valor, PDO::PARAM_INT);
      $stmt->execute();

      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
   }
   public static function mdlCerrarMantenimiento($tabla, $datos)
   {
      $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
         state_r = :state_r
         WHERE id_plan = :id_plan AND id_row = :id_row");
      $stmt->bindParam(":state_r", $datos["state_r"], PDO::PARAM_STR);
      $stmt->bindParam(":id_plan", $datos["id_plan"], PDO::PARAM_INT);
      $stmt->bindParam(":id_row", $datos["id_row"], PDO::PARAM_INT);
      if ($stmt->execute()) {
         return "ok";
      } else {
         return "error";
      }
      $stmt->close();
      $stmt = null;
   }

   /*=============================================
   ACTUALIZAR PLAN MANTENIMIENTO
   =============================================*/
   public static function mdlActualizarPlanMantenimiento($tabla, $datos)
   {

      $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET activos_fijos = :activos_fijos, fecha_inicio = :fecha_inicio, tipo_programacion = :tipo_programacion,
         responsable_mantenimiento = :responsable_mantenimiento, ubicacion_activo = :ubicacion_activo, numero_serie = :numero_serie, prioridad_mantenimiento = :prioridad_mantenimiento,
          duracion_estimada = :duracion_estimada, costo_repuestos = :costo_repuestos, empresa_mantenimiento = :empresa_mantenimiento, observaciones = :observaciones, 
          documento = :documento, intervalo_horas = :intervalo_horas, intervalo_kilometraje = :intervalo_kilometraje, inter_ini = :inter_ini, tipo_moneda = :tipo_moneda, valor_cambio = :valor_cambio WHERE id = :id");


      $stmt->bindParam(":activos_fijos", $datos["activos_fijos"], PDO::PARAM_STR);

      $stmt->bindParam(":fecha_inicio", $datos["fecha_inicio"], PDO::PARAM_STR);
      $stmt->bindParam(":tipo_programacion", $datos["tipo_programacion"], PDO::PARAM_STR);
      $stmt->bindParam(":responsable_mantenimiento", $datos["responsable_mantenimiento"], PDO::PARAM_STR);
      $stmt->bindParam(":ubicacion_activo", $datos["ubicacion_activo"], PDO::PARAM_STR);
      $stmt->bindParam(":numero_serie", $datos["numero_serie"], PDO::PARAM_STR);
      $stmt->bindParam(":prioridad_mantenimiento", $datos["prioridad_mantenimiento"], PDO::PARAM_STR);
      $stmt->bindParam(":duracion_estimada", $datos["duracion_estimada"], PDO::PARAM_STR);
      $stmt->bindParam(":costo_repuestos", $datos["costo_repuestos"], PDO::PARAM_STR);
      $stmt->bindParam(":empresa_mantenimiento", $datos["empresa_mantenimiento"], PDO::PARAM_STR);
      $stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
      $stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
      $stmt->bindParam(":intervalo_horas", $datos["intervalo_horas"], PDO::PARAM_INT);
      $stmt->bindParam(":intervalo_kilometraje", $datos["intervalo_kilometraje"], PDO::PARAM_INT);
      $stmt->bindParam(":inter_ini", $datos["inter_ini"], PDO::PARAM_STR);
      $stmt->bindParam(":tipo_moneda", $datos["tipo_moneda"], PDO::PARAM_STR);
      $stmt->bindParam(":valor_cambio", $datos['valor_cambio'], PDO::PARAM_STR);

      $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

      if ($stmt->execute()) {
         return "ok";
      } else {
         $errorInfo = $stmt->errorInfo();
         return "Error al ejecutar la consulta: " . $errorInfo[2];
      }
   }
   /*=============================================
   ELIMINAR PLAN MANTENIMIENTO
   =============================================*/

   public static function mdlEliminarPlanMantenimiento($tabla, $item, $valor)
   {
      $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $item = :id");
      $stmt->bindParam(":id", $valor, PDO::PARAM_INT);
      if ($stmt->execute()) {
         return "ok";
      } else {
         return "error";
      }
      $stmt->close();
      $stmt = null;
   }
}