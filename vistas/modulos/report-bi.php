<style>
  .nav-link{padding: 4px 15px !important;
    border-radius: 6px 50px 0px 0px !important;
    
    }

    /* Estilos generales para el contenedor */
.box-header.with-border {
  background-color: #f8f8f8; /* Fondo claro */
  border: 1px solid #e7e7e7; /* Borde sutil */
  padding: 15px; /* Espaciado interno */
  display: flex; /* Flexbox para alinear elementos */
  align-items: center; /* Centrar verticalmente */
  justify-content: space-between; /* Espaciado entre elementos */
}

/* Estilo para el campo de búsqueda */
.searchInput {
  padding: 8px 15px;
  border: 1px solid #ddd;
  border-radius: 4px;
  font-size: 16px;
  width: 55%; /* Aumenta el ancho */
}

.searchInput:focus {
  outline: none;
  border-color: #0056b3;
}

/* Estilo para el área del total */
.box-header.with-border > div {
  font-size: 18px; /* Tamaño de letra para el total */
  color: #333; /* Color de texto oscuro */
}

/* Estilo para el valor del total */
#totalValue {
  font-weight: bold; /* Negrita para el número total */
  margin-left: 5px; /* Espaciado a la izquierda del número */
  color: #0056b3; /* Color destacado para el total */
}

</style>
<!--=====================================
PÁGINA DE INICIO
======================================-->

<!-- content-wrapper -->
<div class="content-wrapper">
  
  <!-- content-header -->
  <section class="content-header">
    <h1>
      Tablero
      <small>Panel de Control</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Tablero</li>
    </ol>
  </section>
  <!-- content-header -->

  <!-- content -->
  <section class="content">

    <!-- row -->
    <div class="row">
      <?php
        include "inicio/cajas-superiores.php";      
      ?>
    </div>
    <!-- row -->

    <!-- row -->
    <div class="row">
      <div class="col-lg-12">
        <!-- Contenedor de las pestaas -->
          
                <!-- Men de Navegacin tipo Pldoras -->
                <ul class="nav nav-pills">
                  <li class="active"><a style='padding: 4px !important ' data-toggle="pill" href="#tab1">Gráfico ventas lineal</a></li>
                  <li><a style='padding: 4px !important ' data-toggle="pill" href="#tab2">Gráfico ventas en barras</a></li>
                </ul>
                
                <!-- Contenido de las Pestaas -->
                <div class="tab-content">
                  <div id="tab1" class="tab-pane fade in active">
                        <?php
                          include "inicio/grafico-ventas.php";        
                        ?>
                  </div>
                  <div id="tab2" class="tab-pane fade">
                        <?php
                          include "inicio/grafico-dos-ventas.php";        
                        ?>
                  </div>
                </div>
          
      </div>
  
      <div class="col-lg-6">
        <!-- Contenedor de las pestaas -->
          
                <!-- Men de Navegacin tipo Pldoras -->
                <ul class="nav nav-pills">
                  <li class="active"><a style='padding: 4px !important ' data-toggle="pill" href="#tab3">Gráfico</a></li>
                  <li><a style='padding: 4px !important ' data-toggle="pill" href="#tab4">Detallado</a></li>
                </ul>
                
                <!-- Contenido de las Pestaas -->
                <div class="tab-content">
                  <div id="tab3" class="tab-pane fade in active">
                        <?php
                          include "inicio/productos-recientes-graf.php";        
                        ?>
                  </div>
                  <div id="tab4" class="tab-pane fade">
                      <div class="box-header with-border">
                          <input type="text" class="searchInput " id='searchInput1' placeholder="Buscar...">
                          <div>Total Productos: <span class="totalValue">0</span></div>
                      </div>
                       <?php
                          include "inicio/productos-recientes.php";        
                        ?>
                  </div>
                </div>
      </div>

  
      <div class="col-lg-6">
                <!-- Contenedor de las pestaas -->
          
                <!-- Men de Navegacin tipo Pldoras -->
                <ul class="nav nav-pills">
                  <li class="active"><a style='padding: 4px !important ' data-toggle="pill" href="#tab3W">Gráfico</a></li>
                  <li><a style='padding: 4px !important ' data-toggle="pill" href="#tab4W">Detallado</a></li>
                </ul>
                
                <!-- Contenido de las Pestaas -->
                <div class="tab-content">
                  <div id="tab3W" class="tab-pane fade in active">
                        <?php
                          include "inicio/productos-recientes-graf2.php";        
                        ?>
                  </div>
                  <div id="tab4W" class="tab-pane fade">
                        <div class="box-header with-border">
                          <input type="text" class="searchInput " id='searchInput2' placeholder="Buscar...">
                          <div>Total Productos: <span class="totalValue">0</span></div>
                        </div>

                        <?php
                            // EN REALIDAD MUESTRA SERVICIOS MÁS VENDIDOS
                          include "inicio/productos-mas-vendidos.php";         
                        ?>
                  </div>
                </div>
       
      </div>
    
    </div>
    <!-- row -->

  </section>
  <!-- content -->

</div>
<!-- content-wrapper -->

<script>
function calculateAndDisplayTotal(tabPanel, searchTerm = '') {
  const items = tabPanel.querySelectorAll('li');
  let total = 0;

  items.forEach(item => {
    if (item.textContent.toLowerCase().includes(searchTerm)) {
      item.style.display = '';
      const value = parseInt(item.querySelector('span.pull-right').textContent.trim(), 10);
      total += isNaN(value) ? 0 : value;
    } else {
      item.style.display = searchTerm ? 'none' : '';
    }
  });

  tabPanel.querySelector('.totalValue').textContent = total;
}

// Evento de entrada para los campos de búsqueda
document.querySelectorAll('.searchInput').forEach(input => {
  input.addEventListener('input', function(e) {
    const searchTerm = e.target.value.toLowerCase();
    const tabPanel = e.target.closest('.tab-pane');
    calculateAndDisplayTotal(tabPanel, searchTerm);
  });
});

// Calcular y mostrar el total inicial al cargar la página para cada tab-pane específico
document.addEventListener('DOMContentLoaded', function() {
  const tabPanels = ['.tab-content #tab4', '.tab-content #tab4W']; // Añade aquí los selectores de tus tab-pane

  tabPanels.forEach(selector => {
    const tabPanel = document.querySelector(selector);
    if(tabPanel) {
      calculateAndDisplayTotal(tabPanel);
    }
  });
});

</script>