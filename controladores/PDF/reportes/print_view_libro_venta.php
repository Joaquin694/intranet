<!DOCTYPE html>
<html lang="es">
<head ><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
table {
    text-align: center;
    position:auto;
    width: auto;
    font-size:9px;
    height: auto;
    align:center;
    white-space: nowrap;
    border-collapse: collapse;
  }
  .th th {
    
    border: black 1px solid;
   
    }
    .table td {
   
    border-bottom: 0.1px solid;
}

</style>
</head>
<body >
<?php
ini_set('max_execution_time', '600');
//require '../modelos/config.php';
require '../modelos/conexion.php';

$fechaini = $_GET['fechaini'];
$fechafin = $_GET['fechafin'];

$Meses = array('ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO',
       'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE');
       $explodeMes = explode("-", $_GET['fechafin']);
$fmes = $explodeMes[1];
       for ($i=1; $i<=12; $i++) {
        if ($i == $fmes){$mes=$Meses[($i)-1];}}

?>
<page_header backtop="10mm" backbottom="10mm" backleft="10mm" backright="20mm">
        <table id="encabezado" style="width:100%">
            <tr class="fila">
                <td id="col_1" style="width:30%; font-size:13px; text-align: left;">
                <b>EL LABORATORIO DE CAFE MOALI S.A.C.</b>
                </td>
                <td id="col_2"style="width:40%"> </td>
                <td id="col_2"style="width:30%"></td>
            </tr>
            <tr class="fila">
                <td id="col_1" style="text-align: left; font-size:11px;">PERIODO <?php echo substr($_GET['fechafin'], 0, 4);?></td>
                <td id="col_2"></td>
                <td id="col_2"></td>
            </tr>
            <tr class="fila">
                <td id="col_1" style="text-align: left; font-size:11px;"> MZ A LT 5B URB BARBADILLO ATE  </td>
                <td id="col_2" style="font-size:13px;"> <b>*** REGISTRO DE VENTAS DEL MES DE <?php  echo $mes?> ***</b></td>
                <td id="col_2"></td>
            </tr>
            <tr class="fila">
                <td id="col_1" style="text-align: left; font-size:11px;">  R.U.C:20601012597           </td>
                <td id="col_2" style="font-size:13px;"><b> SOLES</b></td>
                <td id="col_2" style="text-align: right;"><b> <?php echo $_GET['fechafin'];?></b></td>
            </tr>
        </table><br/>
        <table class="th"> 
<tr align="center">
    <th rowspan="2" bgcolor="#D0E8F9">ORG</th>
    <th rowspan="2" style="width: 20px" bgcolor="#D0E8F9">N° VOU</th>
    <th rowspan="2" style="width: 45px" bgcolor="#D0E8F9">F. Emisión</th>
    <th rowspan="2" style="width: 45px" bgcolor="#D0E8F9">F. Venc.</th>
    <th colspan="3" style="width: 110px" bgcolor="#D0E8F9">Datos del comprobante</th>
    <th colspan="4" style="width: 170px" bgcolor="#D0E8F9">Referencia del Comprobante</th>
    <th colspan="3" style="width: 180px" bgcolor="#D0E8F9">Información del Cliente</th>
    <th rowspan="2" style="width: 50px" bgcolor="#D0E8F9">Valor Facturado de la Exportación</th>
    <th rowspan="2" style="width: 50px" bgcolor="#D0E8F9">Base Imp. de la Ope. Gravada</th>
    <th colspan="2" style="width: 90px" bgcolor="#D0E8F9">Imp. Total de la Operación</th>
    <th rowspan="2" style="width: 30px" bgcolor="#D0E8F9">I.S.C</th>
    <th rowspan="2" style="width: 30px" bgcolor="#D0E8F9">I.V.G</th>
    <th rowspan="2" style="width: 40px" bgcolor="#D0E8F9">ICBPER</th>
    <th rowspan="2" style="width: 40px" bgcolor="#D0E8F9">Otros Tributos</th>
    <th rowspan="2" style="width: 40px" bgcolor="#D0E8F9">Total</th>
    <th rowspan="2" style="width: 25px" bgcolor="#D0E8F9">T/C</th>
</tr>
<tr  align="center">
    
    <th>T/D </th>
    <th>Serie</th>
    <th>Número</th>
    <th style="width: 40px">Fecha</th>
    <th style="width: 20px">T/D</th>
    <th style="width: 20px">Serie</th>
    <th style="width: 20px">Número</th>
    <th style="width: 15px">Doc.</th>
    <th>Número</th>
    <th>Razón Social</th>
    <th>Exonerado</th>
    <th>Inafecto</th>
</tr>
  </table>
        </page_header>

    
<!-- ===================================================================================================== -->

<!-- ===================================================================================================== -->

<table style="padding-top: 130px; border-collapse: collapse;" class="table" rules="none"> 
<tr style="border-top: 1px solid blue">
    <td colspan="14" style="text-align: left; font-size:12px;"><b>Tipo Doc.: 01 FACTURA</b><br/></td>
    <td ></td>
    <td ></td>
    <td ></td>
    <td ></td>
    <td ></td>
    <td ></td>
    <td ></td>
    <td ></td>
    <td ></td>
    <td ></td>
  </tr>

  <?php

//$sql                    = "SELECT  * FROM facturacion_comprobante_cabecera WHERE fecha_creacion between '$fechaini 00:00:00' and '$fechafin 23:59:59' ";
//$resServicios           = mysqli_query($conexion, $sql);
$resServicios = Conexion::conectar()->query("SELECT  * FROM facturacion_comprobante_cabecera WHERE fecha_creacion between '$fechaini' and '$fechafin' ");

$total_servicios_anexos = 0;
$cont_prod              = 0;

$sumtotal1=0;$sumtotal2=0;$sumtotal3=0;$sumtotal4=0;$sumtotal5=0;
$sumtotal6=0;$sumtotal7=0;$sumtotal8=0;$sumtotal9=0;$sumtotal10=0;


foreach ($resServicios as $row) {
    $total_servicios_anexos = $filaxy['total'] + $total_servicios_anexos;
if(strlen($row['num_docu_identidad'])>8){$td="06";}else{$td="01";}
    $cont_prod              = $cont_prod + 1;
    $sumtotal1=$sumtotal1+$row['total_gravada'];$sumtotal2=$sumtotal2+$row['total_exonerada'];
    $sumtotal3=$sumtotal3+$row['total_inafecta'];$sumtotal4=$sumtotal4+$row['igv'];$sumtotal5=$sumtotal5+$row['total'];
$sumtotal6=0;$sumtotal7=0;$sumtotal8=0;$sumtotal9=0;$sumtotal10=0;

    echo '
        <tr class="border">
          <td>02</td>
          <td style="width: 30px">'.$cont_prod.'</td>
          <td style="text-align: center; width: 40px">' . $row['fecha_contable'] . '</td>
          <td style="width: 50px">' . $row['fecha_vencimiento'] . '</td>
          <td style="width: 20px">01</td>
          <td style="width: 30px">' . $row['serie'] . '</td>
          <td style="width: 50px">' . $row['correlativo'] . '</td>
          <td style="width: 60px">00</td>
          <td style="width: 30px">00</td>
          <td style="width: 30px">00</td>
          <td style="width: 40px">00</td>
          <td style="width: 20px">'.$td.'</td>
          <td style="width: 50px">' . $row['num_docu_identidad'] . '</td>
          <td style="width: 100px">' . $row['nombre_cliente'] . '</td>
          <td style="width: 45px">0.00</td>
          <td style="width: 45px">' . $row['total_gravada'] . '</td>
          <td style="width: 50px">' . $row['total_exonerada'] . '</td>
          <td style="width: 40px">' . $row['total_inafecta'] . '</td>
          <td style="width: 30px">0.00</td>
          <td style="width: 30px">' . $row['igv'] . '</td>
          <td style="width: 30px">0.00</td>
          <td style="width: 45px">0.00</td>
          <td style="width: 40px">' . $row['total'] . '</td>
          <td>00</td>
        </tr>
        ';}
        
?>

<tr style="border-top: 1px solid blue">
    <td colspan="14" style="text-align: right; font-size:12px; border-bottom:0px solid #000000"><br/><b>TOTALES:</b></td>
    <td style="text-align: center;" ><br/>0.00</td>
    <td style="text-align: center;"><br/><?php echo $sumtotal1; ?></td>
    <td style="text-align: center;"><br/><?php echo $sumtotal2; ?></td>
    <td style="text-align: center;"><br/><?php echo $sumtotal3; ?></td>
    <td style="text-align: center;"><br/>0.00</td>
    <td style="text-align: center;"><br/><?php echo $sumtotal4; ?></td>
    <td style="text-align: center;"><br/>0.00</td>
    <td style="text-align: center;"><br/>0.00</td>
    <td style="text-align: center;"><br/><?php echo $sumtotal5; ?></td>
    <td style="text-align: center;"><br/>0.00</td>
  </tr>

<br/><br/>

<tr>
    <td colspan="14" style="text-align: left; font-size:12px;"><br/><br/><b>Tipo Doc.: 07 NOTA DE CREDITO</b><br/></td>
    <td ></td>
    <td ></td>
    <td ></td>
    <td ></td>
    <td ></td>
    <td ></td>
    <td ></td>
    <td ></td>
    <td ></td>
    <td ></td>
  </tr>
  <?php
//$sql                    = "SELECT  c.cod_tipo_documento, c.serie, c.correlativo, c.fecha_contable, f.fecha_contable as ffecha_contable, f.serie as fserie, f.correlativo as fcorrelativo, c.num_docu_identidad, c.nombre_cliente, c.total_gravadas, c.total_exoneradas, c.total_inafecta, c.total_igv, c.total FROM facturacion_nc_comprobante_cabecera as c inner join facturacion_comprobante_cabecera as f on c.idComprobanteVenta=f.id WHERE c.fecha_creacion between '$fechaini 00:00:00' and '$fechafin 23:59:59' ";
//$resServicios           = mysqli_query($conexion, $sql);
$resServicios = Conexion::conectar()->query("SELECT  c.cod_tipo_documento, c.serie, c.correlativo, c.fecha_contable, f.fecha_contable as ffecha_contable, f.serie as fserie, f.correlativo as fcorrelativo, c.num_docu_identidad, c.nombre_cliente, c.total_gravadas, c.total_exoneradas, c.total_inafecta, c.total_igv, c.total FROM facturacion_nc_comprobante_cabecera as c inner join facturacion_comprobante_cabecera as f on c.idComprobanteVenta=f.id WHERE c.fecha_creacion between '$fechaini' and '$fechafin' ");

$total_servicios_anexos = 0;
$cont_prod              = 0;

$sumtotalc1=0;$sumtotalc2=0;$sumtotalc3=0;$sumtotalc4=0;$sumtotalc5=0;
$sumtotalc6=0;$sumtotalc7=0;$sumtotalc8=0;$sumtotalc9=0;$sumtotalc10=0;

foreach ($resServicios as $row) {
    $total_servicios_anexos = $filaxy['total'] + $total_servicios_anexos;
    if(strlen($row['num_docu_identidad'])>8){$tdc="06";}else{$tdc="01";}
    $cont_prod              = $cont_prod + 1;

    $sumtotalc1=$sumtotalc1+$row['total_gravadas'];$sumtotalc2=$sumtotalc2+$row['total_exoneradas'];
    $sumtotalc3=$sumtotalc3+$row['total_inafecta'];$sumtotalc4=$sumtotalc4+$row['total_igv'];$sumtotalc5=$sumtotalc5+$row['total'];
$sumtotalc6=0;$sumtotalc7=0;$sumtotalc8=0;$sumtotalc9=0;$sumtotalc10=0;

    echo '
        <tr>
        <td >02</td>
        <td>'.$cont_prod.'</td>
        <td >' . $row['fecha_contable'] . '</td>
        <td>' . $row['fecha_contable'] . '</td>
        <td>' . $row['cod_tipo_documento'] . '</td>
        <td>' . $row['serie'] . '</td>
        <td>' . $row['correlativo'] . '</td>
        <td style="width: 40px">' . $row['ffecha_contable'] . '</td>
        <td>01</td>
        <td>' . $row['fserie'] . '</td>
        <td>' . $row['fcorrelativo'] . '</td>
        <td>'.$tdc.'</td>
        <td>' . $row['num_docu_identidad'] . '</td>
        <td style="width: 100px">' . $row['nombre_cliente'] . '</td>
        <td >0.00</td>
        <td>' . $row['total_gravadas'] . '</td>
        <td>-' . $row['total_exoneradas'] . '</td>
        <td>' . $row['total_inafecta'] . '</td>
        <td>0.00</td>
        <td>' . $row['total_igv'] . '</td>
        <td>0.00</td>
        <td>0.00</td>
        <td>-' . $row['total'] . '</td>
        <td> 00</td>
        </tr>
        ';}
?>

<tr>
    <td colspan="14" style="text-align: right; font-size:12px; border-bottom:0px solid #000000"><br/><b>TOTALES:</b></td>
    <td style="text-align: center;"><br/>0.00</td>
    <td style="text-align: center;"><br/><?php echo $sumtotalc1; ?></td>
    <td style="text-align: center;"><br/>-<?php echo $sumtotalc2; ?></td>
    <td style="text-align: center;"><br/><?php echo $sumtotalc3; ?></td>
    <td style="text-align: center;"><br/>0.00</td>
    <td style="text-align: center;"><br/><?php echo $sumtotalc4; ?></td>
    <td style="text-align: center;"><br/>0.00</td>
    <td style="text-align: center;"><br/>0.00</td>
    <td style="text-align: center;"><br/>-<?php echo $sumtotalc5; ?></td>
    <td style="text-align: center;"><br/>0.00</td>
  </tr>

  <tr>
    <td colspan="14" style="text-align: right; font-size:12px; border-bottom:0px solid #000000"><br/><b>TOTAL GENERAL:</b></td>
    <td style="text-align: center;"><br/>0.00</td>
    <td style="text-align: center;"><br/><?php echo $sumtotal1-$sumtotalc1; ?></td>
    <td style="text-align: center;"><br/><?php echo $sumtotal2-$sumtotalc2; ?></td>
    <td style="text-align: center;"><br/><?php echo $sumtotal3-$sumtotalc3; ?></td>
    <td style="text-align: center;"><br/>0.00</td>
    <td style="text-align: center;"><br/><?php echo $sumtotal4-$sumtotalc4; ?></td>
    <td style="text-align: center;"><br/>0.00</td>
    <td style="text-align: center;"><br/>0.00</td>
    <td style="text-align: center;"><br/><?php echo $sumtotal5-$sumtotalc5; ?></td>
    <td style="text-align: center;"><br/>0.00</td>
  </tr>

  </table>
<?php
//mysql_close();
//mysqli_close($conexion);
//mysqli_close($sql);
?>
</body>
</html>
