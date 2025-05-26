<?php
require_once "conexion.php";

class ModeloMarcaciones {


    // public function insertarMarcacion($data){
    //     $insertData[':nombre'] = $data['nombre'];
    //     $insertData[':perfil'] = $data['perfil'];
    //     $insertData[':fecha'] = $data['fecha'];
    //     $insertData[':hora'] = $data['hora'];
    //     $insertData[':marcacion'] = $data['marcacion'];
    //     $insertData[':latitud'] = $data['latitud'];  // Añadiendo latitud
    //     $insertData[':longitud'] = $data['longitud']; // Añadiendo longitud
    //     $insertData[':idUsuario'] =  $_SESSION["id"];
    //     $insertData[':nombreUsuario'] = $_SESSION["usuario"];

    //     $db = Conexion::conectar();
    //     $stmt = $db->prepare("INSERT INTO marcaciones (nombre, perfil, fecha, hora, marcacion, latitud, longitud, idUsuario, nombreUsuario) VALUES 
    //     (:nombre, :perfil, :fecha, :hora, :marcacion, :latitud, :longitud, :idUsuario, :nombreUsuario)"); // Añadiendo latitud y longitud en la consulta SQL

    //     if ($stmt->execute($insertData)) {
    //         $response['success'] = true;
    //         $response['message'] = "Marcación registrada exitosamente.";
    //     } else {
    //         $response['success'] = false;
    //         $response['error'] = $stmt->errorInfo();
    //     }
    //     return $response;
    // }


    public function insertarMarcacion($data){
        $db = Conexion::conectar();
    
        // Verificar si ya existe una marcación con las mismas características
        $checkStmt = $db->prepare("SELECT * FROM marcaciones WHERE fecha = :fecha AND hora = :hora AND marcacion = :marcacion AND idUsuario = :idUsuario");
        $checkStmt->bindValue(':fecha', $data['fecha']);
        $checkStmt->bindValue(':hora', $data['hora']);
        $checkStmt->bindValue(':marcacion', $data['marcacion']);
        $checkStmt->bindValue(':idUsuario', $_SESSION["id"]);
        $checkStmt->execute();
    
        // Si se encuentra una marcación existente, no permitir la inserción
        if($checkStmt->rowCount() > 0) {
            $response['success'] = false;
            $response['message'] = "Ya has registrado esta marcación.";
            return $response;
        }
    
        // Preparar los datos para la inserción
        $insertData[':nombre'] = $data['nombre'];
        $insertData[':perfil'] = $data['perfil'];
        $insertData[':fecha'] = $data['fecha'];
        $insertData[':hora'] = $data['hora'];
        $insertData[':marcacion'] = $data['marcacion'];
        $insertData[':latitud'] = $data['latitud'];  
        $insertData[':longitud'] = $data['longitud']; 
        $insertData[':idUsuario'] = $_SESSION["id"];
        $insertData[':nombreUsuario'] = $_SESSION["usuario"];
    
        // Intentar insertar la nueva marcación
        $stmt = $db->prepare("INSERT INTO marcaciones (nombre, perfil, fecha, hora, marcacion, latitud, longitud, idUsuario, nombreUsuario) VALUES 
        (:nombre, :perfil, :fecha, :hora, :marcacion, :latitud, :longitud, :idUsuario, :nombreUsuario)");
    
        if ($stmt->execute($insertData)) {
            $response['success'] = true;
            $response['message'] = "Marcación registrada exitosamente.";
        } else {
            $response['success'] = false;
            $response['error'] = $stmt->errorInfo();
        }
        return $response;
    }
    


   
    public function obtenerMarcaciones($fechaInicio, $fechaFinal, $idUsuario = null){
        $db = Conexion::conectar();

        if (isset($idUsuario)) {
            $stmt = $db->prepare("SELECT * FROM marcaciones WHERE fecha BETWEEN :fechaInicio AND :fechaFinal AND idUsuario = :idUsuario ORDER BY fecha, hora DESC");
        } else {
            $stmt = $db->prepare("SELECT * FROM marcaciones WHERE fecha BETWEEN :fechaInicio AND :fechaFinal  ORDER BY fecha, hora DESC");
        }

        
        $stmt->bindValue(":fechaInicio", $fechaInicio);
        $stmt->bindValue(":fechaFinal", $fechaFinal);
        $stmt->bindValue(":idUsuario", $idUsuario); // Añadiendo el idUsuario al filtro
    
        if ($stmt->execute()) {
            $response['success'] = true;
            $response['data'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $response['success'] = false;
            $response['error'] = $stmt->errorInfo();
        }
        return $response;
    }



    public function obtenerUltimaMarcacion($idUsuario){
        $db = Conexion::conectar();
        $stmt = $db->prepare("SELECT fecha, hora, marcacion FROM marcaciones WHERE idUsuario = :idUsuario ORDER BY fecha DESC, hora DESC LIMIT 1");
        $stmt->bindValue(":idUsuario", $idUsuario);
    
        if ($stmt->execute()) {
            $response['success'] = true;
            $response['data'] = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $response['success'] = false;
            $response['error'] = $stmt->errorInfo();
        }
        return $response;
    }

 
    
    
}
