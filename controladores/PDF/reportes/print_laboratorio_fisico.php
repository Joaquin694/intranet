<?php session_start();if (!isset($_SESSION["iniciarSesion"])) {header("Location: /");}?>

<!DOCTYPE html> 

<html lang="es">

<head ><meta http-equiv="Content-Type" content="text/html; charset=utf-8">



  <link rel="shortcut icon" type="image/png" href="<?php echo URLMAIN; ?>/vistas/img/plantilla/icono-negro.png"/>

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

  hr {
  background-color: #ff5050;
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

  .W49{width: 49%} .W29{width: 29%} .W27{width: 27%} .W30{width: 30%} .W32{width: 32%} .W35{width: 35%} .W40{width: 40%} .W80{width: 80%;} .w60{width: 60%;} .w65{width: 65%;}

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






  

  .cabecera {
      background: #ccff99;
      margin-top: -15px;
      height: 70px;      
  }

  .logoini {
      width: 100px;
  }
  
  h3 {
    text-align: center;
    font-family: Arial, Helvetica, Sans-serif;
    font-size: 14px;
    margin-top: -3px;
  }

  .subcabecera {
      background: #ccff99;
      height: 100px;      
  }

  .hero-image {

background-image: url(../vistas/img/plantilla/dibujitos2__.png);

background-position: center;

background-repeat: no-repeat;

background-size: cover;

position: relative;

}


  
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

    

    $elements = explode("-", $altitud);

    $fechaentrega     = $rowi["fechaentrega"];



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



    $analisis_de_pergamino = $rowi["analisis_de_pergamino"] === 'true' ? '<img  src="../vistas/img/anlisis/cuerpo.png"  width="15"  >' : false;

    $proceso_organico      = $rowi["proceso_organico"] === 'true' ? '<img  src="../vistas/img/anlisis/cuerpo.png" width="15" >' : false;

    $proceso_convencional  = $rowi["proceso_convencional"] === 'true' ? '<img  src="../vistas/img/anlisis/cuerpo.png" width="15" >' : false;



    $peso_perg = $rowi["peso_perg"];

    $h_perg    = $rowi["h_perg"];



    $color_perg     = $rowi["color_perg"] === 'true' ? '<img  src="../vistas/img/anlisis/cuerpo.png"  width="15"  >' : false;

    $olor_perg      = $rowi["olor_perg"] === 'true' ? '<img  src="../vistas/img/anlisis/cuerpo.png"  width="15"  >' : false;

    $normal_perg    = $rowi["normal_perg"] === 'true' ? '<img  src="../vistas/img/anlisis/cuerpo.png"  width="15"  >' : false;

    $fresco_perg    = $rowi["fresco_perg"] === 'true' ? '<img  src="../vistas/img/anlisis/cuerpo.png"  width="15"  >' : false;

    $disparejo_perg = $rowi["disparejo_perg"] === 'true' ? '<img  src="../vistas/img/anlisis/cuerpo.png"  width="15"  >' : false;

    $viejo_perg     = $rowi["viejo_perg"] === 'true' ? '<img  src="../vistas/img/anlisis/cuerpo.png"  width="15"  >' : false;

    $fermento_perg  = $rowi["fermento_perg"] === 'true' ? '<img  src="../vistas/img/anlisis/cuerpo.png"  width="15"  >' : false;

    $negruzco_perg  = $rowi["negruzco_perg"] === 'true' ? '<img  src="../vistas/img/anlisis/cuerpo.png"  width="15"  >' : false;

    $terroso_perg   = $rowi["terroso_perg"] === 'true' ? '<img  src="../vistas/img/anlisis/cuerpo.png"  width="15"  >' : false;

    $otros_perg     = $rowi["otros_perg"] === 'true' ? '<img  src="../vistas/img/anlisis/cuerpo.png"  width="15"  >' : false;

    $hierbas_perg   = $rowi["hierbas_perg"] === 'true' ? '<img  src="../vistas/img/anlisis/cuerpo.png"  width="15"  >' : false;

    $moho_perg      = $rowi["moho_perg"] === 'true' ? '<img  src="../vistas/img/anlisis/cuerpo.png"  width="15"  >' : false;

    $manchado_perg  = $rowi["manchado_perg"] === 'true' ? '<img  src="../vistas/img/anlisis/cuerpo.png"  width="15"  >' : false;



    $peso_oro = $rowi["peso_oro"];

    $h_oro    = $rowi["h_oro"];



    $color_oro      = $rowi["color_oro"] === 'true' ? '<img  src="../vistas/img/anlisis/cuerpo.png"  width="15"  >' : false;

    $olor_oro       = $rowi["olor_oro"] === 'true' ? '<img  src="../vistas/img/anlisis/cuerpo.png"  width="15"  >' : false;

    $normal_oro     = $rowi["normal_oro"] === 'true' ? '<img  src="../vistas/img/anlisis/cuerpo.png"  width="15"  >' : false;

    $fresco_oro     = $rowi["fresco_oro"] === 'true' ? '<img  src="../vistas/img/anlisis/cuerpo.png"  width="15"  >' : false;

    $azulado_oro    = $rowi["azulado_oro"] === 'true' ? '<img  src="../vistas/img/anlisis/cuerpo.png"  width="15"  >' : false;

    $viejo_oro      = $rowi["viejo_oro"] === 'true' ? '<img  src="../vistas/img/anlisis/cuerpo.png"  width="15"  >' : false;

    $disparejo_oro  = $rowi["disparejo_oro"] === 'true' ? '<img  src="../vistas/img/anlisis/cuerpo.png"  width="15"  >' : false;

    $fermento_oro   = $rowi["fermento_oro"] === 'true' ? '<img  src="../vistas/img/anlisis/cuerpo.png"  width="15"  >' : false;

    $amarillo_oro   = $rowi["amarillo_oro"] === 'true' ? '<img  src="../vistas/img/anlisis/cuerpo.png"  width="15"  >' : false;

    $terroso_oro    = $rowi["terroso_oro"] === 'true' ? '<img  src="../vistas/img/anlisis/cuerpo.png"  width="15"  >' : false;

    $traslucido_oro = $rowi["traslucido_oro"] === 'true' ? '<img  src="../vistas/img/anlisis/cuerpo.png"  width="15"  >' : false;

    $hierbas_oro    = $rowi["hierbas_oro"] === 'true' ? '<img  src="../vistas/img/anlisis/cuerpo.png"  width="15"  >' : false;

    $moho_oro       = $rowi["moho_oro"] === 'true' ? '<img  src="../vistas/img/anlisis/cuerpo.png"  width="15"  >' : false;

    $blanqueado_oro = $rowi["blanqueado_oro"] === 'true' ? '<img  src="../vistas/img/anlisis/cuerpo.png"  width="15"  >' : false;



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





<!-- ===================================================================================================== -->



<?php



if (($tipo_anal === "Análisis Físico") or ($tipo_anal === "Análisis Sensorial y Físico")) {



    ?>

    <!-- OTRA PÁGINA -->
    <div class="hero-image">




    <table >

        <tr>

            <th style="width: 50%;justify-content: right;text-align: left;padding-top: -35px;padding-bottom: -6.5px;padding-left:11px">
                <img  src="../vistas/img/plantilla/MOALIfull.png" alt="MOALI" style="width: 72%">
            </th>
            <th style="width: 50%;justify-content: right;text-align: right;padding-top: -30.5px;padding-bottom: -6.5px;padding-right:11px; color: #6a6a6a"><br><br>
                <p style="font-size: 13px;color; #c3c3c3">RUC: 20601012597</p>
                <p style="font-size: 13px;color; #c3c3c3;padding-top: -24px">Jr. Pozuzo 353 Villa Rica, Perú | Telf.: 952 820 007</p>
                <p style="font-size: 13px;color; #c3c3c3;padding-top: -24px">Email:  info@moalilab.com | Web: www.moalilab.com</p>
            </th>
        </tr>

        <tr>

            <th class="tbody nnp " colspan="6" style="font-size: 11px;border: 1px solid white;text-align: right;"> <hr style="color: #c3c3c3;height: 4px;background: #c3c3c3 "></th>

        </tr>
    </table>

    
    <h3>CONTROL DE CALIDAD</h3>



    <table class="thb" >

      <tr>

         <th style="font-size: 10px;border: 1px solid white;padding-top: -0.5px" class="tbody nnp w20" colspan="1"><b>•&nbsp;PRODUCTOR/CLIENTE:</b> </th>

         <th style="font-size: 10px;border: 1px solid white;padding-top: -0.5px" class="tbody nnp w50" colspan="5"><?php echo trim($nombrecliente); ?> </th>

      </tr>

      <tr>

         <th style="font-size: 10px;border: 1px solid white;padding-top: -0.5px" class="tbody nnp w20" colspan="1"><b>•&nbsp;ORIGEN:</b> </th>

         <th style="font-size: 10px;border: 1px solid white;padding-top: -0.5px" class="tbody nnp w50" colspan="2"><?php echo $procedencia; ?></th>

         <th style="font-size: 10px;border: 1px solid white;padding-top: -0.5px" class="tbody nnp W10" colspan="1"><b>•&nbsp;HUMEDAD:</b></th>

         <th style="font-size: 10px;border: 1px solid white;padding-top: -0.5px" class="tbody nnp W20" colspan="2"><?php echo $humedad; ?></th>

      </tr>

      <tr>

        <th style="font-size: 10px;border: 1px solid white;padding-top: -0.5px" class="tbody nnp w20" colspan="1"><b>•&nbsp;COLOR AGTRON:</b> </th>

        <th style="font-size: 10px;border: 1px solid white;padding-top: -0.5px" class="tbody nnp w50" colspan="2"><?php  echo $elements[4]; ?></th>
        <th style="font-size: 10px;border: 1px solid white;padding-top: -0.5px" class="tbody nnp W10" colspan="1"><b>•&nbsp;ALTITUD:</b> </th>

        <th style="font-size: 10px;border: 1px solid white;padding-top: -0.5px" class="tbody nnp W20" colspan="2"> <?php  echo $elements[1]; ?></th>
        
        </tr>

     <tr>

        <th style="font-size: 10px;border: 1px solid white;padding-top: -0.5px" class="tbody nnp w20" colspan="1"><b>•&nbsp;ACT. DEL AGUA:</b> </th>

        <th style="font-size: 10px;border: 1px solid white;padding-top: -0.5px" class="tbody nnp w50" colspan="2"><?php  echo $elements[3]; ?></th>

        <th style="font-size: 10px;border: 1px solid white;padding-top: -0.5px" class="tbody nnp W10" colspan="1"><b>•&nbsp;DENSIDAD</b></th>

        <th style="font-size: 10px;border: 1px solid white;padding-top: -0.5px" class="tbody nnp W20" colspan="2"><?php  echo $elements[2]; ?></th>

    </tr>

      <tr>
         <th style="font-size: 10px;border: 1px solid white;padding-top: -0.5px" class="tbody nnp w20" colspan="1"><b>•&nbsp;FECHA DE ANÁLISIS:</b> </th>

         <th style="font-size: 10px;border: 1px solid white;padding-top: -3px" class="tbody nnp w50" colspan="2"><?php echo $idfechaentrega; ?></th>

         <th style="font-size: 10px;border: 1px solid white;padding-top: -0.5px" class="tbody nnp W10" colspan="1"><b>•&nbsp;VARIEDAD:</b></th>

         <th style="font-size: 10px;border: 1px solid white;padding-top: -0.5px" class="tbody nnp W20" colspan="2">
                <?php  echo ucfirst(strtolower($elements[0])); ?>
        </th>
      </tr>

<tr>

   <th class="tbody nnp " colspan="6" style="font-size: 11px;border: 1px solid white;padding-top: -16px;text-align: right;"> <?php echo $letra_tipo_codelabo . $idcodrbpm1; ?><hr style="color: #c3c3c3;height: 4px;background: #c3c3c3 "></th>

</tr>

</table>



<table class="thb" style="margin-top: -12px; margin-left: 8px">

<tr>
    <th class="w32" colspan="3"  style="padding: 5px;font-weight: 900;color: white; background: #ff3333;font-size: 12px;border-radius: 10px;border: 1px solid transparent">
    <b>ÁNALISIS FISICO</b>
    </th>
</tr>
</table>

<table class="thb" style="margin-left: 10px">

<tr>
    <td style="font-size: 11px; padding-top: 1px;">Ánalisis de Pergamino</td>
    <td>&nbsp;&nbsp;<?php echo $analisis_de_pergamino; ?></td>
</tr>
<tr>
    <td style="width: 160px;font-size: 11px; padding-top: 1px; ">Proceso Orgánico</td>
    <td style="width: 30px;">&nbsp;&nbsp;<?php echo $proceso_organico;?></td>
</tr>
<tr>
    <td style="font-size: 11px; padding-top: 1px;">Proceso Convencional</td>
    <td style="">&nbsp;&nbsp;<?php echo $proceso_convencional;?></td>
</tr>

</table>
<table class="thb" style=" margin-left: 8px">

<tr>
    <th class="w32" colspan="3"  style="padding: 5px;font-weight: 900;color: white; background: #ff3333;font-size: 12px;border-radius: 10px;border: 1px solid transparent">
    <b>CASCARILLA</b>
    </th>
</tr>
</table>

<table class="thb" style="margin-left: 10px">

<tr>
    <td style="font-size: 11px; padding-top: 1px;">Peso (g)</td>
    <td style="width: 30px; text-align: center; font-size: 11px"><?php echo $tbl2_peso; ?></td>
</tr>
<tr>
    <td style="width: 160px; font-size: 11px; padding-top: 1px; ">Porcentaje (%)</td>
    <td style="width: 30px; text-align: center; font-size: 11px"><?php echo $tbl2_porcentaj;?></td>
</tr>

</table>
<table class="thb" style="margin-left: 10px">

<tr>
    <td style="width: 200px; height: 30px; font-size: 10px;">* Observaciones : <?php echo $tbl2_observ ?>
    </td>
</tr>

</table>

<table class="thb" style=" margin-left: 8px">

<tr>
    <th class="w35" colspan="3"  style="padding: 5px;font-weight: 900;color: white; background: #ff3333;font-size: 12px;border-radius: 10px;border: 1px solid transparent">
    <b>GRANULOMETRÍA</b>
    </th>
</tr>
</table>

<table class="thb" style=" margin-left: 8px; ">
<TR>
		<TD style="width: 47px; font-size: 11px; text-align: center; padding: 3px; 0px;">Malla N°</TD>
		<TD ROWSPAN=10 style="width: 15px"></TD>
		<TD style="width: 47px; font-size: 11px; text-align: center;padding: 3px; 0px;">Peso (g)</TD>
        <TD ROWSPAN=10 style="width: 15px;font-size: 11px"></TD>
        <TD style="width: 47px; font-size: 11px; text-align: center; padding: 3px; 0px;">%</TD>
	</TR>
	<TR>
		<TD style="text-align: center;font-size: 11px;">19</TD> 
        <TD style="text-align: center;font-size: 11px;"><?php echo $tbl2_pesouno ?></TD>
        <TD style="text-align: center;font-size: 11px;"><?php echo $tbl2_porce_uno ?></TD>
	</TR>
    <TR>
		<TD style="text-align: center;font-size: 11px;">18</TD> 
        <TD style="text-align: center;font-size: 11px;"><?php echo $tbl2_pesodos ?></TD>
        <TD style="text-align: center;font-size: 11px;"><?php echo $tbl2_porce_dos ?></TD>
	</TR>
    <TR>
		<TD style="text-align: center;font-size: 11px;">17</TD> 
        <TD style="text-align: center;font-size: 11px;"><?php echo $tbl2_pesotres ?></TD>
        <TD style="text-align: center;font-size: 11px;"><?php echo $tbl2_porce_tres ?></TD>
	</TR>
    <TR>
		<TD style="text-align: center;font-size: 11px;">16</TD> 
        <TD style="text-align: center;font-size: 11px;"><?php echo $tbl2_pesocuatro ?></TD>
        <TD style="text-align: center;font-size: 11px;"><?php echo $tbl2_porce_cuatro ?></TD>
	</TR>
    <TR>
		<TD style="text-align: center;font-size: 11px;">15</TD> 
        <TD style="text-align: center;font-size: 11px;"><?php echo $tbl2_pesocinco ?></TD>
        <TD style="text-align: center;font-size: 11px;"><?php echo $tbl2_porce_cinco ?></TD>
	</TR>
    <TR>
		<TD style="text-align: center;font-size: 11px;">14</TD> 
        <TD style="text-align: center;font-size: 11px;"><?php echo $tbl2_pesoseis ?></TD>
        <TD style="text-align: center;font-size: 11px;"><?php echo $tbl2_porce_seis ?></TD>
	</TR>
    <TR>
		<TD style="text-align: center;font-size: 11px;">13</TD> 
        <TD style="text-align: center;font-size: 11px;"><?php echo $tbl2_pesosiete?></TD>
        <TD style="text-align: center;font-size: 11px;"><?php echo $tbl2_porce_siete ?></TD>
	</TR>
    

</table>

<table class="thb" style=" margin-left: 8px">

<tr>
    <th class="w35" colspan="3"  style="padding: 5px;font-weight: 900;color: white; background: #ff3333;font-size: 12px;border-radius: 10px;border: 1px solid transparent; text-align: left">
    <b>Total</b>
    </th>
</tr>
</table>

<table class="thb" style="margin-left: 95px; margin-top: -27px">

<tr>
    <td style="font-size: 11px; padding-top: 1px; width: 50px; height: 12px; background: white ; border-radius: 7px; text-align: center"> <?php echo $total_granu?></td>
    
</tr>

</table>
<table class="thb" style="margin-left: 184px; margin-top: -24px">

<tr>
    <td style="font-size: 11px; padding-top: 1px; width: 50px; height: 12px; background: white ; border-radius: 7px; text-align: center"><?php echo $porce_granu?></td>
    
</tr>

</table>

<table class="thb" style="margin-left: 10px; margin-top: 5px">

<tr>
    <td style="font-size: 11px;padding: 5px 0px; text-align: center">Peso Defecto Total (g)</td>
    <td style="font-size: 11px; padding: 5px 0px; text-align: center; width: 60px"><?php echo $i50pesodeftotal ?></td>
</tr>
<tr>
    <td style="width: 160px; font-size: 11px; padding: 5px 0px; text-align: center">Porcentaje Defecto (%)</td>
    <td style="font-size: 11px; padding: 5px 0px; text-align: center"><?php echo $i51pordeftotal ?></td>
</tr>

</table>

<table class="thb" style=" margin-left: 8px">

<tr>
    <th class="w35" colspan="3"  style="padding: 5px;font-weight: 900;color: white; background: #ff3333;font-size: 12px;border-radius: 10px;border: 1px solid transparent; text-align: center">
    <b>RENDIMIENTO EXPORTABLE</b>
    </th>
</tr>
</table>
<table class="thb" style="margin-left: 10px; margin-top: 5px; ">

<tr>
    <td style="font-size: 11px; padding-top: 1px; width: 229px; text-align: center"><?php echo $totl_rendimiento_export?></td>
</tr>
<tr>
    <td style="width: 160px; font-size: 11px; padding-top: 1px; text-align: center ">Porcentaje Defecto (%)</td>
</tr>

</table>

<table class="thb" style="margin-left: 4px; margin-top: 20px">
<td style="width: 210px; height: 100px; border: 1px solid transparent; ">
<img src="../vistas/img/plantilla/firmal.png" style="width: 150px; height: 100px; margin-left: 50px">
</td>
</table>


<table class="thb" style="margin-left: 239px; margin-top: -526px">

<tr>
    <th class="w32" colspan="3"  style="padding: 5px;font-weight: 900;color: white; background: #ff3333;font-size: 12px;border-radius: 10px;border: 1px solid transparent">
    <b>CAFÉ PERGAMINO</b>
    </th>
</tr>
</table>

<table class="thb" style="margin-left: 242px;">

<tr>
    <td style="width: 50px; font-size: 11px; padding-top: 1px; ">Peso</td>
    <td style="width: 142px;font-size: 11px; padding-top: 1px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $peso_perg;?></td>
</tr>
<tr>
    <td style="font-size: 11px; padding-top: 1px;">H° (%)</td>
    <td style="font-size: 11px; padding-top: 1px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $h_perg;?></td>
</tr>

<tr>

</tr>
</table>

<table class="thb" style="margin-left: 242px; margin-top: -7px">

<tr>
    <td style="width: 92px; height: 12px; padding-top: 7px ">Color :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $color_perg;?></td>
    <td style="width: 100px; height: 12px; padding-top: 7px">Olor :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $olor_perg;?></td>
</tr>


<tr>

</tr>
</table>
<table class="thb" style="margin-left: 242px; margin-top: -7px">

<tr>
    <td style="width: 62px;font-size: 11px; padding-top: 1px; ">Normal</td>
    <td style="width: 19px;" >&nbsp;<?php echo $normal_perg;?></td>
    <td style="width: 70px; font-size: 11px; padding-top: 1px;">Fresco</td>
    <td style="width: 19px">&nbsp;<?php echo $fresco_perg;?></td>
</tr>
<tr>
    <td style="width: 62px; font-size: 11px; padding-top: 1px; ">Disparejo</td>
    <td style="width: 19px">&nbsp;<?php echo $disparejo_perg;?></td>
    <td style="width: 70px; font-size: 11px; padding-top: 1px;">Viejo</td>
    <td style="width: 19px">&nbsp;<?php echo $viejo_perg;?></td>
</tr>
<tr>
    <td style="width: 62px; font-size: 11px; padding-top: 1px;">Manchado</td>
    <td style="width: 19px">&nbsp;<?php echo $manchado_perg;?></td>
    <td style="width: 70px; font-size: 11px; padding-top: 1px;">Fermento</td>
    <td style="width: 19px">&nbsp;<?php echo $fermento_perg;?></td>

</tr>
<tr>
    <td style="width: 62px; font-size: 11px; padding-top: 1px;">Negruzco</td>
    <td style="width: 19px">&nbsp;<?php echo $negruzco_perg;?></td>
    <td style="width: 70px; font-size: 11px; padding-top: 1px;">Terroso</td>
    <td style="width: 19px">&nbsp;<?php echo $terroso_perg;?></td>
</tr>
<tr>
    <td style="width: 62px; font-size: 11px; padding-top: 1px;">Otros</td>
    <td style="width: 19px">&nbsp;<?php echo $otros_perg;?></td>
    <td style="width: 70px; font-size: 11px; padding-top: 1px;">Hierbas</td>
    <td style="width: 19px">&nbsp;<?php echo $hierbas_perg;?></td>
</tr>
<tr>
    <td style="width: 62px; font-size: 11px; padding-top: 1px;">Moho</td>
    <td style="width: 19px">&nbsp;<?php echo $moho_perg;?></td>
</tr>


</table>



<table class="thb" style="margin-left: 470px; margin-top: -193px">

<tr>
    <th class="w32" colspan="3"  style="padding: 5px;font-weight: 900;color: white; background: #ff3333;font-size: 12px;border-radius: 10px;border: 1px solid transparent">
    <b>CAFÉ ORO</b>
    </th>
</tr>
</table>

<table class="thb" style="margin-left: 472px;">

<tr>
    <td style="width: 50px; font-size: 11px; padding-top: 1px;">Peso</td>
    <td style="width: 145px;font-size: 11px; padding-top: 1px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $peso_oro;?></td>
</tr>
<tr>
    <td style="font-size: 11px; padding-top: 1px;">H° (%)</td>
    <td style="font-size: 11px; padding-top: 1px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $h_oro;?></td>
</tr>

</table>
<table class="thb" style="margin-left: 472px; margin-top: -7px">

<tr>
    <td style="width: 95px; height: 12px; padding-top: 7px">Color :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $color_oro;?></td>
    <td style="width: 100px; height: 12px; padding-top: 7px">Olor :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $olor_oro;?></td>
</tr>


<tr>

</tr>
</table>
<table class="thb" style="margin-left: 472px; margin-top: -7px">

<tr>
    <td style="width: 64px; font-size: 11px; padding-top: 1px;">Normal</td>
    <td style="width: 19px" >&nbsp;<?php echo $normal_oro;?></td>
    <td style="width: 70px;font-size: 11px; padding-top: 1px;">Fresco</td>
    <td style="width: 19px">&nbsp;<?php echo $fresco_oro;?></td>
</tr>
<tr>
    <td style="width: 65px; font-size: 11px; padding-top: 1px;">Blanqueado</td>
    <td style="width: 19px">&nbsp;<?php echo $blanqueado_oro;?></td>
    <td style="width: 70px; font-size: 11px; padding-top: 1px;">Viejo</td>
    <td style="width: 19px">&nbsp;<?php echo $viejo_oro;?></td>
</tr>
<tr>
    <td style="width: 63px; font-size: 11px; padding-top: 1px;">Disparejo</td>
    <td style="width: 19px">&nbsp;<?php echo $disparejo_oro;?></td>
    <td style="width: 70px; font-size: 11px; padding-top: 1px;">Fermento</td>
    <td style="width: 19px">&nbsp;<?php echo $fermento_oro;?></td>

</tr>
<tr>
    <td style="width: 63px; font-size: 11px; padding-top: 1px;">Amarillo</td>
    <td style="width: 19px">&nbsp;<?php echo $amarillo_oro;?></td>
    <td style="width: 70px; font-size: 11px; padding-top: 1px;">Terroso</td>
    <td style="width: 19px">&nbsp;<?php echo $terroso_oro;?></td>
</tr>
<tr>
    <td style="width: 63px; font-size: 11px; padding-top: 1px;">Traslucido</td>
    <td style="width: 19px">&nbsp;<?php echo $traslucido_oro;?></td>
    <td style="width: 70px; font-size: 11px; padding-top: 1px;">Hierbas</td>
    <td style="width: 19px">&nbsp;<?php echo $hierbas_oro;?></td>
</tr>
<tr>
    <td style="width: 63px; font-size: 11px; padding-top: 1px;">Azulado</td>
    <td style="width: 19px">&nbsp;<?php echo $azulado_oro;?></td>
    <td style="width: 70px; font-size: 11px; padding-top: 1px;">Moho</td>
    <td style="width: 19px">&nbsp;<?php echo $moho_oro;?></td>
</tr>


</table>

<table class="thb" style="margin-left: 420px; ">

<tr>
    <th class="w40" colspan="3"  style="padding: 5px;font-weight: 900;color: white; background: #68B654;font-size: 11px;border-radius: 10px;border: 1px solid transparent; ">
    <b>DEFECTOS SOLO EN CASO DE EXPORTACIÓN</b>
    </th>
</tr>
</table>

<table class="thb" style="margin-left: 420px; ">

<tr>
    <th style="width: 120px; padding: 5px 0;; font-size: 11px; ">Primarios</th>
    <th style="width: 74px;font-size: 11px;padding: 5px 0;" >N° de granos</th>
    <th style="width: 76px; font-size: 11px;padding: 5px 0;">N° defectos</th>
</tr>
<tr>
    <td style="padding: 5px 0; font-size: 11px;">Grano Negro</td>
    <td style="padding: 5px 0;font-size: 11px; text-align: center"><?php echo $exp_granonegro;?></td>
    <td style="padding: 5px 0;font-size: 11px; text-align: center">&nbsp;<?php echo $exp_a?></td>
</tr>
<tr>
    <td style="padding: 5px 0; font-size: 11px; ">Grano Agrio</td>
    <td style="padding: 5px 0;font-size: 11px; text-align: center">&nbsp;<?php echo $exp_granoagrio;?></td>
    <td style="padding: 5px 0;font-size: 11px; text-align: center">&nbsp;<?php echo $exp_b;?></td>

</tr>
<tr>
    <td  style="padding: 5px 0; font-size: 11px;">Cereza Seca</td>
    <td style="padding: 5px 0;font-size: 11px; text-align: center">&nbsp;<?php echo $exp_cerezaseca;?></td>
    <td style="padding: 5px 0;font-size: 11px; text-align: center">&nbsp;<?php echo $exp_c;?></td>
</tr>
<tr>
    <td style="padding: 5px 0;font-size: 11px;">Daño Hongo</td>
    <td style="padding: 5px 0;font-size: 11px; text-align: center">&nbsp;<?php echo $exp_danohongo;?></td>
    <td style="padding: 5px 0;font-size: 11px;text-align: center">&nbsp;<?php echo $exp_d;?></td>
</tr>
<tr>
    <td style="padding: 5px 0;font-size: 11px;">Materia Extraña</td>
    <td style="padding: 5px 0;font-size: 11px;text-align: center">&nbsp;<?php echo $exp_materiaetrana;?></td>
    <td style="padding: 5px 0;font-size: 11px;text-align: center">&nbsp;<?php echo $exp_e;?></td>
</tr>
<tr>
    <td style="padding: 5px 0;font-size: 11px;">Brocado Severo</td>
    <td style="padding: 5px 0;font-size: 11px;text-align: center" >&nbsp;<?php echo $exp_brocadosevero;?></td>
    <td style="padding: 5px 0;font-size: 11px;text-align: center">&nbsp;<?php echo $exp_f;?></td>
</tr>



</table>


<table class="thb" style="margin-left: 420px; ">

<tr>
    <th style="width: 120px; padding: 5px 0; font-size: 11px; ">Secundarias</th>
    <th style="width: 74px;font-size: 11px;padding: 5px 0;" >N° de Granos</th>
    <th style="width: 76px;font-size: 11px;padding: 5px 0;">N° Defectos</th>
</tr>
<tr>
    <td style="padding: 5px 0;font-size: 11px;">Parcial Negro</td>
    <td style="padding: 5px 0;font-size: 11px; text-align: center"><?php echo $exp_parcialnegro;?></td>
    <td style="padding: 5px 0;font-size: 11px;text-align: center"><?php echo $exp_g;?></td>
</tr>
<tr>
    <td style="padding: 5px 0;font-size: 11px;">Parcial agrio Agrio</td>
    <td style="padding: 5px 0;font-size: 11px; text-align: center"><?php echo $exp_parcialagrio;?></td>
    <td style="padding: 5px 0;font-size: 11px;text-align: center"><?php echo $exp_h;?></td>

</tr>
<tr>
    <td style="padding: 5px 0;font-size: 11px;">Pergamino</td>
    <td style="padding: 5px 0;font-size: 11px;text-align: center"><?php echo $exp_pergamino;?></td>
    <td style="padding: 5px 0;font-size: 11px;text-align: center"><?php echo $exp_i;?></td>
</tr>
<tr>
    <td style="padding: 5px 0;font-size: 11px;">Flotador/blanq</td>
    <td style="padding: 5px 0;font-size: 11px;text-align: center"><?php echo $exp_flotblan;?></td>
    <td style="padding: 5px 0;font-size: 11px;text-align: center"><?php echo $exp_j;?></td>
</tr>
<tr>
    <td style="padding: 5px 0;font-size: 11px;">Inmaduro</td>
    <td style="padding: 5px 0;font-size: 11px;text-align: center"><?php echo $exp_inmaduro;?></td>
    <td style="padding: 5px 0;font-size: 11px;text-align: center"><?php echo $exp_k;?></td>
</tr>
<tr>
    <td style="padding: 5px 0;font-size: 11px;">Averanado/Arrug</td>
    <td style="padding: 5px 0;font-size: 11px;text-align: center"><?php echo $exp_averana;?></td>
    <td style="padding: 5px 0;font-size: 11px;text-align: center"><?php echo $exp_l;?></td>
</tr>
<tr>
    <td style="padding: 5px 0;font-size: 11px;">Conchas</td>
    <td style="padding: 5px 0;font-size: 11px;text-align: center"><?php echo $exp_conchas;?></td>
    <td style="padding: 5px 0;font-size: 11px;text-align: center"><?php echo $exp_m;?></td>
</tr>
<tr>
    <td style="padding: 5px 0;font-size: 11px;">Part/Mord/Cort</td>
    <td style="padding: 5px 0;font-size: 11px;text-align: center"><?php echo $exp_partmord;?></td>
    <td style="padding: 5px 0;font-size: 11px;text-align: center"><?php echo $exp_n;?></td>
</tr>
<tr>
    <td style="padding: 5px 0;font-size: 11px;">Cáscara y Pulp</td>
    <td style="padding: 5px 0;font-size: 11px;text-align: center"><?php echo $exp_cascara;?></td>
    <td style="padding: 5px 0;font-size: 11px;text-align: center"><?php echo $exp_o;?></td>
</tr>
<tr>
    <td style="padding: 5px 0;font-size: 11px;">Brocado Leve</td>
    <td style="padding: 5px 0;font-size: 11px;text-align: center"><?php echo $exp_brocadoleve;?></td>
    <td style="padding: 5px 0;font-size: 11px;text-align: center"><?php echo $exp_p;?></td>
</tr>



</table>

<table class="thb" style=" margin-left: 420px">

<tr>
    <th colspan="3"  style="padding: 5px;font-weight: 900;color: white; background: #ff3333;font-size: 11px;border-radius: 4px;border: 1px solid transparent; text-align: left; width: 261px">
    <b>N" TOTAL DEFECTO</b>
    </th>
</tr>
</table>

<table class="thb" style="margin-left: 619px; margin-top: -27px">

<tr>
    <td style="font-size: 11px; padding-top: 1px; width: 70px; height: 12px; background: white ; border-radius: 4px; text-align: center"><?php echo $total_rata_expo ?></td>
    
</tr>

</table>

















</div>

<!-- ===================================================================================================== -->

<?php }?>





</body>

</html>


