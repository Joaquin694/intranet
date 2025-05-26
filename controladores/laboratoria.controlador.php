<?php
switch ($_POST['cod']) {

    case 'changeEstadoLabo':
        require_once "../modelos/laboratoria.modelo.php";
        $picadoEstado               = $_POST['picadoEstado'];
        $idFicha_laboratorio_       = $_POST['idFicha_laboratorio_'];
        $render_clienteSeleccionado = ModeloLaboratoria::changeEstadoLabo($picadoEstado, $idFicha_laboratorio_);
        break;
    // ------------------------------------------------------------------------------------------------------------------------------
    case 'cargar_list_clientes_laboratoria':
        require_once "../modelos/laboratoria.modelo.php";
        $chkRadioB          = $_POST['chkRadioB'];
        $render_facturation = ModeloLaboratoria::cargar_list_clientes_laboratoria();
        break;
    // ------------------------------------------------------------------------------------------------------------------------------
    case 'autoCompletingDatosDeclienteSelecto':
        require_once "../modelos/laboratoria.modelo.php";
        $clienteSeleccionado        = $_POST['clienteSeleccionado'];
        $render_clienteSeleccionado = ModeloLaboratoria::autoComple_tingDatosDeclienteSelecto($clienteSeleccionado);
        break;
    // ------------------------------------------------------------------------------------------------------------------------------
    case 'insertintolaboratoria': /*PIWI*/
        // COLOCANDO IMAGEN ARANIA
        $nombre_imagen = $_POST['nombre_imagen'];
        $img           = $_POST['image']; //data 'data:image/png;base64,~;
        $img           = str_replace('data:image/png;base64,', '', $img);
        $img           = str_replace(' ', '+', $img);
        $data          = base64_decode($img);
        $file          = "../vistas/img/laboratorio/" . $nombre_imagen;
        $success       = file_put_contents($file, $data);

        $acodeficha               = $_POST['acodeficha'];
        $idcodrbpm1               = $_POST['idcodrbpm1'];
        $url_img_para_basededatos = "vistas/img/laboratorio/" . $nombre_imagen;
        $fecha                    = $_POST['fecha'];
        $doc_identidad            = $_POST['doc_identidad'];
        $nombrecliente            = $_POST['nombrecliente'];
        $quienrecibe              = $_POST['quienrecibe'];
        $cafe                     = $_POST['cafe'];
        $materiaextrana           = $_POST['materiaextrana'];
        $procedencia              = $_POST['procedencia'];
        $idTipCaf                 = $_POST['idTipCaf'];
        $placavehiculo            = $_POST['placavehiculo'];
        $altitud                  = $_POST['altitud'];
        $fechaentrega             = $_POST['fechaentrega'];
        $temperatura              = $_POST['temperatura'];
        $humedad                  = $_POST['humedad'];
        $observaciones            = $_POST['observaciones'];
        $motivorechazo            = $_POST['motivorechazo'];
        $rechazo                  = $_POST['rechazo'];
        $idfechaentrega           = $_POST['idfechaentrega'];
        $obsfinales               = $_POST['obsfinales'];
        $tipoanal                 = $_POST['tipoanal'];
        $samplenumero             = $_POST['samplenumero'];
        $fragrance                = $_POST['fragrance'];
        $flavor                   = $_POST['flavor'];
        $acidity                  = $_POST['acidity'];
        $sweetness                = $_POST['sweetness'];
        $body                     = $_POST['body'];
        $clean                    = $_POST['clean'];
        $overall                  = $_POST['overall'];
        $otal                     = $_POST['otal'];
        $aftertaste               = $_POST['aftertaste'];
        $balance                  = $_POST['balance'];
        $uniformity               = $_POST['uniformity'];
        $unoextra                 = $_POST['unoextra'];
        $dosextra                 = $_POST['dosextra'];
        $tresextra                = $_POST['tresextra'];
        $notes                    = $_POST['notes'];
        $finalscore               = $_POST['finalscore'];
        $varidad                  = $_POST['varidad'];
        $cosecha                  = $_POST['cosecha'];
        $analisis_de_pergamino    = $_POST['analisis_de_pergamino'];
        $proceso_organico         = $_POST['proceso_organico'];
        $proceso_convencional     = $_POST['proceso_convencional'];
        $peso_perg                = $_POST['peso_perg'];
        $h_perg                   = $_POST['h_perg'];
        $color_perg               = $_POST['color_perg'];
        $olor_perg                = $_POST['olor_perg'];
        $normal_perg              = $_POST['normal_perg'];
        $fresco_perg              = $_POST['fresco_perg'];
        $disparejo_perg           = $_POST['disparejo_perg'];
        $viejo_perg               = $_POST['viejo_perg'];
        $fermento_perg            = $_POST['fermento_perg'];
        $negruzco_perg            = $_POST['negruzco_perg'];
        $terroso_perg             = $_POST['terroso_perg'];
        $otros_perg               = $_POST['otros_perg'];
        $hierbas_perg             = $_POST['hierbas_perg'];
        $moho_perg                = $_POST['moho_perg'];
        $manchado_perg            = $_POST['manchado_perg'];
        $peso_oro                 = $_POST['peso_oro'];
        $h_oro                    = $_POST['h_oro'];
        $color_oro                = $_POST['color_oro'];
        $olor_oro                 = $_POST['olor_oro'];
        $normal_oro               = $_POST['normal_oro'];
        $fresco_oro               = $_POST['fresco_oro'];
        $azulado_oro              = $_POST['azulado_oro'];
        $viejo_oro                = $_POST['viejo_oro'];
        $disparejo_oro            = $_POST['disparejo_oro'];
        $fermento_oro             = $_POST['fermento_oro'];
        $amarillo_oro             = $_POST['amarillo_oro'];
        $terroso_oro              = $_POST['terroso_oro'];
        $traslucido_oro           = $_POST['traslucido_oro'];
        $hierbas_oro              = $_POST['hierbas_oro'];
        $moho_oro                 = $_POST['moho_oro'];
        $blanqueado_oro           = $_POST['blanqueado_oro'];

        $tbl2_observ             = $_POST['tbl2_observ'];
        $tbl2_peso               = $_POST['tbl2_peso'];
        $tbl2_porcentaj          = $_POST['tbl2_porcentaj'];
        $tbl2_pesouno            = $_POST['tbl2_pesouno'];
        $tbl2_porce_uno          = $_POST['tbl2_porce_uno'];
        $tbl2_pesodos            = $_POST['tbl2_pesodos'];
        $tbl2_porce_dos          = $_POST['tbl2_porce_dos'];
        $tbl2_pesotres           = $_POST['tbl2_pesotres'];
        $tbl2_porce_tres         = $_POST['tbl2_porce_tres'];
        $tbl2_pesocuatro         = $_POST['tbl2_pesocuatro'];
        $tbl2_porce_cuatro       = $_POST['tbl2_porce_cuatro'];
        $tbl2_pesocinco          = $_POST['tbl2_pesocinco'];
        $tbl2_porce_cinco        = $_POST['tbl2_porce_cinco'];
        $tbl2_pesoseis           = $_POST['tbl2_pesoseis'];
        $tbl2_porce_seis         = $_POST['tbl2_porce_seis'];
        $tbl2_pesosiete          = $_POST['tbl2_pesosiete'];
        $tbl2_porce_siete        = $_POST['tbl2_porce_siete'];
        $total_granu             = $_POST['total_granu'];
        $porce_granu             = $_POST['porce_granu'];
        $exp_granonegro          = $_POST['exp_granonegro'];
        $exp_a                   = $_POST['exp_a'];
        $exp_granoagrio          = $_POST['exp_granoagrio'];
        $exp_b                   = $_POST['exp_b'];
        $exp_cerezaseca          = $_POST['exp_cerezaseca'];
        $exp_c                   = $_POST['exp_c'];
        $exp_danohongo           = $_POST['exp_danohongo'];
        $exp_d                   = $_POST['exp_d'];
        $exp_materiaetrana       = $_POST['exp_materiaetrana'];
        $exp_e                   = $_POST['exp_e'];
        $exp_brocadosevero       = $_POST['exp_brocadosevero'];
        $exp_f                   = $_POST['exp_f'];
        $exp_parcialnegro        = $_POST['exp_parcialnegro'];
        $exp_g                   = $_POST['exp_g'];
        $exp_parcialagrio        = $_POST['exp_parcialagrio'];
        $exp_h                   = $_POST['exp_h'];
        $exp_pergamino           = $_POST['exp_pergamino'];
        $exp_i                   = $_POST['exp_i'];
        $exp_flotblan            = $_POST['exp_flotblan'];
        $exp_j                   = $_POST['exp_j'];
        $exp_inmaduro            = $_POST['exp_inmaduro'];
        $exp_k                   = $_POST['exp_k'];
        $exp_averana             = $_POST['exp_averana'];
        $exp_l                   = $_POST['exp_l'];
        $exp_conchas             = $_POST['exp_conchas'];
        $exp_m                   = $_POST['exp_m'];
        $exp_partmord            = $_POST['exp_partmord'];
        $exp_n                   = $_POST['exp_n'];
        $exp_cascara             = $_POST['exp_cascara'];
        $exp_o                   = $_POST['exp_o'];
        $exp_brocadoleve         = $_POST['exp_brocadoleve'];
        $exp_p                   = $_POST['exp_p'];
        $total_rata_expo         = $_POST['total_rata_expo'];
        $i50pesodeftotal         = $_POST['i50pesodeftotal'];
        $i51pordeftotal          = $_POST['i51pordeftotal'];
        $totl_rendimiento_export = $_POST['totl_rendimiento_export'];
        $cod                     = $_POST['cod'];

        require_once "../modelos/laboratoria.modelo.php";
        $render_clienteSeleccionado = ModeloLaboratoria::insert_into_laboratoria($acodeficha,
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
            $cod);
        break;
    // ------------------------------------------------------------------------------------------------------------------------------

    // ------------------------------------------------------------------------------------------------------------------------------
    case 'updatelaboratoria':

        $idFicha_laboratorio_ = $_POST['idFicha_laboratorio_'];


        // COLOCANDO IMAGEN DE RULETA DE SABORES
        $nombre_imagenSab = $_POST['idcodrbpm1']."RuletaSabor.png";
        $imgSab           = $_POST['RuletSaborimage']; //data Base64PNG;
        $imgSab           = str_replace('data:image/png;base64,', '', $imgSab);
        $imgSab           = str_replace(' ', '+', $imgSab);
        $dataSab          = base64_decode($imgSab); 
        $fileSab          = "../vistas/img/sabores/" . $nombre_imagenSab;
        $successSab       = file_put_contents($fileSab, $dataSab);
        

        // COLOCANDO IMAGEN ARANIA
        $nombre_imagen = $_POST['nombre_imagen'];
        $img           = $_POST['image']; //data 'data:image/png;base64,~;
        $img           = str_replace('data:image/png;base64,', '', $img);
        $img           = str_replace(' ', '+', $img);
        $data          = base64_decode($img);
        $file          = "../vistas/img/laboratorio/" . $nombre_imagen;
        $success       = file_put_contents($file, $data);

        $acodeficha               = $_POST['acodeficha'];
        $idcodrbpm1               = $_POST['idcodrbpm1'];
        $url_img_para_basededatos = "vistas/img/laboratorio/" . $nombre_imagen;
        $fecha                    = $_POST['fecha'];
        $doc_identidad            = $_POST['doc_identidad'];
        $nombrecliente            = $_POST['nombrecliente'];
        $quienrecibe              = $_POST['quienrecibe'];
        $cafe                     = $_POST['cafe'];
        $materiaextrana           = $_POST['materiaextrana'];
        $procedencia              = $_POST['procedencia'];
        $idTipCaf                 = $_POST['idTipCaf'];
        $placavehiculo            = $_POST['placavehiculo'];
        $altitud                  = $_POST['altitud'];
        $fechaentrega             = $_POST['fechaentrega'];
        $temperatura              = $_POST['temperatura'];
        $humedad                  = $_POST['humedad'];
        $observaciones            = $_POST['observaciones'];
        $motivorechazo            = $_POST['motivorechazo'];
        $rechazo                  = $_POST['rechazo'];
        $idfechaentrega           = $_POST['idfechaentrega'];
        $obsfinales               = $_POST['obsfinales'];
        $tipoanal                 = $_POST['tipoanal'];
        $samplenumero             = $_POST['samplenumero'];
        $fragrance                = $_POST['fragrance'];
        $flavor                   = $_POST['flavor'];
        $acidity                  = $_POST['acidity'];
        $sweetness                = $_POST['sweetness'];
        $body                     = $_POST['body'];
        $clean                    = $_POST['clean'];
        $overall                  = $_POST['overall'];
        $otal                     = $_POST['otal'];
        $aftertaste               = $_POST['aftertaste'];
        $balance                  = $_POST['balance'];
        $uniformity               = $_POST['uniformity'];
        $unoextra                 = $_POST['unoextra'];
        $dosextra                 = $_POST['dosextra'];
        $tresextra                = $_POST['tresextra'];
        $notes                    = trim($_POST['notes']);

        $finalscore            = $_POST['finalscore'];
        $varidad               = $_POST['varidad'];
        $cosecha               = $_POST['cosecha'];
        $analisis_de_pergamino = $_POST['analisis_de_pergamino'];
        $proceso_organico      = $_POST['proceso_organico'];
        $proceso_convencional  = $_POST['proceso_convencional'];

        $peso_perg      = $_POST['peso_perg'];
        $h_perg         = $_POST['h_perg'];
        $color_perg     = $_POST['color_perg'];
        $olor_perg      = $_POST['olor_perg'];
        $normal_perg    = $_POST['normal_perg'];
        $fresco_perg    = $_POST['fresco_perg'];
        $disparejo_perg = $_POST['disparejo_perg'];
        $viejo_perg     = $_POST['viejo_perg'];
        $fermento_perg  = $_POST['fermento_perg'];
        $negruzco_perg  = $_POST['negruzco_perg'];
        $terroso_perg   = $_POST['terroso_perg'];
        $otros_perg     = $_POST['otros_perg'];
        $hierbas_perg   = $_POST['hierbas_perg'];
        $moho_perg      = $_POST['moho_perg'];
        $manchado_perg  = $_POST['manchado_perg'];
        $peso_oro       = $_POST['peso_oro'];
        $h_oro          = $_POST['h_oro'];
        $color_oro      = $_POST['color_oro'];
        $olor_oro       = $_POST['olor_oro'];
        $normal_oro     = $_POST['normal_oro'];
        $fresco_oro     = $_POST['fresco_oro'];
        $azulado_oro    = $_POST['azulado_oro'];
        $viejo_oro      = $_POST['viejo_oro'];
        $disparejo_oro  = $_POST['disparejo_oro'];
        $fermento_oro   = $_POST['fermento_oro'];
        $amarillo_oro   = $_POST['amarillo_oro'];
        $terroso_oro    = $_POST['terroso_oro'];
        $traslucido_oro = $_POST['traslucido_oro'];
        $hierbas_oro    = $_POST['hierbas_oro'];
        $moho_oro       = $_POST['moho_oro'];
        $blanqueado_oro = $_POST['blanqueado_oro'];

        $tbl2_observ             = $_POST['tbl2_observ'];
        $tbl2_peso               = $_POST['tbl2_peso'];
        $tbl2_porcentaj          = $_POST['tbl2_porcentaj'];
        $tbl2_pesouno            = $_POST['tbl2_pesouno'];
        $tbl2_porce_uno          = $_POST['tbl2_porce_uno'];
        $tbl2_pesodos            = $_POST['tbl2_pesodos'];
        $tbl2_porce_dos          = $_POST['tbl2_porce_dos'];
        $tbl2_pesotres           = $_POST['tbl2_pesotres'];
        $tbl2_porce_tres         = $_POST['tbl2_porce_tres'];
        $tbl2_pesocuatro         = $_POST['tbl2_pesocuatro'];
        $tbl2_porce_cuatro       = $_POST['tbl2_porce_cuatro'];
        $tbl2_pesocinco          = $_POST['tbl2_pesocinco'];
        $tbl2_porce_cinco        = $_POST['tbl2_porce_cinco'];
        $tbl2_pesoseis           = $_POST['tbl2_pesoseis'];
        $tbl2_porce_seis         = $_POST['tbl2_porce_seis'];
        $tbl2_pesosiete          = $_POST['tbl2_pesosiete'];
        $tbl2_porce_siete        = $_POST['tbl2_porce_siete'];
        $total_granu             = $_POST['total_granu'];
        $porce_granu             = $_POST['porce_granu'];
        $exp_granonegro          = $_POST['exp_granonegro'];
        $exp_a                   = $_POST['exp_a'];
        $exp_granoagrio          = $_POST['exp_granoagrio'];
        $exp_b                   = $_POST['exp_b'];
        $exp_cerezaseca          = $_POST['exp_cerezaseca'];
        $exp_c                   = $_POST['exp_c'];
        $exp_danohongo           = $_POST['exp_danohongo'];
        $exp_d                   = $_POST['exp_d'];
        $exp_materiaetrana       = $_POST['exp_materiaetrana'];
        $exp_e                   = $_POST['exp_e'];
        $exp_brocadosevero       = $_POST['exp_brocadosevero'];
        $exp_f                   = $_POST['exp_f'];
        $exp_parcialnegro        = $_POST['exp_parcialnegro'];
        $exp_g                   = $_POST['exp_g'];
        $exp_parcialagrio        = $_POST['exp_parcialagrio'];
        $exp_h                   = $_POST['exp_h'];
        $exp_pergamino           = $_POST['exp_pergamino'];
        $exp_i                   = $_POST['exp_i'];
        $exp_flotblan            = $_POST['exp_flotblan'];
        $exp_j                   = $_POST['exp_j'];
        $exp_inmaduro            = $_POST['exp_inmaduro'];
        $exp_k                   = $_POST['exp_k'];
        $exp_averana             = $_POST['exp_averana'];
        $exp_l                   = $_POST['exp_l'];
        $exp_conchas             = $_POST['exp_conchas'];
        $exp_m                   = $_POST['exp_m'];
        $exp_partmord            = $_POST['exp_partmord'];
        $exp_n                   = $_POST['exp_n'];
        $exp_cascara             = $_POST['exp_cascara'];
        $exp_o                   = $_POST['exp_o'];
        $exp_brocadoleve         = $_POST['exp_brocadoleve'];
        $exp_p                   = $_POST['exp_p'];
        $total_rata_expo         = $_POST['total_rata_expo'];
        $i50pesodeftotal         = $_POST['i50pesodeftotal'];
        $i51pordeftotal          = $_POST['i51pordeftotal'];
        $totl_rendimiento_export = $_POST['totl_rendimiento_export'];
        $picadoEstado            = $_POST['picadoEstado'];
        $cod                     = $_POST['cod'];

        require_once "../modelos/laboratoria.modelo.php";
        $render_clienteSeleccionado = ModeloLaboratoria::update_ficha_laboratorio_B($idFicha_laboratorio_, $acodeficha,
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
            $cod);
        break;
        // ------------------------------------------------------------------------------------------------------------------------------
}
