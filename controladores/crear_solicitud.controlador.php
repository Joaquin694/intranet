<?php
require_once "../modelos/crear_solicitud.modelo.php";
switch ($_POST['accion']) {
    case 'productos':
        $data  = CrearSolicitud::producto();
        break;

    case 'almacenes':
        $data  = CrearSolicitud::almacenes();
        break;

    default:
        echo "Debes actualizar tu página";
        break;
}
