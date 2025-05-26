<?php
require_once "conexion.php";
class CobroVenta
{



    public function getPagosEfectuados($fechaini, $fechafin)
    {

        $query = Conexion::conectar()->query("SELECT T1.nombrusarcobro as 'nombrusarcobro_p',T1.proveedor_nombre AS 'nombre_cliente_pago',T1.proveedor_documento as 'docu_perso_pago',T1.fecha_pago AS 'fecha_pago',T1.metodo_pago AS 'metodo_pago',T1.*,T2.* 
                                                    FROM `compra_pago` T1 INNER JOIN compra T2 ON T1.id_compra=T2.id_compra 
                                                        where T1.fecha_pago BETWEEN '$fechaini' and '$fechafin' order by T1.id_compra,T1.nombrusarcobro,proveedor_nombre");


        $listData["items_total_grafico_tipo_pago"] = array();
        $cocnc = 0;
        $totalcobrado = 0;


        // Manteniendo solo los métodos de pago solicitados
        $data_Efectivo = 0;
        $data_TRANS_BBVA_0011_0341_5402_004517_53 = 0;
        $data_TRANS_BANCO_NACION_00381091708 = 0;
        $data_TRANS_BCP_19128084617099 = 0;
        $data_YAPE_962382960 = 0;
        $data_PLIN_962382960 = 0;

        $TARJETA_CREDITO_CMR=0;
        $TARJETA_CREDITO_INTERBANK=0;
        $TARJETA_CREDITO_BBVA=0;

        echo "<br>";
        echo ' <h4>DETALLADO DE PAGOS EFECTUADOS DE ACUERDO AL RANGO DE FECHA ELEGIDO</h4>
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
            $totalcobrado = $totalcobrado + $row["monto_pago"];



            $cocnc = $cocnc + 1;
            $comprobtant = $row['serie_compra'] . '-' . $row['numero_compra'];
            $id_comp_venta = $row['id_compra'];

            if ($row['metodo_pago'] == 'Efectivo') {
                $data_Efectivo += $row['monto_pago'];
            } else if ($row['metodo_pago'] == 'TRANS_BBVA_0011_0341_5402_004517_53') {
                $data_TRANS_BBVA_0011_0341_5402_004517_53 += $row['monto_pago'];
            } else if ($row['metodo_pago'] == 'TRANS_BANCO_NACION_00381091708') {
                $data_TRANS_BANCO_NACION_00381091708 += $row['monto_pago'];
            } else if ($row['metodo_pago'] == 'TRANS_BCP_19128084617099') {
                $data_TRANS_BCP_19128084617099 += $row['monto_pago'];
            } else if ($row['metodo_pago'] == 'YAPE_962382960') {
                $data_YAPE_962382960 += $row['monto_pago'];
            } else if ($row['metodo_pago'] == 'PLIN_962382960') {
                $data_PLIN_962382960 += $row['monto_pago'];
            }
            
            
            else if ($row['metodo_pago'] == 'TARJETA_CREDITO_CMR') {
                $TARJETA_CREDITO_CMR += $row['monto_pago'];
            } else if ($row['metodo_pago'] == 'TARJETA_CREDITO_INTERBANK') {
                $TARJETA_CREDITO_INTERBANK += $row['monto_pago'];
            } else if ($row['metodo_pago'] == 'TARJETA_CREDITO_BBVA') {
                $TARJETA_CREDITO_BBVA += $row['monto_pago'];
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
                    </tr>";
        }
        echo " </tbody>
            </table>";



        // FOMATEO PARA GRAFICO 1
        $retorn = array(
            "country"               => 'TARJETA_CREDITO_CMR',
            // "litres"                => $data_Efectivo,
            "bottles"               => $data_Efectivo,
        );
        array_push($listData["items_total_grafico_tipo_pago"], $retorn);


        // FOMATEO PARA GRAFICO 1
        $retorn = array(
            "country"               => 'TARJETA_CREDITO_INTERBANK',
            // "litres"                => $data_Efectivo,
            "bottles"               => $data_Efectivo,
        );
        array_push($listData["items_total_grafico_tipo_pago"], $retorn);


        // FOMATEO PARA GRAFICO 1
        $retorn = array(
            "country"               => 'TARJETA_CREDITO_BBVA',
            // "litres"                => $data_Efectivo,
            "bottles"               => $data_Efectivo,
        );
        array_push($listData["items_total_grafico_tipo_pago"], $retorn);


        // FOMATEO PARA GRAFICO 1
        $retorn = array(
            "country"               => 'Efectivo',
            // "litres"                => $data_Efectivo,
            "bottles"               => $data_Efectivo,
        );
        array_push($listData["items_total_grafico_tipo_pago"], $retorn);

        $retorn = array(
            "country"               => 'TRANS_BBVA_0011_0341_5402_004517_53',
            // "litres"                => $data_TRANS_BBVA_0011_0341_5402_004517_53,
            "bottles"               => $data_TRANS_BBVA_0011_0341_5402_004517_53,
        );
        array_push($listData["items_total_grafico_tipo_pago"], $retorn);


        $retorn = array(
            "country"               => 'TRANS_BANCO_NACION_00381091708',
            // "litres"                => $data_TRANS_BANCO_NACION_00381091708,
            "bottles"               => $data_TRANS_BANCO_NACION_00381091708,
        );
        array_push($listData["items_total_grafico_tipo_pago"], $retorn);

        $retorn = array(
            "country"               => 'TRANS_BCP_19128084617099',
            // "litres"                => $data_TRANS_BCP_19128084617099,
            "bottles"               => $data_TRANS_BCP_19128084617099,
        );
        array_push($listData["items_total_grafico_tipo_pago"], $retorn);



        $retorn = array(
            "country"               => 'YAPE_962382960',
            // "litres"                => $data_YAPE_962382960,
            "bottles"               => $data_YAPE_962382960,
        );
        array_push($listData["items_total_grafico_tipo_pago"], $retorn);


        $retorn = array(
            "country"               => 'PLIN_962382960',
            // "litres"                => $data_PLIN_962382960,
            "bottles"               => $data_PLIN_962382960,
        );
        array_push($listData["items_total_grafico_tipo_pago"], $retorn);



        $data_para_grafico1 = json_encode($listData["items_total_grafico_tipo_pago"]);
        echo  $this->getPagosEfectuados_grafico_tipo_pago($data_para_grafico1, $totalcobrado, $data_Efectivo, $data_TRANS_BBVA_0011_0341_5402_004517_53, $data_TRANS_BANCO_NACION_00381091708, $data_TRANS_BCP_19128084617099, $data_YAPE_962382960, $data_PLIN_962382960,$TARJETA_CREDITO_CMR,$TARJETA_CREDITO_INTERBANK,$TARJETA_CREDITO_BBVA);
    }

    public function getPagosEfectuados_grafico_tipo_pago($data_para_grafico1, $totalcobrado, $data_Efectivo, $data_TRANS_BBVA_0011_0341_5402_004517_53, $data_TRANS_BANCO_NACION_00381091708, $data_TRANS_BCP_19128084617099, $data_YAPE_962382960, $data_PLIN_962382960,$TARJETA_CREDITO_CMR,$TARJETA_CREDITO_INTERBANK,$TARJETA_CREDITO_BBVA)
    {

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
                        startAngle: 160,
                        endAngle: 380
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

                // Crear conjunto de colores con una amplia gama
                var colorSet = am5.ColorSet.new(root, {
                    colors: [
                        am5.color(0xFF5733), // Rojo anaranjado
                        am5.color(0x33FF57), // Verde claro
                        am5.color(0x3357FF), // Azul
                        am5.color(0xFF33A1), // Rosa
                        am5.color(0xF0E130), // Amarillo
                        am5.color(0x8E44AD), // Morado
                        am5.color(0x16A085), // Verde azulado
                        am5.color(0xE74C3C), // Rojo
                        am5.color(0x3498DB), // Azul claro
                        am5.color(0xF39C12) // Naranja
                    ]
                });

                // Aplicar el conjunto de colores a la serie
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

                var data = <?php echo $data_para_grafico1; ?>;

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
                        <div class="col-12 col-md-6" style="background: #5b7d99 !important; color: white;text-align: left;border: 4px solid white;padding: 10px 20px !important">
                            <p style="display: contents;font-size: 14px !important; font-weight: 100 !important"><b>Efectivo</b></p> <span style="float: right; font-size: 15px; font-weight: bold"><?php echo "S/ " . $data_Efectivo; ?></span>
                        </div>
                        <div class="col-12 col-md-6" style="background: #337ab7; color: white;text-align: left;border: 4px solid white;padding: 10px 20px !important">
                            <p style="display: contents;font-size: 14px !important; font-weight: 100 !important"><b>TRANS_BBVA_0011_0341_5402_004517_53</b></p> <span style="float: right; font-size: 15px; font-weight: bold"><?php echo "S/ " . $data_TRANS_BBVA_0011_0341_5402_004517_53; ?></span>
                        </div>
                        <div class="col-12 col-md-6" style="background: #940a00 !important; color: white;text-align: left;border: 4px solid white;padding: 10px 20px !important">
                            <p style="display: contents;font-size: 14px !important; font-weight: 100 !important"><b>TRANS_BANCO_NACION_00381091708</b></p> <span style="float: right; font-size: 15px; font-weight: bold"><?php echo "S/ " . $data_TRANS_BANCO_NACION_00381091708; ?></span>
                        </div>
                        <div class="col-12 col-md-6" style="background: #720e9e !important; color: white;text-align: left;border: 4px solid white;padding: 10px 20px !important">
                            <p style="display: contents;font-size: 14px !important; font-weight: 100 !important"><b>TRANS_BCP_19128084617099</b></p> <span style="float: right; font-size: 15px; font-weight: bold"><?php echo "S/ " . $data_TRANS_BCP_19128084617099; ?></span>
                        </div>
                        <div class="col-12 col-md-6" style="background: #720e9e !important; color: white;text-align: left;border: 4px solid white;padding: 10px 20px !important">
                            <p style="display: contents;font-size: 14px !important; font-weight: 100 !important"><b>YAPE_962382960</b></p> <span style="float: right; font-size: 15px; font-weight: bold"><?php echo "S/ " . $data_YAPE_962382960; ?></span>
                        </div>
                        <div class="col-12 col-md-6" style="background: #339b20 !important; color: white;text-align: left;border: 4px solid white;padding: 10px 20px !important">
                            <p style="display: contents;font-size: 14px !important; font-weight: 100 !important"><b>PLIN_962382960</b></p> <span style="float: right; font-size: 15px; font-weight: bold"><?php echo "S/ " . $data_PLIN_962382960; ?></span>
                        </div>
                        
                        <div class="col-12 col-md-6" style="background: black !important; color: white;text-align: left;border: 4px solid white;padding: 10px 20px !important">
                            <p style="display: contents;font-size: 14px !important; font-weight: 100 !important"><b>TARJETA_CREDITO_CMR</b></p> <span style="float: right; font-size: 15px; font-weight: bold"><?php echo "S/ " . $TARJETA_CREDITO_CMR; ?></span>
                        </div>

                        <div class="col-12 col-md-6" style="background: black !important; color: white;text-align: left;border: 4px solid white;padding: 10px 20px !important">
                            <p style="display: contents;font-size: 14px !important; font-weight: 100 !important"><b>TARJETA_CREDITO_INTERBANK</b></p> <span style="float: right; font-size: 15px; font-weight: bold"><?php echo "S/ " . $TARJETA_CREDITO_INTERBANK; ?></span>
                        </div>

                        <div class="col-12 col-md-6" style="background: black !important; color: white;text-align: left;border: 4px solid white;padding: 10px 20px !important">
                            <p style="display: contents;font-size: 14px !important; font-weight: 100 !important"><b>TARJETA_CREDITO_BBVA</b></p> <span style="float: right; font-size: 15px; font-weight: bold"><?php echo "S/ " . $TARJETA_CREDITO_BBVA; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    }
}
