<style>
  .form-group {
    display: flex;
    flex-wrap: wrap;
    margin: 20px;
  }

  .form-group .panel {
    width: 100%;
    font-weight: bold;
    font-size: 1.2em;
    margin-bottom: 10px;
  }

  .checkbox-group {
    width: 50%;
    padding: 10px;
    box-sizing: border-box;
  }

  .checkbox-group input[type="checkbox"] {
    margin-right: 10px;
  }

  .checkbox-group label {
    display: inline-block;
    margin-bottom: 10px;
  }
</style>


<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar usuarios

    </h1>

    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar usuarios</li>
    </ol>
  </section>
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">

          <i class="fa fa-chevron-right" aria-hidden="true"></i> Agregar usuario

        </button>
      </div>

      <div class="box-body table-responsive">

        <table class="table table-bordered table-striped dt-responsive tablas">
          <thead>
            <tr>

              <th style="width:10px">#</th>

              <th>Nombre</th>

              <th>Usuario</th>

              <th>Foto</th>

              <th>Perfil</th>

              <th>Estado</th>

              <th>Último login</th>

              <th>Acciones</th>

            </tr>
          </thead>

          <tbody>

            <?php

            $item = null;

            $valor = null;
            $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
            foreach ($usuarios as $key => $value) {

              echo ' <tr>

                  <td>' . ($key + 1) . '</td>

                  <td>' . $value["nombre"] . '</td>

                  <td>' . $value["usuario"] . '</td>';

              if ($value["foto"] != "") {
                echo '<td><img src="' . $value["foto"] . '" class="img-thumbnail" width="40px"></td>';
              } else {
                echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
              }

              echo '<td>' . $value["perfil"] . '</td>';

              if ($value["estado"] != 0) {
                echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="' . $value["id"] . '" estadoUsuario="0">Activado</button></td>';
              } else {

                echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="' . $value["id"] . '" estadoUsuario="1">Desactivado</button></td>';
              }

              echo '<td>' . $value["ultimo_login"] . '</td>

                  <td>

                    <div class="btn-group">

                      <button class="btn btn-warning btnEditarUsuario" idUsuario="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarUsuario" idUsuario="' . $value["id"] . '" fotoUsuario="' . $value["foto"] . '" usuario="' . $value["usuario"] . '"><i class="fa fa-times"></i></button>

                    </div>  

                  </td>

                </tr>';
            }

            ?>

          </tbody>

        </table>

      </div>

    </div>

  </section>

</div>



<!--=====================================

MODAL AGREGAR USUARIO

======================================-->



<div id="modalAgregarUsuario" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">
        <!--=====================================

        CABEZA DEL MODAL

        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar usuario</h4>

        </div>

        <!--=====================================

        CUERPO DEL MODAL

        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group" style='    display: flow !important;'>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->

            <div class="form-group" style='    display: flow !important;'>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" id="nuevoUsuario" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

            <div class="form-group" style='    display: flow !important;'>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>

              </div>

            </div>


            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <div class="form-group" style='    display: flow !important;'>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                <select class="form-control input-lg" name="nuevoPerfil">

                  <option value="">Selecionar perfil</option>

                  <option value="Administrador">Administrador</option>

                  <option value="Conductor">Conductor</option>

                  <option value="Vendedor">Vendedor</option>
                  <option value="Asistente">Asistente</option>
                  <!-- <option value="AsistenteProducción">Asistente Producción</option> -->

                  <option value="Contador">Contador</option>

                </select>

              </div>

            </div>
            <div class="form-group">
              <div class="panel">SELECCIONAR MÓDULOS</div>

              <div class="checkbox-group">
                <input type="checkbox" id="indicadore_metricas" name="indicadore_metricas" value="indicadore_metricas">
                <label for="indicadore_metricas"> Indicadores o Métricas</label><br>
                <input type="checkbox" id="activos_fijos" name="activos_fijos" value="activos_fijos">
                <label for="activos_fijos"> Activos Fijos</label><br>
                <input type="checkbox" id="gestion_inventario" name="gestion_inventario" value="gestion_inventario">
                <label for="gestion_inventario"> Gestión de inventarios</label><br>
                <input type="checkbox" id="solicitud_salida" name="solicitud_salida" value="solicitud_salida">
                <label for="solicitud_salida"> Solicitud de Salida</label><br>
                <input type="checkbox" id="plan_mantenimiento" name="plan_mantenimiento" value="plan_mantenimiento">
                <label for="plan_mantenimiento"> Plan Mantenimiento</label><br>
                <!-- <input type="checkbox" id="gestion_combustible" name="gestion_combustible" value="gestion_combustible"> -->
                <!-- <label for="gestion_combustible"> Gestión de Combustible</label><br> -->
                <!-- <input type="checkbox" id="gastos_conductor" name="gastos_conductor" value="gastos_conductor"> -->
                <!-- <label for="gastos_conductor"> Gastos Conductor</label><br> -->
                <input type="checkbox" id="check_list" name="check_list" value="check_list">
                <label for="check_list"> Check List Conductor</label><br>
              </div>

              <div class="checkbox-group">
                <input type="checkbox" id="proveedores" name="proveedores" value="proveedores">
                <label for="proveedores"> Proveedores</label><br>
                <input type="checkbox" id="clientes" name="clientes" value="clientes">
                <label for="clientes"> Clientes</label><br>
                <input type="checkbox" id="daministrar_gastos" name="daministrar_gastos" value="daministrar_gastos">
                <label for="daministrar_gastos"> Administrar Gastos</label><br>
                <input type="checkbox" id="nuevo_gasto" name="nuevo_gasto" value="nuevo_gasto">
                <label for="nuevo_gasto"> Nuevo Gasto</label><br>
                <input type="checkbox" id="administrar_ventas" name="administrar_ventas" value="administrar_ventas">
                <label for="administrar_ventas"> Administrar Ventas</label><br>
                <input type="checkbox" id="nueva_venta" name="nueva_venta" value="nueva_venta">
                <label for="nueva_venta"> Nueva Venta</label><br>
                <input type="checkbox" id="nueva_cotizacion" name="nueva_cotizacion" value="nueva_cotizacion">
                <label for="nueva_cotizacion"> Nueva cotización</label><br>
                <input type="checkbox" id="lista_cotizacion" name="lista_cotizacion" value="lista_cotizacion">
                <label for="lista_cotizacion"> Listar Cotizaciones</label><br>
                <input type="checkbox" id="usuarios" name="usuarios" value="usuarios">
                <label for="usuarios"> Usuarios</label><br>
                <input type="checkbox" id="codigo_barras" name="codigo_barras" value="codigo_barras">
                <label for="codigo_barras"> Códigos de Barras</label><br>
                <input type="checkbox" id="videoconferencias" name="videoconferencias" value="videoconferencias">
                <label for="videoconferencias"> Videoconferencias</label><br>
                <input type="checkbox" id="gestor_documental" name="gestor_documental" value="gestor_documental">
                <label for="gestor_documental"> Gestor Documental</label><br>
              </div>
            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->
            <div class="form-group">
              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="nuevaFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

            </div>

          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar usuario</button>

        </div>

        <?php

        $crearUsuario = new ControladorUsuarios();

        $crearUsuario->ctrCrearUsuario();
        ?>
      </form>

    </div>

  </div>

</div>


<!--=====================================

MODAL EDITAR USUARIO

======================================-->


<div id="modalEditarUsuario" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================

        CABEZA DEL MODAL

        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar usuario</h4>

        </div>

        <!--=====================================

        CUERPO DEL MODAL

        ======================================-->

        <div class="modal-body">
          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group" style='    display: flow !important;'>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>

              </div>
            </div>
            <!-- ENTRADA PARA EL USUARIO -->
            <div class="form-group" style='    display: flow !important;'>
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" readonly>
              </div>

            </div>
            <!-- ENTRADA PARA LA CONTRASEÑA -->

            <div class="form-group" style='    display: flow !important;'>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Confirmar contraseña" required>

                <input type="hidden" id="passwordActual" name="passwordActual">

              </div>
            </div>

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->
            <div class="form-group" style='    display: flow !important;'>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                <select class="form-control input-lg" name="editarPerfil">

                  <option value="" id="editarPerfil"></option>

                  <option value="Administrador">Administrador</option>

                  <option value="Conductor">Conductor</option>

                  <option value="Vendedor">Vendedor</option>
                  <option value="Asistente">Asistente</option>
                  <!-- <option value="AsistenteProducción">Asistente Producción</option> -->

                  <option value="Contador">Contador</option>

                </select>

              </div>

            </div>

            <div class="form-group">
              <div class="panel">SELECCIONAR MÓDULOS</div>

              <div class="checkbox-group">
                <input type="checkbox" id="indicadore_metricasDb" name="indicadore_metricas" value="indicadore_metricas">
                <label for="indicadore_metricasDb"> Indicadores o Métricas</label><br>
                <input type="checkbox" id="activos_fijosDb" name="activos_fijos" value="activos_fijos">
                <label for="activos_fijosDb"> Activos Fijos</label><br>
                <input type="checkbox" id="gestion_inventarioDb" name="gestion_inventario" value="gestion_inventario">
                <label for="gestion_inventarioDb"> Gestión de inventarios</label><br>
                <input type="checkbox" id="solicitud_salidaDb" name="solicitud_salida" value="solicitud_salida">
                <label for="solicitud_salidaDb"> Solicitud de Salida</label><br>
                <input type="checkbox" id="plan_mantenimientoDb" name="plan_mantenimiento" value="plan_mantenimiento">
                <label for="plan_mantenimientoDb"> Plan Mantenimiento</label><br>
                <!-- <input type="checkbox" id="gestion_combustibleDb" name="gestion_combustible" value="gestion_combustible"> -->
                <!-- <label for="gestion_combustibleDb"> Gestión de Combustible</label><br> -->
                <!-- <input type="checkbox" id="gastos_conductorDb" name="gastos_conductor" value="gastos_conductor"> -->
                <!-- <label for="gastos_conductorDb"> Gastos Conductor</label><br> -->
                <input type="checkbox" id="check_listDb" name="check_list" value="check_list">
                <label for="check_listDb"> Check List Conductor</label><br>
              </div>

              <div class="checkbox-group">
                <input type="checkbox" id="proveedoresDb" name="proveedores" value="proveedores">
                <label for="proveedoresDb"> Proveedores</label><br>
                <input type="checkbox" id="clientesDb" name="clientes" value="clientes">
                <label for="clientesDb"> Clientes</label><br>
                <input type="checkbox" id="daministrar_gastosDb" name="daministrar_gastos" value="daministrar_gastos">
                <label for="daministrar_gastosDb"> Administrar Gastos</label><br>
                <input type="checkbox" id="nuevo_gastoDb" name="nuevo_gasto" value="nuevo_gasto">
                <label for="nuevo_gastoDb"> Nuevo Gasto</label><br>
                <input type="checkbox" id="administrar_ventasDb" name="administrar_ventas" value="administrar_ventas">
                <label for="administrar_ventasDb"> Administrar Ventas</label><br>
                <input type="checkbox" id="nueva_ventaDb" name="nueva_venta" value="nueva_venta">
                <label for="nueva_ventaDb"> Nueva Venta</label><br>
                <input type="checkbox" id="nueva_cotizacionDb" name="nueva_cotizacion" value="nueva_cotizacion">
                <label for="nueva_cotizacionDb"> Nueva cotización</label><br>
                <input type="checkbox" id="lista_cotizacionDb" name="lista_cotizacion" value="lista_cotizacion">
                <label for="lista_cotizacionDb"> Listar Cotizaciones</label><br>
                <input type="checkbox" id="usuariosDb" name="usuarios" value="usuarios">
                <label for="usuariosDb"> Usuarios</label><br>
                <input type="checkbox" id="codigo_barrasDb" name="codigo_barras" value="codigo_barras">
                <label for="codigo_barrasDb"> Códigos de Barras</label><br>
                <input type="checkbox" id="videoconferenciasDb" name="videoconferencias" value="videoconferencias">
                <label for="videoconferenciasDb"> Videoconferencias</label><br>
                <input type="checkbox" id="gestor_documentalDb" name="gestor_documental" value="gestor_documental">
                <label for="gestor_documentalDb"> Gestor Documental</label><br>
              </div>
            </div>


            <!-- ENTRADA PARA SUBIR FOTO -->

            <div class="form-group">

              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="editarFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

              <input type="hidden" name="fotoActual" id="fotoActual">

            </div>

          </div>

        </div>

        <!--=====================================

        PIE DEL MODAL

        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar usuario*</button>

        </div>

        <?php

        $editarUsuario = new ControladorUsuarios();

        $editarUsuario->ctrEditarUsuario();

        ?>

      </form>

    </div>

  </div>

</div>

<?php
$borrarUsuario = new ControladorUsuarios();

$borrarUsuario->ctrBorrarUsuario();
?>
<Script>
  const select = document.getElementById('miSelect');

  const url = '/vistas/modulos/reportes/get_php_files.php';

  fetch(url)
    .then(response => response.json())
    .then(fileNames => {
      fileNames.forEach(fileName => {
        const option = document.createElement('option');
        option.value = fileName;
        option.textContent = fileName;
        select.appendChild(option);
      });
    })
    .catch(error => console.error('Error fetching data:', error));

  document.addEventListener("DOMContentLoaded", function() {
    const perfilSelect = document.querySelector('select[name="nuevoPerfil"]');
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');

    perfilSelect.addEventListener("change", function() {
      const perfil = perfilSelect.value;
      if (perfil === "Administrador") {
        checkboxes.forEach(checkbox => checkbox.checked = true);
      } else {
        checkboxes.forEach(checkbox => checkbox.checked = false);
        document.getElementById("videoconferencias").checked = true;
      }
    });
  });
</Script>