<?php



class ControladorProveedores{



	/*=============================================

	CREAR Proveedores

	=============================================*/



	static public function ctrCrearProveedor(){
		
	
		if(isset($_POST["nuevoProveedor"])){



			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoProveedor"]) ){



			   	$tabla = "Proveedores";



			   	$datos = array("nombre"=>$_POST["nuevoProveedor"],

					           "documento"=>$_POST["nuevoDocumentoId"],

					           "email"=>$_POST["nuevoEmail"],

					           "telefono"=>$_POST["nuevoTelefono"],

					           "direccion"=>$_POST["nuevaDireccion"],

					           "fecha_nacimiento"=>$_POST["nuevaFechaNacimiento"]);



			   	$respuesta = ModeloProveedores::mdlIngresarProveedor($tabla, $datos);



			   	if($respuesta == "ok"){



					echo'<script>



					swal({

						  type: "success",

						  title: "El proveedor ha sido guardado correctamente",

						  showConfirmButton: true,

						  confirmButtonText: "Cerrar",

						  closeOnConfirm: false

						  }).then((result) => {

									if (result.value) {



									window.location = "proveedores";



									}

								})



					</script>';



				}



			}else{



				echo'<script>



					swal({

						  type: "error",

						  title: "¡El proveedor no puede ir vacío o llevar caracteres especiales!",

						  showConfirmButton: true,

						  confirmButtonText: "Cerrar",

						  closeOnConfirm: false

						  }).then((result) => {

							if (result.value) {



							window.location = "proveedores";



							}

						})



			  	</script>';







			}



		}



	}



	/*=============================================

	MOSTRAR Proveedores

	=============================================*/



	static public function ctrMostrarProveedores($item, $valor){



		$tabla = "proveedores";



		$respuesta = ModeloProveedores::mdlMostrarProveedores($tabla, $item, $valor);



		return $respuesta;



	}



	/*=============================================

	EDITAR Proveedor

	=============================================*/



	static public function ctrEditarProveedor(){



		if(isset($_POST["editarProveedor"])){



			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["idProveedor"]) ){



			   	$tabla = "proveedores";



			   	$datos = array("proveedor_pk"=>$_POST["idProveedor"],

			   				   "nombres"=>$_POST["editarProveedor"],

					           "fk_tipo_documento"=>$_POST["editartipodocuident"],

					           "num_documento"=>$_POST["editarnumidentidad"],

					           "telefono"=>$_POST["editarnuevoTelefono"],

					           "email"=>$_POST["editarnuevoEmail"],

					           "razon_social"=>$_POST["editarrazonsocial"],

			   				   "ruc"=>$_POST["editarruc"],

							   "direccion_prov"=>$_POST["editarnuevaDireccion"]);



			   	$respuesta = ModeloProveedores::mdlEditarProveedor($tabla, $datos);



			   	if($respuesta == "ok"){



					echo'<script>



					swal({

						  type: "success",

						  title: "El proveedor ha sido cambiado correctamente",

						  showConfirmButton: true,

						  confirmButtonText: "Cerrar",

						  closeOnConfirm: false

						  }).then((result) => {

									if (result.value) {



									window.location = "proveedores";



									}

								})



					</script>';



				}



			}else{



				echo'<script>



					swal({

						  type: "error",

						  title: "¡El proveedor no puede ir vacío o llevar caracteres especiales!",

						  showConfirmButton: true,

						  confirmButtonText: "Cerrar",

						  closeOnConfirm: false

						  }).then((result) => {

							if (result.value) {



							window.location = "proveedores";



							}

						})



			  	</script>';







			}



		}



	}



	/*=============================================

	ELIMINAR probeedore

	=============================================*/



	static public function ctrEliminarProveedor(){



		if(isset($_GET["idProveedor"])){



			$tabla ="proveedores";

			$datos = $_GET["idProveedor"];



			$respuesta = ModeloProveedores::mdlEliminarProveedor($tabla, $datos);



			if($respuesta == "ok"){



				echo'<script>



				swal({

					  type: "success",

					  title: "El proveedor ha sido borrado correctamente",

					  showConfirmButton: true,

					  confirmButtonText: "Cerrar",

					  closeOnConfirm: false

					  }).then((result) => {

								if (result.value) {



								window.location = "proveedores";



								}

							})



				</script>';



			}		



		}



	}



}



