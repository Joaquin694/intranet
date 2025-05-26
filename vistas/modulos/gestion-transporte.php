<!-- Incluir el CSS de Leaflet -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<!-- Incluir el script de Leaflet -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<!-- Incluir la librería para manejar GeoJSON -->
<script src="https://unpkg.com/leaflet-geojson-rotatedmarker@0.0.1/leaflet.geojson-rotatedmarker.js"></script>
<style>
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

    .is-valid {
        background-color: #006066a8;
        color: white;
    }

    .img-thumbnail-custom {
        height: 50px;
        width: 50px;
        object-fit: cover;
    }

    .highlight-red {
        background-color: #FF0000 !important;
    }

    .highlight-green {
        background-color: rgb(4, 255, 0) !important;
    }

    .disabled-link {
        pointer-events: none;
        color: grey;
        filter: grayscale(100%);
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Gestion de Transporte
            <small>Gestion de rutas de transporte</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Gestion de Transporte</li>
        </ol>
    </section>
    <?php
    require_once "modelos/gestion-transporte.modelo.php";
    require_once "controladores/gestion-transporte.controlador.php";

    $ControladorGestionTransporte = new ControladorGestionTransporte();

    ?>

    <section class="content">
        <!-- Botón para agregar nuevo plan de mantenimiento -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="row" id="card-container"> <!-- Las tarjetas se añadirán aquí dinámicamente -->
                        </div>
                        <br>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarGestion">
                            <i class="fa fa-plus-square"></i> Agregar nueva gestion
                        </button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-container">
                            <table id="tablaGestionRuta" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="background: #5e5e5e !important;color: white;" colspan="7">
                                            LISTA DE RUTAS: </th>
                                        <th style="background: #5e5e5e !important;color: white;" colspan="4">
                                            <span class="pastillitasradiosas"
                                                style="border-radius:5px ;margin-left: 15px;float: left;width: 120px !important;background:rgb(214, 115, 2) !important">
                                                <input type="radio" id="rdbEnRuta" name="rdb_btn" value="rutas_open"
                                                    checked>
                                                <label for="rdbEnRuta">rutas en curso</label>
                                            </span>
                                            <span class="pastillitasradiosas"
                                                style="border-radius:5px ;margin-left: 15px;float: left;width: 120px !important;background:rgb(181, 0, 0) !important">
                                                <input type="radio" id="rdbEnRutaCerradas" name="rdb_btn"
                                                    value="rutas_closed">
                                                <label for="rdbEnRutaCerradas">rutas cerradas</label>
                                            </span>

                                        </th>
                                    </tr>
                                    <tr>
                                        <th>ID</th>
                                        <th>Activo Fijo</th>
                                        <th>Doc. Activo</th>
                                        <th>Conductor</th>
                                        <th>Doc. Conductor</th>
                                        <th>Ruta</th>
                                        <th>Cliente</th>
                                        <th>Doc. Cotización</th>
                                        <th>Documentos adicionales</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Los registros se insertarán aquí mediante JavaScript -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
</div>

<div id="modalAgregarGestion" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 99%;">
        <div class="modal-content container-fluid">
            <form class='row' role="form" id="formTrazarTransporte" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Gestionar Transporte</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <div class="col-lg-5 form-group">
                                <div id="map" style="width: 100%; height: 100%;"></div>
                            </div>
                            <div class="col-lg-7 form-group">
                                <div class="col-lg-4 form-group">
                                    <label for="cotizacion">Cotización</label>
                                    <span class="text-danger">*</span>

                                    <?php $Datas = ControladorGestionTransporte::ctrMostrar('cotizacion', null, null, 'not-num'); ?>

                                    <select class="form-control select2" id="cotizacion" name="cotizacion"
                                        style="width: 100%;" required>
                                        <option value="">Seleccionar Cotización</option>
                                        <?php
                                        foreach ($Datas as $info) {
                                            echo '<option value="' . $info['id_cotizacion'] . '">' . $info['nombre_cliente'] . ' --- ' . $info['fecha_registro'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-4 form-group">
                                    <label for="activo">Buscar Activo</label>
                                    <select name="activo" id="activo" class="form-control">
                                        <option value="">Seleccione una opción</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 form-group">
                                    <label for="miSelect">Seleccionar Conductor</label>
                                    <select id="miSelect" name="conductor" class="form-control">
                                        <option value="">Seleccione una opción</option>
                                    </select>
                                </div>

                                <div class="col-lg-12 form-group">
                                    <fieldset class="bordered">
                                        <legend>&nbsp;INFO DE RUTA APROX</legend>
                                        <div class="col-lg-4 form-group">
                                            <label>calcular ruta: </label>
                                            <button type="button" class="btn btn-success tbn-ruta form-control">Calcular
                                                ruta</button>
                                        </div>
                                        <div class="col-lg-4 form-group">
                                            <label for="distancia">Distancia Aproximada (Km)</label>
                                            <input type="number" class="form-control is-valid" placeholder="Distancia"
                                                id="distancia" name="distancia" step="0.01">
                                        </div>
                                        <div class="col-lg-4 form-group">
                                            <label for="tiempo">Tiempo Aproximado (h/m/s)</label>
                                            <input type="text" class="form-control is-valid" placeholder="tiempo"
                                                id="tiempo" name="tiempo">
                                        </div>
                                        <div class="col-lg-4 form-group">
                                            <select name="dificultad" id="dificultad" class="form-control">
                                                <option value="Bajo">Bajo</option>
                                                <option value="Medio">Medio</option>
                                                <option value="Alto">Alto</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 form-group">
                                            <input type="text" class="form-control" name="ruta_pp" id="ruta_pp"
                                                placeholder="ejem: Lima-tarapoto" required>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 form-group com-infor-active">
                                    <fieldset class="bordered">
                                        <legend>&nbsp;INFORMACIÓN DEL ACTIVO</legend>
                                        <div class="col-lg-4 form-group com-infor-active">
                                            <input type="text" class="form-control" name="description_activo"
                                                placeholder="Descripción">
                                        </div>
                                        <div class="col-lg-4 form-group com-infor-active">
                                            <input type="text" class="form-control" name="placa_activo"
                                                placeholder="Placa">
                                        </div>
                                        <div class="col-lg-4 form-group com-infor-active">
                                            <input type="text" class="form-control" name="tipo_activo"
                                                placeholder="Tipo">
                                        </div>
                                        <div class="col-lg-4 form-group com-infor-active">
                                            <input type="text" class="form-control" name="marca_activo"
                                                placeholder="marca">
                                        </div>
                                        <div class="col-lg-4 form-group com-infor-active">
                                            <input type="text" class="form-control" name="modelo_activo"
                                                placeholder="modelo">
                                        </div>
                                        <div class="col-lg-4 form-group com-infor-active">
                                            <input type="text" class="form-control" name="capacidad_activo"
                                                placeholder="capacidad">
                                        </div>
                                        <div class="col-lg-4 form-group com-infor-active">
                                            <input type="file" class="form-control" name="doc-activo_activo">
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 form-group com-resp-trans">
                                    <fieldset class="bordered">
                                        <legend>&nbsp;INFORMACIÓN DEL RESPONSABLE DEL TRANSPORTE</legend>
                                        <div class="col-lg-5 form-group com-resp-trans">
                                            <input type="text" class="form-control" name="nom_res"
                                                placeholder="Nombre completo">
                                        </div>
                                        <div class="col-lg-3 form-group com-resp-trans">
                                            <input type="number" class="form-control" name="dni_res" placeholder="DNI">
                                        </div>
                                        <div class="col-lg-4 form-group com-resp-trans">
                                            <input type="number" class="form-control" name="n_licencia_res"
                                                placeholder="N° licencia de conducir">
                                        </div>
                                        <div class="col-lg-4 form-group com-resp-trans">
                                            <input type="number" class="form-control" name="contacto_nom_res"
                                                placeholder="Contacto de emergencia">
                                        </div>
                                        <div class="col-lg-4 form-group com-resp-trans">
                                            <input type="file" class="form-control" name="doc_res">
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 form-group">
                                    <fieldset class="bordered">
                                        <legend>&nbsp;INFORMACIÓN RELACIONADA</legend>
                                        <div class="col-lg-4 form-group">
                                            <input type="file" class="form-control" name="doc_1_info">
                                        </div>
                                        <div class="col-lg-4 form-group">
                                            <input type="file" class="form-control" name="doc_2_info">
                                        </div>
                                        <div class="col-lg-4 form-group">
                                            <input type="file" class="form-control" name="doc_3_info">
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 form-group">
                                    <label for="observacion">Observaciones:</label>
                                    <textarea class="form-control" name="observacion" id="observacion"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                <?php
                // $ControladorPlanMantennimiento->ctrCrearPlanMantenimiento($_POST);
                ?>
            </form>
        </div>
    </div>
</div>

<div id="modalEditarGestion" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 99%;">
        <div class="modal-content container-fluid">
            <form class='row' role="form" id="formTrazarTransporte_editar" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Gestion Transporte</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <div class="col-lg-5 form-group">
                                <div id="map_edit" style="width: 100%; height: 100%;"></div>
                                <input type="hidden" id="id" name="id">
                            </div>
                            <div class="col-lg-7 form-group">
                                <div class="col-lg-4 form-group">
                                    <label for="cotizacion">Cotización</label>
                                    <span class="text-danger">*</span>

                                    <?php $Datas = ControladorGestionTransporte::ctrMostrar('cotizacion', null, null, 'not-num'); ?>

                                    <select class="form-control select2" id="cotizacion_edit" name="cotizacion"
                                        style="width: 100%;" required>
                                        <option value="">Seleccionar Cotización</option>
                                        <?php
                                        foreach ($Datas as $info) {
                                            echo '<option value="' . $info['id_cotizacion'] . '">' . $info['nombre_cliente'] . ' --- ' . $info['fecha_registro'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-4 form-group">
                                    <label for="activo_edit">Buscar Activo</label>
                                    <input type="hidden" id="activ_db">
                                    <select name="activo" id="activo_edit" class="form-control">
                                        <option value="">Seleccione una opción</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 form-group">
                                    <label for="miSelect_edit">Seleccionar Conductor</label>
                                    <select id="miSelect_edit" name="conductor" class="form-control">
                                        <option value="">Seleccione una opción</option>
                                    </select>
                                </div>

                                <div class="col-lg-12 form-group">
                                    <fieldset class="bordered">
                                        <legend>&nbsp;INFO DE RUTA APROX</legend>
                                        <div class="col-lg-4 form-group">
                                            <label>calcular ruta: </label>
                                            <button type="button" class="btn btn-success tbn-ruta form-control">Calcular
                                                ruta</button>
                                        </div>
                                        <div class="col-lg-4 form-group">
                                            <label for="distancia">Distancia Aproximada (Km)</label>
                                            <input type="number" class="form-control is-valid" placeholder="Distancia"
                                                id="distancia_edit" name="distancia" step="0.00001">
                                        </div>
                                        <div class="col-lg-4 form-group">
                                            <label for="tiempo">Tiempo Aproximado (h/m/s)</label>
                                            <input type="text" class="form-control is-valid" placeholder="tiempo"
                                                id="tiempo_edit" name="tiempo">
                                        </div>
                                        <div class="col-lg-4 form-group">
                                            <select name="dificultad" id="dificultad_edit" class="form-control">
                                                <option value="Bajo">Bajo</option>
                                                <option value="Medio">Medio</option>
                                                <option value="Alto">Alto</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 form-group">
                                            <input type="text" class="form-control" name="ruta_pp" id="ruta_pp_edit"
                                                placeholder="ejem: Lima-tarapoto" required>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 form-group com-infor-active_edit">
                                    <fieldset class="bordered">
                                        <legend>&nbsp;INFORMACIÓN DEL ACTIVO</legend>
                                        <div class="col-lg-4 form-group com-infor-active_edit">
                                            <input type="text" class="form-control" name="description_activo"
                                                id="description_activo_edit" placeholder="Descripción">
                                        </div>
                                        <div class="col-lg-4 form-group com-infor-active_edit">
                                            <input type="text" class="form-control" name="placa_activo"
                                                id="placa_activo_edit" placeholder="Placa">
                                        </div>
                                        <div class="col-lg-4 form-group com-infor-active_edit">
                                            <input type="text" class="form-control" name="tipo_activo"
                                                id="tipo_activo_edit" placeholder="Tipo">
                                        </div>
                                        <div class="col-lg-4 form-group com-infor-active_edit">
                                            <input type="text" class="form-control" name="marca_activo"
                                                id="marca_activo_edit" placeholder="marca">
                                        </div>
                                        <div class="col-lg-4 form-group com-infor-active_edit">
                                            <input type="text" class="form-control" name="modelo_activo"
                                                id="modelo_activo_edit" placeholder="modelo">
                                        </div>
                                        <div class="col-lg-4 form-group com-infor-active_edit">
                                            <input type="text" class="form-control" name="capacidad_activo"
                                                id="capacidad_activo_edit" placeholder="capacidad">
                                        </div>
                                        <div class="col-lg-4 form-group com-infor-active_edit">
                                            <input type="file" class="form-control" name="doc-activo_activo"
                                                id="doc-activo_edit">
                                            <input type="hidden" class="form-control" name="doc-activo_db"
                                                id="doc-activo_edit_db">
                                        </div>
                                        <img id="previsualizarImagen" class="img-thumbnail previsualizar" width="100px">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 form-group com-resp-trans_edit">
                                    <fieldset class="bordered">
                                        <legend>&nbsp;INFORMACIÓN DEL RESPONSABLE DEL TRANSPORTE</legend>
                                        <div class="col-lg-5 form-group com-resp-trans_edit">
                                            <input type="text" class="form-control" name="nom_res"
                                                placeholder="Nombre completo" id="nom_res_edit">
                                        </div>
                                        <div class="col-lg-3 form-group com-resp-trans_edit">
                                            <input type="number" class="form-control" name="dni_res" placeholder="DNI"
                                                id="dni_res_edit">
                                        </div>
                                        <div class="col-lg-4 form-group com-resp-trans_edit">
                                            <input type="number" class="form-control" name="n_licencia_res"
                                                placeholder="N° licencia de conducir" id="n_licencia_res_edit">
                                        </div>
                                        <div class="col-lg-4 form-group com-resp-trans_edit">
                                            <input type="number" class="form-control" name="contacto_nom_res"
                                                placeholder="Contacto de emergencia" id="contacto_nom_res_res">
                                        </div>
                                        <div class="col-lg-4 form-group com-resp-trans_edit">
                                            <input type="file" class="form-control" name="doc_res"
                                                id="doc_res_res_edit">
                                            <input type="hidden" class="form-control" name="doc_res_db"
                                                id="doc_res_edit_db">
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 form-group">
                                    <fieldset class="bordered">
                                        <legend>&nbsp;INFORMACIÓN RELACIONADA</legend>
                                        <div class="col-lg-4 form-group">
                                            <input type="file" class="form-control" name="doc_1_info"
                                                id="doc_1_info_edit">
                                            <input type="hidden" class="form-control" name="doc_1_info_db"
                                                id="doc_1_info_db">
                                        </div>
                                        <div class="col-lg-4 form-group">
                                            <input type="file" class="form-control" name="doc_2_info"
                                                id="doc_2_info_edit">
                                            <input type="hidden" class="form-control" name="doc_2_info_db"
                                                id="doc_2_info_db">
                                        </div>
                                        <div class="col-lg-4 form-group">
                                            <input type="file" class="form-control" name="doc_3_info"
                                                id="doc_3_info_edit">
                                            <input type="hidden" class="form-control" name="doc_3_info_db"
                                                id="doc_3_info_db">
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 form-group">
                                    <label for="observacion">Observaciones:</label>
                                    <textarea class="form-control" name="observacion" id="observacion_edit"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                <?php
                // $ControladorPlanMantennimiento->ctrCrearPlanMantenimiento($_POST);
                ?>
            </form>
        </div>
    </div>
</div>

<div id="modalSeguirRuta" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 99%;">
        <div class="modal-content container-fluid">
            <form class='row' role="form" id="formSeguirRuta" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Seguimiento del transporte</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <div class="col-lg-5 form-group">
                                <div id="map_2" style="width: 100%; height: 100%;"></div>
                            </div>
                            <div class="col-lg-7 form-group">
                                <div class="col-lg-12 form-group">
                                    <fieldset class="bordered">
                                        <legend>&nbsp;DATOS REGISTRADOS</legend>
                                        <div class="col-lg-4 form-group">
                                            <label for="observacion">Ruta:</label>
                                            <input type="text" class="form-control" name="ruta_red" id="ruta_red"
                                                readonly>
                                        </div>
                                        <div class="col-lg-4 form-group">
                                            <label for="observacion">Distancia calculada: (Km)</label>
                                            <input type="number" class="form-control" name="distancia_aprox"
                                                id="distancia_aprox" readonly step="0.01">
                                        </div>
                                        <div class="col-lg-4 form-group">
                                            <label for="observacion">Tiempo calculado: (h/m/s)</label>
                                            <input type="text" class="form-control" name="tiempo_aprox"
                                                id="tiempo_aprox" readonly>
                                        </div>
                                        <div class="col-lg-4 form-group">
                                            <label for="observacion">Dificultad calculada:</label>
                                            <input type="text" class="form-control" name="dificultad_aprox"
                                                id="dificultad_aprox" readonly>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 form-group">
                                    <fieldset class="bordered">
                                        <legend>&nbsp;INFORMACIÓN FINAL</legend>
                                        <div class="col-lg-4 form-group">
                                            <label for="distancia_final">Distancia final: (Km)</label>
                                            <input type="number" class="form-control" name="distancia_final"
                                                id="distancia_final" placeholder="ejem: 10" required step="0.01">
                                        </div>
                                        <div class="col-lg-4 form-group">
                                            <label for="tiempo_final">Tiempo final: (h/m/s)</label>
                                            <input type="text" class="form-control" name="tiempo_final"
                                                id="tiempo_final" placeholder="ejem: h/m/s" required>
                                        </div>
                                        <div class="col-lg-4 form-group">
                                            <label for="dificultad_final">Dificultad final:</label>
                                            <select name="dificultad_final" id="dificultad_final" class="form-control"
                                                required>
                                                <option value="Bajo">Bajo</option>
                                                <option value="Medio">Medio</option>
                                                <option value="Alto">Alto</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 form-group">
                                            <label for="adversidad_final">Adversidad final:</label>
                                            <select name="adversidad_final" id="adversidad_final" class="form-control"
                                                required>
                                                <option value="Nada">Nada</option>
                                                <option value="Falla Del Vehículo">Falla Del Vehículo</option>
                                                <option value="Desastre Natural">Desastre Natural</option>
                                                <option value="Malas Carreteras">Malas Carreteras</option>
                                                <option value="Robo">Robo</option>
                                            </select>
                                        </div>
                                        <input type="hidden" name="id" id="id_seguimiento">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 form-group">
                                    <fieldset class="bordered">
                                        <legend>&nbsp;Documentos finales</legend>
                                        <div class="col-lg-4 form-group">
                                            <input type="file" class="form-control" name="doc_1_info">
                                        </div>
                                        <div class="col-lg-4 form-group">
                                            <input type="file" class="form-control" name="doc_2_info">
                                        </div>
                                        <div class="col-lg-4 form-group">
                                            <input type="file" class="form-control" name="doc_3_info">
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                <?php
                // $ControladorPlanMantennimiento->ctrCrearPlanMantenimiento($_POST);
                ?>
            </form>
        </div>
    </div>
</div>
<div id="modal_api_render" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 50%; height: 33%; top: 15%;">
        <div class="modal-content container-fluid" style="background-color: #39023b;">
            <form class='row' role="form" id="formTrazarTransporte" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Predicción de ruta</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <div class="col-lg-12 form-group " style="color:white;">
                                <div class="col-lg-6 form-group ">
                                    <label for="adversidades_api">Adverdidad:</label>
                                    <input type="text" class="form-control" id="adversidades_api" readonly>
                                </div>
                                <div class="col-lg-6 form-group ">
                                    <label for="dificultad_api">Nivel de Dificultad:</label>
                                    <input type="text" class="form-control" id="dificultad_api" readonly>
                                </div>
                                <div class="col-lg-6 form-group ">
                                    <label for="distancia_api">Distancia: (Km)</label>
                                    <input type="number" class="form-control" id="distancia_api" readonly>
                                </div>
                                <div class="col-lg-6 form-group ">
                                    <label for="tiempo_api">Tiempo: (h/m/s)</label>
                                    <input type="text" class="form-control" id="tiempo_api" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default bt_cerrar" data-dismiss="modal">Cerrar</button>
                </div>
                <?php
                // $ControladorPlanMantennimiento->ctrCrearPlanMantenimiento($_POST);
                ?>
            </form>
        </div>
    </div>
</div>
<div id="modal_cerrado" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 70%; height: 33%;">
        <div class="modal-content container-fluid">
            <form class='row' role="form" id="formRutaCerrada" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Datos de la ruta</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <div class="col-lg-12 form-group">
                                <fieldset class="bordered">
                                    <legend>&nbsp;Informacion de ruta aproximada</legend>
                                    <div class="col-lg-4 form-group">
                                        <label for="mc_distancia_a">Distancia: (Km)</label>
                                        <input type="text" class="form-control" id="mc_distancia_a" readonly>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="mc_tiempo_a">Tiempo: (h/m/s)</label>
                                        <input type="text" class="form-control" id="mc_tiempo_a" readonly>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="mc_dificultad_a">Dificultad</label>
                                        <input type="text" class="form-control" id="mc_dificultad_a" readonly>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="mc_start_end_a">Punto (Origen - Destino)</label>
                                        <input type="text" class="form-control" id="mc_start_end_a" readonly>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-12 form-group">
                                <fieldset class="bordered">
                                    <legend>&nbsp;Documentos de inicio</legend>
                                    <div class="col-lg-4 form-group">
                                        <label for="mc_file_1_a">Documentos 1</label>
                                        <a href="#" id="mc_file_1_a" target="_blank">
                                            <i class="fa fa-file">Documento 1</i>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="mc_file_2_a">Documentos 2</label>
                                        <a href="#" id="mc_file_2_a" target="_blank">
                                            <i class="fa fa-file">Documento 2</i>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="mc_file_3_a">Documentos 3</label>
                                        <a href="#" id="mc_file_3_a" target="_blank">
                                            <i class="fa fa-file">Documento 3</i>
                                        </a>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-12 form-group">
                                <fieldset class="bordered">
                                    <legend>&nbsp;Informacion final de ruta</legend>
                                    <div class="col-lg-4 form-group">
                                        <label for="mc_distancia_f">Distancia: (Km)</label>
                                        <input type="text" class="form-control" id="mc_distancia_f" readonly>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="mc_tiempo_f">Tiempo: (h/m/s)</label>
                                        <input type="text" class="form-control" id="mc_tiempo_f" readonly>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="mc_dificultad_f">Dificultad</label>
                                        <input type="text" class="form-control" id="mc_dificultad_f" readonly>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="mc_adversidades_f">Adversidades</label>
                                        <input type="text" class="form-control" id="mc_adversidades_f" readonly>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-12 form-group">
                                <fieldset class="bordered">
                                    <legend>&nbsp;Documentos de fin de ruta</legend>
                                    <div class="col-lg-4 form-group">
                                        <label for="mc_file_1_f">Documentos 1</label>
                                        <a href="#" id="mc_file_1_f" target="_blank">
                                            <i class="fa fa-file">Documento 1</i>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="mc_file_2_f">Documentos 2</label>
                                        <a href="#" id="mc_file_2_f" target="_blank">
                                            <i class="fa fa-file">Documento 2</i>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="mc_file_3_f">Documentos 3</label>
                                        <a href="#" id="mc_file_3_f" target="_blank">
                                            <i class="fa fa-file">Documento 3</i>
                                        </a>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
                <?php
                // $ControladorPlanMantennimiento->ctrCrearPlanMantenimiento($_POST);
                ?>
            </form>
        </div>
    </div>
</div>
<script>
    let listaActivosCerrados = [];
    if (map) {
        map.remove(); // Elimina el mapa si ya está inicializado.
    }

    // var map = L.map('map').setView([-12.050839, -76.888919], 14);
    var map = L.map('map').setView([-12.0376003, -77.0033164], 14);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var clickCount = 0;
    var startMarker = null;
    var endMarker = null;
    var rutaLayer = null;
    var ruta_geoJson = null;

    var st_lat = null;
    var st_lg = null;
    var en_lat = null;
    var en_lg = null;

    // Icono para el marcador de partida (azul)
    var blueIcon = L.icon({
        iconUrl: 'https://unpkg.com/leaflet@1.7.1/dist/images/marker-icon-2x.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowUrl: 'https://unpkg.com/leaflet@1.7.1/dist/images/marker-shadow.png',
        shadowSize: [41, 41]
    });

    // Icono para el marcador de llegada (rojo)
    var redIcon = L.icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png',
        shadowUrl: 'https://unpkg.com/leaflet@1.7.1/dist/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

    map.on('click', function (event) {
        var lat = event.latlng.lat; // Latitud
        var lon = event.latlng.lng; // Longitud


        if (clickCount === 0) {
            if (startMarker) {
                map.removeLayer(startMarker);
            }

            startMarker = L.marker([lat, lon], {
                icon: blueIcon
            })
                .addTo(map)
                .bindPopup('Punto de partida: ' + lat.toFixed(6) + ', ' + lon.toFixed(6))
                .openPopup();
        } else if (clickCount === 1) {
            if (endMarker) {
                map.removeLayer(endMarker);
            }

            endMarker = L.marker([lat, lon], {
                icon: redIcon
            })
                .addTo(map)
                .bindPopup('Punto de llegada: ' + lat.toFixed(6) + ', ' + lon.toFixed(6))
                .openPopup();
        } else if (clickCount === 2) {
            map.removeLayer(startMarker);

            startMarker = L.marker([lat, lon], {
                icon: blueIcon
            })
                .addTo(map)
                .bindPopup('Punto de partida: ' + lat.toFixed(6) + ', ' + lon.toFixed(6))
                .openPopup();

            map.removeLayer(endMarker);
            endMarker = null;

            clickCount = 0;
        }

        clickCount++;

        if (clickCount > 2) {
            clickCount = 0;
        }
    });

    $(document).on('click', '.tbn-ruta', function (e) {
        e.preventDefault();

        if (startMarker && endMarker) {
            var startLatLng = startMarker.getLatLng();
            var endLatLng = endMarker.getLatLng();

            var formData = new FormData();
            var cordenadaStart = startLatLng.lng.toFixed(6) + ', ' + startLatLng.lat.toFixed(6);
            var cordenadaEnd = endLatLng.lng.toFixed(6) + ', ' + endLatLng.lat.toFixed(6);
            var accion = "trazarRuta";

            formData.append('accion', 'trazarRuta');
            formData.append('cor_start', cordenadaStart);
            formData.append('cor_end', cordenadaEnd);

            $.ajax({
                type: 'post',
                url: 'controladores/gestion-transporte.controlador.php',
                data: formData,
                processData: false,
                contentType: false,

                success: function (resp) {
                    ruta_geoJson = resp;
                    cargarRuta(resp);
                }
            });
        } else {
            alert('Faltan puntos de partida o llegada. Por favor, selecciona ambos puntos en el mapa.');
        }
    });

    function get_ruta(_cordenadaStart, _cordenadaEnd) {
        var formData = new FormData();

        formData.append('accion', 'trazarRuta');
        formData.append('cor_start', _cordenadaStart);
        formData.append('cor_end', _cordenadaEnd);

        $.ajax({
            type: 'post',
            url: 'controladores/gestion-transporte.controlador.php',
            data: formData,
            processData: false,
            contentType: false,

            success: function (resp) {
                // ruta_geoJson = resp;
                _cargarRuta(resp);
            }
        });
    }

    function get_ruta_edit(_cordenadaStart, _cordenadaEnd) {
        var formData = new FormData();

        formData.append('accion', 'trazarRuta');
        formData.append('cor_start', _cordenadaStart);
        formData.append('cor_end', _cordenadaEnd);

        $.ajax({
            type: 'post',
            url: 'controladores/gestion-transporte.controlador.php',
            data: formData,
            processData: false,
            contentType: false,

            success: function (resp) {
                // ruta_geoJson = resp;
                edit_cargarRuta(resp);
            }
        });
    }

    function _cargarRuta(rutaCor) {

        if (rutaLayer) {
            map_2.removeLayer(rutaLayer);
        }

        rutaLayer = L.geoJSON(rutaCor, {
            style: {
                color: 'blue',
                weight: 4,
                opacity: 0.7
            }
        }).addTo(map_2);
        optenerInfoRuta(rutaCor);
    }

    function edit_cargarRuta(rutaCor) {

        if (rutaLayer) {
            map_3.removeLayer(rutaLayer);
        }

        rutaLayer = L.geoJSON(rutaCor, {
            style: {
                color: 'blue',
                weight: 4,
                opacity: 0.7
            }
        }).addTo(map_3);
        optenerInfoRuta(rutaCor);
    }

    function cargarRuta(rutaCor) {

        if (rutaLayer) {
            map.removeLayer(rutaLayer);
        }

        rutaLayer = L.geoJSON(rutaCor, {
            style: {
                color: 'blue',
                weight: 4,
                opacity: 0.7
            }
        }).addTo(map);
        optenerInfoRuta(rutaCor);
    }

    function optenerInfoRuta(ruta) {
        var distance = ruta.features[0].properties.segments[0].distance;
        var duration = ruta.features[0].properties.segments[0].duration;
        var _duracion = convertirSegundosAHoras(duration);
        // var kl_distancia = distance / 1000;
        var kl_distancia = (distance / 1000).toFixed(2);
        $('#tiempo').val(_duracion);
        $('#distancia').val(kl_distancia);
    }

    function convertirSegundosAHoras(segundos) {
        const horas = Math.floor(segundos / 3600);
        const minutos = Math.floor((segundos % 3600) / 60);
        const segundosRestantes = (segundos % 60).toFixed(2);

        return `${horas.toString().padStart(2, '0')}:${minutos.toString().padStart(2, '0')}:${segundosRestantes.toString().padStart(2, '0')}`;
    }

    function convertirMinutosAHoras(minutos) {
        const horas = Math.floor(minutos / 60);
        const minutosRestantes = Math.floor(minutos % 60);
        const segundosRestantes = ((minutos % 1) * 60).toFixed(2);

        return `${horas.toString().padStart(2, '0')}:${minutosRestantes.toString().padStart(2, '0')}:${segundosRestantes.toString().padStart(2, '0')}`;
    }

    $(document).ready(function () {
        getActivo();
        getConductor();
        cargarDatos();
        if ($("#map_2").length) {
            window.map_2 = L.map('map_2').setView([0, 0], 2); // Inicializa el mapa con coordenadas neutras
        }
        if ($("#map_edit").length) {
            window.map_3 = L.map('map_edit').setView([0, 0], 2); // Inicializa el mapa con coordenadas neutras
        }
        // Llama a la función al cargar la página

        // Detecta cambios en los botones
        $("input[name='rdb_btn']").on('change', verificarSeleccionado);

    })

    function verificarSeleccionado() {
        var seleccionado = $("input[name='rdb_btn']:checked").val();
        if (seleccionado == "rutas_closed") {
            filtrarTabla(2);
            console.log("mostrar rutas cerradas");
            $('.btnEditarRuta').hide();
            $('.btnSeguirRuta').hide();
            $('.btnVerRutaCerrada').show();


        } else {
            filtrarTabla(1);
            console.log("mostrar rutas abiertas");
            $('.btnEditarRuta').show();
            $('.btnSeguirRuta').show();
            $('.btnVerRutaCerrada').hide();

        }
        console.log("Botón seleccionado:", seleccionado);
    }

    function getActivo() {
        var formData = new FormData();
        formData.append('accion', 'getActivo');
        $.ajax({
            url: 'controladores/gestion-transporte.controlador.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (respuesta) {
                cargar_list_active(respuesta);
                $('#activo').find('option').not(':first').remove();
                $.each(respuesta, function (index, registro) {
                    $('#activo').append($('<option>', {
                        value: registro.id,
                        text: registro.descripcion + ' - ' + registro.placa
                    }));
                })
                $('#activo_edit').find('option').not(':first').remove();
                $.each(respuesta, function (index, registro) {
                    $('#activo_edit').append($('<option>', {
                        value: registro.id,
                        text: registro.descripcion + ' - ' + registro.placa
                    }));
                })
            },
            error: function (error) {
                console.log('Error al cargar las opciones:', error);
            }
        })
    };
    // <div class="card cr_${registro.id}" style="width: 18rem; background-color:#21c221">

    function cargar_list_active(data) {
        var $container = $('#card-container'); // Contenedor de las tarjetas

        $.each(data, function (index, registro) {
            var cardHtml = `
            <div class="col-lg-2 col-md-4 col-sm-6 " >
                <div class="card cr_${registro.id}" style="width: 18rem; background-color: rgb(4, 255, 0)">
                    <img src="${registro.foto_activo}" class="card-img-top img-fluid" style="max-width: 100%; height: auto;">
                    <div class="card-body">
                        <label class="card-text">Placa: ${registro.placa}</label>
                        <label class="card-text">Modelo: ${registro.descripcion}</label>
                        <label class="card-text">Marca: ${registro.marca}</label>
                    </div>
                </div>
            </div>
        `;
            $container.append(cardHtml);
        });
    }

    function getConductor() {
        var formData = new FormData();
        formData.append('accion', 'getConductor');
        $.ajax({
            url: 'controladores/gestion-transporte.controlador.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (respuesta) {
                $('#miSelect').find('option').not(':first').remove();
                $.each(respuesta, function (index, registro) {
                    $('#miSelect').append($('<option>', {
                        value: registro.proveedor_pk,
                        text: registro.razon_social
                    }));
                })

                $('#miSelect_edit').find('option').not(':first').remove();
                $.each(respuesta, function (index, registro) {
                    $('#miSelect_edit').append($('<option>', {
                        value: registro.proveedor_pk,
                        text: registro.razon_social
                    }));
                })
            },
            error: function (error) {
                console.log('Error al cargar las opciones:', error);
            }
        });
    }

    function opcionSeleccionada(valor) {
        $('.' + valor + ' input[type="text"], .' + valor + ' input[type="number"], .' + valor + ' input[type="file"]').val('');
        $('.' + valor + '').hide();
    }

    function opcionVacia(valor) {
        $('.' + valor + '').show();
    }

    $(document).on('click', '.bt_cerrar', function (e) {
        e.preventDefault();
        window.location = "gestion-transporte";
    });

    $(document).on('submit', '#formSeguirRuta', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('accion', 'serrar_ruta');
        $.ajax({
            url: 'controladores/gestion-transporte.controlador.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (resp) {
                console.log(resp);
                if (resp.status === "ok") {
                    console.log(resp);

                    swal({
                        type: "success",
                        title: "La ruta ha sido creada con éxito",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result) => {

                        window.location = "gestion-transporte";

                    });
                } else {
                    alert("Error al crear la planificación de ruta. Por favor, inténtalo de nuevo.");
                }
            },
            error: function (xhr, status, error) {
                console.error("Error en la solicitud AJAX:", status, error);
            }
        });
    })

    $(document).on('submit', '#formTrazarTransporte', function (e) {
        e.preventDefault();

        // Obtener el valor seleccionado en el select
        const valorActivo = $('#activo').val();

        // Validar si el valor está en la lista
        if (listaActivosCerrados.includes(valorActivo)) {
            // Mostrar alerta si el valor está en la lista
            swal({
                type: "warning",
                title: "Error",
                text: "El activo seleccionado ya está en la lista de rutas cerradas.",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
            });
            return; // Interrumpir el submit
        }

        // Si no está en la lista, continuar con el proceso normal
        var formData = new FormData(this);

        var startLatLng = startMarker.getLatLng();
        var endLatLng = endMarker.getLatLng();

        var cordenadaStart = startLatLng.lng.toFixed(6) + ', ' + startLatLng.lat.toFixed(6);
        var cordenadaEnd = endLatLng.lng.toFixed(6) + ', ' + endLatLng.lat.toFixed(6);

        formData.append('startM_lat', startLatLng.lat.toFixed(6));
        formData.append('startM_lng', startLatLng.lng.toFixed(6));
        formData.append('endM_lat', endLatLng.lat.toFixed(6));
        formData.append('endM_lng', endLatLng.lng.toFixed(6));

        formData.append('accion', 'crearTrazo');

        $.ajax({
            url: 'controladores/gestion-transporte.controlador.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (resp) {
                if (resp.status === "ok") {
                    console.log(resp);
                    var parsedMessage = JSON.parse(resp.message);

                    var adversidades = parsedMessage.Adversidades;
                    var dificultad = parsedMessage.Dificultad;
                    var distancia = parsedMessage.Distancia;
                    var tiempo = parsedMessage.Tiempo;

                    swal({
                        type: "success",
                        title: "La ruta ha sido creada con éxito",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result) => {
                        if (result.value) {
                            $('#modal_api_render').modal('show');
                            $('#adversidades_api').val(adversidades);
                            $('#dificultad_api').val(dificultad);
                            $('#distancia_api').val(distancia.toFixed(2));
                            $('#tiempo_api').val(convertirMinutosAHoras(tiempo));
                        }
                    });
                } else {
                    alert("Error al crear la planificación de ruta. Por favor, inténtalo de nuevo.");
                }
            },
            error: function (xhr, status, error) {
                console.error("Error en la solicitud AJAX:", status, error);
            }
        });
    });


    $(document).on('submit', '#formTrazarTransporte_editar', function (e) {
        e.preventDefault();
        const valorActivo_db = $('#activ_db').val();
        const valorActivo = $('#activo_edit').val();

        if (valorActivo !== valorActivo_db) {
            if (listaActivosCerrados.includes(valorActivo)) {
                swal({
                    type: "warning",
                    title: "Error",
                    text: "El activo seleccionado ya está en la lista de rutas cerradas.",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                });
                return;
            }
        }
        var formData = new FormData(this);

        formData.append('startM_lat', st_lat)
        formData.append('startM_lng', st_lg)
        formData.append('endM_lat', en_lat)
        formData.append('endM_lng', en_lg)

        formData.append('accion', 'EditarTrazo')

        $.ajax({
            url: 'controladores/gestion-transporte.controlador.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (resp) {
                if (resp.status === "ok") {

                    var parsedMessage = JSON.parse(resp.message);

                    var adversidades = parsedMessage.Adversidades;
                    var dificultad = parsedMessage.Dificultad;
                    var distancia = parsedMessage.Distancia;
                    var tiempo = parsedMessage.Tiempo;

                    swal({
                        type: "success",
                        title: "Gestion de ruta a sido editada correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result) => {
                        if (result.value) {
                            $('#modal_api_render').modal('show');
                            $('#adversidades_api').val(adversidades);
                            $('#dificultad_api').val(dificultad);
                            $('#distancia_api').val(distancia.toFixed(2));
                            $('#tiempo_api').val(convertirMinutosAHoras(tiempo));
                        }
                    })
                } else {
                    alert("Erro al editar. Por favor, inténtalo de nuevo.");
                }
            },
            error: function (xhr, status, error) {
                console.error("Error en la solicitud AJAX:", status, error);
            }
        })
    })

    function cargarDatos() {
        $.ajax({
            url: "modelos/gestion-transporte.modelo.php",
            method: "POST",
            data: {
                accion: 'loadJoins'
            },
            dataType: "json",
            success: function (respuesta) {
                $('#tablaGestionRuta tbody').empty();
                if (respuesta && respuesta.length > 0) {
                    $.each(respuesta, function (index, registro) {
                        var fila = ` 
                        <tr class="filaDatos" data-state="${registro.state}"> 
                        <td>${registro.id}</td> 
                        <td>${activeContent(registro)}</td> 
                        <td>${documentLinks(registro)}</td> 
                        <td>${conductorContent(registro)}</td> 
                        <td>${conductorDocLinks(registro)}</td> 
                        <td>${registro.ruta}</td> 
                        <td>${registro.nombre_cliente}</td> 
                        <td> 
                        <img onclick="window.open('./controladores/pdf.controlador.php?id=${btoa(registro.cotizacion_id)}&deque=pdf_cotizacion', '_blank'),pinta_filas('1863painttr')" src="vistas/img/plantilla/pdf.png" style="width: 35px !important"> 
                        </td> 
                        <td>${additionalDocs(registro)}</td>
                        <td> 
                        <center> 
                        <a style="margin-top: 4px !important" class="btn btn-info btn-xs btnEditarRuta" data-id="${registro.id}" data-toggle="modal" data-target="#modalEditarGestion"><i class="fa fa-pencil"></i> Editar</a> 
                        <a style="margin-top: 4px !important" class="btn btn-danger btn-xs btnEliminarRuta" data-id="${registro.id}" data-toggle="modal" data-target="#modalEliminarPlanMantenimiento"><i class="fa fa-pencil"></i> Eliminar</a> 
                        <a style="margin-top: 4px !important" class="btn btn-info btn-xs btnSeguirRuta" data-id="${registro.id}" data-toggle="modal" data-target="#modalSeguirRuta"><i class="fa fa-pencil"></i> Cerrar Ruta</a> 
                        <a style="margin-top: 4px !important" class="btn btn-success btn-xs btnVerRutaCerrada" data-id="${registro.id}" data-toggle="modal" data-target="#modal_cerrado"><i class="fa fa-pencil"></i> Datos del Transporte</a> 
                        </center> 
                        <br> 
                        </td> 
                        </tr>`;
                        $('#tablaGestionRuta tbody').append(fila);
                    });
                }
                validarRutaCerrrada(respuesta);
                verificarSeleccionado();

            }
        });
    };
    function activeContent(registro) {
        var active = registro.activo_id;
        if (active == 0 || active === null) {
            return `Vehículo: ${registro.descripcion_active}<br>Placa: ${registro.placa_active}`;
        } else { return `Vehículo: ${registro.descripcion}<br>Placa: ${registro.placa}`; }
    }
    function documentLinks(registro) {
        var active = registro.activo_id; var docs = [];
        if (active == 0 || active === null) { docs.push(linkOrPlaceholder(registro.file_active)); }
        else { docs.push(linkOrPlaceholder(registro.documentos_propiedad)); docs.push(linkOrPlaceholder(registro.foto_activo)); } return docs.join('<br>');
    }
    function conductorContent(registro) {
        var conductor = registro.conductor_id;
        if (conductor == 0 || conductor === null) { return registro.nombre_tranport; }
        else { return registro.razon_social; }
    }
    function conductorDocLinks(registro) {
        var conductor = registro.conductor_id;
        var docs = [];
        if (conductor == 0 || conductor === null) { docs.push(linkOrPlaceholder(registro.file_tranport)); }
        else { docs.push(linkOrPlaceholder(registro.cv)); } return docs.join('<br>');
    }
    function linkOrPlaceholder(doc) {
        if (doc) { return `<a href="${doc}" target="_blank"><i class="fa fa-file"> doc_mtc</i></a>`; }
        else { return '<i class="fa fa-file text-muted"> doc_mtc </i>'; }
    }
    function additionalDocs(registro) {
        var docs = [];
        docs.push(linkOrPlaceholder(registro.file_1));
        docs.push(linkOrPlaceholder(registro.file_2));
        docs.push(linkOrPlaceholder(registro.file_3));
        return docs.join('<br>');
    }
    function linkOrPlaceholder(doc) {
        if (doc) { return `<a href="${doc}" target="_blank"><i class="fa fa-file"> doc_mtc</i></a>`; }
        else { return '<i class="fa fa-file text-muted"> doc_mtc </i>'; }
    }
    function validarRutaCerrrada(data) {
        $.each(data, function (index, registro) {
            const elemento = $('.cr_' + registro.activo_id);
            console.log(`Elemento: .cr_${registro.activo_id}`, elemento);
            if (registro.state == "1" && elemento.length > 0) {
                console.log('aplicar a : ' + registro.activo_id)
                elemento.addClass('highlight-red'); // Aplicar la clase CSS
                if (!listaActivosCerrados.includes(registro.activo_id)) {
                    listaActivosCerrados.push(registro.activo_id);
                }
            } else if (elemento.length === 0) {
                console.warn(`No se encontró el elemento .cr_${registro.activo_id} en el DOM`);
            }
        });
    }



    $(document).on('click', '.btnSeguirRuta', function (e) {
        e.preventDefault();
        var idRuta = $(this).data('id');

        $.ajax({
            url: "modelos/gestion-transporte.modelo.php",
            method: "POST",
            data: {
                accion: 'load_X_Id',
                id: idRuta
            },
            dataType: "json",
            success: function (respuesta) {
                // Verifica si el mapa ya está inicializado
                if (window.map_2) {
                    window.map_2.remove(); // Elimina el mapa existente
                }

                // Crea una nueva instancia del mapa
                window.map_2 = L.map('map_2');
                var _point1;
                var _point2;

                $.each(respuesta, function (index, registro) {

                    $('#ruta_red').val(registro.ruta)
                    $('#distancia_aprox').val(registro.distancia_aprox)
                    $('#tiempo_aprox').val(registro.tiempo_aprox)
                    $('#dificultad_aprox').val(registro.dificultad)
                    $('#id_seguimiento').val(registro.id)

                    var point1 = [registro.startM_lat, registro.startM_lng];
                    var point2 = [registro.endM_lat, registro.endM_lng];

                    _point1 = [registro.startM_lng, registro.startM_lat];
                    _point2 = [registro.endM_lng, registro.endM_lat];

                    map_2.fitBounds([point1, point2]);

                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(map_2);

                    L.marker(point1).addTo(map_2).bindPopup("Punto 1").openPopup();
                    L.marker(point2).addTo(map_2).bindPopup("Punto 2");
                });
                get_ruta(_point1, _point2);
            },
            error: function (xhr, status, error) {
                console.error("Error en la solicitud AJAX:", status, error);
            }
        });
    });
    $(document).on('click', '.btnEliminarRuta', function (e) {
        e.preventDefault();
        var idRuta = $(this).data('id');
        $.ajax({
            url: "modelos/gestion-transporte.modelo.php",
            method: "POST",
            data: {
                accion: 'eliminar',
                id: idRuta
            },
            dataType: "json",
            success: function (respuesta) {
                if (respuesta == 'ok') {
                    swal({
                        type: "success",
                        title: "Gestion de la ruta a sido eliminado",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result) => {
                        if (result.value) {
                            window.location = "gestion-transporte";
                        }
                    })
                } else {
                    alert("Erro al eliminar. Por favor, inténtalo de nuevo.");
                }
            },
            error: function (xhr, status, error) {
                console.error("Error en la solicitud AJAX:", status, error);
            }
        })
    })
    $(document).on('click', '.btnEditarRuta', function (e) {
        e.preventDefault();
        var idRuta = $(this).data('id');

        $.ajax({
            url: "modelos/gestion-transporte.modelo.php",
            method: "POST",
            data: {
                accion: 'load_X_Id',
                id: idRuta
            },
            dataType: "json",
            success: function (respuesta) {
                if (window.map_3) {
                    window.map_3.remove(); // Elimina el mapa existente
                }

                // Crea una nueva instancia del mapa
                window.map_3 = L.map('map_edit');
                var _point1;
                var _point2;

                $.each(respuesta, function (index, registro) {
                    $('#cotizacion_edit').val(registro.cotizacion_id).trigger("change");
                    $('#activo_edit').val(registro.activo_id).trigger("change");
                    $('#miSelect_edit').val(registro.conductor_id).trigger("change");
                    $('#distancia_edit').val(registro.distancia_aprox);
                    $('#tiempo_edit').val(registro.tiempo_aprox);
                    $('#description_activo_edit').val(registro.descripcion_active);
                    $('#placa_activo_edit').val(registro.placa_active);
                    $('#tipo_activo_edit').val(registro.tipo_active);
                    $('#marca_activo_edit').val(registro.marca_active);
                    $('#modelo_activo_edit').val(registro.modelo_active);
                    $('#capacidad_activo_edit').val(registro.capacidad_active);
                    $('#doc-activo_edit_db').val(registro.file_active);
                    $('#nom_res_edit').val(registro.nombre_tranport);
                    $('#dni_res_edit').val(registro.dni_tranport);
                    $('#n_licencia_res_edit').val(registro.n_licencia_tranport);
                    $('#contacto_nom_res_res').val(registro.contac_tranport);
                    $('#doc_res_edit_db').val(registro.file_tranport);
                    $('#doc_1_info_db').val(registro.file_1);
                    $('#doc_2_info_db').val(registro.file_2);
                    $('#doc_3_info_db').val(registro.file_3);
                    $('#observacion_edit').val(registro.observation);
                    $('#dificultad_edit').val(registro.dificultad).trigger('change');
                    $('#ruta_pp_edit').val(registro.ruta);
                    $('#id').val(registro.id);
                    $('#activ_db').val(registro.activo_id);
                    var img = registro.file_active;

                    if (img && img.trim() !== "") {
                        $('#previsualizarImagen').attr('src', img);

                    } else {
                        $('#previsualizarImagen').attr('src', 'vistas/img/productos/default/anonymous.png');
                    }
                    st_lat = registro.startM_lat;
                    st_lg = registro.startM_lng;
                    en_lat = registro.endM_lat;
                    en_lg = registro.endM_lng;

                    var point1 = [registro.startM_lat, registro.startM_lng];
                    var point2 = [registro.endM_lat, registro.endM_lng];

                    _point1 = [registro.startM_lng, registro.startM_lat];
                    _point2 = [registro.endM_lng, registro.endM_lat];

                    map_3.fitBounds([point1, point2]);

                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(map_3);

                    L.marker(point1).addTo(map_3).bindPopup("Punto 1").openPopup();
                    L.marker(point2).addTo(map_3).bindPopup("Punto 2");

                });
                get_ruta_edit(_point1, _point2);
            },
            error: function (xhr, status, error) {
                console.error("Error en la solicitud AJAX:", status, error);
            }
        });
    });

    $(document).on('change', '#activo, #activo_edit', function (e) {
        e.preventDefault();
        var id = $(this).attr('id');
        var suffix = id === 'activo' ? '' : '_edit';
        var target = 'com-infor-active' + suffix;

        if ($(this).val()) {
            opcionSeleccionada(target);
        } else {
            opcionVacia(target);
        }
    });
    $(document).on('change', '#miSelect, #miSelect_edit', function (e) {
        e.preventDefault();
        var id = $(this).attr('id');
        var suffix = id === 'miSelect' ? '' : '_edit';
        var target = 'com-resp-trans' + suffix;

        if ($(this).val()) {
            opcionSeleccionada(target);
        } else {
            opcionVacia(target);
        }
    });
    function filtrarTabla(estado) {
        console.log('cccccccccccccccccccccccc');
        $('#tablaGestionRuta tbody tr').hide();
        $('#tablaGestionRuta tbody tr').filter(function () {
            return $(this).data('state') == estado;
        }).show();
    }
    $(document).on('click', '.btnVerRutaCerrada', function (e) {
        e.preventDefault();
        var idRuta = $(this).data('id');
        $.ajax({
            url: "modelos/gestion-transporte.modelo.php",
            method: "POST",
            data: {
                accion: 'load_cerradas',
                id: idRuta
            },
            dataType: "json",
            success: function (respuesta) {
                console.log(respuesta);
                $.each(respuesta, function (index, registro) {
                    $('#mc_distancia_a').val(registro.distancia_aprox);
                    $('#mc_tiempo_a').val(registro.tiempo_aprox);
                    $('#mc_dificultad_a').val(registro.dificultad);

                    $('#mc_start_end_a').val(registro.ruta);
                    setLink('#mc_file_1_a', registro.file_1);
                    setLink('#mc_file_2_a', registro.file_2);
                    setLink('#mc_file_3_a', registro.file_3);

                    $('#mc_distancia_f').val(registro.distancia_final);
                    $('#mc_tiempo_f').val(registro.tiempo_final);
                    $('#mc_dificultad_f').val(registro.dificultad_final);
                    $('#mc_adversidades_f').val(registro.adversidades);

                    setLink('#mc_file_1_f', registro.doc_in_1);
                    setLink('#mc_file_2_f', registro.doc_in_2);
                    setLink('#mc_file_3_f', registro.doc_in_3);
                });
            },
            error: function (xhr, status, error) {
                console.error("Error en la solicitud AJAX:", status, error);
            }
        });
    })
    function setLink(selector, url) {
        if (url) {
            $(selector).attr('href', url).removeClass('disabled-link');
        }
        else {
            $(selector).removeAttr('href').addClass('disabled-link');
        }
    }
</script>