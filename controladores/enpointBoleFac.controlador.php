<?php

if (empty(SESSION["iniciarSesion"]) || $_REQUEST["auth"] == '8BuOLSODJDC9E') {

	switch ($_POST['cod']) {
		case 'subirEndPoint':


			require_once "../modelos/interfast_cajera.modelo.php";

			$id  = $_POST['id'];
			$asd = json_decode(ModeloPanelFacturaBpm::saleClient($id), true);
			$listitems["items"] = array();
			$icount = count($asd);

			for ($i = 0; $i < $icount; $i++) {

				$idCabeza =  	$asd[$i]["idCabeza"];
				$serie	=		$asd[$i]["serie"];

				$serie1 = substr($serie, 0, 1);
				if ($serie1 == 'F') {
					$codigo_tipo_documento = '01';
					$codigo_numero_identi = 6;
				} elseif ($serie1 == "B") {
					$codigo_tipo_documento = '03';
					$codigo_numero_identi = 1;
				}
				$correlativo =	$asd[$i]["correlativo"];
				$fecha_creacion_cabeza	=	$asd[$i]["fecha_creacion_cabeza"];

				list($fechaCCabeza, $horaCCabeza,) = explode(' ', $fecha_creacion_cabeza);

				$asd[$i]["fecha_contable"];
				$fecha_vencimiento =	$asd[$i]["fecha_vencimiento"];
				$nombre_cliente  =		$asd[$i]["nombre_cliente"];
				$num_docu_identidad = 	$asd[$i]["num_docu_identidad"];
				$asd[$i]["direccion"];
				$asd[$i]["documento_origen_de_comprobante"];
				$asd[$i]["idBpm"];
				$asd[$i]["estado_envio"];
				$asd[$i]["estado_tributatio"];
				$asd[$i]["cajera"];
				$tipo_operacion	       = $asd[$i]["tipo_operacion"];
				$total_gravada         = $asd[$i]["total_gravada"];
				$total_exonerada       = $asd[$i]["total_exonerada"];
				$total_inafecta        = $asd[$i]["total_inafecta"];
				$igv                   = $asd[$i]["igv"];
				$total                 = $asd[$i]["total"];
				$tipo_pago             = $asd[$i]["tipo_pago"];
				$efectivo_recibido     = $asd[$i]["efectivo_recibido"];
				$vuelto_entregado      = $asd[$i]["vuelto_entregado"];
				$cod_transaccion       = $asd[$i]["cod_transaccion"];
				$cpe                   = $asd[$i]["cpe"];
				$cdr                   = $asd[$i]["cdr"];
				$data_send_json        = $asd[$i]["data_send_json"];
				$ruta_xml              = $asd[$i]["ruta_xml"];
				$respuesta_sunat       = $asd[$i]["respuesta_sunat"];
				$respuesta_sunat__json = $asd[$i]["respuesta_sunat__json"];

				if (strpos($asd[$i]["codigo"], 'SERVICIO') !== false) {
					$si_niuozz = 'ZZ';
				} else {
					$si_niuozz = 'NIU';
				}


				$retorn = array(
					"codigo_interno" 		     => $asd[$i]["idCuerpo"],
					"descripcion"			     => $asd[$i]["descripcion"],
					"codigo_producto_sunat"      => "",
					"codigo_producto_gsl"        => "",
					"unidad_de_medida"           => $si_niuozz,
					"cantidad"                   => $asd[$i]["cantidad"],
					"valor_unitario"             => $asd[$i]["precio_venta_unitario"],
					"codigo_tipo_precio"         =>  "01",
					"precio_unitario"            => $asd[$i]["precio_venta_unitario"],
					"codigo_tipo_afectacion_igv" =>  "20",
					"total_base_igv"             =>  $asd[$i]["precio_venta_total"],
					"porcentaje_igv"             =>  18,
					"total_igv"                  =>  0.00,
					"total_impuestos"            =>  0.00,
					"total_valor_item"           =>  $asd[$i]["precio_venta_total"],
					"total_item"                 =>  $asd[$i]["precio_venta_total"],

				);
								

				array_push($listitems["items"], $retorn);
			}

			if ($tipo_operacion == "opExonerada") {
				// print_r("aqui no");

				$curl = curl_init();
				curl_setopt_array($curl, array(
					CURLOPT_URL => 'https://moali.coderfrat.cpe.pe/api/documents',
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_ENCODING => '',
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 0,
					CURLOPT_FOLLOWLOCATION => true,
					CURLOPT_SSL_VERIFYPEER => 0,
 					CURLOPT_SSL_VERIFYHOST => 0,

					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => 'POST',
					CURLOPT_POSTFIELDS => '{
					"codigo_condicion_de_pago": "01",
						

					"serie_documento": "' . $serie . '",
					"numero_documento": "' . $correlativo . '",
					"fecha_de_emision": "' . $fechaCCabeza . '",
					"hora_de_emision": "' . $horaCCabeza . '",
					"codigo_tipo_operacion": "0101",
					"codigo_tipo_documento": "' . $codigo_tipo_documento . '",
					"codigo_tipo_moneda": "PEN",
					"fecha_de_vencimiento":"' . $fecha_vencimiento . '",
					"numero_orden_de_compra": "' . $idCabeza . '", 
					"datos_del_cliente_o_receptor":{
						"codigo_tipo_documento_identidad": "' . $codigo_numero_identi . '",
						"numero_documento": "' . $num_docu_identidad . '",
						"apellidos_y_nombres_o_razon_social": "' . $nombre_cliente . '",
						"codigo_pais": "PE",
						"ubigeo": "150101",
						"direccion": "Av. 2 de Mayo",
						"correo_electronico": "demo@gmail.com",
						"telefono": "427-1148"
					},
					"totales": {
						"total_exportacion": 0.00,
						"total_operaciones_gravadas": 0.00,
						"total_operaciones_inafectas": 0.00,
						"total_operaciones_exoneradas": ' . $total_exonerada . ',
						"total_operaciones_gratuitas": 0.00,
						"total_igv": 0.00,
						"total_impuestos": 0.00,
						"total_valor": ' . $total_exonerada . ',
						"total_venta": ' . $total_exonerada . '
					},
					"items": ' . json_encode($listitems["items"]) . '
					}',
					CURLOPT_HTTPHEADER => array(
						'Authorization: Bearer Wfa1WNb2zabjYZYoqJN5OECw8Yd6iCmifTjDYA5nzI0rsJCx1J',
						'Content-Type: application/json'
					),
				));

				$response = curl_exec($curl);
				curl_close($curl);


				print_r($response);


				$responser = json_decode($response);
				$success_paraif  = $responser->success;

				$response_json = base64_encode($response);           /* respuesta_sunat__json	 */
				$external_id = $responser->data->external_id;    /* external_id*/
				$cdr = base64_encode($responser->links->cdr);		/*cdr_link*/
				$pdf = base64_encode($responser->links->pdf);   /* pdf_link*/
				$xml = base64_encode($responser->links->xml);     /*	xml_link*/
				$description   = base64_encode($responser->response->description); /*description*/
				 
					$state_type_id = $responser->data->state_type_id;

				if ($success_paraif == true) {
					ModeloPanelFacturaBpm::updateCompovanteTrue($id, $response_json, $external_id, $cdr, $pdf, $xml, $description,$state_type_id);
				}
				if ($success_paraif == false) {
					ModeloPanelFacturaBpm::updateCompovanteFalse($id, $response_json, $external_id, $cdr, $pdf, $xml, $description,$state_type_id);
				}
					
			} elseif ($tipo_operacion == "opGravada") {


			
				$data = json_decode(ModeloPanelFacturaBpm::saleClient($id), true);
				$icount2 = count($data);
				
				$itemsArray = array();

					// print_r($data);

				for ($e = 0; $e < $icount2; $e++) {
				
					$valor_unitario_sin_IGV = round($data[$e]["precio_venta_unitario"] / 1.18, 2);
					$total_sin_IGV = round($data[$e]["precio_venta_total"] / 1.18, 2);
					$IGV = round($data[$e]["precio_venta_total"] - $total_sin_IGV, 2);
						

					$item = [
						"codigo_interno" => $data[$e]["idCuerpo"],
						"descripcion" => $data[$e]["descripcion"],
						"codigo_producto_sunat" => "85101503",
						"unidad_de_medida" => $si_niuozz,
						"cantidad" => round($data[$e]["cantidad"], 2),
						"valor_unitario" => sprintf("%.2f",$data[$e]["precio_venta_unitario"]),
						"codigo_tipo_precio" => "01",
						"precio_unitario" => sprintf("%.2f",$data[$e]["precio_venta_unitario"]*1.18),
						"codigo_tipo_afectacion_igv" => "10",
						"total_base_igv" =>  sprintf("%.2f",$data[$e]["precio_venta_total"]),
						"porcentaje_igv" => 18,
						"total_igv" => sprintf("%.2f",($data[$e]["cantidad"]*($data[$e]["precio_venta_unitario"]*1.18))-$data[$e]["precio_venta_total"]),
						"total_impuestos" => sprintf("%.2f",($data[$e]["cantidad"]*($data[$e]["precio_venta_unitario"]*1.18))-$data[$e]["precio_venta_total"]),
						"total_valor_item" =>  sprintf("%.2f",$data[$e]["precio_venta_total"]),
						"total_item" => sprintf("%.2f",$data[$e]["cantidad"]*($data[$e]["precio_venta_unitario"]*1.18))
					];
					
					array_push($itemsArray, $item);
				}
				
				$invoiceconigv = [
					"codigo_condicion_de_pago" => "01",
					"serie_documento" => $serie,
					"numero_documento" => $correlativo,
					"fecha_de_emision" => $fechaCCabeza,
					"hora_de_emision" => $horaCCabeza,
					"codigo_tipo_operacion" => "0101",
					"codigo_tipo_documento" => $codigo_tipo_documento,
					"codigo_tipo_moneda" => "PEN",
					"fecha_de_vencimiento" => $fecha_vencimiento,
					"numero_orden_de_compra" => $idCabeza,
					"datos_del_cliente_o_receptor" => [
						"codigo_tipo_documento_identidad" => $codigo_numero_identi,
						"numero_documento" => $num_docu_identidad,
						"apellidos_y_nombres_o_razon_social" => $nombre_cliente,
						"codigo_pais" => "PE",
						"ubigeo" => "150101",
						"direccion" => "Av. 2 de Mayo",
						"correo_electronico" => "demo@gmail.com",
						"telefono" => "427-1148"
					],
					"totales" => [
						"total_exportacion" => 0.00,
						"total_operaciones_gravadas" => $total_gravada,
						"total_operaciones_inafectas" => 0.00,
						"total_operaciones_exoneradas" => 0.00,
						"total_operaciones_gratuitas" => 0.00,
						"total_igv" => $igv,
						"total_impuestos" => $igv,
						"total_valor" => $total_gravada,
						"total_venta" => $total
					],
					"items" => $itemsArray,
					"acciones" => [
						"formato_pdf" => "a4",
						"enviar_xml_firmado" => true
					]
				];
				
				$data_send=json_encode($invoiceconigv, JSON_PRETTY_PRINT);
				
				// var_dump($data_send);

			$curl2 = curl_init();

			// echo json_encode($jsonData);

			curl_setopt_array($curl2, array(
				CURLOPT_URL => 'https://moali.coderfrat.cpe.pe/api/documents',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_SSL_VERIFYPEER => 0,
				 CURLOPT_SSL_VERIFYHOST => 0,

				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>  $data_send,  // Aquí es donde se realiza el cambio
				CURLOPT_HTTPHEADER => array(
						'Authorization: Bearer Wfa1WNb2zabjYZYoqJN5OECw8Yd6iCmifTjDYA5nzI0rsJCx1J',
						'Content-Type: application/json'
					),
				));
		


				$response2 = curl_exec($curl2);
				curl_close($curl2);
				print_r($response2);

				$responser = json_decode($response2);
				$success_paraif  = $responser->success;

				$response_json = base64_encode($response2);     
				$external_id = $responser->data->external_id;    
				$cdr = base64_encode($responser->links->cdr);	
				$pdf = base64_encode($responser->links->pdf);  
				$xml = base64_encode($responser->links->xml);    
				$description = base64_encode($responser->response->description); 

				if ($success_paraif == true) {
					ModeloPanelFacturaBpm::updateCompovanteTrue($id, $response_json, $external_id, $cdr, $pdf, $xml, $description);
				}
				if ($success_paraif == false) {
					ModeloPanelFacturaBpm::updateCompovanteFalse($id, $response_json, $external_id, $cdr, $pdf, $xml, $description);
				}

			} else {
				echo "hola";
			}



			break;
	}
} else {
	echo "error de url";
}
