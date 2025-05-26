<?php

require_once "conexion.php";

class ModeloAnalisisSPT{
    /*===========================================================
    HISTORIAL BPM
    =============================================================*/
    static public function mdlInsertAnalisisSPT($tabla, $pk_bpm, $url_img_para_basededatos, $fragancia_aroma, $sabor, $sabor_residual, $acidez, $cuerpo, $dulzura,
    $balance, $taza_a_perfil, $puntaje_total, $defectos, $puntaje_final, $subdesarrollo, $sobre_desarrollo, $horneado, $quemado, $defectos_notas){
        $created_at = date("Y-m-d H:i:s");
        Conexion::conectar()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (url_img_para_basededatos,fragancia_aroma, sabor, sabor_residual, acidez, cuerpo, dulzura, balance, taza_a_perfil, puntaje_total, subdesarrollo,
        sobre_desarrollo, horneado, quemado, defectos_notas, defectos, puntaje_final, created_at, fk_bpm) 
        VALUES (:url_img_para_basededatos, :fragancia_aroma, :sabor, :sabor_residual, :acidez,
        :cuerpo, :dulzura, :balance, :taza_a_perfil, :puntaje_total, :subdesarrollo, :sobre_desarrollo, :horneado, :quemado, :defectos_notas, :defectos, :puntaje_final, :created_at, :fk_bpm)");

        $stmt->bindParam(":url_img_para_basededatos", $url_img_para_basededatos, PDO::PARAM_STR);
        $stmt->bindParam(":fragancia_aroma", $fragancia_aroma, PDO::PARAM_STR);
        $stmt->bindParam(":sabor", $sabor, PDO::PARAM_STR);
        $stmt->bindParam(":sabor_residual", $sabor_residual, PDO::PARAM_STR);
        $stmt->bindParam(":acidez", $acidez, PDO::PARAM_STR);
        $stmt->bindParam(":cuerpo", $cuerpo, PDO::PARAM_STR);
        $stmt->bindParam(":dulzura", $dulzura, PDO::PARAM_STR);
        $stmt->bindParam(":balance", $balance, PDO::PARAM_STR);
        $stmt->bindParam(":taza_a_perfil", $taza_a_perfil, PDO::PARAM_STR);
        $stmt->bindParam(":puntaje_total", $puntaje_total, PDO::PARAM_STR);
        $stmt->bindParam(":subdesarrollo", $subdesarrollo, PDO::PARAM_STR);
        $stmt->bindParam(":sobre_desarrollo", $sobre_desarrollo, PDO::PARAM_STR);
        $stmt->bindParam(":horneado", $horneado, PDO::PARAM_STR);
        $stmt->bindParam(":quemado", $quemado, PDO::PARAM_STR);
        $stmt->bindParam(":defectos_notas", $defectos_notas, PDO::PARAM_STR);
        $stmt->bindParam(":defectos", $defectos, PDO::PARAM_STR);
        $stmt->bindParam(":puntaje_final", $puntaje_final, PDO::PARAM_STR);
        $stmt->bindParam(":created_at", $created_at, PDO::PARAM_STR);
        $stmt->bindParam(":fk_bpm", $pk_bpm, PDO::PARAM_STR);

        $stmt->execute();

        $count = $stmt->rowCount();

        return $count;

    }

    static public function mdlUpdateAnalisisSPT($tabla, $item, $valor, $pk_bpm, $url_img_para_basededatos, $fragancia_aroma, $sabor, $sabor_residual, $acidez, $cuerpo, $dulzura,
    $balance, $taza_a_perfil, $puntaje_total, $defectos, $puntaje_final, $subdesarrollo, $sobre_desarrollo, $horneado, $quemado, $defectos_notas){
        $updated_at = date("Y-m-d H:i:s");
        Conexion::conectar()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET url_img_para_basededatos = :url_img_para_basededatos, fragancia_aroma = :fragancia_aroma, sabor = :sabor, 
        sabor_residual = :sabor_residual, acidez = :acidez, cuerpo = :cuerpo, dulzura = :dulzura, balance = :balance, 
        taza_a_perfil = :taza_a_perfil, puntaje_total = :puntaje_total, subdesarrollo = :subdesarrollo,
        sobre_desarrollo = :sobre_desarrollo, horneado = :horneado, quemado = :quemado, defectos_notas = :defectos_notas, 
        defectos = :defectos, puntaje_final = :puntaje_final, updated_at = :updated_at, fk_bpm = :fk_bpm
        WHERE pk_aspt = :pk_aspt");

        $stmt->bindParam(":pk_aspt", $valor, PDO::PARAM_STR);

        $stmt->bindParam(":url_img_para_basededatos", $url_img_para_basededatos, PDO::PARAM_STR);
        $stmt->bindParam(":fragancia_aroma", $fragancia_aroma, PDO::PARAM_STR);
        $stmt->bindParam(":sabor", $sabor, PDO::PARAM_STR);
        $stmt->bindParam(":sabor_residual", $sabor_residual, PDO::PARAM_STR);
        $stmt->bindParam(":acidez", $acidez, PDO::PARAM_STR);
        $stmt->bindParam(":cuerpo", $cuerpo, PDO::PARAM_STR);
        $stmt->bindParam(":dulzura", $dulzura, PDO::PARAM_STR);
        $stmt->bindParam(":balance", $balance, PDO::PARAM_STR);
        $stmt->bindParam(":taza_a_perfil", $taza_a_perfil, PDO::PARAM_STR);
        $stmt->bindParam(":puntaje_total", $puntaje_total, PDO::PARAM_STR);
        $stmt->bindParam(":subdesarrollo", $subdesarrollo, PDO::PARAM_STR);
        $stmt->bindParam(":sobre_desarrollo", $sobre_desarrollo, PDO::PARAM_STR);
        $stmt->bindParam(":horneado", $horneado, PDO::PARAM_STR);
        $stmt->bindParam(":quemado", $quemado, PDO::PARAM_STR);
        $stmt->bindParam(":defectos_notas", $defectos_notas, PDO::PARAM_STR);
        $stmt->bindParam(":defectos", $defectos, PDO::PARAM_STR);
        $stmt->bindParam(":puntaje_final", $puntaje_final, PDO::PARAM_STR);
        $stmt->bindParam(":updated_at", $updated_at, PDO::PARAM_STR);
        $stmt->bindParam(":fk_bpm", $pk_bpm, PDO::PARAM_STR);
        

        $stmt->execute();

        $count = $stmt->rowCount();
        //print_r("Updated $count rows.\n");
        return $count;
        //return $stmt->fetch();

        /*if (!$stmt) {
            echo "\nPDO::errorInfo():\n";
            print_r(Conexion::conectar()->errorInfo());
        }*/

        /*if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }*/

        //$stmt->close();
        //$stmt = null;

    }


    static public function mdlGetAnalisisSPT($tabla, $item, $valor){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
        $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch();
    }
}