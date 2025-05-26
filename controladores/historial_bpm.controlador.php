<?php

class ControladorHistorialBPM{

    /*===========================================================
    INGRESO DE HISTORIAL BPM
    =============================================================*/
    public function ctrIngresoHistorialBPM(){
        /*print_r($_POST);
        exit;*/
        if(isset($_POST["ingHistorialBPM"]) && isset($_POST["pk_bpm"])){

            //switch ($_POST["accion"]) {
                //case 'guardar':
                    //CONSULTAR SI EXISTE O NO EXISTE

                    $tabla = "historial_bpm";
                    $item = "fk_bpm";
                    $item_update = "pk_historial_bpm";

                    $resp = ModeloHistorialBPM::mdlGetHistorialBPM($tabla, $item, $_POST["pk_bpm"]);
                    /*print_r($resp);
                    exit;*/
                    if($resp){//Existe registro - UPDATE
                        $pk_bpm = $_POST["pk_bpm"];
                        $fragancia_aroma = $_POST["fragancia_aroma"];
                        $sabor = $_POST["sabor"];
                        $sabor_residual = $_POST["sabor_residual"];
                        $acidez = $_POST["acidez"];
                        $cuerpo = $_POST["cuerpo"];
                        $dulzura = $_POST["dulzura"];
                        $balance = $_POST["balance"];
                        $taza_a_perfil = $_POST["taza_a_perfil"];
                        $puntaje_total = $_POST["puntaje_total"];
                        $defectos = $_POST["defectos"];
                        $puntaje_final = $_POST["puntaje_final"];
                        $subdesarrollo = $_POST["subdesarrollo"];
                        $sobre_desarrollo = $_POST["sobre_desarrollo"];
                        $horneado = $_POST["horneado"];
                        $quemado = $_POST["quemado"];
                        $defectos_notas = $_POST["defectos_notas"];
                        
                        $respuesta = ModeloHistorialBPM::mdlUpdateHistorialBPM($tabla, $item_update, $resp["pk_historial_bpm"],$pk_bpm, $fragancia_aroma, $sabor, $sabor_residual, $acidez, $cuerpo, $dulzura,
                        $balance, $taza_a_perfil, $puntaje_total, $defectos, $puntaje_final, $subdesarrollo, $sobre_desarrollo, $horneado, $quemado, $defectos_notas);
                        if( $respuesta == 1 ){
                            echo '<div style="padding: 10px;"><div class="alert alert-success" style="margin: 0px !important;">
                                <strong>Success!</strong>El registro se actualizo correctamente
                                </div></div>';
                        }else{
                            echo '<div style="padding: 10px;"><div class="alert alert-danger" style="margin: 0px !important;">
                            <strong>Success!</strong>Hubo un error, contáctese con soporte
                            </div></div>';
                        }


                        //var_dump($respuesta);
                        /*if($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $_POST["ingPassword"]){

                            $_SESSION["iniciarSesion"] = "ok";

                            echo '<script>
                                window.location = "inicio";
                            </script>';
                            
                        }else{
                            echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
                        }*/
                    }else{//No existe registro - INSERT

                        $pk_bpm = $_POST["pk_bpm"];
                        $fragancia_aroma = $_POST["fragancia_aroma"];
                        $sabor = $_POST["sabor"];
                        $sabor_residual = $_POST["sabor_residual"];
                        $acidez = $_POST["acidez"];
                        $cuerpo = $_POST["cuerpo"];
                        $dulzura = $_POST["dulzura"];
                        $balance = $_POST["balance"];
                        $taza_a_perfil = $_POST["taza_a_perfil"];
                        $puntaje_total = $_POST["puntaje_total"];
                        $defectos = $_POST["defectos"];
                        $puntaje_final = $_POST["puntaje_final"];
                        $subdesarrollo = $_POST["subdesarrollo"];
                        $sobre_desarrollo = $_POST["sobre_desarrollo"];
                        $horneado = $_POST["horneado"];
                        $quemado = $_POST["quemado"];
                        $defectos_notas = $_POST["defectos_notas"];
                        
                        $respuesta = ModeloHistorialBPM::mdlInsertHistorialBPM($tabla, $pk_bpm, $fragancia_aroma, $sabor, $sabor_residual, $acidez, $cuerpo, $dulzura,
                        $balance, $taza_a_perfil, $puntaje_total, $defectos, $puntaje_final, $subdesarrollo, $sobre_desarrollo, $horneado, $quemado, $defectos_notas);

                        if( $respuesta == 1 ){
                            echo '<br><div class="alert alert-success">El registro se guardo correctamente</div>';
                        }else{
                            echo '<br><div class="alert alert-danger">Hubo un error, contáctese con soporte</div>';
                        }
                    }

        }
    }
}
