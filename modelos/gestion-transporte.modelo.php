<?php
require_once "conexion.php";
class ModeloGestionTransporte
{
    public static function mdlIngresarRutaTransporte($tabla, $datos)
    {

        $pdo = Conexion::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("
        INSERT INTO $tabla(
            cotizacion_id, activo_id, conductor_id, descripcion_active, 
            placa_active, tipo_active, marca_active, modelo_active, capacidad_active, 
            file_active, nombre_tranport, dni_tranport, n_licencia_tranport, contac_tranport, 
            file_tranport, observation, file_1, file_2, file_3, 
            distancia_aprox, tiempo_aprox, startM_lat, startM_lng, endM_lat, endM_lng, dificultad, ruta, state
        ) 
        VALUES (
            :cotizacion_id, :activo_id, :conductor_id, :descripcion_active, 
            :placa_active, :tipo_active, :marca_active, :modelo_active, :capacidad_active, 
            :file_active, :nombre_tranport, :dni_tranport, :n_licencia_tranport, :contac_tranport, 
            :file_tranport, :observation, :file_1, :file_2, :file_3, 
            :distancia_aprox, :tiempo_aprox, :startM_lat, :startM_lng, :endM_lat, :endM_lng, :dificultad, :ruta, :state
        )");
        $stmt->bindParam(":cotizacion_id", $datos["cotizacion"], PDO::PARAM_INT);
        $stmt->bindParam(":activo_id", $datos["activoFijo_id"], PDO::PARAM_INT);
        // $stmt->bindParam(":activoFijo", $datos["activoFijo_id"], PDO::PARAM_STR);
        $stmt->bindParam(":conductor_id", $datos["conductor"], PDO::PARAM_INT);
        $stmt->bindParam(":descripcion_active", $datos["description_activo"], PDO::PARAM_STR);
        $stmt->bindParam(":placa_active", $datos["placa_activo"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo_active", $datos["tipo_activo"], PDO::PARAM_STR);
        $stmt->bindParam(":marca_active", $datos["marca_activo"], PDO::PARAM_STR);
        $stmt->bindParam(":modelo_active", $datos["modelo_activo"], PDO::PARAM_STR);
        $stmt->bindParam(":capacidad_active", $datos["capacidad_activo"], PDO::PARAM_STR);
        $stmt->bindParam(":file_active", $datos["doc-activo_activo"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre_tranport", $datos["nom_res"], PDO::PARAM_STR);
        $stmt->bindParam(":dni_tranport", $datos["dni_res"], PDO::PARAM_INT);
        $stmt->bindParam(":n_licencia_tranport", $datos["n_licencia_res"], PDO::PARAM_STR);
        $stmt->bindParam(":contac_tranport", $datos["contacto_nom_res"], PDO::PARAM_INT);
        $stmt->bindParam(":file_tranport", $datos["doc_res"], PDO::PARAM_STR);
        $stmt->bindParam(":observation", $datos["observacion"], PDO::PARAM_STR);
        $stmt->bindParam(":file_1", $datos["doc_1_info"], PDO::PARAM_STR);
        $stmt->bindParam(":file_2", $datos["doc_2_info"], PDO::PARAM_STR);
        $stmt->bindParam(":file_3", $datos["doc_3_info"], PDO::PARAM_STR);
        $stmt->bindParam(":distancia_aprox", $datos["distancia"], PDO::PARAM_STR);
        $stmt->bindParam(":tiempo_aprox", $datos["tiempo"], PDO::PARAM_STR);
        $stmt->bindParam(":startM_lat", $datos["startM_lat"], PDO::PARAM_STR);
        $stmt->bindParam(":startM_lng", $datos["startM_lng"], PDO::PARAM_STR);
        $stmt->bindParam(":endM_lat", $datos["endM_lat"], PDO::PARAM_STR);
        $stmt->bindParam(":endM_lng", $datos["endM_lng"], PDO::PARAM_STR);
        $stmt->bindParam(":dificultad", $datos["dificultad"], PDO::PARAM_STR);
        $stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
        $stmt->bindParam(":state", $datos["state"], PDO::PARAM_INT);

        try {
            if ($stmt->execute()) {
                // Obtener el ID de la última inserción
                return ['status' => 'ok', 'lastInsertId' => 'registrado'];
            } else {
                return ['status' => 'error', 'message' => 'Error al insertar en la base de datos'];
            }
        } catch (PDOException $e) {
            return "Syntax Error: " . $e->getMessage();
        }

        $stmt->closeCursor();
        $stmt = null;
    }
    public static function mdlIngresarRutaCerrada($tabla, $datos)
    {
        $pdo = Conexion::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("
        INSERT INTO $tabla (
            gestion_ruta_id, ruta, distancia_aprox, tiempo_aprox, 
            dificultad_final, adversidades, distancia_final, tiempo_final, 
            doc_in_1, doc_in_2, doc_in_3
        ) 
        VALUES (
            :gestion_ruta_id, :ruta, :distancia_aprox, :tiempo_aprox, 
            :dificultad_final, :adversidades, :distancia_final, :tiempo_final, 
            :doc_in_1, :doc_in_2, :doc_in_3
        )
    ");

        $stmt->bindParam(":gestion_ruta_id", $datos["id"], PDO::PARAM_INT);
        $stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
        $stmt->bindParam(":distancia_aprox", $datos["distancia_aprox"], PDO::PARAM_STR);
        $stmt->bindParam(":tiempo_aprox", $datos["tiempo_aprox"], PDO::PARAM_STR);
        $stmt->bindParam(":dificultad_final", $datos["dificultad_final"], PDO::PARAM_STR);
        $stmt->bindParam(":adversidades", $datos["adversidades"], PDO::PARAM_STR);
        $stmt->bindParam(":distancia_final", $datos["distancia_final"], PDO::PARAM_STR);
        $stmt->bindParam(":tiempo_final", $datos["tiempo_final"], PDO::PARAM_STR);
        $stmt->bindParam(":doc_in_1", $datos["doc_in_1"], PDO::PARAM_STR);
        $stmt->bindParam(":doc_in_2", $datos["doc_in_2"], PDO::PARAM_STR);
        $stmt->bindParam(":doc_in_3", $datos["doc_in_3"], PDO::PARAM_STR);

        try {
            if ($stmt->execute()) {
                return ['status' => 'ok', 'menssge' => 'dato registrado'];
            } else {
                return ['status' => 'error', 'message' => 'Error al insertar en la base de datos'];
            }
        } catch (PDOException $e) {
            return "Syntax Error: " . $e->getMessage();
        }

        $stmt->closeCursor();
        $stmt = null;
    }

    public static function mdlActualizarRutaTransporte($tabla, $datos)
    {
        $pdo = Conexion::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("
        UPDATE $tabla SET 
            cotizacion_id = :cotizacion_id, 
            activo_id = :activo_id, 
            conductor_id = :conductor_id, 
            descripcion_active = :descripcion_active, 
            placa_active = :placa_active, 
            tipo_active = :tipo_active, 
            marca_active = :marca_active, 
            modelo_active = :modelo_active, 
            capacidad_active = :capacidad_active, 
            file_active = :file_active, 
            nombre_tranport = :nombre_tranport, 
            dni_tranport = :dni_tranport, 
            n_licencia_tranport = :n_licencia_tranport, 
            contac_tranport = :contac_tranport, 
            file_tranport = :file_tranport, 
            observation = :observation, 
            file_1 = :file_1, 
            file_2 = :file_2, 
            file_3 = :file_3, 
            distancia_aprox = :distancia_aprox, 
            tiempo_aprox = :tiempo_aprox, 
            startM_lat = :startM_lat, 
            startM_lng = :startM_lng, 
            endM_lat = :endM_lat, 
            endM_lng = :endM_lng,
            dificultad = :dificultad, 
            ruta = :ruta
        WHERE id = :id");

        // Enlace de parámetros
        $stmt->bindParam(":cotizacion_id", $datos["cotizacion"], PDO::PARAM_INT);
        $stmt->bindParam(":activo_id", $datos["activoFijo_id"], PDO::PARAM_INT);
        $stmt->bindParam(":conductor_id", $datos["conductor"], PDO::PARAM_INT);
        $stmt->bindParam(":descripcion_active", $datos["description_activo"], PDO::PARAM_STR);
        $stmt->bindParam(":placa_active", $datos["placa_activo"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo_active", $datos["tipo_activo"], PDO::PARAM_STR);
        $stmt->bindParam(":marca_active", $datos["marca_activo"], PDO::PARAM_STR);
        $stmt->bindParam(":modelo_active", $datos["modelo_activo"], PDO::PARAM_STR);
        $stmt->bindParam(":capacidad_active", $datos["capacidad_activo"], PDO::PARAM_STR);
        $stmt->bindParam(":file_active", $datos["doc-activo_activo"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre_tranport", $datos["nom_res"], PDO::PARAM_STR);
        $stmt->bindParam(":dni_tranport", $datos["dni_res"], PDO::PARAM_INT);
        $stmt->bindParam(":n_licencia_tranport", $datos["n_licencia_res"], PDO::PARAM_STR);
        $stmt->bindParam(":contac_tranport", $datos["contacto_nom_res"], PDO::PARAM_INT);
        $stmt->bindParam(":file_tranport", $datos["doc_res"], PDO::PARAM_STR);
        $stmt->bindParam(":observation", $datos["observacion"], PDO::PARAM_STR);
        $stmt->bindParam(":file_1", $datos["doc_1_info"], PDO::PARAM_STR);
        $stmt->bindParam(":file_2", $datos["doc_2_info"], PDO::PARAM_STR);
        $stmt->bindParam(":file_3", $datos["doc_3_info"], PDO::PARAM_STR);
        $stmt->bindParam(":distancia_aprox", $datos["distancia"], PDO::PARAM_STR);
        $stmt->bindParam(":tiempo_aprox", $datos["tiempo"], PDO::PARAM_STR);
        $stmt->bindParam(":startM_lat", $datos["startM_lat"], PDO::PARAM_STR);
        $stmt->bindParam(":startM_lng", $datos["startM_lng"], PDO::PARAM_STR);
        $stmt->bindParam(":endM_lat", $datos["endM_lat"], PDO::PARAM_STR);
        $stmt->bindParam(":endM_lng", $datos["endM_lng"], PDO::PARAM_STR);
        $stmt->bindParam(":dificultad", $datos["dificultad"], PDO::PARAM_STR);
        $stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        try {
            if ($stmt->execute()) {
                // Obtener el ID de la última inserción
                $lastInsertId = $pdo->lastInsertId();
                return ['status' => 'ok', 'lastInsertId' => $lastInsertId];
            } else {
                return ['status' => 'error', 'message' => 'Error al insertar en la base de datos'];
            }
        } catch (PDOException $e) {
            return "Syntax Error: " . $e->getMessage();
        }

        $stmt->closeCursor();
        $stmt = null;
    }

    public function buscar_proveedor($term)
    {

        $stmt = Conexion::conectar()->prepare("SELECT proveedor_pk AS id, razon_social AS name, ruc, direccion_prov AS direccion FROM proveedores WHERE ruc LIKE :term OR razon_social LIKE :term");
        $stmt->bindValue(":term", "%$term%");
        if ($stmt->execute()) {
            $rt['success'] = true;
            $rt['data'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $rt['success'] = false;
            $rt['error'] = $stmt->errorInfo();
        }
        return $rt;
    }
    public static function mdlMostrar($tabla, $item, $valor, $formato)
    {
        try {
            if ($item != null) {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :id");
                if ($formato == 'num') {
                    $stmt->bindParam(":id", $valor, PDO::PARAM_INT); // Si es numérico, lo tratamos como entero
                } else {
                    $stmt->bindParam(":id", $valor, PDO::PARAM_STR); // Si no es numérico, lo tratamos como string
                }
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
                // return $stmt->fetch();
            } else {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
        } catch (Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
    public static function mdlEliminar($tabla, $item, $valor)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id =:id");
        $stmt->bindParam(":id", $valor, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }
    public static function mdlListarJoin($tabla, $item = null, $valor = null)
    {
        try {
            // Construimos la consulta base con los joins
            $query = "SELECT 
                    grt.id, 
                    grt.state, 
                    grt.activo_id, 
                    grt.descripcion_active, 
                    grt.placa_active, 
                    af.descripcion, 
                    af.placa, 
                    grt.cotizacion_id, 
                    ct.nombre_cliente, 
                    grt.conductor_id, 
                    grt.nombre_tranport, 
                    grt.ruta,
                    pd.razon_social,
                    af.foto_activo,
                    af.documentos_propiedad,
                    grt.file_active,
                    pd.cv,
                    grt.file_tranport,
                    grt.file_1,
                    grt.file_2,
                    grt.file_3
                  FROM gestion_ruta_transporte AS grt
                  LEFT JOIN activo_fijo AS af ON grt.activo_id = af.id
                  INNER JOIN cotizacion AS ct ON grt.cotizacion_id = ct.id_cotizacion
                  LEFT JOIN proveedores AS pd ON grt.conductor_id = pd.proveedor_pk";

            // Si hay un filtro por un campo específico, agregamos la cláusula WHERE
            if ($item != null) {
                $query .= " WHERE $item = :valor";
            }

            $stmt = Conexion::conectar()->prepare($query);

            // Si se pasa un valor, se enlaza el parámetro
            if ($item != null) {
                // Detectamos si el valor es numérico para enlazarlo adecuadamente
                if (is_numeric($valor)) {
                    $stmt->bindParam(":valor", $valor, PDO::PARAM_INT);
                } else {
                    $stmt->bindParam(":valor", $valor, PDO::PARAM_STR);
                }
            }

            $stmt->execute();

            // Devolvemos los resultados
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            // En caso de error, devolvemos información del problema
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
    public static function mdlListarJoinCerradas($valor)
    {
        $stmt = Conexion::conectar()->prepare("SELECT 
                        grt.id, 
                        grt.distancia_aprox,
                        grt.tiempo_aprox,
                        grt.ruta,
                        grt.dificultad,
                        grt.file_1,
                        grt.file_2,
                        grt.file_3,
                        grc.distancia_final,
                        grc.tiempo_final,
                        grc.adversidades,
                        grc.dificultad_final,
                        grc.doc_in_1,
                        grc.doc_in_2,
                        grc.doc_in_3
                        FROM gestion_ruta_transporte AS grt
                        INNER JOIN gestion_rutas_cerrada AS grc ON grt.id = grc.gestion_ruta_id
                        where grc.gestion_ruta_id = :id");

        $stmt->bindParam(":id", $valor, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
switch ($_POST['accion']) {
    case 'loadJoins':
        $respuesta = ModeloGestionTransporte::mdlListarJoin("gestion_ruta_transporte");
        echo json_encode($respuesta);
        break;
    case 'loadData':
        $respuesta = ModeloGestionTransporte::mdlMostrar("gestion_ruta_transporte", null, null, 'not-num');
        echo json_encode($respuesta);
        break;
    case 'load_X_Id':
        $respuesta = ModeloGestionTransporte::mdlMostrar("gestion_ruta_transporte", 'id', $_POST['id'], 'num');
        echo json_encode($respuesta);
        break;
    case 'eliminar':
        $respuesta = ModeloGestionTransporte::mdlEliminar("gestion_ruta_transporte", 'id', $_POST['id']);
        echo json_encode($respuesta);
        break;
    case 'load_cerradas':
        $respuesta = ModeloGestionTransporte::mdlListarJoinCerradas($_POST['id']);
        echo json_encode($respuesta);
        break;
}
