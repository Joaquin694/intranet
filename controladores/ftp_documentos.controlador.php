<?php
class ControladorDocumentos {

    /* Subir un documento */
    public function ctrSubirDocumento() {
        if (isset($_FILES["fileUpload"]["name"])) {
            $ruta = "uploads/"; // Asegúrate de que este directorio exista y tenga permisos de escritura
            $nombreFinal = time() . '_' . basename($_FILES["fileUpload"]["name"]);
            $rutaFinal = $ruta . $nombreFinal;

            if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $rutaFinal)) {
                $respuesta = ModeloDocumentos::mdlSubirDocumento("documentos", ["nombre" => $_POST["fileName"], "ruta" => $rutaFinal]);
                if ($respuesta == "ok") {
                    echo json_encode(["status" => "success", "message" => "Archivo cargado exitosamente."]);
                } else {
                    echo json_encode(["status" => "error", "message" => "Error al guardar en base de datos."]);
                }
            } else {
                echo json_encode(["status" => "error", "message" => "Error al mover el archivo."]);
            }
        }
    }

    /* Mostrar documentos */
    public function ctrMostrarDocumentos() {
        $tabla = "documentos";
        $respuesta = ModeloDocumentos::mdlMostrarDocumentos($tabla);
        return $respuesta;
    }
}
?>
