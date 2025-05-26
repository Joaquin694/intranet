<?php
                  
                  $fechaInicio = isset($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : date("Y-m-d");
                  $fechaFin = isset($_POST['fecha_fin']) ? $_POST['fecha_fin'] : date("Y-m-d");
  
                  
                  $ventasp = new ControladorVentas();
                  $ventasOriginal   = $ventasp->ctrListaProSerMasVendidos($fechaInicio,$fechaFin,'SERVICIOS');
  
                  $colores = ['red', 'green', 'blue']; // Ejemplo de colores
                  $i = 0; // Inicializa el contador de colores
                  
            ?>
  
  <!--=====================================
  SERVICIOS MÁS VENDIDOS
  ======================================-->
  <div class="box box-primary">
      <div class="box-header with-border">
            <h3 class="box-title"><b>Servicios más vendidos</b></h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
        </div>
      
      <div class="box-footer no-padding">
        <ul class="nav nav-pills nav-stacked">
            <?php
                foreach ($ventasOriginal as $venta) {
                  // Asegúrate de que el índice del color exista en el array $colores
                  $color = $colores[$i % count($colores)]; // Esto rotará los colores si hay más elementos que colores
                  $total_cantidad_redondeado = round($venta["total_cantidad"]);
                  echo '<li>        
                            <a>
                               '.htmlspecialchars($venta["descripcion"]).' 
                               <span class="pull-right text-'.$color.'"> '.htmlspecialchars($total_cantidad_redondeado).'</span>
                            </a>
                        </li>';
              
                  $i++; // Incrementa el contador de colores
              }
            ?>
        </ul>
      </div>
  </div>
  
  