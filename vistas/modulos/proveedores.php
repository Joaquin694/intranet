<style>
  .table-container {
    overflow-y: auto;
  }

  .img-thumbnail-custom {
    max-width: 50%;
    height: auto;
    width: auto;
    object-fit: cover;
  }

  .hidden {
    display: none;
  }
</style>

<div class="content-wrapper">



  <section class="content-header">



    <h1>



      Administrar colaborador



    </h1>



    <ol class="breadcrumb">



      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>



      <li class="active">Administrar colaboradores</li>



    </ol>



  </section>



  <section class="content">



    <div class="box">



      <div class="box-header with-border">



        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProveedor">



          <i class="fa fa-chevron-right" aria-hidden="true"></i> Agregar (Colaborador/Proveedor)



        </button>


        <div id="div"></div>

      </div>



      <div class="box-body">

        <div class="table-container">

          <table id="mitbl" class="table table-bordered table-striped dt-responsive tablas">



            <thead>



              <tr>

                <th style="width:10px">#</th>

                <th>Persona contacto</th>

                <th>Doc.</th>

                <th>Documento ID</th>

                <th>Teléfono</th>

                <th>Email</th>

                <th>Razón social</th>

                <th>RUC</th>

                <th>Dirección</th>

                <th>CV</th>

                <th>Modalidad pago</th>

                <th>Monto</th>

                <th>Rubro de proveedor</th>

                <th>Categoria</th>

                <th>Acciones</th>


              </tr>



            </thead>



            <tbody>



              <?php



              $item = null;

              $valor = null;



              $proveedores = ControladorProveedores::ctrMostrarProveedores($item, $valor);



              foreach ($proveedores as $key => $value) {





                echo '<tr >
  
  
  
                    <td>' . ($key + 1) . '</td>
  
  
  
                    <td>' . $value['nombres'] . '</td>
  
                    <td>' . $value['tipo_documento'] . '</td>
  
                    <td>' . $value['num_documento'] . '</td>                    
  
                    <td>' . $value['telefono'] . '</td>
  
                    <td>' . $value['email'] . '</td>                    
  
                    <td>' . $value['razon_social'] . '</td>
  
                    <td>' . $value['ruc'] . '</td>
  
                    <td>' . $value['direccion_prov'] . '</td>

                    <td>';

                if (!empty($value["cv"])) {
                  echo '<a href="' . $value["cv"] . '" target="_blank">
                              <img src="' . $value["cv"] . '" class="img-thumbnail-custom" onerror="this.onerror=null;this.src=\'vistas/img/plantilla/pdf.png\';">
                          </a>';
                } else {
                  echo '<img src="vistas/img/plantilla/pdf-bn.png" class="img-thumbnail-custom">';
                }

                echo '</td>

                    <td>' . $value['modalidad_pago'] . '</td>
  
                    <td>' . $value['monto'] . '</td>
  
                    <td>' . $value['rubro'] . '</td>

                    <td>' . $value['categoria'] . '</td>
                    
                    <td>
  
  
  
                      <div class="btn-group">
  
                          
  
                        <button class="btn btn-warning btnEditarProveedor" data-toggle="modal" data-target="#modalEditarProveedor" idProveedor="' . $value["proveedor_pk"] . '"><i class="fa fa-pencil"></i></button>';



                if ($_SESSION["perfil"] == "Administrador") {



                  echo '<button class="btn btn-danger btnEliminarProveedor" idProveedor="' . $value["proveedor_pk"] . '"><i class="fa fa-times"></i></button>';
                }



                echo '</div>  
  
  
  
                    </td>
  
  
  
                  </tr>';
              }



              ?>



            </tbody>



          </table>

        </div>




      </div>



    </div>



  </section>



</div>



<!--=====================================

MODAL AGREGAR Proveedor

======================================-->



<div id="modalAgregarProveedor" class="modal fade" role="dialog">



  <div class="modal-dialog">



    <div class="modal-content">



      <form id="agregar_proveedor_form" method="POST" autocomplete="false" name="namefor" enctype="multipart/form-data">

        <!-- <input type="hidden" id="accionar" name="accionar" value="guardar"> -->


        <!--===================================== accionar2

        CABEZA DEL MODAL

        ======================================-->



        <div class="modal-header" style="background:#3c8dbc; color:white">



          <button type="button" class="close" data-dismiss="modal">&times;</button>



          <h4 class="modal-title">Agregar colaborador</h4>



        </div>



        <!--=====================================

        CUERPO DEL MODAL

        ======================================-->



        <div class="modal-body">



          <div class="box-body">



            <!-- PERSONA CONTACTO -->

            <div id="nombreContacto" class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input id="newNomPersCont" type="text" class="form-control input-lg" name="nombre" placeholder="Nombre - persona de contacto">

              </div>

            </div>



            <!-- ENTRADA DE TIPO DOCUMENTO -->

            <div class="form-group">

              <div class="input-group">



                <span class="input-group-addon"><i class="fa fa-th"></i></span>



                <select id="newSelTipDoc" class="form-control input-lg" id="nuevaCategoria" name="nuevaCategoria" required>



                  <!-- <option value="">Tipo documento identidad</option> -->



                  <?php



                  $item = null;

                  $valor = null;



                  $array = ControladorTipoDocumentos::ctrMostrarTipoDocumentos($item, $valor);



                  foreach ($array as $key => $value) {



                    echo '<option value="' . $value["id"] . '">' . $value["tipo_documento"] . '</option>';
                  }



                  ?>


                </select>



              </div>

            </div>

            <!-- ENTRADA PARA EL N° identidad -->



            <div class="form-group">



              <div class="input-group">



                <span class="input-group-addon"><i class="fa fa-th-large"></i></span>



                <input id="newNumIdent" type="number" class="form-control input-lg" name="numidentidad" placeholder="N° identidad" required>



              </div>



            </div>





            <!-- ENTRADA PARA EL TELÉFONO -->



            <div class="form-group">



              <div class="input-group">



                <span class="input-group-addon"><i class="fa fa-phone"></i></span>



                <input id="newTelefono" type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask':'(999) 999-999'" data-mask required>



              </div>



            </div>



            <!-- ENTRADA PARA EL EMAIL -->



            <div class="form-group">



              <div class="input-group">



                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>



                <input id="newEmail" type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" required>



              </div>



            </div>



            <!-- ENTRADA PARA LA RAZÓN SOCIAL -->



            <div class="form-group">



              <div class="input-group">



                <span class="input-group-addon"><i class="fa  fa-building-o"></i></span>



                <input id="newRazonSocial" type="text" class="form-control input-lg" name="razonsocial" placeholder="Nombre Proveedor" required>



              </div>



            </div>



            <!-- ENTRADA PARA RUC -->



            <div class="form-group">



              <div class="input-group">



                <span class="input-group-addon"><i class="fa  fa-th-large"></i></span>



                <input id="newRuc" type="number" class="form-control input-lg" name="ruc" placeholder="N° identidad del proveedor" required>



              </div>



            </div>



            <!-- ENTRADA PARA LA DIRECCIÓN -->



            <div class="form-group">



              <div class="input-group">



                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>



                <input id="newNuevaDireccion" type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección" required>





              </div>

            </div>

            <div class="form-group">
              <div class="input-group">
                <label for="categoria">Categoría</label>
                <select class="form-control input-lg" id="categoria" name="categoria" required>
                  <option value="">Seleccionar categoría</option>
                  <option value="colaborador">Colaborador</option>
                  <option value="proveedor">Proveedor</option>
                </select>
              </div>
            </div>

            <!-- ENTRADA PARA CARGAR CV -->
            <div id="campoCV" class="form-group hidden">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-file"></i></span>
                <input id="cv" type="file" class="form-control-file" name="cv" placeholder="Cargar cv" accept=".pdf" multiple>
              </div>
            </div>

            <!-- CAMPO DE MODALIDAD DE PAGO (oculto inicialmente) -->
            <div id="campoModalidad" class="hidden">
              <div class="row">
                <div class="col-md-8">
                  <label for="modalidadPago">Modalidad de pago</label>
                  <select class="form-control input-lg" id="modalidadPago" name="modalidadPago">
                    <option value="">Seleccionar modalidad</option>
                    <option value="hora">Por hora</option>
                    <option value="medioDia">Por medio día</option>
                    <option value="dia">Por día</option>
                    <option value="mes">Por mes</option>
                    <option value="montoFijo">Monto fijo</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="monto">Monto</label>
                  <input id="monto" type="number" class="form-control input-lg" name="monto" placeholder="Monto">
                </div>
              </div>

              <!-- ENTRADA PARA RUBRO DE PROVEEDOR -->
              <div class="form-group">
                <div class="input-group">
                  <label for="rubro">Rol de Colaborador</label>
                  <select class="form-control input-lg" id="rubro" name="rubro">
                    <option value="">seleccionar rubro</option>
                    <option value="conductor">Conductor</option>
                    <option value="contador">Contador</option>
                    <option value="consultor">Consultor</option>
                  </select>
                </div>
              </div>
            </div>


            <br><br>

            <div>

              <h4 id="newokedit"></h4>

            </div>





          </div>



        </div>



        <!--=====================================

        PIE DEL MODAL

        ======================================-->



        <div class="modal-footer">



          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>



          <button type="submit" class="btn btn-primary">Guardar colaborador</button>



        </div>



      </form>



      <?php



      // $crearProveedor = new ControladorProveedores();

      // $crearProveedor -> ctrCrearProveedor();



      ?>



    </div>



  </div>



</div>



<!--=====================================

MODAL EDITAR Proveedor

======================================-->



<div id="modalEditarProveedor" class="modal fade" role="dialog">



  <div class="modal-dialog">



    <div class="modal-content">



      <!-- <form role="form" method="post" class="formEditar" action=""> -->

      <form id="actualizar_proveedor_form" method="POST" autocomplete="false" name="namefor" enctype="multipart/form-data">



        <!--=====================================

        CABEZA DEL MODAL

        ======================================-->



        <div class="modal-header" style="background:#3c8dbc; color:white">



          <button type="button" class="close" data-dismiss="modal">&times;</button>



          <h4 class="modal-title">Editar colaborador</h4>



        </div>



        <!--=====================================

        CUERPO DEL MODAL

        ======================================-->



        <div class="modal-body">



          <div class="box-body">



            <!-- PERSONA CONTACTO -->

            <div id="nameProveedorBD" class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="hidden" id="idProveedor" name="idProveedor">
                <input type="hidden" id="idfkpersona" name="fk_persona">

                <input type="text" class="form-control input-lg" id="ideditarProveedor" name="editarProveedor" placeholder="Nombre - persona de contacto" >

              </div>

            </div>



            <!-- ENTRADA DE TIPO DOCUMENTO -->

            <div class="form-group">

              <div class="input-group">



                <span class="input-group-addon"><i class="fa fa-th"></i></span>



                <select class="form-control input-lg" id="editartipodocuident" name="editartipodocuident" required>



                  <option value="">Tipo documento identidad</option>



                  <?php



                  $item = null;

                  $valor = null;



                  $array = ControladorTipoDocumentos::ctrMostrarTipoDocumentos($item, $valor);



                  foreach ($array as $key => $value) {



                    echo '<option value="' . $value["id"] . '">' . $value["tipo_documento"] . '</option>';
                  }



                  ?>



                </select>



              </div>

            </div>

            <!-- ENTRADA PARA EL N° identidad -->



            <div class="form-group">



              <div class="input-group">



                <span class="input-group-addon"><i class="fa fa-th-large"></i></span>



                <input type="text" class="form-control input-lg" id="editarnumidentidad" name="editarnumidentidad" placeholder="N° identidad de la persona de contacto" required>



              </div>



            </div>





            <!-- ENTRADA PARA EL TELÉFONO -->



            <div class="form-group">



              <div class="input-group">



                <span class="input-group-addon"><i class="fa fa-phone"></i></span>



                <input type="text" class="form-control input-lg" id="editarnuevoTelefono" name="editarnuevoTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask':'(999) 999-999'" data-mask required>



              </div>



            </div>



            <!-- ENTRADA PARA EL EMAIL -->



            <div class="form-group">



              <div class="input-group">



                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>



                <input type="email" class="form-control input-lg" id="editarnuevoEmail" name="editarnuevoEmail" placeholder="Ingresar email" required>



              </div>



            </div>



            <!-- ENTRADA PARA LA RAZÓN SOCIAL -->



            <div class="form-group">



              <div class="input-group">



                <span class="input-group-addon"><i class="fa  fa-building-o"></i></span>



                <input type="text" class="form-control input-lg" id="editarrazonsocial" name="editarrazonsocial" placeholder="Razón social" required>



              </div>



            </div>



            <!-- ENTRADA PARA RUC -->



            <div class="form-group">



              <div class="input-group">



                <span class="input-group-addon"><i class="fa  fa-th-large"></i></span>



                <input type="number" class="form-control input-lg" id="editarruc" name="editarruc" placeholder="N° identidad de la empresa" required>



              </div>



            </div>



            <!-- ENTRADA PARA LA DIRECCIÓN -->



            <div class="form-group">



              <div class="input-group">



                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>



                <input type="text" class="form-control input-lg" id="editarnuevaDireccion" name="editarnuevaDireccion" placeholder="Ingresar dirección" required>



                <input type="hidden" id="accionar" name="accionar" value="editar">

              </div>

            </div>

            <div class="form-group">
              <div class="input-group">
                <label for="categoriaDB">Categoría</label>
                <select class="form-control input-lg" id="categoriaDB" name="categoria" required>
                  <option value="">Seleccionar categoría</option>
                  <option value="colaborador">Colaborador</option>
                  <option value="proveedor">Proveedor</option>
                </select>
              </div>
            </div>

            <!-- ENTRADA PARA CARGAR CV -->
            <div id="campoCV2" class="form-group hidden">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-file"></i></span>
                <input id="Upcv" type="file" class="form-control-file" name="Upcv" placeholder="Cargar cv" accept=".pdf" multiple>
                <input type="hidden" id="UpcvDb" name="UpcvDb">
              </div>
            </div>

            <!-- CAMPO DE MODALIDAD DE PAGO (oculto inicialmente) -->
            <div id="campoModalidad2" class="hidden">
              <div class="row">
                <div class="col-md-8">
                  <label for="UpmodalidadPago">Modalidad de pago</label>
                  <select class="form-control input-lg" id="UpmodalidadPago" name="UpmodalidadPago">
                    <option value="">Seleccionar modalidad</option>
                    <option value="hora">Por hora</option>
                    <option value="medioDia">Por medio día</option>
                    <option value="dia">Por día</option>
                    <option value="mes">Por mes</option>
                    <option value="montoFijo">Monto fijo</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="Upmonto">Monto</label>
                  <input id="Upmonto" type="number" class="form-control input-lg" name="Upmonto" placeholder="Monto">
                </div>
              </div>

              <!-- ENTRADA PARA RUBRO DE PROVEEDOR -->
              <div class="form-group">
                <div class="input-group">
                  <label for="Uprubro">Rol de proveedor</label>
                  <select class="form-control input-lg" id="Uprubro" name="Uprubro">
                    <option value="">seleccionar rubro</option>
                    <option value="conductor">Conductor</option>
                    <option value="contador">Contador</option>
                    <option value="consultor">Consultor</option>
                  </select>
                </div>
              </div>
            </div>

            <br><br>

            <div>

              <h4 id="okedit"></h4>

            </div>



          </div>



        </div>



        <!--=====================================

        PIE DEL MODAL

        ======================================-->



        <div class="modal-footer">



          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary btnsend">Guardar cambios</button>



        </div>



      </form>




      <?php


      ?>







    </div>



  </div>



</div>



<?php



$eliminarProveedor = new ControladorProveedores();

$eliminarProveedor->ctrEliminarProveedor();



?>





<script type="text/javascript">
  //REFRESH TABLE ON CLIC al cerrar modal osita Oki 922406970


  function refreshtable() {

    location.reload();

    $('input[type="text"]').val('');

  }

  // $(".modal").on('hidden.bs.modal', function() {

  //   refreshtable()

  // });


  // Asignación de nom dni
  $("#newNumIdent").blur(function() {
    /*------------------------------------------------*/
    var cod = $("#newNumIdent").val();

    if (cod.length == 8) {
      var laaction = 'buscarPersona';

      var dataen =
        'cod=' + cod +
        '&laaction=' + laaction;
      $.ajax({
        type: 'post',
        url: 'controladores/api.controlador.php',
        data: dataen,
        success: function(resp) {
          $("#div").html(resp);
        }
      });
      return false;
    }
  });



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


  $("#newSelTipDoc").change(function() {
    $('form[name="namefor"]').find('input').not('#newSelTipDoc').val('');
  });


  $("#newRuc").change(function() {
    var campo_cliente = $('#newNomPersCont').val();
    var newSelTipDocv = $('#newRuc').val();
    var tipoDocu = $('#newSelTipDoc').val();



    if (newSelTipDocv.length == '8' && tipoDocu == '1' && campo_cliente.length < 1 && newSelTipDocv !== '00000000') {
      var request = $.ajax({
        url: "https://dniruc.apisperu.com/api/v1/dni/" + newSelTipDocv + "?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImFiYWRlc3F1ZW5sZXluZXJAZ21haWwuY29tIn0.NTjj1t6MHEf8-2jIl3LNVF-nnLk1vaEHnmcC06QH54c",
        method: "GET"
      });
      request.done(function(data) {
        var name_cli = (data.nombres + ' ' + data.apellidoPaterno + ' ' + data.apellidoMaterno).replace(/Ñ/gi, "N");
        $('#newRazonSocial').val(name_cli);
        $('#newNuevaDireccion').val('No especifica');
      });
    } else if (newSelTipDocv.length == '11' && tipoDocu == '2' && campo_cliente.length < 1) {
      var request = $.ajax({
        url: "https://dniruc.apisperu.com/api/v1/ruc/" + newSelTipDocv + "?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImFiYWRlc3F1ZW5sZXluZXJAZ21haWwuY29tIn0.NTjj1t6MHEf8-2jIl3LNVF-nnLk1vaEHnmcC06QH54c",
        method: "GET"
      });
      request.done(function(data) {

        $('#newRazonSocial').val(data.razonSocial);
        $('#newNuevaDireccion').val(data.direccion);
      });
    } else if (newSelTipDocv.length == '8' && tipoDocu == 'DNI' && campo_cliente.length < 1 && newSelTipDocv === '00000000') {
      $('#newRazonSocial').val('Sin especificar');
      $('#newNuevaDireccion').val('No especifica');
    }


  });

  document.addEventListener('DOMContentLoaded', function() {

    var categoriaSelect = document.getElementById('categoria');
    var campocv = document.getElementById('campoCV');
    var campoModal = document.getElementById('campoModalidad');
    var nombreC = document.getElementById('nombreContacto');
    var inputNombreC = nombreC.querySelector('input');


    campoModal.classList.add('hidden');
    campocv.classList.add('hidden');
    nombreC.classList.add('hidden');

    function mostrarCampos(categoria) {
      switch (categoria) {
        case 'colaborador':
          campocv.classList.remove('hidden');
          campoModal.classList.remove('hidden');
          nombreC.classList.remove('hidden');
          inputNombreC.required = true;
          break;
        case 'proveedor':
          campocv.classList.add('hidden');
          campoModal.classList.add('hidden');
          nombreC.classList.add('hidden');
          inputNombreC.required = false;
          break;
        default:
          campocv.classList.add('hidden');
          campoModal.classList.add('hidden');
          nombreC.classList.add('hidden');
          inputNombreC.required = false;

          break;
      }
    }

    categoriaSelect.addEventListener('change', function() {
      mostrarCampos(categoriaSelect.value);
    });

    mostrarCampos(categoriaSelect.value);

  });

  $(document).ready(function() {
    var categoriaSelect2 = document.getElementById('categoriaDB');
    var campocv2 = document.getElementById('campoCV2');
    var campoModal2 = document.getElementById('campoModalidad2');
    var nombreC = document.getElementById('nameProveedorBD');

    var inputNombreC = nombreC.querySelector('input');


    function mostrarCampos2(categoria) {
      switch (categoria) {
        case 'colaborador':
          campocv2.classList.remove('hidden');
          campoModal2.classList.remove('hidden');
          nombreC.classList.remove('hidden');
          inputNombreC.required = true;
          break;
        case 'proveedor':
          campocv2.classList.add('hidden');
          campoModal2.classList.add('hidden');
          nombreC.classList.add('hidden');
          inputNombreC.required = false;
          break;
        default:
          campocv2.classList.add('hidden');
          campoModal2.classList.add('hidden');
          nombreC.classList.add('hidden');
          inputNombreC.required = false;
          break;
      }
    }

    $(categoriaSelect2).on('change', function() {
      mostrarCampos2(categoriaSelect2.value);
    });

    mostrarCampos2(categoriaSelect2.value);
  });
</script>