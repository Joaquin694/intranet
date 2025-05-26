<?php
require_once "conexion.php";
class ModeloBI
{
    static public function get_ventas_for_txt_ledv($fechaini,$fechafin){ /*lIBRO ELECTRÓNICO DE VENTAS*/
            //  $stmt = Conexion::conectar()->prepare("SELECT DISTINCT
			// 													a.fecha_contable,a.fecha_vencimiento,a.serie,a.correlativo,a.num_docu_identidad,a.nombre_cliente,a.total_gravada,a.total_exonerada,a.total_inafecta,a.igv,a.total, 
			// 													CASE WHEN a.serie='F001' THEN '01' WHEN a.serie='B001' THEN '03' END tipo_docu_venta,
			// 													CASE WHEN a.serie='F001' THEN  '6'  WHEN a.serie='B001' THEN '1' END tipo_docu_cliente 
			// 										FROM    `facturacion_comprobante_cabecera` a
			// 										INNER JOIN facturacion_comprobante_cuerpo b ON b.fk_comprobante_cabecera=a.id
			// 										WHERE a.fecha_contable BETWEEN '$fechaini' AND '$fechafin' ");

			$stmt = Conexion::conectar()->prepare("SELECT DISTINCT
																a.fecha_contable,a.fecha_vencimiento,a.serie,a.correlativo,a.num_docu_identidad,a.nombre_cliente,a.total_gravada,a.total_exonerada,a.total_inafecta,a.igv,a.total, 
															CASE WHEN a.serie='F001' THEN '01' WHEN a.serie='B001' THEN '03' END tipo_docu_venta,
															CASE WHEN a.serie='F001' THEN  '6'  WHEN a.serie='B001' THEN '1' END tipo_docu_cliente,
															'' fecha_comprobante_anulado,
															'' ttt_comprobnte_anulado,
															'' serie_comprobante_anulado,
															'' num_cdp
													FROM    `facturacion_comprobante_cabecera` a
													INNER JOIN facturacion_comprobante_cuerpo b ON b.fk_comprobante_cabecera=a.id
													WHERE fecha_contable BETWEEN '$fechaini' AND '$fechafin'

													UNION ALL

													SELECT 
													fecha_contable,fecha_contable AS 'fecha_vencimiento',serie,correlativo,num_docu_identidad,nombre_cliente,
													CASE WHEN total_gravadas  >0 THEN -total_gravadas   ELSE total_gravadas END total_gravadas,
													CASE WHEN total_exoneradas>0 THEN -total_exoneradas ELSE total_exoneradas END total_exoneradas,
													CASE WHEN total_inafecta  >0 THEN -total_inafecta   ELSE total_inafecta  END total_inafecta,
													CASE WHEN total_igv       >0 THEN -total_igv        ELSE total_igv END total_igv,
													CASE WHEN total           >0 THEN -total            ELSE total END total ,
													CASE WHEN serie='F001' THEN '01'  WHEN serie='B001' THEN '03' END tipo_docu_venta,
													CASE WHEN serie='F001' THEN  '6'  WHEN serie='B001' THEN '1'  END tipo_docu_cliente,
																fecha_contable as fecha_comprobante_anulado,
															CASE WHEN serie='F001' THEN '01'  WHEN serie='B001' THEN '03' END ttt_comprobnte_anulado,
															serie as nro_documento_modifica,
															SUBSTRING(nro_documento_modifica, 6) as  num_cdp
													FROM `facturacion_nc_comprobante_cabecera`
													WHERE fecha_contable BETWEEN '$fechaini' AND '$fechafin'");
			$stmt -> execute();
			return $stmt -> fetchAll();

			$stmt -> close();
			$stmt = null;
    }


	static public function obtenerTipoCambioSunat($fecha) {

			
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://api.apis.net.pe/v1/tipo-cambio-sunat?fecha='.$fecha,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			));

			$response = curl_exec($curl);
			curl_close($curl);
			
			$json = json_decode($response, true);
			$venta = $json['venta'];
		
		return $venta;
	}
	
	
}
