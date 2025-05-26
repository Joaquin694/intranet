<?php
date_default_timezone_set('America/Lima');
session_start();

include '../modelos/compras.modelo.php';
switch ($_POST['accion']) {
  case 'registrocompra':
    header("Content-Type: application/json");
    $viewListBpm = new ModeloCompras;
    $list = validateFileData($_FILES, ["file1", "file2", "file3"]);
    $doc1 = "";
    $doc2 = "";
    $doc3 = "";

    foreach ($list as $key => $value) {
      switch ($value) {
        case 'file1':
          $doc1 = guardarDoc($_FILES, ['file1']);
          break;
        case 'file2':
          $doc2 = guardarDoc($_FILES, ['file2']);
          break;
        case 'file3':
          $doc3 = guardarDoc($_FILES, ['file3']);
          break;
      }
    }
    $datBPMi = $viewListBpm->insert_compras($_POST, $doc1, $doc2, $doc3);
    echo json_encode($datBPMi, true);
    break;
    // -------------------------------------------
  case 'bproveedor':
    header("Content-Type: application/json");
    $term = $_POST['term'];
    $viewListBpm = new ModeloCompras;
    $datBPMi = $viewListBpm->buscar_proveedor($term);
    echo json_encode($datBPMi, true);
    break;
  case 'load_deuda_compra':
    header("Content-Type: application/json");
    $id_compra = $_POST['id_compra'];
    $viewListBpm = new ModeloCompras;
    $datBPMi = $viewListBpm->load_deuda_compra($id_compra);
    echo json_encode($datBPMi, true);
    break;
  case 'load_detalle_compra':
    header("Content-Type: application/json");
    $id_compra = $_POST['id_compra'];
    $viewListBpm = new ModeloCompras;
    $datBPMi = $viewListBpm->load_detalle_compra($id_compra);
    echo json_encode($datBPMi, true);
    break;
  case 'add_pago_compra':
    header("Content-Type: application/json");
    $viewListBpm = new ModeloCompras;
    $list = validateFileData($_FILES, ["doc"]);
    $doc1 = "";
    foreach ($list as $key => $value) {
      switch ($value) {
        case 'doc':
          $doc1 = guardarDoc($_FILES, ['doc']);
          break;
      }
    }
    $datBPMi = $viewListBpm->insert_pago($_POST, $doc1);
    echo json_encode($datBPMi, true);
    // echo json_encode($_FILES['doc']);

    break;
  case 'loadcompras':
    $fechaini = $_POST['fechaInicio'];
    $fechafin = $_POST['fechaFinal'];
    $viewListBpm = new ModeloCompras;
    $render_facturation = $viewListBpm->load_compras($fechaini, $fechafin);
    $render_facturation = $render_facturation['data'];
?>
    <table class="table table-bordered table-sm" id="cuerpito_tabla">
      <thead>
        <tr>
          <th style="font-weight: 700;background: #5e5e5e !important;color: white">#</th>
          <th style="font-weight: 700;background: #5e5e5e !important;color: white">DET</th>
          <th style="font-weight: 700;background: #5e5e5e !important;color: white">FECHA DE TRANSACCION</th>
          <th style="font-weight: 700;background: #5e5e5e !important;color: white">SERIE COMPROBANTE</th>
          <th style="font-weight: 700;background: #5e5e5e !important;color: white">CORRELATIVO</th>
          <th style="font-weight: 700;background: #5e5e5e !important;color: white">IMPORTE TRANSACCION</th>
          <th style="font-weight: 700;background: #5e5e5e !important;color: white">CLIENTE</th>
          <th style="font-weight: 700;background: #5e5e5e !important;color: white">DOCUMENTO CLIENTE</th>
          <th style="font-weight: 700;background: #5e5e5e !important;color: white">FECHA ATENCION Y HORA DE ATENCION</th>
          <th style="font-weight: 700;background: #5e5e5e !important;color: white">DEUDA</th>
          <th style="font-weight: 700;background: #5e5e5e !important;color: white">ACCION</th>
        </tr>
      </thead>
      <tbody class="buscar">
        <?php
        $dinero_total = 0;
        for ($i = 0; $i < count($render_facturation); $i++) {
          /*$dinero_total = $dinero_total + $render_facturation[$i]["total"];
    $id           = $render_facturation[$i]["id"];*/
          $total_deuda = number_format(doubleval($render_facturation[$i]["total_deuda"]), 3);
        ?>
          <tr style="background: white" id="<?php echo $id . 'painttr'; ?>">
            <td><i class="fa fa-search btnviewdetalle" data-id="<?php echo $render_facturation[$i]["id_compra"]; ?>" style="font-size:21px"></i></td>
            <td><?php echo $i + 1; ?></td>
            <td><?php echo $render_facturation[$i]["fecha_contabilizacion_compra"]; ?></td>
            <td><?php echo $render_facturation[$i]["serie_compra"]; ?></td>
            <td><?php echo $render_facturation[$i]["numero_compra"]; ?></td>
            <td><?php echo $render_facturation[$i]["total_compra"]; ?></td>
            <td><?php echo $render_facturation[$i]["razon_social"]; ?></td>
            <td><?php echo $render_facturation[$i]["ruc"]; ?></td>
            <td><?php echo date("d/m/y H:i A", strtotime($render_facturation[$i]["fecha_registro"])) ?></td>
            <td><?php echo $total_deuda > 0 ? "<span class='badge' style='background:#f00'>$total_deuda</span>" : $total_deuda ?></td>
            <td><i class="fa fa-money pagarmod btnviewpago" data-id="<?php echo $render_facturation[$i]["id_compra"]; ?>" style="font-size:21px" data-toggle="modal" data-target="#modalEditarUsuario"></i></td>
          </tr>
        <?php
        }
        ?>

      </tbody>
    </table>
<?php
    break;
    /*add leyner case pagos_efectuados*/
  case 'pagos_efectuados':
    # code...

    $fechaini = $_POST['fechaInicio'];
    $fechafin = $_POST['fechaFinal'];
    require_once "../modelos/pago_compras.modelo.php";
    $getData = new CobroVenta();
    echo $getData->getPagosEfectuados($fechaini, $fechafin);

    break;

  case 'tipo_de_cambio_sbs':
    $fecha_cosnulta_contabiulization = 0;
    require_once "../modelos/pago_compras.modelo.php";
    $getData = new CobroVenta();
    echo $getData->getPagosEfectuados($fechaini, $fechafin);


    break;


  case 'tipo_de_cambio_dolares':
    $fecha_contabilizacion_compra = $_POST['fecha_contabilizacion_compra'];
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.apis.net.pe/v2/sbs/tipo-cambio?date=' . $fecha_contabilizacion_compra,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer apis-token-8225.271OeJQ39f9LNNH60xhhSSEstOy6iwTk'
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    // echo $response;
    // Decodifica el JSON en un objeto PHP
    $responseData = json_decode($response, true);

    // Accede al valor "precioVenta"
    $precioVenta = $responseData['precioVenta'];

    // Imprime el valor "precioVenta"
    echo $precioVenta;
    break;

    // -------------------------------------------
  default:
    # code...
    echo "FOUNDsssssssssssssssssssssssssssssssssssssssssssss";
    break;
}

function validateFileData($resquest, $fileds)
{
  $listNotEmpty = [];
  foreach ($fileds as $key) {
    if (isset($_FILES[$key]) && $_FILES[$key]['error'] === 0) {
      $listNotEmpty[] = $key;
    }
  }
  return $listNotEmpty;
}
function guardarDoc($resquest, $fileds)
{
  foreach ($fileds as $key) {

    $rutaDoc = $_SERVER['DOCUMENT_ROOT'] . "/vistas/img/compras/";

    $extensionDoc = pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);

    $aleatorioDoc = date('YmdHis');

    $nombreDoc = $aleatorioDoc . '.' . $extensionDoc;

    $nombreDocDb = "vistas/img/compras/" . $nombreDoc;

    $ruta_cargaDoc = $rutaDoc . $nombreDoc;

    if (!file_exists($rutaDoc)) {

      mkdir($rutaDoc, 0777);
    }
    if (move_uploaded_file($_FILES[$key]['tmp_name'], $ruta_cargaDoc)) {
    }

    return $nombreDocDb;
  }
}
