<script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.js" integrity="sha512-Fd3EQng6gZYBGzHbKd52pV76dXZZravPY7lxfg01nPx5mdekqS8kX4o1NfTtWiHqQyKhEGaReSf4BrtfKc+D5w==" crossorigin="anonymous"></script>

<style type="text/css">
  input:focus {
    /* Opcion 1 */
    outline: 0;
    /* Opcion 2 */
    outline: none;
  }

  #robotito {
    width: 200px;
    height: 250px;
    position: relative;
    animation-duration: 4s;
    top: <?php echo (rand(10, 200)); ?>;
    left: <?php echo (rand(-150, 200)); ?>;
  }

  #cargadorRobot {
    width: 200px;
    height: 250px;
    position: relative;
    animation-name: example;
    animation-duration: 4s;
    top: <?php echo (rand(50, 150)); ?>;
    left: <?php echo (rand(-150, 100)); ?>;
  }

  @keyframes example {
    0% {
      left: <?php echo (rand(0, 100)); ?>;
      top: <?php echo (rand(0, 200)); ?>;
    }

    25% {
      left: -150px;
      top: <?php echo (rand(0, 200)); ?>;
    }

    50% {
      left: <?php echo (rand(0, 100)); ?>;
      top: <?php echo (rand(0, 200)); ?>;
    }

    75% {
      left: <?php echo (rand(0, 200)); ?>;
      top: <?php echo (rand(0, 200)); ?>;
    }

    100% {
      left: <?php echo (rand(0, 200)); ?>;
      top: <?php echo (rand(50, 150)); ?>;
    }
  }

  .painttr {
    background: rgba(99, 160, 60, 0.45) !important;
  }

  input[type=number]::-webkit-inner-spin-button,
  input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  input[type=number] {
    -moz-appearance: textfield;
  }
</style>
<div class="content-wrapper" id="CuerpasoDeVenta">
  <section class="content">
    <div class="row">
      <!--=====================================
      EL FORMULARIO
      ======================================-->
      <div class="col-lg-5 ">
        <div class="box box-success">
          <div class="box-header with-border"></div>
          <form role="form" id="formularioNewVenta">
            <div class="box-body">
              <div class="row">
                <div class="col-lg-12 text-right">
                  <span style="color: #c3c3c3 !important">
                    &nbsp;<i class="fa fa-minus-square-o" aria-hidden="true" onclick="ocultate__ ('.elementHeaderFact')"></i>
                    &nbsp;<i class="fa fa-plus-square-o" aria-hidden="true" onclick="mostrate__('.elementHeaderFact')"></i>&nbsp;
                  </span>
                </div>
                <div class="col-lg-6 elementHeaderFact">
                  <span style="font-size: 13px">
                    Fecha de Registro: <b id="idfFechaEmitido" contenteditable="true"><?php echo date("Y-m-d"); ?></b><br>
                    Fecha de Vencimiento: <b id="idFFechaVencimiento" contenteditable="true"><?php echo date("Y-m-d"); ?></b><br>
                    Tipo de moneda: <b>Soles</b><br>
                  </span>
                </div>
                <div class="col-lg-6 elementHeaderFact text-right">
                  <span id="guardar_factura_directa">...</span>
                  <div class="input-group" style="width: 244px;margin-top: 5px">
                    <select id="selectTipoComprobante" class="form-control" name="selectTipoComprobante" required style="background: white !important;color: #ff0000 !important;border: 1px solid #c3c3c3 !important;justify-content: center !important;font-weight: 900;font-size: 13px">
                      <option disabled selected="selected">TIPO DE COMPROBANTE</option>
                      <option id="BLT" value="BLT">BOLETA DE VENTA ELECTRÓNICA</option>
                      <option id="FCT" value="FCT">FACTURA DE VENTA ELECTRÓNICA</option>
                    </select>
                    <p style="width: 244px;text-align: center;font-size: 14px; border: 1px solid #c3c3c3;color: #c3c3c3;display: none;">Nro. <span id="serie_correlativo"></span>
                    </p>
                  </div>
                </div>
              </div>

              <div class="row elementHeaderFact">
                <div class="col-lg-12">
                  <article class="d-none" id="datosCliente" style="margin-top: 10px;font-size: 15px;">
                          &nbsp;&nbsp;<b id="tipoCliente" title="Cliente"><i class="fa fa-users"></i></b>&nbsp;
                          <span id="btnDataClientes" style="margin-right: 18px;border: none;background: white;width: 560px">| Buscar la razón social o nombre, según corresponda...</span>
                              <input list="slctDataClientes" id="slctDataClientesInput"  style="border: 1px solid white;width: 490px;border-bottom:  1px solid #c3c3c3"   required>
                              <datalist id="slctDataClientes">
                               
                              </datalist>
                          <br>
                          <button style="float: right;margin-right: 18px" type="button" class="btn btn-default btn-xs" onclick="window.open('clientes', '_blank');">Agregar cliente</button>
                          &nbsp;&nbsp;<b id="tipoDocu">RUC</b>&nbsp;
                          &nbsp;<input autocomplete="off" style="border: none;font-size: 14px;width: 150px;padding-left: 10px;border-bottom:  1px solid #c3c3c3" type="text" id="inputDocuIdentidad" autofocus="true" >
                          <br>
                          &nbsp;&nbsp;<b id="direccionClient" title="Dirección">DIRECCIÓN</b>&nbsp;<input  id="idfDireccion" style="border: none;font-size: 14px;width: 400px;padding-left: 10px;border-bottom:  1px solid #c3c3c3" type="text" >
                  </article><hr>
                </div>
              </div>




              <div class="row ">
                <div class="col-lg-12">
                  <span style="float: left;margin-bottom: 2px">
                    <button id="delete-row" style="margin-right: 2px;font-weight: 900" type="button" class="btn btn-default btn-xs delete-row" disabled><img src="https://i1.wp.com/www.allaboutlean.com/wp-content/uploads/2015/03/Broom-Icon.png?fit=500%2C500&ssl=1" style="width: 20px"> Eliminar fila</button>
                    <button disabled id="btnPrint" data-target="#myModal" data-toggle="modal"  style="margin-right: 2px;font-weight: 900;background: white" type="button" class="btn btn-default btn-xs"><img src="https://cdn0.iconfinder.com/data/icons/future-supermarket/50/4-512.png" style="width: 20px"> Imprimir</button>
                    <button disabled id="btnPrintpdf"   style="margin-right: 2px;font-weight: 900;background: white" type="button" class="btn btn-default btn-xs"><img src="vistas/img/plantilla/pdf.png" style="width: 20px" > PDF</button>
                    <button disabled style="margin-right: 2px;font-weight: 900;background: white" type="submit" class="btn btn-default btn-xs" id="btnGuardarVenta"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRBSqtVpR3OGyb__AIYk3VX6cdLoVKFH5t9EJmOdrgR4IupzCxq&s" style="width: 20px"> Guardar</button>
                  </span>
                  <span style="float: right;color: #c3c3c3 !important">
                    &nbsp;<i class="fa fa-minus-square-o" aria-hidden="true" onclick="ocultate__ ('.elementTableFact')"></i>
                    &nbsp;<i class="fa fa-plus-square-o" aria-hidden="true" onclick="mostrate__('.elementTableFact')"></i>&nbsp;
                  </span>
                  <table class="table table-bordered elementTableFact" id="idTableSales">
                    <thead>
                      <tr>
                        <th style="padding: 2px 10px !important;font-weight: 400"></th>
                        <th style="padding: 2px 10px !important;font-weight: 400;width: 100px"> CÓDIGO</th>
                        <th style="padding: 2px 10px !important;font-weight: 400">DESCRIPCIÓN</th>
                        <th style="padding: 2px 10px !important;font-weight: 400">CANTIDAD</th>
                        <th style="padding: 2px 10px !important;font-weight: 400" title="Valor unitario">VALOR</th>
                        <th style="padding: 2px 10px !important;font-weight: 400">TOTAL</th>
                      </tr>
                    </thead>
                    <tbody id="tboDyPreventa">
                    </tbody>
                    <thead>
                      <tr style="background: #fcfcfc; text-align: right;">
                        <td class="theadTable" colspan="5" style="color: #5e5e5e !important">IMPORTE TOTAL</td>
                        <td class="theadTable" style="color: #5e5e5e !important" id="importeTotalTabla">0.00</td>
                      </tr>
                    </thead>
                  </table>
                  <hr>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 text-right">
                  <span style="color: #c3c3c3 !important">
                    &nbsp;<i class="fa fa-minus-square-o" aria-hidden="true" onclick="ocultate__ ('.elementFootFact')"></i>
                    &nbsp;<i class="fa fa-plus-square-o" aria-hidden="true" onclick="mostrate__('.elementFootFact')"></i>&nbsp;
                  </span>
                </div>
                <div class="col-lg-6 text-left elementFootFact" style="padding-left: 20px">
                  <article class="d-none" style="width: 98%;margin-top: 10px;background: #00C865;border-radius: 7px;" id="tipoPagu">
                    <center>
                      <div class="input-group">
                        <select id="selectMetodoPago" class="form-control" name="nuevoMetodoPago" required="" style="background: #00C865 !important;color: white !important;border: 1px solid #00C865 !important">
                          <!-- <option style="background: white;color: black" value="">Método de pago</option> -->
                          <option style="background: white;color: black" value="Pendiente">Pago pendiente</option>
                          <!-- <option style="background: white;color: black" value="Efectivo">Efectivo</option>
                          <option style="background: white;color: black" value="TC">Transferencia</option>
                          <option style="background: white;color: black" value="TD">POS</option>
                          <option style="background: white;color: black" value="TCE">Efectivo y transferencia</option>
                          <option style="background: white;color: black" value="TDE">Efectivo y POS</option> -->
                        </select>
                      </div>
                    </center>
                  </article>
                  <article id="dinerRecibido" class="inputCobrar d-none" style="width: 96%;margin-top: 10px;border: 1px solid #DDD;font-size: 18px" title="Dinero recibido">
                    &nbsp; S/&nbsp;<input    class="inpCobration" style="border: none;font-size: 18px;width: 80%" type="text" id="inputEfectivo">
                  </article>
                  <article id="vueltoDeCobro" class="inputCobrar d-none" style="width: 96%;margin-top: 10px;border: 1px solid #DDD;font-size: 18px;background: #eee !important" title="Vuelto">
                    &nbsp; S/&nbsp;<input class="inpCobration" style="border: none;font-size: 18px;width: 80%;background: #eee !important" type="number" id="idvueltoDeCobro" readonly="">
                  </article>
                  <article id="codigoTransaccion" class="inputCobrar d-none" style="width: 96%;margin-top: 10px;border: 1px solid #DDD;font-size: 18px;" title="Código de transacción">
                    &nbsp; <i class="fa fa-credit-card-alt" aria-hidden="true"></i>&nbsp;<input class="inpCobration" style="border: none;font-size: 18px;width: 80%;" id="idtarjcodeoperacion" type="text">
                  </article>
                  
                  <br><br>
                    <!-- Nuevo DIV para selección de porcentaje de detracción -->
                    <div style="width: 98%; margin-top: 10px; background: #fff; border: 1px solid #c3c3c3; border-radius: 7px; padding: 10px;">
                        <label for="selectDetraccion" style="font-size: 14px; color: #000;">Porcentaje de detracción:</label>
                        <select id="selectDetraccion" class="form-control" name="selectDetraccion" required style="background: #fff !important; color: #000 !important; border: 1px solid #c3c3c3 !important; font-size: 14px;">
                            <option value="" disabled selected>Seleccione un porcentaje</option>
                            <option value="0">0%</option>
                            <option value="2">2%</option>
                            <option value="4">4%</option> 
                            <option value="10">10%</option>             
                            <option value="12">12%</option> 
                        </select>   
                    </div>

                </div>


                <div class="col-lg-6 text-right elementFootFact" style="padding-right: 20px;margin-top: 10px">
                  <div id="spamTipoOperacion" class="d-none" style="text-align: left;background: #5e5e5e; padding: 20px 30px;color: white;border-radius: 10px">
                    <center>
                      <h4 style="margin-top: -4px;">TIPO DE OPERACIÓN</h4>
                    </center>
                    <div class="form-check form-check-inline labelradioso">
                      <input class="form-check-input" type="radio" name="rdbTipoOperacion" id="opGravada" value="opGravada">
                      <label class="form-check-label" for="opGravada">Op. Gravada</label><span style="font-size: 16px;font-weight: 400 !important;    float: right;margin-top: 1.3px" id="idOpGravada">0.00</span>
                    </div>
                    <div class="form-check form-check-inline labelradioso">
                      <input class="form-check-input" type="radio" name="rdbTipoOperacion" id="opExonerada" value="opExonerada">
                      <label class="form-check-label" for="opExonerada">Op. Exonerada</label><span style="font-size: 16px;font-weight: 400 !important;    float: right;margin-top: 1.3px" id="idExonerada">0.00</span>
                    </div>
                    <div class="form-check form-check-inline labelradioso">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="form-check-label" for="rbPagoM">IGV</label><span style="font-size: 16px;font-weight: 400 !important;    float: right;margin-top: 1.5px" id="idIgv">0.00</span>
                    </div>
                    <div class="form-check form-check-inline labelradioso">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="form-check-label" for="rbPagoM">TOTAL</label><span style="font-size: 18px;font-weight: 200 !important;    float: right;margin-top: -4.5px" id="idPagoT">0.00
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">

            </div>
          </form>
        </div>
      </div>




      <!--=====================================
      LA TABLA DE PRODUCTOS
      ======================================-->
      <div class="col-lg-7 ">
        <div class="box box-warning" style="border-top: 3px solid #e5db51 !important">
          <div class="box-header with-border">
            <div class="row">
              <div class="col-lg-6">
                <span style="float: left;display: flex;">
                  <!-- NOTE: BOTON QUE DEBE SER ACTIVADO PARA CUANDO YA SE TENGA LA REPORTERIA -->
                  <!-- <div class="dropdown" title="Gestión de caja">
                    <button style="background: #f4f4f4;border: 1px solid #f4f4f4;color: #5e5e5e" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-usd" aria-hidden="true"></i></button>
                    <ul class="dropdown-menu">
                      <li><a href="tostado"><i class="fa fa-chevron-right" aria-hidden="true"></i> Dinero con que inicio caja</a></li>
                      <li><a href="liberar-productos-bpm" target="_blank"><i class="fa fa-chevron-right" aria-hidden="true"></i> Total recaudado hoy</a></li>
                    </ul>
                  </div> -->&nbsp;
                  <button title="Historial facturación electrónica" style="border: 1px solid #f4f4f4;color: #5e5e5e;background: #f4f4f4;width: 31px;text-align: center;padding-top: 8px;border-radius: 3px" onclick="window.open('facturacion', '_blank');">
                    <i class="fa fa-th-list" aria-hidden="true"></i>
                  </button>
                  <button title="Crear nueva venta" style="border: 1px solid #f4f4f4;color: #5e5e5e;background: #f4f4f4;width: 31px;text-align: center;padding-top: 8px;border-radius: 3px" onclick="location.reload();">
                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                  </button>
                </span>
                <br>
                &nbsp;&nbsp;&nbsp;
                <span class="ClassdmItemVenta" style="background: #3c8dbc; color: white;padding: 2px 10px;border-radius: 10px">
                  <input disabled type="radio" id="contactChoice1" name="IddmItemVenta" value="renderDmProductos" class="rdbtSinComprobante">
                  <label for="contactChoice1" class="rdbtSinComprobante" style="font-size: 13px">Refresh item</label>
                </span>
                &nbsp;&nbsp;&nbsp;
              </div>
              <div class="col-lg-6">
                <br>
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search" name="search" id="search">
                  <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box-body">
            <table class="table table-bordered table-striped dt-responsive">
              <thead>
                <tr>
                  <th>Imagen</th>
                  <th>Código</th>
                  <th>Descripcion</th>
                  <th style="width: 100px">Disponible</th>
                  <th>Precio</th>
                  <th>Cantidad</th>
                </tr>
              </thead>
              <tbody id="tbodyDmItemID">
                <tr>
                  <td style="background: #fefefe;text-align: center;height: 486px" colspan="6">
                    <span>
                      <img id='robotito' src="vistas/img/robot/robot_buscador.jpg" style="width: 300px !important;">
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!--=====================================
MODAL
======================================-->
<script type="text/javascript">






  $("#formularioNewVenta").attr('autocomplete', 'off');


  function ocultate__(idDiv) {
    var idDiv = idDiv;
    $(idDiv).addClass("d-none");
  }



  function mostrate__(idDiv) {
    var idDiv = idDiv;
    $(idDiv).removeClass("d-none");
  }

  


  $("#selectTipoComprobante").change(function() {

    $('#slctDataClientesInput').val('');
    $('#idfDireccion').val('');

    var importeTotalTabla = $('#importeTotalTabla').text();
    if (importeTotalTabla == '0.00') {
      // statement
      $('#opExonerada,#contactChoice1').trigger('click');
    }

    // ACA SE ACTIVA TIPO DE OPERACION
    $("#datosCliente,#spamTipoOperacion").removeClass("d-none");
    var selectTipoComprobante = $("#selectTipoComprobante").val();
    switch (selectTipoComprobante) {
      case "BLT":
        // statements_1
        $('#tipoDocu').text("DNI");
        // $('#tipoCliente').text("NOMBRE");
        $('#inputDocuIdentidad,#idfNombreCliente').val('');
        $('#inputDocuIdentidad').focus();
        var tipo_documento = "03";
        loadClientes(tipo_documento);
        break;
        case "FCT":
        // statements_1 selected="selected"
        $('#tipoDocu').text("RUC");
        // $('#tipoCliente').text("RAZÓN SOCIAL");
        $('#inputDocuIdentidad,#idfNombreCliente').val('');
        $('#inputDocuIdentidad').focus();
        var tipo_documento = "01";
        loadClientes(tipo_documento);
        break;
      }

      var accion = "ult_correlativo";
      var dataen =
      'tipo_documento=' + tipo_documento +
      '&accion=' + accion;

      $.ajax({
        type: 'post',
        url: 'controladores/new-venta.controlador.php',
        data: dataen,

        success: function(resp) {
          $("#serie_correlativo").html(resp);
        }
      });
      return false;

    });


  $("input[name='IddmItemVenta']").click(function() {
    $("#robotito").addClass("d-none");
    $("#tbodyDmItemID").html('<tr><td style="background: #fefefe;text-align: center;height: 486px" colspan="6"><span ><img id="cargadorRobot"  src="vistas/img/robot/robot_buscador.gif" style="width: 310px !important;"></span></td></tr>');



    var tipoDatoMaestro = $("input[name='IddmItemVenta']:checked").val();
    var accion = "item__para_la_venta";

    var dataen =
    'tipoDatoMaestro=' + tipoDatoMaestro +
    '&accion=' + accion;

    $.ajax({
      type: 'post',
      url: 'controladores/new-venta.controlador.php',
      data: dataen,

      success: function(resp) {
        $("#tbodyDmItemID").html(resp);
      }
    });
    // return false;
  });

  function pinta_filas(idBpmv) {
    var idBpm = idBpmv;
    $(".trTable").removeClass("painttr");
    $("#" + idBpm).addClass("painttr");
  }


  $("#slctDataClientesInput").keydown(function(objEvent) {
    if (objEvent.keyCode == 8) {
      // statement
      $('#slctDataClientesInput').val('');
      $('#idfDireccion').val('');
      $('#inputDocuIdentidad').val('');
    }
  });



  $("#slctDataClientesInput").change(function() {

    

    var g = $("#slctDataClientesInput").val();
    var docuIdentidd = $('#slctDataClientes').find('option').filter(function() {
      return $.trim($(this).text()) === g;
    }).attr('documento');
    var pk = $('#slctDataClientes').find('option').filter(function() {
      return $.trim($(this).text()) === g;
    }).attr('pk');
    var direccion = $('#slctDataClientes').find('option').filter(function() {
      return $.trim($(this).text()) === g;
    }).attr('direccion');

    var tipoDocu = $('#serie_correlativo').text()[0];
    var comprobantEtik = $('select[name=selectTipoComprobante] option').filter(':selected').text();



    if ((tipoDocu == 'B') && (docuIdentidd.length == '8')) {
      $("#inputDocuIdentidad").val(docuIdentidd);
      $("#idfDireccion").val(direccion);
    } else if ((tipoDocu == 'F') && (docuIdentidd.length == '11')) {
      $("#inputDocuIdentidad").val(docuIdentidd);
      $("#idfDireccion").val(direccion);
    } else {
      alert("El N° identidad " + docuIdentidd + " no procede para una " + comprobantEtik);
      $("#slctDataClientesInput,#inputDocuIdentidad,#idfDireccion").val("");
    }

  });



  function loadClientes(tipoPersona) {
    var tipoPersona = tipoPersona;
    $("#btnDataClientes").addClass("d-none");
    $("#slctDataClientesInput").removeClass("d-none");
    $("#slctDataClientesInput").focus();


    var accion = "load_data_clientes_moali";
    var datita = 'accion=' + accion +
    '&tipoPersona=' + tipoPersona;
    $.ajax({
      type: 'post',
      url: 'controladores/new-venta.controlador.php',
      data: datita,

      success: function(resp) {
        $("#slctDataClientes").html(resp);
      }
    });
  }



  $("input[name=rdbTipoOperacion]").click(function() {
    $('#tipoPagu').removeClass('d-none');
    var tipoOpecion = $('input[name="rdbTipoOperacion"]:checked').val();
    $(".rdbtSinComprobante").prop("disabled", false);
    var importeTotalTabla = parseFloat($("#importeTotalTabla").text());
    switch (tipoOpecion) {
      case "opGravada":
      $('#idExonerada').text('0.00');
      console.log("#############: "+importeTotalTabla);
      $('#idOpGravada').text(importeTotalTabla.toFixed(3));
      $('#idIgv').text((importeTotalTabla * 0.18).toFixed(2));
      $('#idPagoT').text((importeTotalTabla + (importeTotalTabla * 0.18)).toFixed(2));
      break;
      case "opExonerada":
      $('#idExonerada,#idPagoT').text(importeTotalTabla.toFixed(3));
      $('#idIgv,#idOpGravada').text('0.00');
      break;
    }

  });

  var end_sales = [];


  $("select[name=nuevoMetodoPago]").change(function() {
    var importeTotalTabla = parseFloat($("#importeTotalTabla").text());

    if (importeTotalTabla > 0) {
      // statement
      $('#btnGuardarVenta').prop('disabled', false);
    } else {
      // statement
      $('#btnGuardarVenta').prop('disabled', true);
    }

    var tipoDePago = $('select[name=nuevoMetodoPago]').val();
    switch (tipoDePago) {
      case "Efectivo":
      $(".inpCobration").val("");
      $(".inputCobrar").addClass("d-none");
      $('#inputEfectivo').prop('required', true);
      $("#dinerRecibido,#vueltoDeCobro").removeClass("d-none");
      $('#idvueltoDeCobro').val('0.00');
      $('#inputEfectivo').keyup(function(){
          let loquedebocobrar=$("#idPagoT").text();
          $('#idvueltoDeCobro').val(parseFloat(loquedebocobrar));

          let locobrado_efectivo=$("#inputEfectivo").val();
          let vuekito=parseFloat(locobrado_efectivo)-parseFloat(loquedebocobrar);
          $('#idvueltoDeCobro').val(vuekito.toFixed(2));

            if (vuekito>=0) {
              // statement
              console.log('activar boton guardar')
            }
      });

      break;
      case "TC":
      $(".inpCobration").val("");
      $(".inputCobrar").addClass("d-none");
      $('#inputEfectivo').prop('required', false);
      $('#idtarjcodeoperacion').prop('required', true);
      $("#codigoTransaccion").removeClass("d-none");
      break;
      case "TD":
      $(".inpCobration").val("");
      $(".inputCobrar").addClass("d-none");
      $('#inputEfectivo').prop('required', false);
      $('#codigoTransaccion').prop('required', true);
      $("#codigoTransaccion").removeClass("d-none");
      break;
      case "TCE":
      $(".inpCobration").val("");
      $("#dinerRecibido,#codigoTransaccion").removeClass("d-none");
      $('#inputEfectivo,#idtarjcodeoperacion').prop('required', true);
      $('#idvueltoDeCobro').val('0');
      break;
      case "TDE":
      $(".inpCobration").val("");
      $("#dinerRecibido,#codigoTransaccion").removeClass("d-none");
      $('#inputEfectivo,#idtarjcodeoperacion').prop('required', true);
      $('#idvueltoDeCobro').val('0');
      break;
      case "Pendiente":
      $(".inpCobration").val("");
      $(".inputCobrar").addClass("d-none");
      $('#inputEfectivo,#idtarjcodeoperacion').prop('required', false);
      break;

      default:
      swal({
        title: 'Hey',
        text: 'Debes especificar un método de pago',
        timer: 4000
      })
    }
  });



  function pinta_filas_vendidas(idBpmv) {
    var idBpm = idBpmv;
    $("#" + idBpm).addClass("painttr");
  }



  $("#formularioNewVenta").on('submit', function() {
    $("#btnGuardarVenta").remove();
    let idfFechaEmitido = $('#idfFechaEmitido').text();
    let idFFechaVencimiento = $('#idFFechaVencimiento').text();
    let serie_correlativo = $('#serie_correlativo').text();
    let inputDocuIdentidad = $('#inputDocuIdentidad').val();
    let tipoDePago_i = $('select[name=nuevoMetodoPago]').val();
    let inputEfectivo = $('#inputEfectivo').val();
    let idvueltoDeCobro = $('#idvueltoDeCobro').val();
    let idtarjcodeoperacion = $('#idtarjcodeoperacion').val();
    let idOpGravada = $('#idOpGravada').text();
    let idExonerada = $('#idExonerada').text();
    let idIgv = $('#idIgv').text();
    let idPagoT = $('#idPagoT').text();
    let idfDireccion= $('#idfDireccion').val();

    let porcentajeDetraccion = $('#selectDetraccion').val(); // Nueva línea

    let end_sales_i = '[' + end_sales.filter(function() {
      return true
    }) + ']';
    let importeTotalTabla_i = $('#importeTotalTabla').text();


    
    // let slctDataClientes_i =   btoa($('#slctDataClientesInput').val());

    let slctDataClientes_i = btoa(unescape(encodeURIComponent($('#slctDataClientesInput').val())));
    let accion = 'guardar_factura_directa';



    if (importeTotalTabla_i > 0 && slctDataClientes_i.length > 0) {

      var dataen =
                      {idfFechaEmitido:idfFechaEmitido ,
                      idFFechaVencimiento:idFFechaVencimiento ,
                      serie_correlativo:serie_correlativo ,
                      inputDocuIdentidad:inputDocuIdentidad ,
                      tipoDePago_i:tipoDePago_i ,
                      inputEfectivo:inputEfectivo ,
                      idvueltoDeCobro:idvueltoDeCobro ,
                      idtarjcodeoperacion:idtarjcodeoperacion ,
                      idOpGravada:idOpGravada ,
                      idExonerada:idExonerada ,
                      idIgv:idIgv ,
                      idPagoT:idPagoT ,
                      end_sales_i:end_sales_i ,
                      importeTotalTabla_i:importeTotalTabla_i ,
                      slctDataClientes_i:slctDataClientes_i ,
                      idfDireccion:idfDireccion ,
                      porcentajeDetraccion: porcentajeDetraccion, // Nueva línea
                      accion:accion};
      // statement


      $.ajax({
        type: 'post',
        url: 'controladores/new-venta.controlador.php',
        data: dataen,

        success: function(resp) {
          $("#guardar_factura_directa").html(resp);
        }
      });
      return false;
    } else {
      // statement
      alert("Para concluir tu venta debes elegir almenos un producto o servicio ademas tener seccionado un cliente");
    }

    return false;
  });


  $("#inputDocuIdentidad").change(function() {
        var slctDataClientesInput= $('#slctDataClientesInput').val();
        var inputDocuIdentidadv= $('#inputDocuIdentidad').val();
        var tipoDocu= $('#tipoDocu').text();

        
                if (inputDocuIdentidadv.length=='8' && tipoDocu=='DNI' && slctDataClientesInput.length<1 &&  inputDocuIdentidadv!=='00000000') {
                      var request = $.ajax({
                      url: "https://dniruc.apisperu.com/api/v1/dni/"+inputDocuIdentidadv+"?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImFiYWRlc3F1ZW5sZXluZXJAZ21haWwuY29tIn0.NTjj1t6MHEf8-2jIl3LNVF-nnLk1vaEHnmcC06QH54c",
                      method: "GET"
                  });
                  request.done(function( data ) {
                      var name_cli= (data.nombres+' '+data.apellidoPaterno+' '+data.apellidoMaterno).replace(/Ñ/gi,"N");
                      $('#slctDataClientesInput').val(name_cli);
                      $('#idfDireccion').val('No especifica');
                  });
                }else if (inputDocuIdentidadv.length=='11' && tipoDocu=='RUC'  && slctDataClientesInput.length<1) {
                      var request = $.ajax({
                      url: "https://dniruc.apisperu.com/api/v1/ruc/"+inputDocuIdentidadv+"?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImFiYWRlc3F1ZW5sZXluZXJAZ21haWwuY29tIn0.NTjj1t6MHEf8-2jIl3LNVF-nnLk1vaEHnmcC06QH54c",
                      method: "GET"
                  });
                  request.done(function( data ) {
                    
                      $('#slctDataClientesInput').val(data.razonSocial);
                      $('#idfDireccion').val(data.direccion);
                  });
                }else if(inputDocuIdentidadv.length=='8' && tipoDocu=='DNI' && slctDataClientesInput.length<1 &&  inputDocuIdentidadv==='00000000'){
                     $('#slctDataClientesInput').val('Sin especificar');
                      $('#idfDireccion').val('No especifica');
                }
          

  });

</script>





<!-- Modal -->
<div class="modal fade" id="myModal__" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" style="width: 8cm !important;background: white !important">
            <div class="modal-header">
                <button class="close" data-dismiss="modal" type="button">
                    ×
                </button>
                 <!-- <a id="btn-Convert-Html2Image" href="#">Imprimir</a> -->
            </div>
            <div class="modal-body" id="cuerpo_comprobante">
            </div>
            <div class="modal-footer">
                <br><br>
                <!-- <button class="btn btn-default" data-dismiss="modal" type="button">
                    Close
                </button> -->


            </div>
        </div>
    </div>
</div>


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