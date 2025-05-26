<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" /> -->

<style>
    .autocompletar {
        position: relative;
    }

    .lista-autocompletar-items {
        position: absolute;
        border: 1px solid #d4d4d4;
        border-top: none;
        z-index: 99;
        top: 100%;
        left: 0;
        right: 0;
        max-height: 200px;
        overflow-y: auto;
        background-color: white;
    }

    .lista-autocompletar-items div {
        padding: 10px;
        cursor: pointer;
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

    .modal-fullscreen {
        width: 100%;
        max-width: none;
        margin: 0;
    }

    .wizard-card[data-color="red"] .moving-tab {
        position: absolute;
        margin-top: 90px;
        -webkit-font-smoothing: subpixel-antialiased;
        background-color: #250126;
        top: -4px;
        left: 0px;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 500;
    }

    .moving-tab {
        height: 5px;
        line-height: 5px;
    }

    .wizard-card .nav-wizar {
        height: 5px;
        line-height: 5px;
        padding: 0;
    }

    .wizard-card .picture input[type="file"] {
        cursor: pointer;
        display: block;
        height: 100%;
        left: 0;
        opacity: 0 !important;
        position: absolute;
        top: 0;
        width: 100%;
    }

    .wizard-card .picture-src {
        width: 100%;
    }

    .wizard-card .tab-content {
        min-height: 340px;
        padding: 20px 15px;
    }

    .wizard-card .wizard-footer {
        padding: 15px;
        height: 100px;
    }

    .wizard-card .wizard-footer .checkbox {
        margin-top: 16px;
    }

    .wizard-card .disabled {
        display: none;
    }

    .wizard-card .wizard-header {
        text-align: center;
        padding: 25px 0 35px;
    }

    .wizard-card .wizard-header h5 {
        margin: 5px 0 0;
    }

    .wizard-card .nav-pills>li {
        text-align: center;
    }

    .wizard-card .btn {
        text-transform: uppercase;
    }

    .wizard-card .info-text {
        margin: 10px 0 30px;
    }

    .wizard-card .btn-finish {
        display: none;
    }

    .wizard-card .description {
        color: #999999;
        font-size: 14px;
    }

    .wizard-card .wizard-title {
        margin: 0;
        color: #250126;
    }

    .nav-pills>li+li {
        margin-left: 0;
    }

    .nav-pills>li>a {
        border: 0 !important;
        border-radius: 18px;
        line-height: 18px;
        color: #555555 !important;
        background-color: rgba(37, 1, 38, 0.5);
    }

    .nav-pills>li.active>a,
    .nav-pills>li.active>a:hover,
    .nav-pills>li.active>a:focus,
    .nav-pills>li>a:hover,
    .nav-pills>li>a:focus {
        background-color: inherit;
    }

    .nav-pills>li i {
        display: block;
        font-size: 30px;
        padding: 15px 0;
    }

    .btn-pull {
        background: #250126;
        color: #fff;
    }

    .pastel-inicial {
        background-color: #e6f7ff;
    }

    .pastel-firmada {
        background-color: #fff4e6;
    }

    .required::after {
        content: "*";
        color: red;
    }

    .optional {
        background-color: #f9f9f9;
    }

    th.pastel-inicial {
        background: #3d7d9c !important;
    }

    th.pastel-firmada {
        background: #fea22c;
    }


    .floating-btn {
        position: absolute;
        top: 80px; /* Ajuste la posición según lo necesites */
        right: 20px;
        color: #337ab7 !important;
        background-color: white !important;
        border: none;
        border-radius: 50px;
        padding: 15px 30px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        z-index: 1000;
        transition: background-color 0.3s, transform 0.3s;
    }

    .floating-btn:hover {
        color: #337ab7 !important;
        background-color: white !important;
        transform: translateY(-3px);
    }

    .floating-btn i {
        margin-right: 8px;
    }
</style>
<button class="floating-btn" onclick="openSunatWindow()">
    <i class="fa fa-lock"></i> Generar guía en  Sunat <img src="vistas/img/SUNAT.png" style='width: 25px !important'>
</button>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Gestión de Guías y Documentación de Prestación de Servicio
            <!-- <small>Gestión y programación de mantenimientos</small> -->
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Guía de remision</li>
        </ol>
    </section>
    <?php
    require_once "modelos/plan-mantenimiento.modelo.php";
    require_once "controladores/plan-mantenimiento.controlador.php";

    $ControladorPlanMantennimiento = new ControladorPlanMantenimiento();

    ?>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarGuiaRemision">
                            <i class="fa fa-plus-square"></i> Agregar Plan
                        </button>
                    </div>
                    <div class="box-body">
                        <div class="table-container">
                            <table id="tabla_guia_remi" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Ruc de cliente</th>
                                        <th>Razon social</th>
                                        <th>Doc. MTC</th>
                                        <th>Guía Remitente (Inicial)</th>
                                        <th>Guía Transportista (Inicial)</th>
                                        <th>Guía Remitente (Firmada)</th>
                                        <th>Guía Transportista (Firmada)</th>
                                        <th>Fotos evidencia (Carga)</th>
                                        <th>Fotos evidencia (Descarga)</th>
                                        <th>Observaciones</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div id="modalAgregarGuiaRemision" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 99%;">
        <div class="modal-content container-fluid">
            <form class="row" role="form" id="formGuiaRemision" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Gestión de Guías y Documentación de Prestación de Servicio</h4>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12 form-group">
                        <div class="col-lg-6 form-group">
                            <label for="ruc_cliente">RUC Cliente:</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" id="ruc_cliente" name="ruc_cliente" required>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="razon_social">Razón Social:</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" id="razon_social" name="razon_social" required>
                        </div>
                    </div>
                    <div class="col-lg-12 form-group">
                        <div class="col-lg-12 form-group">
                            <div class="col-lg-3 form-group">
                                <label for="doc_mtc">Doc. MTC</label>
                                <input type="file" class="form-control" id="doc_mtc" name="doc_mtc" accept=".pdf">
                            </div>
                            <div class="col-lg-3 form-group">
                                <label for="guia_remi_ini1">Guía Remitente (Inicial)</label>
                                <input type="file" class="form-control" id="guia_remi_ini1" name="guia_remi_ini1" accept=".pdf">
                                <input type="file" class="form-control" id="guia_remi_ini2" name="guia_remi_ini2" accept=".pdf">
                                <input type="file" class="form-control" id="guia_remi_ini3" name="guia_remi_ini3" accept=".pdf">
                            </div>
                            <div class="col-lg-3 form-group">
                                <label for="guia_con_ini">Guía Conductor (Inicial)</label>
                                <input type="file" class="form-control" id="guia_con_ini" name="guia_con_ini" accept=".pdf">
                            </div>
                            <div class="col-lg-3 form-group">
                                <label for="guia_remi_firm">Guía Remitente (Firmada)</label>
                                <input type="file" class="form-control" id="guia_remi_firm" name="guia_remi_firm" accept=".pdf">
                            </div>
                        </div>
                        <div class="col-lg-12 form-group">
                            <div class="col-lg-3 form-group">
                                <label for="guia_con_firma">Guía Conductor (Firmada)</label>
                                <input type="file" class="form-control" id="guia_con_firma" name="guia_con_firma" accept=".pdf">
                            </div>
                            <div class="col-lg-3 form-group">
                                <label for="foto_evi_carga1">Fotos evidencia (Carga)</label>
                                <input type="file" class="form-control" id="foto_evi_carga1" name="foto_evi_carga1" >
                                <input type="file" class="form-control" id="foto_evi_carga2" name="foto_evi_carga2" >
                                <input type="file" class="form-control" id="foto_evi_carga3" name="foto_evi_carga3" >
                            </div>
                            <div class="col-lg-3 form-group">
                                <label for="foto_evi_desc1">Fotos evidencia (Descarga)</label>
                                <input type="file" class="form-control" id="foto_evi_desc1" name="foto_evi_desc1" >
                                <input type="file" class="form-control" id="foto_evi_desc2" name="foto_evi_desc2" >
                                <input type="file" class="form-control" id="foto_evi_desc3" name="foto_evi_desc3" >
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 form-group">
                        <div class="col-lg-6 form-group">
                            <label for="obervaciones">Observaciones</label>
                            <textarea class="form-control" name="obervaciones" id="obervaciones"></textarea>
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

<div id="modalActualizarGuiaRemision" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 99%;">
        <div class="modal-content container-fluid">
            <form class="row" role="form" id="formGuiaRemisionActualizar" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Gestión de Guías y Documentación de Prestación de Servicio</h4>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12 form-group">
                        <div class="col-lg-6 form-group">
                            <label for="ACruc_cliente">RUC Cliente:</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" id="ACruc_cliente" name="ruc_cliente" required>
                            <input type="hidden" id="id" name="id">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="ACrazon_social">Razón Social:</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" id="ACrazon_social" name="razon_social" required>
                        </div>
                    </div>
                    <div class="col-lg-12 form-group">
                        <div class="col-lg-12 form-group">
                            <div class="col-lg-3 form-group">
                                <label for="doc_mtc">Doc. MTC</label>
                                <input type="file" class="form-control" id="doc_mtc" name="doc_mtc" accept=".pdf">
                                <input type="hidden" id="ACdoc_mtc" name="ACdoc_mtc">
                            </div>
                            <div class="col-lg-3 form-group">
                                <label for="guia_remi_ini1">Guía Remitente (Inicial)</label>
                                <input type="file" class="form-control" id="guia_remi_ini1" name="guia_remi_ini1" accept=".pdf">
                                <input type="hidden" id="ACguia_remi_ini1" name="ACguia_remi_ini1">

                                <input type="file" class="form-control" id="guia_remi_ini2" name="guia_remi_ini2" accept=".pdf">
                                <input type="hidden" id="ACguia_remi_ini2" name="ACguia_remi_ini2">

                                <input type="file" class="form-control" id="guia_remi_ini3" name="guia_remi_ini3" accept=".pdf">
                                <input type="hidden" id="ACguia_remi_ini3" name="ACguia_remi_ini3">

                            </div>
                            <div class="col-lg-3 form-group">
                                <label for="guia_con_ini">Guía Conductor (Inicial)</label>
                                <input type="file" class="form-control" id="guia_con_ini" name="guia_con_ini" accept=".pdf">
                                <input type="hidden" id="ACguia_con_ini" name="ACguia_con_ini">

                            </div>
                            <div class="col-lg-3 form-group">
                                <label for="guia_remi_firm">Guía Remitente (Firmada)</label>
                                <input type="file" class="form-control" id="guia_remi_firm" name="guia_remi_firm" accept=".pdf">
                                <input type="hidden" id="ACguia_remi_firm" name="ACguia_remi_firm">

                            </div>
                        </div>
                        <div class="col-lg-12 form-group">
                            <div class="col-lg-3 form-group">
                                <label for="guia_con_firma">Guía Conductor (Firmada)</label>
                                <input type="file" class="form-control" id="guia_con_firma" name="guia_con_firma" accept=".pdf">
                                <input type="hidden" id="ACguia_con_firma" name="ACguia_con_firma">

                            </div>
                            <div class="col-lg-3 form-group">
                                <label for="foto_evi_carga1">Fotos evidencia (Carga)</label>
                                <input type="file" class="form-control" id="foto_evi_carga1" name="foto_evi_carga1" >
                                <input type="hidden" id="ACfoto_evi_carga1" name="ACfoto_evi_carga1">

                                <input type="file" class="form-control" id="foto_evi_carga2" name="foto_evi_carga2" >
                                <input type="hidden" id="ACfoto_evi_carga2" name="ACfoto_evi_carga2">

                                <input type="file" class="form-control" id="foto_evi_carga3" name="foto_evi_carga3" >
                                <input type="hidden" id="ACfoto_evi_carga3" name="ACfoto_evi_carga3">

                            </div>
                            <div class="col-lg-3 form-group">
                                <label for="ACfoto_evi_desc1">Fotos evidencia (Descarga)</label>
                                <input type="file" class="form-control" id="ACfoto_evi_desc1" name="foto_evi_desc1" >
                                <input type="hidden" id="ACfoto_evi_desc1" name="ACfoto_evi_desc1">

                                <input type="file" class="form-control" id="foto_evi_desc2" name="foto_evi_desc2" >
                                <input type="hidden" id="ACfoto_evi_desc2" name="ACfoto_evi_desc2">

                                <input type="file" class="form-control" id="foto_evi_desc3" name="foto_evi_desc3" >
                                <input type="hidden" id="ACfoto_evi_desc3" name="ACfoto_evi_desc3">

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 form-group">
                        <div class="col-lg-6 form-group">
                            <label for="ACobervaciones">Observaciones</label>
                            <textarea class="form-control" name="obervaciones" id="ACobervaciones"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).on('submit', '#formGuiaRemision', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('accion', 'crearGuiaRemision');
        $.ajax({
            url: 'controladores/guia-remision.controlador.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(resp) {
                if (resp == "ok") {
                    swal({
                        type: "success",
                        title: "Guia de remision ha sido registrado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result) => {
                        if (result.value) {
                            window.location = "guia-remision";
                        }
                    })
                } else {
                    alert("Erro al crear . Por favor, inténtalo de nuevo.");
                }
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX:", status, error);
            }
        });
    });
    $(document).ready(function() {
        cargarData();
    })
    $(document).on('submit', '#formGuiaRemisionActualizar', function(e){
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('accion', 'ActualizarGuiaRemision');
        $.ajax({
            url: 'controladores/guia-remision.controlador.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(resp) {
                if (resp == "ok") {
                    swal({
                        type: "success",
                        title: "Guia de remision ha sido actualizado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result) => {
                        if (result.value) {
                            window.location = "guia-remision";
                        }
                    })
                } else {
                    alert("Erro al crear . Por favor, inténtalo de nuevo.");
                }
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX:", status, error);
            }
        });
    })
    function cargarData() {
        console.log("cargar data");
        $.ajax({
            url: "modelos/guia-remision.modelo.php",
            method: "POST",
            data: {
                accion: 'loadData'
            },
            dataType: "json",
            success: function(respuesta) {
                $('#tabla_guia_remi tbody').empty();

                if (respuesta && respuesta.length > 0) {
                    $.each(respuesta, function(index, registro) {
                        var fila = '<tr>' +
                            '<td>' + registro.id + '</td>' +
                            '<td>' + registro.ruc_cliente + '</td>' +
                            '<td>' + registro.razon_social + '</td>' +

                            '<td>';
                        var firma = registro.doc_mtc;
                        if (firma) {
                            fila += '<a href="' + firma + '" target="_blank">  <i class="fa fa-file"> doc_mtc</i></a> <br>';
                        } else {
                            fila += '<i class="fa fa-file text-muted"> doc_mtc </i> <br>';
                        }
                        fila += '</td>' +

                            '<td>';
                        var guia_remi = registro.guia_remi_ini1;
                        if (guia_remi) {
                            fila += '<a href="' + guia_remi + '" target="_blank">  <i class="fa fa-file"> Guía 1  (Inicial)</i></a> <br>';
                        } else {
                            fila += '<i class="fa fa-file text-muted"> Guía 1 (Inicial) </i> <br>';
                        }

                        guia_remi = registro.guia_remi_ini2;
                        if (guia_remi) {
                            fila += '<a href="' + guia_remi + '" target="_blank">  <i class="fa fa-file"> Guía 2 (Inicial)</i></a> <br>';
                        } else {
                            fila += '<i class="fa fa-file text-muted"> Guía 2 (Inicial) </i> <br>';
                        }

                        guia_remi = registro.guia_remi_ini3;
                        if (guia_remi) {
                            fila += '<a href="' + guia_remi + '" target="_blank">  <i class="fa fa-file"> Guía 3 (Inicial)</i></a> <br>';
                        } else {
                            fila += '<i class="fa fa-file text-muted"> Guía 3 (Inicial) </i> <br>';
                        }

                        fila += '</td>' +

                            '<td>';
                        var guia_con_ini = registro.guia_con_ini;
                        if (guia_con_ini) {
                            fila += '<a href="' + guia_con_ini + '" target="_blank">  <i class="fa fa-file"> Guía Conductor</i></a> <br>';
                        } else {
                            fila += '<i class="fa fa-file text-muted"> Guía Conductor </i> <br>';
                        }
                        fila += '</td>' +

                            '<td>';
                        var guia_remi_firm = registro.guia_remi_firm;
                        if (guia_remi_firm) {
                            fila += '<a href="' + guia_remi_firm + '" target="_blank">  <i class="fa fa-file"> Guía Remitente </i></a> <br>';
                        } else {
                            fila += '<i class="fa fa-file text-muted"> Guía Remitente </i> <br>';
                        }
                        fila += '</td>' +

                            '<td>';
                        var guia_con_firma = registro.guia_con_firma;
                        if (guia_con_firma) {
                            fila += '<a href="' + guia_con_firma + '" target="_blank">  <i class="fa fa-file"> Guía Conductor </i></a> <br>';
                        } else {
                            fila += '<i class="fa fa-file text-muted"> Guía Conductor </i> <br>';
                        }
                        fila += '</td>' +

                            '<td>';
                        var foto_evi_carga1 = registro.foto_evi_carga1;
                        if (foto_evi_carga1) {
                            fila += '<a href="' + foto_evi_carga1 + '" target="_blank">  <i class="fa fa-file"> Guía 1  (Inicial)</i></a> <br>';
                        } else {
                            fila += '<i class="fa fa-file text-muted"> Guía 1 (Inicial) </i> <br>';
                        }

                        var foto_evi_carga2 = registro.foto_evi_carga2;
                        if (foto_evi_carga2) {
                            fila += '<a href="' + foto_evi_carga2 + '" target="_blank">  <i class="fa fa-file"> Guía 2 (Inicial)</i></a> <br>';
                        } else {
                            fila += '<i class="fa fa-file text-muted"> Guía 2 (Inicial) </i> <br>';
                        }

                        var foto_evi_carga3 = registro.foto_evi_carga3;
                        if (foto_evi_carga3) {
                            fila += '<a href="' + foto_evi_carga3 + '" target="_blank">  <i class="fa fa-file"> Guía 3 (Inicial)</i></a> <br>';
                        } else {
                            fila += '<i class="fa fa-file text-muted"> Guía 3 (Inicial) </i> <br>';
                        }

                        fila += '</td>' +


                            '<td>';
                        var foto_evi_desc1 = registro.foto_evi_desc1;
                        if (foto_evi_desc1) {
                            fila += '<a href="' + foto_evi_desc1 + '" target="_blank">  <i class="fa fa-file"> Guía 1  (Inicial)</i></a> <br>';
                        } else {
                            fila += '<i class="fa fa-file text-muted"> Guía 1 (Inicial) </i> <br>';
                        }

                        var foto_evi_desc2 = registro.foto_evi_desc2;
                        if (foto_evi_desc2) {
                            fila += '<a href="' + foto_evi_desc2 + '" target="_blank">  <i class="fa fa-file"> Guía 2 (Inicial)</i></a> <br>';
                        } else {
                            fila += '<i class="fa fa-file text-muted"> Guía 2 (Inicial) </i> <br>';
                        }

                        var foto_evi_desc3 = registro.foto_evi_desc3;
                        if (foto_evi_desc3) {
                            fila += '<a href="' + foto_evi_desc3 + '" target="_blank">  <i class="fa fa-file"> Guía 3 (Inicial)</i></a> <br>';
                        } else {
                            fila += '<i class="fa fa-file text-muted"> Guía 3 (Inicial) </i> <br>';
                        }

                        fila += '</td>' +

                            '<td>' + registro.obervaciones + '</td>' +
                            '<td>' +
                            '<center>' +
                            '<a style="margin-top: 4px !important" class="btn btn-info btn-xs btnEditarPlanMantenimiento" data-id="' + registro.id + '" data-toggle="modal" data-target="#modalActualizarGuiaRemision"><i class="fa fa-pencil"></i> Editar</a>' +
                            '<a style="margin-top: 4px !important" class="btn btn-danger btn-xs btnEliminarPlanMantenimiento" data-id="' + registro.id + '" data-toggle="modal" data-target="#modalEliminarPlanMantenimiento"><i class="fa fa-pencil"></i> Eliminar</a>' +
                            '</center>' +
                            '<br>' +
                            '</td>' +
                            '</tr>';
                        $('#tabla_guia_remi tbody').append(fila);
                    });
                }
            },
        });
    }
    $(Document).on('click', '.btnEditarPlanMantenimiento', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var datos = new FormData();
        datos.append("id", id);
        datos.append("accion", 'loadEdit');
        $.ajax({
            url: "modelos/guia-remision.modelo.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(item) {
                $('#ACruc_cliente').val(item.ruc_cliente);
                $('#ACrazon_social').val(item.razon_social);


                $('#id').val(item.id);
                $('#ACdoc_mtc').val(item.doc_mtc);
                $('#ACguia_remi_ini1').val(item.guia_remi_ini1);
                $('#ACguia_remi_ini2').val(item.guia_remi_ini2);
                $('#ACguia_remi_ini3').val(item.guia_remi_ini3);

                $('#ACguia_con_ini').val(item.guia_con_ini);
                $('#ACguia_remi_firm').val(item.guia_remi_firm);
                $('#ACguia_con_firma').val(item.guia_con_firma);

                $('#ACfoto_evi_carga1').val(item.foto_evi_carga1);
                $('#ACfoto_evi_carga2').val(item.foto_evi_carga2);
                $('#ACfoto_evi_carga3').val(item.foto_evi_carga3);

                $('#ACfoto_evi_desc1').val(item.foto_evi_desc1);
                $('#ACfoto_evi_desc2').val(item.foto_evi_desc2);
                $('#ACfoto_evi_desc3').val(item.foto_evi_desc3);

                $('#obervaciones').val(item.obervaciones);
                
            }
        })
    })


    function openSunatWindow() {
        var width = 800;
        var height = 600;
        var left = (screen.width - width) / 2;
        var top = (screen.height - height) / 2;
        var newWindow = window.open('https://api-seguridad.sunat.gob.pe/v1/clientessol/4f3b88b3-d9d6-402a-b85d-6a0bc857746a/oauth2/loginMenuSol', 'Sunat Login', 'width=' + width + ', height=' + height + ', top=' + top + ', left=' + left + ', resizable=yes, scrollbars=yes');
        
        if (window.focus) {
            newWindow.focus();
        }
    }
</script>

<div class="content-wrapper d-none">
    <section class="content-header">
        <h1>
        Gestión de Guías y Documentación de Prestación de Servicio **
            <small>-</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Guía de remision</li>
        </ol>
    </section>
  
    <section class="content">
        <div clase="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="wizard-container">
                    <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th >Ruc&nbsp;cliente&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            <th >Razón&nbsp;social&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            <th>Doc. MTC <span class="required"></span></th>
                                            <th class="pastel-inicial">Guía Remitente (Inicial) <span class="required"></span></th>
                                            <th class="pastel-inicial">Guía Conductor (Inicial) <span class="required"></span></th>
                                            <th class="pastel-firmada">Guía Remitente (Firmada)</th>
                                            <th class="pastel-firmada">Guía Conductor (Firmada)</th>
                                            <th>Fotos evidencia (Carga)</th>
                                            <th>Fotos evidencia (Descarga)</th>
                                            <th>Observaciones <span class="required"></span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th style='background: #5e5e5e;    color: white !important;   font-weight: 100 !important;'><input type="text" class="form-control" placeholder="Ruc cliente" required style="width: 150px !important;"></th>
                                            <th style='background: #5e5e5e;    color: white !important;   font-weight: 100 !important;'><input type="text" class="form-control" placeholder="Razón social" required style="width: 350px !important;"></th>
                                            <th style='background: #5e5e5e;    color: white !important;   font-weight: 100 !important;'><input type="file" class="form-control-file" required></th>
                                            <th style='   font-weight: 100 !important;' class="pastel-inicial">
                                                    <input type="file" class="form-control-file" required>
                                                    <input type="file" class="form-control-file" >
                                                    <input type="file" class="form-control-file" >
                                            </th>
                                            <th style='   font-weight: 100 !important;' class="pastel-inicial">
                                                <input type="file" class="form-control-file" required>
                                            </th>
                                            <th style='   font-weight: 100 !important;' class="pastel-firmada"><input type="file" class="form-control-file" disabled></th>
                                            <th style='   font-weight: 100 !important;' class="pastel-firmada"><input type="file" class="form-control-file" disabled></th>
                                            <th style='background: #5e5e5e;    color: white !important;   font-weight: 100 !important;'>
                                                <input type="file" class="form-control-file">
                                                <input type="file" class="form-control-file">
                                                <input type="file" class="form-control-file">
                                            </th>
                                            <th  style='background: #5e5e5e;    color: white !important;   font-weight: 100 !important;'>
                                                <input  type="file" class="form-control-file">
                                                <input  type="file" class="form-control-file">
                                                <input  type="file" class="form-control-file">
                                            </th>
                                            <th style='background: #5e5e5e;    color: white !important;   font-weight: 100 !important;'>
                                                <textarea  cols="30" rows="5"></textarea>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" value="1234567890"></td>
                                            <td><input type="text" class="form-control" value="Ejemplo S.A."></td>
                                            <td><input type="file" class="form-control-file"></td>
                                            <td class="pastel-inicial"><input type="file" class="form-control-file"></td>
                                            <td class="pastel-inicial"><input type="file" class="form-control-file"></td>
                                            <td class="pastel-firmada"><input type="file" class="form-control-file"></td>
                                            <td class="pastel-firmada"><input type="file" class="form-control-file"></td>
                                            <td><input type="file" class="form-control-file"></td>
                                            <td><input type="file" class="form-control-file"></td>
                                            <td><input type="text" class="form-control" value="Entrega a tiempo."></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" value="1234567890"></td>
                                            <td><input type="text" class="form-control" value="Ejemplo S.A."></td>
                                            <td><input type="file" class="form-control-file"></td>
                                            <td class="pastel-inicial"><input type="file" class="form-control-file"></td>
                                            <td class="pastel-inicial"><input type="file" class="form-control-file"></td>
                                            <td class="pastel-firmada"><input type="file" class="form-control-file"></td>
                                            <td class="pastel-firmada"><input type="file" class="form-control-file"></td>
                                            <td><input type="file" class="form-control-file"></td>
                                            <td><input type="file" class="form-control-file"></td>
                                            <td><input type="text" class="form-control" value="Entrega a tiempo."></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" value="1234567890"></td>
                                            <td><input type="text" class="form-control" value="Ejemplo S.A."></td>
                                            <td><input type="file" class="form-control-file"></td>
                                            <td class="pastel-inicial"><input type="file" class="form-control-file"></td>
                                            <td class="pastel-inicial"><input type="file" class="form-control-file"></td>
                                            <td class="pastel-firmada"><input type="file" class="form-control-file"></td>
                                            <td class="pastel-firmada"><input type="file" class="form-control-file"></td>
                                            <td><input type="file" class="form-control-file"></td>
                                            <td><input type="file" class="form-control-file"></td>
                                            <td><input type="text" class="form-control" value="Entrega a tiempo."></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" value="1234567890"></td>
                                            <td><input type="text" class="form-control" value="Ejemplo S.A."></td>
                                            <td><input type="file" class="form-control-file"></td>
                                            <td class="pastel-inicial"><input type="file" class="form-control-file"></td>
                                            <td class="pastel-inicial"><input type="file" class="form-control-file"></td>
                                            <td class="pastel-firmada"><input type="file" class="form-control-file"></td>
                                            <td class="pastel-firmada"><input type="file" class="form-control-file"></td>
                                            <td><input type="file" class="form-control-file"></td>
                                            <td><input type="file" class="form-control-file"></td>
                                            <td><input type="text" class="form-control" value="Entrega a tiempo."></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div id="modalSrchProducts" class="modal fade" role="dialog">
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
                <button type="button" class="btn btn-success" id="btn_nuevo_servicio">Agregar nuevo servicio</button>
            </div>
        </div>
    </div>
</div>

<div id="modalAgregarcliente" class="modal fade" role="dialog">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style='color: white !important; font-size: 30px !important;     opacity: unset !important;'>&times;</button>
                <h4 class="modal-title">Agregar Cliente</h4>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Script para habilitar inputs de carga firmada si los iniciales están cargados
    document.addEventListener('change', function(e) {
        if (e.target.closest('tr').querySelector('.pastel-inicial input[type="file"]').files.length > 0) {
            e.target.closest('tr').querySelector('.pastel-firmada input[type="file"]').disabled = false;
        }
    });
</script>