<div class="content-wrapper">

  <section class="content-header">
    <h1>Habilitaciones de Fondos de Dinero</h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Habilitaciones de Fondos</li>
    </ol>
  </section>
  <?php
  require_once "controladores/habilitaciones.controlador.php";
  require_once "modelos/habilitaciones.modelo.php";
  $ControladorHabilitaciones = new ControladorHabilitaciones();
  ?>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarHabilitacion">
          <i class="fa fa-plus"></i> Agregar Habilitación de Fondo
        </button>
      </div>

      <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive" id="tablaHabilitaciones" width="100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Empleado Responsable</th>
              <th>Departamento</th>
              <th>Motivo</th>
              <th>Vehículo</th>
              <th>Direccion Partida</th>
              <th>Direccion Llegada</th>
              <th>Fecha Inicio</th>
              <th>Fecha Fin</th>
              <th>Monto</th>
              <th>Estado</th>
              <th>Metodo de pago</th>
              <th>Detalle de pago</th>
              <th>Aprobador</th>
              <th>Notas</th>
              <th>Doc final</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <!-- Datos serán cargados dinámicamente -->
          </tbody>
        </table>
      </div>
    </div>

  </section>

</div>

<!-- Modal para agregar habilitación -->
<div id="modalAgregarHabilitacion" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="formAgregarHabilitacion" method="POST">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar Habilitación de Fondo</h4>
        </div>

        <div class="modal-body">
          <div class="box-body">
            <!-- Empleado Responsable -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <?php $datos = ControladorHabilitaciones::ctrMostrar('proveedores', 'categoria', 'colaborador'); ?>

                <select class="form-control select2" id="empleado" name="empleado_responsable" style="width: 100%;"
                  required>
                  <option value="">Seleccionar Colaborador</option>
                  <?
                  foreach ($datos as $data) {
                    echo '<option value="' . $data['proveedor_pk'] . '">' . $data['razon_social'] . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
            <!-- Departamento -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-building"></i></span>
                <input type="text" class="form-control" name="departamento" placeholder="Departamento" required>
              </div>
            </div>
            <!-- Motivo -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-comment"></i></span>
                <select class="form-control" name="motivo" id="motivo" required>
                  <option value="">Selection Motivo</option>
                  <option value="Provisión para conductor por viajes">Provisión para conductor por viajes</option>
                  <option value="Gastos administrativos">Gastos administrativos</option>
                  <option value="Gastos mantenimiento">Gastos mantenimiento</option>
                  <option value="Adelanto de sueldo">Adelanto de sueldo</option>
                </select>
              </div>
            </div>
            <!-- Campos adicionales para Provisión para conductor por viajes -->
            <div id="camposAdicionales" style="display: none;">
              <!-- Vehículo -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-car"></i></span>
                  <input type="text" class="form-control" name="vehiculo" placeholder="Vehículo">
                </div>
              </div>
              <!-- Dirección de partida -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                  <input type="text" class="form-control" name="direccion_partida" placeholder="Dirección de partida">
                </div>
              </div>
              <!-- Dirección de llegada -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                  <input type="text" class="form-control" name="direccion_llegada" placeholder="Dirección de llegada">
                </div>
              </div>
            </div>
            <!-- Fecha de Inicio -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="date" class="form-control" name="fecha_inicio" required>
              </div>
            </div>
            <!-- Fecha de Fin -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="date" class="form-control" name="fecha_fin">
              </div>
            </div>
            <!-- Monto -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-money"></i></span>
                <input type="number" class="form-control" name="monto" placeholder="Monto" required>
              </div>
            </div>
            <!-- Estado -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-info-circle"></i></span>
                <select class="form-control" name="estado" required>
                  <option value="Pendiente">Pendiente</option>
                  <option value="Aprobado">Aprobado</option>
                  <option value="Rechazado">Rechazado</option>
                </select>
              </div>
            </div>
            <!-- Método de Pago -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                <select class="form-control" name="metodo_pago" required>
                  <option value="Efectivo">Efectivo</option>
                  <option value="Cheque">Cheque</option>
                  <option value="Transferencia Bancaria">Transferencia Bancaria</option>
                </select>
              </div>
            </div>
            <!-- Detalles del Pago -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-info"></i></span>
                <input type="text" class="form-control" name="detalles_pago" placeholder="Detalles del Pago" required>
              </div>
            </div>
            <!-- Aprobador -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                <input type="text" class="form-control" name="aprobador" placeholder="Aprobador" required>
              </div>
            </div>
            <!-- Notas Adicionales -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-sticky-note"></i></span>
                <textarea class="form-control" name="notas_adicionales" placeholder="Notas Adicionales"></textarea>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer mf_crear">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Habilitación</button>
        </div>

      </form>
    </div>
  </div>
</div>

<!-- Modal para editar habilitación -->
<div id="modalEditarHabilitacion" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 99%;">
    <div class="modal-content">
      <div class="modal-header" style="background:#3c8dbc; color:white">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-edit"></i> Editar Habilitación de Fondo</h4>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12 form-group">
            <div class="col-lg-6 form-group">
              <form id="formEditarHabilitacion" role="form" method="POST">
                <div class="col-lg-6 form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <?php $datos = ControladorHabilitaciones::ctrMostrar('proveedores', 'categoria', 'colaborador'); ?>

                    <select class="form-control select2" id="empleadoResponsableEditar" name="empleado_responsable"
                      style="width: 100%;" required>
                      <option value="">Seleccionar Colaborador</option>
                      <?
                      foreach ($datos as $data) {
                        echo '<option value="' . $data['proveedor_pk'] . '">' . $data['razon_social'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                  <input type="hidden" id="idHabilitacionEditar" name="id_habilitacion">
                </div>

                <div class="col-lg-6 form-group">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-building"></i></span>
                      <input type="text" class="form-control" id="departamentoEditar" name="departamento"
                        placeholder="Departamento" required>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-comment"></i></span>
                    <select class="form-control" name="motivo" id="motivoEditar" required>
                      <option value="">Selection Motivo</option>
                      <option value="Provisión para conductor por viajes">Provisión para conductor por viajes</option>
                      <option value="Gastos administrativos">Gastos administrativos</option>
                      <option value="Gastos mantenimiento">Gastos mantenimiento</option>
                      <option value="Adelanto de sueldo">Adelanto de sueldo</option>
                    </select>
                  </div>
                </div>
                <div id="camposAdicionalesEditar" style="display: none;">
                  <div class="col-lg-6 form-group">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-car"></i></span>
                        <input type="text" class="form-control" id="vehiculoEditar" name="vehiculo"
                          placeholder="Vehículo">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 form-group">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker-alt"></i></span>
                        <input type="text" class="form-control" id="direccionPartidaEditar" name="direccion_partida"
                          placeholder="Dirección de partida">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 form-group">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker-alt"></i></span>
                        <input type="text" class="form-control" id="direccionLlegadaEditar" name="direccion_llegada"
                          placeholder="Dirección de llegada">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 form-group">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                      <input type="date" class="form-control" id="fechaInicioEditar" name="fecha_inicio" required>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 form-group">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                      <input type="date" class="form-control" id="fechaFinEditar" name="fecha_fin">
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 form-group">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-money"></i></span>
                      <input type="number" class="form-control" id="montoEditar" name="monto" placeholder="Monto"
                        required>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 form-group">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-info-circle"></i></span>
                      <select class="form-control" id="estadoEditar" name="estado" required>
                        <option value="Pendiente">Pendiente</option>
                        <option value="Aprobado">Aprobado</option>
                        <option value="Rechazado">Rechazado</option>
                        <option value="Cerrado">Cerrado</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 form-group">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                      <select class="form-control" id="metodoPagoEditar" name="metodo_pago" required>
                        <option value="Efectivo">Efectivo</option>
                        <option value="Cheque">Cheque</option>
                        <option value="Transferencia Bancaria">Transferencia Bancaria</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 form-group">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-info"></i></span>
                      <input type="text" class="form-control" id="detallesPagoEditar" name="detalles_pago"
                        placeholder="Detalles del Pago" required>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 form-group">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                      <input type="text" class="form-control" id="aprobadorEditar" name="aprobador"
                        placeholder="Aprobador" required>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 form-group">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-sticky-note"></i></span>
                      <textarea class="form-control" id="notasAdicionalesEditar" name="notas_adicionales"
                        placeholder="Notas Adicionales"></textarea>
                    </div>
                  </div>
                </div>
                <!-- <div class="col-lg-6 form-group">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-money"></i></span>
                      <input type="number" class="form-control" id="devolucion" name="devolucion"
                        placeholder="Monto para devolución" step="0.01">
                    </div>
                  </div>
                </div> -->
                <div class="col-lg-6 form-group">
                  <div class="form-group">
                    <label for="devolucion">Monto para devolución</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-money"></i></span>
                      <input type="number" class="form-control" id="devolucion" name="devolucion" placeholder="Monto para devolución" step="0.01">
                    </div>
                  </div>
                </div>

                <div class="col-lg-6 form-group">
                  <div class="form-group">
                    <label for="devolucion">Monto para Descuento</label>

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-money"></i></span>
                      <input type="number" class="form-control" id="descuento" name="descuento"
                        placeholder="Monto para descuento" step="0.01">
                    </div>
                  </div>
                </div>
                <div class="col-lg-12 form-group">
                  <fieldset class="bordered">
                    <div class="col-lg-6 form-group">
                      <div class="form-group">
                        <label for="gastos_tt">Gasto Total</label>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-money"></i></span>
                          <input type="number" class="form-control" id="gastos_tt" name="gastos_tt"
                            placeholder="Gasto Total" step="0.01">
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 form-group">
                      <div class="form-group">
                        <label for="gastos_ff">Saldo a Favor</label>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-money"></i></span>
                          <input type="number" class="form-control" id="gastos_ff" name="gastos_ff"
                            placeholder="Gastos Totales" step="0.01">
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 form-group">
                      <label for="doc_final_hd">Doc. final</label>
                      <input type="file" class="form-control-file" id="doc_final_hd" name="doc_final_hd" multiple>
                      <input type="hidden" class="form-control-file" id="doc_final_hd_db" name="doc_final_hd_db" multiple>
                    </div>
                  </fieldset>
                </div>
                <div class="modal-footer mf_editar">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                  <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
                <?php
                if (isset($_POST['idHabilitacionEditar']) && !empty($_POST['idHabilitacionEditar'])) {
                  $ControladorHabilitaciones->ctrActualizarHabilitaciones($_POST);
                }
                ?>
              </form>
            </div>
            <div class="col-lg-6 form-group">
              <fieldset class="bordered">
                <legend>&nbsp;Montos de habilitación</legend>
                <form id="formRegistro" method="POST" enctype="multipart/form-data">
                  <input type="hidden" class="form-control" id="idhabilitacion" name="idhabilitacion" required readonly>

                  <div class="col-lg-6 form-group">
                    <div class="form-group">
                      <label for="fecha_h">Fecha</label>
                      <input type="date" class="form-control" id="fecha_h" name="fecha_h" required>
                    </div>
                  </div>
                  <div class="col-lg-6 form-group">
                    <div class="form-group">
                      <label for="montoGasto">Monto</label>
                      <input type="number" class="form-control" id="montoGasto" name="montoGasto" required step="0.01">
                    </div>
                  </div>
                  <div class="col-lg-6 form-group">
                    <label for="evidencia_h">Doc. de referencia</label>
                    <input type="file" class="form-control-file" id="evidencia_h" name="evidencia_h" multiple>
                  </div>
                  <div class="col-lg-6 form-group"></div>
                  <div class="modal-footer btn_habili_hd">
                    <button type="submit" class="btn btn-primary ">Registrar</button>
                  </div>
                </form>
              </fieldset>
              <table class="table table-bordered" id="tableRegistro">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Doc</th>
                    <th scope="col">Accion</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Incluye jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Incluye Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- Incluye DataTables JS -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<!-- Inicializa DataTables y maneja el formulario -->
<script>
  var state;
  $(document).ready(function() {
    cargarDatos();
  });
  $('#formAgregarHabilitacion').on('submit', function(e) {
    e.preventDefault();
    var forData = new FormData(this);
    forData.append('accion', "registrar");
    $.ajax({
      url: 'controladores/habilitaciones.controlador.php',
      type: 'POST',
      data: forData,
      processData: false,
      contentType: false,
      success: function(resp) {
        console.log(resp);
        if (resp === 'ok') {
          swal({
            type: "success",
            title: "La habilitacion ha sido registrado correctamente",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
          }).then((result) => {
            if (result.value) {
              window.location = "habilitaciones";
            }
          })
        }
      }
    });
  })
  $("#formEditarHabilitacion").on("submit", function(e) {
    e.preventDefault();
    console.log("submit");
    var forData = new FormData(this);
    forData.append('accion', "editar");
    $.ajax({
      url: 'controladores/habilitaciones.controlador.php',
      type: 'POST',
      data: forData,
      processData: false,
      contentType: false,
      success: function(resp) {
        console.log(resp);
        if (resp === 'ok') {
          swal({
            type: "success",
            title: "Las habilitaciones han sido editado correctamente",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
          }).then((result) => {
            if (result.value) {
              window.location = "habilitaciones";
            }
          })
        }
      }
    });
  });

  function cargarDatos() {
    $.ajax({
      url: "modelos/habilitaciones.modelo.php",
      method: "POST",
      data: {
        ajaxservice: 'loadData'
      },
      dataType: "json",
      success: function(respuesta) {
        $('#tablaHabilitaciones tbody').empty();
        if (respuesta && respuesta.length > 0) {
          $.each(respuesta, function(index, registro) {
            var fila = '<tr>' +
              '<td>' + registro.id + '</td>' +
              '<td>' + registro.razon_social + '</td>' +
              '<td>' + registro.departamento + '</td>' +
              '<td>' + registro.motivo + '</td>' +
              '<td>' + registro.vehiculo + '</td>' +
              '<td>' + registro.direccion_partida + '</td>' +
              '<td>' + registro.direccion_llegada + '</td>' +
              '<td>' + registro.fecha_inicio + '</td>' +
              '<td>' + registro.fecha_fin + '</td>' +
              '<td>' + registro.monto + '</td>' +
              '<td>' + registro.estado + '</td>' +
              '<td>' + registro.metodo_pago + '</td>' +
              '<td>' + registro.detalles_pago + '</td>' +
              '<td>' + registro.aprobador + '</td>' +
              '<td>' + registro.notas_adicionales + '</td>' +
              '<td>';
            var firma = registro.doc_final;
            if (firma) {
              fila += '<a href="' + firma + '" target="_blank">  <i class="fa fa-file"> doc</i></a> <br>';
            } else {
              fila += '<i class="fa fa-file text-muted"> doc </i> <br>';
            }
            fila += '</td>' +
              '<td>' +
              '<center>' +
              '<a style="margin-top: 4px !important" " class="btn btn-info btn-xs btnEditarHabilitaciones" data-id="' + registro.id + '" data-toggle="modal" data-target="#modalEditarHabilitacion"><i class="fa fa-pencil"></i> Editar</a>' +
              '<a style="margin-top: 4px !important" " class="btn btn-danger btn-xs btnEliminarHabilitaciones" data-id="' + registro.id + '" data-toggle="modal" data-target="#modalEliminarHabilitacion"><i class="fa fa-pencil"></i> Eliminar</a>' +
              '</center>' +
              '</td>' +
              '</tr>';
            $('#tablaHabilitaciones tbody').append(fila);
          });
        }
      },
    });
  }

  $(document).on('click', '.btnEditarHabilitaciones', function() {
    var idA = $(this).data('id');
    var datos = new FormData();
    datos.append("idaa", idA);
    datos.append("ajaxservice", 'loadEdit');
    $("#idHabilitacionEditar").val($(this).data('id'));
    $.ajax({
      url: "modelos/habilitaciones.modelo.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(item) {
        $.each(item, function(index, registro) {
          $("#idHabilitacionEditar").val(registro.id);
          $('#empleadoResponsableEditar').val(registro.empleado_responsable);
          $('#departamentoEditar').val(registro.departamento);
          $('#motivoEditar').val(registro.motivo).trigger("change");
          $('#vehiculoEditar').val(registro.vehiculo);
          $('#direccionPartidaEditar').val(registro.direccion_partida);
          $('#direccionLlegadaEditar').val(registro.direccion_llegada);
          $('#fechaInicioEditar').val(registro.fecha_inicio);
          $('#fechaFinEditar').val(registro.fecha_fin);
          $('#montoEditar').val(registro.monto);
          $('#estadoEditar').val(registro.estado).trigger("change");
          $('#metodoPagoEditar').val(registro.metodo_pago).trigger("change");
          $('#detallesPagoEditar').val(registro.detalles_pago);
          $('#aprobadorEditar').val(registro.aprobador);
          $('#notasAdicionalesEditar').val(registro.notas_adicionales);
          $('#devolucion').val(registro.devolucion);
          $('#descuento').val(registro.descuento);
          $('#gastos_tt').val(registro.gastos_tt);

          $('#idhabilitacion').val(registro.id);
          $('#gastos_ff').val(registro.gastos_ff);
          $('#doc_final_hd_db').val(registro.doc_final);

          state = registro.estado;
          if (state === "Cerrado") {
            $('.mf_editar', ).find('button').hide();
            $('.btn_habili_hd').find('button').hide();
          } else {
            $('.mf_editar').find('button').show();
            $('.btn_habili_hd').find('button').show();

          }
          cargarDatos_H_D(registro.id);
        });
      }
    })
  });
  $(document).on('click', '.btnEliminarHabilitaciones', function() {
    var idA = $(this).data('id');
    var confirmar = confirm("¿Estás seguro de que quieres eliminar esta habilitacion?");
    if (confirmar) {
      var datos = new FormData();
      datos.append("idEliminar", idA);
      datos.append("ajaxservice", 'eliminar');
      $("#idHabilitacionEditar").val($(this).data('id'));

      $.ajax({
        url: "modelos/habilitaciones.modelo.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
          if (respuesta == "ok") {
            alert("Habilitacion eliminado correctamente");
            cargarDatos();
          } else {
            alert("Error al eliminar la habilitacion. Por favor, inténtalo de nuevo.");
          }
        }
      });
    }
  });
  document.addEventListener('DOMContentLoaded', function() {
    var selectMotivo = document.getElementById('motivo');
    var selectMotivoEditar = document.getElementById('motivoEditar');
    var camposAdicionales = document.getElementById('camposAdicionales');
    var camposAdicionalesEditar = document.getElementById('camposAdicionalesEditar');

    // Event listener for the 'motivo' select element
    selectMotivo.addEventListener('change', function() {
      if (selectMotivo.value === 'Provisión para conductor por viajes') {
        camposAdicionales.style.display = 'block';
      } else {
        camposAdicionales.style.display = 'none';
      }
    });

    // Event listener for the 'motivoEditar' select element
    $(selectMotivoEditar).on('change', function() {
      if (selectMotivoEditar.value === 'Provisión para conductor por viajes') {
        camposAdicionalesEditar.style.display = 'block';
      } else {
        camposAdicionalesEditar.style.display = 'none';
      }
    });
  });
  $(document).on('submit', '#formRegistro', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('accion', 'cargar_d_h');

    $.ajax({
      url: 'controladores/habilitaciones.controlador.php',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      dataType: "json",

      success: function(resp) {
        console.log(resp);
        if (resp == "ok") {
          swal({
            type: "success",
            title: "El detalle de habilitacion ha sido registrado correctamente",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
          }).then((result) => {
            if (result.value) {
              window.location = "habilitaciones";
            }
          })
        } else {
          console.log('no es ok')
        }
      }
    });
  })

  // function cargarDatos_H_D(id_h) {
  //   $.ajax({
  //     url: "modelos/habilitaciones.modelo.php",
  //     method: "POST",
  //     data: {
  //       ajaxservice: 'loadData_h_d',
  //       table: 'habilitaciones_dests',
  //       id: id_h
  //     },
  //     dataType: "json",
  //     success: function(respuesta) {
  //       console.log(respuesta);
  //       $('#tableRegistro tbody').empty();
  //       if (respuesta && respuesta.length > 0) {
  //         $.each(respuesta, function(index, registro) {
  //           var fila = '<tr>' +
  //             '<td>' + registro.id + '</td>' +
  //             '<td>' + registro.fecha_h_d + '</td>' +
  //             '<td>' + registro.monto_h_d + '</td>' +
  //             '<td>';
  //           var firma = registro.doch_h_d;
  //           if (firma) {
  //             fila += '<a href="' + firma + '" target="_blank">  <i class="fa fa-file"> doc</i></a> <br>';
  //           } else {
  //             fila += '<i class="fa fa-file text-muted"> doc </i> <br>';
  //           }
  //           fila += '</td>' +
  //             '<td>' +
  //             '<center>' +
  //             '<a style="margin-top: 4px !important" " class="btn btn-danger btn-xs btnEliminarHD" data-id="' + registro.id + '" data-toggle="modal" data-target="#modalEliminarHabilitacion"><i class="fa fa-pencil"></i> Eliminar</a>' +
  //             '</center>' +
  //             '</td>' +
  //             '</tr>';
  //           $('#tableRegistro tbody').append(fila);
  //         });
  //       }
  //     },
  //   });
  // }
  // function cargarDatos_H_D(id_h) {
  //   $.ajax({
  //     url: "modelos/habilitaciones.modelo.php",
  //     method: "POST",
  //     data: {
  //       ajaxservice: 'loadData_h_d',
  //       table: 'habilitaciones_dests',
  //       id: id_h
  //     },
  //     dataType: "json",
  //     success: function(respuesta) {
  //       console.log(respuesta);
  //       $('#tableRegistro tbody').empty();
  //       let totalMonto = 0; // Inicializa el total en 0

  //       if (respuesta && respuesta.length > 0) {
  //         $.each(respuesta, function(index, registro) {
  //           var fila = '<tr>' +
  //             '<td>' + registro.id + '</td>' +
  //             '<td>' + registro.fecha_h_d + '</td>' +
  //             '<td>' + registro.monto_h_d + '</td>' +
  //             '<td>';
  //           var firma = registro.doch_h_d;
  //           if (firma) {
  //             fila += '<a href="' + firma + '" target="_blank">  <i class="fa fa-file"> doc</i></a> <br>';
  //           } else {
  //             fila += '<i class="fa fa-file text-muted"> doc </i> <br>';
  //           }
  //           fila += '</td>' +
  //             '<td>' +
  //             '<center>' +
  //             '<a style="margin-top: 4px !important" class="btn btn-danger btn-xs btnEliminarHD" data-id="' + registro.id + '" data-toggle="modal" data-target="#modalEliminarHabilitacion"><i class="fa fa-pencil"></i> Eliminar</a>' +
  //             '</center>' +
  //             '</td>' +
  //             '</tr>';

  //           $('#tableRegistro tbody').append(fila);

  //           // Sumar el monto actual al total
  //           totalMonto += parseFloat(registro.monto_h_d);
  //         });

  //         // Agregar una fila al final con el total
  //         var filaTotal = '<tr>' +
  //           '<td colspan="2"><strong>Total</strong></td>' +
  //           '<td><strong>' + totalMonto.toFixed(2) + '</strong></td>' +
  //           '<td colspan="2"></td>' +
  //           '</tr>';

  //         $('#tableRegistro tbody').append(filaTotal);
  //       }
  //     },
  //   });
  // }
  function cargarDatos_H_D(id_h) {
    $.ajax({
      url: "modelos/habilitaciones.modelo.php",
      method: "POST",
      data: {
        ajaxservice: 'loadData_h_d',
        table: 'habilitaciones_dests',
        id: id_h
      },
      dataType: "json",
      success: function(respuesta) {
        console.log(respuesta);
        $('#tableRegistro tbody').empty();
        let totalMonto = 0; // Inicializa el total en 0

        if (respuesta && respuesta.length > 0) {
          $.each(respuesta, function(index, registro) {
            var fila = '<tr>' +
              '<td>' + registro.id + '</td>' +
              '<td>' + registro.fecha_h_d + '</td>' +
              '<td>' + registro.monto_h_d + '</td>' +
              '<td>';
            var firma = registro.doch_h_d;
            if (firma) {
              fila += '<a href="' + firma + '" target="_blank">  <i class="fa fa-file"> doc</i></a> <br>';
            } else {
              fila += '<i class="fa fa-file text-muted"> doc </i> <br>';
            }
            fila += '</td>' +
              '<td>' + '<center>';
            if (state !== "Cerrado") {
              fila += '<a style="margin-top: 4px !important" class="btn btn-danger btn-xs btnEliminarHD" data-id="' + registro.id + '" data-toggle="modal" data-target="#modalEliminarHabilitacion"><i class="fa fa-pencil"></i> Eliminar</a>';
            }
            fila += '</center>' + '</td>' + '</tr>';

            $('#tableRegistro tbody').append(fila);

            // Sumar el monto actual al total
            totalMonto += parseFloat(registro.monto_h_d);
          });

          // Agregar una fila al final con el total
          var filaTotal = '<tr>' +
            '<td colspan="2"><strong>EFECTIVO TOTAL RECIBIDO</strong></td>' +
            '<td><strong>' + totalMonto.toFixed(2) + '</strong></td>' +
            '<td colspan="2"></td>' +
            '</tr>';

          $('#tableRegistro tbody').append(filaTotal);

          // Obtener valores de los campos gastos_ff y gastos_tt
          var gastos_ff = parseFloat($('#gastos_ff').val()) || 0;
          var gastos_tt = parseFloat($('#gastos_tt').val()) || 0;

          // Calcular Total Total
          var totalTotal = totalMonto - (gastos_ff + gastos_tt);

          // Agregar una fila al final con el Total Total
          var filaTotalTotal = '<tr>' +
            '<td colspan="2"><strong>TOTAL FINAL</strong></td>' +
            '<td><strong>' + totalTotal.toFixed(2) + '</strong></td>' +
            '<td colspan="2"></td>' +
            '</tr>';

          $('#tableRegistro tbody').append(filaTotalTotal);
        }
      },
    });
  }


  $(document).on('click', '.btnEliminarHD', function(e) {
    e.preventDefault();
    var idA = $(this).data('id');
    console.log(idA);
    $.ajax({
      url: "modelos/habilitaciones.modelo.php",
      method: "POST",
      data: {
        ajaxservice: 'eliminar_hd',
        id: idA
      },
      dataType: "json",
      success: function(respuesta) {
        console.log(respuesta);
        if (respuesta == 'ok') {
          swal({
            type: "success",
            title: "El detalle de habilitacion ha sido Eliminado correctamente",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
          }).then((result) => {
            if (result.value) {
              window.location = "habilitaciones";
            }
          })
        }
      },
    });
  })
</script>