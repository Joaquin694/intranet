<!DOCTYPE html>
<html lang="es">
<head ><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link rel="shortcut icon" type="image/png" href="https://moali.app/vistas/img/plantilla/icono-negro.png"/>
<style>
  table, td, th {
    text-align: center;
    justify-content: center;
    padding: 3px ;
  }
  .thb td{
    text-align: left;
    justify-content: left;
    padding-left: 4px;
  }
  .thb th ,.thb td{
    border: 1px solid #C3C3C3;
    padding: 0px ;
  }

  table {
    border-collapse: collapse;
    width: 100%;
  }
  /* ===================================================================================================== */
  .tlogo{
    font-weight: 900 ;
    font-size: 60px;
    color: #78bc4d;
  }

  .thhead {
    height: 40px;
    width: 33.3%;
  }
  .thheadp{
    font-weight: 100 ;
    font-size: 18px ;
  }
  .thheadd,.thheadd>p{
    text-align: left;
      justify-content: left;
      font-weight: 100;
  }
  .tbody{padding: 6px 6px;width: 25%;text-align: left}
  /* ===================================================================================================== */
  .W5{width: 5%;} .W8{width: 8%;} .W28{width: 28%;} .W3{width: 3%;}  .W46{width: 46%;}  .W10{width: 10%;} .W22{width: 22%;} .W15{width: 15%;} .W16{width: 16%;} .W20{width: 20%;}  .w25{width: 25%;} .w75{width: 75%;} .w7{width: 7%;} .w100{width: 100%;} .w50{width: 50%} .W45{width: 45%}  .W48{width: 48%}
  .W49{width: 49%} .W29{width: 29%} .W27{width: 27%} .W30{width: 30%} .W35{width: 35%} .W40{width: 40%}
  /* ===================================================================================================== */
  .tleft{text-align:  left;} .tright{text-align:  right;}
  /* ===================================================================================================== */
  .cuadrito,.cuadritocb{border: 1px solid #C3C3C3;font-weight: 100}
  /* ===================================================================================================== */
  .subtitle{
    font-weight: 900;width: 100%;text-align: center;font-size: 15px;
  }
  /* ===================================================================================================== */
  .tleft{padding-left: 10px;}
  .nnp{font-weight: 100 }

</style>
</head>
<body >
<?php
require '../modelos/config.php';

$codfi = $_GET['id'];

$sql    = "SELECT * FROM bpm WHERE pk_bpm='$codfi'";
$result = mysqli_query($conexion, $sql);

while ($mostrar = mysqli_fetch_row($result)) {
    $pk_bpm                         = $mostrar[0];
    $correlativo                    = $mostrar[1];
    $codigo                         = $mostrar[2];
    $aprobado_por                   = $mostrar[3];
    $fecha_registro_documento       = $mostrar[4];
    $pagina                         = $mostrar[5];
    $lote                           = $mostrar[6];
    $titulo                         = $mostrar[7];
    $subtitulo                      = $mostrar[8];
    $fecha_atencion                 = $mostrar[9];
    $nombre_cliente                 = $mostrar[10];
    $nombre_usuario                 = $mostrar[11];
    $tipo_cafe                      = $mostrar[12];
    $materia_extraña               = $mostrar[13];
    $plagas_enfermedades            = $mostrar[14];
    $lugar_procedencia              = $mostrar[15];
    $peso                           = $mostrar[16];
    $presentacion                   = $mostrar[17];
    $variedad                       = $mostrar[18];
    $condicion_de_transporte        = $mostrar[19];
    $envase                         = $mostrar[20];
    $certificacion                  = $mostrar[21];
    $fecha_entrega                  = $mostrar[22];
    $humedad                        = $mostrar[23];
    $conclusion                     = $mostrar[24];
    $observaciones                  = $mostrar[25];
    $ejecutor_asistente             = $mostrar[26];
    $jefe_planta                    = $mostrar[27];
    $doc_identidad                  = $mostrar[28];
    $titulof1                       = $mostrar[30];
    $subtitulo_rbpm2                = $mostrar[31];
    $codigo_rbpm2                   = $mostrar[32];
    $aprobado_por_rbpm2             = $mostrar[33];
    $fecha_registro_documento_rbpm2 = $mostrar[34];
    $pagina_rbpm2                   = $mostrar[35];
    $lote_rbpm2                     = $mostrar[36];
    $codmatpri                      = $mostrar[37];
    $Fch2telefonocliente            = $mostrar[38];
    $idCantProdA                    = $mostrar[39];
    $Fch2correo                     = $mostrar[40];
    $Fch2observaciones              = $mostrar[41];
    $idTostAuto                     = $mostrar[42];
    $krsls                          = $mostrar[43];
    $kggresiduales                  = $mostrar[44];
    $gramosPendientes               = $mostrar[45];
    $subSolesTotalProductoAnexos    = $mostrar[46];
    $subGramosTotalProductoAnexos   = $mostrar[47];
    $totalsrvciss                   = $mostrar[48];
    $totalcobbls                    = $mostrar[49];
    $totalgeneral                   = $mostrar[50];
}
?>
<br>
<!-- ===================================================================================================== -->
<table class="thb" >
  <tr>
    <th class="thhead"><img src="../vistas/img/plantilla/A1logoMoali.png" alt="Smiley face" width="140"></th>
    <th class="thhead"><h4 class="thheadp">MANUAL DE BPM<br>RECEPCIÓN DE MATERIA PRIMA</h4></th>
    <th class="thhead cuadritocb tleft">
       Código: <?php echo $codigo; ?><br>
     Aprobado por: <?php echo $aprobado_por; ?><br>
     Fecha: <?php echo $fecha_registro_documento; ?><br>
     Página: <?php echo $correlativo; ?><br>
    </th>
  </tr>
</table>
<!-- ===================================================================================================== -->
<br>
<table>
  <tr>
    <th class="tleft cuadritocb">LOTE MP- <?php echo $lote_rbpm2; ?></th>
  </tr>
</table>
<!-- ===================================================================================================== -->
<div class="subtitle">RBPM N°1 RECEPCIÓN DE MATERIA PRIMA</div><br><br>
<!-- ===================================================================================================== -->
<table class="thb">
  <tr>
    <th class="tbody">Fecha de recepción:</th>
    <th class="tbody nnp"><?php echo $fecha_atencion; ?></th>
    <th class="tbody">Nombre del cliente:</th>
    <th class="tbody nnp"><?php echo $nombre_cliente; ?></th>
  </tr>
  <tr>
    <th class="tbody">Nombre de quien recibe:</th>
    <th class="tbody nnp"><?php echo $nombre_usuario; ?></th>
    <th class="tbody">Tipo de café:</th>
    <th class="tbody nnp"><?php echo $tipo_cafe; ?></th>
  </tr>
  <tr>
    <th class="tbody">Presencia de materia extraña:</th>
    <th class="tbody nnp"><?php echo $materia_extraña; ?></th>
    <th class="tbody">Plagas enfermedades:</th>
    <th class="tbody nnp"><?php echo $plagas_enfermedades; ?></th>
  </tr>
  <tr>
    <th class="tbody">Lugar de Procedencia:</th>
    <th class="tbody nnp"><?php echo $lugar_procedencia; ?></th>
    <th class="tbody">Peso:</th>
    <th class="tbody nnp"><?php echo $peso; ?></th>
  </tr>
  <tr>
    <th class="tbody">Presentación:</th>
    <th class="tbody nnp"><?php echo $presentacion; ?></th>
    <th class="tbody">Variedad/Altitud:</th>
    <th class="tbody nnp"><?php echo $variedad; ?></th>
  </tr>
  <tr>
    <th class="tbody">Condicion de transporte:</th>
    <th class="tbody nnp"><?php echo $condicion_de_transporte; ?></th>
    <th class="tbody">Envases:</th>
    <th class="tbody nnp"><?php echo $envase; ?></th>
  </tr>
  <tr>
    <th class="tbody">Certificación:</th>
    <th class="tbody nnp"><?php
if ($certificacion == "No") {
    echo $certf = "Sin Certificación (Convencional)";
} else {
    echo $certf = "Certificación Orgánica";
}

?></th>
    <th class="tbody">Fecha de entrega:</th>
    <th class="tbody nnp"><?php echo $fecha_entrega; ?></th>
  </tr>
  <tr>
    <th class="tbody">Humedad:</th>
    <th class="tbody nnp"><?php echo $humedad; ?></th>
    <th class="tbody">Conclusión:</th>
    <th class="tbody nnp"><?php
if ($conclusion == "Si" or $conclusion == "Aceptado") {
    echo $concl = "Aceptado";
} elseif ($conclusion == "No" or $conclusion == "Rechazado") {
    echo $concl = "Rechazado";
} else {
    echo $concl = "Aceptado";
}
?></th>
  </tr>
  <tr>
    <th class="tbody nnp" colspan="4" >Observaciones: &nbsp; &nbsp;<?php echo $observaciones; ?></th>
  </tr>
</table>
<br><br><br>
<!-- ===================================================================================================== -->
<table>
  <tr>
    <th class="w50" style="text-align: center;">
      _______________________________<br>
      Ejecutor asistente de planta<br>
      Carg. Nombre Apellido Apellido
    </th>
    <th class="w50" style="text-align: center;">
      _______________________________<br>
      Jefe de planta<br>
      Carg. Nombre Apellido Apellido
    </th>
  </tr>
</table>


<!-- OTRA PÁGINA -->
<div style="page-break-after: always"></div>
<!-- ===================================================================================================== -->
<table class="thb" >
  <tr>
    <th class="thhead"><img src="../vistas/img/plantilla/A1logoMoali.png" alt="Smiley face" width="140"></th>
    <th class="thhead"><h4 class="thheadp">MANUAL DE BPM<br>ORDEN DE PROCESO</h4></th>
    <th class="thhead cuadritocb tleft">
       Código: <?php echo $codigo_rbpm2; ?><br>
     Aprobado por: <?php echo $aprobado_por_rbpm2; ?><br>
     Fecha: <?php echo $fecha_registro_documento_rbpm2; ?><br>
     Página: <?php echo $correlativo; ?><br>
    </th>
  </tr>
</table>
<!-- ===================================================================================================== -->
<br>
<table style="margin-left: 30px;margin-left: 30px;">
  <tr>
    <th class="tleft cuadritocb">LOTE MP- <?php echo $lote_rbpm2; ?></th>
  </tr>
</table>
<!-- ===================================================================================================== -->
<div class="subtitle">RBPM N°2 ORDEN DE SERVICIO A PRESTAR</div><br><br>
<!-- ===================================================================================================== -->
<table class="thb">
  <tr>
    <th class="tbody">Nombre del solicitante:</th>
    <th class="tbody nnp"><?php echo $nombre_cliente; ?></th>
    <th class="tbody">RUC/DNI:</th>
    <th class="tbody nnp"><?php echo $doc_identidad; ?></th>
  </tr>
  <tr>
    <th class="tbody">Codigo de materia prima:</th>
    <th class="tbody nnp"> <?php echo $correlativo; ?></th>
    <th class="tbody">Teléfono del cliente:</th>
    <th class="tbody nnp"> <?php echo $Fch2telefonocliente; ?></th>
  </tr>
  <tr>
    <th class="tbody">Cantidad del producto::</th>
    <th class="tbody nnp"> <?php echo $idCantProdA; ?></th>
    <th class="tbody">Correo electrónico:</th>
    <th class="tbody nnp"> <?php echo $Fch2correo; ?></th>
  </tr>
  <tr>
    <th class="tbody" colspan="4">Observaciones: <?php echo $Fch2observaciones; ?></th>
  </tr>
</table><br>
<!-- ===================================================================================================== -->
<table>
  <tr>
    <th class="tleft">SERVICIOS</th>
  </tr>
</table>
<!-- ===================================================================================================== -->
<table class="thb">
  <tr>
    <th class="W5">&nbsp;Item&nbsp;</th>
    <th class="W50">Servicio</th>
    <th class="W15">Precio</th>
    <th class="W10">Cantidad</th>
    <th class="W20">Total</th>
  </tr>
  <?php
$sql                    = "SELECT  * FROM servicios_anexos_bpm WHERE fk_bpm=$codfi";
$resServicios           = mysqli_query($conexion, $sql);
$total_servicios_anexos = 0;
$cont_serv              = 0;

foreach ($resServicios as $fila) {

    $total_servicios_anexos = $fila['total'] + $total_servicios_anexos;
    $cont_serv              = $cont_serv + 1;
    echo '
        <tr>
          <td>' . $cont_serv . '</td>
          <td>' . $fila['servicio'] . '</td>
          <td>' . $fila['precio'] . '</td>
          <td>' . $fila['cantidad'] . '</td>
          <td style="text-align: right;">' . $fila['total'] . '</td>
        </tr>
        ';}
?>


  <tr>
    <td colspan="4" style="text-align: center;"><b>TOTAL</b></td>
    <td style="text-align: right;">S/<?php echo $total_servicios_anexos; ?></td>
  </tr>

</table><br>

<!-- ===================================================================================================== -->
<table>
  <tr>
    <th class="tleft">PRODUCTOS</th>
  </tr>
</table>
<!-- ===================================================================================================== -->
<table class="thb">
  <tr>
    <th class="W2">&nbsp;&nbsp;Item&nbsp;&nbsp;</th>
    <th >&nbsp;&nbsp;Cantidad&nbsp;&nbsp;</th>
    <th >&nbsp;Unida&nbsp;</th>
    <th >&nbsp;&nbsp;Código bolsa&nbsp;&nbsp;</th>
    <th class="W40">Envase</th>
    <th >&nbsp;&nbsp;&nbsp;Capacidad&nbsp;&nbsp;&nbsp;</th>
    <th >&nbsp;&nbsp;&nbsp;T. tostado&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th >&nbsp;&nbsp;&nbsp;T. proceso&nbsp;&nbsp;&nbsp;</th>
    <th >&nbsp;&nbsp;&nbsp;Importe&nbsp;&nbsp;&nbsp;</th>
  </tr>
  <?php
$sql                    = "SELECT  * FROM productos_anexos__bpm WHERE codBpm=$codfi";
$resServicios           = mysqli_query($conexion, $sql);
$total_servicios_anexos = 0;
$cont_prod              = 0;

foreach ($resServicios as $filaxy) {

    $total_servicios_anexos = $filaxy['total'] + $total_servicios_anexos;
    $cont_prod              = $cont_prod + 1;
    echo '
        <tr>
          <td>' . $cont_prod . '</td>
          <td style="text-align: center">' . $filaxy['cantidad_producto'] . '</td>
          <td>Und.</td>
          <td>' . $filaxy['barcode_producto'] . '</td>
          <td>' . $filaxy['nombre_producto'] . '</td>
          <td>' . $filaxy['capacidad_producto'] . '</td>
          <td>' . $filaxy['bpm_tipo_tostado_pab'] . '</td>
          <td>' . $filaxy['bpm_tipo_molido_pab'] . '</td>
          <td style="text-align: right;">' . $filaxy['product_sub_total'] . '</td>
        </tr>
        ';}
?>

   <tr>
    <td colspan="8" style="text-align: center;"><b>TOTAL</b></td>
    <td style="text-align: right;">S/<?php echo $totalcobbls; ?></td>
  </tr>
</table>
<br>
<!-- ===================================================================================================== -->
<div style="text-align: right;color: #525659;border-radius: 5px;font-size: 20px;padding: 5px">TOTAL S/<?php echo $totalgeneral; ?>&nbsp;</div>
<!-- ===================================================================================================== -->




</body>
</html>




