<?php
require_once "../modelos/reporter.modelo.php";
switch ($_REQUEST['deque']) {
    case 'libro_venta_txt':
        # code...
            $getdata = new ModeloBI;
            $getdatar=$getdata->get_ventas_for_txt_ledv($_REQUEST['fechaini'],$_REQUEST['fechafin']);
                    // echo "<pre>";
                    // print_r($getdatar);
                    // echo "</pre>";
                    // echo "<hr>";
            // Escribir los datos de la tabla en el archivo
            $ASI=0;
            $datos_para_insert_txt = array();
            
                foreach ( $getdatar as $key => $fila) {

                        $fecha_contable=$fila['fecha_contable'];
                        $rayita="|";
                        // -------------------------------------------------------------
                                $MES=date('m', strtotime($fecha_contable));
                                $SD="02";
                                $ASI=$ASI+1;
                                $FECHA_DE_EMISION_DEL_CdP= date('d/m/Y', strtotime($fecha_contable));
                                $fecha_vencimiento_pago= date('d/m/Y', strtotime($fila['fecha_vencimiento']));
                                $tipo_docu_venta=$fila['tipo_docu_venta'];
                                $num_serie="00".$fila['serie'];
                                $num_correlativo=str_pad($fila['correlativo'], 13, "0", STR_PAD_LEFT);
                                $tipo_docu_cliente=$fila['tipo_docu_cliente'];
                                $num_docu_identidad=$fila['num_docu_identidad'];
                                $nom_razonsocial_cliente=$fila['nombre_cliente'];
                                $valor_fact_exporta="0.00";
                                $BASE_IMPONIBLE_DE_LA_OPERACION_GRAVADA=$fila['total_gravada'];
                                $total_exonerada= $fila['total_exonerada'];
                                $inafecta= $fila['total_inafecta'];
                                $isc="0.00";
                                $IGV__Y_O_IPM=$fila['igv'];
                                $otros_tributos='0.00';
                                $importe_total=$fila['total'];
                                $tipo_cambio_del_dia=$getdata->obtenerTipoCambioSunat($fila['fecha_contable']); 
                                $fecha_comprobante_anulado= empty($fila['fecha_comprobante_anulado'])? '' :date('d/m/Y', strtotime($fila['fecha_comprobante_anulado']));
                                $ttt_comprobnte_anulado=$fila['ttt_comprobnte_anulado'];
                                $serie_comprobante_anulado=$fila['serie_comprobante_anulado'];
                                $num_cdp=$fila['num_cdp'];
                        // -----------------------------------------------
                        $datos_para_insert_txt[] = array(
                            'MES' => $MES,
                            'SD' => $SD,
                            'ASI' => $ASI,
                            'FECHA_DE_EMISION_DEL_CdP' => $FECHA_DE_EMISION_DEL_CdP,
                            'fecha_vencimiento_pago' => $fecha_vencimiento_pago,
                            'tipo_docu_venta' => $tipo_docu_venta,
                            'num_serie' => $num_serie,
                            'num_correlativo' => $num_correlativo,
                            'tipo_docu_cliente' => $tipo_docu_cliente,
                            'num_docu_identidad' => $num_docu_identidad,
                            'nom_razonsocial_cliente' => $nom_razonsocial_cliente,
                            'valor_fact_exporta' => $valor_fact_exporta,
                            'BASE_IMPONIBLE_DE_LA_OPERACION_GRAVADA' => $BASE_IMPONIBLE_DE_LA_OPERACION_GRAVADA,
                            'total_exonerada' => $total_exonerada,
                            'inafecta' => $inafecta,
                            'isc' => $isc,
                            'IGV__Y_O_IPM' => $IGV__Y_O_IPM,
                            'otros_tributos' => $otros_tributos,
                            'importe_total' => $importe_total,
                            'tipo_cambio_del_dia' => $tipo_cambio_del_dia,
                            'fecha_comprobante_anulado' => $fecha_comprobante_anulado,
                            'ttt_comprobnte_anulado' => $ttt_comprobnte_anulado,
                            'serie_comprobante_anulado' => $serie_comprobante_anulado,
                            'num_cdp' => $num_cdp
                        );
                        
                }


           
                    $contenido_reporte='';
                    foreach($datos_para_insert_txt as $dato){
                                
                        $tipo_docu_venta=empty($dato['fecha_comprobante_anulado'])? $dato['tipo_docu_venta'] :'07';

                        $contenido_reporte.=$dato['MES']."|".
                                           $dato['SD']."|".
                                           $dato['ASI']."|".
                                           $dato['FECHA_DE_EMISION_DEL_CdP']."|".
                                           $dato['fecha_vencimiento_pago']."|".
                                           $tipo_docu_venta."|".
                                           $dato['num_serie']."|".
                                           $dato['num_correlativo']."|".
                                           $dato['tipo_docu_cliente']."|".
                                           $dato['num_docu_identidad']."|".
                                           $dato['nom_razonsocial_cliente']."|".
                                           $dato['valor_fact_exporta']."|".
                                           $dato['BASE_IMPONIBLE_DE_LA_OPERACION_GRAVADA']."|".
                                           $dato['total_exonerada']."|".
                                           $dato['inafecta']."|".
                                           $dato['isc']."|".
                                           $dato['IGV__Y_O_IPM']."|".
                                           $dato['otros_tributos']."|".
                                           $dato['importe_total']."|".
                                           $dato['tipo_cambio_del_dia']."|".
                                           $dato['fecha_comprobante_anulado']."|".
                                           $dato['ttt_comprobnte_anulado']."|".
                                           $dato['serie_comprobante_anulado']."|".
                                           $dato['num_cdp']."\n";
                    }     
                      
                
                        // // establecer las cabeceras de la respuesta HTTP
                        // header('Content-Type: text/plain');
                        // header('Content-Disposition: attachment; filename="reporte.txt"');
                        // header('Content-Length: ' . strlen($contenido_reporte));

                        // enviar el contenido del archivo al navegador
                        echo $contenido_reporte;
                        
        break;
    
    default:
        # code...
        break;
}
