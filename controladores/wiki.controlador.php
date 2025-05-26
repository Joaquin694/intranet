<?php
date_default_timezone_set('America/Lima');
session_start();

include '../modelos/wiki.modelo.php';
switch ($_POST['accion']) {
	case 'ingresos_y_egresos':
            ?>
                <div class="box-header with-border">
                    <h5 id="cabezaFactGeneral" class="titulitononegroT" style="background: white;border: 5px solid #fbf9f9;padding: 25px;font-size: 20px">
                    
                        <i id="flySedeM" class="fa fa-long-arrow-right stpFly" aria-hidden="true"></i><b> Facturación: </b>
                        <span style="font-size: 16.5px">Seleccionar rango fecha:
                        <input type="text" name="datefilter" value="" style="outline:0px;background: transparent;border: 0px;border-bottom: 1px solid #3ec0ef;color: #1b65a5;width: 200px !important" />
                        <a href="#" id="btnBuscar"><img src="vistas/img/plantilla/buscar.png" style="width: 30px"></a>
                        </span>
                    </h5>
                    </div>
            <?php


                if(strlen($_POST['fechaInicio'])>0){
                    $fechaini=$_POST['fechaInicio'];
                    $fechafin=$_POST['fechaFinal'];
                }else{
                        $date_now = date('Y-m-d'); $date_past = strtotime('-1 day', strtotime($date_now));    $fechaini = date('Y-m-d', $date_past);    
                        $fechafin=date('Y-m-d');
                }

            $getData = new CobroVenta();
            echo $getData->getPagosEfectuados($fechaini,$fechafin);
            ?>
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
                                <hr>
                                <div class="razon_social" style="width:100%"><b>RAZON SOCIAL NOMBRE LARGO PRUEBA</b></div>
                                <div style="width:100%">RUC: <span class="ruc">20600000000</span></div>
                                <div class="direccion" style="width:100%">DIRECCION DE EMPRESA MUY LARGO PARA DMO</div>
                                <hr>
                            </div>
                            <div class="col-sm-4 text-center">
                                <div style="width:100%;border: 1px solid;padding: 5px 13px;margin-top: 10px;">
                                <div class="h4 text-center">COMPROBANTE DE COMPRA</div>
                                <div class="h4"><span class="serie_compra">F002</span> - <span class="numero_compra">65456</span></div>
                                <div>FECHA: <span class="fecha_compra">65456</span></div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <b>CLIENTE:</b> <span class="razon_moali" style="border-bottom:1px solid #000">MOALI</span>
                            </div>
                            <div class="col-sm-4">
                                <b>RUC:</b> <span class="ruc_moali" style="border-bottom:1px solid #000">10456419899</span>
                            </div>
                            <div class="col-sm-12">
                                <b>DIRECCCION:</b> <span class="direccion_moali" style="border-bottom:1px solid #000">DIRECCION MOALI</span>
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
                            <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                        </div>
                    </div>
                    </div>
                </div>
                <script type="text/javascript">
                            function noview(id){
                            var id= id;
                            $("#"+id).addClass("d-none");
                            }
                            function pinta_filas(idBpm){
                                $("tr").removeClass("painttr");
                                $("#"+idBpm).addClass("painttr");
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
                                daysOfWeek: ["Do","Lu","Ma","Mi","Ju","Vi","Sa"],
                                monthNames: ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Setiembre","Octubre","Noviembre","Diciembre"],
                                "firstDay": 1
                                }
                            });  $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
                                $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
                            });  $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
                                $(this).val('');
                            });
                            });
                            /*DETECTA  CLICK ON BUSCAR*/
                            function listatabla(){
                            
                            var datefilter= $('input[name=datefilter]').val();


                           
                            var cnStringb=datefilter.length;
                            if ((cnStringb>0)){
                                $(".spinerGiration2").removeClass("d-none");
                                var fechaInicio=datefilter.split(' - ')[0];
                                var fechaFinal=datefilter.split(' - ')[1];
                                var cod='ingresos_y_egresos';

                                 var dataen ='fechaInicio=' +fechaInicio+
                                '&fechaFinal=' +fechaFinal+
                                '&accion='+cod;
                                $.ajax({
                                type: 'post',
                                url:'controladores/wiki.controlador.php',
                                data:dataen,
                                success:function(resp){
                                    $("#cuerpito_tabla").html(resp);
                                    $(".spinerGiration2").addClass("d-none");
                                }
                                });
                                return false;
                            }else{
                                swal({
                                title: "¡Hey!",
                                text: "Debes seleccionar una fecha",
                                imageUrl: 'vistas/img/plantilla/exclamation.png'
                                });
                            }
                            }
                            $("#buscar,#btnBuscar").click(function(){
                            listatabla();
                            });
                            $(".labelradioso").click(function(){
                            $("#cuerpito_tabla>table").addClass("d-none");
                            });
                            $("#cuerpito_tabla").on("click", ".btnviewpago", function(){
                            let id_compra = this.dataset.id;
                            $.ajax({
                                type: 'post',
                                url:'controladores/compras.controlador.php',
                                data:{accion:'load_deuda_compra',id_compra:id_compra},
                                success:function(resp){
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
                                    $("#pago_monto").attr('max',parseFloat(data.total_deuda).toFixed(2))

                                    if (data.deuda.length > 0) {
                                    $("#tbpagos").show()
                                    var dd = '';
                                    data.deuda.map(function(elm){
                                        dd += `<tr>
                                        <td>${elm.metodo_pago}</td>
                                        <td>${elm.referencia_pago}</td>
                                        <td>${elm.fecha_pago}</td>
                                        <td>${elm.monto_pago}</td>
                                        <td>${elm.proveedor_documento}</td>
                                        <td>${elm.proveedor_nombre}</td>
                                        <td>${elm.descripcion_pago}</td>
                                        </tr>`;
                                    });
                                    $("#table_cobro_venta").html(dd)
                                    }else {
                                    $("#tbpagos").hide()
                                    $("#table_cobro_venta").html('');
                                    }
                                    if (data.total_deuda>0) {
                                    $(".mps").show()
                                    }else {
                                    $(".mps").hide()
                                    }
                                    $('#modalbolsa').modal('show')
                                }
                                //$("#cuerpito_tabla").html(resp);
                                //$(".spinerGiration2").addClass("d-none");
                                }
                            });
                            });
                            $('#formAddPago').on('focusout','#pago_monto', function(){
                            this.value = parseFloat(this.value).toFixed(2);
                            });
                            $(document).on('click','.btnviewdetalle', function(){
                            let id_compra = this.dataset.id;
                            $.ajax({
                                type: 'post',
                                url:'controladores/compras.controlador.php',
                                data:{accion:'load_detalle_compra',id_compra:id_compra},
                                success:function(resp){
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
                                        data.tr_detalle_compra.map(function(elm){
                                        dd += `<tr>
                                        <td>${elm.cantidad_compra}</td>
                                        <td>${elm.unidad_compra}</td>
                                        <td>${elm.descripcion_compra}</td>
                                        <td>${elm.valor_compra}</td>
                                        <td>${elm.total_compra}</td>
                                        </tr>`;
                                        });
                                        $("#tr_detalle_compra").html(dd)
                                    }else {
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

                            formAddPago.onsubmit = function(e) {
                            e.preventDefault();
                            $.ajax({
                                type: 'post',
                                url:'controladores/compras.controlador.php',
                                data:$('#formAddPago').serialize(),
                                success:function(respuesta){
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
                                }else {
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
                                tr>td{font-size: 12px}
                                tr>th{color: #234983;background:  white !important;font-size: 10.5px;font-weight: 500}    .pastillitasradiosas{
                                background: #63a03c;
                                border-radius: 10px;
                                padding: 2px 10px;
                                color: #ffffff;
                                width: 250px;
                                font-weight: 500 !important;font-size: 15px;cursor:pointer; cursor: hand;
                                margin-right: 10px;
                                }
                                .pastillitasradiosas>label,.pastillitasradiosas>input{font-weight: 400;cursor:pointer; cursor: hand}
                                .painttr{background: rgba(99, 160, 60, 0.45) !important;}
                            </style>

            <?php
	break;
	// -------------------------------------------
	default:
		# code...
		echo "FOUNDsssssssssssssssssssssssssssssssssssssssssssss";
		break;
}
