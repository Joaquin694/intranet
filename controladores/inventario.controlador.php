<?php
switch ($_POST['accion']) {
    case 'reportExistenciasDeAlmacen':
        require_once "../modelos/inventario.modelo.php";
        $list = ModeloLogistica::rportExistenciasAlmacen();

        $file = fopen("fileDowload/ExistenciasMoali.csv", "w");
        fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF));
        // CABECERA
        fputcsv($file, array('', 'idproducto', 'codigo', 'descripcion', 'stock', 'precio_compra', 'precio_venta', 'fecha_ingreso', 'idDm', 'nombre_producto', 'descripccion', 'fecha_registro_dm', 'bar_code'));
        // BODY
        foreach ($list as $line) {
            fputcsv($file, $line);
        }
        fclose($file);
        echo '<script type="text/javascript">window.open("'.URLMAIN.'/controladores/fileDowload/ExistenciasMoali.csv","_blank");</script>';

        break;

    default:
        # code...
        echo "Debes actualizar tu página";
        break;
}
