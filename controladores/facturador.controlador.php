<?php
date_default_timezone_set('America/Lima');
session_start();
// Configurar el manejador de excepciones
set_exception_handler("customExceptionHandler");

// Configurar el manejador de cierre
register_shutdown_function("shutdownHandler");

// Manejador de errores
function customErrorHandler($errno, $errstr, $errfile, $errline)
{
	$errorMessage = "Error [$errno]: $errstr in $errfile on line $errline";
	//  error_log($errorMessage); // Log el error
	//  echo "Se ha producido un error. Por favor, consulta el log para más detalles.";
	echo $errorMessage;
	/* No ejecutar el gestor de errores interno de PHP */
	return true;
}

// Manejador de excepciones
function customExceptionHandler($exception)
{
	$errorMessage = "Uncaught exception: " . $exception->getMessage() . " in " . $exception->getFile() . " on line " . $exception->getLine();
	//  error_log($errorMessage); // Log la excepción
	echo $errorMessage;
	//  echo "Se ha producido una excepción. Por favor, consulta el log para más detalles.";
}

// Manejador de cierre
function shutdownHandler()
{
	$lastError = error_get_last();
	if ($lastError) {
		customErrorHandler($lastError['type'], $lastError['message'], $lastError['file'], $lastError['line']);
	}
}
switch ($_POST['accion']) {
	case 'generar_comprobant__bpm':
		# code...
		$idBpm = $_POST['idBpm'];
		$nomElemnt = $_POST['nomElemnt'];
		include '../modelos/facturador.modelo.php';
		$viewListBpm = new ModeloFacturaBpm;
		$datBPMi = $viewListBpm->mdlMostrarFacturaBpm($idBpm);
		$datBPM = json_decode($datBPMi, true);

		$datBPMitens = $viewListBpm->mdlMostrarItemParaFacturaBpm($idBpm);
		$datBPMii = json_decode($datBPMitens, true);

		include '../vistas/modulos/facturador.php';
		break;
	// -------------------------------------------
	case 'add_cabecera_comprobante':
		# code...
		include '../modelos/facturador.modelo.php';
		$documento = trim($_POST['docuIdentidad']);
		switch (strlen($documento)) {
			case '8':
				# code...
				$tipo_comprobante = "03";
				$fk_tipo_comprobante = "BLT";
				break;
			case '11':
				# code...
				$tipo_comprobante = "01";
				$fk_tipo_comprobante = "FCT";
				break;
			default:
				# code...
				echo "<spam style='color:red' title='El número de documento de identidad no es admitido. Ya que tiene " . strlen($documento) . " dígitos'>Docu. errado</spam>
					<script type='text/javascript'>$('#totalescomp').addClass('d-none');</script>
				";
				break;
		}
		$rCabecFactura = new ModeloFacturaBpm;
		$datrCabFac = $rCabecFactura->mdlRenderCabezoteFactura($tipo_comprobante);
		$datCBFT = json_decode($datrCabFac, true);
		echo $datCBFT[0]["serie"] . "-" . $datCBFT[0]["correlativo"];
		break;
	// -------------------------------------------
	case 'getComprobanteVenta':
		# code...
		include '../modelos/facturador.modelo.php';
		$fecha_creacion = $_POST['fecha_creacion'];
		$fecha_contable = $_POST['fecha_contable'];
		$fecha_vencimiento = $_POST['fecha_vencimiento'];
		$nombre_cliente = $_POST['nombre_cliente'];
		$num_docu_identidad = $_POST['num_docu_identidad'];
		$direccion = $_POST['direccion'];
		$doc_org_de_comp = $_POST['doc_org_de_comp'];
		$idBpm = $_POST['idBpm'];
		$estado_envio = $_POST['estado_envio'];
		$estado_tributatio = $_POST['estado_tributatio'];
		$cajera = $_SESSION["nombre"];
		$tipo_operacion = $_POST['tipo_operacion'];
		$total_gravada = $_POST['total_gravada'];
		$total_exonerada = $_POST['total_exonerada'];
		$total_inafecta = $_POST['total_inafecta'];
		$igv = $_POST['igv'];
		$total = $_POST['total'];
		$tipo_pago = $_POST['tipo_pago'];
		$efectivo_recibido = $_POST['efectivo_recibido'];
		$vuelto_entregado = $_POST['vuelto_entregado'];
		$cod_transaccion = $_POST['cod_transaccion'];

		switch (strlen($num_docu_identidad)) {
			case '8':
				# code...
				$tipo_comprobante = "03";
				break;
			case '11':
				# code...
				$tipo_comprobante = "01";
				break;
		}

		$getComprobanteVenta = new ModeloFacturaBpm;
		$getComp = $getComprobanteVenta->mdlnewComprobanteVenta($fecha_contable, $fecha_vencimiento, $nombre_cliente, $num_docu_identidad, $direccion, $doc_org_de_comp, $idBpm, $estado_envio, $estado_tributatio, $cajera, $tipo_operacion, $total_gravada, $total_exonerada, $total_inafecta, $igv, $total, $tipo_pago, $efectivo_recibido, $vuelto_entregado, $cod_transaccion, $tipo_comprobante);

		break;
	// -------------------------------------------	
	case '5':
		# code...
		echo "5";
		break;
	// -------------------------------------------	
	case '6':
		# code...
		echo "6";
		break;
	// -------------------------------------------	
	case '7':
		# code...
		echo "7";
		break;
	case 'AgregarDataextra':
		if (!class_exists('ModeloFacturaBpm')) {
			include '../modelos/facturador.modelo.php';
		}
		$tabla = "facturas";
		$datos = array(
			"forma_pago" => isset($_POST["forma_pago"]) ? $_POST["forma_pago"] : '',

			"row_g_1" => isset($_POST["row_g_1"]) ? $_POST["row_g_1"] : '',
			"row_s_1" => isset($_POST["row_s_1"]) ? $_POST["row_s_1"] : '',
			"row_c_1" => isset($_POST["row_c_1"]) ? $_POST["row_c_1"] : '',

			"row_g_2" => isset($_POST["row_g_2"]) ? $_POST["row_g_2"] : '',
			"row_s_2" => isset($_POST["row_s_2"]) ? $_POST["row_s_2"] : '',
			"row_c_2" => isset($_POST["row_c_2"]) ? $_POST["row_c_2"] : '',

			"row_g_3" => isset($_POST["row_g_3"]) ? $_POST["row_g_3"] : '',
			"row_s_3" => isset($_POST["row_s_3"]) ? $_POST["row_s_3"] : '',
			"row_c_3" => isset($_POST["row_c_3"]) ? $_POST["row_c_3"] : '',

			"row_g_4" => isset($_POST["row_g_4"]) ? $_POST["row_g_4"] : '',
			"row_s_4" => isset($_POST["row_s_4"]) ? $_POST["row_s_4"] : '',
			"row_c_4" => isset($_POST["row_c_4"]) ? $_POST["row_c_4"] : '',

			"row_g_5" => isset($_POST["row_g_5"]) ? $_POST["row_g_5"] : '',
			"row_s_5" => isset($_POST["row_s_5"]) ? $_POST["row_s_5"] : '',
			"row_c_5" => isset($_POST["row_c_5"]) ? $_POST["row_c_5"] : '',

			"row_g_6" => isset($_POST["row_g_6"]) ? $_POST["row_g_6"] : '',
			"row_s_6" => isset($_POST["row_s_6"]) ? $_POST["row_s_6"] : '',
			"row_c_6" => isset($_POST["row_c_6"]) ? $_POST["row_c_6"] : '',

			"row_g_7" => isset($_POST["row_g_7"]) ? $_POST["row_g_7"] : '',
			"row_s_7" => isset($_POST["row_s_7"]) ? $_POST["row_s_7"] : '',
			"row_c_7" => isset($_POST["row_c_7"]) ? $_POST["row_c_7"] : '',

			"row_g_8" => isset($_POST["row_g_8"]) ? $_POST["row_g_8"] : '',
			"row_s_8" => isset($_POST["row_s_8"]) ? $_POST["row_s_8"] : '',
			"row_c_8" => isset($_POST["row_c_8"]) ? $_POST["row_c_8"] : '',

			"row_g_9" => isset($_POST["row_g_9"]) ? $_POST["row_g_9"] : '',
			"row_s_9" => isset($_POST["row_s_9"]) ? $_POST["row_s_9"] : '',
			"row_c_9" => isset($_POST["row_c_9"]) ? $_POST["row_c_9"] : '',

			"row_g_10" => isset($_POST["row_g_10"]) ? $_POST["row_g_10"] : '',
			"row_s_10" => isset($_POST["row_s_10"]) ? $_POST["row_s_10"] : '',
			"row_c_10" => isset($_POST["row_c_10"]) ? $_POST["row_c_10"] : '',

			"row_g_11" => isset($_POST["row_g_11"]) ? $_POST["row_g_11"] : '',
			"row_s_11" => isset($_POST["row_s_11"]) ? $_POST["row_s_11"] : '',
			"row_c_11" => isset($_POST["row_c_11"]) ? $_POST["row_c_11"] : '',

			"row_g_12" => isset($_POST["row_g_12"]) ? $_POST["row_g_12"] : '',
			"row_s_12" => isset($_POST["row_s_12"]) ? $_POST["row_s_12"] : '',
			"row_c_12" => isset($_POST["row_c_12"]) ? $_POST["row_c_12"] : '',

			"receptor" => $_POST["dir_receptor"],
			"cliente" => $_POST["dir_cliente"],
			"moneda" => $_POST["moneda"],
			"observacion" => $_POST["observacion"],
			"orden_compra" => $_POST["orden_compra"],
			"leyenda" => $_POST["leyenda"],
			"bien_servicio" => $_POST["bien_servicio"],
			"medio_pago" => $_POST["medio_pago"],
			"total_cuotas" => $_POST["totalCuotas"],

			"cuotas_1" => isset($_POST["cuotas_1"]) ? $_POST["cuotas_1"] : '',
			"fecha_1" => isset($_POST["fecha_1"]) ? $_POST["fecha_1"] : null,
			"cuotas_2" => isset($_POST["cuotas_2"]) ? $_POST["cuotas_2"] : '',
			"fecha_2" => isset($_POST["fecha_2"]) ? $_POST["fecha_2"] : null,
			"cuotas_3" => isset($_POST["cuotas_3"]) ? $_POST["cuotas_3"] : '',
			"fecha_3" => isset($_POST["fecha_3"]) ? $_POST["fecha_3"] : null,
			"cuotas_4" => isset($_POST["cuotas_4"]) ? $_POST["cuotas_4"] : '',
			"fecha_4" => isset($_POST["fecha_4"]) ? $_POST["fecha_4"] : null,
			"cuotas_5" => isset($_POST["cuotas_5"]) ? $_POST["cuotas_5"] : '',
			"fecha_5" => isset($_POST["fecha_5"]) ? $_POST["fecha_5"] : null,
			"cuotas_6" => isset($_POST["cuotas_6"]) ? $_POST["cuotas_6"] : '',
			"fecha_6" => isset($_POST["fecha_6"]) ? $_POST["fecha_6"] : null,
			"cuotas_7" => isset($_POST["cuotas_7"]) ? $_POST["cuotas_7"] : '',
			"fecha_7" => isset($_POST["fecha_7"]) ? $_POST["fecha_7"] : null,
			"cuotas_8" => isset($_POST["cuotas_8"]) ? $_POST["cuotas_8"] : '',
			"fecha_8" => isset($_POST["fecha_8"]) ? $_POST["fecha_8"] : null,
			"cuotas_9" => isset($_POST["cuotas_9"]) ? $_POST["cuotas_9"] : '',
			"fecha_9" => isset($_POST["fecha_9"]) ? $_POST["fecha_9"] : null,
			"cuotas_10" => isset($_POST["cuotas_10"]) ? $_POST["cuotas_10"] : '',
			"fecha_10" => isset($_POST["fecha_10"]) ? $_POST["fecha_10"] : null,

			"id_cabecera" => $_POST["id_2"]
		);
		$rCabecFactura = new ModeloFacturaBpm;
		if($_POST['funcion']=='update'){
			$datrCabFac = $rCabecFactura->updateVenta($tabla, $datos);
		}else{
			$datrCabFac = $rCabecFactura->crearVenta($tabla, $datos);
		}

		echo json_encode($datrCabFac);
		// return json_encode($datrCabFac);
		break;
	// -------------------------------------------	
	default:
		# code...
		echo "FOUNDsssssssssssssssssssssssssssssssssssssssssssss";
		break;
}