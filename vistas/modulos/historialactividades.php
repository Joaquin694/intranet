<div class="content-wrapper">
  <section class="content">
    <div class="box">
      <div class="box-header with-border"><br>
        <h3 class="box-title" style="padding-left: 20px !important; font-weight: 800">Gestión de actividades - Historial</h3><br>
        <h5 id="cabezaFactGeneral" class="titulitononegroT" style="background: white;border: 5px solid #fbf9f9;padding: 25px;font-size: 20px">
          <!-- <span class="dropdown" style="float: left;margin-top: -25px;margin-left:  -25px;">
            <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown" style="background: #f4f4f4 !important"><i class="fa fa-sliders" aria-hidden="true"></i>
              <span class="caret"></span></button>
              <ul class="dropdown-menu">
                <li><a href="#" ><i class="fa fa-chevron-right" aria-hidden="true"></i> Libro electrónico de ventas</a></li>
                <li><a href="#" target="_blank"><i class="fa fa-chevron-right" aria-hidden="true"></i> Diario de ventas</a></li>
              </ul> 
            </span> -->
          <i id="flySedeM" class="fa fa-long-arrow-right stpFly" aria-hidden="true"></i><b> Actividades: </b>
          <span style="font-size: 16.5px">Seleccionar rango fecha:
            <input type="text" name="datefilter" value="" style="outline:0px;background: transparent;border: 0px;border-bottom: 1px solid #3ec0ef;color: #1b65a5;width: 200px !important" />
            <a href="#" id="btnBuscar"><img src="vistas/img/plantilla/buscar.png" style="width: 30px"></a>
          </span>
        </h5>
      </div>
      <div class="box-body">
        <center id='cuerpito_tabla' class="_able-container">
          <img id="buscar" src="https://media.istockphoto.com/vectors/happy-smiling-robot-chat-bot-vector-vector-id846505204?k=6&m=846505204&s=170667a&w=0&h=5TeEo5TnRyT73Bf4gQLzWu0e_7yMk6yziQbjVdbFhtk=" style="width: 400px">
        </center>
        <center id='idNewNC' class='d-none'>
          <?php echo "Cargando..."; ?>
        </center>
      </div>
    </div>
  </section>
</div>



<!-- modalVerDetalleCompra -->
<div id="modalVerDetalleCompra" class="modal fade" role="dialog" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!--=====================================        CABEZA DEL MODAL        ======================================-->
      <div class="modal-header" style="background:#3c8dbc; color:white">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title btn-success badge">Detalle de cotizacion </h4>
        <input type="hidden" name="accion" value="add_pago_compra">
      </div>
      <!--=====================================        CUERPO DEL MODAL        ======================================-->
      <div class="modal-body areaimpresion" style="padding:0" id="section-to-print">
        <div class="row" style="margin:0">
          <div class="col-sm-4 text-center">
            <!--span class="id_cotizacion_ceros" style="font-family: 'Libre Barcode 128', cursive;;font-size: 75px;margin-bottom: -53px;display: block;"></span><br>
                <div>N° <span class="id_cotizacion_ceros_num">123456789</span></div-->
            <img src="" class="cotimg">
          </div>
          <div class="col-sm-4">
            <div class="text-center" style="background:#c63e48;color:white;font-size:25px;height: 100;border-radius: 0 0 36px 36px;">
              <img src="vistas/img/moali.png" alt="">
            </div>
          </div>
          <div class="col-sm-4 text-right">
            <br>
            <b>Fecha Emisión:<br>
              12/10/2022<br>
              <span style="color:#c63e48">Fecha Validez:<br>
                15/10/2022</span></b>
          </div>
          <div class="col-sm-12 text-center" style="padding: 1rem;">
            <div class="text-center" style="color:#c63e48;border: 1px solid;"></div>
          </div>
          <div class="col-sm-12 text-center" style="font-size:37px;font-weight: 700;color:#c63e48">COTIZACION</div>
          <div class="col-sm-4" style="background:#c63e48;color:white;font-size: 18px;border-radius: 0 36px 36px 0;">
            INFORMACIÓN GENERAL
          </div>
          <div class="col-sm-8">&nbsp;</div>
          <div style="height: 10px;width: 100%;overflow: hidden;"></div>
          <div class="col-sm-5" style="font-weight: 600;">
            <span style="color:#c63e48">Cliente:</span> <span class="nombre_cliente">RAZON SOCIAL NOMBRE LARGO PRUEBA</span><br>
            <span style="color:#c63e48">Dirección:</span> <span class="direccion">DIRECCION DE EMPRESA MUY LARGO PARA DMO</span>
          </div>
          <div class="col-sm-4" style="font-weight: 600;">
            <span style="color:#c63e48">RUC:</span> <span class="numero_documento">20600000000</span><br>
            <span style="color:#c63e48">Contacto:</span> <span class="nombre_contacto">CONTACTO COTIZACION</span>
          </div>
          <div class="col-sm-3" style="font-weight: 600;">
            <span style="color:#c63e48">Telefono:</span> <span class="telefono_contacto">99999999</span><br>
            <span style="color:#c63e48">Doc:</span> <span class="documento_contacto">88888888</span><br>
          </div>
          <div style="width:100%;height:20px;display: inline-block;"></div>
          <div class="col-sm-12">
            <table class="table table-condensed table-bordered" id="tbpagos">
              <thead>
                <tr class="bg-dark">
                  <th>Item</th>
                  <th>Producto</th>
                  <th>Cant</th>
                  <th>Unid</th>
                  <th>Valor Unit</th>
                  <th>Valor TOTAL</th>
                </tr>
              </thead>
              <tbody id="tr_detalle_compra"></tbody>
            </table>
          </div>
          <div class="col-sm-8"></div>
          <div class="col-sm-4">
            <div style="background: #ffe6e9;border-radius: 15px;padding: 10px 0;">
              <div class="row" style="margin: 0;font-weight: 600;">
                <div class="col-sm-6" style="padding-right: 0;">
                  <div class="text-right" style="border-bottom:1px solid #c63e48;border-right: 1px solid #c63e48;padding: 0 8px;color: #c63e48;">SUB TOTAL</div>
                </div>
                <div class="col-sm-6" style="padding-left: 0;">
                  <div class="total_gravado_o_inafecto" style="border-bottom:1px solid #c63e48;padding: 0 8px;">0.00</div>
                </div>
                <div class="col-sm-6" style="padding-right: 0;">
                  <div class="text-right" style="border-bottom:1px solid #c63e48;border-right: 1px solid #c63e48;padding: 0 8px;color: #c63e48;">IGV</div>
                </div>
                <div class="col-sm-6" style="padding-left: 0;">
                  <div class="total_igv" style="border-bottom:1px solid #c63e48;padding: 0 8px;">0.00</div>
                </div>
                <div class="col-sm-6" style="padding-right: 0;">
                  <div class="text-right" style="border-right: 1px solid #c63e48;padding: 0 8px;color: #c63e48;">IMPORTE TOTAL</div>
                </div>
                <div class="col-sm-6" style="padding-left: 0;">
                  <div class="total_cotizacion" style="padding: 0 8px;">0.00</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4" style="background:#e9f7e4;color:#59b734;font-size: 18px;border-radius: 0 36px 36px 0;">
            Aceptación del Cliente
          </div>
          <div class="col-sm-8"></div>
          <div style="width:100%;height:10px;display: inline-block;"></div>
          <div class="col-sm-4">
            <b>Acepto y me obligo a pagar.</b><br><br>
            <b>Firma:______________________</b><br>
            <b>Nombre:____________________</b><br>
            <b>RUC/DNI:____________________</b><br><br>
          </div>
          <div style="width:100%;height:10px;display: inline-block;"></div>
          <div class="col-sm-5" style="background:#606060;color:white;font-size: 18px;border-radius: 0 36px 36px 0;">
            Observaciones generales de cotización
          </div>
          <div style="width:100%;height:10px;display: inline-block;"></div>
          <div class="col-sm-6">
            <ol type="1" style="font-size: 12px;padding-left: 15px;">
              <li>El valor total no incluye el envío, el producto se entrega en Villa Rica.</li>
              <li>Los precios pueden cambiar sin previo aviso.</li>
              <li>Enviar el comprobante de pago, para proceder con el despacho.</li>
              <li>Realizar el pago a nombre de “LABORATORIO DE CAFÉ MOALI” en:</li>
            </ol>
          </div>
          <div style="width:100%;height:10px;display: inline-block;"></div>
          <div class="col-sm-4">
            <b>BANCO<br>
              BANCO DE CREDITO DEL PERÚ(BCP)<br>
              BANCO INTERBANK</b>
          </div>
          <div class="col-sm-4">
            <b>CUENTA CORRIENTE<br>
              CC N° 4102 3192 79073<br>
              CC N° 5903 0021 60947</b>
          </div>
          <div class="col-sm-4">
            <b>CUENTA INTERBANCARIA<br>
              CCI N° 0024 1000 2319 2790 7393<br>
              CCI N° 0035 9000 3002 1609 477</b>
          </div>
          <div class="col-sm-12">
            <br>
            <b>YAPE: 952 820 007<br>
              PLIN: 952 820 007</b>
          </div>
          <div class="col-sm-12">
            <ol start="5" type="1" style="font-size: 12px;padding-left: 15px;">
              <li>El servicio incluye Certificado de Control de Calidad (Análisis Sensorial), firmado por el Lic. Q Arábico Grader.</li>
              <li>Horario de Atencion: Lunes a Sábado de 09:00 am. a 5:00 pm.</li>
            </ol>
          </div>
          <div style="width:100%;height:10px;display: inline-block;"></div>
          <div class="col-sm-3" style="background:#c4c4c4;color:#606060;font-size: 18px;border-radius: 0 36px 36px 0;">
            Forma de Pago<br>
            <span class="condicion_pago" style="text-transform:uppercase;color: #000;font-size: 24px;font-weight: 700;">CONTADO</span>
          </div>
          <div class="col-sm-9 text-right" style="font-weight: 600;">
            RUC: 20601012597<br>
            Jr. Pozuzo 353 Villa Rica, Perú | Telf.: 952 820 007<br>
            Email: info@moalilab.com | Web: www.moalilab.com
          </div>
        </div>
      </div>
      <!--=====================================        PIE DEL MODAL        ======================================-->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
      </div>
    </div>
  </div>
</div>

<div id="modalEditar" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 99%;">
    <!-- Modal content-->
    <div class="modal-content">
      <form id="formEditar" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Gestión</h4>
        </div>
        <div class="box-body">
          <div class="box">
            <!-- Sección 1: Lista de personas a atender -->
            <div class="col-lg-12 col-xs-12">
              <h4>Lista de Personas a Atender*</h4>
              <ul id="listaClientes" class="list-group">
                <!-- Aquí se cargarán las personas en la cola, ordenadas por orden de llegada -->
              </ul>
            </div>


            <div id="asistente" class="col-lg-12 col-xs-12">
              <!-- Input DNI del Cliente -->
              <div class="col-lg-1 col-xs-12">
                <div class="form-group">
                  <label for="dniCliente">Id Asistente</label>
                  <input type="text" class="form-control" id="ACdniAsistente" name="dniAsistente" value='<?php echo $_SESSION["id"]; ?>'>
                </div>
              </div>
            </div>

            <div class="col-lg-12 col-xs-12">
              <h4>Datos del usuario atendido - Asistente</h4>
            </div>

            <!-- Espacio adicional entre secciones -->
            <div class="col-lg-12 col-xs-12">
              <hr>
            </div>
            <!-- Radio Buttons para selección de categoría -->
            <div class="col-lg-12 col-xs-12">
              <div class="form-group">
                <div>
                  <label class="labeli"><input class='rdbtnLop' type="radio" name="categoria" value="cliente" onclick="showInputs('cliente')"> Recepción por colas</label>
                  <label class="labeli"><input class='rdbtnLop' type="radio" name="categoria" value="docente" onclick="showInputs('docente')"> Docente</label>
                  <label class="labeli"><input class='rdbtnLop' type="radio" name="categoria" value="externo" onclick="showInputs('externo')"> Externo*</label>
                  <label class="labeli"><input class='rdbtnLop' type="radio" name="categoria" value="labores" onclick="showInputs('labores')"> Labores administrativas</label>
                </div>
              </div>
            </div>

            <!-- Bloques de entrada de datos según la selección -->
            <div id="cliente" class="input-block col-lg-12 col-xs-12">
              <h4>Datos del usuario atendido - Recepción por colas</h4>
              <!-- Input DNI del Cliente -->
              <div class="col-lg-2 col-xs-12">
                <div class="form-group">
                  <label for="dniCliente">DNI del Cliente</label>
                  <input type="text" class="form-control" id="ACdniCliente" name="dniCliente" required autocomplete="off">
                  <input type="hidden" id="id" name="id" >
                </div>
              </div>

              <!-- Input Nombre y Apellido del Cliente -->
              <div class="col-lg-4 col-xs-12">
                <div class="form-group">
                  <label for="nombreCliente">Nombre y Apellido del Cliente</label>
                  <input type="text" class="form-control" id="ACnombreCliente" name="nombreCliente" required autocomplete="off">
                </div>
              </div>

              <!-- Input DNI del Alumno Consultado -->
              <div class="col-lg-2 col-xs-12">
                <div class="form-group">
                  <label for="dniAlumno">DNI del Alumno Consultado</label>
                  <input type="text" class="form-control" id="ACdniAlumno" name="dniAlumno" required autocomplete="off">
                </div>
              </div>

              <!-- Input Nombre y Apellido del Alumno Consultado -->
              <div class="col-lg-4 col-xs-12">
                <div class="form-group">
                  <label for="nombreAlumno">Nombre y Apellido del Alumno Consultado</label>
                  <input type="text" class="form-control" id="ACnombreAlumno" name="nombreAlumno" required autocomplete="off">
                </div>
              </div>


              <!-- Input Carrera -->
              <div class="col-lg-3 col-xs-12">
                <div class="form-group">
                  <label for="carreraCiclo">Carrera</label>
                  <input type="text" class="form-control" id="ACcarreraCiclo" name="carreraCiclo" required autocomplete="off">
                </div>
              </div>

              <!-- Input Ciclo -->
              <div class="col-lg-1 col-xs-12">
                <div class="form-group">
                  <label for="ciclo">Ciclo</label>
                  <input type="text" class="form-control" id="ACciclo" name="ciclo" required autocomplete="off">
                </div>
              </div>
            </div>

            <div id="docente" class="input-block col-lg-12 col-xs-12">
              <h4>Datos del usuario atendido - Docente</h4>
              <!-- Input DNI del Cliente -->
              <div class="col-lg-2 col-xs-12">
                <div class="form-group">
                  <label for="dniCliente">DNI del Docente</label>
                  <input type="text" class="form-control" id="ACdniDocente" name="dniDocente" required autocomplete="off">
                </div>
              </div>

              <!-- Input Nombre y Apellido del Docente -->
              <div class="col-lg-4 col-xs-12">
                <div class="form-group">
                  <label for="nombreDocente">Nombre y Apellido del Docente</label>
                  <input type="text" class="form-control" id="ACnombreDocente" name="nombreDocente" required autocomplete="off">
                </div>
              </div>
            </div>

            <div id="externo" class="input-block col-lg-12 col-xs-12">
              <h4>Datos del usuario atendido - Externo</h4>
              <!-- Input DNI del Externo -->
              <div class="col-lg-2 col-xs-12">
                <div class="form-group">
                  <label for="dniExterno">DNI del Externo</label>
                  <input type="text" class="form-control" id="ACdniExterno" name="dniExterno" required autocomplete="off">
                </div>
              </div>

              <!-- Input Nombre y Apellido del Externo -->
              <div class="col-lg-4 col-xs-12">
                <div class="form-group">
                  <label for="nombreExterno">Nombre y Apellido del Externo</label>
                  <input type="text" class="form-control" id="ACnombreExterno" name="nombreExterno" required autocomplete="off">
                </div>
              </div>
            </div>

            <script>
              function showInputs(category) {
                // Ocultar todos los bloques de entrada
                document.querySelectorAll('.input-block').forEach(block => block.style.display = 'none');

                // Mostrar el bloque correspondiente a la selección
                document.getElementById(category).style.display = 'block';
              }

              // Inicialmente ocultar todos los bloques
              document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.input-block').forEach(block => block.style.display = 'none');
              });
            </script>


            <div class="col-lg-12 col-xs-12 bgbgbgb">
              <!-- Subtítulo para datos del caso laboral realizado -->
              <div class="col-lg-12 col-xs-12">
                <hr>
                <h4>Registro de actividad </h4>
              </div>

              <!-- Input Categoría del Motivo Atendido -->
              <div class="col-lg-2 col-xs-12">
                <div class="form-group">
                  <label for="categoriaMotivo">Categoría del Motivo Atendido</label>
                  <select class="form-control inputi" id="ACcategoriaMotivo" name="categoriaMotivo" required>
                    <option value="Consulta">Consulta</option>
                    <option value="Reclamo">Reclamo</option>
                    <option value="Solicitud">Solicitud</option>
                    <!-- Otras opciones pueden añadirse aquí -->
                  </select>
                </div>
              </div>

              <!-- Input Motivo en Líneas Generales -->
              <div class="col-lg-4 col-xs-12">
                <div class="form-group">
                  <label for="motivoGenerales">Motivo en Líneas Generales</label>
                  <input type="text" class="form-control" id="ACmotivoGenerales" name="motivoGenerales" required autocomplete="off">
                </div>
              </div>

              <!-- Textarea Comentario de la Atención Prestada -->
              <div class="col-lg-6 col-xs-12">
                <div class="form-group">
                  <label for="comentarioAtencion">Comentario de la Atención Prestada</label>
                  <textarea class="form-control" id="ACcomentarioAtencion" name="comentarioAtencion" rows="4" required></textarea>
                </div>
              </div>

              <!-- Select con opciones de estado del caso -->
              <div class="col-lg-2 col-xs-12">
                <div class="form-group">
                  <label for="estadoCaso">Estado del Caso</label>
                  <select class="form-control inputi" id="ACestadoCaso" name="estadoCaso">
                    <option value="cerrado">Caso cerrado</option>
                    <option value="pendiente">Caso pendiente</option>
                    <option value="derivado">Caso derivado</option>
                  </select>
                </div>
              </div>

              <!-- Selección de área para casos derivados -->
              <div class="col-lg-4 col-xs-12 " id="selectArea">
                <div class="form-group">
                  <label for="areaDerivada">Indicar Área a Derivar</label>
                  <input type="text" class="form-control" id="ACareaDerivada" name="areaDerivada" placeholder="Indicar área...">
                </div>
              </div>
              <!-- Input para cargar evidencia 1 -->
              <div class="col-lg-3 col-xs-12">
                <div class="form-group">
                  <label for="evidencia1">Cargar Evidencia (Imagen o Archivo 1)</label>
                  <input type="file" class="form-control" id="evidencia1" name="evidencia1" >
                  <input type="hidden" class="form-control" id="ACevidencia1" name="DBevidencia1" >
                </div>
              </div>

              <!-- Input para cargar evidencia 2 -->
              <div class="col-lg-3 col-xs-12">
                <div class="form-group">
                  <label for="evidencia2">Cargar Evidencia (Imagen o Archivo 2)</label>
                  <input type="file" class="form-control" id="evidencia2" name="evidencia2">
                  <input type="hidden" class="form-control" id="ACevidencia2" name="DBevidencia2">
                </div>
              </div>

              <br<hr><br><br>
            </div>
          </div>
        </div>

        <!-- Botón de envío en el pie del formulario -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary pull-right">Editar</button>
        </div>
      </form>
    </div>
  </div>
</div>


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Barcode+128&display=swap" rel="stylesheet">
<style>
  @media print {
    body * {
      visibility: hidden;
    }

    #section-to-print,
    #section-to-print * {
      visibility: visible;
    }

    #section-to-print {
      position: absolute;
      left: 0;
      top: 0;
    }
  }

  #tbpagos tr th {
    background: #ffe6e9 !important;
    color: #c63e48;
    font-size: 14px;
    font-weight: 700;
  }
</style>
<script type="text/javascript">
  // document.querySelector('.imprimelo').addEventListener('click', function(){
  //   window.print();
  //   /*var printContent = document.querySelector('.areaimpresion');
  //   var WinPrint = window.open('', '', 'width=900,height=650');
  //   WinPrint.document.write(printContent.innerHTML);
  //   WinPrint.document.close();
  //   WinPrint.focus();
  //   WinPrint.print();
  //   WinPrint.close();*/
  // })
  function noview(id) {
    var id = id;
    $("#" + id).addClass("d-none");
  }

  function pinta_filas(idBpm) {
    $("tr").removeClass("painttr");
    $("#" + idBpm).addClass("painttr");
  }
  $(function() {
    $('input[name="datefilter"]').daterangepicker({
      autoUpdateInput: false,
      locale: {
        cancelLabel: 'Borrar',
        applyLabel: "Seleccionar",
        fromLabel: "Desde",
        toLabel: "Hasta",
        customRangeLabel: "Personalizar",
        daysOfWeek: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
        monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"],
        "firstDay": 1
      }
    });
    $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
    });
    $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
    });
  });
  /*DETECTA  CLICK ON BUSCAR*/
  function listatabla() {
    var datefilter = $('input[name=datefilter]').val();
    var cod = 'load';
    var cnStringb = datefilter.length;
    if (cnStringb > 0) {
      $(".spinerGiration2").removeClass("d-none");
      var fechaInicio = datefilter.split(' - ')[0];
      var fechaFinal = datefilter.split(' - ')[1];
      var dataen = 'fechaInicio=' + fechaInicio +
        '&fechaFinal=' + fechaFinal +
        '&accion=' + cod;
      $.ajax({
        type: 'post',
        url: 'controladores/atendercola.controlador.php',
        data: dataen,
        success: function(resp) {
          $("#cuerpito_tabla").html(resp);
          $(".spinerGiration2").addClass("d-none");
        }
      });
      return false;
    } else {
      swal({
        title: "¡Hey!",
        text: "Debes seleccionar una fecha",
        imageUrl: 'vistas/img/plantilla/exclamation.png'
      });
    }
  }
  $("#buscar,#btnBuscar").click(function() {
    listatabla();
  });
  $(".labelradioso").click(function() {
    $("#cuerpito_tabla>table").addClass("d-none");
  });
  $(document).on('click', '.btnviewdetalle', function() {
    let id_compra = this.dataset.id;
    $.ajax({
      type: 'post',
      url: 'controladores/new-venta.controlador.php',
      data: {
        accion: 'load_detalle_cotizacion',
        id_compra: id_compra
      },
      success: function(resp) {
        if (resp.success) {
          let data = resp.data;
          //document.querySelector(`.id_cotizacion_ceros_num`).textContent = data.id_cotizacion_ceros;
          var src = `https://www.webarcode.com/barcode/image.php?code=${data.id_cotizacion_ceros}&type=C128B&xres=1&height=80&width=193&font=3&output=png&style=197`
          document.querySelector(`.cotimg`).setAttribute('src', src)
          for (var clave in data) {
            if (clave !== 'items') {
              if (document.querySelector(`.${clave}`)) {
                document.querySelector(`.${clave}`).textContent = data[clave];
              }
            }
          }
          document.querySelector(`.total_igv`).textContent = parseFloat(data.total_igv).toFixed(2);
          document.querySelector(`.total_gravado_o_inafecto`).textContent = parseFloat(data.total_gravado) === 0 ? parseFloat(data.total_inafecto).toFixed(2) : parseFloat(data.total_gravado).toFixed(2);

          document.querySelector(`.total_cotizacion`).textContent = parseFloat(data.total_cotizacion).toFixed(2);

          if (data.items) {
            if (data.items.length > 0) {
              var dd = '';
              let i = 1;
              data.items.map(function(elm) {
                dd += `<tr>
              <td class="text-center">${i}</td>
              <td>${elm.descripcion}</td>
              <td class="text-center">${elm.cantidad}</td>
              <td class="text-center">${elm.unidad}</td>
              <td class="text-center">${elm.precio}</td>
              <td class="text-center">${elm.total}</td>
              </tr>`;
                i++;
              });
              $("#tr_detalle_compra").html(dd)
            } else {
              $("#tr_detalle_compra").html('');
            }
          }
          $('#modalVerDetalleCompra').modal('show')
        }
        //$("#cuerpito_tabla").html(resp);
        //$(".spinerGiration2").addClass("d-none");
      }
    });

  });

  $(document).on('click', '.btnEditar', function(e) {
    e.preventDefault();

    var id = $(this).data('id');
    var formdata = new FormData();
    formdata.append('id', id);
    formdata.append('accion', 'load_edit');
    // console.log('Editar ID:', id);
    $('#modalEditar').modal('show');

    $.ajax({
      url: 'modelos/atendercola.modelo.php',
      type: 'POST',
      data: formdata,
      processData: false,
      contentType: false,
      dataType: "json",

      success: function(item) {
        // console.log(item.id_asistente);
        $("#ACdniAsistente").val(item.id_asistente);
        $("#ACdniCliente").val(item.dniCliente);
        $("#ACnombreCliente").val(item.nombreCliente);
        $("#ACdniAlumno").val(item.dniAlumno);
        $("#ACnombreAlumno").val(item.nombreAlumno);
        $("#ACcarreraCiclo").val(item.carreraCiclo);
        $("#ACciclo").val(item.ciclo);
        $("#ACdniDocente").val(item.dniDocente);
        $("#ACnombreDocente").val(item.nombreDocente);
        $("#ACdniExterno").val(item.dniExterno);
        $("#ACnombreExterno").val(item.nombreExterno);
        $("#ACcategoriaMotivo").val(item.categoriaMotivo).trigger("change");
        $("#ACmotivoGenerales").val(item.motivoGenerales);
        $("#ACcomentarioAtencion").val(item.comentarioAtencion);
        $("#ACestadoCaso").val(item.estadoCaso).trigger("change");
        $("#ACareaDerivada").val(item.areaDerivada);
        $("#ACevidencia1").val(item.evidencia1);
        $("#ACevidencia2").val(item.evidencia2);
        $("#id").val(item.id);
        $("input[name='categoria'][value='" + item.categoria + "']").prop('checked', true);
      },
      error: function(xhr, status, error) {
        console.error('Error en la solicitud AJAX:', status, error);
      }
    });
  });

  // $(document).on('click', '.btnEliminar', function(e) {
  //   e.preventDefault();
  //   var id = $(this).data('id');

  //   var formdata = new FormData();
  //   formdata.append('id', id);
  //   formdata.append('accion', 'editar');

  //   $('#modalEditar').modal('show');
  // });
  $(document).on('submit', '#formEditar', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('accion', 'editar');
    $.ajax({
      url: 'controladores/atendercola.controlador.php',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(respuesta) {
        if (respuesta == 'ok') {
          swal({
            type: "success",
            title: "ha sido actualizado correctamente",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
          }).then((result) => {
            if (result.value) {
              window.location = "historialactividades";
            }
          })
        } else {
          alert("Erro al registrar. Por favor, inténtalo de nuevo.");
        }
      },
      error: function(xhr, status, error) {
        console.error('Error en la solicitud AJAX:', status, error);
      }
    });
  });
</script>

<style type="text/css">
  tr>td {
    font-size: 12px
  }

  tr>th {
    color: #234983;
    background: white !important;
    font-size: 10.5px;
    font-weight: 500
  }

  .pastillitasradiosas {
    background: #63a03c;
    border-radius: 10px;
    padding: 2px 10px;
    color: #ffffff;
    width: 250px;
    font-weight: 500 !important;
    font-size: 15px;
    cursor: pointer;
    cursor: hand;
    margin-right: 10px;
  }

  .pastillitasradiosas>label,
  .pastillitasradiosas>input {
    font-weight: 400;
    cursor: pointer;
    cursor: hand
  }

  .painttr {
    background: rgba(99, 160, 60, 0.45) !important;
  }

  ._able-container {
    overflow-y: auto;
  }
</style>
<script>
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