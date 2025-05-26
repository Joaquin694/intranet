<div class="content-wrapper">
  <section class="content-header">
    <h1>Inventario</h1>
    <center>
      <div class="btn-group btn-group btn-group-toggle shadow-lg" data-toggle="buttons" style="background: white; color: #0086d4; border-radius: 0px; font-weight: 800; border: 7px solid #1d23402e;">
        <label style="background: #1d2340; color: white !important" class="btn btn-secondary active" onclick="redireccionar('almacenes')">
          <input type="radio" name="options" id="option1" autocomplete="off" checked><i class="fa fa-search" aria-hidden="true"></i> Almacenes
        </label>
        <label class="btn btn-secondary" onclick="redireccionar('categorias')">
          <input type="radio" name="options" id="option2" autocomplete="off"> Categorías
        </label>
        <label class="btn btn-secondary" onclick="redireccionar('datos-maestros-de-productos')">
          <input type="radio" name="options" id="option2" autocomplete="off"> Datos maestros productos
        </label>
        <label class="btn btn-secondary" onclick="redireccionar('file-the-control-inventory')">
          <input type="radio" name="options" id="option2" autocomplete="off"> File para el control de códigos
        </label>
        <label class="btn btn-secondary" onclick="redireccionar('productos')">
          <input type="radio" name="options" id="option2" autocomplete="off"> Stock de Productos
        </label>
        <label class="btn btn-secondary" onclick="redireccionar('servicesadm')">
          <input type="radio" name="options" id="option2" autocomplete="off" checked> Servicios
        </label>
      </div>
    </center>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar Almacenes</li>
    </ol>
  </section>

  <?php
        require_once "controladores/almacen.controlador.php";
        require_once "modelos/almacen.modelo.php";

        $ControladorAlmacenes = new ControladorAlmacenes();
    ?>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevoAlmacen"> <i class="fa fa-plus" aria-hidden="true"></i> Agregar Almacen </button>
      </div>
      <div class="box-body table-responsive">
          
        <table class="table table-bordered table-striped dt-responsive tablas">
          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>Almacen</th>
              <th>Descripción</th>
              <th>Fecha de registro</th>
              <th>Estado</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
              $item = null;
              $valor = null;
              $array = $ControladorAlmacenes->ctrMostrarAlmacenes($item, $valor);
              foreach ($array as $key => $value) {
                $activox=($value["estado"]==1)?'Activo':'Inactivo';
                echo '<tr>
                        <td>'.($key+1).'</td>
                        <td class="text-uppercase">'.$value["almacen"].'</td>
                        <td class="text-uppercase">'.$value["descripcion"].'</td>
                        <td class="text-uppercase">'.$value["fecha"].'</td>
                        <td class="text-uppercase">'.$activox.'</td>
                        <td><a href="javascript:void(0);" class="btn btn-warning btn-xs btnEditarAlmacen" data-id='.$value["id"].'  data-toggle="modal" data-target="#modalEditarAlmacen"><i class="fa fa-pencil"></i> Editar</a></td>
                      </tr>';
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>


<!-- MODAL NUEVO ALMACEN -->
<div id="modalNuevoAlmacen" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" id="formularioRegistraAlmacen">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrar Almacén</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <!-- Input para el nombre del almacén -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <input type="text" class="form-control input-lg" id="RegistraAlmacenNombre" name="RegistraAlmacenNombre" required>
              </div>
            </div>
            <!-- Input para la descripción del almacén -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                <textarea class="form-control" rows="3" id="RegistraAlmacenDescripcion" name="RegistraAlmacenDescripcion" required></textarea>
              </div>
            </div>
            <!-- Select para el estado del almacén -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                <select class="form-control input-lg" id="RegistraAlmacenEstado" name="RegistraAlmacenEstado" required>
                  <option value="">Seleccionar estado</option>
                  <option value="1">Activo</option>
                  <option value="0">Inactivo</option>
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
            if (isset($_POST['RegistraAlmacenNombre']) && !empty($_POST['RegistraAlmacenNombre'])) {
                // La variable existe y tiene un valor no vacío
                $ControladorAlmacenes->ctrCrearAlmacen();
            } 
        ?>
      </form>
      </form>
    </div>
  </div>
</div>

<!-- MODAL EDITAR ALMACEN -->
<div id="modalEditarAlmacen" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" id="formularioEditarAlmacen">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Almacén</h4>
          </div>
        <div class="modal-body">
          <div class="box-body">
            <!-- Input para el ID del almacén (oculto) -->
            <input type="hidden" id="idAlmacenEditar" name="idAlmacenEditar">
            <!-- Input para el nombre del almacén -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <input type="text" class="form-control input-lg" id="editarAlmacenNombre" name="editarAlmacenNombre" required>
              </div>
            </div>
            <!-- Input para la descripción del almacén -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                <textarea class="form-control" rows="3" id="editarAlmacenDescripcion" name="editarAlmacenDescripcion" required></textarea>
              </div>
            </div>
            <!-- Select para el estado del almacén -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                <select class="form-control input-lg" id="editarAlmacenEstado" name="editarAlmacenEstado" required>
                  <option value="">Seleccionar estado</option>
                  <option value="1">Activo</option>
                  <option value="0">Inactivo</option>
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
            if (isset($_POST['idAlmacenEditar']) && !empty($_POST['idAlmacenEditar'])) {
                // La variable existe y tiene un valor no vacío
                $ControladorAlmacenes->ctrEditarAlmacen();
            } 
        ?>
      </form>
      </form>
    </div>
  </div>
</div>



<script>
$(document).ready(function() {
    // Activar el modal de edición con los datos del almacén seleccionado
    $(document).on('click', '.btnEditarAlmacen', function() {
      
        var idAlmacen = $(this).data('id');
        var datos = new FormData();
        datos.append("idaalmacen", idAlmacen);
        datos.append("ajaxservice", 'loadEdit');
        // Rellenar los datos en el formulario de edición (esto debería ser reemplazado por una llamada AJAX)
        // Ejemplo con datos ficticios:
            $.ajax({
            url:     "modelos/almacen.modelo.php",
            method:  "POST",
              data:  datos,
              cache: false,
            contentType: false,
            processData: false,
            dataType:"json",
            success: function(datosAlmacen){
                $('#idAlmacenEditar').val(datosAlmacen.id);
                $('#editarAlmacenNombre').val(datosAlmacen.almacen);
                $('#editarAlmacenDescripcion').val(datosAlmacen.descripcion);
                $('#editarAlmacenEstado').val(datosAlmacen.estado).trigger('change');
                $('#modalEditarAlmacen').modal('show');
            }
        })      
        
    });


});
</script>

