<?php
date_default_timezone_set('America/Lima');
session_start();

include '../modelos/marcaciones.modelo.php';

switch ($_POST['accion']) {
    case 'registrarmarcacion':
        header("Content-Type: application/json");
        
        $data = [
            'nombre' => $_POST['nombre'],
            'perfil' => $_POST['perfil'],
            'fecha' => $_POST['fecha'],
            'hora' => $_POST['hora'],
            'marcacion' => $_POST['marcacion'],
            'latitud' => isset($_POST['latitud']) ? $_POST['latitud'] : null,  // Añadiendo latitud
            'longitud' => isset($_POST['longitud']) ? $_POST['longitud'] : null // Añadiendo longitud
        ];

        $marcaciones = new ModeloMarcaciones;
        $resultado = $marcaciones->insertarMarcacion($data);
        echo json_encode($resultado, true);
    break;

    case 'obtenermarcaciones':
        header("Content-Type: application/json");
        $fechaInicio = $_POST['fechaInicio'];
        $fechaFinal = $_POST['fechaFinal'];
        $idUsuario = $_SESSION['id']; // Obtener el ID de usuario de la sesión
        $marcaciones = new ModeloMarcaciones;
        $resultado = $marcaciones->obtenerMarcaciones($fechaInicio, $fechaFinal, $idUsuario); // Pasar el ID de usuario al modelo
        echo json_encode($resultado, true);
        break;
    
    
    case 'obtenerUltimaMarcacion':
        header("Content-Type: application/json");
        $idUsuario = $_SESSION["id"];
        $marcaciones = new ModeloMarcaciones;
        $resultado = $marcaciones->obtenerUltimaMarcacion($idUsuario);
        echo json_encode($resultado, true);
        break;
        
        case 'marcacionadmin':
            header("Content-Type: application/json");
            $fechaInicio = $_POST['fechaInicio'];
            $fechaFinal = $_POST['fechaFinal'];
            // $search = $_POST['search'];  // Nuevo parámetro de búsqueda
            $marcaciones = new ModeloMarcaciones;
            $resultado = $marcaciones->obtenerMarcaciones($fechaInicio, $fechaFinal,'all');  // Pasar el parámetro de búsqueda al modelo
            echo json_encode($resultado, true);
            break;
        

    default:
        echo "Acción no encontrada.";
        break;
}
