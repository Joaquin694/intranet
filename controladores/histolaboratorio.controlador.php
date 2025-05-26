<?php
date_default_timezone_set('America/Lima');
session_start();
if (isset($_SESSION["recaptcha_secretkey"])) {
    # code...
    include '../modelos/histolaboratorio.modelo.php';
    switch ($_POST['cod']) {
        case 'load_hist_labo':
            $data_anal     = new ModeloAnalLaboratorio;
            $data_anal_arr = json_decode($data_anal->viewLoadAnalLaboratorio($_POST['any']), true);
            $numeric       = 0;

            for ($i = 0; $i < count($data_anal_arr); $i++) {
                $numeric = $numeric + 1;

                $idLaboratorio = $data_anal_arr[$i]["id"];
                if ($data_anal_arr[$i]["letra_tipo_codelabo"] == "MP-") {
                    # code...
                    $origin_anal = 'BPM';
                } else {
                    $origin_anal = 'DIRECTA';
                }

                if ($data_anal_arr[$i]["tipoanal"] === 'sianal') {
                    # code...
                    $tipo_anal_ = '<br><a target="_blank" class="botontito" href="#">Sin Análisis</a>';
                } elseif ($data_anal_arr[$i]["tipoanal"] === 'anasenso') {
                    # code...
                    $tipo_anal_ = '<br><a target="_blank" class="botontito" href="controladores/pdf.controlador.php?deque=view_laboratoriosensorial&pkLabo=' . base64_encode($idLaboratorio) . '">Sensorial</a>';
                } elseif ($data_anal_arr[$i]["tipoanal"] === 'anafisi') {
                    # code...
                    $tipo_anal_ = '<br><a target="_blank" class="botontito" href="controladores/pdf.controlador.php?deque=view_laboratoriofisico&pkLabo=' . base64_encode($idLaboratorio) . '">Físico</a>';
                } elseif ($data_anal_arr[$i]["tipoanal"] === 'anasensoyfisi') {
                    # code...
                    $tipo_anal_ = '<br><a target="_blank" class="botontito" href="controladores/pdf.controlador.php?deque=view_laboratoriosensorial&pkLabo=' . base64_encode($idLaboratorio) . '">Sensorial</a> <a target="_blank" class="botontito" href="controladores/pdf.controlador.php?deque=view_laboratoriofisico&pkLabo=' . base64_encode($idLaboratorio) . '">Físico</a>';
                }

                ?>
            <tr>
                <td>
                    <div class="dropdown">
                      <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                          <span class="caret"></span></button>
                          <ul class="dropdown-menu">
                            <li><a href="controladores/pdf.controlador.php?deque=view_laboratorio&pkLabo=<?php echo base64_encode($idLaboratorio); ?>" target="_blank" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</a></li>
                            <li><a href="#" style="width: 160px">
                                <form action="laboratoriaupdate" method="POST" style="margin-bottom: 0px !important">
                                  <div  style="width: 300px;display: flex;">
                                    <input value='<?php echo $data_anal_arr[$i]["letra_tipo_codelabo"] . $data_anal_arr[$i]["idcodrbpm1"]; ?>' required name="codigo_mp_o_ml" class="form-control input-lg" id="inputlg" type="text" style="width: 88%;font-size: 22px !important;display: none;">
                                    <input value='<?php echo $data_anal_arr[$i]["correlativo"]; ?>' required name="codigo_bpm_gs" class="form-control input-lg" id="inputlg" type="text" style="width: 88%;font-size: 22px !important;display: none;">
                                    <button type="submit" style="width: 12%;display: inline-flex; background: none;background: none;
                                    border: 0;
                                    color: inherit;
                                    /* cursor: default; */
                                    font: inherit;
                                    line-height: normal;
                                    overflow: visible;
                                    padding: 0;
                                    -webkit-user-select: none; /* for button */
                                    -webkit-appearance: button; /* for input */
                                    -moz-user-select: none;
                                    -ms-user-select: none; "><i class="fa fa-folder-open-o" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Abrir
                                </button>
                            </div>
                        </form> </a>
                    </li>
                </ul>
            </div>
        </td>
        <td><span style="background: #5e5e5e !important;padding: 4px 6px ; color: white; border-radius:  0px 10px 10px 0px"><?php echo $data_anal_arr[$i]["letra_tipo_codelabo"] . $data_anal_arr[$i]["idcodrbpm1"]; ?></span></td>
        <td><?php echo $data_anal_arr[$i]["estado"]; ?></td>
        <td><?php echo $data_anal_arr[$i]["correlativo"]; ?></td>
        <td><span style="background: #ecf0f5 !important;padding: 4px 6px ; "><?php echo $origin_anal; ?></span></td>
        <td><span style="font-weight: 900"><?php echo $data_anal_arr[$i]["cafe"] . "</span>" . $tipo_anal_; ?> </td>
        <td style="font-weight: 700"><?php echo $data_anal_arr[$i]["fecha"]; ?></td>
        <td style="text-decoration-line: underline;font-size: 14px"><?php echo $data_anal_arr[$i]["idfechaentrega"]; ?></td>
        <td style="color: red"><?php echo $data_anal_arr[$i]["fechaentrega"]; ?></td>
        <td><?php echo $data_anal_arr[$i]["doc_identidad"]; ?></td>
        <td><?php echo $data_anal_arr[$i]["nombrecliente"]; ?></td>
    </tr>
<?php }?>
<script type="text/javascript">
    $("#"+"<?php echo $_POST['any']; ?>").text("<?php echo $numeric; ?>");
</script>
<?php

            break;
        // -------------------------------------------
        default:
            # code...
            echo "Warning 404";
            break;
    }
} else {
    echo '<script type="text/javascript">location.reload();</script>';
}
