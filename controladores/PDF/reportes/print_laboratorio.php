<?php session_start();if (!isset($_SESSION["iniciarSesion"])) {header("Location: /");}?>
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

    .tbodytree{padding: 6px 6px;width: 33.3%;text-align: left}
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

    .div_fisico{background: #89bd48;color:white;border-radius: 1px;padding: 5px 10px}

    .txt_cnt{text-align: center;color: white}

    .ok_picado_fisico{background: #89bd48;color: white;font-size: 15px}
    .no_picado_fisico{background: white;color: white;font-size: 0px}
  </style>
</head>
<body >
  <?php
require '../modelos/conexion.php';

$pkLabo = base64_decode($_GET['pkLabo']);

$sql = Conexion::conectar()->query("SELECT * FROM `FCH_CONTROL_DE_CALIDAD` WHERE id='$pkLabo'");

foreach ($sql as $rowi) {
    $id                       = $rowi["id"];
    $letra_tipo_codelabo      = $rowi["letra_tipo_codelabo"];
    $correlativo              = $rowi["correlativo"];
    $idcodrbpm1               = $rowi["idcodrbpm1"];
    $url_img_para_basededatos = "../" . $rowi["url_img_para_basededatos"];
    $fecha                    = $rowi["fecha"];
    $doc_identidad            = $rowi["doc_identidad"];
    $nombrecliente            = $rowi["nombrecliente"];
    $quienrecibe              = $rowi["quienrecibe"];
    $cafe                     = $rowi["cafe"];
    $materiaextrana           = $rowi["materiaextrana"];
    $procedencia              = $rowi["procedencia"];
    $idTipCaf                 = $rowi["idTipCaf"];
    $placavehiculo            = $rowi["placavehiculo"];
    $altitud                  = $rowi["altitud"];

    $fechaentrega     = $rowi["fechaentrega"];
    $fechaentrega_f_l = '<img src="../vistas/img/plantilla/calendar_002.webp" alt="Smiley face" width="19"> ' . substr($fechaentrega, 0, -9) . '&nbsp;&nbsp;&nbsp;<img src="../vistas/img/plantilla/reloj.png" alt="Smiley face" width="15"> ' . substr($fechaentrega, -8);

    $temperatura    = $rowi["temperatura"];
    $humedad        = $rowi["humedad"];
    $observaciones  = $rowi["observaciones"];
    $motivorechazo  = $rowi["motivorechazo"];
    $rechazo        = $rowi["rechazo"];
    $idfechaentrega = $rowi["idfechaentrega"];
    $idfechaentrega = '<img src="../vistas/img/plantilla/calendar_002.webp" alt="Smiley face" width="19"> ' . substr($idfechaentrega, 0, -9) . '&nbsp;&nbsp;&nbsp;<img src="../vistas/img/plantilla/reloj.png" alt="Smiley face" width="15"> ' . substr($idfechaentrega, -8);

    $obsfinales = $rowi["obsfinales"];
    // $tipoanal   = $rowi["tipoanal"];

    switch ($rowi["tipoanal"]) {
        case 'sianal':
            # code...
            $tipo_anal = "Sin Análisis";
            break;

        case 'anasensoyfisi':
            # code...
            $tipo_anal = "Análisis Sensorial y Físico";
            break;

        case 'anafisi':
            # code...
            $tipo_anal = "Análisis Físico";
            break;
        case 'anasenso':
            # code...
            $tipo_anal = "Análisis Sensorial";
            break;
    }

    $samplenumero = $rowi["samplenumero"];
    $fragrance    = $rowi["fragrance"];
    $flavor       = $rowi["flavor"];
    $acidity      = $rowi["acidity"];
    $sweetness    = $rowi["sweetness"];
    $body         = $rowi["body"];
    $clean        = $rowi["clean"];
    $overall      = $rowi["overall"];
    $otal         = $rowi["otal"];
    $aftertaste   = $rowi["aftertaste"];
    $balance      = $rowi["balance"];
    $uniformity   = $rowi["uniformity"];
    $unoextra     = $rowi["unoextra"];
    $dosextra     = $rowi["dosextra"];
    $tresextra    = $rowi["tresextra"];
    $notes        = $rowi["notes"];
    $finalscore   = $rowi["finalscore"];
    $varidad      = $rowi["varidad"];
    $cosecha      = $rowi["cosecha"];

    $analisis_de_pergamino = $rowi["analisis_de_pergamino"] === 'true' ? '<img src="../vistas/img/plantilla/yes.png"  width="85">' : false;
    $proceso_organico      = $rowi["proceso_organico"] === 'true' ? '<img src="../vistas/img/plantilla/yes.png"  width="85">' : false;
    $proceso_convencional  = $rowi["proceso_convencional"] === 'true' ? '<img src="../vistas/img/plantilla/yes.png"  width="85">' : false;

    $peso_perg = $rowi["peso_perg"];
    $h_perg    = $rowi["h_perg"];

    $color_perg     = $rowi["color_perg"] === 'true' ? "ok_picado_fisico" : "no_picado_fisico";
    $olor_perg      = $rowi["olor_perg"] === 'true' ? "ok_picado_fisico" : "no_picado_fisico";
    $normal_perg    = $rowi["normal_perg"] === 'true' ? "ok_picado_fisico" : "no_picado_fisico";
    $fresco_perg    = $rowi["fresco_perg"] === 'true' ? "ok_picado_fisico" : "no_picado_fisico";
    $disparejo_perg = $rowi["disparejo_perg"] === 'true' ? "ok_picado_fisico" : "no_picado_fisico";
    $viejo_perg     = $rowi["viejo_perg"] === 'true' ? "ok_picado_fisico" : "no_picado_fisico";
    $fermento_perg  = $rowi["fermento_perg"] === 'true' ? "ok_picado_fisico" : "no_picado_fisico";
    $negruzco_perg  = $rowi["negruzco_perg"] === 'true' ? "ok_picado_fisico" : "no_picado_fisico";
    $terroso_perg   = $rowi["terroso_perg"] === 'true' ? "ok_picado_fisico" : "no_picado_fisico";
    $otros_perg     = $rowi["otros_perg"] === 'true' ? "ok_picado_fisico" : "no_picado_fisico";
    $hierbas_perg   = $rowi["hierbas_perg"] === 'true' ? "ok_picado_fisico" : "no_picado_fisico";
    $moho_perg      = $rowi["moho_perg"] === 'true' ? "ok_picado_fisico" : "no_picado_fisico";
    $manchado_perg  = $rowi["manchado_perg"] === 'true' ? "ok_picado_fisico" : "no_picado_fisico";

    $peso_oro = $rowi["peso_oro"];
    $h_oro    = $rowi["h_oro"];

    $color_oro      = $rowi["color_oro"] === 'true' ? "ok_picado_fisico" : "no_picado_fisico";
    $olor_oro       = $rowi["olor_oro"] === 'true' ? "ok_picado_fisico" : "no_picado_fisico";
    $normal_oro     = $rowi["normal_oro"] === 'true' ? "ok_picado_fisico" : "no_picado_fisico";
    $fresco_oro     = $rowi["fresco_oro"] === 'true' ? "ok_picado_fisico" : "no_picado_fisico";
    $azulado_oro    = $rowi["azulado_oro"] === 'true' ? "ok_picado_fisico" : "no_picado_fisico";
    $viejo_oro      = $rowi["viejo_oro"] === 'true' ? "ok_picado_fisico" : "no_picado_fisico";
    $disparejo_oro  = $rowi["disparejo_oro"] === 'true' ? "ok_picado_fisico" : "no_picado_fisico";
    $fermento_oro   = $rowi["fermento_oro"] === 'true' ? "ok_picado_fisico" : "no_picado_fisico";
    $amarillo_oro   = $rowi["amarillo_oro"] === 'true' ? "ok_picado_fisico" : "no_picado_fisico";
    $terroso_oro    = $rowi["terroso_oro"] === 'true' ? "ok_picado_fisico" : "no_picado_fisico";
    $traslucido_oro = $rowi["traslucido_oro"] === 'true' ? "ok_picado_fisico" : "no_picado_fisico";
    $hierbas_oro    = $rowi["hierbas_oro"] === 'true' ? "ok_picado_fisico" : "no_picado_fisico";
    $moho_oro       = $rowi["moho_oro"] === 'true' ? "ok_picado_fisico" : "no_picado_fisico";
    $blanqueado_oro = $rowi["blanqueado_oro"] === 'true' ? "ok_picado_fisico" : "no_picado_fisico";

    $tbl2_observ             = $rowi["tbl2_observ"];
    $tbl2_peso               = $rowi["tbl2_peso"];
    $tbl2_porcentaj          = $rowi["tbl2_porcentaj"];
    $tbl2_pesouno            = $rowi["tbl2_pesouno"];
    $tbl2_porce_uno          = $rowi["tbl2_porce_uno"];
    $tbl2_pesodos            = $rowi["tbl2_pesodos"];
    $tbl2_porce_dos          = $rowi["tbl2_porce_dos"];
    $tbl2_pesotres           = $rowi["tbl2_pesotres"];
    $tbl2_porce_tres         = $rowi["tbl2_porce_tres"];
    $tbl2_pesocuatro         = $rowi["tbl2_pesocuatro"];
    $tbl2_porce_cuatro       = $rowi["tbl2_porce_cuatro"];
    $tbl2_pesocinco          = $rowi["tbl2_pesocinco"];
    $tbl2_porce_cinco        = $rowi["tbl2_porce_cinco"];
    $tbl2_pesoseis           = $rowi["tbl2_pesoseis"];
    $tbl2_porce_seis         = $rowi["tbl2_porce_seis"];
    $tbl2_pesosiete          = $rowi["tbl2_pesosiete"];
    $tbl2_porce_siete        = $rowi["tbl2_porce_siete"];
    $total_granu             = $rowi["total_granu"];
    $porce_granu             = $rowi["porce_granu"];
    $exp_granonegro          = $rowi["exp_granonegro"];
    $exp_a                   = $rowi["exp_a"];
    $exp_granoagrio          = $rowi["exp_granoagrio"];
    $exp_b                   = $rowi["exp_b"];
    $exp_cerezaseca          = $rowi["exp_cerezaseca"];
    $exp_c                   = $rowi["exp_c"];
    $exp_danohongo           = $rowi["exp_danohongo"];
    $exp_d                   = $rowi["exp_d"];
    $exp_materiaetrana       = $rowi["exp_materiaetrana"];
    $exp_e                   = $rowi["exp_e"];
    $exp_brocadosevero       = $rowi["exp_brocadosevero"];
    $exp_f                   = $rowi["exp_f"];
    $exp_parcialnegro        = $rowi["exp_parcialnegro"];
    $exp_g                   = $rowi["exp_g"];
    $exp_parcialagrio        = $rowi["exp_parcialagrio"];
    $exp_h                   = $rowi["exp_h"];
    $exp_pergamino           = $rowi["exp_pergamino"];
    $exp_i                   = $rowi["exp_i"];
    $exp_flotblan            = $rowi["exp_flotblan"];
    $exp_j                   = $rowi["exp_j"];
    $exp_inmaduro            = $rowi["exp_inmaduro"];
    $exp_k                   = $rowi["exp_k"];
    $exp_averana             = $rowi["exp_averana"];
    $exp_l                   = $rowi["exp_l"];
    $exp_conchas             = $rowi["exp_conchas"];
    $exp_m                   = $rowi["exp_m"];
    $exp_partmord            = $rowi["exp_partmord"];
    $exp_n                   = $rowi["exp_n"];
    $exp_cascara             = $rowi["exp_cascara"];
    $exp_o                   = $rowi["exp_o"];
    $exp_brocadoleve         = $rowi["exp_brocadoleve"];
    $exp_p                   = $rowi["exp_p"];
    $total_rata_expo         = $rowi["total_rata_expo"];
    $i50pesodeftotal         = $rowi["i50pesodeftotal"];
    $i51pordeftotal          = $rowi["i51pordeftotal"];
    $totl_rendimiento_export = $rowi["totl_rendimiento_export"];
    $fecha_create_registro   = $rowi["fecha_create_registro"];

    $estado = $rowi["estado"];
}

?>
  <br>
  <!-- ===================================================================================================== -->
  <table class="thb" >
    <tr>
      <th class="thhead"><img src="../vistas/img/plantilla/A1logoMoali.png" alt="Smiley face" width="140"></th>
      <th class="thhead"><h4 class="thheadp">LABORATORIO<br>CONTROL DE CALIDAD</h4></th>
      <th class="thhead cuadritocb tleft">
       Versión: 01<br>
       Aprobado por: RODAS MOALI, ALEX<br>
       Fecha: <?php echo $fecha_create_registro; ?><br>
       Página: <?php echo $correlativo; ?><br>
     </th>
   </tr>
 </table>
 <!-- ===================================================================================================== -->
 <br>
 <table>
  <tr>
    <th class="tleft cuadritocb">LOTE  <?php echo $letra_tipo_codelabo . $idcodrbpm1; ?></th>
  </tr>
</table>
<!-- ===================================================================================================== -->
<div class="subtitle"> FCC N°1   FICHA DE CONTROL DE CALIDAD</div><br><br>
<!-- ===================================================================================================== -->
<table class="thb">
  <tr>
    <th class="tbody">Fecha de recepción:</th>
    <th class="tbody nnp"><img src="../vistas/img/plantilla/calendar_002.webp"  width="19"> <?php echo $fecha; ?></th>
    <th class="tbody">Nombre del cliente:</th>
    <th class="tbody nnp"><?php echo $nombrecliente; ?></th>
  </tr>
  <tr>
    <th class="tbody">Nombre de quien recibe:</th>
    <th class="tbody nnp"><?php echo $quienrecibe; ?></th>
    <th class="tbody">Tipo de café:</th>
    <th class="tbody nnp"><?php echo $cafe; ?></th>
  </tr>
  <tr>
    <th class="tbody">Presencia de materia extraña:</th>
    <th class="tbody nnp"><?php echo $materiaextrana; ?></th>
    <th class="tbody">Peso:</th>
    <th class="tbody nnp"><?php echo $idTipCaf . "kg."; ?></th>
  </tr>
  <tr>
    <th class="tbody">Lugar de Procedencia:</th>
    <th class="tbody nnp" colspan="3"><?php echo $procedencia; ?></th>
  </tr>
  <tr>
    <th class="tbody">Placa de Vehículo Que Ingresa::</th>
    <th class="tbody nnp"><?php echo $placavehiculo; ?></th>
    <th class="tbody">Variedad/Altitud:</th>
    <th class="tbody nnp"><?php echo $altitud; ?></th>
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
    <th class="tbody">Fecha de Análisis:</th>
    <th class="tbody nnp"><?php echo $idfechaentrega; ?> </th>
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
    <th class="tbody nnp" colspan="4" >Observaciones iniciales: &nbsp; &nbsp;<?php echo $observaciones; ?></th>
  </tr>
  <tr>
    <th class="tbody">*Fecha de entrega:</th>
    <th class="tbody nnp"><?php echo $fechaentrega_f_l; ?></th>
    <th class="tbody">Tipo de análisis:</th>
    <th class="tbody nnp"><?php echo $tipo_anal; ?></th>
  </tr>
  <tr>
    <th class="tbody nnp" colspan="4" >Observaciones finales: &nbsp; &nbsp;<?php echo $obsfinales; ?></th>
  </tr>
</table>
<br><br><br>
<!-- ===================================================================================================== -->

<?php

if (($tipo_anal === "Análisis Sensorial") or ($tipo_anal === "Análisis Sensorial y Físico")) {

    ?>
  <!-- OTRA PÁGINA -->
  <!-- ==========================================   ANÁLISIS SENSORIAL ================================================= -->
  <div style="page-break-after: always"></div>
  <table class="thb" >
    <tr>
      <th class="thhead"><img src="../vistas/img/plantilla/A1logoMoali.png" alt="Smiley face" width="140"></th>
      <th class="thhead"><h4 class="thheadp">LABORATORIO<br>CONTROL DE CALIDAD</h4></th>
      <th class="thhead cuadritocb tleft">
       Versión: 01<br>
       Aprobado por: RODAS MOALI, ALEX<br>
       Fecha: <?php echo $fecha_create_registro; ?><br>
       Página: <?php echo $correlativo; ?><br>
     </th>
   </tr>
 </table>
 <!-- ===================================================================================================== -->
 <table class="thb">
  <tr>
    <th class="tbody nnp" style="width: 100%;justify-content: center;text-align: center;"><img  src="<?php echo $url_img_para_basededatos; ?>"  ></th>
  </tr>
</table>
<!-- ============================================================================================================ -->

<table class="thb">
  <tr>
    <th class="tbody "><div class="div_fisico">&nbsp;Fragancia/Aroma: &nbsp;&nbsp;<?php echo $fragrance; ?> &nbsp;</div></th>
    <th class="tbody "><div class="div_fisico">&nbsp;Sabor: &nbsp;&nbsp;<?php echo $flavor; ?> &nbsp;</div></th>
    <th class="tbody "><div class="div_fisico">&nbsp;Acido: &nbsp;&nbsp;<?php echo $acidity; ?> &nbsp;</div></th>
    <th class="tbody "><div class="div_fisico">&nbsp;Dulzura: &nbsp;&nbsp;<?php echo $sweetness; ?> &nbsp;</div></th>
  </tr>
  <tr>
    <th class="tbody "><div class="div_fisico">&nbsp;Cuerpo: &nbsp;&nbsp;<?php echo $body; ?> &nbsp;</div></th>
    <th class="tbody "><div class="div_fisico">&nbsp;Taza limpia: &nbsp;&nbsp;<?php echo $clean; ?> &nbsp;</div></th>
    <th class="tbody "><div class="div_fisico">&nbsp;Puntaje general: &nbsp;&nbsp;<?php echo $overall; ?> &nbsp;</div></th>
    <th class="tbody "><div class="div_fisico">&nbsp;Posgusto: &nbsp;&nbsp;<?php echo $aftertaste; ?> &nbsp;</div></th>
  </tr>
  <tr>
    <th class="tbody "><div class="div_fisico">&nbsp;Balance: &nbsp;&nbsp;<?php echo $balance; ?> &nbsp;</div></th>
    <th class="tbody "><div class="div_fisico">&nbsp;Uniformidad: &nbsp;&nbsp;<?php echo $uniformity; ?> &nbsp;</div></th>
    <th class="tbody nnp" colspan="2">
      Defects (subtract) <br>
      Taint=2      # cups Intensity: &nbsp;&nbsp; <?php echo $unoextra . " X " . $dosextra . " = " . $tresextra ?>
    </th>
  </tr>
  <tr>
    <th class="tbody nnp" colspan="3">Notes: <?php echo substr_replace(substr($notes, 0, -1), " y ", strrpos(substr($notes, 0, -1), ","), 2) . "."; ?></th>
    <th class="tbody " style="font-size: 15px">FINAL SCORE: <?php echo $finalscore; ?></th>
  </tr>

</table>





<!-- ===================================================================================================== -->
<?php }?>

<?php
if (($tipo_anal === "Análisis Físico") or ($tipo_anal === "Análisis Sensorial y Físico")) {
    ?>

  <!-- OTRA PÁGINA -->
  <!-- ==========================================    Análisis Físico ================================================= -->
  <div style="page-break-after: always"></div>
  <!-- ===================================================================================================== -->
  <table class="thb" >
    <tr>
      <th class="thhead"><img src="../vistas/img/plantilla/A1logoMoali.png" alt="Smiley face" width="140"></th>
      <th class="thhead"><h4 class="thheadp">LABORATORIO<br>CONTROL DE CALIDAD</h4></th>
      <th class="thhead cuadritocb tleft">
       Versión: 01<br>
       Aprobado por: RODAS MOALI, ALEX<br>
       Fecha: <?php echo $fecha_create_registro; ?><br>
       Página: <?php echo $correlativo; ?><br>
     </th>
   </tr>
 </table>
 <br><br>
 <table>
  <tr>
    <th class="tleft cuadritocb">ANÁLISIS FÍSICO</th>
  </tr>
</table>
<br>
<!-- ===================================================================================================== -->
<table class="thb">
  <tr>
    <th class="tbody nnp" colspan="2">Variedad: <?php echo $varidad; ?></th>
    <th class="tbody nnp" colspan="2">Cosecha: <?php echo $cosecha; ?></th>
  </tr>
  <tr>
    <th class="tbody nnp" style="border: 1px solid white;border-left: 1px solid #c3c3c3;border-bottom:  1px solid #c3c3c3"><br>Análisis de Pergamino: <?php echo $analisis_de_pergamino; ?></th>
    <th class="tbody nnp" style="border: 1px solid white;border-bottom:  1px solid #c3c3c3" colspan="2"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Proceso Organico: <?php echo $proceso_organico; ?></th>
    <th class="tbody nnp" style="border: 1px solid white;border-right:  1px solid #c3c3c3;border-bottom:  1px solid #c3c3c3"><br>Proceso Convencional: <?php echo $proceso_convencional; ?></th>
  </tr>
  <tr>
    <th class="tbody nnp" colspan="2"><br><br>
      <table class="thb">
        <tr>
          <th class="tbody" colspan="3" style="text-align: center;"><b>CAFÉ PERGAMINO</b></th>
        </tr>
        <tr>
          <th class="tbody nnp" style="border-right: 1px solid white">Peso: <?php echo $peso_perg; ?></th>
          <th class="tbody" style="border-left: 1px solid white;border-right:  1px solid white"></th>
          <th class="tbody nnp" style="border-left:  1px solid white">Hº (%): <?php echo $h_perg; ?></th>
        </tr>
        <tr>
          <th class="tbodytree nnp txt_cnt <?php echo $olor_perg; ?>" >Olor</th>
          <th class="tbodytree nnp txt_cnt <?php echo $color_perg; ?>" >Color</th>
          <th class="tbodytree nnp txt_cnt <?php echo $normal_perg; ?>" >Normal</th>

        </tr>

        <tr>
          <th class="tbodytree nnp txt_cnt <?php echo $fresco_perg; ?>" >Fresco</th>
          <th class="tbodytree nnp txt_cnt <?php echo $disparejo_perg; ?>" >Disparejo</th>
          <th class="tbodytree nnp txt_cnt <?php echo $viejo_perg; ?>" >Viejo</th>
        </tr>
        <tr>
          <th class="tbodytree nnp txt_cnt <?php echo $fermento_perg; ?>" >Fermento</th>
          <th class="tbodytree nnp txt_cnt <?php echo $negruzco_perg; ?>" >Negruzco</th>
          <th class="tbodytree nnp txt_cnt <?php echo $terroso_perg; ?>" >Terroso</th>
        </tr>
        <tr>
          <th class="tbodytree nnp txt_cnt <?php echo $otros_perg; ?>" >Otros</th>
          <th class="tbodytree nnp txt_cnt <?php echo $hierbas_perg; ?>" >Hierbas</th>
          <th class="tbodytree nnp txt_cnt <?php echo $moho_perg; ?>" >Moho</th>
        </tr>
        <tr>
          <th class="tbodytree nnp txt_cnt <?php echo $manchado_perg; ?>" >Manchado</th>
        </tr>
      </table>
    </th>
    <th class="tbody nnp" colspan="2"><br><br>
      <table class="thb">
        <tr>
          <th class="tbody" colspan="3" style="text-align: center;"><b>&nbsp;&nbsp;CAFÉ ORO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
        </tr>
        <tr>
         <th class="tbody nnp" style="border-right: 1px solid white">Peso: <?php echo $peso_oro; ?></th>
         <th class="tbody" style="border-left: 1px solid white;border-right:  1px solid white"></th>
         <th class="tbody nnp" style="border-left:  1px solid white">Hº (%): <?php echo $h_oro; ?></th>
       </tr>
       <tr>
        <th class="tbodytree nnp txt_cnt <?php echo $olor_oro; ?>" >Olor</th>
        <th class="tbodytree nnp txt_cnt <?php echo $color_oro; ?>" >Color</th>
        <th class="tbodytree nnp txt_cnt <?php echo $normal_oro; ?>" >Normal</th>
      </tr>
      <tr>
        <th class="tbodytree nnp txt_cnt <?php echo $fresco_oro; ?>" >Fresco</th>
        <th class="tbodytree nnp txt_cnt <?php echo $azulado_oro; ?>" >Azulado</th>
        <th class="tbodytree nnp txt_cnt <?php echo $viejo_oro; ?>" >Viejo</th>
      </tr>
      <tr>
        <th class="tbodytree nnp txt_cnt <?php echo $disparejo_oro; ?>" >Disparejo</th>
        <th class="tbodytree nnp txt_cnt <?php echo $fermento_oro; ?>" >Fermento</th>
        <th class="tbodytree nnp txt_cnt <?php echo $amarillo_oro; ?> " >Amarillo</th>
      </tr>
      <tr>
        <th class="tbodytree nnp txt_cnt <?php echo $terroso_oro; ?> " >Terroso</th>
        <th class="tbodytree nnp txt_cnt <?php echo $traslucido_oro; ?>" >Traslucido</th>
        <th class="tbodytree nnp txt_cnt <?php echo $hierbas_oro; ?>" >Hierbas</th>
      </tr>
      <tr>
        <th class="tbodytree nnp txt_cnt <?php echo $moho_oro; ?>" >Moho</th>
        <th class="tbodytree nnp txt_cnt <?php echo $blanqueado_oro; ?>" >Blanqueado</th>
      </tr>
    </table>
  </th>
</tr>
<tr>
  <th class="tbody nnp" colspan="4" ><b>Observaciones:</b> <?php echo $tbl2_observ; ?><br></th>
</tr>
<tr>
  <th class="tbody nnp" style="border: 1px solid white">&nbsp;</th>
  <th class="tbody nnp" style="border: 1px solid white">&nbsp;</th>
  <th class="tbody nnp" style="border: 1px solid white">&nbsp;</th>
  <th class="tbody nnp" style="border: 1px solid white">&nbsp;</th>
</tr>
</table>
<!-- ===================================================================================================== -->
<div style="page-break-after: always"></div>
<table>
  <tr>
    <th style="width: 50%;text-align: right;">
     <TABLE >
      <TR>
        <TD ALIGN=center ROWSPAN=2 COLSPAN=2 style="font-weight: 800;width: 40%;border: #c3c3c3 1px solid;background: #bf360c;color: white">Cascarilla</TD>
        <TD style="text-align: left;border: #c3c3c3 1px solid;padding: 4px 2px;width: 30%">Peso (g)</TD>
        <TD style="border: #c3c3c3 1px solid;padding: 4px 2px;width: 30%"><?php echo $tbl2_peso; ?></TD>
      </TR>
      <TR>
        <TD style="text-align: left;border: #c3c3c3 1px solid;padding: 4px 2px;width: 30%;border-left: white 1px solid">Porcentaje (%)</TD>
        <TD style="border: #c3c3c3 1px solid;padding: 4px 2px;width: 30%"><?php echo $tbl2_porcentaj; ?></TD>
      </TR>
    </TABLE>
    <br><br>
    <table>
      <tr>
        <th colspan="5" style="border: 1px solid #c3c3c3;text-align: center;">GRANULOMETRÍA</th>
      </tr>
      <tr>
        <th style="border: 1px solid #c3c3c3;width: 25%">Malla Nº</th>
        <th style="border: 1px solid #c3c3c3;width: 10%"></th>
        <th style="border: 1px solid #c3c3c3;width: 30%">Peso (g)</th>
        <th style="border: 1px solid #c3c3c3;width: 10%"></th>
        <th style="border: 1px solid #c3c3c3;width: 25%">%</th>
      </tr>
      <tr>
        <td style="border: 1px solid #c3c3c3">19</td>
        <td style="border: 1px solid #c3c3c3;" rowspan="5"><img src="../vistas/img/plantilla/texto_malla_a.PNG"></td>
        <td style="border: 1px solid #c3c3c3"><?php echo $tbl2_pesouno; ?></td>
        <td style="border: 1px solid #c3c3c3" rowspan="7"><img src="../vistas/img/plantilla/texto_malla_b.PNG"></td>
        <td style="border: 1px solid #c3c3c3"><?php echo $tbl2_porce_uno; ?></td>
      </tr>
      <tr>
        <td style="border: 1px solid #c3c3c3">18</td>
        <!-- <td style="border: 1px solid #c3c3c3"></td> -->
        <td style="border: 1px solid #c3c3c3"><?php echo $tbl2_pesodos; ?></td>
        <!-- <td style="border: 1px solid #c3c3c3"></td> -->
        <td style="border: 1px solid #c3c3c3"><?php echo $tbl2_porce_dos; ?></td>
      </tr>
      <tr>
        <td style="border: 1px solid #c3c3c3">17</td>
        <!-- <td style="border: 1px solid #c3c3c3"></td> -->
        <td style="border: 1px solid #c3c3c3"><?php echo $tbl2_pesotres; ?></td>
        <!-- <td style="border: 1px solid #c3c3c3"></td> -->
        <td style="border: 1px solid #c3c3c3"><?php echo $tbl2_porce_tres; ?></td>
      </tr>
      <tr>
        <td style="border: 1px solid #c3c3c3">16</td>
        <!-- <td style="border: 1px solid #c3c3c3"></td> -->
        <td style="border: 1px solid #c3c3c3"><?php echo $tbl2_pesocuatro; ?></td>
        <!-- <td style="border: 1px solid #c3c3c3"></td> -->
        <td style="border: 1px solid #c3c3c3"><?php echo $tbl2_porce_cuatro; ?></td>
      </tr>
      <tr>
        <td style="border: 1px solid #c3c3c3">15</td>
        <!-- <td style="border: 1px solid #c3c3c3"></td> -->
        <td style="border: 1px solid #c3c3c3"><?php echo $tbl2_pesocinco; ?></td>
        <!-- <td style="border: 1px solid #c3c3c3"></td> -->
        <td style="border: 1px solid #c3c3c3"><?php echo $tbl2_porce_cinco; ?></td>
      </tr>
      <tr>
        <td style="border: 1px solid #c3c3c3">14</td>
        <td style="border: 1px solid #c3c3c3"></td>
        <td style="border: 1px solid #c3c3c3"><?php echo $tbl2_pesoseis; ?></td>
        <!-- <td style="border: 1px solid #c3c3c3"></td> -->
        <td style="border: 1px solid #c3c3c3"><?php echo $tbl2_porce_seis; ?></td>
      </tr>
      <tr>
        <th style="border: 1px solid #c3c3c3">13</th>
        <th style="border: 1px solid #c3c3c3"></th>
        <th style="border: 1px solid #c3c3c3"><?php echo $tbl2_pesosiete; ?></th>
        <!-- <th style="border: 1px solid #c3c3c3"></th> -->
        <th style="border: 1px solid #c3c3c3"><?php echo $tbl2_porce_siete; ?></th>
      </tr>
      <tr>
        <th style="border: 1px solid #c3c3c3">TOTAL</th>
        <th style="border: 1px solid #c3c3c3"></th>
        <th style="border: 1px solid #c3c3c3"><?php echo $total_granu; ?></th>
        <th style="border: 1px solid #c3c3c3"></th>
        <th style="border: 1px solid #c3c3c3"><?php echo $porce_granu; ?></th>
      </tr>
    </table>
    <br><br><br>
    <table>
      <tr>
        <th style="width: 50%;border: 1px solid #c3c3c3;background: #bf360c;color: white">Peso defectos total (g)</th>
        <td style="width: 50%;border: 1px solid #c3c3c3"><?php echo $i50pesodeftotal; ?></td>
      </tr>
      <tr>
        <th style="width: 50%;border: 1px solid #c3c3c3;background: #bf360c;color: white">Porcentaje defectos (%)</th>
        <td style="width: 50%;border: 1px solid #c3c3c3"><?php echo $i51pordeftotal; ?></td>
      </tr>
    </table>
    <br><br><br><br><br><br><br>
  </th>
  <th style="text-align: left;width: 50%;">
    <table>
      <tr>
        <th style="border: 1px solid #c3c3c3;background: #bf360c;color: white" colspan="3">DEFECTOS SOLO EN CASO DE EXPORTACIÓN</th>
      </tr>
      <tr>
        <th style="border: 1px solid #c3c3c3;background: #bf360c;color: white" colspan="3">MUESTRA 350 g:</th>
      </tr>
      <tr>
        <th style="border: 1px solid #c3c3c3;background: #bf360c;color: white" class="tbodytree nnp">Primarios </th>
        <th style="border: 1px solid #c3c3c3;background: #bf360c;color: white" class="tbodytree nnp">Nº de granos  </th>
        <th style="border: 1px solid #c3c3c3;background: #bf360c;color: white" class="tbodytree nnp">Nº Defectos</th>
      </tr>

      <tr>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp">Grano negro</th>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp"><?php echo $exp_granonegro; ?></th>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp"><?php echo $exp_a; ?></th>
      </tr>
      <tr>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp">Grano agrio</th>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp"><?php echo $exp_granoagrio ?></th>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp"><?php echo $exp_b; ?></th>
      </tr>
      <tr>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp">Cereza seca</th>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp"><?php echo $exp_cerezaseca; ?></th>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp"><?php echo $exp_c; ?></th>
      </tr>
      <tr>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp">Daño hongo</th>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp"><?php echo $exp_danohongo; ?></th>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp"><?php echo $exp_d; ?></th>
      </tr>
      <tr>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp">Materia extraña</th>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp"><?php echo $exp_materiaetrana; ?></th>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp"><?php echo $exp_e; ?></th>
      </tr>
      <tr>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp">Brocado severo</th>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp"><?php echo $exp_brocadosevero; ?></th>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp"><?php echo $exp_f; ?></th>
      </tr>
      <tr>
        <th style="border: 1px solid #c3c3c3;background: #bf360c;color: white" class="tbodytree nnp">Secundarios</th>
        <th style="border: 1px solid #c3c3c3;background: #bf360c;color: white" class="tbodytree nnp">Nº de granos</th>
        <th style="border: 1px solid #c3c3c3;background: #bf360c;color: white" class="tbodytree nnp">Nº Defectos</th>
      </tr>
      <tr>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp">Parcial negro</th>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp"><?php echo $exp_parcialnegro; ?></th>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp"><?php echo $exp_g; ?></th>
      </tr>
      <tr>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp">Parcial agrio</th>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp"><?php echo $exp_parcialagrio; ?></th>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp"><?php echo $exp_h; ?></th>
      </tr>
      <tr>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp">Pergamino</th>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp"><?php echo $exp_pergamino; ?></th>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp"><?php echo $exp_i; ?></th>
      </tr>
      <tr>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp">Flotador/blanq</th>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp"><?php echo $exp_flotblan; ?></th>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp"><?php echo $exp_j; ?></th>
      </tr>
      <tr>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp">Inmaduro</th>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp"><?php echo $exp_inmaduro; ?></th>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp"><?php echo $exp_k; ?></th>
      </tr>
      <tr>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp">Averanado/Arrug</th>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp"><?php echo $exp_averana; ?></th>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp"><?php echo $exp_l; ?></th>
      </tr>
      <tr>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp">Conchas</th>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp"><?php echo $exp_conchas; ?></th>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp"><?php echo $exp_m; ?></th>
      </tr>
      <tr>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp">Part/Mord/Cort</th>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp"><?php echo $exp_partmord; ?></th>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp"><?php echo $exp_n; ?></th>
      </tr>
      <tr>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp">Cáscara y Pulp</th>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp"><?php echo $exp_cascara; ?></th>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp"><?php echo $exp_o; ?></th>
      </tr>
      <tr>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp">Brocado leve</th>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp"><?php echo $exp_brocadoleve; ?></th>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp"><?php echo $exp_p; ?></th>
      </tr>
      <tr>
        <th style="border: 1px solid #c3c3c3;background: #bf360c;color: white" class="tbodytree nnp" colspan="2">Nº TOTAL DE DEFECTOS  </th>
        <th style="border: 1px solid #c3c3c3" class="tbodytree nnp"><?php echo $total_rata_expo; ?></th>
      </tr>
    </table>
    <br>

  </th>
</tr>


</table>
 <table>
    <TR>
        <TD ALIGN=center ROWSPAN=2 COLSPAN=2 style="font-weight: 800;width: 40%;border: #c3c3c3 1px solid;background: #bf360c;color: white">Rendimiento Exportable</TD>
        <TD style="text-align: left;border: #c3c3c3 1px solid;padding: 4px 2px;width: 30%">(100 - % Cascarilla - % defectos)</TD>
        <TD style="border: #c3c3c3 1px solid;padding: 4px 2px;width: 30%"><?php echo $totl_rendimiento_export; ?></TD>
      </TR>
  </table>

<!-- ===================================================================================================== -->
<?php }?>

<?php
$rutasabor = "../vistas/img/sabores/".$idcodrbpm1."RuletaSabor.png";

if (file_exists($rutasabor)) {
    echo "El fichero $nombre_fichero existe";

?>

<!-- HOJA RULETA DE SABORES -->

<!-- ===================================================================================================== -->
<!-- ===================================================================================================== -->
<div style="page-break-after: always"></div>
<table class="thb" >
    <tr>
      <th class="thhead"><img src="../vistas/img/plantilla/A1logoMoali.png" alt="Smiley face" width="140"></th>
      <th class="thhead"><h4 class="thheadp">LABORATORIO<br>CONTROL DE CALIDAD</h4></th>
      <th class="thhead cuadritocb tleft">
       Versión: 01<br>
       Aprobado por: RODAS MOALI, ALEX<br>
       Fecha: <?php echo $fecha_create_registro; ?><br>
       Página: <?php echo $correlativo; ?><br>
     </th>
   </tr>
 </table>
 <br>
<!--
<table class="thb">
  <tr>
    <th class="tbody nnp" style="width: 100%; justify-content: center;text-align: center;"><img class="center-block" src="../vistas/img/sabores/<?php echo $idcodrbpm1; ?>RuletaSabor.png" alt="Solvetic"></th>
  </tr>
</table>
-->
<div align="center">
<img src="../vistas/img/sabores/<?php echo $idcodrbpm1; ?>RuletaSabor.png" alt="Solvetic" style="width: 600px; height: 593px;">
</div>
<?php 
} else {
    
}

?>


</body>
</html>




