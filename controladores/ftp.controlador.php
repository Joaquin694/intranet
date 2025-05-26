<?php 
class ControladorFtp {

    public function ctrCrearFtp($request) {
        if ($this->validate($request, ["fileName"]) && $this->validateFile($request, ["fileUpload"])) {
            $aleatorio = date('YmdHis');
            $nameFile = $this->guardarDoc($aleatorio, 'fileUpload');

            if ($nameFile !== null) {
                $tabla = "ftp";
                $datos = array(
                    "name" => $request["fileName"],
                    "ruta" => $nameFile
                );
                $respuesta = ModeloFtp::mdlIngresarFtp($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                            swal({
                                type: "success",
                                title: "El documento ha sido registrado correctamente",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false
                            }).then((result) => {
                                if (result.value) {
                                    window.location = "documentos";
                                }
                            })
                          </script>';
                } else {
                    echo "no se cargo";
                }
            }
        }
    }

    public function ctrActualizarFtp($request) {
        $nameDb = $request['nameDb'];
        $newName = $request['ActualizarFileName'];
        $fileActualizarDb = $request['fileActualizarDb'];
        $nameFile = $fileActualizarDb;

        if ($nameDb != $newName) {
            if ($this->validateFile($request, ['fileActualizar'])) {
                $this->eliminarDoc($fileActualizarDb);
                $aleatorio = date('YmdHis');
                $nameFile = $this->guardarDoc($aleatorio, 'fileActualizar');
            } else {
                $rutaAntigua = $_SERVER['DOCUMENT_ROOT'] . $fileActualizarDb;
                $rutaNueva = dirname($rutaAntigua) . '/' . $newName . '.' . pathinfo($rutaAntigua, PATHINFO_EXTENSION);
                rename($rutaAntigua, $rutaNueva);
                $nameFile = "files/" . $newName . '.' . pathinfo($rutaAntigua, PATHINFO_EXTENSION);
            }
        } else {
            if ($this->validateFile($request, ['fileActualizar'])) {
                $this->eliminarDoc($fileActualizarDb);
                $aleatorio = date('YmdHis');
                $nameFile = $this->guardarDoc($aleatorio, 'fileActualizar');
            }
        }

        $tabla = "ftp";
        $datos = array(
            "id" => $request["idFtp"],
            "name" => $newName,
            "ruta" => $nameFile
        );

        $respuesta = ModeloFtp::mdlActualizarFtp($tabla, $datos);

        if ($respuesta == "ok") {
            echo '<script>
            swal({
               type: "success",
               title: "El documento ha sido editado correctamente",
               showConfirmButton: true,
               confirmButtonText: "Cerrar",
               closeOnConfirm: false
            }).then((result) => {
               if (result.value) {
                  window.location = "documentos";
               }
            });
            </script>';
        } else {
            echo "No se pudo actualizar el documento.";
        }
    }

    private function guardarDoc($aleatorio, $field) {
        $rutaDoc = $_SERVER['DOCUMENT_ROOT'] . "/files/";
        $extensionDoc = pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION);
        $nombreDoc = $aleatorio . '.' . $extensionDoc;
        $nombreDocDb = "files/" . $nombreDoc;
        $ruta_cargaDoc = $rutaDoc . $nombreDoc;

        if (!file_exists($rutaDoc)) {
            mkdir($rutaDoc, 0777, true);
        }

        if (move_uploaded_file($_FILES[$field]['tmp_name'], $ruta_cargaDoc)) {
            return $nombreDocDb;
        }

        return null;
    }

    public static function eliminarDoc($filePath) {
        $rutaCompleta = $_SERVER['DOCUMENT_ROOT'] . $filePath;
        if (file_exists($rutaCompleta)) {
            return unlink($rutaCompleta);
        }
        return false;
    }

    public function validate($request, $input) {
        foreach ($input as $key) {
            if (!isset($request[$key]) || empty($request[$key])) {
                return false;
            }
        }
        return true;
    }

    public function validateFile($request, $fields) {
        foreach ($fields as $key) {
            if (!isset($_FILES[$key]) || $_FILES[$key]['error'] !== 0) {
                return false;
            }
        }
        return true;
    }
}
?>
