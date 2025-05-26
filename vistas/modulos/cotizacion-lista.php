<div class="content-wrapper">
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <h5 id="cabezaFactGeneral" class="titulitononegroT" style="background: white;border: 5px solid #fbf9f9;padding: 25px;font-size: 20px">
          <!-- <span class="dropdown" style="float: left;margin-top: -25px;margin-left:  -25px;">
            <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown" style="background: #f4f4f4 !important"><i class="fa fa-sliders" aria-hidden="true"></i>
              <span class="caret"></span></button>
              <ul class="dropdown-menu">
                <li><a href="#" ><i class="fa fa-chevron-right" aria-hidden="true"></i> Libro electrónico de ventas</a></li>
                <li><a href="#" target="_blank"><i class="fa fa-chevron-right" aria-hidden="true"></i> Diario de ventas</a></li>
              </ul>
            </span> -->
          <i id="flySedeM" class="fa fa-long-arrow-right stpFly" aria-hidden="true"></i><b> Cotizaciones: </b>
          <span style="font-size: 16.5px">Seleccionar rango fecha:
            <input type="text" name="datefilter" value="" style="outline:0px;background: transparent;border: 0px;border-bottom: 1px solid #3ec0ef;color: #1b65a5;width: 200px !important" />
            <a href="#" id="btnBuscar"><img src="vistas/img/plantilla/buscar.png" style="width: 30px"></a>
          </span>
        </h5>
      </div>
      <div class="box-body">
        <center id='cuerpito_tabla'>
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

<div id="_modalDatosTransport" class="modal fade" role="dialog" style="display: none;">
  <div class="modal-dialog" style="width: 80%;">
    <div class="modal-content container-fluid">
      <form class='row' role="form" id="formDatosTransport" method="post" enctype="multipart/form-data">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Datos del transporte</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-4 form-group">
              <label for="ameEmpresa">Empresa</label>
              <input type="text" class="form-control" id="_ameEmpresa" name="ameEmpresa" placeholder="Empresa de transporte" value="INVERSIONES Y SERVICIOS HERMOZA LUZ SRL" required>
              <input type="hidden" id="_id" name="id">
            </div>
            <div class="col-lg-4 form-group">
              <label for="numRuc">Nº Ruc</label>
              <input type="text" class="form-control" id="_numRuc" name="numRuc" placeholder="Numero de ruc" value="204870408582" required>
            </div>
            <div class="col-lg-4 form-group">
              <label for="marca">Marca</label>
              <input type="text" class="form-control" id="_marca" name="marca" placeholder="Marca" required>
            </div>
            <div class="col-lg-4 form-group"><br><br>
              <label for="placa">Placa</label>
              <input type="text" class="form-control" id="_placa" name="placa" placeholder="Placa" required>
            </div>
            <div class="col-lg-4 form-group"><br><br>
              <label for="confVehicular">Conf. Vehicular</label>
              <input type="text" class="form-control" id="_confVehicular" name="confVehicular" placeholder="Conf. Vehicular" required>
            </div>

            <div class="col-lg-4 form-group">
              <P style='color: #616161; font-size:11px !important'>f5 /152006279 - A4 /152006280 <br> D8 /152006278 - D3 /152006276</P>
              <label for="habVehicular">Hab. Vehicular</label>
              <!-- <input type="text" class="form-control" id="habVehicular" name="habVehicular" value="" required> -->
              <!-- Campo de entrada con autocompletado -->
              <input type="text" class="form-control" id="_habVehicular" name="habVehicular" list="sugerencias" required>

              <!-- Lista de opciones para autocompletar -->
              <datalist id="sugerencias">
                <option value="/152006276"></option>
                <option value="152006278/"></option>
                <option value="152006279/"></option>
                <option value="/152006280"></option>
              </datalist>

            </div>
            <div class="col-lg-4 form-group">
              <label for="conductor">Conductor</label>
              <input type="text" class="form-control" id="_conductor" name="conductor" placeholder="Conductor" required>
            </div>
            <div class="col-lg-4 form-group">
              <label for="licencia">Licencia</label>
              <input type="text" class="form-control" id="_licencia" name="licencia" placeholder="licencia" required>
            </div>
            <div class="col-lg-4 form-group">
              <label for="equipo">Equipo</label>
              <input type="text" class="form-control" id="_equipo" name="equipo" placeholder="equipo" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div id="modalEditarCotizacion" class="modal fade" role="dialog">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" style='color: white !important; font-size: 30px !important;     opacity: unset !important;'>&times;</button>
        <h4 class="modal-title">Editar Cotización</h4>
      </div>
      <div class="modal-body">
        <?php include 'vistas/modulos/new-cotizacion.php'; ?>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button> -->
      </div>
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
  $(document).on("click", '.btnEditarCotizacion', function(e) {
    $('#lineasCotizacion_cuerpo tbody').empty();

    e.preventDefault();
    var id = $(this).data('id');
    var datos = new FormData();
    datos.append("id", id);
    datos.append("accion", 'loadEdiatCotizacion');
    console.log('id', id)
    $.ajax({
      url: "controladores/new-venta.controlador.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(item) {
        console.log(item);

        if (item.data) {
          $('#tipoDocu').val(item.data.tipo_documento).trigger("change");

          $('#id_cotizacion').val(item.data.id_cotizacion);
          $('#nombre_cliente').val(item.data.nombre_cliente);
          $('#id_cliente').val(item.data.id_cliente);
          $('#campo_cliente').val(item.data.nombre_cliente);

          $('#idfDireccion').val(item.data.direccion);
          
          var num_doc = item.data.numero_documento;
          $("#documento").val(num_doc);
          $('#numero_documento').val(num_doc);
          $('#inputDocuIdentidad').val(num_doc);


          $('#nombre_contacto_cliente').val(item.data.nombre_contacto);
          $('#telefono_cliente').val(item.data.telefono_contacto);

          $('#email').val(item.data.email);
          $('#fecha_emision').val(item.data.fecha_emision_cotizacion);
          $('#fecha_validez').val(item.data.fecha_vencimiento_cotizacion);
          $('#condicion_pago').val(item.data.condicion_pago);



          $('#total_cotizacion').val(item.data.total_cotizacion);
          $('#importeTotalTabla').text(item.data.total_cotizacion);

          $('#total_igv').val(item.data.total_igv);
          $('#importeigv').text(item.data.total_igv);

          $('#total_inafecto').val(item.data.total_inafecto);
          $('#importeinafectas').text(item.data.total_inafecto);

          $('#total_gravado').val(item.data.total_gravado);
          $('#importegravadas').text(item.data.total_gravado);

          $('#equipo').val(item.data.equipo);
          $('#ameEmpresa').val(item.data.ameEmpresa);
          $('#numRuc').val(item.data.numRuc);
          $('#marca').val(item.data.marca);
          $('#placa').val(item.data.placa);
          $('#confVehicular').val(item.data.confVehicular);
          $('#habVehicular').val(item.data.habVehicular);
          $('#conductor').val(item.data.conductor);
          $('#licencia').val(item.data.licencia);

         

          // Llama a nwlineitem para cada ítem en los datos
          if (item.data.items && item.data.items.length > 0) {
            item.data.items.forEach(function(itemData, index) {
              _nwlineitem(itemData, index + 1); // Usa index + 1 para empezar desde 1
            });
          }
        } else {
          console.log('No se recibió datos de la respuesta.');
        }


      }
    })
  });

  function _nwlineitem(item, index) {

    var $lineasCotizacion = $('#lineasCotizacion');

    var $tr = $('<tr>', {
      class: 'lnitem',
      id: 'lbl_' + index
    });

    var $tdCodigo = $('<td>').text(item.id_producto);
    var $tdImagen = $('<td>').append($('<img>', {
      src: 'vistas/img/productos/default/anonymous.png' // Reemplaza con la URL de la imagen si está disponible
    }));

    // Crear el <select> con opciones para la unidad
    var unidades = ["UNIDAD", "KILOS", "BALDE", "CAJA", "DOCENA", "LITRO", "ONZAS", "SERVICIO", "GRAMOS"];
    var $selectUnidad = $('<select>', {
      class: 'form-control',
      name: 'item[' + index + '][unidad]'
    });

    unidades.forEach(function(unidad) {
      $selectUnidad.append($('<option>', {
        value: unidad,
        text: unidad
      }));
    });

    // Establecer el valor del select de unidad según el dato recibido
    $selectUnidad.val(item.unidad);

    var $tdUnidad = $('<td>').append($selectUnidad);
    var $tdProducto = $('<td>').append(
      $('<input>', {
        type: 'text',
        name: 'item[' + index + '][name]',
        value: item.descripcion,
        class: 'form-control input-sm'
      }),
      $('<input>', {
        type: 'hidden',
        name: 'item[' + index + '][name_hidden]',
        value: item.descripcion,
        class: 'form-control input-sm'
      })
    );
    var $tdCantidad = $('<td>').append(
      $('<input>', {
        type: 'number',
        name: 'item[' + index + '][cantidad]',
        step: '0.001',
        value: Number(item.cantidad.replace(/,/g, '')).toFixed(2),
        class: 'form-control input-sm inpnum'
      }),
      $('<input>', {
        type: 'hidden',
        name: 'item[' + index + '][id]',
        value: item.id_producto,
        class: 'form-control input-sm'
      })
    );
    var $tdValorUnitario = $('<td>').append(
      $('<input>', {
        type: 'number',
        name: 'item[' + index + '][valor]',
        step: '0.001',
        // value: 1111, 
        value: Number(item.precio.replace(/,/g, '')).toFixed(2),
        class: 'form-control input-sm inpnum'
      })
    );

    var $tdValorTotal = $('<td>').append(
      $('<input>', {
        type: 'number',
        name: 'item[' + index + '][total]',
        step: '0.001',
        value: Number(item.total.replace(/,/g, '')).toFixed(2),
        class: 'form-control input-sm totalines inpnum'
      })
    );

    // Manejo de eventos para calcular el total y el valor unitario
    $tdCantidad.find('input').on('change', function() {
      var cantidad = parseFloat($(this).val()) || 0;
      var valorUnitario = parseFloat($tdValorUnitario.find('input').val()) || 0;
      $tdValorTotal.find('input').val((cantidad * valorUnitario).toFixed(2));
      calctotal();
    });
    $tdValorUnitario.find('input').on('change', function() {
      var cantidad = parseFloat($tdCantidad.find('input').val()) || 0;
      var valorUnitario = parseFloat($(this).val()) || 0;
      $tdValorTotal.find('input').val((cantidad * valorUnitario).toFixed(2));
      calctotal();
    });
    $tdValorTotal.find('input').on('change', function() {
      var total = parseFloat($(this).val()) || 0;
      var cantidad = parseFloat($tdCantidad.find('input').val()) || 0;
      if (cantidad !== 0) {
        $tdValorUnitario.find('input').val((total / cantidad).toFixed(2));
      } else {
        $tdValorUnitario.find('input').val('0.00');
      }
      calctotal();
    });

    // Botón para eliminar la fila
    var $tdDelete = $('<td>').append(
      $('<i>', {
        class: 'fa fa-trash text-danger delitem',
        style: 'font-size: 26px;'
      }).on('click', function() {
        $tr.remove();
        calctotal();
      })
    );

    $tr.append($tdCodigo, $tdImagen, $tdUnidad, $tdProducto, $tdCantidad, $tdValorUnitario, $tdValorTotal, $tdDelete);
    $lineasCotizacion.append($tr);
    $('#modalSrchProducts').modal('hide');
    calctotal();
  }




  $(document).on('click', '.btnAgregarTransport', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    var datos = new FormData();
    datos.append("id", id);
    datos.append("accion", 'loadEdit');
    $.ajax({
      url: "modelos/new-venta.modelo.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(item) {
        // $("#_ameEmpresa").val(item.empresa);
        $("#_ameEmpresa").val('INVERSIONES Y SERVICIOS HERMOZA LUZ SRL');
        // $("#_numRuc").val(item.ruc);
        $("#_numRuc").val('204870408582');
        $("#_marca").val(item.marca);
        $("#_placa").val(item.placa);
        $("#_confVehicular").val(item.conf_vehicular);
        $("#_habVehicular").val(item.hab_vehicular);
        $("#_conductor").val(item.conductor);
        $("#_licencia").val(item.licencia);
        $("#_equipo").val(item.equipo);
        $("#_id").val(id);
      }
    })
  })
  $(document).on('submit', '#formDatosTransport', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('accion', 'ActualizarDataTransport');
    $.ajax({
      url: 'controladores/new-venta.controlador.php',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      dataType: 'json', // <-- Asegúrate de que el tipo de dato esperado sea JSON
      success: function(resp) {
        if (resp.status === "ok") {
          swal({
            type: "success",
            title: "Datos del transporte ha sido registrado correctamente",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
          }).then((result) => {
            if (result.value) {
              window.location = "cotizacion-lista";
            }
          });
        } else {
          alert("Error al actualizar. Por favor, inténtalo de nuevo.");
        }
      },
      error: function(xhr, status, error) {
        console.error("Error en la solicitud AJAX:", error);
        alert("Error en la solicitud. Por favor, inténtalo de nuevo.");
      }
    });
  })
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
    var cod = 'load_cotizacion';
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
        url: 'controladores/new-venta.controlador.php',
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

  })
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

  .modal-fullscreen {
    width: 100%;
    max-width: none;
    margin: 0;
  }

  .modal-fullscreen .modal-content {
    height: 100vh !important;
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