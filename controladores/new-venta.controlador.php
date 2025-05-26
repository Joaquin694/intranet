<?php
date_default_timezone_set('America/Lima');
session_start();
if (isset($_SESSION['usuario'])) {
	# code...
	switch ($_POST['accion']) {
		case 'item__para_la_venta':
			require_once "../modelos/new-venta.modelo.php";


			$ojete1 = new ModeloPanelFacturaBpm();
			$ojete2 = $ojete1->view___datos_maestros($_POST['tipoDatoMaestro']);
			$view_data_maestra = json_decode($ojete2, true);



			for ($i = 0; $i < count($view_data_maestra); $i++) {
				$stock_disponible = $view_data_maestra[$i]["stock"];
				if (($stock_disponible < 10) and ($stock_disponible > 0)) {
					# code...
					$class_color = "btn-danger";
				} elseif (($stock_disponible >= 10) and ($stock_disponible < 50)) {
					# code...
					$class_color = "btn-warning";
				} elseif ($stock_disponible >= 50) {
					# code...
					$class_color = "btn-success";
				} else {
					$class_color = "btn-info";
				}
				?>


				<tr class="trTable" id='<?php echo $view_data_maestra[$i]["codigo_x_tipo_item"]; ?>'>
					<td><img src="<?php echo $view_data_maestra[$i]["imagen"]; ?>" class="img-thumbnail" width="40px"></td>
					<td><?php echo $view_data_maestra[$i]["codigo"]; ?></td>
					<td><span contenteditable="true" class="nameprotuto">
							<?php echo $view_data_maestra[$i]["nombre_producto"]; ?></span></td>
					<td class="text-center">
						<span id='itenStockDisp<?php echo $view_data_maestra[$i]["codigo_x_tipo_item"]; ?>'
							class="<?php echo $class_color; ?>"
							style="padding: 4px 10px;border-radius: 3px;"><?php echo $view_data_maestra[$i]["stock"]; ?></span>
					</td>
					<td><span style="font-size: 17px">S/</span><span
							id="idPV<?php echo $view_data_maestra[$i]["codigo_x_tipo_item"]; ?>" contenteditable="true"
							style="font-size: 17px"><?php echo $view_data_maestra[$i]["precio_venta"]; ?></span></td>
					<td>
						<div class="btn-group">
							<input id='inputItenCantidad<?php echo $view_data_maestra[$i]["codigo_x_tipo_item"]; ?>'
								id_item='<?php echo $view_data_maestra[$i]["codigo_x_tipo_item"]; ?>'
								codigo_x_tipo_item='<?php echo $view_data_maestra[$i]["codigo_x_tipo_item"]; ?>'
								codigo='<?php echo $view_data_maestra[$i]["codigo"]; ?>'
								nombre_producto='<?php echo $view_data_maestra[$i]["nombre_producto"]; ?>'
								stock='<?php echo $view_data_maestra[$i]["stock"]; ?>' class="input-number" type="number"
								style="width: 47px;font-size: 15px" max="0" step="any" required>
						</div>
					</td>
				</tr>
				<?php
			} ?>
			<script type="text/javascript">
				$(document).ready(function () {


					// Detectar cambios en el contenido editable de cada fila
					$("span.nameprotuto[contenteditable='true']").on("input", function () {
						// Obtener el nuevo contenido del span
						let nuevoNombreProducto = $(this).text();

						// Identificar la fila actual y buscar el input correspondiente dentro de esa fila
						let codigoItem = $(this).closest("tr").attr("id");

						// Actualizar solo el input de la fila correspondiente
						$(this)
							.closest("tr")
							.find("input.input-number")
							.attr("nombre_producto", nuevoNombreProducto);
					});
					// ========================================================================
					var count_item_array_body = 0;

					//REMOVE LINE
					$(".delete-row").click(function () {
						$("table tbody").find('input[name="chbItem"]').each(function () {
							if ($(this).is(":checked")) {
								$(this).parents("tr").remove();

								var total_culofon_table = parseFloat($('#importeTotalTabla').text()); //Recogemos el valor total del pie de tabla

								var codigo_x_tipo_item = $(this).attr("codigo_x_tipo_item");


								var cantidadPicada = $(this).attr("cantidaditem");
								var stockResidual = $(this).attr("stock_resultante");
								var total__cobrar = $(this).attr("total__cobrar");

								if (stockResidual == 'stock_resultante') {
									// statement
									console.log("servicio desagregado");
								} else {
									// statement
									$("#itenStockDisp" + codigo_x_tipo_item).text(parseFloat(cantidadPicada) + parseFloat(stockResidual));
								}

								$("#inputItenCantidad" + codigo_x_tipo_item).prop('disabled', false);
								$("#inputItenCantidad" + codigo_x_tipo_item).val("");
								$("#" + codigo_x_tipo_item).removeClass("painttr");

								$("#inputItenCantidad" + codigo_x_tipo_item).focus();

								// ESCRIBIMOS EN EL COLOFON DE TABLA EL TOTAL
								$('#importeTotalTabla').text((total_culofon_table - total__cobrar).toFixed(2));
								var tipoOperacion_colorfonico = $('input[name="rdbTipoOperacion"]:checked').val();
								$('#' + tipoOperacion_colorfonico).trigger('click');


								//REMOVE ITEM DE ARRAY
								var count_item_array_body = parseFloat($(this).attr("count_item_array_body"));
								delete end_sales[count_item_array_body]; /*aca captur el indice del elemento que va siendo eliminado de table*/
								// arr.splice(0,n);          /*ACA FALTA DEFINIR FUNCION PARA ELIMINAR ITEM DE ARRAY A PARTIR DE NUM INDICE*/
							}
						});
					});

					// FUNCION ADD LINE TABLE
					function add_row_abad(cantidadItem, id_item, codigo_x_tipo_item, codigo, nombre_producto, precio_venta, stock, stock_resultante) {
						//Recogemos el valor total del pie de tabla
						$("#delete-row").prop('disabled', false);
						var total_culofon_table = parseFloat($('#importeTotalTabla').text());

						var cantidadItem = cantidadItem;
						var id_item = id_item;
						var codigo_x_tipo_item = codigo_x_tipo_item;
						var codigo = codigo;
						var nombre_producto = nombre_producto;
						var precio_venta = precio_venta;
						var stock = stock;
						var stock_resultante = stock_resultante;


						var total__cobrar = cantidadItem * precio_venta;

						pinta_filas_vendidas(codigo_x_tipo_item);
						console.log(cantidadItem, id_item, codigo_x_tipo_item, codigo, nombre_producto, precio_venta, stock, stock_resultante);

						var markup = "<tr><td><input count_item_array_body=" + count_item_array_body + " total__cobrar=" + total__cobrar.toFixed(2) + "  codigo_x_tipo_item=" + codigo_x_tipo_item + " stock=" + stock + " cantidadItem=" + cantidadItem + " stock_resultante=" + stock_resultante + "  type='checkbox' name='chbItem'></td><td>" + codigo + "</td><td>" + nombre_producto + "</td><td>" + cantidadItem + "</td><td style='text-align: right;'>" + precio_venta + "</td><td style='text-align: right;'>" + total__cobrar.toFixed(3) + "</td></tr>";
						$("#tboDyPreventa").prepend(markup);


						// ESCRIBIMOS EN EL COLOFON DE TABLA EL TOTAL
						$('#importeTotalTabla').text((total_culofon_table + total__cobrar).toFixed(3));
						var tipoOperacion_colorfonico = $('input[name="rdbTipoOperacion"]:checked').val();
						$('#' + tipoOperacion_colorfonico).trigger('click');

						// ACTIVAMOS BOTON DE GUARDAR SI EL TOTAL ES MAYOR A 0 Y YA SE A ELEGIDO METODO DE PAGO
						var selectMetodoPago = $('#selectMetodoPago').val();

						if (selectMetodoPago.length > 0) {
							// statement
							$('#btnGuardarVenta').prop('disabled', false);
						} else {
							// statement
							$('#btnGuardarVenta').prop('disabled', true);
						}


						// ADD ELEMENT ARRAY PARA FINAL VENTA alert(end_sales);
						end_sales.push('{"codigo_x_tipo_item":"' + codigo_x_tipo_item + '","codigo":"' + codigo + '","nombre_producto":"' + nombre_producto + '","precio_venta":"' + precio_venta + '","stock":"' + stock + '","stock_resultante":"' + stock_resultante + '","cantidadItem":"' + cantidadItem + '","total_cobrar":"' + total__cobrar.toFixed(3) + '"}');




						count_item_array_body = count_item_array_body + 1;



					}

					// PICANDO ADD TO CARR SHOP
					$(".input-number").keydown(function (objEvent) {
						if ((objEvent.keyCode == 69) || (objEvent.keyCode == 187) || (objEvent.keyCode == 189) || (objEvent.keyCode == 107) || (objEvent.keyCode == 109)) { //tab pressed
							objEvent.preventDefault(); // stops its action
						} else if (objEvent.keyCode == 13) {



							var cantidadItem = parseFloat($(this).val());
							var id_item = parseFloat($(this).attr("id_item").replace(/[^\d.-]/g, ''));
							var codigo_x_tipo_item = $(this).attr("codigo_x_tipo_item");
							var codigo = $(this).attr("codigo");
							var nombre_producto = $(this).attr("nombre_producto");
							var precio_venta = parseFloat($("#idPV" + codigo_x_tipo_item).text()).toFixed(3);

							var stock = $(this).attr("stock");

							// alert(precio_venta);
							// return false;   ACA FALTA TRAER LAS DOS VARIABLES  DE ATRIBUTO QUE ESTAN AÑADIDAS EN EL SELECT delete

							// var stockValue = $('#inputItenCantidad').attr('stock');

							if (isNaN(cantidadItem)) {
								alert('El valor proporcionado no es un número');
								throw new Error('El valor proporcionado no es un número');
							}

							if (codigo.substr(0, 5) == "SERVI") {
								console.log("Stock no cambia ya que se trata de un servicio");
								$(this).prop('disabled', true);
								// add fila
								add_row_abad(cantidadItem, id_item, codigo_x_tipo_item, codigo, nombre_producto, precio_venta, stock, 'stock_resultante');
							} else if (codigo.substr(0, 5) == "HERLU") {
								if (stock >= cantidadItem) {
									var stock_resultante = parseFloat(stock) - cantidadItem;
									$("#itenStockDisp" + codigo_x_tipo_item).text(stock_resultante);
									$(this).prop('disabled', true);
									// add fila
									add_row_abad(cantidadItem, id_item, codigo_x_tipo_item, codigo, nombre_producto, precio_venta, stock, stock_resultante);
								} else {
									// statement
									alert("Cuidado no dispones del stock necesario para la veta");
									$(this).prop('disabled', false);
									$("#inputItenCantidad" + codigo_x_tipo_item).val("");
								}
							}
						}
					});

					// INPUT BUSCADOR
					$("#search").on("keyup", function () {
						var value = $(this).val().toLowerCase();
						$("#tbodyDmItemID tr").filter(function () {
							$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
						});
					});
				});
			</script>
			<?php
			break;
		// ------------------------------------------------------------------------------------------------------------------------------
		case 'ult_correlativo':
			require_once "../modelos/new-venta.modelo.php";
			$view_data_maestra = json_decode(ModeloPanelFacturaBpm::ult_correlativo($_POST['tipo_documento']), true);
			echo $view_data_maestra[0]["serie"] . "-" . $view_data_maestra[0]["correlativo"];

			break;
		// ------------------------------------------------------------------------------------------------------------------------------
		case 'load_data_clientes_moali':

			require_once "../modelos/new-venta.modelo.php";
			$view_data_maestra = json_decode(ModeloPanelFacturaBpm::render_clientes($_POST['tipoPersona']), true);
			for ($i = 0; $i < count($view_data_maestra); $i++) {
				# code...
				echo '<option pk="' . $view_data_maestra[$i]["id"] . '" direccion="' . $view_data_maestra[$i]["direccion"] . '" documento="' . $view_data_maestra[$i]["documento"] . '">
					' . substr($view_data_maestra[$i]["nombre"], 0, 60) . '</option>';
			}
			break;
		// ------------------------------------------------------------------------------------------------------------------------------
		case 'guardar_factura_directa':
			require_once "../modelos/new-venta.modelo.php";

			$idfFechaEmitido____ = $_POST['idfFechaEmitido']; /*2020-05-15 */
			$idFFechaVencimiento = $_POST['idFFechaVencimiento']; /*2020-05-15 */
			$serie_correlativo__ = $_POST['serie_correlativo']; /*B001-11*/
			$inputDocuIdentidad_ = $_POST['inputDocuIdentidad']; /*48339581*/
			$tipoDePago_i_______ = $_POST['tipoDePago_i']; /*Pendiente*/
			$idtarjcodeoperacion = $_POST['idtarjcodeoperacion']; /**/
			$idOpGravada________ = $_POST['idOpGravada']; /**/
			$idExonerada________ = $_POST['idExonerada']; /**/
			$idIgv______________ = $_POST['idIgv']; /**/
			$idPagoT____________ = $_POST['idPagoT']; /**/

			$importeTotalTabla_i = $_POST['importeTotalTabla_i']; /**/
			$slctDataClientes_i_ = $_POST['slctDataClientes_i']; /*LEYNER ADAN ABAD ESQUEN*/
			$accion_____________ = $_POST['accion']; /*guardar_factura_directa*/
			$codigo_unico_______ = $_POST['porcentajeDetraccion'];
			$idfDireccion_______ = $_POST['idfDireccion'];

			if (($tipoDePago_i_______ === 'Pendiente') or ($tipoDePago_i_______ === 'TC') or ($tipoDePago_i_______ === 'TD')) {
				# code...
				$inputEfectivo______ = '0.00';
				$idvueltoDeCobro____ = '0.00';
			} else {
				$inputEfectivo______ = $_POST['inputEfectivo']; /**/
				$idvueltoDeCobro____ = $_POST['idvueltoDeCobro']; /**/
			}

			switch (strlen($inputDocuIdentidad_)) {
				case '8':
					# code...
					$tipo_comprobante = "03";
					break;
				case '11':
					# code...
					$tipo_comprobante = "01";
					break;
			}

			if ($idOpGravada________ > 0) {
				# code...
				$tipo_operacion = 'opGravada';
			} elseif ($idExonerada________ > 0) {
				# code...
				$tipo_operacion = 'opExonerada';
			}

			// NOTE: INSERT INTO DE FACTURA CABECERA
			// ============================================ debug =================================================			
			$miVariablec = "-- " . $idfFechaEmitido____ . " --\n" .
				"-- " . $idFFechaVencimiento . " --\n" .
				"-- " . $slctDataClientes_i_ . " --\n" .
				"-- " . $inputDocuIdentidad_ . " --\n" .
				"-- " . $idfDireccion_______ . " --\n" .
				"-- " . $codigo_unico_______ . " --\n" .
				"-- '0' --\n" .
				"-- 'No enviado' --\n" .
				"-- 'Libro si' --\n" .
				"-- " . $_SESSION['nombre'] . " --\n" .
				"-- " . $tipo_operacion . " --\n" .
				"-- " . $idOpGravada________ . " --\n" .
				"-- " . $idExonerada________ . " --\n" .
				"-- '0.00' --\n" .
				"-- " . $idIgv______________ . " --\n" .
				"-- " . $idPagoT____________ . " --\n" .
				"-- " . $tipoDePago_i_______ . " --\n" .
				"-- " . $inputEfectivo______ . " --\n" .
				"-- " . $idvueltoDeCobro____ . " --\n" .
				"-- " . $idtarjcodeoperacion . " --\n" .
				"-- " . $tipo_comprobante . " --\n" .
				"-- " . $_POST['end_sales_i'] . " --";



			// Ruta y nombre del archivo donde se guardará el contenido
			$archivo = "modelNewVenta.txt";

			// Guardar el contenido en el archivo
			file_put_contents($archivo, $miVariablec);
			// ============================================ debug =================================================						

			// TODO: Falata incluir demas variables a partir de $tipo_pago
			$getComprobanteVenta = new ModeloPanelFacturaBpm;
			$getComp = $getComprobanteVenta->mdlnewComprobanteVenta($idfFechaEmitido____, $idFFechaVencimiento, $slctDataClientes_i_, $inputDocuIdentidad_, $idfDireccion_______, $codigo_unico_______, '0', 'No enviado', 'Libro si', $_SESSION['nombre'], $tipo_operacion, $idOpGravada________, $idExonerada________, '0.00', $idIgv______________, $idPagoT____________, $tipoDePago_i_______, $inputEfectivo______, $idvueltoDeCobro____, $idtarjcodeoperacion, $tipo_comprobante, $_POST['end_sales_i']);


			// NOTE: INSERT INTO DE FACTURA CUERPO

			break;
		// ------------------------------------------------------------------------------------------------------------------------------
		case 'productos_servicios_disponibles':
			// unset($_SESSION['items_disponibles']);			
			// $_SESSION['items_disponibles']= $ojete1->view___datos_maestros('TOCKEN');
			require_once "../modelos/new-venta.modelo.php";
			$ojete1 = new ModeloPanelFacturaBpm();
			$dataret = $ojete1->view___datos_maestros('TOCKENt');
			echo $dataret;

			break;
		// ------------------------------------------------------------------------------------------------------------------------------



		case 'search_products_cotizacion':
			header("Content-Type: application/json");
			$srchterm = $_POST['search'];
			require_once "../modelos/new-venta.modelo.php";
			$mnc = new ModeloPanelFacturaBpm();
			$dataret = $mnc->search_products_cotizacion($srchterm);
			echo json_encode($dataret);
			break;
		// ------------------------------------------------------------------------------------------------------------------------------
		case 'registro_cotizacion':
			header("Content-Type: application/json");
			require_once "../modelos/new-venta.modelo.php";
			if (!empty($_POST['id_cotizacion'])) {

				$mnc = new ModeloPanelFacturaBpm();
				$dataret = $mnc->editar_cotizacion($_POST);
				echo json_encode($dataret);

			} else {

				$mnc = new ModeloPanelFacturaBpm();
				$dataret = $mnc->registro_cotizacion($_POST);
				if (!empty($_POST['email'])) {
					$id = $dataret['id'];
					$encoded_id = base64_encode($id);
					$url = "https://localhost/intranet/controladores/pdf.controlador.php?id={$encoded_id}&deque=pdf_cotizacion";
					$dataret['url'] = $url;

					$email = $_POST['email'];
					$nombreCliente = "VENTAS";
					$asunto = "cotizacion de la fecha : {$_POST['fecha_emision']}";
					$contenido = "Su cotización ha sido registrada exitosamente.";
					$contenido_cuerpo =
						"Estimados,
						<br><br>
						Por medio se les hace presente el adjunto de la cotización correspondiente.<br> 
						Puede revisar los detalles de la cotización a través del siguiente enlace:
						<br><br>
						{$url}
						<br><br>
						Quedamos a su disposición para cualquier consulta adicional o aclaración que requieran.
						<br><br>
						Atentamente,
						<br><br>
						HERMOZA LUZ.";

					$postFields = http_build_query(array(
						'key' => 'Andromed42018@@',
						'laaction' => 'send___email_gmail_masivo',
						'txtEmailCliente' => $email,
						'txtNameRemit' => 'HERMOZA LUZ',
						'txtNameCliente' => $nombreCliente,
						'txtAsunto' => $asunto,
						'txtContenido' => $contenido_cuerpo,
						'txtEmailRemite' => 'hey.alerta.notification@gmail.com',
						'txtPasswordRemite' => 'fqjbsztcnkgqphil'
					));
					$curl = curl_init();
					curl_setopt_array($curl, array(
						CURLOPT_URL => 'http://200.121.128.43/inppares_rest_full/controladores/email.controlador.php',
						CURLOPT_RETURNTRANSFER => true,
						CURLOPT_ENCODING => '',
						CURLOPT_MAXREDIRS => 10,
						CURLOPT_TIMEOUT => 0,
						CURLOPT_FOLLOWLOCATION => true,
						CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						CURLOPT_CUSTOMREQUEST => 'POST',
						CURLOPT_POSTFIELDS => $postFields,
						CURLOPT_HTTPHEADER => array(
							'Content-Type: application/x-www-form-urlencoded'
						),
					));

					$response = curl_exec($curl);
					curl_close($curl);
					$dataret['email_response'] = $response;
				}
				echo json_encode($dataret);
			}
			break;
		// ------------------------------------------------------------------------------------------------------------------------------
		case 'load_cotizacion':
			require_once "../modelos/new-venta.modelo.php";
			$fechaini = $_POST['fechaInicio'];
			$fechafin = $_POST['fechaFinal'];
			$viewListBpm = new ModeloPanelFacturaBpm;
			$render_facturation = $viewListBpm->load_cotizacion($fechaini, $fechafin);
			$render_facturation = $render_facturation['data'];
			//echo json_encode($render_facturation);
			//exit;
			?>
			<table class="table table-bordered table-sm" id="cuerpito_tabla">
				<thead>
					<tr>
						<th style="font-weight: 700;background: #5e5e5e !important;color: white">#</th>
						<!-- <th style="font-weight: 700;background: #5e5e5e !important;color: white">DET</th> -->
						<th style="font-weight: 700;background: #5e5e5e !important;color: white">CORRELATIVO</th>
						<th style="font-weight: 700;background: #5e5e5e !important;color: white">CLIENTE</th>
						<th style="font-weight: 700;background: #5e5e5e !important;color: white">FECHA DE EMISION</th>
						<th style="font-weight: 700;background: #5e5e5e !important;color: white">FECHA DE VENCIMIENTO</th>
						<th style="font-weight: 700;background: #5e5e5e !important;color: white">IMPORTE TRANSACCION</th>
						<th style="font-weight: 700;background: #5e5e5e !important;color: white">FECHA DE CREACION</th>
						<th style="font-weight: 700;background: #5e5e5e !important;color: white">PDF</th>
						<th style="font-weight: 700;background: #5e5e5e !important;color: white">Acción</th>
					</tr>
				</thead>
				<tbody class="buscar">
					<?php
					$dinero_total = 0;
					for ($i = 0; $i < count($render_facturation); $i++) {
						$id = $render_facturation[$i]["id_cotizacion"];
						?>
						<tr style="background: white" id="<?php echo $render_facturation[$i]["id_cotizacion"] . 'painttr'; ?>">
							<td><?php echo $i + 1; ?></td>
							<td>N°<?php printf('%08d', $render_facturation[$i]["id_cotizacion"]); ?></td>
							<td><?php echo $render_facturation[$i]["nombre_cliente"]; ?></td>
							<td><?php echo $render_facturation[$i]["fecha_emision_cotizacion"]; ?></td>
							<td><?php echo $render_facturation[$i]["fecha_vencimiento_cotizacion"]; ?></td>
							<td><?php echo number_format($render_facturation[$i]["total_cotizacion"], 2); ?></td>
							<td><?php echo date("d/m/y H:i A", strtotime($render_facturation[$i]["fecha_registro"])) ?></td>
							<td><img onclick="window.open('./controladores/pdf.controlador.php?id=<?php echo base64_encode($id) ?>&deque=pdf_cotizacion','_blank'),pinta_filas('1863painttr')"
									src="vistas/img/plantilla/pdf.png" style="width: 35px  !important"></td>
							<td>
								<a style="margin-top: 4px !important" class="btn btn-info btn-xs btnAgregarTransport"
									data-id="<?php echo $render_facturation[$i]['id_cotizacion']; ?>" data-toggle="modal"
									data-target="#_modalDatosTransport">
									<i class="fa fa-pencil"></i> Agregar Datos transporte
								</a>
								<a style="margin-top: 4px !important" class="btn btn-info btn-xs btnEditarCotizacion"
									data-id="<?php echo $render_facturation[$i]['id_cotizacion']; ?>" data-toggle="modal"
									data-target="#modalEditarCotizacion">
									<i class="fa fa-pencil"></i> Editar Cotización
								</a>
							</td>

						</tr>
					<?php } ?>
				</tbody>
			</table>
			<?php
			break;
		case 'load_detalle_cotizacion':
			header("Content-Type: application/json");
			require_once "../modelos/new-venta.modelo.php";
			$id_compra = $_POST['id_compra'];
			$viewListBpm = new ModeloPanelFacturaBpm;
			$datBPMi = $viewListBpm->load_detalle_cotizacion($id_compra);
			echo json_encode($datBPMi, true);
			break;
		// ------------------------------------------------------------------------------------------------------------------------------
		// ------------------------------------------------------------------------------------------------------------------------------
		case 'buscar_cliente_big':
			header("Content-Type: application/json");
			require_once "../modelos/new-venta.modelo.php";
			$term = $_POST['term'];
			$viewListBpm = new ModeloPanelFacturaBpm;
			$datBPMi = $viewListBpm->buscar_cliente_big($term);
			echo json_encode($datBPMi, true);

			break;
		// ------------------------------------------------------------------------------------------------------------------------------
		case 'otra_cosaB':
			echo "string";
			break;
		// ------------------------------------------------------------------------------------------------------------------------------

		case 'loadEdiatCotizacion':
			header("Content-Type: application/json");
			require_once "../modelos/new-venta.modelo.php";
			$term = $_POST['id'];
			$viewListBpm = new ModeloPanelFacturaBpm;
			$datBPMi = $viewListBpm->load_detalle_cotizacion($term);
			echo json_encode($datBPMi);
			break;
		// ------------------------------------------------------------------------------------------------------------------------------

		case 'ActualizarDataTransport':
			header("Content-Type: application/json");
			require_once "../modelos/new-venta.modelo.php";

			$tabla = "transport_data_cotizacion";
			$datos = array(
				"empresa" => $_POST["ameEmpresa"],
				"ruc" => $_POST["numRuc"],
				"marca" => $_POST["marca"],
				"placa" => $_POST["placa"],
				"conf_vehicular" => $_POST["confVehicular"],
				"hab_vehicular" => $_POST["habVehicular"],
				"conductor" => $_POST["conductor"],
				"licencia" => $_POST["licencia"],
				"equipo" => $_POST["equipo"],
				"fk_cotizacion" => $_POST["id"],
			);
			$respuesta = ModeloPanelFacturaBpm::mdlGuardataDataTransport($tabla, $datos);
			if ($respuesta == "ok") {
				echo json_encode(["status" => $respuesta]);
			} else {
				echo json_encode(["status" => $respuesta]);
			}
			break;
		// ------------------------------------------------------------------------------------------------------------------------------
	}
} else {
	echo '<script>window.location="https://localhost/intranet/";</script>';
}

?>