<div class="content-wrapper">
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h5 id="cabezaFactGeneral" class="titulitononegroT" style="background: white;border: 5px solid #fbf9f9;padding: 25px;font-size: 20px">

                    <i id="flySedeM" class="fa fa-long-arrow-right stpFly" aria-hidden="true"></i><b> Gastos: </b>


                    <span style="font-size: 16.5px">Seleccionar rango fecha:
                        <input type="text" name="datefilter" value="" style="outline:0px;background: transparent;border: 0px;border-bottom: 1px solid #3ec0ef;color: #1b65a5;width: 200px !important" />
                        <a href="#" id="btnBuscar"><img src="vistas/img/plantilla/buscar.png" style="width: 30px"></a>
                    </span>
                    <!-- <div class="input-group" style="margin-bottom: 10px;float: right;">
                        <div>
                            <span class="pastillitasradiosas">
                                <input type="radio" id="rdbtBoletas" name="contact" value="B" class="rdbtBoletas">
                                <label for="rdbtBoletas" class="rdbtBoletas">Gastos registrados*</label>
                            </span>

                            <span class="pastillitasradiosas" style="background: #c6b30b !important">
                                <input type="radio" id="rdbtrdbtPagosEfetuados" name="contact" value="pagos_efectuados" class="rdbtPagosEfetuados">
                                <label for="rdbtPagosEfetuados" class="rdbtPagosEfetuados">Pagos Efectuados</label>
                            </span>
                        </div>
                    </div> -->
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
<script>
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

    $("#buscar,#btnBuscar").click(function() {
        listatabla();
    });

    function listatabla() {
        var datefilter = $('input[name=datefilter]').val();
        var cod = 'list_remision'
        console.log('fecha filter : '+datefilter);

        var cnStringb = datefilter.length;
        if (cnStringb > 0) {
            $(".spinerGiration2").removeClass("d-none");
            var fechaInicio = datefilter.split(' - ')[0];
            var fechaFinal = datefilter.split(' - ')[1];

            console.log('fecha inicion : '+fechaInicio);
            console.log('fecha fin : '+fechaFinal);

            var dataen = 'fechaInicio=' + fechaInicio +
                '&fechaFinal=' + fechaFinal +
                '&accion=' + cod;
            $.ajax({
                type: 'post',
                url: 'controladores/guia-remision.controlador.php',
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
</script>