<?php

require_once "../modelos/config.php";

$accion = $_POST['accionar'];

/* ----------------------------------------------------------------- */
function procesarNuevoProducto($bar_code, $fk_dm_productos, $nuevaDescripcion, $nuevaCategoria, $nuevoStock, $nuevoPrecioCompra, $nuevoPrecioVenta, $nuevaalmacenes, $nuevoLote, $nuevaFechaVencimiento, $serieComprobante, $correlativoComprobante, $numDocIdentidadProveedor, $tipo_moneda_compra, $tipo_moneda_venta, $tipo_cambio) {

    global $conexion;

    // Determinar la tabla según el almacén
    $nombreTablap = ($nuevaalmacenes == 1) ? "productos" : "productos_ingresos";
    $slct_pk_products = 0;
    $slct_stockquetenia = 0;
    $query = "SELECT * FROM {$nombreTablap} WHERE codigo='$bar_code' and fk_dm_productos='$fk_dm_productos' and fk_almacen='$nuevaalmacenes' ORDER BY stock DESC LIMIT 1";
    $result = $conexion->query($query);
    $rowt = mysqli_fetch_row($result);
    $slct_pk_products = $slct_pk_products + $rowt[0];
    $slct_stockquetenia = $nuevoStock + $rowt[5];

    $sessionidusuario = $_SESSION["nombre"] . ' (' . $_SESSION["usuario"] . ')';

    mysqli_query($conexion, "INSERT INTO `kardex`
         (`id`, `id_categoria`, `codigo`, `descripcion`, `imagen`, `stock`, `precio_compra`, `precio_venta`, `tipo_moneda_compra`, `tipo_moneda_venta`, `tipo_cambio`, `fecha_kardex`, `action_movimiento`, `usuario_que_registra`, `fk_dm_productos`, `fk_almacen`, `lote`, `serie_comprobante_compra`, `correlativo_comprobante_compra`, `num_documento_identidad`, `fecha_vencimiento`)
    VALUES (NULL, '$nuevaCategoria', '$bar_code', '$nuevaDescripcion', 'vistas/img/productos/default/anonymous.png', '$nuevoStock', '$nuevoPrecioCompra', '$nuevoPrecioVenta', '$tipo_moneda_compra', '$tipo_moneda_venta', '$tipo_cambio', CURRENT_TIMESTAMP, 'INGRESO ALMACEN', '$sessionidusuario', '$fk_dm_productos', '$nuevaalmacenes', '$nuevoLote', '$serieComprobante', '$correlativoComprobante', '$numDocIdentidadProveedor', '$nuevaFechaVencimiento')");

    if ($slct_pk_products > 0) {
        mysqli_query($conexion, "UPDATE {$nombreTablap} SET id_categoria='$nuevaCategoria', precio_compra='$nuevoPrecioCompra', stock='$slct_stockquetenia', precio_venta='$nuevoPrecioVenta', fecha= CURRENT_TIMESTAMP, lote='$nuevoLote' WHERE id='$slct_pk_products'");

        echo '<div class="toastAbad">
                Genial!. Ahora tienes un stock de ' . $slct_stockquetenia . '
                <span style="color: green"><i class="fa fa-angle-double-left" aria-hidden="true"></i> </span> ' . $nuevaDescripcion . '
              </div>
              <script type="text/javascript">
                  $("#btnSave").removeClass("d-none");
              </script>';
    } else {
        mysqli_query($conexion, "INSERT INTO {$nombreTablap}
            (`id`, `id_categoria`, `codigo`, `descripcion`, `imagen`, `stock`, `precio_compra`, `precio_venta`, `ventas`, `fecha`, `fk_dm_productos`, `fk_almacen`, `lote`)
            VALUES (NULL, '$nuevaCategoria', '$bar_code', '$nuevaDescripcion', 'vistas/img/productos/default/anonymous.png', '$nuevoStock', '$nuevoPrecioCompra', '$nuevoPrecioVenta', '0', CURRENT_TIMESTAMP, '$fk_dm_productos', '$nuevaalmacenes', '$nuevoLote')");

        echo '<div class="toastAbad">
                Registro con éxito
                <span style="color: green"><i class="fa fa-angle-double-left" aria-hidden="true"></i> </span> ' . $nuevaDescripcion . '
              </div>
              <script type="text/javascript">
                  $("#btnSave").removeClass("d-none");
              </script>';
    }
}

if ($accion === 'deletear') {
    $idEditael = $_POST['idEdita'];
    mysqli_query($conexion, "DELETE FROM datos_maestros_productos WHERE id='$idEditael'");
    echo '<script>
            swal({
                type: "success",
                title: "El producto ha sido eliminado correctamente",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
            }).then((result) => {
                if (result.value) {
                    window.location = "datos-maestros-de-productos";
                }
            })
          </script>';
} elseif ($accion === 'sellecionar') {
    $idEdita = $_POST['idEdita'];
    echo ' <!-- ENTRADA PARA EL NOMBRE producto -->
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-list-alt"></i></span>
                    <input type="text" class="form-control input-lg" name="f1t1" id="f1t1">
                </div>
            </div>

            <!-- ENTRADA PARA la descripcion -->
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-bars"></i></span>
                    <select class="form-control input-lg" name="f2t2" id="f2t2">
                        <option value="INSUMO PARA MANTENIMIENTO">INSUMO PARA MANTENIMIENTO</option>
                        <option value="ÚTILES DE OFICINA">ÚTILES DE OFICINA</option>
                        <option value="LENCERÍA">LENCERÍA</option>
                        <option value="REPUESTOS">REPUESTOS</option>
                        <option value="ACTIVOS FIJOS">ACTIVOS FIJOS</option>
                        <option value="REFRIGERIOS">REFRIGERIOS</option>
                        <option value="ÚTILES DE ASEO">ÚTILES DE ASEO</option>
                        <option value="HILOS">HILOS</option>
                        <option value="CINTAS REFLECTIVAS">CINTAS REFLECTIVAS</option>
                    </select>
                </div>
            </div>

            <div class="form-group" style="display: none">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-bars"></i></span>
                    <input type="text" class="form-control input-lg" name="f3t3" id="f3t3">
                </div>
            </div>';

    $query = "SELECT * FROM datos_maestros_productos WHERE (id='$idEdita')";
    $result = $conexion->query($query);
    $rowt = mysqli_fetch_row($result);
    $pk_producto_dm = $rowt[0];
    $name_product = $rowt[1];
    $description = $rowt[2];

    echo '<script>
            document.frmAdmdp.f1t1.value ="' . $name_product . '";
            document.frmAdmdp.f2t2.value ="' . $description . '";
            document.frmAdmdp.f3t3.value ="' . $pk_producto_dm . '";
          </script>';
} elseif ($accion === 'editar') {
    $pk_producto_dm = $_POST['pk_producto_dm'];
    $nombre_producto_dm = $_POST['nombre_producto_dm'];
    $descripccion_dm = $_POST['descripccion_dm'];

    mysqli_query($conexion, "UPDATE datos_maestros_productos SET
               nombre_producto='$nombre_producto_dm',
               descripccion='$descripccion_dm',
               fecha= CURRENT_TIMESTAMP
               WHERE (id='$pk_producto_dm') ");

    echo '<div class="alert alert-success" role="alert">
          <strong> Datos maestros de productos </strong><mark>' . $nombre_producto_dm . '</mark> editado correctamente!
          </div>';
} elseif ($accion === 'guardar') {
    $nombre_producto_dm = $_POST['nombre_producto_dm'];
    $descripccion_dm = $_POST['descripccion_dm'];

    mysqli_query($conexion, "INSERT INTO `datos_maestros_productos`
      (`id`, `nombre_producto`, `descripccion`) VALUES
       (NULL, '$nombre_producto_dm', '$descripccion_dm')");

    echo '<div class="alert alert-success" role="alert">
          <strong> Datos maestros de productos </strong><mark style="border-radius: 20px">' . $nombre_producto_dm . '</mark> registrado correctamente!
          </div>';
} elseif ($accion === 'nuevoCodigo') {
    $bar_code = $_POST['bar_code'];

    $cnDm = "SELECT * FROM `datos_maestros_productos` WHERE `bar_code`='$bar_code'";
    $rcnDm = $conexion->query($cnDm);
    $rowt = mysqli_fetch_row($rcnDm);
    $name_product = $rowt[1];
    $capacidad = $rowt[2];
    $fk_dm_productos = $rowt[0];

    echo "<script>
        document.getElementById('nuevaDescripcion').value = '{$name_product}';
        document.getElementById('nombProduct').value = '{$capacidad}';
        document.getElementById('fk_dm_productos').value = '{$fk_dm_productos}';
      </script>";
}

// --------------------------------------------------------------------------------------------------------------
elseif ($accion === 'formNewPromasivo') {
    $logFile = 'pititoos.txt';

    function logToFile($logFile, $logMessage) {
        file_put_contents($logFile, $logMessage . PHP_EOL, FILE_APPEND);
    }

    $formData = json_decode($_POST['data'], true);
    if (empty($formData) || !is_array($formData)) {
        logToFile($logFile, "Error: Datos de formulario inválidos.");
        echo json_encode(['status' => 'error', 'message' => 'Datos de formulario inválidos.']);
        exit();
    }

    foreach ($formData as $row) {
        $bar_code = isset($row['codigo']) ? $row['codigo'] : '';
        $fk_dm_productos = preg_replace('/^SOGDA\s+|\d{2}$/', '', trim($row['codigo']));
        $nuevaDescripcion = isset($row['producto']) ? $row['producto'] : '';
            $nuevaCategoria =     $row['categoria'];
        $nuevoStock = isset($row['stock']) ? $row['stock'] : '';
        $nuevoPrecioCompra = isset($row['precioCompra']) ? $row['precioCompra'] : '';
        $nuevoPrecioVenta = isset($row['precioVentaSinIGV']) ? $row['precioVentaSinIGV'] : '';        
        $nuevaalmacenes = mysqli_fetch_assoc(mysqli_query($conexion, "SELECT id FROM `almacenes` WHERE TRIM(almacen) = TRIM('{$row['almacen']}')"))['id'];//$nuevaalmacenes = isset($row['almacen']) ? $row['almacen'] : '';
        $nuevoLote = isset($row['lote']) ? $row['lote'] : '';
        $nuevaFechaVencimiento = date('Y-m-d H:i:s'); // No hay variable correspondiente en el JSON
        $serieComprobante = isset($row['serieComprobante']) ? $row['serieComprobante'] : '';
        $correlativoComprobante = isset($row['correlativoComprobante']) ? $row['correlativoComprobante'] : '';
        $numDocIdentidadProveedor = isset($row['numDocIdentidadProveedor']) ? $row['numDocIdentidadProveedor'] : '';

        procesarNuevoProducto($bar_code, $fk_dm_productos, $nuevaDescripcion, $nuevaCategoria, $nuevoStock, $nuevoPrecioCompra, $nuevoPrecioVenta, $nuevaalmacenes, $nuevoLote, $nuevaFechaVencimiento, $serieComprobante, $correlativoComprobante, $numDocIdentidadProveedor);

        foreach ($row as $key => $value) {
            $logMessage = "$key = \"$value\";";
            logToFile($logFile, $logMessage);
        }
        logToFile($logFile, "------------------------------------");
    }
    echo json_encode(['status' => 'success', 'message' => 'Datos registrados en el archivo pitito.txt']);
}
// --------------------------------------------------------------------------------------------------------------

elseif ($accion === 'formNewPro') {
  $bar_code = $_POST['bar_code'];
  $fk_dm_productos = $_POST['fk_dm_productos'];
  $nuevaDescripcion = $_POST['nuevaDescripcion'];
  $nuevaCategoria = $_POST['nuevaCategoria'];
  $nuevoStock = $_POST['nuevoStock'];
  $nuevoPrecioCompra = $_POST['nuevoPrecioCompra'];
  $nuevoPrecioVenta = $_POST['nuevoPrecioVenta'];
  $nuevaalmacenes = $_POST['nuevaalmacenes'];
  $nuevoLote = $_POST['nuevoLote'];
  $nuevaFechaVencimiento = $_POST['nuevaFechaVencimiento'];
  $serieComprobante = $_POST['serieComprobante'];
  $correlativoComprobante = $_POST['correlativoComprobante'];
  $numDocIdentidadProveedor = $_POST['numDocIdentidadProveedor'];
  $tipo_moneda_compra = $_POST['tipo_moneda_compra'];
  $tipo_moneda_venta = $_POST['tipo_moneda_venta'];
  $tipo_cambio = $_POST['tipo_cambio'];

  procesarNuevoProducto($bar_code, $fk_dm_productos, $nuevaDescripcion, $nuevaCategoria, $nuevoStock, $nuevoPrecioCompra, $nuevoPrecioVenta, $nuevaalmacenes, $nuevoLote, $nuevaFechaVencimiento, $serieComprobante, $correlativoComprobante, $numDocIdentidadProveedor, $tipo_moneda_compra, $tipo_moneda_venta, $tipo_cambio);
}
elseif ($accion === 'salidatMovimiento') {
    // Habilitar la visualización de errores
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Obtener variables del POST
    $accion = $_POST['accionar'];
    $bar_code = $_POST['nuevoCodigo'];       // Código del producto desde AJAX
    $almacen_id = $_POST['nuevaalmacenes'];  // ID del almacén desde AJAX
    $nuevoStock = $_POST['nuevoStock'];      // Cantidad que se desea retirar

    // Consulta para obtener el último ingreso del producto en el almacén
    $query = "SELECT * FROM `kardex` 
              WHERE codigo = '$bar_code' 
              AND fk_almacen = '$almacen_id' 
              AND action_movimiento = 'INGRESO ALMACEN' 
              ORDER BY id DESC LIMIT 1";

    $result = $conexion->query($query);

    if ($result && $result->num_rows > 0) {
        $data = $result->fetch_assoc();  // Obtener los datos como un array asociativo

        // Ejecutar la segunda consulta para obtener el total del stock
        $query2 = "SELECT SUM(stock) AS totali FROM `kardex` 
                   WHERE codigo = '$bar_code' 
                   AND fk_almacen = '$almacen_id'";

        $result2 = $conexion->query($query2);

        if ($result2 && $result2->num_rows > 0) {
            $data2 = $result2->fetch_assoc();
            $totali = $data2['totali'];
        } else {
            $totali = 0; // Si no hay resultados, el total es 0
        }

        // Comparar 'nuevoStock' con 'totali'
        if ( abs($nuevoStock) > $totali) {
            // Enviar mensaje de error indicando que no hay suficiente stock
            echo json_encode([
                'status' => 'error',
                'message' => 'No se cuenta con el stock necesario para retirar.',
                'current_stock' => $totali
            ]);
        } else {
            // Añadir 'totali' a los datos que se van a enviar
            $data['totali'] = $totali;

            // Aquí puedes continuar con el proceso normal si hay suficiente stock
            echo json_encode(['status' => 'success', 'data' => $data]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No se encontraron registros.']);
    }
    exit();
}


?>

<script type="text/javascript">$(document).ready(function(){view_toast(".toastAbad");});</script>