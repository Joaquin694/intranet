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
</style>
<div class="content-wrapper">
  <section class="content-header">
    <h1>SOLICITUD DE SALIDA DE ALMACÉN</h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar Solicitudes de Salida</li>
    </ol>
  </section>

  <?php
  require_once "controladores/solicitud_salida.controlador.php";
  require_once "modelos/solicitud_salida.modelo.php";

  $ControladorSolicitudSalida = new ControladorSolicitudSalida();
  ?>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevaSolicitud"> <i class="fa fa-plus" aria-hidden="true"></i> Agregar Solicitud </button>
      </div>


      <div class="box-body table-responsive">

        <table class="table table-bordered table-striped dt-responsive tablas">
          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>Almacén origen</th>
              <th>Código</th>
              <th>Producto</th>
              <th>Foto</th>
              <th>Cantidad</th>
              <th>Fecha de necesidad</th>
              <th>Fecha de solicitud</th>
              <th>Usuario que solicita</th>
              <th>Comentario</th>
              <th>Estado</th>
              <th>Usuario que atendió entrega</th>
              <th>fecha que atendió entrega</th>
              <th>fecha que registro en el sistema</th>
              <th>COLABORADOR QUE RECIBE</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $item = null;
            $valor = null;
            $array = $ControladorSolicitudSalida->ctrMostrarSolicitudSalidaAlmacen($item, $valor);
            foreach ($array as $key => $value) {
              $estadoClase = ($value["estado"] == 1) ? 'estado-pendiente' : (($value["estado"] == 2) ? 'estado-atendida' : 'estado-anulada');
              $estadoTexto = ($value["estado"] == 1) ? 'Pendiente' : (($value["estado"] == 2) ? 'Atendida' : 'Anulada');
              $estado = '<span class="estado-cuadro ' . $estadoClase . '">' . $estadoTexto . '</span>';


              // Construir el botón de editar si el estado es 1
              $botonEditar = '';
              $botonSalida = '';
              if ($value["estado"] == 1) {
                $botonEditar = '<a style="margin-top: 4px !important" href="javascript:void(0);" class="btn btn-info btn-xs btnEditarSolicitud" data-id="' . $value["id"] . '"  data-toggle="modal" data-target="#modalEditarSolicitud"><i class="fa fa-pencil"></i> Editar</a>';
                $botonSalida = '<a style="margin-top: 4px !important" href="javascript:void(0);" class="btn btn-warning btn-xs btnActivarModalSalida"          data-id="' . $value["id"] . '"  data-toggle="modal" data-target="#modalSalidargtsld"><i class="fa fa-pencil"></i> Despachar</a>';
              } else {
                // añadir: acá añadir dos botones (modal traslados almacen -  modal salidas almacen)
              }
                  echo '<tr>
                        <td>' . ($key + 1) . '</td>
                        <td class="text-uppercase">' . $value["almacen"] . '</td>
                        <td class="text-uppercase">' . $value["codigo"] . '</td>
                        <td class="text-uppercase">' . $value["descripcion"] . '</td>
                        <td class="text-uppercase"><img src="' . $value["imagen"] . '"> </td>
                        <td class="text-uppercase">' . $value["cantidad"] . '</td>
                        <td class="text-uppercase">' . $value["fecha_necesidad"] . '</td>
                        <td class="text-uppercase">' . $value["fecha_solicitud"] . '</td>
                        <td class="text-uppercase">' . $value["usuario"] . '</td>
                        <td class="text-uppercase">' . $value["comentario"] . '</td>   
                        <td class="text-uppercase">' . $estado . '</td>     
                        <td>' . $value["usuario_despache"] . '</td>    
                        <td>' . $value["fecha_despacho"] . '</td>    
                        <td>' . $value["fecha_registro"] . '</td>   
                        <td>' . $value["nombre_colaborador"].'</td>
                        <td ><center>' . $botonEditar  /* añadir: acá añadir dos botones (modal traslados almacen -  modal salidas almacen)*/ . '<br>' . $botonSalida . '</center></td>
                      </tr>';
            }
            ?>

          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>

<!-- MODAL NUEVA SOLICITUD -->
<div id="modalNuevaSolicitud" class="modal fade" role="dialog">
  <div class="modal-dialog modal-dialog-wide">
    <div class="modal-content">
      <form role="form" method="post" id="formularioRegistraSolicitud">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Registrar Solicitud</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">

            <!-- Input para el almacén -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <!-- Añadimos el subtítulo o etiqueta aquí -->
                <label for="RegistraSolicitudAlmacen">Almacén</label>

                <?php $almacenes = ControladorSolicitudSalida::ctrMostrar('almacenes', 'id', '1', '>'); ?>

                <select class="form-control input-lg" id="RegistraSolicitudAlmacen" name="RegistraSolicitudAlmacen" required>
                  <option value="">Seleccionar almacén</option>
                  <?php
                  foreach ($almacenes as $almacen) {
                    echo '<option value="' . $almacen['id'] . '">' . $almacen['almacen'] . '</option>';
                  }
                  ?>
                </select>

              </div>
            </div>


            <!-- Input para el producto -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <!-- Añadimos el subtítulo o etiqueta aquí -->
                <label for="RegistraSolicitudAlmacen">Producto</label>
                <select class="form-control input-lg" id="RegistraSolicitudProducto" name="RegistraSolicitudProducto" required>
                  <option value="">Seleccionar producto</option>
                  <!-- Los productos se cargarán aquí a través de AJAX -->
                </select>
              </div>
            </div>


            <!-- Input para la cantidad -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <!-- Añadimos el subtítulo o etiqueta aquí -->
                <label for="RegistraSolicitudAlmacen">Cantidad</label>
                <input type="number" class="form-control input-lg" id="RegistraSolicitudCantidad" name="RegistraSolicitudCantidad" placeholder="Cantidad" disabled required>
              </div>
            </div>

            <hr>
            <div class="form-group" id='tnlproductoselectauditor'></div>
            <hr>

            <!-- Input para la fecha de necesidad -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <!-- Añadimos el subtítulo o etiqueta aquí -->
                <label for="RegistraSolicitudAlmacen">Fecha de necesidad</label>
                <input type="date" class="form-control input-lg" id="RegistraSolicitudFechaNecesidad" name="RegistraSolicitudFechaNecesidad" required>
              </div>
            </div>


            <!-- Textarea para el comentario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-comment"></i></span>
                <!-- Añadimos el subtítulo o etiqueta aquí -->
                <label for="RegistraSolicitudAlmacen">Comentario</label>
                <textarea class="form-control" rows="3" id="RegistraSolicitudComentario" name="RegistraSolicitudComentario" placeholder="Comentario" required></textarea>
              </div>
            </div>
            <!-- Select para el estado -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                <!-- Añadimos el subtítulo o etiqueta aquí -->
                <label for="RegistraSolicitudAlmacen">Estado</label>
                <select class="form-control input-lg" id="RegistraSolicitudEstado" name="RegistraSolicitudEstado" required disabled>
                  <option value="">Seleccionar estado</option>
                  <option value="1" selected>Pendiente</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
        <?php
        if (isset($_POST['RegistraSolicitudAlmacen']) && !empty($_POST['RegistraSolicitudAlmacen'])) {

          // La variable existe y tiene un valor no vacío
          $ControladorSolicitudSalida->ctrCrearSolicitud();
        }
        ?>
      </form>
    </div>
  </div>
</div>






<!-- MODAL SALIDA DE ALMACEN -->
<div id="modalSalidargtsld" class="modal fade" role="dialog">
  <div class="modal-dialog modal-dialog-wide">
    <div class="modal-content">
      <form role="form" method="post" id="formularioSalidargtsld">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Efectuar Salida de Almacen</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class='row'>
              <!-- Input para el almacén -->
              <div class="form-group col-lg-6">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                  <label for="rgtsldSalidaAlmacenAlmacen">Almacén</label>
                  <input type="hidden" id="rgtsldidSalidaAlmacen" name="rgtsldidSalidaAlmacen" value="">


                  <input type="text" class="form-control input-lg" id="rgtsldSalidaAlmacenAlmacen" disabled>
                  <input type="hidden" name="rgtsldSalidaAlmacenAlmacen" id="rgtsldSalidaAlmacenAlmacenVisualD">
                  <input type="hidden" name="rgtsldfk_almacenid" id="rgtsldfk_almacenid">
                </div>
              </div>
              <!-- Input para el producto -->
              <div class="form-group col-lg-6">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                  <label for="rgtsldSalidaAlmacenProducto">Producto</label>
                  <input type="text" class="form-control input-lg" id="rgtsldSalidaAlmacenProducto" name="rgtsldSalidaAlmacenProducto" required disabled>
                  <input type="hidden" name="rgtsscodigoProducto" id="rgtsscodigoProducto">
                </div>
              </div>
            </div>
            <div class='row'>
              <!-- Input para la cantidad -->
              <div class="form-group col-lg-4">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                  <label for="rgtsldSalidaAlmacenCantidad">Cantidad</label>
                  <input type="number" class="form-control input-lg" id="rgtsldSalidaAlmacenCantidad" name="rgtsldSalidaAlmacenCantidad" readonly required>
                </div>
              </div>
              <!-- Input para la fecha de entrega requerida -->
              <div class="form-group col-lg-4">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <label for="rgtsldSalidaAlmacenFechaNecesidadReq">Fecha del entrega requerida</label>
                  <input type="date" class="form-control input-lg" id="rgtsldSalidaAlmacenFechaNecesidadReq" name="rgtsldSalidaAlmacenFechaNecesidadReq" required disabled>
                </div>
              </div>
              <!-- Input para la fecha de despacho -->
              <div class="form-group col-lg-4">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <label for="rgtsldSalidaAlmacenFechaDespacho">Fecha de despacho</label>
                  <input type="date" class="form-control input-lg" id="rgtsldSalidaAlmacenFechaDespacho" name="rgtsldSalidaAlmacenFechaDespacho" required>
                </div>
              </div>
            </div>
            <div class='row'>
              <!-- Input para el usuario que solicita -->
              <div class="form-group col-lg-6">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <label for="rgtsldSalidaAlmacenUsuario">Usuario que solicita</label>
                  <input type="text" class="form-control input-lg" id="rgtsldSalidaAlmacenUsuario" name="rgtsldSalidaAlmacenUsuario" required disabled>
                </div>
              </div>
              <!-- Input para el usuario que despacha -->
              <div class="form-group col-lg-6">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <label for="rgtsldSalidaAlmacenUsuarioDespacha">Usuario que despacha</label>
                  <input type="text" class="form-control input-lg" id="rgtsldSalidaAlmacenUsuarioDespacha" name="rgtsldSalidaAlmacenUsuarioDespacha" value='<?php echo  $_SESSION["nombre"] . ' (' . $_SESSION["usuario"] . ')'; ?>' required disabled>
                </div>
              </div>
            </div>
            <!-- Textarea para el comentario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-comment"></i></span>
                <label for="rgtsldSalidaAlmacenComentario">Comentario</label>
                <textarea class="form-control" rows="3" id="rgtsldSalidaAlmacenComentario" name="rgtsldSalidaAlmacenComentario" required></textarea>
              </div>
            </div>
            <!-- Select para el estado de atención -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                <label for="rgtsldSalidaAlmacenEstado">Estado de atención</label>
                <select class="form-control input-lg" id="rgtsldSalidaAlmacenEstado" name="rgtsldSalidaAlmacenEstado" required>
                  <option value="">Seleccionar estado</option>
                  <option value="1">Pendiente</option>
                  <option value="2">Atendida</option>
                  <option value="3">Anulada</option>
                </select>
              </div>
            </div>
            <!-- Nav pills para las opciones de salida -->
            <ul class="nav nav-pills">
              <li class="active"><a data-toggle="pill" href="#rgtslddonacion">Salida por donación</a></li>
              <li><a data-toggle="pill" href="#rgtsldentregaColaborador">Salida por entrega a colaborador</a></li>
              <li><a data-toggle="pill" href="#rgtsldtrasladoAlmacen">Salida por traslado de almacén</a></li>
            </ul>
            <!-- Tab content para las opciones de salida -->
            <div class="tab-content">
              <div id="rgtslddonacion" class="tab-pane fade in active">
                <!-- Contenido para la salida por donación -->
                <div class="form-group">
                  <label>Beneficiaria/o:</label>
                  <input type="text" class="form-control" id="rgtsldentidadBeneficiaria" name='rgtsldentidadBeneficiaria' placeholder="Nombre de la entidad">
                </div>
                <div class="form-group">
                  <label>Número de Autorización:</label>
                  <input type="text" class="form-control" id="rgtsldnumeroAutorizacion" name='rgtsldnumeroAutorizacion' placeholder="Número de autorización">
                </div>
              </div>
              <div id="rgtsldentregaColaborador" class="tab-pane fade">
                <!-- Contenido para la salida por entrega a colaborador -->
                <div class="form-group">
                  <label>Nombre del Colaborador:</label>
                  <input type="text" class="form-control" id="rgtsldnombreColaborador" name="rgtsldnombreColaborador" placeholder="Nombre completo del colaborador">
                </div>
                <div class="form-group">
                  <label>DNI del Colaborador:</label>
                  <input type="text" class="form-control" id="rgtslddniColaborador" name="rgtslddniColaborador" placeholder="DNI del colaborador">
                </div>
              </div>
              <div id="rgtsldtrasladoAlmacen" class="tab-pane fade">
                <!-- Contenido para la salida por traslado de almacén -->
                <div class="form-group">
                  <label>Almacén Destino:</label>
                  <?php $almacenes = ControladorSolicitudSalida::ctrMostrar('almacenes', 'id', '0', '>'); ?>

                  <select class="form-control input-lg" id="rgtsldalmacenDestino" name="rgtsldalmacenDestino">
                    <option value="">Seleccionar almacén destino</option>
                    <?php
                    foreach ($almacenes as $almacen) {
                      echo '<option value="' . $almacen['id'] . '">' . $almacen['almacen'] . '</option>';
                    }
                    ?>
                  </select>

                </div>
                <div class="form-group">
                  <label>Motivo del Traslado:</label>
                  <textarea class="form-control" id="rgtsldmotivoTraslado" name="rgtsldmotivoTraslado" placeholder="Explique el motivo del traslado" rows="3"></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
        <?php

        if (isset($_POST['rgtsldidSalidaAlmacen']) && !empty($_POST['rgtsldidSalidaAlmacen'])) {
          // La variable existe y tiene un valor no vacío
          $ControladorSolicitudSalida->ctrSalidaAlmacen();
        }
        ?>
      </form>
    </div>
  </div>
</div>
















<!-- MODAL EDITAR SOLICITUD -->
<div id="modalEditarSolicitud" class="modal fade" role="dialog">
  <div class="modal-dialog modal-dialog-wide">
    <div class="modal-content">
      <form role="form" method="post" id="formularioEditarSolicitud">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Editar Solicitud</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <!-- Input para el almacén -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <!-- Añadimos el subtítulo o etiqueta aquí -->
                <label for="RegistraSolicitudAlmacen">Almacén</label>
                <input type="hidden" id="idSolicitudEditar" name="idSolicitudEditar" value="valorDeseado">
                <input type="text" class="form-control input-lg" id="editarSolicitudAlmacen" name="editarSolicitudAlmacen" required disabled>
              </div>
            </div>
            <!-- Input para el producto -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <!-- Añadimos el subtítulo o etiqueta aquí -->
                <label for="RegistraSolicitudAlmacen">Producto</label>
                <input type="text" class="form-control input-lg" id="editarSolicitudProducto" name="editarSolicitudProducto" required disabled>
              </div>
            </div>



            <!-- Input para la cantidad -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <!-- Añadimos el subtítulo o etiqueta aquí -->
                <label for="RegistraSolicitudAlmacen">Cantidad</label>
                <input type="number" class="form-control input-lg" id="editarSolicitudCantidad" name="editarSolicitudCantidad" placeholder="Cantidad" required>
              </div>
            </div>
            <!-- Input para la fecha de necesidad -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <!-- Añadimos el subtítulo o etiqueta aquí -->
                <label for="RegistraSolicitudAlmacen">Fecha Necesidad</label>
                <input type="date" class="form-control input-lg" id="editarSolicitudFechaNecesidad" name="editarSolicitudFechaNecesidad" required>
              </div>
            </div>

            <!-- Input para el usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <!-- Añadimos el subtítulo o etiqueta aquí -->
                <label for="RegistraSolicitudAlmacen">Usuario</label>
                <input type="text" class="form-control input-lg" id="editarSolicitudUsuario" name="editarSolicitudUsuario" placeholder="Usuario" required disabled>
              </div>
            </div>
            <!-- Textarea para el comentario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-comment"></i></span>
                <!-- Añadimos el subtítulo o etiqueta aquí -->
                <label for="RegistraSolicitudAlmacen">Comentario</label>
                <textarea class="form-control" rows="3" id="editarSolicitudComentario" name="editarSolicitudComentario" placeholder="Comentario" required></textarea>
              </div>
            </div>
            <!-- Select para el estado -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                <!-- Añadimos el subtítulo o etiqueta aquí -->
                <label for="RegistraSolicitudAlmacen">Estado</label>
                <select class="form-control input-lg" id="editarSolicitudEstado" name="editarSolicitudEstado" required disabled>
                  <option value="">Seleccionar estado</option>
                  <option value="1">Pendiente</option>
                  <option value="2">Atendida</option>
                  <option value="3">Anulada</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
        <?php
        if (isset($_POST['idSolicitudEditar']) && !empty($_POST['idSolicitudEditar'])) {
          // La variable existe y tiene un valor no vacío
          $ControladorSolicitudSalida->ctrEditarSolicitud();
        }
        ?>
      </form>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {

    // Al iniciar, establecer campos requeridos según la pestaña activa inicialmente
    updateRequiredFields($('.nav-pills .active a').attr('href'));

    // Escuchar cambios en las pestañas
    $('.nav-pills a').on('click', function() {
      var targetTab = $(this).attr('href');
      updateRequiredFields(targetTab);
    });

    function updateRequiredFields(targetTab) {
      // Remover atributo 'required' de todos los campos
      $('.tab-pane input, .tab-pane textarea').removeAttr('required');

      // Añadir atributo 'required' solo a los campos dentro de la pestaña activa
      $(targetTab).find('input, textarea').each(function() {
        $(this).attr('required', true);
      });
    }



    // Activar el modal de salida con los datos del almacén seleccionado
    $(document).on('click', '.btnActivarModalSalida', function() {
      var idA = $(this).data('id');
      var datosi = new FormData();
      datosi.append("idaa", idA);
      datosi.append("ajaxservice", 'loadEdit');
      // Ajustado para nuevo ID
      $("#rgtsldidSalidaAlmacen").val($(this).data('id'));

      $.ajax({
        url: "modelos/solicitud_salida.modelo.php",
        method: "POST",
        data: datosi,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(item) {
          // Ajustado para nuevos IDs
          $("#rgtsldidSalidaAlmacen").val(item.id);
          $("#rgtsldSalidaAlmacenAlmacen").val(item.almacen);
          $("#rgtsldSalidaAlmacenAlmacenVisualD").val(item.almacen);
          $("#rgtsldfk_almacenid").val(item.idalmacen); //almacen origen

          $("#rgtsldSalidaAlmacenProducto").val(item.codigo + ' :: ' + item.descripcion);
          $("#rgtsscodigoProducto").val(item.codigo);
          $("#rgtsldSalidaAlmacenCantidad").val(item.cantidad);
          $('#rgtsldSalidaAlmacenCantidad').attr('max', item.cantidad);
          $("#rgtsldSalidaAlmacenFechaNecesidadReq").val(item.fecha_necesidad);
          $("#rgtsldSalidaAlmacenUsuario").val(item.usuario);
          $("#rgtsldSalidaAlmacenComentario").val(item.comentario);
        }
      });
    });



    // Activar el modal de edición con los datos del almacén seleccionado
    $(document).on('click', '.btnEditarSolicitud', function() {

      var idA = $(this).data('id');
      var datos = new FormData();
      datos.append("idaa", idA);
      datos.append("ajaxservice", 'loadEdit');
      $("#idSolicitudEditar").val($(this).data('id'));

      // Rellenar los datos en el formulario de edición (esto debería ser reemplazado por una llamada AJAX)
      // Ejemplo con datos ficticios:
      $.ajax({
        url: "modelos/solicitud_salida.modelo.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(item) {
          // Añadir cada producto al select
          $("#idSolicitudEditar").val(item.id);
          $("#editarSolicitudAlmacen").val(item.almacen);
          $("#editarSolicitudProducto").val(item.codigo + ' :: ' + item.descripcion);
          $("#editarSolicitudCantidad").val(item.cantidad);
          $("#editarSolicitudFechaNecesidad").val(item.fecha_necesidad);
          $("#editarSolicitudFechaSolicitud").val(item.fecha_solicitud);
          $("#editarSolicitudUsuario").val(item.usuario);
          $("#editarSolicitudComentario").val(item.comentario);
          $("#editarSolicitudEstado").val(item.estado);
        }
      });

    });

    // ==============================================================
    $('#RegistraSolicitudProducto').select2({
      placeholder: 'Seleccionar producto',
      allowClear: true,
      width: '100%' // Asegura que Select2 toma el 100% del ancho de su contenedor
    }).data('select2').$container.find('.select2-selection').css('height', '70px');

    // Cargar productos cuando se selecciona un almacén
    $('#RegistraSolicitudAlmacen').change(function() {

      var almacenId = $(this).val();
      $.ajax({
        url: "modelos/solicitud_salida.modelo.php",
        method: 'POST',
        data: {
          almacenId: almacenId,
          ajaxservice: 'loadProductosPorAlmacen',
        },
        dataType: 'json',
        success: function(data) {
          // Vaciar el select de producto
          $('#RegistraSolicitudProducto').empty();

          // Añadir una opción por defecto al inicio
          var defaultOption = new Option('Seleccionar producto', '', false, false);
          $('#RegistraSolicitudProducto').append(defaultOption);

          // Añadir cada producto al select
          $.each(data, function(index, producto) {
            var newOption = new Option(producto.codigo + ' ::: ' + producto.descripcion, producto.id, false, false);
            $('#RegistraSolicitudProducto').append(newOption);
          });

          // Llamar a trigger('change') una vez después de añadir todas las opciones
          $('#RegistraSolicitudProducto').trigger('change');
        }
      });
    });
    // ==================================================================================================================================
    $('#RegistraSolicitudProducto').on('change', function() {
      var codigoProducto = $('#RegistraSolicitudProducto').find('option[value="' + $(this).val() + '"]').text();

      if (codigoProducto != 'Seleccionar producto') {

        $.ajax({
          url: "modelos/solicitud_salida.modelo.php",
          type: 'POST',
          dataType: 'json',
          data: {
            codigo: codigoProducto.split(':::')[0].trim(),
            ajaxservice: 'loadAuditorProductoPreseleccionado'
          },
          success: function(response) {
            var tablaHtml = '<table class="table table-bordered"><thead><tr><th>ID</th><th>Código</th><th>Descripción</th><th>Stock</th><th>Almacén</th><th>Ubicación</th></tr></thead><tbody>';
            var contAudiprodu = 0;

            response.forEach(function(fila) {
              contAudiprodu = contAudiprodu + Number(fila.stock);
              tablaHtml += '<tr>';
              tablaHtml += '<td>' + fila.id + '</td>';
              tablaHtml += '<td>' + fila.codigo + '</td>';
              tablaHtml += '<td>' + fila.descripcion + '</td>';
              tablaHtml += '<td style="text-align: right !important;">' + fila.stock + '</td>';
              tablaHtml += '<td>' + fila.almacen.toUpperCase() + '</td>';
              tablaHtml += '<td>' + fila.ubication + '</td>';
              tablaHtml += '</tr>';
            });
            tablaHtml += '<tr>';
            tablaHtml += '<td></td>';
            tablaHtml += '<td></td>';
            tablaHtml += '<td></td>';
            tablaHtml += '<td style="text-align: right !important;background: #5e5e5e !important; color : white !important" id="totalaudit">' + contAudiprodu + '</td>';
            tablaHtml += '<td></td>';
            tablaHtml += '<td></td>';
            tablaHtml += '</tr>';
            tablaHtml += '</tbody></table>';
            $('#tnlproductoselectauditor').html(tablaHtml);
            $('#RegistraSolicitudCantidad').val('');
            document.getElementById('RegistraSolicitudCantidad').removeAttribute('disabled');
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
          }
        });
      } 
    });
    // ==================================================================================================================================
    $('#RegistraSolicitudCantidad').on('blur', function() {
      if ($(this).val() > parseFloat($('#totalaudit').text())) {
        alert("La cantidad de productos que deseas solicitar supera la disponibilidad actual de tu inventario.");
        $('#RegistraSolicitudCantidad').val('');
      }
    });
    // ==================================================================================================================================



    // Al hacer clic en cualquier pestaña de .nav-pills
    $('.nav.nav-pills li a').on('click', function(e) {
      // Prevenir la acción por defecto
      e.preventDefault();

      // Obtener el href del elemento clickeado para identificar el bloque de contenido relacionado
      var target = $(this).attr('href');

      // Limpiar todos los inputs, textareas y selects dentro del bloque de contenido específico
      $(target).find('input, textarea').each(function() {
        // Verificar si el input es de tipo radio o checkbox
        if ($(this).is(':radio') || $(this).is(':checkbox')) {
          $(this).prop('checked', false); // Desmarcar
        } else {
          $(this).val(''); // Limpiar valor
        }
      });

      // Resetear selects al primer option
      $(target).find('select').each(function() {
        $(this).prop('selectedIndex', 0); // Seleccionar el primer option
      });

      // Activar la pestaña clickeada
      $(this).tab('show');
    });
    // $("#formularioRegistraSolicitud").submit(function(e){
    //   e.preventDefault();
    //   var formData = new FormData(this);
    //   console.log(formData);
    // })
  });

</script>