<?php
require_once "conexion.php";

class ModeloFacturaBpm
{

    public function update_send_sunat_comprobante_b_f($id, $cpe, $cdr, $data_send_json, $ruta_xml, $respuesta_sunat, $respuesta_sunat__json)
    {
        $stmt = Conexion::conectar()->query("UPDATE `facturacion_comprobante_cabecera` SET cpe='$cpe',cdr='$cdr',data_send_json='$data_send_json',ruta_xml='$ruta_xml',respuesta_sunat='$respuesta_sunat',estado_envio='$respuesta_sunat',respuesta_sunat__json='$respuesta_sunat__json' WHERE id='$id'");
    }

    //RECUPERAR CATEGORIA DE PRODUCTO DE ACUERDO A ÚLTIMO PRODUCTO 
    public function getCategoria($bar_code)
    {

        $codigo = trim($bar_code);
        $query = Conexion::conectar()->query("SELECT * FROM `productos` WHERE UPPER(codigo)='$codigo'");
        foreach ($query as $row) {
            $id_categoria = $row["id_categoria"];
        }
        // Comprueba si la categoría es null y usa 3 como valor predeterminado
        $id_categoria = ($id_categoria !== null) ? $id_categoria : 3;

        return $id_categoria;
    }

    //RECUPERAR ÚLTIMO PRECIO DE COMPRA PRODUCTO VENTA DE LA TABLA INGRESOS 
    public function getPrecioCompra($codigoProducto, $cantidadDeseada)
    {
        // Limpiar el código del producto
        $codigo = strtoupper(trim($codigoProducto));

        // Conectar a la base de datos y realizar la consulta
        $query = Conexion::conectar()->query("SELECT lote, stock, precio_compra FROM kardex WHERE UPPER(codigo) = '$codigo' AND action_movimiento='INGRESO ALMACEN' AND fk_almacen='1' ORDER BY id desc");

        $sumaStock = 0;
        $sumaPrecioCompra = 0;
        $contadorFilas = 0;

        // Iterar sobre los resultados de la consulta
        foreach ($query as $fila) {
            $sumaStock += $fila['stock'];
            $sumaPrecioCompra += $fila['stock'] * $fila['precio_compra'];
            $contadorFilas++;

            // Detener el bucle una vez que se alcanza o supera la cantidad deseada
            if ($sumaStock >= $cantidadDeseada) {
                break;
            }
        }

        // Calcular el promedio del precio de compra
        $promedioPrecioCompra = 0;
        if ($contadorFilas > 0) {
            if ($contadorFilas === 1) {
                // Si solo hay una fila, usar el valor de esa fila
                $promedioPrecioCompra = $fila['precio_compra'];
            } else {
                // Si hay más de una fila, calcular el promedio ponderado
                $promedioPrecioCompra = $sumaPrecioCompra / $sumaStock;
            }
        }

        return $promedioPrecioCompra;
    }



    //RECUPERAR LOTE DE PRODUCTO VENDIDO DE ACUERO A LA CANTIDAD DE FILAS Y LOTES NECESARIOS PARA CUBRIR STOCK VENDIDO
    // public function getLote($codigoProducto, $cantidadDeseada) {
    public function getLote($codigoProducto, $cantidadDeseada)
    {
        // Limpiar el código del producto
        $codigo = strtoupper(trim($codigoProducto));

        // Conectar a la base de datos y realizar la consulta
        $conexion = Conexion::conectar();
        $query = $conexion->query("SELECT lote, stock FROM kardex WHERE UPPER(codigo) = '$codigoProducto' AND action_movimiento='INGRESO ALMACEN' AND fk_almacen='1' ORDER BY id DESC");

        $sumaStock = 0;
        $lotesSeleccionados = "";

        // Verificar si la consulta devolvió resultados
        if ($query->rowCount() > 0) {
            // Iterar sobre los resultados de la consulta
            foreach ($query as $fila) {
                // Acumular stock
                $sumaStock += $fila['stock'];
                // Agregar el lote al array de lotes seleccionados
                $lotesSeleccionados = $lotesSeleccionados . ' | ' . $fila['lote'];
                // Detener el bucle una vez que se alcanza o supera la cantidad deseada
                if ($sumaStock >= $cantidadDeseada) {
                    // Retornar los lotes seleccionados
                    return $lotesSeleccionados;
                }
            }
            // Después del bucle, si no se alcanzó la cantidad deseada
            // Retornar un mensaje que indique que no se encontró suficiente stock
            return 'No encontrado';
        } else {
            // Si no se encontraron registros
            return 'No encontrado';
        }
    }



    /*=============================================
     INSERT SALIDAS POR VENTA
    =============================================*/
    public function insertar_salida_en_kardex($newCategoria, $bar_code, $descripcion, $viw_img, $Stock, $PrecioCompra, $PrecioVenta, $motivosalida, $fk_dm_productos, $almacenes, $Lote, $doc_org_de_compBpm)
    {

        // $sessionidusuario=USERLOGEADO;
        $sessionidusuario = $_SESSION["nombre"] . ' (' . $_SESSION["usuario"] . ')';

        $the_pk_cabecera_factura = Conexion::conectar()->query("SELECT * FROM `facturacion_comprobante_cabecera` WHERE documento_origen_de_comprobante='$doc_org_de_compBpm'");
        foreach ($the_pk_cabecera_factura as $rowiiii) {
            $serieComprobante = $rowiiii["serie"];
            $correlativoComprobante = $rowiiii["correlativo"];
            $numDocIdentidadProveedor = $rowiiii["num_docu_identidad"];
            $FechaVencimiento = '1990-01-01';
        }




        $query = Conexion::conectar()->query("INSERT INTO `kardex`
                                            (`id`,
                                            `id_categoria`,
                                            `codigo`,
                                            `descripcion`,
                                            `imagen`,
                                            `stock`,
                                            `precio_compra`,
                                            `precio_venta`,
                                            `fecha_kardex`,
                                            `action_movimiento`,                                             
                                            `usuario_que_registra`,
                                            `fk_dm_productos`,
                                            `fk_almacen`,
                                            `lote`,
                                            `serie_comprobante_compra`,
                                            `correlativo_comprobante_compra`,
                                            `num_documento_identidad`,
                                            `fecha_vencimiento`)
                                                    VALUES
                                            (NULL,
                                            '$newCategoria',
                                            '$bar_code',
                                            '$descripcion',
                                            '$viw_img',
                                            '$Stock',
                                            '$PrecioCompra',
                                            '$PrecioVenta',
                                            CURRENT_TIMESTAMP,
                                            '$motivosalida',
                                            '$sessionidusuario',
                                            '$fk_dm_productos',
                                            '$almacenes',
                                            '$Lote',
                                            '$serieComprobante',
                                            '$correlativoComprobante',
                                            '$numDocIdentidadProveedor',
                                            '$FechaVencimiento')");
    }

    /*=============================================
    MOSTRAR Bpm PARA FACTURA cabecera
    =============================================*/
    public function mdlMostrarFacturaBpm($idBpm)
    {
        $stmt = Conexion::conectar()->query("SELECT A.pk_bpm ,A.correlativo as 'correlativo_bpm',A.lote as 'lote_bpm',B.nombre as 'nombre_cliente',B.documento as 'docu_cliente',B.direccion as 'direccion_cliente' FROM `bpm` AS A INNER JOIN clientes AS B ON A.doc_identidad=B.documento WHERE A.pk_bpm='$idBpm'");

        $listPags["items"] = array();
        foreach ($stmt as $row) {
            $retorn = array(
                "correlativo_bpm" => $row["correlativo_bpm"],
                "lote_bpm" => $row["lote_bpm"],
                "nombre_cliente" => $row["nombre_cliente"],
                "docu_cliente" => $row["docu_cliente"],
                "direccion_cliente" => $row["direccion_cliente"],
            );
            array_push($listPags["items"], $retorn);
        }
        return json_encode($listPags["items"]);
    }
    /*=============================================
    MOSTRAR Bpm PARA FACTURA cuerpo
    =============================================*/
    public function mdlMostrarItemParaFacturaBpm($idBpm)
    {
        $stmt = Conexion::conectar()->query("SELECT a.id as 'pk',a.codBpm as 'pk_bpm',a.fk_producto as 'pk_dat_maestro_item',a.barcode_producto as 'barcode',CONCAT(a.nombre_producto,' ',a.capacidad_producto) as 'description',a.precio_venta_producto as 'pv_unidad',a.cantidad_producto as 'cantidad',a.product_sub_total as 'sub_total' FROM `productos_anexos__bpm` as a
                     where a.precio_venta_producto>0 and codBpm='$idBpm'
                        UNION
                        SELECT pk_sab as 'pk',fk_bpm as 'pk_bpm',fk_services as 'pk_dat_maestro_item','SERVICIO' as 'barcode',servicio as 'description' , precio as 'pv_unidad', cantidad , total as 'sub_total' FROM `servicios_anexos_bpm` where fk_bpm='$idBpm'");

        $listPags["items"] = array();

        foreach ($stmt as $row) {
            $importe_total = $importe_total + $row["sub_total"];
            $retorn = array(
                "pk" => $row["pk"],
                "pk_bpm" => $row["pk_bpm"],
                "pk_dat_maestro_item" => $row["pk_dat_maestro_item"],
                "barcode" => $row["barcode"],
                "description" => $row["description"],
                "pv_unidad" => $row["pv_unidad"],
                "cantidad" => $row["cantidad"],
                "sub_total" => $row["sub_total"],
            );
            array_push($listPags["items"], $retorn);
        }
        return json_encode($listPags["items"]);
    }
    /*=============================================
    --- VIEW CABECERA COMPROBANTE
    =============================================*/
    public function mdlRenderCabezoteFactura($tipo_comprobante)
    {
        $query = Conexion::conectar()->query("SELECT * FROM `facturacion_parametros` WHERE tipo_comprobante='$tipo_comprobante' and activo='1'");

        $listData["items"] = array();
        foreach ($query as $row) {
            $retorn = array(
                "id" => $row["id"],
                "tipo_comprobante" => $row["tipo_comprobante"],
                "correlativo" => $row["correlativo"] + 1,
                "regional_id" => $row["regional_id"],
                "serie" => $row["serie"],
                "activo" => $row["activo"],
                "fecha_creacion" => $row["fecha_creacion"],
            );
            array_push($listData["items"], $retorn);
        }
        return json_encode($listData["items"]);
    }

    /*=======================================================================================
CONVERTIR MONTO TOTAL A PAGAR DE NUMERO A TEXTO
=========================================================================================*/
    // END FUNCTION

    public function subfijo($xx)
    {
        // esta función regresa un subfijo para la cifra
        $xx = trim($xx);
        $xstrlen = strlen($xx);
        if ($xstrlen == 1 || $xstrlen == 2 || $xstrlen == 3) {
            $xsub = "";
        }

        //
        if ($xstrlen == 4 || $xstrlen == 5 || $xstrlen == 6) {
            $xsub = "MIL";
        }

        //
        return $xsub;
    }

    public function numeroAletrasDinero($xcifra)
    {
        $xarray = array(
            0 => "Cero",
            1 => "UN",
            "DOS",
            "TRES",
            "CUATRO",
            "CINCO",
            "SEIS",
            "SIETE",
            "OCHO",
            "NUEVE",
            "DIEZ",
            "ONCE",
            "DOCE",
            "TRECE",
            "CATORCE",
            "QUINCE",
            "DIECISEIS",
            "DIECISIETE",
            "DIECIOCHO",
            "DIECINUEVE",
            "VEINTI",
            30 => "TREINTA",
            40 => "CUARENTA",
            50 => "CINCUENTA",
            60 => "SESENTA",
            70 => "SETENTA",
            80 => "OCHENTA",
            90 => "NOVENTA",
            100 => "CIENTO",
            200 => "DOSCIENTOS",
            300 => "TRESCIENTOS",
            400 => "CUATROCIENTOS",
            500 => "QUINIENTOS",
            600 => "SEISCIENTOS",
            700 => "SETECIENTOS",
            800 => "OCHOCIENTOS",
            900 => "NOVECIENTOS",
        );
        //
        $xcifra = trim($xcifra);
        $xlength = strlen($xcifra);
        $xpos_punto = strpos($xcifra, ".");
        $xaux_int = $xcifra;
        $xdecimales = "00";
        if (!($xpos_punto === false)) {
            if ($xpos_punto == 0) {
                $xcifra = "0" . $xcifra;
                $xpos_punto = strpos($xcifra, ".");
            }
            $xaux_int = substr($xcifra, 0, $xpos_punto); // obtengo el entero de la cifra a covertir
            $xdecimales = substr($xcifra . "00", $xpos_punto + 1, 2); // obtengo los valores decimales
        }

        $XAUX = str_pad($xaux_int, 18, " ", STR_PAD_LEFT); // ajusto la longitud de la cifra, para que sea divisible por centenas de miles (grupos de 6)
        $xcadena = "";
        for ($xz = 0; $xz < 3; $xz++) {
            $xaux = substr($XAUX, $xz * 6, 6);
            $xi = 0;
            $xlimite = 6; // inicializo el contador de centenas xi y establezco el límite a 6 dígitos en la parte entera
            $xexit = true; // bandera para controlar el ciclo del While
            while ($xexit) {
                if ($xi == $xlimite) { // si ya llegó al límite máximo de enteros
                    break; // termina el ciclo
                }

                $x3digitos = ($xlimite - $xi) * -1; // comienzo con los tres primeros digitos de la cifra, comenzando por la izquierda
                $xaux = substr($xaux, $x3digitos, abs($x3digitos)); // obtengo la centena (los tres dígitos)
                for ($xy = 1; $xy < 4; $xy++) {
                    // ciclo para revisar centenas, decenas y unidades, en ese orden
                    switch ($xy) {
                        case 1: // checa las centenas
                            if (substr($xaux, 0, 3) < 100) {
                                // si el grupo de tres dígitos es menor a una centena ( < 99) no hace nada y pasa a revisar las decenas

                            } else {
                                $key = (int) substr($xaux, 0, 3);
                                if (true === array_key_exists($key, $xarray)) {
                                    // busco si la centena es número redondo (100, 200, 300, 400, etc..)
                                    $xseek = $xarray[$key];
                                    $xsub = $this->subfijo($xaux); // devuelve el subfijo correspondiente (Millón, Millones, Mil o nada)
                                    if (substr($xaux, 0, 3) == 100) {
                                        $xcadena = " " . $xcadena . " CIEN " . $xsub;
                                    } else {
                                        $xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;
                                    }

                                    $xy = 3; // la centena fue redonda, entonces termino el ciclo del for y ya no reviso decenas ni unidades
                                } else {
                                    // entra aquí si la centena no fue numero redondo (101, 253, 120, 980, etc.)
                                    $key = (int) substr($xaux, 0, 1) * 100;
                                    $xseek = $xarray[$key]; // toma el primer caracter de la centena y lo multiplica por cien y lo busca en el arreglo (para que busque 100,200,300, etc)
                                    $xcadena = " " . $xcadena . " " . $xseek;
                                } // ENDIF ($xseek)
                            } // ENDIF (substr($xaux, 0, 3) < 100)
                            break;
                        case 2: // checa las decenas (con la misma lógica que las centenas)
                            if (substr($xaux, 1, 2) < 10) {
                            } else {
                                $key = (int) substr($xaux, 1, 2);
                                if (true === array_key_exists($key, $xarray)) {
                                    $xseek = $xarray[$key];
                                    $xsub = $this->subfijo($xaux);
                                    if (substr($xaux, 1, 2) == 20) {
                                        $xcadena = " " . $xcadena . " VEINTE " . $xsub;
                                    } else {
                                        $xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;
                                    }

                                    $xy = 3;
                                } else {
                                    $key = (int) substr($xaux, 1, 1) * 10;
                                    $xseek = $xarray[$key];
                                    if (20 == substr($xaux, 1, 1) * 10) {
                                        $xcadena = " " . $xcadena . " " . $xseek;
                                    } else {
                                        $xcadena = " " . $xcadena . " " . $xseek . " Y ";
                                    }
                                } // ENDIF ($xseek)
                            } // ENDIF (substr($xaux, 1, 2) < 10)
                            break;
                        case 3: // checa las unidades
                            if (substr($xaux, 2, 1) < 1) {
                                // si la unidad es cero, ya no hace nada

                            } else {
                                $key = (int) substr($xaux, 2, 1);
                                $xseek = $xarray[$key]; // obtengo directamente el valor de la unidad (del uno al nueve)
                                $xsub = $this->subfijo($xaux);
                                $xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;
                            } // ENDIF (substr($xaux, 2, 1) < 1)
                            break;
                    } // END SWITCH
                } // END FOR
                $xi = $xi + 3;
            } // ENDDO

            if (substr(trim($xcadena), -5, 5) == "ILLON") // si la cadena obtenida termina en MILLON o BILLON, entonces le agrega al final la conjuncion DE
            {
                $xcadena .= " DE";
            }

            if (substr(trim($xcadena), -7, 7) == "ILLONES") // si la cadena obtenida en MILLONES o BILLONES, entoncea le agrega al final la conjuncion DE
            {
                $xcadena .= " DE";
            }

            // ----------- esta línea la puedes cambiar de acuerdo a tus necesidades o a tu país -------
            if (trim($xaux) != "") {
                switch ($xz) {
                    case 0:
                        if (trim(substr($XAUX, $xz * 6, 6)) == "1") {
                            $xcadena .= "UN BILLON ";
                        } else {
                            $xcadena .= " BILLONES ";
                        }

                        break;
                    case 1:
                        if (trim(substr($XAUX, $xz * 6, 6)) == "1") {
                            $xcadena .= "UN MILLON ";
                        } else {
                            $xcadena .= " MILLONES ";
                        }

                        break;
                    case 2:
                        if ($xcifra < 1) {
                            $xcadena = "CERO CON $xdecimales/100 SOLES";
                        }
                        if ($xcifra >= 1 && $xcifra < 2) {
                            $xcadena = "UN SOL CON $xdecimales/100 ";
                        }
                        if ($xcifra >= 2) {
                            $xcadena .= " CON $xdecimales/100 SOLES "; //
                        }
                        break;
                } // endswitch ($xz)
            } // ENDIF (trim($xaux) != "")
            // ------------------      en este caso, para PERÚ se usa esta leyenda     ----------------
            $xcadena = str_replace("VEINTI ", "VEINTI", $xcadena); // quito el espacio para el VEINTI, para que quede: VEINTICUATRO, VEINTIUN, VEINTIDOS, etc
            $xcadena = str_replace("  ", " ", $xcadena); // quito espacios dobles
            $xcadena = str_replace("UN UN", "UN", $xcadena); // quito la duplicidad
            $xcadena = str_replace("  ", " ", $xcadena); // quito espacios dobles
            $xcadena = str_replace("BILLON DE MILLONES", "BILLON DE", $xcadena); // corrigo la leyenda
            $xcadena = str_replace("BILLONES DE MILLONES", "BILLONES DE", $xcadena); // corrigo la leyenda
            $xcadena = str_replace("DE UN", "UN", $xcadena); // corrigo la leyenda
        } // ENDFOR ($xz)
        return trim($xcadena);
    }

    /*=============================================*/
    /*=============================================
    --- add new comprobante de venta
    =============================================*/
    public function mdlnewComprobanteVenta(
        $fecha_contable,
        $fecha_vencimiento,
        $nombre_cliente,
        $num_docu_identidad,
        $direccion,
        $doc_org_de_comp,
        $idBpm,
        $estado_envio,
        $estado_tributatio,
        $cajera,
        $tipo_operacion,
        $total_gravada,
        $total_exonerada,
        $total_inafecta,
        $igv,
        $total,
        $tipo_pago,
        $efectivo_recibido,
        $vuelto_entregado,
        $cod_transaccion,
        $tipo_comprobante
    ) {

        $query = Conexion::conectar()->query("INSERT INTO `facturacion_comprobante_cabecera` (
                    `id`,
                    `serie`,
                    `correlativo`,
                    `fecha_creacion`,
                    `fecha_contable`,
                    `fecha_vencimiento`,
                    `nombre_cliente`,
                    `num_docu_identidad`,
                    `direccion`,
                    `documento_origen_de_comprobante`,
                    `idBpm`,
                    `estado_envio`,
                    `estado_tributatio`,
                    `cajera`,
                    `tipo_operacion`,
                    `total_gravada`,
                    `total_exonerada`,
                    `total_inafecta`,
                    `igv`,
                    `total`,
                    `tipo_pago`,
                    `efectivo_recibido`,
                    `vuelto_entregado`,
                    `cod_transaccion`,
                    `cpe`,
                    `cdr`,
                    `data_send_json`,
                    `ruta_xml`)
                    VALUES (
                    NULL,
                    (SELECT serie FROM `facturacion_parametros` where tipo_comprobante='$tipo_comprobante' and activo='1'),
                    (SELECT correlativo+1 FROM `facturacion_parametros` where tipo_comprobante='$tipo_comprobante' and activo='1'),
                    CURRENT_TIMESTAMP,
                    '$fecha_contable',
                    '$fecha_vencimiento',
                    '$nombre_cliente',
                    '$num_docu_identidad',
                    '$direccion',
                    '$doc_org_de_comp',
                    '$idBpm',
                    '$estado_envio',
                    '$estado_tributatio',
                    '$cajera',
                    '$tipo_operacion',
                    '$total_gravada',
                    '$total_exonerada',
                    '$total_inafecta',
                    '$igv',
                    '$total',
                    '$tipo_pago',
                    '$efectivo_recibido',
                    '$vuelto_entregado',
                    '$cod_transaccion',
                    NULL,
                    NULL,
                    NULL,
                    NULL);");

        $stmtaaz = Conexion::conectar()->query("UPDATE `facturacion_parametros` SET correlativo=(correlativo+1) where tipo_comprobante='$tipo_comprobante' and activo='1'");




        $datrCabFac = $this->mdlMostrarItemParaFacturaBpm($idBpm);
        $datCBFT = json_decode($datrCabFac, true);

        $idporline = "#" . rtrim($idBpm) . "btngenerarcomprobante";
        $render_genera_pdf = "#" . rtrim($idBpm) . "render_genera_pdf";

        for ($i = 0; $i < count($datCBFT); $i++) {
            // $idPagos= $datBPMii[0]["idPagos"];
            $pk = $datCBFT[$i]["pk"];
            $pk_bpm = $datCBFT[$i]["pk_bpm"];
            $pk_dat_maestro_item = $datCBFT[$i]["pk_dat_maestro_item"];
            $barcode = strtoupper($datCBFT[$i]["barcode"]);
            $description = $datCBFT[$i]["description"];
            $pv_unidad = $datCBFT[$i]["pv_unidad"];
            $cantidad = $datCBFT[$i]["cantidad"];
            $sub_total = $datCBFT[$i]["sub_total"];

            //   echo "INSERT INTO `facturacion_comprobante_cuerpo` (`id`, `codigo`, `descripcion`, `cantidad`, `precio_venta_unitario`, `precio_tras_decuento`, `precio_venta_total`, `fecha_creacion`, `fk_comprobante_cabecera`,  `pk_lote`) VALUES (NULL, '$barcode', '$description', '$cantidad', '$pv_unidad', '0.00', '$sub_total', CURRENT_TIMESTAMP, (SELECT id FROM `facturacion_comprobante_cabecera` WHERE documento_origen_de_comprobante='$doc_org_de_comp' LIMIT 1 ),  '$pk');";
            //     exit();
            $query = Conexion::conectar()->query("INSERT INTO `facturacion_comprobante_cuerpo` (`id`, `codigo`, `descripcion`, `cantidad`, `precio_venta_unitario`, `precio_tras_decuento`, `precio_venta_total`, `fecha_creacion`, `fk_comprobante_cabecera`,  `pk_lote`) VALUES (NULL, '$barcode', '$description', '$cantidad', '$pv_unidad', '0.00', '$sub_total', CURRENT_TIMESTAMP, (SELECT id FROM `facturacion_comprobante_cabecera` WHERE documento_origen_de_comprobante='$doc_org_de_comp' LIMIT 1 ),  '$pk');");

            // Verificar si $barcode NO contiene la palabra "SERVICIO"
            if (stripos($barcode, "SERVICIO") === false) {
                //                     INSERT THE KARDEX todo
                $lotesCadena = $this->getLote($barcode, $cantidad);
                $this->insertar_salida_en_kardex($this->getCategoria($barcode), $barcode, $description, null, $cantidad, $this->getPrecioCompra($barcode, $cantidad), $pv_unidad, 'VENTA BPM', $pk_dat_maestro_item, 1, $lotesCadena, $doc_org_de_comp);
            }


        }

        $the_pk_cabecera_factura = Conexion::conectar()->query("SELECT id FROM `facturacion_comprobante_cabecera` WHERE documento_origen_de_comprobante='$doc_org_de_comp'");
        foreach ($the_pk_cabecera_factura as $rowiii) {
            $pk_cabecera_factura = $rowiii["id"];
        }

        $boton_pdf_renditado = '<a onclick="pinta_filas(' . $idBpm . ')" title="Comprobante de venta" class="viewspinerloading" href="controladores/pdf.controlador.php?id=' . $pk_cabecera_factura . '&deque=pdf_comprobante" target="_blank" style="height: 100px;background: #25c83a;color: white;padding: 2px 6px">C&nbsp;V</a>&nbsp;&nbsp;<span style="display:none">SBLTD</span>';

        echo "<script>
                            $('#bola_fact_bpm2').removeClass('bolaAmarilla');
                            $('#bola_fact_bpm2').addClass('bolaBlanca');
                            $('#bola_fact_bpm3').removeClass('bolaBlanca');
                            $('#bola_fact_bpm3').addClass('bolaVerde');
                            $('#idRegistrarComprobante').addClass('d-none');
                            $('#opGravada,#opExonerada,#selectMetodoPago,#inputDocuIdentidad,#idfDireccion,#idfNombreCliente,#selectTipoComprobante').prop('disabled', true);
                            $('" . $idporline . "').addClass('d-none');
                            $('" . $render_genera_pdf . "').html('" . $boton_pdf_renditado . "');
                         </script>";
    }

    /*=============================================
    --- NEW NOTA DE CREDITO CABECERA ---
    =============================================*/
    public function mdlnewCabNotaCredito(
        $serie,
        $fecha_contable,
        $nombre_cliente,
        $num_docu_identidad,
        $direccion,
        $documento_origen_de_comprobante,
        $idComprobanteVenta,
        $estado_envio,
        $estado_tributatio,
        $cajera,
        $tipo_operacion,
        $total_gravada,
        $total_exonerada,
        $total_inafecta,
        $igv,
        $total,
        $tipo_comprobante_modifica,
        $nro_documento_modifica,
        $cod_tipo_motivo,
        $descripcion_motivo,
        $comentario
    ) {

        $query = Conexion::conectar()->query("INSERT INTO `facturacion_nc_comprobante_cabecera` (
                    `id`,
                    `cod_tipo_documento`,
                    `serie`,
                    `correlativo`,
                    `fecha_creacion`,
                    `fecha_contable`,
                    `nombre_cliente`,
                    `num_docu_identidad`,
                    `direccion`,
                    `documento_origen_de_comprobante`,
                    `idComprobanteVenta`,
                    `estado_envio`,
                    `estado_tributatio`,
                    `cajera`,
                    `tipo_operacion`,
                    `total_gravadas`,
                    `total_exoneradas`,
                    `total_inafecta`,
                    `total_igv`,
                    `total`,
                    `tipo_comprobante_modifica`,
                    `nro_documento_modifica`,
                    `cod_tipo_motivo`,
                    `descripcion_motivo`,
                    `comentario`,
                    `cpe`,
                    `cdr`,
                    `data_send_json`,
                    `ruta_xml`,
                    `respuesta_sunat`,
                    `respuesta_sunat__json`)
                    VALUES (
                    NULL,
                    '07',
                    '$serie',
                    (SELECT correlativo+1 FROM `facturacion_parametros` where tipo_comprobante='07' and activo='1' AND serie='$serie'),
                    CURRENT_TIMESTAMP,
                    '$fecha_contable',
                    '$nombre_cliente',
                    '$num_docu_identidad',
                    '$direccion',
                    '$documento_origen_de_comprobante',
                    '$idComprobanteVenta',
                    '$estado_envio',
                    '$estado_tributatio',
                    '$cajera',
                    '$tipo_operacion',
                    '$total_gravada',
                    '$total_exonerada',
                    '$total_inafecta',
                    '$igv',
                    '$total',
                    '$tipo_comprobante_modifica',
                    '$nro_documento_modifica',
                    '$cod_tipo_motivo',
                    '$descripcion_motivo',
                    '$comentario',
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL);");

        $stmtaa = Conexion::conectar()->query("UPDATE  `facturacion_comprobante_cabecera` SET estado_tributatio='Anulada NC',idBpm=NULL,documento_origen_de_comprobante='' WHERE id='$idComprobanteVenta'");

        $stmtbb = Conexion::conectar()->query("UPDATE facturacion_parametros SET correlativo=(correlativo+1) where tipo_comprobante='07' and activo='1' AND serie='$serie'");
    }
    // NOTE: AÑADIR FUNCION PARA EXTRAER QUE TIPO DE COMPROBANTE ES (SI ES PROVENIENTE DE BPM O DE VENTA DIRECTA)

    public function mdlnewBodyNotaCredito($codigo, $descripcion, $cantidad, $precio_venta_unitario, $precio_tras_decuento, $precio_venta_total, $fk_comprobante_cabecera, $pk_lote)
    {
        $query = Conexion::conectar()->query("INSERT INTO `facturacion_nc_comprobante_cuerpo` (
                        `id`,
                        `codigo`,
                        `descripcion`,
                        `cantidad`,
                        `precio_venta_unitario`,
                        `precio_tras_decuento`,
                        `precio_venta_total`,
                        `fecha_creacion`,
                        `fk_comprobante_cabecera`,
                        `pk_lote`) VALUES (
                        NULL,
                        '$codigo',
                        '$descripcion',
                        '$cantidad',
                        '$precio_venta_unitario',
                        '$precio_tras_decuento',
                        '$precio_venta_total',
                        CURRENT_TIMESTAMP,
                        '$fk_comprobante_cabecera',
                        '$pk_lote');");

        $cadena_de_texto = strtoupper($codigo);
        $cadena_buscada = strtoupper('MOALI');
        $posicion_coincidencia = strpos($cadena_de_texto, $cadena_buscada);

        //se puede hacer la comparacion con 'false' o 'true' y los comparadores '===' o '!=='
        if ($posicion_coincidencia === false) {
            $nel = 0;
        } else {
            Conexion::conectar()->query("UPDATE `productos` SET `stock` = `stock`+$cantidad   where  RTRIM(LTRIM(`codigo`)) = RTRIM(LTRIM('$codigo'))");
        }
    }
    /*=============================================
    --- NEW NOTA DE CREDITO CUERPO ---
    =============================================*/
    public function viewNotaEletronica($pk_comprobante_venta)
    {
        $stmt = Conexion::conectar()->query("SELECT a.*,b.id as 'id_body_nc',b.* FROM `facturacion_nc_comprobante_cabecera` as a
                                                            INNER JOIN facturacion_nc_comprobante_cuerpo as b ON a.idComprobanteVenta=b.fk_comprobante_cabecera WHERE a.idComprobanteVenta='$pk_comprobante_venta'");

        $listPags["items"] = array();
        foreach ($stmt as $row) {
            $retorn = array(
                "id" => $row["id"],
                "cod_tipo_documento" => $row["cod_tipo_documento"],
                "serie" => $row["serie"],
                "correlativo" => $row["correlativo"],
                "fecha_creacion" => $row["fecha_creacion"],
                "fecha_contable" => $row["fecha_contable"],
                "nombre_cliente" => $row["nombre_cliente"],
                "num_docu_identidad" => $row["num_docu_identidad"],
                "direccion" => $row["direccion"],
                "documento_origen_de_comprobante" => $row["documento_origen_de_comprobante"],
                "idComprobanteVenta" => $row["idComprobanteVenta"],
                "estado_envio" => $row["estado_envio"],
                "estado_tributatio" => $row["estado_tributatio"],
                "cajera" => $row["cajera"],
                "tipo_operacion" => $row["tipo_operacion"],
                "total_gravadas" => $row["total_gravadas"],
                "total_exoneradas" => $row["total_exoneradas"],
                "total_inafecta" => $row["total_inafecta"],
                "total_igv" => $row["total_igv"],
                "total" => $row["total"],
                "tipo_comprobante_modifica" => $row["tipo_comprobante_modifica"],
                "nro_documento_modifica" => $row["nro_documento_modifica"],
                "cod_tipo_motivo" => $row["cod_tipo_motivo"],
                "descripcion_motivo" => $row["descripcion_motivo"],
                "comentario" => $row["comentario"],
                "cpe" => $row["cpe"],
                "cdr" => $row["cdr"],
                "data_send_json" => $row["data_send_json"],
                "ruta_xml" => $row["ruta_xml"],
                "respuesta_sunat" => $row["respuesta_sunat"],
                "respuesta_sunat__json" => $row["respuesta_sunat__json"],
                "id_body_nc" => $row["id_body_nc"],
                "codigo" => $row["codigo"],
                "descripcion" => $row["descripcion"],
                "cantidad" => $row["cantidad"],
                "precio_venta_unitario" => $row["precio_venta_unitario"],
                "precio_tras_decuento" => $row["precio_tras_decuento"],
                "precio_venta_total" => $row["precio_venta_total"],
                "fecha_creacion" => $row["fecha_creacion"],
                "fk_comprobante_cabecera" => $row["fk_comprobante_cabecera"],
                "pk_lote" => $row["pk_lote"],
            );
            array_push($listPags["items"], $retorn);
        }

        return json_encode($listPags["items"]);
    }
    /*=============================================
    --- RENDER COMPROBANTE PDF
    =============================================*/
    public function viewBoletaEletronica($pk_comprobante_venta)
    {
        //         $stmt = Conexion::conectar()->query("SELECT *,CASE
        //     WHEN SUBSTRING(documento_origen_de_comprobante , 1,2)='MP' THEN

        //     (SELECT TOP 1 CONCAT('<br>(',z.bpm_tipo_molido_pab,')') FROM productos_anexos__bpm as z  WHERE CONCAT(z.nombre_producto,' ',z.capacidad_producto)=B.descripcion AND z.codBpm=A.idBpm AND z.cantidad_producto=B.cantidad)
        //     WHEN SUBSTRING(documento_origen_de_comprobante , 1,2)='vd' THEN ''
        //     ELSE ''
        // END as 'tipo_molido'
        //  FROM `facturacion_comprobante_cabecera` AS A INNER JOIN facturacion_comprobante_cuerpo as B ON A.id=B.fk_comprobante_cabecera WHERE A.id='$pk_comprobante_venta'");

        $stmt = Conexion::conectar()->query("SELECT * FROM `facturacion_comprobante_cabecera` AS A INNER JOIN facturacion_comprobante_cuerpo as B ON A.id=B.fk_comprobante_cabecera LEFT JOIN facturas as Z ON Z.id_cabecera=A.id
 WHERE A.id='$pk_comprobante_venta'");

        $listPags["items"] = array();
        foreach ($stmt as $row) {
            $retorn = array(
                "id" => $row["id"],
                "serie" => $row["serie"],
                "correlativo" => $row["correlativo"],
                "fecha_creacion" => $row["fecha_creacion"],
                "fecha_contable" => $row["fecha_contable"],
                "fecha_vencimiento" => $row["fecha_vencimiento"],
                "nombre_cliente" => $row["nombre_cliente"],
                "num_docu_identidad" => $row["num_docu_identidad"],
                "direccion" => $row["direccion"],
                "documento_origen_de_comprobante" => $row["documento_origen_de_comprobante"],
                "idBpm" => $row["idBpm"],
                "estado_envio" => $row["estado_envio"],
                "estado_tributatio" => $row["estado_tributatio"],
                "cajera" => $row["cajera"],
                "tipo_operacion" => $row["tipo_operacion"],
                "total_gravada" => $row["total_gravada"],
                "total_exonerada" => $row["total_exonerada"],
                "total_inafecta" => $row["total_inafecta"],
                "igv" => $row["igv"],
                "total" => $row["total"],
                "tipo_pago" => $row["tipo_pago"],
                "efectivo_recibido" => $row["efectivo_recibido"],
                "vuelto_entregado" => $row["vuelto_entregado"],
                "cod_transaccion" => $row["cod_transaccion"],
                "cpe" => $row["cpe"],
                "cdr" => $row["cdr"],
                "data_send_json" => $row["data_send_json"],
                "ruta_xml" => $row["ruta_xml"],
                "id" => $row["id"],
                "codigo" => $row["codigo"],
                "descripcion" => $row["descripcion"],
                "cantidad" => $row["cantidad"],
                "precio_venta_unitario" => $row["precio_venta_unitario"],
                "precio_tras_decuento" => $row["precio_tras_decuento"],
                "precio_venta_total" => $row["precio_venta_total"],
                "fecha_creacion" => $row["fecha_creacion"],
                "fk_comprobante_cabecera" => $row["fk_comprobante_cabecera"],
                "pk_lote" => $row["pk_lote"],
                "total_letrado" => $this->numeroAletrasDinero($row["total"]),
                "tipo_molido" => $row["tipo_molido"],
                "id_factura Primary" => $row["id_factura Primary"],
"forma_pago" => $row["forma_pago"],
"row_g_1" => $row["row_g_1"],
"row_s_1" => $row["row_s_1"],
"row_c_1" => $row["row_c_1"],
"row_g_2" => $row["row_g_2"],
"row_s_2" => $row["row_s_2"],
"row_c_2" => $row["row_c_2"],
"row_g_3" => $row["row_g_3"],
"row_s_3" => $row["row_s_3"],
"row_c_3" => $row["row_c_3"],
"row_g_4" => $row["row_g_4"],
"row_s_4" => $row["row_s_4"],
"row_c_4" => $row["row_c_4"],
"row_g_5" => $row["row_g_5"],
"row_s_5" => $row["row_s_5"],
"row_c_5" => $row["row_c_5"],
"row_g_6" => $row["row_g_6"],
"row_s_6" => $row["row_s_6"],
"row_c_6" => $row["row_c_6"],
"row_g_7" => $row["row_g_7"],
"row_s_7" => $row["row_s_7"],
"row_c_7" => $row["row_c_7"],
"row_g_8" => $row["row_g_8"],
"row_s_8" => $row["row_s_8"],
"row_c_8" => $row["row_c_8"],
"row_g_9" => $row["row_g_9"],
"row_s_9" => $row["row_s_9"],
"row_c_9" => $row["row_c_9"],
"row_g_10" => $row["row_g_10"],
"row_s_10" => $row["row_s_10"],
"row_c_10" => $row["row_c_10"],
"row_g_11" => $row["row_g_11"],
"row_s_11" => $row["row_s_11"],
"row_c_11" => $row["row_c_11"],
"row_g_12" => $row["row_g_12"],
"row_s_12" => $row["row_s_12"],
"row_c_12" => $row["row_c_12"],
"receptor" => $row["receptor"],
"cliente" => $row["cliente"],
"moneda" => $row["moneda"],
"observacion" => $row["observacion"],
"orden_compra" => $row["orden_compra"],
"leyenda" => $row["leyenda"],
"bien_servicio" => $row["bien_servicio"],
"medio_pago" => $row["medio_pago"],
"total_cuotas" => $row["total_cuotas"],
"cuotas_1" => $row["cuotas_1"],
"fecha_1" => $row["fecha_1"],
"cuotas_2" => $row["cuotas_2"],
"fecha_2" => $row["fecha_2"],
"cuotas_3" => $row["cuotas_3"],
"fecha_3" => $row["fecha_3"],
"cuotas_4" => $row["cuotas_4"],
"fecha_4" => $row["fecha_4"],
"cuotas_5" => $row["cuotas_5"],
"fecha_5" => $row["fecha_5"],
"cuotas_6" => $row["cuotas_6"],
"fecha_6" => $row["fecha_6"],
"cuotas_7" => $row["cuotas_7"],
"fecha_7" => $row["fecha_7"],
"cuotas_8" => $row["cuotas_8"],
"fecha_8" => $row["fecha_8"],
"cuotas_9" => $row["cuotas_9"],
"fecha_9" => $row["fecha_9"],
"cuotas_10" => $row["cuotas_10"],
"fecha_10" => $row["fecha_10"],
"created_at" => $row["created_at"],
"id_cabecera" => $row["id_cabecera"],

            );
            array_push($listPags["items"], $retorn);
        }

        return json_encode($listPags["items"]);
    }
    public function crearVenta($tabla, $datos)
    {
        $pdo = Conexion::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("
            INSERT INTO facturas (
                forma_pago, receptor, cliente, moneda, observacion, orden_compra, leyenda, 
                bien_servicio, medio_pago, total_cuotas, created_at, id_cabecera,
                row_g_1, row_s_1, row_c_1,
                row_g_2, row_s_2, row_c_2,
                row_g_3, row_s_3, row_c_3,
                row_g_4, row_s_4, row_c_4,
                row_g_5, row_s_5, row_c_5,
                row_g_6, row_s_6, row_c_6,
                row_g_7, row_s_7, row_c_7,
                row_g_8, row_s_8, row_c_8,
                row_g_9, row_s_9, row_c_9,
                row_g_10, row_s_10, row_c_10,
                row_g_11, row_s_11, row_c_11,
                row_g_12, row_s_12, row_c_12,
                cuotas_1, fecha_1, cuotas_2, fecha_2,
                cuotas_3, fecha_3, cuotas_4, fecha_4,
                cuotas_5, fecha_5, cuotas_6, fecha_6,
                cuotas_7, fecha_7, cuotas_8, fecha_8,
                cuotas_9, fecha_9, cuotas_10, fecha_10
            ) 
            VALUES (
                :forma_pago, :receptor, :cliente, :moneda, :observacion, :orden_compra, :leyenda, 
                :bien_servicio, :medio_pago, :total_cuotas, NOW(), :id_cabecera,
                :row_g_1, :row_s_1, :row_c_1,
                :row_g_2, :row_s_2, :row_c_2,
                :row_g_3, :row_s_3, :row_c_3,
                :row_g_4, :row_s_4, :row_c_4,
                :row_g_5, :row_s_5, :row_c_5,
                :row_g_6, :row_s_6, :row_c_6,
                :row_g_7, :row_s_7, :row_c_7,
                :row_g_8, :row_s_8, :row_c_8,
                :row_g_9, :row_s_9, :row_c_9,
                :row_g_10, :row_s_10, :row_c_10,
                :row_g_11, :row_s_11, :row_c_11,
                :row_g_12, :row_s_12, :row_c_12,
                :cuotas_1, :fecha_1, :cuotas_2, :fecha_2,
                :cuotas_3, :fecha_3, :cuotas_4, :fecha_4,
                :cuotas_5, :fecha_5, :cuotas_6, :fecha_6,
                :cuotas_7, :fecha_7, :cuotas_8, :fecha_8,
                :cuotas_9, :fecha_9, :cuotas_10, :fecha_10
            )
        ");
        $stmt->bindParam(":forma_pago", $datos["forma_pago"], PDO::PARAM_STR);
        $stmt->bindParam(":receptor", $datos["receptor"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente", $datos["cliente"], PDO::PARAM_STR);
        $stmt->bindParam(":moneda", $datos["moneda"], PDO::PARAM_STR);
        $stmt->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);
        $stmt->bindParam(":orden_compra", $datos["orden_compra"], PDO::PARAM_STR);
        $stmt->bindParam(":leyenda", $datos["leyenda"], PDO::PARAM_STR);
        $stmt->bindParam(":bien_servicio", $datos["bien_servicio"], PDO::PARAM_STR);
        $stmt->bindParam(":medio_pago", $datos["medio_pago"], PDO::PARAM_STR);
        $stmt->bindParam(":total_cuotas", $datos["total_cuotas"], PDO::PARAM_INT);
        $stmt->bindParam(":id_cabecera", $datos["id_cabecera"], PDO::PARAM_INT);
        $stmt->bindParam(":row_g_1", $datos["row_g_1"], PDO::PARAM_STR);
        $stmt->bindParam(":row_s_1", $datos["row_s_1"], PDO::PARAM_STR);
        $stmt->bindParam(":row_c_1", $datos["row_c_1"], PDO::PARAM_STR);
        $stmt->bindParam(":row_g_2", $datos["row_g_2"], PDO::PARAM_STR);
        $stmt->bindParam(":row_s_2", $datos["row_s_2"], PDO::PARAM_STR);
        $stmt->bindParam(":row_c_2", $datos["row_c_2"], PDO::PARAM_STR);
        $stmt->bindParam(":row_g_3", $datos["row_g_3"], PDO::PARAM_STR);
        $stmt->bindParam(":row_s_3", $datos["row_s_3"], PDO::PARAM_STR);
        $stmt->bindParam(":row_c_3", $datos["row_c_3"], PDO::PARAM_STR);
        $stmt->bindParam(":row_g_4", $datos["row_g_4"], PDO::PARAM_STR);
        $stmt->bindParam(":row_s_4", $datos["row_s_4"], PDO::PARAM_STR);
        $stmt->bindParam(":row_c_4", $datos["row_c_4"], PDO::PARAM_STR);
        $stmt->bindParam(":row_g_5", $datos["row_g_5"], PDO::PARAM_STR);
        $stmt->bindParam(":row_s_5", $datos["row_s_5"], PDO::PARAM_STR);
        $stmt->bindParam(":row_c_5", $datos["row_c_5"], PDO::PARAM_STR);
        $stmt->bindParam(":row_g_6", $datos["row_g_6"], PDO::PARAM_STR);
        $stmt->bindParam(":row_s_6", $datos["row_s_6"], PDO::PARAM_STR);
        $stmt->bindParam(":row_c_6", $datos["row_c_6"], PDO::PARAM_STR);
        $stmt->bindParam(":row_g_7", $datos["row_g_7"], PDO::PARAM_STR);
        $stmt->bindParam(":row_s_7", $datos["row_s_7"], PDO::PARAM_STR);
        $stmt->bindParam(":row_c_7", $datos["row_c_7"], PDO::PARAM_STR);
        $stmt->bindParam(":row_g_8", $datos["row_g_8"], PDO::PARAM_STR);
        $stmt->bindParam(":row_s_8", $datos["row_s_8"], PDO::PARAM_STR);
        $stmt->bindParam(":row_c_8", $datos["row_c_8"], PDO::PARAM_STR);
        $stmt->bindParam(":row_g_9", $datos["row_g_9"], PDO::PARAM_STR);
        $stmt->bindParam(":row_s_9", $datos["row_s_9"], PDO::PARAM_STR);
        $stmt->bindParam(":row_c_9", $datos["row_c_9"], PDO::PARAM_STR);
        $stmt->bindParam(":row_g_10", $datos["row_g_10"], PDO::PARAM_STR);
        $stmt->bindParam(":row_s_10", $datos["row_s_10"], PDO::PARAM_STR);
        $stmt->bindParam(":row_c_10", $datos["row_c_10"], PDO::PARAM_STR);
        $stmt->bindParam(":row_g_11", $datos["row_g_11"], PDO::PARAM_STR);
        $stmt->bindParam(":row_s_11", $datos["row_s_11"], PDO::PARAM_STR);
        $stmt->bindParam(":row_c_11", $datos["row_c_11"], PDO::PARAM_STR);
        $stmt->bindParam(":row_g_12", $datos["row_g_12"], PDO::PARAM_STR);
        $stmt->bindParam(":row_s_12", $datos["row_s_12"], PDO::PARAM_STR);
        $stmt->bindParam(":row_c_12", $datos["row_c_12"], PDO::PARAM_STR);
        $stmt->bindParam(":cuotas_1", $datos["cuotas_1"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_1", $datos["fecha_1"], PDO::PARAM_STR);
        $stmt->bindParam(":cuotas_2", $datos["cuotas_2"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_2", $datos["fecha_2"], PDO::PARAM_STR);
        $stmt->bindParam(":cuotas_3", $datos["cuotas_3"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_3", $datos["fecha_3"], PDO::PARAM_STR);
        $stmt->bindParam(":cuotas_4", $datos["cuotas_4"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_4", $datos["fecha_4"], PDO::PARAM_STR);
        $stmt->bindParam(":cuotas_5", $datos["cuotas_5"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_5", $datos["fecha_5"], PDO::PARAM_STR);
        $stmt->bindParam(":cuotas_6", $datos["cuotas_6"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_6", $datos["fecha_6"], PDO::PARAM_STR);
        $stmt->bindParam(":cuotas_7", $datos["cuotas_7"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_7", $datos["fecha_7"], PDO::PARAM_STR);
        $stmt->bindParam(":cuotas_8", $datos["cuotas_8"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_8", $datos["fecha_8"], PDO::PARAM_STR);
        $stmt->bindParam(":cuotas_9", $datos["cuotas_9"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_9", $datos["fecha_9"], PDO::PARAM_STR);
        $stmt->bindParam(":cuotas_10", $datos["cuotas_10"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_10", $datos["fecha_10"], PDO::PARAM_STR);

        try {
            if ($stmt->execute()) {
                return ['status' => 'ok', 'message' => 'dato registrado con exito'];
            } else {
                return ['status' => 'error', 'message' => 'Error al insertar en la base de datos'];
            }
        } catch (PDOException $e) {
            return "Syntax Error: " . $e->getMessage();
        }

        $stmt->closeCursor();
        $stmt = null;
    }
    public function updateVenta($tabla, $datos)
    {
        $pdo = Conexion::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare("UPDATE facturas SET
        forma_pago = :forma_pago, receptor = :receptor, cliente = :cliente, moneda = :moneda, observacion = :observacion, 
        orden_compra = :orden_compra, leyenda = :leyenda, bien_servicio = :bien_servicio, 
        medio_pago = :medio_pago, total_cuotas = :total_cuotas, 
        row_g_1 = :row_g_1, row_s_1 = :row_s_1, row_c_1 = :row_c_1, row_g_2 = :row_g_2, 
        row_s_2 = :row_s_2, row_c_2 = :row_c_2, row_g_3 = :row_g_3, row_s_3 = :row_s_3, 
        row_c_3 = :row_c_3, row_g_4 = :row_g_4, row_s_4 = :row_s_4, row_c_4 = :row_c_4,
        row_g_5 = :row_g_5, row_s_5 = :row_s_5, row_c_5 = :row_c_5, row_g_6 = :row_g_6, 
        row_s_6 = :row_s_6, row_c_6 = :row_c_6, row_g_7 = :row_g_7, row_s_7 = :row_s_7, 
        row_c_7 = :row_c_7, row_g_8 = :row_g_8, row_s_8 = :row_s_8, row_c_8 = :row_c_8,
        row_g_9 = :row_g_9, row_s_9 = :row_s_9, row_c_9 = :row_c_9, row_g_10 = :row_g_10, 
        row_s_10 = :row_s_10, row_c_10 = :row_c_10, row_g_11 = :row_g_11, row_s_11 = :row_s_11, 
        row_c_11 = :row_c_11, row_g_12 = :row_g_12, row_s_12 = :row_s_12, row_c_12 = :row_c_12,
        cuotas_1 = :cuotas_1, fecha_1 = :fecha_1, cuotas_2 = :cuotas_2, fecha_2 = :fecha_2,
        cuotas_3 = :cuotas_3, fecha_3 = :fecha_3, cuotas_4 = :cuotas_4, fecha_4 = :fecha_4,
        cuotas_5 = :cuotas_5, fecha_5 = :fecha_5, cuotas_6 = :cuotas_6, fecha_6 = :fecha_6,
        cuotas_7 = :cuotas_7, fecha_7 = :fecha_7, cuotas_8 = :cuotas_8, fecha_8 = :fecha_8,
        cuotas_9 = :cuotas_9, fecha_9 = :fecha_9, cuotas_10 = :cuotas_10, fecha_10 = :fecha_10
        WHERE id_cabecera = :id_cabecera");

        $stmt->bindParam(":forma_pago", $datos["forma_pago"], PDO::PARAM_STR);
        $stmt->bindParam(":receptor", $datos["receptor"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente", $datos["cliente"], PDO::PARAM_STR);
        $stmt->bindParam(":moneda", $datos["moneda"], PDO::PARAM_STR);
        $stmt->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);
        $stmt->bindParam(":orden_compra", $datos["orden_compra"], PDO::PARAM_STR);
        $stmt->bindParam(":leyenda", $datos["leyenda"], PDO::PARAM_STR);
        $stmt->bindParam(":bien_servicio", $datos["bien_servicio"], PDO::PARAM_STR);
        $stmt->bindParam(":medio_pago", $datos["medio_pago"], PDO::PARAM_STR);
        $stmt->bindParam(":total_cuotas", $datos["total_cuotas"], PDO::PARAM_INT);

        for ($i = 1; $i <= 12; $i++) {
            $stmt->bindParam(":row_g_" . $i, $datos["row_g_" . $i], PDO::PARAM_STR);
            $stmt->bindParam(":row_s_" . $i, $datos["row_s_" . $i], PDO::PARAM_STR);
            $stmt->bindParam(":row_c_" . $i, $datos["row_c_" . $i], PDO::PARAM_STR);
        }

        for ($i = 1; $i <= 10; $i++) {
            $stmt->bindParam(":cuotas_" . $i, $datos["cuotas_" . $i], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_" . $i, $datos["fecha_" . $i], PDO::PARAM_STR);
        }

        $stmt->bindParam(":id_cabecera", $datos["id_cabecera"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return ['status' => 'ok', 'message' => 'dato editados con exito'];
        } else {
            $errorInfo = $stmt->errorInfo();
            return "Error al ejecutar la consulta: " . $errorInfo[2];
        }

        $stmt->close();
        $stmt = null;

    }
}
