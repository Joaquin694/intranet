<?php
// activos-fijos.modelo.php - SOLO MODELO (SIN AJAX)
require_once "conexion.php";

class ModeloActivosFijos
{
    /*=============================================
    REGISTRAR ACTIVO FIJO
    =============================================*/
    public static function mdlIngresarActivoFijo($tabla, $datos)
    {
        $pdo = Conexion::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try {
            $stmt = $pdo->prepare("INSERT INTO $tabla(descripcion, categoria, ubicacion, tipo_moneda, valor_compra, 
            fecha_adquisicion, vida_util, tasa_depreciacion, valor_residual, estado, usuario, proveedor, codigo_interno, 
            fecha_inicio_uso, metodo_depreciacion, garantia_marca, garantia_proveedor, estado_operativo, marca, observaciones, 
            documentos_propiedad, foto_activo, serie_motor, chasis_serie, placa, valor_compra_p) 
            VALUES (:descripcion, :categoria, :ubicacion, :tipo_moneda, :valorCompra, :fecha_adquisicion, :vida_util, 
            :tasa_depreciacion, :valor_residual, :estado, :usuario, :proveedor, :codigo_interno, :fecha_inicio_uso, 
            :metodo_depreciacion, :garantia_marca, :garantia_proveedor, :estado_operativo, :marca, :observaciones, 
            :documentos_propiedad, :foto_activo, :serie_motor, :chasis_serie, :placa, :valor_compra_p)");

            $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
            $stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
            $stmt->bindParam(":ubicacion", $datos["ubicacion"], PDO::PARAM_STR);
            $stmt->bindParam(":tipo_moneda", $datos["tipo_moneda"], PDO::PARAM_STR);
            $stmt->bindParam(":valorCompra", $datos["valorCompra"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_adquisicion", $datos["fecha_adquisicion"], PDO::PARAM_STR);
            $stmt->bindParam(":vida_util", $datos["vida_util"], PDO::PARAM_INT);
            $stmt->bindParam(":tasa_depreciacion", $datos["tasa_depreciacion"], PDO::PARAM_STR);
            $stmt->bindParam(":valor_residual", $datos["valor_residual"], PDO::PARAM_STR);
            $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
            $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
            $stmt->bindParam(":proveedor", $datos["proveedor"], PDO::PARAM_STR);
            $stmt->bindParam(":codigo_interno", $datos["codigo_interno"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_inicio_uso", $datos["fecha_inicio_uso"], PDO::PARAM_STR);
            $stmt->bindParam(":metodo_depreciacion", $datos["metodo_depreciacion"], PDO::PARAM_STR);
            $stmt->bindParam(":garantia_marca", $datos["garantia_marca"], PDO::PARAM_INT);
            $stmt->bindParam(":garantia_proveedor", $datos["garantia_proveedor"], PDO::PARAM_INT);
            $stmt->bindParam(":estado_operativo", $datos["estado_operativo"], PDO::PARAM_STR);
            $stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
            $stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
            $stmt->bindParam(":documentos_propiedad", $datos["documentos_propiedad"], PDO::PARAM_STR);
            $stmt->bindParam(":foto_activo", $datos["foto_activo"], PDO::PARAM_STR);
            $stmt->bindParam(":serie_motor", $datos["serie_motor"], PDO::PARAM_STR);
            $stmt->bindParam(":chasis_serie", $datos["chasis_serie"], PDO::PARAM_STR);
            $stmt->bindParam(":placa", $datos["placa"], PDO::PARAM_STR);
            $stmt->bindParam(":valor_compra_p", $datos["valor_compra_p"], PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            error_log("Error al insertar activo fijo: " . $e->getMessage());
            return "Error en base de datos: " . $e->getMessage();
        } finally {
            $stmt = null;
            $pdo = null;
        }
    }

    /*=============================================
    REGISTRAR EVENTO/MOVIMIENTO
    =============================================*/
    public static function mdlIngresarRegistro($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(activo_fk, eventualidad, fecha_eventualidad, monto_gasto, monto_reevaluado,
            evidencia, userRegistraeventualidad, moneda, tipoCambio) VALUES(:activo_fk, :eventualidad, :fecha_eventualidad, :monto_gasto, :monto_reevaluado,
            :evidencia, :userRegistraeventualidad, :moneda, :tipoCambio)");

            $stmt->bindParam(":activo_fk", $datos["activo_fk"], PDO::PARAM_INT);
            $stmt->bindParam(":eventualidad", $datos["eventualidad"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_eventualidad", $datos["fecha_eventualidad"], PDO::PARAM_STR);
            $stmt->bindParam(":monto_gasto", $datos["monto_gasto"], PDO::PARAM_STR);
            $stmt->bindParam(":monto_reevaluado", $datos["monto_reevaluado"], PDO::PARAM_STR);
            $stmt->bindParam(":evidencia", $datos["evidencia"], PDO::PARAM_STR);
            $stmt->bindParam(":userRegistraeventualidad", $datos["userRegistraeventualidad"], PDO::PARAM_STR);
            $stmt->bindParam(":moneda", $datos["moneda"], PDO::PARAM_STR);
            $stmt->bindParam(":tipoCambio", $datos["tipoCambio"], PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            error_log("Error al insertar registro: " . $e->getMessage());
            return "Error: " . $e->getMessage();
        } finally {
            $stmt = null;
        }
    }

    /*=============================================
    MOSTRAR ACTIVOS FIJOS
    =============================================*/
    public static function mdlMostrarActivosFijos($tabla, $item, $valor)
    {
        try {
            if ($item != null) {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :id");
                $stmt->bindParam(":id", $valor, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            error_log("Error al mostrar activos fijos: " . $e->getMessage());
            return "Error: " . $e->getMessage();
        } finally {
            $stmt = null;
        }
    }

    /*=============================================
    MOSTRAR REGISTROS
    =============================================*/
    public static function mdlMostrarRegistro($tabla, $item, $valor)
    {
        try {
            if ($item != null) {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :id");
                $stmt->bindParam(":id", $valor, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            error_log("Error al mostrar registros: " . $e->getMessage());
            return "Error: " . $e->getMessage();
        } finally {
            $stmt = null;
        }
    }

    /*=============================================
    ACTUALIZAR ACTIVO FIJO
    =============================================*/
    public static function mdlActualizarActivosFijos($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET descripcion = :descripcion, categoria = :categoria, ubicacion = :ubicacion, tipo_moneda =:tipo_moneda, valor_compra = :valorCompra,
            fecha_adquisicion = :fecha_adquisicion, vida_util = :vida_util, tasa_depreciacion = :tasa_depreciacion, valor_residual = :valor_residual, estado = :estado, 
            usuario = :usuario, proveedor = :proveedor, codigo_interno = :codigo_interno, fecha_inicio_uso = :fecha_inicio_uso, metodo_depreciacion = :metodo_depreciacion,
            garantia_marca = :garantia_marca, garantia_proveedor = :garantia_proveedor, estado_operativo = :estado_operativo, marca = :marca, observaciones = :observaciones, documentos_propiedad = :documentos_propiedad, 
            foto_activo = :foto_activo, serie_motor = :serie_motor, chasis_serie = :chasis_serie, placa = :placa, valor_compra_p = :valor_compra_p WHERE id = :id");

            $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
            $stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
            $stmt->bindParam(":ubicacion", $datos["ubicacion"], PDO::PARAM_STR);
            $stmt->bindParam(":tipo_moneda", $datos["tipo_moneda"], PDO::PARAM_STR);
            $stmt->bindParam(":valorCompra", $datos["valorCompra"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_adquisicion", $datos["fecha_adquisicion"], PDO::PARAM_STR);
            $stmt->bindParam(":vida_util", $datos["vida_util"], PDO::PARAM_INT);
            $stmt->bindParam(":tasa_depreciacion", $datos["tasa_depreciacion"], PDO::PARAM_STR);
            $stmt->bindParam(":valor_residual", $datos["valor_residual"], PDO::PARAM_STR);
            $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
            $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
            $stmt->bindParam(":proveedor", $datos["proveedor"], PDO::PARAM_STR);
            $stmt->bindParam(":codigo_interno", $datos["codigo_interno"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_inicio_uso", $datos["fecha_inicio_uso"], PDO::PARAM_STR);
            $stmt->bindParam(":metodo_depreciacion", $datos["metodo_depreciacion"], PDO::PARAM_STR);
            $stmt->bindParam(":garantia_marca", $datos["garantia_marca"], PDO::PARAM_INT);
            $stmt->bindParam(":garantia_proveedor", $datos["garantia_proveedor"], PDO::PARAM_INT);
            $stmt->bindParam(":estado_operativo", $datos["estado_operativo"], PDO::PARAM_STR);
            $stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
            $stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
            $stmt->bindParam(":documentos_propiedad", $datos["documentos_propiedad"], PDO::PARAM_STR);
            $stmt->bindParam(":foto_activo", $datos["foto_activo"], PDO::PARAM_STR);
            $stmt->bindParam(":serie_motor", $datos["serie_motor"], PDO::PARAM_STR);
            $stmt->bindParam(":chasis_serie", $datos["chasis_serie"], PDO::PARAM_STR);
            $stmt->bindParam(":placa", $datos["placa"], PDO::PARAM_STR);
            $stmt->bindParam(":valor_compra_p", $datos["valor_compra_p"], PDO::PARAM_STR);
            $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            } else {
                $errorInfo = $stmt->errorInfo();
                return "Error al ejecutar la consulta: " . $errorInfo[2];
            }
        } catch (PDOException $e) {
            error_log("Error al actualizar activo fijo: " . $e->getMessage());
            return "Error: " . $e->getMessage();
        } finally {
            $stmt = null;
        }
    }

    /*=============================================
    ELIMINAR ACTIVO FIJO
    =============================================*/
    public static function mdlEliminarActivoFijo($tabla, $item, $valor)
    {
        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $item = :id");
            $stmt->bindParam(":id", $valor, PDO::PARAM_INT);
            
            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            error_log("Error al eliminar activo fijo: " . $e->getMessage());
            return "Error: " . $e->getMessage();
        } finally {
            $stmt = null;
        }
    }
}
?>