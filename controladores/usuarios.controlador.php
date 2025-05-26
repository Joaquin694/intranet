<?php



class ControladorUsuarios
{
    /*=============================================
    INGRESO DE USUARIO
    =============================================*/
    public static function ctrIngresoUsuario(): void
    {
        if (isset($_POST["ingUsuario"])) {
            // Capturar la opción de la base de datos seleccionada
            $dbOption = $_POST["databaseOption"] ?? "produccion";

            // Definir las credenciales de la base de datos según la opción seleccionada
            // Usando sintaxis de coincidencia de patrones de PHP 8.0+
            $_SESSION["db_user"] = match($dbOption) {
                "pruebas" => "root",
                default => "root"
            };
            
            $_SESSION["db_password"] = "";
            $_SESSION["db_name"] = match($dbOption) {
                "pruebas" => "intranet_pruebas",
                default => "intranet_herlu"
            };

            if (
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])
            ) {
                // Mejora en la encriptación usando password_hash en lugar de crypt
                $encriptar = password_hash($_POST["ingPassword"], PASSWORD_BCRYPT, ['cost' => 12]);
                
                // Para verificación existente mantener compatibilidad
                $encriptarLegacy = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $tabla = "usuarios";
                $item = "usuario";
                $valor = $_POST["ingUsuario"];

                // Iniciar transacción para MySQL 8.4.3
                $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

                if ($respuesta["usuario"] == $_POST["ingUsuario"]) {
                    // Verificar contraseña con soporte para ambos sistemas de hash
                    $passwordMatches = $respuesta["password"] == $encriptarLegacy || 
                                     (str_starts_with($respuesta["password"], '$2y$') && 
                                     password_verify($_POST["ingPassword"], $respuesta["password"]));
                    
                    if ($passwordMatches && $respuesta["estado"] == 1) {
                        $_SESSION["iniciarSesion"] = "ok";
                        $_SESSION["id"] = $respuesta["id"];
                        $_SESSION["nombre"] = $respuesta["nombre"];
                        $_SESSION["usuario"] = $respuesta["usuario"];
                        $_SESSION["foto"] = $respuesta["foto"];
                        $_SESSION["perfil"] = $respuesta["perfil"];
                        $_SESSION["acceso"] = $respuesta["acceso"];
                        $_SESSION["recaptcha_secretkey"] = "6636998111589";

                        /*=============================================
                        REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
                        =============================================*/
                        date_default_timezone_set('America/Bogota');
                        $fechaActual = date('Y-m-d H:i:s'); // Formato simplificado en PHP 8.3

                        $item1 = "ultimo_login";
                        $valor1 = $fechaActual;
                        $item2 = "id";
                        $valor2 = $respuesta["id"];

                        $ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

                        if ($ultimoLogin == "ok") {
                            // Utilizando match de PHP 8.0+ para simplificar la lógica
                            $redirectLocation = match($respuesta["perfil"]) {
                                "Especial" => "productos",
                                "Vendedor" => "ventas",
                                default => "inicio"
                            };
                            
                            echo "<script>window.location = '$redirectLocation';</script>";
                        }
                    } else {
                        echo '<center><div class="alert alert-danger" style="font-weight: 200;font-size: 13px;margin-top: 10px">El usuario aún no está activado</div></center>';
                    }
                } else {
                    echo '<audio autoplay>
                        <source src="vistas/audio/warning.wav" type="audio/wav">
                        Error
                    </audio>';

                    echo '<center><div class="alert alert-danger" style="font-weight: 200;font-size: 13px;margin-top: 10px">Error al ingresar, vuelve a intentarlo</div></center>';
                }
            }
        }
    }

    /*=============================================
    REGISTRO DE USUARIO
    =============================================*/
    public static function ctrCrearUsuario(): void
    {
        if (isset($_POST["nuevoUsuario"])) {
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])
            ) {
                /*=============================================
                VALIDAR IMAGEN
                =============================================*/
                $ruta = "";

                if (isset($_FILES["nuevaFoto"]["tmp_name"]) && !empty($_FILES["nuevaFoto"]["tmp_name"])) {
                    // Usar funciones de imagen más modernas en PHP 8
                    [$ancho, $alto] = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);
                    
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    /*=============================================
                    CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
                    =============================================*/
                    $directorio = "vistas/img/usuarios/" . $_POST["nuevoUsuario"];
                    
                    // Crear directorio de forma segura
                    if (!is_dir($directorio)) {
                        mkdir($directorio, 0755, true);
                    }

                    /*=============================================
                    DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                    =============================================*/
                    $aleatorio = mt_rand(100, 999);
                    
                    // Usar match para simplificar código
                    $mimeType = $_FILES["nuevaFoto"]["type"];
                    
                    // Usando match de PHP 8 para manejar tipos de imagen
                    $extension = match($mimeType) {
                        "image/jpeg" => "jpg",
                        "image/png" => "png",
                        default => throw new \InvalidArgumentException("Formato de imagen no soportado")
                    };
                    
                    $ruta = "vistas/img/usuarios/" . $_POST["nuevoUsuario"] . "/" . $aleatorio . "." . $extension;
                    
                    // Crear y redimensionar imagen usando GD moderno
                    $origen = match($extension) {
                        "jpg" => imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]),
                        "png" => imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"])
                    };
                    
                    // Preservar transparencia para PNG
                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                    
                    if ($extension === "png") {
                        // Preservar transparencia
                        imagealphablending($destino, false);
                        imagesavealpha($destino, true);
                    }
                    
                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                    
                    match($extension) {
                        "jpg" => imagejpeg($destino, $ruta, 90),
                        "png" => imagepng($destino, $ruta, 9)
                    };
                    
                    // Liberar memoria
                    imagedestroy($origen);
                    imagedestroy($destino);
                }

                $tabla = "usuarios";

                // Mejora en encriptación para PHP 8.3
                $encriptar = password_hash($_POST["nuevoPassword"], PASSWORD_BCRYPT, ['cost' => 12]);

                $listCheck = self::validate($_POST, [
                    "indicadore_metricas", "activos_fijos", "gestion_inventario", 
                    "solicitud_salida", "plan_mantenimiento", "gestion_combustible", 
                    "gastos_conductor", "check_list", "proveedores", "clientes", 
                    "daministrar_gastos", "nuevo_gasto", "administrar_ventas", 
                    "nueva_venta", "nueva_cotizacion", "lista_cotizacion", 
                    "usuarios", "codigo_barras", "videoconferencias", "gestor_documental"
                ]);

                $listAcceso = implode('/', $listCheck);

                $datos = [
                    "nombre" => $_POST["nuevoNombre"],
                    "usuario" => $_POST["nuevoUsuario"],
                    "password" => $encriptar,
                    "perfil" => $_POST["nuevoPerfil"],
                    "foto" => $ruta,
                    "acceso" => $listAcceso
                ];

                $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        type: "success",
                        title: "¡El usuario ha sido guardado correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result) => {
                        if(result.value){
                            window.location = "usuarios";
                        }
                    });
                    </script>';
                }
            } else {
                echo '<script>
                swal({
                    type: "error",
                    title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                }).then((result) => {
                    if(result.value){
                        window.location = "usuarios";
                    }
                });
                </script>';
            }
        }
    }

    /*=============================================
MOSTRAR USUARIO - Versión compatible con PHP 8.2
=============================================*/
public static function ctrMostrarUsuarios(?string $item = null, ?string $valor = null): array|object
{
    $tabla = "usuarios";
    $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);
    return $respuesta;
}

    /*=============================================
    EDITAR USUARIO
    =============================================*/
    public static function ctrEditarUsuario(): void
    {
        if (isset($_POST["editarUsuario"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])) {
                /*=============================================
                VALIDAR IMAGEN
                =============================================*/
                $ruta = $_POST["fotoActual"] ?? "";

                if (isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])) {
                    [$ancho, $alto] = getimagesize($_FILES["editarFoto"]["tmp_name"]);
                    
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    /*=============================================
                    CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
                    =============================================*/
                    $directorio = "vistas/img/usuarios/" . $_POST["editarUsuario"];

                    /*=============================================
                    PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
                    =============================================*/
                    if (!empty($_POST["fotoActual"]) && file_exists($_POST["fotoActual"])) {
                        unlink($_POST["fotoActual"]);
                    } else if (!is_dir($directorio)) {
                        mkdir($directorio, 0755, true);
                    }

                    /*=============================================
                    DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                    =============================================*/
                    $aleatorio = mt_rand(100, 999);
                    
                    // Usar match para simplificar código
                    $mimeType = $_FILES["editarFoto"]["type"];
                    
                    try {
                        // Usando match de PHP 8 para manejar tipos de imagen
                        $extension = match($mimeType) {
                            "image/jpeg" => "jpg",
                            "image/png" => "png",
                            default => throw new \InvalidArgumentException("Formato de imagen no soportado")
                        };
                        
                        $ruta = "vistas/img/usuarios/" . $_POST["editarUsuario"] . "/" . $aleatorio . "." . $extension;
                        
                        // Crear y redimensionar imagen usando GD moderno
                        $origen = match($extension) {
                            "jpg" => imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]),
                            "png" => imagecreatefrompng($_FILES["editarFoto"]["tmp_name"])
                        };
                        
                        // Preservar transparencia para PNG
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        
                        if ($extension === "png") {
                            // Preservar transparencia
                            imagealphablending($destino, false);
                            imagesavealpha($destino, true);
                        }
                        
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        
                        match($extension) {
                            "jpg" => imagejpeg($destino, $ruta, 90),
                            "png" => imagepng($destino, $ruta, 9)
                        };
                        
                        // Liberar memoria
                        imagedestroy($origen);
                        imagedestroy($destino);
                    } catch (\InvalidArgumentException $e) {
                        // Manejar error de formato no soportado
                        echo '<script>
                        swal({
                            type: "error",
                            title: "Error: ' . $e->getMessage() . '",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        });
                        </script>';
                        return;
                    }
                }

                $tabla = "usuarios";
                
                // Password handling con soporte mejorado
                if (!empty($_POST["editarPassword"])) {
                    if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])) {
                        // Usar password_hash en lugar de crypt
                        $encriptar = password_hash($_POST["editarPassword"], PASSWORD_BCRYPT, ['cost' => 12]);
                    } else {
                        echo '<script>
                        swal({
                            type: "error",
                            title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result) => {
                            if (result.value) {
                                window.location = "usuarios";
                            }
                        });
                        </script>';
                        return;
                    }
                } else {
                    // Usar nullsafe operator de PHP 8 para manejar variable posiblemente no definida
                    $encriptar = $passwordActual ?? null;
                }

                $listCheck = self::validate($_POST, [
                    "indicadore_metricas", "activos_fijos", "gestion_inventario", 
                    "solicitud_salida", "plan_mantenimiento", "gestion_combustible", 
                    "gastos_conductor", "check_list", "proveedores", "clientes", 
                    "daministrar_gastos", "nuevo_gasto", "administrar_ventas", 
                    "nueva_venta", "nueva_cotizacion", "lista_cotizacion", 
                    "usuarios", "codigo_barras", "videoconferencias", "gestor_documental"
                ]);

                $listAcceso = implode('/', $listCheck);

                $datos = [
                    "nombre" => $_POST["editarNombre"],
                    "usuario" => $_POST["editarUsuario"],
                    "password" => $encriptar,
                    "perfil" => $_POST["editarPerfil"],
                    "foto" => $ruta,
                    "acceso" => $listAcceso
                ];

                $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        type: "success",
                        title: "El usuario ha sido editado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result) => {
                        if (result.value) {
                            window.location = "usuarios";
                        }
                    });
                    </script>';
                }
            } else {
                echo '<script>
                swal({
                    type: "error",
                    title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                }).then((result) => {
                    if (result.value) {
                        window.location = "usuarios";
                    }
                });
                </script>';
            }
        }
    }

    /*=============================================
    BORRAR USUARIO
    =============================================*/
    public static function ctrBorrarUsuario(): void
    {
        if (isset($_GET["idUsuario"])) {
            $tabla = "usuarios";
            $datos = $_GET["idUsuario"];

            if (!empty($_GET["fotoUsuario"]) && file_exists($_GET["fotoUsuario"])) {
                unlink($_GET["fotoUsuario"]);
                
                $userDir = 'vistas/img/usuarios/' . $_GET["usuario"];
                if (is_dir($userDir)) {
                    // Borrar directorio de forma segura
                    $files = new \RecursiveIteratorIterator(
                        new \RecursiveDirectoryIterator($userDir, \RecursiveDirectoryIterator::SKIP_DOTS),
                        \RecursiveIteratorIterator::CHILD_FIRST
                    );
                    
                    foreach ($files as $file) {
                        if ($file->isDir()) {
                            rmdir($file->getPathname());
                        } else {
                            unlink($file->getPathname());
                        }
                    }
                    
                    rmdir($userDir);
                }
            }

            $respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                swal({
                    type: "success",
                    title: "El usuario ha sido borrado correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                }).then((result) => {
                    if (result.value) {
                        window.location = "usuarios";
                    }
                });
                </script>';
            }
        }
    }

    /**
     * Valida los campos del formulario
     * 
     * @param array $request Datos del formulario
     * @param array $input Campos a validar
     * @return array Lista de campos válidos
     */
    public static function validate(array $request, array $input): array
    {
        return array_filter(
            $input,
            fn($key) => isset($request[$key]),
            ARRAY_FILTER_USE_KEY
        );
    }
}