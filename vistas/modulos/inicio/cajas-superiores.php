<?php

$item = null;
$valor = null;
$orden = "id";

$fechaInicio = isset($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : date("Y-m-d");
$fechaFin = isset($_POST['fecha_fin']) ? $_POST['fecha_fin'] : date("Y-m-d");

// $ventas = ControladorVentas::ctrSumaTotalVentas();
$ventasp = new ControladorVentas();
$ventas  = $ventasp->ctrSumaTotalVentas($fechaInicio,$fechaFin);




// $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
// $clientes = new ControladorClientes();
// $clientes = $clientes->ctrMostrarClientes($item, $valor);

// $totalClientes = count($clientes);


  // TRAEMOS CANTIDAD LOS PRODUCTOS Y SERVICIOS  VENDIDOS 
    $ServiProVendidos = $ventasp->ctrMostrarServiProductosVendidos('facturacion_comprobante_cuerpo',$fechaInicio,$fechaFin);
  
    $totalGastos=  $ventasp->ctrMostrarCompras('compra',$fechaInicio,$fechaFin);

    $totalCategoriaVendida =  $ventasp->ctrMostrarCategoriaVendidas($fechaInicio,$fechaFin);
    
    // TOTAL_COMP
    // TOTAL_GASTO
?>

<!--=====================================
CAJAS SUPERIORES
======================================-->

<style type="text/css">
  .bg-white {
    background: white !important;
    color: #1d2340 !important;
  }

  .small-box-footer {
    background: rgba(250, 250, 250, 0.9) !important;
    color: #c3c3c3 !important;
  }

  h4>b {
    font-size: 35px !important;
  }

  .pastillabox {
    display: table;
    padding: 0px 10px;
    border-radius: 12px 12px 0px 12px;
    color: white;
  }
  .content-wrapper{
    background: #f3f3f3 !important; 
  }
</style>

<br>
<div class='col-lg-12'>    
    <form action="herlu-bi" method="post">
        <div class="row" >
            <div class="col-md-2">
                <label for="fechaInicio">Fecha Inicio</label>
                <input type="date" class="form-control" id="fechaInicio" name="fecha_inicio" value='<?php echo $fechaInicio; ?>'>
            </div>
            <div class="col-md-2">
                <label for="fechaFin">Fecha Fin</label>
                <input type="date" class="form-control" id="fechaFin" name="fecha_fin" value='<?php echo $fechaFin; ?>'>
            </div>
            <div class="col-md-2 align-self-end"><br>
                <button type="submit" class="btn btn-primary" id='btn_cargarr'>Cargar</button>
            </div>
        </div>
    </form>
</div>


<!-- <div class='col-lg-12'>    
<hr>
</div> -->

<!-- col -->
<div class="col-lg-3 ">
  <!-- small box --> 
  <div class="small-box bg-white">
    <!-- inner -->
    <div class="inner">
      <h4>Ventas: <br><br><b><?php echo $ventas["cantidad"] ?? 0; ?></b></h4>
      <p class="pastillaBox" style="background: #019cea;">Comprobantes de ventas</p>
    </div>
    <!-- inner -->
    <!-- icon -->
    <div class="icon" style="color: #333333">
      <img src="https://st2.depositphotos.com/5266903/9657/v/950/depositphotos_96579938-stock-illustration-look-client-circled-icon.jpg" style="width: 75px;border-radius: 200px">
    </div>
    <!-- icon -->
    <!-- <a href="clientes" class="small-box-footer" style="background: white;border-top: 1px solid #c3c3c3;color: #5d5b5b">Más Info <i class="fa fa-arrow-circle-right"></i></a> -->
  </div>
  <!-- small-box -->
</div>
<!-- col -->


<!-- col -->
<div class="col-lg-3 ">
  <!-- small box -->
  <div class="small-box bg-white">
    <!-- inner -->
    <div class="inner">
      <h4>Ventas Totales: </br><br><b>S/ <?php echo number_format($ventas["total"] ?? 0, 2); ?></b></h4>
      <p class="pastillaBox" style="background: #7fbc06;">Ingresos por Ventas</p>
    </div>
    <!-- inner -->
    <!-- icon -->
    <div class="icon" style="color: #333333;background: white;border-radius: 200px">
      <img src="https://cdn4.iconfinder.com/data/icons/business-charts-rounded/512/xxx066-512.png" style="width: 75px">
    </div>
    <!-- icon -->
    <!-- <a href="facturacion" class="small-box-footer" style="background: white;border-top: 1px solid #c3c3c3;color: #5d5b5b">Más Info <i class="fa fa-arrow-circle-right"></i></a> -->
  </div>
  <!-- small-box -->
</div>
<!-- col -->

<!--===========================================================================-->

<!-- col -->

<!--===========================================================================-->



<!--===========================================================================-->

<!-- col -->

<!--===========================================================================-->

<!-- col -->
<div class="col-lg-3 ">
  <!-- small box -->
  <div class="small-box bg-white">
    <!-- inner -->
    <div class="inner">
      <h4>Productos vendidos:<br> <b><?php echo number_format($ServiProVendidos[0]['count_productos'] ?? 0); ?></b> <span STYLE='font-size: 60px !important;'>/</span><span style='font-size: 15px !important'>Categorías</span> <?php echo number_format($totalCategoriaVendida[0]['catcatvendidas']); ?></h4>
      <p class="pastillaBox" style="background: #4caf50;"> Recaudo:  S/<?php echo number_format($ServiProVendidos[0]['sum_precing_productos'] ?? 0); ?>  
      </p>
    </div>
    <!-- inner -->
    <!-- icon -->
    <div class="icon" style="color: #333333">
      <img class='d-none' src="https://static.vecteezy.com/system/resources/previews/000/491/788/non_2x/find-product-icon-design-vector.jpg" style="width: 75px;border: 4px solid orange; border-radius: 150px;padding: 10px;background: white">
    </div>
    <!-- icon -->
    <!-- <a href="facturacion" class="small-box-footer" style="background: white;border-top: 1px solid #c3c3c3;color: #5d5b5b">Más Info <i class="fa fa-arrow-circle-right"></i></a> -->
  </div>
  <!-- small-box -->
</div>
<!-- col -->

<div class="col-lg-3 ">
  <!-- small box -->
  <div class="small-box bg-white">
    <!-- inner -->
    <div class="inner">
      <h4>Servicios vendidos:<br> <b><?php echo number_format($ServiProVendidos[0]['count_servicio'] ?? 0); ?></b><span STYLE='font-size: 60px !important;'>
      <!-- /</span style='font-size: 15px !important'>Categorías<span> 1 --><br>
      </h4>
      <p class="pastillaBox" style="background: #009688;"># Recaudo:  S/<?php echo number_format($ServiProVendidos[0]['sum_precing_servicio'] ?? 0); ?> </p>
    </div>
    <!-- inner -->
    <!-- icon -->
    <div class="icon" style="color: #333333">
      <img class='d-none'  src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROguidfCbnuKJ6pd83V1gxg4LqCqAalKaE5g&usqp=CAU" style="width: 75px;border: 4px solid #962219; border-radius: 150px;padding: 10px;background: white">
    </div>
    <!-- icon -->
    <!-- <a href="facturacion" class="small-box-footer" style="background: white;border-top: 1px solid #c3c3c3;color: #5d5b5b">Más Info <i class="fa fa-arrow-circle-right"></i></a> -->
  </div>
  <!-- small-box -->
</div> 


<div class="col-lg-2 d-none">
  <!-- small box -->
  <div class="small-box bg-white">
    <!-- inner -->
    <div class="inner" style='text-align: center !important;'><br><br>
      <h3 style='text-align: center !important;'><b>META DEL MES</b></h3><BR>
      <p  style="background: white; border: 2px solid black; color : black !important"> 100% </p>
    </div>
    <!-- inner -->
    <!-- icon -->
    <div class="icon" style="color: #333333">
      <img class='d-none' src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROguidfCbnuKJ6pd83V1gxg4LqCqAalKaE5g&usqp=CAU" style="width: 75px;border: 4px solid #962219; border-radius: 150px;padding: 10px;background: white">
    </div>
    <!-- icon -->
    <!-- <a href="facturacion" class="small-box-footer" style="background: white;border-top: 1px solid #c3c3c3;color: #5d5b5b">Más Info <i class="fa fa-arrow-circle-right"></i></a> -->
  </div>
  <!-- small-box -->
</div>



<!-- <div class="col-lg-7">
    <div class="small-box bg-white">
    <div class="inner">
      <h6><b>Ventas de los últimos 7 días</b></h6>
      GRAF
    </div>    
  </div>
</div>



<div class="col-lg-4">
  <div class="small-box bg-white">
    <div class="inner">
      <h4><b>Ventas de los últimos 7 días</b></h4>
      GRAF
    </div>    
  </div>
</div> -->
