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
</style>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Plan de Mantenimiento
      <small>Gestión y programación de mantenimientos</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Plan de Mantenimiento</li>
    </ol>
  </section>
  <?php
  require_once "controladores/plan-mantenimiento.controlador.php";
  require_once "modelos/plan-mantenimiento.modelo.php";
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
                    <th>Empresa</th>
                    <th>Ubicación</th>
                    <th>Número de Serie</th>
                    <th>Prioridad</th>
                    <th>Duración Estimada</th>
                    <th>Costo de Repuestos</th>
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
          <h4 class="modal-title">Agregar Plan de Mantenimiento</h4>
        </div>
        <div class="modal-body ">
          <div class="col-lg-6 form-group">
            <label for="activoFijo">Activo Fijo:</label>

            <?php $activosFijos = ControladorPlanMantenimiento::ctrMostrar('activo_fijo'); ?>

            <select class="form-control select2" id="activoFijo" name="activoFijo" style="width: 100%;" required>
              <option value="">Seleccionar Activo Fijo</option>
              <?php
              foreach ($activosFijos as $activo) {
                echo '<option value="' . $activo['id'] . '">' . $activo['descripcion'] . '</option>';
              }
              ?>
            </select>
          </div>

          <div class="col-lg-6 form-group">
            <div class="col-lg-6 form-group">
              <label for="fechaInicio">Fecha de Inicio:</label>
              <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" required>
            </div>
            <div class="col-lg-6 form-group">
              <label for="tipoProgramacion">Tipo de Programación:</label>
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
              <?php $usuarios = ControladorPlanMantenimiento::ctrMostrar('usuarios'); ?>

              <select class="form-control select2" id="responsableMantenimiento" name="responsableMantenimiento" style="width: 100%;" required>
                <option value="">Seleccionar Trabajador</option>
                <?php
                foreach ($usuarios as $user) {
                  echo '<option value="' . $user['id'] . '">' . $user['nombre'] . '</option>';
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
              <input type="text" class="form-control" id="ubicacionActivo" name="ubicacionActivo" required>
            </div>

            <div class="col-lg-6 form-group">
              <label for="numeroSerie">Número de Serie:</label>
              <input type="text" class="form-control" id="numeroSerie" name="numeroSerie" required>
            </div>
            <div class="col-lg-6 form-group">
              <label for="prioridadMantenimiento">Prioridad:</label>
              <select class="form-control" id="prioridadMantenimiento" name="prioridadMantenimiento">
                <option value="Alta">Alta</option>
                <option value="Media">Media</option>
                <option value="Baja">Baja</option>
              </select>
            </div>

            <div class="col-lg-6 form-group">
              <label for="duracionEstimada">Duración Estimada (horas):</label>
              <input type="number" class="form-control" id="duracionEstimada" name="duracionEstimada" required>
            </div>
            <div class="col-lg-6 form-group">
              <label for="costoRepuestos">Costo Estimado de Repuestos:</label>
              <input type="number" class="form-control" id="costoRepuestos" name="costoRepuestos" step="0.01" required>
            </div>
            <div class="col-lg-6 form-group">
              <label for="empresaMantenimiento">Empresa de Mantenimiento:</label>
              <?php $proveedores = ControladorPlanMantenimiento::ctrMostrar('proveedores'); ?>
              <select class="form-control select2" id="empresaMantenimiento" name="empresaMantenimiento" style="width: 100%;" required>
                <option value="">Seleccionar Empresa</option>
                <?php
                foreach ($proveedores as $proveedor) {
                  echo '<option value="' . $proveedor['proveedor_pk'] . '">' . $proveedor['razon_social'] . '</option>';
                }
                ?>
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
        $ControladorPlanMantennimiento->ctrCrearPlanMantenimiento($_POST);
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
          <h4 class="modal-title">Editar Plan de Mantenimiento</h4>
        </div>
        <div class="modal-body">
          <!-- Repite aquí todos los campos del formulario de agregar, pero añade un id distinto o clase para identificarlos fácilmente -->
          <input type="hidden" id="idPlanMantenimientoEditar" name="idPlanMantenimientoEditar" value="">
          <div class="col-lg-6 form-group">
            <label for="actualizarActivoFijo">Activo Fijo:</label>
            <?php $activosFijos = ControladorPlanMantenimiento::ctrMostrar('activo_fijo'); ?>

            <select class="form-control select2" id="actualizarActivoFijo" name="actualizarActivoFijo" style="width: 100%;" required>
              <option value="">Seleccionar Activo Fijo</option>
              <?php
              foreach ($activosFijos as $activo) {
                echo '<option value="' . $activo['id'] . '">' . $activo['descripcion'] . '</option>';
              }
              ?>
            </select>
          </div>

          <div class="col-lg-6 form-group">
            <div class="col-lg-6 form-group">
              <label for="ActualizarFechaInicio">Fecha de Inicio:</label>
              <input type="date" class="form-control" id="ActualizarFechaInicio" name="ActualizarFechaInicio" required>
            </div>
            <div class="col-lg-6 form-group">
              <label for="ActualizarTipoProgramacion">Tipo de Programación:</label>
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
              <?php $data_db = ControladorPlanMantenimiento::ctrMostrar('usuarios'); ?>

              <select class="form-control select2" id="ActualizarResponsableMantenimiento" name="ActualizarResponsableMantenimiento" style="width: 100%;" required>
                <option value="">Seleccionar Trabajador</option>
                <?php
                foreach ($data_db as $data) {
                  echo '<option value="' . $data['id'] . '">' . $data['nombre'] . '</option>';
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
              <input type="text" class="form-control" id="ActualizarUbicacionActivo" name="ActualizarUbicacionActivo" required>
            </div>

            <div class="col-lg-6 form-group">
              <label for="ActualizarNumeroSerie">Número de Serie:</label>
              <input type="text" class="form-control" id="ActualizarNumeroSerie" name="ActualizarNumeroSerie" required>
            </div>
            <div class="col-lg-6 form-group">
              <label for="ActualizarPrioridadMantenimiento">Prioridad:</label>
              <select class="form-control" id="ActualizarPrioridadMantenimiento" name="ActualizarPrioridadMantenimiento">
                <option value="Alta">Alta</option>
                <option value="Media">Media</option>
                <option value="Baja">Baja</option>
              </select>
            </div>

            <div class="col-lg-6 form-group">
              <label for="ActualizarDuracionEstimada">Duración Estimada (horas):</label>
              <input type="number" class="form-control" id="ActualizarDuracionEstimada" name="ActualizarDuracionEstimada" required>
            </div>
            <div class="col-lg-6 form-group">
              <label for="ActualizarCostoRepuestos">Costo Estimado de Repuestos:</label>
              <input type="number" class="form-control" id="ActualizarCostoRepuestos" name="ActualizarCostoRepuestos" step="0.01" required>
            </div>
            <div class="col-lg-6 form-group">
              <label for="ActualizarEmpresaMantenimiento">Empresa de Mantenimiento:</label>

              <?php $data_db = ControladorPlanMantenimiento::ctrMostrar('proveedores'); ?>

              <select class="form-control select2" id="ActualizarEmpresaMantenimiento" name="ActualizarEmpresaMantenimiento" style="width: 100%;" required>
                <option value="">Seleccionar Empresa</option>
                <?php
                foreach ($data_db as $data) {
                  echo '<option value="' . $data['proveedor_pk'] . '">' . $data['razon_social'] . '</option>';
                }
                ?>
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
          if (isset($_POST['idPlanMantenimientoEditar']) && !empty($_POST['idPlanMantenimientoEditar'])) {
            $ControladorPlanMantennimiento->ctrActualizarPlanMantenimiento($_POST);
          }
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
      <form id="formVerCronograma" method="post">
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
      </form>
    </div>
  </div>
</div>



<!-- ------------------------------------------------- -->



<script>
  var planesMantenimiento = []; // Definir la variable globalmente

  $(document).ready(function() {
    console.log("datos");

    cargarDatos();

    // Inicializar Select2
    $('.select2').select2();

    // Enlazar eventos para cuando se cambien las fechas o el tipo de programación
    $('#fechaInicio, #tipoProgramacion').change(function() {
      mostrarCronograma();
    });
    mostrarCronogramaUpdate();

  });

  function mostrarCronograma() {


    var fechaInicio = $('#fechaInicio').val();
    var tipoProgramacion = $('#tipoProgramacion').val();
    var cronogramaContainer = $('#cronogramaContainer');
    var tbody = $('#cronogramaTable tbody');

    tbody.empty(); // Limpiar el cuerpo de la tabla actual


    if (fechaInicio && tipoProgramacion && tipoProgramacion !== "horas" && tipoProgramacion !== "kilometraje") {

      var fechas = calcularFechasCronograma(fechaInicio, tipoProgramacion);

      fechas.forEach(function(fecha) {
        tbody.append(`<tr><td>${fecha}</td></tr>`);
      });

      cronogramaContainer.css('height', '300px').css('overflow-y', 'auto');
    } else if (tipoProgramacion == 'horas') {
      $('#intervaloHorase').show();
      $('#intervaloKilometrajee').hide();
    } else if (tipoProgramacion == 'kilometraje') {
      $('#intervaloKilometrajee').show();
      $('#intervaloHorase').hide();
    }
  }

  function mostrarCronogramaUpdate() {
    var fechaInicio = $('#ActualizarFechaInicio').val();
    var tipoProgramacion = $('#ActualizarTipoProgramacion').val();
    var cronogramaContainer = $('#UpdateCronogramaContainer');
    var tbody = $('#UpdateCronogramaTable tbody');

    tbody.empty(); // Limpiar el cuerpo de la tabla actual

    if (fechaInicio && tipoProgramacion && tipoProgramacion !== "horas" && tipoProgramacion !== "kilometraje") {
      var fechas = calcularFechasCronograma(fechaInicio, tipoProgramacion);

      fechas.forEach(function(fecha) {
        tbody.append(`<tr><td>${fecha}</td></tr>`);
      });

      cronogramaContainer.css('height', '300px').css('overflow-y', 'auto');
    } else if (tipoProgramacion == 'horas') {
      $('#updateintervaloHorase').show();
      $('#updateintervaloKilometrajee').hide();
    } else if (tipoProgramacion == 'kilometraje') {
      $('#updateintervaloKilometrajee').show();
      $('#updateintervaloHorase').hide();
    }
  }

  $(document).on('click', '.btnVerPlanMantenimiento', function() {
    var idPlan = $(this).data('id');
    var tipoProgramacion = $(this).data('tipo-programacion');
    var fechaInicio = $(this).data('fecha-inicio'); // Asegúrate de que la fecha de inicio se pasa como data attribute
    var kilometraje = $(this).data('kilometraje');
    var horas = $(this).data('horas');


    generarCronograma(fechaInicio, tipoProgramacion);
    if (tipoProgramacion == "kilometraje" || tipoProgramacion == "horas") {
      if (tipoProgramacion == "kilometraje") {
        generarCronogramaPersonalizado(new Date(fechaInicio), tipoProgramacion, kilometraje);
        $('#modalVerCronograma').modal('show');
      } else {
        //generarCronogramaPersonalizado(new Date(fechaInicio), tipoProgramacion, obtenerIntervalo2(tipoProgramacion));
        generarCronogramaPersonalizado(new Date(fechaInicio), tipoProgramacion, horas);
        $('#modalVerCronograma').modal('show');
      }
    } else {
      $('#modalVerCronograma').modal('show');
    }

    // Mostrar el modal

  });

  function generarCronograma(fechaInicio, tipoProgramacion) {
    var paneles = [];
    var fechas = calcularFechasCronograma(fechaInicio, tipoProgramacion);

    for (var i = 0; i < fechas.length; i++) {
      var fechaFormateada = fechas[i];

      // Generar HTML del panel
      var panelHTML = `
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="heading${i}">
                <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse${i}" aria-expanded="true" aria-controls="collapse${i}">
                    ${fechaFormateada}
                  </a>
                </h4>
              </div>
              <div id="collapse${i}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading${i}">
                <div class="panel-body">
                              
                        Información de mantenimiento para* ${fechaFormateada}

                          <div class="container mt-5">
                          <h2>Formulario de Cumplimiento de Mantenimiento</h2>
                        <form id="form_info_matenimiento" method="post" enctype="multipart/form-data">

                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="maintenanceDocs">Documentos de Mantenimiento</label>
                                          <input type="file" class="form-control-file" id="maintenanceDocs" name="maintenanceDocs" multiple>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="evidencePhotos">Fotos de Evidencia</label>
                                          <input type="file" class="form-control-file" id="evidencePhotos" name="evidencePhotos" multiple>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="observations">Observaciones</label>
                                          <textarea class="form-control" id="observations name="observations" rows="2" placeholder="Observaciones del mantenimiento"></textarea>
                                      </div>
                                  </div>              
                              </div>

                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="cost">Costo del Mantenimiento</label>
                                          <input type="number" class="form-control" id="cost" name="cost" placeholder="Costo en moneda local" required>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="duration">Duración del Mantenimiento (horas)</label>
                                          <input type="number" class="form-control" id="duration" name="duration" placeholder="Duración en horas" required>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="partsUsed">Piezas Usadas</label>
                                          <textarea class="form-control" id="partsUsed" name="partsUsed" rows="2" placeholder="Lista de piezas usadas en el mantenimiento"></textarea>
                                      </div>
                                  </div>
                              </div>

                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="residualParts">Piezas Residuales</label>
                                          <textarea class="form-control" id="residualParts" name="residualParts" rows="2" placeholder="Lista de piezas residuales del mantenimiento"></textarea>
                                      </div>
                                  </div>
                              </div>
                              <button type="submit" class="btn btn-primary">Guardar</button>
                              <?php
                              $ControladorPlanMantennimiento->ctrCrearInfoMatenimiento($_POST);
                              ?>
                          </form>
                      </div>
                </div>
              </div>
            </div>`;

      paneles.push(panelHTML);
    }

    // Insertar los paneles en el acordeón
    $('#accordion').html(paneles.join(''));
  }

  function generarCronogramaPersonalizado(fechaInicio, tipoProgramacion, intervalo) {
    var paneles = [];
    var fechas = calcularFechasCronogramaPersonalizado(fechaInicio, tipoProgramacion, intervalo);

    for (var i = 0; i < fechas.length; i++) {
      var fechaFormateada = fechas[i];
      // Generar HTML del panel
      var panelHTML = `
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="heading${i}">
                <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse${i}" aria-expanded="true" aria-controls="collapse${i}">
                    ${fechaFormateada}
                  </a>
                </h4>
              </div>
              <div id="collapse${i}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading${i}">
                <div class="panel-body">
                  Información de mantenimiento para ${fechaFormateada}

                          <div class="container mt-5">
                              <h2>Formulario de Cumplimiento de Mantenimiento</h2>
                              <form>

                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="maintenanceDocs">Documentos de Mantenimiento</label>
                                              <input type="file" class="form-control-file" id="maintenanceDocs" multiple>
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="evidencePhotos">Fotos de Evidencia</label>
                                              <input type="file" class="form-control-file" id="evidencePhotos" multiple>
                                          </div>
                                      </div>
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <label for="observations">Observaciones</label>
                                              <textarea class="form-control" id="observations" rows="2" placeholder="Observaciones del mantenimiento"></textarea>
                                          </div>
                                      </div>              
                                  </div>

                                  <div class="row">
                                    <div class="col-md-2">
                                          <div class="form-group">
                                              <label for="cost">Tipo de moneda</label>
                                              <input type="number" class="form-control" id="cost" placeholder="Costo en moneda local" required>
                                          </div>
                                      </div>  
                                    <div class="col-md-2">
                                          <div class="form-group">
                                              <label for="cost">Costo del Mantenimiento</label>
                                              <input type="number" class="form-control" id="cost" placeholder="Costo en moneda local" required>
                                          </div>
                                      </div>
                                      <div class="col-md-2">
                                          <div class="form-group">
                                              <label for="duration">Duración del Mantenimiento (horas)</label>
                                              <input type="number" class="form-control" id="duration" placeholder="Duración en horas" required>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="duration">Usuario que registra</label>
                                              <input type="text" class="form-control" id="usuarioqueregistra" value="<?php echo $_SESSION["usuario"] . " " . $_SESSION["nombre"]; ?>" required>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="duration">Proveedor</label>
                                              <input type="text" class="form-control" id="proveedor"  required>
                                          </div>
                                      </div>  
                                  
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <label for="partsUsed">Piezas Usadas</label>
                                              <textarea class="form-control" id="partsUsed" rows="2" placeholder="Lista de piezas usadas en el mantenimiento"></textarea>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <label for="residualParts">Piezas Residuales</label>
                                              <textarea class="form-control" id="residualParts" rows="2" placeholder="Lista de piezas residuales del mantenimiento"></textarea>
                                          </div>
                                      </div>
                                  </div>
                                  <button type="submit" class="btn btn-primary">Guardar</button>
                              </form>
                          </div>
                </div>
              </div>
            </div>`;
      paneles.push(panelHTML);
    }

    // Insertar los paneles en el acordeón
    $('#accordion').html(paneles.join(''));
  }

  function calcularFechasCronograma(fechaInicio, tipoProgramacion) {
    var fechas = [];
    var inicio = new Date(fechaInicio + 'T00:00:00'); // Establecer la fecha de inicio en la medianoche
    inicio.setMinutes(inicio.getMinutes() + inicio.getTimezoneOffset()); // Ajuste de zona horaria

    var intervalo = obtenerIntervalo(tipoProgramacion);

    for (var i = 0; i < 12; i += intervalo) {
      var fecha = new Date(inicio.getTime()); // Copiar la fecha de inicio
      fecha.setMonth(inicio.getMonth() + i); // Incrementar el mes según el intervalo

      fechas.push(fecha.toLocaleDateString());
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
        console.log(respuesta);
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
              '<td>' + registro.responsable_mantenimiento + '</td>' +
              '<td>' + registro.empresa_mantenimiento + '</td>' +
              '<td>' + registro.ubicacion_activo + '</td>' +
              '<td>' + registro.numero_serie + '</td>' +
              '<td>' + registro.prioridad_mantenimiento + '</td>' +
              '<td>' + registro.duracion_estimada + '</td>' +
              '<td>' + registro.costo_repuestos + '</td>' +
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
              '<a style="margin-top: 4px !important" href="javascript:void(0);" class="btn btn-info btn-xs btnEditarPlanMantenimiento" data-id="' + registro.id + '" data-toggle="modal" data-target="#modalEditarPlanMantenimiento"><i class="fa fa-pencil"></i> Editar</a>' +
              '<a style="margin-top: 4px !important" href="javascript:void(0);" class="btn btn-danger btn-xs btnEliminarPlanMantenimiento" data-id="' + registro.id + '" data-toggle="modal" data-target="#modalEliminarPlanMantenimiento"><i class="fa fa-pencil"></i> Eliminar</a>' +
              '<a style="margin-top: 4px !important" href="javascript:void(0);" class="btn btn-info btn-xs btnVerPlanMantenimiento" data-id="' + registro.id + '" data-tipo-programacion="' + registro.tipo_programacion + '" data-fecha-inicio="' + registro.fecha_inicio + '" data-kilometraje="' + registro.intervalo_kilometraje + '" data-horas="' + registro.intervalo_horas + '" data-toggle="modal" data-target="#modalVerCronograma"><i class="fa fa-pencil"></i> Ejecución de mantenimiento</a>' +
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
        console.log(item);
        var tipo = item.tipo_programacion
        $("#idPlanMantenimientoEditar").val(item.id);
        $("#actualizarActivoFijo").val(item.activos_fijos).trigger("change");
        $("#ActualizarFechaInicio").val(item.fecha_inicio);
        $("#updateintervaloKilometraje").val(item.intervalo_kilometraje)
        $("#updateintervaloHoras").val(item.intervalo_horas);
        $("#ActualizarTipoProgramacion").val(tipo).trigger("change");
        $("#ActualizarResponsableMantenimiento").val(item.responsable_mantenimiento).trigger("change");
        $("#ActualizarDocumentosMantenimiento").val(item.costo_litro);
        $("#ActualizarUbicacionActivo").val(item.ubicacion_activo);
        $("#ActualizarNumeroSerie").val(item.numero_serie);
        $("#ActualizarPrioridadMantenimiento").val(item.prioridad_mantenimiento);
        $("#ActualizarDuracionEstimada").val(item.duracion_estimada);
        $("#ActualizarCostoRepuestos").val(item.costo_repuestos);
        $("#ActualizarEmpresaMantenimiento").val(item.empresa_mantenimiento).trigger("change");
        $("#ActualizarObservaciones").val(item.observaciones);
        $("#editarDocumentoDb").val(item.documento);
        if (tipo == "kilometraje" || tipo == "horas") {
          var tipoProgramacion = tipo;
          var intervalo = tipoProgramacion === 'horas' ? item.intervalo_horas : item.intervalo_kilometraje;
          mostrarCronogramaPorTeclados2(item.fecha_inicio, tipoProgramacion, intervalo);
        } else {
          mostrarCronogramaUpdate(item.fecha_inicio, tipo);
        }
      }
    })

    $('#ActualizarFechaInicio, #ActualizarTipoProgramacion').change(function() {
      mostrarCronogramaUpdate();
    });
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
      var fechaInicio = new Date();
      var tipoProgramacion = $(this).attr('id') === 'intervaloHoras' ? 'horas' : 'kilometraje';
      var intervalo = parseInt($(this).val(), 10);
      var cronogramaContainer = $('#cronogramaContainer');
      var tbody = $('#cronogramaTable tbody');

      tbody.empty(); // Limpiar el cuerpo de la tabla actual

      if (isNaN(intervalo) || intervalo <= 0) {
        return; // Salir si el intervalo no es válido
      }

      var fechas = calcularFechasCronogramaPersonalizado(fechaInicio, tipoProgramacion, intervalo);

      fechas.forEach(function(fecha) {
        tbody.append(`<tr><td>${fecha}</td></tr>`);
      });

      cronogramaContainer.css('height', '300px').css('overflow-y', 'auto');
    });
  }

  function mostrarCronogramaPorTeclados() {
    $('#updateintervaloHoras, #updateintervaloKilometraje').on('input', function() {
      var fechaInicio = new Date();
      var tipoProgramacion = $(this).attr('id') === 'intervaloHoras' ? 'horas' : 'kilometraje';
      var intervalo = parseInt($(this).val(), 10);
      var cronogramaContainer = $('#UpdateCronogramaContainer');
      var tbody = $('#UpdateCronogramaTable tbody');

      tbody.empty(); // Limpiar el cuerpo de la tabla actual

      if (isNaN(intervalo) || intervalo <= 0) {
        return; // Salir si el intervalo no es válido
      }

      var fechas = calcularFechasCronogramaPersonalizado(fechaInicio, tipoProgramacion, intervalo);

      fechas.forEach(function(fecha) {
        tbody.append(`<tr><td>${fecha}</td></tr>`);
      });

      cronogramaContainer.css('height', '300px').css('overflow-y', 'auto');
    });
  }

  function calcularFechasCronogramaPersonalizado(fechaInicio, tipoProgramacion, intervalo) {
    var fechas = [];
    var fecha = new Date(fechaInicio.getTime());

    for (var i = 0; i < 24; i++) {
      if (tipoProgramacion === 'horas') {
        fecha.setHours(fecha.getHours() + intervalo);
      } else if (tipoProgramacion === 'kilometraje') {
        fecha.setDate(fecha.getDate() + i); // Ajustar el tiempo para visualizar el cambio
        fechas.push(`Kilómetro ${(i + 1) * intervalo}`);
        continue;
      }

      fechas.push(fecha.toLocaleString());
    }

    return fechas;
  }

  function mostrarCronogramaPorTeclados2(fechaInicio, tipoProgramacion, intervalo) {
    var fechaInicio = new Date();
    var cronogramaContainer = $('#UpdateCronogramaContainer');
    var tbody = $('#UpdateCronogramaTable tbody');

    tbody.empty(); // Limpiar el cuerpo de la tabla actual

    if (isNaN(intervalo) || intervalo <= 0) {
      return; // Salir si el intervalo no es válido
    }

    var fechas = calcularFechasCronogramaPersonalizado(fechaInicio, tipoProgramacion, intervalo);

    fechas.forEach(function(fecha) {
      tbody.append(`<tr><td>${fecha}</td></tr>`);
    });

    cronogramaContainer.css('height', '300px').css('overflow-y', 'auto');
  }
  $(document).ready(function() {
    mostrarCronogramaPorTecla();
    mostrarCronogramaPorTeclados();
    mostrarCronogramaPorTeclados2();
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
  }
</script>