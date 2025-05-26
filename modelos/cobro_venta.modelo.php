<?php
require_once "conexion.php";
class CobroVenta
{
    public function saveCobroVenta($id_venta, $nuevoMetodoPago, $monto, $fecha, $documento, $nombre, $descripcion, $codigo_trans, $idusrcobro, $nombrusarcobro)
    {

        $tabla = 'cobro_venta';
        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO $tabla(facturacion_comprobante_cabecera_id, tipo_pago, codigo_trans,monto,fecha,documento,nombre_cliente,descripcion,id_usuario_que_cobro,nombre_usuario_que_conbro)
            VALUES (:fcc, :tipo_pago, :codigo_trans, :monto, :fecha, :documento, :nombre_cliente, :descripcion, :id_usuario_que_cobro,:nombre_usuario_que_conbro)"
        );

        $stmt->bindParam(":fcc", $id_venta, PDO::PARAM_STR);
        $stmt->bindParam(":tipo_pago", $nuevoMetodoPago, PDO::PARAM_STR);
        $stmt->bindParam(":codigo_trans", $codigo_trans, PDO::PARAM_STR);
        $stmt->bindParam(":monto", $monto, PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);
        $stmt->bindParam(":documento", $documento, PDO::PARAM_STR);
        $stmt->bindParam(":nombre_cliente", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(":id_usuario_que_cobro", $idusrcobro, PDO::PARAM_STR);
        $stmt->bindParam(":nombre_usuario_que_conbro", $nombrusarcobro, PDO::PARAM_STR);
        $stmt->execute();
    }


    public function showCobroVenta($id_venta)
    {
        $stmt = Conexion::conectar()->query("SELECT * FROM `facturacion_comprobante_cabecera` WHERE  id = '$id_venta' ");

        $listPags["items"] = array();
        foreach ($stmt as $row) {

            $retorn = array(
                "fecha_contable" => $row["fecha_contable"],
                "serie" => $row["serie"],
                "correlativo" => $row["correlativo"],
                "nombre_cliente" => $row["nombre_cliente"],
                "num_docu_identidad" => $row["num_docu_identidad"],
                "efectivo_recibido" => $row["efectivo_recibido"],
                "total" => $row["total"]
            );
            array_push($listPags["items"], $retorn);
        }

        return json_encode($listPags["items"]);
    }
    public function listCobroVenta($id_venta)
    {
        $query = Conexion::conectar()->query("SELECT * FROM `cobro_venta` WHERE  facturacion_comprobante_cabecera_id = '$id_venta' ");
        foreach ($query as $row) {

            echo "<tr>
                    <td>{$row['tipo_pago']}</td>
                    <td>{$row['codigo_trans']}</td>
                    <td>{$row['fecha']}</td>
                    <td>{$row['monto']}</td>
                    <td>{$row['documento']}</td>
                    <td>{$row['nombre_cliente']}</td>
                    <td>{$row['descripcion']}</td>
                </tr>";
        }
    }


    public function getPagosRecibidos($fechaini, $fechafin)
    {

        $query = Conexion::conectar()->query("SELECT T1.nombre_cliente AS 'nombre_cliente_pago',T1.documento as 'docu_perso_pago',T1.fecha AS 'fecha_pago',T1.tipo_pago AS 'tipo_pago_bolsa',T1.*,T2.*  FROM `cobro_venta`   T1
                                                    INNER JOIN facturacion_comprobante_cabecera T2 ON T1.facturacion_comprobante_cabecera_id=T2.id
                                                    WHERE T1.fecha BETWEEN '$fechaini' and '$fechafin' order by T1.fecha,nombre_usuario_que_conbro,nombre_cliente_pago");



        $listData["items_total_grafico_tipo_pago"] = array();
        $cocnc = 0;
        $totalcobrado = 0;


        $data_Efectivo = 0;
        $data_TRANS_BBVA_0011_0341_5402_004517_53 = 0;
        $data_TRANS_BANCO_NACION_00381091708 = 0;
        $data_TRANS_BCP_19128084617099 = 0;
        $data_YAPE_962382960 = 0;
        $data_PLIN_962382960 = 0;

        echo "<br>";
        echo ' <h4>DETALLADO DE PAGOS RECIBIDOS DE ACUERDO AL RANGO DE FECHA ELEGIDO</h4>
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
            $totalcobrado = $totalcobrado + $row["monto"];



            $cocnc = $cocnc + 1;
            $comprobtant = $row['serie'] . '-' . $row['correlativo'];
            $id_comp_venta = $row['facturacion_comprobante_cabecera_id'];


            if ($row['tipo_pago_bolsa'] == 'Efectivo') {
                $data_Efectivo += $row['monto'];
            } else if ($row['tipo_pago_bolsa'] == 'TRANS_BBVA_0011_0341_5402_004517_53') {
                $data_TRANS_BBVA_0011_0341_5402_004517_53 += $row['monto'];
            } else if ($row['tipo_pago_bolsa'] == 'TRANS_BANCO_NACION_00381091708') {
                $data_TRANS_BANCO_NACION_00381091708 += $row['monto'];
            } else if ($row['tipo_pago_bolsa'] == 'TRANS_BCP_19128084617099') {
                $data_TRANS_BCP_19128084617099 += $row['monto'];
            } else if ($row['tipo_pago_bolsa'] == 'YAPE_962382960') {
                $data_YAPE_962382960 += $row['monto'];
            } else if ($row['tipo_pago_bolsa'] == 'PLIN_962382960') {
                $data_PLIN_962382960 += $row['monto'];
            }




            echo "<tr>
                        <td>{$cocnc}</td>
                        <td>{$row['fecha_pago']}</td>
                        <td>{$row['nombre_usuario_que_conbro']}</td>
                        <td>{$row['tipo_pago_bolsa']}</td>
                        <td>{$row['codigo_trans']}</td>
                        <td>{$row['documento_origen_de_comprobante']}</td>
                        <td>{$comprobtant} <a href='/controladores/pdf.controlador.php?id=$id_comp_venta&amp;deque=pdf_comprobante' target='_blank'><i class='fa fa-external-link-square' aria-hidden='true'></i></a></td>
                        <td>{$row['docu_perso_pago']}</td>
                        <td>{$row['nombre_cliente_pago']}</td>
                        <td>{$row['monto']}</td>
                        <td>{$row['descripcion']}</td>
                    </tr>";
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

        $data_para_grafico1 = json_encode($listData["items_total_grafico_tipo_pago"]);
        echo  $this->getPagosEfectuados_grafico_tipo_pago($data_para_grafico1, $totalcobrado, $data_Efectivo, $data_TRANS_BBVA_0011_0341_5402_004517_53, $data_TRANS_BANCO_NACION_00381091708, $data_TRANS_BCP_19128084617099, $data_YAPE_962382960, $data_PLIN_962382960);
    }



    public function getPagosEfectuados_grafico_tipo_pago($data_para_grafico1, $totalcobrado, $data_Efectivo, $data_TRANS_BBVA_0011_0341_5402_004517_53, $data_TRANS_BANCO_NACION_00381091708, $data_TRANS_BCP_19128084617099, $data_YAPE_962382960, $data_PLIN_962382960)
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
                        <div class="col-12 col-md-6" style="background: #337ab7; color: white;text-align: left;border: 4px solid white;padding: 10px 20px !important">
                            <p style="display: contents;font-size: 14px !important; font-weight: 100 !important"><b>Efectivo</b></p> <span style="float: right; font-size: 15px; font-weight: bold"><?php echo "S/ " . $data_Efectivo; ?></span>
                        </div>
                        <div class="col-12 col-md-6" style="background: #337ab7; color: white;text-align: left;border: 4px solid white;padding: 10px 20px !important">
                            <p style="display: contents;font-size: 14px !important; font-weight: 100 !important"><b>TRANS_BBVA_0011_0341_5402_004517_53</b></p> <span style="float: right; font-size: 15px; font-weight: bold"><?php echo "S/ " . $data_TRANS_BBVA_0011_0341_5402_004517_53; ?></span>
                        </div>
                        <div class="col-12 col-md-6" style="background: #337ab7; color: white;text-align: left;border: 4px solid white;padding: 10px 20px !important">
                            <p style="display: contents;font-size: 14px !important; font-weight: 100 !important"><b>TRANS_BANCO_NACION_00381091708</b></p> <span style="float: right; font-size: 15px; font-weight: bold"><?php echo "S/ " . $data_TRANS_BANCO_NACION_00381091708; ?></span>
                        </div>
                        <div class="col-12 col-md-6" style="background: #337ab7; color: white;text-align: left;border: 4px solid white;padding: 10px 20px !important">
                            <p style="display: contents;font-size: 14px !important; font-weight: 100 !important"><b>TRANS_BCP_19128084617099</b></p> <span style="float: right; font-size: 15px; font-weight: bold"><?php echo "S/ " . $data_TRANS_BCP_19128084617099; ?></span>
                        </div>
                        <div class="col-12 col-md-6" style="background: #337ab7; color: white;text-align: left;border: 4px solid white;padding: 10px 20px !important">
                            <p style="display: contents;font-size: 14px !important; font-weight: 100 !important"><b>YAPE_962382960</b></p> <span style="float: right; font-size: 15px; font-weight: bold"><?php echo "S/ " . $data_YAPE_962382960; ?></span>
                        </div>
                        <div class="col-12 col-md-6" style="background: #337ab7; color: white;text-align: left;border: 4px solid white;padding: 10px 20px !important">
                            <p style="display: contents;font-size: 14px !important; font-weight: 100 !important"><b>PLIN_962382960</b></p> <span style="float: right; font-size: 15px; font-weight: bold"><?php echo "S/ " . $data_PLIN_962382960; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    }


    public function viewRendicionesCaja($fechaini, $fechafin)
    {
        $query = Conexion::conectar()->query("SELECT cajera as 'EMITIO_COMPROBANTE',
                                                CASE
                                                    WHEN idBpm is null THEN 'Venta Directa'
                                                    ELSE 'Generada de BPM'
                                                END ORIGEN,
                                                T2.tipo_pago,serie,COUNT(T1.id) 'COUNT_INVOICE',SUM(total) 'MONEY_INVOICE',
                                                SUM(T2.monto) 'COBRADO'
                                                FROM   `facturacion_comprobante_cabecera`   T1
                                                LEFT JOIN  cobro_venta                      T2 ON T1.id=T2.facturacion_comprobante_cabecera_id
                                                WHERE fecha_contable BETWEEN '$fechaini' and '$fechafin' 
                                                GROUP BY cajera,ORIGEN,T2.tipo_pago, serie
                                                ORDER BY cajera");


        $cocnc = 0;
        foreach ($query as $row) {
            $cocnc = $cocnc + 1;
            $mntocobrado = $row['COBRADO'] > 0 ? $row['COBRADO'] : 0;
            $money_facturada = $row['MONEY_INVOICE'];
            $pacobrar = $mntocobrado - $money_facturada;
        
            echo "<tr>
                    <td>{$cocnc}</td>
                    <td>{$row['EMITIO_COMPROBANTE']}</td>
                    
                    
                    <td>" . 
                        ($row['serie'] === "B001" 
                            ? "EB01" 
                            : ($row['serie'] === "F001" ? "E001" : $row['serie'])
                        ) . 
                    "</td>
                    <td>{$row['COUNT_INVOICE']}</td>
                    <td style='background: #efde49; color: black !important;'>{$money_facturada}</td>
                    <td style='background: #63a03cd6; color: white !important;'><b>{$mntocobrado}</b></td>
                    <td style='background: #dd4b39; color: white !important;'><b>{$pacobrar}</b></td>
                 </tr>";
        }        
    }
}
