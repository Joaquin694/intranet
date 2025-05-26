

<!-- =============================================== -->

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Reporte de ventas
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Reporte de ventas</li>
    </ol>
  </section>

  <section class="content">

    <div class="box">
      
      <div class="box-header with-border">
          
          <div class="input-group">
                
                <button type="button" class="btn btn-default pull-right" id="daterange-btn2">
                  <span>
                    <i class="fa fa-calendar"></i> Rango de fecha
                  </span>
                  <i class="fa fa-caret-down"></i>
                </button>
              
          </div>

        <div class="box-tools pull-right">

        <?php

          echo '<a href="vistas/modulos/imprimir-reporte.php?reporte=reporte&fechaInicial='.$_GET["fechaInicial"].'&fechaFinal='.$_GET["fechaFinal"].'">

          <button class="btn btn-success" style="margin-top:5px">Descargar reporte en Excel</button>

          </a>';

        ?>
         
        </div>

      </div>

      <div class="box-body">

        <div class="row">

          <div class="col-lg-12">
          
            <?php

            include "reportes/grafico-ventas.php";

            ?>

          </div>

          <div class="col-lg-6">
            
            <?php

            include "reportes/productos-mas-vendidos.php";

            ?>  

          </div>

          <div class="col-lg-6">
          
           <?php

            include "reportes/vendedores.php";

            ?>  

          </div>

          <div class="col-lg-6">

            <?php

            include "reportes/compradores.php";

            ?>           
            
          </div>

        </div>

      </div>
     
    </div>

  </section>

</div>


