<?php

//USUARIO LOGEADO
define('USERLOGEADO', $_SESSION["nombre"].' ('.$_SESSION["usuario"].')');

// URL DEVELOPER AND PRODUCTION
define('URLMAIN', 'https://localhost/intranet');

// SET DB
define('G_USUARIO',  'root');
define('G_PASSWORD', '');
define('G_DATABASE', 'intranet_herlu');


//CODIFICACIÓN 'UTF8-8' (Production) TO 'UTF-8' (Local) FOR GENERATION PDF Html2Pdf
define('UTF_CODIFICATION','UTF-8');



// Aquí añades tu función
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
