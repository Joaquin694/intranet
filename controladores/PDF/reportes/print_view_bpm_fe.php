<!DOCTYPE html>
<html lang="es">
<head >
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta charset="utf-8">

  <link rel="shortcut icon" type="image/png" href="https://moali.app/vistas/img/plantilla/icono-negro.png"/>
<style>
  table, td, th {
    text-align: center;
    justify-content: center;
    padding: 3px ;
    font-weight: 300;

  }
  .thb td{
    text-align: left;
    justify-content: left;
    padding-left: 4px;

  }
  .thb th ,.thb td{

    padding: 2px ;
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
  .W5{width: 5%;} .W10{width: 10%;} .W20{width: 20%;}  .w25{width: 25%;} .w75{width: 75%;} .w100{width: 100%;} .w50{width: 50%;} .W45{width: 45%;} .W48{width: 48%;} .W60{width: 60%;} .w40{width: 40%;}
  .w64{width: 64%;} .W36{width: 36%;} .W34{width: 34%;} .W30{width: 30%;} .W35{width: 35%;} .W2{width: 2%} .W33{width: 33%;} .W70{width: 70%;} .W55{width: 55%} .W15{width: 15%;}
  .W37{width: 37%;} .W11{width: 10%;} .W11{width: 11%;} .w42{width: 42%;} .w46{width: 46%;} .W65{width: 65%} .W52{width: 52%;}  .W44{width: 43.2%}
  {width: 14%;}

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

  hr{
    border: 1px solid #c3c3c3;
  }
  h4{
    margin: 3px;
  }

  .cajitaFactura{border: 1px solid black;position: absolute;width: 240px;margin-top: 60px}
  .receptor{border: 1px solid black !important;padding: 7px;text-align: left;}
  .receptorjanc{border: 0px !important;padding: 5px;text-align: left;}

  .rbg{background: #63a03c !important;color: white;border: 1px solid white;padding: 7px}
  .bord{border-right:  1px solid black;}
  .receptor2{border-left:  1px solid black !important;border-top:  1px solid black !important;border-bottom:   1px solid black !important;padding: 7px;text-align: left;}
  .receptor3{border-right:   1px solid black !important;padding: 7px;text-align: right;border-bottom:   1px solid black !important;border-top:  1px solid black !important;}



  .hero-image {

background-image: url(../vistas/img/plantilla/dibujitos2__.png);

background-position: center;

background-repeat: no-repeat;

background-size: cover;

position: relative;
height: 99%;

}


</style>
</head>
<body style="padding-bottom: 70px;">

 <?php
require_once "../modelos/fichaentrega.modelo.php";
$pagoObj = new ModeloFichaBpm();
$datCBFT = $pagoObj->viewFichaEntrega($_GET["id"]);
$fichae  = json_decode($datCBFT, true);

if(count($fichae)>0){
$fichacont=$fichae[0]["fcontable"];
$fichacorre=$fichae[0]["correlativo"];
$fichaclient=$fichae[0]["cliente"];
$fichadirec=$fichae[0]["direccion"];
}else{
  require_once "../modelos/fichaentrega.modelo.php";
  $pagoObj = new ModeloFichaBpm();
  $datCBFT = $pagoObj->viewFichaEntregaCabezera($_GET["cid"]);
  $fichacabez  = json_decode($datCBFT, true);
  $fichacont=$fichacabez[0]["fecha_atencion"];
  $fichacorre=$fichacabez[0]["correlativo"];
  $fichaclient=$fichacabez[0]["nomcliente"];
  $fichadirec=$fichacabez[0]["direccion"];
}

?>
  <!-- °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°° -->
  <div class="hero-image">

<table>

    <tr>

        <th style="width: 100%;justify-content: right;text-align: left;"><img  src="../vistas/img/plantilla/fatter.png" alt="Smiley face" style="width: 100%"></th>

    </tr>
<?php

$explodeCod = explode("-", $fichacont);

?>
</table>

<br>
<!-- ===================================================================================================== -->
<div class="subtitle"><b>FICHA DE ENTREGA N°: F<?php echo $fichacorre ."-".$explodeCod[2].$explodeCod[1].$explodeCod[0]; ?></b></div><br>
<div style='margin-bottom: 10px'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;<B>Documento origen:</B> <?php echo $fichae[0]["serie"].'-'.$fichae[0]["correlativo"]; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>BPM:</b> <?php echo $fichae[0]["documento_origen_de_comprobante"]; ?></div>
<!-- ===================================================================================================== -->

<table >
  <tr>
    <th class="receptorjanc" style="width: 20%"><b>Nombre del cliente:</b></th>
    <th class="receptorjanc"  style="width: 80%"><?php echo $fichaclient; ?></th>
    
  </tr>
  <tr>
    
    <th class="receptorjanc" ><b>Dirección:</b></th>
    <th class="receptorjanc" style="width: 80%"><?php echo $fichadirec; ?></th>
  </tr>
  <tr>

<th class="receptorjanc" colspan="2" style="font-size: 11px;border: 1px solid white;padding-top: 0px;text-align: right; "> <hr style="color: #c3c3c3;height: 4px;background: #c3c3c3 "></th>

</tr>
</table>

<!-- °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°° -->

 <!-- °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°° -->

<table class="thb ">
<tr >
      <th class="" style="width: 10%; background-color: white; text-align: center; text-color: black" colspan="4">
        <b>PRODUCTOS</b><br><br>
      </th>
     
  </tr>
 
  <tr >
      <th class="receptor rbg " style="width: 2%">
        #
      </th>
     <th class="receptor rbg" style="width: 8%">
        CANT
      </th>
      <th class="receptor rbg " style="width: 60%">
        DESCRIPCIÓN
      </th>
      <th class="receptor rbg" style="width: 15%">
        T.PROCESO 1
      </th>
      <th class="receptor rbg" style="width: 15%">
        TIPO DE TOSTADO
      </th>
     
  </tr>
    <?php
   
for ($i = 0; $i < count($fichae); $i++) {
//  for ($i = 0; $i < 12; $i++) {
    ?>

                      <tr>
                          <th class="receptor" style="font-size:  11.4px;width: 2%">
                              <?php echo $descripcion; echo $i+1;?>
                              
                          </th>
                         
                          <th class="receptor" style="font-size:  11.4px;width: 8%">
                              <?php
if ($fichae[$i]["codigo"] == 'SERVICIO' and $fichae[$i]["cantidad"] == '1.00') {
        # code...
        echo "1";
    } else {
        echo $fichae[$i]["cantidad"];
    }
    ?>
                          </th>
                          <th class="receptor" style="font-size:  11.4px;width: 60%">
                              <?php echo ucwords(strtolower($fichae[$i]["nombre"]))." ".ucwords(strtolower($fichae[$i]["pcapacidadp"])); ?>
                              
                          </th>

                          <th class="receptor" style="font-size:  11.4px;width: 15%">
                              <?php echo $fichae[$i]["Tproceso1"]; ?>
                              
                          </th>
                          <th class="receptor" style="font-size:  11.4px;width: 15%">
                              <?php echo $fichae[$i]["Tproceso2"]; ?>
                              
                          </th>
                         
                         
                      </tr>
     <?php
}
?>

</table>
<!-- °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°° -->
<!-- °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°° -->
<!-- °°°°°°°°°°°°°°°°°TABLA SERVICIOS°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°° -->
<br><br>
 <!-- °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°° -->
 <?php
require_once "../modelos/fichaentrega.modelo.php";
$pagoObj = new ModeloFichaBpm();
$datCBFT = $pagoObj->viewFichaEntregaService($_GET["id"]);
$fichaes  = json_decode($datCBFT, true);

?>



<table class="thb ">
<tr >
      <th class="" style="width: 10%; background-color: white; text-align: center; text-color: black" colspan="4">
        <b>SERVICIOS</b><br><br>
      </th>
     
  </tr>

  <tr >
      <th class="receptor rbg " style="width: 10%">
        #
      </th>
     <th class="receptor rbg" style="width: 10%">
        CANT
      </th>
      <th class="receptor rbg " style="width: 80%">
        DESCRIPCIÓN
      </th>
      

  </tr>
    <?php
   
for ($i = 0; $i < count($fichaes); $i++) {
    ?>

                      <tr>
                          <th class="receptor " style="font-size:  11.4px;width: 10%">
                              <?php echo $i+1;?>
                              
                          </th>
                         
                          <th class="receptor " style="font-size:  11.4px;width: 10%">
                              <?php
if ($fichaes[$i]["codigo"] == 'SERVICIO' and $fichaes[$i]["cantidad"] == '1.00') {
        # code...
        echo "1";
    } else {
        echo $fichaes[$i]["cantidad"];
    }
    ?>
                          </th>
                          <th class="receptor " style="font-size:  11.4px;width: 80%;">
                              <?php echo ucwords(strtolower($fichaes[$i]["servicio"])); ?>
                              
                          </th>

                      </tr>
     <?php
}
?>

</table>


<!-- =========FIRMA============================================================================== -->
<br><br><br><br><br><br><br><br><br><br>

</div>




<div style="position: absolute;bottom: 1px;width: 100%">
  <table class="thb">
<!--  <tr>
    <td>
      _______________________________<br>
      Ejecutor asistente de planta<br>
      Carg. Nombre Apellido Apellido
    </td>
  </tr>
-->
  <tr>

      <th colspan="4" style="color: #89bd48;font-size: 10px;padding-top: 5px">

        <img  src="../vistas/img/plantilla/end__bolofon69.png" alt="Smiley face" style="width: 100%; height: 140px" >

      </th>

    </tr>
</table>

</div>


</body>
</html>