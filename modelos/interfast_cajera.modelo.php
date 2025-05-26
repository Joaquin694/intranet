<?php 
require_once "conexion.php";

class ModeloPanelFacturaBpm  {

		/*=============================================
		--- REINGRESO DE STOCK POR NOTAD DE CRÉDITO
	=============================================*/
	public function reingreso_stock_por_nota($id_cab_factura){

		echo $id_cab_factura; echo "<br>";
		$stmtvrf = Conexion::conectar()->query("SELECT return_stock FROM `facturacion_nc_comprobante_cabecera` where idComprobanteVenta='$id_cab_factura'");
		while ($rowi = $stmtvrf->fetch(PDO::FETCH_ASSOC)) {
			$dreturn_stock=$rowi['return_stock'] ;
		}

		if($dreturn_stock==0){
				$stmt = Conexion::conectar()->query("SELECT * FROM `facturacion_comprobante_cuerpo` where fk_comprobante_cabecera='$id_cab_factura'");
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$row['codigo'] = strtoupper(trim($row['codigo']));
					$row['descripcion'] = strtoupper(trim($row['descripcion']));
					
					// Aquí puedes hacer lo que necesites con los datos, por ejemplo, imprimirlos
					$id_fact_cuerpo  =$row['id']; 
					$codigo  =$row['codigo']; 
					$descripcion  =$row['descripcion']; 
					$cantidad  =$row['cantidad']; 
					$precio_venta_unitario  =$row['precio_venta_unitario']; 
					$precio_tras_decuento  =$row['precio_tras_decuento']; 
					$precio_venta_total  =$row['precio_venta_total']; 
					$fecha_creacion  =$row['fecha_creacion']; 
					$fk_comprobante_cabecera  =$row['fk_comprobante_cabecera']; 
					$pk_lote  =$row['pk_lote'];


					// REINGRESAMOS STOCK					
					Conexion::conectar()->query("UPDATE `productos` SET stock=stock+$cantidad WHERE  UPPER(codigo)='$codigo' ORDER BY  UPPER(codigo), stock DESC LIMIT 1");
					Conexion::conectar()->query("UPDATE `facturacion_nc_comprobante_cabecera` SET  return_stock=-1 WHERE idComprobanteVenta='$id_cab_factura'");
					
					
				}
		}
		

	}

	/*=============================================
		--- RENDER COMPROBANTE PDF
	=============================================*/
	public function viewBoletaEletronicaPanel($tipo_comprobante,$fecha_inicio,$fecha_fin){

					
		if (($tipo_comprobante==='B') or ($tipo_comprobante==='F') ) {
			# code...
			// $tipo_comprobantito='';
			$stmt = Conexion::conectar()->query("SELECT * FROM `facturacion_comprobante_cabecera` WHERE left(serie,1)='$tipo_comprobante' AND  fecha_contable BETWEEN '$fecha_inicio' AND '$fecha_fin' AND estado_tributatio not in ('Anulada NC')  order by fecha_creacion");

			$listPags["items"] = array();
			foreach ($stmt as $row){
						$retorn=array(
							"id"=>$row["id"],
							"serie"=>$row["serie"],
							"correlativo"=>$row["correlativo"],
							"fecha_creacion"=>$row["fecha_creacion"],
							"fecha_contable"=>$row["fecha_contable"],
							"fecha_vencimiento"=>$row["fecha_vencimiento"],
							"nombre_cliente"=>$row["nombre_cliente"],
							"num_docu_identidad"=>$row["num_docu_identidad"],
							"direccion"=>$row["direccion"],
							"documento_origen_de_comprobante"=>$row["documento_origen_de_comprobante"],
							"idBpm"=>$row["idBpm"],
							"estado_envio"=>$row["estado_envio"],
							"estado_tributatio"=>$row["estado_tributatio"],
							"cajera"=>$row["cajera"],
							"tipo_operacion"=>$row["tipo_operacion"],
							"total_gravada"=>$row["total_gravada"],
							"total_exonerada"=>$row["total_exonerada"],
							"total_inafecta"=>$row["total_inafecta"],
							"igv"=>$row["igv"],
							"total"=>$row["total"],
							"tipo_pago"=>$row["tipo_pago"],
							"efectivo_recibido"=>$row["efectivo_recibido"],
							"vuelto_entregado"=>$row["vuelto_entregado"],
							"cod_transaccion"=>$row["cod_transaccion"],
							"cpe"=>$row["cpe"],
							"cdr"=>$row["cdr"],
							"data_send_json"=>$row["data_send_json"],
							"ruta_xml"=>$row["ruta_xml"],
		                );
		                array_push($listPags["items"], $retorn);
			}
						return json_encode($listPags["items"]);	
		}elseif ($tipo_comprobante==='notas_de_credito') {
			# code...
			$stmt = Conexion::conectar()->query("SELECT * FROM `facturacion_nc_comprobante_cabecera` WHERE   fecha_contable BETWEEN '$fecha_inicio' AND '$fecha_fin' order by fecha_creacion");

			$listPags["items"] = array();
			foreach ($stmt as $row){
						$retorn=array(
							"id"=>$row["id"],
							"serie"=>$row["serie"],
							"correlativo"=>$row["correlativo"],
							"fecha_creacion"=>$row["fecha_creacion"],
							"fecha_contable"=>$row["fecha_contable"],
							"nombre_cliente"=>$row["nombre_cliente"],
							"num_docu_identidad"=>$row["num_docu_identidad"],
							"direccion"=>$row["direccion"],
							"documento_origen_de_comprobante"=>$row["documento_origen_de_comprobante"],
							"idComprobanteVenta"=>$row["idComprobanteVenta"],
							"estado_envio"=>$row["estado_envio"],
							"estado_tributatio"=>$row["estado_tributatio"],
							"cajera"=>$row["cajera"],
							"tipo_operacion"=>$row["tipo_operacion"],
							"total_gravada"=>$row["total_gravadas"],
							"total_exonerada"=>$row["total_exoneradas"],
							"total_inafecta"=>$row["total_inafecta"],
							"total_igv"=>$row["total_igv"],
							"total"=>$row["total"],
							"tipo_comprobante_modifica"=>$row["tipo_comprobante_modifica"],
							"descripcion_motivo"=>$row["descripcion_motivo"],
							"comentario"=>$row["comentario"],
							"respuesta_sunat"=>$row["respuesta_sunat"],
							"respuesta_sunat__json"=>$row["respuesta_sunat__json"],
							"return_stock"=>$row["return_stock"],
		                );
		                array_push($listPags["items"], $retorn);
			}
						return json_encode($listPags["items"]);	
		}						
	}
	//////
	public function saleClient($id){

		$stmt = Conexion::conectar()->query("SELECT a.id as idCabeza, 
													a.serie, 
													a.correlativo,
													a.fecha_creacion as fecha_creacion_cabeza,
													a.fecha_contable,
													a.fecha_vencimiento,
													a.nombre_cliente,
													a.num_docu_identidad,
													a.direccion,
													a.documento_origen_de_comprobante,
													a.idBpm,
													a.estado_envio,
													a.estado_tributatio,
													a.cajera,
										            a.tipo_operacion,
										            a.total_gravada,
													a.total_exonerada,
													a.total_inafecta,
													a.igv,
													a.total,
													a.tipo_pago,
													a.efectivo_recibido,
													a.vuelto_entregado,
													a.cod_transaccion,
													a.cpe,
													a.cdr,
													a.data_send_json,
													a.ruta_xml,
													a.respuesta_sunat,
													a.respuesta_sunat__json,
										            c.id as idCuerpo,  	   
													c.codigo,  
													c.descripcion,  
													c.cantidad,    
													c.precio_venta_unitario,   
													c.precio_tras_decuento,    
													c.precio_venta_total,   
													c.fecha_creacion as fecha_creacion_cuerpo,  
													c.fk_comprobante_cabecera,   
													c.pk_lote 
											FROM `facturacion_comprobante_cabecera` as a
											INNER JOIN facturacion_comprobante_cuerpo as c on a.id = c.fk_comprobante_cabecera
											WHERE c.precio_venta_total>0 and a.id = $id");

		$listPags["items"] = array();
		foreach ($stmt as $row){
			$retorn=array(
				"idCabeza"=>$row["idCabeza"],
				"serie"=>$row["serie"],
				"correlativo"=>$row["correlativo"],
				"fecha_creacion_cabeza"=>$row["fecha_creacion_cabeza"],
				"fecha_contable"=>$row["fecha_contable"],
				"fecha_vencimiento"=>$row["fecha_vencimiento"],
				"nombre_cliente"=>$row["nombre_cliente"],
				"num_docu_identidad"=>$row["num_docu_identidad"],
				"direccion"=>$row["direccion"],
				"documento_origen_de_comprobante"=>$row["documento_origen_de_comprobante"],
				"idBpm"=>$row["idBpm"],
				"estado_envio"=>$row["estado_envio"],
				"estado_tributatio"=>$row["estado_tributatio"],
				"cajera"=>$row["cajera"],
				"tipo_operacion"=>$row["tipo_operacion"],
				"total_gravada"=>$row["total_gravada"],
				"total_exonerada"=>$row["total_exonerada"],
				"total_inafecta"=>$row["total_inafecta"],
				"igv"=>$row["igv"],
				"total"=>$row["total"],
				"tipo_pago"=>$row["tipo_pago"],
				"efectivo_recibido"=>$row["efectivo_recibido"],
				"vuelto_entregado"=>$row["vuelto_entregado"],
				"cod_transaccion"=>$row["cod_transaccion"],
				"cpe"=>$row["cpe"],
				"cdr"=>$row["cdr"],
				"data_send_json"=>$row["data_send_json"],
				"ruta_xml"=>$row["ruta_xml"],
				"respuesta_sunat"=>$row["respuesta_sunat"],
				"respuesta_sunat__json"=>$row["respuesta_sunat__json"],

				"idCuerpo"=>$row["idCuerpo"],
				"codigo"=>$row["codigo"],
				"descripcion"=>$row["descripcion"],
				"cantidad"=>$row["cantidad"],
				"precio_venta_unitario"=>$row["precio_venta_unitario"],
				"precio_tras_decuento"=>$row["precio_tras_decuento"],
				"precio_venta_total"=>$row["precio_venta_total"],
				"fecha_creacion_cuerpo"=>$row["fecha_creacion_cuerpo"],
				"fk_comprobante_cabecera"=>$row["fk_comprobante_cabecera"],
				"pk_lote"=>$row["pk_lote"],
		    );
		    array_push($listPags["items"], $retorn);
		}
		return json_encode($listPags["items"]);	

	}

	
	public function updateCompovanteTrue($id, $response_json, $external_id, $cdr, $pdf, $xml, $description,$state_type_id){

	
		
			Conexion::conectar()->query("UPDATE `facturacion_comprobante_cabecera` SET 	`external_id` = '$external_id', respuesta_sunat = 'ok', estado_envio='ok',	state_type_id='$state_type_id'
		                              WHERE `id` = '$id' AND ( estado_envio is null or estado_envio='' or estado_envio='No enviado') ");

	}


	public function updateCompovanteFalse($id, $response_json, $external_id, $cdr, $pdf, $xml, $description,$state_type_id){
		

		Conexion::conectar()->query("UPDATE `facturacion_comprobante_cabecera` SET `respuesta_sunat__json` = '$response_json',	state_type_id='$state_type_id' WHERE `id` = '$id' AND ( estado_envio is null or estado_envio='' or estado_envio='No enviado') ");
	}

	



}