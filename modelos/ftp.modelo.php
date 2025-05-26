<?php 
require_once "conexion.php";

class ModeloFtp {
    public static function mdlIngresarFtp($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (name, ruta) VALUES (:name, :ruta)");
        $stmt->bindParam(":name", $datos["name"], PDO::PARAM_STR);
        $stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
        
        if($stmt->execute()){
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    public static function mdlMostrarFtp($tabla, $item, $valor) {
        if($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :id");
            $stmt->bindParam(":id", $valor, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public static function mdlActualizarFtp($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET name = :name, ruta = :ruta WHERE id = :id");
        $stmt->bindParam(":name", $datos["name"], PDO::PARAM_STR);
        $stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    public static function mdlEliminarFtp($tabla, $item, $valor) {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt->bindParam(":id", $valor, PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    public static function mdlEliminarDoc($fileds) {
      
      $rutaExterna = $_SERVER['DOCUMENT_ROOT'];
      $rutaCompleta = $rutaExterna.'/'. $fileds;
  
      $logMessage = "[" . date('Y-m-d H:i:s') . "] Intentando eliminar el archivo: $rutaCompleta\n";
      
  
      if(file_exists($rutaCompleta)) {
          $logMessage = "[" . date('Y-m-d H:i:s') . "] El archivo existe: $rutaCompleta\n";
          
  
          if(unlink($rutaCompleta)) {
              $logMessage = "[" . date('Y-m-d H:i:s') . "] Archivo eliminado correctamente: $rutaCompleta\n";
              
              return "ok";
          } else {
              $logMessage = "[" . date('Y-m-d H:i:s') . "] Error al eliminar el archivo: $rutaCompleta\n";
              
              return "error";
          }
      } else {
          $logMessage = "[" . date('Y-m-d H:i:s') . "] El archivo no existe: $rutaCompleta\n";
          
          return "error";
      }
    }
  



}

switch ($_POST["ajaxservice"]) {
    case 'loadData':
        $respuesta = ModeloFtp::mdlMostrarFtp("ftp", null, null);
        echo json_encode($respuesta);
        break;
    case 'loadEdit':
        $respuesta = ModeloFtp::mdlMostrarFtp("ftp", "id", $_POST["idaa"]);
        echo json_encode($respuesta);
        break;
    case 'eliminar':
        $respuesta2 = ModeloFtp::mdlEliminarDoc($_POST['rutaEliminar']);
        if($respuesta2 == 'ok'){
            $respuesta = ModeloFtp::mdlEliminarFtp("ftp", "id", $_POST["idEliminar"]);
            echo json_encode($respuesta);
        } else {
            echo json_encode($respuesta2);
        }
        break;
}
?>
