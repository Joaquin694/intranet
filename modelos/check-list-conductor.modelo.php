<?php
require_once "conexion.php";

class ModeloCheckListConductor
{
    /*=============================================
    INGRESAR CHECK LIST CONDUCTOR
    =============================================*/
    public static function mdlIngresarCheckListConductor($tabla, $datos)
    {
        try {
            $pdo = Conexion::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("INSERT INTO $tabla(
                options, day, placadb,
                input_1, com_input_1, input_2, com_input_2, input_3, com_input_3, input_4, com_input_4, 
                input_5, com_input_5, input_6, com_input_6, input_7, com_input_7, input_8, com_input_8, 
                input_9, com_input_9, input_10, com_input_10, input_11, com_input_11, input_12, com_input_12, 
                input_13, com_input_13, input_14, com_input_14, input_15, com_input_15, input_16, com_input_16, 
                input_17, com_input_17, input_18, com_input_18, input_19, com_input_19, input_20, com_input_20, 
                input_21, com_input_21, input_22, com_input_22, input_23, com_input_23, input_24, com_input_24, 
                input_25, com_input_25, input_26, com_input_26, input_27, com_input_27, input_28, com_input_28, 
                input_29, com_input_29, input_30, com_input_30, input_31, com_input_31, input_32, com_input_32, 
                input_33, com_input_33, input_34, com_input_34, input_35, com_input_35, input_36, com_input_36, 
                input_37, com_input_37, input_38, com_input_38, input_39, com_input_39, input_40, com_input_40, 
                input_41, com_input_41, input_42, com_input_42, input_43, com_input_43, input_44, com_input_44, 
                input_45, com_input_45, input_46, com_input_46, input_47, com_input_47, input_48, com_input_48, 
                input_49, com_input_49, input_50, com_input_50, input_51, com_input_51, input_52, com_input_52, 
                input_53, com_input_53, input_54, com_input_54, input_55, com_input_55, input_56, com_input_56, 
                input_57, com_input_57, input_58, com_input_58,
                frontImg, rearImg, leftImg, rightImg
            ) VALUES (
                :options, :day, :placadb,
                :input_1, :com_input_1, :input_2, :com_input_2, :input_3, :com_input_3, :input_4, :com_input_4,
                :input_5, :com_input_5, :input_6, :com_input_6, :input_7, :com_input_7, :input_8, :com_input_8,
                :input_9, :com_input_9, :input_10, :com_input_10, :input_11, :com_input_11, :input_12, :com_input_12,
                :input_13, :com_input_13, :input_14, :com_input_14, :input_15, :com_input_15, :input_16, :com_input_16,
                :input_17, :com_input_17, :input_18, :com_input_18, :input_19, :com_input_19, :input_20, :com_input_20,
                :input_21, :com_input_21, :input_22, :com_input_22, :input_23, :com_input_23, :input_24, :com_input_24,
                :input_25, :com_input_25, :input_26, :com_input_26, :input_27, :com_input_27, :input_28, :com_input_28,
                :input_29, :com_input_29, :input_30, :com_input_30, :input_31, :com_input_31, :input_32, :com_input_32,
                :input_33, :com_input_33, :input_34, :com_input_34, :input_35, :com_input_35, :input_36, :com_input_36,
                :input_37, :com_input_37, :input_38, :com_input_38, :input_39, :com_input_39, :input_40, :com_input_40,
                :input_41, :com_input_41, :input_42, :com_input_42, :input_43, :com_input_43, :input_44, :com_input_44,
                :input_45, :com_input_45, :input_46, :com_input_46, :input_47, :com_input_47, :input_48, :com_input_48,
                :input_49, :com_input_49, :input_50, :com_input_50, :input_51, :com_input_51, :input_52, :com_input_52,
                :input_53, :com_input_53, :input_54, :com_input_54, :input_55, :com_input_55, :input_56, :com_input_56,
                :input_57, :com_input_57, :input_58, :com_input_58,
                :frontImg, :rearImg, :leftImg, :rightImg
            )");

            // Bind de parámetros básicos
            $stmt->bindParam(":options", $datos["options"], PDO::PARAM_STR);
            $stmt->bindParam(":day", $datos["day"], PDO::PARAM_STR);
            $stmt->bindParam(":placadb", $datos["placadb"], PDO::PARAM_STR);

            // Bind dinámico para inputs 1-58
            for ($i = 1; $i <= 58; $i++) {
                $inputKey = "input_" . $i;
                $comInputKey = "com_input_" . $i;
                
                $stmt->bindParam(":" . $inputKey, $datos[$inputKey], PDO::PARAM_STR);
                $stmt->bindParam(":" . $comInputKey, $datos[$comInputKey], PDO::PARAM_STR);
            }

            // Bind de imágenes
            $stmt->bindParam(":frontImg", $datos["frontImg"], PDO::PARAM_STR);
            $stmt->bindParam(":rearImg", $datos["rearImg"], PDO::PARAM_STR);
            $stmt->bindParam(":leftImg", $datos["leftImg"], PDO::PARAM_STR);
            $stmt->bindParam(":rightImg", $datos["rightImg"], PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }

        } catch (PDOException $e) {
            error_log("Error en mdlIngresarCheckListConductor: " . $e->getMessage());
            return "Syntax Error: " . $e->getMessage();
        } finally {
            $stmt = null;
            $pdo = null;
        }
    }

    /*=============================================
    MOSTRAR CHECK LIST CONDUCTOR
    =============================================*/
    public static function mdlMostrarCheckListConductor($tabla, $item, $valor)
    {
        try {
            if ($item != null) {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :id");
                $stmt->bindParam(":id", $valor, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY fecha_registro DESC");
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            error_log("Error en mdlMostrarCheckListConductor: " . $e->getMessage());
            return "Error: " . $e->getMessage();
        } finally {
            $stmt = null;
        }
    }

    /*=============================================
    ACTUALIZAR CHECK LIST CONDUCTOR
    =============================================*/
    public static function mdlActualizarCheckListConductor($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
                options = :options, day = :day, placadb = :placadb,
                input_1 = :input_1, com_input_1 = :com_input_1,
                input_2 = :input_2, com_input_2 = :com_input_2,
                input_3 = :input_3, com_input_3 = :com_input_3,
                input_4 = :input_4, com_input_4 = :com_input_4,
                input_5 = :input_5, com_input_5 = :com_input_5,
                input_6 = :input_6, com_input_6 = :com_input_6,
                input_7 = :input_7, com_input_7 = :com_input_7,
                input_8 = :input_8, com_input_8 = :com_input_8,
                input_9 = :input_9, com_input_9 = :com_input_9,
                input_10 = :input_10, com_input_10 = :com_input_10,
                input_11 = :input_11, com_input_11 = :com_input_11,
                input_12 = :input_12, com_input_12 = :com_input_12,
                input_13 = :input_13, com_input_13 = :com_input_13,
                input_14 = :input_14, com_input_14 = :com_input_14,
                input_15 = :input_15, com_input_15 = :com_input_15,
                input_16 = :input_16, com_input_16 = :com_input_16,
                input_17 = :input_17, com_input_17 = :com_input_17,
                input_18 = :input_18, com_input_18 = :com_input_18,
                input_19 = :input_19, com_input_19 = :com_input_19,
                input_20 = :input_20, com_input_20 = :com_input_20,
                input_21 = :input_21, com_input_21 = :com_input_21,
                input_22 = :input_22, com_input_22 = :com_input_22,
                input_23 = :input_23, com_input_23 = :com_input_23,
                input_24 = :input_24, com_input_24 = :com_input_24,
                input_25 = :input_25, com_input_25 = :com_input_25,
                input_26 = :input_26, com_input_26 = :com_input_26,
                input_27 = :input_27, com_input_27 = :com_input_27,
                input_28 = :input_28, com_input_28 = :com_input_28,
                input_29 = :input_29, com_input_29 = :com_input_29,
                input_30 = :input_30, com_input_30 = :com_input_30,
                input_31 = :input_31, com_input_31 = :com_input_31,
                input_32 = :input_32, com_input_32 = :com_input_32,
                input_33 = :input_33, com_input_33 = :com_input_33,
                input_34 = :input_34, com_input_34 = :com_input_34,
                input_35 = :input_35, com_input_35 = :com_input_35,
                input_36 = :input_36, com_input_36 = :com_input_36,
                input_37 = :input_37, com_input_37 = :com_input_37,
                input_38 = :input_38, com_input_38 = :com_input_38,
                input_39 = :input_39, com_input_39 = :com_input_39,
                input_40 = :input_40, com_input_40 = :com_input_40,
                input_41 = :input_41, com_input_41 = :com_input_41,
                input_42 = :input_42, com_input_42 = :com_input_42,
                input_43 = :input_43, com_input_43 = :com_input_43,
                input_44 = :input_44, com_input_44 = :com_input_44,
                input_45 = :input_45, com_input_45 = :com_input_45,
                input_46 = :input_46, com_input_46 = :com_input_46,
                input_47 = :input_47, com_input_47 = :com_input_47,
                input_48 = :input_48, com_input_48 = :com_input_48,
                input_49 = :input_49, com_input_49 = :com_input_49,
                input_50 = :input_50, com_input_50 = :com_input_50,
                input_51 = :input_51, com_input_51 = :com_input_51,
                input_52 = :input_52, com_input_52 = :com_input_52,
                input_53 = :input_53, com_input_53 = :com_input_53,
                input_54 = :input_54, com_input_54 = :com_input_54,
                input_55 = :input_55, com_input_55 = :com_input_55,
                input_56 = :input_56, com_input_56 = :com_input_56,
                input_57 = :input_57, com_input_57 = :com_input_57,
                input_58 = :input_58, com_input_58 = :com_input_58,
                frontImg = :frontImg, rearImg = :rearImg, leftImg = :leftImg, rightImg = :rightImg
                WHERE id = :id");

            // Bind de parámetros básicos
            $stmt->bindParam(":options", $datos["options"], PDO::PARAM_STR);
            $stmt->bindParam(":day", $datos["day"], PDO::PARAM_STR);
            $stmt->bindParam(":placadb", $datos["placadb"], PDO::PARAM_STR);

            // Bind dinámico para inputs 1-58
            for ($i = 1; $i <= 58; $i++) {
                $inputKey = "input_" . $i;
                $comInputKey = "com_input_" . $i;
                
                $stmt->bindParam(":" . $inputKey, $datos[$inputKey], PDO::PARAM_STR);
                $stmt->bindParam(":" . $comInputKey, $datos[$comInputKey], PDO::PARAM_STR);
            }

            // Bind de imágenes
            $stmt->bindParam(":frontImg", $datos["frontImg"], PDO::PARAM_STR);
            $stmt->bindParam(":rearImg", $datos["rearImg"], PDO::PARAM_STR);
            $stmt->bindParam(":leftImg", $datos["leftImg"], PDO::PARAM_STR);
            $stmt->bindParam(":rightImg", $datos["rightImg"], PDO::PARAM_STR);

            // ID para WHERE
            $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            } else {
                $errorInfo = $stmt->errorInfo();
                return "Error al ejecutar la consulta: " . $errorInfo[2];
            }

        } catch (PDOException $e) {
            error_log("Error en mdlActualizarCheckListConductor: " . $e->getMessage());
            return "Error: " . $e->getMessage();
        } finally {
            $stmt = null;
        }
    }

    /*=============================================
    ELIMINAR CHECK LIST CONDUCTOR
    =============================================*/
    public static function mdlEliminarCheckListConductor($tabla, $item, $valor)
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
            error_log("Error en mdlEliminarCheckListConductor: " . $e->getMessage());
            return "Error: " . $e->getMessage();
        } finally {
            $stmt = null;
        }
    }

    /*=============================================
    BUSCAR POR PLACA
    =============================================*/
    public static function mdlBuscarPorPlaca($tabla, $placa)
    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE placadb LIKE :placa ORDER BY fecha_registro DESC");
            $placaBusqueda = "%" . $placa . "%";
            $stmt->bindParam(":placa", $placaBusqueda, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            error_log("Error en mdlBuscarPorPlaca: " . $e->getMessage());
            return "Error: " . $e->getMessage();
        } finally {
            $stmt = null;
        }
    }

    /*=============================================
    BUSCAR POR FECHA
    =============================================*/
    public static function mdlBuscarPorFecha($tabla, $fechaInicio, $fechaFin)
    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE day BETWEEN :fecha_inicio AND :fecha_fin ORDER BY fecha_registro DESC");
            $stmt->bindParam(":fecha_inicio", $fechaInicio, PDO::PARAM_STR);
            $stmt->bindParam(":fecha_fin", $fechaFin, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            error_log("Error en mdlBuscarPorFecha: " . $e->getMessage());
            return "Error: " . $e->getMessage();
        } finally {
            $stmt = null;
        }
    }
}
?>