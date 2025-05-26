<?php
require_once "conexion.php";

class ModeloIperc
{
    /*=============================================
    INGRESAR IPERC
    =============================================*/
    public static function mdlIngresarIperc($tabla, $datos)
    {
        try {
            $pdo = Conexion::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("INSERT INTO $tabla (
                activity_name, task, work_order, responsable_supervisor, supervisor_signature,
                responsable_encargado, encargado_signature, date, area, clasificacion, pets, petar,
                iperc, location, start_time, end_time, tools, chemicals, task_description, risk,
                probability, severity, exposure, initial_risk, control_measures, residual_risk,
                worker_name1, worker_cargo1, worker_area1, worker_signature1, 
                worker_name2, worker_cargo2, worker_area2, worker_signature2,
                worker_name3, worker_cargo3, worker_area3, worker_signature3,
                worker_name4, worker_cargo4, worker_area4, worker_signature4,
                worker_name5, worker_cargo5, worker_area5, worker_signature5,
                supervisor_time1, supervisor_name1, corrective_measure1, supervisor_signature1, 
                list_hands, list_work_area, list_petar, list_epp, list_hann_car, list_tools_equip, 
                list_clean_liness, list_andamios, list_izajes, list_sustancias, list_escaleras, list_manejo
            ) VALUES (
                :activity_name, :task, :work_order, :responsable_supervisor, :supervisor_signature,
                :responsable_encargado, :encargado_signature, :date, :area, :clasificacion, :pets, :petar,
                :iperc, :location, :start_time, :end_time, :tools, :chemicals, :task_description, :risk,
                :probability, :severity, :exposure, :initial_risk, :control_measures, :residual_risk,
                :worker_name1, :worker_cargo1, :worker_area1, :worker_signature1, 
                :worker_name2, :worker_cargo2, :worker_area2, :worker_signature2, 
                :worker_name3, :worker_cargo3, :worker_area3, :worker_signature3, 
                :worker_name4, :worker_cargo4, :worker_area4, :worker_signature4, 
                :worker_name5, :worker_cargo5, :worker_area5, :worker_signature5, 
                :supervisor_time1, :supervisor_name1, :corrective_measure1, :supervisor_signature1, 
                :list_hands, :list_work_area, :list_petar, :list_epp, :list_hann_car, :list_tools_equip, 
                :list_clean_liness, :list_andamios, :list_izajes, :list_sustancias, :list_escaleras, :list_manejo
            )");

            // Enlazar los parámetros
            $stmt->bindParam(":activity_name", $datos["activity_name"], PDO::PARAM_STR);
            $stmt->bindParam(":task", $datos["task"], PDO::PARAM_STR);
            $stmt->bindParam(":work_order", $datos["work_order"], PDO::PARAM_STR);
            $stmt->bindParam(":responsable_supervisor", $datos["responsable_supervisor"], PDO::PARAM_STR);
            $stmt->bindParam(":supervisor_signature", $datos["supervisor_signature"], PDO::PARAM_STR);
            $stmt->bindParam(":responsable_encargado", $datos["responsable_encargado"], PDO::PARAM_STR);
            $stmt->bindParam(":encargado_signature", $datos["encargado_signature"], PDO::PARAM_STR);
            $stmt->bindParam(":date", $datos["date"], PDO::PARAM_STR);
            $stmt->bindParam(":area", $datos["area"], PDO::PARAM_STR);
            $stmt->bindParam(":clasificacion", $datos["clasificacion"], PDO::PARAM_STR);
            $stmt->bindParam(":pets", $datos["pets"], PDO::PARAM_STR);
            $stmt->bindParam(":petar", $datos["petar"], PDO::PARAM_STR);
            $stmt->bindParam(":iperc", $datos["iperc"], PDO::PARAM_STR);
            $stmt->bindParam(":location", $datos["location"], PDO::PARAM_STR);
            $stmt->bindParam(":start_time", $datos["start_time"], PDO::PARAM_STR);
            $stmt->bindParam(":end_time", $datos["end_time"], PDO::PARAM_STR);
            $stmt->bindParam(":tools", $datos["tools"], PDO::PARAM_STR);
            $stmt->bindParam(":chemicals", $datos["chemicals"], PDO::PARAM_STR);
            $stmt->bindParam(":task_description", $datos["task_description"], PDO::PARAM_STR);
            $stmt->bindParam(":risk", $datos["risk"], PDO::PARAM_STR);
            $stmt->bindParam(":probability", $datos["probability"], PDO::PARAM_STR);
            $stmt->bindParam(":severity", $datos["severity"], PDO::PARAM_STR);
            $stmt->bindParam(":exposure", $datos["exposure"], PDO::PARAM_STR);
            $stmt->bindParam(":initial_risk", $datos["initial_risk"], PDO::PARAM_STR);
            $stmt->bindParam(":control_measures", $datos["control_measures"], PDO::PARAM_STR);
            $stmt->bindParam(":residual_risk", $datos["residual_risk"], PDO::PARAM_STR);

            // Workers
            $stmt->bindParam(":worker_name1", $datos["worker_name1"], PDO::PARAM_STR);
            $stmt->bindParam(":worker_cargo1", $datos["worker_cargo1"], PDO::PARAM_STR);
            $stmt->bindParam(":worker_area1", $datos["worker_area1"], PDO::PARAM_STR);
            $stmt->bindParam(":worker_signature1", $datos["worker_signature1"], PDO::PARAM_STR);

            $stmt->bindParam(":worker_name2", $datos["worker_name2"], PDO::PARAM_STR);
            $stmt->bindParam(":worker_cargo2", $datos["worker_cargo2"], PDO::PARAM_STR);
            $stmt->bindParam(":worker_area2", $datos["worker_area2"], PDO::PARAM_STR);
            $stmt->bindParam(":worker_signature2", $datos["worker_signature2"], PDO::PARAM_STR);

            $stmt->bindParam(":worker_name3", $datos["worker_name3"], PDO::PARAM_STR);
            $stmt->bindParam(":worker_cargo3", $datos["worker_cargo3"], PDO::PARAM_STR);
            $stmt->bindParam(":worker_area3", $datos["worker_area3"], PDO::PARAM_STR);
            $stmt->bindParam(":worker_signature3", $datos["worker_signature3"], PDO::PARAM_STR);

            $stmt->bindParam(":worker_name4", $datos["worker_name4"], PDO::PARAM_STR);
            $stmt->bindParam(":worker_cargo4", $datos["worker_cargo4"], PDO::PARAM_STR);
            $stmt->bindParam(":worker_area4", $datos["worker_area4"], PDO::PARAM_STR);
            $stmt->bindParam(":worker_signature4", $datos["worker_signature4"], PDO::PARAM_STR);

            $stmt->bindParam(":worker_name5", $datos["worker_name5"], PDO::PARAM_STR);
            $stmt->bindParam(":worker_cargo5", $datos["worker_cargo5"], PDO::PARAM_STR);
            $stmt->bindParam(":worker_area5", $datos["worker_area5"], PDO::PARAM_STR);
            $stmt->bindParam(":worker_signature5", $datos["worker_signature5"], PDO::PARAM_STR);

            // Supervisor data
            $stmt->bindParam(":supervisor_time1", $datos["supervisor_time1"], PDO::PARAM_STR);
            $stmt->bindParam(":supervisor_name1", $datos["supervisor_name1"], PDO::PARAM_STR);
            $stmt->bindParam(":corrective_measure1", $datos["corrective_measure1"], PDO::PARAM_STR);
            $stmt->bindParam(":supervisor_signature1", $datos["supervisor_signature1"], PDO::PARAM_STR);

            // Lists
            $stmt->bindParam(":list_hands", $datos["list_hands"], PDO::PARAM_STR);
            $stmt->bindParam(":list_work_area", $datos["list_work_area"], PDO::PARAM_STR);
            $stmt->bindParam(":list_petar", $datos["list_petar"], PDO::PARAM_STR);
            $stmt->bindParam(":list_epp", $datos["list_epp"], PDO::PARAM_STR);
            $stmt->bindParam(":list_hann_car", $datos["list_hann_car"], PDO::PARAM_STR);
            $stmt->bindParam(":list_tools_equip", $datos["list_tools_equip"], PDO::PARAM_STR);
            $stmt->bindParam(":list_clean_liness", $datos["list_clean_liness"], PDO::PARAM_STR);
            $stmt->bindParam(":list_andamios", $datos["list_andamios"], PDO::PARAM_STR);
            $stmt->bindParam(":list_izajes", $datos["list_izajes"], PDO::PARAM_STR);
            $stmt->bindParam(":list_sustancias", $datos["list_sustancias"], PDO::PARAM_STR);
            $stmt->bindParam(":list_escaleras", $datos["list_escaleras"], PDO::PARAM_STR);
            $stmt->bindParam(":list_manejo", $datos["list_manejo"], PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }

        } catch (PDOException $e) {
            error_log("Error en mdlIngresarIperc: " . $e->getMessage());
            return "Syntax Error: " . $e->getMessage();
        } finally {
            $stmt = null;
            $pdo = null;
        }
    }

    /*=============================================
    MOSTRAR IPERC
    =============================================*/
    public static function mdlMostrarIperc($tabla, $item, $valor)
    {
        try {
            if ($item != null) {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :id");
                $stmt->bindParam(":id", $valor, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            error_log("Error en mdlMostrarIperc: " . $e->getMessage());
            return "Error: " . $e->getMessage();
        } finally {
            $stmt = null;
        }
    }

    /*=============================================
    ACTUALIZAR IPERC
    =============================================*/
    public static function mdlActualizarIperc($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET
                activity_name = :activity_name, task = :task, work_order = :work_order,
                responsable_supervisor = :responsable_supervisor, supervisor_signature = :supervisor_signature,
                responsable_encargado = :responsable_encargado, encargado_signature = :encargado_signature,
                date = :date, area = :area, clasificacion = :clasificacion, pets = :pets, petar = :petar,
                iperc = :iperc, location = :location, start_time = :start_time, end_time = :end_time,
                tools = :tools, chemicals = :chemicals, task_description = :task_description, risk = :risk,
                probability = :probability, severity = :severity, exposure = :exposure, initial_risk = :initial_risk,
                control_measures = :control_measures, residual_risk = :residual_risk,
                worker_name1 = :worker_name1, worker_cargo1 = :worker_cargo1, worker_area1 = :worker_area1, worker_signature1 = :worker_signature1,
                worker_name2 = :worker_name2, worker_cargo2 = :worker_cargo2, worker_area2 = :worker_area2, worker_signature2 = :worker_signature2,
                worker_name3 = :worker_name3, worker_cargo3 = :worker_cargo3, worker_area3 = :worker_area3, worker_signature3 = :worker_signature3,
                worker_name4 = :worker_name4, worker_cargo4 = :worker_cargo4, worker_area4 = :worker_area4, worker_signature4 = :worker_signature4,
                worker_name5 = :worker_name5, worker_cargo5 = :worker_cargo5, worker_area5 = :worker_area5, worker_signature5 = :worker_signature5,
                supervisor_time1 = :supervisor_time1, supervisor_name1 = :supervisor_name1, 
                corrective_measure1 = :corrective_measure1, supervisor_signature1 = :supervisor_signature1,
                list_hands = :list_hands, list_work_area = :list_work_area, list_petar = :list_petar, list_epp = :list_epp,
                list_hann_car = :list_hann_car, list_tools_equip = :list_tools_equip, list_clean_liness = :list_clean_liness,
                list_andamios = :list_andamios, list_izajes = :list_izajes, list_sustancias = :list_sustancias,
                list_escaleras = :list_escaleras, list_manejo = :list_manejo
                WHERE id = :id");

            // Enlazar todos los parámetros (mismo binding que en mdlIngresarIperc)
            $stmt->bindParam(":activity_name", $datos["activity_name"], PDO::PARAM_STR);
            $stmt->bindParam(":task", $datos["task"], PDO::PARAM_STR);
            $stmt->bindParam(":work_order", $datos["work_order"], PDO::PARAM_STR);
            $stmt->bindParam(":responsable_supervisor", $datos["responsable_supervisor"], PDO::PARAM_STR);
            $stmt->bindParam(":supervisor_signature", $datos["supervisor_signature"], PDO::PARAM_STR);
            $stmt->bindParam(":responsable_encargado", $datos["responsable_encargado"], PDO::PARAM_STR);
            $stmt->bindParam(":encargado_signature", $datos["encargado_signature"], PDO::PARAM_STR);
            $stmt->bindParam(":date", $datos["date"], PDO::PARAM_STR);
            $stmt->bindParam(":area", $datos["area"], PDO::PARAM_STR);
            $stmt->bindParam(":clasificacion", $datos["clasificacion"], PDO::PARAM_STR);
            $stmt->bindParam(":pets", $datos["pets"], PDO::PARAM_STR);
            $stmt->bindParam(":petar", $datos["petar"], PDO::PARAM_STR);
            $stmt->bindParam(":iperc", $datos["iperc"], PDO::PARAM_STR);
            $stmt->bindParam(":location", $datos["location"], PDO::PARAM_STR);
            $stmt->bindParam(":start_time", $datos["start_time"], PDO::PARAM_STR);
            $stmt->bindParam(":end_time", $datos["end_time"], PDO::PARAM_STR);
            $stmt->bindParam(":tools", $datos["tools"], PDO::PARAM_STR);
            $stmt->bindParam(":chemicals", $datos["chemicals"], PDO::PARAM_STR);
            $stmt->bindParam(":task_description", $datos["task_description"], PDO::PARAM_STR);
            $stmt->bindParam(":risk", $datos["risk"], PDO::PARAM_STR);
            $stmt->bindParam(":probability", $datos["probability"], PDO::PARAM_STR);
            $stmt->bindParam(":severity", $datos["severity"], PDO::PARAM_STR);
            $stmt->bindParam(":exposure", $datos["exposure"], PDO::PARAM_STR);
            $stmt->bindParam(":initial_risk", $datos["initial_risk"], PDO::PARAM_STR);
            $stmt->bindParam(":control_measures", $datos["control_measures"], PDO::PARAM_STR);
            $stmt->bindParam(":residual_risk", $datos["residual_risk"], PDO::PARAM_STR);

            // Workers
            $stmt->bindParam(":worker_name1", $datos["worker_name1"], PDO::PARAM_STR);
            $stmt->bindParam(":worker_cargo1", $datos["worker_cargo1"], PDO::PARAM_STR);
            $stmt->bindParam(":worker_area1", $datos["worker_area1"], PDO::PARAM_STR);
            $stmt->bindParam(":worker_signature1", $datos["worker_signature1"], PDO::PARAM_STR);

            $stmt->bindParam(":worker_name2", $datos["worker_name2"], PDO::PARAM_STR);
            $stmt->bindParam(":worker_cargo2", $datos["worker_cargo2"], PDO::PARAM_STR);
            $stmt->bindParam(":worker_area2", $datos["worker_area2"], PDO::PARAM_STR);
            $stmt->bindParam(":worker_signature2", $datos["worker_signature2"], PDO::PARAM_STR);

            $stmt->bindParam(":worker_name3", $datos["worker_name3"], PDO::PARAM_STR);
            $stmt->bindParam(":worker_cargo3", $datos["worker_cargo3"], PDO::PARAM_STR);
            $stmt->bindParam(":worker_area3", $datos["worker_area3"], PDO::PARAM_STR);
            $stmt->bindParam(":worker_signature3", $datos["worker_signature3"], PDO::PARAM_STR);

            $stmt->bindParam(":worker_name4", $datos["worker_name4"], PDO::PARAM_STR);
            $stmt->bindParam(":worker_cargo4", $datos["worker_cargo4"], PDO::PARAM_STR);
            $stmt->bindParam(":worker_area4", $datos["worker_area4"], PDO::PARAM_STR);
            $stmt->bindParam(":worker_signature4", $datos["worker_signature4"], PDO::PARAM_STR);

            $stmt->bindParam(":worker_name5", $datos["worker_name5"], PDO::PARAM_STR);
            $stmt->bindParam(":worker_cargo5", $datos["worker_cargo5"], PDO::PARAM_STR);
            $stmt->bindParam(":worker_area5", $datos["worker_area5"], PDO::PARAM_STR);
            $stmt->bindParam(":worker_signature5", $datos["worker_signature5"], PDO::PARAM_STR);

            // Supervisor
            $stmt->bindParam(":supervisor_time1", $datos["supervisor_time1"], PDO::PARAM_STR);
            $stmt->bindParam(":supervisor_name1", $datos["supervisor_name1"], PDO::PARAM_STR);
            $stmt->bindParam(":corrective_measure1", $datos["corrective_measure1"], PDO::PARAM_STR);
            $stmt->bindParam(":supervisor_signature1", $datos["supervisor_signature1"], PDO::PARAM_STR);

            // Lists
            $stmt->bindParam(":list_hands", $datos["list_hands"], PDO::PARAM_STR);
            $stmt->bindParam(":list_work_area", $datos["list_work_area"], PDO::PARAM_STR);
            $stmt->bindParam(":list_petar", $datos["list_petar"], PDO::PARAM_STR);
            $stmt->bindParam(":list_epp", $datos["list_epp"], PDO::PARAM_STR);
            $stmt->bindParam(":list_hann_car", $datos["list_hann_car"], PDO::PARAM_STR);
            $stmt->bindParam(":list_tools_equip", $datos["list_tools_equip"], PDO::PARAM_STR);
            $stmt->bindParam(":list_clean_liness", $datos["list_clean_liness"], PDO::PARAM_STR);
            $stmt->bindParam(":list_andamios", $datos["list_andamios"], PDO::PARAM_STR);
            $stmt->bindParam(":list_izajes", $datos["list_izajes"], PDO::PARAM_STR);
            $stmt->bindParam(":list_sustancias", $datos["list_sustancias"], PDO::PARAM_STR);
            $stmt->bindParam(":list_escaleras", $datos["list_escaleras"], PDO::PARAM_STR);
            $stmt->bindParam(":list_manejo", $datos["list_manejo"], PDO::PARAM_STR);

            // ID para WHERE
            $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }

        } catch (PDOException $e) {
            error_log("Error en mdlActualizarIperc: " . $e->getMessage());
            return "Error: " . $e->getMessage();
        } finally {
            $stmt = null;
        }
    }

    /*=============================================
    ELIMINAR IPERC
    =============================================*/
    public static function mdlEliminarIperc($tabla, $item, $valor)
    {
        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $item = :id");
            $stmt->bindParam(":id", $valor, PDO::PARAM_INT);
            
            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }

        } catch (PDOException $e) {
            error_log("Error en mdlEliminarIperc: " . $e->getMessage());
            return "Error: " . $e->getMessage();
        } finally {
            $stmt = null;
        }
    }

    /*=============================================
    ELIMINAR DOCUMENTO
    =============================================*/
    public static function eliminarDoc($ruta)
    {
        try {
            $rutaExterna = $_SERVER['DOCUMENT_ROOT'] . "/";
            $rutaCompleta = $rutaExterna . $ruta;
            
            if (file_exists($rutaCompleta)) {
                if (unlink($rutaCompleta)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (Exception $e) {
            error_log("Error al eliminar documento: " . $e->getMessage());
            return false;
        }
    }

    /*=============================================
    VALIDAR DATOS DE ARCHIVO
    =============================================*/
    public static function validateFileData($respuesta)
    {
        $fileKeys = [
            'worker_signature1', 'worker_signature2', 'worker_signature3',
            'worker_signature4', 'worker_signature5', 'supervisor_signature1',
            'supervisor_signature', 'encargado_signature'
        ];

        $listNotEmpty = [];
        foreach ($fileKeys as $key) {
            if (!empty($respuesta[$key])) {
                $listNotEmpty[] = $respuesta[$key];
            }
        }
        return $listNotEmpty;
    }
}
?>