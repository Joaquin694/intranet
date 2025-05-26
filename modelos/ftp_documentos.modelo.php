<?php
require_once "conexion.php";

class ModeloDocumentos {

    /* Insertar documento en la base de datos */
    public static function mdlSubirDocumento($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, ruta) VALUES (:nombre, :ruta)");
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    /* Obtener documentos de la base de datos */
    public static function mdlMostrarDocumentos($tabla) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->close();
        $stmt = null;
    }
}
?>
