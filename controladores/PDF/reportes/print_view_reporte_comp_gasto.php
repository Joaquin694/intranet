<?php

$id_compra = base64_decode($_GET['id']);

require_once '../modelos/compras.modelo.php';
$viewListBpm = new ModeloCompras;
$datBPMi = $viewListBpm->load_detalle_compra($id_compra);

if (!$datBPMi) {
    throw new Exception('No se encontraron datos para el ID proporcionado');
}

$datasa = json_decode(json_encode($datBPMi, true), true);
if (json_last_error() !== JSON_ERROR_NONE) {
    throw new Exception('Error al decodificar los datos JSON: ' . json_last_error_msg());
}

?>

<style>
    
    .tabla-compras th, .tabla-compras td {
    word-wrap: break-word;
    overflow-wrap: break-word;
	}


</style>


<page backtop="20mm" backbottom="20mm" backleft="10mm" backright="10mm" style="font-size: 12px; word-wrap: break-word;">
    <page_header>
        <table style="width: 100%; background-color: #250126; color: white; padding: 10px;">
            <tr>
                <td style="text-align: left; width: 25%;">
                    <span style='color: #ffffff;font-size: 13px;'>Fecha:</span><br>
                    <span style='color: #ffffff;font-size: 13px;'><?php echo date("Y-m-d"); ?></span>
                </td>
                <td style="text-align: center; width: 50%;">
                    <h4>Detalle de compras</h4>
                </td>
                <td style="text-align: right; width: 25%;"></td>
            </tr>
        </table>
    </page_header>
    <div class="container">
        <div class="row">
            <!-- data -->
            <div class="col-sm-12">
                <!-- Aquí se muestran los datos -->
            </div>
            <div style="position: relative; height: 40%; width: 100%; overflow: hidden;">
                <div style="position: absolute; height: 50%; width: 60%; left: 0; top: 0;">
                    <img src="../vistas/img/cotizacion/L3.png" style='width: 80%; margin-top:30px'>
                </div>
                <div style="position: absolute; height: 50%; width: 100%; left: 0; top: 50%;">
                    <hr>
                    <div class="razon_social" style="width:100%"><b><?php echo isset($datasa['data'][0]['razon_social']) ? $datasa['data'][0]['razon_social'] : 'N/A'; ?></b></div>
                    <div style="width:100%">RUC: <span class="ruc"><?php echo isset($datasa['data'][0]['ruc']) ? $datasa['data'][0]['ruc'] : 'N/A'; ?></span></div>
                    <div class="direccion" style="width:100%">DIRECCION: <?php echo isset($datasa['data'][0]['direccion']) ? $datasa['data'][0]['direccion'] : 'N/A'; ?></div>
                    <hr>
                </div>
                <div style="height: 0%; width: 35%; position: absolute; right: 0; margin-top: 20px; border: 1px solid;  text-align: center;">
                    <h4 style="margin:5px; font-size: 15px;">COMPROBANTE DE GASTO</h4>
                    <h4 style="margin:5px; font-size: 15px;">
                        <?php echo isset($datasa['data'][0]['serie_compra']) ? $datasa['data'][0]['serie_compra'] : 'N/A'; ?>
                        -
                        <?php echo isset($datasa['data'][0]['numero_compra']) ? $datasa['data'][0]['numero_compra'] : 'N/A'; ?>
                    </h4>
                    <h4 style="margin:5px; font-size: 15px;">FECHA: <?php echo isset($datasa['data'][0]['fecha_compra']) ? $datasa['data'][0]['fecha_compra'] : 'N/A'; ?> </h4>
                </div>
            </div>

            <div class="col-sm-8">
                <b>CLIENTE:</b> <span class="razon_moali" style="border-bottom:1px solid #000"><?php echo isset($datasa['data'][0]['razon_moali']) ? $datasa['data'][0]['razon_moali'] : 'N/A'; ?></span>
            </div>
            <div class="col-sm-4">
                <b>RUC:</b> <span class="ruc_moali" style="border-bottom:1px solid #000"><?php echo isset($datasa['data'][0]['ruc_moali']) ? $datasa['data'][0]['ruc_moali'] : 'N/A'; ?></span>
            </div>
            <div class="col-sm-12">
                <b>DIRECCION:</b> <span class="direccion_moali" style="border-bottom:1px solid #000"><?php echo isset($datasa['data'][0]['direccion_moali']) ? $datasa['data'][0]['direccion_moali'] : 'N/A'; ?></span>
            </div>
            <div style="width:100%;height:20px;display: inline-block;"></div>
            <div class="col-sm-12 table-container">
                <table style="width: 100%; margin-top: 20px; border-collapse: collapse; table-layout: fixed;">
                    <thead>
                        <tr class="bg-dark" style="background-color: #333; color: #fff;">
                            <th style="width: 10%; border: 1px solid #ddd; padding: 8px; text-align: center; word-wrap: break-word; overflow-wrap: break-word;">CANT</th>
                            <th style="width: 20%; border: 1px solid #ddd; padding: 8px; text-align: center; word-wrap: break-word; overflow-wrap: break-word;">TIPO</th>
                            <th style="width: 20%; border: 1px solid #ddd; padding: 8px; text-align: center; word-wrap: break-word; overflow-wrap: break-word;">DETALLE</th>
                            <th style="width: 20%; border: 1px solid #ddd; padding: 8px; text-align: center; word-wrap: break-word; overflow-wrap: break-word;">P.UN</th>
                            <th style="width: 20%; border: 1px solid #ddd; padding: 8px; text-align: center; word-wrap: break-word; overflow-wrap: break-word;">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($datasa['data'][0]['tr_detalle_compra'])) {
                            foreach ($datasa['data'][0]['tr_detalle_compra'] as $item) : ?>
                                <tr>
                                    <td style="padding: 8px; border: 1px solid #ddd; text-align: center; word-wrap: break-word; overflow-wrap: break-word;"><?php echo isset($item['cantidad_compra']) ? $item['cantidad_compra'] : 'N/A'; ?></td>
                                    <td style="padding: 8px; border: 1px solid #ddd; text-align: center; word-wrap: break-word; overflow-wrap: break-word;"><?php echo isset($item['unidad_compra']) ? $item['unidad_compra'] : 'N/A'; ?></td>
                                    <td style="padding: 8px; border: 1px solid #ddd; text-align: left; word-wrap: break-word; overflow-wrap: break-word;"><?php echo isset($item['descripcion_compra']) ? $item['descripcion_compra'] : 'N/A'; ?></td>
                                    <td style="padding: 8px; border: 1px solid #ddd; text-align: right; word-wrap: break-word; overflow-wrap: break-word;"><?php echo isset($item['valor_compra']) ? $item['valor_compra'] : 'N/A'; ?></td>
                                    <td style="padding: 8px; border: 1px solid #ddd; text-align: right; word-wrap: break-word; overflow-wrap: break-word;"><?php echo isset($item['total_compra']) ? $item['total_compra'] : 'N/A'; ?></td>
                                </tr>
                        <?php endforeach;
                        } else {
                            echo '<tr><td colspan="5" style="padding: 8px; text-align: center;">No hay datos de items disponibles</td></tr>';
                        } ?>
                    </tbody>
                    <tfoot>
                        <tr style="background: #fcfcfc; text-align: right;">
                            <td colspan="4" style="color: #5e5e5e !important; padding: 8px; border: 1px solid #ddd;">IGV</td>
                            <td colspan="1" style="color: #5e5e5e !important; padding: 8px; border: 1px solid #ddd;"><?php echo isset($datasa['data'][0]['total_igv']) ? $datasa['data'][0]['total_igv'] : 'N/A'; ?></td>
                        </tr>
                        <tr style="background: #fcfcfc; text-align: right;">
                            <td colspan="4" style="color: #5e5e5e !important; padding: 8px; border: 1px solid #ddd;">OP. INAFECTAS</td>
                            <td colspan="1" style="color: #5e5e5e !important; padding: 8px; border: 1px solid #ddd;"><?php echo isset($datasa['data'][0]['total_inafecto']) ? $datasa['data'][0]['total_inafecto'] : 'N/A'; ?></td>
                        </tr>
                        <tr style="background: #fcfcfc; text-align: right;">
                            <td colspan="4" style="color: #5e5e5e !important; padding: 8px; border: 1px solid #ddd;">OP. GRAVADAS</td>
                            <td colspan="1" style="color: #5e5e5e !important; padding: 8px; border: 1px solid #ddd;"><?php echo isset($datasa['data'][0]['total_gravado']) ? $datasa['data'][0]['total_gravado'] : 'N/A'; ?></td>
                        </tr>
                        <tr style="background: #fcfcfc; text-align: right;">
                            <td colspan="4" style="color: #5e5e5e !important; padding: 8px; border: 1px solid #ddd;">IMPORTE TOTAL</td>
                            <td colspan="1" style="color: #5e5e5e !important; padding: 8px; border: 1px solid #ddd;"><?php echo isset($datasa['data'][0]['total_compra']) ? $datasa['data'][0]['total_compra'] : 'N/A'; ?></td>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
</page>