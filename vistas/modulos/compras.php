<!-- VISTAS COMPRAS -->
<div class="content-wrapper" id="CuerpasoDeVenta">
  <section class="content">
    <div class="row">
      <!--=====================================
      EL FORMULARIO
      ======================================-->
      <div class="col-lg-12">
        <div class="box box-success">
          <div class="box-header with-border"></div>
          <form role="form" id="formularioNewCompra">
            <div class="col-md-4">
              <label for="tipoMoneda">Tipo de Moneda:</label>
              <select id="tipoMoneda" class="form-control" name="tipo_moneda" onchange="cambiarMonedaActualizarTipoCambio(this.value)">
                <option value="PEN">Soles</option>
                <option value="USD">Dólares</option>
              </select>
            </div>
            <div class="col-md-4">
              <label for="tipoCambio">Tipo de Cambio:</label>
              <input type="text" id="tipoCambio" class="form-control" name="tipo_cambio" readonly>
            </div>
            <div class="col-md-4">
              <tr style="background: #fcfcfc; text-align: right;">
                <td colspan="8" class="text-right text-black">
                  <button type="button" class="btn btn-success" id="btnEvidencias"><i class="fa fa-plus"></i> Subir Evidencias </button>
                </td>
              </tr>
            </div>

            <input type="hidden" name="accion" value="registrocompra">
            <div class="box-body">
              <div class="row">
                <div class="col-md-12 text-right">
                  <span style="color: #c3c3c3 !important">
                    <i class="fa fa-minus-square-o" aria-hidden="true" onclick="ocultate__ ('.elementHeaderFact')"></i>
                    <i class="fa fa-plus-square-o" aria-hidden="true" onclick="mostrate__('.elementHeaderFact')"></i>
                  </span>
                </div>
                <div class="col-md-8">
                  <span style="font-size: 13px">
                    Fecha de Registro: <b id="idfFechaEmitido" contenteditable="true"><?php echo date("Y-m-d"); ?></b>&nbsp;&nbsp;&nbsp;&nbsp;Tipo de moneda: <b>Soles</b><br>
                  </span>
                  <div class="row">
                    <div class="col-md-4">
                      <label for="">Tipo</label>
                      <select id="selectTipoComprobante" class="form-control" name="tipo_comprobante_compra" style="background: white !important;color: #ff0000 !important;border: 1px solid #c3c3c3 !important;justify-content: center !important;font-weight: 900;font-size: 13px" required>
                        <option selected="selected" value="">TIPO DE COMPROBANTE</option>
                        <option id="BLT" value="BLT">BOLETA DE VENTA ELECTRÓNICA</option>
                        <option id="FCT" value="FCT">FACTURA DE VENTA ELECTRÓNICA</option>
                        <option id="LQC" value="LQC">LIQUIDACION DE COMPRA</option>
                        <option id="BAE" value="BAE">BOLETO AEREO</option>
                        <option id="COA" value="COA">CARGA PORTE AEREO</option>
                        <option id="REA" value="REA">RECIBO DE ARRENDAMIENTO</option>
                        <option id="PBV" value="PBV">POLIZA DE BOLSA DE VALORES</option>
                        <option id="TMR" value="TMR">TICKET DE MAQUINA REGISTRADORA</option>
                        <option id="DBS" value="DBS">DOCUMENTOS DE BANCA Y SEGUROS</option>
                        <option id="RSP" value="RSP">RECIBO POR SERVICIOS PUBLICOS</option>
                        <option id="BTT" value="BTT">BOLETO DE TRANSPORTE TERRESTRE</option>
                        <option id="DEA" value="DEA">DOCUMENTOS EMITIDOS POR AFP y EPS</option>
                        <option id="POD" value="POD">POLIZA O DUI</option>
                        <option id="CND" value="CND">COMPROBANTES NO DOMICILIADOS</option>
                        <option id="DUA" value="DUA">DUA</option>
                        <option id="NDV" value="NDV">NOTA DE VENTA</option>
                        <option id="RPH" value="RPH">RECIBO POR HONORARIO</option>
                        <option id="PLL" value="PLL">PLANILLA</option>
                        <option id="PRI" value="PRI">PAGO DE RENTA E IGV</option>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <label for="">Serie</label>
                      <input type="text" name="serie_compra" class="form-control text-uppercase" maxlength="4" required>
                    </div>
                    <div class="col-md-4">
                      <label for="">Número</label>
                      <input type="tel" name="numero_compra" class="form-control" required>
                    </div>
                    <!-- <div class="col-md-4">
                      <label for="">Número</label>
                      <input type="tel" name="numero_compra" class="form-control" required>
                    </div> -->
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-4">
                      <select class="form-control" name="tipo_doc_cliente" required id='tipoDocu'>
                        <option disabled selected="selected" value="">Tipo documento de identidad</option>
                        <option value="CE">CARNET DE EXTRANJERIA</option>
                        <option value="RUC">REG. UNICO DE CONTRIBUYENTES</option>
                        <option value="DNI">DOCUMENTO NACIONAL DE IDENTIDAD</option>
                      </select>
                    </div>
                  </div>
                  <article id="datosCliente" style="margin-top: 10px;font-size: 15px;">

                    <label for="" style="width:100%"><i class="fa fa-users"></i> SELECCIONE PROVEEDOR

                      <!-- <button style="float: right;" type="button" class="btn btn-default btn-xs" onclick="window.open('proveedores', '_blank');"> <i class="fa fa-plus"></i> Agregar Proveedor</button> -->
                      <button style="float: right;" type="button" class="btn btn-default btn-xs" id="newProveedor">
                        <!-- <button style="float: right;" type="button" class="btn btn-default btn-xs" id="newProveedor" data-toggle="modal" data-target="#modalAgregarProveedorwer"> -->
                        <i class="fa fa-plus"></i> Agregar Proveedor
                      </button>


                    </label><br>
                    <input type="hidden" class="id_proveedor" name="id_proveedor">
                    <div class="autocompletar">
                      <input type="text" class="form-control input-sm text-uppercase campo_de_busqueda" id="campo_cliente" module="clientes" funt="addClientId" placeholder="Buscar proveedor" autocomplete="off" required="">
                      <!-- <select class="form-control select2" name="" id="">

                      </select> -->
                    </div>
                  </article>
                </div>
                <div class="col-md-4 elementHeaderFact text-right">
                  <div class="row">
                    <label for="inputEmail3" class="col-sm-3 control-label">F.contabilizacion</label>
                    <div class="col-sm-9">
                      <input type="date" class="form-control" id="fecha_contabilizacion_compra" placeholder="Fecha contabilizacion" name="fecha_contabilizacion_compra" required onchange="obtenerTipoDeCambio()">
                    </div>
                  </div>
                  <div class="row">
                    <label for="inputEmail3" class="col-sm-3 control-label">F.vencimiento</label>
                    <div class="col-sm-9">
                      <input type="date" class="form-control" id="inputEmail3" placeholder="Fecha vencimiento" name="fecha_vencimiento_compra" required>
                    </div>
                  </div>
                  <div class="row">
                    <label for="inputEmail3" class="col-sm-3 control-label">F.documento</label>
                    <div class="col-sm-9">
                      <input type="date" class="form-control" id="inputEmail3" placeholder="Fecha documento" name="fecha_documento_compra" required>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row ">
                <div class="col-lg-12">
                  <table class="table table-bordered elementTableFact" id="idTableSales">
                    <thead>
                      <tr>
                        <th class="px-3 py-0">TIPO</th>
                        <th colspan="2">DESCRIPCIÓN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th class="px-3 py-0">UNIDAD</th>
                        <th class="px-3 py-0">CANTIDAD</th>
                        <th class="px-3 py-0">VALOR</th>
                        <th class="px-3 py-0">TOTAL</th>
                        <th class="px-3 py-0">IGV</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody id="tboDyPreventa"></tbody>
                    <thead>
                      <tr style="background: #fcfcfc; text-align: right;">
                        <td colspan="8" class="text-right text-black">
                          <button type="button" class="btn btn-success" id="nwlineitem"><i class="fa fa-plus"></i> Añadir </button>
                        </td>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr style="background: #fcfcfc; text-align: right;">
                        <td class="theadTable" colspan="6" style="color: #5e5e5e !important"> OP. INAFECTAS <b class='simboloMoneda'></b></td>
                        <td class="theadTable" colspan="2" style="color: #5e5e5e !important" id="importeinafectas">0.00</td>
                      </tr>
                      <tr style="background: #fcfcfc; text-align: right;">
                        <td class="theadTable" colspan="6" style="color: #5e5e5e !important"> OP. GRAVADAS <b class='simboloMoneda'></b></td>
                        <td class="theadTable" colspan="2" style="color: #5e5e5e !important" id="importegravadas">0.00</td>
                      </tr>
                      <tr style="background: #fcfcfc; text-align: right;">
                        <td class="theadTable" colspan="6" style="color: #5e5e5e !important"> IGV <b class='simboloMoneda'></b></td>
                        <td class="theadTable" colspan="2" style="color: #5e5e5e !important" id="importeigv">0.00</td>
                      </tr>
                      <tr style="background: #fcfcfc; text-align: right;">
                        <td class="theadTable" colspan="6" style="color: #5e5e5e !important"> IMPORTE TOTAL <b class='simboloMoneda'></b></td>
                        <td class="theadTable" colspan="2" style="color: #5e5e5e !important" id="importeTotalTabla">0.00</td>
                      </tr>
                    </tfoot>
                  </table>
                  <input type="hidden" name="total_igv" id="total_igv">
                  <input type="hidden" name="total_inafecto" id="total_inafecto">
                  <input type="hidden" name="total_gravado" id="total_gravado">
                </div>
              </div>
            </div>
            <div class="box-footer text-right">
              <input type="hidden" name="total_compra" id="total_compra">
              <button style="padding: 10px 20px;font-weight: 900;background: white" type="submit" class="btn btn-default btn-lg" id="btnGuardarVenta"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRBSqtVpR3OGyb__AIYk3VX6cdLoVKFH5t9EJmOdrgR4IupzCxq&s" style="width: 20px"> Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>





<div id="modalAgregarProveedorwer" class="modal fade" role="dialog">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" style='color: white !important; font-size: 30px !important;     opacity: unset !important;'>&times;</button>
        <h4 class="modal-title">Agregar Proveedor</h4>
      </div>
      <div class="modal-body">
        <?php include 'vistas/modulos/proveedores.php'; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalEvidencias" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 70%;">
    <div class="modal-content">
      <!-- <form id="formVerCronograma" method="post"> -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Evidencias</h4>
      </div>
      <div class="modal-body">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">

          <label for="file1">Archivo 1:</label>
          <input type="file" id="file1" name="file1">

          <label for="file2">Archivo 2:</label>
          <input type="file" id="file2" name="file2">

          <label for="file3">Archivo 3:</label>
          <input type="file" id="file3" name="file3">
        </div>
        <table class="table table-condensed" id="tbDocPagos">
          <thead>
            <tr>
              <th>ID</th>
              <th>FECHA DE REGISTRO</th>
              <th>USUARIO</th>
              <th>DOC1</th>
              <th>DOC2</th>
              <th>DOC3</th>
            </tr>
          </thead>
          <tbody id="tbDocPagosTbody"></tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).on('click', '#newProveedor', function(e) {
    e.preventDefault();
    // window.location = "proveedores";
    window.open('proveedores', '_blank');
  });

  $(document).ready(function() {

    /*asiganar correlativo y serie*/
    var docuIdentidad = $("#inputDocuIdentidad").val();
    var accion = "add_cabecera_comprobante";

    var dataen =
      'docuIdentidad=' + docuIdentidad +
      '&accion=' + accion;
    $.ajax({
      type: 'post',
      url: 'controladores/compras.controlador.php',
      data: dataen,

      success: function(resp) {

        $("#serie_correlativo").html(resp);
      }
    });
    nwlineitem(true)
    cargarListDoc();
  });

  $(document).on('click', '#btnEvidencias', function(e) {
    $('#modalEvidencias').modal('show');
  });

  function cargarListDoc() {
    $.ajax({
      type: 'post',
      url: 'modelos/compras.modelo.php',
      data: {
        ajaxservice: 'loadData'
      },
      dataType: "json",
      success: function(respuesta) {
        $('#tbDocPagos tbody').empty();
        if (respuesta && respuesta.length > 0) {
          $.each(respuesta, function(index, registro) {
            var fila = '<tr>' +
              '<td>' + registro.id_compra + '</td>' +
              '<td>' + registro.fecha_registro + '</td>' +
              '<td>' + registro.nombrusarcobro + '</td>' +
              '<td>';
            var doc1 = registro.doc1;
            if (doc1) {
              fila += '<a href="' + doc1 + '" target="_blank">  <i class="fa fa-file"> </i></a> <br>';
            } else {
              fila += '<i class="fa fa-file text-muted">  </i> <br>';
            }
            fila += '</td>' +
              '<td>';
            var doc2 = registro.doc2;
            if (doc2) {
              fila += '<a href="' + doc2 + '" target="_blank">  <i class="fa fa-file"> </i></a> <br>';
            } else {
              fila += '<i class="fa fa-file text-muted">  </i> <br>';
            }
            fila += '</td>' +
              '<td>';
            var doc3 = registro.doc3;
            if (doc3) {
              fila += '<a href="' + doc3 + '" target="_blank">  <i class="fa fa-file"> </i></a> <br>';
            } else {
              fila += '<i class="fa fa-file text-muted">  </i> <br>';
            }
            fila += '</td>' +
              '</tr>';
            $('#tbDocPagos tbody').append(fila);
          })

        }

      }
    });
  };



  function calctotal() {

    console.log("calcular el total");

    var total = 0;
    var inaf = 0;
    var grav = 0;
    var igv = 0;

    // Itera sobre todas las filas de la tabla
    document.querySelectorAll('.lnitem').forEach(function(tol) {
      let cantidad = parseFloat(tol.querySelector('input[name*="[cantidad]"]').value) || 0;
      let valor = parseFloat(tol.querySelector('input[name*="[valor]"]').value) || 0;
      let totalInput = tol.querySelector('.totalines');
      let checkboxIGV = tol.querySelector('.verifigv');

      let totalFila = cantidad * valor;

      // Si el checkbox está marcado, se aplica IGV
      if (checkboxIGV.checked) {
        totalFila *= 1.18; // Aplica el 18% de IGV
        grav += totalFila / 1.18; // Guarda la base imponible
      } else {
        inaf += totalFila; // Guarda como inafecto si no tiene IGV
      }

      totalInput.value = totalFila.toFixed(4); // Actualiza el campo 'Total' de la fila
      total += totalFila; // Suma al total general
    });

    // Calcula el IGV total
    igv = total - inaf - grav;

    // Actualiza los valores en la tabla
    console.log(total);
    console.log(inaf);
    console.log(grav);
    console.log(total);
    console.log(igv);

    document.querySelector('#total_compra').value = total.toFixed(4);
    document.querySelector('#importeTotalTabla').textContent = total.toFixed(4);
    document.querySelector('#importeinafectas').textContent = inaf.toFixed(4);
    document.querySelector('#importegravadas').textContent = grav.toFixed(4);
    document.querySelector('#importeigv').textContent = igv.toFixed(4);

    document.querySelector('#total_igv').value = igv.toFixed(4);
    document.querySelector('#total_inafecto').value = inaf.toFixed(4);
    document.querySelector('#total_gravado').value = grav.toFixed(4);
  }

  function nwlineitem(prm) {
    if (document.querySelector('#tboDyPreventa').lastChild) {
      let lastid = document.querySelector('#tboDyPreventa').lastChild.getAttribute("id");
      let disp = lastid.split('_');
      var index = parseInt(disp[1]) + 1;
    } else {
      var index = 1;
    }
    let tr = document.createElement("tr");
    tr.classList = "lnitem"
    tr.id = "lbl_" + index
    let td1 = document.createElement("td");
    let input1 = document.createElement("input");
    input1.required = true;
    input1.classList = "form-control input-sm";
    input1.type = "text";
    input1.name = `item[${index}][descripcion]`;
    let input2 = document.createElement("input");
    input2.type = "number";
    input2.name = `item[${index}][cantidad]`;
    input2.step = `0.0001`;
    input2.classList = "form-control input-sm";
    input2.addEventListener('change', function() {
      if (input3.value.length > 0) {
        input4.value = parseFloat(input2.value * input3.value).toFixed(4);
        calctotal()
      }
    })

    let input3 = input2.cloneNode(true)
    input3.name = `item[${index}][valor]`;
    input3.step = `0.0001`;
    input3.addEventListener('change', function() {
      if (input2.value.length > 0) {
        input4.value = parseFloat(input2.value * input3.value).toFixed(4);
        calctotal()
      }
    })
    input3.addEventListener('focusout', function() {
      this.value = parseFloat(this.value).toFixed(4);
    })
    let input4 = input2.cloneNode(true)
    input4.name = `item[${index}][total]`;
    input4.step = `0.0001`;
    input4.classList = "form-control input-sm totalines";
    input4.addEventListener('change', function() {
      if (input2.value.length > 0) {
        input3.value = parseFloat(this.value / input2.value).toFixed(4);
        calctotal()
      }
    })
    input4.addEventListener('focusout', function() {
      this.value = parseFloat(this.value).toFixed(4);
    })

    let select = document.createElement("select");
    select.classList = "form-control"
    select.name = `item[${index}][tipo_producto]`;
    let opt1 = document.createElement("option");
    opt1.value = "PRODUCTO"
    opt1.textContent = "PROD"
    let opt2 = document.createElement("option");
    opt2.value = "SERVICIO"
    opt2.textContent = "SERV"
    select.appendChild(opt1)
    select.appendChild(opt2)

    let select2 = document.createElement("select");
    select2.classList = "form-control"
    select2.name = `item[${index}][tipo_medida]`;
    let op1 = document.createElement("option");
    op1.value = "NIU"
    op1.textContent = "UNIDAD"
    let op2 = document.createElement("option");
    op2.value = "KGM"
    op2.textContent = "KILOS"
    let op3 = document.createElement("option");
    op3.value = "BJ"
    op3.textContent = "BALDE"
    let op4 = document.createElement("option");
    op4.value = "BX"
    op4.textContent = "CAJA"
    let op5 = document.createElement("option");
    op5.value = "DZN"
    op5.textContent = "DOCENA"
    let op6 = document.createElement("option");
    op6.value = "LTR"
    op6.textContent = "LITRO"
    let op7 = document.createElement("option");
    op7.value = "ONZ"
    op7.textContent = "ONZAS"
    let op8 = document.createElement("option");
    op8.value = "GAL"
    op8.textContent = "GALON"
    let op9 = document.createElement("option"); // Nueva opción
    op9.value = "MTS"
    op9.textContent = "METROS"

    select2.appendChild(op1)
    select2.appendChild(op2)
    select2.appendChild(op3)
    select2.appendChild(op4)
    select2.appendChild(op5)
    select2.appendChild(op6)
    select2.appendChild(op7)
    select2.appendChild(op8)
    select2.appendChild(op9) // Añadido al select2

    let td2 = document.createElement("td");
    let td3 = document.createElement("td");
    let td4 = document.createElement("td");
    let td5 = document.createElement("td");
    let td6 = document.createElement("td");
    let td7 = document.createElement("td");
    let td8 = document.createElement("td");

    td1.setAttribute("colspan", 2)
    td1.appendChild(select)

    td2.appendChild(input1.cloneNode(true))
    td3.appendChild(select2)
    td4.appendChild(input2)
    td5.appendChild(input3)
    td6.appendChild(input4)
    let input5 = document.createElement("input")
    input5.type = "checkbox";
    input5.classList = "verifigv";
    input5.name = `item[${index}][igv]`;
    input5.required = false;
    input5.addEventListener('change', (event) => {
      calctotal()
    })
    td7.appendChild(input5)

    tr.append(td1);
    tr.append(td2);
    tr.append(td3);
    tr.append(td4);
    tr.append(td5);
    tr.append(td6);
    tr.append(td7);
    tr.append(td8);
    if (!prm) {
      let tdn = document.createElement("td");
      let ii = document.createElement("i");
      ii.classList = "fa fa-close text-danger delitem"
      ii.addEventListener('click', function() {
        tr.remove();
        calctotal()
      });
      tdn.appendChild(ii);
      tr.append(tdn);
    }
    document.querySelector('#tboDyPreventa').append(tr);
  }

  function nwlineitem__(prm) {
    if (document.querySelector('#tboDyPreventa').lastChild) {
      let lastid = document.querySelector('#tboDyPreventa').lastChild.getAttribute("id");
      let disp = lastid.split('_');
      var index = parseInt(disp[1]) + 1;
    } else {
      var index = 1;
    }
    let tr = document.createElement("tr");
    tr.classList = "lnitem"
    tr.id = "lbl_" + index
    let td1 = document.createElement("td");
    let input1 = document.createElement("input");
    input1.required = true;
    input1.classList = "form-control input-sm";
    input1.type = "text";
    input1.name = `item[${index}][descripcion]`;
    let input2 = document.createElement("input");
    input2.type = "number";
    input2.name = `item[${index}][cantidad]`;
    input2.step = `0.0001`;
    input2.classList = "form-control input-sm";
    input2.addEventListener('change', function() {
      if (input3.value.length > 0) {
        input4.value = parseFloat(input2.value * input3.value).toFixed(4);
        calctotal()
      }
    })

    let input3 = input2.cloneNode(true)
    input3.name = `item[${index}][valor]`;
    input3.step = `0.0001`;
    input3.addEventListener('change', function() {
      if (input2.value.length > 0) {
        input4.value = parseFloat(input2.value * input3.value).toFixed(4);
        calctotal()
      }
    })
    input3.addEventListener('focusout', function() {
      this.value = parseFloat(this.value).toFixed(4);
    })
    let input4 = input2.cloneNode(true)
    input4.name = `item[${index}][total]`;
    input4.step = `0.0001`;
    input4.classList = "form-control input-sm totalines";
    input4.addEventListener('change', function() {
      if (input2.value.length > 0) {
        input3.value = parseFloat(this.value / input2.value).toFixed(4);
        calctotal()
      }
    })
    input4.addEventListener('focusout', function() {
      this.value = parseFloat(this.value).toFixed(4);
    })

    let select = document.createElement("select");
    select.classList = "form-control"
    select.name = `item[${index}][tipo_producto]`;
    let opt1 = document.createElement("option");
    opt1.value = "PRODUCTO"
    opt1.textContent = "PROD"
    let opt2 = document.createElement("option");
    opt2.value = "SERVICIO"
    opt2.textContent = "SERV"
    select.appendChild(opt1)
    select.appendChild(opt2)

    let select2 = document.createElement("select");
    select2.classList = "form-control"
    select2.name = `item[${index}][tipo_medida]`;
    let op1 = document.createElement("option");
    op1.value = "NIU"
    op1.textContent = "UNIDAD"
    let op2 = document.createElement("option");
    op2.value = "KGM"
    op2.textContent = "KILOS"
    let op3 = document.createElement("option");
    op3.value = "BJ"
    op3.textContent = "BALDE"
    let op4 = document.createElement("option");
    op4.value = "BX"
    op4.textContent = "CAJA"
    let op5 = document.createElement("option");
    op5.value = "DZN"
    op5.textContent = "DOCENA"
    let op6 = document.createElement("option");
    op6.value = "LTR"
    op6.textContent = "LITRO"
    let op7 = document.createElement("option");
    op7.value = "ONZ"
    op7.textContent = "ONZAS"
    let op8 = document.createElement("option");
    op8.value = "GAL"
    op8.textContent = "GALON"

    select2.appendChild(op1)
    select2.appendChild(op2)
    select2.appendChild(op3)
    select2.appendChild(op4)
    select2.appendChild(op5)
    select2.appendChild(op6)
    select2.appendChild(op7)
    select2.appendChild(op8)

    let td2 = document.createElement("td");
    let td3 = document.createElement("td");
    let td4 = document.createElement("td");
    let td5 = document.createElement("td");
    let td6 = document.createElement("td");
    let td7 = document.createElement("td");
    let td8 = document.createElement("td");

    td1.setAttribute("colspan", 2)
    td1.appendChild(select)

    td2.appendChild(input1.cloneNode(true))
    td3.appendChild(select2)
    td4.appendChild(input2)
    td5.appendChild(input3)
    td6.appendChild(input4)
    let input5 = document.createElement("input")
    input5.type = "checkbox";
    input5.classList = "verifigv";
    input5.name = `item[${index}][igv]`;
    input5.required = false;
    input5.addEventListener('change', (event) => {
      calctotal()
      /*if (event.currentTarget.checked) {
        console.log('checked');
      } else {
        console.log('no checked');
      }*/
    })
    td7.appendChild(input5)


    tr.append(td1);
    tr.append(td2);
    tr.append(td3);
    tr.append(td4);
    tr.append(td5);
    tr.append(td6);
    tr.append(td7);
    tr.append(td8);
    if (!prm) {
      let tdn = document.createElement("td");
      let ii = document.createElement("i");
      ii.classList = "fa fa-close text-danger delitem"
      //div.appendChild(ii);
      ii.addEventListener('click', function() {
        tr.remove();
        calctotal()
      });
      tdn.appendChild(ii);
      tr.append(tdn);
    }
    document.querySelector('#tboDyPreventa').append(tr);

  }
  document.querySelector('#nwlineitem').addEventListener('click', function() {
    nwlineitem(false)
  });
  formularioNewCompra.onsubmit = function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    var modalEvidencias = document.getElementById('modalEvidencias');
    var fileInputs = modalEvidencias.querySelectorAll('input[type="file"]');

    fileInputs.forEach(function(input) {
      for (var i = 0; i < input.files.length; i++) {
        formData.append(input.name, input.files[i]);
      }
    });
    $.ajax({
      type: 'post',
      url: 'controladores/compras.controlador.php',
      // data: $('#formularioNewCompra').serialize(),
      data: formData,
      processData: false,
      contentType: false,
      success: function(respuesta) {
        console.log(respuesta);
        if (respuesta.success) {
          swal(
            'Bien',
            respuesta.msg,
            'success'
          )
          window.location.reload();
        } else {
          swal({
            icon: 'error',
            title: 'Error de registro',
            text: 'La serie y correlativo ya fue registrada anteriormente para el mismo proveedor'
          })
        }
      }
    });
  }
  let indexFocus = -1;
  var campoDbusqueda = document.querySelector(".campo_de_busqueda")
  campoDbusqueda.addEventListener("input", function() {
    const consultame = this.value;
    if (!consultame) return false;

    cerrarLista();
    const divList = document.createElement("div");
    divList.setAttribute("id", this.id + "-lista-autocompletar");
    divList.setAttribute("class", "lista-autocompletar-items");
    this.parentNode.parentNode.appendChild(divList);

    let moddule = campoDbusqueda.getAttribute('module')
    let did = campoDbusqueda.getAttribute('did')
    // AJAX
    $.ajax({
      type: 'post',
      url: 'controladores/compras.controlador.php',
      data: `term=${consultame}&accion=bproveedor`,
      success: function(respuesta) {
        respuesta.data.forEach(item => {
          const elementoLista = document.createElement("div");
          elementoLista.innerHTML = `<span>${item.ruc} - ${item.name}</span>`;
          //elementoLista.innerHTML = '<span>'+item.documento_cliente+' - '+item.nombre_completo_cliente+'</span>';
          elementoLista.setAttribute("class", "respuesta_item");
          elementoLista.setAttribute("data-id", item.id);
          elementoLista.setAttribute("data-ruc", item.ruc);
          elementoLista.setAttribute("data-name", item.name);
          elementoLista.addEventListener('click', function() {
            addSelectedItem(item);
            return false;
          });
          divList.appendChild(elementoLista);
        });
      }
    });
  });
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

  document.addEventListener('click', function() {
    cerrarLista()
  })

  function seleccionar(lista, indexFocus) {
    if (!lista || indexFocus == -1) return false;
    lista.forEach(x => {
      x.classList.remove('autocompletar-active')
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
  //}

  function addSelectedItem(item) {
    document.querySelector(".campo_de_busqueda").value = `${item.ruc} - ${item.name}`
    document.querySelector(".id_proveedor").value = item.id
  }
</script>
<style media="screen">
  .modal-fullscreen {
    width: 100%;
    max-width: none;
    margin: 0;
  }

  .modal-fullscreen .modal-content {
    height: 100vh !important;
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
  function cambiarMonedaActualizarTipoCambio(moneda) {
    const simbolo = moneda === 'USD' ? '$' : 'S/';
    document.querySelectorAll(".simboloMoneda").forEach(el => el.textContent = simbolo);

    if (moneda === 'USD') {
      obtenerTipoDeCambio();
    } else {
      document.getElementById('tipoCambio').value = ''; // Limpiar el input si no es USD
    }
  }

  function obtenerTipoDeCambio() {
    /*asiganar correlativo y serie*/
    var tipomona = $("#tipoMoneda").val();


    if (tipomona === 'PEN') {
      return false;
    }
    var fecha_contabilizacion_compra = $("#fecha_contabilizacion_compra").val();
    var accion = "tipo_de_cambio_dolares";

    var dataen =
      'fecha_contabilizacion_compra=' + fecha_contabilizacion_compra +
      '&accion=' + accion;
    $.ajax({
      type: 'post',
      url: 'controladores/compras.controlador.php',
      data: dataen,

      success: function(resp) {

        $("#tipoCambio").val(resp);
      }
    });

  }

  // Inicialización inicial para establecer el símbolo de moneda correcto
  document.addEventListener('DOMContentLoaded', function() {
    cambiarMonedaActualizarTipoCambio(document.getElementById('tipoMoneda').value);
  });


  // Deshabilita el select "tipoMoneda" inicialmente
  document.getElementById('tipoMoneda').disabled = true;

  // Habilita el select "tipoMoneda" cuando se selecciona una fecha en el input "fecha_contabilizacion_compra"
  document.getElementById('fecha_contabilizacion_compra').addEventListener('change', function() {
    if (this.value) {
      document.getElementById('tipoMoneda').disabled = false;
    } else {
      document.getElementById('tipoMoneda').disabled = true;
    }
  });
</script>