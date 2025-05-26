<?php
require_once "conexion.php";

class ModeloSolicitudSalida {

    /*=============================================================
    REGISTRAR SALIDA
    ============================================================*/
    public static function mdlSalidaAlmacen($tabla, $datos) {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_salida, cantidad, fecha_despacho, comentario, estado_atencion, beneficiario, numero_autorizacion, nombre_colaborador, dni_colaborador, almacen_destino, motivo_traslado, almacenOrigen, usuario_despache) VALUES (:idSalida, :cantidad, :fechaDespacho, :comentario, :estadoAtencion, :beneficiario, :numeroAutorizacion, :nombreColaborador, :dniColaborador, :almacenDestino, :motivoTraslado, :almacenOrigen, :usuario_despache)");
            
            $usuarioDespache = $_SESSION["nombre"] . ' (' . $_SESSION["usuario"] . ')';
            $rgtsscodigoProducto = strtoupper(trim($datos["rgtsscodigoProducto"]));
            $idalmacenorigen = $datos["idalmacenorigen"];
            $almacen_detination = isset($datos["almacenDestino"]) && $datos["almacenDestino"] ? $datos["almacenDestino"] : 0;

            // Vinculación de parámetros
            $stmt->bindParam(":idSalida", $datos["idSalida"], PDO::PARAM_INT);
            $stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_INT);
            $stmt->bindParam(":fechaDespacho", $datos["fechaDespacho"], PDO::PARAM_STR);
            $stmt->bindParam(":comentario", $datos["comentario"], PDO::PARAM_STR);
            $stmt->bindParam(":estadoAtencion", $datos["estadoAtencion"], PDO::PARAM_INT);
            $stmt->bindParam(":beneficiario", $datos["beneficiario"], PDO::PARAM_STR);
            $stmt->bindParam(":numeroAutorizacion", $datos["numeroAutorizacion"], PDO::PARAM_STR);
            $stmt->bindParam(":nombreColaborador", $datos["nombreColaborador"], PDO::PARAM_STR);
            $stmt->bindParam(":dniColaborador", $datos["dniColaborador"], PDO::PARAM_STR);
            $stmt->bindParam(":almacenDestino", $almacen_detination, PDO::PARAM_INT);
            $stmt->bindParam(":motivoTraslado", $datos["motivoTraslado"], PDO::PARAM_STR);
            $stmt->bindParam(":almacenOrigen", $datos["almacenOrigen"], PDO::PARAM_STR);
            $stmt->bindParam(":usuario_despache", $usuarioDespache, PDO::PARAM_STR);

            if (!$stmt->execute()) {
                return "error";
            }

            $resultado = "ok";
            
            // Actualización de stock en la tabla correspondiente según el almacén de procedencia
            $tableUpdateonSegunAlmacenOrigen = $datos["almacenOrigen"] == "CECENTRA" ? "productos" : "productos_ingresos";
            $cantidadp = $datos["cantidad"];

            //------- DECREMENTO A ALMACEN ORIGEN -------
            $stmtUpdate = Conexion::conectar()->prepare("UPDATE $tableUpdateonSegunAlmacenOrigen SET stock = stock - :cantidad WHERE UPPER(TRIM(codigo)) = :codigoProducto AND fk_almacen = :fk_almacenOrigen");
            
            $stmtUpdate->bindParam(":cantidad", $cantidadp, PDO::PARAM_STR);
            $stmtUpdate->bindParam(":codigoProducto", $rgtsscodigoProducto, PDO::PARAM_STR);
            $stmtUpdate->bindParam(":fk_almacenOrigen", $idalmacenorigen, PDO::PARAM_INT);

            if (!$stmtUpdate->execute()) {
                return "error";
            }

            //------- ACTUALIZAMOS ESTADO DE ATENCIÓN -------
            $tbla = "solicitudes_salida";
            $estadoUpdate = Conexion::conectar()->prepare("UPDATE $tbla SET estado = :estadoAtencionr WHERE id = :idSalidar");
            
            $estadoUpdate->bindParam(":idSalidar", $datos["idSalida"], PDO::PARAM_INT);
            $estadoUpdate->bindParam(":estadoAtencionr", $datos["estadoAtencion"], PDO::PARAM_INT);

            if (!$estadoUpdate->execute()) {
                return "error";
            }

            //------- APLICAMOS INCREMENTO SI EXISTE ALMACEN DESTINO -------
            $tablaActualizacionincremento = $datos["almacenDestino"] == 1 ? "productos" : "productos_ingresos";

            if ($almacen_detination > 0) {
                // Verificar si el producto existe en el almacén destino
                $slctPaExistencia = Conexion::conectar()->prepare("SELECT * FROM $tablaActualizacionincremento WHERE UPPER(TRIM(codigo)) = :codigoProducto AND fk_almacen = :fk_almacenDestino");
                $slctPaExistencia->bindParam(":codigoProducto", $rgtsscodigoProducto, PDO::PARAM_STR);
                $slctPaExistencia->bindParam(":fk_almacenDestino", $almacen_detination, PDO::PARAM_INT);
                
                $slctPaExistencia->execute();
                $resultadosd = $slctPaExistencia->fetchAll();

                if (count($resultadosd) > 0) {
                    // Si existe el producto, actualizar stock
                    $updateStatement = Conexion::conectar()->prepare("UPDATE $tablaActualizacionincremento SET stock = stock + :cantidad WHERE UPPER(TRIM(codigo)) = :codigoProducto AND fk_almacen = :fk_almacenDestination");
                    $updateStatement->bindParam(":cantidad", $cantidadp, PDO::PARAM_STR);
                    $updateStatement->bindParam(":codigoProducto", $rgtsscodigoProducto, PDO::PARAM_STR);
                    $updateStatement->bindParam(":fk_almacenDestination", $almacen_detination, PDO::PARAM_INT);
                    $updateStatement->execute();
                } else {
                    // Si no existe, obtener datos del almacén origen para insertar
                    $stmtoo = Conexion::conectar()->prepare("SELECT * FROM $tableUpdateonSegunAlmacenOrigen WHERE UPPER(TRIM(codigo)) = :codigoProducto AND fk_almacen = :fk_almacenOrigen");
                    $stmtoo->bindParam(":codigoProducto", $rgtsscodigoProducto, PDO::PARAM_STR);
                    $stmtoo->bindParam(":fk_almacenOrigen", $idalmacenorigen, PDO::PARAM_INT);
                    $stmtoo->execute();

                    if ($row = $stmtoo->fetch(PDO::FETCH_ASSOC)) {
                        // Insertar nuevo producto en almacén destino
                        $stmtingr = Conexion::conectar()->prepare("INSERT INTO $tablaActualizacionincremento (`id`, `id_categoria`, `codigo`, `descripcion`, `imagen`, `stock`, `precio_compra`, `precio_venta`, `ventas`, `fecha`, `fk_dm_productos`, `fk_almacen`, `lote`) VALUES (NULL, :id_categoria, :codigo, :descripcion, :imagen, :stock, :precio_compra, :precio_venta, :ventas, NOW(), :fk_dm_productos, :fk_almacen, :lote)");
                        
                        $stmtingr->bindParam(':id_categoria', $row['id_categoria'], PDO::PARAM_INT);
                        $stmtingr->bindParam(':codigo', $rgtsscodigoProducto, PDO::PARAM_STR);
                        $stmtingr->bindParam(':descripcion', $row['descripcion'], PDO::PARAM_STR);
                        $stmtingr->bindParam(':imagen', $row['imagen'], PDO::PARAM_STR);
                        $stmtingr->bindParam(':stock', $cantidadp, PDO::PARAM_STR);
                        $stmtingr->bindParam(':precio_compra', $row['precio_compra']);
                        $stmtingr->bindParam(':precio_venta', $row['precio_venta']);
                        $stmtingr->bindParam(':ventas', $row['ventas'], PDO::PARAM_INT);
                        $stmtingr->bindParam(':fk_dm_productos', $row['fk_dm_productos'], PDO::PARAM_INT);
                        $stmtingr->bindParam(':fk_almacen', $almacen_detination, PDO::PARAM_INT);
                        $stmtingr->bindParam(':lote', $row['lote'], PDO::PARAM_STR);

                        if (!$stmtingr->execute()) {
                            return "error";
                        }
                    }
                }
            }

            return $resultado;

        } catch (PDOException $e) {
            error_log("Error en mdlSalidaAlmacen: " . $e->getMessage());
            return "error: " . $e->getMessage();
        }
    }

    /*=============================================
    MOSTRAR GENERICO
    =============================================*/
    public static function mdlMostrar($tabla, $item, $valor, $operante = null) {
        try {
            if ($item != null) {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item $operante :itemValue");
                $stmt->bindParam(":itemValue", $valor, PDO::PARAM_STR);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            error_log("Error en mdlMostrar: " . $e->getMessage());
            return "Error: " . $e->getMessage();
        }
    }

    /*=============================================
    MOSTRAR AUDITOR DE EXISTENCIAS Y SOLICITUDES
    =============================================*/
    public static function mdlMostrarAuditorProductoPreseleccionado($tabla, $item, $valor) {
        try {
            $stmt = Conexion::conectar()->prepare("
                SELECT existencias.ubication, existencias.id, existencias.codigo, existencias.descripcion, existencias.stock, existencias.fk_almacen, B.almacen
                FROM (
                    SELECT 'Ingreso a almacen' as 'ubication', a.id, a.codigo, a.descripcion, a.stock, a.fk_almacen 
                    FROM `productos_ingresos` a
                    UNION ALL
                    SELECT 'Ingreso a almacen' as 'ubication', b.id, b.codigo, b.descripcion, b.stock, b.fk_almacen 
                    FROM `productos` b
                    UNION ALL
                    SELECT 'Salida Pendiente' as 'ubication', f.id, h.codigo, h.descripcion, -f.cantidad stock, h.fk_almacen 
                    FROM solicitudes_salida AS f INNER JOIN productos_ingresos AS h ON f.producto = h.id WHERE f.estado='1'
                ) AS existencias 
                INNER JOIN almacenes AS B ON existencias.fk_almacen = B.id
                WHERE existencias.codigo = :codigo 
                ORDER BY stock DESC
            ");

            $stmt->bindParam(":codigo", $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            error_log("Error en mdlMostrarAuditorProductoPreseleccionado: " . $e->getMessage());
            return "Error: " . $e->getMessage();
        }
    }

    /*=============================================
    MOSTRAR SOLICITUDES
    =============================================*/
    public static function mdlMostrarSolicitudes($tabla, $item, $valor) {
        try {
            if ($item != null) {
                $valor2 = 1;
                $stmt = Conexion::conectar()->prepare("SELECT '' as nombre_colaborador, a.*, a.almacen idalmacen, b.almacen, c.codigo, c.descripcion, c.imagen FROM solicitudes_salida AS a INNER JOIN almacenes AS b ON a.almacen = b.id INNER JOIN productos_ingresos AS c ON a.producto = c.id WHERE a.$item = :itemValor and a.estado = :estatu");
                $stmt->bindParam(":itemValor", $valor, PDO::PARAM_STR);
                $stmt->bindParam(":estatu", $valor2, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                $stmt = Conexion::conectar()->prepare("SELECT D.nombre_colaborador as nombre_colaborador, a.*, a.almacen idalmacen, b.almacen, c.codigo, c.descripcion, c.imagen, D.usuario_despache, D.fecha_despacho, D.fecha_registro FROM solicitudes_salida AS a INNER JOIN almacenes AS b ON a.almacen = b.id INNER JOIN productos_ingresos AS c ON a.producto = c.id LEFT JOIN salidas_almacen AS D on a.id=D.id_salida");
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            error_log("Error en mdlMostrarSolicitudes: " . $e->getMessage());
            return "Error: " . $e->getMessage();
        }
    }

    /*=============================================
    CREAR SOLICITUD
    =============================================*/
    public static function mdlIngresarSolicitud($tabla, $datos) {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(almacen, producto, cantidad, fecha_necesidad, usuario, comentario, estado) VALUES (:almacen, :producto, :cantidad, :fecha_necesidad, :usuario, :comentario, :estado)");

            $stmt->bindParam(":almacen", $datos["almacen"], PDO::PARAM_STR);
            $stmt->bindParam(":producto", $datos["producto"], PDO::PARAM_STR);
            $stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_INT);
            $stmt->bindParam(":fecha_necesidad", $datos["fecha_necesidad"], PDO::PARAM_STR);
            $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
            $stmt->bindParam(":comentario", $datos["comentario"], PDO::PARAM_STR);
            $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            } else {
                $error = $stmt->errorInfo();
                error_log("Error al insertar solicitud: " . print_r($error, true));
                return "error";
            }

        } catch (PDOException $e) {
            error_log("Error en mdlIngresarSolicitud: " . $e->getMessage());
            return "error: " . $e->getMessage();
        }
    }

    /*=============================================
    EDITAR SOLICITUD
    =============================================*/
    public static function mdlEditarSolicitud($tabla, $datos) {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET cantidad = :cantidad, fecha_necesidad = :fecha_necesidad, usuario = :usuario, comentario = :comentario, estado = :estado WHERE id = :id");

            $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
            $stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_necesidad", $datos["fecha_necesidad"], PDO::PARAM_STR);
            $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
            $stmt->bindParam(":comentario", $datos["comentario"], PDO::PARAM_STR);
            $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }

        } catch (PDOException $e) {
            error_log("Error en mdlEditarSolicitud: " . $e->getMessage());
            return "error: " . $e->getMessage();
        }
    }
}
?>