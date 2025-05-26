<style>
    .text_area_in {
        width: 100%;
        height: 30px;
        margin-top: 10px;
    }

    .cmnperfl {
        height: 200px !important;
        opacity: 0.2;
    }

    .form-group {
        margin-bottom: 10px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    #contenedorTabla {
        max-height: auto;
        overflow-y: auto;
    }

    .radio-button {
        font-size: 13px;
        /* Ajusta el tamaño del texto */
        padding: 10px 20px;
        /* Espacio alrededor del texto */
        padding-bottom: 5px !important;
        border: 2px solid #ddd;
        /* Borde del botón */
        border-radius: 4px;
        /* Bordes redondeados */
        background-color: #f8f8f8;
        /* Color de fondo */
        display: inline-block;
        margin-right: 10px;
        /* Espacio entre botones */
        cursor: pointer;
        /* Cursor tipo pointer */
    }

    .radio-button input[type="radio"] {
        display: none;
        /* Ocultar el radio button original */
    }

    /* Estilo para el radio seleccionado */
    .radio-button input[type="radio"]:checked+label {
        background-color: #008ea8;
        /* Cambio de color cuando está seleccionado */
        color: white;
        /* Texto en blanco cuando está seleccionado */
        border-color: transparent;
        /* Borde más oscuro cuando está seleccionado */
    }

    .border {
        border: 1px solid #f8f8f8;
        padding: 10px 20px;
    }

    .radio-button {
        font-size: 13px;
        /* Ajusta el tamaño del texto */
        padding: 10px 20px;
        /* Espacio alrededor del texto */
        padding-bottom: 5px !important;
        border: 2px solid #ddd;
        /* Borde del botón */
        border-radius: 4px;
        /* Bordes redondeados */
        background-color: #f8f8f8;
        /* Color de fondo */
        display: inline-block;
        margin-right: 10px;
        /* Espacio entre botones */
        cursor: pointer;
        /* Cursor tipo pointer */
    }

    .radio-button input[type="radio"] {
        display: none;
        /* Ocultar el radio button original */
    }

    .radio-button.checked {
        background-color: #008ea8;
        /* Cambio de color cuando está seleccionado */
        color: white;
        /* Texto en blanco cuando está seleccionado */
        border-color: transparent;
        /* Borde más oscuro cuando está seleccionado */
    }

    .border {
        border: 1px solid #f8f8f8;
        padding: 10px 20px;
    }

    .image-upload>input {
        display: none;
    }

    .image-upload img {
        width: 99%;
        height: auto;
        margin-bottom: 10px;
        cursor: pointer;
        border: 1px solid #ccc;
        padding: 5px;
    }

    .modal-dialog {
        width: 99%;
        margin: auto;
    }

    thead,
    tr,
    th {
        border: 1px solid white !important;
    }


    .table-container {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
        width: 100%;
        max-width: 100%;
    }

    table {
        border-collapse: collapse;
        width: auto;
        min-width: 100%;
    }

    th,
    td {
        padding: 8px;
        border: 1px solid #ddd;
        text-align: left;
        white-space: nowrap;
    }

    th {
        background-color: #f2f2f2;
    }

    .fixed-column {
        position: sticky;
        left: 0;
        background-color: #f2f2f2;
        z-index: 1;
    }
</style>

<!-- Contenido principal -->
<div class="content-wrapper">

    <!-- Encabezado de la sección -->
    <!-- Cuerpo principal -->
    <?php
    require_once "controladores/check-list-conductor.controlador.php";
    require_once "modelos/check-list-conductor.modelo.php";
    $ControladorCheckListConductor = new ControladorCheckListConductor();
    ?>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- Cuerpo de la caja -->
                    <div class="box-body">
                        <h2>Registro de Inspecciones</h2>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Agregar Registro</button>

                        <button class="btn btn-danger pdf-button" onclick="window.open('vistas/img/FORMATO-CHECK-LIST.pdf', '_blank');">
                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF - CHECK LIST
                        </button>


                        <!-- Modal para agregar registros -->
                        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="addModalLabel">CHECK LIST DE CAMIÓN</h4>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Aquí podrías colocar el formulario, lo simplifico para el ejemplo -->
                                        <form id="formCheckListConductor" method="post" enctype="multipart/form-data">
                                            <center>
                                                <label>Vigencias de:</label>&nbsp;&nbsp;
                                                <div class="radio-button">
                                                    <label>
                                                        <input type="radio" name="options" value="licencia" required>
                                                        Licencia
                                                    </label>
                                                </div>
                                                <div class="radio-button">
                                                    <label>
                                                        <input type="radio" name="options" value="p_ingreso">
                                                        P. Ingreso
                                                    </label>
                                                </div>
                                                <div class="radio-button">
                                                    <label>
                                                        <input type="radio" name="options" value="pol_ingreso">
                                                        Pol. Seguro
                                                    </label>
                                                </div>
                                                <br><br>
                                                <label>Día: </label>&nbsp;&nbsp;
                                                <select name="day" required>
                                                    <option value="Domingo">Domingo</option>
                                                    <option value="Lunes">Lunes</option>
                                                    <option value="Martes">Martes</option>
                                                    <option value="Miércoles">Miércoles</option>
                                                    <option value="Jueves">Jueves</option>
                                                    <option value="Viernes">Viernes</option>
                                                    <option value="Sábado">Sábado</option>
                                                </select>

                                                <br>
                                                <label>PLACA:</label>
                                                <textarea name="placadb" id="placadb" style="width: 150px; margin-top: 10px !important; height: 30px;" required></textarea>

                                                <hr>
                                            </center>

                                            <div class="container-fluid">
                                                <div class="row text-center">
                                                    <!-- Input para cargar imagen - Vista Frontal -->
                                                    <div class="form-group col-xs-6 col-md-3">
                                                        <label>Vista Frontal:</label>
                                                        <div class="image-upload">
                                                            <label for="frontalImage">
                                                                <img class='cmnperfl' src="vistas/img/vf.PNG" id="frontalPreview" />
                                                            </label>
                                                            <input type="file" id="frontalImage" name="frontalImage" accept="image/*" onchange="previewImage(this, 'frontalPreview');" required />
                                                        </div>
                                                    </div>

                                                    <!-- Input para cargar imagen - Vista Trasera -->
                                                    <div class="form-group col-xs-6 col-md-3">
                                                        <label>Vista Trasera:</label>
                                                        <div class="image-upload">
                                                            <label for="rearImage">
                                                                <img class='cmnperfl' src="vistas/img/vt.PNG" id="rearPreview" />
                                                            </label>
                                                            <input type="file" id="rearImage" name="rearImage" accept="image/*" onchange="previewImage(this, 'rearPreview');" required />
                                                        </div>
                                                    </div>

                                                    <!-- Input para cargar imagen - Vista Izquierda -->
                                                    <div class="form-group col-xs-6 col-md-3">
                                                        <label>Vista Izquierda:</label>
                                                        <div class="image-upload">
                                                            <label for="leftImage">
                                                                <img class='cmnperfl' src="vistas/img/vi.PNG" id="leftPreview" />
                                                            </label>
                                                            <input type="file" id="leftImage" name="leftImage" accept="image/*" onchange="previewImage(this, 'leftPreview');" required />
                                                        </div>
                                                    </div>

                                                    <!-- Input para cargar imagen - Vista Derecha -->
                                                    <div class="form-group col-xs-6 col-md-3">
                                                        <label>Vista Derecha:</label>
                                                        <div class="image-upload">
                                                            <label for="rightImage">
                                                                <img class='cmnperfl' src="vistas/img/vd.PNG" id="rightPreview" />
                                                            </label>
                                                            <input type="file" id="rightImage" name="rightImage" accept="image/*" onchange="previewImage(this, 'rightPreview');" required />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <fieldset class="open">
                                                <legend><b>Cuerpo (Elementos del vehículo)</b></legend>

                                                <!-- Llave de contacto -->
                                                <div class="form-group col-md-2 border">
                                                    <label>Llave de contacto:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_1" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_1" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_1" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Chapa de puertas:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_2" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_2" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_2" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Plumillas:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_3" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_3" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_3" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Parabrisas:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_4" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_4" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_4" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Llanta de repuesto:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_5" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_5" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_5" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Espejos retrovisores:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_6" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_6" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_6" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Espejos de cabina:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_7" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_7" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_7" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Panel de control:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_8" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_8" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_8" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Indicadores del tablero:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_9" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_9" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_9" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Aire acondicionado:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_10" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_10" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_10" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Radio:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_11" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_11" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_11" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Mascarilla:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_12" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_12" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_12" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Parlantes:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_13" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_13" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_13" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Antena de radio:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_14" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_14" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_14" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Claxon:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_15" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_15" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_15" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Luz interior:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_16" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_16" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_16" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Alarma de retroceso:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_17" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_17" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_17" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Faros delanteros y posteriores:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_18" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_18" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_18" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Volante:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_19" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_19" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_19" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Palanca de cambios:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_20" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_20" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_20" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Asientos:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_21" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_21" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_21" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Cinturón de seguridad:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_22" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_22" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_22" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>estribos derecho e izquierdo:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_23" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_23" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_23" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Neumáticos delanteros y posteriores:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_24" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_24" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_24" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Tapa de combustible:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_25" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_25" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_25" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Varilla de medir aceite:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_26" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_26" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_26" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Batería:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_27" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_27" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_27" class="text_area_in"></textarea>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <!-- -------------------------------------------------------------------------- -->
                                            <fieldset class="closed">

                                                <legend><b>HERRAMIENTAS</b></legend>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Conos:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_28" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_28" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_28" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Cadenas:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_29" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_29" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_29" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Fajas:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_30" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_30" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_30" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Señoritas:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_31" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_31" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_31" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Llave de ruedas:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_32" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_32" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_32" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Banderines:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_33" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_33" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_33" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Letreros (ancha/larga):</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_34" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_34" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_34" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Guantes:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_35" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_35" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_35" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Cascos:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_36" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_36" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_36" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Mameluco:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_37" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_37" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_37" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Chaleco:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_38" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_38" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_38" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Zapatos de seguridad:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_39" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_39" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_39" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Llaves de tanque de combustible:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_40" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_40" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_40" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Llave del porta herramientas:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_41" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_41" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_41" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Tacos de seguridad:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_42" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_42" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_42" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Porta tacos:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_43" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_43" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_43" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Radios de comunicación / handis:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_44" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_44" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_44" class="text_area_in"></textarea>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <!-- -------------------------------------------------------------------------- -->
                                            <fieldset class="closed">

                                                <legend><b>FLUIDOS</b></legend>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Agua para plumillas:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_45" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_45" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_45" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Refrigerante:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_46" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_46" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_46" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Aceite:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_47" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_47" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_47" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Nivel de combustible:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_48" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_48" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_48" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Hidrolina:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_49" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_49" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_49" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Combustible:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_50" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_50" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_50" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Frenos:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_51" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_51" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_51" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Grasa:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_52" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_52" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_52" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                            </fieldset>
                                            <!-- -------------------------------------------------------------------------- -->
                                            <fieldset class="closed">

                                                <legend><b>DOCUMENTOS</b></legend>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Tarjeta de propiedad:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_53" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_53" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_53" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Tarjeta de habilitación:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_54" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_54" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_54" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>SOAT:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_55" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_55" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_55" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Revisión técnica:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_56" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_56" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_56" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Permisos SMTC:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_57" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_57" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_57" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>SCTR:</label>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_58" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div class="radio-button">
                                                        <label>
                                                            <input type="radio" name="input_58" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="com_input_58" class="text_area_in"></textarea>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <!-- Botón de envío -->
                                            <div class="form-group col-xs-12">
                                                <button type="submit" class="btn btn-primary ">Registrar Inspección</button>
                                            </div>
                                            <?php
                                            $ControladorCheckListConductor->ctrCrearCheckListConductor($_POST);
                                            ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal para agregar registros -->
                        <div id="modalEditarCheckListConductor" class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="addModalLabel">ACTUALIZAR CHECK LIST DE CAMIÓN</h4>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Aquí podrías colocar el formulario, lo simplifico para el ejemplo -->
                                        <form id="EditformCheckListConductor" method="post" enctype="multipart/form-data">
                                            <center>
                                                <label>Vigencias de:</label>&nbsp;&nbsp;
                                                <input type="hidden" id="idCheckListConductor" name="idCheckListConductor" value="valorDeseado">
                                                <div class="radio-button">
                                                    <input type="radio" id="editaroptions_licencia" name="editaroptions" value="licencia">
                                                    <label for="editaroptions_licencia">Licencia</label>
                                                </div>
                                                <div class="radio-button">
                                                    <input type="radio" id="editaroptions_p_ingreso" name="editaroptions" value="p_ingreso">
                                                    <label for="editaroptions_p_ingreso">P. Ingreso</label>
                                                </div>
                                                <div class="radio-button">
                                                    <input type="radio" id="editaroptions_pol_ingreso" name="editaroptions" value="pol_ingreso">
                                                    <label for="editaroptions_pol_ingreso">Pol. Seguro</label>
                                                </div>
                                                <br><br>
                                                <label>Día: </label>&nbsp;&nbsp;
                                                <select name="editarday" id="editarday">
                                                    <option value="Domingo">Domingo</option>
                                                    <option value="Lunes">Lunes</option>
                                                    <option value="Martes">Martes</option>
                                                    <option value="Miércoles">Miércoles</option>
                                                    <option value="Jueves">Jueves</option>
                                                    <option value="Viernes">Viernes</option>
                                                    <option value="Sábado">Sábado</option>
                                                </select>

                                                <br>
                                                <label>PLACA:</label>
                                                <textarea name="editarplacadb" id="editarplacadb" style="width: 150px; margin-top: 10px !important; height: 30px;"></textarea>

                                                <hr>
                                            </center>

                                            <div class="container-fluid">
                                                <div class="row text-center">
                                                    <!-- Input para cargar imagen - Vista Frontal -->
                                                    <div class="form-group col-xs-6 col-md-3">
                                                        <label>Vista Frontal:</label>
                                                        <div class="image-upload">
                                                            <label for="editarFrontalImage">
                                                                <img class='cmnperfl' src="vistas/img/vf.PNG" id="updatefrontalPreview" />
                                                            </label>
                                                            <input type="file" id="editarFrontalImage" name="editarFrontalImage" accept="image/*" onchange="previewImageUpdate(this, 'updatefrontalPreview');" />

                                                            <input type="hidden" id="editFrontalImageDb" name="editFrontalImageDb">
                                                        </div>
                                                    </div>

                                                    <!-- Input para cargar imagen - Vista Trasera -->
                                                    <div class="form-group col-xs-6 col-md-3">
                                                        <label>Vista Trasera:</label>
                                                        <div class="image-upload">
                                                            <label for="editRearImage">
                                                                <img class='cmnperfl' src="vistas/img/vt.PNG" id="updaterearPreview" />
                                                            </label>
                                                            <input type="file" id="editRearImage" name="editRearImage" accept="image/*" onchange="previewImageUpdate(this, 'updaterearPreview');" />

                                                            <input type="hidden" id="editRearImageDb" name="editRearImageDb">
                                                        </div>
                                                    </div>

                                                    <!-- Input para cargar imagen - Vista Izquierda -->
                                                    <div class="form-group col-xs-6 col-md-3">
                                                        <label>Vista Izquierda:</label>
                                                        <div class="image-upload">
                                                            <label for="editLeftImage">
                                                                <img class='cmnperfl' src="vistas/img/vi.PNG" id="updateleftPreview" />
                                                            </label>
                                                            <input type="file" id="editLeftImage" name="editLeftImage" accept="image/*" onchange="previewImageUpdate(this, 'updateleftPreview');" />

                                                            <input type="hidden" id="editLeftImageDb" name="editLeftImageDb">
                                                        </div>
                                                    </div>

                                                    <!-- Input para cargar imagen - Vista Derecha -->
                                                    <div class="form-group col-xs-6 col-md-3">
                                                        <label>Vista Derecha:</label>
                                                        <div class="image-upload">
                                                            <label for="editRightImage">
                                                                <img class='cmnperfl' src="vistas/img/vd.PNG" id="updaterightPreview" />
                                                            </label>
                                                            <input type="file" id="editRightImage" name="editRightImage" accept="image/*" onchange="previewImageUpdate(this, 'updaterightPreview');" />

                                                            <input type="hidden" id="editRightImageDb" name="editRightImageDb">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <fieldset class="open">
                                                <legend><b>Cuerpo (Elementos del vehículo)</b></legend>

                                                <!-- Llave de contacto -->
                                                <div class="form-group col-md-2 border">
                                                    <label>Llave de contacto:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_1" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_1" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_1" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Chapa de puertas:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_2" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_2" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_2" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Plumillas:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_3" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_3" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_3" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Parabrisas:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_4" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_4" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_4" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Llanta de repuesto:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_5" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_5" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_5" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Espejos retrovisores:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_6" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_6" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_6" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Espejos de cabina:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_7" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_7" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_7" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Panel de control:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_8" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_8" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_8" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Indicadores del tablero:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_9" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_9" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_9" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Aire acondicionado:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_10" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_10" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_10" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Radio:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_11" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_11" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_11" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Mascarilla:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_12" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_12" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_12" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Parlantes:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_13" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_13" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_13" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Antena de radio:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_14" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_14" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_14" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Claxon:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_15" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_15" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_15" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Luz interior:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_16" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_16" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_16" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Alarma de retroceso:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_17" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_17" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_17" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Faros delanteros y posteriores:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_18" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_18" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_18" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Volante:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_19" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_19" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_19" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Palanca de cambios:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_20" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_20" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_20" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Asientos:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_21" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_21" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_21" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Cinturón de seguridad:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_22" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_22" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_22" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>estribos derecho e izquierdo:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_23" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_23" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_23" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Neumáticos delanteros y posteriores:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_24" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_24" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_24" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Tapa de combustible:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_25" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_25" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_25" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Varilla de medir aceite:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_26" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_26" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_26" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Batería:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_27" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_27" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_27" class="text_area_in"></textarea>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <!-- -------------------------------------------------------------------------- -->
                                            <fieldset class="closed">

                                                <legend><b>HERRAMIENTAS</b></legend>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Conos:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_28" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_28" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_28" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Cadenas:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_29" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_29" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_29" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Fajas:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_30" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_30" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_30" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Señoritas:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_31" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_31" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_31" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Llave de ruedas:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_32" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_32" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_32" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Banderines:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_33" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_33" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_33" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Letreros (ancha/larga):</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_34" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_34" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_34" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Guantes:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_35" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_35" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_35" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Cascos:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_36" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_36" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_36" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Mameluco:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_37" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_37" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_37" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Chaleco:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_38" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_38" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_38" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Zapatos de seguridad:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_39" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_39" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_39" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Llaves de tanque de combustible:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_40" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_40" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_40" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Llave del porta herramientas:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_41" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_41" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_41" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Tacos de seguridad:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_42" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_42" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_42" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Porta tacos:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_43" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_43" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_43" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Radios de comunicación / handis:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_44" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_44" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_44" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                            </fieldset>

                                            <!-- -------------------------------------------------------------------------- -->
                                            <fieldset class="closed">

                                                <legend><b>FLUIDOS</b></legend>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Agua para plumillas:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_45" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_45" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_45" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Refrigerante:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_46" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_46" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_46" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Aceite:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_47" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_47" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_47" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Nivel de combustible:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_48" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_48" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_48" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Hidrolina:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_49" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_49" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_49" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Combustible:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_50" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_50" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_50" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Frenos:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_51" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_51" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_51" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Grasa:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_52" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_52" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_52" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                            </fieldset>
                                            <!-- -------------------------------------------------------------------------- -->
                                            <fieldset class="closed">

                                                <legend><b>DOCUMENTOS</b></legend>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Tarjeta de propiedad:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_53" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_53" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_53" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Tarjeta de habilitación:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_54" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_54" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_54" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>SOAT:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_55" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_55" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_55" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Revisión técnica:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_56" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_56" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_56" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>Permisos SMTC:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_57" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_57" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_57" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ################### -->

                                                <div class="form-group col-md-2 border">
                                                    <label>SCTR:</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_58" value="cumple" required> Cumple
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" name="up_input_58" value="noCumple"> No cumple
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="up_com_input_58" class="text_area_in"></textarea>
                                                    </div>
                                                </div>

                                            </fieldset>
                                            <!-- Botón de envío -->
                                            <div class="form-group col-xs-12">
                                                <button type="submit" class="btn btn-primary">Registrar Inspección</button>
                                            </div>
                                            <?php
                                            if (isset($_POST['idCheckListConductor']) && !empty($_POST['idCheckListConductor'])) {
                                                $ControladorCheckListConductor->ctrActualizarCheckListConductor($_POST);
                                            }
                                            ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br><br>
                        <!-- Tabla para mostrar los registros -->
                        <div id="contenedorTabla">
                            <table class="table table-striped" id="tablaCheckListConductor">
                                <thead>
                                    <!-- La cabecera ahora está vacía porque usaremos la primera columna como cabecera en cada fila -->
                                </thead>
                                <tbody id="tableBody">
                                    <!-- Las filas se añadirán dinámicamente aquí -->
                                </tbody>
                            </table>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<script>
    $(document).ready(function() {

        // Aplica 'required' a todos los inputs y selects, excepto a los textarea
        $('#formCheckListConductor input, #formCheckListConductor select').attr('required', true);
        // Remueve el atributo 'required' de todos los textarea
        $('#formCheckListConductor textarea').removeAttr('required');

        // Inicialmente ocultamos el botón de submit


        // --------------------------------------------------------------------------------------------------------------------------
        cargarTabla();
        $('.radio-button').click(function() {
            var $this = $(this);
            $this.siblings().removeClass('checked'); // Remueve la clase 'checked' de otros botones
            $this.addClass('checked'); // Añade la clase 'checked' al botón clickeado
            $this.find('input').prop('checked', true); // Marca el input radio como seleccionado
        });
    });


    var mapeoNombres = {
        "options": "Vigencias de",
        "day": "Día",
        "input_1": "Llave de contacto",
        "com_input_1": "Comentario Llave de contacto",
        "input_2": "Chapa de puertas",
        "com_input_2": "Chapa de puertas",
        "input_3": "Plumillas",
        "com_input_3": "Comentario Plumillas",
        "input_4": "Parabrisas",
        "com_input_4": "Comentario Parabrisas",
        "input_5": "Llanta de repuesto",
        "com_input_5": "Comentario Llanta de repuesto",
        "input_6": "Espejos retrovisores",
        "com_input_6": "Comentario Espejos retrovisores",
        "input_7": "Espejos de cabina",
        "com_input_7": "Comentario Espejos de cabina",
        "input_8": "Panel de control",
        "com_input_8": "Comentario Panel de control",
        "input_9": "Indicadores del tablero",
        "com_input_9": "Comentario Indicadores del tablero",
        "input_10": "Aire acondicionado",
        "com_input_10": "Comentario Aire acondicionado",
        "input_11": "Radio",
        "com_input_11": "Comentario Radio",
        "input_12": "Mascarilla",
        "com_input_12": "Comentario Mascarilla",
        "input_13": "Parlantes",
        "com_input_13": "Comentario Parlantes",
        "input_14": "Llave de contactoAntena de radio",
        "com_input_14": "Comentario Antena de radio",
        "input_15": "Claxon",
        "com_input_15": "Comentario Claxon",
        "input_16": "Luz interior",
        "com_input_16": "Comentario Luz interior",
        "input_17": "Alarma de retroceso",
        "com_input_17": "Comentario Alarma de retroceso",
        "input_18": "Faros delanteros y posteriores",
        "com_input_18": "Comentario Faros delanteros y posteriores",
        "input_19": "Volante",
        "com_input_19": "Comentario Volante",
        "input_20": "Palanca de cambios",
        "com_input_20": "Comentario Palanca de cambios",
        "input_21": "Asientos",
        "com_input_21": "Comentario Asientos",
        "input_22": "Cinturón de seguridad",
        "com_input_22": "Comentario Cinturón de seguridad",
        "input_23": "estribos derecho e izquierdo",
        "com_input_23": "Comentario estribos derecho e izquierdo",
        "input_24": "Neumáticos delanteros y posteriores",
        "com_input_24": "Comentario Neumáticos delanteros y posteriores",
        "input_25": "Tapa de combustible",
        "com_input_25": "Comentario Tapa de combustible",
        "input_26": "Varilla de medir aceite",
        "com_input_26": "Comentario Varilla de medir aceite",
        "input_27": "Batería",
        "com_input_27": "Comentario Batería",
        "input_28": "Conos",
        "com_input_28": "Comentario Conos",

        "input_29": "Cadenas",
        "com_input_29": "Comentario Cadenas",
        "input_30": "Fajas",
        "com_input_30": "Comentario Fajas",
        "input_31": "Señoritas",
        "com_input_31": "Comentario Señoritas",
        "input_32": "Llave de ruedas",
        "com_input_32": "Comentario Llave de ruedas",
        "input_33": "Banderines",
        "com_input_33": "Comentario Banderines",
        "input_34": "Letreros (ancha/larga)",
        "com_input_34": "Comentario Letreros (ancha/larga)",
        "input_35": "Guantes",
        "com_input_35": "Comentario Guantes",
        "input_36": "Cascos",
        "com_input_36": "Comentario Cascos",
        "input_37": "Mameluco",
        "com_input_37": "Comentario Mameluco",
        "input_38": "Chaleco",
        "com_input_38": "Comentario Chaleco",
        "input_39": "Zapatos de seguridad",
        "com_input_39": "Comentario Zapatos de seguridad",
        "input_40": "Llaves de tanque de combustible",
        "com_input_40": "Comentario Llaves de tanque de combustible",
        "input_41": "Llave del porta herramientas",
        "com_input_41": "Comentario Llave del porta herramientas",
        "input_42": "Tacos de seguridad",
        "com_input_42": "Comentario Tacos de seguridad",
        "input_43": "Porta tacos",
        "com_input_43": "Comentario Porta tacos",
        "input_44": "Radios de comunicación / handis",
        "com_input_44": "Comentario Radios de comunicación / handis",
        "input_45": "Agua para plumillas",
        "com_input_45": "Comentario Agua para plumillas",
        "input_46": "Refrigerante",
        "com_input_46": "Comentario Refrigerante",
        "input_47": "Aceite",
        "com_input_47": "Comentario Aceite",
        "input_48": "Nivel de combustible",
        "com_input_48": "Comentario Nivel de combustible",
        "input_49": "Hidrolina",
        "com_input_49": "Comentario Hidrolina",
        "input_50": "Combustible",
        "com_input_50": "Comentario Combustible",
        "input_51": "Frenos",
        "com_input_51": "Comentario Frenos",
        "input_52": "Grasa",
        "com_input_52": "Comentario Grasa",
        "input_53": "Tarjeta de propiedad",
        "com_input_53": "Comentario Tarjeta de propiedad",
        "input_54": "Tarjeta de habilitación",
        "com_input_54": "Comentario Tarjeta de habilitación",
        "input_55": "SOAT",
        "com_input_55": "Comentario SOAT",
        "input_56": "Revisión técnica",
        "com_input_56": "Comentario Revisión técnica",
        "input_57": "Permisos SMTC",
        "com_input_57": "Comentario Permisos SMTC",
        "input_58": "SCTR",
        "com_input_58": "Comentario SCTR",
        "frontImg": "Imagen Frontal",
        "rearImg": "Imagen Trasera",
        "leftImg": "Imagen Izquierda",
        "rightImg": "Imagen Derecha"
    };

    function cargarTabla() {
        $.ajax({
            url: "modelos/check-list-conductor.modelo.php",
            method: "POST",
            data: {
                ajaxservice: 'loadData'
            },
            dataType: "json",
            success: function(respuesta) {
                $('#tablaCheckListConductor tbody').empty();

                if (respuesta && respuesta.length > 0) {
                    let datosPorColumna = {};

                    // Recorrer cada registro y organizar los datos por atributo
                    respuesta.forEach(function(registro) {
                        for (let key in registro) {
                            if (!datosPorColumna[key]) {
                                datosPorColumna[key] = [];
                            }
                            datosPorColumna[key].push(registro[key]);
                        }
                    });

                    // Recorrer los datos organizados por columna para crear filas
                    for (let atributo in datosPorColumna) {
                        let nombreColumna = mapeoNombres[atributo] || atributo.replace(/_/g, ' ').replace(/\b\w/g, l => l.toUpperCase());
                        let fila = `<tr><th class="fixed-column">${nombreColumna}</th>`;
                        datosPorColumna[atributo].forEach(function(valor) {
                            if (valor.includes("vistas/img/check_list_conductor/")) {
                                fila += `<td><center> <img src="${valor}" style="width:50px;height:auto;"></center></td>`;
                            } else if (valor === "cumple") {
                                fila += `<td style="background: green !important; color: white"><center>Cumple</center></td>`;
                            } else if (valor === "noCumple") {
                                fila += `<td style="background: red !important; color: white"><center>No Cumple</center></td>`;
                            } else {
                                fila += `<td><center> ${valor}</center></td>`;
                            }
                        });
                        fila += `</tr>`;
                        $('#tablaCheckListConductor tbody').append(fila);
                    }

                    // Agregar una fila adicional para los botones
                    let botonesFila = `<tr><th class="fixed-column">Acciones</th>`;
                    datosPorColumna['id'].forEach(function(id) {
                        botonesFila += `<td><center>
                                    <a href="javascript:void(0);" class="btn btn-info btn-xs btnEditarCheckListConductor" data-id="${id}" data-toggle="modal" data-target="#modalEditarCheckListConductor"><i class="fa fa-pencil"></i> Editar</a>
                                    <a href="javascript:void(0);" class="btn btn-danger btn-xs btnEliminarCheckListConductor" data-id="${id}" data-toggle="modal" data-target="#modalEliminarGastosConductor"><i class="fa fa-trash"></i> Eliminar</a>
                                    </center></td>`;
                    });
                    botonesFila += `</tr>`;
                    $('#tablaCheckListConductor tbody').append(botonesFila);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
            }
        });
    }



    $(document).on('click', '.btnEditarCheckListConductor', function() {
        var idA = $(this).data('id');
        var datos = new FormData();
        datos.append("idaa", idA);
        datos.append("ajaxservice", 'loadEdit');
        $('#idCheckListConductor').val($(this).data('id'));
        $.ajax({
            url: "modelos/check-list-conductor.modelo.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(item) {
                $("#idCheckListConductor").val(item.id);

                $("input[name='editaroptions'][value='" + item.options + "']").prop("checked", true);

                $("#editarday").val(item.day);
                $("textarea[name='editarplacadb']").val(item.placadb);

                // ################

                $("input[name='up_input_1'][value='" + item.input_1 + "']").prop("checked", true);
                $("textarea[name='up_com_input_1']").val(item.com_input_1);

                $("input[name='up_input_2'][value='" + item.input_2 + "']").prop("checked", true);
                $("textarea[name='up_com_input_2']").val(item.com_input_2);

                $("input[name='up_input_3'][value='" + item.input_3 + "']").prop("checked", true);
                $("textarea[name='up_com_input_3']").val(item.com_input_3);

                $("input[name='up_input_4'][value='" + item.input_4 + "']").prop("checked", true);
                $("textarea[name='up_com_input_4']").val(item.com_input_4);

                $("input[name='up_input_5'][value='" + item.input_5 + "']").prop("checked", true);
                $("textarea[name='up_com_input_5']").val(item.com_input_5);

                $("input[name='up_input_6'][value='" + item.input_6 + "']").prop("checked", true);
                $("textarea[name='up_com_input_6']").val(item.com_input_6);

                $("input[name='up_input_7'][value='" + item.input_7 + "']").prop("checked", true);
                $("textarea[name='up_com_input_7']").val(item.com_input_7);

                $("input[name='up_input_8'][value='" + item.input_8 + "']").prop("checked", true);
                $("textarea[name='up_com_input_8']").val(item.com_input_8);

                $("input[name='up_input_9'][value='" + item.input_9 + "']").prop("checked", true);
                $("textarea[name='up_com_input_9']").val(item.com_input_9);

                $("input[name='up_input_10'][value='" + item.input_10 + "']").prop("checked", true);
                $("textarea[name='up_com_input_10']").val(item.com_input_10);

                $("input[name='up_input_11'][value='" + item.input_11 + "']").prop("checked", true);
                $("textarea[name='up_com_input_11']").val(item.com_input_11);

                $("input[name='up_input_12'][value='" + item.input_12 + "']").prop("checked", true);
                $("textarea[name='up_com_input_12']").val(item.com_input_12);

                $("input[name='up_input_13'][value='" + item.input_13 + "']").prop("checked", true);
                $("textarea[name='up_com_input_13']").val(item.com_input_13);

                $("input[name='up_input_14'][value='" + item.input_14 + "']").prop("checked", true);
                $("textarea[name='up_com_input_14']").val(item.com_input_14);

                $("input[name='up_input_15'][value='" + item.input_15 + "']").prop("checked", true);
                $("textarea[name='up_com_input_15']").val(item.com_input_15);

                $("input[name='up_input_16'][value='" + item.input_16 + "']").prop("checked", true);
                $("textarea[name='up_com_input_16']").val(item.com_input_16);

                $("input[name='up_input_17'][value='" + item.input_17 + "']").prop("checked", true);
                $("textarea[name='up_com_input_17']").val(item.com_input_17);

                $("input[name='up_input_18'][value='" + item.input_18 + "']").prop("checked", true);
                $("textarea[name='up_com_input_18']").val(item.com_input_18);

                $("input[name='up_input_19'][value='" + item.input_19 + "']").prop("checked", true);
                $("textarea[name='up_com_input_19']").val(item.com_input_19);

                $("input[name='up_input_20'][value='" + item.input_20 + "']").prop("checked", true);
                $("textarea[name='up_com_input_20']").val(item.com_input_20);

                $("input[name='up_input_21'][value='" + item.input_21 + "']").prop("checked", true);
                $("textarea[name='up_com_input_21']").val(item.com_input_21);

                $("input[name='up_input_22'][value='" + item.input_22 + "']").prop("checked", true);
                $("textarea[name='up_com_input_22']").val(item.com_input_22);

                $("input[name='up_input_23'][value='" + item.input_23 + "']").prop("checked", true);
                $("textarea[name='up_com_input_23']").val(item.com_input_23);

                $("input[name='up_input_24'][value='" + item.input_24 + "']").prop("checked", true);
                $("textarea[name='up_com_input_24']").val(item.com_input_24);

                $("input[name='up_input_25'][value='" + item.input_25 + "']").prop("checked", true);
                $("textarea[name='up_com_input_25']").val(item.com_input_25);

                $("input[name='up_input_26'][value='" + item.input_26 + "']").prop("checked", true);
                $("textarea[name='up_com_input_26']").val(item.com_input_26);

                $("input[name='up_input_27'][value='" + item.input_27 + "']").prop("checked", true);
                $("textarea[name='up_com_input_27']").val(item.com_input_27);

                $("input[name='up_input_28'][value='" + item.input_28 + "']").prop("checked", true);
                $("textarea[name='up_com_input_28']").val(item.com_input_28);

                $("input[name='up_input_29'][value='" + item.input_29 + "']").prop("checked", true);
                $("textarea[name='up_com_input_29']").val(item.com_input_29);

                $("input[name='up_input_30'][value='" + item.input_30 + "']").prop("checked", true);
                $("textarea[name='up_com_input_30']").val(item.com_input_30);

                $("input[name='up_input_31'][value='" + item.input_31 + "']").prop("checked", true);
                $("textarea[name='up_com_input_31']").val(item.com_input_31);

                $("input[name='up_input_32'][value='" + item.input_32 + "']").prop("checked", true);
                $("textarea[name='up_com_input_32']").val(item.com_input_32);

                $("input[name='up_input_33'][value='" + item.input_33 + "']").prop("checked", true);
                $("textarea[name='up_com_input_33']").val(item.com_input_33);

                $("input[name='up_input_34'][value='" + item.input_34 + "']").prop("checked", true);
                $("textarea[name='up_com_input_34']").val(item.com_input_34);

                $("input[name='up_input_35'][value='" + item.input_35 + "']").prop("checked", true);
                $("textarea[name='up_com_input_35']").val(item.com_input_35);

                $("input[name='up_input_36'][value='" + item.input_36 + "']").prop("checked", true);
                $("textarea[name='up_com_input_36']").val(item.com_input_36);

                $("input[name='up_input_37'][value='" + item.input_37 + "']").prop("checked", true);
                $("textarea[name='up_com_input_37']").val(item.com_input_37);

                $("input[name='up_input_38'][value='" + item.input_38 + "']").prop("checked", true);
                $("textarea[name='up_com_input_38']").val(item.com_input_38);

                $("input[name='up_input_39'][value='" + item.input_39 + "']").prop("checked", true);
                $("textarea[name='up_com_input_39']").val(item.com_input_39);

                $("input[name='up_input_40'][value='" + item.input_40 + "']").prop("checked", true);
                $("textarea[name='up_com_input_40']").val(item.com_input_40);

                $("input[name='up_input_41'][value='" + item.input_41 + "']").prop("checked", true);
                $("textarea[name='up_com_input_41']").val(item.com_input_41);

                $("input[name='up_input_42'][value='" + item.input_42 + "']").prop("checked", true);
                $("textarea[name='up_com_input_42']").val(item.com_input_42);

                $("input[name='up_input_43'][value='" + item.input_43 + "']").prop("checked", true);
                $("textarea[name='up_com_input_43']").val(item.com_input_43);

                $("input[name='up_input_44'][value='" + item.input_44 + "']").prop("checked", true);
                $("textarea[name='up_com_input_44']").val(item.com_input_44);

                $("input[name='up_input_45'][value='" + item.input_45 + "']").prop("checked", true);
                $("textarea[name='up_com_input_45']").val(item.com_input_45);

                $("input[name='up_input_46'][value='" + item.input_46 + "']").prop("checked", true);
                $("textarea[name='up_com_input_46']").val(item.com_input_46);

                $("input[name='up_input_47'][value='" + item.input_47 + "']").prop("checked", true);
                $("textarea[name='up_com_input_47']").val(item.com_input_47);

                $("input[name='up_input_48'][value='" + item.input_48 + "']").prop("checked", true);
                $("textarea[name='up_com_input_48']").val(item.com_input_48);

                $("input[name='up_input_49'][value='" + item.input_49 + "']").prop("checked", true);
                $("textarea[name='up_com_input_49']").val(item.com_input_49);

                $("input[name='up_input_50'][value='" + item.input_50 + "']").prop("checked", true);
                $("textarea[name='up_com_input_50']").val(item.com_input_50);

                $("input[name='up_input_51'][value='" + item.input_51 + "']").prop("checked", true);
                $("textarea[name='up_com_input_51']").val(item.com_input_51);

                $("input[name='up_input_52'][value='" + item.input_52 + "']").prop("checked", true);
                $("textarea[name='up_com_input_52']").val(item.com_input_52);

                $("input[name='up_input_53'][value='" + item.input_53 + "']").prop("checked", true);
                $("textarea[name='up_com_input_53']").val(item.com_input_53);

                $("input[name='up_input_54'][value='" + item.input_54 + "']").prop("checked", true);
                $("textarea[name='up_com_input_54']").val(item.com_input_54);

                $("input[name='up_input_55'][value='" + item.input_55 + "']").prop("checked", true);
                $("textarea[name='up_com_input_55']").val(item.com_input_55);

                $("input[name='up_input_56'][value='" + item.input_56 + "']").prop("checked", true);
                $("textarea[name='up_com_input_56']").val(item.com_input_56);

                $("input[name='up_input_57'][value='" + item.input_57 + "']").prop("checked", true);
                $("textarea[name='up_com_input_57']").val(item.com_input_57);

                $("input[name='up_input_58'][value='" + item.input_58 + "']").prop("checked", true);
                $("textarea[name='up_com_input_58']").val(item.com_input_58);

                // ################

                $("#editFrontalImageDb").val(item.frontImg);
                $("#editRearImageDb").val(item.rearImg);
                $("#editLeftImageDb").val(item.leftImg);
                $("#editRightImageDb").val(item.rightImg);
            }

        })
    });

    $(document).on('click', '.btnEliminarCheckListConductor', function() {
        var idA = $(this).data('id');
        var confirmar = confirm("¿Estás seguro de que quieres eliminar esta check list del conductor?");
        if (confirmar) {

            var datos = new FormData();
            datos.append("idEliminar", idA);
            datos.append("ajaxservice", 'eliminar');
            $("#idCheckListConductor").val($(this).data('id'));

            $.ajax({
                url: "modelos/check-list-conductor.modelo.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(respuesta) {
                    if (respuesta == "ok") {
                        alert("Check list conductor eliminador correctamente");
                        cargarTabla();
                    } else {
                        alert("Error al eliminar la Check list del conductor");
                    }
                }
            })
        }
    });

    // Función para previsualizar la imagen seleccionada
    function previewImage(input, previewId) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#' + previewId).attr('src', e.target.result).css('opacity', 1); // Cambia la opacidad a 1 cuando la imagen es cargada
            };
            reader.readAsDataURL(input.files[0]);
        }
    }


    function previewImageUpdate(input, previewId) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById(previewId).src = e.target.result;
                $('#' + previewId).attr('src', e.target.result).css('opacity', 1); // Cambia la opacidad a 1 cuando la imagen es cargada
            };
            reader.readAsDataURL(input.files[0]); // Convert the file to a Data URL and update the image src
        }
    }


    // Inicializar todos los fieldsets como cerrados excepto el primero
    $('.closed').children().not('legend').hide();

    // Añadir funcionalidad de acordeón
    $('fieldset > legend').click(function() {
        var parentFieldset = $(this).parent();
        if (!parentFieldset.hasClass('open')) {
            // Abrir este fieldset
            parentFieldset.addClass('open').children().not('legend').slideDown();
            // Cerrar otros fieldsets
            parentFieldset.siblings('fieldset').removeClass('open').children().not('legend').slideUp();
        }
    });

    // Asegurarse de que cuando se complete el contenido de un fieldset, se abra el siguiente
    $('input, select, textarea').change(function() {
        if ($(this).closest('fieldset').find('input, select, textarea').filter(function() {
                return this.value === "";
            }).length === 0) {
            // Todos los campos están llenos, abrir el siguiente fieldset
            $(this).closest('fieldset').next('fieldset').children('legend').click();
        }
    });
</script>