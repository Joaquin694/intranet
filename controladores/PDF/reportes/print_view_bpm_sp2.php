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
  .W5{width: 5%;} .W10{width: 10%;} .W20{width: 20%;}  .w25{width: 25%;} .w75{width: 75%;} .w100{width: 100%;} .w50{width: 50%} .W45{width: 45%} .W65{width: 65%} .W85{width: 85%} .W30{width: 30%;}
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
<body>
<?php
require '../modelos/config.php';

$codfi = $_GET['id'];

$sql = "SELECT bpm.pk_bpm, bpm.codigo, bpm.aprobado_por,
            bpm.fecha_registro_documento, bpm.pagina, bpm.lote, bpm.titulo, bpm.subtitulo, bpm.fecha_atencion, bpm.nombre_cliente,
            bpm.nombre_usuario, bpm.tipo_cafe, bpm.materia_extraña, bpm.plagas_enfermedades,
            bpm.lugar_procedencia, bpm.peso, bpm.presentacion, bpm.variedad, bpm.condicion_de_transporte, bpm.envase, bpm.certificacion,
            bpm.fecha_entrega, bpm.humedad, bpm.conclusion, bpm.observaciones,
            bpm.ejecutor_asistente, bpm.jefe_planta, bpm.doc_identidad, bpm.titulof1, bpm.subtitulo_rbpm2, bpm.codigo_rbpm2, bpm.aprobado_por_rbpm2,
            bpm.fecha_registro_documento_rbpm2, bpm.pagina_rbpm2, bpm.lote_rbpm2, bpm.codmatpri, bpm.
            Fch2telefonocliente, bpm.idCantProdA, bpm.Fch2correo, bpm.Fch2observaciones, bpm.totalsrvciss, bpm.totalcobbls, bpm.totalgeneral,
            productos_anexos_bpm.pk_pab, productos_anexos_bpm.idCobrarCjs, productos_anexos_bpm.idCantidadCjs, productos_anexos_bpm.capacidad_pab,
            productos_anexos_bpm.cajas_pab, productos_anexos_bpm.idTostAuto, productos_anexos_bpm.krsls, productos_anexos_bpm.kggresiduales,
            productos_anexos_bpm.tipo_molido_pab, productos_anexos_bpm.tipo_tostado_pab, productos_anexos_bpm.idprecioV, productos_anexos_bpm.capaBolsas,
            productos_anexos_bpm.idcntdblss, productos_anexos_bpm.idnombolaz, productos_anexos_bpm.idprecioV2, productos_anexos_bpm.capaBolsas2,
            productos_anexos_bpm.idcntdblss2, productos_anexos_bpm.idnombolaz2, productos_anexos_bpm.idprecioV3, productos_anexos_bpm.capaBolsas3,
            productos_anexos_bpm.idcntdblss3, productos_anexos_bpm.idnombolaz3, productos_anexos_bpm.idprecioV4, productos_anexos_bpm.capaBolsas4,
            productos_anexos_bpm.idcntdblss4, productos_anexos_bpm.idnombolaz4, productos_anexos_bpm.idprecioV5, productos_anexos_bpm.capaBolsas5,
            productos_anexos_bpm.idcntdblss5, productos_anexos_bpm.idnombolaz5 FROM bpm inner join productos_anexos_bpm
            on bpm.pk_bpm=productos_anexos_bpm.fk_bpm WHERE pk_bpm='$codfi'";
$result = mysqli_query($conexion, $sql);

while ($mostrar = mysqli_fetch_row($result)) {
    $pk_bpm                   = $mostrar[0];
    $codigo                   = $mostrar[1];
    $aprobado_por             = $mostrar[2];
    $fecha_registro_documento = $mostrar[3];
    $pagina                   = $mostrar[4];
    $lote                     = $mostrar[5];
    $titulo                   = $mostrar[6];
    $subtitulo                = $mostrar[7];
    $fecha_atencion           = $mostrar[8];
    $nombre_cliente           = $mostrar[9];
    $nombre_usuario           = $mostrar[10];
    $tipo_cafe                = $mostrar[11];

    $materia_extraña               = $mostrar[12];
    $plagas_enfermedades            = $mostrar[13];
    $lugar_procedencia              = $mostrar[14];
    $peso                           = $mostrar[15];
    $presentacion                   = $mostrar[16];
    $variedad                       = $mostrar[17];
    $condicion_de_transporte        = $mostrar[18];
    $envase                         = $mostrar[19];
    $certificacion                  = $mostrar[20];
    $fecha_entrega                  = $mostrar[21];
    $humedad                        = $mostrar[22];
    $conclusion                     = $mostrar[23];
    $observaciones                  = $mostrar[24];
    $ejecutor_asistente             = $mostrar[25];
    $jefe_planta                    = $mostrar[26];
    $doc_identidad                  = $mostrar[27];
    $titulof1                       = $mostrar[28];
    $subtitulo_rbpm2                = $mostrar[29];
    $codigo_rbpm2                   = $mostrar[30];
    $aprobado_por_rbpm2             = $mostrar[31];
    $fecha_registro_documento_rbpm2 = $mostrar[32];
    $pagina_rbpm2                   = $mostrar[33];
    $lote_rbpm2                     = $mostrar[34];
    $codmatpri                      = $mostrar[35];
    $Fch2telefonocliente            = $mostrar[36];
    $idCantProdA                    = $mostrar[37];
    $Fch2correo                     = $mostrar[38];
    $Fch2observaciones              = $mostrar[39];
    $totalsrvciss                   = $mostrar[40];
    $totalcobbls                    = $mostrar[41];
    $totalgeneral                   = $mostrar[42];

    $pk_pab           = $mostrar[43];
    $idCobrarCjs      = $mostrar[44];
    $idCantidadCjs    = $mostrar[45];
    $capacidad_pab    = $mostrar[46];
    $cajas_pab        = $mostrar[47];
    $idTostAuto       = $mostrar[48];
    $krsls            = $mostrar[49];
    $kggresiduales    = $mostrar[50];
    $tipo_molido_pab  = $mostrar[51];
    $tipo_tostado_pab = $mostrar[52];
    $idprecioV        = $mostrar[53];
    $capaBolsas       = $mostrar[54];
    $idcntdblss       = $mostrar[55];
    $idnombolaz       = $mostrar[56];
    $idprecioV2       = $mostrar[57];
    $capaBolsas2      = $mostrar[58];
    $idcntdblss2      = $mostrar[59];
    $idnombolaz2      = $mostrar[60];
    $idprecioV3       = $mostrar[61];
    $capaBolsas3      = $mostrar[62];
    $idcntdblss3      = $mostrar[63];
    $idnombolaz3      = $mostrar[64];
    $idprecioV4       = $mostrar[65];
    $capaBolsas4      = $mostrar[66];
    $idcntdblss4      = $mostrar[67];
    $idnombolaz4      = $mostrar[68];
    $idprecioV5       = $mostrar[69];
    $capaBolsas5      = $mostrar[70];
    $idcntdblss5      = $mostrar[71];
    $idnombolaz5      = $mostrar[72];

}
?>


<table class="thb">
  <tr>
    <th class="thhead"><img src="../vistas/img/plantilla/A1logoMoali.png" alt="Smiley face" width="140"></th>
    <th class="thhead"><h4 class="thheadp">MANUAL DE BPM<br>ORDEN DE PROCESO</h4></th>
    <th class="thhead cuadritocb tleft">
       Código: <?php echo $codigo_rbpm2; ?><br>
     Aprobado por: <?php echo $aprobado_por_rbpm2; ?><br>
     Fecha: <?php echo $fecha_registro_documento_rbpm2; ?><br>
     Página: <?php echo $pagina_rbpm2; ?><br>
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
    <th class="tbody nnp"> <?php echo $codmatpri; ?></th>
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
    <th class="W5">#</th>
    <th class="W85">Servicio</th>

    <th class="W10">Cantidad</th>

  </tr>
  <?php
$sql                    = "SELECT  * FROM servicios_anexos_bpm WHERE fk_bpm=$codfi";
$resServicios           = mysqli_query($conexion, $sql);
$total_servicios_anexos = 0;
$cont_serv              = 0;

foreach ($resServicios as $fila) {

    $total_servicios_anexos = $fila['cantidad'] + $total_servicios_anexos;
    $cont_serv              = $cont_serv + 1;
    echo '
        <tr>
          <td>' . $cont_serv . '</td>
          <td>' . $fila['servicio'] . '</td>

          <td>' . $fila['cantidad'] . '</td>

        </tr>
        ';}
?>


  <tr>
    <td colspan="2" style="text-align: center;"><b>TOTAL</b></td>
    <td><?php echo $total_servicios_anexos; ?></td>
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
    <th class="W5">#</th>
    <th class="W65">Producto</th>
    <th class="W30">Cantidad</th>

  </tr>
  <?php if (strcmp($idnombolaz, 'No especifica')) {echo '<tr><td>1</td><td>Bolsa (' . $idnombolaz . ')</td><td>' . $idcntdblss . ' und.</td></tr>';}?>

  <?php if (strcmp($idnombolaz2, 'No especifica')) {echo '<tr><td>2</td><td>Bolsa (' . $idnombolaz2 . ')</td><td>' . $idcntdblss2 . ' und.</td></tr>';}?>

  <?php if (strcmp($idnombolaz3, 'No especifica')) {echo '<tr><td>3</td><td>Bolsa (' . $idnombolaz3 . ')</td><td>' . $idcntdblss3 . ' und.</td></tr>';}?>

  <?php if (strcmp($idnombolaz4, 'No especifica')) {echo '<tr><td>4</td><td>Bolsa (' . $idnombolaz4 . ')</td><td>' . $idcntdblss4 . ' und.</td></tr>';}?>

  <?php if (strcmp($idnombolaz5, 'No especifica')) {echo '<tr><td>5</td><td>Bolsa (' . $idnombolaz5 . ')</td><td>' . $idcntdblss5 . ' und.</td></tr>';}?>


</table>
<br><br><br><br><br><br><br><br><br><br><br><br>
<!-- ===================================================================================================== -->
<br><br>
<!-- ===================================================================================================== -->
</body>
</html>



