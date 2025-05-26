<script type="text/javascript" src="https://www.amcharts.com/lib/3/amcharts.js"></script>
		<script type="text/javascript" src="https://cdn.amcharts.com/lib/3/pie.js"></script>
<?php
                  
                  $fechaInicio = isset($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : date("Y-m-d");
                  $fechaFin = isset($_POST['fecha_fin']) ? $_POST['fecha_fin'] : date("Y-m-d");
  
                  
                  $ventasp = new ControladorVentas();
                  $ventasOriginal   = $ventasp->ctrListaProSerMasVendidos($fechaInicio,$fechaFin,'PRODUCTOS');
  
                  $colores = ['red', 'green', 'blue']; // Ejemplo de colores
                  $i = 0; // Inicializa el contador de colores

                  $datosParaGrafico = [];

                  $contadorOO = 0;
                  foreach ($ventasOriginal as $venta) {
                      if ($contadorOO < 5) {
                          $datosParaGrafico[] = [
                              "category" =>  $venta["codigo"].' - '.$venta["descripcion"],
                              "column-1" => $venta["total_venta"]
                          ];
                          $contadorOO++; // Incrementa el contador en cada iteración
                      } else {
                          break; // Rompe el bucle si ya se han añadido 5 elementos
                      }
                  }

                    // Convertir el array de PHP a JSON para usarlo en JavaScript
                    $jsonParaGrafico = json_encode($datosParaGrafico);
                
            ?>

  <!--=====================================
  SERVICIOS MÁS VENDIDOS
  ======================================-->
  <div class="box box-primary">
      <div class="box-header with-border">
            <h3 class="box-title"><b>5 Productos más vendidos</b></h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
        </div>
      
      <div class="box-footer no-padding">
          <div id="reswereTY" style="width: 100%; height: 400px; background-color: #FFFFFF;" ></div>

        
      </div>
  </div>
 

    <script type="text/javascript">
  AmCharts.makeChart("reswereTY",
  {
      "type": "pie",
      "theme": "light",
      "angle": 12,
      "depth3D": 15,
      "innerRadius": "40%",
      "balloon": {
        "enabled": false // Deshabilita los globos de información (balloons)
      },
      "labelsEnabled": false, // Deshabilita las etiquetas de texto
      "pullOutRadius": 0, // Elimina el efecto de separación de segmentos
      "startRadius": "0%",
      "titleField": "category",
      "valueField": "column-1",
      "allLabels": [],
      "titles": [],
      "dataProvider": <?php echo $jsonParaGrafico; ?>	,
      "colors": [ // Define tu paleta de colores pastel aquí
        "#d8f0f2", 
        "#ffe2e6", 
        "#d6ebfc", 
        "#fff4de", 
        "#FFCFC2",
        // Añade más colores según la cantidad de segmentos que tengas
      ],
      "legend": {
        "enabled": true,
        "align": "center",
        "markerType": "circle",
        "labelText": "[[title]]", // Muestra solo el título en la leyenda
        "valueText": "" // No muestra el valor en la leyenda
      }
    }
  );
</script>
