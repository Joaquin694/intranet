<?php
require_once "conexion.php";
class ModeloPanelFacturaBpm
{

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
    public function insertar_salida_en_kardex($newCategoria, $bar_code, $descripcion, $viw_img, $Stock, $PrecioCompra, $PrecioVenta, $motivosalida, $fk_dm_productos, $almacenes, $Lote, $id_CD)
    {

        // $sessionidusuario=USERLOGEADO;
        $sessionidusuario = $_SESSION["nombre"] . ' (' . $_SESSION["usuario"] . ')';

        $the_pk_cabecera_factura = Conexion::conectar()->query("SELECT * FROM `facturacion_comprobante_cabecera` WHERE id='$id_CD'");
        foreach ($the_pk_cabecera_factura as $rowiiii) {
            $serieComprobante         = $rowiiii["serie"];
            $correlativoComprobante   = $rowiiii["correlativo"];
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



    /*=======================================================================================
    CONVERTIR MONTO TOTAL A PAGAR DE NUMERO A TEXTO
    =========================================================================================*/
    // END FUNCTION

    public function subfijo($xx)
    {
        // esta función regresa un subfijo para la cifra
        $xx      = trim($xx);
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
            1                 => "UN",
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
            30                       => "TREINTA",
            40     => "CUARENTA",
            50     => "CINCUENTA",
            60      => "SESENTA",
            70     => "SETENTA",
            80      => "OCHENTA",
            90      => "NOVENTA",
            100               => "CIENTO",
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
        $xcifra     = trim($xcifra);
        $xlength    = strlen($xcifra);
        $xpos_punto = strpos($xcifra, ".");
        $xaux_int   = $xcifra;
        $xdecimales = "00";
        if (!($xpos_punto === false)) {
            if ($xpos_punto == 0) {
                $xcifra     = "0" . $xcifra;
                $xpos_punto = strpos($xcifra, ".");
            }
            $xaux_int   = substr($xcifra, 0, $xpos_punto); // obtengo el entero de la cifra a covertir
            $xdecimales = substr($xcifra . "00", $xpos_punto + 1, 2); // obtengo los valores decimales
        }

        $XAUX    = str_pad($xaux_int, 18, " ", STR_PAD_LEFT); // ajusto la longitud de la cifra, para que sea divisible por centenas de miles (grupos de 6)
        $xcadena = "";
        for ($xz = 0; $xz < 3; $xz++) {
            $xaux    = substr($XAUX, $xz * 6, 6);
            $xi      = 0;
            $xlimite = 6; // inicializo el contador de centenas xi y establezco el límite a 6 dígitos en la parte entera
            $xexit   = true; // bandera para controlar el ciclo del While
            while ($xexit) {
                if ($xi == $xlimite) { // si ya llegó al límite máximo de enteros
                    break; // termina el ciclo
                }

                $x3digitos = ($xlimite - $xi) * -1; // comienzo con los tres primeros digitos de la cifra, comenzando por la izquierda
                $xaux      = substr($xaux, $x3digitos, abs($x3digitos)); // obtengo la centena (los tres dígitos)
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
                                    $xsub  = $this->subfijo($xaux); // devuelve el subfijo correspondiente (Millón, Millones, Mil o nada)
                                    if (substr($xaux, 0, 3) == 100) {
                                        $xcadena = " " . $xcadena . " CIEN " . $xsub;
                                    } else {
                                        $xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;
                                    }

                                    $xy = 3; // la centena fue redonda, entonces termino el ciclo del for y ya no reviso decenas ni unidades
                                } else {
                                    // entra aquí si la centena no fue numero redondo (101, 253, 120, 980, etc.)
                                    $key     = (int) substr($xaux, 0, 1) * 100;
                                    $xseek   = $xarray[$key]; // toma el primer caracter de la centena y lo multiplica por cien y lo busca en el arreglo (para que busque 100,200,300, etc)
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
                                    $xsub  = $this->subfijo($xaux);
                                    if (substr($xaux, 1, 2) == 20) {
                                        $xcadena = " " . $xcadena . " VEINTE " . $xsub;
                                    } else {
                                        $xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;
                                    }

                                    $xy = 3;
                                } else {
                                    $key   = (int) substr($xaux, 1, 1) * 10;
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
                                $key     = (int) substr($xaux, 2, 1);
                                $xseek   = $xarray[$key]; // obtengo directamente el valor de la unidad (del uno al nueve)
                                $xsub    = $this->subfijo($xaux);
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

    /*=============================================
    --- RENDER PRODUCTOS
    =============================================*/
    public function view___datos_maestros($indicador_de_tabla)
    {
        // echo "SELECT a.id as 'id_item', CONCAT('P',a.id) codigo_x_tipo_item, a.imagen,b.bar_code codigo,CONCAT(b.nombre_producto,'  ',descripccion) nombre_producto,a.precio_venta,a.stock FROM `productos` as a INNER JOIN `datos_maestros_productos` as b ON a.fk_dm_productos=b.id WHERE a.stock>'0' UNION SELECT idService id_item,CONCAT('S',idService) codigo_x_tipo_item,'vistas/img/productos/default/anonymous.png' imagen,CONCAT('SERVICIO ',idService) codigo,nameService nombre_producto,precio precio_venta,'DesService' stock FROM `service` as a WHERE activador='Activo'";

        $stmt  = Conexion::conectar()->query("SELECT a.id as 'id_item', CONCAT('P',a.id) codigo_x_tipo_item, a.imagen,b.bar_code codigo,CONCAT(b.nombre_producto,'  ',descripccion) nombre_producto,a.precio_venta,a.stock FROM `productos` as a INNER JOIN `datos_maestros_productos` as b ON a.fk_dm_productos=b.id WHERE a.stock>'0' UNION SELECT idService id_item,CONCAT('S',idService) codigo_x_tipo_item,'vistas/img/productos/default/anonymous.png' imagen,CONCAT('SERVICIO ',idService) codigo,nameService nombre_producto,precio precio_venta,'DesService' stock FROM `service` as a WHERE activador='Activo'");
        $listPags["items"] = array();

        foreach ($stmt as $row) {
            $retorn = array(
                "id_item"            => $row["id_item"],
                "codigo_x_tipo_item" => $row["codigo_x_tipo_item"],
                "imagen"             => $row["imagen"],
                "codigo"             => $row["codigo"],
                "nombre_producto"    => $row["nombre_producto"],
                "precio_venta"       => $row["precio_venta"],
                "stock"              => $row["stock"],
            );
            array_push($listPags["items"], $retorn);
        }

        return json_encode($listPags["items"]);
    }







    /*=============================================
    --- BAINER COTIZACIONES
    =============================================*/

    public function search_products_cotizacion($term)
    {

        $stmt  = Conexion::conectar()->prepare("SELECT a.id as 'id_item', CONCAT('P',a.id) codigo_x_tipo_item, a.imagen,b.bar_code codigo,CONCAT(b.nombre_producto,'  ',descripccion) nombre_producto,a.precio_venta,a.stock FROM `productos` as a INNER JOIN `datos_maestros_productos` as b ON a.fk_dm_productos=b.id WHERE a.stock>'0' AND (codigo='$term' OR descripcion LIKE '%$term%') UNION SELECT idService id_item,CONCAT('S',idService) codigo_x_tipo_item,'vistas/img/productos/default/anonymous.png' imagen,CONCAT('SERVICIO ',idService) codigo,nameService nombre_producto,precio precio_venta,'DesService' stock FROM `service` as a WHERE activador='Activo' AND nameService LIKE '%$term%' LIMIT 20");
        if ($stmt->execute()) {
            $trsps['success'] = true;
            $trsps['data'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $trsps['success'] = false;
            $trsps['msg'] = $stmt->errorInfo();
        }
        return $trsps;
    }



    public function registro_cotizacion($data)
    {
        $rt = [];
        if (isset($data['item'])) {

            $tins[':id_cliente'] = !empty($data['id_cliente']) ? $data['id_cliente'] : null;
            $tins[':nombre_cliente'] = !empty($data['nombre_cliente_op']) ? $data['nombre_cliente_op'] : $data['nombre_cliente'];
            $tins[':numero_documento'] = !empty($data['documento']) ? $data['documento'] : $data['numero_documento'];
            $tins[':email'] = !empty($data['email']) ? $data['email'] : "";
            $tins[':tipo_documento'] = $data['tipo_doc_cliente'];
            $tins[':direccion'] = $data['direccion_cliente'];
            $tins[':nombre_contacto'] = $data['nombre_contacto_cliente'];
            $tins[':documento_contacto'] = $data['documento_contacto_cliente'];
            $tins[':telefono_contacto'] = $data['telefono_cliente'];
            $tins[':fecha_emision_cotizacion'] = $data['fecha_emision'];
            $tins[':fecha_vencimiento_cotizacion'] = $data['fecha_validez'];
            $tins[':condicion_pago'] = $data['condicion_pago'];
            $tins[':total_cotizacion'] = $data['total_cotizacion'];
            $tins[':total_igv'] = $data['total_igv'];
            $tins[':total_gravado'] = $data['total_gravado'];
            $tins[':total_inafecto'] = $data['total_inafecto'];
            $tins[':ameEmpresa'] = isset($data['ameEmpresa']) ? $data['ameEmpresa'] : 'NE';
            $tins[':numRuc'] = isset($data['numRuc']) ? $data['numRuc'] : 'NE';
            $tins[':marca'] = isset($data['marca']) ? $data['marca'] : 'NE';
            $tins[':placa'] = isset($data['placa']) ? $data['placa'] : 'NE';
            $tins[':confVehicular'] = isset($data['confVehicular']) ? $data['confVehicular'] : 'NE';
            $tins[':habVehicular'] = isset($data['habVehicular']) ? $data['habVehicular'] : 'NE';
            $tins[':conductor'] = isset($data['conductor']) ? $data['conductor'] : 'NE';
            $tins[':licencia'] = isset($data['licencia']) ? $data['licencia'] : 'NE';
            $tins[':equipo'] = isset($data['equipo']) ? $data['equipo'] : 'NE';
            $tins[':idusrcobro'] = $_SESSION["id"] ? $_SESSION["id"] : null;
            $tins[':nombrusarcobro'] = $_SESSION["nombre"] ? $_SESSION["nombre"] : null;

            $gbd = Conexion::conectar();
            $gbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $gbd->prepare("INSERT INTO cotizacion (id_cliente, nombre_cliente, numero_documento, tipo_documento, direccion, nombre_contacto, documento_contacto, telefono_contacto, fecha_emision_cotizacion, fecha_vencimiento_cotizacion, condicion_pago, total_cotizacion, total_igv, total_gravado, total_inafecto, ameEmpresa, numRuc, marca, placa, confVehicular, habVehicular, conductor, licencia, equipo, idusrcobro, nombrusarcobro, email) VALUES (:id_cliente, :nombre_cliente, :numero_documento, :tipo_documento, :direccion, :nombre_contacto, :documento_contacto, :telefono_contacto, :fecha_emision_cotizacion, :fecha_vencimiento_cotizacion, :condicion_pago, :total_cotizacion, :total_igv, :total_gravado, :total_inafecto, :ameEmpresa, :numRuc, :marca, :placa, :confVehicular, :habVehicular, :conductor, :licencia, :equipo, :idusrcobro, :nombrusarcobro, :email)");
            try {
                //code...
                if ($stmt->execute($tins)) {
                    $id_cotizacion = $gbd->lastInsertId();

                    $rt['success'] = true;
                    $rt['msg'] = "registro de cotización exitoso";
                    $rt['id'] = $id_cotizacion;

                    $itms[':id_cotizacion'] = $id_cotizacion;
                    foreach ($data['item'] as $item) {
                        $itms[':id_producto'] = strtoupper($item['id']);
                        $itms[':cantidad'] = $item['cantidad'];
                        $itms[':unidad'] = $item['unidad'];
                        $itms[':precio'] = $item['valor'];
                        $itms[':total'] = $item['total'];
                        $itms[':nombre_item'] = $item['name'];
                        $stmt2 = Conexion::conectar()->prepare("INSERT INTO cotizacion_item (id_cotizacion, id_producto, cantidad, unidad, precio, total, nombre_item) VALUES (:id_cotizacion, :id_producto, :cantidad, :unidad, :precio, :total, :nombre_item)");

                        if ($stmt2->execute($itms)) {
                            $rt['itms'][] = true;
                        } else {
                            $rt['itms'][] = $stmt2->errorInfo();
                        }
                    }
                } else {
                    $rt['success'] = false;
                    $rt['error'] = $stmt->errorInfo();
                }
            } catch (PDOException $e) {
                return "Syntax Error: " . $e->getMessage();
            }
            return $rt;
        } else {
            $trsps['success'] = false;
            $trsps['msg'] = 'Selecciona al menos un producto';
        }
        return $trsps;
    }

    public function editar_cotizacion($data)
    {
        if (isset($data['item']) && !empty($data['id_cotizacion'])) {
            $pdo = Conexion::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("UPDATE cotizacion SET 
            id_cliente = :id_cliente, 
            nombre_cliente = :nombre_cliente, 
            numero_documento = :numero_documento, 
            tipo_documento = :tipo_documento, 
            direccion = :direccion, 
            nombre_contacto = :nombre_contacto, 
            documento_contacto = :documento_contacto, 
            telefono_contacto = :telefono_contacto, 
            fecha_emision_cotizacion = :fecha_emision_cotizacion, 
            fecha_vencimiento_cotizacion = :fecha_vencimiento_cotizacion, 
            condicion_pago = :condicion_pago, 
            total_cotizacion = :total_cotizacion, 
            total_igv = :total_igv, 
            total_gravado = :total_gravado, 
            total_inafecto = :total_inafecto, 
            ameEmpresa = :ameEmpresa, 
            numRuc = :numRuc, 
            marca = :marca, 
            placa = :placa, 
            confVehicular = :confVehicular, 
            habVehicular = :habVehicular, 
            conductor = :conductor, 
            licencia = :licencia, 
            equipo = :equipo, 
            idusrcobro = :idusrcobro, 
            nombrusarcobro = :nombrusarcobro, 
            email = :email
            WHERE id_cotizacion = :id_cotizacion");

            $stmt->bindValue(':id_cliente', !empty($data['id_cliente']) ? $data['id_cliente'] : null, PDO::PARAM_INT);

            $stmt->bindValue(':nombre_cliente', !empty($data['nombre_cliente_op']) ? $data['nombre_cliente_op'] : $data['nombre_cliente'], PDO::PARAM_STR);
            $stmt->bindValue(':numero_documento', !empty($data['documento']) ? $data['documento'] : $data['numero_documento'], PDO::PARAM_STR);
            $stmt->bindParam(':id_cotizacion', $data['id_cotizacion'], PDO::PARAM_INT);
            $stmt->bindValue(':email', !empty($data['email']) ? $data['email'] : "", PDO::PARAM_STR);
            $stmt->bindParam(':tipo_documento', $data['tipo_doc_cliente'], PDO::PARAM_STR);
            $stmt->bindParam(':direccion', $data['direccion_cliente'], PDO::PARAM_STR);
            $stmt->bindParam(':nombre_contacto', $data['nombre_contacto_cliente'], PDO::PARAM_STR);
            $stmt->bindParam(':documento_contacto', $data['documento_contacto_cliente'], PDO::PARAM_STR);
            $stmt->bindParam(':telefono_contacto', $data['telefono_cliente'], PDO::PARAM_STR);
            $stmt->bindParam(':fecha_emision_cotizacion', $data['fecha_emision'], PDO::PARAM_STR);
            $stmt->bindParam(':fecha_vencimiento_cotizacion', $data['fecha_validez'], PDO::PARAM_STR);
            $stmt->bindParam(':condicion_pago', $data['condicion_pago'], PDO::PARAM_STR);
            $stmt->bindParam(':total_cotizacion', $data['total_cotizacion'], PDO::PARAM_STR);
            $stmt->bindParam(':total_igv', $data['total_igv'], PDO::PARAM_STR);
            $stmt->bindParam(':total_gravado', $data['total_gravado'], PDO::PARAM_STR);
            $stmt->bindParam(':total_inafecto', $data['total_inafecto'], PDO::PARAM_STR);
            $stmt->bindValue(':ameEmpresa', isset($data['ameEmpresa']) ? $data['ameEmpresa'] : 'NE', PDO::PARAM_STR);
            $stmt->bindValue(':numRuc', isset($data['numRuc']) ? $data['numRuc'] : 'NE', PDO::PARAM_STR);
            $stmt->bindValue(':marca', isset($data['marca']) ? $data['marca'] : 'NE', PDO::PARAM_STR);
            $stmt->bindValue(':placa', isset($data['placa']) ? $data['placa'] : 'NE', PDO::PARAM_STR);
            $stmt->bindValue(':confVehicular', isset($data['confVehicular']) ? $data['confVehicular'] : 'NE', PDO::PARAM_STR);
            $stmt->bindValue(':habVehicular', isset($data['habVehicular']) ? $data['habVehicular'] : 'NE', PDO::PARAM_STR);
            $stmt->bindValue(':conductor', isset($data['conductor']) ? $data['conductor'] : 'NE', PDO::PARAM_STR);
            $stmt->bindValue(':licencia', isset($data['licencia']) ? $data['licencia'] : 'NE', PDO::PARAM_STR);
            $stmt->bindValue(':equipo', isset($data['equipo']) ? $data['equipo'] : 'NE', PDO::PARAM_STR);
            $stmt->bindValue(':idusrcobro', $_SESSION["id"] ? $_SESSION["id"] : null, PDO::PARAM_INT);
            $stmt->bindValue(':nombrusarcobro', $_SESSION["nombre"] ? $_SESSION["nombre"] : null, PDO::PARAM_STR);

            try {
                if ($stmt->execute()) {

                    $deleteItems = "DELETE FROM cotizacion_item WHERE id_cotizacion = :id_cotizacion";
                    $stmtDelete = $pdo->prepare($deleteItems);
                    $stmtDelete->bindParam(':id_cotizacion', $data['id_cotizacion'], PDO::PARAM_INT);

                    if ($stmtDelete->execute()) {
                        $success = true; // Asumir éxito inicial
                        foreach ($data['item'] as $item) {
                            $itms = [
                                ':id_cotizacion' => $data['id_cotizacion'],
                                ':id_producto' => strtoupper($item['id']),
                                ':cantidad' => $item['cantidad'],
                                ':unidad' => $item['unidad'],
                                ':precio' => $item['valor'],
                                ':total' => $item['total'],
                                ':nombre_item' => $item['name']
                            ];
                            $stmt2 = $pdo->prepare("INSERT INTO cotizacion_item (id_cotizacion, id_producto, cantidad, unidad, precio, total, nombre_item) VALUES (:id_cotizacion, :id_producto, :cantidad, :unidad, :precio, :total, :nombre_item)");

                            if (!$stmt2->execute($itms)) {
                                $success = false; // Marcar como error si falla algún ítem
                                break; // Salir del bucle si hay error
                            }
                        }
                        if ($success) {
                            return 'ok'; // Retornar éxito si todos los ítems se insertaron correctamente
                        } else {
                            return 'error registrar datos'; // Mensaje si hubo algún error al insertar ítems
                        }
                    } else {
                        return 'error de eliminacion'; // Mensaje si hubo un error al eliminar ítems
                    }
                } else {
                    return "error"; // Mensaje si hubo un error al actualizar la cotización
                }
            } catch (PDOException $e) {
                return "Syntax Error: " . $e->getMessage();
            }
        } else {
            return "Datos incompletos o ID de cotización no proporcionado";
        }
        $stmt->close();
        $stmt = null;
    }



    public function load_cotizacion($fecha_inicio, $fecha_fin)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM cotizacion WHERE fecha_emision_cotizacion BETWEEN :fecha_inicio AND :fecha_fin ORDER BY id_cotizacion");
        $stmt->bindValue(":fecha_inicio", $fecha_inicio);
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
   
    public function load_detalle_cotizacion($id_cotizacion)
    {
        // Consulta principal para obtener la cotización
        $stmt = Conexion::conectar()->prepare("SELECT * FROM cotizacion WHERE id_cotizacion = :id_cotizacion ORDER BY id_cotizacion DESC LIMIT 1");
        $stmt->bindValue(":id_cotizacion", $id_cotizacion);

        if ($stmt->execute()) {
            $rt['success'] = true;
            $rt['data'] = $stmt->fetch(PDO::FETCH_ASSOC);
            $rt['data']['id_cotizacion_ceros'] = str_pad($rt['data']['id_cotizacion'], 8, "0", STR_PAD_LEFT);

            // Consulta para obtener los items de la cotización
            $stmt1 = Conexion::conectar()->prepare("SELECT id_producto, nombre_item AS descripcion, FORMAT(cantidad, 2) AS cantidad, FORMAT(precio, 2) AS precio, FORMAT(total, 2) AS total, unidad
                FROM cotizacion_item ci
                WHERE id_cotizacion = :id_cotizacion ORDER BY id_cotizacion DESC");

            $stmt1->bindValue(":id_cotizacion", $id_cotizacion);

            if ($stmt1->execute()) {
                $rt['data']['items'] = $stmt1->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $rt['erroritem'] = $stmt1->errorInfo();
            }

            // Consulta para obtener los datos de transporte relacionados con la cotización
                $stmt2 = Conexion::conectar()->prepare("SELECT * FROM transport_data_cotizacion WHERE fk_cotizacion = :id_cotizacion");
                $stmt2->bindValue(":id_cotizacion", $id_cotizacion);

                if ($stmt2->execute()) {
                    $rt['data']['transport_data'] = $stmt2->fetch(PDO::FETCH_ASSOC);  // Cambiar a fetch si solo esperas un registro
                } else {
                    $rt['errorTransport'] = $stmt2->errorInfo();
                }
        } else {
            $rt['success'] = false;
            $rt['error'] = $stmt->errorInfo();
        }

        return $rt;
    }




    /*=============================================
    --- RENDER PRODUCTOS
    =============================================*/
    public function ult_correlativo($tipo_documento)
    {
        $stmt = Conexion::conectar()->query("SELECT * FROM `facturacion_parametros` WHERE tipo_comprobante='$tipo_documento' AND activo='1'");

        $listPags["items"] = array();
        foreach ($stmt as $row) {
            $retorn = array(
                "id"               => $row["id"],
                "tipo_comprobante" => $row["tipo_comprobante"],
                "correlativo"      => $row["correlativo"] + 1,
                "regional_id"      => $row["regional_id"],
                "serie"            => $row["serie"],
                "activo"           => $row["activo"],
                "fecha_creacion"   => $row["fecha_creacion"],
                "comentario"       => $row["comentario"],
            );
            array_push($listPags["items"], $retorn);
        }
        return json_encode($listPags["items"]);
    }

    /*=============================================
    --- RENDER CLIENTES
    =============================================*/
    public function render_clientes($tipoPersona)
    {

        if ($tipoPersona == '01') {
            $stmt = Conexion::conectar()->query("SELECT * FROM `clientes` WHERE LENGTH(documento)>='11' order by `nombre` ");
        } elseif ($tipoPersona == '03') {
            $stmt = Conexion::conectar()->query("SELECT * FROM `clientes` WHERE LENGTH(documento)<='8' order by `nombre` ");
        }


        $listPags["items"] = array();
        foreach ($stmt as $row) {
            $retorn = array(

                "id"               => $row["id"],
                "nombre"           => $row["nombre"],
                "documento"        => $row["documento"],
                "email"            => $row["email"],
                "telefono"         => $row["telefono"],
                "direccion"        => $row["direccion"],
                "fecha_nacimiento" => $row["fecha_nacimiento"],
                "compras"          => $row["compras"],
                "ultima_compra"    => $row["ultima_compra"],
                "fecha"            => $row["fecha"],
                "variedad_altitud" => $row["variedad_altitud"],
                "marca"            => $row["marca"],
                "tipo_cliente"     => $row["tipo_cliente"],
                "sexo"             => $row["sexo"],
            );
            array_push($listPags["items"], $retorn);
        }
        return json_encode($listPags["items"]);
    }
    /*=============================================*/

    /*=============================================
    --- INSER INTO FACTURA O BOLETA
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
        $tipo_comprobante,
        $arraisito
    ) {

        $nombre_cliente = str_replace("'", "\'", base64_decode($nombre_cliente));


        $end_sales_i________ = json_decode($arraisito, true);


        // ============================================ debug =================================================
        $consultaSQLctxt = "INSERT INTO `facturacion_comprobante_cabecera` (\n" .
            "        `id`,\n" .
            "        `serie`,\n" .
            "        `correlativo`,\n" .
            "        `fecha_creacion`,\n" .
            "        `fecha_contable`,\n" .
            "        `fecha_vencimiento`,\n" .
            "        `nombre_cliente`,\n" .
            "        `num_docu_identidad`,\n" .
            "        `direccion`,\n" .
            "        `documento_origen_de_comprobante`,\n" .
            "        `idBpm`,\n" .
            "        `estado_envio`,\n" .
            "        `estado_tributatio`,\n" .
            "        `cajera`,\n" .
            "        `tipo_operacion`,\n" .
            "        `total_gravada`,\n" .
            "        `total_exonerada`,\n" .
            "        `total_inafecta`,\n" .
            "        `igv`,\n" .
            "        `total`,\n" .
            "        `tipo_pago`,\n" .
            "        `efectivo_recibido`,\n" .
            "        `vuelto_entregado`,\n" .
            "        `cod_transaccion`,\n" .
            "        `cpe`,\n" .
            "        `cdr`,\n" .
            "        `data_send_json`,\n" .
            "        `ruta_xml`)\n" .
            "        VALUES (\n" .
            "        NULL,\n" .
            "        (SELECT serie FROM `facturacion_parametros` where tipo_comprobante='" . $tipo_comprobante . "' and activo='1'),\n" .
            "        (SELECT correlativo+1 FROM `facturacion_parametros` where tipo_comprobante='" . $tipo_comprobante . "' and activo='1'),\n" .
            "        CURRENT_TIMESTAMP,\n" .
            "        '" . $fecha_contable . "',\n" .
            "        '" . $fecha_vencimiento . "',\n" .
            "        '" . $nombre_cliente . "',\n" .
            "        '" . $num_docu_identidad . "',\n" .
            "        '" . $direccion . "',\n" .
            "        '" . $doc_org_de_comp . "',\n" .
            "        '" . $idBpm . "',\n" .
            "        '" . $estado_envio . "',\n" .
            "        '" . $estado_tributatio . "',\n" .
            "        '" . $cajera . "',\n" .
            "        '" . $tipo_operacion . "',\n" .
            "        '" . $total_gravada . "',\n" .
            "        '" . $total_exonerada . "',\n" .
            "        '" . $total_inafecta . "',\n" .
            "        '" . $igv . "',\n" .
            "        '" . $total . "',\n" .
            "        '" . $tipo_pago . "',\n" .
            "        '" . $efectivo_recibido . "',\n" .
            "        '" . $vuelto_entregado . "',\n" .
            "        '" . $cod_transaccion . "',\n" .
            "        NULL,\n" .
            "        NULL,\n" .
            "        NULL,\n" .
            "        NULL);";



        // Ruta y nombre del archivo donde se guardará el contenido
        $archivo = "cabezaVentadirecta.txt";

        // Guardar el contenido en el archivo
        file_put_contents($archivo, $consultaSQLctxt, FILE_APPEND);

        // ============================================ debug =================================================

        //TODO: INSERT INTO FACTURA CABEZA
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

        $query_upd_correlativo = Conexion::conectar()->query("UPDATE `facturacion_parametros` SET correlativo=(correlativo+1) where tipo_comprobante='$tipo_comprobante' and activo='1'");

        $_cuerpo_venta_ = '';
        for ($i = 0; $i < count($end_sales_i________); $i++) {

            $CODIGO_X_TIPO_ITEM = $end_sales_i________[$i]["codigo_x_tipo_item"];
            $FK_DE_ITEM_ALMACEN = (int) substr($end_sales_i________[$i]["codigo_x_tipo_item"], 1);

            $TIP_ITEM_ONE_LETER = $end_sales_i________[$i]["codigo_x_tipo_item"][0];
            $CODIGO____________ = $end_sales_i________[$i]["codigo"];
            $NOMBRE_PRODUCTO___ = $end_sales_i________[$i]["nombre_producto"];
            $PRECIO_VENTA______ = $end_sales_i________[$i]["precio_venta"];
            $STOCK_____________ = $end_sales_i________[$i]["stock"];
            $STOCK_RESULTANTE__ = $end_sales_i________[$i]["stock_resultante"];
            $CANTIDADITEM______ = $end_sales_i________[$i]["cantidadItem"];
            $TOTAL_COBRAR______ = $end_sales_i________[$i]["total_cobrar"];

            $_cuerpo_venta_pint = '<div style="font-size: 11px;color: black;text-align: left;display: flex;border-bottom: 1px solid #c3c3c3"><div style="display: table;width: 125px !important">' . $NOMBRE_PRODUCTO___ . '</div><div style="display: table;width: 36px !important;text-align: center;">' . $CANTIDADITEM______ . '</div><div style="display: table;width: 46px !important;text-align: center;">' . $PRECIO_VENTA______ . '</div><div style="display: table;width: 58px !important;text-align: right;">' . $TOTAL_COBRAR______ . '</div></div>';

            $_cuerpo_venta_ = $_cuerpo_venta_ . $_cuerpo_venta_pint;

            //NOTE: AVERIGUAMOS CABECERA DE COMPROBANTE EN BASE A CODIGO UNICO
            $stmt_CD = Conexion::conectar()->query("SELECT id,serie,correlativo,fecha_creacion, CASE WHEN CHAR_LENGTH(num_docu_identidad)=8 THEN '1' WHEN CHAR_LENGTH(num_docu_identidad)=11 THEN '6' END AS 'uno_dni_seis_ruc', CASE WHEN CHAR_LENGTH(num_docu_identidad)=8 THEN 'DNI' WHEN CHAR_LENGTH(num_docu_identidad)=11 THEN 'RUC' END AS 'docu_label', CASE WHEN CHAR_LENGTH(num_docu_identidad)=8 THEN 'BOLETA' WHEN CHAR_LENGTH(num_docu_identidad)=11 THEN 'FACTURA' END AS 'comprobante_label', CASE WHEN CHAR_LENGTH(num_docu_identidad)=8 THEN '03' WHEN CHAR_LENGTH(num_docu_identidad)=11 THEN '01' END as 'o3_boleta_01_factura'
                                                    FROM `facturacion_comprobante_cabecera`
                                                    WHERE documento_origen_de_comprobante='$doc_org_de_comp'");
            foreach ($stmt_CD as $row) {
                $id_CD                = $row["id"];
                $serie_CD = $row["serie"] === "B001" ? "EB01" : ($row["serie"] === "F001" ? "E001" : $row["serie"]);
                $correlativo_CD       = $row["correlativo"];
                $fecha_creacion_CD    = $row["fecha_creacion"];
                $uno_dni_seis_ruc     = $row["uno_dni_seis_ruc"];
                $docu_label_CD        = $row["docu_label"];
                $comprobante_label_CD = $row["comprobante_label"];
                $o3_boleta_01_factura = $row["o3_boleta_01_factura"];
            }


            // ============================================ debug =================================================
            $consultaSQLBdSales = "INSERT INTO `facturacion_comprobante_cuerpo`\n" .
                "(`id`,\n" .
                " `codigo`,\n" .
                " `descripcion`,\n" .
                " `cantidad`,\n" .
                " `precio_venta_unitario`,\n" .
                " `precio_tras_decuento`,\n" .
                " `precio_venta_total`,\n" .
                " `fecha_creacion`,\n" .
                " `fk_comprobante_cabecera`,\n" .
                "  `pk_lote`) VALUES\n" .
                "(NULL,\n" .
                " '$CODIGO____________',\n" .
                " '$NOMBRE_PRODUCTO___',\n" .
                " '$CANTIDADITEM______',\n" .
                " '$PRECIO_VENTA______',\n" .
                " '0.00',\n" .
                " '$TOTAL_COBRAR______',\n" .
                " CURRENT_TIMESTAMP,\n" .
                " '$id_CD',\n" .
                "  '$FK_DE_ITEM_ALMACEN');\n\n"; // Añadimos un doble salto de línea para separar múltiples entradas

            // Ruta y nombre del archivo donde se guardará el contenido
            $archivobs = "cuerpoVentadirecta.txt";

            // Guardar el contenido en el archivobs de forma incremental
            file_put_contents($archivobs, $consultaSQLBdSales, FILE_APPEND);
            // ============================================ debug =================================================

            //NOTE: INSER INTO CUERPITO DE FACTURA
            $query_body_insert = Conexion::conectar()->query("INSERT INTO `facturacion_comprobante_cuerpo`
                (`id`,
                 `codigo`,
                 `descripcion`,
                 `cantidad`,
                 `precio_venta_unitario`,
                 `precio_tras_decuento`,
                 `precio_venta_total`,
                 `fecha_creacion`,
                 `fk_comprobante_cabecera`,
                  `pk_lote`) VALUES
                (NULL,
                 '$CODIGO____________',
                 '$NOMBRE_PRODUCTO___',
                 '$CANTIDADITEM______',
                 '$PRECIO_VENTA______',
                 '0.00',
                 '$TOTAL_COBRAR______',
                 CURRENT_TIMESTAMP,
                 '$id_CD',
                  '$FK_DE_ITEM_ALMACEN');");

            if ($TIP_ITEM_ONE_LETER === 'P') {
                # code...
                //TODO: UPDATE DE LOS PRODUCTOS A FIN DE CONSUMIR EL STOCK
                $query_upd_stock = Conexion::conectar()->query("UPDATE `productos` SET stock=stock-$CANTIDADITEM______  WHERE id='$FK_DE_ITEM_ALMACEN'");

                //                     INSERT THE KARDEX todo
                $barcode = $CODIGO____________;
                $description = $NOMBRE_PRODUCTO___;
                $cantidad = $CANTIDADITEM______;
                $pk_dat_maestro_item = $FK_DE_ITEM_ALMACEN;
                $lotesCadena = $this->getLote($barcode, $cantidad);
                $this->insertar_salida_en_kardex($this->getCategoria($barcode), $barcode, $description, null, $cantidad, $this->getPrecioCompra($barcode, $cantidad), $PRECIO_VENTA______, 'VENTA DIRECTA', $pk_dat_maestro_item, 1, $lotesCadena, $id_CD);
            }
        }

        $Body_invoice_htmls = '<center><div class="cajitaFactura" style="border: 1px solid white;width: 98%;"> <img src="../vistas/img/L23PNG.png" alt="Smiley face" width="200" > <p style="font-size: 12px;color: #5e5e5e;margin: 2px; "><b> INVERSIONES Y SERVICIOS HERMOZA LUZ S.R.L. </b> </p> <p style="font-size: 11px;margin: 0px;color: #5e5e5e;"> PQ. DEL AGUSTINO MZA. 31 DPTO. 502 CND </p> <p style="font-size: 11px;margin: 0px;color: #5e5e5e;"> LOS EUCALIPTOS LIMA - LIMA - EL AGUSTINO </p> <p style="font-size: 11px;margin: 0px;color: #5e5e5e;"> Teléfono: +51 962 382 960 &nbsp;-&nbsp; </p> <p style="font-size: 11px;margin: 0px;color: #5e5e5e;"> E-Mail: inversionesyservicioshermozaluzsrl2010@hotmail.com </p> <p style="font-size: 13px;margin: 0px;color: #5e5e5e;border-top: 1px dashed black;margin-top: 10px;padding-top: 4px;font-weight: 900"> <b> RUC: 20487040852</b> </p> <p style="font-size: 13px;margin: 0px;color: #5e5e5e;border-top: 1px dashed black;border-bottom: 1px dashed black;margin-top: 5px;padding-top: 4px;padding-bottom: 4px;font-weight: 900"> <b>' . $comprobante_label_CD . ' DE VENTA ELECTRÓNICA <br> <span>' . $serie_CD . '-' . $correlativo_CD . '</span></b> </p> <p style="font-size: 11.5px;margin: 0px;color: #5e5e5e;border-bottom: 1px dashed black;margin-top: 5px;padding-top: 4px;padding-bottom: 4px;text-align: left;font-weight: 600"> <span>Sr. o Sres: </span> <span style="padding-left: 15px">' . $nombre_cliente . '</span> <br> <span>Dirección: </span> <span style="padding-left: 14px">' . $direccion . '</span> <br> <span>' . $docu_label_CD . ': </span> <span style="padding-left: 42px">' . $num_docu_identidad . '</span> <br> <span>F. Emisión: </span> <span style="padding-left: 11px">' . $fecha_contable . '</span> <br>  </p> <p style="font-size: 11px;margin: 0px;color: #5e5e5e;border-bottom: 1px solid black;margin-top: 5px;padding-top: 15px;padding-bottom: 4px;text-align: left;font-weight: 600"> <span style="padding-right: 50px;">DESCRIPCIÓN</span> <span style="padding-left: 13px;">CANT</span> <span style="padding-left: 10px;">PRECIO</span> <span style="padding-left: 15px;">IMPORTE</span> </p>' . $_cuerpo_venta_ . '<div style="font-size: 11.5px; color: black;display: flex;font-weight: 600"> <div style="display: table;width: 50% !important;text-align: left;">OP. GRAVADA </div> <div style="display: table;width: 50% !important;text-align: right;">S/' . $total_gravada . '</div> </div> <div style="font-size: 11.5px; color: black;display: flex;font-weight: 600"> <div style="display: table;width: 50% !important;text-align: left;">OP. EXONERADA </div> <div style="display: table;width: 50% !important;text-align: right;">S/' . $total_exonerada . '</div> </div> <div style="font-size: 11.5px; color: black;display: flex;font-weight: 600"> <div style="display: table;width: 50% !important;text-align: left;">IGV </div> <div style="display: table;width: 50% !important;text-align: right;">S/' . $igv . '</div> </div> <div style="font-size: 11.5px; color: black;display: flex;font-weight: 600"> <div style="display: table;width: 50% !important;text-align: left;">TOTAL </div> <div style="display: table;width: 50% !important;text-align: right;">S/' . $total . '</div> </div> <p style="text-align: left;font-size: 12px;margin: 0px;color: #5e5e5e;border-top: 1px dashed black;border-bottom: 1px dashed black;margin-top: 10px;padding-top: 4px;padding-bottom: 4px;font-weight: 600"> SON: ' . $this->numeroAletrasDinero($total) . ' </p> <p style="font-size: 11.5px;margin: 0px;color: #5e5e5e;margin-top: 5px;padding-top: 4px;padding-bottom: 4px;text-align: left;font-weight: 600"> <span>Observación: </span> <span style="padding-left: 4px">Generado por venta directa </span> <br> <span>Supervisor: </span> <span style="padding-left: 18px">Nicky Luz  Vivanco Manrique</span> <br> <center style="font-size: 10.5px;padding: 10px 20px" > Representacion impresa de FACTURA DE VENTA ELECTRÓNICA, autorizado mediante resolucion No.018-005-0002783/SUNAT. Para consultar la validez del documento ingrese a: www.sunat.gob.pe, en Opciones sin Clave SOL <br> <b>MUCHAS GRACIAS POR SU COMPRA</b><br><br>  </center> </p><img src="../vistas/img/plantilla/QR.png" style="width: 150px"></div></center>';

        $btn_para_gn_pdf = 'window.open("controladores/pdf.controlador.php?id=' . $id_CD . '&deque=pdf_comprobante","_blank")';
?>

        <script type="text/javascript">
            // $id_CD
            $('#btnPrintpdf').attr('onClick', '<?php echo $btn_para_gn_pdf; ?>');

            $('#cuerpo_comprobante').html('<?php echo $Body_invoice_htmls; ?>');
            $('#btnPrint,#btnPrintpdf').prop('disabled', false);
            $('#delete-row,#btnGuardarVenta').remove();
            $('input,select').prop('disabled', true);


            $('#myModal').addClass("d-none");

            $("#btnPrint").click(function() {
                $("#cuerpo_comprobante").printThis({
                    debug: true
                });
            });

            $("#btnPrint").trigger("click");
        </script>

<?php
    }

    /*=============================================*/
    public function get_producto_disponible()
    {
        // esta función regresa un subfijo para la cifra
        $xx      = trim($xx);
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



    public function buscar_cliente_big($term)
    {
        $stmt = Conexion::conectar()->prepare("SELECT id,nombre,documento,telefono,direccion FROM clientes WHERE nombre LIKE :term OR documento LIKE :term LIMIT 20");
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
    public static function mdlGuardataDataTransport($tabla, $datos)
    {
        $pdo = Conexion::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Comprobar si el registro existe
        $stmt = $pdo->prepare("SELECT COUNT(*) as total FROM $tabla WHERE fk_cotizacion = :fk_cotizacion");
        $stmt->bindParam(":fk_cotizacion", $datos["fk_cotizacion"], PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($resultado['total'] > 0) {

            $stmt = $pdo->prepare("UPDATE $tabla SET
            empresa = :empresa,
            ruc = :ruc,
            marca = :marca,
            placa = :placa,
            conf_vehicular = :conf_vehicular,
            hab_vehicular = :hab_vehicular,
            conductor = :conductor,
            licencia = :licencia,
            equipo = :equipo
            WHERE fk_cotizacion = :fk_cotizacion");

            $stmt->bindParam(":empresa", $datos["empresa"], PDO::PARAM_STR);
            $stmt->bindParam(":ruc", $datos["ruc"], PDO::PARAM_STR);
            $stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
            $stmt->bindParam(":placa", $datos["placa"], PDO::PARAM_STR);
            $stmt->bindParam(":conf_vehicular", $datos["conf_vehicular"], PDO::PARAM_STR);
            $stmt->bindParam(":hab_vehicular", $datos["hab_vehicular"], PDO::PARAM_STR);
            $stmt->bindParam(":conductor", $datos["conductor"], PDO::PARAM_STR);
            $stmt->bindParam(":licencia", $datos["licencia"], PDO::PARAM_STR);
            $stmt->bindParam(":equipo", $datos["equipo"], PDO::PARAM_STR);
            $stmt->bindParam(":fk_cotizacion", $datos["fk_cotizacion"], PDO::PARAM_INT);

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
        } else {

            $stmt = $pdo->prepare("INSERT INTO $tabla (empresa, ruc, marca, placa, conf_vehicular, hab_vehicular, conductor, licencia, equipo, fk_cotizacion)
            VALUES (:empresa, :ruc, :marca, :placa, :conf_vehicular, :hab_vehicular, :conductor, :licencia, :equipo, :fk_cotizacion)");

            $stmt->bindParam(":empresa", $datos["empresa"], PDO::PARAM_STR);
            $stmt->bindParam(":ruc", $datos["ruc"], PDO::PARAM_STR);
            $stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
            $stmt->bindParam(":placa", $datos["placa"], PDO::PARAM_STR);
            $stmt->bindParam(":conf_vehicular", $datos["conf_vehicular"], PDO::PARAM_STR);
            $stmt->bindParam(":hab_vehicular", $datos["hab_vehicular"], PDO::PARAM_STR);
            $stmt->bindParam(":conductor", $datos["conductor"], PDO::PARAM_STR);
            $stmt->bindParam(":licencia", $datos["licencia"], PDO::PARAM_STR);
            $stmt->bindParam(":equipo", $datos["equipo"], PDO::PARAM_STR);
            $stmt->bindParam(":fk_cotizacion", $datos["fk_cotizacion"], PDO::PARAM_INT);

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
        }
        $stmt->closeCursor();
        $stmt = null;
    }
}
switch ($_POST['accion']) {
    case 'loadEdit':
        $respuesta = ModeloPanelFacturaBpm::mdlMostrar("transport_data_cotizacion", 'fk_cotizacion', $_POST['id']);
        echo json_encode($respuesta);
        break;
}
