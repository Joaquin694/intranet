<?php
require_once "conexion.php";


class ModeloHabilitaciones
{
    /*=============================================
    INGRESAR HABILITACIONES
    =============================================*/
    public static function mdlIngresarHabilitaciones($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (
                empleado_responsable, departamento, motivo, vehiculo, direccion_partida, 
                direccion_llegada, fecha_inicio, fecha_fin, monto, estado, metodo_pago, 
                detalles_pago, aprobador, notas_adicionales
            ) VALUES (
                :empleado_responsable, :departamento, :motivo, :vehiculo, :direccion_partida, 
                :direccion_llegada, :fecha_inicio, :fecha_fin, :monto, :estado, :metodo_pago, 
                :detalles_pago, :aprobador, :notas_adicionales
            )");

            $stmt->bindParam(":empleado_responsable", $datos["empleado_responsable"], PDO::PARAM_STR);
            $stmt->bindParam(":departamento", $datos["departamento"], PDO::PARAM_STR);
            $stmt->bindParam(":motivo", $datos["motivo"], PDO::PARAM_STR);
            $stmt->bindParam(":vehiculo", $datos["vehiculo"], PDO::PARAM_STR);
            $stmt->bindParam(":direccion_partida", $datos["direccion_partida"], PDO::PARAM_STR);
            $stmt->bindParam(":direccion_llegada", $datos["direccion_llegada"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_inicio", $datos["fecha_inicio"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_fin", $datos["fecha_fin"], PDO::PARAM_STR);
            $stmt->bindParam(":monto", $datos["monto"], PDO::PARAM_STR);
            $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
            $stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);
            $stmt->bindParam(":detalles_pago", $datos["detalles_pago"], PDO::PARAM_STR);
            $stmt->bindParam(":aprobador", $datos["aprobador"], PDO::PARAM_STR);
            $stmt->bindParam(":notas_adicionales", $datos["notas_adicionales"], PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }

        } catch (PDOException $e) {
            error_log("Error en mdlIngresarHabilitaciones: " . $e->getMessage());
            return "Error: " . $e->getMessage();
        } finally {
            $stmt = null;
        }
    }

    /*=============================================
    ACTUALIZAR HABILITACIONES
    =============================================*/
    public static function mdlActualizarHabilitaciones($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
                empleado_responsable = :empleado_responsable,
                departamento = :departamento,
                motivo = :motivo,
                vehiculo = :vehiculo,
                direccion_partida = :direccion_partida,
                direccion_llegada = :direccion_llegada,
                fecha_inicio = :fecha_inicio,
                fecha_fin = :fecha_fin,
                monto = :monto,
                estado = :estado,
                metodo_pago = :metodo_pago,
                detalles_pago = :detalles_pago,
                aprobador = :aprobador,
                notas_adicionales = :notas_adicionales,
                devolucion = :devolucion,
                descuento = :descuento,
                gastos_tt = :gastos_tt,
                gastos_ff = :gastos_ff,
                doc_final = :doc_final
                WHERE id = :id");

            $stmt->bindParam(":empleado_responsable", $datos["empleado_responsable"], PDO::PARAM_STR);
            $stmt->bindParam(":departamento", $datos["departamento"], PDO::PARAM_STR);
            $stmt->bindParam(":motivo", $datos["motivo"], PDO::PARAM_STR);
            $stmt->bindParam(":vehiculo", $datos["vehiculo"], PDO::PARAM_STR);
            $stmt->bindParam(":direccion_partida", $datos["direccion_partida"], PDO::PARAM_STR);
            $stmt->bindParam(":direccion_llegada", $datos["direccion_llegada"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_inicio", $datos["fecha_inicio"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_fin", $datos["fecha_fin"], PDO::PARAM_STR);
            $stmt->bindParam(":monto", $datos["monto"], PDO::PARAM_STR);
            $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
            $stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);
            $stmt->bindParam(":detalles_pago", $datos["detalles_pago"], PDO::PARAM_STR);
            $stmt->bindParam(":aprobador", $datos["aprobador"], PDO::PARAM_STR);
            $stmt->bindParam(":notas_adicionales", $datos["notas_adicionales"], PDO::PARAM_STR);
            $stmt->bindParam(":devolucion", $datos["devolucion"], PDO::PARAM_STR);
            $stmt->bindParam(":descuento", $datos["descuento"], PDO::PARAM_STR);
            $stmt->bindParam(":gastos_tt", $datos["gastos_tt"], PDO::PARAM_STR);
            $stmt->bindParam(":gastos_ff", $datos["gastos_ff"], PDO::PARAM_STR);
            $stmt->bindParam(":doc_final", $datos["doc_final"], PDO::PARAM_STR);
            $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }

        } catch (PDOException $e) {
            error_log("Error en mdlActualizarHabilitaciones: " . $e->getMessage());
            return "Error: " . $e->getMessage();
        } finally {
            $stmt = null;
        }
    }

    /*=============================================
    INGRESAR HABILITACIONES DESTINO
    =============================================*/
    public static function mdlIngresarHabilitaciones_dest($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (
                id, fecha_h, monto, doc
            ) VALUES (
                :id, :fecha_h, :monto, :doc
            )");

            $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
            $stmt->bindParam(":fecha_h", $datos["fecha_h"], PDO::PARAM_STR);
            $stmt->bindParam(":monto", $datos["monto"], PDO::PARAM_STR);
            $stmt->bindParam(":doc", $datos["doc"], PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }

        } catch (PDOException $e) {
            error_log("Error en mdlIngresarHabilitaciones_dest: " . $e->getMessage());
            return "Error: " . $e->getMessage();
        } finally {
            $stmt = null;
        }
    }

    /*=============================================
    MOSTRAR DATOS
    =============================================*/
    public static function mdlMostrar($tabla, $item, $valor)
    {
        try {
            if ($item != null) {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :valor");
                $stmt->bindParam(":valor", $valor, PDO::PARAM_STR);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY fecha_inicio DESC");
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }

        } catch (PDOException $e) {
            error_log("Error en mdlMostrar: " . $e->getMessage());
            return "Error: " . $e->getMessage();
        } finally {
            $stmt = null;
        }
    }

    /*=============================================
    ELIMINAR HABILITACIÓN
    =============================================*/
    public static function mdlEliminarHabilitacion($tabla, $id)
    {
        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }

        } catch (PDOException $e) {
            error_log("Error en mdlEliminarHabilitacion: " . $e->getMessage());
            return "Error: " . $e->getMessage();
        } finally {
            $stmt = null;
        }
    }

    /*=============================================
    CAMBIAR ESTADO
    =============================================*/
    public static function mdlCambiarEstado($tabla, $id, $estado)
    {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estado = :estado WHERE id = :id");
            $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }

        } catch (PDOException $e) {
            error_log("Error en mdlCambiarEstado: " . $e->getMessage());
            return "Error: " . $e->getMessage();
        } finally {
            $stmt = null;
        }
    }

    /*=============================================
    BUSCAR POR EMPLEADO
    =============================================*/
    public static function mdlBuscarPorEmpleado($tabla, $empleado)
    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE empleado_responsable LIKE :empleado ORDER BY fecha_inicio DESC");
            $empleadoBusqueda = "%" . $empleado . "%";
            $stmt->bindParam(":empleado", $empleadoBusqueda, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            error_log("Error en mdlBuscarPorEmpleado: " . $e->getMessage());
            return "Error: " . $e->getMessage();
        } finally {
            $stmt = null;
        }
    }

    /*=============================================
    BUSCAR POR FECHA
    =============================================*/
    public static function mdlBuscarPorFecha($tabla, $fechaInicio, $fechaFin)
    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha_inicio BETWEEN :fecha_inicio AND :fecha_fin ORDER BY fecha_inicio DESC");
            $stmt->bindParam(":fecha_inicio", $fechaInicio, PDO::PARAM_STR);
            $stmt->bindParam(":fecha_fin", $fechaFin, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            error_log("Error en mdlBuscarPorFecha: " . $e->getMessage());
            return "Error: " . $e->getMessage();
        } finally {
            $stmt = null;
        }
    }
}
?>