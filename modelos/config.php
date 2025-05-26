<?php
if (!isset($_SESSION)) {
    session_start();
}
// USUARIO LOGEADO
if (!defined('USERLOGEADO') && isset($_SESSION['nombre'], $_SESSION['usuario'])) {
    define('USERLOGEADO', $_SESSION['nombre'].' ('.$_SESSION['usuario'].')');
}

// URL DEVELOPER AND PRODUCTION
if (!defined('URLMAIN')) {
    define('URLMAIN', 'https://localhost/intranet');
}
$conexion = null;
global $conexion;

// Datos de conexión a la base de datos
$server = "localhost";  // Prueba con "localhost" si esto falla
$port = 3306;  // Asegúrate de que este puerto es correcto

// Credenciales de base de datos
// Opción 1: Usar credenciales fijas para depuración
$user = "root";  // Usuario correcto
$password = "";  // Contraseña correcta
$dataBase = "intranet_pruebas";  // Base de datos correcta

// Opción 2: Usar variables de sesión (comenta la Opción 1 si usas esta)
// $user = isset($_SESSION["db_user"]) ? $_SESSION["db_user"] : "root";
// $password = isset($_SESSION["db_password"]) ? $_SESSION["db_password"] : "1234";
// $dataBase = isset($_SESSION["db_name"]) ? $_SESSION["db_name"] : "intranet_herlu";

// Intenta intranet_pruebaconectar a la base de datos
try {
    $conexion = new mysqli($server, $user, $password, $dataBase, $port);
    
    // Establece el conjunto de caracteres
    mysqli_set_charset($conexion, 'utf8');
    
    // Verifica si hay error de conexión
    if ($conexion->connect_error) {
        throw new Exception("Error de conexión: " . $conexion->connect_errno . " - " . $conexion->connect_error);
    }
} catch (Exception $e) {
    // Manejo de errores más detallado
    echo "<div style='background-color: #ffcccc; padding: 10px; border: 1px solid #ff0000;'>";
    echo "<h3>Error de conexión a la base de datos:</h3>";
    echo "<p>" . $e->getMessage() . "</p>";
    echo "<p>Verificar:<br>";
    echo "- Nombre de usuario y contraseña<br>";
    echo "- Puerto de conexión<br>";
    echo "- Nombre de la base de datos<br>";
    echo "- Que el servidor MySQL esté corriendo</p>";
    echo "</div>";
    die(); // Detiene la ejecución
}

// INSTANCIAS
// -------------------------------------------------------
// FECHA ACTUAL
date_default_timezone_set('America/Lima');
$hoydi = date('d');
$hoydia = str_pad($hoydi, 2, "0", STR_PAD_LEFT);
$hoyme = date('n');
$hoymes = str_pad($hoyme, 2, "0", STR_PAD_LEFT);
$hoyano = date('Y');
// Uso del formato de fecha
// Puedes usar estas variables $hoydia, $hoymes y $hoyano en cualquier parte del sistema
?>