<?php
  // Se desactiva el reporte de errores
  error_reporting(0);

  
$fechaInicio = isset($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : date("Y-m-d");
$fechaFin = isset($_POST['fecha_fin']) ? $_POST['fecha_fin'] : date("Y-m-d");

// $ventas = ControladorVentas::ctrSumaTotalVentas();
$ventasp = new ControladorVentas();
$ventasOriginal  = $ventasp->ctrTotalVentasGrafico($fechaInicio,$fechaFin);

  // Valores estáticos de ejemplo para las ventas, organizados por días
  // Nuevo array con la estructura deseada.
  $ventas = [];

  // Recorremos el array original y reestructuramos los datos.
  foreach ($ventasOriginal as $venta) {
      $ventas[] = ["fecha" => $venta["fecha_venta"], "total" => $venta["total_por_dia"]];
  }


  $arrayFechas = array();
  $sumaPagosMes = array();

  foreach ($ventas as $key => $value) {
    // Capturamos sólo la fecha (año, mes y día)
    $fecha = substr($value["fecha"], 0, 10);

    // Capturamos las fechas en un array
    array_push($arrayFechas, $fecha);

    // Sumamos los pagos que ocurrieron el mismo día
    if (!isset($sumaPagosMes[$fecha])) {
      $sumaPagosMes[$fecha] = 0;
    }
    $sumaPagosMes[$fecha] += $value["total"];
  }

  // Evitamos repetir fecha
  $noRepetirFechas = array_unique($arrayFechas);

  
?>
<!DOCTYPE html>
<html>
<head>
  <!-- Carga las librerías de amCharts -->
  <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
  <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
  <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
</head>
<body>

<!-- Contenedor para el gráfico -->
<div id="chartdiv" style="width: 100%; height: 500px;"></div>

<script>
  // Activa el tema animado
  am4core.useTheme(am4themes_animated);

  // Crea la instancia del gráfico
  var chart = am4core.create("chartdiv", am4charts.XYChart);

  // Añade los datos
  chart.data =  [
  <?php
    $items = []; // Array para guardar los elementos
    foreach ($noRepetirFechas as $value) {
      $items[] = '{"date": "'.$value.'", "ventas": '.$sumaPagosMes[$value].'}';
    }
    echo implode(", ", $items); // Unir los elementos con coma
  ?>
];

  // Crea el eje X
  var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
  categoryAxis.dataFields.category = "date";
  categoryAxis.renderer.grid.template.location = 0;
  categoryAxis.renderer.minGridDistance = 20;

  // Crea el eje Y
  var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

  // Crea las series
  var series = chart.series.push(new am4charts.ColumnSeries());
  series.dataFields.valueY = "ventas";
  series.dataFields.categoryX = "date";
  series.name = "Ventas";
  series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
  series.columns.template.fillOpacity = .8;

  var columnTemplate = series.columns.template;
  columnTemplate.strokeWidth = 2;
  columnTemplate.strokeOpacity = 1;

  // Inicia el gráfico
  chart.cursor = new am4charts.XYCursor();
  chart.cursor.lineX.disabled = true;
  chart.cursor.lineY.disabled = true;
</script>

</body>
</html>
