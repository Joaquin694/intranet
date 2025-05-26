<?php
require_once "../modelos/cobro_venta.modelo.php";
switch ($_POST['cod']) {
    case 'save_cobro_venta':
        $id_venta = $_POST['id_venta'] ? $_POST['id_venta'] : null;
        $nuevoMetodoPago = $_POST['nuevoMetodoPago']  ? $_POST['nuevoMetodoPago'] : null;
        $monto = $_POST['monto'] ? $_POST['monto'] : null;
        $fecha = $_POST['fecha'] ? $_POST['fecha'] : null;
        $documento = $_POST['documento'] ? $_POST['documento'] : null;
        $nombre = $_POST['nombre'] ? $_POST['nombre'] : null;
        $descripcion = $_POST['descripcion'] ? $_POST['descripcion'] : null;
        $codigo_trans = $_POST['codigo_trans'] ? $_POST['codigo_trans'] : null;

        $idusrcobro    = $_SESSION["id"]     ? $_SESSION["id"] : null;
        $nombrusarcobro= $_SESSION["nombre"] ? $_SESSION["nombre"] : null;


        CobroVenta::saveCobroVenta($id_venta, $nuevoMetodoPago, $monto, $fecha, $documento, $nombre, $descripcion, $codigo_trans,$idusrcobro,$nombrusarcobro);
        break;                    

    case 'show_cobro_venta':
            $data = json_decode(CobroVenta::showCobroVenta($_POST['id_venta']), true);
            exit(json_encode(['success' => true, 'data' => $data]));
    break;

    case 'list_cobro_venta':
            CobroVenta::listCobroVenta($_POST['id_venta']);
        break;

	default:
		echo "Debes actualizar tu página";
		break;
}
