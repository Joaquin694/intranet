<style>
  .table-responsive {
    max-height: 300px;
    min-width: 200px;
    overflow-x: auto;
    overflow-y: auto;
    border: 1px solid #ddd;
  }
</style>
<div class="content-wrapper">
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <h5 id="cabezaFactGeneral" class="titulitononegroT"
          style="background: white;border: 5px solid #fbf9f9;padding: 25px;font-size: 20px">
          <!-- <span class="dropdown" style="float: left;margin-top: -25px;margin-left:  -25px;">
            <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown" style="background: #f4f4f4 !important"><i class="fa fa-sliders" aria-hidden="true"></i>
              <span class="caret"></span></button>
              <ul class="dropdown-menu">
                <li><a href="#" ><i class="fa fa-chevron-right" aria-hidden="true"></i> Libro electrónico de ventas</a></li>
                <li><a href="#" target="_blank"><i class="fa fa-chevron-right" aria-hidden="true"></i> Diario de ventas</a></li>
              </ul>
            </span> -->
          <i id="flySedeM" class="fa fa-long-arrow-right stpFly" aria-hidden="true"></i><b> Gastos: </b>


          <span style="font-size: 16.5px">Seleccionar rango fecha:
            <input type="text" name="datefilter" value=""
              style="outline:0px;background: transparent;border: 0px;border-bottom: 1px solid #3ec0ef;color: #1b65a5;width: 200px !important" />
            <a href="#" id="btnBuscar"><img src="vistas/img/plantilla/buscar.png" style="width: 30px"></a>
          </span>
          <div class="input-group" style="margin-bottom: 10px;float: right;">
            <div>
              <span class="pastillitasradiosas">
                <input type="radio" id="rdbtBoletas" name="contact" value="B" class="rdbtBoletas">
                <label for="rdbtBoletas" class="rdbtBoletas">Gastos registrados*</label>
              </span>

              <span class="pastillitasradiosas" style="background: #c6b30b !important">
                <input type="radio" id="rdbtrdbtPagosEfetuados" name="contact" value="pagos_efectuados"
                  class="rdbtPagosEfetuados">
                <label for="rdbtPagosEfetuados" class="rdbtPagosEfetuados">Pagos Efectuados</label>
              </span>
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
<!-- modalbolsa -->
<
<!-- ######################################################### -->
<div id="modalbolsa" class="modal fade" role="dialog" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="formAddPago">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Registro de pagos de compra</h4>
          <input type="hidden" name="accion" value="add_pago_compra">
        </div>
        <div class="modal-body">
          <div class="form-horizontal">
            <div class="col-md-6">
              <div class="form-group">
                <label class="col-sm-5 " style="text-align: left !important;">Fecha:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="pago_fecha" disabled="">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-5 " style="text-align: left !important;">Correlativo:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="pago_correlativo" disabled="">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="col-sm-5 " style="text-align: left !important;">Serie:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="pago_serie" disabled="">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-5 " style="text-align: left !important;">Documento:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="pago_documento_cliente" disabled="">
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="col-sm-2 " style="text-align: left !important;">Cliente:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="pago_cliente" disabled="">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="col-sm-5 " style="text-align: left !important;">Total:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="pago_total" disabled="">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="col-sm-5 " style="text-align: left !important;">Pago restante:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="pago_restante" disabled="">
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-8 mps">
            <div class="form-group">
              <select class="form-control" id="pago_nuevoMetodoPago" required="" name="metodo_pago"
                style="background: #00C865 !important;color: white !important;border: 1px solid #00C865 !important">
                <option style="background: white;color: black" value="">Método de pago</option>

                <option style="background: white;color: black" value="Efectivo">Efectivo</option>
                <option style="background: white;color: black" value="TRANS_BBVA_0011_0341_5402_004517_53">Transf. BBVA
                  0011-0341-5402-004517-53</option>
                <option style="background: white;color: black" value="TRANS_BANCO_NACION_00381091708">
                  Transf. BANC. de
                  la NACIÓN 00381091708</option>
                <option style="background: white;color: black" value="TRANS_BCP_19128084617099">Transf.
                  BCP
                  19128084617099</option>

                <option style="background: white;color: black" value="YAPE_962382960">YAPE 962382960
                </option>
                <option style="background: white;color: black" value="PLIN_962382960">PLIN 962382960
                </option>
                  <!-- Nuevas opciones añadidas -->
                  <option style="background: white;color: black" value="TARJETA_CREDITO_CMR">Tarjeta de Crédito CMR</option>
                  <option style="background: white;color: black" value="TARJETA_CREDITO_INTERBANK">Tarjeta de Crédito Interbank</option>
                  <option style="background: white;color: black" value="TARJETA_CREDITO_BBVA">Tarjeta de Crédito BBVA</option>
                  <option style="background: white;color: black" value="TARJETA_CREDITO_BCP">Tarjeta de Crédito BCP</option>

              </select>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="n_tc" name="referencia_pago"
                placeholder="Codigo referencia de pago">
            </div>
            <div class="form-group">
              <textarea class="form-control" id="pago_descripcion" placeholder="descripcion" rows="3"
                name="descripcion_pago"></textarea>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="pago_nombre" name="proveedor_nombre"
                placeholder="Nombre del personal al que se paga">
            </div>

            <div class="form-group">
              <input type="text" class="form-control" id="pago_documento" name="proveedor_documento"
                placeholder="N° Documento de identidad">
            </div>
          </div>

          <div class="col-md-4 mps">
            <div class="form-group">
              <input type="number" class="form-control" id="pago_monto" name="monto_pago" placeholder="Monto que paga"
                min="0.0" step="0.0001">
            </div>

            <div class="form-group">
              <input type="date" class="form-control" id="pago_fecha2" name="fecha_pago" placeholder="fecha" required>
            </div>

            <div class="form-group">
              <input type="file" id="doc" name="doc">
            </div>

          </div>

          <hr>
          <input type="hidden" class="form-control" id="id_compra" name="id_compra">
          <input type="hidden" class="form-control d-none" id="pago_indice">

          <div class="table-responsive" style="max-height: 300px; overflow: auto;">
            <table class="table table-condensed" id="tbpagos">
              <thead>
                <tr>
                  <th>TIPO DE PAGO</th>
                  <th>N TRANSFERENCIA</th>
                  <th>FECHA</th>
                  <th>MONTO</th>
                  <th>DOCUMENTO</th>
                  <th>CLIENTE</th>
                  <th>DESCRIPCION</th>
                  <th>DOC</th>
                </tr>
              </thead>
              <tbody id="table_cobro_venta"></tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary mps">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- ######################################################### -->
<!-- modalVerDetalleCompra -->
<div id="modalVerDetalleCompra" class="modal fade" role="dialog" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!--=====================================        CABEZA DEL MODAL        ======================================-->
      <div class="modal-header" style="background:#3c8dbc; color:white">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Detalle de compra</h4>
        <input type="hidden" name="accion" value="add_pago_compra">
      </div>
      <!--=====================================        CUERPO DEL MODAL        ======================================-->
      <div class="modal-body">
        <div class="row" style="margin:0">
          <div class="col-sm-8 h4">
            <img src="/vistas/img/cotizacion/LOGO_HERMOZALUZ_COTIZACION.png" alt="Imagen descriptiva"
              style="width: 50%; max-height: 200px; object-fit: cover; margin-bottom: 15px;">
            <hr>
            <div class="razon_social" style="width:100%"><b>RAZON SOCIAL NOMBRE LARGO PRUEBA</b></div>
            <div style="width:100%">RUC: <span class="ruc">20600000000</span></div>
            <div class="direccion" style="width:100%">DIRECCION DE EMPRESA MUY LARGO PARA DMO</div>
            <hr>
          </div>
          <div class="col-sm-4 text-center">
            <div style="width:100%;border: 1px solid;padding: 5px 13px;margin-top: 10px;">
              <div class="h4 text-center">COMPROBANTE DE GASTO</div>
              <div class="h4"><span class="serie_compra">F002</span> - <span class="numero_compra">65456</span></div>
              <div>FECHA: <span class="fecha_compra">65456</span></div>
            </div>
          </div>
          <div class="col-sm-8">
            <b>CLIENTE:</b> <span class="razon_moali" style="border-bottom:1px solid #000">INVERSIONES Y SERVICIOS
              HERMOZA LUZ</span>
          </div>
          <div class="col-sm-4">
            <b>RUC:</b> <span class="ruc_moali" style="border-bottom:1px solid #000">20487040852</span>
          </div>
          <div class="col-sm-12">
            <b>DIRECCCION:</b> <span class="direccion_moali" style="border-bottom:1px solid #000">DIRECCION HERMOZA
              LUZ</span>
          </div>
          <div style="width:100%;height:20px;display: inline-block;"></div>
          <div class="col-sm-12">
            <table class="table table-condensed table-bordered" id="tbpagos">
              <thead>
                <tr class="bg-dark">
                  <th>CANT</th>
                  <th>TIPO</th>
                  <th>DETALLE</th>
                  <th>P.UN</th>
                  <th>TOTAL</th>
                </tr>
              </thead>
              <tbody id="tr_detalle_compra"></tbody>
              <tfoot>
                <tr style="background: #fcfcfc; text-align: right;">
                  <td class="theadTable" colspan="4" style="color: #5e5e5e !important">IGV</td>
                  <td class="total_igv" colspan="1" style="color: #5e5e5e !important">0.00</td>
                </tr>
                <tr style="background: #fcfcfc; text-align: right;">
                  <td class="theadTable" colspan="4" style="color: #5e5e5e !important">OP. INAFECTAS</td>
                  <td class="total_inafecto" colspan="1" style="color: #5e5e5e !important">0.00</td>
                </tr>
                <tr style="background: #fcfcfc; text-align: right;">
                  <td class="theadTable" colspan="4" style="color: #5e5e5e !important">OP. GRAVADAS</td>
                  <td class="total_gravado" colspan="1" style="color: #5e5e5e !important">0.00</td>
                </tr>
                <tr style="background: #fcfcfc; text-align: right;">
                  <td class="theadTable" colspan="4" style="color: #5e5e5e !important">IMPORTE TOTAL</td>
                  <td class="total_compra" colspan="1" style="color: #5e5e5e !important">0.00</td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
      <!--=====================================        PIE DEL MODAL        ======================================-->
      <div class="modal-footer">
        <button type="button" id="CrearPdf" class="btn btn-default" data-dismiss="modal" data-id="">PDF</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
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
        daysOfWeek: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
        monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"],
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
  function listatabla() {
    var chkRadioB = $('input[name=contact]:checked').val();
    var datefilter = $('input[name=datefilter]').val();


    if ((chkRadioB === 'B') || (chkRadioB === 'F')) {
      var cod = 'loadcompras';
    } else if (chkRadioB === 'notas_de_credito') {
      var cod = 'notas_de_credito';
    } else if (chkRadioB === 'pagos_efectuados') {
      var cod = 'pagos_efectuados';
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
        '&accion=' + cod;
      $.ajax({
        type: 'post',
        url: 'controladores/compras.controlador.php',
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
  }
  $("#buscar,#btnBuscar").click(function () {
    listatabla();
  });
  $(document).on('click', '#CrearPdf', function () {
    console.log("crear pdf");
    let id_compra = $(this).data('id');

    console.log(id_compra);
    let id_compra_base64 = btoa(id_compra);

    let url = `./controladores/pdf.controlador.php?id=${id_compra_base64}&deque=pdf_comprobante_detalle_compra`;
    window.open(url, '_blank');
  });

  $(".labelradioso").click(function () {
    $("#cuerpito_tabla>table").addClass("d-none");
  });
  $("#cuerpito_tabla").on("click", ".btnviewpago", function () {
    let id_compra = this.dataset.id;
    $.ajax({
      type: 'post',
      url: 'controladores/compras.controlador.php',
      data: {
        accion: 'load_deuda_compra',
        id_compra: id_compra
      },
      success: function (resp) {
        console.log(resp);
        if (resp.success) {
          let data = resp.data[0];
          $("#pago_fecha").val(data.fecha_contabilizacion_compra)
          $("#pago_serie").val(data.serie_compra)
          $("#pago_correlativo").val(data.numero_compra)
          $("#pago_documento_cliente").val(data.ruc)
          $("#pago_cliente").val(data.razon_social)
          $("#pago_total").val(data.total_compra)
          $("#pago_restante").val(data.total_deuda)
          $("#id_compra").val(id_compra)
          $("#pago_monto").val(0.00)


          if (data.deuda.length > 0) {
            $("#tbpagos").show()
            var dd = '';
            data.deuda.map(function (elm) {
              dd += `<tr>
              <td>${elm.metodo_pago}</td>
              <td>${elm.referencia_pago}</td>
              <td>${elm.fecha_pago}</td>
              <td>${elm.monto_pago}</td>
              <td>${elm.proveedor_documento}</td>
              <td>${elm.proveedor_nombre}</td>
              <td>${elm.descripcion_pago}</td>
              <td>`;
              let documentLink = elm.doc;
              if (documentLink) {
                dd += `<a href="${documentLink}" target="_blank"><i class="fa fa-file"></i></a><br>`;
              } else {
                dd += `<i class="fa fa-file text-muted"></i><br>`;
              }

              dd += `</td></tr>`;
            });
            $("#table_cobro_venta").html(dd);
          } else {
            $("#tbpagos").hide()
            $("#table_cobro_venta").html('');
          }
          if (data.total_deuda > 0) {
            $(".mps").show()
          } else {
            $(".mps").hide()
          }
          $('#modalbolsa').modal('show')
        }
        //$("#cuerpito_tabla").html(resp);
        //$(".spinerGiration2").addClass("d-none");
      }
    });
  });
  // $('#formAddPago').on('focusout', '#pago_monto', function () {
  //   this.value = parseFloat(this.value).toFixed(2);
  // });
  $(document).on('click', '.btnviewdetalle', function () {
    let id_compra = this.dataset.id;
    $.ajax({
      type: 'post',
      url: 'controladores/compras.controlador.php',
      data: {
        accion: 'load_detalle_compra',
        id_compra: id_compra
      },
      success: function (resp) {
        console.log(resp);
        if (resp.success) {
          let data = resp.data[0];
          for (var clave in data) {
            if (clave !== 'tr_detalle_compra') {
              if (document.querySelector(`.${clave}`)) {
                document.querySelector(`.${clave}`).textContent = data[clave];
              }
            }
          }
          if (data.tr_detalle_compra) {
            if (data.tr_detalle_compra.length > 0) {
              var dd = '';
              data.tr_detalle_compra.map(function (elm) {
                dd += `<tr>
              <td>${elm.cantidad_compra}</td>
              <td>${elm.unidad_compra}</td>
              <td>${elm.descripcion_compra}</td>
              <td>${elm.valor_compra}</td>
              <td>${elm.total_compra}</td>
              </tr>`;
              });
              $("#tr_detalle_compra").html(dd)
            } else {
              $("#tr_detalle_compra").html('');
            }
          }
          $('#CrearPdf').data('id', id_compra);
          $('#modalVerDetalleCompra').modal('show')
        }
        //$("#cuerpito_tabla").html(resp);
        //$(".spinerGiration2").addClass("d-none");
      }
    });

  })

  formAddPago.onsubmit = function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      type: 'post',
      url: 'controladores/compras.controlador.php',
      data: formData,
      processData: false,
      contentType: false,
      success: function (respuesta) {
        console.log(respuesta);
        if (respuesta.success) {
          swal({
            icon: 'success',
            title: 'Bien',
            text: respuesta.msg
          })
          //CLEAN
          $("#pago_monto").val('')
          $("#n_tc").val('')
          $("#pago_nuevoMetodoPago").val('')
          $("#pago_fecha2").val('')
          $("#pago_descripcion").val('')
          $("#pago_nombre").val('')
          $("#pago_documento").val('')
          $('#modalbolsa').modal('hide')
          listatabla()
        } else {
          swal({
            icon: 'error',
            title: 'Error',
            text: respuesta.msg
          })
        }
        $('#modalbolsa').modal('hide')
        //$("#serie_correlativo").html(resp);
      }
    });
  }
</script>
<style type="text/css">
  input.input-mini.form-control {
    display: none !important;
  }

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
</style>
<script>
  //LIMPIADOR DE INPUT TEXT CON CARACTERES RAROS
  document.addEventListener('blur', function (e) {
    // Verificar si el evento se disparó desde un input de tipo texto
    if (e.target.tagName === 'INPUT' && e.target.type === 'text') {
      console.log('CUIDADO, EL TEXTO ESCRITO DEBE CONTENER ÚNICAMENTE LETROS Y/O NÚMEROS');
      var texto = e.target.value.trim();
      texto = texto.replace(/\\/g, "");
      texto = texto.replace(/["']/g, function (match) {
        return '\\' + match;
      });
      e.target.value = texto;
    }
  }, true); // El tercer argumento true indica que el evento se captura durante la fase de captura
</script>