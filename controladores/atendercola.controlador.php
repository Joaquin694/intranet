<?php


if (!class_exists('ModeloPlanMantenimiento')) {
    require_once "../modelos/atendercola.modelo.php";
}


class ControladorAtenderCola
{
    public function guardarCola($request, $file)
    {
        if ($this->validate($request, [
            'dniCliente',
            'nombreCliente',
            'dniAlumno',
            'nombreAlumno',
            'carreraCiclo',
            'ciclo',
            'dniDocente',
            'nombreDocente',
            'dniExterno',
            'nombreExterno',
            'categoriaMotivo',
            'motivoGenerales',
            'comentarioAtencion',
            'estadoCaso'
        ]) && $this->validateFile($request, ['evidencia1'])) {

            $list = $this->validateFileData($request, ['evidencia1', 'evidencia2']);
            $doc1 = "";
            $doc2 = "";

            foreach ($list as $key => $value) {
                switch ($value) {
                    case "evidencia1":
                        $doc1 = $this->guardarImagen($request, ['evidencia1']);
                        break;
                    case "evidencia2":
                        $doc2 = $this->guardarImagen($request, ['evidencia2']);
                        break;
                }
            }
            $tabla = "gestion_atencion_cliente";
            $datos = array(
                "id_asistente" => $request["dniAsistente"],
                "categoria" => $request["categoria"],
                "dniCliente" => $request["dniCliente"],
                "nombreCliente" => $request["nombreCliente"],
                "dniAlumno" => $request["dniAlumno"],
                "nombreAlumno" => $request["nombreAlumno"],
                "carreraCiclo" => $request["carreraCiclo"],
                "ciclo" => $request["ciclo"],
                "dniDocente" => $request["dniDocente"],
                "nombreDocente" => $request["nombreDocente"],
                "dniExterno" => $request["dniExterno"],
                "nombreExterno" => $request["nombreExterno"],
                "categoriaMotivo" => $request["categoriaMotivo"],
                "motivoGenerales" => $request["motivoGenerales"],
                "comentarioAtencion" => $request["comentarioAtencion"],
                "estadoCaso" => $request["estadoCaso"],
                "areaDerivada" => $request["areaDerivada"],
                "evidencia1" => $doc1,
                "evidencia2" => $doc2
            );
            $respuesta = ModeloAtenderCola::mdlIngresarAtenderCola($tabla, $datos);
            if ($respuesta == "ok") {
                echo "ok";
            } else {
                echo $respuesta;
            }
        } else {
            echo 'no se valido';
        }
    }

    public function editarCola($request, $file)
    {
        $list = $this->validateFileData($request, ['evidencia1', 'evidencia2']);
        $doc1 = $request['DBevidencia1'];
        $doc2 = $request['DBevidencia2'];

        foreach ($list as $key => $value) {
            switch ($value) {
                case "evidencia1":
                    $this->eliminarDoc($request, $doc1);
                    $doc1 = $this->guardarImagen($request, ['evidencia1']);
                    break;
                case "evidencia2":
                    $this->eliminarDoc($request, $doc2);
                    $doc2 = $this->guardarImagen($request, ['evidencia2']);
                    break;
            }
        }
        $tabla = "gestion_atencion_cliente";
        $datos = array(
            "id" => $request["id"],
            "id_asistente" => $request["dniAsistente"],
            "categoria" => $request["categoria"],
            "dniCliente" => $request["dniCliente"],
            "nombreCliente" => $request["nombreCliente"],
            "dniAlumno" => $request["dniAlumno"],
            "nombreAlumno" => $request["nombreAlumno"],
            "carreraCiclo" => $request["carreraCiclo"],
            "ciclo" => $request["ciclo"],
            "dniDocente" => $request["dniDocente"],
            "nombreDocente" => $request["nombreDocente"],
            "dniExterno" => $request["dniExterno"],
            "nombreExterno" => $request["nombreExterno"],
            "categoriaMotivo" => $request["categoriaMotivo"],
            "motivoGenerales" => $request["motivoGenerales"],
            "comentarioAtencion" => $request["comentarioAtencion"],
            "estadoCaso" => $request["estadoCaso"],
            "areaDerivada" => $request["areaDerivada"],
            "evidencia1" => $doc1,
            "evidencia2" => $doc2
        );
        $respuesta = ModeloAtenderCola::mdlActualizar($tabla, $datos);
        if ($respuesta == "ok") {
            echo "ok";
        } else {
            echo $respuesta;
        }
    }
    public function validate($resquest, $input)
    {
        $validation = true;
        foreach ($input as $key) {
            if (!isset($resquest[$key]) || empty($resquest[$key])) {
                $validation = false;
                break;
            }
        }
        return $validation;
    }
    public function validateFile($resquest, $fileds)
    {
        $validationDoc = true;
        foreach ($fileds as $key) {
            if (!isset($_FILES[$key]) || $_FILES[$key]['error'] !== 0) {
                $validationDoc = false;
                break;
            }
        }
        return $validationDoc;
    }
    private function guardarImagen($resquest, $fileds)
    {
        foreach ($fileds as $key) {
            $ruta = $_SERVER['DOCUMENT_ROOT'] . "/vistas/img/atendercola/";

            $extension = pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);

            $aleatorio = date('YmdHis') . uniqid();


            $nombre = $aleatorio . '.' . $extension;

            $nombreDb = "vistas/img/atendercola/" . $nombre;


            $ruta_carga = $ruta . $nombre;

            if (!file_exists($ruta)) {

                mkdir($ruta, 0777);
            }
            if (move_uploaded_file($_FILES[$key]['tmp_name'], $ruta_carga)) {
            }
            return $nombreDb;
        }
    }
    public static function eliminarDoc($requests, $fileds)
    {
        $rutaExterna = $_SERVER['DOCUMENT_ROOT'] . "/";
        $rutaCompleta = $rutaExterna . $fileds;
        if (file_exists($rutaCompleta)) {
            if (unlink($rutaCompleta)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
        return false;
    }
    public function validateFileData($resquest, $fileds)
    {
        $listNotEmpty = [];
        foreach ($fileds as $key) {
            if (isset($_FILES[$key]) && $_FILES[$key]['error'] === 0) {
                $listNotEmpty[] = $key;
            }
        }
        return $listNotEmpty;
    }
}
switch ($_POST['accion']) {
    case 'guardar':
        $controlador = new ControladorAtenderCola();
        $controlador->guardarCola($_POST, $_FILES);
        break;
    case 'load':
        require_once "../modelos/atendercola.modelo.php";
        $fechaini = $_POST['fechaInicio'];
        $fechafin = $_POST['fechaFinal'];
        $viewListBpm = new ModeloAtenderCola;
        $render_facturation = $viewListBpm->load($fechaini, $fechafin);
        $render_facturation = $render_facturation['data'];

?>
        <table class="table table-bordered table-sm" id="cuerpito_tabla">
            <thead>
                <tr>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">#</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">FECHA ATENCION</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">ID ASISTENTE</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">CATEGORIA</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">DNI CLIENTE</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">NOMBRE CLIENTE</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">DNI ALUMNO</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">NOMBRE ALUMNO</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">CARRERA CICLO</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">CICLO</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">DNI DOCENTE</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">NOMBRE DOCENTE</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">DNI EXTERNO</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">NOMBRE EXTERNO</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">CATEGORIA MOTIVO</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">MOTIVO GENERAL</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">COMENTARIO ATENCION</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">ESTADO CASO</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">AREA DERIVADA</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">EVIDENCIA 1</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">EVIDENCIA 2</th>
                    <th style="font-weight: 700;background: #5e5e5e !important;color: white">ACCIÓN</th>
                </tr>
            </thead>
            <tbody class="buscar">
                <?php
                $dinero_total = 0;
                for ($i = 0; $i < count($render_facturation); $i++) {
                    $id = $render_facturation[$i]["id"];
                ?>
                    <tr style="background: white" id="<?php echo $render_facturation[$i]["id"] . 'painttr'; ?>">
                        <td><?php echo $i + 1; ?></td>

                        <td><?php echo $render_facturation[$i]["fecha_atencion"]; ?></td>
                        <td><?php echo $render_facturation[$i]["id_asistente"]; ?></td>
                        <td><?php echo $render_facturation[$i]["categoria"]; ?></td>
                        <td><?php echo $render_facturation[$i]["dniCliente"]; ?></td>
                        <td><?php echo $render_facturation[$i]["nombreCliente"]; ?></td>
                        <td><?php echo $render_facturation[$i]["dniAlumno"]; ?></td>
                        <td><?php echo $render_facturation[$i]["nombreAlumno"]; ?></td>
                        <td><?php echo $render_facturation[$i]["carreraCiclo"]; ?></td>
                        <td><?php echo $render_facturation[$i]["ciclo"]; ?></td>
                        <td><?php echo $render_facturation[$i]["dniDocente"]; ?></td>
                        <td><?php echo $render_facturation[$i]["nombreDocente"]; ?></td>
                        <td><?php echo $render_facturation[$i]["dniExterno"]; ?></td>
                        <td><?php echo $render_facturation[$i]["nombreExterno"]; ?></td>
                        <td><?php echo $render_facturation[$i]["categoriaMotivo"]; ?></td>
                        <td><?php echo $render_facturation[$i]["motivoGenerales"]; ?></td>
                        <td><?php echo $render_facturation[$i]["comentarioAtencion"]; ?></td>
                        <td><?php echo $render_facturation[$i]["estadoCaso"]; ?></td>
                        <td><?php echo $render_facturation[$i]["areaDerivada"]; ?></td>
                        <td>
                            <?php
                            $evidencia1 = $render_facturation[$i]["evidencia1"];
                            if ($evidencia1) {
                                echo '<a href="' . $evidencia1 . '" target="_blank"><i class="fa fa-file"> Evidencia 1</i></a>';
                            } else {
                                echo '<i class="fa fa-file text-muted"> Evidencia 1</i>';
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $evidencia2 = $render_facturation[$i]["evidencia2"];
                            if ($evidencia2) {
                                echo '<a href="' . $evidencia2 . '" target="_blank"><i class="fa fa-file"> Evidencia 2</i></a>';
                            } else {
                                echo '<i class="fa fa-file text-muted"> Evidencia 2</i>';
                            }
                            ?>
                        </td>
                        <td>
                            <a style="margin-top: 4px !important" class="btn btn-info btn-xs btnEditar" data-id="<?php echo $id; ?>" data-toggle="modal">
                                <i class="fa fa-pencil"></i> Editar
                            </a>
                            <!-- <a style="margin-top: 4px !important" class="btn btn-danger btn-xs btnEliminar" data-id="<?php echo $id; ?>" data-toggle="modal" >
                                <i class="fa fa-trash"></i> Eliminar
                            </a> -->
                        </td>

                    </tr>
                <?php   } ?>
            </tbody>
        </table>
<?php
        break;
    case 'editar':
        $controlador = new ControladorAtenderCola();
        $controlador->editarCola($_POST, $_FILES);
        break;
}
