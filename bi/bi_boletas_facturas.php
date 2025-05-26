<?php
session_start();

if (isset($_SESSION['nombre'])) {
    require_once "../modelos/bi_modelo.php";
   
    $instancia= new ModeloPanelBI();
    $data_mart=$instancia->saleBoletasFacturas();
    
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    
    echo '<th>id_head</th>';
    echo '<th>codigo</th>';
    echo '<th>descripcion</th>';
    echo '<th>cantidad</th>';
    echo '<th>precio_venta_unitario</th>';
    echo '<th>precio_tras_decuento</th>';
    echo '<th>precio_venta_total</th>';
    echo '<th>fecha_creacion_head</th>';
    echo '<th>fk_comprobante_cabecera</th>';
    echo '<th>pk_lote</th>';
    echo '<th>id</th>';
    echo '<th>serie</th>';
    echo '<th>correlativo</th>';
    echo '<th>fecha_creacion</th>';
    echo '<th>fecha_contable</th>';
    echo '<th>fecha_vencimiento</th>';
    echo '<th>nombre_cliente</th>';
    echo '<th>num_docu_identidad</th>';
    echo '<th>direccion</th>';
    echo '<th>documento_origen_de_comprobante</th>';
    echo '<th>idBpm</th>';
    echo '<th>estado_envio</th>';
    echo '<th>estado_tributatio</th>';
    echo '<th>cajera</th>';
    echo '<th>tipo_operacion</th>';
    echo '<th>total_gravada</th>';
    echo '<th>total_exonerada</th>';
    echo '<th>total_inafecta</th>';
    echo '<th>igv</th>';
    echo '<th>total</th>';
    echo '<th>tipo_pago</th>';
    echo '<th>efectivo_recibido</th>';
    echo '<th>vuelto_entregado</th>';
    echo '<th>cod_transaccion</th>';
    echo '<th>cpe</th>';
    echo '<th>cdr</th>';
    echo '<th>data_send_json</th>';
    echo '<th>ruta_xml</th>';
    echo '<th>respuesta_sunat</th>';
    echo '<th>respuesta_sunat__json</th>';
    echo '<th>external_id</th>';
    echo '<th>cdr_link</th>';
    echo '<th>pdf_link</th>';
    echo '<th>xml_link</th>';
    echo '<th>description</th>';
    echo '<th>state_type_id</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    
   

    foreach ($data_mart as $row){
        echo '<tr>';
        echo '<td>'.$row["id_head"].'</td>';
        echo '<td>'.$row["codigo"].'</td>';
        echo '<td>'.$row["descripcion"].'</td>';
        echo '<td>'.$row["cantidad"].'</td>';
        echo '<td>'.$row["precio_venta_unitario"].'</td>';
        echo '<td>'.$row["precio_tras_decuento"].'</td>';
        echo '<td>'.$row["precio_venta_total"].'</td>';
        echo '<td>'.$row["fecha_creacion_head"].'</td>';
        echo '<td>'.$row["fk_comprobante_cabecera"].'</td>';
        echo '<td>'.$row["pk_lote"].'</td>';
        echo '<td>'.$row["id"].'</td>';
        echo '<td>'.$row["serie"].'</td>';
        echo '<td>'.$row["correlativo"].'</td>';
        echo '<td>'.$row["fecha_creacion"].'</td>';
        echo '<td>'.$row["fecha_contable"].'</td>';
        echo '<td>'.$row["fecha_vencimiento"].'</td>';
        echo '<td>'.$row["nombre_cliente"].'</td>';
        echo '<td>'.$row["num_docu_identidad"].'</td>';
        echo '<td>'.$row["direccion"].'</td>';
        echo '<td>'.$row["documento_origen_de_comprobante"].'</td>';
        echo '<td>'.$row["idBpm"].'</td>';
        echo '<td>'.$row["estado_envio"].'</td>';
        echo '<td>'.$row["estado_tributatio"].'</td>';
        echo '<td>'.$row["cajera"].'</td>';
        echo '<td>'.$row["tipo_operacion"].'</td>';
        echo '<td>'.$row["total_gravada"].'</td>';
        echo '<td>'.$row["total_exonerada"].'</td>';
        echo '<td>'.$row["total_inafecta"].'</td>';
        echo '<td>'.$row["igv"].'</td>';
        echo '<td>'.$row["total"].'</td>';
        echo '<td>'.$row["tipo_pago"].'</td>';
        echo '<td>'.$row["efectivo_recibido"].'</td>';
        echo '<td>'.$row["vuelto_entregado"].'</td>';
        echo '<td>'.$row["cod_transaccion"].'</td>';
        echo '<td>'.$row["cpe"].'</td>';
        echo '<td>'.$row["cdr"].'</td>';
        echo '<td>'.$row["data_send_json"].'</td>';
        echo '<td>'.$row["ruta_xml"].'</td>';
        echo '<td>'.$row["respuesta_sunat"].'</td>';
        echo '<td>'.$row["respuesta_sunat__json"].'</td>';
        echo '<td>'.$row["external_id"].'</td>';
        echo '<td>'.$row["cdr_link"].'</td>';
        echo '<td>'.$row["pdf_link"].'</td>';
        echo '<td>'.$row["xml_link"].'</td>';
        echo '<td>'.$row["description"].'</td>';
        echo '<td>'.$row["state_type_id'"].'</td>'; 
        echo '</tr>'; 
    }
        
        
        echo '</tbody>';
        echo '</table>';

    




}else{
    echo "No tienes permisos";
    
}
?>