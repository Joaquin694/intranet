<?php
switch ($_REQUEST['cod']) {
    case 'wiki_send_bolefact':
        require_once "../modelos/wikito.modelo.php";


        $objeto = new wikito();
        $render_facturation = $objeto->wiki_send_bolefact();

        break;
    case 'BOLETA_O_FACTURA':
        require_once "../modelos/interfast_cajera.modelo.php";
        # code...
        $chkRadioB = $_POST['chkRadioB'];
        $fechaini = $_POST['fechaInicio'];
        $fechafin = $_POST['fechaFinal'];

        $render_facturation = json_decode(ModeloPanelFacturaBpm::viewBoletaEletronicaPanel($chkRadioB, $fechaini, $fechafin), true);

        ?>
        <table class="table table-bordered table-sm" id="cuerpito_tabla">
            <thead>
                <tr>
                    <th style="background: #5e5e5e !important;color: white;" colspan="11">
                        <h5>
                            <div class="input-group" style="float: left;">
                                <input id="search" type="text" class="form-control" placeholder="Escribe para buscar..."
                                    name="search"
                                    style="height: 33px;border-bottom:  1px solid black;background: #f4f4f4 !important;width: 360px">
                                <div class="input-group-btn">
                                    <!-- <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button> -->
                                </div>
                            </div>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="pastillitasradiosas"
                                style="margin-left: 15px;float: left;width: 180px !important;background: #4b4b4b !important">
                                <input type="radio" id="rdbtCompNoEnviados" name="controlTable" value="comprobante_no_informado"
                                    class="rdbtCompNoEnviados">
                                <label for="rdbtCompNoEnviados" class="rdbtCompNoEnviados">No&nbsp;Enviados&nbsp;a&nbsp;SUNAT
                                </label>
                            </span>
                            <span class="pastillitasradiosas"
                                style="margin-left: 15px;float: left;width: 180px !important;background: #4b4b4b !important">
                                <input type="radio" id="rdbtCompSiEnviados" name="controlTable" value="comprobante_no_informado"
                                    class="rdbtCompSiEnviados">
                                <label for="rdbtCompSiEnviados"
                                    class="rdbtCompSiEnviados">Si&nbsp;Enviados&nbsp;a&nbsp;SUNAT</label>
                            </span>

                            <span class="pastillitasradiosas"
                                style="margin-left: 15px;float: left;width: 140px !important;background: #4b4b4b !important">
                                <input type="radio" id="rdbtTodos" name="controlTable" value="comprobante_no_informado"
                                    class="rdbtTodos" checked>
                                <label for="rdbtTodos" class="rdbtTodos">Mostrar&nbsp;Todo</label>
                            </span>


                            <span style="float: right;" id="txtConceptoBusqueda">
                                <span style="font-size: 13px">(Del
                                    <b><?php echo $fechaini . "</b> hasta <b>" . $fechafin . "</b>)</span>"; ?> &nbsp; <SPAN
                                            id='cnttotal_dinero' style="font-size: 18px;font-weight: 900"></SPAN>
                                        &nbsp;&nbsp;RECAUDADO</span>
                        </h5>
                    </th>
                    <th style="background: #5e5e5e !important;color: white;text-align: center;" colspan="4">
                        <!-- <i onclick="ExportToExcel('cuerpito_tabla')" title="Descargar excel" class="fa fa-file-excel-o fa-3x" aria-hidden="true" style="margin-top: 10px !important"></i> -->
                        <span class="pastillitasradiosas"
                            style="margin-left: 15px;float: left;width: 120px !important;background: #ff5722 !important">
                            <input type="radio" id="rdbtDeudores" name="controlTable" value="comprobante_con_deuda"
                                class="rdbtDeudores">
                            <label for="rdbtDeudores" class="rdbtDeudores">MOROSOS</label>
                        </span>

                        <span class="pastillitasradiosas"
                            style="margin-left: 15px;float: left;width: 120px !important;background: #085108 !important">
                            <input type="radio" id="rdbtYaPagaron" name="controlTable" value="comprobante_con_deuda"
                                class="rdbtYaPagaron">
                            <label for="rdbtYaPagaron" class="rdbtYaPagaron">YA PAGARON</label>
                        </span>
                    </th>
                </tr>
                <tr>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">#</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">FECHA DE TRANSACCION</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">SERIE COMPROBANTE</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">CORRELATIVO</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">IMPORTE TRANSACCION</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">DOCUMENTO ORIGEN</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">CLIENTE</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">DOCUMENTO CLIENTE</th>
                    <!-- <th style="font-weight: 700;background: #5e5e5e !important;color: white">TIPO DE PAGO</th> -->
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">CAJERO</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">FECHA ATENCION Y HORA DE ATENCION
                    </th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">
                        <p id='me_debes'
                            style='color: red;font-size: 20px;background: white;border-radius: 10px; padding: 1px 5px;    display: inline-grid;'>
                        </p>DEUDA &nbsp; &nbsp;
                        <i id='calculation' class="fa fa-calculator fa-2x" aria-hidden="true"></i>
                    </th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">ADD PAGOS</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white;width: 240px"></th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white;width: 160px"></th>
                </tr>
            </thead>
            <tbody class="buscar">
                <?php
                $dinero_total = 0;
                $id_counter = 0;

                for ($i = 0; $i < count($render_facturation); $i++) {
                    $id_counter = $id_counter + 1;
                    $dinero_total = $dinero_total + $render_facturation[$i]["total"];
                    $id = $render_facturation[$i]["id"];

                    ?>
                    <tr style="background: white" id="<?php echo $render_facturation[$i]["id"] . 'painttr'; ?>">
                        <td><?php echo $id_counter; ?></td>
                        <td><?php echo $render_facturation[$i]["fecha_contable"]; ?></td>
                        <td><?php echo $render_facturation[$i]["serie"] === "B001" ? "EB01" : ($render_facturation[$i]["serie"] === "F001" ? "E001" : $render_facturation[$i]["serie"]); ?>
                        </td>
                        <td><?php echo $render_facturation[$i]["correlativo"]; ?></td>
                        <td><?php echo $render_facturation[$i]["total"]; ?></td>
                        <td><?php echo $render_facturation[$i]["documento_origen_de_comprobante"]; ?></td>
                        <td><?php echo $render_facturation[$i]["nombre_cliente"]; ?></td>
                        <td><?php echo $render_facturation[$i]["num_docu_identidad"]; ?></td>
                        <!-- echo $render_facturation[$i]["tipo_pago"];  -->
                        <td><?php echo $render_facturation[$i]["cajera"]; ?></td>
                        <td><?php echo (new DateTime($render_facturation[$i]["fecha_creacion"]))->add(new DateInterval('PT120M'))->format('Y-m-d H:i:s'); ?>
                        </td>

                        <td>
                            <?php

                            $fcc_id = $render_facturation[$i]["id"];
                            $stmt = Conexion::conectar()->query("SELECT fcc.id as fcc_id, cv.* FROM cobro_venta as cv
                                                            LEFT JOIN facturacion_comprobante_cabecera as fcc ON fcc.id = cv.facturacion_comprobante_cabecera_id
                                                            where fcc.id = '$fcc_id'
                                                            ");

                            $monto_cobro = 0;
                            foreach ($stmt as $row) {
                                $monto_cobro += $row['monto'];
                            }

                            $x_render_facturation_total = floatval($render_facturation[$i]["total"]);
                            $x_render_facturation = floatval($x_render_facturation);

                            // echo $x_render_facturation_total; echo " TIPO: "; echo gettype($x_render_facturation_total);echo "<br>";
                            // echo $monto_cobro; echo " TIPO: "; echo gettype($monto_cobro);echo "<br>";
                            // echo $x_render_facturation; echo " TIPO: "; echo gettype($x_render_facturation);echo "<br>";
                
                            $monto_c_f = round($x_render_facturation_total - ($monto_cobro + $x_render_facturation), 2);

                            if ($monto_c_f > 0) {
                                $color_deuda = "style='    display: inline-grid  !important;background: red; color: white; padding: 0px 4px; border-radius: 10px;'";
                                $metadata_deuda = "DEBEDOR";
                            } else {
                                $color_deuda = "style='    display: inline-grid  !important;background: white; color: black; padding: 0px 4px; border-radius: 10px;'";
                                $metadata_deuda = "PAGOYA";
                            }



                            ?>
                            <div class="monto<?php echo $i; ?>" <?php echo $color_deuda; ?>>
                                <?php echo $monto_c_f > 0 ? $monto_c_f : 0; ?>
                            </div>
                        </td>
                        <td>
                            <a class="modalPago" data-id="<?php echo $render_facturation[$i]["id"]; ?>"
                                data-indice="<?php echo $i; ?>">
                                <p class='d-none'><?php echo $metadata_deuda; ?></p>
                                <img src="vistas/img/plantilla/bolsa.png" style="width: 35px !important"
                                    class="<?php echo $visible_bolsa; ?>">
                                <?php echo "<BR>S/";
                                echo $monto_cobro; ?>
                            </a>
                        </td>

                        <td>

                            <span id="<?php echo $id . 'sendAsunat' ?>">
                                <?php
                                if ($render_facturation[$i]["estado_envio"] === 'ok') {
                                    # code...
                                    echo '<i title="Compronamte informado" class="fa fa-circle bolaVerde" id="bola_fact_bpm3" aria-hidden="true"></i>'; ?>
                                    &nbsp;&nbsp;&nbsp;

                                    <span class="comprobant_noanulado<?php echo $id ?>" title="Generar nota de crédito"
                                        onclick="send_enviar_a_sunat('<?php echo $id ?>','render_send_enviar_a_sunat__NC','idNewNC'),pinta_filas('<?php echo $id . 'painttr'; ?>')"><img
                                            src="vistas/img/plantilla/cleaner.png" style="width: 35px !important"></span>
                                    <?php
                                } else { ?>
                                    <img onclick="send_enviar_a_sunat('<?php echo $id ?>','send_enviar_a_sunat','<?php echo $id . 'sendAsunat' ?>'),pinta_filas('<?php echo $id . 'painttr'; ?>')"
                                        title="Enviar a SUNAT" src="vistas/img/plantilla/favicon.7124d68e.ico"
                                        style="width: 30px !important">
                                <?php }
                                ?>


                            </span>&nbsp;&nbsp;&nbsp;
                            <span style="display: none"><?php echo $render_facturation[$i]["estado_envio"]; ?></span>
                            &nbsp;&nbsp;&nbsp;
                            <span class="comprobant_noanulado<?php echo $id ?>" title="Imprimir comprobante"><img
                                    onclick="window.open('/controladores/pdf.controlador.php?id=<?php echo $id; ?>&deque=pdf_comprobante','_blank'),pinta_filas('<?php echo $id . 'painttr'; ?>')"
                                    src="vistas/img/plantilla/pdf.png" style="width: 35px  !important"></span>&nbsp;&nbsp;&nbsp;

                            <span>
                                <button class="btn btn-info agregar_data"
                                    data-id="<?php echo $render_facturation[$i]["id"]; ?> " id="agregar_data">Agregar</button>
                            </span>

                        </td>
                        <td>
                            <?php
                            if ($render_facturation[$i]["estado_envio"] != 'ok') {
                                ?>
                                <a class="endpointdata" data-id="<?php echo $render_facturation[$i]["id"]; ?>"
                                    style='font-weight: 900;'>ENVIAR</a>
                            </td>
                            <?php
                            }
                            ?>

                    </tr>
                <?php }

                ?>

            </tbody>
        </table>
        <!-- Modal -->
        <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-horizontal">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-5 " style="text-align: left !important;">Fecha:</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="pago_fecha" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 " style="text-align: left !important;">Correlativo:</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="pago_correlativo" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-5 " style="text-align: left !important;">Serie:</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="pago_serie" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 " style="text-align: left !important;">Documento:</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="pago_documento_cliente" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-sm-2 " style="text-align: left !important;">Cliente:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="pago_cliente" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-5 " style="text-align: left !important;">Total:</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="pago_total" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-5 " style="text-align: left !important;">Pago restante:</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="pago_restante" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <select class="form-control" id="pago_nuevoMetodoPago" required=""
                                    style="background: #00C865 !important;color: white !important;border: 1px solid #00C865 !important">
                                    <option style="background: white;color: black" value="">Método de pago</option>
                                    <option style="background: white;color: black" value="Efectivo">Efectivo</option>
                                    <option style="background: white;color: black" value="TRANS_BBVA_0011_0341_5402_004517_53">
                                        Transf. BBVA 0011-0341-5402-004517-53</option>
                                    <option style="background: white;color: black" value="TRANS_BANCO_NACION_00381091708">
                                        Transf. BANC. de la NACIÓN 00381091708</option>
                                    <option style="background: white;color: black" value="TRANS_BCP_19128084617099">Transf. BCP
                                        19128084617099</option>

                                    <option style="background: white;color: black" value="YAPE_962382960">YAPE 962382960
                                    </option>
                                    <option style="background: white;color: black" value="PLIN_962382960">PLIN 962382960
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control d-none" id="n_tc" placeholder="Codigo transferencia">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="pago_descripcion" placeholder="descripcion"
                                    rows="3"></textarea>
                            </div>


                            <div class="form-group">
                                <input type="text" class="form-control" id="pago_nombre"
                                    placeholder="Nombre del cliente que efectúa el pago">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="pago_documento"
                                    placeholder="N° Documento de identidad">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" id="pago_monto" placeholder="Monto que paga">
                            </div>

                            <div class="form-group">
                                <input type="date" class="form-control" id="pago_fecha2" placeholder="fecha">
                            </div>


                        </div>


                        <hr>
                        <div class="form-group">
                            <input type="text" class="form-control d-none" id="id_venta">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control d-none" id="pago_indice">
                        </div>

                        <div class="table-responsive" style="max-height: 300px; overflow: auto;">
                            <table class="table table-condensed" id='mi_tabletu'>
                                <thead>
                                    <tr>
                                        <th>TIPO DE PAGO</th>
                                        <th>N TRANSFERENCIA</th>
                                        <th>FECHA</th>
                                        <th>MONTO</th>
                                        <th>DOCUEMNTO</th>
                                        <th>CLIENTE</th>
                                        <th>DESCRIPCION</th>
                                    </tr>
                                </thead>
                                <tbody id="table_cobro_venta">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary saveCobroVenta">Guardar</button>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                function suma_deuditas() {
                    // Variable para almacenar la suma
                    var suma = 0;

                    // Recorrer las filas de la tabla
                    $('#cuerpito_tabla tbody tr').each(function () {
                        // Verificar si la fila está visible (no tiene el atributo display: none)
                        if ($(this).css('display') !== 'none') {
                            // Obtener el valor encapsulado en el div de la columna 11
                            var divValor = $(this).find('td:eq(10) div');

                            // Obtener el valor numérico y sumarlo
                            var valor = parseFloat(divValor.text().trim()); // Asumiendo que el valor dentro del div es un número entero
                            suma += valor;
                        }
                    });
                    var sumaru = parseFloat(suma).toFixed(2);

                    var partes = sumaru.split("."); // Dividir la cadena en partes: parte entera y parte decimal

                    // Obtener la parte entera y la parte decimal
                    var parteEntera = partes[0];
                    var parteDecimal = partes[1];

                    // Agregar espacio después de cada 3 caracteres en la parte entera
                    var nuevaParteEntera = "";
                    for (var i = parteEntera.length - 1, count = 0; i >= 0; i--, count++) {
                        nuevaParteEntera = parteEntera.charAt(i) + nuevaParteEntera;
                        if (count % 3 === 2 && i > 0) {
                            nuevaParteEntera = " " + nuevaParteEntera;
                        }
                    }

                    var nuevoNumero = nuevaParteEntera + "." + parteDecimal;



                    $('#me_debes').text('S/' + nuevoNumero);
                }

                // Mostrar el resultado
                $(document).ready(function () {

                    // --------------------------------------------------------------

                    $('#calculation').on('click', function () {
                        // Mostrar Mostrar una alerta cuando se haga clic en el botón
                        suma_deuditas();
                    });

                    $('#search').on('input', function () {
                        // Mostrar una alerta cuando se detecte una acción en el campo de entrada
                        $('#me_debes').text('');
                    });
                    // --------------------------------------------------------------

                });



                $("#pago_nuevoMetodoPago").change(function () {
                    let tipo = $(this).val().toLowerCase();
                    // alert(tipo);
                    if (tipo == 'efectivo') {
                        $("#n_tc").addClass("d-none");
                    } else {
                        $("#n_tc").removeClass("d-none");
                    }
                });


                $(".modalPago").click(function () {


                    let id_venta = $(this).data('id');
                    let indice = $(this).data('indice');
                    let montoIndice = $('.monto' + indice).html();

                    var num_montoIndice = parseFloat(montoIndice.trim());

                    $('#pago_indice').val(indice);

                    $('#id_venta').val(id_venta);
                    // pago_restante
                    let cod = "show_cobro_venta";
                    let dataen = new FormData();
                    dataen.append('cod', cod);
                    dataen.append('id_venta', id_venta);

                    $.ajax({
                        type: 'post',
                        url: 'controladores/cobro_venta.controlador.php',
                        data: dataen,
                        contentType: false,
                        processData: false,
                        dataType: 'JSON',
                        success: function (response) {
                            $('#pago_documento_cliente').val(response.data[0].num_docu_identidad);
                            $('#pago_cliente').val(response.data[0].nombre_cliente);
                            $('#pago_correlativo').val(response.data[0].correlativo);
                            $('#pago_serie').val(response.data[0].serie);
                            $('#pago_fecha').val(response.data[0].fecha_contable);
                            $('#pago_total').val(response.data[0].total);
                            $('#pago_restante').val(num_montoIndice);

                            let cod2 = "list_cobro_venta";
                            let dataen = new FormData();
                            dataen.append('cod', cod2);
                            dataen.append('id_venta', id_venta);
                            $.ajax({
                                type: 'post',
                                url: 'controladores/cobro_venta.controlador.php',
                                data: dataen,
                                contentType: false,
                                processData: false,
                                success: function (response2) {
                                    $("#table_cobro_venta").html(response2);
                                    $('#exampleModal').modal('show')
                                }
                            });
                        }
                    });
                    return false;
                });
                $(".saveCobroVenta").click(function () {
                    if ($('#pago_monto').val() <= 0 || $('#pago_nuevoMetodoPago').val().length == 0) {
                        alert("No puedes guardar datos incompletos");
                        return false;
                    }
                    let cod = "save_cobro_venta";
                    let id_venta = $('#id_venta').val();
                    let nuevoMetodoPago = $('#pago_nuevoMetodoPago').val();
                    let monto = $('#pago_monto').val();

                    let fecha = $('#pago_fecha2').val();
                    let documento = $('#pago_documento').val();
                    let nombre = $('#pago_nombre').val();
                    let descripcion = $('#pago_descripcion').val();
                    let codigo_trans = $('#n_tc').val();


                    let pago_total = $('#pago_total').val();
                    let pago_restante = $('#pago_restante').val();

                    let pago_indice = $('#pago_indice').val();

                    let dataen = new FormData();
                    dataen.append('cod', cod);
                    dataen.append('id_venta', id_venta);
                    dataen.append('nuevoMetodoPago', nuevoMetodoPago);
                    dataen.append('monto', monto);
                    dataen.append('fecha', fecha);
                    dataen.append('documento', documento);
                    dataen.append('nombre', nombre);
                    dataen.append('descripcion', descripcion);
                    dataen.append('codigo_trans', codigo_trans);

                    $.ajax({
                        type: 'post',
                        url: 'controladores/cobro_venta.controlador.php',
                        data: dataen,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            let total_deuda = Number(pago_restante) - Number(monto);
                            $('.monto' + pago_indice).html(total_deuda.toFixed(2));
                            $('#pago_restante').val(Number(total_deuda.toFixed(2)));
                            //$('#id_venta').val('');
                            $('#pago_nuevoMetodoPago').val('');
                            $('#pago_monto').val('');
                            $('#pago_fecha2').val('');
                            $('#pago_documento').val('');
                            $('#pago_nombre').val('');
                            $('#pago_descripcion').val('');
                            $('#n_tc').val('');

                            $("#table_cobro_venta").append(`<tr>
                                                                                            <td>${nuevoMetodoPago}</td>
                                                                                            <td>${codigo_trans}</td>
                                                                                            <td>${fecha}</td>
                                                                                            <td>${monto}</td>
                                                                                            <td>${documento}</td>
                                                                                            <td>${nombre}</td>
                                                                                            <td>${descripcion}</td>                                                    
                                                                                        </tr>`);
                            //$('#exampleModal').modal('hide')
                        }
                    });
                    return false;
                });


                $(".endpointdata").click(function () {
                    let id = $(this).data('id');
                    var cod = "subirEndPoint";

                    var dataen = 'id=' + id +
                        '&cod=' + cod;
                    $.ajax({
                        type: 'post',
                        url: 'controladores/enpointBoleFac.controlador.php',
                        data: dataen,
                        success: function (resp) {
                            $("#main_rebot").html(resp);
                        }
                    });
                    return false;
                });


                $('#search').quicksearch('table tbody tr');



                $(".rdbtCompNoEnviados").click(function () {
                    $("#calculation").click();
                    var rex = new RegExp("No enviado", 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                    $("#txtConceptoBusqueda").addClass("d-none");
                });

                $(".rdbtCompSiEnviados").click(function () {
                    $("#calculation").click();
                    var rex = new RegExp("ok", 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                    $("#txtConceptoBusqueda").addClass("d-none");
                });

                $(".rdbtTodos").click(function () {
                    $("#calculation").click();
                    var rex = new RegExp("", 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();

                    $("#txtConceptoBusqueda").removeClass("d-none");
                });

                $(".rdbtDeudores").click(function () {
                    $("#calculation").click();
                    var rex = new RegExp("DEBEDOR", 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();

                    $("#txtConceptoBusqueda").addClass("d-none");
                });

                $(".rdbtYaPagaron").click(function () {
                    $("#calculation").click();
                    var rex = new RegExp("PAGOYA", 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();

                    $("#txtConceptoBusqueda").addClass("d-none");
                });

                $("#cnttotal_dinero").html('S/<?php echo $dinero_total; ?>');
            </script>
            <?php
            break;
    // ------------------------------------------------------------------------------------------------------------------------------

    // ------------------------------------------------------------------------------------------------------------------------------
    case 'notas_de_credito':
        require_once "../modelos/interfast_cajera.modelo.php";
        # code...
        $fechaini = $_POST['fechaInicio'];
        $fechafin = $_POST['fechaFinal'];

        $chkRadioB = $_POST['chkRadioB'];
        $render_facturation = json_decode(ModeloPanelFacturaBpm::viewBoletaEletronicaPanel($chkRadioB, $fechaini, $fechafin), true);

        ?>
            <meta http-equiv="content-type" content="application/vnd.ms-excel;" charset="UTF-8">
            <meta charset="UTF-8">
            <table class="table table-bordered table-sm" id="cuerpito_tabla">
                <thead>
                    <tr>
                        <th style="background: #5e5e5e !important;color: white;" colspan="11">
                            <h5>
                                <div class="input-group" style="float: left;">
                                    <input id="search" type="text" class="form-control" placeholder="Escribe para buscar..."
                                        name="search"
                                        style="height: 33px;border-bottom:  1px solid black;background: #f4f4f4 !important;width: 360px">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit"><i
                                                class="glyphicon glyphicon-search"></i></button>
                                    </div>
                                </div>

                                <span class="pastillitasradiosas"
                                    style="margin-left: 15px;float: left;width: 120px !important;background: #4b4b4b !important">
                                    <input type="radio" id="rdbtCompNoEnviados" name="controlTable"
                                        value="comprobante_no_informado" class="rdbtCompNoEnviados">
                                    <label for="rdbtCompNoEnviados" class="rdbtCompNoEnviados">No&nbsp;Enviados</label>
                                </span>
                                <span class="pastillitasradiosas"
                                    style="margin-left: 15px;float: left;width: 120px !important;background: #4b4b4b !important">
                                    <input type="radio" id="rdbtCompSiEnviados" name="controlTable"
                                        value="comprobante_no_informado" class="rdbtCompSiEnviados">
                                    <label for="rdbtCompSiEnviados" class="rdbtCompSiEnviados">Si&nbsp;Enviados</label>
                                </span>

                                <span class="pastillitasradiosas"
                                    style="margin-left: 15px;float: left;width: 120px !important;background: #4b4b4b !important">
                                    <input type="radio" id="rdbtTodos" name="controlTable" value="comprobante_no_informado"
                                        class="rdbtTodos" checked>
                                    <label for="rdbtTodos" class="rdbtTodos">Mostrar&nbsp;Todo</label>
                                </span>


                                <span style="float: right;"> <SPAN style="font-size: 18px;font-weight: 900">NOTAS DE
                                        CRÉDITO</SPAN> &nbsp;&nbsp;</span>
                            </h5>
                        </th>
                        <th style="background: #5e5e5e !important;color: white;text-align: center;" colspan="2">
                            <i onclick="ExportToExcel('cuerpito_tabla')" title="Descargar excel"
                                class="fa fa-file-excel-o fa-3x" aria-hidden="true" style="margin-top: 10px !important"></i>
                        </th>
                    </tr>
                    <tr>
                        <th style="font-weight: 700;background: #5e5e5e !important;color: white">#</th>
                        <th style="font-weight: 700;background: #5e5e5e !important;color: white">FECHA DE TRANSACCION</th>
                        <th style="font-weight: 700;background: #5e5e5e !important;color: white">SERIE COMPROBANTE</th>
                        <th style="font-weight: 700;background: #5e5e5e !important;color: white">CORRELATIVO</th>
                        <th style="font-weight: 700;background: #5e5e5e !important;color: white">IMPORTE TRANSACCION</th>
                        <th style="font-weight: 700;background: #5e5e5e !important;color: white">DOCUMENTO QUE MODIFICA</th>
                        <th style="font-weight: 700;background: #5e5e5e !important;color: white">CLIENTE</th>
                        <th style="font-weight: 700;background: #5e5e5e !important;color: white">DOCUMENTO CLIENTE</th>
                        <th style="font-weight: 700;background: #5e5e5e !important;color: white">MOTIVO DE ANULACIÓN</th>
                        <th style="font-weight: 700;background: #5e5e5e !important;color: white">CAJERO</th>
                        <th style="font-weight: 700;background: #5e5e5e !important;color: white">FECHA ATENCION Y HORA DE
                            ATENCION</th>
                        <th style="font-weight: 700;background: #5e5e5e !important;color: white;width: 160px"></th>
                    </tr>
                </thead>
                <tbody class="buscar">
                    <?php
                    $dinero_total = 0;
                    for ($i = 0; $i < count($render_facturation); $i++) {
                        $dinero_total = $dinero_total + $render_facturation[$i]["total"];
                        $id = $render_facturation[$i]["id"];
                        $idComprobanteVenta = $render_facturation[$i]["idComprobanteVenta"];

                        ?>
                        <tr style="background: white" id="<?php echo $id . 'painttr'; ?>">
                            <td><?php echo $i + 1; ?></td>
                            <td><?php echo $render_facturation[$i]["fecha_contable"]; ?></td>
                            <td><?php echo $render_facturation[$i]["serie"]; ?></td>
                            <td><?php echo $render_facturation[$i]["correlativo"]; ?></td>
                            <td><?php echo $render_facturation[$i]["total"]; ?></td>
                            <td>
                                <?php echo $render_facturation[$i]["documento_origen_de_comprobante"]; ?>
                                <a href="/controladores/pdf.controlador.php?id=<?php echo $render_facturation[$i]["idComprobanteVenta"]; ?>&deque=pdf_comprobante"
                                    target="_blank"><i class="fa fa-external-link-square" aria-hidden="true"></i></a>
                            </td>
                            <td><?php echo $render_facturation[$i]["nombre_cliente"]; ?></td>
                            <td><?php echo $render_facturation[$i]["num_docu_identidad"]; ?></td>
                            <td><?php echo $render_facturation[$i]["descripcion_motivo"] . " " . $render_facturation[$i]["comentario"]; ?>
                            </td>
                            <td><?php echo $render_facturation[$i]["cajera"]; ?></td>

                            <td><?php echo (new DateTime($render_facturation[$i]["fecha_creacion"]))->add(new DateInterval('PT120M'))->format('Y-m-d H:i:s'); ?>
                            </td>
                            <td>
                                <span id="<?php echo $id . 'sendAsunat' ?>">
                                    <?php
                                    if ($render_facturation[$i]["estado_envio"] === 'ok') {
                                        # code...
                                        echo '<i title="Compronamte informado" class="fa fa-circle bolaVerde" id="bola_fact_bpm3" aria-hidden="true"></i>'; ?>
                                        &nbsp;&nbsp;&nbsp;

                                        <span class="comprobant_noanulado<?php echo $id ?>" title="Generar nota de crédito"
                                            onclick="send_enviar_a_sunat('<?php echo $id ?>','render_send_enviar_a_sunat__NC','idNewNC'),pinta_filas('<?php echo $id . 'painttr'; ?>')"><img
                                                src="vistas/img/plantilla/cleaner.png" style="width: 35px !important"></span>
                                        <?php
                                    } else { ?>
                                        <img onclick="send_enviar_a_sunat_NOTASC('<?php echo $id ?>','send_enviar_a_sunat','<?php echo $id . 'sendAsunat' ?>'),pinta_filas('<?php echo $id . 'painttr'; ?>')"
                                            title="Enviar a SUNAT" src="vistas/img/plantilla/favicon.7124d68e.ico"
                                            style="width: 30px !important">
                                    <?php }
                                    ?>


                                </span>&nbsp;&nbsp;&nbsp;
                                <span style="display: none"><?php echo $render_facturation[$i]["estado_envio"]; ?></span>
                                &nbsp;&nbsp;&nbsp;
                                <span class="comprobant_noanulado<?php echo $id ?>" title="Imprimir comprobante"><img
                                        onclick="window.open('/controladores/pdf.controlador.php?id=<?php echo $idComprobanteVenta; ?>&deque=pdf_comprobante_NOTASC','_blank'),pinta_filas('<?php echo $id . 'painttr'; ?>')"
                                        src="vistas/img/plantilla/pdf.png" style="width: 35px  !important"></span>
                                &nbsp;&nbsp;&nbsp;
                                <?php
                                $fechaActual = date("Y-m-d");
                                if ($render_facturation[$i]["return_stock"] == 0 && $render_facturation[$i]["fecha_contable"] == $fechaActual) {
                                    # code...
                                    ?>

                                    <button onclick="this.style.display = 'none'; return false;"
                                        data-custom="<?php echo $idComprobanteVenta ?>" class="red-button" title="Restornar Stock"
                                        style="margin-top: 5px">Restornar Stock</button>

                                    <?php
                                }
                                ?>
                            </td>
                        </tr>
                    <?php }

                    ?>

                </tbody>
            </table>
            <script type="text/javascript">
                $('#search').quicksearch('table tbody tr');

                $(".rdbtCompNoEnviados").click(function () {
                    var rex = new RegExp("No enviado", 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                    $("#txtConceptoBusqueda").addClass("d-none");
                });

                $(".rdbtCompSiEnviados").click(function () {
                    var rex = new RegExp("ok", 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                    $("#txtConceptoBusqueda").addClass("d-none");
                });

                $(".rdbtTodos").click(function () {
                    var rex = new RegExp("", 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();

                    $("#txtConceptoBusqueda").removeClass("d-none");
                });

                $("#cnttotal_dinero").html('S/<?php echo $dinero_total; ?>');

                $(document).ready(function () {
                    $('.red-button').click(function () {
                        $(".spinerGiration2").removeClass("d-none");
                        $(this).hide();
                        var id = $(this).data('custom');
                        var cod = "reingreso_stock_por_nota";

                        var dataen = 'id=' + id + '&cod=' + cod;

                        $.ajax({
                            type: 'post',
                            url: 'controladores/interfast_cajera.controlador.php',
                            data: dataen,
                            success: function (resp) {
                                console.log(resp);
                                $(".spinerGiration2").addClass("d-none");
                            }
                        });
                        return false;

                    });
                });
            </script>
            <?php

            break;
    // ------------------------------------------------------------------------------------------------------------------------------                                

    case 'reingreso_stock_por_nota':
        require_once "../modelos/interfast_cajera.modelo.php";


        $reingreso_stock_por_nota = new ModeloPanelFacturaBpm();
        $reingreso_stock_por_nota_r = $reingreso_stock_por_nota->reingreso_stock_por_nota($_REQUEST['id']);

        break;
    // ------------------------------------------------------------------------------------------------------------------------------
    case 'Pagosrecibido':
        # code...
        $fechaini = $_POST['fechaInicio'];
        $fechafin = $_POST['fechaFinal'];
        require_once "../modelos/cobro_venta.modelo.php";
        $getData = new CobroVenta();

        ?>

            <?php echo $getData->getPagosRecibidos($fechaini, $fechafin); ?>



            <?php
            break;
    // ------------------------------------------------------------------------------------------------------------------------------
    case 'RendicionesCaja':
        # code...
        $fechaini = $_POST['fechaInicio'];
        $fechafin = $_POST['fechaFinal'];
        require_once "../modelos/cobro_venta.modelo.php";
        $getData = new CobroVenta();


        ?>
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th style="font-weight: 700;background: #5e5e5e !important;color: white">#</th>
                        <th style="font-weight: 700;background: #5e5e5e !important;color: white">PERSONA QUE REGISTRO VENTAS
                        </th>
                        <!-- <th style="font-weight: 700;background: #5e5e5e !important;color: white">ORIGEN DE LA VENTA</th> -->
                        <!-- <th style="font-weight: 700;background: #5e5e5e !important;color: white">TIPO PAGO</th> -->
                        <th style="font-weight: 700;background: #5e5e5e !important;color: white">SERIE</th>
                        <th style="font-weight: 700;background: #5e5e5e !important;color: white">CANTIDAD DE COMPROBANTE</th>
                        <th style="font-weight: 700;background: #5e5e5e !important;color: white">INGRESO ESPERADO</th>
                        <th style="font-weight: 700;background: #5e5e5e !important;color: white">MONTO COBRADO</th>
                        <th style="font-weight: 700;background: #5e5e5e !important;color: white">MONTO PENDIENTE DE COBRAR</th>
                    </tr>
                </thead>
                <tbody class="buscar">
                    <?php echo $getData->viewRendicionesCaja($fechaini, $fechafin); ?>
                </tbody>
            </table <?php
            break;

    // ------------------------------------------------------------------------------------------------------------------------------
    case 'send_enviar_a_sunat__NC':
        # code...
        session_start();
        function round_abad($valores)
        {
            $float_dos_redondeado = round($valores * 100) / 100;
            return $float_dos_redondeado;
        }
        require_once "../modelos/facturador.modelo.php";
        $pk_cabecera_factura_ = $_POST['pk_cabecera_factura_'];
        $textMotivoNc = $_POST['textMotivoNc'];

        $pagoObj = new ModeloFacturaBpm();
        $datCBFT = $pagoObj->viewBoletaEletronica($pk_cabecera_factura_);
        $boleta = json_decode($datCBFT, true);

        if ($boleta[0]["serie"][0] == 'B') {
            $tipo_comprobante_modific = "03";
        } elseif ($boleta[0]["serie"][0] == 'F') {
            $tipo_comprobante_modific = "07";
        }

        if ($boleta[0]["tipo_operacion"] == 'opExonerada') {
            $serie = $boleta[0]['serie'];
            // $correlativo "<br>";
            $fecha_contable = date('Y-m-d');
            $nombre_cliente = $boleta[0]['nombre_cliente'];
            $num_docu_identidad = $boleta[0]['num_docu_identidad'];
            $direccion = $boleta[0]['direccion'];
            $documento_origen_de_comprobante = $boleta[0]['serie'] . "-" . $boleta[0]['correlativo'];
            $idComprobanteVenta = $pk_cabecera_factura_;
            $estado_envio = "No enviado";
            $estado_tributatio = "Libro si";
            $cajera = $_SESSION["nombre"];
            $tipo_operacion = $boleta[0]['tipo_operacion'];
            $total_gravada = $boleta[0]['total_gravada'];
            $total_exonerada = $boleta[0]['total_exonerada'];
            $total_inafecta = "0";
            $igv = "0";
            $total = $boleta[0]['total'];
            $tipo_comprobante_modifica = $tipo_comprobante_modific;
            $nro_documento_modifica = $boleta[0]['serie'] . "-" . $boleta[0]['correlativo'];
            $cod_tipo_motivo = "01";
            $descripcion_motivo = "ANULACION DE LA OPERACION";
            $comentario = $textMotivoNc;

            $insert_and_update_cab__nc = $pagoObj->mdlnewCabNotaCredito($serie, $fecha_contable, $nombre_cliente, $num_docu_identidad, $direccion, $documento_origen_de_comprobante, $idComprobanteVenta, $estado_envio, $estado_tributatio, $cajera, $tipo_operacion, $total_gravada, $total_exonerada, $total_inafecta, $igv, $total, $tipo_comprobante_modifica, $nro_documento_modifica, $cod_tipo_motivo, $descripcion_motivo, $comentario);

            for ($i = 0; $i < count($boleta); $i++) {
                $codigo = $boleta[$i]["codigo"];
                $descripcion = $boleta[$i]["descripcion"];
                $cantidad = $boleta[$i]["cantidad"];
                $precio_venta_unitario = $boleta[$i]["precio_venta_unitario"];
                $precio_tras_decuento = $boleta[$i]["precio_tras_decuento"];
                $precio_venta_total = $boleta[$i]["precio_venta_total"];
                $fecha_creacion = $boleta[$i]["fecha_creacion"];
                $fk_comprobante_cabecera = $boleta[$i]["fk_comprobante_cabecera"];
                $pk_lote = $boleta[$i]["pk_lote"];

                $insert_and_update_body__nc = $pagoObj->mdlnewBodyNotaCredito($codigo, $descripcion, $cantidad, $precio_venta_unitario, $precio_tras_decuento, $precio_venta_total, $fk_comprobante_cabecera, $pk_lote);
            }
        } elseif ($boleta[0]["tipo_operacion"] == 'opGravada') {

            $serie = $boleta[0]['serie'];
            // $correlativo "<br>";
            $fecha_contable = date('Y-m-d');
            $nombre_cliente = $boleta[0]['nombre_cliente'];
            $num_docu_identidad = $boleta[0]['num_docu_identidad'];
            $direccion = $boleta[0]['direccion'];
            $documento_origen_de_comprobante = $boleta[0]['serie'] . "-" . $boleta[0]['correlativo'];
            $idComprobanteVenta = $pk_cabecera_factura_;
            $estado_envio = "No enviado";
            $estado_tributatio = "Libro si";
            $cajera = $_SESSION["nombre"];
            $tipo_operacion = $boleta[0]['tipo_operacion'];
            $total_gravada = $boleta[0]['total_gravada'];
            $total_exonerada = "0";
            $total_inafecta = "0";
            $igv = $boleta[0]['igv'];
            $total = $boleta[0]['total'];
            $tipo_comprobante_modifica = $tipo_comprobante_modific;
            $nro_documento_modifica = $boleta[0]['serie'] . "-" . $boleta[0]['correlativo'];
            $cod_tipo_motivo = "01";
            $descripcion_motivo = "ANULACION DE LA OPERACION";
            $comentario = $textMotivoNc;

            $insert_and_update_cab__nc = $pagoObj->mdlnewCabNotaCredito($serie, $fecha_contable, $nombre_cliente, $num_docu_identidad, $direccion, $documento_origen_de_comprobante, $idComprobanteVenta, $estado_envio, $estado_tributatio, $cajera, $tipo_operacion, $total_gravada, $total_exonerada, $total_inafecta, $igv, $total, $tipo_comprobante_modifica, $nro_documento_modifica, $cod_tipo_motivo, $descripcion_motivo, $comentario);

            for ($i = 0; $i < count($boleta); $i++) {
                $codigo = $boleta[$i]["codigo"];
                $descripcion = $boleta[$i]["descripcion"];
                $cantidad = $boleta[$i]["cantidad"];
                $precio_venta_unitario = $boleta[$i]["precio_venta_unitario"];
                $precio_tras_decuento = $boleta[$i]["precio_tras_decuento"];
                $precio_venta_total = $boleta[$i]["precio_venta_total"];
                $fecha_creacion = $boleta[$i]["fecha_creacion"];
                $fk_comprobante_cabecera = $boleta[$i]["fk_comprobante_cabecera"];
                $pk_lote = $boleta[$i]["pk_lote"];

                $insert_and_update_body__nc = $pagoObj->mdlnewBodyNotaCredito($codigo, $descripcion, $cantidad, $precio_venta_unitario, $precio_tras_decuento, $precio_venta_total, $fk_comprobante_cabecera, $pk_lote);
            }
        }

        ?>
                <embed
                src="/controladores/pdf.controlador.php?id=<?php echo $pk_cabecera_factura_; ?>&deque=pdf_comprobante_NOTASC"
                width="900" height="500" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html">


            <script type="text/javascript">
                $(".comprobant_noanulado" + "<?php echo $pk_cabecera_factura_; ?>").addClass('d-none');
            </script>

            <?php
            break;
    // ------------------------------------------------------------------------------------------------------------------------------
    case 'render_send_enviar_a_sunat__NC':
        # code...
        $pk_cabecera_factura_ = $_POST['pk_cabecera_factura_'];

        ?>
            <div class="btn-group" style="float: left;">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary " id="returnFacturacionGeneral">
                        <i class="fa fa-undo" aria-hidden="true"></i> Facturación general
                    </button>
                </div>
            </div>
            <br><br><br>
            <center>
                <div style="background: #3a3a3a;width: 900px;padding: 10px;display: flex;">
                    <select style="margin-left: 20px;margin-right: 5px;height: 25px;background: #3a3a3a; color: white"
                        title="Tipo de nota de crédito">
                        <option value="ANULACION DE LA OPERACION" selected>ANULACION DE LA OPERACION</option>
                        <option disabled value="ANULACION POR ERROR DE RUC">ANULACION POR ERROR DE RUC</option>
                        <option disabled value="DESCUENTO GLOBAL">DESCUENTO GLOBAL</option>
                        <option disabled value="DEVOLUCION TOTAL">DEVOLUCION TOTAL</option>
                        <option disabled value="CORRECCION POR ERROR EN LA DESCRIPCION">CORRECCION POR ERROR EN LA DESCRIPCION
                        </option>
                        <option disabled value="DEVOLUCION POR ITEM">DEVOLUCION POR ITEM</option>
                        <option disabled value="DESCUENTO POR ITEM">DESCUENTO POR ITEM</option>
                    </select>
                    <textarea class="text-uppercase" title="Motivo o sustento por el cual se emitirá la Nota de Crédito"
                        id="textMotivoNc" placeholder="Motivo o sustento por el cual se emitirá la Nota de Crédito" cols="60"
                        style="height: 25px"></textarea>
                    <img id="imgGuardar" class="d-none" title="Guardar" src="/vistas/img/plantilla/guardar.jfif"
                        style="width: 30px; height: 25px; margin-left: 5px; border-radius: 1px;"
                        onclick="noview('imgGuardar'),send_enviar_a_sunat_nc('<?php echo $pk_cabecera_factura_ ?>','send_enviar_a_sunat__NC','embedNC')">
                </div>
                <span id="embedNC">
                    <embed
                        src="/controladores/pdf.controlador.php?id=<?php echo $pk_cabecera_factura_; ?>&deque=pdf_comprobante"
                        width="900" height="500" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html">
                </span>

            </center>
            <script type="text/javascript">
                /*SEND ENVIAR A SUNAT NC*/
                function send_enviar_a_sunat_nc(pk_cabecera_factura, cod_action, idRender) {
                    var pk_cabecera_factura_ = pk_cabecera_factura;
                    var cod = cod_action;
                    var idRender = idRender;
                    var textMotivoNc = $("#textMotivoNc").val();

                    var count = pk_cabecera_factura_.length;
                    $("#" + idRender).html("");
                    if (count > 0) {

                        var dataen = 'pk_cabecera_factura_=' + pk_cabecera_factura_ + '&textMotivoNc=' + textMotivoNc + '&cod=' + cod;
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
                // =============================================================
                $("#cuerpito_tabla,#cabezaFactGeneral").addClass("d-none");
                $("#idNewNC").removeClass("d-none");
                // =============================================================
                $("#returnFacturacionGeneral").click(function () {
                    $("#cuerpito_tabla,#cabezaFactGeneral").removeClass("d-none");
                    $("#idNewNC").addClass("d-none");
                });
                // =============================================================
                $("#textMotivoNc").keyup(function (e) {
                    $("#imgGuardar").removeClass("d-none");
                });
                // =============================================================
            </script>
            <?php
            break;
    // ------------------------------------------------------------------------------------------------------------------------------

    case 'send_enviar_a_sunat':
        # code...
        function round_abad($valores)
        {
            $float_dos_redondeado = round($valores * 100) / 100;
            return $float_dos_redondeado;
        }
        require_once "../modelos/facturador.modelo.php";
        $pk_cabecera_factura_ = $_POST['pk_cabecera_factura_'];

        $pagoObj = new ModeloFacturaBpm();
        $datCBFT = $pagoObj->viewBoletaEletronica($pk_cabecera_factura_);
        $boleta = json_decode($datCBFT, true);

        // ===============================================================================================

        if ($boleta[0]["tipo_operacion"] == 'opExonerada' and $boleta[0]["serie"][0] == 'B') {

            //  echo $data_comprobante['txtITEM']."<br>";
            $listData["detalli"] = array();
            for ($i = 0; $i < count($boleta); $i++) {
                if ($boleta[$i]["codigo"] === 'SERVICIO') {
                    $tipope_unmdet = "ZZ";
                } else {
                    $tipope_unmdet = "NIU";
                }
                $cod_determinado = $boleta[$i]["pk_lote"] . "-" . $boleta[$i]["codigo"];

                $retorn = array(
                    "txtITEM" => $i + 1,
                    "txtUNIDAD_MEDIDA_DET" => $tipope_unmdet,
                    "txtCANTIDAD_DET" => $boleta[$i]["cantidad"],
                    "ICBPER_DET" => 0,
                    "txtPRECIO_DET" => $boleta[$i]["precio_venta_total"],
                    "txtSUB_TOTAL_DET" => $boleta[$i]["precio_venta_total"],
                    "txtPRECIO_TIPO_CODIGO" => "01",
                    "txtIGV" => "0",
                    "txtISC" => "0",
                    "txtIMPORTE_DET" => $boleta[$i]["precio_venta_total"],
                    "txtCOD_TIPO_OPERACION" => "20",
                    "txtCODIGO_DET" => $cod_determinado,
                    "txtDESCRIPCION_DET" => $boleta[$i]["descripcion"],
                    "txtPRECIO_SIN_IGV_DET" => $boleta[$i]["precio_venta_total"],
                );
                array_push($listData["detalli"], $retorn);
            }

            # code... EXONERADA
            $ruter = "/controladores/API_FACTURACION/api_facturacion/boleta.php";
            $data_comprobante_boleta__exo = array(

                //Cabecera del documento round_abad($boleta[0]['total']/1.18)
                "tipo_proceso" => "1",
                "tipo_operacion" => "0101",
                "total_gravadas" => "0",
                "total_inafecta" => "0",
                "total_exoneradas" => $boleta[0]['total'],
                "total_gratuitas" => "0",
                "total_exportacion" => "0",
                "total_descuento" => "0",
                "sub_total" => $boleta[0]['total'],
                "porcentaje_igv" => "18.00",
                "total_igv" => "0",
                "FACTOR_ICBPER" => '0.2', //para el 2019: 0.1, para el 2020: 0.2, para el 2021: 0.3, para el 2022: 0.4, para el 2023: 0.5, en adelante: 0.5
                "TOTAL_ICBPER" => 0,
                "total_isc" => "0",
                "total_otr_imp" => "0",
                "total" => $boleta[0]['total'],
                "total_letras" => $boleta[0]['total_letrado'],
                "nro_guia_remision" => "",
                "cod_guia_remision" => "",
                "nro_otr_comprobante" => "",
                "serie_comprobante" => $boleta[0]['serie'], //Para boletas la serie debe comenzar por la letra B,seguido de tres dígitos
                "numero_comprobante" => $boleta[0]['correlativo'],
                "fecha_comprobante" => $boleta[0]['fecha_contable'],
                "fecha_vto_comprobante" => $boleta[0]['fecha_vencimiento'],
                "cod_tipo_documento" => "03",
                "cod_moneda" => "PEN",

                //Datos del cliente
                "cliente_numerodocumento" => $boleta[0]['num_docu_identidad'],
                "cliente_nombre" => $boleta[0]['nombre_cliente'],
                "cliente_tipodocumento" => "1", //1: DNI
                "cliente_direccion" => $boleta[0]['direccion'],
                "cliente_pais" => "PE",
                "cliente_ciudad" => "PASCO",
                "cliente_codigoubigeo" => "",
                "cliente_departamento" => "",
                "cliente_provincia" => "",
                "cliente_distrito" => "",

                //data de la empresa emisora o contribuyente que entrega el documento electrónico.
                "emisor" => array(
                    "ruc" => "20601012597",
                    "tipo_doc" => "6",
                    "nom_comercial" => "MOALI",
                    "razon_social" => "EL LABORATORIO DE CAFE MOALI SOCIEDAD ANONIMA CERRADA - EL LABORATORIO DE CAFE MOALI S.A.C.",
                    "codigo_ubigeo" => "190307",
                    "direccion" => "JR. POZUZO 353 40 MTS DE EX CINE LEON",
                    "direccion_departamento" => "PASCO",
                    "direccion_provincia" => "OXAPAMPA",
                    "direccion_distrito" => "VILLA RICA",
                    "direccion_codigopais" => "PE",
                    "usuariosol" => "MOALIAPI",
                    "clavesol" => "qweQWE123@@@",
                ),

                //items del documento
                "detalle" => $listData["detalli"],
            );
            $data_json = json_encode($data_comprobante_boleta__exo);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $ruter);
            curl_setopt(
                $ch,
                CURLOPT_HTTPHEADER,
                array(
                    'Authorization: Token token="' . $token . '"',
                    'Content-Type: application/json',
                )
            );
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $respuesta = curl_exec($ch);
            curl_close($ch);
            // echo $respuesta;
            // exit();
            $response = json_decode($respuesta, true);

            // echo "=========== DATA RETORNO =============== ";
            // echo "<br /><br />respuesta    : ".$response['respuesta'];
            // echo "<br /><br />url_xml    : ".$response['url_xml'];
            // echo "<br /><br />hash_cpe    : ".$response['hash_cpe'];
            // echo "<br /><br />hash_cdr    : ".$response['hash_cdr'];
            // echo "<br /><br />msj_sunat    : ".$response['msj_sunat'];
            // echo "<br /><br />ruta_cdr    : .../".$response['ruta_cdr'];
            // echo "<br /><br />ruta_pdf    : ".$response['ruta_pdf'];
            $id = $pk_cabecera_factura_;
            $cpe = $response['hash_cpe'];
            $cdr = $response['hash_cdr'];
            $data_send_json = $data_comprobante_boleta__exo;
            $ruta_xml = $response['url_xml'];
            $respuesta_sunat = $response['respuesta'];

            // Update a comprobante para CPE / CDR / data_send_json  /  ruta_xml
            $update_estado = $pagoObj->update_send_sunat_comprobante_b_f($id, $cpe, $cdr, $data_json, $ruta_xml, $respuesta_sunat, $respuesta);

            if ($response['respuesta'] == "ok") {
                echo '<i class="fa fa-circle bolaVerde" id="bola_fact_bpm3" aria-hidden="true"></i>';
            } else {
                echo '<i class="fa fa-circle bolaRoja" id="bola_fact_bpm3" aria-hidden="true"></i>';
            }
        } else if ($boleta[0]["tipo_operacion"] == 'opExonerada' and $boleta[0]["serie"][0] == 'F') {

            //  echo $data_comprobante['txtITEM']."<br>";
            $listData["detalli"] = array();
            for ($i = 0; $i < count($boleta); $i++) {
                if ($boleta[$i]["codigo"] === 'SERVICIO') {
                    $tipope_unmdet = "ZZ";
                } else {
                    $tipope_unmdet = "NIU";
                }
                $cod_determinado = $boleta[$i]["pk_lote"] . "-" . $boleta[$i]["codigo"];

                $retorn = array(
                    "txtITEM" => $i + 1,
                    "txtUNIDAD_MEDIDA_DET" => $tipope_unmdet,
                    "txtCANTIDAD_DET" => $boleta[$i]["cantidad"],
                    "ICBPER_DET" => 0,
                    "txtPRECIO_DET" => $boleta[$i]["precio_venta_total"],
                    "txtSUB_TOTAL_DET" => $boleta[$i]["precio_venta_total"],
                    "txtPRECIO_TIPO_CODIGO" => "01",
                    "txtIGV" => "0",
                    "txtISC" => "0",
                    "txtIMPORTE_DET" => $boleta[$i]["precio_venta_total"],
                    "txtCOD_TIPO_OPERACION" => "20",
                    "txtCODIGO_DET" => $cod_determinado,
                    "txtDESCRIPCION_DET" => $boleta[$i]["descripcion"],
                    "txtPRECIO_SIN_IGV_DET" => $boleta[$i]["precio_venta_total"],
                );

                array_push($listData["detalli"], $retorn);
            }

            # code... EXONERADA
            $ruter = "/controladores/API_FACTURACION/api_facturacion/factura.php";
            $data_comprobante_boleta__exo = array(

                //Cabecera del documento round_abad($boleta[0]['total']/1.18)
                "tipo_proceso" => "1",
                "tipo_operacion" => "0101",
                "total_gravadas" => "0",
                "total_inafecta" => "0",
                "total_exoneradas" => $boleta[0]['total'],
                "total_gratuitas" => "0",
                "total_exportacion" => "0",
                "total_descuento" => "0",
                "sub_total" => $boleta[0]['total'],
                "porcentaje_igv" => "18.00",
                "total_igv" => "0",
                "FACTOR_ICBPER" => '0.2', //para el 2019: 0.1, para el 2020: 0.2, para el 2021: 0.3, para el 2022: 0.4, para el 2023: 0.5, en adelante: 0.5
                "TOTAL_ICBPER" => 0,
                "total_isc" => "0",
                "total_otr_imp" => "0",
                "total" => $boleta[0]['total'],
                "total_letras" => $boleta[0]['total_letrado'],
                "nro_guia_remision" => "",
                "cod_guia_remision" => "",
                "nro_otr_comprobante" => "",
                "serie_comprobante" => $boleta[0]['serie'], //Para boletas la serie debe comenzar por la letra B,seguido de tres dígitos
                "numero_comprobante" => $boleta[0]['correlativo'],
                "fecha_comprobante" => $boleta[0]['fecha_contable'],
                "fecha_vto_comprobante" => $boleta[0]['fecha_vencimiento'],
                "cod_tipo_documento" => "01",
                "cod_moneda" => "PEN",

                //Datos del cliente
                "cliente_numerodocumento" => $boleta[0]['num_docu_identidad'],
                "cliente_nombre" => $boleta[0]['nombre_cliente'],
                "cliente_tipodocumento" => "6", //6: RUC
                "cliente_direccion" => $boleta[0]['direccion'],
                "cliente_pais" => "PE",
                "cliente_ciudad" => "",
                "cliente_codigoubigeo" => "",
                "cliente_departamento" => "",
                "cliente_provincia" => "",
                "cliente_distrito" => "",

                //data de la empresa emisora o contribuyente que entrega el documento electrónico.
                "emisor" => array(
                    "ruc" => "20601012597",
                    "tipo_doc" => "6",
                    "nom_comercial" => "MOALI",
                    "razon_social" => "EL LABORATORIO DE CAFE MOALI SOCIEDAD ANONIMA CERRADA - EL LABORATORIO DE CAFE MOALI S.A.C.",
                    "codigo_ubigeo" => "190307",
                    "direccion" => "JR. POZUZO 353 40 MTS DE EX CINE LEON",
                    "direccion_departamento" => "PASCO",
                    "direccion_provincia" => "OXAPAMPA",
                    "direccion_distrito" => "VILLA RICA",
                    "direccion_codigopais" => "PE",
                    "usuariosol" => "MOALIAPI",
                    "clavesol" => "qweQWE123@@@",
                ),

                //items del documento
                "detalle" => $listData["detalli"],
            );
            $data_json = json_encode($data_comprobante_boleta__exo);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $ruter);
            curl_setopt(
                $ch,
                CURLOPT_HTTPHEADER,
                array(
                    'Authorization: Token token="' . $token . '"',
                    'Content-Type: application/json',
                )
            );
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $respuesta = curl_exec($ch);
            curl_close($ch);
            // echo $respuesta;
            // exit();
            $response = json_decode($respuesta, true);

            // echo "=========== DATA RETORNO =============== ";
            // echo "<br /><br />respuesta    : ".$response['respuesta'];
            // echo "<br /><br />url_xml    : ".$response['url_xml'];
            // echo "<br /><br />hash_cpe    : ".$response['hash_cpe'];
            // echo "<br /><br />hash_cdr    : ".$response['hash_cdr'];
            // echo "<br /><br />msj_sunat    : ".$response['msj_sunat'];
            // echo "<br /><br />ruta_cdr    : .../".$response['ruta_cdr'];
            // echo "<br /><br />ruta_pdf    : ".$response['ruta_pdf'];
            $id = $pk_cabecera_factura_;
            $cpe = $response['hash_cpe'];
            $cdr = $response['hash_cdr'];
            $data_send_json = $data_comprobante_boleta__exo;
            $ruta_xml = $response['url_xml'];
            $respuesta_sunat = $response['respuesta'];

            // Update a comprobante para CPE / CDR / data_send_json  /  ruta_xml
            $update_estado = $pagoObj->update_send_sunat_comprobante_b_f($id, $cpe, $cdr, $data_json, $ruta_xml, $respuesta_sunat, $respuesta);

            if ($response['respuesta'] == "ok") {
                echo '<i class="fa fa-circle bolaVerde" id="bola_fact_bpm3" aria-hidden="true"></i>';
            } else {
                echo '<i class="fa fa-circle bolaRoja" id="bola_fact_bpm3" aria-hidden="true"></i>';
            }
        } else if ($boleta[0]["tipo_operacion"] == 'opGravada' and $boleta[0]["serie"][0] == 'F') {
            //  echo $data_comprobante['txtITEM']."<br>";
            $listData["detalli"] = array();
            for ($i = 0; $i < count($boleta); $i++) {
                if ($boleta[$i]["codigo"] === 'SERVICIO') {
                    $tipope_unmdet = "ZZ";
                } else {
                    $tipope_unmdet = "NIU";
                }
                $cod_determinado = $boleta[$i]["pk_lote"] . "-" . $boleta[$i]["codigo"];

                $retorn = array(
                    "txtITEM" => $i + 1,
                    "txtUNIDAD_MEDIDA_DET" => $tipope_unmdet,
                    "txtCANTIDAD_DET" => $boleta[$i]["cantidad"],
                    "ICBPER_DET" => 0,
                    "txtPRECIO_DET" => round_abad(($boleta[$i]["precio_venta_total"] * 0.18) + $boleta[$i]["precio_venta_total"]),
                    "txtSUB_TOTAL_DET" => $boleta[$i]["precio_venta_total"],
                    "txtPRECIO_TIPO_CODIGO" => "01",
                    "txtIGV" => round_abad($boleta[$i]["precio_venta_total"] * 0.18),
                    "txtISC" => "0",
                    "txtIMPORTE_DET" => $boleta[$i]["precio_venta_total"],
                    "txtCOD_TIPO_OPERACION" => "10",
                    "txtCODIGO_DET" => $cod_determinado,
                    "txtDESCRIPCION_DET" => $boleta[$i]["descripcion"],
                    "txtPRECIO_SIN_IGV_DET" => $boleta[$i]["precio_venta_total"],
                );

                array_push($listData["detalli"], $retorn);
            }

            # code... EXONERADA
            $ruter = "/controladores/API_FACTURACION/api_facturacion/factura.php";
            $data_comprobante_boleta__exo = array(

                //Cabecera del documento round_abad($boleta[0]['total']/1.18)
                "tipo_proceso" => "1",
                "tipo_operacion" => "0101",
                "total_gravadas" => $boleta[0]['total_gravada'],
                "total_inafecta" => "0",
                "total_exoneradas" => "0",
                "total_gratuitas" => "0",
                "total_exportacion" => "0",
                "total_descuento" => "0",
                "sub_total" => $boleta[0]['total_gravada'],
                "porcentaje_igv" => "18.00",
                "total_igv" => $boleta[0]['igv'],
                "FACTOR_ICBPER" => '0.2', //para el 2019: 0.1, para el 2020: 0.2, para el 2021: 0.3, para el 2022: 0.4, para el 2023: 0.5, en adelante: 0.5
                "TOTAL_ICBPER" => 0,
                "total_isc" => "0",
                "total_otr_imp" => "0",
                "total" => $boleta[0]['total'],
                "total_letras" => $boleta[0]['total_letrado'],
                "nro_guia_remision" => "",
                "cod_guia_remision" => "",
                "nro_otr_comprobante" => "",
                "serie_comprobante" => $boleta[0]['serie'], //Para boletas la serie debe comenzar por la letra B,seguido de tres dígitos
                "numero_comprobante" => $boleta[0]['correlativo'],
                "fecha_comprobante" => $boleta[0]['fecha_contable'],
                "fecha_vto_comprobante" => $boleta[0]['fecha_vencimiento'],
                "cod_tipo_documento" => "01",
                "cod_moneda" => "PEN",

                //Datos del cliente
                "cliente_numerodocumento" => $boleta[0]['num_docu_identidad'],
                "cliente_nombre" => $boleta[0]['nombre_cliente'],
                "cliente_tipodocumento" => "6", //6: RUC
                "cliente_direccion" => $boleta[0]['direccion'],
                "cliente_pais" => "PE",
                "cliente_ciudad" => "",
                "cliente_codigoubigeo" => "",
                "cliente_departamento" => "",
                "cliente_provincia" => "",
                "cliente_distrito" => "",

                //data de la empresa emisora o contribuyente que entrega el documento electrónico.
                "emisor" => array(
                    "ruc" => "20601012597",
                    "tipo_doc" => "6",
                    "nom_comercial" => "MOALI",
                    "razon_social" => "EL LABORATORIO DE CAFE MOALI SOCIEDAD ANONIMA CERRADA - EL LABORATORIO DE CAFE MOALI S.A.C.",
                    "codigo_ubigeo" => "190307",
                    "direccion" => "JR. POZUZO 353 40 MTS DE EX CINE LEON",
                    "direccion_departamento" => "PASCO",
                    "direccion_provincia" => "OXAPAMPA",
                    "direccion_distrito" => "VILLA RICA",
                    "direccion_codigopais" => "PE",
                    "usuariosol" => "MOALIAPI",
                    "clavesol" => "qweQWE123@@@",
                ),

                //items del documento
                "detalle" => $listData["detalli"],
            );
            $data_json = json_encode($data_comprobante_boleta__exo);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $ruter);
            curl_setopt(
                $ch,
                CURLOPT_HTTPHEADER,
                array(
                    'Authorization: Token token="' . $token . '"',
                    'Content-Type: application/json',
                )
            );
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $respuesta = curl_exec($ch);
            curl_close($ch);
            // echo $respuesta;
            // exit();
            $response = json_decode($respuesta, true);

            // echo "=========== DATA RETORNO =============== ";
            // echo "<br /><br />respuesta    : ".$response['respuesta'];
            // echo "<br /><br />url_xml    : ".$response['url_xml'];
            // echo "<br /><br />hash_cpe    : ".$response['hash_cpe'];
            // echo "<br /><br />hash_cdr    : ".$response['hash_cdr'];
            // echo "<br /><br />msj_sunat    : ".$response['msj_sunat'];
            // echo "<br /><br />ruta_cdr    : .../".$response['ruta_cdr'];
            // echo "<br /><br />ruta_pdf    : ".$response['ruta_pdf'];
            $id = $pk_cabecera_factura_;
            $cpe = $response['hash_cpe'];
            $cdr = $response['hash_cdr'];
            $data_send_json = $data_comprobante_boleta__exo;
            $ruta_xml = $response['url_xml'];
            $respuesta_sunat = $response['respuesta'];

            // Update a comprobante para CPE / CDR / data_send_json  /  ruta_xml
            $update_estado = $pagoObj->update_send_sunat_comprobante_b_f($id, $cpe, $cdr, $data_json, $ruta_xml, $respuesta_sunat, $respuesta);

            if ($response['respuesta'] == "ok") {
                echo '<i class="fa fa-circle bolaVerde" id="bola_fact_bpm3" aria-hidden="true"></i>';
            } else {
                echo '<i class="fa fa-circle bolaRoja" id="bola_fact_bpm3" aria-hidden="true"></i>';
            }
        } else if ($boleta[0]["tipo_operacion"] == 'opGravada' and $boleta[0]["serie"][0] == 'B') {
            //  echo $data_comprobante['txtITEM']."<br>";
            $listData["detalli"] = array();
            for ($i = 0; $i < count($boleta); $i++) {
                if ($boleta[$i]["codigo"] === 'SERVICIO') {
                    $tipope_unmdet = "ZZ";
                } else {
                    $tipope_unmdet = "NIU";
                }
                $cod_determinado = $boleta[$i]["pk_lote"] . "-" . $boleta[$i]["codigo"];

                $retorn = array(
                    "txtITEM" => $i + 1,
                    "txtUNIDAD_MEDIDA_DET" => $tipope_unmdet,
                    "txtCANTIDAD_DET" => $boleta[$i]["cantidad"],
                    "ICBPER_DET" => 0,
                    "txtPRECIO_DET" => round_abad(($boleta[$i]["precio_venta_total"] * 0.18) + $boleta[$i]["precio_venta_total"]),
                    "txtSUB_TOTAL_DET" => $boleta[$i]["precio_venta_total"],
                    "txtPRECIO_TIPO_CODIGO" => "01",
                    "txtIGV" => round_abad($boleta[$i]["precio_venta_total"] * 0.18),
                    "txtISC" => "0",
                    "txtIMPORTE_DET" => $boleta[$i]["precio_venta_total"],
                    "txtCOD_TIPO_OPERACION" => "10",
                    "txtCODIGO_DET" => $cod_determinado,
                    "txtDESCRIPCION_DET" => $boleta[$i]["descripcion"],
                    "txtPRECIO_SIN_IGV_DET" => $boleta[$i]["precio_venta_total"],
                );

                array_push($listData["detalli"], $retorn);
            }

            # code... EXONERADA
            $ruter = "/controladores/API_FACTURACION/api_facturacion/factura.php";
            $data_comprobante_boleta__exo = array(

                //Cabecera del documento round_abad($boleta[0]['total']/1.18)
                "tipo_proceso" => "1",
                "tipo_operacion" => "0101",
                "total_gravadas" => $boleta[0]['total_gravada'],
                "total_inafecta" => "0",
                "total_exoneradas" => "0",
                "total_gratuitas" => "0",
                "total_exportacion" => "0",
                "total_descuento" => "0",
                "sub_total" => $boleta[0]['total_gravada'],
                "porcentaje_igv" => "18.00",
                "total_igv" => $boleta[0]['igv'],
                "FACTOR_ICBPER" => '0.2', //para el 2019: 0.1, para el 2020: 0.2, para el 2021: 0.3, para el 2022: 0.4, para el 2023: 0.5, en adelante: 0.5
                "TOTAL_ICBPER" => 0,
                "total_isc" => "0",
                "total_otr_imp" => "0",
                "total" => $boleta[0]['total'],
                "total_letras" => $boleta[0]['total_letrado'],
                "nro_guia_remision" => "",
                "cod_guia_remision" => "",
                "nro_otr_comprobante" => "",
                "serie_comprobante" => $boleta[0]['serie'], //Para boletas la serie debe comenzar por la letra B,seguido de tres dígitos
                "numero_comprobante" => $boleta[0]['correlativo'],
                "fecha_comprobante" => $boleta[0]['fecha_contable'],
                "fecha_vto_comprobante" => $boleta[0]['fecha_vencimiento'],
                "cod_tipo_documento" => "03",
                "cod_moneda" => "PEN",

                //Datos del cliente
                "cliente_numerodocumento" => $boleta[0]['num_docu_identidad'],
                "cliente_nombre" => $boleta[0]['nombre_cliente'],
                "cliente_tipodocumento" => "1", //1: DNI
                "cliente_direccion" => $boleta[0]['direccion'],
                "cliente_pais" => "PE",
                "cliente_ciudad" => "",
                "cliente_codigoubigeo" => "",
                "cliente_departamento" => "",
                "cliente_provincia" => "",
                "cliente_distrito" => "",

                //data de la empresa emisora o contribuyente que entrega el documento electrónico.
                "emisor" => array(
                    "ruc" => "20601012597",
                    "tipo_doc" => "6",
                    "nom_comercial" => "MOALI",
                    "razon_social" => "EL LABORATORIO DE CAFE MOALI SOCIEDAD ANONIMA CERRADA - EL LABORATORIO DE CAFE MOALI S.A.C.",
                    "codigo_ubigeo" => "190307",
                    "direccion" => "JR. POZUZO 353 40 MTS DE EX CINE LEON",
                    "direccion_departamento" => "PASCO",
                    "direccion_provincia" => "OXAPAMPA",
                    "direccion_distrito" => "VILLA RICA",
                    "direccion_codigopais" => "PE",
                    "usuariosol" => "MOALIAPI",
                    "clavesol" => "qweQWE123@@@",
                ),

                //items del documento
                "detalle" => $listData["detalli"],
            );
            $data_json = json_encode($data_comprobante_boleta__exo);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $ruter);
            curl_setopt(
                $ch,
                CURLOPT_HTTPHEADER,
                array(
                    'Authorization: Token token="' . $token . '"',
                    'Content-Type: application/json',
                )
            );
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $respuesta = curl_exec($ch);
            curl_close($ch);
            // echo $respuesta;
            // exit();
            $response = json_decode($respuesta, true);

            // echo "=========== DATA RETORNO =============== ";
            // echo "<br /><br />respuesta    : ".$response['respuesta'];
            // echo "<br /><br />url_xml    : ".$response['url_xml'];
            // echo "<br /><br />hash_cpe    : ".$response['hash_cpe'];
            // echo "<br /><br />hash_cdr    : ".$response['hash_cdr'];
            // echo "<br /><br />msj_sunat    : ".$response['msj_sunat'];
            // echo "<br /><br />ruta_cdr    : .../".$response['ruta_cdr'];
            // echo "<br /><br />ruta_pdf    : ".$response['ruta_pdf'];

            $id = $pk_cabecera_factura_;
            $cpe = $response['hash_cpe'];
            $cdr = $response['hash_cdr'];
            $data_send_json = $data_comprobante_boleta__exo;
            $ruta_xml = $response['url_xml'];
            $respuesta_sunat = $response['respuesta'];

            // Update a comprobante para CPE / CDR / data_send_json  /  ruta_xml
            $update_estado = $pagoObj->update_send_sunat_comprobante_b_f($id, $cpe, $cdr, $data_json, $ruta_xml, $respuesta_sunat, $respuesta);

            if ($response['respuesta'] == "ok") {
                echo '<i class="fa fa-circle bolaVerde" id="bola_fact_bpm3" aria-hidden="true"></i>';
            } else {
                echo '<i class="fa fa-circle bolaRoja" id="bola_fact_bpm3" aria-hidden="true"></i>';
            }
        } else {
            echo "Error int caj cont line 833";
        }

        // echo '<i class="fa fa-circle bolaVerde" id="bola_fact_bpm3" aria-hidden="true"></i>';

        break;
    // ------------------------------------------------------------------------------------------------------------------------------
    default:
        # code...
        break;
}

?>