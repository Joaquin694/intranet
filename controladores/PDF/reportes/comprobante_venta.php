<body>
  <br> <br>
  <?php
  require_once "../modelos/facturador.modelo.php";
  $pagoObj = new ModeloFacturaBpm();
  $datCBFT = $pagoObj->viewBoletaEletronica($_GET["id"]);
  $boleta  = json_decode($datCBFT, true);

  ?>
  <!-- °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°° -->

  <div style="height: 20px; width: 100%; overflow: hidden; margin-top:-30px">
    <div style="position: absolute; height: 100%; width: 60%; left: 0; top: 0; background: #FE9E23;"></div>
    <div style="position: absolute; height: 100%; width: 40%; right: 0; top: 0; background: #250126;"></div>
  </div>

  <!-- <table style="margin-top:15px; width:100%; height: 30%; border-collapse: collapse;"> -->

  <table style="margin-top:15px; width:100%; height: 100px">
    <tr style="width:100%; height: 70%;">
      <th style=" width: 60%; justify-content: center; align-items: center;">
        <div style="width: 400px; height: 100px; align-items: center; justify-content: center; padding:20px;">
          <img src="../vistas/img/cotizacion/L3.png" style="width: 90%; margin: 0;"><br>
         
          <div style="width: 100%; display: flex; justify-content: center; align-items: center; flex-direction: column; text-align: center; padding: 3px 20px;">
            <p style="color: #6b6b6b; font-size: 10px; font-weight: 900; margin: 0;">
                <b style="color: #6b6b6b; font-size: 11px; font-weight: 900;">INVERSIONES Y SERVICIOS HERMOZA LUZ S.R.L.</b>
            </p>
            <p style="color: #6b6b6b; font-size: 10px; font-weight: 100; margin: 0;padding: 0px 70px">
                PQ. DEL AGUSTINO CND. LOS EUCALIPTOS MZA. 31 DPTO. 502 EL AGUSTINO - LIMA - LIMA
            </p>
        </div>

         
        </div>
      </th>
      <th style="width:40%; text-align: left; justify-content: center; ">
        <div style="border: 1px solid #250126; width: 80%; text-align: center; margin-left: 30px">
          <h4 style="margin:5px; font-size: 15px;"> RUC: 20487040852 </h4>
          <h4 style="color: black; margin:0; padding:0; font-size: 20px;"><b>
              <?php
              if ($boleta[0]["serie"][0] == 'B') {
                echo "BOLETA DE VENTA";
              } elseif ($boleta[0]["serie"][0] == 'F') {
                echo "FACTURA DE VENTA";
              } elseif ($boleta[0]["serie"][0] == 'N') {
                echo "NOTA DE CRÉDITO";
              }
              ?>
              ELECTRÓNICA
            </b></h4>
          <h4 style="margin:5px; font-size: 15px;">
            Nro.<?php echo ($boleta[0]["serie"] === "B001" ? "EB01" : ($boleta[0]["serie"] === "F001" ? "E001" : $boleta[0]["serie"])) . "-" . $boleta[0]["correlativo"]; ?>
          </h4>
        </div>
      </th>
    </tr>
  </table>
  

  <table style="border-collapse: collapse; border: 1px solid #250126; margin: 0 auto; font-size: 11px; width: 700px; text-align: left; margin-left: 52px;">
    <tr style="border: 1px solid #250126; border-collapse: collapse; border-bottom: 1px solid white;">
        <td style="border: 1px solid #250126; border-collapse: collapse; padding: 5px; width: 50%; border-bottom: 1px solid white;">
            <div style="margin-bottom:5px;">Fecha y hora de emisión: &nbsp; <b><?php echo $boleta[0]["fecha_creacion"]; ?></b></div>
            <div style="margin-bottom:5px;">Señor(es): <b><?php echo strtoupper($boleta[0]["nombre_cliente"]); ?></b></div>
            <div style="margin-bottom:5px;">
                <?php
                if (strlen($boleta[0]["num_docu_identidad"]) == 8) {
                    echo "DNI: &nbsp;<b>" . $numero_docu_ident = $boleta[0]["num_docu_identidad"] . "</b>";
                } elseif (strlen($boleta[0]["num_docu_identidad"]) == 11) {
                    echo "RUC: &nbsp;<b>" . $numero_docu_ident = $boleta[0]["num_docu_identidad"] . "</b>";
                } else {
                    echo $numero_docu_ident = "<b>00000000</b>";
                }
                ?>
            </div>
            <div style="margin-bottom:5px;">
                <?php echo isset($boleta[0]["receptor"]) ? "Dirección del Receptor de la factura: <b>" . $boleta[0]["receptor"] . "</b>" : ""; ?>
            </div>
            <div style="margin-bottom:5px;">
                <?php echo isset($boleta[0]["cliente"]) ? "Dirección del Cliente : <b>" . $boleta[0]["cliente"] . "</b>" : ""; ?>
            </div>
            <div style="margin-bottom:5px;">
                <?php echo isset($boleta[0]["moneda"]) ? "Tipo de Moneda : <b>" . $boleta[0]["moneda"] . "</b>" : ""; ?>
            </div>
            <div style="margin-bottom:5px;">
                <?php echo isset($boleta[0]["observacion"]) ? "Observación : <b>" . $boleta[0]["observacion"] . "</b>" : ""; ?>
            </div>
        </td>
        <td style="border: 1px solid #250126; border-collapse: collapse; width: 50%; border-bottom: 1px solid white;padding: 20px">
            <div style="margin-bottom:5px; float: right;margin-left: 130px">
                <?php echo isset($boleta[0]["forma_pago"]) ? "Forma de pago: <b>" . $boleta[0]["forma_pago"] . "</b>" : ""; ?><br><br>
            </div>
            <?php
            for ($i = 1; $i <= 12; $i++) {
                $row_g = $boleta[0]["row_g_$i"] ?? '';
                $row_s = $boleta[0]["row_s_$i"] ?? '';
                $row_c = $boleta[0]["row_c_$i"] ?? '';
                if ($row_g !== '' || $row_s !== '' || $row_c !== '') {
                    echo $row_g . ": <b>" . $row_s . " " . $row_c . "</b><br>";
                }
            }
            ?>
        </td>
    </tr>
</table>

  <br>
  <br> 
  <table style="width: 85.6%; margin: 0 auto; border: 1px solid #250126; border-collapse: collapse; font-size: 12px; text-align: center;margin-left: 42px">

    <tr style="background: #250126">
      <td style="margin: 0px; color:#FFFFFF; width: 15%; text-align: left; padding: 5px 0px;">&nbsp;&nbsp;&nbsp;Código</td>
      <td style="margin: 0px; color:#FFFFFF; width: 45%; text-align: left; padding: 5px 0px;">Descripción</td>
      <td style="margin: 0px; color:#FFFFFF; width: 15%; text-align: center; padding: 5px 0px;">Cant.</td>
      <td style="margin: 0px; color:#FFFFFF; width: 15%; text-align: center; padding: 5px 0px;">P. Unitario</td>
      <td style="margin: 0px; color:#FFFFFF; width: 15%; text-align: center; padding: 5px 0px;">Valor</td>
    </tr>
    <?php
    for ($i = 0; $i < count($boleta); $i++) {
      $border_style = $i == count($boleta) - 1 ? '' : 'border-bottom: 1px solid #250126;';
    ?>
      <tr style="padding: 0px; margin: 0px;">
        <td style="font-size: 11px; margin: 0px; width: 14%; text-align: left; padding:6px 9px 5px 9px; <?php echo $border_style; ?>">
          <?php
          if ($boleta[$i]["codigo"] == 'SERVICIO') {
            echo "SERVICIO " . $boleta[$i]["pk_lote"]; 
          } else {
            echo $boleta[$i]["codigo"];
          }
          ?>
        </td>
        <td style="font-size: 11px; margin: 0px; width: 40%; text-align: left; padding:6px 9px 5px 9px; <?php echo $border_style; ?>">
          <?php echo ucwords(strtolower($boleta[$i]["descripcion"] . $boleta[$i]["tipo_molido"])); ?>
        </td>
        <td style="font-size: 11px; margin: 0px; width: 15%; text-align: center; padding:6px 9px 5px 9px; <?php echo $border_style; ?>">
          <?php
          if ($boleta[$i]["codigo"] == 'SERVICIO' and $boleta[$i]["cantidad"] == '1.00') {
            echo "1";
          } else {
            echo $boleta[$i]["cantidad"];
          }
          ?>
        </td>
        <td style="font-size: 11px; margin: 0px; width: 15%; text-align: right; padding:6px 9px 5px 9px; <?php echo $border_style; ?>">
          <?php echo $boleta[$i]["precio_venta_unitario"]; ?>
        </td>
        <td style="font-size: 11px; margin: 0px; width: 15%; text-align: right; padding:6px 9px 5px 9px; <?php echo $border_style; ?>">
          <?php echo $boleta[$i]["precio_venta_total"]; ?>
        </td>
      </tr>
    <?php
    }
    ?>
  </table>
  <br>
  <!-- °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°° --> 
  <div style="padding-left:49px">
    <?php
    echo "SON: ".$boleta[0]["total_letrado"];
    ?><br>
    Orden de Compra : <?php echo $boleta[0]["orden_compra"]; ?>
  </div>    
  <table style="width: 100%; border: 0; border-collapse: collapse; margin: 0; padding: 0; margin-top: 10px; margin-right: 25px; padding:-right: 25px">
  <tr style="width: 100%;">
    <th style="width: 30%;"></th>
    <th style="width: 20%;"></th>
    <th style="width: 50%; border: none; padding: 0;">
      <table style="background: #250126; width: 100%; border-collapse: collapse; margin: 0; padding: 0;margin-right: 100px">
        <tr>
          <td style="font-weight: 100;width: 5%; border: none; padding:2px  8px;"></td>
          <td style="font-weight: 100;width: 60%; border: none; color: white; text-align: left; padding:2px  8px;">Total Op. Gravadas</td>
          <td style="font-weight: 100;width: 30%; border: none; color: white; text-align: right; padding:2px  8px;">S/ <?php echo number_format($boleta[0]["total_gravada"], 2); ?></td>
          <td style="font-weight: 100;width: 5%; border: none; padding:2px  8px;"></td>
        </tr>
        <tr>
          <td style="font-weight: 100;width: 5%; border: none; padding:2px  8px;"></td>
          <td style="font-weight: 100;width: 60%; border: none; color: white; text-align: left; padding:2px  8px;">Anticipos</td>
          <td style="font-weight: 100;width: 30%; border: none; color: white; text-align: right; padding:2px  8px;">S/ 0.00</td>
          <td style="font-weight: 100;width: 5%; border: none; padding:2px  8px;"></td>
        </tr>
        <tr>
          <td style="font-weight: 100;width: 5%; border: none; padding:2px  8px;"></td>
          <td style="font-weight: 100;width: 60%; border: none; color: white; text-align: left; padding:2px  8px;">Total Op. Inafectas</td>
          <td style="font-weight: 100;width: 30%; border: none; color: white; text-align: right; padding:2px  8px;">S/ 0.00</td>
          <td style="font-weight: 100;width: 5%; border: none; padding:2px  8px;"></td>
        </tr>
        <tr>
          <td style="font-weight: 100;width: 5%; border: none; padding:2px  8px;"></td>
          <td style="font-weight: 100;width: 60%; border: none; color: white; text-align: left; padding:2px  8px;">I.S.C.</td>
          <td style="font-weight: 100;width: 30%; border: none; color: white; text-align: right; padding:2px  8px;">S/ 0.00</td>
          <td style="font-weight: 100;width: 5%; border: none; padding:2px  8px;"></td>
        </tr>
        <tr>
          <td style="font-weight: 100;width: 5%; border: none; padding:2px  8px;"></td>
          <td style="font-weight: 100;width: 60%; border: none; color: white; text-align: left; padding:2px  8px;">I.G.V.</td>
          <td style="font-weight: 100;width: 30%; border: none; color: white; text-align: right; padding:2px  8px;">S/ <?php echo number_format($boleta[0]["igv"], 2); ?></td>
          <td style="font-weight: 100;width: 5%; border: none; padding:2px  8px;"></td>
        </tr>
        <tr>
          <td style="font-weight: 100;width: 5%; border: none; padding:2px  8px;"></td>
          <td style="font-weight: 100;width: 60%; border: none; color: white; text-align: left; padding:2px  8px;">ICBPER</td>
          <td style="font-weight: 100;width: 30%; border: none; color: white; text-align: right; padding:2px  8px;">S/ 0.00</td>
          <td style="font-weight: 100;width: 5%; border: none; padding:2px  8px;"></td>
        </tr>
        <tr>
          <td style="font-weight: 100;width: 5%; border: none; padding:2px  8px;"></td>
          <td style="font-weight: 100;width: 60%; border: none; color: white; text-align: left; padding:2px  8px;">Otros Cargos</td>
          <td style="font-weight: 100;width: 30%; border: none; color: white; text-align: right; padding:2px  8px;">S/ 0.00</td>
          <td style="font-weight: 100;width: 5%; border: none; padding:2px  8px;"></td>
        </tr>
        <tr>
          <td style="font-weight: 100;width: 5%; border: none; padding:2px  8px;"></td>
          <td style="font-weight: 100;width: 60%; border: none; color: white; text-align: left; padding:2px  8px;">Otros Tributos</td>
          <td style="font-weight: 100;width: 30%; border: none; color: white; text-align: right; padding:2px  8px;">S/ 0.00</td>
          <td style="font-weight: 100;width: 5%; border: none; padding:2px  8px;"></td>
        </tr>
        <tr>
          <td style="font-weight: 100;width: 5%; border: none; padding:2px  8px;"></td>
          <td style="font-weight: 100;width: 60%; border: none; color: white; text-align: left; padding:2px  8px;">Monto de redondeo</td>
          <td style="font-weight: 100;width: 30%; border: none; color: white; text-align: right; padding:2px  8px;">S/ 0.00</td>
          <td style="font-weight: 100;width: 5%; border: none; padding:2px  8px;"></td>
        </tr>
        <tr style="background: #7d4700;">
          <th style="font-weight: 700;width: 5%; border: none; padding:2px  8px;"></th>
          <th style="font-weight: 700;width: 60%; border: none; color: white; text-align: left; padding:2px  8px;">IMPORTE TOTAL</th> 
          <th style="font-weight: 700;width: 30%; border: none; color: white; text-align: right; padding:2px  8px;">S/ <?php echo number_format($boleta[0]["total"], 2); ?></th>
          <th style="font-weight: 700;width: 5%; border: none; padding:2px  8px;"></th>
        </tr>
      </table>
    </th>
  </tr>
 </table>

<table style="width: 100%; border: 1px solid black; border-collapse: collapse;margin-left: 50px; margin-top: 10px">
    <tr>
        <td style="border: 1px solid black; text-align: left; padding: 10px;width: 90%;font-size: 10px">
            <b>Información de la detracción</b><hr style="height: 1px; border: none; background-color: #000; margin: 2px 0;">
              Leyenda:<?php echo $boleta[0]["leyenda"]; ?><hr style="height: 1px; border: none; background-color: #000; margin: 2px 0;">
              Bien o Servicio:<?php echo $boleta[0]["bien_servicio"]; ?><hr style="height: 1px; border: none; background-color: #000; margin: 2px 0;">
              <?php
                // Ejemplo de contenido original en $boleta[0]["medio_pago"]
                $boleta[0]["medio_pago"] = "Medio Pago:001 Depósito en cuenta
                Nro. Cta. Banco de
                la Nación: 00381091708 Porcentaje de detracción: 4.00 Monto detracción: S/321.00";

                // 1. Insertar un <br> justo antes de "Nro. Cta. Banco de la Nación:".
                // Se utiliza \s+ para cubrir los espacios y saltos de línea entre "Banco de" y "la Nación:".
                $pattern1 = '/(Nro\. Cta\. Banco de\s+la Nación:)/';
                $replacement1 = '<br><hr style="height: 1px; border: none; background-color: #000; margin: 2px 0;">$1';
                $texto_formateado = preg_replace($pattern1, $replacement1, $boleta[0]["medio_pago"]);

                // 2. Insertar 5 espacios antes de "Porcentaje de detracción:".
                $pattern2 = '/(Porcentaje de detracción:)/';
                $replacement2 = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $1';  // 5 espacios antes de la coincidencia
                $texto_formateado = preg_replace($pattern2, $replacement2, $texto_formateado);

                // 3. Insertar 5 espacios antes de "Monto detracción:".
                $pattern3 = '/(Monto detracción:)/';
                $replacement3 = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $1';  // 5 espacios antes de la coincidencia
                $texto_formateado = preg_replace($pattern3, $replacement3, $texto_formateado);

                // Mostrar el resultado final
                echo $texto_formateado;
                ?>


        </td>
    </tr>
</table>

<table style="width: 100%; border: 1px solid black; border-collapse: collapse;margin-left: 50px; margin-top: 5px">
    <tr>
        <td style="border: 1px solid black; text-align: left; padding: 10px;width: 90%;font-size: 10px">
            <b>Información del crédito :</b><br>
          
            <?php 
              $totatalitideduda=0;
              $totalCuotas=0;



            ?>
                Monto neto pendiente de pago : 
                <?php
                    // Inicializar la suma de cuotas en 0
                    $suma_cuotas = 0;

                    // Iterar dinámicamente sobre las cuotas
                    for ($i = 1; $i <= 9; $i++) {
                        $cuotaKey = "cuotas_" . $i; // Generar dinámicamente la clave (cuotas_1, cuotas_2, ..., cuotas_9)

                        // Verificar si existe la clave en $boleta[0], y si es numérica convertirla a float, de lo contrario usar 0
                        $cuotaValue = isset($boleta[0][$cuotaKey]) && is_numeric($boleta[0][$cuotaKey]) ? (float)$boleta[0][$cuotaKey] : 0;

                        // Sumar el valor a la suma total
                        $suma_cuotas += $cuotaValue;

                        // Imprimir el valor de la cuota (opcional)
                        // echo $cuotaValue;
                    }

                    // Calcular el total restante asegurando que el "total" también sea numérico
                    $total = isset($boleta[0]["total"]) && is_numeric($boleta[0]["total"]) ? (float)$boleta[0]["total"] : 0;
                    $total_restante = $total - $suma_cuotas;

                    // Mostrar el resultado formateado
                    echo "S/ " . number_format($suma_cuotas, 2);
                    ?>
                    <br>



                Total de Cuotas : <?php echo $boleta[0]["total_cuotas"]; ?>
                <hr>
               
                <?php
                  // Definir un array con las cuotas y sus respectivas fechas
                  $cuotas = [
                      ["monto" => $boleta[0]["cuotas_1"], "fecha" => $boleta[0]["fecha_1"]],
                      ["monto" => $boleta[0]["cuotas_2"], "fecha" => $boleta[0]["fecha_2"]],
                      ["monto" => $boleta[0]["cuotas_3"], "fecha" => $boleta[0]["fecha_3"]],
                      ["monto" => $boleta[0]["cuotas_4"], "fecha" => $boleta[0]["fecha_4"]],
                      ["monto" => $boleta[0]["cuotas_5"], "fecha" => $boleta[0]["fecha_5"]],
                      ["monto" => $boleta[0]["cuotas_6"], "fecha" => $boleta[0]["fecha_6"]],
                      ["monto" => $boleta[0]["cuotas_7"], "fecha" => $boleta[0]["fecha_7"]],
                      ["monto" => $boleta[0]["cuotas_8"], "fecha" => $boleta[0]["fecha_8"]],
                      ["monto" => $boleta[0]["cuotas_9"], "fecha" => $boleta[0]["fecha_9"]]
                  ];

                  // Iniciar la tabla
                  echo "<table style='border-collapse: collapse; width: 100%; text-align: left;'>";
                  // Encabezados para tres grupos (tres columnas)
                  echo "<tr style='background-color: #f3f3f3;'>";
                  echo "<th style='border: 1px solid #c3c3c3; padding: 5px;'>N° Cuota</th>";
                  echo "<th style='border: 1px solid #c3c3c3; padding: 5px;'>Fec. Venc. &nbsp;&nbsp;&nbsp;</th>";
                  echo "<th style='border: 1px solid #c3c3c3; padding: 5px;'>Monto&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";

                  echo "<th style='border: 1px solid #c3c3c3; padding: 5px;'>N° Cuota</th>";
                  echo "<th style='border: 1px solid #c3c3c3; padding: 5px;'>Fec. Venc. &nbsp;&nbsp;&nbsp;</th>";
                  echo "<th style='border: 1px solid #c3c3c3; padding: 5px;'>Monto&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";

                  echo "<th style='border: 1px solid #c3c3c3; padding: 5px;'>N° Cuota</th>";
                  echo "<th style='border: 1px solid #c3c3c3; padding: 5px;'>Fec. Venc. &nbsp;&nbsp;&nbsp;</th>";
                  echo "<th style='border: 1px solid #c3c3c3; padding: 5px;'>Monto&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
                  echo "</tr>";

                  // Iterar sobre las cuotas en grupos de tres
                  for ($i = 0; $i < count($cuotas); $i += 3) {
                      echo "<tr>";

                      // Generar las celdas para cada cuota en este grupo
                      for ($j = 0; $j < 3; $j++) {
                          $index = $i + $j;

                          if (isset($cuotas[$index]) && !empty($cuotas[$index]["monto"]) && !empty($cuotas[$index]["fecha"])) {
                              $numero = $index + 1;
                              $fecha = $cuotas[$index]["fecha"];
                              $monto = number_format($cuotas[$index]["monto"], 2);

                              echo "<td style='border: 1px solid #c3c3c3; padding: 5px;'>$numero</td>";
                              echo "<td style='border: 1px solid #c3c3c3; padding: 5px;'>$fecha</td>";
                              echo "<td style='border: 1px solid #c3c3c3; padding: 5px;'>S/ $monto</td>";
                          } else {
                              // Celda vacía si no hay cuota en este índice
                              echo "<td style='border: 1px solid #c3c3c3; padding: 5px;'></td>";
                              echo "<td style='border: 1px solid #c3c3c3; padding: 5px;'></td>";
                              echo "<td style='border: 1px solid #c3c3c3; padding: 5px;'></td>";
                          }
                      }

                      echo "</tr>";
                  }

                  echo "</table>";
                  ?>

        </td>
    </tr>
</table>


<!-- <img src="https://api.qrserver.com/v1/create-qr-code?size=180x180&data=20154935267"> -->
  <!-- <div style="position: absolute;bottom: 15px;width: 100%;">
    <img src="../vistas/img/plantilla/QR.png" style="margin-bottom: 30px; margin-left: 30px;"><br>
    <div style="border-top: 1px solid #003178;">
      <p style="font-size: 11px; padding-left:30px; ">
        &nbsp;Representacion impresa de <?php
                                        if ($boleta[0]["serie"][0] == 'B') {
                                          # code...
                                          echo "BOLETA DE VENTA";
                                        } elseif ($boleta[0]["serie"][0] == 'F') {
                                          # code...
                                          echo "FACTURA DE VENTA";
                                        } elseif ($boleta[0]["serie"][0] == 'N') {
                                          # code...
                                          echo "NOTA DE CRÉDITO";
                                        }
                                        ?> ELECTRÓNICA, autorizado mediante resolucion No.018-005-0002783/SUNAT.<br>&nbsp;El Adquirente o Usuario puede consultar su validez
        en SUNAT Virtual: www.sunat.gob.pe, en Opciones sin Clave SOL
      </p>
    </div>
  </div> -->
</body>

</html>