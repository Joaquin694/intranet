<?php 
require_once "conexion.php";

class ModeloPanelBI  {
	 public function load_sales_fulll($aniote){
			
			$anioActual = date("Y"); // Obtener el año actual
			
			echo $this->saleBoletasFacturas($aniote);										
	}



	 public function saleBoletasFacturas($anio){
		$stmt = Conexion::conectar()->query("SELECT     
														a.codigo ,
														TRIM(a.descripcion) as 'descripcion',
														a.cantidad ,
														a.precio_venta_unitario ,
														a.precio_tras_decuento,
														a.precio_venta_total ,
														a.fk_comprobante_cabecera ,
														a.pk_lote ,
														b.serie ,
														b.correlativo ,
														b.fecha_contable ,
														TRIM(b.nombre_cliente) ,
														b.num_docu_identidad ,
														b.direccion ,
														b.documento_origen_de_comprobante ,
														b.idBpm ,
														b.estado_tributatio ,
														b.cajera ,
														b.tipo_operacion ,
														b.total_gravada ,
														b.total_exonerada ,
														b.total_inafecta ,
														b.igv ,
														b.total ,
														b.tipo_pago ,
														b.efectivo_recibido ,
														b.vuelto_entregado ,
														b.state_type_id  
												FROM facturacion_comprobante_cuerpo a 
												JOIN facturacion_comprobante_cabecera b on a.fk_comprobante_cabecera = b.id WHERE  year(b.fecha_contable)='$anio'");  
												
		$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$json = json_encode($resultado);

		return $json;		
												
	}
}