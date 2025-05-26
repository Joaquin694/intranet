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

  .W49{width: 49%} .W29{width: 29%} .W27{width: 27%} .W30{width: 30%} .W35{width: 35%} .W40{width: 40%} .W80{width: 80%;} .w60{width: 60%;} .w65{width: 65%;}

  .w55{width: 55%}

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





  .hero-image {

      /* background-image: url(../vistas/img/plantilla/dibujitos2__.png); */

      background-position: center;

      background-repeat: no-repeat;

      background-size: cover;

      position: relative;

  }

*,body{
    font-size: 10px;
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





<!-- ===================================================================================================== -->



<?php



if (($tipo_anal === "Análisis Sensorial") or ($tipo_anal === "Análisis Sensorial y Físico")) {



    ?>

    <!-- OTRA PÁGINA -->

    <div class="hero-image">



     <!-- <table >

        <tr>

            <th style="width: 100%;justify-content: right;text-align: left;"><img  src="../vistas/img/plantilla/fatter_newoo.png" alt="Smiley face" style="width: 100%; height: 81px;margin-top: -32px"></th>

        </tr>

    </table> -->

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

         <th class="tbody nnp " colspan="6" style="font-size: 12px;border: 1px solid white;padding-top: -10px;text-align: right;"><b> <?php echo $letra_tipo_codelabo . $idcodrbpm1; ?><hr style="color: #c3c3c3;height: 4px;background: #c3c3c3 "></b></th>

      </tr>

     

    </table>







<table style='margin-top: -12px'>

  <tr>

    <th class="w35" >

        <table class="thb">

          <tr>

            <th class="w50" colspan="3" style="font-weight: 400;padding-top: 4px;padding-bottom:  4px; font-weight: bold;">ANALISIS SENSORIAL</th>

        </tr>

        <tr>

            <th class="w20" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent"><img  src="../vistas/img/anlisis/people.PNG" alt="Smiley face" width="25"></th>

            <th class="w60" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent;padding-top: 5px"> Número de catadores </th>

            <th class="w20" style="font-weight: 100;border-left: 1px solid transparent;padding-top: 5px;"><?php echo $samplenumero; ?></th>

        </tr>

        <tr>

            <th class="w20" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent"><img  src="../vistas/img/anlisis/nose.png" alt="Smiley face" width="25"></th>

            <th class="w60" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent;padding-top: 5px"> Fragancia/Aroma </th>

            <th class="w20" style="font-weight: 100;border-left: 1px solid transparent;padding-top: 5px"><?php echo $fragrance; ?></th>

        </tr>

        <tr>

            <th class="w20" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent"><img  src="../vistas/img/anlisis/sssabor.png" alt="Smiley face" width="25"></th>

            <th class="w60" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent;padding-top: 5px"> Sabor </th>

            <th class="w20" style="font-weight: 100;border-left: 1px solid transparent;padding-top: 5px"><?php echo $flavor; ?></th>

        </tr>

        <tr>

            <th class="w20" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent"><img  src="../vistas/img/anlisis/Naranja.png" alt="Smiley face" width="25"></th>

            <th class="w60" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent;padding-top: 5px"> Acido</th>

            <th class="w20" style="font-weight: 100;border-left: 1px solid transparent;padding-top: 5px"><?php echo $acidity; ?></th>

        </tr>

        <tr>

            <th class="w20" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent"><img  src="../vistas/img/anlisis/dulzor.png" alt="Smiley face" width="25"></th>

            <th class="w60" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent;padding-top: 5px"> Dulzura </th>

            <th class="w20" style="font-weight: 100;border-left: 1px solid transparent;padding-top: 5px"><?php echo $sweetness; ?></th>

        </tr>

        <tr>

            <th class="w20" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent"><img  src="../vistas/img/anlisis/cuerpo.png" alt="Smiley face" width="25"></th>

            <th class="w60" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent;padding-top: 5px"> Cuerpo </th>

            <th class="w20" style="font-weight: 100;border-left: 1px solid transparent;padding-top: 5px"><?php echo $body; ?></th>

        </tr>

        <tr>

            <th class="w20" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent"><img  src="../vistas/img/anlisis/taza_limpia.png" alt="Smiley face" width="25"></th>

            <th class="w60" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent;padding-top: 5px"> Taza limpia </th>

            <th class="w20" style="font-weight: 100;border-left: 1px solid transparent;padding-top: 5px"><?php echo $clean; ?></th>

        </tr>



        <tr>

            <th class="w20" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent"><img  src="../vistas/img/anlisis/general.png" alt="Smiley face" width="25"></th>

            <th class="w60" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent;padding-top: 5px"> Puntaje general </th>

            <th class="w20" style="font-weight: 100;border-left: 1px solid transparent;padding-top: 5px"><?php echo $overall; ?></th>

        </tr>

        <tr>

            <th class="w20" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent"><img  src="../vistas/img/anlisis/SABOR.png" alt="Smiley face" width="25"></th>

            <th class="w60" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent;padding-top: 5px"> Sabor de boca </th>

            <th class="w20" style="font-weight: 100;border-left: 1px solid transparent;padding-top: 5px"><?php echo $aftertaste; ?></th>

        </tr>

        <tr>

            <th class="w20" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent"><img  src="../vistas/img/anlisis/balance.png" alt="Smiley face" width="25"></th>

            <th class="w60" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent;padding-top: 5px"> Balance </th>

            <th class="w20" style="font-weight: 100;border-left: 1px solid transparent;padding-top: 5px"><?php echo $balance; ?></th>

        </tr>

        <tr>

            <th class="w20" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent"><img  src="../vistas/img/anlisis/uniformidad.png" alt="Smiley face" width="25"></th>

            <th class="w60" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent;padding-top: 5px"> Uniformidad </th>

            <th class="w20" style="font-weight: 100;border-left: 1px solid transparent;padding-top: 5px"><?php echo $uniformity; ?></th>

        </tr>



        <tr>

            <th class="w100" colspan="3" style="border-left: 1px solid transparent;border-right: 1px solid transparent;padding-top: 15px">&nbsp;</th>

        </tr>



        <tr>

            <th class=" w20"  style="font-weight: 100;padding-top: 5px;font-size: 9px;border: 1px solid transparent;border-left: 1px solid #c3c3c3">

                &nbsp;DEFECTO

            </th>

            <th class=" w60"  style="font-weight: 100;padding-top: 5px;font-size: 9px;border: 1px solid transparent;">

                Nº TAZAS&nbsp;&nbsp;&nbsp;INTENSIDAD

            </th>

            <th class=" w20"  style="font-weight: 100;padding-top: 5px;font-size: 9px;border: 1px solid transparent;border-right: 1px solid #c3c3c3">

                TOTAL

            </th>

        </tr>

        <tr>

            <th class=" w20"  style="padding-top: 3px;font-size: 9px;border: 1px solid transparent;border-left: 1px solid #c3c3c3;border-bottom:  1px solid #c3c3c3;padding-bottom: 3px">

                <img  src="../vistas/img/plantilla/razata.png" alt="Smiley face" width="25" >

            </th>

            <th class="w60"  style="padding-top: 8px;font-size: 10px;border: 1px solid transparent;border-bottom:  1px solid #c3c3c3">

             <?php echo $unoextra . "&nbsp;&nbsp;&nbsp;X&nbsp;&nbsp;&nbsp;" . $dosextra; ?>

         </th>

         <th class="tbody nnp w20"  style="font-weight: 100;padding-top: 8px;font-size: 10px;border: 1px solid transparent;border-right: 1px solid #c3c3c3;border-bottom:  1px solid #c3c3c3">

            <?php echo " = " . $tresextra ?>

        </th>

    </tr>

    <tr style="border: 1px solid transparent">

        <th class="w100" colspan="3" style="border-left: 1px solid transparent;border-right: 1px solid transparent;padding-top: 40px;border: 1px solid transparent">&nbsp;</th>

    </tr>

    <tr>

        <th class=" w100" colspan="3"  style="padding: 5px;font-weight: 900;color: white; background: #c60820;font-size: 15px;border-radius: 10px;border: 1px solid transparent">

        <b> PUNTAJE TOTAL = <?php echo $finalscore; ?></b>

     </th>

 </tr>

  <tr>

        <th class="w100" colspan="3" style="border-left: 1px solid transparent;border: 1px solid transparent;padding-top: 100px">&nbsp;</th>

    </tr>
    <tr>
        <th class="w100" colspan="3" style="border: 1px solid transparent">
            
            <img  src="../vistas/img/plantilla/firmal.png" alt="Smiley face" style="width: 150px;height: 90px">
        </th>
    </tr>
</table>





</th>

<th class="w65" >

    <table class="thb">

          <tr>

            <th class="w100" colspan="3" style="font-weight: 4350;padding-bottom:  3px;">

                <img  src="<?php echo $url_img_para_basededatos; ?>"  width="454">

            </th>

        </tr>

        <!-- <tr>

            <th class="w100" colspan="3" style="border-left: 1px solid transparent;border-right: 1px solid transparent;padding: 0px">&nbsp;</th>

        </tr> -->



        <tr >

        <th class=" w100" colspan="3"  style="padding-top: 4px;font-weight: 900;font-size: 11.5px;padding-bottom: 4px;border-bottom: 1px solid transparent">

       	 <b>INTERPRETACION DE LOS RESULTADOS  OBTENIDOS </b>

        </th>

      </tr>

         <tr>

     <th class=" w100" colspan="3"  style="padding-top: 0px;font-weight: 900;font-size: 13px;text-align: left;padding: 5px">

                <?php



                //   $interptrer=ucfirst(strtolower(substr_replace(substr($notes, 0, -1), " <br>", strrpos(substr($notes, 0, -1), ","), 2))) ; 

                $interptrer=ucfirst(strtolower(substr_replace(substr($notes, 0, -1), " ", strrpos(substr($notes, 0, -1), ","), 2))) ; 

                  $interptrer_sn=str_replace('Ñ', 'ñ', $interptrer);

                  $interptrer_sdc=str_replace(',,', ', ', $interptrer_sn);

                  echo $interptrer_sdc;



                 ?>

     </th>

    </tr>

     <tr>

        <th class="w100" colspan="3" style="border: 1px solid transparent;padding-top: 2px">&nbsp;</th>

    </tr>

    <!-- <tr>

        <th class=" w100" colspan="3"  style="padding-top: 2px;font-weight: 900;border: 1px solid transparent">

            

            <img  src="../vistas/img/plantilla/firmal.png" alt="Smiley face" style="width: 200px;height: 130px">

            
     </th>

 </tr> -->


 <tr>

<th class=" w100" colspan="3"  style="padding-top: -2px;font-weight: 900;border: 1px solid transparent">

    <img src="../vistas/img/sabores/<?php echo $idcodrbpm1; ?>RuletaSabor.png" alt="Solvetic" style="width:95%;">
</th>

</tr>



    </table>

</th>

</tr>



</table>



</div>

<page_footer style='padding: 0px; ' >
    <table style=" width: 100%">     
        <tr>

            <th colspan="2" style="color: #89bd48;font-size: 10px;padding-top: 0px">
    
                 <img  src="../vistas/img/plantilla/eSnd__bolofon69.png" alt="Smiley face" style="width: 100%; height: 85px" >

            </th>

        </tr>              
    </table> 
</page_footer>

<!-- ===================================================================================================== -->

<?php }?>





</body>

</html>









