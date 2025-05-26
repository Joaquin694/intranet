<?php
require_once "conexion.php";
class ModeloAlmacenes{
	/*=============================================
MOSTRAR ALMACENES
=============================================*/
static public function mdlMostrarAlmacenes($tabla, $item, $valor){
    if($item != null){
        // Construir la consulta con el nombre de columna directamente
        $sql = "SELECT * FROM $tabla WHERE $item = :valor";
        $stmt = Conexion::conectar()->prepare($sql);
        
        // Usar un nombre de parámetro fijo
        $stmt->bindParam(":valor", $valor, PDO::PARAM_STR);
        $stmt->execute();
        
        return $stmt->fetch();
    } else {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    $stmt->close();
    $stmt = null;
}


	    /*=============================================
    CREAR ALMACEN
    =============================================*/
    static public function mdlIngresarAlmacen($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(almacen, descripcion, estado, fecha) VALUES (:almacen, :descripcion, :estado, NOW())");

        $stmt->bindParam(":almacen", $datos["almacen"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    /*=============================================
    EDITAR ALMACEN
    =============================================*/
    static public function mdlEditarAlmacen($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET almacen = :almacen, descripcion = :descripcion, estado = :estado WHERE id = :id");

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt->bindParam(":almacen", $datos["almacen"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

	/*=============================================
    // LOAD EDIT DATA PREVIA
    =============================================*/
    static public function mdlLoadPreviewEdit($tabla, $item, $valor){
        $respuesta = array(
            "id" => 2222222222222222222222,
            "almacen" => 555555555555555555,
            "descripcion" => "Descripción del Almacén A",
            "estado" => "1"
        );
        return $respuesta;
    }

} // ← El archivo debe terminar aquí, sin más código