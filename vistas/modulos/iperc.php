<style>
    /* body {
        background-color: #f8f9fa;
        font-family: 'Arial', sans-serif;
    } */

    .modal-dialog {
        max-width: 90%;
    }

    .modal-header {
        background-color: #007bff;
        color: #fff;
    }

    .container {
        max-width: 100%;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .form-section {
        border: 2px solid #343a40;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 8px;
        background-color: #e9ecef;
    }

    .form-section h4 {
        margin-bottom: 20px;
        color: #343a40;
        font-weight: bold;
    }

    .form-group label {
        font-weight: bold;
        color: #495057;
    }

    .form-control {
        border-radius: 5px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .risk-matrix {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        margin-top: 20px;
    }

    .risk-matrix div {
        width: 80px;
        height: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 5px;
        font-weight: bold;
        color: #fff;
        border-radius: 5px;
    }

    .risk-low {
        background-color: #28a745;
    }

    .risk-medium {
        background-color: #ffc107;
    }

    .risk-high {
        background-color: #dc3545;
    }

    @media (max-width: 768px) {

        .row .col-md-3,
        .row .col-md-4,
        .row .col-md-6 {
            margin-bottom: 15px;
        }
    }

    .modal-dialog-full-width {
        width: 100%;
        height: auto;
        margin: 0;
        padding: 0;
    }

    .modal-content-full-width {
        height: auto;
        border-radius: 0;
    }

    .modal-dialog {
        max-width: 100%;
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            FICHA IPERC
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active"> IPERC</li>
        </ol>
    </section>
    <?php
    require_once "controladores/iperc.controlador.php";
    require_once "modelos/iperc.modelo.php";
    $ControladorIperc = new ControladorIperc();
    ?>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregar">
                    <i class="fa fa-chevron-right" aria-hidden="true"></i> Agregar IPERC
                </button>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered" id="tableIperc">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre de la Actividad</th>
                            <th>¿Qué Tarea Va a Llevar a Cabo?</th>
                            <th>Orden de Trabajo</th>
                            <th>Supervisor Responsable</th>
                            <th>Firma del Supervisor</th>
                            <th>Encargado Responsable</th>
                            <th>Firma del Encargado</th>
                            <th>Fecha</th>
                            <th>Área</th>
                            <th>Clasificar la Tarea</th>
                            <th>Indicar el PETS</th>
                            <th>Además del PETS requiere PETAR</th>
                            <th>¿Se Revisó la Matriz IPERC?</th>
                            <th>Lugar</th>
                            <th>Hora de Inicio</th>
                            <th>Hora de Término</th>
                            <th>Equipos</th>
                            <th>Materiales/Productos Químicos</th>
                            <th>Descripción del Peligro</th>
                            <th>Riesgo</th>
                            <th>Probabilidad</th>
                            <th>Severidad</th>
                            <th>Exposición</th>
                            <th>Riesgo Inicial</th>
                            <th>Medidas de Control</th>
                            <th>Riesgo Residual</th>
                            <th>Verificación del EPP</th>

                            <th>Nombre y apellido del trabajador</th>
                            <th>Cargo del trabajador</th>
                            <th>Area del trabajador</th>
                            <th>Firma del trabajador</th>
                            <th>Hora del trabajador</th>
                            <th>Nombre del supervisor</th>
                            <th>Medida correctiva del supervisor</th>
                            <th>Firma del supervisor</th>

                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí se mostrarán los registros guardados -->
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>














<!-- MODAL FORMULARIO REGISTRO -->
<div id="modalAgregar" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-full-width" role="document">
        <div class="modal-content modal-content-full-width">
            <div class="modal-header">
                <h5 class="modal-title">Formulario Matriz IPERC Continuo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- CONTENIDO -->
                <div class="content-wrapper">
                    <section class="content-header">
                        <h1>Formulario Matriz IPERC Continuo</h1>
                        <ol class="breadcrumb">
                            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
                            <li class="active">Formulario IPERC</li>
                        </ol>
                    </section>

                    <section class="content">
                        <div class="box">
                            <div class="box-header with-border">
                                <!-- Opciones adicionales del encabezado -->
                            </div>

                            <div class="box-body table-responsive">
                                <form id="ipercForm" method="post" enctype="multipart/form-data">
                                    <!-- Información General -->
                                    <div class="form-section">
                                        <h4>Información General</h4>
                                        <div class="row">
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="activityName">Nombre de la Actividad</label>
                                                    <input type="text" class="form-control" id="activityName" name="activityName" placeholder="Ingrese el nombre de la actividad" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="task">¿Qué Tarea Va a Llevar a Cabo?</label>
                                                    <input type="text" class="form-control" id="task" name="task" placeholder="Describa la tarea" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="workOrder">Orden de Trabajo</label>
                                                    <input type="text" class="form-control" id="workOrder" name="workOrder" placeholder="Ingrese la orden de trabajo" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="responsableSupervisor">Supervisor Responsable</label>
                                                    <?php $datos = ControladorIperc::ctrMostrar('proveedores'); ?>
                                                    <select class="form-control select2" id="responsableSupervisor" name="responsableSupervisor" style="width: 100%;" required>
                                                        <option value="">Seleccionar Supervisor</option>
                                                        <?php
                                                        foreach ($datos as $data) {
                                                            echo '<option value="' . $data['proveedor_pk'] . '">' . $data['razon_social'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="supervisorSignature">Firma del Supervisor</label>
                                                    <input type="file" class="form-control" id="supervisorSignature" name="supervisorSignature"  required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="responsableEncargado">Encargado Responsable</label>
                                                    <?php $datos = ControladorIperc::ctrMostrar('proveedores'); ?>
                                                    <select class="form-control select2" id="responsableEncargado" name="responsableEncargado" style="width: 100%;" required>
                                                        <option value="">Seleccionar Encargado</option>
                                                        <?php
                                                        foreach ($datos as $data) {
                                                            echo '<option value="' . $data['proveedor_pk'] . '">' . $data['razon_social'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="encargadoSignature">Firma del Encargado</label>
                                                    <input type="file" class="form-control" id="encargadoSignature" name="encargadoSignature"  required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="date">Fecha</label>
                                                    <input type="date" class="form-control" id="date" name="date" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="area">Área</label>
                                                    <input type="text" class="form-control" id="area" name="area" placeholder="Ingrese el área" required>
                                                </div>
                                            </div>
                                            <div class="col-md-9 col-sm-12">
                                                <div class="form-group">
                                                    <label>Clasificar la Tarea</label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="clasificacion" id="rutina" value="rutina" required>
                                                        <label class="form-check-label" for="rutina">Rutinaria</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="clasificacion" id="noRutina" value="noRutina">
                                                        <label class="form-check-label" for="noRutina">No
                                                            Rutinaria</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="clasificacion" id="critica" value="critica">
                                                        <label class="form-check-label" for="critica">Crítica</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="pets">Indicar el PETS</label>
                                                    <input type="text" class="form-control" id="pets" name="pets" placeholder="Indicar el PETS" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="petar">Además del PETS requiere PETAR</label>
                                                    <input type="text" class="form-control" id="petar" name="petar" placeholder="Indicar si requiere PETAR" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>¿Se Revisó la Matriz IPERC?</label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="iperc" id="ipercYes" value="yes" required>
                                                        <label class="form-check-label" for="ipercYes">Sí</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="iperc" id="ipercNo" value="no">
                                                        <label class="form-check-label" for="ipercNo">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="location">Lugar</label>
                                                    <input type="text" class="form-control" id="location" name="location" placeholder="Ingrese el lugar" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="startTime">Hora de Inicio</label>
                                                    <input type="time" class="form-control" id="startTime" name="startTime" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="endTime">Hora de Término</label>
                                                    <input type="time" class="form-control" id="endTime" name="endTime" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="tools">Equipos</label>
                                                    <textarea class="form-control" id="tools" name="tools" rows="3" placeholder="Describa los equipos manuales y eléctricos" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="chemicals">Materiales/Productos Químicos</label>
                                                    <textarea class="form-control" id="chemicals" name="chemicals" rows="3" placeholder="Describa los materiales o productos químicos" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Identificación de Peligros -->
                                    <div class="form-section">
                                        <h4>Identificación de Peligros</h4>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="taskDescription">Descripción del Peligro</label>
                                                    <textarea class="form-control" id="taskDescription" name="taskDescription" rows="3" placeholder="Describa el peligro" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="risk">Riesgo</label>
                                                    <textarea class="form-control" id="risk" name="risk" rows="3" placeholder="Describa el riesgo" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Evaluación de Riesgos y Control -->
                                    <!-- Evaluación de Riesgos y Control -->
                                    <div class="form-section">
                                        <h4>Evaluación de Riesgos y Control</h4>
                                        <div class="row">
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="probability">Probabilidad</label>
                                                    <select class="form-control" id="probability" name="probability" required>
                                                        <option value="1">Improbable</option>
                                                        <option value="2">Poco Probable</option>
                                                        <option value="3">Probable</option>
                                                        <option value="4">Muy Probable</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="severity">Severidad</label>
                                                    <select class="form-control" id="severity" name="severity" required>
                                                        <option value="1">Ligeramente Dañino</option>
                                                        <option value="2">Dañino</option>
                                                        <option value="3">Extremadamente Dañino</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="exposure">Exposición</label>
                                                    <select class="form-control" id="exposure" name="exposure" required>
                                                        <option value="1">Esporádica</option>
                                                        <option value="2">Frecuente</option>
                                                        <option value="3">Permanente</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="initialRisk">Riesgo Inicial</label>
                                                    <input type="text" class="form-control" id="initialRisk" name="initialRisk" placeholder="Riesgo inicial calculado automáticamente" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="controlMeasures">Medidas de Control</label>
                                                    <textarea class="form-control" id="controlMeasures" name="controlMeasures" rows="3" placeholder="Describa las medidas de control a implementar" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="residualRisk">Riesgo Residual</label>
                                                    <input type="text" class="form-control" id="residualRisk" name="residualRisk" placeholder="Riesgo residual calculado automáticamente" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="risk-matrix text-center">
                                            <div id="riskLow" name="riskLow" class="risk-low" style="display: none;">
                                                Bajo</div>
                                            <div id="riskMedium" name="riskMedium" class="risk-medium" style="display: none;">Medio</div>
                                            <div id="riskHigh" name="riskHigh" class="risk-high" style="display: none;">
                                                Alto</div>
                                        </div>
                                    </div>


                                    <!-- Leyenda de Evaluación de Riesgos -->
                                    <div class="form-section">
                                        <h4>Evaluación de Riesgos</h4>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Nivel de Riesgo</th>
                                                    <th>Descripción</th>
                                                    <th style='width:40% !important'></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><span class="badge badge-success" style='background: #00b050 !important; color: black !important'>Bajo</span>
                                                    </td>
                                                    <td>Riesgo Tolerable</td>
                                                    <td rowspan="3" style="text-align: center; vertical-align: middle;width:40% !important">
                                                        <img class='' src="vistas/img/leyendita.webp" style='width:90% !important'>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="badge badge-warning" style='background: #ffff00 !important; color: black !important'>Medio</span>
                                                    </td>
                                                    <td>Riesgo Tolerable; Iniciar medidas para eliminar o reducir el
                                                        riesgo, evaluar si la acción se puede ejecutar de manera
                                                        inmediata.</td>
                                                </tr>
                                                <tr>
                                                    <td><span class="badge badge-danger" style='background: red !important; color: black !important'>Alto</span>
                                                    </td>
                                                    <td>Riesgo Intolerable, requiere controles inmediatos. Si no se
                                                        puede controlar el PELIGRO se paraliza los trabajos.</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>

                                    <!-- Datos de los Trabajadores -->
                                    <div class="form-section">
                                        <h4>Datos de los Trabajadores</h4>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Nombres y Apellidos</th>
                                                    <th>Cargo</th>
                                                    <th>Área</th>
                                                    <th>Firma</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="workerName1" placeholder="Nombre y Apellidos" required></td>
                                                    <td><input type="text" class="form-control" name="workerCargo1" placeholder="Cargo" required></td>
                                                    <td><input type="text" class="form-control" name="workerArea1" placeholder="Área" required></td>
                                                    <td><input type="file" class="form-control" name="workerSignature1"  required></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="workerName2" placeholder="Nombre y Apellidos"></td>
                                                    <td><input type="text" class="form-control" name="workerCargo2" placeholder="Cargo"></td>
                                                    <td><input type="text" class="form-control" name="workerArea2" placeholder="Área"></td>
                                                    <td><input type="file" class="form-control" name="workerSignature2" ></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="workerName3" placeholder="Nombre y Apellidos"></td>
                                                    <td><input type="text" class="form-control" name="workerCargo3" placeholder="Cargo"></td>
                                                    <td><input type="text" class="form-control" name="workerArea3" placeholder="Área"></td>
                                                    <td><input type="file" class="form-control" name="workerSignature3" ></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="workerName4" placeholder="Nombre y Apellidos"></td>
                                                    <td><input type="text" class="form-control" name="workerCargo4" placeholder="Cargo"></td>
                                                    <td><input type="text" class="form-control" name="workerArea4" placeholder="Área"></td>
                                                    <td><input type="file" class="form-control" name="workerSignature4" ></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="workerName5" placeholder="Nombre y Apellidos"></td>
                                                    <td><input type="text" class="form-control" name="workerCargo5" placeholder="Cargo"></td>
                                                    <td><input type="text" class="form-control" name="workerArea5" placeholder="Área"></td>
                                                    <td><input type="file" class="form-control" name="workerSignature5" ></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Datos de los Supervisores -->
                                    <div class="form-section">
                                        <h4>Datos de los Supervisores</h4>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Hora</th>
                                                    <th>Nombre del Supervisor</th>
                                                    <th>Medida Correctiva</th>
                                                    <th>Firma</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="time" class="form-control" name="supervisorTime1" required></td>
                                                    <td><input type="text" class="form-control" name="supervisorName1" placeholder="Nombre del Supervisor" required></td>
                                                    <td><textarea class="form-control" name="correctiveMeasure1" rows="2" placeholder="Medida Correctiva" required></textarea></td>
                                                    <td><input type="file" class="form-control" name="supervisorSignature1"  required>
                                                    </td>
                                                </tr>
                                                <!-- Añadir más filas según sea necesario -->
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Verificación del EPP -->
                                    <div class="form-section">
                                        <h4>Verificación del EPP</h4>
                                        <div class="row">
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label>Cuidado de Manos</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="hands1" name="hands1">
                                                        <label class="form-check-label" for="hands1">Superficies calientes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="hands2" name="hands2">
                                                        <label class="form-check-label" for="hands2">Superficies filosas</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="hands3" name="hands3">
                                                        <label class="form-check-label" for="hands3">Superficies punzantes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="hands4" name="hands4">
                                                        <label class="form-check-label" for="hands4">Puntos atrapamiento</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="hands5" name="hands5">
                                                        <label class="form-check-label" for="hands5">Productos químicos</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="hands6" name="hands6">
                                                        <label class="form-check-label" for="hands6">Energía eléctrica</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label>Área de trabajo</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="workArea1" name="workArea1">
                                                        <label class="form-check-label" for="workArea1">Extintor</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="workArea2" name="workArea2">
                                                        <label class="form-check-label" for="workArea2">Botiquín</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="workArea3" name="workArea3">
                                                        <label class="form-check-label" for="workArea3">Señalización</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="workArea4" name="workArea4">
                                                        <label class="form-check-label" for="workArea4">Delimitación</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="workArea5" name="workArea5">
                                                        <label class="form-check-label" for="workArea5">Punto de reunión</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="workArea6" name="workArea6">
                                                        <label class="form-check-label" for="workArea6">Lavabos</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="workArea7" name="workArea7">
                                                        <label class="form-check-label" for="workArea7">Caja de agua</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label>PETAR</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="petar1" name="petar1">
                                                        <label class="form-check-label" for="petar1">Altura</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="petar2" name="petar2">
                                                        <label class="form-check-label" for="petar2">Esp. Confinado</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="petar3" name="petar3">
                                                        <label class="form-check-label" for="petar3">Excavación</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="petar4" name="petar4">
                                                        <label class="form-check-label" for="petar4">Izaje</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="petar5" name="petar5">
                                                        <label class="form-check-label" for="petar5">Fuentes radiactivas</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="petar6" name="petar6">
                                                        <label class="form-check-label" for="petar6">Voladura</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="petar7" name="petar7">
                                                        <label class="form-check-label" for="petar7">Explosivos</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="petar8" name="petar8">
                                                        <label class="form-check-label" for="petar8">Tarea crítica del área</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label>Verificación del EPP</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp1" name="epp1">
                                                        <label class="form-check-label" for="epp1">Casco</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp2" name="epp2">
                                                        <label class="form-check-label" for="epp2">Lentes de seguridad</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp3" name="epp3">
                                                        <label class="form-check-label" for="epp3">Tapón de oídos</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp4" name="epp4">
                                                        <label class="form-check-label" for="epp4">Respirador</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp5" name="epp5">
                                                        <label class="form-check-label" for="epp5">Ropa de trabajo</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp6" name="epp6">
                                                        <label class="form-check-label" for="epp6">Guantes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp7" name="epp7">
                                                        <label class="form-check-label" for="epp7">Arnés</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp8" name="epp8">
                                                        <label class="form-check-label" for="epp8">Careta</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp9" name="epp9">
                                                        <label class="form-check-label" for="epp9">Zapato de seguridad</label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <!-- Checklist de Inspección -->
                                    <div class="form-section">
                                        <h4>Checklist de Inspección</h4>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="handCare">Cuidado de Manos</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="handCare1" name="handCare1">
                                                        <label class="form-check-label" for="handCare1">Superficies calientes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="handCare2" name="handCare2">
                                                        <label class="form-check-label" for="handCare2">Superficies filosas</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="handCare3" name="handCare3">
                                                        <label class="form-check-label" for="handCare3">Superficies punzantes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="handCare4" name="handCare4">
                                                        <label class="form-check-label" for="handCare4">Puntos atrapamiento</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="handCare5" name="handCare5">
                                                        <label class="form-check-label" for="handCare5">Productos químicos</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="handCare6" name="handCare6">
                                                        <label class="form-check-label" for="handCare6">Energía eléctrica</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="workArea">Área de trabajo</label>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="workArea8" name="workArea8">
                                                        <label class="form-check-label" for="workArea8">Extintor</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="workArea9" name="workArea9">
                                                        <label class="form-check-label" for="workArea9">Botiquín</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="workArea10" name="workArea10">
                                                        <label class="form-check-label" for="workArea10">Señalización</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="workArea11" name="workArea11">
                                                        <label class="form-check-label" for="workArea11">Delimitación</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="workArea12" name="workArea12">
                                                        <label class="form-check-label" for="workArea12">Punto de reunión</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="workArea13" name="workArea13">
                                                        <label class="form-check-label" for="workArea13">Lavabos</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="workArea14" name="workArea14">
                                                        <label class="form-check-label" for="workArea14">Caja de agua</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="petar">PETAR</label>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="petar9" name="petar9">
                                                        <label class="form-check-label" for="petar9">Altura</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="petar10" name="petar10">
                                                        <label class="form-check-label" for="petar10">Esp. Confinado</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="petar11" name="petar11">
                                                        <label class="form-check-label" for="petar11">Excavación</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="petar12" name="petar12">
                                                        <label class="form-check-label" for="petar12">Izaje</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="petar13" name="petar13">
                                                        <label class="form-check-label" for="petar13">Fuentes radiactivas</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="petar14" name="petar14">
                                                        <label class="form-check-label" for="petar14">Voladura</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="petar15" name="petar15">
                                                        <label class="form-check-label" for="petar15">Explosivos</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="petar16" name="petar16">
                                                        <label class="form-check-label" for="petar16">Tarea crítica del área</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="epp">Verificación del EPP</label>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp10" name="epp10">
                                                        <label class="form-check-label" for="epp10">Casco</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp11" name="epp11">
                                                        <label class="form-check-label" for="epp11">Lentes de seguridad</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp12" name="epp12">
                                                        <label class="form-check-label" for="epp12">Tapón de oídos</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp13" name="epp13">
                                                        <label class="form-check-label" for="epp13">Respirador</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp14" name="epp14">
                                                        <label class="form-check-label" for="epp14">Ropa de trabajo</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp15" name="epp15">
                                                        <label class="form-check-label" for="epp15">Guantes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp16" name="epp16">
                                                        <label class="form-check-label" for="epp16">Arnés</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp17" name="epp17">
                                                        <label class="form-check-label" for="epp17">Careta</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp18" name="epp18">
                                                        <label class="form-check-label" for="epp18">Zapato de seguridad</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="toolsEquip">Herramientas y Equipos</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="toolsEquip1" name="toolsEquip1">
                                                        <label class="form-check-label" for="toolsEquip1">Estandarizados</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="toolsEquip2" name="toolsEquip2">
                                                        <label class="form-check-label" for="toolsEquip2">En perfecto
                                                            estado</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="toolsEquip3" name="toolsEquip3">
                                                        <label class="form-check-label" for="toolsEquip3">Cinta de
                                                            inspección</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="toolsEquip4" name="toolsEquip4">
                                                        <label class="form-check-label" for="toolsEquip4">Adecuados</label>
                                                    </div>
                                                    <!-- Añadir más checkboxes según sea necesario -->
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="cleanliness">Orden y Limpieza</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="cleanliness1" name="cleanliness1">
                                                        <label class="form-check-label" for="cleanliness1">Pasadizos
                                                            libres</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="cleanliness2" name="cleanliness2">
                                                        <label class="form-check-label" for="cleanliness2">Tachos de
                                                            basura</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="cleanliness3" name="cleanliness3">
                                                        <label class="form-check-label" for="cleanliness3">Área
                                                            limpia</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="cleanliness4" name="cleanliness4">
                                                        <label class="form-check-label" for="cleanliness4">Herramientas en su lugar</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="cleanliness5" name="cleanliness5">
                                                        <label class="form-check-label" for="cleanliness5">Equipos bien ubicados</label>
                                                    </div>
                                                    <!-- Añadir más checkboxes según sea necesario -->
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="andamios">Andamios</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="andamios1" name="andamios1">
                                                        <label class="form-check-label" for="andamios1">Estandarizados</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="andamios2" name="andamios2">
                                                        <label class="form-check-label" for="andamios2">Horizontalidad</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="andamios3" name="andamios3">
                                                        <label class="form-check-label" for="andamios3">Verticalidad</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="andamios4" name="andamios4">
                                                        <label class="form-check-label" for="andamios4">Tarjeta de operación</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="andamios5" name="andamios5">
                                                        <label class="form-check-label" for="andamios5">Check List</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="andamios6" name="andamios6">
                                                        <label class="form-check-label" for="andamios6">Rodapiés</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="andamios7" name="andamios7">
                                                        <label class="form-check-label" for="andamios7">Herramientas atadas</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="izajes">Izajes de cargas</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="izajes1" name="izajes1">
                                                        <label class="form-check-label" for="izajes1">Plan de izaje</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="izajes2" name="izajes2">
                                                        <label class="form-check-label" for="izajes2">Rigger certificado</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="izajes3" name="izajes3">
                                                        <label class="form-check-label" for="izajes3">Eslingas</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="izajes4" name="izajes4">
                                                        <label class="form-check-label" for="izajes4">Grilletes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="izajes5" name="izajes5">
                                                        <label class="form-check-label" for="izajes5">Check List Grúa</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="sustancias">Sustancias químicas</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="sustancias1" name="sustancias1">
                                                        <label class="form-check-label" for="sustancias1">Hojas MSDS</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="sustancias2" name="sustancias2">
                                                        <label class="form-check-label" for="sustancias2">Bandejas antiderrame</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="sustancias3" name="sustancias3">
                                                        <label class="form-check-label" for="sustancias3">Código NFPA 704</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="sustancias4" name="sustancias4">
                                                        <label class="form-check-label" for="sustancias4">Kit antiderrame</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="sustancias5" name="sustancias5">
                                                        <label class="form-check-label" for="sustancias5">Ventilación</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="sustancias6" name="sustancias6">
                                                        <label class="form-check-label" for="sustancias6">Extintores cercanos</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="escaleras">Escaleras</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="escalera1" name="escalera1">
                                                        <label class="form-check-label" for="escalera1">Buenos peldaños</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="escalera2" name="escalera2">
                                                        <label class="form-check-label" for="escalera2">Escaleras adecuadas</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="escalera3" name="escalera3">
                                                        <label class="form-check-label" for="escalera3">Uso de arnés</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="escalera4" name="escalera4">
                                                        <label class="form-check-label" for="escalera4">Escalera con inspección</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="escalera5" name="escalera5">
                                                        <label class="form-check-label" for="escalera5">Buenos apoyos</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="escalera6" name="escalera6">
                                                        <label class="form-check-label" for="escalera6">Inclinación correcta</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="manejo">Manejo de vehículo</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="manejo1" name="manejo1">
                                                        <label class="form-check-label" for="manejo1">Conductor descansado</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="manejo2" name="manejo2">
                                                        <label class="form-check-label" for="manejo2">Check list</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="manejo3" name="manejo3">
                                                        <label class="form-check-label" for="manejo3">Baliza operativa</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="manejo4" name="manejo4">
                                                        <label class="form-check-label" for="manejo4">Extintor</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="manejo5" name="manejo5">
                                                        <label class="form-check-label" for="manejo5">Botiquín</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="manejo6" name="manejo6">
                                                        <label class="form-check-label" for="manejo6">Cinturón de seguridad</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="manejo7" name="manejo7">
                                                        <label class="form-check-label" for="manejo7">Permiso interno</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Botón de Enviar -->
                                    <div class="form-group row">
                                        <div class="col-sm-12 text-center">
                                            <button type="submit" class="btn btn-primary">Enviar</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                    <?php
                                    $ControladorIperc->ctrCrearIperc($_POST);
                                    ?>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
<!--  -->


<!-- MODAL FORMULARIO REGISTRO -->
<div id="modalActualizar" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-full-width" role="document">
        <div class="modal-content modal-content-full-width">
            <div class="modal-header">
                <h5 class="modal-title">Formulario Matriz IPERC Continuo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- CONTENIDO -->
                <div class="content-wrapper">
                    <section class="content-header">
                        <h1>Formulario Matriz IPERC Continuo</h1>
                        <ol class="breadcrumb">
                            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
                            <li class="active">Formulario IPERC</li>
                        </ol>
                    </section>

                    <section class="content">
                        <div class="box">
                            <div class="box-header with-border">
                                <!-- Opciones adicionales del encabezado -->
                            </div>

                            <div class="box-body table-responsive">
                                <form id="ipercFormUpdate" method="post" enctype="multipart/form-data">
                                    <!-- Información General -->
                                    <div class="form-section">
                                        <h4>Información General</h4>
                                        <div class="row">
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="activityNameD">Nombre de la Actividad</label>
                                                    <input type="hidden" id="idIperc" name="idIperc" value="valor">

                                                    <input type="text" class="form-control" id="activityNameD" name="activityName" placeholder="Ingrese el nombre de la actividad" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="taskD">¿Qué Tarea Va a Llevar a Cabo?</label>
                                                    <input type="text" class="form-control" id="taskD" name="task" placeholder="Describa la tarea" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="workOrderD">Orden de Trabajo</label>
                                                    <input type="text" class="form-control" id="workOrderD" name="workOrder" placeholder="Ingrese la orden de trabajo" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="responsableSupervisorD">Supervisor Responsable</label>
                                                    <?php $datos = ControladorIperc::ctrMostrar('proveedores'); ?>
                                                    <select class="form-control select2" id="responsableSupervisorD" name="responsableSupervisor" style="width: 100%;" required>
                                                        <option value="">Seleccionar Supervisor</option>
                                                        <?php
                                                        foreach ($datos as $data) {
                                                            echo '<option value="' . $data['proveedor_pk'] . '">' . $data['razon_social'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="supervisorSignatureD">Firma del Supervisor</label>
                                                    <input type="file" class="form-control" id="supervisorSignatureD" name="supervisorSignature" >
                                                    <input type="hidden" id="supervisorSignatureDB" name="supervisorSignatureDB">

                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="responsableEncargadoD">Encargado Responsable</label>
                                                    <?php $datos = ControladorIperc::ctrMostrar('proveedores'); ?>
                                                    <select class="form-control select2" id="responsableEncargadoD" name="responsableEncargado" style="width: 100%;" required>
                                                        <option value="">Seleccionar Encargado</option>
                                                        <?php
                                                        foreach ($datos as $data) {
                                                            echo '<option value="' . $data['proveedor_pk'] . '">' . $data['razon_social'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="encargadoSignatureD">Firma del Encargado</label>
                                                    <input type="file" class="form-control" id="encargadoSignatureD" name="encargadoSignature" >
                                                    <input type="hidden" id="encargadoSignatureDB" name="encargadoSignatureDB">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="dateD">Fecha</label>
                                                    <input type="date" class="form-control" id="dateD" name="date" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="areaD">Área</label>
                                                    <input type="text" class="form-control" id="areaD" name="area" placeholder="Ingrese el área" required>
                                                </div>
                                            </div>
                                            <div class="col-md-9 col-sm-12">
                                                <div class="form-group">
                                                    <label>Clasificar la Tarea</label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="clasificacion" id="rutinaD" value="rutina" required>
                                                        <label class="form-check-label" for="rutinaD">Rutinaria</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="clasificacion" id="noRutinaD" value="noRutina">
                                                        <label class="form-check-label" for="noRutinaD">No
                                                            Rutinaria</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="clasificacion" id="criticaD" value="critica">
                                                        <label class="form-check-label" for="criticaD">Crítica</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="petsD">Indicar el PETS</label>
                                                    <input type="text" class="form-control" id="petsD" name="pets" placeholder="Indicar el PETS" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="petarD">Además del PETS requiere PETAR</label>
                                                    <input type="text" class="form-control" id="petarD" name="petar" placeholder="Indicar si requiere PETAR" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>¿Se Revisó la Matriz IPERC?</label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="iperc" id="ipercYesD" value="yes" required>
                                                        <label class="form-check-label" for="ipercYesD">Sí</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="iperc" id="ipercNoD" value="no">
                                                        <label class="form-check-label" for="ipercNoD">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="locationD">Lugar</label>
                                                    <input type="text" class="form-control" id="locationD" name="location" placeholder="Ingrese el lugar" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="startTimeD">Hora de Inicio</label>
                                                    <input type="time" class="form-control" id="startTimeD" name="startTime" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="endTimeD">Hora de Término</label>
                                                    <input type="time" class="form-control" id="endTimeD" name="endTime" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="toolsD">Equipos</label>
                                                    <textarea class="form-control" id="toolsD" name="tools" rows="3" placeholder="Describa los equipos manuales y eléctricos" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="chemicalsD">Materiales/Productos Químicos</label>
                                                    <textarea class="form-control" id="chemicalsD" name="chemicals" rows="3" placeholder="Describa los materiales o productos químicos" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Identificación de Peligros -->
                                    <div class="form-section">
                                        <h4>Identificación de Peligros</h4>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="taskDescriptionD">Descripción del Peligro</label>
                                                    <textarea class="form-control" id="taskDescriptionD" name="taskDescription" rows="3" placeholder="Describa el peligro" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="riskD">Riesgo</label>
                                                    <textarea class="form-control" id="riskD" name="risk" rows="3" placeholder="Describa el riesgo" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Evaluación de Riesgos y Control -->
                                    <!-- Evaluación de Riesgos y Control -->
                                    <div class="form-section">
                                        <h4>Evaluación de Riesgos y Control</h4>
                                        <div class="row">
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="probabilityD">Probabilidad</label>
                                                    <select class="form-control" id="probabilityD" name="probability" required>
                                                        <option value="1">Improbable</option>
                                                        <option value="2">Poco Probable</option>
                                                        <option value="3">Probable</option>
                                                        <option value="4">Muy Probable</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="severityD">Severidad</label>
                                                    <select class="form-control" id="severityD" name="severity" required>
                                                        <option value="1">Ligeramente Dañino</option>
                                                        <option value="2">Dañino</option>
                                                        <option value="3">Extremadamente Dañino</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="exposureD">Exposición</label>
                                                    <select class="form-control" id="exposureD" name="exposure" required>
                                                        <option value="1">Esporádica</option>
                                                        <option value="2">Frecuente</option>
                                                        <option value="3">Permanente</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="initialRiskD">Riesgo Inicial</label>
                                                    <input type="text" class="form-control" id="initialRiskD" name="initialRisk" placeholder="Riesgo inicial calculado automáticamente" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="controlMeasuresD">Medidas de Control</label>
                                                    <textarea class="form-control" id="controlMeasuresD" name="controlMeasures" rows="3" placeholder="Describa las medidas de control a implementar" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="residualRiskD">Riesgo Residual</label>
                                                    <input type="text" class="form-control" id="residualRiskD" name="residualRisk" placeholder="Riesgo residual calculado automáticamente" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="risk-matrix text-center">
                                            <div id="riskLowD" name="riskLow" class="risk-low" style="display: none;">
                                                Bajo</div>
                                            <div id="riskMediumD" name="riskMedium" class="risk-medium" style="display: none;">Medio</div>
                                            <div id="riskHighD" name="riskHigh" class="risk-high" style="display: none;">
                                                Alto</div>
                                        </div>
                                    </div>


                                    <!-- Leyenda de Evaluación de Riesgos -->
                                    <div class="form-section">
                                        <h4>Evaluación de Riesgos</h4>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Nivel de Riesgo</th>
                                                    <th>Descripción</th>
                                                    <th style='width:40% !important'></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><span class="badge badge-success" style='background: #00b050 !important; color: black !important'>Bajo</span>
                                                    </td>
                                                    <td>Riesgo Tolerable</td>
                                                    <td rowspan="3" style="text-align: center; vertical-align: middle;width:40% !important">
                                                        <img class='' src="vistas/img/leyendita.webp" style='width:90% !important'>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="badge badge-warning" style='background: #ffff00 !important; color: black !important'>Medio</span>
                                                    </td>
                                                    <td>Riesgo Tolerable; Iniciar medidas para eliminar o reducir el
                                                        riesgo, evaluar si la acción se puede ejecutar de manera
                                                        inmediata.</td>
                                                </tr>
                                                <tr>
                                                    <td><span class="badge badge-danger" style='background: red !important; color: black !important'>Alto</span>
                                                    </td>
                                                    <td>Riesgo Intolerable, requiere controles inmediatos. Si no se
                                                        puede controlar el PELIGRO se paraliza los trabajos.</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>

                                    <!-- Datos de los Trabajadores -->
                                    <div class="form-section">
                                        <h4>Datos de los Trabajadores</h4>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Nombres y Apellidos</th>
                                                    <th>Cargo</th>
                                                    <th>Área</th>
                                                    <th>Firma</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="workerName1" id="workerName1D" placeholder="Nombre y Apellidos" required></td>
                                                    <td><input type="text" class="form-control" name="workerCargo1" id="workerCargo1D" placeholder="Cargo" required></td>
                                                    <td><input type="text" class="form-control" name="workerArea1" id="workerArea1D" placeholder="Área" required></td>
                                                    <td><input type="file" class="form-control" name="workerSignature1" id="workerSignature1D" ></td>
                                                    <input type="hidden" id="workerSignature1DB" name="workerSignature1DB">
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="workerName2" id="workerName2D" placeholder="Nombre y Apellidos" ></td>
                                                    <td><input type="text" class="form-control" name="workerCargo2" id="workerCargo2D" placeholder="Cargo" ></td>
                                                    <td><input type="text" class="form-control" name="workerArea2" id="workerArea2D" placeholder="Área" ></td>
                                                    <td><input type="file" class="form-control" name="workerSignature2" id="workerSignature2D" ></td>
                                                    <input type="hidden" id="workerSignature2DB" name="workerSignature2DB">
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="workerName3" id="workerName3D" placeholder="Nombre y Apellidos" ></td>
                                                    <td><input type="text" class="form-control" name="workerCargo3" id="workerCargo3D" placeholder="Cargo" ></td>
                                                    <td><input type="text" class="form-control" name="workerArea3" id="workerArea3D" placeholder="Área" ></td>
                                                    <td><input type="file" class="form-control" name="workerSignature3" id="workerSignature3D" ></td>
                                                    <input type="hidden" id="workerSignature3DB" name="workerSignature3DB">
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="workerName4" id="workerName4D" placeholder="Nombre y Apellidos" ></td>
                                                    <td><input type="text" class="form-control" name="workerCargo4" id="workerCargo4D" placeholder="Cargo" ></td>
                                                    <td><input type="text" class="form-control" name="workerArea4" id="workerArea4D" placeholder="Área" ></td>
                                                    <td><input type="file" class="form-control" name="workerSignature4" id="workerSignature4D" ></td>
                                                    <input type="hidden" id="workerSignature4DB" name="workerSignature4DB">
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="workerName5" id="workerName5D" placeholder="Nombre y Apellidos" ></td>
                                                    <td><input type="text" class="form-control" name="workerCargo5" id="workerCargo5D" placeholder="Cargo" ></td>
                                                    <td><input type="text" class="form-control" name="workerArea5" id="workerArea5D" placeholder="Área" ></td>
                                                    <td><input type="file" class="form-control" name="workerSignature5" id="workerSignature5D" ></td>
                                                    <input type="hidden" id="workerSignature5DB" name="workerSignature5DB">
                                                </tr>
                                                <!-- Añadir más filas según sea necesario -->
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Datos de los Supervisores -->
                                    <div class="form-section">
                                        <h4>Datos de los Supervisores</h4>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Hora</th>
                                                    <th>Nombre del Supervisor</th>
                                                    <th>Medida Correctiva</th>
                                                    <th>Firma</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="time" class="form-control" name="supervisorTime1" id="supervisorTime1D" required></td>
                                                    <td><input type="text" class="form-control" name="supervisorName1" id="supervisorName1D" placeholder="Nombre del Supervisor" required></td>
                                                    <td><textarea class="form-control" name="correctiveMeasure1" id="correctiveMeasure1D" rows="2" placeholder="Medida Correctiva" required></textarea></td>
                                                    <td><input type="file" class="form-control" name="supervisorSignature1" id="supervisorSignature1D" >
                                                        <input type="hidden" id="supervisorSignature1DB" name="supervisorSignature1DB">
                                                    </td>
                                                </tr>
                                                <!-- Añadir más filas según sea necesario -->
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Verificación del EPP -->
                                    <div class="form-section">
                                        <h4>Verificación del EPP</h4>
                                        <div class="row">
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label>Cuidado de Manos</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="hands1D" name="hands1">
                                                        <label class="form-check-label" for="hands1D">Superficies calientes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="hands2D" name="hands2">
                                                        <label class="form-check-label" for="hands2D">Superficies filosas</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="hands3D" name="hands3">
                                                        <label class="form-check-label" for="hands3D">Superficies punzantes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="hands4D" name="hands4">
                                                        <label class="form-check-label" for="hands4D">Puntos atrapamiento</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="hands5D" name="hands5">
                                                        <label class="form-check-label" for="hands5D">Productos químicos</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="hands6D" name="hands6">
                                                        <label class="form-check-label" for="hands6D">Energía eléctrica</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label>Área de trabajo</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="workArea1D" name="workArea1">
                                                        <label class="form-check-label" for="workArea1D">Extintor</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="workArea2D" name="workArea2">
                                                        <label class="form-check-label" for="workArea2D">Botiquín</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="workArea3D" name="workArea3">
                                                        <label class="form-check-label" for="workArea3D">Señalización</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="workArea4D" name="workArea4">
                                                        <label class="form-check-label" for="workArea4D">Delimitación</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="workArea5D" name="workArea5">
                                                        <label class="form-check-label" for="workArea5D">Punto de reunión</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="workArea6D" name="workArea6">
                                                        <label class="form-check-label" for="workArea6D">Lavabos</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="workArea7D" name="workArea7">
                                                        <label class="form-check-label" for="workArea7D">Caja de agua</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label>PETAR</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="petar1D" name="petar1">
                                                        <label class="form-check-label" for="petar1D">Altura</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="petar2D" name="petar2">
                                                        <label class="form-check-label" for="petar2D">Esp. Confinado</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="petar3D" name="petar3">
                                                        <label class="form-check-label" for="petar3D">Excavación</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="petar4D" name="petar4">
                                                        <label class="form-check-label" for="petar4D">Izaje</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="petar5D" name="petar5">
                                                        <label class="form-check-label" for="petar5D">Fuentes radiactivas</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="petar6D" name="petar6">
                                                        <label class="form-check-label" for="petar6D">Voladura</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="petar7D" name="petar7">
                                                        <label class="form-check-label" for="petar7D">Explosivos</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="petar8D" name="petar8">
                                                        <label class="form-check-label" for="petar8D">Tarea crítica del área</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label>Verificación del EPP</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp1D" name="epp1">
                                                        <label class="form-check-label" for="epp1D">Casco</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp2D" name="epp2">
                                                        <label class="form-check-label" for="epp2D">Lentes de seguridad</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp3D" name="epp3">
                                                        <label class="form-check-label" for="epp3D">Tapón de oídos</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp4D" name="epp4">
                                                        <label class="form-check-label" for="epp4D">Respirador</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp5D" name="epp5">
                                                        <label class="form-check-label" for="epp5D">Ropa de trabajo</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp6D" name="epp6">
                                                        <label class="form-check-label" for="epp6D">Guantes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp7D" name="epp7">
                                                        <label class="form-check-label" for="epp7D">Arnés</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp8D" name="epp8">
                                                        <label class="form-check-label" for="epp8D">Careta</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp9D" name="epp9">
                                                        <label class="form-check-label" for="epp9D">Zapato de seguridad</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Checklist de Inspección -->
                                    <div class="form-section">
                                        <h4>Checklist de Inspección</h4>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="handCareD">Cuidado de Manos</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="handCare1D" name="handCare1">
                                                        <label class="form-check-label" for="handCare1D">Superficies calientes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="handCare2D" name="handCare2">
                                                        <label class="form-check-label" for="handCare2D">Superficies filosas</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="handCare3D" name="handCare3">
                                                        <label class="form-check-label" for="handCare3D">Superficies punzantes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="handCare4D" name="handCare4">
                                                        <label class="form-check-label" for="handCare4D">Puntos atrapamiento</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="handCare5D" name="handCare5">
                                                        <label class="form-check-label" for="handCare5D">Productos químicos</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="handCare6D" name="handCare6">
                                                        <label class="form-check-label" for="handCare6D">Energía eléctrica</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="workAreaD">Área de trabajo</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="workArea8D" name="workArea8">
                                                        <label class="form-check-label" for="workArea8D">Extintor</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="workArea9D" name="workArea9">
                                                        <label class="form-check-label" for="workArea9D">Botiquín</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="workArea10D" name="workArea10">
                                                        <label class="form-check-label" for="workArea10D">Señalización</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="workArea11D" name="workArea11">
                                                        <label class="form-check-label" for="workArea11D">Delimitación</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="workArea12D" name="workArea12">
                                                        <label class="form-check-label" for="workArea12D">Punto de reunión</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="workArea13D" name="workArea13">
                                                        <label class="form-check-label" for="workArea13D">Lavabos</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="workArea14D" name="workArea14">
                                                        <label class="form-check-label" for="workArea14D">Caja de agua</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="petarD">PETAR</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="petar9D" name="petar9">
                                                        <label class="form-check-label" for="petar9D">Altura</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="petar10D" name="petar10">
                                                        <label class="form-check-label" for="petar10D">Esp. Confinado</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="petar11D" name="petar11">
                                                        <label class="form-check-label" for="petar11D">Excavación</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="petar12D" name="petar12">
                                                        <label class="form-check-label" for="petar12D">Izaje</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="petar13D" name="petar13">
                                                        <label class="form-check-label" for="petar13D">Fuentes radiactivas</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="petar14D" name="petar14">
                                                        <label class="form-check-label" for="petar14D">Voladura</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="petar15D" name="petar15">
                                                        <label class="form-check-label" for="petar15D">Explosivos</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="petar16D" name="petar16">
                                                        <label class="form-check-label" for="petar16D">Tarea crítica del área</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="eppD">Verificación del EPP</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp10D" name="epp10">
                                                        <label class="form-check-label" for="epp10D">Casco</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp11D" name="epp11">
                                                        <label class="form-check-label" for="epp11D">Lentes de seguridad</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp12D" name="epp12">
                                                        <label class="form-check-label" for="epp12D">Tapón de oídos</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp13D" name="epp13">
                                                        <label class="form-check-label" for="epp13D">Respirador</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp14D" name="epp14">
                                                        <label class="form-check-label" for="epp14D">Ropa de trabajo</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp15D" name="epp15">
                                                        <label class="form-check-label" for="epp15D">Guantes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp16D" name="epp16">
                                                        <label class="form-check-label" for="epp16D">Arnés</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp17D" name="epp17">
                                                        <label class="form-check-label" for="epp17D">Careta</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="epp18D" name="epp18">
                                                        <label class="form-check-label" for="epp18D">Zapato de seguridad</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="toolsEquipD">Herramientas y Equipos</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="toolsEquip1D" name="toolsEquip1">
                                                        <label class="form-check-label" for="toolsEquip1D">Estandarizados</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="toolsEquip2D" name="toolsEquip2">
                                                        <label class="form-check-label" for="toolsEquip2D">En perfecto estado</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="toolsEquip3D" name="toolsEquip3">
                                                        <label class="form-check-label" for="toolsEquip3D">Cinta de inspección</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="toolsEquip4D" name="toolsEquip4">
                                                        <label class="form-check-label" for="toolsEquip4D">Adecuados</label>
                                                    </div>
                                                    <!-- Añadir más checkboxes según sea necesario -->
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="cleanlinessD">Orden y Limpieza</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="cleanliness1D" name="cleanliness1">
                                                        <label class="form-check-label" for="cleanliness1D">Pasadizos libres</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="cleanliness2D" name="cleanliness2">
                                                        <label class="form-check-label" for="cleanliness2D">Tachos de basura</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="cleanliness3D" name="cleanliness3">
                                                        <label class="form-check-label" for="cleanliness3D">Área limpia</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="cleanliness4D" name="cleanliness4">
                                                        <label class="form-check-label" for="cleanliness4D">Herramientas en su lugar</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="cleanliness5D" name="cleanliness5">
                                                        <label class="form-check-label" for="cleanliness5D">Equipos bien ubicados</label>
                                                    </div>
                                                    <!-- Añadir más checkboxes según sea necesario -->
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="andamiosD">Andamios</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="andamios1D" name="andamios1">
                                                        <label class="form-check-label" for="andamios1D">Estandarizados</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="andamios2D" name="andamios2">
                                                        <label class="form-check-label" for="andamios2D">Horizontalidad</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="andamios3D" name="andamios3">
                                                        <label class="form-check-label" for="andamios3D">Verticalidad</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="andamios4D" name="andamios4">
                                                        <label class="form-check-label" for="andamios4D">Tarjeta de operación</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="andamios5D" name="andamios5">
                                                        <label class="form-check-label" for="andamios5D">Check List</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="andamios6D" name="andamios6">
                                                        <label class="form-check-label" for="andamios6D">Rodapiés</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="andamios7D" name="andamios7">
                                                        <label class="form-check-label" for="andamios7D">Herramientas atadas</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="izajesD">Izajes de cargas</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="izajes1D" name="izajes1">
                                                        <label class="form-check-label" for="izajes1D">Plan de izaje</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="izajes2D" name="izajes2">
                                                        <label class="form-check-label" for="izajes2D">Rigger certificado</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="izajes3D" name="izajes3">
                                                        <label class="form-check-label" for="izajes3D">Eslingas</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="izajes4D" name="izajes4">
                                                        <label class="form-check-label" for="izajes4D">Grilletes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="izajes5D" name="izajes5">
                                                        <label class="form-check-label" for="izajes5D">Check List Grúa</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="sustanciasD">Sustancias químicas</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="sustancias1D" name="sustancias1">
                                                        <label class="form-check-label" for="sustancias1D">Hojas MSDS</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="sustancias2D" name="sustancias2">
                                                        <label class="form-check-label" for="sustancias2D">Bandejas antiderrame</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="sustancias3D" name="sustancias3">
                                                        <label class="form-check-label" for="sustancias3D">Código NFPA 704</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="sustancias4D" name="sustancias4">
                                                        <label class="form-check-label" for="sustancias4D">Kit antiderrame</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="sustancias5D" name="sustancias5">
                                                        <label class="form-check-label" for="sustancias5D">Ventilación</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="sustancias6D" name="sustancias6">
                                                        <label class="form-check-label" for="sustancias6D">Extintores cercanos</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="escalerasD">Escaleras</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="escalera1D" name="escalera1">
                                                        <label class="form-check-label" for="escalera1D">Buenos peldaños</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="escalera2D" name="escalera2">
                                                        <label class="form-check-label" for="escalera2D">Escaleras adecuadas</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="escalera3D" name="escalera3">
                                                        <label class="form-check-label" for="escalera3D">Uso de arnés</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="escalera4D" name="escalera4">
                                                        <label class="form-check-label" for="escalera4D">Escalera con inspección</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="escalera5D" name="escalera5">
                                                        <label class="form-check-label" for="escalera5D">Buenos apoyos</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="escalera6D" name="escalera6">
                                                        <label class="form-check-label" for="escalera6D">Inclinación correcta</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="manejoD">Manejo de vehículo</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="manejo1D" name="manejo1">
                                                        <label class="form-check-label" for="manejo1D">Conductor descansado</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="manejo2D" name="manejo2">
                                                        <label class="form-check-label" for="manejo2D">Check list</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="manejo3D" name="manejo3">
                                                        <label class="form-check-label" for="manejo3D">Baliza operativa</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="manejo4D" name="manejo4">
                                                        <label class="form-check-label" for="manejo4D">Extintor</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="manejo5D" name="manejo5">
                                                        <label class="form-check-label" for="manejo5D">Botiquín</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="manejo6D" name="manejo6">
                                                        <label class="form-check-label" for="manejo6D">Cinturón de seguridad</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="manejo7D" name="manejo7">
                                                        <label class="form-check-label" for="manejo7D">Permiso interno</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Botón de Enviar -->
                                    <div class="form-group row">
                                        <div class="col-sm-12 text-center">
                                            <button type="submit" class="btn btn-primary">Enviar</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                    <?php
                                    if (isset($_POST['idIperc']) && !empty($_POST['idIperc'])) {
                                        $ControladorIperc->ctrActualizarIperc($_POST);
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        cargarDatos();

        function calculateRiskLevel() {
            var probability = parseInt($('#probability').val());
            var severity = parseInt($('#severity').val());
            var exposure = parseInt($('#exposure').val());
            var initialRisk = probability * severity * exposure;

            $('#initialRisk').val(initialRisk);

            $('#riskLow, #riskMedium, #riskHigh').hide();
            if (initialRisk <= 8) {
                $('#riskLow').show();
            } else if (initialRisk <= 16) {
                $('#riskMedium').show();
            } else {
                $('#riskHigh').show();
            }

            // Calcula el riesgo residual (ejemplo)
            var residualRisk = initialRisk / 2; // Solo un ejemplo, ajusta según la lógica necesaria
            $('#residualRisk').val(residualRisk);
        }

        $('#probability, #severity, #exposure').change(calculateRiskLevel);
        calculateRiskLevel(); // Cálculo inicial
    });

    function cargarDatos() {
        $.ajax({
            url: "modelos/iperc.modelo.php",
            method: "POST",
            data: {
                ajaxservice: 'loadData'
            },
            dataType: "json",
            success: function(respuesta) {

                $('#tableIperc tbody').empty();
                if (respuesta && respuesta.length > 0) {
                    $.each(respuesta, function(index, registro) {
                        var fila = '<tr>' +
                            '<td>' + registro.id + '</td>' +
                            '<td>' + registro.activity_name + '</td>' +
                            '<td>' + registro.task + '</td>' +
                            '<td>' + registro.work_order + '</td>' +
                            '<td>' + registro.responsable_supervisor + '</td>' +
                            '<td>';
                        var firma1 = registro.supervisor_signature;
                        if (firma1) {
                            fila += '<a href="' + firma1 + '" target="_blank">  <i class="fa fa-file"> Firma</i></a> <br>';
                        } else {
                            fila += '<i class="fa fa-file text-muted"> Firma </i> <br>';
                        }
                        fila += '</td>' +
                            // '<td>' + registro.supervisor_signature + '</td>' + //
                            '<td>' + registro.responsable_encargado + '</td>' +
                            '<td>';
                        var firma2 = registro.encargado_signature;
                        if (firma2) {
                            fila += '<a href="' + firma2 + '" target="_blank">  <i class="fa fa-file"> Firma</i></a> <br>';
                        } else {
                            fila += '<i class="fa fa-file text-muted"> Firma </i> <br>';
                        }
                        fila += '</td>' +
                            '<td>' + registro.date + '</td>' +
                            '<td>' + registro.area + '</td>' +
                            '<td>' + registro.clasificacion + '</td>' +
                            '<td>' + registro.pets + '</td>' +
                            '<td>' + registro.petar + '</td>' +
                            '<td>' + registro.iperc + '</td>' +
                            '<td>' + registro.location + '</td>' +
                            '<td>' + registro.start_time + '</td>' +
                            '<td>' + registro.end_time + '</td>' +
                            '<td>' + registro.tools + '</td>' +
                            '<td>' + registro.chemicals + '</td>' +
                            '<td>' + registro.task_description + '</td>' +
                            '<td>' + registro.risk + '</td>' +
                            '<td>' + registro.probability + '</td>' +
                            '<td>' + registro.severity + '</td>' +
                            '<td>' + registro.exposure + '</td>' +
                            '<td>' + registro.initial_risk + '</td>' +

                            '<td>' + registro.control_measures + '</td>' +
                            '<td>' + registro.residual_risk + '</td>' +
                            '<td>' + registro.list_hands + '</td>' +

                            '<td>' + registro.worker_name1 + '</td>' +
                            '<td>' + registro.worker_cargo1 + '</td>' +
                            '<td>' + registro.worker_area1 + '</td>' +
                            '<td>';
                        var firma3 = registro.worker_signature1;
                        if (firma3) {
                            fila += '<a href="' + firma3 + '" target="_blank">  <i class="fa fa-file"> Firma</i></a> <br>';
                        } else {
                            fila += '<i class="fa fa-file text-muted"> Firma </i> <br>';
                        }
                        fila += '</td>' +
                            // '<td>' + registro.worker_signature1 + '</td>' + //

                            '<td>' + registro.supervisor_time1 + '</td>' +
                            '<td>' + registro.supervisor_name1 + '</td>' +
                            '<td>' + registro.corrective_measure1 + '</td>' +
                            '<td>';
                        var firma4 = registro.supervisor_signature1;
                        if (firma4) {
                            fila += '<a href="' + firma4 + '" target="_blank">  <i class="fa fa-file"> Firma</i></a> <br>';
                        } else {
                            fila += '<i class="fa fa-file text-muted"> Firma </i> <br>';
                        }
                        fila += '</td>' +
                            // '<td>' + registro.supervisor_signature1 + '</td>' + //

                            '<td>' +
                            '<center>' +
                            '<a style="margin-top: 4px !important" href="javascript:void(0);" class="btn btn-info btn-xs btnEditarIperc" data-id="' + registro.id + '"  data-toggle="modal" data-target="#modalActualizar"><i class="fa fa-pencil"></i> Editar</a>' +
                            '<a style="margin-top: 4px !important" href="javascript:void(0);" class="btn btn-danger btn-xs btnEliminarGastosConductor" data-id="' + registro.id + '"  data-toggle="modal" data-target="#modalEliminarGastosConductor"><i class="fa fa-pencil"></i> Eliminar</a>' +
                            '</center>' +
                            '<br>' +
                            '</td>' +
                            '</tr>';
                        $('#tableIperc tbody').append(fila);
                    })
                }
            }
        })
    }
    $(document).on('click', '.btnEliminarGastosConductor', function() {

        var confirmar = confirm("¿Estás seguro de que quieres eliminar este registro?");
        if (confirmar) {
            var idA = $(this).data('id');
            var datos = new FormData();
            datos.append("id", idA);
            datos.append("ajaxservice", 'eliminar');
            $.ajax({
                url: "modelos/iperc.modelo.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(item) {
                    if (item==="ok") {
                        swal({
                            type: "success",
                            title: "Matriz de IPERC ha sido eliminada correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result) => {
                            if (result.value) {
                                window.location = "iperc";
                            }
                        })
                    }
                }
            });

        }
    })
    $(document).on('click', '.btnEditarIperc', function() {
        // document.getElementById("ipercForm").reset();
        document.getElementById("ipercFormUpdate").reset();
        var idA = $(this).data('id');
        var datos = new FormData();
        datos.append("idaa", idA);
        datos.append("ajaxservice", 'loadEdit');
        $("#idGastosConductorEditar").val($(this).data('id'));
        $.ajax({
            url: "modelos/iperc.modelo.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(item) {
                $("#idIperc").val(item.id);

                $("#activityNameD").val(item.activity_name);
                $("#taskD").val(item.task);
                $("#workOrderD").val(item.work_order);
                $("#responsableSupervisorD").val(item.responsable_supervisor).trigger("change");
                $("#supervisorSignatureDB").val(item.supervisor_signature);
                $("#responsableEncargadoD").val(item.responsable_encargado).trigger("change");
                $("#encargadoSignatureDB").val(item.encargado_signature);
                $("#dateD").val(item.date);
                $("#areaD").val(item.area);
                $("#clasificacionD").val(item.clasificacion);

                var clasification = item.clasificacion
                if (clasification === "rutina") {
                    $("#rutinaD").prop("checked", true);
                } else if (clasification === "noRutina") {
                    $("#noRutinaD").prop("checked", true);
                } else if (clasification === "critica") {
                    $("#criticaD").prop("checked", true);
                }

                $("#petsD").val(item.pets);
                $("#petarD").val(item.petar);

                var ipercValue = item.iperc;

                if (ipercValue === "yes") {
                    $("#ipercYesD").prop("checked", true);
                } else if (ipercValue === "no") {
                    $("#ipercNoD").prop("checked", true);
                }

                $("#locationD").val(item.location);
                $("#startTimeD").val(item.start_time);
                $("#endTimeD").val(item.end_time);
                $("#toolsD").val(item.tools);
                $("#chemicalsD").val(item.chemicals);

                $("#taskDescriptionD").val(item.task_description);
                $("#riskD").val(item.risk);
                $("#probabilityD").val(item.probability).on("change");
                $("#severityD").val(item.severity);
                $("#exposureD").val(item.exposure);

                $("#initialRiskD").val(item.initial_risk);
                $("#controlMeasuresD").val(item.control_measures);
                $("#residualRiskD").val(item.residual_risk);

                $("#workerName1D").val(item.worker_name1);
                $("#workerCargo1D").val(item.worker_cargo1);
                $("#workerArea1D").val(item.worker_area1);
                $("#workerSignature1DB").val(item.worker_signature1);

                $("#workerName2D").val(item.worker_name2);
                $("#workerCargo2D").val(item.worker_cargo2);
                $("#workerArea2D").val(item.worker_area2);
                $("#workerSignature2DB").val(item.worker_signature2);

                $("#workerName3D").val(item.worker_name3);
                $("#workerCargo3D").val(item.worker_cargo3);
                $("#workerArea3D").val(item.worker_area3);
                $("#workerSignature3DB").val(item.worker_signature3);

                $("#workerName4D").val(item.worker_name4);
                $("#workerCargo4D").val(item.worker_cargo4);
                $("#workerArea4D").val(item.worker_area4);
                $("#workerSignature4DB").val(item.worker_signature4);

                $("#workerName5D").val(item.worker_name5);
                $("#workerCargo5D").val(item.worker_cargo5);
                $("#workerArea5D").val(item.worker_area5);
                $("#workerSignature5DB").val(item.worker_signature5);

                $("#supervisorTime1D").val(item.supervisor_time1);
                $("#supervisorName1D").val(item.supervisor_name1);
                $("#correctiveMeasure1D").val(item.corrective_measure1);
                $("#supervisorSignature1DB").val(item.supervisor_signature1);

                var listHands = item.list_hands;

                var handsArray = listHands.split('/');

                handsArray.forEach(function(hand) {
                    $("#" + hand + "D").prop("checked", true);
                });

                var listWorkArea = item.list_work_area;

                var handsArray = listWorkArea.split('/');

                handsArray.forEach(function(hand) {
                    $("#" + hand + "D").prop("checked", true);
                });

                var listPetar = item.list_petar;

                var handsArray = listPetar.split('/');

                handsArray.forEach(function(hand) {
                    $("#" + hand + "D").prop("checked", true);
                });

                var listEpp = item.list_epp;

                var handsArray = listEpp.split('/');

                handsArray.forEach(function(hand) {
                    $("#" + hand + "D").prop("checked", true);
                });

                var listHannCar = item.list_hann_car;

                var handsArray = listHannCar.split('/');

                handsArray.forEach(function(hand) {
                    $("#" + hand + "D").prop("checked", true);
                });

                // var listWordArea = item.list_word_area;

                //var handsArray = listWordArea.split('/');

                //handsArray.forEach(function(hand) {
                //    $("#" + hand + "D").prop("checked", true);
                //});

                var listToolsEquip = item.list_tools_equip;

                var handsArray = listToolsEquip.split('/');

                handsArray.forEach(function(hand) {
                    $("#" + hand + "D").prop("checked", true);
                });

                var listCleanLiness = item.list_clean_liness;

                var handsArray = listCleanLiness.split('/');

                handsArray.forEach(function(hand) {
                    $("#" + hand + "D").prop("checked", true);
                });

                var listAndamios = item.list_andamios;

                var handsArray = listAndamios.split('/');

                handsArray.forEach(function(hand) {
                    $("#" + hand + "D").prop("checked", true);
                });

                var listIzajes = item.list_izajes;

                var handsArray = listIzajes.split('/');

                handsArray.forEach(function(hand) {
                    $("#" + hand + "D").prop("checked", true);
                });

                var listSustancias = item.list_sustancias;

                var handsArray = listSustancias.split('/');

                handsArray.forEach(function(hand) {
                    $("#" + hand + "D").prop("checked", true);
                });

                var listEscaleras = item.list_escaleras;

                var handsArray = listEscaleras.split('/');

                handsArray.forEach(function(hand) {
                    $("#" + hand + "D").prop("checked", true);
                });

                var listManejo = item.list_manejo;

                var handsArray = listManejo.split('/');

                handsArray.forEach(function(hand) {
                    $("#" + hand + "D").prop("checked", true);
                });
            }
        })
    });
</script>