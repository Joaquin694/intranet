<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<style>
  .modal-dialog-wide {
    width: 70%;
    /* Doble del ancho por defecto */
    max-width: none;
    /* Para asegurarse de que pueda crecer hasta el 200% */
  }

  .select2-container .select2-selection--single .select2-selection__rendered {
    white-space: normal !important;
    word-wrap: break-word !important;
  }

  .estado-cuadro {
    display: inline-block;
    padding: 2px 5px;
    color: white;
    border-radius: 4px;
    font-size: 0.8em;
  }

  .estado-anulada {
    background-color: red;
  }

  .estado-atendida {
    background-color: green;
  }

  .estado-pendiente {
    background-color: orange;
  }

  .img-thumbnail-custom {
    height: 50px;
    width: 50px;
    object-fit: cover;
  }

  .table-container {
    overflow-y: auto;
  }

  .close {
    float: right !important;
    font-size: 25px !important;
    font-weight: 700 !important;
    line-height: 1 !important;
    color: #fff !important;
    /* text-shadow: 0 1px 0 #fff !important; */
    filter: alpha(opacity=20) !important;
    opacity: 9 !important;
  }

  .estado-pendiente {
    background-color: #ff6961 !important;
  }

  .estado-finalizado {
    background-color: #77dd77 !important;
  }

  .estado-registrado {
    background-color: yellow !important;
  }
</style>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Gestión mantenimiento
      <small>Gestión y programación de mantenimientos</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Gestión mantenimiento</li>
    </ol>
  </section>
  <?php
  require_once "modelos/plan-mantenimiento.modelo.php";
  require_once "controladores/plan-mantenimiento.controlador.php";

  $ControladorPlanMantennimiento = new ControladorPlanMantenimiento();

  ?>

  <section class="content">
    <!-- Botón para agregar nuevo plan de mantenimiento -->
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPlanMantenimiento">
              <i class="fa fa-plus-square"></i> Agregar Plan
            </button>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-container">
              <table id="tablaPlanesMantenimiento" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Activo Fijo</th>
                    <th>Tipo de Programación</th>
                    <th>Fecha de Inicio</th>
                    <th>Intervalo Kilometraje</th>
                    <th>Intervalo por Hora</th>
                    <th>Responsable</th>
                    <th>Tipo de registro</th>
                    <th>Ubicación</th>
                    <th>Número de Serie</th>
                    <th>Prioridad</th>
                    <th>Duración Estimada</th>
                    <th>Costo de Repuestos</th>
                    <th>Tipo de Moneda</th>
                    <th>Comentarios</th>
                    <th>Documentos</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Los registros se insertarán aquí mediante JavaScript -->
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
</div>

<!-- Modal para agregar/editar plan de mantenimiento -->
<div id="modalAgregarPlanMantenimiento" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 99%;">
    <!-- Modal content-->
    <div class="modal-content container-fluid">
      <form class='row' role="form" id="formPlanMantenimiento" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Gestión mantenimiento</h4>
        </div>
        <div class="modal-body ">
          <div class="col-lg-6 form-group">
            <label for="activoFijo">Activo Fijo:</label>
            <span class="text-danger">*</span>

            <?php $activosFijos = ControladorPlanMantenimiento::ctrMostrar('activo_fijo'); ?>

            <select class="form-control select2" id="activoFijo" name="activoFijo" style="width: 100%;" required>
              <option value="">Seleccionar Activo Fijo</option>
              <?php
              foreach ($activosFijos as $activo) {
                echo '<option value="' . $activo['id'] . '" serie_motor="' . $activo['serie_motor'] . '">' . $activo['descripcion'] . ' --- ' . $activo['placa'] . '</option>';
              }
              ?>
            </select>
          </div>

          <div class="col-lg-6 form-group">
            <div class="col-lg-6 form-group">
              <label for="fechaInicio">Fecha de Inicio:</label>
              <span class="text-danger">*</span>
              <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" required>
            </div>
            <div class="col-lg-6 form-group">
              <label for="tipoProgramacion">Tipo de Programación:</label>
              <span class="text-danger">*</span>
              <select class="form-control" id="tipoProgramacion" name="tipoProgramacion" required>
                <option value="">Seleccione un tipo</option>
                <option value="una vez">Única Vez</option>
                <option value="mensual">Mensual</option>
                <option value="bimestral">Bimestral</option>
                <option value="trimestral">Trimestral</option>
                <option value="semestral">Semestral</option>
                <option value="anual">Anual</option>
                <option value="horas">Cada X Horas</option>
                <option value="kilometraje">Cada X Kilómetros</option>
              </select>
            </div>
            <div class="col-lg-6 form-group">
              <label for="inter_ini">Intervalo de Inicio</label>
              <input type="number" class="form-control" id="inter_ini" name="inter_ini">
            </div>
          </div>

          <div class="col-lg-6 form-group">
            <label>Cronograma de Mantenimiento:</label>
            <div id="cronogramaContainer" style="height: 400px; overflow-y: auto;">
              <table id="cronogramaTable" class="table table-striped">
                <thead>
                  <tr>
                    <th>CRONOGRAMA</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- El contenido se llenará dinámicamente -->
                </tbody>
              </table>
            </div>
          </div>


          <div class="col-lg-6 form-group">
            <div class="col-lg-6 form-group" id="intervaloHorase" style="display: none;">
              <label for="intervaloHoras">Intervalo horas:</label>
              <input type="number" class="form-control" id="intervaloHoras" name="intervaloHoras" placeholder="Intervalo en horas">
            </div>

            <div class="col-lg-6 form-group" id="intervaloKilometrajee" style="display: none;">
              <label for="intervaloKilometraje">Intervalo Kilometraje:</label>
              <input type="number" class="form-control" id="intervaloKilometraje" name="intervaloKilometraje" placeholder="Intervalo en kilómetros">
            </div>

            <div class="col-lg-6 form-group">
              <label for="responsableMantenimiento">Trabajador Responsable:</label>
              <span class="text-danger">*</span>
              <?php $usuarios = ControladorPlanMantenimiento::_ctrMostrarColaborador('proveedores'); ?>

              <select class="form-control select2" id="responsableMantenimiento" name="responsableMantenimiento" style="width: 100%;" required>
                <option value="">Seleccionar Trabajador</option>
                <?php
                if (is_array($usuarios) && !empty($usuarios)) {
                  foreach ($usuarios as $user) {
                    echo '<option value="' . $user['proveedor_pk'] . '">' . $user['razon_social'] . '</option>';
                  }
                } else {
                  echo '<option value="">No hay trabajadores disponibles</option>';
                }
                ?>
              </select>
            </div>
            <div class="col-lg-6 form-group">
              <label for="documentosMantenimiento">Documentos de Mantenimiento:</label>
              <input type="file" class="form-control-file" id="documentosMantenimiento" name="documentosMantenimiento" accept=".pdf" multiple>
              <small class="form-text text-muted">Adjuntar cualquier documento relacionado con el mantenimiento.</small>
            </div>

            <div class="col-lg-6 form-group">
              <label for="ubicacionActivo">Ubicación del Activo:</label>
              <span class="text-danger">*</span>
              <input type="text" class="form-control" id="ubicacionActivo" name="ubicacionActivo" required>
            </div>

            <div class="col-lg-6 form-group">
              <label for="numeroSerie">Número de Serie:</label>
              <span class="text-danger">*</span>
              <input type="text" class="form-control" id="numeroSerie" name="numeroSerie" required>
            </div>
            <div class="col-lg-6 form-group">
              <label for="prioridadMantenimiento">Prioridad:</label>
              <span class="text-danger">*</span>
              <select class="form-control" id="prioridadMantenimiento" name="prioridadMantenimiento" required>
                <option value="Alta">Alta</option>
                <option value="Media">Media</option>
                <option value="Baja">Baja</option>
              </select>
            </div>

            <div class="col-lg-6 form-group">
              <label for="duracionEstimada">Duración Estimada (horas):</label>
              <input type="number" class="form-control" id="duracionEstimada" name="duracionEstimada">
            </div>

            <div class="col-lg-6 form-group">
              <!-- <div class="col-lg-6 form-group"> -->
              <label for="costoRepuestos">Costo estimado de Repuestos:</label>
              <input type="number" class="form-control" id="costoRepuestos" name="costoRepuestos" step="0.01">
              <!-- </div> -->
            </div>
            <div class="col-lg-6 form-group">
              <div class="col-lg-6 form-group">
                <label for="valo_cambio">Valor de Cambio:</label>
                <input type="number" class="form-control" id="valo_cambio" name="valo_cambio" step="0.01">
              </div>
              <div class="col-lg-6 form-group">
                <label for="tipo_moneda">Tipo de moneda:</label>
                <select name="tipo_moneda" id="tipo_moneda" class="form-control">
                  <option value="soles">Soles</option>
                  <option value="dolares">Dolares</option>
                </select>
              </div>
            </div>
            <div class="col-lg-6 form-group">
              <label for="empresaMantenimiento">Tipo de Registro:</label>
              <span class="text-danger">*</span>
              <select class="form-control select2" id="empresaMantenimiento" name="empresaMantenimiento" style="width: 100%;" required>
                <option value="Inspecciones obligatorias">Inspecciones obligatorias</option>
                <option value="Mantenimiento">Mantenimiento</option>
              </select>
            </div>
            <div class="col-lg-12 form-group">
              <label for="observaciones">Observaciones:</label>
              <textarea class="form-control" id="observaciones" name="observaciones" rows="3"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        <?php
        // $ControladorPlanMantennimiento->ctrCrearPlanMantenimiento($_POST);
        ?>
      </form>
    </div>
  </div>
</div>



<!-- Modal para Editar Plan de Mantenimiento -->
<div id="modalEditarPlanMantenimiento" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 99%;">
    <!-- Modal content-->
    <div class="modal-content">
      <form id="formEditarPlanMantenimiento" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Gestión mantenimiento</h4>
        </div>
        <div class="modal-body">
          <!-- Repite aquí todos los campos del formulario de agregar, pero añade un id distinto o clase para identificarlos fácilmente -->
          <input type="hidden" id="idPlanMantenimientoEditar" name="idPlanMantenimientoEditar" value="">
          <div class="col-lg-6 form-group">
            <label for="actualizarActivoFijo">Activo Fijo:</label>
            <span class="text-danger">*</span>
            <?php $activosFijos = ControladorPlanMantenimiento::ctrMostrar('activo_fijo'); ?>

            <select class="form-control select2" id="actualizarActivoFijo" name="actualizarActivoFijo" style="width: 100%;" required>
              <option value="">Seleccionar Activo Fijo</option>
              <?php
              foreach ($activosFijos as $activo) {
                // echo '<option value="' . $activo['id'] . '">' . $activo['descripcion'] . '</option>';
                echo '<option value="' . $activo['id'] . '" serie_motor="' . $activo['serie_motor'] . '">' . $activo['descripcion'] . ' --- ' . $activo['placa'] . '</option>';
              }
              ?>
            </select>
          </div>

          <div class="col-lg-6 form-group">
            <div class="col-lg-6 form-group">
              <label for="ActualizarFechaInicio">Fecha de Inicio:</label>
              <span class="text-danger">*</span>
              <input type="date" class="form-control" id="ActualizarFechaInicio" name="ActualizarFechaInicio" required>
            </div>
            <div class="col-lg-6 form-group">
              <label for="ActualizarTipoProgramacion">Tipo de Programación:</label>
              <span class="text-danger">*</span>
              <select class="form-control" id="ActualizarTipoProgramacion" name="ActualizarTipoProgramacion" required>
                <option value="">Seleccione un tipo</option>
                <option value="una vez">Única Vez</option>
                <option value="mensual">Mensual</option>
                <option value="bimestral">Bimestral</option>
                <option value="trimestral">Trimestral</option>
                <option value="semestral">Semestral</option>
                <option value="anual">Anual</option>
                <option value="horas">Cada X Horas</option>
                <option value="kilometraje">Cada X Kilómetros</option>
              </select>
            </div>
            <div class="col-lg-6 form-group">
              <label for="Actualizarinter_ini">Intervalo de Inicio</label>
              <input type="number" class="form-control" id="Actualizarinter_ini" name="inter_ini">
            </div>
          </div>
          <div class="col-lg-6 form-group">
            <label>Cronograma de Mantenimiento:</label>
            <div id="UpdateCronogramaContainer" style="height: 400px; overflow-y: auto;">
              <table id="UpdateCronogramaTable" class="table table-striped">
                <thead>
                  <tr>
                    <th>Fecha Programada</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- El contenido se llenará dinámicamente -->
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-lg-6 form-group">

            <div class="col-lg-6 form-group" id="updateintervaloHorase" style="display: none;">
              <label for="updateintervaloHoras">Intervalo horas:</label>
              <input type="number" class="form-control" id="updateintervaloHoras" name="updateintervaloHoras" placeholder="Intervalo en horas">
            </div>

            <div class="col-lg-6 form-group" id="updateintervaloKilometrajee" style="display: none;">
              <label for="updateintervaloKilometraje">Intervalo Kilometraje:</label>
              <input type="number" class="form-control" id="updateintervaloKilometraje" name="updateintervaloKilometraje" placeholder="Intervalo en kilómetros">
            </div>


            <div class="col-lg-6 form-group">
              <label for="ActualizarResponsableMantenimiento">Trabajador Responsable:</label>
              <span class="text-danger">*</span>
              <?php $data_db = ControladorPlanMantenimiento::_ctrMostrarColaborador('proveedores'); ?>

              <select class="form-control select2" id="ActualizarResponsableMantenimiento" name="ActualizarResponsableMantenimiento" style="width: 100%;" required>
                <option value="">Seleccionar Trabajador</option>
                <?php
                foreach ($data_db as $data) {
                  echo '<option value="' . $data['proveedor_pk'] . '">' . $data['razon_social'] . '</option>';
                }
                ?>
              </select>
            </div>
            <div class="col-lg-6 form-group">
              <label for="ActualizarDocumentosMantenimiento">Documentos de Mantenimiento:</label>
              <input type="file" class="form-control-file" id="ActualizarDocumentosMantenimiento" name="ActualizarDocumentosMantenimiento" accept=".pdf" multiple>
              <input type="hidden" id="editarDocumentoDb" name="editarDocumentoDb">
              <small class="form-text text-muted">Adjuntar cualquier documento relacionado con el mantenimiento.</small>
            </div>

            <div class="col-lg-6 form-group">
              <label for="ActualizarUbicacionActivo">Ubicación del Activo:</label>
              <span class="text-danger">*</span>
              <input type="text" class="form-control" id="ActualizarUbicacionActivo" name="ActualizarUbicacionActivo" required>
            </div>

            <div class="col-lg-6 form-group">
              <label for="ActualizarNumeroSerie">Número de Serie:</label>
              <span class="text-danger">*</span>
              <input type="text" class="form-control" id="ActualizarNumeroSerie" name="ActualizarNumeroSerie" required>
            </div>
            <div class="col-lg-6 form-group">
              <label for="ActualizarPrioridadMantenimiento">Prioridad:</label>
              <span class="text-danger">*</span>
              <select class="form-control" id="ActualizarPrioridadMantenimiento" name="ActualizarPrioridadMantenimiento" required>
                <option value="Alta">Alta</option>
                <option value="Media">Media</option>
                <option value="Baja">Baja</option>
              </select>
            </div>

            <div class="col-lg-6 form-group">
              <label for="ActualizarDuracionEstimada">Duración Estimada (horas):</label>
              <input type="number" class="form-control" id="ActualizarDuracionEstimada" name="ActualizarDuracionEstimada">
            </div>
            <div class="col-lg-6 form-group">
              <div class="col-lg-6 form-group">
                <label for="ActualizarCostoRepuestos">Costo estimado de Repuestos:</label>
                <input type="number" class="form-control" id="ActualizarCostoRepuestos" name="ActualizarCostoRepuestos" step="0.01">
              </div>
            </div>
            <div class="col-lg-6 form-group">
              <div class="col-lg-6 form-group">
                <label for="Actualizar_valo_cambio">Valor de Cambio:</label>
                <input type="number" class="form-control" id="Actualizar_valo_cambio" name="valo_cambio" step="0.01">
              </div>
              <div class="col-lg-6 form-group">
                <label for="ACtipo_moneda">Tipo de moneda:</label>
                <select name="tipo_moneda" id="ACtipo_moneda" class="form-control">
                  <option value="soles">Soles</option>
                  <option value="dolares">Dolares</option>
                </select>
              </div>
            </div>
            <div class="col-lg-6 form-group">
              <label for="ActualizarEmpresaMantenimiento">Tipo de Registro:</label>
              <span class="text-danger">*</span>

              <select class="form-control select2" id="ActualizarEmpresaMantenimiento" name="ActualizarEmpresaMantenimiento" style="width: 100%;" required>
                <option value="Inspecciones obligatorias">Inspecciones obligatorias</option>
                <option value="Mantenimiento">Mantenimiento</option>
              </select>
            </div>
            <div class="col-lg-12 form-group">
              <label for="ActualizarObservaciones">Observaciones:</label>
              <textarea class="form-control" id="ActualizarObservaciones" name="ActualizarObservaciones" rows="3"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Actualizar</button>
          </div>
          <?php
          // if (isset($_POST['idPlanMantenimientoEditar']) && !empty($_POST['idPlanMantenimientoEditar'])) {
          //   $ControladorPlanMantennimiento->ctrActualizarPlanMantenimiento($_POST);
          // }
          ?>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal para Ver Cronograma de Mantenimiento -->
<div id="modalVerCronograma" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 99%;">
    <div class="modal-content">
      <!-- <form id="formVerCronograma" method="post"> -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cronograma de Mantenimiento</h4>
      </div>
      <div class="modal-body">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">
          <!-- El contenido se llenará dinámicamente -->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
      <!-- </form> -->
    </div>
  </div>
</div>


<script>
  var planesMantenimiento = []; // Definir la variable globalmente

  $(document).ready(function() {

    cargarDatos();

    // Inicializar Select2
    $('.select2').select2();

    // Enlazar eventos para cuando se cambien las fechas o el tipo de programación
    $('#fechaInicio, #tipoProgramacion').change(function() {
      mostrarCronograma();
    });
    $('#ActualizarFechaInicio, #ActualizarTipoProgramacion').change(function() {
      var tipoProgramacion = $('#ActualizarTipoProgramacion').val();
      var inter_ini = parseInt($('#Actualizarinter_ini').val());
      var intervaloHoras = parseInt($('#updateintervaloHoras').val());
      var intervaloKilometraje = parseInt($('#updateintervaloKilometraje').val());
      var tbody = $('#UpdateCronogramaTable tbody');
      var fecha = $('#ActualizarFechaInicio').val();

      mostrarCronogramaUpdate2(tipoProgramacion, inter_ini, intervaloHoras, intervaloKilometraje, tbody, fecha);
    });

  });

  var cabecerasRow = [];


  function mostrarCronograma() {

    var tipoProgramacion = $('#tipoProgramacion').val();
    var inter_ini = parseInt($('#inter_ini').val());
    var intervaloHoras = parseInt($('#intervaloHoras').val());
    var intervaloKilometraje = parseInt($('#intervaloKilometraje').val());
    var tbody = $('#cronogramaTable tbody');

    tbody.empty(); // Limpiar el cuerpo de la tabla actual
    cabecerasRow = []; // Limpiar cabecerasRow para evitar duplicados

    if (tipoProgramacion === 'horas') {
      $('#intervaloHorase').show();
      $('#intervaloKilometrajee').hide();

      // Validar campos
      if (!isNaN(inter_ini) && !isNaN(intervaloHoras)) {
        for (var i = 0; i < 50; i++) {
          var horasAcumuladas = inter_ini + (i * intervaloHoras);

          tbody.append(`<tr><td>${horasAcumuladas} horas</td></tr>`);
          cabecerasRow.push(`${horasAcumuladas} horas`); // Guardar en cabecerasRow
        }
      }
    } else if (tipoProgramacion === 'kilometraje') {
      $('#intervaloHorase').hide();
      $('#intervaloKilometrajee').show();

      // Validar campos
      if (!isNaN(inter_ini) && !isNaN(intervaloKilometraje)) {
        for (var i = 0; i < 100; i++) {
          var kilometrajeAcumulado = inter_ini + (i * intervaloKilometraje);

          tbody.append(`<tr><td>${kilometrajeAcumulado} km</td></tr>`);
          cabecerasRow.push(`${kilometrajeAcumulado} km`); // Guardar en cabecerasRow
        }
      }
    } else {
      // Para los otros tipos de programación, generar fechas como antes
      $('#intervaloHorase').hide();
      $('#intervaloKilometrajee').hide();
      var fechas = calcularFechasCronograma($('#fechaInicio').val(), tipoProgramacion);
      if (fechas) {
        fechas.forEach(function(fecha) {
          tbody.append(`<tr><td>${fecha}</td></tr>`);
          cabecerasRow.push(fecha); // Guardar en cabecerasRow
        });
      }
    }
  }

  function mostrarCronogramaUpdate2(tipo, inter_ini, inter_horas, inter_kilome, tableName, fecha) {

    var tipoProgramacion = tipo;
    var inter_ini = inter_ini;
    var intervaloHoras = inter_horas;
    var intervaloKilometraje = inter_kilome;
    var tbody = tableName;

    tbody.empty();
    cabecerasRow = []; // Limpiar cabecerasRow para evitar duplicados

    if (tipoProgramacion === 'horas') {
      $('#updateintervaloHorase').show();
      $('#updateintervaloKilometrajee').hide();

      // Validar campos

      if (!isNaN(inter_ini) && !isNaN(intervaloHoras)) {
        for (var i = 0; i < 50; i++) {
          var horasAcumuladas = inter_ini + (i * intervaloHoras);

          tbody.append(`<tr><td>${horasAcumuladas} horas</td></tr>`);
          cabecerasRow.push(`${horasAcumuladas} horas`); // Guardar en cabecerasRow
        }
      }
    } else if (tipoProgramacion === 'kilometraje') {
      $('#updateintervaloHorase').hide();
      $('#updateintervaloKilometrajee').show();

      // Validar campos

      if (!isNaN(inter_ini) && !isNaN(intervaloKilometraje)) {
        for (var i = 0; i < 100; i++) {
          var kilometrajeAcumulado = inter_ini + (i * intervaloKilometraje);

          tbody.append(`<tr><td>${kilometrajeAcumulado} km</td></tr>`);
          cabecerasRow.push(`${kilometrajeAcumulado} km`); // Guardar en cabecerasRow
        }
      }
    } else {
      // Para los otros tipos de programación, generar fechas como antes
      $('#updateintervaloHorase').hide();
      $('#updateintervaloKilometrajee').hide();
      var fechas = calcularFechasCronograma(fecha, tipoProgramacion);
      if (fechas) {
        fechas.forEach(function(fecha) {
          tbody.append(`<tr><td>${fecha}</td></tr>`);
          cabecerasRow.push(fecha); // Guardar en cabecerasRow
        });
      }
    }
  }


  $(document).on('click', '.btnCerrarMan', function(e) {
    e.preventDefault();
    let confirmar = confirm('¿estas seguro de cerrar formulario de mantenimiento?');
    if (confirmar) {

      var formData = new FormData();
      var idRow = $(this).data('id-row');
      var idPlan = $(this).data('id-plan');

      formData.append('accion', 'cerrarMantenimiento');
      formData.append('id_row', idRow);
      formData.append('id_plan', idPlan);

      $.ajax({
        url: 'controladores/plan-mantenimiento.controlador.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(respuesta) {
          if (respuesta == "ok") {
            swal({
              type: "success",
              title: "El cronograma a sido cerrado correctamente",
              showConfirmButton: true,
              confirmButtonText: "Cerrar",
              closeOnConfirm: false
            }).then((result) => {
              if (result.value) {
                window.location = "plan-mantenimiento";
              }
            })
          } else {
            alert("Erro al crear el Plan de Mantenimiento. Por favor, inténtalo de nuevo.");
          }
        },
        error: function(xhr, status, error) {
          console.error('Error en la solicitud AJAX:', status, error);
        }
      })
    }

  });
  $(document).on('click', '.btnVerPlanMantenimiento', function() {
    var idPlan = $(this).data('id');
    var tipoProgramacion = $(this).data('tipo-programacion');
    var fechaInicio = $(this).data('fecha-inicio'); // Asegúrate de que la fecha de inicio se pasa como data attribute
    var kilometraje = $(this).data('kilometraje');
    var horas = $(this).data('horas');


    if (tipoProgramacion == "kilometraje" || tipoProgramacion == "horas") {
      if (tipoProgramacion == "kilometraje") {
        generarCronogramaPersonalizado(new Date(fechaInicio), tipoProgramacion, kilometraje, idPlan);
        $('#modalVerCronograma').modal('show');
      } else {
        generarCronogramaPersonalizado(new Date(fechaInicio), tipoProgramacion, horas, idPlan);
        $('#modalVerCronograma').modal('show');
      }
    } else {
      generarCronograma(fechaInicio, tipoProgramacion, idPlan);
      $('#modalVerCronograma').modal('show');
    }

    // Mostrar el modal

  });

  function generarCronograma(fechaInicio, tipoProgramacion, idPlan) {
    var datas = new FormData();
    datas.append("ajaxservice", 'loadInfoPlan');
    datas.append("idaa", idPlan);

    $.ajax({
      url: "modelos/plan-mantenimiento.modelo.php",
      method: "POST",
      data: datas,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function(respuesta) {

        var paneles = [];
        for (let i = 0; i < respuesta.length; i++) {
          // Imprimir específicamente el valor de 'cabecera' en cada objeto
          let estadoColorClase = '';
          switch (respuesta[i].state_r) {
            case 'PENDIENTE':
              estadoColorClase = 'estado-pendiente';
              break;
            case 'FINALIZADO':
              estadoColorClase = 'estado-finalizado';
              break;
            case 'REGISTRADO':
              estadoColorClase = 'estado-registrado';
              break;
          }
          let cabeceraRow;
          if (respuesta.length === 1) {
            cabeceraRow = 'MANTENIMIENTO CORRECTIVO';
          } else {
            cabeceraRow = respuesta[i].cabecera;
          }

          let optionTipoNom = '';

          <?php
          $options = ['soles', 'dolares'];
          foreach ($options as $option) : ?>
            optionTipoNom += `<option value="<?= $option; ?>" ${respuesta[i].tipo_mon === '<?= $option; ?>' ? 'selected' : ''}><?= $option; ?></option>`;
          <?php endforeach; ?>

          let maintenanceDocsHTML = '';
          if (respuesta[i].maintenance_docs) {
            maintenanceDocsHTML = `<a href="${respuesta[i].maintenance_docs}" target="_blank">
                                    <img src="vistas/img/plantilla/pdf.png" class="img-thumbnail-custom" 
                                         onerror="this.onerror=null;this.src='vistas/img/plantilla/pdf.png';" >
                                  </a>`;
          } else {
            maintenanceDocsHTML = `<img src="vistas/img/plantilla/pdf-bn.png" 
                                  onerror="this.onerror=null;this.src='vistas/img/plantilla/pdf.png';" class="img-thumbnail-custom">`;
          }

          let evidencePhotosHTML = respuesta[i].evidence_fotos ?
            `<a href="${respuesta[i].evidence_fotos}" target="_blank">
                        <img src="${respuesta[i].evidence_fotos}" class="img-thumbnail previsualizar" width="100px">
                    </a>` :
            `<img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">`;


          var panelHTML = `
            <div class="panel panel-default">
              <div class="panel-heading ${estadoColorClase}" role="tab" id="heading${i}">
                <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse${i}" aria-expanded="true" aria-controls="collapse${i}">
                    ${cabeceraRow}
                  </a>
                </h4>
              </div>
              <div id="collapse${i}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading${i}">
                <div class="panel-body">
                  Información de mantenimiento para ${respuesta[i].cabecera}

                  <div class="container mt-5">
                    <h2>Formulario de Cumplimiento de Mantenimiento</h2>
                    <form id="form_info_matenimiento" class="form_info_matenimiento" method="post" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="maintenanceDocs_${i}">Documentos de Mantenimiento</label>
                            <input type="file" class="form-control-file" id="maintenanceDocs_${i}" name="maintenanceDocs" accept=".pdf" multiple>
                            ${maintenanceDocsHTML}
                            <input type="hidden" class="form-control-file" id="maintenanceDb" name="maintenanceDb" value="${respuesta[i].maintenance_docs}">

                            <input type="hidden" class="id_plan" id="id_plan_${i}" name="id_plan" value="${respuesta[i].id_plan}">
                            <input type="hidden" class="id" id="id_${i}" name="id_row" value="${respuesta[i].id_row}">
                            <input type="hidden" class="cabecera" id="cabecera_${i}" name="cabecera" value="${respuesta[i].cabecera}">

                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="evidencePhotos_${i}">Fotos de Evidencia</label>
                            <span class="text-danger">*</span>
                            <input type="file" class="form-control-file" id="evidencePhotos_${i}" name="evidencePhotos" multiple accept="image/*">
                            ${evidencePhotosHTML}

                            <input type="hidden" class="form-control-file" id="evidencePhotosDb" name="evidencePhotosDb" value="${respuesta[i].evidence_fotos}">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="observations_${i}">Observaciones</label>
                            <textarea class="form-control" id="observations_${i}" name="observations" rows="2" placeholder="Observaciones del mantenimiento">${respuesta[i].observations}</textarea>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="cost_${i}">Costo del Mantenimiento</label>
                            <span class="text-danger">*</span>
                            <input type="number" class="form-control" id="cost_${i}" name="cost" placeholder="Costo en moneda local" required value="${respuesta[i].cost}">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="tipo_mon_${i}">Tipo de moneda</label>
                            <select name="tipo_mon" id="tipo_mon_${i}" class="form-control">
                              ${optionTipoNom}
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="duration_${i}">Duración del Mantenimiento (horas)</label>
                            <span class="text-danger">*</span>
                            <input type="number" class="form-control" id="duration_${i}" name="duration" placeholder="Duración en horas" required value="${respuesta[i].duration}">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="partsUsed_${i}">Repuestos Utilizados</label>
                            <textarea class="form-control" id="partsUsed_${i}" name="partsUsed" rows="2" placeholder="Lista de piezas usadas en el mantenimiento">${respuesta[i].parts_used}</textarea>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="residualParts_${i}">Repuestos Residuales</label>
                            <textarea class="form-control" id="residualParts_${i}" name="residualParts" rows="2" placeholder="Lista de piezas residuales del mantenimiento">${respuesta[i].residual_parts}</textarea>
                          </div>
                        </div>
                      </div>
                     
                      <?php if ($_SESSION["perfil"] == "Administrador") : ?>
                          <button type="button" class="btn btn-danger btnCerrarMan" data-id-row="${respuesta[i].id_row}" data-id-plan="${respuesta[i].id_plan}">Cerrar Mantenimiento</button>
                        <?php endif; ?>
                        
                        ${respuesta[i].state_r !== "FINALIZADO" ? '<button type="submit" class="btn btn-primary">Guardar</button>' : ''}
                    </form>
                  </div>
                </div>
              </div>
            </div>`;

          paneles.push(panelHTML);
        }

        // Insertar los paneles en el acordeón aquí dentro del éxito
        $('#accordion').html(paneles.join(''));
      },
      error: function(xhr, status, error) {
        console.error('Error en la solicitud AJAX:', status, error);
      }
    });
  }

  function generarCronogramaPersonalizado(fechaInicio, tipoProgramacion, intervalo, idPlan) {

    var datas = new FormData();
    datas.append("ajaxservice", 'loadInfoPlan');
    datas.append("idaa", idPlan);

    $.ajax({
      url: "modelos/plan-mantenimiento.modelo.php",
      method: "POST",
      data: datas,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function(respuesta) {

        var paneles = [];
        for (let i = 0; i < respuesta.length; i++) {
          // Imprimir específicamente el valor de 'cabecera' en cada objeto

          // Determinar la clase de color basada en el estado
          let estadoColorClase = '';
          switch (respuesta[i].state_r) {
            case 'PENDIENTE':
              estadoColorClase = 'estado-pendiente';
              break;
            case 'FINALIZADO':
              estadoColorClase = 'estado-finalizado';
              break;
            case 'REGISTRADO':
              estadoColorClase = 'estado-registrado';
              break;
          }
          let cabeceraRow;
          if (respuesta.length === 1) {
            cabeceraRow = 'MANTENIMIENTO CORRECTIVO';
          } else {
            cabeceraRow = respuesta[i].cabecera;
          }

          let opcionesProveedores = '<option value="">No especifica</option>';
          <?php $proveedores = ControladorPlanMantenimiento::ctrMostrar('proveedores'); ?>
          <?php foreach ($proveedores as $proveedor) : ?>
            opcionesProveedores += `<option value="<?= $proveedor['proveedor_pk']; ?>" ${respuesta[i].proveedor === '<?= $proveedor['proveedor_pk']; ?>' ? 'selected' : ''}><?= $proveedor['razon_social']; ?></option>`;
          <?php endforeach; ?>

          let optionTipoNom = '';
          <?php
          $options = ['soles', 'dolares'];
          foreach ($options as $option) : ?>
            optionTipoNom += `<option value="<?= $option; ?>" ${respuesta[i].tipo_mon === '<?= $option; ?>' ? 'selected' : ''}><?= $option; ?></option>`;
          <?php endforeach; ?>

          if (respuesta[i].maintenance_docs) {
            maintenanceDocsHTML = `<a href="${respuesta[i].maintenance_docs}" target="_blank">
                                    <img src="vistas/img/plantilla/pdf.png" class="img-thumbnail-custom" 
                                         onerror="this.onerror=null;this.src='vistas/img/plantilla/pdf.png';" >
                                  </a>`;
          } else {
            maintenanceDocsHTML = `<img src="vistas/img/plantilla/pdf-bn.png" 
                                  onerror="this.onerror=null;this.src='vistas/img/plantilla/pdf.png';" class="img-thumbnail-custom">`;
          }
          let evidencePhotosHTML = respuesta[i].evidence_fotos ?
            `<a href="${respuesta[i].evidence_fotos}" target="_blank">
                        <img src="${respuesta[i].evidence_fotos}" class="img-thumbnail previsualizar" width="100px">
                    </a>` :
            `<img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">`;


          var panelHTML = `
          <div class="panel panel-default">
            <div class="panel-heading ${estadoColorClase}" role="tab" id="heading${i}">
              <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse${i}" aria-expanded="true" aria-controls="collapse${i}">
                  ${cabeceraRow}
                </a>
              </h4>
            </div>
            <div id="collapse${i}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading${i}">
              <div class="panel-body">
                Información de mantenimiento para ${respuesta[i].cabecera}

                  <div class="container mt-5">
                      <h2>Formulario de Cumplimiento de Mantenimiento</h2>
                      <form id="form_info_matenimiento2" method="post" enctype="multipart/form-data">
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="maintenanceDocs">Documentos de Mantenimiento</label>
                                      <input type="file" class="form-control-file" id="maintenanceDocs" name="maintenanceDocs" multiple accept=".pdf">
                                      ${maintenanceDocsHTML}

                                      <input type="hidden" class="form-control-file" id="maintenanceDb" name="maintenanceDb" value="${respuesta[i].maintenance_docs}">
                                      <input type="hidden" class="id_plan" id="id_plan_${i}" name="id_plan" value="${respuesta[i].id_plan}">
                                      <input type="hidden" class="id" id="id_${i}" name="id_row" value="${respuesta[i].id_row}">
                                      <input type="hidden" class="cabecera" id="cabecera_${i}" name="cabecera" value="${respuesta[i].cabecera}">
                                      
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="evidencePhotos">Fotos de Evidencia</label>
                                      <input type="file" class="form-control-file" id="evidencePhotos" name="evidencePhotos" multiple accept="image/*">
                                       ${evidencePhotosHTML}

                                      <input type="hidden" class="form-control-file" id="evidencePhotosDb" name="evidencePhotosDb" value="${respuesta[i].evidence_fotos}" >
                                  </div>
                              </div>
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label for="observations">Observaciones</label>
                                      <span class="text-danger">*</span>
                                      <textarea class="form-control" id="observations" name="observations" rows="2" placeholder="Observaciones del mantenimiento" required>${respuesta[i].observations}</textarea>
                                  </div>
                              </div>              
                          </div>

                          <div class="row">
                            <div class="col-md-2">
                                  <div class="form-group">
                                      <label for="tipo_mon">Tipo de moneda</label>
                                      <span class="text-danger">*</span>
                                      <select class="form-control select2" id="tipo_mon" name="tipo_mon" style="width: 100%;" required>
                                        ${optionTipoNom}
                                      </select>
                                  </div>
                              </div>  
                            <div class="col-md-2">
                                  <div class="form-group">
                                      <label for="cost">Costo del Mantenimiento</label>
                                      <span class="text-danger">*</span>
                                      <input type="number" class="form-control" id="cost" name="cost" placeholder="Costo en moneda local" step="0.01" value="${respuesta[i].cost}" required>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label for="duration">Duración del Mantenimiento (horas)</label>
                                      <span class="text-danger">*</span>
                                      <input type="number" class="form-control" id="duration" name="duration" placeholder="Duración en horas" step="0.01" value="${respuesta[i].duration}" required>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="user_register">Usuario que registra</label>
                                      <span class="text-danger">*</span>
                                      <input type="text" class="form-control" id="user_register" name="user_register" value="<?php echo $_SESSION['usuario'] . ' ' . $_SESSION['nombre']; ?>" required>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="proveedor">Proveedor</label>
                                      <select class="form-control select2" id="proveedor" name="proveedor" style="width: 100%;">
                                        ${opcionesProveedores}
                                      </select>
                                  </div>
                              </div>
                          
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label for="partsUsed">Repuestos Utilizados</label>
                                      <textarea class="form-control" id="partsUsed" name="partsUsed" rows="2" placeholder="Lista de piezas usadas en el mantenimiento">${respuesta[i].parts_used}</textarea>
                                  </div>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label for="residualParts">Repuestas Residuales</label>
                                      <textarea class="form-control" id="residualParts" name="residualParts" rows="2" placeholder="Lista de piezas residuales del mantenimiento">${respuesta[i].residual_parts}</textarea>
                                  </div>
                              </div>
                          </div>

                          ${respuesta[i].state_r !== "FINALIZADO" ? '<button type="submit" class="btn btn-primary">Guardar</button>' : ''}
                          <?php if ($_SESSION["perfil"] == "Administrador") : ?>
                            <button type="button" class="btn btn-danger btnCerrarMan" data-id-row="${respuesta[i].id_row}" data-id-plan="${respuesta[i].id_plan}">Cerrar Mantenimiento</button>
                          <?php endif; ?>
                      </form>
                  </div>
              </div>
            </div>
          </div>`;
          paneles.push(panelHTML);
        }

        // Insertar los paneles en el acordeón aquí dentro del éxito
        $('#accordion').html(paneles.join(''));
      },
      error: function(xhr, status, error) {
        console.error('Error en la solicitud AJAX:', status, error);
      }
    });
  }

  function calcularFechasCronograma(fechaInicio, tipoProgramacion) {
    var fechas = [];
    var inicio = new Date(fechaInicio + 'T00:00:00'); // Establecer la fecha de inicio en la medianoche
    inicio.setMinutes(inicio.getMinutes() + inicio.getTimezoneOffset()); // Ajuste de zona horaria

    var intervalo = obtenerIntervalo(tipoProgramacion);

    // Ajuste para 5 años si el tipo es anual
    var maxYears = tipoProgramacion === 'anual' ? 5 : 1;

    for (var i = 0; i < maxYears * 12; i += intervalo) { // Multiplica por 12 para obtener 12 meses por año
      var fecha = new Date(inicio.getTime()); // Copiar la fecha de inicio
      fecha.setMonth(inicio.getMonth() + i); // Incrementar el mes según el intervalo

      fechas.push(fecha.toLocaleDateString()); // Agregar fecha formateada
      if (tipoProgramacion === 'una vez') break; // Si es una única vez, no repetir más allá de la primera fecha
    }

    return fechas;
  }


  function obtenerIntervalo(tipoProgramacion) {
    switch (tipoProgramacion.toLowerCase()) {
      case 'mensual':
        return 1;
      case 'bimestral':
        return 2;
      case 'trimestral':
        return 3;
      case 'semestral':
        return 6;
      case 'anual':
        return 12;
      default:
        return 1; // Default to monthly if no match
    }
  }


  function cargarDatos() {
    $.ajax({
      url: "modelos/plan-mantenimiento.modelo.php",
      method: "POST",
      data: {
        ajaxservice: 'loadData'
      },
      dataType: "json",
      success: function(respuesta) {

        $('#tablaPlanesMantenimiento tbody').empty();
        if (respuesta && respuesta.length > 0) {
          $.each(respuesta, function(index, registro) {
            var fila = '<tr>' +
              '<td>' + registro.id + '</td>' +
              '<td>' + registro.activos_fijos + '</td>' +
              '<td>' + registro.tipo_programacion + '</td>' +
              '<td>' + registro.fecha_inicio + '</td>' +
              '<td>' + registro.intervalo_kilometraje + '</td>' +
              '<td>' + registro.intervalo_horas + '</td>' +
              '<td>' + registro.resp + '</td>' +
              '<td>' + registro.empresa_mantenimiento + '</td>' +
              '<td>' + registro.ubicacion_activo + '</td>' +
              '<td>' + registro.numero_serie + '</td>' +
              '<td>' + registro.prioridad_mantenimiento + '</td>' +
              '<td>' + registro.duracion_estimada + '</td>' +
              '<td>' + registro.costo_repuestos + '</td>' +
              '<td>' + registro.tipo_moneda + '</td>' +
              '<td>' + registro.observaciones + '</td>' +
              '<td>';

            var doc = registro.documento;
            if (doc) {
              fila += '<a href="' + doc + '" target="_blank"> <img src="vistas/img/plantilla/pdf.png" class="img-thumbnail-custom" onerror="this.onerror=null;this.src=\'vistas/img/plantilla/pdf.png\';"></a>';
            } else {
              fila += '<img src="vistas/img/plantilla/pdf-bn.png" onerror="this.onerror=null;this.src=\'vistas/img/plantilla/pdf.png\';">';
            }
            fila += '</td>' +
              '<td>' +
              '<center>' +
              '<a style="margin-top: 4px !important" class="btn btn-info btn-xs btnEditarPlanMantenimiento" data-id="' + registro.id + '" data-toggle="modal" data-target="#modalEditarPlanMantenimiento"><i class="fa fa-pencil"></i> Editar</a>' +
              '<a style="margin-top: 4px !important" class="btn btn-danger btn-xs btnEliminarPlanMantenimiento" data-id="' + registro.id + '" data-toggle="modal" data-target="#modalEliminarPlanMantenimiento"><i class="fa fa-pencil"></i> Eliminar</a>' +
              '<a style="margin-top: 4px !important" class="btn btn-info btn-xs btnVerPlanMantenimiento" data-id="' + registro.id + '" data-tipo-programacion="' + registro.tipo_programacion + '" data-fecha-inicio="' + registro.fecha_inicio + '" data-kilometraje="' + registro.intervalo_kilometraje + '" data-horas="' + registro.intervalo_horas + '" data-toggle="modal" data-target="#modalVerCronograma"><i class="fa fa-pencil"></i> Ejecución de mantenimiento</a>' +
              '</center>' +
              '<br>' +
              '</td>' +
              '</tr>';
            $('#tablaPlanesMantenimiento tbody').append(fila);
          });
        }
      },
    });
  }

  $(document).on('click', '.btnEditarPlanMantenimiento', function(e) {
    e.preventDefault();
    var idA = $(this).data('id');
    var datos = new FormData();
    datos.append("idaa", idA);
    datos.append("ajaxservice", 'loadEdit');
    $("#idPlanMantenimientoEditar").val($(this).data('id'));
    $.ajax({
      url: "modelos/plan-mantenimiento.modelo.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(item) {
        var tipo = item.tipo_programacion
        $("#idPlanMantenimientoEditar").val(item.id);
        $("#actualizarActivoFijo").val(item.activos_fijos).trigger("change");
        $("#ActualizarFechaInicio").val(item.fecha_inicio);
        $("#updateintervaloKilometraje").val(item.intervalo_kilometraje)
        $("#updateintervaloHoras").val(item.intervalo_horas);
        $("#Actualizarinter_ini").val(item.inter_ini);
        $("#ActualizarTipoProgramacion").val(tipo).trigger("change");
        $("#ActualizarResponsableMantenimiento").val(item.responsable_mantenimiento).trigger("change");
        $("#ActualizarDocumentosMantenimiento").val(item.costo_litro);
        $("#ActualizarUbicacionActivo").val(item.ubicacion_activo);
        $("#ActualizarNumeroSerie").val(item.numero_serie);
        $("#ActualizarPrioridadMantenimiento").val(item.prioridad_mantenimiento);
        $("#ActualizarDuracionEstimada").val(item.duracion_estimada);
        $("#ActualizarCostoRepuestos").val(item.costo_repuestos);
        $("#ACtipo_moneda").val(item.tipo_moneda).trigger("change");
        $("#ActualizarEmpresaMantenimiento").val(item.empresa_mantenimiento).trigger("change");
        $("#ActualizarObservaciones").val(item.observaciones);
        $("#editarDocumentoDb").val(item.documento);
        $("#Actualizar_valo_cambio").val(item.valor_cambio);
       
      }
    })

  });

  $(document).on('click', '.btnEliminarPlanMantenimiento', function() {
    var idA = $(this).data('id');
    var confirmar = confirm("¿Estás seguro de que quieres eliminar esta gestion de combustible?");
    if (confirmar) {
      var datos = new FormData();
      datos.append("idEliminar", idA);
      datos.append("ajaxservice", 'eliminar');
      $("#idPlanMantenimientoEditar").val($(this).data('id'));

      $.ajax({
        url: "modelos/plan-mantenimiento.modelo.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
          if (respuesta == "ok") {
            alert("Plan de mantenimiento eliminado correctamente");
            cargarDatos();
          } else {
            alert("Error al eliminar el plan de mantenimiento. Por favor, inténtalo de nuevo.");
          }
        }
      });
    }
  });

  function mostrarCronogramaPorTecla() {
    $('#intervaloHoras, #intervaloKilometraje').on('input', function() {
      mostrarCronograma();
    });
  }

  function mostrarCronogramaPorTeclaUP() {
    $('#updateintervaloHoras, #updateintervaloKilometraje').on('input', function() {
      var tipoProgramacion = $('#ActualizarTipoProgramacion').val();
      var inter_ini = parseInt($('#Actualizarinter_ini').val());
      var intervaloHoras = parseInt($('#updateintervaloHoras').val());
      var intervaloKilometraje = parseInt($('#updateintervaloKilometraje').val());
      var tbody = $('#UpdateCronogramaTable tbody');
      var fecha = $('#ActualizarFechaInicio').val();

      // mostrarCronograma();
      mostrarCronogramaUpdate2(tipoProgramacion, inter_ini, intervaloHoras, intervaloKilometraje, tbody, fecha);
    });
  }

  $(document).on('submit', '#form_info_matenimiento', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('accion', 'CrearInfoMatenimiento');

    $.ajax({
      url: 'controladores/plan-mantenimiento.controlador.php',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(resp) {
        if (resp == "ok") {
          swal({
            type: "success",
            title: "Plan de Mantenimiento ha sido registrado correctamente",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
          }).then((result) => {
            if (result.value) {
              window.location = "plan-mantenimiento";
            }
          })
        } else if (resp == "noImage") {
          alert("Cargar Foto de evidencia");

        } else {
          alert("Erro al crear el Plan de Mantenimiento. Por favor, inténtalo de nuevo.");
        }
      },
      error: function(xhr, status, error) {
        console.error("Error en la solicitud AJAX:", status, error);
      }
    });
  });
  $(document).on('submit', '#formEditarPlanMantenimiento', function(e) {
    e.preventDefault();


    var formData = new FormData(this);

    cabecerasRow.forEach((item, index) => {
      formData.append(`fechas[${index}]`, item);
    });
    formData.append('accion', 'EditarPlanMantenimiento');

    $.ajax({
      url: 'controladores/plan-mantenimiento.controlador.php',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(respuesta) {
        console.log(respuesta);
        if (respuesta == "ok" || respuesta == 'no edit') {
          swal({
            type: "success",
            title: "Plan de Mantenimiento ha sido editado correctamente",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
          }).then((result) => {
            if (result.value) {
              window.location = "plan-mantenimiento";
            }
          });
        } else {
          alert("Error al crear el Plan de Mantenimiento. Por favor, inténtalo de nuevo.");
        }
      },
      error: function(xhr, status, error) {
        console.error('Error en la solicitud AJAX:', status, error);
      }
    });



  });

  $(document).on('submit', '#formPlanMantenimiento', function(e) {
    // e.preventDefault();
    // var formData = new FormData(this);
    // cabecerasRow.forEach((item, index) => {
    //   formData.append(`fechas[${index}]`, item);
    // });
    e.preventDefault();
    var formData = new FormData(this);

    // Recorrer cabecerasRow y añadir cada fila al formData
    cabecerasRow.forEach((item, index) => {
      formData.append(`fechas[${index}]`, item);
    });
    formData.append('accion', 'CrearPlanMantenimiento');
    $.ajax({
      url: 'controladores/plan-mantenimiento.controlador.php',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(respuesta) {
        if (respuesta == "ok") {
          swal({
            type: "success",
            title: "Plan de Mantenimiento ha sido registrado correctamente",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
          }).then((result) => {
            if (result.value) {
              window.location = "plan-mantenimiento";
            }
          })
        } else {
          alert("Erro al crear el Plan de Mantenimiento. Por favor, inténtalo de nuevo.");
        }
      },
      error: function(xhr, status, error) {
        console.error('Error en la solicitud AJAX:', status, error);
      }
    });
  });
  $(document).ready(function() {
    mostrarCronogramaPorTecla();
    mostrarCronogramaPorTeclaUP();
    // mostrarCronogramaPorTeclados();
    // mostrarCronogramaPorTeclados2();


    $(document).on("submit", "#form_info_matenimiento2", function(e) {
      e.preventDefault();
      var formData = new FormData(this);
      formData.append('accion', 'CrearInfoMatenimiento2');

      $.ajax({
        url: 'controladores/plan-mantenimiento.controlador.php', // Cambia esto a la URL correcta si es diferente
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(resp) {
          if (resp == "ok") {
            swal({
              type: "success",
              title: "Plan de Mantenimiento ha sido registrado correctamente",
              showConfirmButton: true,
              confirmButtonText: "Cerrar",
              closeOnConfirm: false
            }).then((result) => {
              if (result.value) {
                window.location = "plan-mantenimiento";
              }
            })
          } else if (resp == "noImage") {
            alert("Cargar Foto de evidencia");

          } else {
            alert("Erro al crear el Plan de Mantenimiento. Por favor, inténtalo de nuevo.");
          }
        },
        error: function(xhr, status, error) {
          console.error("Error en la solicitud AJAX:", status, error);
        }
      });
    });
  });

  function obtenerIntervalo2(tipoProgramacion) {
    switch (tipoProgramacion.toLowerCase()) {
      case 'horas':
        return 1; // Este es un ejemplo, ajusta según tus necesidades
      case 'kilometraje':
        return 100; // Este es un ejemplo, ajusta según tus necesidades
      default:
        return 1; // Default to hourly if no match
    }
  };
  $(document).on('change', '#activoFijo', function(e) {
    e.preventDefault();
    var selectedOption = this.options[this.selectedIndex];
    var selectedPlaca = selectedOption.getAttribute('serie_motor');
    $('#numeroSerie').val(selectedPlaca);
  });
  
  $(document).on('change', '#actualizarActivoFijo', function(e) {
    e.preventDefault();
    var selectedOption = this.options[this.selectedIndex];
    var selectedPlaca = selectedOption.getAttribute('serie_motor');
    $('#ActualizarNumeroSerie').val(selectedPlaca);
  });
</script>