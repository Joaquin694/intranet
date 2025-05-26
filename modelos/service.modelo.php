<?php

require_once "conexion.php";

class ModeloServices {

    /*=============================================
    CREAR SERVICE
    =============================================*/

    static public function mdlIngresarService($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nameService, precio, DesService, activador, id_categoria) VALUES (:nameService, :precio, :DesService, :activador, :id_categoria)");
        
        $stmt->bindParam(":nameService", $datos["nameService"], PDO::PARAM_STR);
        $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR); // or PDO::PARAM_INT if you handle it as an integer
        $stmt->bindParam(":DesService", $datos["DesService"], PDO::PARAM_STR);
        $stmt->bindParam(":activador", $datos["activador"], PDO::PARAM_STR);
        $stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    /*=============================================
    MOSTRAR SERVICES
    =============================================*/

    static public function mdlMostrarServices($tabla, $item, $valor) {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY nameService ASC");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        $stmt->close();
        $stmt = null;
    }

    /*=============================================
    EDITAR SERVICE
    =============================================*/

    static public function mdlEditarService($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nameService = :nameService, precio = :precio, DesService = :DesService, activador = :activador, id_categoria = :id_categoria WHERE idService = :idService");
        
        $stmt->bindParam(":nameService", $datos["nameService"], PDO::PARAM_STR);
        $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR); // or PDO::PARAM_INT if you handle it as an integer
        $stmt->bindParam(":DesService", $datos["DesService"], PDO::PARAM_STR);
        $stmt->bindParam(":activador", $datos["activador"], PDO::PARAM_STR);
        $stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
        $stmt->bindParam(":idService", $datos["idService"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    /*=============================================
    BORRAR SERVICE
    =============================================*/

    static public function mdlBorrarService($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idService = :idService");
        $stmt->bindParam(":idService", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }
}
