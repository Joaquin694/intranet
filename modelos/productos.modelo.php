<?php

require_once "conexion.php";

class ModeloProductos
{

    /*=============================================
    MOSTRAR PRODUCTOS
    =============================================*/

    public static function mdlMostrarProductos($tabla, $item, $valor, $orden)
    {
        try {
            if ($item != null) {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
                $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
                $stmt->execute();
                return $stmt->fetch();
            } else {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");
                $stmt->execute();
                return $stmt->fetchAll();
            }
        } catch (PDOException $e) {
            error_log("Error en mdlMostrarProductos: " . $e->getMessage());
            return false;
        } finally {
            $stmt = null;
        }
    }

    /*=============================================
    REGISTRO DE PRODUCTO
    =============================================*/

    public static function mdlIngresarProducto($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_categoria, codigo, descripcion, imagen, stock, precio_compra, precio_venta) VALUES (:id_categoria, :codigo, :descripcion, :imagen, :stock, :precio_compra, :precio_venta)");

            $stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
            $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
            $stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
            $stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
            $stmt->bindParam(":precio_compra", $datos["precio_compra"], PDO::PARAM_STR);
            $stmt->bindParam(":precio_venta", $datos["precio_venta"], PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            error_log("Error en mdlIngresarProducto: " . $e->getMessage());
            return "error";
        } finally {
            $stmt = null;
        }
    }

    /*=============================================
    EDITAR PRODUCTO
    =============================================*/

    public static function mdlEditarProducto($tabla, $datos)
    {
        try {
            $pdo = Conexion::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("UPDATE $tabla SET id_categoria = :id_categoria, descripcion = :descripcion, imagen = :imagen, stock = :stock, precio_compra = :precio_compra, precio_venta = :precio_venta WHERE codigo = :codigo");

            $stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
            $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
            $stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
            $stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
            $stmt->bindParam(":precio_compra", $datos["precio_compra"], PDO::PARAM_STR);
            $stmt->bindParam(":precio_venta", $datos["precio_venta"], PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            error_log("Error en mdlEditarProducto: " . $e->getMessage());
            return "Syntax Error: " . $e->getMessage();
        } finally {
            $stmt = null;
        }
    }

    /*=============================================
    BORRAR PRODUCTO
    =============================================*/

    public static function mdlEliminarProducto($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
            $stmt->bindParam(":id", $datos, PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            error_log("Error en mdlEliminarProducto: " . $e->getMessage());
            return "error";
        } finally {
            $stmt = null;
        }
    }

    /*=============================================
    ACTUALIZAR PRODUCTO
    =============================================*/

    public static function mdlActualizarProducto($tabla, $item1, $valor1, $valor)
    {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id");
            $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
            $stmt->bindParam(":id", $valor, PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            error_log("Error en mdlActualizarProducto: " . $e->getMessage());
            return "error";
        } finally {
            $stmt = null;
        }
    }

    /*=============================================
    MOSTRAR SUMA VENTAS
    =============================================*/

    public static function mdlMostrarSumaVentas($tabla)
    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT SUM(ventas) as total FROM $tabla");
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            error_log("Error en mdlMostrarSumaVentas: " . $e->getMessage());
            return false;
        } finally {
            $stmt = null;
        }
    }
}
?>