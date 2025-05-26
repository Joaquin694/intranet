<style>
  .box.box-primary {
    border-top-color: #39023b !important;
}
</style>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">COTIZACIÓN</div>
          <form id="formularioNewCotizacion">
            <input type="hidden" name="accion" value="registro_cotizacion">
            <div class="box-body">
              <div class="box">
                <div class="col-lg-12 col-xs-12"><br></div>
                <div class="col-lg-6 col-xs-12">
                  <fieldset class="bordered">
                    <legend>&nbsp;INFORMACIÓN GENERAL</legend>
                    <div class="col-lg-12 col-xs-12">
                      <div class="form-group">
                        <select class="form-control" name="tipo_doc_cliente" required id='tipoDocu'>
                          <option disabled selected="selected" value="">Tipo documento de identidad</option>
                          <option value="CE">CARNET DE EXTRANJERIA</option>
                          <option value="RUC">REG. UNICO DE CONTRIBUYENTES</option>
                          <option value="DNI">DOCUMENTO NACIONAL DE IDENTIDAD</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-12 col-xs-12">
                      <div class="form-group">

                        <input type="hidden" class="nombre_cliente" name="nombre_cliente" id="nombre_cliente" required>
                        <input type="hidden" name="id_cotizacion" id="id_cotizacion" required>
                        <input type="hidden" class="nombre_cliente_op" name="nombre_cliente_op" id="nombre_cliente_op" required>

                        <input type="hidden" class="id_cliente" name="id_cliente" id="id_cliente" required>
                        <input type="hidden" class="documento_cliente" name="numero_documento" id="numero_documento" required="">
                        <div class="autocompletar">
                          <input type="text" class="form-control input-sm text-uppercase campo_de_busqueda" id="campo_cliente" module="clientes" placeholder="Buscar cliente" autocomplete="off" required="">
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-8 col-xs-12">
                      <div class="form-group" id="numDocumento">
                        <input type="text" class="form-control d-none" name="documento" id="documentoInput" placeholder="numero de documento de indentidad">
                      </div>
                    </div>
                    <div class="col-lg-8 col-xs-12">
                      <div class="form-group">
                        <input type="text" class="form-control direccion_cliente" name="direccion_cliente" id='idfDireccion' placeholder="Dirección">
                      </div>
                    </div>
                    <div class="col-lg-4 col-xs-12">
                      <div class="form-group">
                        <input type="text" class="form-control" name="documento_contacto_cliente" id='inputDocuIdentidad' placeholder="Número de documento de identidad" required>
                      </div>
                    </div>
                    <div class="col-lg-8 col-xs-12">
                      <div class="form-group">
                        <input type="text" class="form-control" name="nombre_contacto_cliente" id="nombre_contacto_cliente" placeholder="Contacto" required>
                      </div>
                    </div>
                    <div class="col-lg-4 col-xs-12">
                      <div class="form-group">
                        <input type="text" class="form-control telefono_cliente" name="telefono_cliente" id="telefono_cliente" placeholder="Celular" required>
                      </div>
                    </div>
                    <div class="col-lg-8 col-xs-12">
                      <div class="form-group" >
                        <input type="email" class="form-control" name="email" id="email" placeholder="email">
                      </div>
                    </div>
                  </fieldset>
                </div>
                <div class="col-lg-6 col-xs-12">
                  <button type="button" class="btn btn-primary" id="transportData"><i class="fa fa-plus"></i> Datos de trasnporte</button>
                  <fieldset class="bordered">
                    <legend>&nbsp;ACUERDO COMERCIAL</legend>
                    <div class="col-lg-6 col-xs-12">
                      <div class="form-group" title="Fecha emisión">
                        <input type="text" class="form-control" name="fecha_emision" id="fecha_emision" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Fecha emisión" required>
                      </div>
                    </div>
                    <div class="col-lg-6 col-xs-12">
                      <div class="form-group" title="Fecha validez">
                        <input type="text" class="form-control" name="fecha_validez" id="fecha_validez" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Fecha validez" required>
                      </div>
                    </div>
                    <div class="col-lg-12 col-xs-12">
                      <hr>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Condición de pago</label>
                        <select class="form-control" name="condicion_pago" id="condicion_pago" required>
                          <option disabled selected="selected" value="">----Seleccionar----</option>
                          <option>Contado</option>
                          <option>Crédito</option>
                          <option>20% de Adelanto y 80% al Término</option>
                          <option>30% de Adelanto y 70% al Término</option>
                          <option>50% de Adelanto y 50% al Término</option>
                          <option>A Crédito 10 días</option>
                          <option>A Crédito 15 días</option>
                          <option>A Crédito 30 días</option>
                          <option>A Crédito 60 días</option>
                          <option>A Crédito 90 días</option>
                          <option>Pago Mensual</option>
                          <option>50% a la Mitad del Proyecto y 50% al Término</option>
                          <option>70% al Despacho y 30% a la Recepción</option>
                        </select>
                      </div>
                    </div>
                  </fieldset>
                </div>
                <div class="col-lg-12 col-xs-12">
                  <table class="table table-bordered" id="lineasCotizacion_cuerpo">
                    <thead class="theadcentrado">
                      <tr>
                        <th style="width: 110px !important;">Codigo</th>
                        <th>Imagen</th>
                        <th>Unidad</th>
                        <th>Producto</th>
                        <th style="width: 85px !important;">Cant.</th>
                        <th style="width: 60px !important;">Valor Unitario</th>
                        <th style="width: 80px !important;">Valor TOTAL</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody class="theadcentrado_negro" id="lineasCotizacion"></tbody>
                    <thead>
                      <tr style="background: #fcfcfc; text-align: right;">
                        <td colspan="8" class="text-right text-black">
                          <button type="button" class="btn btn-primary" id="nwsrchprod"><i class="fa fa-plus"></i> Añadir </button>
                        </td>
                      </tr>
                    </thead>
                  </table>
                </div>
                <div class="col-lg-12 col-xs-12" style="text-align: right;">
                  <div class="form-check form-check-inline labelradioso">
                    <input class="form-check-input" type="checkbox" name="esgravada" id="opGravada" value="opGravada">
                    <label class="form-check-label" for="opGravada">Op. Gravada</label>
                  </div>
                  <table style="display: inline-block !important;margin-right: 75px !important">
                    <tr>
                      <td style=" background: #5e5e5e !important;color: white !important;width: 110px !important;border: 1px solid #b5b5b5 !important;padding: 5px 15px !important;">
                        Sub total: <input type="text" id='key_xclds' class="d-none" style='color: black !important'>
                      </td>
                      <td id="st_subtotal" style="text-align: right !important;width: 80px !important;border: 1px solid #b5b5b5 !important;padding: 5px 15px !important; ">
                        0.00
                      </td>
                    </tr>
                    <tr>
                      <td style=" background: #5e5e5e !important;color: white !important;width: 110px !important;border: 1px solid #b5b5b5 !important;padding: 5px 15px !important;">
                        Op. Gravadas: <input type="hidden" id='total_gravado' name="total_gravado" style='color: black !important'>
                      </td>
                      <td id="importegravadas" style="text-align: right !important;width: 80px !important;border: 1px solid #b5b5b5 !important;padding: 5px 15px !important; ">
                        0.00
                      </td>
                    </tr>
                    <tr>
                      <td style=" background: #5e5e5e !important;color: white !important;width: 110px !important;border: 1px solid #b5b5b5 !important;padding: 5px 15px !important;">
                        Op. Exoneradas: <input type="hidden" id='total_inafecto' name="total_inafecto" style='color: black !important'>
                      </td>
                      <td id="importeinafectas" style="text-align: right !important;width: 80px !important;border: 1px solid #b5b5b5 !important;padding: 5px 15px !important; ">
                        0.00
                      </td>
                    </tr>
                    <tr>
                      <td style=" background: #5e5e5e !important;color: white !important;width: 110px !important;border: 1px solid #b5b5b5 !important;padding: 5px 15px !important;">
                        IGV 18%:<input type="hidden" name='total_igv' id='total_igv'>
                      </td>
                      <td id='importeigv' style="  text-align: right !important;width: 80px !important;border: 1px solid #b5b5b5 !important;padding: 5px 15px !important; ">
                        0.00
                      </td>
                    </tr>
                    <tr>
                      <td style="background: #5e5e5e !important;color: white !important; width: 110px !important;border: 1px solid #b5b5b5 !important;padding: 5px 15px !important;">
                        TOTAL: <input type="hidden" name='total_cotizacion' id='total_cotizacion'>
                      </td>
                      <td id='importeTotalTabla' style="  text-align: right !important;width: 80px !important;border: 1px solid #b5b5b5 !important;padding: 5px 15px !important; ">
                        0.00
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div class="box-footer">
              <button id='registrar_cotizacion' type="submit" class="btn btn-primary pull-right">Registrar cotización</button>
            </div>
            <input type="text" id='json_datar' class="d-none">
          </form>
        </div>
      </div>
    </div>
  </section>
</div>

<div id="modalSrchProducts" class="modal fade" role="dialog" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#3c8dbc; color:white">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Productos</h4>
        <input type="hidden" name="accion" value="add_pago_compra">
      </div>
      <div class="modal-body">
        <div class="row" style="margin:0">
          <div class="col-12" style="padding: 1rem 1.5rem;">
            <input type="text" class="form-control input-sm srchproducts" placeholder="Buscar producto...">
          </div>
          <div class="col-sm-12">
            <table class="table table-condensed table-bordered" id="tbpagos">
              <thead>
                <tr class="bg-dark">
                  <th></th>
                  <th>CODIGO</th>
                  <th>TIPO</th>
                  <th>IMG</th>
                  <th>STOCK</th>
                  <th>PRODUCTO</th>
                  <th>P.UN</th>
                </tr>
              </thead>
              <tbody id="tr_detalle_products"></tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <button type="button" class="btn btn-primary" id="btn_nuevo_servicio">Agregar nuevo servicio</button>
      </div>
    </div>
  </div>
</div>

<div id="modalDatosTransport" class="modal fade" role="dialog" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#3c8dbc; color:white">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Datos del transporte</h4>
        <input type="hidden" name="accion" value="add_pago_compra">
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-6 form-group">
            <label for="equipo">Equipo a trasladar</label>
            <input type="text" class="form-control" id="equipo" name="equipo" placeholder="equipo" required>
          </div>
          <div class="col-lg-6 form-group">
            <label for="ameUnidad">Unidad asignada</label>
            <input type="text" class="form-control" id="ameEmpresa" name="ameEmpresa" placeholder="Camión rebatible por ejemplo" required>
          </div>
          <div class="col-lg-12 form-group">
            <label for="numRuc">Observación 1: </label>
            <input type="text" class="form-control" id="numRuc" name="numRuc"  value="Dichos precios no incluyen IGV" required>
          </div>
          <div class="col-lg-12 form-group">
            <label for="marca">Observación 2: </label>
            <input type="text" class="form-control" id="marca" name="marca" value="Carga y descarga es responsabilidad del cliente." required>
          </div>
          <div class="col-lg-12 form-group">
            <label for="placa">Observación 3: </label>
            <input type="text" class="form-control" id="placa" name="placa" value="El costo del falso flete y/o stand by es el 25% de la cotización por día" required>
          </div>
          <div class="col-lg-12 form-group">
            <label for="confVehicular">Observación 4: </label>
            <input type="text" class="form-control" id="confVehicular" name="confVehicular" value="NE" required>
          </div>

          <div class="col-lg-12 form-group">
            <label for="habVehicular" >Observación 5: </label>
            <input type="text" class="form-control" id="habVehicular" name="habVehicular"  required >
          </div>
          <div class="col-lg-12 form-group">
            <label for="conductor">Observación 6: </label>
            <input type="text" class="form-control" id="conductor" name="conductor"  required>
          </div>
          <div class="col-lg-12 form-group">
            <label for="licencia">Observación 7: </label>
            <input type="text" class="form-control" id="licencia" name="licencia"  required>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function calctotal() {
    var total = 0;
    var inaf = 0;
    var grav = 0;
    var igv = 0;
    document.querySelectorAll('.lnitem').forEach(function(tol) {
      let ttl = tol.querySelector('.totalines').value
      var checkBox = document.getElementById("opGravada");
      if (checkBox.checked == true) {
        grav += parseFloat(ttl);
      } else {
        inaf += parseFloat(ttl);
      }
      total += parseFloat(ttl);
    });
    igv += parseFloat(grav * 0.18);
    total = igv + grav + inaf;

    document.querySelector('#total_cotizacion').value = total.toFixed(2);
    document.querySelector('#importeTotalTabla').textContent = total.toFixed(2);

    document.querySelector('#total_igv').value = igv.toFixed(2);
    document.querySelector('#importeigv').textContent = igv.toFixed(2);

    document.querySelector('#importeinafectas').textContent = inaf.toFixed(2);
    document.querySelector('#total_inafecto').value = inaf.toFixed(2);

    document.querySelector('#importegravadas').textContent = grav.toFixed(2);
    document.querySelector('#total_gravado').value = grav.toFixed(2);
  }

  document.querySelector('#opGravada').addEventListener('click', function() {
    calctotal();
  });

  $(document).on('click', '#btn_nuevo_servicio', function() {
    window.location = "servicesadm";
  });

  document.querySelector('.srchproducts').addEventListener('keyup', function(e) {
    if (this.value.length > 0) {
      $('#modalSrchProducts').modal('show');
      $('#tr_detalle_products').html('');
      $.ajax({
        type: 'post',
        url: 'controladores/new-venta.controlador.php',
        data: {
          accion: 'search_products_cotizacion',
          search: this.value
        },
        success: function(respuesta) {
          if (respuesta.success) {
            var dd = '';
            respuesta.data.map(function(elm) {
              dd += `<tr>
              <td><i class="fa fa-plus-circle text-success addproduct" style="font-size:40px" data-id="${elm.id_item}"
              data-codigo="${elm.codigo}" data-stock="${elm.stock}" data-name="${elm.nombre_producto}" data-precio="${elm.precio_venta}" data-img="${elm.imagen}"></i></td>
              <td>${elm.codigo}</td>
              <td>${elm.codigo_x_tipo_item}</td>
              <td><img src="${elm.imagen}" alt="" /></td>
              <td>${elm.stock}</td>
              <td>${elm.nombre_producto}</td>
              <td>${elm.precio_venta}</td>
              </tr>`;
            });
            $('#tr_detalle_products').html(dd);
          } else {
            swal({
              icon: 'error',
              title: 'Error',
              text: respuesta.msg
            });
          }
        }
      });
    }
  });

  function nwlineitem(data) {
    if (document.querySelector('#lineasCotizacion').lastChild) {
      var lastid = document.querySelector('#lineasCotizacion').lastChild.getAttribute("id");
      var disp = lastid.split('_');
      var index = parseInt(disp[1]) + 1;
    } else {
      var index = 1;
    }
    let tr = document.createElement("tr");
    tr.classList = "lnitem";
    tr.id = "lbl_" + index;
    let td0 = document.createElement("td");
    let imj = document.createElement("img");
    imj.src = data.img;

    let td01 = document.createElement("td");
    let spannn = document.createElement("span");
    spannn.textContent = data.codigo;

    let td1 = document.createElement("td");

    // let inputh = document.createElement("span");
    // inputh.textContent = data.name;
    let inputh = document.createElement("input");
    inputh.type = "text";
    inputh.name = `item[${index}][name]`;
    inputh.value = data.name;
    inputh.classList = "form-control input-sm";

    let inputn = document.createElement("input");
    inputn.type = "hidden";
    // inputn.name = `item[${index}][name]`;
    inputn.name = `item[${index}][name_hidden]`;
    inputn.value = data.name;

    let input1 = document.createElement("input");
    input1.type = "hidden";
    input1.name = `item[${index}][id]`;
    input1.value = data.id;

    let input2 = document.createElement("input");
    input2.type = "number";
    input2.name = `item[${index}][cantidad]`;
    input2.step = `0.001`;
    input2.max = data.stock;
    input2.classList = "form-control input-sm inpnum";
    input2.value = `1`;
    input2.addEventListener('change', function() {
      if (input3.value.length > 0) {
        input4.value = parseFloat(input2.value * input3.value).toFixed(2);
        calctotal();
      }
    });

    let input3 = input1.cloneNode(true);
    input3.type = `number`;
    input3.name = `item[${index}][valor]`;
    input3.step = `0.001`;
    input3.value = data.precio;
    input3.classList = "form-control input-sm inpnum";
    input3.addEventListener('change', function() {
      if (input2.value.length > 0) {
        input4.value = parseFloat(input2.value * input3.value).toFixed(2);
        calctotal();
      }
    });
    input3.addEventListener('focusout', function() {
      this.value = parseFloat(this.value).toFixed(2);
    });
    let input4 = input1.cloneNode(true);
    input4.type = `number`;
    input4.name = `item[${index}][total]`;
    input4.step = `0.001`;
    input4.value = data.precio;
    input4.classList = "form-control input-sm totalines inpnum";
    input4.addEventListener('change', function() {
      if (input2.value.length > 0) {
        input3.value = parseFloat(this.value / input2.value).toFixed(2);
        calctotal();
      }
    });
    input4.addEventListener('focusout', function() {
      this.value = parseFloat(this.value).toFixed(2);
    });

    let select2 = document.createElement("select");
    select2.classList = "form-control";
    select2.name = `item[${index}][unidad]`;
    let options = ["UNIDAD", "KILOS", "BALDE", "CAJA", "DOCENA", "LITRO", "ONZAS", "SERVICIO", "GRAMOS"];
    options.forEach(optionText => {
      let option = document.createElement("option");
      option.value = optionText;
      option.textContent = optionText;
      select2.appendChild(option);
    });

    let tdsel = document.createElement("td");
    let td2 = document.createElement("td");
    let td3 = document.createElement("td");
    let td4 = document.createElement("td");

    td01.appendChild(spannn);
    td0.appendChild(imj);
    td1.appendChild(input1);
    td1.appendChild(inputh);
    td1.appendChild(inputn);
    tdsel.appendChild(select2);

    td2.appendChild(input2);
    td3.appendChild(input3);
    td4.appendChild(input4);

    tr.append(td01);
    tr.append(td0);
    tr.append(tdsel);
    tr.append(td1);
    tr.append(td2);
    tr.append(td3);
    tr.append(td4);

    let tdn = document.createElement("td");
    let ii = document.createElement("i");
    ii.classList = "fa fa-trash text-danger delitem";
    ii.style = "font-size: 26px;";
    ii.addEventListener('click', function() {
      tr.remove();
      calctotal();
    });
    tdn.appendChild(ii);

    tr.append(tdn);
    document.querySelector('#lineasCotizacion').append(tr);
    $('#modalSrchProducts').modal('hide');
    calctotal();
  }

  document.querySelector('#nwsrchprod').addEventListener('click', function() {
    $('#modalSrchProducts').modal('show');
  });

  document.querySelector('#transportData').addEventListener('click', function() {
    $('#modalDatosTransport').modal('show');
  });

  formularioNewCotizacion.onsubmit = function(e) {
    e.preventDefault();

    let data = $('#formularioNewCotizacion').serializeArray();

    // Add transport data
    let transportFields = ['ameEmpresa', 'numRuc', 'marca', 'placa', 'confVehicular', 'habVehicular', 'conductor', 'licencia', 'equipo'];
    transportFields.forEach(field => {
      let value = $(`#${field}`).val();
      data.push({
        name: field,
        value: value ? value : 'NE'
      });
    });

    $.ajax({
      type: 'post',
      url: 'controladores/new-venta.controlador.php',
      data: $.param(data),
      success: function(respuesta) {
        if (respuesta.msg=='registro de cotización exitoso'|| respuesta== 'ok') {
          swal({
            type: "success",
            title: "Bien",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
          }).then((result) => {
            if (result.value) {
              window.location.reload();
            }
          });

        } else {
          swal({
            icon: 'error',
            title: 'Error',
            text: respuesta.msg
          });
        }
       
      }
    });
  };

  $(document).on('click', '.addproduct', function() {
    nwlineitem({
      id: this.dataset.id,
      codigo: this.dataset.codigo,
      stock: this.dataset.stock,
      name: this.dataset.name,
      precio: this.dataset.precio,
      img: this.dataset.img
    });
  });

  let indexFocus = -1;

  document.addEventListener("DOMContentLoaded", function() {
    var campoDbusqueda = document.querySelector(".campo_de_busqueda");
    campoDbusqueda.addEventListener("input", function() {
      var numDocumento = document.getElementById('numDocumento');
      if (numDocumento) {
        var inputNumDocumento = numDocumento.querySelector('input');
        if (inputNumDocumento) {
          numDocumento.classList.add('hidden');
        }
      }

      const consultame = this.value;
      if (!consultame) return false;

      cerrarLista();
      const divList = document.createElement("div");
      divList.setAttribute("id", this.id + "-lista-autocompletar");
      divList.setAttribute("class", "lista-autocompletar-items");
      this.parentNode.parentNode.appendChild(divList);

      $.ajax({
        type: 'post',
        url: 'controladores/new-venta.controlador.php',
        data: `term=${consultame}&accion=buscar_cliente_big`,
        success: function(respuesta) {
          if (respuesta && respuesta.success && respuesta.data && respuesta.data.length > 0) {

            respuesta.data.forEach(item => {
              const elementoLista = document.createElement("div");
              elementoLista.innerHTML = `<span>${item.documento} - ${item.nombre}</span>`;
              elementoLista.setAttribute("class", "respuesta_item");
              elementoLista.setAttribute("data-id", item.id);
              elementoLista.setAttribute("data-documento", item.documento);
              elementoLista.setAttribute("data-nombre", item.nombre);
              elementoLista.setAttribute("data-telefono", item.telefono);
              elementoLista.setAttribute("data-direccion", item.direccion);
              elementoLista.addEventListener('click', function() {
                addSelectedItem(item);
                return false;
              });
              divList.appendChild(elementoLista);
            });
            var inputNumDocumento = numDocumento.querySelector('input');
            if (inputNumDocumento) {
              numDocumento.classList.add('hidden');
              inputNumDocumento.required = false;
            }

          } else {
            if (numDocumento) {
              var inputNumDocumento = numDocumento.querySelector('input');
              if (inputNumDocumento) {
                numDocumento.classList.remove('hidden');
                inputNumDocumento.required = true;
                var item = 0;
                addSelectedItem(item);
              }
            }
          }
        }
      });
    });

    //////////////////////////////////////////////////

    campoDbusqueda.addEventListener('keydown', function(e) {
      const divList = document.querySelector('#' + this.id + '-lista-autocompletar');
      let items;

      if (divList) {
        items = divList.querySelectorAll('div');

        switch (e.keyCode) {
          case 40: //abajo
            indexFocus++;
            if (indexFocus > items.length - 1) indexFocus = items.length - 1;
            break;
          case 38: //arriba
            indexFocus--;
            if (indexFocus < 0) indexFocus = 0;
            break;
          case 13: //enter
            e.preventDefault();
            items[indexFocus].click();
            indexFocus = -1;
            break;
          default:
            break;
        }
        seleccionar(items, indexFocus);
        return false;
      }
    });
  });



  // campoDbusqueda.addEventListener('keydown', function(e) {
  //   const divList = document.querySelector('#' + this.id + '-lista-autocompletar');
  //   let items;

  //   if (divList) {
  //     items = divList.querySelectorAll('div');

  //     switch (e.keyCode) {
  //       case 40: //abajo
  //         indexFocus++;
  //         if (indexFocus > items.length - 1) indexFocus = items.length - 1;
  //         break;
  //       case 38: //arriba
  //         indexFocus--;
  //         if (indexFocus < 0) indexFocus = 0;
  //         break;
  //       case 13: //enter
  //         e.preventDefault();
  //         items[indexFocus].click();
  //         indexFocus = -1;
  //         break;
  //       default:
  //         break;
  //     }
  //     seleccionar(items, indexFocus);
  //     return false;
  //   }
  // });

  document.addEventListener('click', function() {
    cerrarLista();
  });

  function seleccionar(lista, indexFocus) {
    if (!lista || indexFocus == -1) return false;
    lista.forEach(x => {
      x.classList.remove('autocompletar-active');
    });
    lista[indexFocus].classList.add("autocompletar-active");
  }

  function cerrarLista() {
    const items = document.querySelectorAll(".lista-autocompletar-items");
    items.forEach(item => {
      item.parentNode.removeChild(item);
    });
    indexFocus = -1;
  }

  function addSelectedItem(item) {
    if (item === 0) {

      var valorTexto = document.getElementById("campo_cliente").value;
      var valorNumDoc = document.getElementById("documentoInput").value;
      document.querySelector(".id_cliente").value = item;
      document.querySelector(".nombre_cliente_op").value = valorTexto.toUpperCase();
      document.querySelector(".nombre_cliente").value = "";
      document.querySelector(".telefono_cliente").value = "";
      document.querySelector(".direccion_cliente").value = "";
      document.querySelector("#inputDocuIdentidad").value = "";

    } else {
      document.querySelector(".campo_de_busqueda").value = `${item.documento} - ${item.nombre}`;
      document.querySelector(".id_cliente").value = item.id;
      document.querySelector(".nombre_cliente").value = item.nombre;
      document.querySelector(".direccion_cliente").value = item.direccion;
      document.querySelector(".telefono_cliente").value = item.telefono;
      document.querySelector(".documento_cliente").value = item.documento;
      document.querySelector("#inputDocuIdentidad").value = item.documento;
      document.querySelector(".nombre_cliente_op").value = "";
      document.querySelector("#documentoInput").value = "";
    }
  }

  $("#tipoDocu").change(function() {
    $('#campo_cliente').val('');
    $('#idfDireccion').val('');
    $('#inputDocuIdentidad').val('');
    $('input[name="telefono_cliente"]').val('');
  });

  $("#inputDocuIdentidad").change(function() {
    var campo_cliente = $('#campo_cliente').val();
    var inputDocuIdentidadv = $('#inputDocuIdentidad').val();
    var tipoDocu = $('#tipoDocu').val();

    if (inputDocuIdentidadv.length == '8' && tipoDocu == 'DNI' && campo_cliente.length < 1 && inputDocuIdentidadv !== '00000000') {
      var request = $.ajax({
        url: "https://dniruc.apisperu.com/api/v1/dni/" + inputDocuIdentidadv + "?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImFiYWRlc3F1ZW5sZXluZXJAZ21haWwuY29tIn0.NTjj1t6MHEf8-2jIl3LNVF-nnLk1vaEHnmcC06QH54c",
        method: "GET"
      });
      request.done(function(data) {
        var name_cli = (data.nombres + ' ' + data.apellidoPaterno + ' ' + data.apellidoMaterno).replace(/Ñ/gi, "N");
        $('#campo_cliente').val(name_cli);
        $('#idfDireccion').val('No especifica');
      });
    } else if (inputDocuIdentidadv.length == '11' && tipoDocu == 'RUC' && campo_cliente.length < 1) {
      var request = $.ajax({
        url: "https://dniruc.apisperu.com/api/v1/ruc/" + inputDocuIdentidadv + "?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImFiYWRlc3F1ZW5sZXluZXJAZ21haWwuY29tIn0.NTjj1t6MHEf8-2jIl3LNVF-nnLk1vaEHnmcC06QH54c",
        method: "GET"
      });
      request.done(function(data) {
        $('#campo_cliente').val(data.razonSocial);
        $('#idfDireccion').val(data.direccion);
      });
    } else if (inputDocuIdentidadv.length == '8' && tipoDocu == 'DNI' && campo_cliente.length < 1 && inputDocuIdentidadv === '00000000') {
      $('#campo_cliente').val('Sin especificar');
      $('#idfDireccion').val('No especifica');
    }
  });
</script>

<style media="screen">
  .inpnum {
    min-width: 90px;
  }

  .autocompletar {
    position: relative;
  }

  strong {
    color: black;
  }

  #colores-in {
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1rem;
    padding: 5px 5px;
    outline: none;
    width: 500px;
  }

  .lista-autocompletar-items {
    color: #666;
    position: absolute;
    border: 1px solid #d4d4d4;
    border-bottom: none;
    border-top: none;
    z-index: 99;
    top: 100%;
    left: 15px;
    right: 0;
    width: calc(100% - 30px);
  }

  .lista-autocompletar-items div {
    padding: 10px;
    cursor: pointer;
    background-color: #fff;
    border-bottom: 1px solid #d4d4d4;
  }

  .lista-autocompletar-items div:hover {
    background-color: #e9e9e9;
  }

  .autocompletar-active {
    background-color: #86b8f6 !important;
    color: #222;
    font-weight: bold;
  }

  .autocompletar-active strong {
    color: #ffffff;
  }

  .redondo {
    width: 4rem;
    height: 4rem;
    box-shadow: 0 0 5px 1px #000000;
    border: 1px solid #444444;
  }
</style>



   <!-- JavaScript to copy content -->
   <script>
        // Function to copy content from one input to another
        function copyInputContent() {
            // Get the input elements
            const inputDocuIdentidad = document.getElementById('inputDocuIdentidad');
            const documentoInput = document.getElementById('documentoInput');

            // Add an event listener for input changes
            inputDocuIdentidad.addEventListener('input', function() {
                // Copy the value of inputDocuIdentidad to documentoInput
                documentoInput.value = this.value;
            });

            // Add an event listener for paste events
            inputDocuIdentidad.addEventListener('paste', function(event) {
                // Use setTimeout to ensure paste data is available after the event
                setTimeout(() => {
                    documentoInput.value = this.value;
                }, 0);
            });
        }

        // Initialize the function when the page loads
        document.addEventListener('DOMContentLoaded', copyInputContent);
    </script>