<?php
$base_id = base64_decode($_GET['id']);
header("Content-Type: application/json");
require_once "../modelos/guia-remision.modelo.php";
$viewListBpm = new ModeloGuiaRemision;
$datBPMi = $viewListBpm->load_total_remision($base_id);
$datasa = json_decode(json_encode($datBPMi, true), true);
// print_r($datasa);
?>
<page backtop="0mm" backbottom="0mm" backleft="0mm" backright="0mm">

    <table style="width: 100%;">
        <tr style="width: 100%;">
            <th style="width: 20%; height: 10%; ">
                <div style="height: 80%; width:70%; background: black; margin-left: 13px; margin-top:20px">

                </div>
            </th>
            <th style="width: 50%; height: 10%; ">
                <p style="font-size: 15px;">INVERSIONES Y SERVICIOS HERMOZA LUZ
                    S.R.L.</p>
                <p style="font-size: 13.5px;font-weight: 200;">
                    Fecha de registro: <?php echo $datasa['data'][0]['fecha']; ?><br><br>
                </p>
            </th>
            <th style="width: 30%; height: 10%; ">
                <div style=" height:60%; border: 1px solid #000000; position: absolute; text-align:center; margin-top: 15px;">
                    <h4 style="margin:5px; padding: 10px; font-size: 12px;">RUC N°20487040852</h4>
                    <h4 style="margin:5px; padding: 10px; font-size: 12px;">GUÍA DE REMISIÓN ELECTRÓNICA <br>
                        TRANSPORTISTA</h4>
                    <!-- <h4 style="margin:5px; font-size: 15px;">N° EG03 - 00000021</h4> -->
                </div>
            </th>
        </tr>
    </table>
    <!-- Contenedor con display flex para colocar los divs en una misma fila -->

    <table style=" width: 100%; height:15%; font-size: 12px;">
        <tr style="width: 100%;">
            <th style=" width: 50%;">
                <p style="font-size: 12px;font-weight: 200;">
                    <b style="margin-left: 20px;">Fecha de inicio de Traslado:</b> <?php echo $datasa['data'][0]['tras_fecha']; ?>
                </p>
            </th>
            <th style=" width: 50%;">
                <p style="font-size: 12px;font-weight: 200;">
                    <b>Punto de Partida:</b> <?php echo $datasa['data'][0]['direc_dir_partida']; ?> (<?php echo $datasa['data'][0]['direc_ubigeo_partida']; ?>)<br>
                </p>
                <p style="font-size: 12px;font-weight: 200;">
                    <b>Punto de llegada:</b> <?php echo $datasa['data'][0]['direc_dir_llegada']; ?> (<?php echo $datasa['data'][0]['direc_ubigeo_llegada']; ?>)<br><br>
                </p>
            </th>
        </tr>
    </table>
    <div style="width: 100%">
        <b style="margin: 5px, 5px, 5px, 20px font-size: 12px;">Datos del cliente:</b> <?php echo $datasa['data'][0]['cli_nom_client']; ?> <br>
        <b style="margin: 5px, 5px, 5px, 20px">Correo:</b> <?php echo $datasa['data'][0]['cli_email']; ?><br>
    </div><br><br><br>
    <table style="width: 100%; font-size:12px;">
        <tr style="width: 100%;">
            <th style=" width: 30%;">
                <b style="margin-left: 20px;">Bienes por Transportar:</b>
            </th>
            <th style=" width: 70%;">
                <table style="width: 100%; margin-top: 20px; border-collapse: collapse;">
                    <tbody>
                        <?php
                        if (isset($datasa['data']) && !empty($datasa['data'])) {
                            foreach ($datasa['data'] as $item) {
                        ?>
                                <tr>
                                    <td style="padding: 8px; font-size: 12px;"><?php echo htmlspecialchars($item['detail_cant'] ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td style="padding: 8px; font-size: 12px;"><?php echo htmlspecialchars($item['detail_cod'] ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td style="padding: 8px; font-size: 12px;"><?php echo htmlspecialchars($item['detail_produc'] ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td style="padding: 8px; font-size: 12px;"><?php echo htmlspecialchars($item['detail_unidad'] ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td style="padding: 8px; font-size: 12px;"><?php echo htmlspecialchars($item['detail_val_unit'] ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td style="padding: 8px; font-size: 12px;"><?php echo htmlspecialchars($item['detail_val_total'] ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?></td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo '<tr><td colspan="6" style="padding: 8px; border: 1px solid #000; text-align: center;">No hay datos de detalles disponibles...</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </th>
        </tr>
    </table>
    <table style="width: 100%; height: 10%; font-size:12px; border-collapse: collapse;">
        <tr>
            <td style="  padding: 10px; " colspan="2">
                <b style="margin: 5px, 5px, 5px, 20px">Datos de traslado:</b>
            </td>
        </tr>
        <tr>
            <td style=" padding: 10px;  width: 50%; font-size:12px;">
                <b style="margin: 5px, 5px, 5px, 20px">Motivo del Traslado:</b> <?php echo $datasa['data'][0]['tras_motivo']; ?><br>
                <b style="margin: 5px, 5px, 5px, 20px">Modalidad de traslado:</b> <?php echo $datasa['data'][0]['tras_modalidad']; ?><br>
                <b style="margin: 5px, 5px, 5px, 20px">Peso bruto (KGM):</b> <?php echo $datasa['data'][0]['tras_peso']; ?><br>
                <b style="margin: 5px, 5px, 5px, 20px">Número de bultos:</b> <?php echo $datasa['data'][0]['tras_num_bult']; ?><br>
            </td>
            <td style= "padding: 10px;  width: 50%; font-size:12px;">
                <b style="margin: 5px, 5px, 5px, 20px">Número de contenedor:</b> <?php echo $datasa['data'][0]['tras_num_cont']; ?><br>
                <b style="margin: 5px, 5px, 5px, 20px">Código de puerto:</b> <?php echo $datasa['data'][0]['tras_cod_puerto']; ?><br>
            </td>
        </tr>
    </table>
    <table style="width: 100%; height: 10%; font-size:12px;">
        <tr>
            <td style="  padding: 10px; " colspan="2">
                <b style="margin: 5px, 5px, 5px, 20px">Datos de transporte:</b>
            </td>
        </tr>
        <tr>
            <td style=" padding: 10px;  width: 50%; font-size:12px;">
                <b style="margin: 5px, 5px, 5px, 20px">Tipo Doc.Ident:</b> <?php echo $datasa['data'][0]['trans_tipo_doc']; ?><br>
                <b style="margin: 5px, 5px, 5px, 20px">N° Doc Conductor:</b> <?php echo $datasa['data'][0]['trans_num_doc_cont']; ?><br>
                <b style="margin: 5px, 5px, 5px, 20px">Nombre Conductor:</b> <?php echo $datasa['data'][0]['trans_nombre_cont']; ?><br>
            </td>
            <td style=" padding: 10px;  width: 50%; font-size:12px;">
                <b style="margin: 5px, 5px, 5px, 20px">N° Licencia Conducir:</b> <?php echo $datasa['data'][0]['trans_num_licencia']; ?><br>
                <b style="margin: 5px, 5px, 5px, 20px">N° Placa Vehíc:</b> <?php echo $datasa['data'][0]['trans_num_placa']; ?><br>
            </td>
        </tr>
    </table>
    <table style="width: 100%; height: 10%; font-size:12px;">
        <tr>
            <td style="  padding: 10px; " colspan="2">
                <b style="margin: 5px, 5px, 5px, 20px"> Documento de Referencia:</b>
            </td>
        </tr>
        <tr>
            <td style=" padding: 10px;  width: 50%; font-size:12px;">
                <b style="margin: 5px, 5px, 5px, 20px">Tipo Documento:</b> <?php echo $datasa['data'][0]['doc_tipo_doc']; ?><br>
                <b style="margin: 5px, 5px, 5px, 20px">Serie:</b> <?php echo $datasa['data'][0]['doc_serie']; ?><br>
                <b style="margin: 5px, 5px, 5px, 20px">Número:</b> <?php echo $datasa['data'][0]['doc_num']; ?><br>
            </td>
            <td style=" padding: 10px;  width: 50%; font-size:12px;">
                <b style="margin: 5px, 5px, 5px, 20px">Información adicional para SUNAT:</b> <?php echo $datasa['data'][0]['doc_info']; ?><br>
            </td>
        </tr>
    </table>
    <page_footer style='padding: 0px;'>
        <p style="font-size:12px; margin: 5px, 5px, 5px, 20px;">Esta es una representación impresa sin valor tributario de la Guía de Remisión Electrónica generada en el sistema de la SUNAT. Puede verificarla utilizando su clave SOL</p><br>
    </page_footer>

</page>