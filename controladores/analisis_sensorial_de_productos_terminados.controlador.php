<?php
if(isset($_POST['accion'])){
    if($_POST['accion'] == "ingASPT"){
        $ctrAnalisisSPT = new ControladorAnalisisSPT();
        $ctrAnalisisSPT->ctrIngresoAnalisisSPT();
    }
}


class ControladorAnalisisSPT{

    /*===========================================================
    INGRESO DE HISTORIAL BPM
    =============================================================*/
    public function ctrIngresoAnalisisSPT(){
        /*print_r($_POST);
        exit;*/
        if(isset($_POST["ingAnalisisSPT"]) && isset($_POST["pk_bpm"])){
            //switch ($_POST["accion"]) {
                //case 'guardar':
                    //CONSULTAR SI EXISTE O NO EXISTE

                    $tabla = "analisis_sensorial_de_productos_terminados";
                    $item = "fk_bpm";
                    $item_update = "pk_aspt";

                    include '../modelos/analisis_sensorial_de_productos_terminados.modelo.php';
                    $resp = ModeloAnalisisSPT::mdlGetAnalisisSPT($tabla, $item, $_POST["pk_bpm"]);
                    /*print_r($resp);
                    exit;*/
                    if($resp){//Existe registro - UPDATE
                        // COLOCANDO IMAGEN ARANIA
                        if($resp["url_img_para_basededatos"] && $resp["url_img_para_basededatos"] != null){
                            $eliminar_img = "../".$resp["url_img_para_basededatos"];
                            unlink($eliminar_img);
                        }
                        $nombre_imagen = $_POST['nombre_imagen'];
                        $img           = $_POST['image']; //data 'data:image/png;base64,~;
                        $img           = str_replace('data:image/png;base64,', '', $img);
                        $img           = str_replace(' ', '+', $img);
                        $data          = base64_decode($img);
                        $file          = "../vistas/img/aspt/" . $nombre_imagen;
                        $success       = file_put_contents($file, $data);

                        $pk_bpm = $_POST["pk_bpm"];
                        $url_img_para_basededatos = "vistas/img/aspt/" . $nombre_imagen;
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
                        
                        $respuesta = ModeloAnalisisSPT::mdlUpdateAnalisisSPT($tabla, $item_update, $resp["pk_aspt"],$pk_bpm, $url_img_para_basededatos, $fragancia_aroma, $sabor, $sabor_residual, $acidez, $cuerpo, $dulzura,
                        $balance, $taza_a_perfil, $puntaje_total, $defectos, $puntaje_final, $subdesarrollo, $sobre_desarrollo, $horneado, $quemado, $defectos_notas);
                        if( $respuesta == 1 ){
                            echo '<div style="padding: 10px;" id="success-alert" ><div class="alert alert-success" style="margin: 0px !important;">
                                <strong>Success!</strong>El registro se actualizo correctamente
                                </div></div>';
                        }else{
                            echo '<div style="padding: 10px;" id="success-alert" ><div class="alert alert-danger" style="margin: 0px !important;">
                            <strong>Error!</strong> Por favor, contáctese con soporte
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

                        // COLOCANDO IMAGEN ARANIA
                        $nombre_imagen = $_POST['nombre_imagen'];
                        $img           = $_POST['image']; //data 'data:image/png;base64,~;
                        $img           = str_replace('data:image/png;base64,', '', $img);
                        $img           = str_replace(' ', '+', $img);
                        $data          = base64_decode($img);
                        $file          = "../vistas/img/aspt/" . $nombre_imagen;
                        $success       = file_put_contents($file, $data);

                        $pk_bpm = $_POST["pk_bpm"];
                        $url_img_para_basededatos = "vistas/img/aspt/" . $nombre_imagen;
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
                        
                        $respuesta = ModeloAnalisisSPT::mdlInsertAnalisisSPT($tabla, $pk_bpm, $url_img_para_basededatos, $fragancia_aroma, $sabor, $sabor_residual, $acidez, $cuerpo, $dulzura,
                        $balance, $taza_a_perfil, $puntaje_total, $defectos, $puntaje_final, $subdesarrollo, $sobre_desarrollo, $horneado, $quemado, $defectos_notas);

                        if( $respuesta == 1 ){
                            echo '<div style="padding: 10px;" id="success-alert" ><div class="alert alert-success" style="margin: 0px !important;">
                                <strong>Success!</strong>El registro se guardo correctamente
                                </div></div>';
                        }else{
                            echo '<div style="padding: 10px;" id="success-alert" ><div class="alert alert-danger" style="margin: 0px !important;">
                            <strong>Error!</strong> Por favor, contáctese con soporte
                            </div></div>';
                        }
                    }

        }
    }
}
