<?php
require_once "conexion.php";
class ModeloAtenderCola
{
    public static function mdlIngresarAtenderCola($tabla, $datos)
    {

        $pdo = Conexion::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("INSERT INTO $tabla(id_asistente, categoria, dniCliente, nombreCliente, dniAlumno, nombreAlumno, carreraCiclo, ciclo, dniDocente, nombreDocente, dniExterno, nombreExterno, categoriaMotivo, motivoGenerales, comentarioAtencion, estadoCaso, areaDerivada, evidencia1, evidencia2) 
        VALUES (:id_asistente, :categoria, :dniCliente, :nombreCliente, :dniAlumno, :nombreAlumno, :carreraCiclo, :ciclo, :dniDocente, :nombreDocente, :dniExterno, :nombreExterno, :categoriaMotivo, :motivoGenerales, :comentarioAtencion, :estadoCaso, :areaDerivada, :evidencia1, :evidencia2)");

        $stmt->bindParam(":id_asistente", $datos["id_asistente"], PDO::PARAM_STR);
        $stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
        $stmt->bindParam(":dniCliente", $datos["dniCliente"], PDO::PARAM_STR);
        $stmt->bindParam(":nombreCliente", $datos["nombreCliente"], PDO::PARAM_STR);
        $stmt->bindParam(":dniAlumno", $datos["dniAlumno"], PDO::PARAM_STR);
        $stmt->bindParam(":nombreAlumno", $datos["nombreAlumno"], PDO::PARAM_STR);
        $stmt->bindParam(":carreraCiclo", $datos["carreraCiclo"], PDO::PARAM_STR);
        $stmt->bindParam(":ciclo", $datos["ciclo"], PDO::PARAM_STR);
        $stmt->bindParam(":dniDocente", $datos["dniDocente"], PDO::PARAM_STR);
        $stmt->bindParam(":nombreDocente", $datos["nombreDocente"], PDO::PARAM_STR);
        $stmt->bindParam(":dniExterno", $datos["dniExterno"], PDO::PARAM_STR);
        $stmt->bindParam(":nombreExterno", $datos["nombreExterno"], PDO::PARAM_STR);
        $stmt->bindParam(":categoriaMotivo", $datos["categoriaMotivo"], PDO::PARAM_STR);
        $stmt->bindParam(":motivoGenerales", $datos["motivoGenerales"], PDO::PARAM_STR);
        $stmt->bindParam(":comentarioAtencion", $datos["comentarioAtencion"], PDO::PARAM_STR);
        $stmt->bindParam(":estadoCaso", $datos["estadoCaso"], PDO::PARAM_STR);
        $stmt->bindParam(":areaDerivada", $datos["areaDerivada"], PDO::PARAM_STR);
        $stmt->bindParam(":evidencia1", $datos["evidencia1"], PDO::PARAM_STR);
        $stmt->bindParam(":evidencia2", $datos["evidencia2"], PDO::PARAM_STR);

        try {
            if ($stmt->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
        } catch (PDOException $e) {
            return "Syntax Error: " . $e->getMessage();
        }

        $stmt->closeCursor();
        $stmt = null;
    }
    public static function mdlActualizar($tabla, $datos)
    {
        $pdo = Conexion::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("UPDATE $tabla SET 
        id_asistente = :id_asistente, 
        categoria = :categoria, 
        dniCliente = :dniCliente, 
        nombreCliente = :nombreCliente, 
        dniAlumno = :dniAlumno, 
        nombreAlumno = :nombreAlumno, 
        carreraCiclo = :carreraCiclo, 
        ciclo = :ciclo, 
        dniDocente = :dniDocente, 
        nombreDocente = :nombreDocente, 
        dniExterno = :dniExterno, 
        nombreExterno = :nombreExterno, 
        categoriaMotivo = :categoriaMotivo, 
        motivoGenerales = :motivoGenerales, 
        comentarioAtencion = :comentarioAtencion, 
        estadoCaso = :estadoCaso, 
        areaDerivada = :areaDerivada, 
        evidencia1 = :evidencia1, 
        evidencia2 = :evidencia2 
        WHERE id = :id");

        $stmt->bindParam(":id_asistente", $datos["id_asistente"], PDO::PARAM_STR);
        $stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
        $stmt->bindParam(":dniCliente", $datos["dniCliente"], PDO::PARAM_STR);
        $stmt->bindParam(":nombreCliente", $datos["nombreCliente"], PDO::PARAM_STR);
        $stmt->bindParam(":dniAlumno", $datos["dniAlumno"], PDO::PARAM_STR);
        $stmt->bindParam(":nombreAlumno", $datos["nombreAlumno"], PDO::PARAM_STR);
        $stmt->bindParam(":carreraCiclo", $datos["carreraCiclo"], PDO::PARAM_STR);
        $stmt->bindParam(":ciclo", $datos["ciclo"], PDO::PARAM_STR);
        $stmt->bindParam(":dniDocente", $datos["dniDocente"], PDO::PARAM_STR);
        $stmt->bindParam(":nombreDocente", $datos["nombreDocente"], PDO::PARAM_STR);
        $stmt->bindParam(":dniExterno", $datos["dniExterno"], PDO::PARAM_STR);
        $stmt->bindParam(":nombreExterno", $datos["nombreExterno"], PDO::PARAM_STR);
        $stmt->bindParam(":categoriaMotivo", $datos["categoriaMotivo"], PDO::PARAM_STR);
        $stmt->bindParam(":motivoGenerales", $datos["motivoGenerales"], PDO::PARAM_STR);
        $stmt->bindParam(":comentarioAtencion", $datos["comentarioAtencion"], PDO::PARAM_STR);
        $stmt->bindParam(":estadoCaso", $datos["estadoCaso"], PDO::PARAM_STR);
        $stmt->bindParam(":areaDerivada", $datos["areaDerivada"], PDO::PARAM_STR);
        $stmt->bindParam(":evidencia1", $datos["evidencia1"], PDO::PARAM_STR);
        $stmt->bindParam(":evidencia2", $datos["evidencia2"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        try {
            if ($stmt->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
        } catch (PDOException $e) {
            return "Syntax Error: " . $e->getMessage();
        }

        $stmt->closeCursor();
        $stmt = null;
    }

    public function load($fecha_inicio, $fecha_fin)
    {
        $pdo = Conexion::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT * FROM gestion_atencion_cliente WHERE fecha_atencion BETWEEN :fecha_inicio AND :fecha_fin");
        $stmt->bindValue(":fecha_inicio", $fecha_inicio);
        $stmt->bindValue(":fecha_fin", $fecha_fin);
        try {
            if ($stmt->execute()) {
                $rt['success'] = true;
                $rt['data'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $rt['success'] = false;
                $rt['error'] = $stmt->errorInfo();
            }
            return $rt;
        } catch (PDOException $e) {
            return "Syntax Error: " . $e->getMessage();
        }
    }

    public static function load_edit($id)
    {
        $pdo = Conexion::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT * FROM gestion_atencion_cliente WHERE id = :id");
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        try {
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            return "Syntax Error: " . $e->getMessage();
        }
    }
}
switch ($_POST['accion']) {
    case 'load_edit':
        $respuesta = ModeloAtenderCola::load_edit($_POST['id']);
        echo json_encode($respuesta);
        break;
}
