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

$codfi = $_GET['id'];

$stmt = Conexion::conectar()->query("SELECT * FROM  analisis_sensorial_de_productos_terminados t0
INNER JOIN `bpm` t1 ON t0.fk_bpm=t1.pk_bpm
WHERE t0.fk_bpm='".$codfi."'");

$stmt->execute();

$resp = $stmt->fetch();

$idfechaentrega = $resp["created_at"];

$idfechaentrega = '<img src="../vistas/img/plantilla/calendar_002.webp" alt="Smiley face" width="19"> ' . substr($idfechaentrega, 0, -9) . '&nbsp;&nbsp;&nbsp;<img src="../vistas/img/plantilla/reloj.png" alt="Smiley face" width="15"> ' . substr($idfechaentrega, -8);
$url_img_para_basededatos = "../" . $resp["url_img_para_basededatos"];

?>


<!-- OTRA PÁGINA -->

<div class="hero-image">


  <table>

      <tr>

          <th style="width: 100%;justify-content: right;text-align: left;"><img  src="../vistas/img/plantilla/fatter.png" alt="Smiley face" style="width: 100%"></th>

      </tr>

  </table>

  <br>

  <table class="thb">

    <tr>

        <th style="font-size: 11px;border: 1px solid white;padding-top: -0.5px" class="tbody nnp w20" colspan="1"><b>•&nbsp;PRODUCTOR/CLIENTE:</b> </th>

        <th style="font-size: 11px;border: 1px solid white;padding-top: -0.5px" class="tbody nnp w50" colspan="2"><?php echo $resp["nombre_cliente"]; ?></th>

        <th style="font-size: 11px;border: 1px solid white;padding-top: -0.5px" class="tbody nnp W10" colspan="1"><b>•&nbsp;ALTITUD:</b> </th>

        <th style="font-size: 11px;border: 1px solid white;padding-top: -0.5px" class="tbody nnp W20" colspan="2"><?php echo $resp["variedad"]; ?></th>

    </tr>

    <tr>

        <th style="font-size: 11px;border: 1px solid white;padding-top: -0.5px" class="tbody nnp w20" colspan="1"><b>•&nbsp;ORIGEN:</b> </th>

        <th style="font-size: 11px;border: 1px solid white;padding-top: -0.5px; " class="tbody nnp w50" colspan="2"><?php echo substr(mb_convert_case($resp["lugar_procedencia"], MB_CASE_UPPER, "UTF-8"), 0, 51); ?></th>

        <th style="font-size: 11px;border: 1px solid white;padding-top: -0.5px" class="tbody nnp W10" colspan="1"><b>•&nbsp;HUMEDAD:</b></th>

        <th style="font-size: 11px;border: 1px solid white;padding-top: -0.5px" class="tbody nnp W20" colspan="2"><?php echo $resp["humedad"]; ?></th>

    </tr>

    <tr>

        <th style="font-size: 11px;border: 1px solid white;padding-top: -0.5px" class="tbody nnp w20" colspan="1"><b>•&nbsp;FECHA DE ANALISIS:</b> </th>

        <th style="font-size: 11px;border: 1px solid white;padding-top: -3px" class="tbody nnp w50" colspan="2"><?php echo $idfechaentrega; ?></th>

        <th style="font-size: 11px;border: 1px solid white;padding-top: -0.5px" class="tbody nnp W10" colspan="1"><b>•&nbsp;VARIEDAD:</b></th>

        <th style="font-size: 11px;border: 1px solid white;padding-top: -0.5px" class="tbody nnp W20" colspan="2"><?php echo ucfirst(strtolower($resp["variedad"])); ?></th>

    </tr>

    <tr>

        <th class="tbody nnp " colspan="6" style="font-size: 11px;border: 1px solid white;padding-top: -16px;text-align: right;"> <hr style="color: #c3c3c3;height: 4px;background: #c3c3c3 "></th>

    </tr>

    

  </table>
 
  <table>

    <tr>

      <th class="w35" >

        <table class="thb">

          <tr>

            <th class="w50" colspan="3" style="font-weight: 400;padding-top: 9px;padding-bottom:  9px">ANALISIS SENSORIAL</th>

          </tr>

          <tr>

            <th class="w20" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent"><img  src="../vistas/img/anlisis/nose.png" alt="Smiley face" width="25"></th>

            <th class="w60" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent;padding-top: 5px"> Fragancia/Aroma </th>

            <th class="w20" style="font-weight: 100;border-left: 1px solid transparent;padding-top: 5px"><?php echo $resp["fragancia_aroma"]; ?></th>

          </tr>

          <tr>

            <th class="w20" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent"><img  src="../vistas/img/anlisis/sssabor.png" alt="Smiley face" width="25"></th>

            <th class="w60" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent;padding-top: 5px"> Sabor </th>

            <th class="w20" style="font-weight: 100;border-left: 1px solid transparent;padding-top: 5px"><?php echo $resp["sabor"]; ?></th>

          </tr>

          <tr>

            <th class="w20" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent"><img  src="../vistas/img/anlisis/SABOR.png" alt="Smiley face" width="25"></th>

            <th class="w60" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent;padding-top: 5px"> Sabor de boca </th>

            <th class="w20" style="font-weight: 100;border-left: 1px solid transparent;padding-top: 5px"><?php echo $resp["sabor_residual"]; ?></th>

          </tr>

          <tr>

            <th class="w20" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent"><img  src="../vistas/img/anlisis/Naranja.png" alt="Smiley face" width="25"></th>

            <th class="w60" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent;padding-top: 5px"> Acidez</th>

            <th class="w20" style="font-weight: 100;border-left: 1px solid transparent;padding-top: 5px"><?php echo $resp["acidez"]; ?></th>

          </tr>

          <tr>

            <th class="w20" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent"><img  src="../vistas/img/anlisis/cuerpo.png" alt="Smiley face" width="25"></th>

            <th class="w60" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent;padding-top: 5px"> Cuerpo </th>

            <th class="w20" style="font-weight: 100;border-left: 1px solid transparent;padding-top: 5px"><?php echo $resp["cuerpo"]; ?></th>

          </tr>

          <tr>

            <th class="w20" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent"><img  src="../vistas/img/anlisis/dulzor.png" alt="Smiley face" width="25"></th>

            <th class="w60" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent;padding-top: 5px"> Dulzura </th>

            <th class="w20" style="font-weight: 100;border-left: 1px solid transparent;padding-top: 5px"><?php echo $resp["dulzura"]; ?></th>

          </tr>

          <tr>

            <th class="w20" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent"><img  src="../vistas/img/anlisis/balance.png" alt="Smiley face" width="25"></th>

            <th class="w60" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent;padding-top: 5px"> Balance </th>

            <th class="w20" style="font-weight: 100;border-left: 1px solid transparent;padding-top: 5px"><?php echo $resp["balance"]; ?></th>

          </tr>

          <tr>

            <th class="w20" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent"><img  src="../vistas/img/anlisis/taza_limpia.png" alt="Smiley face" width="25"></th>

            <th class="w60" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent;padding-top: 5px"> Taza a perfil </th>

            <th class="w20" style="font-weight: 100;border-left: 1px solid transparent;padding-top: 5px"><?php echo $resp["taza_a_perfil"]; ?></th>

          </tr>

          <tr>

            <th class="w100" colspan="3" style="border-left: 1px solid transparent;border-right: 1px solid transparent;padding-top: 15px">&nbsp;</th>

          </tr>
          
          <!---->

          <tr>
            <th class="w20" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent; padding-top: 9px;padding-bottom:  9px;"><img  src="../vistas/img/plantilla/razata.png" alt="Smiley face" width="25" ></th>
            <th class="w50" colspan="3" style="font-weight: 400;padding-top: 9px;padding-bottom:  9px;">DEFECTOS</th>
          </tr>

          <tr>

            <th class="w60" colspan="2" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent;padding-top: 5px"> Subdesarrollo </th>

            <th class="w20" style="font-weight: 100;border-left: 1px solid transparent;padding-top: 5px"><?php echo $resp["subdesarrollo"]; ?></th>

          </tr>

          <tr>

            <th class="w60" colspan="2" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent;padding-top: 5px"> Sobredesarrollo </th>

            <th class="w20" style="font-weight: 100;border-left: 1px solid transparent;padding-top: 5px"><?php echo $resp["sobre_desarrollo"]; ?></th>

          </tr>

          <tr>

            <th class="w60" colspan="2" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent;padding-top: 5px"> Horneado </th>

            <th class="w20" style="font-weight: 100;border-left: 1px solid transparent;padding-top: 5px"><?php echo $resp["horneado"]; ?></th>

          </tr>

          <tr>

            <th class="w60" colspan="2" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent;padding-top: 5px"> Quemado </th>

            <th class="w20" style="font-weight: 100;border-left: 1px solid transparent;padding-top: 5px"><?php echo $resp["quemado"]; ?></th>

          </tr>

          <tr>

            <th class="w60" colspan="2" style="font-weight: 100;font-size: 12px;border-right: 1px solid transparent;padding-top: 5px"><strong> TOTAL </strong></th>

            <th class="w20" style="font-weight: 100;border-left: 1px solid transparent;padding-top: 5px"><?php echo $resp["defectos"]; ?></th>

          </tr>

          <tr style="border: 1px solid transparent">

            <th class="w100" colspan="3" style="border-left: 1px solid transparent;border-right: 1px solid transparent;padding-top: 40px;border: 1px solid transparent">&nbsp;</th>

          </tr>

          <tr>

            <th class=" w100" colspan="3"  style="padding: 5px;font-weight: 900;color: white; background: #c60820;font-size: 15px;border-radius: 10px;border: 1px solid transparent">

              <b> PUNTAJE TOTAL = <?php echo $resp["puntaje_final"] ?></b>

            </th>

          </tr>

          <tr>

            <th class="w100" colspan="3" style="border-left: 1px solid transparent;border: 1px solid transparent;padding-top: 100px">&nbsp;</th>

          </tr>

        </table>
      </th>

      <th class="w65" >

        <table class="thb">

          <tr>

            <th class="w100" colspan="3" style="font-weight: 4350;padding-bottom:  10px;">

                <img  src="<?php echo $url_img_para_basededatos; ?>"  width="454" height="354">

            </th>

          </tr>

          <tr>

              <th class="w100" colspan="3" style="border-left: 1px solid transparent;border-right: 1px solid transparent;padding: 0px">&nbsp;</th>

          </tr>



          <tr>

            <th class=" w100" colspan="3"  style="padding-top: 13px;font-weight: 900;font-size: 11.5px;padding-bottom: 13px">

              <b>Defectos de torrefacción NOTAS:</b>

            </th>

          </tr>

          <tr>

            <th class=" w100" colspan="3"  style="padding-top: 0px;font-weight: 900;font-size: 13px;text-align: center;">

              <?php
                //echo "<br>";
                //echo ucfirst(strtolower(substr_replace(substr($resp["defectos_notas"], 0, -1))));
                echo mb_convert_case($resp["defectos_notas"], MB_CASE_TITLE, "UTF-8");
                
                // $interptrer=ucfirst(strtolower(substr_replace(substr($resp["defectos_notas"], 0, -1), " <br>", strrpos(substr($resp["defectos_notas"], 0, -1), ","), 2))) ; 

                // $interptrer_sn=str_replace('Ñ', 'ñ', $interptrer);

                // $interptrer_sdc=str_replace(',,', ', ', $interptrer_sn);

                // echo $interptrer_sdc;



              ?>

            </th>

          </tr>

          <tr>

              <th class="w100" colspan="3" style="border: 1px solid transparent;padding-top: 5px">&nbsp;</th>

          </tr>

          <tr>
            <th class=" w100" colspan="3"  style="padding-top: 2px;font-weight: 900;border: 1px solid transparent">
              <img  src="../vistas/img/plantilla/firmal.png" alt="Smiley face" style="width: 160px;height: 90px">
            </th>
          </tr>

        </table>

      </th>

    </tr>

    <tr>

      <th colspan="2" style="color: #89bd48;font-size: 10px;padding-top: 0px">

        <img  src="../vistas/img/plantilla/end__bolofon69.png" alt="Smiley face" style="width: 100%; height: 140px;" >

      </th>

    </tr>

  </table>

</div>

<!-- ===================================================================================================== -->



</body>

</html>









