<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.2.1/jquery.quicksearch.js"></script>
<!-- LIBRERIA PARA BUSQUEDA TABLE -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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
    cursor: hand
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

  .table-container {
    max-height: 300px;
    /* Ajusta esta altura según lo que necesites */
    overflow-y: auto;
    /* Agrega la barra de desplazamiento vertical si el contenido excede la altura */
  }

  .table-responsive {
    max-height: 300px;
    min-width: 200px;
    /* Altura máxima del contenedor */
    overflow-x: auto;
    /* Barra de desplazamiento horizontal */
    overflow-y: auto;
    /* Barra de desplazamiento vertical */
    border: 1px solid #ddd;
    /* Borde opcional para separar visualmente */
  }

  #facturaModal {
    width: 100%;
  }
</style>
<div class="content-wrapper">
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <h5 id="cabezaFactGeneral" class="titulitononegroT"
          style="background: white;border: 5px solid #fbf9f9;padding: 25px;font-size: 20px">
          <span class="dropdown" style="float: left;margin-top: -25px;margin-left:  -25px;">
            <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown"
              style="background: #f4f4f4 !important"><i class="fa fa-sliders" aria-hidden="true"></i>
              <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li><a href="#" id="report_libro_ventas" target="_black" style='display: none;'><i
                    class="fa fa-chevron-right" aria-hidden="true"></i> Libro electrónico de ventas PDF</a></li>
              <li><a href="#" id="report_libro_ventas_txt"><i class="fa fa-chevron-right" aria-hidden="true"></i> Libro
                  electrónico de ventas TXT</a></li>
            </ul>
          </span><br>
          <i id="flySedeM" class="fa fa-long-arrow-right stpFly" aria-hidden="true"></i><b> Fecha de facturación: </b>


          <span style="font-size: 16.5px">Seleccionar rango fecha:
            <input type="text" name="datefilter" value=""
              style="outline:0px;background: transparent;border: 0px;border-bottom: 1px solid #3ec0ef;color: #1b65a5;width: 200px !important" />

            <a href="#" id="btnBuscar"><img src="vistas/img/plantilla/buscar.png" style="width: 30px"></a>
            &nbsp;&nbsp;
          </span>
          <div class="input-group" style="margin-bottom: 10px;float: right;">
            <div> <br>
              &nbsp;&nbsp;&nbsp;
              <span class="pastillitasradiosas">
                <input type="radio" id="rdbtFacturas" name="contact" value="F" class="rdbtFacturas" checked>
                <label for="rdbtFacturas" class="rdbtFacturas">Facturas</label>
              </span>
              &nbsp;&nbsp;&nbsp;
              <span class="pastillitasradiosas">
                <input type="radio" id="rdbtBoletas" name="contact" value="B" class="rdbtBoletas">
                <label for="rdbtBoletas" class="rdbtBoletas">Boletas</label>
              </span>
              &nbsp;&nbsp;&nbsp;
              <span class="pastillitasradiosas">
                <input type="radio" id="rdbtNotas_de_credito" name="contact" value="notas_de_credito"
                  class="rdbtNotas_de_credito">
                <label for="rdbtNotas_de_credito" class="rdbtNotas_de_credito">Notas de crédito</label>
              </span>
              &nbsp;&nbsp;&nbsp;
              | <span class="pastillitasradiosas">
                <input type="radio" id="rdbtRendicionesCaja" name="contact" value="RendicionesCaja"
                  class="rdbtRendicionesCaja">
                <label for="rdbtRendicionesCaja" class="rdbtRendicionesCaja">Rendición de caja</label>
              </span>
              &nbsp;&nbsp;&nbsp;
              <span class="pastillitasradiosas" style="background: #c6b30b !important">
                <input type="radio" id="rdbtrdbtPagosRecibidos" name="contact" value="PagosRecibidos"
                  class="rdbtPagosRecibidos">
                <label for="rdbtPagosRecibidos" class="rdbtPagosRecibidos">Pagos Recibidos</label>
              </span>
              &nbsp;&nbsp;&nbsp;

            </div>
          </div>
        </h5>
      </div>
      <div class="box-body">
        <center id='cuerpito_tabla'>
          <img id="buscar"
            src="https://media.istockphoto.com/vectors/happy-smiling-robot-chat-bot-vector-vector-id846505204?k=6&m=846505204&s=170667a&w=0&h=5TeEo5TnRyT73Bf4gQLzWu0e_7yMk6yziQbjVdbFhtk="
            style="width: 400px">
        </center>
        <center id='idNewNC' class='d-none'>
          <?php echo "Cargando..."; ?>
        </center>
      </div>
    </div>
  </section>
</div>

<div class="modal fade" id="facturaModal" role="dialog">
  <div class="modal-dialog modal-xl" style="width: 100%;">
    <div class="modal-content">
      <form id="formAgregarFacturacion" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Datos extras del comprobante</h4>
        </div>
        <div class="modal-body">

          <div class="row g-3 mb-4">
            <div class="col-md-4">
              <label class="form-label">Forma de pago:</label>
              <input type="text" class="form-control" name="forma_pago" id="forma_pago">
            </div>
          </div>
          <br>

          <div id="series" class="mb-4"></div>

          <div class="row g-3 mb-4">
            <div class="col-md-6">
              <label class="form-label">Dirección del Receptor de la factura:</label>
              <input type="text" class="form-control" name="dir_receptor" id="dir_receptor">
              <input type="hidden" id="id_venta" name="id_venta">
            </div>

            <div class="col-md-6">
              <label class="form-label">Dirección del Cliente:</label>
              <input type="text" class="form-control" name="dir_cliente" id="dir_cliente">
            </div>

            <div class="col-md-4">
              <label class="form-label">Tipo de Moneda:</label>
              <input type="text" class="form-control" name="moneda" id="moneda">
            </div>

            <div class="col-md-4">
              <label class="form-label">Observación:</label>
              <input type="text" class="form-control" name="observacion" id="observacion">
            </div>

            <div class="col-md-4">
              <label class="form-label">Orden de Compra:</label>
              <input type="text" class="form-control" name="orden_compra" id="orden_compra">
            </div>
          </div>

          <div class="mb-4">
            <div class="mb-3">
              <label class="form-label">Leyenda:</label>
              <textarea class="form-control" name="leyenda" id="leyenda"></textarea>
            </div>

            <div class="mb-3">
              <label class="form-label">Bien o Servicio:</label>
              <textarea class="form-control" name="bien_servicio" id="bien_servicio"></textarea>
            </div>

            <div class="mb-3">
              <label class="form-label">Medio Pago:</label>
              <textarea class="form-control" name="medio_pago" id="medio_pago"></textarea>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Total de Cuotas:</label>
            <input type="number" class="form-control" id="totalCuotas" name="totalCuotas" min="1" value="1"
              oninput="generateCuotas()">
          </div>

          <div id="cuotasContainer" class="mb-4"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script type="text/javascript">
  window.onload = function () {
    link = document.querySelector('#report_libro_ventas');
    href = "controladores/pdf.controlador.php?deque=libro_venta&fechaini=";
    href1 = "&fechafin="
    link.addEventListener('click', function (e) {
      var chkRadioB = $('input[name=contact]:checked').val();
      var datefilter = $('input[name=datefilter]').val();
      var cnStringa = chkRadioB.length;
      var cnStringb = datefilter.length;
      if ((cnStringa > 0) && (cnStringb > 0)) {
        //valor = document.querySelector('#jancdate').value;
        // var datefilter= $('input[name=datefilter]').val();
        var fechaini = datefilter.split(' - ')[0];
        var fechafin = datefilter.split(' - ')[1];
        this.href = href + fechaini + href1 + fechafin;
      } else {
        swal({
          title: "¡Hey!",
          text: "Debes seleccionar una fecha",
          imageUrl: 'vistas/img/plantilla/exclamation.png'
        });
      }
    });


    option_click = document.querySelector('#report_libro_ventas_txt');
    href = "controladores/reporter.controlador.php?deque=libro_venta_txt&fechaini=";
    href1 = "&fechafin=";


    option_click.addEventListener('click', function (e) {
      var chkRadioB = $('input[name=contact]:checked').val();
      var datefilter = $('input[name=datefilter]').val();
      var cnStringa = chkRadioB.length;
      var cnStringb = datefilter.length;

      if ((cnStringa > 0) && (cnStringb > 0)) {
        // Atenuar la pantalla y mostrar mensaje de carga
        $(".spinerGiration2").removeClass("d-none");

        var fechaini = datefilter.split(' - ')[0];
        var fechafin = datefilter.split(' - ')[1];
        var url = href + fechaini + href1 + fechafin;

        // Send AJAX request
        var xhr = new XMLHttpRequest();
        xhr.open("GET", url, true);
        xhr.responseType = "blob";

        xhr.onreadystatechange = function () {
          if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
              // Handle successful response
              var blob = xhr.response;
              var filename = "reporte.txt";

              // Create a link element to trigger the download
              var link = document.createElement("a");
              link.href = window.URL.createObjectURL(blob);
              link.download = filename;
              link.style.display = "none";
              document.body.appendChild(link);
              link.click();
              document.body.removeChild(link);
            } else {
              // Handle error response
              console.log("GET request failed");
            }
          }
          $(".spinerGiration2").addClass("d-none");
        };

        xhr.send();
      } else {
        swal({
          title: "¡Hey!",
          text: "Debes seleccionar una fecha",
          imageUrl: 'vistas/img/plantilla/exclamation.png'
        });
      }
    });





  };


  function noview(id) {
    var id = id;
    $("#" + id).addClass("d-none");
  }

  function pinta_filas(idBpm) {
    $("tr").removeClass("painttr");
    $("#" + idBpm).addClass("painttr");
  }




  $(function () {
    $('input[name="datefilter"]').daterangepicker({
      autoUpdateInput: false,
      locale: {
        cancelLabel: 'Borrar',
        applyLabel: "Seleccionar",
        fromLabel: "Desde",
        toLabel: "Hasta",
        customRangeLabel: "Personalizar",
        daysOfWeek: [
          "Do",
          "Lu",
          "Ma",
          "Mi",
          "Ju",
          "Vi",
          "Sa"
        ],
        monthNames: [
          "Enero",
          "Febrero",
          "Marzo",
          "Abril",
          "Mayo",
          "Junio",
          "Julio",
          "Agosto",
          "Setiembre",
          "Octubre",
          "Noviembre",
          "Diciembre"
        ],
        "firstDay": 1
      }
    });

    $('input[name="datefilter"]').on('apply.daterangepicker', function (ev, picker) {
      $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
    });

    $('input[name="datefilter"]').on('cancel.daterangepicker', function (ev, picker) {
      $(this).val('');
    });
  });
  /*DETECTA  CLICK ON BUSCAR*/
  $("#buscar,#btnBuscar").click(function () {
    var chkRadioB = $('input[name=contact]:checked').val();
    var datefilter = $('input[name=datefilter]').val();

    if ((chkRadioB === 'B') || (chkRadioB === 'F')) {
      var cod = 'BOLETA_O_FACTURA';
    } else if (chkRadioB === 'notas_de_credito') {
      var cod = 'notas_de_credito';
    } else if (chkRadioB === 'RendicionesCaja') {
      var cod = 'RendicionesCaja';
    } else if (chkRadioB === 'PagosRecibidos') {
      var cod = 'Pagosrecibido';
    }

    var cnStringa = chkRadioB.length;
    var cnStringb = datefilter.length;

    if ((cnStringa > 0) && (cnStringb > 0)) {
      $(".spinerGiration2").removeClass("d-none");
      var fechaInicio = datefilter.split(' - ')[0];
      var fechaFinal = datefilter.split(' - ')[1];
      var chkRadioB = chkRadioB;

      var dataen = 'fechaInicio=' + fechaInicio +
        '&fechaFinal=' + fechaFinal +
        '&chkRadioB=' + chkRadioB +
        '&cod=' + cod;
      $.ajax({
        type: 'post',
        url: 'controladores/interfast_cajera.controlador.php',
        data: dataen,
        success: function (resp) {
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
  });

  $(".labelradioso").click(function () {
    $("#cuerpito_tabla>table").addClass("d-none");
  });




  /*Click en boton enviar a SUNAT*/
  function send_enviar_a_sunat(pk_cabecera_factura, cod_action, idRender) {
    var pk_cabecera_factura_ = pk_cabecera_factura;
    var cod = cod_action;
    var idRender = idRender;

    var count = pk_cabecera_factura_.length;
    $("#" + idRender).html("");
    if (count > 0) {

      var dataen = 'pk_cabecera_factura_=' + pk_cabecera_factura_ +
        '&cod=' + cod;
      $.ajax({
        type: 'post',
        url: 'controladores/interfast_cajera.controlador.php',
        data: dataen,
        success: function (resp) {
          $("#" + idRender).html(resp);
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


</script>

<script>
  let registros = [];

  function guardarDatos() {
    const nuevoRegistro = {
      receptor: document.querySelector('[name="dir_receptor"]').value,
      cliente: document.querySelector('[name="dir_cliente"]').value,
      moneda: document.querySelector('[name="moneda"]').value,
      observacion: document.querySelector('[name="observacion"]').value,
      ordenCompra: document.querySelector('[name="orden_compra"]').value,
      cuotas: obtenerCuotas(),
      detalles: {
        leyenda: document.querySelector('[name="leyenda"]').value,
        bienServicio: document.querySelector('[name="bien_servicio"]').value,
        medioPago: document.querySelector('[name="medio_pago"]').value,
        guias: obtenerGuias()
      }
    };

    registros.push(nuevoRegistro);
    actualizarTabla();
    document.getElementById('facturaModal').querySelector('.btn-close').click();
    limpiarFormulario();
  }

  function obtenerGuias() {
    return Array.from(document.querySelectorAll('#series input')).map(input => input.value);
  }

  function obtenerCuotas() {
    return Array.from(document.querySelectorAll('#cuotasContainer input')).reduce((acc, input, index) => {
      if (index % 2 === 0) {
        acc.push({
          fecha: input.value,
          monto: document.querySelectorAll('#cuotasContainer input')[index + 1]?.value
        });
      }
      return acc;
    }, []);
  }

  function actualizarTabla() {
    const tbody = document.getElementById('tablaBody');
    tbody.innerHTML = '';

    registros.forEach(registro => {
      const fila = document.createElement('tr');
      fila.innerHTML = `
                <td>${registro.receptor}</td>
                <td>${registro.cliente}</td>
                <td>${registro.moneda}</td>
                <td>${registro.observacion}</td>
                <td>${registro.ordenCompra}</td>
                <td>${registro.cuotas.length}</td>
                <td>
                    <button class="btn btn-sm btn-info" onclick="mostrarDetalles(this)" 
                        data-detalles='${JSON.stringify(registro.detalles)}'
                        data-cuotas='${JSON.stringify(registro.cuotas)}'>
                        Ver Detalles
                    </button>
                </td>
            `;
      tbody.appendChild(fila);
    });
  }

  function mostrarDetalles(boton) {
    const detalles = JSON.parse(boton.dataset.detalles);
    const cuotas = JSON.parse(boton.dataset.cuotas);

    let mensaje = `Leyenda: ${detalles.leyenda}\n`;
    mensaje += `Bien/Servicio: ${detalles.bienServicio}\n`;
    mensaje += `Medio Pago: ${detalles.medioPago}\n\n`;

    // Verificar si detalles.guias es un array antes de usar join()
    if (Array.isArray(detalles.guias)) {
      mensaje += `Guias: ${detalles.guias.join(', ')}\n\n`;
    } else {
      mensaje += `Guias: No disponibles\n\n`; // Manejo alternativo si no es array
    }

    mensaje += 'Cuotas:\n';
    cuotas.forEach((cuota, index) => {
      mensaje += `${index + 1}. Fecha: ${cuota.fecha} - Monto: ${cuota.monto}\n`;
    });

    alert(mensaje);
  }

  function limpiarFormulario() {
    document.querySelectorAll('input, textarea').forEach(input => {
      if (input.id !== 'totalCuotas') input.value = '';
    });
    generateCuotas();
  }

  function generateLines() {
    const container = document.getElementById('series');
    container.innerHTML = '';
    for (let i = 1; i <= 12; i++) {
      const div = document.createElement('div');
      div.className = 'linea row mb-2';
      div.innerHTML = `
                <div class="col-lg-4 form-group">
                    <input name="row_g_${i}" id="row_g_${i}" type="text" class="form-control" placeholder="GUIA">
                </div>
                <div class="col-lg-4 form-group">
                    <input name="row_s_${i}" id="row_s_${i}" type="text" class="form-control" placeholder="SERIE">
                </div>
                <div class="col-lg-4 form-group">
                    <input name="row_c_${i}" id="row_c_${i}" type="text" class="form-control" placeholder="CORRELATIVO">
                </div>
            `;
      container.appendChild(div);
    }
  }

  function generateCuotas() {
    const num = document.getElementById('totalCuotas').value;
    const container = document.getElementById('cuotasContainer');
    container.innerHTML = '';

    for (let i = 1; i <= num; i++) {
      const div = document.createElement('div');
      div.className = 'row mb-2';
      div.innerHTML = `
                <div class="col-md-6">
                    <input type="date" name="fecha_${i}" id="fecha_${i}" class="form-control" placeholder="FECHA VENCIMIENTO">
                </div>
                <div class="col-md-6">
                    <input type="number" name="cuotas_${i}" id="cuotas_${i}" class="form-control"  placeholder="CUOTA" min="1">
                </div>
            `;
      container.appendChild(div);
    }
  }

  window.onload = function () {
    generateLines();
    generateCuotas();
  };

  var up_state = false;
  var id_up;
  $(document).on('click', '#agregar_data', function (e) {
    e.preventDefault();
    let id = $(this).data("id");
    id_up = id;

    // Mostrar el modal primero
    $('#facturaModal').modal('show');

    // Usar off() para asegurarse de que el evento se asigna solo una vez

    var formData = new FormData();
    formData.append('accion', 'loadEditDatta');
    formData.append('tabla', 'facturas');
    formData.append('id', id);
    formData.append('fk_id', 'id_cabecera');

    $.ajax({
      url: 'modelos/guia-remision.modelo.php',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function (resp) {
        console.log(resp);
        if (resp) {
          up_state = true;
        } else {
          up_state = false;
        }


        $('#dir_receptor').val(resp.receptor);
        $('#forma_pago').val(resp.forma_pago);

        // $('#id_venta').val(resp.id_venta);
        $('#dir_cliente').val(resp.cliente);
        $('#moneda').val(resp.moneda);
        $('#observacion').val(resp.observacion);
        $('#orden_compra').val(resp.orden_compra);
        $('#leyenda').val(resp.leyenda);
        $('#bien_servicio').val(resp.bien_servicio);
        $('#medio_pago').val(resp.medio_pago);
        $('#totalCuotas').val(resp.total_cuotas).trigger('input');
        //$('#facturaModal').off('shown.bs.modal').on('shown.bs.modal', function () {


        for (let i = 1; i <= 12; i++) {
          console.log('row_g_' + i + ':', resp['row_g_' + i]);
          $('#row_g_' + i).val(resp['row_g_' + i]);
          $('#row_s_' + i).val(resp['row_s_' + i]);
          $('#row_c_' + i).val(resp['row_c_' + i]);
        }

        for (let i = 1; i <= 10; i++) {
          $('#cuotas_' + i).val(resp['cuotas_' + i]);
          $('#fecha_' + i).val(resp['fecha_' + i]);
        }
        //});

      },
      error: function (xhr, status, error) {
        console.error("Error en la solicitud AJAX:", status, error);
      }
    });
  });
  $(document).on('submit', '#formAgregarFacturacion', function (e) {
    e.preventDefault();

    // Verificar el valor del campo oculto antes de enviar
    let idVenta = $('#id_venta').val();
    console.log('Valor de id_venta antes de enviar: ' + idVenta);

    var formData = new FormData(this);
    formData.append('accion', 'AgregarDataextra');
    formData.append('id_2', id_up);
    if (up_state) {
      formData.append('funcion', 'update');
    } else {
      formData.append('funcion', 'create');
    }
    $.ajax({
      url: 'controladores/facturador.controlador.php',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function (resp) {

        if (resp.status == "ok") {
          swal({
            type: "success",
            title: "Datos extras del comprobante a seido registrado",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
          }).then((result) => {
            if (result.value) {
              window.location = "facturacion";
            }
          })
        } else {
          alert("Erro. Por favor, inténtalo de nuevo.");
        }
      },
      error: function (xhr, status, error) {
        console.error("Error en la solicitud AJAX:", status, error);
      }
    });
  });
</script>