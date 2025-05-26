<?php
class ControladorAlmacenes{
	/*=============================================
	MOSTRAR ALMACEN
	=============================================*/
	static public function ctrMostrarAlmacenes($item, $valor){
		$tabla = "almacenes";
		$respuesta = ModeloAlmacenes::mdlMostrarAlmacenes($tabla, $item, $valor);
		return $respuesta;
	}

	 /*=============================================
    CREAR ALMACEN
    =============================================*/
    static public function ctrCrearAlmacen() {
        if (isset($_POST["RegistraAlmacenNombre"])) {
            $tabla = "almacenes";
            $datos = array("almacen" => $_POST["RegistraAlmacenNombre"],
                           "descripcion" => $_POST["RegistraAlmacenDescripcion"],
                           "estado" => $_POST["RegistraAlmacenEstado"]);  // Estado activo por defecto

            $respuesta = ModeloAlmacenes::mdlIngresarAlmacen($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                        swal({
                            type: "success",
                            title: "¡El almacén ha sido guardado correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then((result) => {
                            if (result.value) {
                                window.location = "almacenes";
                            }
                        });
                    </script>';
            }
        }
    }

    /*=============================================
    EDITAR ALMACEN
    =============================================*/
    static public function ctrEditarAlmacen() {
        if (isset($_POST["idAlmacenEditar"])) {
            $tabla = "almacenes";
            $datos = array("id" => $_POST["idAlmacenEditar"],
                           "almacen" => $_POST["editarAlmacenNombre"],
                           "descripcion" => $_POST["editarAlmacenDescripcion"],
                           "estado" => $_POST["editarAlmacenEstado"]); // Asumimos que también envías el estado desde el formulario

                        

            $respuesta = ModeloAlmacenes::mdlEditarAlmacen($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                        swal({
                            type: "success",
                            title: "¡El almacén ha sido editado correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then((result) => {
                            if (result.value) {
                                window.location = "almacenes";
                            }
                        });
                    </script>';
            }
        }
    }

}