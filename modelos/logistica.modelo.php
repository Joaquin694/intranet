<?php
require_once "config.php";$actio=$_POST['accionar'];
switch ($actio) {
    /*--------------------------------------------------------------------------*/
    case "renderEdit": 
          $idcodigoProducto= $_POST['idcodigoProducto'];
          $query = "SELECT COUNT(*)  FROM `entrada_productos` WHERE (fk_producto='$idcodigoProducto')";
          $result = $conexion->query($query);
          # code...
          $rowt=mysqli_fetch_row($result);                        
          $newoEdit=$rowt[0];
          /*---------------------------------*/
          if ($newoEdit>0) {
                # code...
                $queryDm = "SELECT *  FROM `entrada_productos` WHERE (fk_producto='$idcodigoProducto')";
                $resultm = $conexion->query($queryDm);
                $rowtm=mysqli_fetch_row($resultm);                        
               
                $id=$rowtm[0];
                $fk_producto=$rowtm[1];
                $fk_proveedor=$rowtm[2];
                $fk_almacen=$rowtm[3];
                $nombre_lote=$rowtm[4];
                $fecha_vencimiento=$rowtm[5];
                $tipo_pago=$rowtm[6];
                $tipo_comprobante=$rowtm[7];
                $numero_comprobante=$rowtm[8];

                echo "<script>
                      document.getElementById('stprodProveedor').value = '{$fk_proveedor}';
                      document.getElementById('stAlmacen').value = '{$fk_almacen}';
                      document.getElementById('stLote').value = '{$nombre_lote}';
                      document.getElementById('stFechaVence').value = '{$fecha_vencimiento}';
                      document.getElementById('stTipoPago').value = '{$tipo_pago}';
                      document.getElementById('stTipoComprobante').value = '{$tipo_comprobante}';
                      document.getElementById('stNumComprobant').value = '{$numero_comprobante}';
                      $('.input-group').css('border-color', '#fff');
                      document.getElementById('ingalmIdProd').value = '{$idcodigoProducto}';
                      document.getElementById('ingalmAccion').value = 'Editando';
                </script>";               
          }else{
            echo "<script>
                      document.getElementById('ingalmIdProd').value = '{$idcodigoProducto}';
                      document.getElementById('ingalmAccion').value = 'Nuevo Ingreso';
                </script>";
          }
          

    break;
    /*--------------------------------------------------------------------------*/
    case "Editando":
          $idProdAingresr= $_POST['a1'];
          $a2= $_POST['a2'];
          $a3= $_POST['a3'];
          $a4= $_POST['a4'];
          $a5= $_POST['a5'];
          $a6= $_POST['a6'];
          $a7= $_POST['a7'];
          $a8= $_POST['a8'];

          mysqli_query($conexion,"UPDATE `entrada_productos` SET 
           `fk_proveedor` = '$a2',
           `fk_almacen` = '$a3',
           `nombre_lote` = '$a4',
           `fecha_vencimiento` = '$a5',
           `tipo_pago` = '$a6',
           `tipo_comprobante` = '$a7',
           `numero_comprobante` = '$a8' 
           WHERE `entrada_productos`.`fk_producto` = '$idProdAingresr';");

        echo "Editando";
    break;
    /*--------------------------------------------------------------------------*/
    case "Nuevo Ingreso":
          $idProdAingresr= $_POST['a1'];
          $a2= $_POST['a2'];
          $a3= $_POST['a3'];
          $a4= $_POST['a4'];
          $a5= $_POST['a5'];
          $a6= $_POST['a6'];
          $a7= $_POST['a7'];
          $a8= $_POST['a8'];

          mysqli_query($conexion,"INSERT INTO `entrada_productos` (`id`, `fk_producto`, `fk_proveedor`, `fk_almacen`, `nombre_lote`, `fecha_vencimiento`, `tipo_pago`, `tipo_comprobante`, `numero_comprobante`) VALUES (NULL, '$idProdAingresr',
           '$a2', '$a3', '$a4', '$a5', '$a6', '$a7', '$a8');");

        echo "<script>
                      $('.input-group').css('border-color', '#fff');
                      document.getElementById('ingalmAccion').value = 'Editando';
                </script>";
    break;
    /*--------------------------------------------------------------------------*/
    default:
        echo "4";
}
?>




