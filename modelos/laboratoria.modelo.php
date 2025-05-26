<?php
require_once "conexion.php";
class ModeloLaboratoria
{

    /*=============================================
    --- UPDATE ESTADO LABORATORIO
    =============================================*/
    public static  function changeEstadoLabo($picadoEstado, $idFicha_laboratorio_)
    {
        $stmt = Conexion::conectar()->query("UPDATE `FCH_CONTROL_DE_CALIDAD` SET `estado`='$picadoEstado'
                where `id`='$idFicha_laboratorio_'");
        echo '<script type="text/javascript">  $(".spinerGiration2").addClass("d-none"); </script>';
    }

    /*=============================================
    --- GENERAR FICHA LABORATORIO A PARTIR DE UNA BPM
    =============================================*/
    public static  function new_ficha_laboratorio_desde_una_Bpm($pk_bpm)
    {
        // SELECT TO CABECERA BPM
        $stmt = Conexion::conectar()->query("SELECT * FROM `bpm` where pk_bpm='$pk_bpm'");

        foreach ($stmt as $row) {

            $pk_bpm                         = $row["pk_bpm"];
            $correlativo                    = $row["correlativo"];
            $codigo                         = $row["codigo"];
            $aprobado_por                   = $row["aprobado_por"];
            $fecha_registro_documento       = $row["fecha_registro_documento"];
            $pagina                         = $row["pagina"];
            $lote                           = $row["lote"];
            $titulo                         = $row["titulo"];
            $subtitulo                      = $row["subtitulo"];
            $fecha_atencion                 = $row["fecha_atencion"];
            $nombre_cliente                 = $row["nombre_cliente"];
            $nombre_usuario                 = $row["nombre_usuario"];
            $tipo_cafe                      = $row["tipo_cafe"];
            $materia_extraña               = $row["materia_extraña"];
            $plagas_enfermedades            = $row["plagas_enfermedades"];
            $lugar_procedencia              = $row["lugar_procedencia"];
            $peso                           = $row["peso"];
            $presentacion                   = $row["presentacion"];
            $variedad                       = $row["variedad"];
            $condicion_de_transporte        = $row["condicion_de_transporte"];
            $envase                         = $row["envase"];
            $certificacion                  = $row["certificacion"];
            $fecha_entrega                  = $row["fecha_entrega"];
            $humedad                        = $row["humedad"];
            $conclusion                     = $row["conclusion"];
            $observaciones                  = $row["observaciones"];
            $ejecutor_asistente             = $row["ejecutor_asistente"];
            $jefe_planta                    = $row["jefe_planta"];
            $doc_identidad                  = $row["doc_identidad"];
            $estado                         = $row["estado"];
            $titulof1                       = $row["titulof1"];
            $subtitulo_rbpm2                = $row["subtitulo_rbpm2"];
            $codigo_rbpm2                   = $row["codigo_rbpm2"];
            $aprobado_por_rbpm2             = $row["aprobado_por_rbpm2"];
            $fecha_registro_documento_rbpm2 = $row["fecha_registro_documento_rbpm2"];
            $pagina_rbpm2                   = $row["pagina_rbpm2"];
            $lote_rbpm2                     = $row["lote_rbpm2"];
            $codmatpri                      = $row["codmatpri"];
            $Fch2telefonocliente            = $row["Fch2telefonocliente"];
            $idCantProdA                    = $row["idCantProdA"];
            $Fch2correo                     = $row["Fch2correo"];
            $Fch2observaciones              = $row["Fch2observaciones"];
            $idTostAuto                     = $row["idTostAuto"];
            $krsls                          = $row["krsls"];
            $kggresiduales                  = $row["kggresiduales"];
            $gramosPendientes               = $row["gramosPendientes"];
            $subSolesTotalProductoAnexos    = $row["subSolesTotalProductoAnexos"];
            $subGramosTotalProductoAnexos   = $row["subGramosTotalProductoAnexos"];
            $totalsrvciss                   = $row["totalsrvciss"];
            $totalcobbls                    = $row["totalcobbls"];
            $totalgeneral                   = $row["totalgeneral"];
            $ultimo_acceso                  = $row["ultimo_acceso"];
        }
        ?>
        <script type="text/javascript">
            $( "[name=1fecha]" ).val("<?php echo $fecha_atencion; ?>");
            $( "[name=1nombrecliente]" ).val("<?php echo $nombre_cliente; ?>");
            $( "[name=1quienrecibe]" ).val("<?php echo $nombre_usuario; ?>");
            $( "[name=1cafe]" ).val("<?php echo $tipo_cafe; ?>");

            $( "[name=1materiaextrana]" ).val("<?php echo $materia_extraña; ?>");


            $( "[name=1procedencia]" ).val("<?php echo $lugar_procedencia; ?>");
            $( "[name=idTipCaf]" ).val("<?php echo $peso; ?>"); /*peso*/

            $( "[name=1altitud]" ).val("<?php echo $variedad; ?>");
            $( "[name=doc_identidad]" ).val("<?php echo $doc_identidad; ?>");
            $( "[name=1observaciones]" ).val("<?php echo $observaciones; ?>");
            $( "[name=1humedad]" ).val("<?php echo $humedad; ?>");
            $( "[name=1fechaentrega]" ).val("<?php echo $fecha_entrega; ?>");

            $( "[name=fechsanalisis]" ).val("<?php echo $fecha_atencion; ?>");


            var today = moment().format('YYYY-MM-DD');
            $("[name=1fecha],[name=hoyfecha]").val(today);


            $( "#acodeficha" ).html("MP-");

            $( "#idcodrbpm1" ).val("<?php echo $lote; ?>");

            $("#flechis").addClass("d-none");

        </script>
        <?php
}

    /*=============================================
    --- GENERAR FICHA LABORATORIO DIRECTA
    =============================================*/
    public static  function new_ficha_laboratorio_directa()
    {
        // SELECT TO CABECERA BPM
        $stmt = Conexion::conectar()->query("SELECT correlativo FROM `FCH_CONTROL_DE_CALIDAD` WHERE     letra_tipo_codelabo like '%ML-%'");

        foreach ($stmt as $rowi) {
            $correlativo = $rowi["correlativo"];
        }

        if ($correlativo > 0) {
            # code...
            $correlativoadd = $correlativo + 1;
        } else {
            $correlativoadd = 1;
        }
        ?>
        <script type="text/javascript">
            $("#flechis").removeClass("d-none");
            $( "#acodeficha" ).html("ML-");
            var codigito_ = moment().format('DDMMYY');

            $( "#idcodrbpm1" ).val("<?php echo $correlativoadd; ?>"+codigito_);
            $("#listClient").html('<input  list="brow" disabled type="text" name="1nombrecliente" id="fcc_nomcliente" class="form-control"  style="cursor:pointer !important; cursor: hand !important" ><datalist id="brow"></datalist>');

            $("input[name=1nombrecliente]").focusout(function(){
                var clienteSeleccionado=$(this).val();
                var cod="autoCompletingDatosDeclienteSelecto";

                var dataen =
                'clienteSeleccionado=' +clienteSeleccionado+
                '&cod=' +cod;
                $.ajax({
                    type: 'post',
                    url:'controladores/laboratoria.controlador.php',
                    data:dataen,
                    success:function(resp){
                        $("#ejecutor_main").html(resp);
                    }
                });
                return false;
            });

        </script>
        <?php
}

    /*=============================================
    --- GENERAR FICHA LABORATORIO DIRECTA
    =============================================*/
    public static  function cargar_list_clientes_laboratoria()
    {
        // SELECT TO CABECERA BPM
        $stmt = Conexion::conectar()->query("SELECT * FROM `clientes` ORDER BY nombre");

        foreach ($stmt as $rowi) {
            $id                     = $rowi["id"];
            echo $body_list_clinete = '<option  value="' . $rowi["nombre"] . '">';
        }

    }

    /*=============================================
    --- GENERAR FICHA LABORATORIO DIRECTA
    =============================================*/
    public static  function autoComple_tingDatosDeclienteSelecto($clienteSeleccionado)
    {
        // SELECT TO CABECERA BPM
        $stmt = Conexion::conectar()->query("SELECT * FROM `clientes` WHERE nombre='$clienteSeleccionado' LIMIT 1 ");
        foreach ($stmt as $rowi) {
            $id               = $rowi["id"];
            $nombre           = $rowi["nombre"];
            $documento        = $rowi["documento"];
            $email            = $rowi["email"];
            $telefono         = $rowi["telefono"];
            $direccion        = $rowi["direccion"];
            $fecha_nacimiento = $rowi["fecha_nacimiento"];
            $compras          = $rowi["compras"];
            $ultima_compra    = $rowi["ultima_compra"];
            $fecha            = $rowi["fecha"];
            $variedad_altitud = $rowi["variedad_altitud"];
            $marca            = $rowi["marca"];
            $tipo_cliente     = $rowi["tipo_cliente"];
            $sexo             = $rowi["sexo"];
        }

        ?>
        <script type="text/javascript">
            $( "#doc_identidad" ).val("<?php echo $documento; ?>");
            $( "#1altitud" ).val("<?php echo $variedad_altitud; ?>");
            $( "#fcc_lugprocedencia" ).val("<?php echo $direccion; ?>");
            var today = moment().format('YYYY-MM-DD');
            $("[name=1fecha],[name=hoyfecha]").val(today);
        </script>
        <?php

    }

    /*=============================================
    --- GENERAR FICHA LABORATORIO DIRECTA
    =============================================*/
    public static  function insert_into_laboratoria($letra_tipo_codelabo,
        $idcodrbpm1,
        $url_img_para_basededatos,
        $fecha,
        $doc_identidad,
        $nombrecliente,
        $quienrecibe,
        $cafe,
        $materiaextrana,
        $procedencia,
        $idTipCaf,
        $placavehiculo,
        $altitud,
        $fechaentrega,
        $temperatura,
        $humedad,
        $observaciones,
        $motivorechazo,
        $rechazo,
        $idfechaentrega,
        $obsfinales,
        $tipoanal,
        $samplenumero,
        $fragrance,
        $flavor,
        $acidity,
        $sweetness,
        $body,
        $clean,
        $overall,
        $otal,
        $aftertaste,
        $balance,
        $uniformity,
        $unoextra,
        $dosextra,
        $tresextra,
        $notes,
        $finalscore,
        $varidad,
        $cosecha,
        $analisis_de_pergamino,
        $proceso_organico,
        $proceso_convencional,
        $peso_perg,
        $h_perg,
        $color_perg,
        $olor_perg,
        $normal_perg,
        $fresco_perg,
        $disparejo_perg,
        $viejo_perg,
        $fermento_perg,
        $negruzco_perg,
        $terroso_perg,
        $otros_perg,
        $hierbas_perg,
        $moho_perg,
        $manchado_perg,
        $peso_oro,
        $h_oro,
        $color_oro,
        $olor_oro,
        $normal_oro,
        $fresco_oro,
        $azulado_oro,
        $viejo_oro,
        $disparejo_oro,
        $fermento_oro,
        $amarillo_oro,
        $terroso_oro,
        $traslucido_oro,
        $hierbas_oro,
        $moho_oro,
        $blanqueado_oro,
        $tbl2_observ,
        $tbl2_peso,
        $tbl2_porcentaj,
        $tbl2_pesouno,
        $tbl2_porce_uno,
        $tbl2_pesodos,
        $tbl2_porce_dos,
        $tbl2_pesotres,
        $tbl2_porce_tres,
        $tbl2_pesocuatro,
        $tbl2_porce_cuatro,
        $tbl2_pesocinco,
        $tbl2_porce_cinco,
        $tbl2_pesoseis,
        $tbl2_porce_seis,
        $tbl2_pesosiete,
        $tbl2_porce_siete,
        $total_granu,
        $porce_granu,
        $exp_granonegro,
        $exp_a,
        $exp_granoagrio,
        $exp_b,
        $exp_cerezaseca,
        $exp_c,
        $exp_danohongo,
        $exp_d,
        $exp_materiaetrana,
        $exp_e,
        $exp_brocadosevero,
        $exp_f,
        $exp_parcialnegro,
        $exp_g,
        $exp_parcialagrio,
        $exp_h,
        $exp_pergamino,
        $exp_i,
        $exp_flotblan,
        $exp_j,
        $exp_inmaduro,
        $exp_k,
        $exp_averana,
        $exp_l,
        $exp_conchas,
        $exp_m,
        $exp_partmord,
        $exp_n,
        $exp_cascara,
        $exp_o,
        $exp_brocadoleve,
        $exp_p,
        $total_rata_expo,
        $i50pesodeftotal,
        $i51pordeftotal,
        $totl_rendimiento_export,
        $cod) {
        // ACCION   DE LA FUNCION

        // ------------------------------------------------------------------------------------------------------------------------------------------------
        if ($letra_tipo_codelabo == 'ML-') {
            # code...
            // SELECT TO CABECERA BPM
            $stmt = Conexion::conectar()->query("SELECT correlativo FROM `FCH_CONTROL_DE_CALIDAD` WHERE     letra_tipo_codelabo like '%ML-%'");

            foreach ($stmt as $rowi) {$correlativo = $rowi["correlativo"];}

            if ($correlativo > 0) {
                $correlativo = $correlativo + 1;
            } else {
                $correlativo = 1;
            }

            $idcodrbpm1=substr($idcodrbpm1, -6);
            $idcodrbpm1=$correlativo.''.$idcodrbpm1;
        } else {
            $correlativo = substr($idcodrbpm1, 0, -6);
        }
        // ------------------------------------------------------------------------------------------------------------------------------------------------

         $query_laboratorio_insert = Conexion::conectar()->query("INSERT INTO `FCH_CONTROL_DE_CALIDAD` (`id`, `letra_tipo_codelabo`, `correlativo`, `idcodrbpm1`, `url_img_para_basededatos`, `fecha`, `doc_identidad`, `nombrecliente`, `quienrecibe`, `cafe`, `materiaextrana`, `procedencia`, `idTipCaf`, `placavehiculo`, `altitud`, `fechaentrega`, `temperatura`, `humedad`, `observaciones`, `motivorechazo`, `rechazo`, `idfechaentrega`, `obsfinales`, `tipoanal`, `samplenumero`, `fragrance`, `flavor`, `acidity`, `sweetness`, `body`, `clean`, `overall`, `otal`, `aftertaste`, `balance`, `uniformity`, `unoextra`, `dosextra`, `tresextra`, `notes`, `finalscore`, `varidad`, `cosecha`, `analisis_de_pergamino`, `proceso_organico`, `proceso_convencional`, `peso_perg`, `h_perg`, `color_perg`, `olor_perg`, `normal_perg`, `fresco_perg`, `disparejo_perg`, `viejo_perg`, `fermento_perg`, `negruzco_perg`, `terroso_perg`, `otros_perg`, `hierbas_perg`, `moho_perg`, `manchado_perg`, `peso_oro`, `h_oro`, `color_oro`, `olor_oro`, `normal_oro`, `fresco_oro`, `azulado_oro`, `viejo_oro`, `disparejo_oro`, `fermento_oro`, `amarillo_oro`, `terroso_oro`, `traslucido_oro`, `hierbas_oro`, `moho_oro`, `blanqueado_oro`, `tbl2_observ`, `tbl2_peso`, `tbl2_porcentaj`, `tbl2_pesouno`, `tbl2_porce_uno`, `tbl2_pesodos`, `tbl2_porce_dos`, `tbl2_pesotres`, `tbl2_porce_tres`, `tbl2_pesocuatro`, `tbl2_porce_cuatro`, `tbl2_pesocinco`, `tbl2_porce_cinco`, `tbl2_pesoseis`, `tbl2_porce_seis`, `tbl2_pesosiete`, `tbl2_porce_siete`, `total_granu`, `porce_granu`, `exp_granonegro`, `exp_a`, `exp_granoagrio`, `exp_b`, `exp_cerezaseca`, `exp_c`, `exp_danohongo`, `exp_d`, `exp_materiaetrana`, `exp_e`, `exp_brocadosevero`, `exp_f`, `exp_parcialnegro`, `exp_g`, `exp_parcialagrio`, `exp_h`, `exp_pergamino`, `exp_i`, `exp_flotblan`, `exp_j`, `exp_inmaduro`, `exp_k`, `exp_averana`, `exp_l`, `exp_conchas`, `exp_m`, `exp_partmord`, `exp_n`, `exp_cascara`, `exp_o`, `exp_brocadoleve`, `exp_p`, `total_rata_expo`, `i50pesodeftotal`, `i51pordeftotal`, `totl_rendimiento_export`, `fecha_create_registro`) VALUES (NULL, '$letra_tipo_codelabo',
            '$correlativo',
            '$idcodrbpm1',
            '$url_img_para_basededatos',
            '$fecha',
            '$doc_identidad',
            '$nombrecliente',
            '$quienrecibe',
            '$cafe',
            '$materiaextrana',
            '$procedencia',
            '$idTipCaf',
            '$placavehiculo',
            '$altitud',
            '$fechaentrega',
            '$temperatura',
            '$humedad',
            '$observaciones',
            '$motivorechazo',
            '$rechazo',
            '$idfechaentrega',
            '$obsfinales',
            '$tipoanal',
            '$samplenumero',
            '$fragrance',
            '$flavor',
            '$acidity',
            '$sweetness',
            '$body',
            '$clean',
            '$overall',
            '$otal',
            '$aftertaste',
            '$balance',
            '$uniformity',
            '$unoextra',
            '$dosextra',
            '$tresextra',
            '$notes',
            '$finalscore',
            '$varidad',
            '$cosecha',
            '$analisis_de_pergamino',
            '$proceso_organico',
            '$proceso_convencional',
            '$peso_perg',
            '$h_perg',
            '$color_perg',
            '$olor_perg',
            '$normal_perg',
            '$fresco_perg',
            '$disparejo_perg',
            '$viejo_perg',
            '$fermento_perg',
            '$negruzco_perg',
            '$terroso_perg',
            '$otros_perg',
            '$hierbas_perg',
            '$moho_perg',
            '$manchado_perg',
            '$peso_oro',
            '$h_oro',
            '$color_oro',
            '$olor_oro',
            '$normal_oro',
            '$fresco_oro',
            '$azulado_oro',
            '$viejo_oro',
            '$disparejo_oro',
            '$fermento_oro',
            '$amarillo_oro',
            '$terroso_oro',
            '$traslucido_oro',
            '$hierbas_oro',
            '$moho_oro',
            '$blanqueado_oro',
            '$tbl2_observ',
            '$tbl2_peso',
            '$tbl2_porcentaj',
            '$tbl2_pesouno',
            '$tbl2_porce_uno',
            '$tbl2_pesodos',
            '$tbl2_porce_dos',
            '$tbl2_pesotres',
            '$tbl2_porce_tres',
            '$tbl2_pesocuatro',
            '$tbl2_porce_cuatro',
            '$tbl2_pesocinco',
            '$tbl2_porce_cinco',
            '$tbl2_pesoseis',
            '$tbl2_porce_seis',
            '$tbl2_pesosiete',
            '$tbl2_porce_siete',
            '$total_granu',
            '$porce_granu',
            '$exp_granonegro',
            '$exp_a',
            '$exp_granoagrio',
            '$exp_b',
            '$exp_cerezaseca',
            '$exp_c',
            '$exp_danohongo',
            '$exp_d',
            '$exp_materiaetrana',
            '$exp_e',
            '$exp_brocadosevero',
            '$exp_f',
            '$exp_parcialnegro',
            '$exp_g',
            '$exp_parcialagrio',
            '$exp_h',
            '$exp_pergamino',
            '$exp_i',
            '$exp_flotblan',
            '$exp_j',
            '$exp_inmaduro',
            '$exp_k',
            '$exp_averana',
            '$exp_l',
            '$exp_conchas',
            '$exp_m',
            '$exp_partmord',
            '$exp_n',
            '$exp_cascara',
            '$exp_o',
            '$exp_brocadoleve',
            '$exp_p',
            '$total_rata_expo',
            '$i50pesodeftotal',
            '$i51pordeftotal',
            '$totl_rendimiento_export', CURRENT_TIMESTAMP)");

            
            // $queryttoo="INSERT INTO `FCH_CONTROL_DE_CALIDAD` (`id`, `letra_tipo_codelabo`, `correlativo`, `idcodrbpm1`, `url_img_para_basededatos`, `fecha`, `doc_identidad`, `nombrecliente`, `quienrecibe`, `cafe`, `materiaextrana`, `procedencia`, `idTipCaf`, `placavehiculo`, `altitud`, `fechaentrega`, `temperatura`, `humedad`, `observaciones`, `motivorechazo`, `rechazo`, `idfechaentrega`, `obsfinales`, `tipoanal`, `samplenumero`, `fragrance`, `flavor`, `acidity`, `sweetness`, `body`, `clean`, `overall`, `otal`, `aftertaste`, `balance`, `uniformity`, `unoextra`, `dosextra`, `tresextra`, `notes`, `finalscore`, `varidad`, `cosecha`, `analisis_de_pergamino`, `proceso_organico`, `proceso_convencional`, `peso_perg`, `h_perg`, `color_perg`, `olor_perg`, `normal_perg`, `fresco_perg`, `disparejo_perg`, `viejo_perg`, `fermento_perg`, `negruzco_perg`, `terroso_perg`, `otros_perg`, `hierbas_perg`, `moho_perg`, `manchado_perg`, `peso_oro`, `h_oro`, `color_oro`, `olor_oro`, `normal_oro`, `fresco_oro`, `azulado_oro`, `viejo_oro`, `disparejo_oro`, `fermento_oro`, `amarillo_oro`, `terroso_oro`, `traslucido_oro`, `hierbas_oro`, `moho_oro`, `blanqueado_oro`, `tbl2_observ`, `tbl2_peso`, `tbl2_porcentaj`, `tbl2_pesouno`, `tbl2_porce_uno`, `tbl2_pesodos`, `tbl2_porce_dos`, `tbl2_pesotres`, `tbl2_porce_tres`, `tbl2_pesocuatro`, `tbl2_porce_cuatro`, `tbl2_pesocinco`, `tbl2_porce_cinco`, `tbl2_pesoseis`, `tbl2_porce_seis`, `tbl2_pesosiete`, `tbl2_porce_siete`, `total_granu`, `porce_granu`, `exp_granonegro`, `exp_a`, `exp_granoagrio`, `exp_b`, `exp_cerezaseca`, `exp_c`, `exp_danohongo`, `exp_d`, `exp_materiaetrana`, `exp_e`, `exp_brocadosevero`, `exp_f`, `exp_parcialnegro`, `exp_g`, `exp_parcialagrio`, `exp_h`, `exp_pergamino`, `exp_i`, `exp_flotblan`, `exp_j`, `exp_inmaduro`, `exp_k`, `exp_averana`, `exp_l`, `exp_conchas`, `exp_m`, `exp_partmord`, `exp_n`, `exp_cascara`, `exp_o`, `exp_brocadoleve`, `exp_p`, `total_rata_expo`, `i50pesodeftotal`, `i51pordeftotal`, `totl_rendimiento_export`, `fecha_create_registro`) VALUES (NULL, '$letra_tipo_codelabo',
            // '$correlativo',
            // '$idcodrbpm1',
            // '$url_img_para_basededatos',
            // '$fecha',
            // '$doc_identidad',
            // '$nombrecliente',
            // '$quienrecibe',
            // '$cafe',
            // '$materiaextrana',
            // '$procedencia',
            // '$idTipCaf',
            // '$placavehiculo',
            // '$altitud',
            // '$fechaentrega',
            // '$temperatura',
            // '$humedad',
            // '$observaciones',
            // '$motivorechazo',
            // '$rechazo',
            // '$idfechaentrega',
            // '$obsfinales',
            // '$tipoanal',
            // '$samplenumero',
            // '$fragrance',
            // '$flavor',
            // '$acidity',
            // '$sweetness',
            // '$body',
            // '$clean',
            // '$overall',
            // '$otal',
            // '$aftertaste',
            // '$balance',
            // '$uniformity',
            // '$unoextra',
            // '$dosextra',
            // '$tresextra',
            // '$notes',
            // '$finalscore',
            // '$varidad',
            // '$cosecha',
            // '$analisis_de_pergamino',
            // '$proceso_organico',
            // '$proceso_convencional',
            // '$peso_perg',
            // '$h_perg',
            // '$color_perg',
            // '$olor_perg',
            // '$normal_perg',
            // '$fresco_perg',
            // '$disparejo_perg',
            // '$viejo_perg',
            // '$fermento_perg',
            // '$negruzco_perg',
            // '$terroso_perg',
            // '$otros_perg',
            // '$hierbas_perg',
            // '$moho_perg',
            // '$manchado_perg',
            // '$peso_oro',
            // '$h_oro',
            // '$color_oro',
            // '$olor_oro',
            // '$normal_oro',
            // '$fresco_oro',
            // '$azulado_oro',
            // '$viejo_oro',
            // '$disparejo_oro',
            // '$fermento_oro',
            // '$amarillo_oro',
            // '$terroso_oro',
            // '$traslucido_oro',
            // '$hierbas_oro',
            // '$moho_oro',
            // '$blanqueado_oro',
            // '$tbl2_observ',
            // '$tbl2_peso',
            // '$tbl2_porcentaj',
            // '$tbl2_pesouno',
            // '$tbl2_porce_uno',
            // '$tbl2_pesodos',
            // '$tbl2_porce_dos',
            // '$tbl2_pesotres',
            // '$tbl2_porce_tres',
            // '$tbl2_pesocuatro',
            // '$tbl2_porce_cuatro',
            // '$tbl2_pesocinco',
            // '$tbl2_porce_cinco',
            // '$tbl2_pesoseis',
            // '$tbl2_porce_seis',
            // '$tbl2_pesosiete',
            // '$tbl2_porce_siete',
            // '$total_granu',
            // '$porce_granu',
            // '$exp_granonegro',
            // '$exp_a',
            // '$exp_granoagrio',
            // '$exp_b',
            // '$exp_cerezaseca',
            // '$exp_c',
            // '$exp_danohongo',
            // '$exp_d',
            // '$exp_materiaetrana',
            // '$exp_e',
            // '$exp_brocadosevero',
            // '$exp_f',
            // '$exp_parcialnegro',
            // '$exp_g',
            // '$exp_parcialagrio',
            // '$exp_h',
            // '$exp_pergamino',
            // '$exp_i',
            // '$exp_flotblan',
            // '$exp_j',
            // '$exp_inmaduro',
            // '$exp_k',
            // '$exp_averana',
            // '$exp_l',
            // '$exp_conchas',
            // '$exp_m',
            // '$exp_partmord',
            // '$exp_n',
            // '$exp_cascara',
            // '$exp_o',
            // '$exp_brocadoleve',
            // '$exp_p',
            // '$total_rata_expo',
            // '$i50pesodeftotal',
            // '$i51pordeftotal',
            // '$totl_rendimiento_export', CURRENT_TIMESTAMP)";

            // // DEPLOY
            //     $txt=$queryttoo;
            //     // Abrir o crear el archivo de texto
            //     $archivo = fopen("mi_archivo.txt", "w") or die("No se pudo crear el archivo.");
            //     // Escribir en el archivo
            //     fwrite($archivo, $txt);
            //     // Escribir varias líneas en el archivo
            //     $txt = "\nEsta es otra línea de texto.";
            //     fwrite($archivo, $txt);
            //     // Cerrar el archivo
            //     fclose($archivo);

                

        echo '<script type="text/javascript">alert("Tu ficha se aregistrado exitosamente!!!");$(".spinerGiration2").addClass("d-none");location.reload();</script>';

    }

    /*=============================================
    --- FASE A UPDATE LABORATORIA | View data a editar
    =============================================*/
    public static  function update_ficha_laboratorio_desde_una_Bpm($idcodrbpm1)
    {
        $letra_tipo_codelabo = substr($idcodrbpm1, 0, 3);
        $idcodrbpm1          = substr($idcodrbpm1, 3);

        // SELECT TO CABECERA BPM
        $stmt = Conexion::conectar()->query("SELECT * FROM FCH_CONTROL_DE_CALIDAD  WHERE letra_tipo_codelabo='$letra_tipo_codelabo' AND idcodrbpm1='$idcodrbpm1'");
        foreach ($stmt as $rowi) {

            $id                       = $rowi["id"];
            $letra_tipo_codelabo      = $rowi["letra_tipo_codelabo"];
            $correlativo              = $rowi["correlativo"];
            $idcodrbpm1               = $rowi["idcodrbpm1"];
            $url_img_para_basededatos = $rowi["url_img_para_basededatos"];
            $fecha                    = $rowi["fecha"];
            $doc_identidad            = $rowi["doc_identidad"];
            $nombrecliente            = $rowi["nombrecliente"];
            $quienrecibe              = $rowi["quienrecibe"];
            $cafe                     = $rowi["cafe"];
            $materiaextrana           = $rowi["materiaextrana"];
            $procedencia              = $rowi["procedencia"];
            $idTipCaf                 = $rowi["idTipCaf"];
            $placavehiculo            = $rowi["placavehiculo"];
            $altitud                  = $rowi["altitud"];

            $fechaentrega     = $rowi["fechaentrega"];
            $fechaentrega_f_l = substr($fechaentrega, 0, -9) . 'T' . substr($fechaentrega, -8);

            $temperatura    = $rowi["temperatura"];
            $humedad        = $rowi["humedad"];
            $observaciones  = $rowi["observaciones"];
            $motivorechazo  = $rowi["motivorechazo"];
            $rechazo        = $rowi["rechazo"];
            $idfechaentrega = $rowi["idfechaentrega"];
            $idfechaentrega = substr($idfechaentrega, 0, -9) . 'T' . substr($idfechaentrega, -8);

            $obsfinales = $rowi["obsfinales"];
            $tipoanal   = $rowi["tipoanal"];

            $samplenumero = $rowi["samplenumero"];
            $fragrance    = $rowi["fragrance"];
            $flavor       = $rowi["flavor"];
            $acidity      = $rowi["acidity"];
            $sweetness    = $rowi["sweetness"];
            $body         = $rowi["body"];
            $clean        = $rowi["clean"];
            $overall      = $rowi["overall"];
            $otal         = $rowi["otal"];
            $aftertaste   = $rowi["aftertaste"];
            $balance      = $rowi["balance"];
            $uniformity   = $rowi["uniformity"];
            $unoextra     = $rowi["unoextra"];
            $dosextra     = $rowi["dosextra"];
            $tresextra    = $rowi["tresextra"];
            $notes        = $rowi["notes"];
            $finalscore   = $rowi["finalscore"];
            $varidad      = $rowi["varidad"];
            $cosecha      = $rowi["cosecha"];

            $analisis_de_pergamino = $rowi["analisis_de_pergamino"] === 'true' ? true : false;
            $proceso_organico      = $rowi["proceso_organico"] === 'true' ? true : false;
            $proceso_convencional  = $rowi["proceso_convencional"] === 'true' ? true : false;

            $peso_perg = $rowi["peso_perg"];
            $h_perg    = $rowi["h_perg"];

            $color_perg     = $rowi["color_perg"] === 'true' ? true : false;
            $olor_perg      = $rowi["olor_perg"] === 'true' ? true : false;
            $normal_perg    = $rowi["normal_perg"] === 'true' ? true : false;
            $fresco_perg    = $rowi["fresco_perg"] === 'true' ? true : false;
            $disparejo_perg = $rowi["disparejo_perg"] === 'true' ? true : false;
            $viejo_perg     = $rowi["viejo_perg"] === 'true' ? true : false;
            $fermento_perg  = $rowi["fermento_perg"] === 'true' ? true : false;
            $negruzco_perg  = $rowi["negruzco_perg"] === 'true' ? true : false;
            $terroso_perg   = $rowi["terroso_perg"] === 'true' ? true : false;
            $otros_perg     = $rowi["otros_perg"] === 'true' ? true : false;
            $hierbas_perg   = $rowi["hierbas_perg"] === 'true' ? true : false;
            $moho_perg      = $rowi["moho_perg"] === 'true' ? true : false;
            $manchado_perg  = $rowi["manchado_perg"] === 'true' ? true : false;

            $peso_oro = $rowi["peso_oro"];
            $h_oro    = $rowi["h_oro"];

            $color_oro      = $rowi["color_oro"] === 'true' ? true : false;
            $olor_oro       = $rowi["olor_oro"] === 'true' ? true : false;
            $normal_oro     = $rowi["normal_oro"] === 'true' ? true : false;
            $fresco_oro     = $rowi["fresco_oro"] === 'true' ? true : false;
            $azulado_oro    = $rowi["azulado_oro"] === 'true' ? true : false;
            $viejo_oro      = $rowi["viejo_oro"] === 'true' ? true : false;
            $disparejo_oro  = $rowi["disparejo_oro"] === 'true' ? true : false;
            $fermento_oro   = $rowi["fermento_oro"] === 'true' ? true : false;
            $amarillo_oro   = $rowi["amarillo_oro"] === 'true' ? true : false;
            $terroso_oro    = $rowi["terroso_oro"] === 'true' ? true : false;
            $traslucido_oro = $rowi["traslucido_oro"] === 'true' ? true : false;
            $hierbas_oro    = $rowi["hierbas_oro"] === 'true' ? true : false;
            $moho_oro       = $rowi["moho_oro"] === 'true' ? true : false;
            $blanqueado_oro = $rowi["blanqueado_oro"] === 'true' ? true : false;

            $tbl2_observ             = $rowi["tbl2_observ"];
            $tbl2_peso               = $rowi["tbl2_peso"];
            $tbl2_porcentaj          = $rowi["tbl2_porcentaj"];
            $tbl2_pesouno            = $rowi["tbl2_pesouno"];
            $tbl2_porce_uno          = $rowi["tbl2_porce_uno"];
            $tbl2_pesodos            = $rowi["tbl2_pesodos"];
            $tbl2_porce_dos          = $rowi["tbl2_porce_dos"];
            $tbl2_pesotres           = $rowi["tbl2_pesotres"];
            $tbl2_porce_tres         = $rowi["tbl2_porce_tres"];
            $tbl2_pesocuatro         = $rowi["tbl2_pesocuatro"];
            $tbl2_porce_cuatro       = $rowi["tbl2_porce_cuatro"];
            $tbl2_pesocinco          = $rowi["tbl2_pesocinco"];
            $tbl2_porce_cinco        = $rowi["tbl2_porce_cinco"];
            $tbl2_pesoseis           = $rowi["tbl2_pesoseis"];
            $tbl2_porce_seis         = $rowi["tbl2_porce_seis"];
            $tbl2_pesosiete          = $rowi["tbl2_pesosiete"];
            $tbl2_porce_siete        = $rowi["tbl2_porce_siete"];
            $total_granu             = $rowi["total_granu"];
            $porce_granu             = $rowi["porce_granu"];
            $exp_granonegro          = $rowi["exp_granonegro"];
            $exp_a                   = $rowi["exp_a"];
            $exp_granoagrio          = $rowi["exp_granoagrio"];
            $exp_b                   = $rowi["exp_b"];
            $exp_cerezaseca          = $rowi["exp_cerezaseca"];
            $exp_c                   = $rowi["exp_c"];
            $exp_danohongo           = $rowi["exp_danohongo"];
            $exp_d                   = $rowi["exp_d"];
            $exp_materiaetrana       = $rowi["exp_materiaetrana"];
            $exp_e                   = $rowi["exp_e"];
            $exp_brocadosevero       = $rowi["exp_brocadosevero"];
            $exp_f                   = $rowi["exp_f"];
            $exp_parcialnegro        = $rowi["exp_parcialnegro"];
            $exp_g                   = $rowi["exp_g"];
            $exp_parcialagrio        = $rowi["exp_parcialagrio"];
            $exp_h                   = $rowi["exp_h"];
            $exp_pergamino           = $rowi["exp_pergamino"];
            $exp_i                   = $rowi["exp_i"];
            $exp_flotblan            = $rowi["exp_flotblan"];
            $exp_j                   = $rowi["exp_j"];
            $exp_inmaduro            = $rowi["exp_inmaduro"];
            $exp_k                   = $rowi["exp_k"];
            $exp_averana             = $rowi["exp_averana"];
            $exp_l                   = $rowi["exp_l"];
            $exp_conchas             = $rowi["exp_conchas"];
            $exp_m                   = $rowi["exp_m"];
            $exp_partmord            = $rowi["exp_partmord"];
            $exp_n                   = $rowi["exp_n"];
            $exp_cascara             = $rowi["exp_cascara"];
            $exp_o                   = $rowi["exp_o"];
            $exp_brocadoleve         = $rowi["exp_brocadoleve"];
            $exp_p                   = $rowi["exp_p"];
            $total_rata_expo         = $rowi["total_rata_expo"];
            $i50pesodeftotal         = $rowi["i50pesodeftotal"];
            $i51pordeftotal          = $rowi["i51pordeftotal"];
            $totl_rendimiento_export = $rowi["totl_rendimiento_export"];
            $fecha_create_registro   = $rowi["fecha_create_registro"];

            $estado = $rowi["estado"];

        }
                // Primero, elimina espacios en blanco y comas del final
                $notes = rtrim($notes, " \t\n\r\0\x0B,");

                // Luego, usa una expresión regular para eliminar cualquier salto de línea al final
                $notes = preg_replace('/[\r\n]+$/m', '', $notes);

        ?>
        <script type="text/javascript">
                // $("[name=1codigo]").val();
                $("#idFicha_laboratorio_").text("<?php echo $id; ?>");
                $("#acodeficha").text("<?php echo $letra_tipo_codelabo; ?>");
                $("[name=1codigo]").val("<?php echo $idcodrbpm1; ?>");
                $("[name=hoyfecha],[name=1fecha]").val("<?php echo $fecha; ?>");
                $("[name=doc_identidad]").val("<?php echo $doc_identidad; ?>");
                $("[name=1nombrecliente]").val("<?php echo $nombrecliente; ?>");
                $( "[name=1cafe]" ).val("<?php echo $cafe; ?>");

                $( "[name=1materiaextrana]" ).val("<?php echo $materiaextrana; ?>");
                $( "[name=1procedencia]" ).val("<?php echo $procedencia; ?>");
                $( "[name=idTipCaf]" ).val("<?php echo $idTipCaf; ?>");
                $( "[name=1placavehiculo]" ).val("<?php echo $placavehiculo; ?>");
                $( "[name=1altitud]" ).val("<?php echo $altitud; ?>");

                $("[name=1fechaentrega]").val("<?php echo $fechaentrega_f_l; ?>");

            $( "[name=1temperatura]" ).val("<?php echo $temperatura; ?>");
            $( "[name=1humedad]" ).val("<?php echo $humedad; ?>");
            $( "[name=1observaciones]" ).val("<?php echo $observaciones; ?>");

            $( "[name=1motivorechazo]" ).val("<?php echo $motivorechazo; ?>");
            $("#1rechazo"+"<?php echo $rechazo; ?>").prop( "checked", true );


            $( "[name=fechsanalisis]" ).val("<?php echo $idfechaentrega; ?>");

            $( "[name=observacionesfinales]" ).val("<?php echo $obsfinales; ?>");
            $("#"+"<?php echo $tipoanal; ?>").prop( "checked", true );
            $("#"+"<?php echo $tipoanal; ?>").click();

            $("#samplenumero").val("<?php echo $samplenumero; ?>");
            $("[name=fragrance]").val("<?php echo $fragrance; ?>");
            $("[name=flavor]").val("<?php echo $flavor; ?>");
            $("[name=acidity]").val("<?php echo $acidity; ?>");
            $("[name=sweetness]").val("<?php echo $sweetness; ?>");
            $("[name=body]").val("<?php echo $body; ?>");
            $("[name=clean]").val("<?php echo $clean; ?>");
            $("[name=overall]").val("<?php echo $overall; ?>");
            $("[name=otal]").val("<?php echo $otal; ?>");
            $("[name=aftertaste]").val("<?php echo $aftertaste; ?>");
            $("[name=balance]").val("<?php echo $balance; ?>");
            $("[name=uniformity]").val("<?php echo $uniformity; ?>");
            $("[name=uniformity]").click();
            $("[name=unoextra]").val("<?php echo $unoextra; ?>");
            $("[name=dosextra]").val("<?php echo $dosextra; ?>");
            $("[name=tresextra]").val("<?php echo $tresextra; ?>");
            // $("[name=notes]").val(" echo trim($notes); ");
            $("[name=notes]").val(<?php echo json_encode(trim($notes)); ?>);
            
            $("[name=finalscore]").val("<?php echo $finalscore; ?>");



            $("[name=varidad]").val("<?php echo $varidad; ?>");
            $("[name=cosecha]").val("<?php echo $cosecha; ?>");

            $("[name=analisis_de_pergamino]").prop( "checked","<?php echo $analisis_de_pergamino; ?>");
            $("[name=proceso_organico]").prop( "checked","<?php echo $proceso_organico; ?>");
            $("[name=proceso_convencional]").prop( "checked","<?php echo $proceso_convencional; ?>");


            $("[name=peso_perg]").val("<?php echo $peso_perg; ?>");
            $("[name=h_perg]").val("<?php echo $h_perg; ?>");


            $("[name=color_perg]").prop( "checked","<?php echo $color_perg; ?>");
            $("[name=olor_perg]").prop( "checked","<?php echo $olor_perg ?>");
            $("[name=normal_perg]").prop( "checked","<?php echo $normal_perg; ?>");
            $("[name=fresco_perg]").prop( "checked","<?php echo $fresco_perg; ?>");
            $("[name=disparejo_perg]").prop( "checked","<?php echo $disparejo_perg; ?>");
            $("[name=viejo_perg]").prop( "checked","<?php echo $viejo_perg; ?>");
            $("[name=fermento_perg]").prop( "checked","<?php echo $fermento_perg; ?>");
            $("[name=negruzco_perg]").prop( "checked","<?php echo $negruzco_perg; ?>");
            $("[name=terroso_perg]").prop( "checked","<?php echo $terroso_perg; ?>");
            $("[name=otros_perg]").prop( "checked","<?php echo $otros_perg; ?>");
            $("[name=hierbas_perg]").prop( "checked","<?php echo $hierbas_perg; ?>");
            $("[name=moho_perg]").prop( "checked","<?php echo $moho_perg; ?>");
            $("[name=manchado_perg]").prop( "checked","<?php echo $manchado_perg; ?>");


            $("[name=peso_oro]").val("<?php echo $peso_oro; ?>");
            $("[name=h_oro]").val("<?php echo $h_oro; ?>");

            $("[name=color_oro]").prop( "checked","<?php echo $color_oro; ?>");
            $("[name=olor_oro]").prop( "checked","<?php echo $olor_oro; ?>");
            $("[name=normal_oro]").prop( "checked","<?php echo $normal_oro; ?>");
            $("[name=fresco_oro]").prop( "checked","<?php echo $fresco_oro; ?>");
            $("[name=azulado_oro]").prop( "checked","<?php echo $azulado_oro; ?>");
            $("[name=viejo_oro]").prop( "checked","<?php echo $viejo_oro; ?>");
            $("[name=disparejo_oro]").prop( "checked","<?php echo $disparejo_oro; ?>");
            $("[name=fermento_oro]").prop( "checked","<?php echo $fermento_oro; ?>");
            $("[name=amarillo_oro]").prop( "checked","<?php echo $amarillo_oro; ?>");
            $("[name=terroso_oro]").prop( "checked","<?php echo $terroso_oro; ?>");
            $("[name=traslucido_oro]").prop( "checked","<?php echo $traslucido_oro; ?>");
            $("[name=hierbas_oro]").prop( "checked","<?php echo $hierbas_oro; ?>");
            $("[name=moho_oro]").prop( "checked","<?php echo $moho_oro; ?>");
            $("[name=blanqueado_oro]").prop( "checked","<?php echo $blanqueado_oro; ?>");


            $("[name=tbl2_observ]").val("<?php echo $tbl2_observ; ?>");
            $("[name=tbl2_peso]").val("<?php echo $tbl2_peso; ?>");
            $("[name=tbl2_porcentaj]").val("<?php echo $tbl2_porcentaj; ?>");
            $("[name=tbl2_pesouno]").val("<?php echo $tbl2_pesouno; ?>");
            $("[name=tbl2_porce_uno]").val("<?php echo $tbl2_porce_uno; ?>");
            $("[name=tbl2_pesodos]").val("<?php echo $tbl2_pesodos; ?>");
            $("[name=tbl2_porce_dos]").val("<?php echo $tbl2_porce_dos; ?>");
            $("[name=tbl2_pesotres]").val("<?php echo $tbl2_pesotres; ?>");
            $("[name=tbl2_porce_tres]").val("<?php echo $tbl2_porce_tres; ?>");
            $("[name=tbl2_pesocuatro]").val("<?php echo $tbl2_pesocuatro; ?>");
            $("[name=tbl2_porce_cuatro]").val("<?php echo $tbl2_porce_cuatro; ?>");
            $("[name=tbl2_pesocinco]").val("<?php echo $tbl2_pesocinco; ?>");
            $("[name=tbl2_porce_cinco]").val("<?php echo $tbl2_porce_cinco; ?>");
            $("[name=tbl2_pesoseis]").val("<?php echo $tbl2_pesoseis; ?>");
            $("[name=tbl2_porce_seis]").val("<?php echo $tbl2_porce_seis; ?>");
            $("[name=tbl2_pesosiete]").val("<?php echo $tbl2_pesosiete; ?>");
            $("[name=tbl2_porce_siete]").val("<?php echo $tbl2_porce_siete; ?>");
            $("[name=total_granu]").val("<?php echo $total_granu; ?>");
            $("[name=porce_granu]").val("<?php echo $porce_granu; ?>");
            $("[name=exp_granonegro]").val("<?php echo $exp_granonegro; ?>");
            $("[name=exp_a]").val("<?php echo $exp_a; ?>");
            $("[name=exp_granoagrio]").val("<?php echo $exp_granoagrio; ?>");
            $("[name=exp_b]").val("<?php echo $exp_b; ?>");
            $("[name=exp_cerezaseca]").val("<?php echo $exp_cerezaseca; ?>");
            $("[name=exp_c]").val("<?php echo $exp_c; ?>");
            $("[name=exp_danohongo]").val("<?php echo $exp_danohongo; ?>");
            $("[name=exp_d]").val("<?php echo $exp_d; ?>");
            $("[name=exp_materiaetrana]").val("<?php echo $exp_materiaetrana; ?>");
            $("[name=exp_e]").val("<?php echo $exp_e; ?>");
            $("[name=exp_brocadosevero]").val("<?php echo $exp_brocadosevero; ?>");
            $("[name=exp_f]").val("<?php echo $exp_f; ?>");
            $("[name=exp_parcialnegro]").val("<?php echo $exp_parcialnegro; ?>");
            $("[name=exp_g]").val("<?php echo $exp_g; ?>");
            $("[name=exp_parcialagrio]").val("<?php echo $exp_parcialagrio; ?>");
            $("[name=exp_h]").val("<?php echo $exp_h; ?>");
            $("[name=exp_pergamino]").val("<?php echo $exp_pergamino; ?>");
            $("[name=exp_i]").val("<?php echo $exp_i; ?>");
            $("[name=exp_flotblan]").val("<?php echo $exp_flotblan; ?>");
            $("[name=exp_j]").val("<?php echo $exp_j; ?>");
            $("[name=exp_inmaduro]").val("<?php echo $exp_inmaduro; ?>");
            $("[name=exp_k]").val("<?php echo $exp_k; ?>");
            $("[name=exp_averana]").val("<?php echo $exp_averana; ?>");
            $("[name=exp_l]").val("<?php echo $exp_l; ?>");
            $("[name=exp_conchas]").val("<?php echo $exp_conchas; ?>");
            $("[name=exp_m]").val("<?php echo $exp_m; ?>");
            $("[name=exp_partmord]").val("<?php echo $exp_partmord; ?>");
            $("[name=exp_n]").val("<?php echo $exp_n; ?>");
            $("[name=exp_cascara]").val("<?php echo $exp_cascara; ?>");
            $("[name=exp_o]").val("<?php echo $exp_o; ?>");
            $("[name=exp_brocadoleve]").val("<?php echo $exp_brocadoleve; ?>");
            $("[name=exp_p]").val("<?php echo $exp_p; ?>");
            $("[name=total_rata_expo]").val("<?php echo $total_rata_expo; ?>");
            $("[name=i50pesodeftotal]").val("<?php echo $i50pesodeftotal; ?>");
            $("[name=i51pordeftotal]").val("<?php echo $i51pordeftotal; ?>");
            $("[name=totl_rendimiento_export]").val("<?php echo $totl_rendimiento_export; ?>");
            $("[name=fecha_create_registro]").val("<?php echo $fecha_create_registro; ?>");

            $( "#idEstadosLaboratorio" ).val("<?php echo $estado; ?>");



                $(".spinerGiration2").addClass("d-none");
                // ACA SEGUIR AÑADIENDO...
            </script>
            <?php

    }
    /*=============================================*/

    /*=============================================
    --- FASE B UPDATE LABORATORIA
    =============================================*/
    public static  function update_ficha_laboratorio_B($idFicha_laboratorio_, $letra_tipo_codelabo,
        $idcodrbpm1,
        $url_img_para_basededatos,
        $fecha,
        $doc_identidad,
        $nombrecliente,
        $quienrecibe,
        $cafe,
        $materiaextrana,
        $procedencia,
        $idTipCaf,
        $placavehiculo,
        $altitud,
        $fechaentrega,
        $temperatura,
        $humedad,
        $observaciones,
        $motivorechazo,
        $rechazo,
        $idfechaentrega,
        $obsfinales,
        $tipoanal,
        $samplenumero,
        $fragrance,
        $flavor,
        $acidity,
        $sweetness,
        $body,
        $clean,
        $overall,
        $otal,
        $aftertaste,
        $balance,
        $uniformity,
        $unoextra,
        $dosextra,
        $tresextra,
        $notes,
        $finalscore,
        $varidad,
        $cosecha,
        $analisis_de_pergamino,
        $proceso_organico,
        $proceso_convencional,
        $peso_perg,
        $h_perg,
        $color_perg,
        $olor_perg,
        $normal_perg,
        $fresco_perg,
        $disparejo_perg,
        $viejo_perg,
        $fermento_perg,
        $negruzco_perg,
        $terroso_perg,
        $otros_perg,
        $hierbas_perg,
        $moho_perg,
        $manchado_perg,
        $peso_oro,
        $h_oro,
        $color_oro,
        $olor_oro,
        $normal_oro,
        $fresco_oro,
        $azulado_oro,
        $viejo_oro,
        $disparejo_oro,
        $fermento_oro,
        $amarillo_oro,
        $terroso_oro,
        $traslucido_oro,
        $hierbas_oro,
        $moho_oro,
        $blanqueado_oro,
        $tbl2_observ,
        $tbl2_peso,
        $tbl2_porcentaj,
        $tbl2_pesouno,
        $tbl2_porce_uno,
        $tbl2_pesodos,
        $tbl2_porce_dos,
        $tbl2_pesotres,
        $tbl2_porce_tres,
        $tbl2_pesocuatro,
        $tbl2_porce_cuatro,
        $tbl2_pesocinco,
        $tbl2_porce_cinco,
        $tbl2_pesoseis,
        $tbl2_porce_seis,
        $tbl2_pesosiete,
        $tbl2_porce_siete,
        $total_granu,
        $porce_granu,
        $exp_granonegro,
        $exp_a,
        $exp_granoagrio,
        $exp_b,
        $exp_cerezaseca,
        $exp_c,
        $exp_danohongo,
        $exp_d,
        $exp_materiaetrana,
        $exp_e,
        $exp_brocadosevero,
        $exp_f,
        $exp_parcialnegro,
        $exp_g,
        $exp_parcialagrio,
        $exp_h,
        $exp_pergamino,
        $exp_i,
        $exp_flotblan,
        $exp_j,
        $exp_inmaduro,
        $exp_k,
        $exp_averana,
        $exp_l,
        $exp_conchas,
        $exp_m,
        $exp_partmord,
        $exp_n,
        $exp_cascara,
        $exp_o,
        $exp_brocadoleve,
        $exp_p,
        $total_rata_expo,
        $i50pesodeftotal,
        $i51pordeftotal,
        $totl_rendimiento_export,
        $picadoEstado,
        $cod) {
        // ACCION   DE LA FUNCION

        $correlativo = substr($idcodrbpm1, 0, -6);
        // ------------------------------------------------------------------------------------------------------------------------------------------------

        // ------------------------------------------------------------------------------------------------------------------------------------------------

        $stmt = Conexion::conectar()->query("UPDATE `FCH_CONTROL_DE_CALIDAD` SET

`letra_tipo_codelabo`='$letra_tipo_codelabo',
    `correlativo`='$correlativo',
`idcodrbpm1`='$idcodrbpm1',
`url_img_para_basededatos`='$url_img_para_basededatos',
`fecha`='$fecha',
`doc_identidad`='$doc_identidad',
`nombrecliente`='$nombrecliente',
`quienrecibe`='$quienrecibe',
`cafe`='$cafe',
`materiaextrana`='$materiaextrana',
`procedencia`='$procedencia',
`idTipCaf`='$idTipCaf',
`placavehiculo`='$placavehiculo',
`altitud`='$altitud',
`fechaentrega`='$fechaentrega',
`temperatura`='$temperatura',
`humedad`='$humedad',
`observaciones`='$observaciones',
`motivorechazo`='$motivorechazo',
`rechazo`='$rechazo',
`idfechaentrega`='$idfechaentrega',
`obsfinales`='$obsfinales',
`tipoanal`='$tipoanal',
`samplenumero`='$samplenumero',
`fragrance`='$fragrance',
`flavor`='$flavor',
`acidity`='$acidity',
`sweetness`='$sweetness',
`body`='$body',
`clean`='$clean',
`overall`='$overall',
`otal`='$otal',
`aftertaste`='$aftertaste',
`balance`='$balance',
`uniformity`='$uniformity',
`unoextra`='$unoextra',
`dosextra`='$dosextra',
`tresextra`='$tresextra',
`notes`='$notes',
`finalscore`='$finalscore',
`varidad`='$varidad',
`cosecha`='$cosecha',
`analisis_de_pergamino`='$analisis_de_pergamino',
`proceso_organico`='$proceso_organico',
`proceso_convencional`='$proceso_convencional',
`peso_perg`='$peso_perg',
`h_perg`='$h_perg',

`color_perg`='$color_perg',
`olor_perg`='$olor_perg',
`normal_perg`='$normal_perg',
`fresco_perg`='$fresco_perg',
`disparejo_perg`='$disparejo_perg',
`viejo_perg`='$viejo_perg',
`fermento_perg`='$fermento_perg',
`negruzco_perg`='$negruzco_perg',
`terroso_perg`='$terroso_perg',
`otros_perg`='$otros_perg',
`hierbas_perg`='$hierbas_perg',
`moho_perg`='$moho_perg',
`manchado_perg`='$manchado_perg',
`peso_oro`='$peso_oro',
`h_oro`='$h_oro',
`color_oro`='$color_oro',
`olor_oro`='$olor_oro',
`normal_oro`='$normal_oro',
`fresco_oro`='$fresco_oro',
`azulado_oro`='$azulado_oro',
`viejo_oro`='$viejo_oro',
`disparejo_oro`='$disparejo_oro',
`fermento_oro`='$fermento_oro',
`amarillo_oro`='$amarillo_oro',
`terroso_oro`='$terroso_oro',
`traslucido_oro`='$traslucido_oro',
`hierbas_oro`='$hierbas_oro',
`moho_oro`='$moho_oro',
`blanqueado_oro`='$blanqueado_oro',
`tbl2_observ`='$tbl2_observ',
`tbl2_peso`='$tbl2_peso',
`tbl2_porcentaj`='$tbl2_porcentaj',
`tbl2_pesouno`='$tbl2_pesouno',
`tbl2_porce_uno`='$tbl2_porce_uno',
`tbl2_pesodos`='$tbl2_pesodos',
`tbl2_porce_dos`='$tbl2_porce_dos',
`tbl2_pesotres`='$tbl2_pesotres',
`tbl2_porce_tres`='$tbl2_porce_tres',
`tbl2_pesocuatro`='$tbl2_pesocuatro',
`tbl2_porce_cuatro`='$tbl2_porce_cuatro',
`tbl2_pesocinco`='$tbl2_pesocinco',
`tbl2_porce_cinco`='$tbl2_porce_cinco',
`tbl2_pesoseis`='$tbl2_pesoseis',
`tbl2_porce_seis`='$tbl2_porce_seis',
`tbl2_pesosiete`='$tbl2_pesosiete',
`tbl2_porce_siete`='$tbl2_porce_siete',
`total_granu`='$total_granu',
`porce_granu`='$porce_granu',
`exp_granonegro`='$exp_granonegro',
`exp_a`='$exp_a',
`exp_granoagrio`='$exp_granoagrio',
`exp_b`='$exp_b',
`exp_cerezaseca`='$exp_cerezaseca',
`exp_c`='$exp_c',
`exp_danohongo`='$exp_danohongo',
`exp_d`='$exp_d',
`exp_materiaetrana`='$exp_materiaetrana',
`exp_e`='$exp_e',
`exp_brocadosevero`='$exp_brocadosevero',
`exp_f`='$exp_f',
`exp_parcialnegro`='$exp_parcialnegro',
`exp_g`='$exp_g',
`exp_parcialagrio`='$exp_parcialagrio',
`exp_h`='$exp_h',
`exp_pergamino`='$exp_pergamino',
`exp_i`='$exp_i',
`exp_flotblan`='$exp_flotblan',
`exp_j`='$exp_j',
`exp_inmaduro`='$exp_inmaduro',
`exp_k`='$exp_k',
`exp_averana`='$exp_averana',
`exp_l`='$exp_l',
`exp_conchas`='$exp_conchas',
`exp_m`='$exp_m',
`exp_partmord`='$exp_partmord',
`exp_n`='$exp_n',
`exp_cascara`='$exp_cascara',
`exp_o`='$exp_o',
`exp_brocadoleve`='$exp_brocadoleve',
`exp_p`='$exp_p',
`total_rata_expo`='$total_rata_expo',
`i50pesodeftotal`='$i50pesodeftotal',
`i51pordeftotal`='$i51pordeftotal',
`totl_rendimiento_export`='$totl_rendimiento_export',
`estado`='$picadoEstado'

where `id`='$idFicha_laboratorio_'");

        echo '<script type="text/javascript">$(".spinerGiration2").addClass("d-none");</script>';

    }
// _________________________________________________________________________________________-

}
