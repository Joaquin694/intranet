<?php
require_once "conexion.php";
class CobroVenta
{
   


    public function getPagosEfectuados($fechaini,$fechafin){

            $query = Conexion::conectar()->query("SELECT 'GASTOS' AS 'NATURALEZA',T1.nombrusarcobro as 'nombrusarcobro_p',T1.proveedor_nombre AS 'nombre_cliente_pago',T1.proveedor_documento as 'docu_perso_pago',T1.fecha_pago AS 'fecha_pago',T1.metodo_pago AS 'metodo_pago',
                                                            T1.referencia_pago, T1.id_pago,T2.serie_compra,T2.numero_compra,T2.id_compra,(T1.monto_pago*-1) as monto_pago,T1.descripcion_pago
                                                    FROM `compra_pago` T1 INNER JOIN compra T2 ON T1.id_compra=T2.id_compra 
                                                        where T1.fecha_pago BETWEEN '$fechaini' and '$fechafin' 
                                                        UNION ALL
                                                SELECT  'INGRESOS' AS 'NATURALEZA',T1.nombre_usuario_que_conbro as 'nombrusarcobro_p',T1.nombre_cliente AS 'nombre_cliente_pago',T1.documento as 'docu_perso_pago',T1.fecha AS 'fecha_pago',T1.tipo_pago AS 'metodo_pago',T1.codigo_trans as 'referencia_pago',
                                                T1.id AS 'id_pago',T2.serie as 'serie_compra',T2.correlativo as 'numero_compra',T2.id as 'id_compra', T1.monto as 'monto_pago',T1.descripcion as 'descripcion_pago'
                                                FROM `cobro_venta`   T1
                                                    INNER JOIN facturacion_comprobante_cabecera T2 ON T1.facturacion_comprobante_cabecera_id=T2.id
                                                    WHERE T1.fecha BETWEEN '$fechaini' and '$fechafin'");

            
            $listData["items_total_grafico_tipo_pago"] = array();
            $cocnc=0;
            $totalcobrado=0;


            $data_Efectivo=0;
            $data_TRANS_SCOTIABANK_8303435237=0;
            $data_TRANS_BANCO_NACION_04475102369=0;
            $data_TRANS_INTERBANK_5903002160947=0;
            $data_TRANS_BCP_4102319279073=0;
            $data_POS_VISA=0;
            $data_POS_MASTERCARD=0;
            $data_POS_AMEX=0;
            $data_YAPE_952820007=0;

            echo "<br>";
            echo ' <h4>DETALLADO DE PAGOS RECIBIDOS Y PAGOS EFECTUADOS DEL: <K style = "background-color: #FFFF00;">'.$fechaini.'</K> - <K style = "background-color: #FFFF00;">'.$fechafin.'</K></h4>
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th style="font-weight: 700;background: #5e5e5e !important;color: white">#</th>
                        <th style="font-weight: 700;background: #5e5e5e !important;color: white">FECHA DE PAGO RECIBIDO</th>
                        <th style="font-weight: 700;background: #5e5e5e !important;color: white">PERSONA QUE REGISTRO BOLSITA</th>
                        <th style="font-weight: 700;background: #5e5e5e !important;color: white">TIPO PAGO</th>
                        <th style="font-weight: 700;background: #5e5e5e !important;color: white">COD. TRANSACCIÓN</th>
                        <th style="font-weight: 700;background: #5e5e5e !important;color: white">DOCUMENTO ORIGEN	</th>
                        <th style="font-weight: 700;background: #5e5e5e !important;color: white">COMPROBANTE</th>
                        <!-- <th style="font-weight: 700;background: #5e5e5e !important;color: white">CANTIDAD DE COMPROBANTE</th> -->
                        <th style="font-weight: 700;background: #5e5e5e !important;color: white" title="N° de identidad de la persona que realizo el pago">N° IDENTIDAD</th>  
                        <th style="font-weight: 700;background: #5e5e5e !important;color: white">PERSONA QUE REALIZO EL PAGO</th>
                        <th style="font-weight: 700;background: #5e5e5e !important;color: white">MONTO COBRADO</th>
                        <th style="font-weight: 700;background: #5e5e5e !important;color: white">COMENTARIO</th>
                    </tr>
                </thead>
                <tbody class="buscar">';
            foreach ($query as $row) {
                $totalcobrado=$totalcobrado+$row["monto_pago"];

               

                $cocnc=$cocnc+1;
                $comprobtant=strtoupper($row['serie_compra']).'-'.$row['numero_compra'];
                $id_comp_venta=$row['id_compra'];
                
                if($row['metodo_pago']=='Efectivo'){
                    $data_Efectivo=$data_Efectivo+$row['monto_pago'];
                }else if($row['metodo_pago']=='TRANS_SCOTIABANK_8303435237'){
                    $data_TRANS_SCOTIABANK_8303435237=$data_TRANS_SCOTIABANK_8303435237+$row['monto_pago'];
                }else if($row['metodo_pago']=='TRANS_BANCO_NACION_04475102369'){
                    $data_TRANS_BANCO_NACION_04475102369=$data_TRANS_BANCO_NACION_04475102369+$row['monto_pago'];
                }else if($row['metodo_pago']=='TRANS_INTERBANK_5903002160947'){
                    $data_TRANS_INTERBANK_5903002160947=$data_TRANS_INTERBANK_5903002160947+$row['monto_pago'];
                }else if($row['metodo_pago']=='TRANS_BCP_4102319279073'){
                    $data_TRANS_BCP_4102319279073=$data_TRANS_BCP_4102319279073+$row['monto_pago'];
                }else if($row['metodo_pago']=='POS_VISA'){
                    $data_POS_VISA=$data_POS_VISA+$row['monto_pago'];
                }else if($row['metodo_pago']=='POS_MASTERCARD'){
                    $data_POS_MASTERCARD=$data_POS_MASTERCARD+$row['monto_pago'];
                }else if($row['metodo_pago']=='POS_AMEX'){
                    $data_POS_AMEX=$data_POS_AMEX+$row['monto_pago'];
                }else if($row['metodo_pago']=='YAPE_952820007'){
                    $data_YAPE_952820007=$data_YAPE_952820007+$row['monto_pago'];
                }

                



                echo "<tr>
                        <td>{$cocnc}</td>
                        <td>{$row['fecha_pago']}</td>
                        <td>{$row['nombrusarcobro_p']}</td>
                        <td>{$row['metodo_pago']}</td>
                        <td>{$row['referencia_pago']}</td>
                        <td>{$row['id_pago']}</td>
                        <td>{$comprobtant} <i class='fa fa-external-link-square btnviewdetalle' data-id='$id_comp_venta' style='font-size:21px'></i> </td>
                        <td>{$row['docu_perso_pago']}</td>
                        <td>{$row['nombre_cliente_pago']}</td>
                        <td>{$row['monto_pago']}</td>
                        <td>{$row['descripcion_pago']}</td>
                    </tr>" ;
            }
            echo " </tbody>
            </table>";

            
            // FOMATEO PARA GRAFICO 1
            $retorn = array(
                "country"               => 'Efectivo',
                // "litres"                => $data_Efectivo,
                "bottles"               => $data_Efectivo,
            );
            array_push($listData["items_total_grafico_tipo_pago"], $retorn);

            $retorn = array(
                "country"               => 'TRANS_SCOTIABANK_8303435237',
                // "litres"                => $data_TRANS_SCOTIABANK_8303435237,
                "bottles"               => $data_TRANS_SCOTIABANK_8303435237,
            );
            array_push($listData["items_total_grafico_tipo_pago"], $retorn);

            $retorn = array(
                "country"               => 'TRANS_BANCO_NACION_04475102369',
                // "litres"                => $data_TRANS_BANCO_NACION_04475102369,
                "bottles"               => $data_TRANS_BANCO_NACION_04475102369,
            );
            array_push($listData["items_total_grafico_tipo_pago"], $retorn);

            $retorn = array(
                "country"               => 'TRANS_INTERBANK_5903002160947',
                // "litres"                => $data_TRANS_INTERBANK_5903002160947,
                "bottles"               => $data_TRANS_INTERBANK_5903002160947,
            );
            array_push($listData["items_total_grafico_tipo_pago"], $retorn);

            $retorn = array(
                "country"               => 'TRANS_BCP_4102319279073',
                // "litres"                => $data_TRANS_BCP_4102319279073,
                "bottles"               => $data_TRANS_BCP_4102319279073,
            );
            array_push($listData["items_total_grafico_tipo_pago"], $retorn);

            $retorn = array(
                "country"               => 'POS_VISA',
                // "litres"                => $data_POS_VISA,
                "bottles"               => $data_POS_VISA,
            );
            array_push($listData["items_total_grafico_tipo_pago"], $retorn);


            $retorn = array(
                "country"               => 'POS_MASTERCARD',
                // "litres"                => $data_POS_MASTERCARD,
                "bottles"               => $data_POS_MASTERCARD,
            );
            array_push($listData["items_total_grafico_tipo_pago"], $retorn);

            $retorn = array(
                "country"               => 'POS_AMEX',
                // "litres"                => $data_POS_AMEX,
                "bottles"               => $data_POS_AMEX,
            );
            array_push($listData["items_total_grafico_tipo_pago"], $retorn);


            
            $retorn = array(
                "country"               => 'YAPE_952820007',
                // "litres"                => $data_YAPE_952820007,
                "bottles"               => $data_YAPE_952820007,
            );
            array_push($listData["items_total_grafico_tipo_pago"], $retorn);



            $data_para_grafico1=json_encode($listData["items_total_grafico_tipo_pago"]);
            echo  $this->getPagosEfectuados_grafico_tipo_pago($data_para_grafico1,$totalcobrado,$data_Efectivo,$data_TRANS_SCOTIABANK_8303435237,$data_TRANS_BANCO_NACION_04475102369,$data_TRANS_INTERBANK_5903002160947,$data_TRANS_BCP_4102319279073,$data_POS_VISA,$data_POS_MASTERCARD,$data_POS_AMEX,$data_YAPE_952820007);
    }



    public function getPagosEfectuados_grafico_tipo_pago($data_para_grafico1,$totalcobrado,$data_Efectivo,$data_TRANS_SCOTIABANK_8303435237,$data_TRANS_BANCO_NACION_04475102369,$data_TRANS_INTERBANK_5903002160947,$data_TRANS_BCP_4102319279073,$data_POS_VISA,$data_POS_MASTERCARD,$data_POS_AMEX,$data_YAPE_952820007){

            
        ?>
                <!-- Styles -->
                    <style>
                    #chartdiv {
                    width: 100%;
                    height: 250px;
                    }
                    </style>

                    <!-- Resources -->
                    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
                    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
                    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

                    <!-- Chart code -->
                    <script>
                    am5.ready(function() {

                    // Create root element
                    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
                    var root = am5.Root.new("chartdiv");

                    // Set themes
                    // https://www.amcharts.com/docs/v5/concepts/themes/
                    root.setThemes([
                    am5themes_Animated.new(root)
                    ]);

                    // Create chart
                    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
                    var chart = root.container.children.push(
                    am5percent.PieChart.new(root, {
                        startAngle: 160, endAngle: 380
                    })
                    );

                    // Create series
                    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series

                    var series0 = chart.series.push(
                    am5percent.PieSeries.new(root, {
                        valueField: "litres",
                        categoryField: "country",
                        startAngle: 160,
                        endAngle: 380,
                        radius: am5.percent(70),
                        innerRadius: am5.percent(65)
                    })
                    );

                    var colorSet = am5.ColorSet.new(root, {
                    colors: [series0.get("colors").getIndex(0)],
                    passOptions: {
                        lightness: -0.05,
                        hue: 0
                    }
                    });

                    series0.set("colors", colorSet);

                    series0.ticks.template.set("forceHidden", true);
                    series0.labels.template.set("forceHidden", true);

                    var series1 = chart.series.push(
                    am5percent.PieSeries.new(root, {
                        startAngle: 160,
                        endAngle: 380,
                        valueField: "bottles",
                        innerRadius: am5.percent(80),
                        categoryField: "country"
                    })
                    );

                    series1.ticks.template.set("forceHidden", true);
                    series1.labels.template.set("forceHidden", true);

                    var label = chart.seriesContainer.children.push(
                    am5.Label.new(root, {
                        textAlign: "center",
                        centerY: am5.p100,
                        centerX: am5.p50,
                        text: "[fontSize:18px]total[/]:\n[bold fontSize:30px]<?php echo $totalcobrado ?>[/]"
                    })
                    );

                    var data = <?php echo $data_para_grafico1;?>;

                    // Set data
                    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
                    series0.data.setAll(data);
                    series1.data.setAll(data);

                    }); // end am5.ready()
                    </script>


                    <!-- HTML -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                    <div id="chartdiv"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                <div class="col-12"><br><br></div>
                                    <div class="col-12 col-md-6" style="background: #337ab7; color: white;text-align: left;border: 4px solid white;padding: 10px 20px !important"><p style="display: contents;font-size: 14px !important; font-weight: 100 !important"><b>Efectivo</b></p> <span style="float: right; font-size: 15px; font-weight: bold" id='sub_totala'><?php echo "S/ ".$data_Efectivo; ?></span></div>
                                    <div class="col-12 col-md-6" style="background: #337ab7; color: white;text-align: left;border: 4px solid white;padding: 10px 20px !important"><p style="display: contents;font-size: 14px !important; font-weight: 100 !important"><b>TRANS_SCOTIABANK_8303435237</b></p> <span style="float: right; font-size: 15px; font-weight: bold" id='sub_totalb'><?php echo "S/ ".$data_TRANS_SCOTIABANK_8303435237; ?></span></div>
                                    <div class="col-12 col-md-6" style="background: #337ab7; color: white;text-align: left;border: 4px solid white;padding: 10px 20px !important"><p style="display: contents;font-size: 14px !important; font-weight: 100 !important"><b>TRANS_BANCO_NACION_04475102369</b></p> <span style="float: right; font-size: 15px; font-weight: bold" id='sub_totalc'><?php echo "S/ ".$data_TRANS_BANCO_NACION_04475102369; ?></span></div>
                                    <div class="col-12 col-md-6" style="background: #337ab7; color: white;text-align: left;border: 4px solid white;padding: 10px 20px !important"><p style="display: contents;font-size: 14px !important; font-weight: 100 !important"><b>TRANS_INTERBANK_5903002160947</b></p> <span style="float: right; font-size: 15px; font-weight: bold" id='sub_totald'><?php echo "S/ ".$data_TRANS_INTERBANK_5903002160947; ?></span></div>
                                    <div class="col-12 col-md-6" style="background: #337ab7; color: white;text-align: left;border: 4px solid white;padding: 10px 20px !important"><p style="display: contents;font-size: 14px !important; font-weight: 100 !important"><b>TRANS_BCP_4102319279073</b></p> <span style="float: right; font-size: 15px; font-weight: bold" id='sub_totale'><?php echo "S/ ".$data_TRANS_BCP_4102319279073; ?></span></div>
                                    <div class="col-12 col-md-6" style="background: #337ab7; color: white;text-align: left;border: 4px solid white;padding: 10px 20px !important"><p style="display: contents;font-size: 14px !important; font-weight: 100 !important"><b>POS_VISA</b></p> <span style="float: right; font-size: 15px; font-weight: bold" id='sub_totalf'><?php echo "S/ ".$data_POS_VISA; ?></span></div>
                                    <div class="col-12 col-md-6" style="background: #337ab7; color: white;text-align: left;border: 4px solid white;padding: 10px 20px !important"><p style="display: contents;font-size: 14px !important; font-weight: 100 !important"><b>POS_MASTERCARD</b></p> <span style="float: right; font-size: 15px; font-weight: bold" id='sub_totalg'><?php echo "S/ ".$data_POS_MASTERCARD; ?></span></div>
                                    <div class="col-12 col-md-6" style="background: #337ab7; color: white;text-align: left;border: 4px solid white;padding: 10px 20px !important"><p style="display: contents;font-size: 14px !important; font-weight: 100 !important"><b>POS_AMEX</b></p> <span style="float: right; font-size: 15px; font-weight: bold" id='sub_totalh'><?php echo "S/ ".$data_POS_AMEX; ?></span></div>
                                    <div class="col-12 col-md-6" style="background: #337ab7; color: white;text-align: left;border: 4px solid white;padding: 10px 20px !important"><p style="display: contents;font-size: 14px !important; font-weight: 100 !important"><b>YAPE_952820007</b></p> <span style="float: right; font-size: 15px; font-weight: bold" id='sub_totali'><?php echo "S/ ".$data_YAPE_952820007; ?></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
        <?php
    }


    
}





















