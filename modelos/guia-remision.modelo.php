<?php
require_once "conexion.php";
class ModeloGuiaRemision
{
    public static function mdlGuardarIni($tabla, $datos)
    {
        $pdo = Conexion::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Preparar la consulta SQL con placeholders
        $stmt = $pdo->prepare("INSERT INTO $tabla(ruc_cliente, razon_social, doc_mtc, guia_remi_ini1, guia_remi_ini2, guia_remi_ini3, guia_con_ini, guia_remi_firm, guia_con_firma, 
        foto_evi_carga1, foto_evi_carga2, foto_evi_carga3, foto_evi_desc1, foto_evi_desc2, foto_evi_desc3, obervaciones) 
        VALUES (:ruc_cliente, :razon_social, :doc_mtc, :guia_remi_ini1, :guia_remi_ini2, :guia_remi_ini3, :guia_con_ini, :guia_remi_firm, :guia_con_firma, 
        :foto_evi_carga1, :foto_evi_carga2, :foto_evi_carga3, :foto_evi_desc1, :foto_evi_desc2, :foto_evi_desc3, :obervaciones)");

        // Asignar los valores a los placeholders
        $stmt->bindParam(":ruc_cliente", $datos["ruc_cliente"], PDO::PARAM_STR);
        $stmt->bindParam(":razon_social", $datos["razon_social"], PDO::PARAM_STR);
        $stmt->bindParam(":doc_mtc", $datos["doc_mtc"], PDO::PARAM_STR);
        $stmt->bindParam(":guia_remi_ini1", $datos["guia_remi_ini1"], PDO::PARAM_STR);
        $stmt->bindParam(":guia_remi_ini2", $datos["guia_remi_ini2"], PDO::PARAM_STR);
        $stmt->bindParam(":guia_remi_ini3", $datos["guia_remi_ini3"], PDO::PARAM_STR);
        $stmt->bindParam(":guia_con_ini", $datos["guia_con_ini"], PDO::PARAM_STR);
        $stmt->bindParam(":guia_remi_firm", $datos["guia_remi_firm"], PDO::PARAM_STR);
        $stmt->bindParam(":guia_con_firma", $datos["guia_con_firma"], PDO::PARAM_STR);
        $stmt->bindParam(":foto_evi_carga1", $datos["foto_evi_carga1"], PDO::PARAM_STR);
        $stmt->bindParam(":foto_evi_carga2", $datos["foto_evi_carga2"], PDO::PARAM_STR);
        $stmt->bindParam(":foto_evi_carga3", $datos["foto_evi_carga3"], PDO::PARAM_STR);
        $stmt->bindParam(":foto_evi_desc1", $datos["foto_evi_desc1"], PDO::PARAM_STR);
        $stmt->bindParam(":foto_evi_desc2", $datos["foto_evi_desc2"], PDO::PARAM_STR);
        $stmt->bindParam(":foto_evi_desc3", $datos["foto_evi_desc3"], PDO::PARAM_STR);
        $stmt->bindParam(":obervaciones", $datos["obervaciones"], PDO::PARAM_STR);

        // Ejecutar la consulta y manejar errores
        try {
            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            return "Syntax Error: " . $e->getMessage();
        }

        $stmt->close();
        $stmt = null;
    }

    public static function mdlActualizarIni($tabla, $datos)
    {
        $pdo = Conexion::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Preparar la consulta SQL con placeholders
        $stmt = $pdo->prepare("UPDATE $tabla SET 
        ruc_cliente = :ruc_cliente, 
        razon_social = :razon_social, 
        doc_mtc = :doc_mtc, 
        guia_remi_ini1 = :guia_remi_ini1, 
        guia_remi_ini2 = :guia_remi_ini2, 
        guia_remi_ini3 = :guia_remi_ini3, 
        guia_con_ini = :guia_con_ini, 
        guia_remi_firm = :guia_remi_firm, 
        guia_con_firma = :guia_con_firma, 
        foto_evi_carga1 = :foto_evi_carga1, 
        foto_evi_carga2 = :foto_evi_carga2, 
        foto_evi_carga3 = :foto_evi_carga3, 
        foto_evi_desc1 = :foto_evi_desc1, 
        foto_evi_desc2 = :foto_evi_desc2, 
        foto_evi_desc3 = :foto_evi_desc3, 
        obervaciones = :obervaciones 
        WHERE id = :id");

        // Asignar los valores a los placeholders
        $stmt->bindParam(":ruc_cliente", $datos["ruc_cliente"], PDO::PARAM_STR);
        $stmt->bindParam(":razon_social", $datos["razon_social"], PDO::PARAM_STR);
        $stmt->bindParam(":doc_mtc", $datos["doc_mtc"], PDO::PARAM_STR);
        $stmt->bindParam(":guia_remi_ini1", $datos["guia_remi_ini1"], PDO::PARAM_STR);
        $stmt->bindParam(":guia_remi_ini2", $datos["guia_remi_ini2"], PDO::PARAM_STR);
        $stmt->bindParam(":guia_remi_ini3", $datos["guia_remi_ini3"], PDO::PARAM_STR);
        $stmt->bindParam(":guia_con_ini", $datos["guia_con_ini"], PDO::PARAM_STR);
        $stmt->bindParam(":guia_remi_firm", $datos["guia_remi_firm"], PDO::PARAM_STR);
        $stmt->bindParam(":guia_con_firma", $datos["guia_con_firma"], PDO::PARAM_STR);
        $stmt->bindParam(":foto_evi_carga1", $datos["foto_evi_carga1"], PDO::PARAM_STR);
        $stmt->bindParam(":foto_evi_carga2", $datos["foto_evi_carga2"], PDO::PARAM_STR);
        $stmt->bindParam(":foto_evi_carga3", $datos["foto_evi_carga3"], PDO::PARAM_STR);
        $stmt->bindParam(":foto_evi_desc1", $datos["foto_evi_desc1"], PDO::PARAM_STR);
        $stmt->bindParam(":foto_evi_desc2", $datos["foto_evi_desc2"], PDO::PARAM_STR);
        $stmt->bindParam(":foto_evi_desc3", $datos["foto_evi_desc3"], PDO::PARAM_STR);
        $stmt->bindParam(":obervaciones", $datos["obervaciones"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        // Ejecutar la consulta y manejar errores
        try {
            if ($stmt->execute()) {
                return "ok";
            } else {
                $errorInfo = $stmt->errorInfo();
                return "Error al ejecutar la consulta: " . $errorInfo[2];
            }
        } catch (PDOException $e) {
            return "Syntax Error: " . $e->getMessage();
        }

        $stmt->close();
        $stmt = null;
    }
    // public static function mdlGuardarGuia($datos, $data)
    // {

    //     $tins[':fecha'] = date('Y-m-d');

    //     $tins[':cli_nom_cliente'] = $data['cliente'];
    //     $tins[':cli_email'] = $data['email'];

    //     $gbd = Conexion::conectar();
    //     $stmt = $gbd->prepare("INSERT INTO guia_remision (fecha) VALUES
    //     (:fecha)");
    //     if ($stmt->execute($tins)) {
    //         $itms[':id_compra'] = $gbd->lastInsertId();

    //         $stmt2 = Conexion::conectar()->prepare("INSERT INTO gre_cliente (guia_remision_id,cli_nom_client,cli_email)
    //         VALUES (:id_compra,:cli_nom_cliente,:cli_email)");
    //         $stmt2->execute();

    //         $tins[':tras_motivo'] = $data['motivo_traslado'];
    //         $tins[':tras_modalidad'] = $data['modal_traslado'];
    //         $tins[':tras_fecha'] = $data['fecha_traslado'];
    //         $tins[':tras_peso'] = $data['peso_bruto'];
    //         $tins[':tras_num_bult'] = $data['num_bultos'];
    //         $tins[':tras_num_cont'] = $data['num_contenedo'];
    //         $tins[':tras_cod_puerto'] = $data['codigo_puerto'];

    //         $stmt3 = Conexion::conectar()->prepare("INSERT INTO gre_data_traslado (guia_remision_id, tras_motivo, tras_modalidad, tras_fecha, tras_peso, tras_num_bult, tras_num_cont, tras_cod_puerto)
    //         VALUES (:id_compra,:tras_motivo,:tras_modalidad, :tras_fecha, :tras_peso, :tras_num_bult, :tras_num_cont, :tras_cod_puerto)");
    //         $stmt3->execute();

    //         $tins[':trans_tipo_doc'] = $data['tipo_doc'];
    //         $tins[':trans_num_doc_cont'] = $data['n_doc_conductor'];
    //         $tins[':trans_nombre_cont'] = $data['nom_conductor'];
    //         $tins[':trans_num_licencia'] = $data['num_licencia_conducir'];
    //         $tins[':trans_num_placa'] = $data['num_planca_vehiculo'];

    //         $stmt4 = Conexion::conectar()->prepare("INSERT INTO gre_transporte (guia_remision_id, trans_tipo_doc, trans_num_doc_cont, trans_nombre_cont, trans_num_licencia, trans_num_placa)
    //         VALUES (:id_compra, :trans_tipo_doc, :trans_num_doc_cont, :trans_nombre_cont, :trans_num_licencia, :trans_num_placa)");
    //         $stmt4->execute();


    //         $tins[':direc_dir_partida'] = $data['direc_start'];
    //         $tins[':direc_dir_llegada'] = $data['direc_end'];
    //         $tins[':direc_ubigeo_partida'] = $data['ubigeo_start'];
    //         $tins[':direc_ubigeo_llegada'] = $data['ubigeo_end'];

    //         $stmt5 = Conexion::conectar()->prepare("INSERT INTO gre_direccion (guia_remision_id, direc_dir_partida  ,direc_dir_llegada  ,direc_ubigeo_partida  ,direc_ubigeo_llegada)
    //         VALUES (:id_compra, :direc_dir_partida , :direc_dir_llegada  ,:direc_ubigeo_partida  ,:direc_ubigeo_llegada)");
    //         $stmt5->execute();

    //         foreach ($data['item'] as $key => $item) {
    //             $tins[':detail_cod'] = $item['codigo_hidden'];
    //             $tins[':detail_unidad'] = $item['unidad'];
    //             $tins[':detail_produc'] = $item['name'];
    //             $tins[':detail_cant'] = $item['cantidad'];
    //             $tins[':detail_val_unit'] = $item['valor'];
    //             $tins[':detail_val_total'] = $item['total'];

    //             $stmt6 = Conexion::conectar()->prepare("INSERT INTO gre_detalle_guia (guia_remision_id, detail_cod ,detail_unidad ,detail_produc ,detail_cant, detail_val_unit, detail_val_total )
    //             VALUES (:id_compra, :detail_cod, :detail_unidad, :detail_produc, :detail_cant, :detail_val_unit, :detail_val_total)");
    //             $stmt6->execute();
    //         }

    //         $tins[':doc_tipo_doc'] = $data['tipo_doc'];
    //         $tins[':doc_serie'] = $data['serie'];
    //         $tins[':doc_num'] = $data['numero'];
    //         $tins[':doc_info'] = $data['info_adi_sunat'];

    //         $stmt7 = Conexion::conectar()->prepare("INSERT INTO gre_doc_refe (guia_remision_id, doc_tipo_doc  ,doc_serie  ,doc_num  ,doc_info)
    //         VALUES (:id_compra, :doc_tipo_doc , :doc_serie , :doc_num , :doc_info )");
    //         $stmt7->execute();
    //     }

    // }

    public static function mdlGuardarGuia($datos, $data)
    {
        try {
            $tins[':fecha'] = date('Y-m-d');

            $gbd = Conexion::conectar();

            $stmt = $gbd->prepare("INSERT INTO guia_remision (fecha) VALUES (:fecha)");
            if ($stmt->execute($tins)) {
                $itms[':id_compra'] = $gbd->lastInsertId();

                $stmt2 = $gbd->prepare("INSERT INTO gre_cliente (guia_remision_id, cli_nom_client, cli_email)
                                    VALUES (:id_compra, :cli_nom_cliente, :cli_email)");
                $stmt2->execute([
                    ':id_compra' => $itms[':id_compra'],
                    ':cli_nom_cliente' => $data['cliente'],
                    ':cli_email' => $data['email']
                ]);

                $stmt3 = $gbd->prepare("INSERT INTO gre_data_traslado (guia_remision_id, tras_motivo, tras_modalidad, tras_fecha, tras_peso, tras_num_bult, tras_num_cont, tras_cod_puerto)
                                    VALUES (:id_compra, :tras_motivo, :tras_modalidad, :tras_fecha, :tras_peso, :tras_num_bult, :tras_num_cont, :tras_cod_puerto)");
                $stmt3->execute([
                    ':id_compra' => $itms[':id_compra'],
                    ':tras_motivo' => $data['motivo_traslado'],
                    ':tras_modalidad' => $data['modal_traslado'],
                    ':tras_fecha' => $data['fecha_traslado'],
                    ':tras_peso' => $data['peso_bruto'],
                    ':tras_num_bult' => $data['num_bultos'],
                    ':tras_num_cont' => $data['num_contenedo'],
                    ':tras_cod_puerto' => $data['codigo_puerto']
                ]);

                $stmt4 = $gbd->prepare("INSERT INTO gre_transporte (guia_remision_id, trans_tipo_doc, trans_num_doc_cont, trans_nombre_cont, trans_num_licencia, trans_num_placa)
                                    VALUES (:id_compra, :trans_tipo_doc, :trans_num_doc_cont, :trans_nombre_cont, :trans_num_licencia, :trans_num_placa)");
                $stmt4->execute([
                    ':id_compra' => $itms[':id_compra'],
                    ':trans_tipo_doc' => $data['tipo_doc'],
                    ':trans_num_doc_cont' => $data['n_doc_conductor'],
                    ':trans_nombre_cont' => $data['nom_conductor'],
                    ':trans_num_licencia' => $data['num_licencia_conducir'],
                    ':trans_num_placa' => $data['num_planca_vehiculo']
                ]);

                $stmt5 = $gbd->prepare("INSERT INTO gre_direccion (guia_remision_id, direc_dir_partida, direc_dir_llegada, direc_ubigeo_partida, direc_ubigeo_llegada)
                                    VALUES (:id_compra, :direc_dir_partida, :direc_dir_llegada, :direc_ubigeo_partida, :direc_ubigeo_llegada)");
                $stmt5->execute([
                    ':id_compra' => $itms[':id_compra'],
                    ':direc_dir_partida' => $data['direc_start'],
                    ':direc_dir_llegada' => $data['direc_end'],
                    ':direc_ubigeo_partida' => $data['ubigeo_start'],
                    ':direc_ubigeo_llegada' => $data['ubigeo_end']
                ]);

                foreach ($data['item'] as $key => $item) {
                    $stmt6 = $gbd->prepare("INSERT INTO gre_detalle_guia (guia_remision_id, detail_cod, detail_unidad, detail_produc, detail_cant, detail_val_unit, detail_val_total)
                                        VALUES (:id_compra, :detail_cod, :detail_unidad, :detail_produc, :detail_cant, :detail_val_unit, :detail_val_total)");
                    $stmt6->execute([
                        ':id_compra' => $itms[':id_compra'],
                        ':detail_cod' => $item['codigo_hidden'],
                        ':detail_unidad' => $item['unidad'],
                        ':detail_produc' => $item['name'],
                        ':detail_cant' => $item['cantidad'],
                        ':detail_val_unit' => $item['valor'],
                        ':detail_val_total' => $item['total']
                    ]);
                }

                $stmt7 = $gbd->prepare("INSERT INTO gre_doc_refe (guia_remision_id, doc_tipo_doc, doc_serie, doc_num, doc_info)
                                    VALUES (:id_compra, :doc_tipo_doc, :doc_serie, :doc_num, :doc_info)");
                $stmt7->execute([
                    ':id_compra' => $itms[':id_compra'],
                    ':doc_tipo_doc' => $data['tipo_doc'],
                    ':doc_serie' => $data['serie'],
                    ':doc_num' => $data['numero'],
                    ':doc_info' => $data['info_adi_sunat']
                ]);
                return "ok";
            }
        } catch (PDOException $e) {
            // Manejo de errores
            die("Error: " . $e->getMessage());
        }
    }

    public static function mdlMostrar($tabla, $item, $valor)
    {
        if ($item != null) {
            $valor2 = 1;
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :id");
            $stmt->bindParam(":id", $valor, PDO::PARAM_INT);

            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        }
    }
    public function load_remision($fecha_inicio, $fecha_fin)
    {
        $stmt = Conexion::conectar()->prepare(
            "SELECT 
                gr.id, 
                gr.fecha, 
                gerdt.tras_fecha, 
                grec.cli_nom_client, 
                gerd.direc_ubigeo_partida, 
                gerd.direc_ubigeo_llegada 
            FROM guia_remision gr 
            INNER JOIN gre_cliente grec ON gr.id = grec.guia_remision_id 
            INNER JOIN gre_direccion gerd ON gr.id = gerd.guia_remision_id 
            INNER JOIN gre_data_traslado gerdt ON gr.id = gerdt.guia_remision_id 
            WHERE gr.fecha BETWEEN :fecha_ini AND :fecha_fin 
            ORDER BY gr.id"
        );
        $stmt->bindValue(":fecha_ini", $fecha_inicio);
        $stmt->bindValue(":fecha_fin", $fecha_fin);
        if ($stmt->execute()) {
            $rt['success'] = true;
            $rt['data'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $rt['success'] = false;
            $rt['error'] = $stmt->errorInfo();
        }
        return $rt;
    }
    public function load_total_remision($id)
    {
        $stmt = Conexion::conectar()->prepare(
            "SELECT 
            gr.id, gr.fecha,
            grec.cli_nom_client, grec.cli_email,
            gred.direc_dir_partida, gred.direc_dir_llegada, gred.direc_ubigeo_partida, gred.direc_ubigeo_llegada,
            gredt.tras_cod_puerto, gredt.tras_fecha, gredt.tras_modalidad, gredt.tras_motivo, gredt.tras_num_bult, gredt.tras_num_cont, gredt.tras_peso,
            gredg.detail_cant, gredg.detail_cod, gredg.detail_produc, gredg.detail_unidad, gredg.detail_val_total, gredg.detail_val_unit,
            gredf.doc_info, gredf.doc_num, gredf.doc_serie, gredf.doc_tipo_doc,
            gret.trans_nombre_cont, gret.trans_num_doc_cont, gret.trans_num_licencia, gret.trans_num_placa, gret.trans_tipo_doc
        
            FROM guia_remision gr 
            INNER JOIN gre_cliente grec ON gr.id = grec.guia_remision_id 
            INNER JOIN gre_direccion gred ON gr.id = gred.guia_remision_id 
            INNER JOIN gre_data_traslado gredt ON gr.id = gredt.guia_remision_id 
            INNER JOIN gre_detalle_guia gredg ON gr.id = gredg.guia_remision_id 
            INNER JOIN gre_doc_refe gredf ON gr.id = gredf.guia_remision_id 
            INNER JOIN gre_transporte gret ON gr.id = gret.guia_remision_id 
            WHERE gr.id = :id"
        );
        $stmt->bindValue(":id", $id);
        if ($stmt->execute()) {
            $rt['success'] = true;
            $rt['data'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $rt['success'] = false;
            $rt['error'] = $stmt->errorInfo();
        }
        return $rt;
    }
}
switch ($_POST['accion']) {
    case 'loadData':
        $respuesta = ModeloGuiaRemision::mdlMostrar("guia_remi", null, null);
        echo json_encode($respuesta);
        break;
    case 'loadEdit':
        $respuesta = ModeloGuiaRemision::mdlMostrar("guia_remi", 'id', $_POST['id']);
        echo json_encode($respuesta);
        break;
    case 'loadEditDatta':
        $respuesta = ModeloGuiaRemision::mdlMostrar($_POST['tabla'], $_POST['fk_id'], $_POST['id']);
        echo json_encode($respuesta);
        break;
}
