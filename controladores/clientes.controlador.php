<?php



class ControladorClientes{



	/*=============================================

	CREAR CLIENTES

	=============================================*/



	static public function ctrCrearCliente(){
		foreach ($_POST as $key => $value) {
			$data = "dato: ".$key ."=". $value ."<br>";
			echo "<script>console.log('" . $data . "');</script>";
		}
		
		if(isset($_POST["nuevoCliente"])){



			if(($_POST["nuevoCliente"]) &&  ($_POST["nuevoDocumentoId"])){
			   	$tabla = "clientes";
			   	$datos = array("nombre"=>$_POST["nuevoCliente"],
					           "documento"=>$_POST["nuevoDocumentoId"],
					           "email"=>$_POST["nuevoEmail"],
					           "telefono"=>$_POST["nuevoTelefono"],
					           "direccion"=>$_POST["nuevaDireccion"],
					           "fecha_nacimiento"=>$_POST["nuevaFechaNacimiento"],
					           "marca"=>$_POST["marca"],
					           "tipo_cliente"=>$_POST["tipo_cliente"],
					           "sexo"=>$_POST["sexo"]);

			   	$respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({

						  type: "success",
						  title: "El cliente ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {
									window.location = "clientes";
									}
								})
					</script>';
				}
			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡El cliente no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {
							window.location = "clientes";
							}
						})
			  	</script>';
			}
		}
	}



	/*=============================================

	MOSTRAR CLIENTES

	=============================================*/



	static public function ctrMostrarClientes($item, $valor){



		$tabla = "clientes";



		$respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);



		return $respuesta;



	}

	/*=============================================

	MOSTRAR TABLA REGISTRO BPM

	=============================================*/



	static public function ctrMostrarRegistroBpm($item, $valor, $tablad){



		$tabla = $tablad;



		$respuesta = ModeloClientes::mdlMostrarRegistroBpm($tabla, $item, $valor);



		return $respuesta;



	}




	/*=============================================

	MOSTRAR TABLA REGISTRO BPM

	=============================================*/



	static public function ctrMostrarRegistroBpmPorAno($item, $valor, $tablad){

		

		$tabla = $tablad;



		$respuesta = ModeloClientes::ctrMostrarRegistroBpmPorAno($tabla, $item, $valor);

		

		return $respuesta;



	}


	/*=============================================

	MOSTRAR TABLA REGISTRO BPM

	=============================================*/



	static public function ctrMostrarRegistroBpmIncompletas(){

		$respuesta = ModeloClientes::mdlMostrarRegistroBpmIncompletas();
		return $respuesta;

	}



	/*=============================================

	EDITAR CLIENTE

	=============================================*/



	static public function ctrEditarCliente(){



		if(isset($_POST["editarCliente"])){



			if(isset($_POST["editarCliente"])){



			   	$tabla = "clientes";



			   	$datos = array("id"=>$_POST["idCliente"],
			   				   "nombre"=>$_POST["editarCliente"],

					           "documento"=>$_POST["editarDocumentoId"],

					           "email"=>$_POST["editarEmail"],

					           "telefono"=>$_POST["editarTelefono"],

					           "direccion"=>$_POST["editarDireccion"],
					           "sexo"=>$_POST["editarSexo"],
							   "marca"=>$_POST["editarMarca"],
							   "tipo_cliente"=>$_POST["editarTipo_cliente"]);



			   	$respuesta = ModeloClientes::mdlEditarCliente($tabla, $datos);



			   	if($respuesta == "ok"){



					echo'<script>



					swal({

						  type: "success",

						  title: "El cliente ha sido cambiado correctamente",

						  showConfirmButton: true,

						  confirmButtonText: "Cerrar",

						  closeOnConfirm: false

						  }).then((result) => {

									if (result.value) {



									window.location = "clientes";



									}

								})



					</script>';



				}



			}else{



				echo'<script>



					swal({

						  type: "error",

						  title: "¡El cliente no puede ir vacío o llevar caracteres especiales!",

						  showConfirmButton: true,

						  confirmButtonText: "Cerrar",

						  closeOnConfirm: false

						  }).then((result) => {

							if (result.value) {



							window.location = "clientes";



							}

						})



			  	</script>';







			}



		}



	}



	/*=============================================

	ELIMINAR CLIENTE

	=============================================*/



	static public function ctrEliminarCliente(){



		if(isset($_GET["idCliente"])){



			$tabla ="clientes";

			$datos = $_GET["idCliente"];



			$respuesta = ModeloClientes::mdlEliminarCliente($tabla, $datos);



			if($respuesta == "ok"){



				echo'<script>



				swal({

					  type: "success",

					  title: "El cliente ha sido borrado correctamente",

					  showConfirmButton: true,

					  confirmButtonText: "Cerrar",

					  closeOnConfirm: false

					  }).then((result) => {

								if (result.value) {



								window.location = "clientes";



								}

							})



				</script>';



			}		



		}



	}



}



