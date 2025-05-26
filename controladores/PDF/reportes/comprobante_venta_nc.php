<!DOCTYPE html>
<html lang="es">
<head >
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta charset="utf-8">

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

  .rbg{background: #63a03c !important;color: white;border: 1px solid white;padding: 7px}
  .bord{border-right:  1px solid black;}
  .receptor2{border-left:  1px solid black !important;border-top:  1px solid black !important;border-bottom:   1px solid black !important;padding: 7px;text-align: left;}
  .receptor3{border-right:   1px solid black !important;padding: 7px;text-align: right;border-bottom:   1px solid black !important;border-top:  1px solid black !important;}
</style>
</head>
<body>
<br> <br>
 <?php
require_once "../modelos/facturador.modelo.php";
$pagoObj = new ModeloFacturaBpm();
$datCBFT = $pagoObj->viewNotaEletronica($_GET["id"]);
$boleta  = json_decode($datCBFT, true);

?>
 <!-- °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°° -->
<table class="thb">
  <tr>
    <th class="w64" style="justify-content: left; text-align: left;justify-content: center;">
          <div class="cajitaFactura" style="border: 1px solid white;width: 434px;">
                <img src="../vistas/img/plantilla/Logo_Moali_cafe_.png" alt="Smiley face" width="180" style="margin-left: 100px ">
                <p  style="font-size: 11px;color: #5e5e5e;margin: 2px;margin-left: 74.5px "><b>
                  EL LABORATORIO DE CAFE MOALI S.A.C.
                </b>
                </p>
                <p style="font-size: 10px;margin: 0px;color: #5e5e5e;margin-left: 87px ">
                    JR. POZUZO 353 40 MTS DE EX CINE LEON
                </p>
                <p style="font-size: 10px;margin: 0px;color: #5e5e5e;margin-left: 108.5px ">
                    VILLA RICA - OXAPAMPA - PASCO
                </p>
          </div>
    </th>
    <th class="W36">
      <div class="cajitaFactura">
        <h4  style="font-weight: 300">
          RUC: 20487040852</h4>
        <h4  style="color: black;font-size: 22px"><b>
          NOTA DE CRÉDITO<br>
          ELECTRÓNICA</b>
        </h4>
        <h4  style="font-weight: 300">
            Nro. <?php echo ($boleta[0]["serie"] === "B001" ? "EB01" : ($boleta[0]["serie"] === "F001" ? "E001" : $boleta[0]["serie"])) . "-" . $boleta[0]["correlativo"]; ?>
        </h4>
      </div>
    </th>
  </tr>
</table>
<!-- °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°° -->
<br><br><br><br><br><br><br>
 <!-- °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°° -->
<table class="thb"  >
  <tr >
      <th colspan="3" class="receptor" style="width: 649px">
          Sr(a). <?php echo strtoupper($boleta[0]["nombre_cliente"]); ?>
        <br>

      </th>
  </tr>

  <tr>
      <th class="receptor">


        <?php
if (strlen($boleta[0]["num_docu_identidad"]) == 8) {
    # code...
    echo "DNI: &nbsp;" . $numero_docu_ident = $boleta[0]["num_docu_identidad"];
} elseif (strlen($boleta[0]["num_docu_identidad"]) == 11) {
    # code...
    echo "RUC: &nbsp;" . $numero_docu_ident = $boleta[0]["num_docu_identidad"];
} else {
    echo $numero_docu_ident = "00000000";
}

?>
      </th>

      <th class="receptor">
        Tipo de Moneda: &nbsp;

        SOLES
      </th>
      <th class="receptor">
        Fecha y hora de emisión: &nbsp;

        <?php echo $boleta[0]["fecha_creacion"]; ?>
      </th>
  </tr>
  <tr>
      <th colspan="2" class="receptor" >
          Asistente de planta: <?php echo strtoupper($boleta[0]["cajera"]); ?>


      </th>
      <th colspan="1" class="receptor" >
          Comprobante que modifica: <?php echo $boleta[0]["nro_documento_modifica"]; ?>
      </th>
  </tr>
  <tr>
    <th class="receptor" colspan="2">Motivo: ANULACIÓN DE LA OPERACIÓN</th>
    <th class="receptor" >ANULACIÓN DE LA OPERACIÓN</th>
  </tr>
</table>

<br>
 <!-- °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°° -->
<!-- °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°° -->
<br>
 <!-- °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°° -->
<table class="thb ">
  <tr >
      <th class="receptor rbg " style="width: 50px">
        CÓDIGO
      </th>
     <th class="receptor rbg" style="width: 310px">
        DESCRIPCIÓN
      </th>
      <th class="receptor rbg " style="width: 20px">
        CANT.
      </th>
      <th class="receptor rbg" style="width: 50px;">
        VALOR UNITARIO
      </th>

      <th class="receptor rbg" style="width: 79px;">
        IMPORTE DE VENTA
      </th>

  </tr>
    <?php
for ($i = 0; $i < count($boleta); $i++) {
    ?>

                      <tr>
                          <th class="receptor " style="font-size:  10px">
                              <?php echo $boleta[$i]["pk_lote"] . "-" . $boleta[$i]["codigo"]; ?>
                          </th>
                         <th class="receptor " style="font-size:  12px;width: 310px">
                              <?php echo ucwords(strtolower($boleta[$i]["descripcion"])); ?>
                          </th>
                          <th class="receptor " style="font-size:  12px">
                              <?php
if ($boleta[$i]["codigo"] == 'SERVICIO' and $boleta[$i]["cantidad"] == '1.00') {
        # code...
        echo "1";
    } else {
        echo $boleta[$i]["cantidad"];
    }
    ?>
                          </th>
                          <th class="receptor" style="font-size:  12px;text-align: right;width: 50px;">
                              <?php echo $boleta[$i]["precio_venta_unitario"]; ?>
                          </th>
                          <th class="receptor " style="font-size:  12px;text-align: right;">
                              <?php echo $boleta[$i]["precio_venta_total"]; ?>
                          </th>
                      </tr>
     <?php
}
?>

</table>
<!-- °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°° -->


<table class="thb ">
  <tr >
      <th  class="bord W52">

      </th>
      <th class="receptor2 W33" style="padding-top: 7px">
            Descuentos Globales<br>
            Cargos Globales<br>
            Total Op. Exoneradas<br>
            Total Op. Gratuitas<br>
            Total Op. Gravadas<br>
            Total Op. Inafectas<br>
            I.S.C.<br>
            I.G.V.<br>
            ICBPER<br>
            Otros Cargos<br>
            Otros Descuentos<br>
            Otros Tributos<br>
            <b>IMPORTE TOTAL</b>
      </th>
      <th class="receptor3 W15">
            0.00<br>
            0.00<br>
            <?php echo $boleta[0]["total_exoneradas"]; ?><br>
            0.00<br>
            <?php echo $boleta[0]["total_gravadas"]; ?><br>
            0.00<br>
            0.00<br>
            <?php echo $boleta[0]["total_igv"]; ?><br>
            0.00<br>
            0.00<br>
            0.00<br>
            0.00<br>
            <b><?php echo $boleta[0]["total"]; ?></b>
      </th>
  </tr>
</table>












  <!-- <img src="https://api.qrserver.com/v1/create-qr-code?size=180x180&data=20154935267"> -->
<div style="position: absolute;bottom: 15px;width: 100%">
    <img src="../vistas/img/plantilla/QR.png" style="margin-bottom: 30px"><br>
    <div style="border-top: 1px solid #003178;">
    <p style="font-size: 11px;">&nbsp;Representacion impresa de NOTA DE CRÉDITO ELECTRÓNICA, autorizado mediante resolucion No.018-005-0002783/SUNAT.<br>&nbsp;El Adquirente o Usuario puede consultar su validez
en SUNAT Virtual: www.sunat.gob.pe, en Opciones sin Clave SOL
    </p>
    </div>
</div>
</body>
</html>




