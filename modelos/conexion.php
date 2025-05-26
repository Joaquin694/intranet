<?php
date_default_timezone_set('America/Lima');
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION["nombre"]) && isset($_SESSION["usuario"])) {
    define('USERLOGEADO', $_SESSION["nombre"].' ('.$_SESSION["usuario"].')');
}
// URL DEVELOPER AND PRODUCTION
define('URLMAIN', 'https://localhost/intranet');

class Conexion
{
    public static function conectar()
    {
        try {
            // OPCIÓN 1: Configuración manual para depuración
            // Usar estas credenciales fijas para solucionar el problema
            $host = "localhost"; // También puedes probar con "localhost"
            $db_name = "intranet_pruebas";
            $db_user = "root";
            $db_password = "";
            $port = 3306; // Asegúrate de que este es el puerto correcto
            
            // OPCIÓN 2: Usar variables de sesión (comenta la OPCIÓN 1 si usas esta)
            // $host = "127.0.0.1";
            // $port = 3307;
            // $db_user = isset($_SESSION["db_user"]) ? $_SESSION["db_user"] : "root";
            // $db_password = isset($_SESSION["db_password"]) ? $_SESSION["db_password"] : "";
            // $db_name = isset($_SESSION["db_name"]) ? $_SESSION["db_name"] : "intranet_herlu";
            
            // Crear la conexión PDO con el puerto específico
            $dsn = "mysql:host=$host;port=$port;dbname=$db_name";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            
            $link = new PDO($dsn, $db_user, $db_password, $options);
            $link->exec("set names utf8");
            
            return $link;
        } catch (PDOException $e) {
            // Manejo mejorado de errores
            echo "<div style='background-color: #ffcccc; padding: 10px; border: 1px solid #ff0000;'>";
            echo "<h3>Error de conexión a la base de datos:</h3>";
            echo "<p>" . $e->getMessage() . "</p>";
            echo "<p>Verificar:<br>";
            echo "- Nombre de usuario y contraseña<br>";
            echo "- Puerto de conexión (estás usando el puerto $port)<br>";
            echo "- Nombre de la base de datos<br>";
            echo "- Que el servidor MySQL esté corriendo</p>";
            echo "</div>";
            die(); // Detiene la ejecución
        }
    }
}

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