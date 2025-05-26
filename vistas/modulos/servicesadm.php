<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Inventario
    </h1>

    <center>
      <div class="btn-group btn-group btn-group-toggle shadow-lg" data-toggle="buttons" style="background: white;color: #0086d4; border-radius: 0px; font-weight: 800; border: 7px solid #1d23402e;">
        <label class="btn btn-secondary" onclick="redireccionar('almacenes')">
          <input type="radio" name="options" id="option1" autocomplete="off" > Almacenes
        </label>
        <label class="btn btn-secondary" onclick="redireccionar('categorias')">
        <input type="radio" name="options" id="option2" autocomplete="off" >Categorías
        </label>
        <label class="btn btn-secondary" onclick="redireccionar('datos-maestros-de-productos')">
          <input type="radio" name="options" id="option2" autocomplete="off" > Datos maestros productos

        </label>

         <label class="btn btn-secondary" onclick="redireccionar('file-the-control-inventory')">

          <input type="radio" name="options" id="option2" autocomplete="off" > File para el control de códigos

        </label>

        <label class="btn btn-secondary" onclick="redireccionar('productos')">

          <input type="radio" name="options" id="option2" autocomplete="off" > Stock de Productos

        </label>

        <label style="background: #1d2340;color: white !important" class="btn btn-secondary active"  onclick="redireccionar('servicesadm')">
        <input type="radio" name="options" id="option2" autocomplete="off" checked><i class="fa fa-search" aria-hidden="true"></i> Servicios
        </label>

      </div>

    </center>



    <ol class="breadcrumb">

      

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      

      <li class="active">Administrar categorías</li>

    

    </ol>



  </section>

<?php
        include "controladores/service.controlador.php";
        include "modelos/service.modelo.php";

        $controladorService = new ControladorServices();
?>

<section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarService">
          <i class="fa fa-plus" aria-hidden="true"></i> Agregar servicio
        </button>
      </div>
      <div class="box-body table-responsive">
        <table class="table table-bordered table-striped dt-responsive tablas">
          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>Nombre</th>
              <th>Precio</th>
              <th>Descripción</th>
              <th>Estado</th>
              <!-- <th>Categoría</th> -->
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $item = null;
              $valor = null;
              $services = $controladorService->ctrMostrarServices($item, $valor);
              foreach ($services as $key => $value) {
                echo ' <tr>
                        <td>'.($key+1).'</td>
                        <td class="text-uppercase">'.$value["nameService"].'</td>
                        <td>'.$value["precio"].'</td>
                        <td class="text-uppercase">'.$value["DesService"].'</td>
                        <td class="text-uppercase">'.$value["activador"].'</td>
                        
                        <td>
                          <div class="btn-group">
                            <button class="btn btn-warning btnEditarService" idService="'.$value["idService"].'" data-toggle="modal" data-target="#modalEditarService"><i class="fa fa-pencil"></i></button>';
               
                echo '</div>
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







<!-- MODAL AGREGAR SERVICE -->
<div id="modalAgregarService" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <!-- CABEZA DEL MODAL -->
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar servicio</h4>
        </div>
        <!-- CUERPO DEL MODAL -->
        <div class="modal-body">
          <div class="box-body">
            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoService" placeholder="Nombre del servicio" required>
              </div>
            </div>
            <!-- ENTRADA PARA EL PRECIO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-money"></i></span>
                <input type="text" class="form-control input-lg" name="precio" placeholder="Precio" required>
              </div>
            </div>
            <!-- ENTRADA PARA EL TIPO DE COSTO -->
                <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                    <select class="form-control input-lg" name="DesService" required>
                    <option value="">Selecciona tipo de costo</option>
                    <option value="Costo fijo">Costo fijo</option>
                    <option value="X kilo">X kilo</option>
                    </select>
                </div>
                </div>

            <!-- ENTRADA PARA EL ESTADO -->
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-toggle-on"></i></span>
                    <select class="form-control input-lg" name="activador" required>
                    <option value="">Selecciona estado</option>
                    <option value="Activo">Activo</option>
                    <option value="Desactivado">Desactivado</option>
                    </select>
                </div>
                </div>

            <!-- ENTRADA PARA LA CATEGORÍA -->
            <div class="form-group d-none">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tags"></i></span>
                <input type="number" class="form-control input-lg" name="id_categoria" value='6' placeholder="ID de la categoría" required>
              </div>
            </div>
          </div>
        </div>
        <!-- PIE DEL MODAL -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar servicio</button>
        </div>
        <?php
          $controladorService->ctrCrearService();
        ?>
      </form>
    </div>
  </div>
</div>

<!-- MODAL EDITAR SERVICE -->
<div id="modalEditarService" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <!-- CABEZA DEL MODAL -->
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar servicio</h4>
        </div>
        <!-- CUERPO DEL MODAL -->
        <div class="modal-body">
          <div class="box-body">
            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <input type="text" class="form-control input-lg" name="editarNameService" id="editarNameService" required>
              </div>
            </div>
            <!-- ENTRADA PARA EL PRECIO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-money"></i></span>
                <input type="text" class="form-control input-lg" name="editarPrecio" id="editarPrecio" required>
              </div>
            </div>
            <!-- ENTRADA PARA LA DESCRIPCIÓN -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                <input list="listeditarDesService" type="text" class="form-control input-lg" name="editarDesService" id="editarDesService" required>
                    <datalist id="listeditarDesService">
                        <option>X kilo</option>
                        <option>Costo fijo</option>
                    </datalist>
              </div>
            </div>
            <!-- ENTRADA PARA EL ESTADO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-toggle-on"></i></span>
                <input list="list-editarActivador" type="text" class="form-control input-lg" name="editarActivador" id="editarActivador" required>
                    <datalist id="list-editarActivador">
                        <option>Activo</option>
                        <option>Desactivado</option>
                    </datalist>
              </div>
            </div>
            <!-- ENTRADA PARA LA CATEGORÍA -->
            <div class="form-group d-none">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tags"></i></span>
                <input  type="number" class="form-control input-lg" name="editarIdCategoria" id="editarIdCategoria" required>
                    
              </div>
            </div>
            <input type="hidden" name="idService" id="idService">
          </div>
        </div>
        <!-- PIE DEL MODAL -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
        <?php
          $controladorService->ctrEditarService();
        ?>
      </form>
    </div>
  </div>
</div>

<?php
  $controladorService->ctrBorrarService();
?>



<script>

document.addEventListener('DOMContentLoaded', e => {
    $('#editarActivador').autocomplete();
    $('#editarDesService').autocomplete();
}, false);



    /*=============================================
EDITAR SERVICIO
=============================================*/
$(".tablas").on("click", ".btnEditarService", function(){

var idService = $(this).attr("idService");

var datos = new FormData();
datos.append("idService", idService);

$.ajax({
    url: "ajax/services.ajax.php",
    method: "POST",
      data: datos,
      cache: false,
     contentType: false,
     processData: false,
     dataType:"json",
     success: function(respuesta){
         $("#editarNameService").val(respuesta["nameService"]);
         $("#editarPrecio").val(respuesta["precio"]);
         $("#editarDesService").val(respuesta["DesService"]);
         $("#editarActivador").val(respuesta["activador"]);
         $("#editarIdCategoria").val(respuesta["id_categoria"]);
         $("#idService").val(respuesta["idService"]);
     }
})
})

/*=============================================
ELIMINAR SERVICIO
=============================================*/
$(".tablas").on("click", ".btnEliminarService", function(){

var idService = $(this).attr("idService");

swal({
     title: '¿Está seguro de borrar el servicio?',
     text: "¡Si no lo está puede cancelar la acción!",
     type: 'warning',
     showCancelButton: true,
     confirmButtonColor: '#3085d6',
     cancelButtonColor: '#d33',
     cancelButtonText: 'Cancelar',
     confirmButtonText: 'Si, borrar servicio!'
 }).then((result)=>{
     if(result.value){
         window.location = "ruta=servicesadm&idService="+idService;
     }
})
})


//LIMPIADOR DE INPUT TEXT CON CARACTERES RAROS
document.addEventListener('blur', function(e) {
  // Verificar si el evento se disparó desde un input de tipo texto
  if (e.target.tagName === 'INPUT' && e.target.type === 'text') {
    console.log('CUIDADO, EL TEXTO ESCRITO DEBE CONTENER ÚNICAMENTE LETROS Y/O NÚMEROS');
    var texto = e.target.value.trim();
    texto = texto.replace(/\\/g, "");
    texto = texto.replace(/["']/g, function(match) {
      return '\\' + match;
    });
    e.target.value = texto;
  }
}, true); // El tercer argumento true indica que el evento se captura durante la fase de captura

</script>