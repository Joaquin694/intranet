<?php

require_once "conexion.php";

class ModeloHistorialBPM{
    /*===========================================================
    HISTORIAL BPM
    =============================================================*/
    static public function mdlInsertHistorialBPM($tabla, $pk_bpm, $fragancia_aroma, $sabor, $sabor_residual, $acidez, $cuerpo, $dulzura,
    $balance, $taza_a_perfil, $puntaje_total, $defectos, $puntaje_final, $subdesarrollo, $sobre_desarrollo, $horneado, $quemado, $defectos_notas){
        Conexion::conectar()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = Conexion::conectar()->prepare("INSERT INTO `historial_bpm` (`fragancia_aroma`, `sabor`, `sabor_residual`, `acidez`, `cuerpo`, `dulzura`, `balance`, `taza_a_perfil`, `puntaje_total`, `subdesarrollo`,
        `sobre_desarrollo`, `horneado`, `quemado`, `defectos_notas`, `defectos`, `puntaje_final`, `created_at`, `fk_bpm`) VALUES ('$fragancia_aroma', '$sabor', '$sabor_residual', '$acidez',
        '$cuerpo', '$dulzura', '$balance', '$taza_a_perfil', '$puntaje_total', '$subdesarrollo', '$sobre_desarrollo', '$horneado', '$quemado', '$defectos_notas', '$defectos', '$puntaje_final', CURRENT_TIMESTAMP, '$pk_bpm')");

        /*$params = array( 
                    'fragancia_aroma' => $fragancia_aroma,
                    'sabor' => $sabor,
                    'sabor_residual' => $sabor_residual,
                    'acidez' => $acidez,
                    'cuerpo' => $cuerpo,
                    'dulzura' => $dulzura,
                    'balance' => $balance,
                    'taza_a_perfil' => $taza_a_perfil,
                    'puntaje_total' => $puntaje_total,
                    'defectos' => $defectos,
                    'puntaje_final' => $puntaje_final,
                    'subdesarrollo' => $subdesarrollo,
                    'sobre_desarrollo' => $sobre_desarrollo,
                    'horneado' => $horneado,
                    'quemado' => $quemado,
                    'defectos_notas' => $defectos_notas
               );*/

        $stmt->execute();

        $count = $stmt->rowCount();

        return $count;

    }

    static public function mdlUpdateHistorialBPM($tabla, $item, $valor, $pk_bpm, $fragancia_aroma, $sabor, $sabor_residual, $acidez, $cuerpo, $dulzura,
    $balance, $taza_a_perfil, $puntaje_total, $defectos, $puntaje_final, $subdesarrollo, $sobre_desarrollo, $horneado, $quemado, $defectos_notas){
        Conexion::conectar()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = Conexion::conectar()->prepare("UPDATE `$tabla` SET `fragancia_aroma` = '$fragancia_aroma', `sabor` = '$sabor', 
        `sabor_residual` = '$sabor_residual', `acidez` = '$acidez', `cuerpo` = '$cuerpo', `dulzura` = '$dulzura', `balance` = '$balance', 
        `taza_a_perfil` = '$taza_a_perfil', `puntaje_total` = '$puntaje_total', `subdesarrollo` = '$subdesarrollo',
        `sobre_desarrollo` = '$sobre_desarrollo', `horneado` = '$horneado', `quemado` = '$quemado', `defectos_notas` = '$defectos_notas', 
        `defectos` = '$defectos', `puntaje_final` = '$puntaje_final', `updated_at` = CURRENT_TIMESTAMP, `fk_bpm` = '$pk_bpm'
        WHERE `$item`='$valor'");

        $stmt->execute();

        $count = $stmt->rowCount();
        //print_r("Updated $count rows.\n");
        return $count;
        //return $stmt->fetch();

        /*if (!$stmt) {
            echo "\nPDO::errorInfo():\n";
            print_r(Conexion::conectar()->errorInfo());
        }*/

    }


    static public function mdlGetHistorialBPM($tabla, $item, $valor){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
        $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch();
    }
}