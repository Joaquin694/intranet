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

<!-- Código HTML para el gráfico -->

<div class="box box-solid bg-teal-gradient">
  <div class="box-header">
    <i class="fa fa-th"></i>
    <h3 class="box-title">Gráfico de Ventas</h3>
  </div>
  <div class="box-body border-radius-none nuevoGraficoVentas">
    <div class="chart" id="line-chart-ventas" style="height: 250px;"></div>
  </div>
</div>

<script>
  // Código JavaScript para el gráfico utilizando Morris.js

  new Morris.Line({
    element: 'line-chart-ventas',
    resize: true,
    data: [
      <?php
        foreach ($noRepetirFechas as $value) {
          echo "{ y: '".$value."', ventas: ".$sumaPagosMes[$value]." },";
        }
      ?>
    ],
    xkey: 'y',
    ykeys: ['ventas'],
    labels: ['Ventas'],
    lineColors: ['#efefef'],
    lineWidth: 2,
    hideHover: 'auto',
    gridTextColor: '#fff',
    gridStrokeWidth: 0.4,
    pointSize: 4,
    pointStrokeColors: ['#efefef'],
    gridLineColor: '#efefef',
    gridTextFamily: 'Open Sans',
    gridTextSize: 10,
    xLabels: "day", // Establecer el etiquetado del eje X a días
    xLabelFormat: function (d) {
      return (d.getDate() < 10 ? '0' : '') + d.getDate() + '/' + 
             ((d.getMonth() + 1) < 10 ? '0' : '') + (d.getMonth() + 1) + '/' + 
             d.getFullYear();
    },
    dateFormat: function (x) {
      return new Date(x).toLocaleDateString();
    }
  });
</script>
