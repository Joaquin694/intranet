<?php
$base_id = base64_decode($_GET['id']);
header("Content-Type: application/json");
require_once "../modelos/new-venta.modelo.php";
$viewListBpm = new ModeloPanelFacturaBpm;
$datBPMi = $viewListBpm->load_detalle_cotizacion($base_id);
$datasa = json_decode(json_encode($datBPMi, true), true);

// print_r(json_encode($datBPMi,true));
?>
<style>
    @font-face {
        font-family: 'NunitoSans';
        src: url('/vistas/dist/css/Nunito_Sans/NunitoSans-Italic-VariableFont_YTLC,opsz,wdth,wght.ttf') format('truetype');
        font-weight: normal;
        font-style: normal;
    }
</style>
<page backtop="0mm" backbottom="0mm" backleft="0mm" backright="0mm">



    <page_header style="margin-top: -55px;padding: 0px; ">
        <!-- HEADER -->

        <div style="position: relative; height: 60px; width: 100%; overflow: hidden; margin-top:55px">
            <div style="position: absolute; height: 100%; width: 60%; left: 0; top: 0; background: #FE9E23;"></div>
            <div style="position: absolute; height: 100%; width: 40%; right: 0; top: 0; background: #250126;"></div>
        </div>

        <!-- <table style=" width: 120%;margin-left: -20px">
                <tr style=" width: 100%; ">
                    <th style=" width: 11%; ">
                        <span style="color:#250126; font-size: 14px">Cliente:</span>
                    </th>
                    <th style=" width: 37%; color: #626060">
                        <p style="font-size: 10.5px;margin-top: 0px"> <?php $datasa['data']['nombre_cliente']; ?></p>
                    </th>
                    <th style=" width: 10%">
                        <span style="color:#250126; font-size: 14px"><?php $datasa['data']['tipo_documento']; ?> Nº:</span>
                    </th>
                    <th style=" width: 10%; color: #626060">
                        <p style="font-size: 10.5px;margin-top: 0px"> <?php $datasa['data']['numero_documento']; ?></p>
                    </th>
                    <th style=" width: 9%">
                    <span style="color:#250126; font-size: 14px">Celular:</span>
                    </th>
                    <th style=" width: 22%; color: #626060">
                    <p style="font-size: 10.5px;margin-top: 0px"> <?php $datasa['data']['telefono_contacto']; ?></p> 
                    </th>
                </tr>
        </table> -->

        <!-- <table style=" width: 120%;margin-left: -20px;margin-top: 7px">
                <tr style=" width: 100%; ">
                    <th style=" width: 11%; ">
                        <span style="color:#250126; font-size: 14px">Dirección:</span>
                    </th>
                    <th style=" width: 88%; color: #626060">
                <p style="font-size: 10.5px;margin-top: 0px">  <?php ucfirst($datasa['data']['direccion']); ?> </p>
                    </th>
                
                </tr>
        </table> -->

    </page_header>

    <!-- HEADER - TABLE -->

    <table style=" width: 100%; margin-top: 70px; margin-left: 7%;">
        <tr style=" width: 100%">
            <th style=" width: 50%; text-align: center;justify-content: center;">
                <img src="../vistas/img/cotizacion/L3.png" style='border-radius: 0px 0px 200px 200px; width: 80% '>
            </th>
            <th style="width: 27%; " ></th>
            <th style=" width: 13%;text-align: right;">
                N°<?php printf('%08d', $datasa['data']['id_cotizacion']); ?>
            </th>
        </tr>
    </table>
    <br><br>

    <!-- <table style=" width: 100%">     
        <tr style=" width: 100%">
            <th style=" width: 100%; ">
                <div style="font-size:30px;font-weight: 700;color:#250126; text-align: center"><b>COTIZACION</b></div>
            </th>
        </tr>
    </table>  a1-->

    <table style=" width: 100%">
        <tr style=" width: 100%">
            <th style=" width: 80%;">
                <div style="width: 80%; margin-left: 40px;">
                    <b>Sr. (s).</b> <?php echo $datasa['data']['nombre_cliente']; ?>
                    <br>
                    <p style="font-size: 13.5px;font-weight: 200;">
                        Atención: <?php echo $datasa['data']['nombre_contacto']; ?><br><br>
                        De nuestra consideración:<br><br>
                        Por intermedio del presente reciba usted nuestro cordial saludo, y a su vez la misma tiene por finalidad hacer llegar nuestra propuesta económica en atención a su solicitud de cotización por traslado de <b><?php echo $datasa['data']['equipo']; ?> </b> en nuestra unidad <?php echo $datasa['data']['ameEmpresa']; ?>
                    </p>
                </div>
            </th>
            <th style="width: 20%;">
                <div style="padding: 10px 40px 10px 40px; height:50px; width: 150px; padding-left: 20px;">
                    <span style='font-size: 13px;'>Fecha Emisión:</span><br>
                    <span style='font-size: 13px;'><?php echo $datasa['data']['fecha_emision_cotizacion']; ?></span><br><br>
                    <span style='color: #250126;font-size: 13px;'>Fecha Validez:</span><br>
                    <span style='color: #250126;font-size: 13px;'><?php echo $datasa['data']['fecha_vencimiento_cotizacion']; ?></span>
                </div>
            </th>
        </tr>
    </table>

    <br><br>

    <table style="width: 120%; margin-top: 0px; border: 1px solid #999; border-collapse: collapse; border-bottom: 1px solid #999;">
        <tr style="background: #250126">
            <th style="margin: 0px; color:#FFFFFF; width: 13%; text-align: center; padding: 5px 0px;">ITEM</th>
            <th style="margin: 0px; color:#FFFFFF; width: 25%; text-align: center; padding: 5px 0px;">PRODUCTO</th>
            <th style="margin: 0px; color:#FFFFFF; width: 10%; text-align: center; padding: 5px 0px;">CANT.</th>
            <th style="margin: 0px; color:#FFFFFF; width: 11%; text-align: center; padding: 5px 0px;">UNID.</th>
            <th style="margin: 0px; color:#FFFFFF; width: 12%; text-align: center; padding: 5px 0px;">VALOR<br>UNIT.</th>
            <th style="margin: 0px; color:#FFFFFF; width: 13%; text-align: center; padding: 5px 0px;">VALOR<br>TOTAL</th>
        </tr>
        <?php
        $array_num = count($datasa["data"]["items"]);

        for ($i = 0; $i < $array_num; ++$i) {
            $border_style = $i == $array_num - 1 ? '' : 'border-bottom: 1px solid #250126;';
            $name_cod = $datasa["data"]["items"][$i]["unidad"] == 'SERVICIO' ? 'SERVICIO ' : 'HERLU ';

            echo '<tr style="padding: 0px; margin: 0px;">
                  <td style="font-size: 11px; margin: 0px; width: 13%; text-align: center;  padding:14px 9px 14px 9px; ' . $border_style . '">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $name_cod . $datasa["data"]["items"][$i]["id_producto"] . '</td>
                  <td style="font-size: 11px; margin: 0px; width: 25%; text-align: center;  padding:14px 9px 14px 9px; ' . $border_style . '">' . strtoupper($datasa["data"]["items"][$i]["descripcion"]) . '</td>
                  <td style="font-size: 11px; margin: 0px; width: 10%; text-align: center;  padding:14px 9px 14px 9px; ' . $border_style . '">' . $datasa["data"]["items"][$i]["cantidad"] . '</td>
                  <td style="font-size: 11px; margin: 0px; width: 11%; text-align: center;  padding:14px 9px 14px 9px; ' . $border_style . '">' . $datasa["data"]["items"][$i]["unidad"] . '</td>
                  <td style="font-size: 11px; margin: 0px; width: 12%; text-align: center;  padding:14px 9px 14px 9px; ' . $border_style . '">' . $datasa["data"]["items"][$i]["precio"] . '</td>
                  <td style="font-size: 11px; margin: 0px; width: 13%; text-align: center;  padding:14px 9px 14px 9px; ' . $border_style . '">' . $datasa["data"]["items"][$i]["total"] . '</td>
              </tr>';
        }
        ?>
    </table>




    <!-- <page_footer> -->
    <!-- PIE DE PAGINA -->
    <!-- <table style="width: 100%; padding-right: -60px; margin: 0; border: 0; border-collapse: collapse; background:red;">
        <tr style="width: 100%;">
            <th style="width: 30%; border: none;">
                <br>
            </th>
            <th style="width: 15%; border: none;">
                <br>
            </th>
            <th style="width: 50%; border: none;">
                <table style="background: #250126; width: 100%; margin-left: 110px; margin-top: 27px; border-collapse: red;">
                    <tr>
                        <th style="width: 3px; border: none; padding:9px 9px 9px 9px; background: blue;"></th>
                        <th style="color: #FFFFFF; width: 25%; text-align: right; border: none; padding:9px 9px 9px 9px;">Sub total:</th>
                        <th style="color: #FFFFFF; width: 25%; text-align: right; border: none; padding:9px 9px 9px 9px;">
                            <span>
                                <?php
                                if ($datasa['data']['total_gravado'] > 0) {
                                    echo $datasa['data']['total_gravado'];
                                } else {
                                    echo $datasa['data']['total_inafecto'];
                                }
                                ?>
                            </span>
                        </th>
                        <th style="width: 3px; border: none; background: blue;"></th>
                    </tr>
                    <tr>
                        <th style="width: 3px; border: none; padding:9px 9px 9px 9px; background: blue;"></th>
                        <th style="color: #FFFFFF; width: 25%; text-align: right; border: none;  padding:9px 9px 9px 9px;">IGV 18%:</th>
                        <th style="color: #FFFFFF; width: 25%; text-align: right; border: none;  padding:9px 9px 9px 9px;">
                            <span><?php echo $datasa['data']['total_igv']; ?></span>
                        </th>
                        <th style="width: 3px; border: none; background: blue;"></th>
                    </tr>
                    <tr style="background: #250126;">
                        <th style="width: 3px; border: none; padding:9px 9px 9px 9px; background: blue;"></th>
                        <th style="color: #FFFFFF; width: 25%; text-align: right; border: none; padding:9px 9px 9px 9px;">TOTAL:</th>
                        <th style="color: #FFFFFF; width: 25%; text-align: right; border: none; padding:9px 9px 9px 9px;">
                            <span><?php echo $datasa['data']['total_cotizacion']; ?></span>
                        </th>
                        <th style="width: 3px; border: none; padding:9px 9px 9px 9px; background: blue;"></th>
                    </tr>
                </table>
            </th>
        </tr>
    </table> -->

    <table style="background: #250126; width: 50%; margin-left: 550px; margin-top: 27px; border-collapse: collapse; text-align:center;">
        <tr>
            <th style="width: 6%; border: none; padding:9px 9px 9px 9px;"></th>
            <th style="color: #FFFFFF; width: 25%; text-align: right; border: none; padding:9px 9px 9px 9px;">Sub total:</th>
            <th style="color: #FFFFFF; width: 25%; text-align: right; border: none; padding:9px 9px 9px 9px;">
                <span>
                    <?php
                    if ($datasa['data']['total_gravado'] > 0) {
                        echo $datasa['data']['total_gravado'];
                    } else {
                        echo $datasa['data']['total_inafecto'];
                    }
                    ?>
                </span>
            </th>
            <th style="width: 6%; border: none;"></th>
        </tr>
        <tr>
            <th style="width: 6%; border: none; padding:9px 9px 9px 9px;"></th>
            <th style="color: #FFFFFF; width: 25%; text-align: right; border: none;  padding:9px 9px 9px 9px;">IGV 18%:</th>
            <th style="color: #FFFFFF; width: 25%; text-align: right; border: none;  padding:9px 9px 9px 9px;">
                <span><?php echo $datasa['data']['total_igv']; ?></span>
            </th>
            <th style="width: 6%; border: none;"></th>
        </tr>
        <tr style="background: #250126;">
            <th style="width: 6%; border: none; padding:9px 9px 9px 9px;"></th>
            <th style="color: #FFFFFF; width: 25%; text-align: right; border: none; padding:9px 9px 9px 9px;">TOTAL:</th>
            <th style="color: #FFFFFF; width: 25%; text-align: right; border: none; padding:9px 9px 9px 9px;">
                <span><?php echo $datasa['data']['total_cotizacion']; ?></span>
            </th>
            <th style="width: 6%; border: none; padding:9px 9px 9px 9px;"></th>
        </tr>
    </table>
        <!-- <table style=" width: 100%">     
                <tr style=" width: 100%">
                    <th style=" width: 45%; ">
                        <img src="../vistas/img/cotizacion/aceptacion_del_cliente.png" style='width: 100%; margin-left: -85px'>
                    </th>
                </tr>
                <tr style=" width: 100%">
                    <th style=" width: 40%; "><br>
                        <b style="font-size: 12px;color:#626060; margin-left: -50px">Acepto y me obligo a pagar.</b><br>
                        <b style="font-size: 12px;margin-top: 8px;color:#626060; margin-left: -50px">Firma:______________________</b><br>
                        <b style="font-size: 12px;margin-top: 8px;color:#626060; margin-left: -50px">Nombre: ____________________</b><br>
                        <b style="font-size: 12px;margin-top: 8px;color:#626060; margin-left: -50px">RUC/DNI: ___________________</b><br>
                    </th>
                </tr>            
            </table>  -->
    <!-- background: #FE9E23; -->
    <table style=" width: 45%; margin-right: -25px; border-collapse: collapse;">
        <tr style=" width: 100%; background-color: #250126;">
            <th style="padding:9px 9px 9px 9px; color: #FFFFFF; ">
                <div style="margin-left:35px">
                    OBSERVACIONES GENERALES DE COTIZACIÓN
                </div>
            </th>
        </tr>
        <tr style=" width: 100%;">
            <th style=" width: 100%; margin-right:10px; text-align:left;">
                <div style="height:90px; width:320px; padding: 10px 40px 10px 20px;">
                    <ul style="font-size: 12px; font-weight: 300;">
                        <?php
                            if ($datasa['data']['total_igv'] <= 0 && $datasa['data']['numRuc'] !== 'NE') {
                                echo "<li>" . $datasa['data']['numRuc'] . "</li>";
                            }
                        ?>
                        <?php if ($datasa['data']['marca'] !== 'NE') echo "<li>" . $datasa['data']['marca'] . "</li>"; ?>
                        <?php if ($datasa['data']['placa'] !== 'NE') echo "<li>" . $datasa['data']['placa'] . "</li>"; ?>
                        <?php if ($datasa['data']['confVehicular'] !== 'NE') echo "<li>" . $datasa['data']['confVehicular'] . "</li>"; ?>
                        <?php if ($datasa['data']['habVehicular'] !== 'NE') echo "<li>" . $datasa['data']['habVehicular'] . "</li>"; ?>
                        <?php if ($datasa['data']['conductor'] !== 'NE') echo "<li>" . $datasa['data']['conductor'] . "</li>"; ?>
                        <?php if ($datasa['data']['licencia'] !== 'NE') echo "<li>" . $datasa['data']['licencia'] . "</li>"; ?>
                    </ul>
                </div>
            </th>
        </tr>
    </table>
    <br>
    
    <table style=" width: 92.6%; background: #250126; color:#FFFFFF;">
        <tr style=" width: 100%;">
            <th style=" width: 100%; color:#FFFFFF">
                <div style="margin-left: 40px; ">
                    Realizar el pago a nombre de INVERSIONES Y SERVICIOS HERMOZA LUZ en
                </div>
                <!-- Realizar el pago a nombre de INVERSIONES Y SERVICIOS HERMOZA LUZ en -->

            </th>
        </tr>
    </table>
    <table style=" width: 90%;  background: #250126; color:#FFFFFF">
        <tr style=" width: 100%;">
            <th style=" width:40px;"></th>
            <th style=" width: 31%;">
                <p style="font-size: 12px; font-weight: 200;">
                    <b>BCP (soles)</b><br>
                    CC N° 19128084617099<br>
                    CC N° 00219112808461709958

                </p>
            </th>
            <th style=" width: 36%; ">
                <p style="font-size: 12px; font-weight: 200;">
                    <b>BBVA (soles)</b><br>
                    CC N° 0011-0341-54-0200451753<br>
                    CC1-011-341-000200451753-54
                </p>
            </th>
            <th style=" width: 30%; ">
                <p style="font-size: 12px; font-weight: 200;">
                    <b>BANCO DE LA NACIÓN (detracciones)</b><br>
                    CCI N° 00381091708
                </p>
            </th>
        </tr>
    </table>

    <table style=" width: 95%; margin-right: 100px;">
        <tr style=" width: 100%;">
            <th style=" width: 100%; ">
                <div style="width:80%; margin-left: 40px;">
                    <p style="font-size: 12px;">
                        En espera que nuestra cotización sea de su total satisfacción y poder atender sus pedidos me despido.<BR>
                        Atentamente.
                        <i>Nicky Luz Vivanco Manrique</i><br><br>
                    </p>
                </div>
            </th>
        </tr>
    </table>
    <br>
    <table style=" width: 35%; height: 200px;background: #250126; color: #FFFFFF">
        <tr style=" width: 100%; ">
            <th style=" width: 100%;">
                <div style="margin-left: 40px;">
                    Forma de Pago<br>
                    <span style="font-size: 14px;"><?php echo $datasa['data']['condicion_pago']; ?></span>
                </div>
            </th>
        </tr>
    </table>



    <page_footer style='padding: 0px; '>
        <table style=" width: 100%">
            <tr style=" width: 100%">
                <th style=" width: 100%; text-align: right;padding-bottom: 11px ">
                    <p style='color:#626060;width: 112%; margin-left: -25px;font-size: 12px'>RUC: 20487040852&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                    <p style='color:#626060;width: 112%; margin-left: -25px;font-size: 12px;margin-top: -9px'> Telf.: 962 382 960&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                    <p style='color:#626060;width: 112%; margin-left: -25px;font-size: 12px;margin-top: -9px;'>Email: inserhl@outlook.com | inversionesyservicioshermozaluzsrl2010@hotmail.com&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                </th>
            </tr>
        </table>
    </page_footer>
</page>























<?php if (!empty($datasa['data']['transport_data'])): ?>

    <page backtop="68mm" backbottom="8mm" backleft="8mm" backright="9mm">
        <page_header style="background: red; margin-top: 10px;padding: 40px; ">
            <!-- HEADER -->
            <table style=" width: 100%">
                <tr style=" width: 100%">
                    <th style=" width: 25%">

                    </th>
                    <th style=" width: 50%; text-align: center;justify-content: center;"><img src="../vistas/img/cotizacion/LOGO_HERMOZALUZ_COTIZACION.png" style='border-radius: 0px 0px 200px 200px; width: 80% '> </th>
                    <th style=" width: 25%;text-align: right">

                    </th>
                </tr>
            </table>
            <table style=" width: 100%">
                <tr style=" width: 100%">
                    <th style=" width: 100%">
                        <img src="../vistas/img/cotizacion/line_cotizacion.png" style='width: 100%'>
                    </th>
                </tr>
            </table>

            <!-- Accediendo a los campos de la tabla transport_data_cotizacion -->
            <table style="width: 100%; border-collapse: collapse; font-family: Arial, sans-serif; margin: 20px;padding: 40px;">
                <tr>
                    <td colspan="2" style="font-weight: bold; background-color: #d9e2f3; border: 1px solid #000; padding: 8px; text-align: center;">DATOS DEL TRANSPORTE</td>
                </tr>
                <tr>
                    <td style="width: 50%; font-weight: bold; background-color: #d9e2f3; border: 1px solid #000; padding: 8px;">EMPRESA DE TRANSPORTE</td>
                    <td style="width: 50%; border: 1px solid #000; padding: 8px;"><?php echo $datasa['data']['transport_data']['empresa'] ?? 'N/A'; ?></td>
                </tr>
                <tr>
                    <td style="width: 50%; font-weight: bold; background-color: #d9e2f3; border: 1px solid #000; padding: 8px;">NRO DE RUC</td>
                    <td style="width: 50%; border: 1px solid #000; padding: 8px;"><?php echo $datasa['data']['transport_data']['ruc'] ?? 'N/A'; ?></td>
                </tr>
                <tr>
                    <td style="width: 50%; font-weight: bold; background-color: #d9e2f3; border: 1px solid #000; padding: 8px;">MARCA</td>
                    <td style="width: 50%; border: 1px solid #000; padding: 8px;"><?php echo $datasa['data']['transport_data']['marca'] ?? 'N/A'; ?></td>
                </tr>
                <tr>
                    <td style="width: 50%; font-weight: bold; background-color: #d9e2f3; border: 1px solid #000; padding: 8px;">PLACA</td>
                    <td style="width: 50%; border: 1px solid #000; padding: 8px;"><?php echo $datasa['data']['transport_data']['placa'] ?? 'N/A'; ?></td>
                </tr>
                <tr>
                    <td style="width: 50%; font-weight: bold; background-color: #d9e2f3; border: 1px solid #000; padding: 8px;">CONF. VEHICULAR</td>
                    <td style="width: 50%; border: 1px solid #000; padding: 8px;"><?php echo $datasa['data']['transport_data']['conf_vehicular'] ?? 'N/A'; ?></td>
                </tr>
                <tr>
                    <td style="width: 50%; font-weight: bold; background-color: #d9e2f3; border: 1px solid #000; padding: 8px;">HAB. VEHICULAR</td>
                    <td style="width: 50%; border: 1px solid #000; padding: 8px;"><?php echo $datasa['data']['transport_data']['hab_vehicular'] ?? 'N/A'; ?></td>
                </tr>
                <tr>
                    <td style="width: 50%; font-weight: bold; background-color: #d9e2f3; border: 1px solid #000; padding: 8px;">CONDUCTOR</td>
                    <td style="width: 50%; border: 1px solid #000; padding: 8px;"><?php echo $datasa['data']['transport_data']['conductor'] ?? 'N/A'; ?></td>
                </tr>
                <tr>
                    <td style="width: 50%; font-weight: bold; background-color: #d9e2f3; border: 1px solid #000; padding: 8px;">LICENCIA</td>
                    <td style="width: 50%; border: 1px solid #000; padding: 8px;"><?php echo $datasa['data']['transport_data']['licencia'] ?? 'N/A'; ?></td>
                </tr>
                <tr>
                    <td style="width: 50%; font-weight: bold; background-color: #d9e2f3; border: 1px solid #000; padding: 8px;">EQUIPO</td>
                    <td style="width: 50%; border: 1px solid #000; padding: 8px;"><?php echo $datasa['data']['transport_data']['equipo'] ?? 'N/A'; ?></td>
                </tr>
            </table>





            <BR>
        </page_header>

        <page_footer style='padding: 0px;'>
            <table style="width: 100%">
                <tr style="width: 100%">
                    <th style="width: 100%; text-align: right;padding-bottom: 11px">
                        <p style='color:#626060;width: 112%; margin-left: -25px;font-size: 12px'>RUC: 20487040852 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;
                        </p>
                        <p style='color:#626060;width: 112%; margin-left: -25px;font-size: 12px;margin-top: -9px'> Telf.: 962 382 960 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;
                        </p>
                        <p style='color:#626060;width: 112%; margin-left: -25px;font-size: 12px;margin-top: -9px;'>Email: inserhl@outlook.com | inversionesyservicioshermozaluzsrl2010@hotmail.com &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;
                        </p>
                    </th>
                </tr>
                <tr style="width: 100%">
                    <th style="width: 100%;">
                        <img src="../vistas/img/cotizacion/green_barr.PNG" style='width: 112%; margin-left: -55px;'>
                    </th>
                </tr>
            </table>
        </page_footer>


    </page>
<?php endif; ?>