<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<style>
    .modal-dialog-wide {
        width: 99%;
        max-width: none;
    }

    .select2-container .select2-selection--single .select2-selection__rendered {
        white-space: normal !important;
        word-wrap: break-word !important;
    }

    .estado-cuadro {
        display: inline-block;
        padding: 2px 5px;
        color: white;
        border-radius: 4px;
        font-size: 0.8em;
    }

    .estado-anulada {
        background-color: red;
    }

    .estado-atendida {
        background-color: green;
    }

    .estado-pendiente {
        background-color: orange;
    }

    .table-container {
        overflow-y: auto;
    }

    .img-thumbnail-custom {
        max-width: 50%;
        height: auto;
        width: auto;
        object-fit: cover;
    }

    .img-thumbnail-custom-2 {
        max-width: 10%;
        height: auto;
        width: auto;
        object-fit: cover;
    }

    /* @media (max-width: 768px) {
        .img-thumbnail-custom {
            max-width: 60%;
        }
    } */
    .img-thumbnail-custom-foto {
        max-width: 100%;
        height: auto;
        width: auto;
        object-fit: cover;
    }

    .required-asterisk {
        color: red;
        margin-left: 5px;
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Registro de Activos Fijos
            <small>Gestión integral de activos</small>
        </h1>
    </section>
    <?php
    require_once "controladores/activos-fijos.controlador.php";
    require_once "modelos/activos-fijos.modelo.php";
    $ControladorActivoFijo = new ControladorActivosFijos();
    ?>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarActivo">
                            <i class="fa fa-plus-square"></i> Agregar Activo
                        </button>
                    </div>
                    <div class="box-body">
                        <div class="table-container">

                            <BR>
                            <input type="text" id="searchInput" placeholder="Buscar en la tabla..." class="form-control"
                                style='width: 300px;float: right; margin-bottom: 10px'>

                            <table id="tablaActivosFijos" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Fecha de Registro</th>
                                        <th>Descripción</th>
                                        <th>Categoría</th>
                                        <th>Ubicación</th>
                                        <th>Tipo de moneda</th>
                                        <th>Valor de Cambio</th>
                                        <th>Valor de Compra (S/.)</th>
                                        <th>Fecha de Adquisición</th>
                                        <th>Vida Útil (años)</th>
                                        <th>Tasa de Depreciación (%)</th>
                                        <th>Valor Residual (S/.)</th>
                                        <th>Estado</th>
                                        <th>Usuario</th>
                                        <th>Proveedor</th>
                                        <th>Código Interno</th>
                                        <th>Fecha de Inicio de Uso</th>
                                        <th>Método de Depreciación</th>
                                        <th>Garantía marca (años)</th>
                                        <th>Garantía proveedor (años)</th>
                                        <th>Estado Operativo</th>
                                        <th>Marca</th>
                                        <th>Serie motor</th>
                                        <th>Serie chasis</th>
                                        <th>Placa</th>
                                        <th>Observaciones</th>
                                        <th>Documentos</th>
                                        <th>Fotos</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $item = null;
                                    $valor = null;
                                    $array = $ControladorActivoFijo->ctrMostrarActivosFijos($item, $valor);

                                    foreach ($array as $key => $value) {

                                        $botonEditar = '<a style="margin-top: 4px !important" href="javascript:void(0);" class="btn btn-info btn-xs btnEditarActivoFijo" data-id="' . $value["id"] . '"  data-toggle="modal" data-target="#modalEditarSolicitud"><i class="fa fa-pencil"></i> Editar</a>';
                                        $botonEliminar = '<a style="margin-top: 4px !important" href="javascript:void(0);" class="btn btn-danger btn-xs btnEliminarActivoFijo" data-id="' . $value["id"] . '"  data-toggle="modal" data-target="#modallEliminarSolicitud"><i class="fa fa-pencil"></i> Eliminar</a>';

                                        echo '<tr>
                                        <td>' . ($key + 1) . '</td>
                                        <td class="text-uppercase">' . $value["fecha_registro"] . '</td>
                                        <td class="text-uppercase">' . $value["descripcion"] . '</td>
                                        <td class="text-uppercase">' . $value["categoria"] . '</td>
                                        <td class="text-uppercase">' . $value["ubicacion"] . '</td>
                                        <td class="text-uppercase">' . $value["tipo_moneda"] . '</td>
                                        <td class="text-uppercase">' . $value["valor_compra"] . '</td>
                                        <td class="text-uppercase">' . $value["valor_compra_p"] . '</td>
                                        <td class="text-uppercase">' . $value["fecha_adquisicion"] . '</td>
                                        <td class="text-uppercase">' . $value["vida_util"] . '</td>
                                        <td class="text-uppercase">' . $value["tasa_depreciacion"] . '</td>
                                        <td class="text-uppercase">' . $value["valor_residual"] . '</td>
                                        <td class="text-uppercase">' . $value["estado"] . '</td>
                                        <td class="text-uppercase">' . $value["usuario"] . '</td>
                                        <td class="text-uppercase">' . $value["proveedor"] . '</td>
                                        <td class="text-uppercase">' . $value["codigo_interno"] . '</td>
                                        <td class="text-uppercase">' . $value["fecha_inicio_uso"] . '</td>
                                        <td class="text-uppercase">' . $value["metodo_depreciacion"] . '</td>
                                        <td class="text-uppercase">' . $value["garantia_marca"] . '</td>
                                        <td class="text-uppercase">' . $value["garantia_proveedor"] . '</td>
                                        <td class="text-uppercase">' . $value["estado_operativo"] . '</td>
                                        <td class="text-uppercase">' . $value["marca"] . '</td>
                                        <td class="text-uppercase">' . $value["serie_motor"] . '</td>
                                        <td class="text-uppercase">' . $value["chasis_serie"] . '</td>
                                        <td class="text-uppercase">' . $value["placa"] . '</td>

                                        <td class="text-uppercase">' . $value["observaciones"] . '</td>
                                        <td class="text-uppercase">';

                                        if (!empty($value["documentos_propiedad"])) {
                                            echo '<a href="' . $value["documentos_propiedad"] . '" target="_blank">
                                                <img src="' . $value["documentos_propiedad"] . '" class="img-thumbnail-custom" onerror="this.onerror=null;this.src=\'vistas/img/plantilla/pdf.png\';">
                                            </a>';
                                        } else {
                                            echo '<img src="vistas/img/plantilla/pdf-bn.png" class="img-thumbnail-custom">';
                                        }

                                        echo '</td>
                                        <td class="text-uppercase">';

                                        if (!empty($value["foto_activo"])) {
                                            echo '<a href="' . $value["foto_activo"] . '" target="_blank">
                                                <img src="' . $value["foto_activo"] . '" class="img-thumbnail-custom-foto" onerror="this.onerror=null;this.src=\'vistas/img/productos/default/anonymous.png\';">
                                            </a>';
                                        } else {
                                            echo '<img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail-custom-foto">';
                                        }

                                        echo '</td>
                                        <td><center>' . $botonEditar . '<br>' . $botonEliminar . '</center></td>
                                    </tr>';
                                    }
                                    ?>
                                    <!-- Los registros se insertarán aquí mediante JavaScript -->
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal para agregar/editar activo fijo -->
<div id="modalAgregarActivo" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-wide">
        <!-- Modal content-->
        <div class="modal-content">
            <form id="formActivoFijo" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Activo Fijo</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4 form-group">
                            <label for="descripcion">Descripción:</label>
                            <span class="required-asterisk">*</span>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                        </div>
                        <div class="col-lg-4 form-group">
                            <label for="categoria">Categoría:</label>
                            <span class="required-asterisk">*</span>
                            <select class="form-control select2" id="categoria" name="categoria" style="width: 100%;">
                                <option value="Terreno">Terreno</option>
                                <option value="Edificio">Edificio</option>
                                <option value="ConstruccionComplementaria">Construcción complementaria</option>
                                <option value="MejoraTerreno">Mejora en terreno</option>


                                <option value="MaquinariaPesada">Maquinaria pesada</option>
                                <option value="MaquinariaLigera">Maquinaria liviana</option>
                                <option value="EquipoOficina">Equipo de oficina</option>
                                <option value="EquipoTransporte">Equipo de transporte</option>
                                <option value="MobiliarioEnseres">Mobiliario y enseres</option>
                                <option value="EquipoTelecomunicaciones">Equipo de telecomunicaciones</option>
                                <option value="EquipoInformatico">Equipo informático</option>
                                <option value="Software">Software</option>


                                <option value="VehiculoAutomotor">Vehículo automotor</option>
                                <option value="VehiculoNoAutomotor">Vehículo no automotor</option>

                                <option value="Motocicleta">Motocicleta</option>
                                <option value="Aeronave">Aeronave</option>
                                <option value="Embarcacion">Embarcación</option>


                                <option value="Patente">Patente</option>
                                <option value="Marca">Marca</option>
                                <option value="DerechoAutor">Derecho de autor</option>
                                <option value="Concesion">Concesión</option>
                                <option value="FondoComercio">Fondo de comercio</option>
                                <option value="Goodwill">Goodwill</option>


                                <option value="MuebleEnseres">Muebles y enseres</option>
                                <option value="EquipoLaboratorio">Equipo de laboratorio</option>
                                <option value="ObraArte">Obra de arte</option>
                                <option value="Joya">Joya</option>
                                <option value="MetalPrecioso">Metal precioso</option>
                                <option value="Animal">Animal</option>
                                <!-- Más categorías -->
                            </select>
                        </div>
                        <div class="col-lg-4 form-group">
                            <label for="ubicacion">Ubicación:</label>
                            <span class="required-asterisk">*</span>
                            <input type="text" class="form-control" id="ubicacion" name="ubicacion"
                                placeholder="Ubicancion a la pertenece el activo fijo" required>
                        </div>
                        <div class="col-lg-4 form-group">
                            <label for="tipoMoneda">Tipo de Moneda:</label>
                            <span class="required-asterisk">*</span>
                            <select id="tipoMoneda" class="form-control" name="tipo_moneda"
                                onchange="cambiarMonedaActualizarTipoCambio(this.value, this.id)">
                                <option value="PEN">Soles</option>
                                <option value="USD">Dólares</option>
                            </select>
                        </div>
                        <div class="col-lg-4 form-group">
                            <label for="valorCompra">Valor de cambio (<b class='simboloMoneda'></b>):</label>
                            <!-- <input type="number" class="form-control" id="valorCompra" name="valorCompra" required step="0.01" readonly> -->
                            <input type="text" class="form-control" id="valorCompra" name="valorCompra">
                        </div>

                        <div class="col-lg-4 form-group">
                            <label for="valorCompra_p">Valor de Compra (<b class='simboloMoneda'></b>):</label>
                            <span class="required-asterisk">*</span>
                            <input type="number" class="form-control" id="valorCompra_p" name="valorCompra_p" required
                                step="0.01">
                        </div>

                        <div class="col-lg-4 form-group">
                            <label for="fechaAdquisicion">Fecha de Adquisición:</label>
                            <span class="required-asterisk">*</span>
                            <input type="date" class="form-control" id="fechaAdquisicion" name="fechaAdquisicion"
                                required onchange="obtenerTipoDeCambio()">
                        </div>
                        <div class="col-lg-4 form-group">
                            <label for="vidaUtil">Vida Útil (años):</label>
                            <span class="required-asterisk">*</span>
                            <input type="number" class="form-control" id="vidaUtil" name="vidaUtil" required>
                        </div>
                        <div class="col-lg-4 form-group">
                            <label for="tasaDepreciacion">Tasa de Depreciación (%):</label>
                            <span class="required-asterisk">*</span>
                            <input type="number" class="form-control" id="tasaDepreciacion" name="tasaDepreciacion"
                                required step="0.01">
                        </div>
                        <div class="col-lg-4 form-group">
                            <label for="metodoDepreciacion">Método de Depreciación:</label>
                            <span class="required-asterisk">*</span>
                            <select class="form-control" id="metodoDepreciacion" name="metodoDepreciacion">
                                <option value="Línea Recta">Línea Recta</option>
                                <option value="Reducción de Saldos">Reducción de Saldos</option>
                            </select>
                        </div>
                        <div class="col-lg-4 form-group">
                            <label for="valorResidual">Valor Residual (<b class='simboloMoneda'></b>):</label>
                            <span class="required-asterisk">*</span>
                            <input type="number" class="form-control" id="valorResidual" name="valorResidual" required
                                step="0.01" placeholder="Valor de a cuanto le pagarían si lo vende hoy">
                        </div>
                        <div class="col-lg-4 form-group">
                            <label for="estado">Estado:</label>
                            <span class="required-asterisk">*</span>
                            <select class="form-control" id="estado" name="estado">
                                <option value="Nuevo">Nuevo</option>
                                <option value="Usado">Usado</option>
                            </select>
                        </div>

                        <div class="col-lg-4 form-group">
                            <label for="usuario">Responsable de registro:</label>
                            <span class="required-asterisk">*</span>
                            <input type="text" class="form-control" id="usuario" name="usuario"
                                value='<?php echo $_SESSION["usuario"] . " " . $_SESSION["nombre"]; ?>' readonly
                                required>
                        </div>
                        <div class="col-lg-4 form-group">
                            <label for="proveedor">Proveedor:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="required-asterisk">*</span></span>
                                <?php $datos = ControladorActivosFijos::ctrMostrar('proveedores'); ?>
                                <select class="form-control select2" id="proveedor" name="proveedor"
                                    style="width: 100%;" required>
                                    <option value="">Seleccionar Proveedor</option>
                                    <?php
                                    foreach ($datos as $data) {
                                        echo '<option value="' . $data['proveedor_pk'] . '">' . $data['razon_social'] . '</option>';
                                    }
                                    ?>
                                </select>
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary" type="button" id="btn_proveedor">Crear nuevo
                                        proveedor</button>
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-4 form-group">
                            <label for="codigoInterno">Código Interno:</label>
                            <span class="required-asterisk">*</span>
                            <input type="text" class="form-control" id="codigoInterno" name="codigoInterno" readonly>
                        </div>
                        <div class="col-lg-4 form-group">
                            <label for="fechaInicioUso">Fecha de Inicio de Uso:</label>
                            <span class="required-asterisk">*</span>
                            <input type="date" class="form-control" id="fechaInicioUso" name="fechaInicioUso" required>
                        </div>

                        <div class="col-lg-4 form-group">
                            <label for="garantia_marca">Garantía marca (años):</label>
                            <input type="number" class="form-control" id="garantia_marca" name="garantia_marca">
                        </div>

                        <div class="col-lg-4 form-group">
                            <label for="garantia_proveedor">Garantía proveedor (años):</label>
                            <input type="number" class="form-control" id="garantia_proveedor" name="garantia_proveedor">
                        </div>

                        <div class="col-lg-4 form-group">
                            <label for="estadoOperativo">Estado Operativo:</label>
                            <span class="required-asterisk">*</span>
                            <select class="form-control" id="estadoOperativo" name="estadoOperativo">
                                <option value="Operativo">Operativo</option>
                                <option value="En reparación">En reparación</option>
                                <option value="Fuera de servicio">Fuera de servicio</option>
                            </select>
                        </div>
                        <div class="col-lg-4 form-group">
                            <label for="marca"> Marca</label>
                            <span class="required-asterisk">*</span>
                            <input type="text" class="form-control" id="marca" name="marca" required>
                        </div>

                        <div class="col-lg-4 form-group">
                            <label for="serie_motor"> Serie motor</label>
                            <input type="text" class="form-control" id="serie_motor" name="serie_motor">
                        </div>
                        <div class="col-lg-4 form-group">
                            <label for="chasis_serie"> Chasis serie</label>
                            <input type="text" class="form-control" id="chasis_serie" name="chasis_serie">
                        </div>
                        <div class="col-lg-4 form-group">
                            <label for="placa"> Placa</label>
                            <input type="text" class="form-control" id="placa" name="placa">
                        </div>

                        <div class="col-lg-4 form-group">
                            <label for="observaciones">Observaciones:</label>
                            <textarea class="form-control" id="observaciones" name="observaciones" rows="3"></textarea>
                        </div>
                        <div class="col-lg-4 form-group">
                            <label for="documentosPropiedad">Documentos de Propiedad:</label>
                            <input type="file" class="form-control-file" id="documentosPropiedad"
                                name="documentosPropiedad" accept=".pdf" multiple>
                        </div>
                        <div class="col-lg-4 form-group">
                            <label for="fotosActivo">Fotos del Activo Fijo:</label>
                            <input type="file" class="form-control-file" id="fotosActivo" name="fotosActivo" multiple>
                        </div>
                        <!-- Inputs para el registro de activos fijos aquí -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

                    <!-- <button type="button" class="btn btn-primary" onclick="guardarActivoFijo()">Guardar</button> -->
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                <?php

                $ControladorActivoFijo->ctrCrearActivosFijos($_POST);

                ?>
            </form>
        </div>
    </div>
</div>

<!-- MODAL EDITAR SOLICITUD -->

<div id="modalEditarSolicitud" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-wide">
        <!-- Modal content-->
        <div class="modal-content">
            <form id="formEditarActivoFijo" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Activo Fijo</h4>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <!-- Input para Descripcion -->
                        <div class="col-lg-4 form-group">
                            <label for="editarDescripcion">Descripción:</label>
                            <input type="hidden" id="idActivoFijoEditar" name="idActivoFijoEditar" value="valorDeseado">
                            <input type="text" class="form-control" id="editarDescripcion" name="editarDescripcion"
                                required>
                        </div>

                        <!-- Input para Categoria -->
                        <div class="col-lg-4 form-group">
                            <label for="editarCategoria">Categoría:</label>
                            <select class="form-control select2" id="editarCategoria" name="editarCategoria"
                                style="width: 100%;">
                                <option value="Terreno">Terreno</option>
                                <option value="Edificio">Edificio</option>
                                <option value="ConstruccionComplementaria">Construcción complementaria</option>
                                <option value="MejoraTerreno">Mejora en terreno</option>


                                <option value="MaquinariaPesada">Maquinaria pesada</option>
                                <option value="MaquinariaLigera">Maquinaria liviana</option>
                                <option value="EquipoOficina">Equipo de oficina</option>
                                <option value="EquipoTransporte">Equipo de transporte</option>
                                <option value="MobiliarioEnseres">Mobiliario y enseres</option>
                                <option value="EquipoTelecomunicaciones">Equipo de telecomunicaciones</option>
                                <option value="EquipoInformatico">Equipo informático</option>
                                <option value="Software">Software</option>


                                <option value="VehiculoAutomotor">Vehículo automotor</option>
                                <option value="VehiculoNoAutomotor">Vehículo no automotor</option>

                                <option value="Motocicleta">Motocicleta</option>
                                <option value="Aeronave">Aeronave</option>
                                <option value="Embarcacion">Embarcación</option>


                                <option value="Patente">Patente</option>
                                <option value="Marca">Marca</option>
                                <option value="DerechoAutor">Derecho de autor</option>
                                <option value="Concesion">Concesión</option>
                                <option value="FondoComercio">Fondo de comercio</option>
                                <option value="Goodwill">Goodwill</option>


                                <option value="MuebleEnseres">Muebles y enseres</option>
                                <option value="EquipoLaboratorio">Equipo de laboratorio</option>
                                <option value="ObraArte">Obra de arte</option>
                                <option value="Joya">Joya</option>
                                <option value="MetalPrecioso">Metal precioso</option>
                                <option value="Animal">Animal</option>
                                <!-- Más categorías -->
                            </select>
                        </div>

                        <!-- Input para Ubicacion -->
                        <div class="col-lg-4 form-group">
                            <label for="editarUbicacion">Ubicación:</label>
                            <input type="text" class="form-control" id="editarUbicacion" name="editarUbicacion"
                                placeholder="Ubicancion a la pertenece el activo fijo" required>
                        </div>
                        <div class="col-lg-4 form-group">
                            <label for="editarTipoMoneda">Tipo de Moneda:</label>
                            <select id="editarTipoMoneda" class="form-control" name="editartTipo_moneda"
                                onchange="cambiarMonedaActualizarTipoCambio(this.value, this.id)">
                                <option value="PEN">Soles</option>
                                <option value="USD">Dólares</option>
                            </select>
                        </div>
                        <!-- Input para Valor de compra -->
                        <div class="col-lg-4 form-group">
                            <label for="editarValorCompra">Valor de Cambio (<b class='simboloMoneda'></b>):</label>
                            <input type="text" class="form-control" id="editarValorCompra" name="editarValorCompra">
                        </div>
                        <div class="col-lg-4 form-group">
                            <label for="up_valorCompra_p">Valor de Compra (<b class='simboloMoneda'></b>):</label>
                            <input type="number" class="form-control" id="up_valorCompra_p" name="up_valorCompra_p"
                                required step="0.01">
                        </div>
                        <!-- Input para Fecha de Adquisición -->
                        <div class="col-lg-4 form-group">
                            <label for="editarFechaAdquisicion">Fecha de Adquisición:</label>
                            <input type="date" class="form-control" id="editarFechaAdquisicion"
                                name="editarFechaAdquisicion" required onchange="obtenerTipoDeCambioUpdate()">
                        </div>

                        <!-- Input para Vida Util  -->
                        <div class="col-lg-4 form-group">
                            <label for="editarVidaUtil">Vida Útil (años):</label>
                            <input type="number" class="form-control" id="editarVidaUtil" name="editarVidaUtil"
                                required>
                        </div>

                        <!-- Input para Tasa de Descripcion -->
                        <div class="col-lg-4 form-group">
                            <label for="editarTasaDepreciacion">Tasa de Depreciación (%):</label>
                            <input type="number" class="form-control" id="editarTasaDepreciacion"
                                name="editarTasaDepreciacion" required step="0.01">
                        </div>

                        <!-- Input para Valor Residual -->
                        <div class="col-lg-4 form-group">
                            <label for="editarValorResidual">Valor Residual (<b class='simboloMoneda'></b>):</label>
                            <input type="number" class="form-control" id="editarValorResidual"
                                name="editarValorResidual" required step="0.01">
                        </div>

                        <!-- Input para Estado -->
                        <div class="col-lg-4 form-group">
                            <label for="editarEstado">Estado:</label>
                            <select class="form-control" id="editarEstado" name="editarEstado">
                                <option value="Nuevo">Nuevo</option>
                                <option value="Usado">Usado</option>
                            </select>
                        </div>

                        <!-- Input para Usuario -->
                        <div class="col-lg-4 form-group">
                            <label for="editarUsuario">Usuario:</label>
                            <input type="text" class="form-control" id="editarUsuario" name="editarUsuario" required>
                        </div>

                        <!-- Input para Proveedor -->
                        <div class="col-lg-4 form-group">
                            <label for="editarProveedor">Proveedor:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="required-asterisk">*</span></span>
                                <?php $datos = ControladorActivosFijos::ctrMostrar('proveedores'); ?>
                                <select class="form-control select2" id="editarProveedor" name="editarProveedor"
                                    style="width: 100%;" required>
                                    <option value="">Seleccionar Proveedor</option>
                                    <?php
                                    foreach ($datos as $data) {
                                        echo '<option value="' . $data['proveedor_pk'] . '">' . $data['razon_social'] . '</option>';
                                    }
                                    ?>
                                </select>
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary" type="button" id="btn_proveedor">Crear nuevo
                                        proveedor</button>
                                </span>
                            </div>
                        </div>

                        <!-- Input para Código Interno -->
                        <div class="col-lg-4 form-group">
                            <label for="EditarcodigoInterno">Código Interno:</label>
                            <input type="text" class="form-control" id="EditarcodigoInterno" name="EditarcodigoInterno"
                                required readonly>
                        </div>

                        <!-- Input para Fecha de Inicio de Uso -->
                        <div class="col-lg-4 form-group">
                            <label for="editarFechaInicioUso">Fecha de Inicio de Uso:</label>
                            <input type="date" class="form-control" id="editarFechaInicioUso"
                                name="editarFechaInicioUso" required>
                        </div>

                        <!-- Input para Método de Depreciación -->
                        <div class="col-lg-4 form-group">
                            <label for="meditarMetodoDepreciacion">Método de Depreciación:</label>
                            <select class="form-control" id="meditarMetodoDepreciacion"
                                name="meditarMetodoDepreciacion">
                                <option value="Línea Recta">Línea Recta</option>
                                <option value="Reducción de Saldos">Reducción de Saldos</option>
                            </select>
                        </div>

                        <!-- Input para Garantía -->
                        <div class="col-lg-4 form-group">
                            <label for="editarGarantia_marca">Garantía marca (años):</label>
                            <input type="number" class="form-control" id="editarGarantia_marca"
                                name="editarGarantia_marca">
                        </div>

                        <div class="col-lg-4 form-group">
                            <label for="editarGarantia_proveedor">Garantía proveedor (años):</label>
                            <input type="number" class="form-control" id="editarGarantia_proveedor"
                                name="editarGarantia_proveedor">
                        </div>

                        <!-- Input para Estado Operativo -->
                        <div class="col-lg-4 form-group">
                            <label for="editarEstadoOperativo">Estado Operativo:</label>
                            <select class="form-control" id="editarEstadoOperativo" name="editarEstadoOperativo">
                                <option value="Operativo">Operativo</option>
                                <option value="En reparación">En reparación</option>
                                <option value="Fuera de servicio">Fuera de servicio</option>
                            </select>
                        </div>
                        <div class="col-lg-4 form-group">
                            <label for="editarMarca"> Marca</label>
                            <input type="text" class="form-control" id="editarMarca" name="editarMarca" required>
                        </div>

                        <div class="col-lg-4 form-group">
                            <label for="serie_motorUp"> Serie motor</label>
                            <input type="text" class="form-control" id="serie_motorUp" name="serie_motorUp">
                        </div>
                        <div class="col-lg-4 form-group">
                            <label for="chasis_serieUp"> Chasis serie</label>
                            <input type="text" class="form-control" id="chasis_serieUp" name="chasis_serieUp">
                        </div>
                        <div class="col-lg-4 form-group">
                            <label for="placaUp"> Placa</label>
                            <input type="text" class="form-control" id="placaUp" name="placaUp">
                        </div>

                        <!-- Input para Observaciones -->
                        <div class="col-lg-4 form-group">
                            <label for="Editarobservaciones">Observaciones:</label>
                            <textarea class="form-control" id="Editarobservaciones" name="Editarobservaciones"
                                rows="3"></textarea>
                        </div>

                        <!-- Input para Documentos de Propiedad -->
                        <div class="col-lg-4 form-group">
                            <label for="editarDocumentosPropiedad">Documentos de Propiedad:</label>

                            <input type="hidden" id="editarDocumentosPropiedadDb" name="editarDocumentosPropiedadDb">
                            <input type="file" class="form-control-file" id="editarDocumentosPropiedad"
                                name="editarDocumentosPropiedad" accept=".pdf" multiple>
                        </div>

                        <!-- Input para Fotos del Activo Fijo -->
                        <div class="col-lg-4 form-group">
                            <label for="editarFotosActivo">Fotos del Activo Fijo:</label>

                            <input type="hidden" id="editarFotosActivoDb" name="editarFotosActivoDb">
                            <input type="file" class="form-control-file" id="editarFotosActivo" name="editarFotosActivo"
                                multiple>
                            <!-- <img id="previsualizarImagen" src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px"> -->
                            <img id="previsualizarImagen" class="img-thumbnail previsualizar" width="100px">
                        </div>
                        <!-- Inputs para el registro de activos fijos aquí -->

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" id="btnCerrar"
                            data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                    <?php
                    if (isset($_POST['idActivoFijoEditar']) && !empty($_POST['idActivoFijoEditar'])) {

                        $ControladorActivoFijo->ctrEditarActivosFijos($_POST);
                    }
                    ?>
            </form>
            <div style='padding: 10px 0px'>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-link active" role="presentation">
                        <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home"
                            type="button" role="tab" aria-controls="home" aria-selected="true">Log de
                            eventualidades</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button"
                            role="tab" aria-controls="profile" aria-selected="false">Registrar eventualidad</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active in" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <table class="table table-bordered" id="tableRegistro">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Eventualidad</th>
                                    <th scope="col">Fecha de eventualidad</th>
                                    <th scope="col">Monto gasto</th>
                                    <th scope="col">Monto reevaluado de VALOR RESIDUAL</th>
                                    <th scope="col">USARIO</th>
                                    <th scope="col">Noneda</th>
                                    <th scope="col">Tipo de Cambio</th>
                                    <th scope="col">Evidencia</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h2>Formulario de Registro</h2>
                        <form id="formRegistro" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <!-- <div class="form-group col-md-4 col-12"> -->
                                <!-- <label for="idActivoFijo">ID del Activo Fijo</label> -->
                                <input type="hidden" class="form-control" id="idActivoFijo" name="idActivoFijo" required
                                    readonly> <!-- ESTO OCULTO LO MANDAS -->
                                <!-- </div> -->
                                <div class="form-group col-md-4 col-12">
                                    <label for="eventualidad">Eventualidad</label>
                                    <input type="text" class="form-control" id="eventualidad" name="eventualidad"
                                        required>
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label for="fechaEventualidad">Fecha de Eventualidad</label>
                                    <input type="date" class="form-control" id="fechaEventualidad"
                                        name="fechaEventualidad" required onchange="obtenerTipoDeCambioReguistro()">
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label for="montoGasto">Monto Gasto</label>
                                    <input type="number" class="form-control" id="montoGasto" name="montoGasto" required
                                        step="0.01">
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label for="montoReevaluado">Monto Reevaluado de Valor Residual</label>
                                    <input type="number" class="form-control" id="montoReevaluado"
                                        name="montoReevaluado" required step="0.01">
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label for="evidencia">Evidencia ACA QUE SEA PA CARGAR ARCHIVO</label>
                                    <!-- <input type="url" class="form-control" id="evidencia" name="evidencia" placeholder="Link de PDF o Foto" required> -->
                                    <input type="file" class="form-control-file" id="evidencia" name="evidencia"
                                        accept=".pdf" multiple required>
                                </div>

                                <div class="form-group col-md-4 col-12">
                                    <label for="userRegistraeventualidad">Usuario que registra</label>
                                    <input readonly type="text" class="form-control" id="userRegistraeventualidad"
                                        name="userRegistraeventualidad"
                                        value="<?php echo $_SESSION["nombre"] . ' (' . $_SESSION["usuario"] . ')'; ?>"
                                        required>
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label for="moneda">Tipo de Moneda</label>
                                    <select id="moneda" class="form-control" name="moneda"
                                        onchange="cambiarMonedaActualizarTipoCambio(this.value, this.id)">
                                        <option value="PEN">Soles</option>
                                        <option value="USD">Dólares</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label for="tipoCambio">Tipo de Cambio</label>
                                    <input type="text" class="form-control" id="tipoCambio" name="tipoCambio" value="0"
                                        required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Registrar</button>
                            <?php
                            $ControladorActivoFijo->ctrCrearRegistro($_POST);
                            ?>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>

    function actualizarProveedores() {
        $.ajax({
            url: 'controladores/activos-fijos.controlador.php',
            method: 'POST',

            data: {
                accion: 'getProveedores' // Define una acción para identificar la petición en el controlador
            },

            dataType: "json",
            success: function (response) {
                // Obtener ambos selects
                var selectProveedor = $('#proveedor');
                var selectEditarProveedor = $('#editarProveedor');

                // Vaciar ambos selects antes de añadir nuevos proveedores
                selectProveedor.empty();
                selectEditarProveedor.empty();

                // Añadir la opción por defecto a ambos selects
                selectProveedor.append('<option value="">Seleccionar Proveedor</option>');
                selectEditarProveedor.append('<option value="">Seleccionar Proveedor</option>');

                // Añadir los proveedores actualizados del servidor a ambos selects
                $.each(response, function (index, proveedor) {
                    selectProveedor.append('<option value="' + proveedor.proveedor_pk + '">' + proveedor.razon_social + '</option>');
                    selectEditarProveedor.append('<option value="' + proveedor.proveedor_pk + '">' + proveedor.razon_social + '</option>');
                });

                // Si estás usando Select2, reinicialízalo para que tome los nuevos datos
                selectProveedor.trigger('change');
                selectEditarProveedor.trigger('change');
            },
            error: function (xhr, status, error) {
                console.log('Error al actualizar proveedores: ' + error);
            }
        });
    }



    $(document).on('click', '#proveedor, #editarProveedor', function (e) {
        e.preventDefault();
        var selectedValue = $(this).val();
        if (selectedValue === "") {
            actualizarProveedores();
        }
    });

    $(document).on('click', '#profile-tab', function () {
        $('#tableRegistro').hide();
    });
    $(document).on('click', '#home-tab', function () {
        $('#tableRegistro').show();
    });
    $(document).ready(function () {

        var ahora = new Date();

        var año = ahora.getFullYear().toString().slice(-2);
        var mes = ("0" + (ahora.getMonth() + 1)).slice(-2);
        var día = ("0" + ahora.getDate()).slice(-2);
        var hora = ("0" + ahora.getHours()).slice(-2);
        var minuto = ("0" + ahora.getMinutes()).slice(-2);
        var segundo = ("0" + ahora.getSeconds()).slice(-2);
        var fechaYHoraFormateada = año + mes + día + hora + minuto + segundo;

        $("#codigoInterno").val(fechaYHoraFormateada);
    });
    $(document).on('click', '.btnEditarActivoFijo', function () {
        var idA = $(this).data('id');
        var datos = new FormData();
        datos.append("idaa", idA);
        datos.append("ajaxservice", 'loadEdit');
        $("#idActivoFijoEditar,#idActivoFijo").val($(this).data('id'));
        $.ajax({
            url: "modelos/activos-fijos.modelo.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",

            success: function (item) {

                $("#idActivoFijoEditar").val(item.id);
                $("#editarDescripcion").val(item.descripcion);
                $("#editarCategoria").val(item.categoria);
                $("#editarUbicacion").val(item.ubicacion);
                $("#editarTipoMoneda").val(item.tipo_moneda).change();
                $("#editarValorCompra").val(item.valor_compra);
                $("#editarFechaAdquisicion").val(item.fecha_adquisicion);
                $("#editarVidaUtil").val(item.vida_util);
                $("#editarTasaDepreciacion").val(item.tasa_depreciacion);
                $("#editarValorResidual").val(item.valor_residual);
                $("#editarEstado").val(item.estado);
                $("#editarUsuario").val(item.usuario);
                $("#editarProveedor").val(item.proveedor);
                $("#EditarcodigoInterno").val(item.codigo_interno);
                $("#editarFechaInicioUso").val(item.fecha_inicio_uso);
                $("#meditarMetodoDepreciacion").val(item.metodo_depreciacion);
                $("#editarGarantia_marca").val(item.garantia_marca);
                $("#editarGarantia_proveedor").val(item.garantia_proveedor);
                $("#editarEstadoOperativo").val(item.estado_operativo);
                $("#editarMarca").val(item.marca);
                $("#Editarobservaciones").val(item.observaciones);
                $("#up_valorCompra_p").val(item.valor_compra_p);
                $("#serie_motorUp").val(item.serie_motor);
                $("#chasis_serieUp").val(item.chasis_serie);
                $("#placaUp").val(item.placa);


                $("#editarDocumentosPropiedadDb").val(item.documentos_propiedad);

                var img = item.foto_activo;
                $("#editarFotosActivoDb").val(img);

                if (img && img.trim() !== "") {
                    $('#previsualizarImagen').attr('src', img);

                } else {
                    $('#previsualizarImagen').attr('src', 'vistas/img/productos/default/anonymous.png');
                }
                cargarRegistro(idA);

            }
        });

    });
    $(document).on('click', '#btn_proveedor', function () {
        // window.location = "proveedores";
        window.open('proveedores', '_blank');
    });

    $(document).on('click', '.btnEliminarActivoFijo', function () {

        var idA = $(this).data('id');
        var confirmar = confirm("¿Estás seguro de que quieres eliminar este activo fijo?");
        if (confirmar) {
            var datos = new FormData();
            datos.append("idEliminar", idA);
            datos.append("ajaxservice", 'eliminarActivoFijo');
            $("#idActivoFijoEditar").val($(this).data('id'));

            $.ajax({
                url: "modelos/activos-fijos.modelo.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {
                    if (respuesta === "ok") {
                        alert("Activo fijo eliminado correctamente.");
                        window.location = "activos-fijos";
                    } else {
                        alert("Error al eliminar el activo fijo. Por favor, inténtalo de nuevo.");
                    }
                }
            });
        }
    });
    // $(document).on('click','.btnCerrar', function(){

    // });
    document.addEventListener('DOMContentLoaded', function () {
        var btnCerrar = document.getElementById('btnCerrar');
        var formRegistro = document.getElementById('formRegistro');

        btnCerrar.addEventListener('click', function () {
            // Limpia todo el formulario
            formRegistro.reset();

            // Si necesitas resetear manualmente los selects o hacer algo más después de resetear
            document.getElementById('moneda').value = 'PEN'; // Asumiendo que 'PEN' es el valor por defecto
            document.getElementById('moneda').disabled = true;
            $('#tableRegistro tbody').empty();

            // Si necesitas reiniciar algún otro elemento o realizar alguna otra acción, aquí puedes añadir más código.
        });
    });

    function cambiarMonedaActualizarTipoCambio(moneda, id) {
        const simbolo = moneda === 'USD' ? '$' : 'S/';
        document.querySelectorAll(".simboloMoneda").forEach(el => el.textContent = simbolo);

        if (id === 'editarTipoMoneda') {
            if (moneda === 'USD') {
                obtenerTipoDeCambioUpdate();
            } else {
                document.getElementById('editarValorCompra').value = ''; // Limpiar el input si no es USD
            }
        } else if (id === 'tipoMoneda') {
            if (moneda === 'USD') {
                obtenerTipoDeCambio();

            } else {
                document.getElementById('valorCompra').value = ''; // Limpiar el input si no es USD
            }
        } else if (id === 'moneda') {
            if (moneda === 'USD') {
                obtenerTipoDeCambioReguistro();

            } else {
                document.getElementById('tipoCambio').value = ''; // Limpiar el input si no es USD
            }
        }
    }

    function obtenerTipoDeCambio() {

        var tipomona = $("#tipoMoneda").val();
        if (tipomona === 'PEN') {
            return false;
        }
        var fecha_contabilizacion_compra = $("#fechaAdquisicion").val();
        var accion = "tipo_de_cambio_dolares";

        var dataen = 'fecha_contabilizacion_compra=' + fecha_contabilizacion_compra +
            '&accion=' + accion;
        $.ajax({
            type: 'post',
            url: 'controladores/activos-fijos.controlador.php',
            data: dataen,

            success: function (resp) {
                $("#valorCompra").val(resp);
            }
        });
    }

    function obtenerTipoDeCambioUpdate() {

        var tipomona = $("#editarTipoMoneda").val();
        if (tipomona === 'PEN') {
            return false;
        }
        var fecha_contabilizacion_compra = $("#editarFechaAdquisicion").val();
        var accion = "tipo_de_cambio_dolares";

        var dataen = 'fecha_contabilizacion_compra=' + fecha_contabilizacion_compra +
            '&accion=' + accion;
        $.ajax({
            type: 'post',
            url: 'controladores/activos-fijos.controlador.php',
            data: dataen,

            success: function (resp) {
                $("#editarValorCompra").val(resp);
            }
        });
    }

    function obtenerTipoDeCambioReguistro() {

        var tipomona = $("#moneda").val();
        if (tipomona === 'PEN') {
            return false;
        }
        var fecha_contabilizacion_compra = $("#fechaEventualidad").val();
        var accion = "tipo_de_cambio_dolares";

        var dataen = 'fecha_contabilizacion_compra=' + fecha_contabilizacion_compra +
            '&accion=' + accion;
        $.ajax({
            type: 'post',
            url: 'controladores/activos-fijos.controlador.php',
            data: dataen,

            success: function (resp) {
                $("#tipoCambio").val(resp);
            }
        });
    }

    $("#searchInput").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#tablaActivosFijos tbody tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        cambiarMonedaActualizarTipoCambio(document.getElementById('tipoMoneda').value);
        cambiarMonedaActualizarTipoCambio(document.getElementById('editarTipoMoneda').value);
    });

    // Deshabilita el select "tipoMoneda" inicialmente
    document.getElementById('tipoMoneda').disabled = true;

    document.getElementById('fechaAdquisicion').addEventListener('change', function () {
        if (this.value) {
            document.getElementById('tipoMoneda').disabled = false;
        } else {
            document.getElementById('tipoMoneda').disabled = true;
        }
    });
    //############################################################################
    document.getElementById('moneda').disabled = true;

    document.getElementById('fechaEventualidad').addEventListener('change', function () {
        if (this.value) {
            document.getElementById('moneda').disabled = false;
        } else {
            document.getElementById('moneda').disabled = true;
        }
    });

    function cargarRegistro(idA) {
        var datos = new FormData();
        datos.append("idaa", idA);
        datos.append("ajaxservice", 'loadData');

        $.ajax({
            url: "modelos/activos-fijos.modelo.php",
            method: "POST",
            data: datos,
            processData: false, // Asegura que los datos enviados no sean procesados o transformados en una query string
            contentType: false, // Asegura que jQuery no establezca un contentType por defecto
            dataType: "json",
            success: function (respuesta) {
                $('#tableRegistro tbody').empty();
                if (respuesta && respuesta.length > 0) {
                    $.each(respuesta, function (index, registro) {
                        var fila = '<tr>' +
                            '<td>' + registro.id + '</td>' +
                            '<td>' + registro.eventualidad + '</td>' +
                            '<td>' + registro.fecha_eventualidad + '</td>' +
                            '<td>' + registro.monto_gasto + '</td>' +
                            '<td>' + registro.monto_reevaluado + '</td>' +
                            '<td>' + registro.userRegistraeventualidad + '</td>' +
                            '<td>' + registro.moneda + '</td>' +
                            '<td>' + registro.tipoCambio + '</td>' +
                            '<td>';
                        var doc = registro.evidencia;
                        if (doc) {
                            fila += '<a href="' + doc + '" target="_blank"><img src="vistas/img/plantilla/pdf.png" class="img-thumbnail-custom-2" onerror="this.onerror=null;this.src=\'vistas/img/plantilla/pdf.png\';"></a>';
                        } else {
                            fila += '<img src="vistas/img/plantilla/pdf-bn.png" onerror="this.onerror=null;this.src=\'vistas/img/plantilla/pdf.png\';">';
                        }
                        fila += '</td></tr>';
                        $('#tableRegistro tbody').append(fila);
                    });
                }
            },
            error: function () {
                alert("Error al cargar los datos del registro.");
            }
        });
    }
</script>