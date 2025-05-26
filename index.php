<?php

error_reporting(E_ALL);

// Hacer que los errores se muestren en el navegador
ini_set('display_errors', 1);

// Opcional: también puedes hacer que los errores de inicio se muestren (para problemas antes de que se ejecute el script)
ini_set('display_startup_errors', 1);




session_start();
require_once "controladores/plantilla.controlador.php";
/***TOSTADO***/
require_once "controladores/tostado.controlador.php";
/***CLIENTES***/
require_once "controladores/clientes.controlador.php";

/***PRODUCTOS***/
require_once "controladores/productos.controlador.php";

/***CATEGORIAS RAMA MAIN***/
require_once "controladores/categorias.controlador.php";

require_once "controladores/proveedores.controlador.php";
require_once "controladores/ventas.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/tipo_documento_identidad.controlador.php";

// require_once "controladores/historial_bpm.controlador.php"; COMENTADO PORQQUE ESTE ARCHIVO PASO A TENER OTRO NOMBRE Y CONTENIDO
require_once "controladores/analisis_sensorial_de_productos_terminados.controlador.php";

require_once "modelos/clientes.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/almacen.modelo.php";
require_once "modelos/categorias.modelo.php";

require_once "modelos/proveedores.modelo.php";
require_once "modelos/ventas.modelo.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/tipo_documento_identidad.modelo.php";
// require_once "modelos/historial_bpm.modelo.php"; COMENTADO PORQUE ESTE ARCHIVO PASO A TENER OTRO NOMBRE Y CONTENIDO
require_once "modelos/analisis_sensorial_de_productos_terminados.modelo.php";

// INITIALITI
$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();

function guardarDatosEnArchivo($contenido, $nombreArchivo = "archivo.txt") {
    // Ruta y nombre del archivo donde se guardará el contenido
    $archivo = $nombreArchivo;

    // Guardar el contenido en el archivo
    $resultado = file_put_contents($archivo, $contenido);

    // Verificar si se guardó correctamente
    if ($resultado === false) {
        return "Error al guardar los datos en el archivo.";
    } else {
        return "Datos guardados exitosamente en '{$archivo}'.";
    }
}

