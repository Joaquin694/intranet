<?php


class ControladorServices {

    /*=============================================
    CREAR SERVICE
    =============================================*/

    static public function ctrCrearService() {
        if (isset($_POST["nuevoService"])) {
            if (preg_match('/^[0-9.]+$/', $_POST["precio"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["DesService"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["activador"])) {

                $tabla = "service";
                $datos = array(
                    "nameService" => $_POST["nuevoService"],
                    "precio" => $_POST["precio"],
                    "DesService" => $_POST["DesService"],
                    "activador" => $_POST["activador"],
                    "id_categoria" => $_POST["id_categoria"]
                );

                $respuesta = ModeloServices::mdlIngresarService($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                        swal({
                            type: "success",
                            title: "El servicio ha sido guardado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result) => {
                            if (result.value) {
                                window.location = "servicesadm";
                            }
                        })
                    </script>';
                }
            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "¡El servicio no puede ir vacío o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result) => {
                        if (result.value) {
                            window.location = "servicesadm";
                        }
                    })
                </script>';
            }
        }
    }

    /*=============================================
    MOSTRAR SERVICES
    =============================================*/

    static public function ctrMostrarServices($item, $valor) {
        $tabla = "service";
        $respuesta = ModeloServices::mdlMostrarServices($tabla, $item, $valor);
        return $respuesta;
    }

    /*=============================================
    EDITAR SERVICE
    =============================================*/

    static public function ctrEditarService() {
        if (isset($_POST["editarNameService"])) {
            if (preg_match('/^[0-9.]+$/', $_POST["editarPrecio"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDesService"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarActivador"])) {
                
                $tabla = "service";
                $datos = array(
                    "idService" => $_POST["idService"],
                    "nameService" => $_POST["editarNameService"],
                    "precio" => $_POST["editarPrecio"],
                    "DesService" => $_POST["editarDesService"],
                    "activador" => $_POST["editarActivador"],
                    "id_categoria" => $_POST["editarIdCategoria"]
                );

                $respuesta = ModeloServices::mdlEditarService($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                        swal({
                            type: "success",
                            title: "El servicio ha sido actualizado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result) => {
                            if (result.value) {
                                window.location = "servicesadm";
                            }
                        })
                    </script>';
                }
            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "¡El servicio no puede ir vacío o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result) => {
                        if (result.value) {
                            window.location = "servicesadm";
                        }
                    })
                </script>';
            }
        }
    }

    /*=============================================
    BORRAR SERVICE
    =============================================*/

    static public function ctrBorrarService() {
        if (isset($_GET["idService"])) {
            $tabla = "service";
            $datos = $_GET["idService"];
            $respuesta = ModeloServices::mdlBorrarService($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        type: "success",
                        title: "El servicio ha sido borrado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result) => {
                        if (result.value) {
                            window.location = "servicesadm";
                        }
                    })
                </script>';
            }
        }
    }
}
