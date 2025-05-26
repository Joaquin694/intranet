<script>
    // Crea un nuevo objeto SpeechSynthesisUtterance y configura el idioma a español
    var utterance = new SpeechSynthesisUtterance();
    utterance.lang = 'es-ES';

    // Función para reproducir el texto
    function speak(text) {
        utterance.text = text;
        window.speechSynthesis.speak(utterance);
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<style>
    /* .modal {
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: auto;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
}

.modal-content {
    background-color: #fefefe;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    height: 80%;
} */
    .modal-content {

        padding: 20px 50px;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    #orderTextarea {
        width: 100%;
        height: 300px;
        background: black;
        color: white;
    }



    .stock {
        padding: 2px 4px;
        text-align: center;
        font-weight: 800;
        border-radius: 20px;
    }

    /* Styles for wrapping the search box */
    .main {
        width: 50%;
        margin: 5px auto;
    }

    /* Bootstrap 3 text input with search icon */
    .has-search .form-control-feedback {
        right: initial;
        left: 0;
        color: #ccc;
    }

    .has-search .form-control {
        padding-right: 12px;
        padding-left: 34px;
    }


    .dataTables_filter {
        text-align: center;
    }

    .dataTables_filter input {
        width: 200px;
        margin: 0 auto;
    }

    select#padreSelect {
        background: BLACK !important;
    }

    table#tblStockC {
        width: 100% !important;
    }


    input#nuevoStock {
        font-size: 25px;
    }

    input#nuevoStock,
    #nuevaalmacenes,
    #nuevoLote {
        background: #007bff;
        font-weight: 900;
        color: white;
    }

    #tabla_datos_maestros {
        background-color: #fff;
        width: 100%;
    }


    /* Estilo para el contenedor de las opciones de radio */
    .container.mt-12 {
        margin-top: 1.5rem;
    }

    /* Estilo para las opciones de radio */
    .custom-radio {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
    }

    /* Estilo para los botones de radio */
    .custom-radio input[type="radio"] {
        width: 25px;
        height: 25px;
        margin-right: 10px;
        accent-color: #007bff;
        /* Cambia el color del botón de radio */
    }

    /* Estilo para las etiquetas de los botones de radio */
    .custom-radio label {
        font-size: 1.5rem;
        /* Aumenta el tamaño de la fuente */
        font-weight: bold;
        /* Negrita para mayor énfasis */
        cursor: pointer;
        /* Cambia el cursor a mano al pasar sobre el texto */
        display: inline-block;
    }

    /* Estilo para el contenedor del título */
    .container h3 {
        font-size: 1.75rem;
        /* Tamaño del texto del título */
        margin-bottom: 1rem;
    }


    .custom-radio {
        display: inline;
        margin-left: 20px !important;
        background: #007bff;
        color: white;
        font-size: 30px;
        border-radius: 30px;
        padding-right: 30px;
    }

    .custom-radio {
        display: inline-block;
        padding: 5px 20px;
        margin: 5px;
        border-radius: 25px;
        cursor: pointer;
        background-color: #3c6e77;
        color: white;
    }

    .custom-radio.selected {
        background-color: #007bff;
    }

    .modal-dialog {
        width: 100% !important;
        max-width: none !important;
        margin: 0 !important;
    }

    .modal-content {
        width: 100% !important;
        height: 100% !important;
    }



    .btn-stack {
        position: absolute;
        top: 10px;
        right: 5px;
        display: flex;
        flex-direction: column;
    }

    .btn-stack .btn {
        margin-bottom: 5px;
    }

    .btn.active {
        background-color: #007bff;
        color: white;
    }

    .btn-stack {
        margin: 25px 20px 0px 0px;
        border-radius: 15px;
        border: 1px solid #999999;
        padding: 3px 14px 0px 14px;
    }

    button.btn.btn-outline-primary {
        background: black;
        color: white;
        border: 1px solid white;
        margin-bottom: 12px !important;
        padding: 10px 20px;
        font-size: 23px
    }

    .btn.active,
    .btn:active {
        background: #00a226 !important;
    }

    .btn-duo {
        POSITION: fixed;
        right: 25px;
        top: 585px !important;
        border: 1px solid #999999;
        padding: 3px 0px 10px 0px;
        border-radius: 15px;
    }

    .btn-duo .btn {
        margin: 0 10px;
        padding: 10px 20px;
        font-size: 23px;
        background: black;
        color: white;
        border: 1px solid white;
        font-weight: bold;
    }

    .btn-duo .btn.active {
        background-color: #00a226;
        color: white;
    }




    .fieldset-lote {
        border: 1px solid #ccc;
        padding: 10px;
        width: 270px;
        margin: 20px auto;
        border-radius: 5px;
        position: relative;
    }

    .fieldset-lote legend {
        font-size: 23px;
        color: #999999;
        padding: 0 10px;
        text-align: center;
        width: auto;
        margin: 0 auto;
    }

    .fieldset-lote .btn-duo {
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }

    .fieldset-lote .btn-duo .btn {
        margin: 0 10px;
        padding: 10px 20px;
        font-size: 23px;
        background: black;
        color: white;
        border: 1px solid white;
        font-weight: bold;
    }

    .fieldset-lote .btn-duo .btn.active {
        background-color: #00a226;
        color: white;
    }


    .btn-duo {
        position: fixed;
        right: 25px;
        top: 550px;
        border: 1px solid #999999;
        padding: 3px 0px 10px 0px;
        border-radius: 15px;
    }

    .btn-duo .btn {
        margin: 0 10px;
        padding: 10px 20px;
        font-size: 23px;
        background: black;
        color: white;
        border: 1px solid white;
        font-weight: bold;
    }

    .btn-duo .btn.active {
        background-color: #00a226;
        color: white;
    }


    .btn-lote-container {
        position: fixed;
        right: 25px;
        top: 550px;
        border: 1px solid #999999;
        padding: 3px 0px 10px 0px;
        border-radius: 15px;
    }

    .btn-lote-container .btn {
        margin: 0 10px;
        padding: 10px 20px;
        font-size: 23px;
        background: black;
        color: white;
        border: 1px solid white;
        font-weight: bold;
    }

    .btn-lote-container .btn.active {
        background-color: #00a226;
        color: white;
    }


    table#tablaIngresoMasivoPv {
        background: white !important;
    }


    .form-select {
        width: 200px;
        margin-top: -25px;
        margin-left: 400px;
    }

    .new-column-header {
        background: black;
        color: white;
    }

    .new-column-cell {
        /* No establecemos ningún fondo ni color especial aquí */
    }

    .btn.active,
    .btn:active {
        background: #fe9e23 !important;
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Administrar productos
        </h1>
        <center>
            <div class="btn-group btn-group btn-group-toggle shadow-lg" data-toggle="buttons" style="background: white;color: #0086d4; border-radius: 0px; font-weight: 800; border: 7px solid #1d23402e;">
                <label class="btn btn-secondary " onclick="redireccionar('almacenes')">
                    <input type="radio" name="options" id="option2" autocomplete="off"> Almacenes
                </label>
                <label class="btn btn-secondary" onclick="redireccionar('categorias')">
                    <input type="radio" name="options" id="option2" autocomplete="off"> Categorías
                </label>
                <label class="btn btn-secondary" onclick="redireccionar('datos-maestros-de-productos')">
                    <input type="radio" name="options" id="option2" autocomplete="off"> Datos maestros productos
                </label>
                <label class="btn btn-secondary" onclick="redireccionar('file-the-control-inventory')">
                    <input type="radio" name="options" id="option2" autocomplete="off"> File para el control de códigos
                </label>
                <label style="background: #1d2340;color: white !important" class="btn btn-secondary active" onclick="redireccionar('productos')">
                    <input type="radio" name="options" id="option2" autocomplete="off" checked><i class="fa fa-search" aria-hidden="true"></i> Stock de Productos
                </label>
                <label class="btn btn-secondary" onclick="redireccionar('servicesadm')">
                    <input type="radio" name="options" id="option2" autocomplete="off" checked> Servicios
                </label>
            </div>
        </center>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Administrar productos</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">  
            <div class="box-header with-border">
                <button class="btn btn btn-primary" id="openModalAgregarProduct" data-toggle="modal">
                    <i class="fa fa-chevron-right" aria-hidden="true"></i> Agregar stock de productos 
                </button>
                <!-- <button class="btn btn btn-secondary" id="openModalAgregarProduct" data-toggle="modal" data-target="#modalAgregarProductu" onclick="openModalAndFullscreen()">
                    <i class="fa fa-chevron-right" aria-hidden="true"></i> Gestión de mercadería
                </button> -->


                <img src="vistas/img/iconos/dowloadExcelfile.png" style="width: 40px;float: right;" title="Descargar disponibilidad de stock por producto" id="imgDowloadExcel"><span id="reporteDowload"></span>
                <div id="cargandoespeb" class="d-none" style="color: #63a03c;float: right;">
                    <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
                </div>
            </div>

            <div class="box-body table-responsive">
                <!-- Nav pills para las opciones -->
                <ul class="nav nav-pills">
                    <li class="active"><a data-toggle="pill" href="#venta">Productos disponibles para la venta</a></li>
                    <li><a data-toggle="pill" href="#inventario">Existencias por almacén y productos</a></li>
                    <li><a data-toggle="pill" href="#kardeable">KARDEX</a></li>
                    <li><a data-toggle="pill" href="#existencias_de_datos">Existencias de datos maestros</a></li>
                </ul>

                <!-- Tab content para las opciones -->
                <div class="tab-content">
                    <div id="venta" class="tab-pane fade in active">
                        <!-- --------------------------------------------------------------------------------------------------------------------------- -->
                        <div class="main">
                            <div class="form-group has-feedback has-search">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                <input type="search" class="form-control" placeholder="Buscar" id="inpBuscadoris">
                            </div>
                        </div>
                        <table id="tblStock" class="table table-bordered table-striped dt-responsive tablaProduct">
                            <thead>
                                <tr>
                                    <th style="width:20px !important">Código&nbsp;&nbsp;de&nbsp;&nbsp;barra</th>
                                    <th>Imagen</th>
                                    <th>Producto</th>
                                    <th>Categoría</th>
                                    <th>Almacén</th>
                                    <th style="width: 100px !important">Stock</th>
                                    <th>Precio de compra</th>
                                    <th>Precio de venta</th>
                                    <th>Agregado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="main_avz_prestaciones">
                                <?php
                                #FROM PROVEEDORES 
                                $tblProduc = "SELECT *, 
                                        (SELECT tipo_moneda_compra FROM `kardex` where codigo=bar_code and fk_almacen='1' ORDER BY fecha_kardex DESC LIMIT 1) tipcomp, 
                                        (SELECT tipo_moneda_venta FROM `kardex` where codigo=bar_code and fk_almacen='1' ORDER BY fecha_kardex DESC LIMIT 1) tipventa 
                                        FROM productos AS A INNER JOIN categorias AS B ON A.id_categoria=B.id INNER JOIN datos_maestros_productos AS C ON A.fk_dm_productos=C.id WHERE stock>'0' ORDER BY nombre_producto DESC";
                                $result = $conexion->query($tblProduc);
                                $idcount = 0;
                                while ($rowt = mysqli_fetch_row($result)) {
                                    $idcount = $idcount + 1;
                                    $idprodc = $rowt[0];
                                    $hora_reg_tro = (new DateTime($rowt[9]))->add(new DateInterval('PT120M'))->format('Y-m-d H:i:s');

                                    $tipomonedacompra="";
                                    $tipomonedaventa="";

                                    if($rowt[25]=='dolares'){
                                        $tipomonedacompra="$";
                                    }elseif($rowt[25]=='soles'){
                                        $tipomonedacompra="S/";
                                    }   

                                    if($rowt[26]=='dolares'){
                                        $tipomonedaventa="$";
                                    }elseif($rowt[26]=='soles'){
                                        $tipomonedaventa="S/";
                                    }

                                    echo "<tr>
                                                  <td>{$rowt[2]}</td>
                                                  <td><img src='{$rowt[4]}'></td>
                                                  <td>{$rowt[3]} | {$rowt[18]} |</td>
                                                  <td>{$rowt[20]}</td>
                                                  <td>CECENTRA</td>
                                                  <td ><div class='stock' id='{$idcount}' style='width: 70px !important'>{$rowt[5]}</div></td>
                                                  <td> {$tipomonedacompra} {$rowt[6]}</td>
                                                  <td class='letraNegra'> {$tipomonedaventa} {$rowt[7]}</td>
                                                  <td>{$hora_reg_tro}</td>
                                                  <td>
                                                      <div class='btn-group'>
                                                          <button class='btn btn-warning btnEditarProducto' idproducto='$rowt[0]' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button>
                                                      </div>
                                                  </td>
                                              </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <!-- ---------------------------------------------------------------------------------------------------------------------------------------------- -->
                        <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" class="perfilUsuario">
                    </div>
                    <div id="kardeable" class="tab-pane fade">
                        <div class="container-fluid">
                            <table id="tablota" class="table table-bordered table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Código de barra</th>
                                        <th>Producto</th>
                                        <th>Almacén</th>
                                        <th>Stock</th>
                                        <th>Precio de compra</th>
                                        <th>Precio de venta</th>
                                        <th>Fecha Kardex</th>
                                        <th>Movimiento</th>
                                        <th>Usuario que registra</th>
                                        <th>Lote</th>
                                        <th>Serie comprobante compra</th>
                                        <th>Correlativo comprobante compra</th>
                                        <th>Documento identidad</th>
                                    </tr>
                                </thead>
                                <tbody id="cuerpato">
                                    <!-- PHP code to output rows goes here -->
                                    <?php
                                    $tblProducd = "SELECT a.*,b.almacen,
                                                    (SELECT tipo_moneda_compra FROM `kardex` where codigo=codigo and fk_almacen=a.fk_almacen ORDER BY fecha_kardex DESC LIMIT 1) tipcomp, 
                                                    (SELECT tipo_moneda_venta FROM `kardex` where codigo=codigo and fk_almacen=a.fk_almacen ORDER BY fecha_kardex DESC LIMIT 1) tipventa 
                                                        FROM `kardex` as a inner join almacenes as b on a.fk_almacen=b.id where a.stock <>0 order by b.almacen,a.codigo,a.lote,fecha_kardex";
                                    $resultd = $conexion->query($tblProducd);
                                    $idcount = 0;
                                    while ($rowt = mysqli_fetch_row($resultd)) {
                                        $idcount = $idcount + 1;
                                        $stock = $rowt[5];
                                        $fecha_kardex = $rowt[9];
                                        $display_fecha_kardex = ($stock < 0) ? "SALIDA MASIVA ALMACEN" : $fecha_kardex;

                                        $tipomonedacomprad="";
                                        $tipomonedaventad="";
    
                                        if($rowt[22]=='dolares'){
                                            $tipomonedacomprad="$";
                                        }elseif($rowt[22]=='soles'){
                                            $tipomonedacomprad="S/";
                                        }   
    
                                        if($rowt[23]=='dolares'){
                                            $tipomonedaventad="$";
                                        }elseif($rowt[23]=='soles'){
                                            $tipomonedaventad="S/";
                                        }


                                        echo "<tr>
                                        <td>{$rowt[2]}</td>
                                        <td>{$rowt[3]}</td>
                                        <td>{$rowt[21]}</td>
                                        <td><div class='stockB2' id='{$idcount}' style='width: 70px !important'>{$rowt[5]}</div></td>
                                        <td>{$tipomonedacomprad} {$rowt[6]}</td>
                                        <td>{$tipomonedaventad}  {$rowt[7]}</td>
                                        <td>{$rowt[11]}</td>
                                        <td>{$rowt[12]}</td>
                                        <td>{$rowt[13]}</td>
                                        <td>{$rowt[16]}</td>
                                        <td>{$rowt[17]}</td>
                                        <td>{$rowt[18]}</td>
                                        <td>{$rowt[19]}</td>
                                    </tr>";
                                    } 
                                    ?>
                                </tbody> 
                            </table>

                        </div>
                    </div>
                    <div id="inventario" class="tab-pane fade">
                        <!-- Contenido para Inventario general consolidado -->
                        <!-- Aquí va el contenido específico para la opción de inventario -->
                        <div class="container-fluid">
                            <div class="table-responsive">

                                <br>



                                <table id="tblStockB" class="table table-bordered table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th style="width:20px !important">Código&nbsp;&nbsp;de&nbsp;&nbsp;barra</th>
                                            <th>Imagen*</th>
                                            <th>Producto</th>
                                            <th>Categoría</th>
                                            <th>Almacén*</th> <!-- Columna Almacén añadida -->
                                            <th style="width: 100px;">Stock</th>
                                            <th>Precio de compra</th>
                                            <th>Precio de venta</th>
                                            <th>Agregado</th>

                                        </tr>
                                    </thead>
                                    <tbody id="main_avz_prestacionesfull">
                                        <!-- PHP code to output rows goes here -->
                                        <?php
                                        #FROM PROVEEDORES
                                        $tblProducd = "SELECT *, 
                                        (SELECT tipo_moneda_compra FROM `kardex` where codigo=bar_code and fk_almacen=A.fk_almacen ORDER BY fecha_kardex DESC LIMIT 1) tipcomp, 
                                        (SELECT tipo_moneda_venta FROM `kardex` where codigo=bar_code and fk_almacen=A.fk_almacen ORDER BY fecha_kardex DESC LIMIT 1) tipventa 
                                     FROM productos_ingresos AS A 
                                      INNER JOIN categorias AS B ON A.id_categoria=B.id 
                                      INNER JOIN datos_maestros_productos AS C ON A.fk_dm_productos=C.id 
                                      INNER JOIN almacenes as q ON A.fk_almacen=q.id WHERE stock>'0' 
                                      UNION ALL
                                      SELECT *,
                                      (SELECT tipo_moneda_compra FROM `kardex` where codigo=bar_code and fk_almacen=A.fk_almacen ORDER BY fecha_kardex DESC LIMIT 1) tipcomp, 
                                        (SELECT tipo_moneda_venta FROM `kardex` where codigo=bar_code and fk_almacen=A.fk_almacen ORDER BY fecha_kardex DESC LIMIT 1) tipventa 
                                     FROM productos AS A INNER JOIN categorias AS B ON A.id_categoria=B.id 
                                      INNER JOIN datos_maestros_productos AS C ON A.fk_dm_productos=C.id  
                                      INNER JOIN almacenes as q ON A.fk_almacen=q.id
                                      WHERE stock>'0'
                                      ORDER BY bar_code
                                                          ";
                                        $resultd = $conexion->query($tblProducd);
                                        $idcount = 0;
                                        while ($rowt = mysqli_fetch_row($resultd)) {
                                            $idcount = $idcount + 1;
                                            $idprodc = $rowt[0];
                                            $hora_reg_tro = (new DateTime($rowt[9]))->add(new DateInterval('PT120M'))->format('Y-m-d H:i:s');

                                            $tipomonedacomprade="";
                                            $tipomonedaventade="";
        
                                            if($rowt[30]=='dolares'){
                                                $tipomonedacomprade="$";
                                            }elseif($rowt[30]=='soles'){
                                                $tipomonedacomprade="S/";
                                            }   
        
                                            if($rowt[31]=='dolares'){
                                                $tipomonedaventade="$";
                                            }elseif($rowt[31]=='soles'){
                                                $tipomonedaventade="S/";
                                            }

                                            echo "<tr>
                                                  <td>{$rowt[2]}</td>
                                                  <td><img src='{$rowt[4]}'></td>
                                                  <td>{$rowt[3]} </td>
                                                  <td>{$rowt[20]}</td>
                                                  <td>{$rowt[26]}</td>
                                                  <td ><div class='stockB' id='{$idcount}' style='width: 70px !important'>{$rowt[5]}</div></td>
                                                  <td>{$tipomonedacomprade} {$rowt[6]}</td>
                                                  <td class='letraNegra'>{$tipomonedaventade} {$rowt[7]}</td>
                                                  <td>{$hora_reg_tro}</td>
                                                
                                              </tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>


                    <!-- ================================= MODAL PA CONTRASTE EXISTENCIA Y ORDENES =========================================== -->
                    <div id="orderModal" class="modal" style="display:none;">
                        <div class="modal-content" style="width: 100%; height: 100vh; overflow: auto;">
                            <span class="close">&times;</span>
                            <h2>Añadir ordenes</h2>
                            <input type="text" id="orderName" placeholder="Nombre del Pedido" style='background: black; color : white; width : 200px;'>
                            <textarea id="orderTextarea" placeholder="Pega aquí los datos de Excel"></textarea>
                            <button id="processButton" class="btn btn-primary">PROCESAR</button>
                        </div>
                    </div>

                    <!-- =========================================================================================== -->

                    <div id="existencias_de_datos" class="tab-pane fade">
                        <div class="container-fluid">

                            <div class="table-responsive">
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                <!-- <a id='linkCartaInterna' href="/controladores/pdf.controlador.php?deque=pdf_carta" target='_blank'>
                                    <button style='background: red; color: white; border: 1px solid transparent; border-radius: 4px'><img src="https://static.vecteezy.com/system/resources/previews/017/178/030/non_2x/pdf-file-icon-with-transparent-background-free-png.png" style='width: 30px' alt=""> Carta Interna</button>
                                 </a>
                                 <a id='linkCartaPublica' href="/controladores/pdf.controlador.php?deque=pdf_carta_inventario" target='_blank'>
                                    <button style='background: red; color: white; border: 1px solid transparent; border-radius: 4px'><img src="https://static.vecteezy.com/system/resources/previews/017/178/030/non_2x/pdf-file-icon-with-transparent-background-free-png.png" style='width: 30px' alt=""> Carta Pública</button>
                                 </a> -->
                                <table id="tblStockC" class="table table-bordered table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>
                                                <button id="exportButton" class="btn btn-primary" style="margin-bottom: 10px;display: none">Exportar a Excel</button>
                                                <input type="text" id="productSearchcode" placeholder="Buscar Producto" onkeyup="searchProduct2()" style="margin-top: 1px;;margin-bottom: 6.3px;background: black !important; color : white !important;   height: 100% !important; width: 100%;">
                                            </th>
                                            <th>
                                                <select id="padreSelect" onchange="filterTable()">
                                                    <option value="">Mostrar todo</option>
                                                    <?php
                                                    $queryPadres = "SELECT padre FROM datos_maestros_productos GROUP BY padre ORDER BY padre";
                                                    $resultPadres = $conexion->query($queryPadres);
                                                    while ($row = mysqli_fetch_assoc($resultPadres)) {
                                                        echo "<option value='{$row['padre']}'>{$row['padre']}</option>";
                                                    }
                                                    ?>
                                                </select>

                                            </th>
                                            <th style='padding: 0px !important;'>
                                                <!-- Campo de búsqueda -->
                                                <input type="text" id="productSearch" placeholder="Buscar Producto" onkeyup="searchProduct()" style="margin-top: 1px;;margin-bottom: 6.3px;background: black !important; color : white !important;   height: 100% !important; width: 100%;">
                                            </th>
                                            <th colspan='5'>

                                            </th>
                                            <th colspan='2' style='text-align: center;'>
                                                <button id="calculateOrderButton" class="btn btn-secondary" style='color: black !important'>Calcular compra a partir de ordenes y existencias</button>
                                                <button onclick="downloadTableAsExcel()" style='color: black !important'>Descargar CRUCE</button>

                                            </th>

                                        </tr>
                                        <tr>
                                            <th style="width:20px !important">Código&nbsp;&nbsp;de&nbsp;&nbsp;barra</th>
                                            <th>Categoría</th>
                                            <th>
                                                <p style='width: 200px !important;'>Producto</p>
                                            </th>
                                            <th>CECENTRA</th>
                                            <th>INSUMOS_HOME</th>
                                            <th>INSUMOS_COLECTORA</th>
                                            <th>Total Stock</th>
                                        </tr>
                                    </thead>
                                    <tbody id="main_avz_prestacionesfullc">
                                        <!-- PHP code to output rows goes here -->
                                        <?php
                                        $query = "
                                        SELECT 
    id, 
    nombre_producto, 
    descripccion, 
    bar_code, 
    fecha, 
    estado, 
    padre, -- Esta columna ahora contendrá la categoría
    SUM(CECENTRA) AS CECENTRA,
    SUM(INSUMOS_HOME) AS INSUMOS_HOME,
    SUM(INSUMOS_COLECTORA) AS INSUMOS_COLECTORA,
    SUM(stock) AS total_stock
FROM (
    -- Primera subconsulta: productos_ingresos (pi)
    SELECT 
        p.id, 
        UPPER(TRIM(p.nombre_producto)) AS nombre_producto, 
        UPPER(TRIM(p.descripccion)) AS descripccion, 
        p.fecha, 
        p.estado, 
        UPPER(TRIM(p.bar_code)) AS bar_code, 
        c.categoria AS padre, -- Asignamos 'categoria' a 'padre' directamente
        CASE WHEN pi.fk_almacen = 1 THEN pi.stock ELSE 0 END AS CECENTRA,
        CASE WHEN pi.fk_almacen = 2 THEN pi.stock ELSE 0 END AS INSUMOS_HOME,
        CASE WHEN pi.fk_almacen = 5 THEN pi.stock ELSE 0 END AS INSUMOS_COLECTORA,
        pi.stock AS stock 
    FROM 
        datos_maestros_productos AS p
    LEFT JOIN 
        productos_ingresos AS pi ON p.id = pi.fk_dm_productos
    INNER JOIN 
        categorias AS c ON c.id = pi.id_categoria -- Cambio a INNER JOIN
            
    UNION ALL
        
    -- Segunda subconsulta: productos (ps)
    SELECT 
        p.id, 
        UPPER(TRIM(p.nombre_producto)) AS nombre_producto, 
        UPPER(TRIM(p.descripccion)) AS descripccion,
        p.fecha, 
        p.estado, 
        UPPER(TRIM(p.bar_code)) AS bar_code, 
        c.categoria AS padre, -- Asignamos 'categoria' a 'padre' directamente
        CASE WHEN ps.fk_almacen = 1 THEN ps.stock ELSE 0 END AS CECENTRA,
        CASE WHEN ps.fk_almacen = 2 THEN ps.stock ELSE 0 END AS INSUMOS_HOME,
        CASE WHEN ps.fk_almacen = 5 THEN ps.stock ELSE 0 END AS INSUMOS_COLECTORA,
        ps.stock AS stock 
    FROM 
        datos_maestros_productos AS p
    LEFT JOIN 
        productos AS ps ON p.id = ps.fk_dm_productos
    INNER JOIN 
        categorias AS c ON c.id = ps.id_categoria -- Cambio a INNER JOIN
) AS combined
GROUP BY 
    id, 
    nombre_producto, 
    descripccion, 
    fecha, 
    estado, 
    bar_code, 
    UPPER(padre)
ORDER BY 
    padre, bar_code
                                    
                                  
                                      ";
                                        $result = $conexion->query($query);
                                        $idcount = 0;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $idcount++;
                                            $idprodc = $row['id'];
                                            $hora_reg_tro = (new DateTime($row['fecha']))->add(new DateInterval('PT120M'))->format('Y-m-d H:i:s');
                                            $ppapi=strtoupper($row['padre']);

                                            echo "<tr>
                                              <td>{$row['bar_code']}</td>
                                              <td>{$ppapi}</td>
                                              <td>{$row['nombre_producto']}</td>
                                              
                                              <td>{$row['CECENTRA']}</td>
                                              <td>{$row['INSUMOS_HOME']}</td>
                                              <td>{$row['INSUMOS_COLECTORA']}</td>
                                              <td style='background: #fdfd96 ;'><div class='stockB' id='{$idcount}' style='width: 70px !important'><b>{$row['total_stock']}</b></div></td>
                                          </tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
</div>

<!-- Aquí sigue el resto del código, incluyendo modales y scripts -->

<!--=====================================

MODAL AGREGAR PRODUCTO

======================================-->



<div id="modalAgregarProductu" class="modal fade" role="dialog">
    <div class="modal-dialog" style=' width: 90% !important;'>
        <div class="col-lg-8 form-group">

            <div class="modal-content">
                <!-- <form  method="post" enctype="multipart/form-data" autocomplete="false" id="formNewPro"> -->
                <form method="POST" autocomplete="false" name="namefor" autocomplete="false" id="formNewPro" enctype="multipart/form-data">

                    <!--=====================================
                    CABEZA DEL MODAL
                    ======================================-->

                    <div class="modal-header" style="background:#3c8dbc; color:white">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-chevron-right" aria-hidden="true"></i> PISTOLEAR PRODUCTOS</h4>
                    </div>



                    <!--=====================================
                    CUERPO DEL MODAL
                    ======================================-->



                    <div class="modal-body">
                        <div class="box-body">

                            <!-- ENTRADA PARA EL CÓDIGO -->

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-code"></i></span>
                                    <!-- <input type="text" class="form-control input-lg" id="nuevoCodigo" placeholder="Scanear código" required> -->
                                    <input type="text" class="form-control input-lg" id="nuevoCodigo" nuevoCodigo="nuevoCodigo" placeholder="Scanear código" autocomplete="off" autofocus required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <!-- FK DM PRODUCTOS -->
                                    <input type="text" id="fk_dm_productos" class="desaparece">
                                    <!-- ENTRADA PARA Nombre Producto -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span data-toggle="tooltip" data-placement="bottom" title="Puede dar clic a este icono para agregar un nuevo elemnto a la lista" onclick="redireccionar('datos-maestros-de-productos')" class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                                            <input type="text" class="form-control input-lg" id="nuevaDescripcion" placeholder="Nombre Producto" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <!-- ENTRADA PARA Nombre Producto -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span data-toggle="tooltip" data-placement="bottom" title="Puede dar clic a este icono para agregar un nuevo elemnto a la lista" onclick="redireccionar('datos-maestros-de-productos')" class="input-group-addon"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control input-lg" id="nombProduct" placeholder="Capacidad de almacenamiento" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-7">
                                    <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span onclick="redireccionar('categorias')" class="input-group-addon"><i class="fa fa-th"></i></span>
                                            <select class="form-control input-lg" id="nuevaCategoria" name="nuevaCategoria" required>
                                                <option value="" disabled>Seleccionar una categoría</option>
                                                <?php
                                                $tblProdCatg = "SELECT * FROM `categorias` WHERE categoria <> 'Bolsas'";
                                                $resultCtg = $conexion->query($tblProdCatg);
                                                while ($rowt = mysqli_fetch_row($resultCtg)) {
                                                    $selected = ($rowt[0] == 8) ? 'selected' : '';
                                                    echo '<option value="' . $rowt[0] . '" ' . $selected . '>' . $rowt[1] . '</option>';
                                                }
                                                ?>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <!-- ENTRADA PARA SELECCIONAR alamcen -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span onclick="redireccionar('almacenes')" class="input-group-addon"><i class="fa fa-th"></i></span>
                                            <select class="form-control input-lg" id="nuevaalmacenes" name="nuevaalmacenes" required>
                                                <option value="" selected disabled>Seleccionar una almacen</option>

                                                <?php

                                                #FROM alamcenes

                                                $tblProdCatg = "SELECT * FROM `almacenes` WHERE estado = '1'";
                                                $resultCtg = $conexion->query($tblProdCatg);
                                                while ($rowt = mysqli_fetch_row($resultCtg)) {
                                                    echo '<option value="' . $rowt[0] . '">' . $rowt[1] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>






                            <div class="row">
                                <!-- ENTRADA PARA SERIE DE COMPROBANTE DE COMPRA -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon" title='Comprobante de compra'>Serie de C.C</span>
                                            <input type="text" class="form-control input-lg" id="serieComprobante" name="serieComprobante" oninput="this.value = this.value.toUpperCase()">
                                        </div>
                                    </div>
                                </div>

                                <!-- ENTRADA PARA CORRELATIVO DE COMPROBANTE DE COMPRA -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon" title='Comprobante de compra'>Correlativo de C.C</span>
                                            <input type="text" class="form-control input-lg" id="correlativoComprobante" name="correlativoComprobante">
                                        </div>
                                    </div>
                                </div>

                                <!-- ENTRADA PARA NÚMERO DE DOCUMENTO DE IDENTIDAD DE PROVEEDOR -->
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon" title='Comprobante de compra'>N° Doc. Identidad Proveedor</span>
                                            <input type="text" class="form-control input-lg" id="numDocIdentidadProveedor" name="numDocIdentidadProveedor">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <!-- ENTRADA PARA LOTE -->
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                        <select class="form-control input-lg" name="nuevoLote" id="nuevoLote">
                                            <option value="SINLOTE">SINLOTE</option>
                                            <option value="CONLOTE">CONLOTE</option>
                                        </select>
                                    </div>
                                    <br>
                                </div>





                                <div class="col-md-6">
                                    <!-- ENTRADA PARA STOCK -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-check"></i> STOCK</span>
                                            <input type="number" class="form-control input-lg" id="nuevoStock" value='1' step="any" min="-10000" placeholder="Stock" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 d-none">
                                    <!-- ENTRADA PARA FECHA DE VENCIMIENTO -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                            <label for="nuevaFechaVencimiento">Fecha de Vencimiento</label>
                                            <input value='<?php echo date('Y-m-d'); ?>' type="date" class="form-control input-lg" name='nuevaFechaVencimiento' id="nuevaFechaVencimiento" placeholder="Fecha de vencimiento">
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <!-- ENTRADA PARA PRECIO COMPRA -->
                            <div class="form-group row">
                                <div class="col-xs-12">
                                    <!-- NUEVO INPUT: Tipo de Cambio -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-exchange"></i></span>
                                            <input type="number" class="form-control input-lg" name="tipo_cambio" id="tipo_cambio" placeholder="Tipo de Cambio" step="0.01" min="0" required>
                                        </div>
                                    </div>
                                    <!-- ENTRADA PARA PRECIO COMPRA -->
                                </div>
                            </div>



                            <!-- ENTRADA PARA PRECIO COMPRA -->
                            <div class="form-group row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                            <select name="tipo_moneda_compra" id="tipo_moneda_compra" class="form-control input-lg" required>
                                                <option value="" selected disabled>Seleccionar tipo de moneda de compra</option>
                                                <option value="soles">Soles</option>
                                                <option value="dolares">Dólares</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                                        <input type="number" class="form-control input-lg" id="nuevoPrecioCompra" name="nuevoPrecioCompra" value='0' step="any" min="0" placeholder="Precio de compra" required>
                                    </div>
                                </div>



                                <!-- ENTRADA PARA PRECIO VENTA -->
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                            <select name="tipo_moneda_venta" id="tipo_moneda_venta" class="form-control input-lg" required>
                                                <option value="" selected disabled>Seleccionar tipo de moneda de venta</option>
                                                <option value="soles">Soles</option>
                                                <option value="dolares">Dólares</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
                                        <input type="number" class="form-control input-lg" id="nuevoPrecioVenta" name="nuevoPrecioVenta" value='0' step="any" min="0" placeholder="Precio de venta" required>
                                    </div>
                                    <br>        
                                    <!-- Nuevos radio buttons para elegir entre alza y baja -->
                                    <div class="form-group">
                                        <label>Aplicar porcentaje para:</label>
                                        <div>
                                            <input type="radio" id="porcentajeAlza" name="tipoPorcentaje" value="alza" checked>
                                            <label for="porcentajeAlza">Aumentar Precio</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="porcentajeBaja" name="tipoPorcentaje" value="baja">
                                            <label for="porcentajeBaja">Disminuir Precio</label>
                                        </div>
                                    </div>
                                      <hr>          
                                    <!-- CHECKBOX PARA PORCENTAJE -->
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>
                                                <input type="checkbox" class="minimal porcentaje" checked>
                                                Utilizar procentaje
                                            </label>
                                        </div>
                                    </div>



                                    <!-- ENTRADA PARA PORCENTAJE -->
                                    <div class="col-xs-6" style="padding:0">
                                        <div class="input-group">
                                            <input type="number" class="form-control input-lg nuevoPorcentaje" step="any" min="0" value="40" id="porcentajeRi" required>
                                            <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                        </div>
                                    </div>

                                </div>
                            </div>



                            <!-- ENTRADA PARA SUBIR FOTO -->



                            <!--    <div class="form-group">
    
    
    
                  <div class="panel">SUBIR IMAGEN</div>
            
            
            
                        <input type="file" class="nuevaImagen" name="nuevaImagen">
            
            
            
                        <p class="help-block">Peso máximo de la imagen 2MB</p>
            
            
            
                        <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
            
            
            
                        </div> -->

                            <div class="container mt-12">

                                <div class="custom-radio" onclick="selectRadio('ingresot')">
                                    <input type="radio" id="ingresot" name="movimientot" value="ingresot">
                                    <label for="ingresot" style="font-size: 22px !important">Ingreso</label>
                                </div>
                                <div class="custom-radio" onclick="selectRadio('salidat')">
                                    <input type="radio" id="salidat" name="movimientot" value="salidat">
                                    <label for="salidat" style="font-size: 22px !important">Salida</label>
                                </div>
                            </div>

                        </div>






                    </div>



                    <!--=====================================
    
                    PIE DEL MODAL
            
                    ======================================-->



                    <div class="modal-footer">

                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                        <button type="submit" class="btn btn-primary d-none" id="btnSave">Guardar producto</button>
                        <div id="alertForm2"></div>
                    </div>


                </form>



                <?php

                $crearProducto = new ControladorProductos();

                $crearProducto->ctrCrearProducto();

                ?>



            </div>
        </div>
        <div class="col-lg-4 form-group">
            <input type="text" id="buscarProducto" placeholder="Buscar producto...">
            <table id="tabla_datos_maestros" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID*</th>
                        <th>Nombre</th>
                        <th>Capacidad</th>
                        <th>Codigo</th>
                        <th>fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Los registros se insertarán aquí mediante JavaScript -->
                </tbody>
            </table>
        </div>
    </div>

</div>

</div>







<!--=====================================

MODAL EDITAR PRODUCTO

======================================-->



<div id="modalEditarProducto" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data" id="_editarProduct">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar producto</h4>
                </div>



                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->



                <div class="modal-body">
                    <div class="box-body">
                        <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                <select class="form-control input-lg" name="editarCategoria" readonly required>
                                    <option id="editarCategoria"></option>
                                </select>
                            </div>
                        </div>



                        <!-- ENTRADA PARA EL CÓDIGO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-code"></i></span>
                                <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo" readonly required>
                            </div>
                        </div>



                        <!-- ENTRADA PARA LA DESCRIPCIÓN -->



                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                                <input type="text" class="form-control input-lg" id="editarDescripcion" name="editarDescripcion" readonly required>
                            </div>
                        </div>



                        <!-- ENTRADA PARA STOCK -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                <input type="number" class="form-control input-lg" id="editarStock" name="editarStock" step="any" min="0" readonly required>
                            </div>
                        </div>



                        <!-- ENTRADA PARA PRECIO COMPRA -->
                        <div class="form-group row">
                            <div class="col-xs-6" data-toggle="tooltip" data-placement="top" title="Precio Compra">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                                    <input type="number" class="form-control input-lg" id="editarPrecioCompra" name="editarPrecioCompra" step="any" min="0" required>
                                </div>
                            </div>



                            <!-- ENTRADA PARA PRECIO VENTA -->



                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
                                    <input type="number" class="form-control input-lg" id="editarPrecioVenta" name="editarPrecioVenta" step="any" min="0" required>
                                </div>
                                <br>



                                <!-- CHECKBOX PARA PORCENTAJE -->
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>
                                            <!-- <input type="checkbox" class="minimal porcentaje"  checked> -->
                                            Utilizar procentaje
                                        </label>
                                    </div>
                                </div>



                                <!-- ENTRADA PARA PORCENTAJE -->
                                <div class="col-xs-6" style="padding:0">
                                    <div class="input-group">
                                        <input type="number" class="form-control input-lg nuevoPorcentaje" step="any" min="0" value="40" required readonly>
                                        <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- ENTRADA PARA SUBIR FOTO -->
                        <div class="form-group">
                            <div class="panel">SUBIR IMAGEN</div>
                            <input type="file" class="nuevaImagen" name="editarImagen">
                            <p class="help-block">Peso máximo de la imagen 2MB</p>
                            <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                            <input type="hidden" name="imagenActual" id="imagenActual">
                        </div>
                    </div>
                </div>



                <!--=====================================
        PIE DEL MODAL
        ======================================-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>



            <?php

            $editarProducto = new ControladorProductos();
            $editarProducto->ctrEditarProducto();

            ?>
        </div>
    </div>
</div>



<!--=====================================
MODAL ingresoAlmacen
======================================-->
<div id="ingresoAlmacen" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Almacen</h4>
                </div>


                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
                <div class="modal-body">
                    <div class="box-body">





                        <!-- ENTRADA PARA SELECCIONAR PROVEEDOR -->
                        <div id="documentoEntrada">

                            <div style="cursor:alias;border-radius: 10px;padding: 15px;background: white;border: 1px solid #c3c3c3; ;margin-bottom: 10px;justify-content: center;font-size: 12px; font-weight: 200">
                                <p class="letraNegra">Entrada de producto</p>







                                <?php

                                #FROM PROVEEDORES

                                $query = "SELECT * FROM proveedores ";

                                $result = $conexion->query($query);

                                ?>

                                <div class="form-group">
                                    <div class="input-group" style="border: 1px solid #ff9800;">
                                        <span onclick="redireccionar('proveedores')" class="input-group-addon"><i class="fa fa-address-book"></i></span>
                                        <select id="stprodProveedor" onchange="onChangeSelect('ingalmIdProd','stprodProveedor','stAlmacen','stLote','stFechaVence','stTipoPago','stTipoComprobante','stNumComprobant','ingalmAccion')" class="form-control input-lg" name="stprodProveedor" required>
                                            <option>SELECCIONE PROVEEDOR</option>
                                            <?php
                                            while ($rowt = mysqli_fetch_row($result)) {

                                                echo '<option id="' . $rowt[0] . '">' . $rowt[2] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>


                                <?php
                                #FROM ALMACEN
                                $query = "SELECT * FROM almacenes ";
                                $result = $conexion->query($query);
                                ?>

                                <!-- ENTRADA PARA SELECCIONAR ALMACEN -->

                                <div class="form-group">
                                    <div class="input-group" style="border: 1px solid #ff9800;">
                                        <span class="input-group-addon"><i class="fa fa-th-large"></i></span>
                                        <select id="stAlmacen" onchange="onChangeSelect('ingalmIdProd','stprodProveedor','stAlmacen','stLote','stFechaVence','stTipoPago','stTipoComprobante','stNumComprobant','ingalmAccion')" class="form-control input-lg" name="stAlmacen" required>
                                            <option>SELECCIONE ALMACEN</option>
                                            <?php
                                            while ($rowt = mysqli_fetch_row($result)) {

                                                echo '<option id="' . $rowt[0] . '" >' . $rowt[1] . '</option>';
                                            }

                                            ?>

                                        </select>
                                    </div>
                                </div>





                                <!-- ENTRADA PARA SELECCIONAR LOTE -->
                                <div class="form-group">
                                    <div class="input-group" style="border: 1px solid #ff9800;">
                                        <span class="input-group-addon">Lote</span>
                                        <input onchange="onChangeSelect('ingalmIdProd','stprodProveedor','stAlmacen','stLote','stFechaVence','stTipoPago','stTipoComprobante','stNumComprobant','ingalmAccion')"
                                            type="text" class="form-control input-lg" id="stLote" name="stLote">
                                    </div>
                                </div>



                                <!-- ENTRADA PARA LA FECHA VENCIMIENTO -->
                                <div class="form-group" data-toggle="tooltip" data-placement="top" title="Fecha de vencimiento">
                                    <div class="input-group" style="border: 1px solid #ff9800;">
                                        <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                                        <input onchange="onChangeSelect('ingalmIdProd','stprodProveedor','stAlmacen','stLote','stFechaVence','stTipoPago','stTipoComprobante','stNumComprobant','ingalmAccion')" type="date" class="form-control input-lg" id="stFechaVence" name="stFechaVence">
                                    </div>
                                </div>



                                <!-- TIPO DE PAGO -->
                                <div class="form-group">
                                    <div class="input-group" style="border: 1px solid #ff9800;">
                                        <span class="input-group-addon"><i class="fa fa-th-large"></i></span>
                                        <select id="stTipoPago" onchange="onChangeSelect('ingalmIdProd','stprodProveedor','stAlmacen','stLote','stFechaVence','stTipoPago','stTipoComprobante','stNumComprobant','ingalmAccion')" class="form-control input-lg" name="stTipoPago" required>
                                            <option>TIPO DE PAGO</option>
                                            <option value="Efectivo">Efectivo</option>
                                            <option value="Tarjeta Crédito">Tarjeta Crédito</option>
                                            <option value="Tarjeta Débito">Tarjeta Débito</option>
                                            <option value="Cheque">Cheque</option>
                                        </select>
                                    </div>
                                </div>



                                <!-- ENTRADA PARA SELECCIONAR TIPO COMPROBANTE -->
                                <div class="form-group">
                                    <div class="input-group" style="border: 1px solid #ff9800;">
                                        <span class="input-group-addon"><i class="fa fa-th-large"></i></span>
                                        <select id="stTipoComprobante" onchange="onChangeSelect('ingalmIdProd','stprodProveedor','stAlmacen','stLote','stFechaVence','stTipoPago','stTipoComprobante','stNumComprobant','ingalmAccion')" class="form-control input-lg" name="stTipoComprobante" required>
                                            <option>TIPO DE COMPROBANTE</option>
                                            <option value="Boleta">Boleta</option>
                                            <option value="Factura">Factura</option>
                                            <option value="Cheque">Cheque</option>
                                            <option value="Recibo por honorario">Recibo por honorario</option>
                                        </select>
                                    </div>
                                </div>



                                <!-- ENTRADA PARA SELECCIONAR LOTE -->
                                <div class="form-group">
                                    <div class="input-group" style="border: 1px solid #ff9800;">
                                        <span class="input-group-addon">N° Comprobante</span>
                                        <input onchange="onChangeSelect('ingalmIdProd','stprodProveedor','stAlmacen','stLote','stFechaVence','stTipoPago','stTipoComprobante','stNumComprobant','ingalmAccion')"
                                            type="text" class="form-control input-lg" id="stNumComprobant" name="stNumComprobant">
                                    </div>
                                </div>
                                <b style="color: #7b9dd4">IDPRO:</b> <input type="text" id="ingalmIdProd" style="font-weight: 900;width: 50px;border: 2px solid white;" readonly>
                                <b style="color: #7b9dd4">ESTADO:</b> <input type="text" id="ingalmAccion" style="font-weight: 900;width: 90px;border: 2px solid white;" readonly>
                            </div>
                            <p id="AcaS"></p>
                        </div>
                    </div>
                </div>



                <!--=====================================
        PIE DEL MODAL
        ======================================-->


                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <!-- <button type="submit" class="btn btn-primary">Guardar cambios</button> -->
                </div>
            </form>


            <?php

            $editarProducto = new ControladorProductos();

            $editarProducto->ctrEditarProducto();

            ?>



        </div>



    </div>



</div>





<div id="modalIngresoMasivoPrevista" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 99%;">
        <div class="modal-content">
            <div class="modal-header" style='background: #5e5e5e !important'>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Gestión masiva de mercadería (PRELISTA)</h4>
                <select id="productSelect" class="form-select" aria-label="Default select example" style="width: 200px;margin-top: -25px; margin-left: 400px"></select>
                <h1 style='color: #00ff00;  font-weight: 100;  font-size: 35px;  margin-right: 20px !important; float: right;    margin-top: -35px;'><span id='miSpanfilero'>0</span> Pistoleos</h1>
            </div>
            <div class="modal-body" style='background: white !important'>
                <div class="btn-stack">
                    <h5 style='color: #999999 !important; font-size: 23px;text-align: center'>ALMACENES</h5>
                    <button class="btn btn-outline-primary" value="CECENTRA">CECENTRA</button>
                    <button class="btn btn-outline-primary" value="COMPRAS_PISO_9">COMPRAS_PISO_9</button>
                    <button class="btn btn-outline-primary" value="COMPRAS_PISO_10">COMPRAS_PISO_10</button>
                    <button class="btn btn-outline-primary" value="COMPRAS_PISO_9.2">COMPRAS_PISO_9.2</button>
                    <button class="btn btn-outline-primary" value="COMPRAS_PISO_4">COMPRAS_PISO_4</button>
                    <button class="btn btn-outline-primary" value="ALMACEN_TRANSITO">ALMACEN_TRANSITO</button>
                </div>
                <div class="btn-duo">
                    <!-- <h5 style='color: #999999 !important; font-size: 23px;text-align: center'>MOVIMIENTO</h5> -->
                    <button class="btn btn-entrada" value="Entrada">Entrada</button>
                    <button class="btn btn-salida" value="Salida">Salida</button>
                    <button class="btn btn-inventario" value="Inventario" style='color: yellow !important;'>Inventario</button>
                </div>

                <div class="btn-lote-container" style='margin-top: 130px !important'>
                    <!-- <h5 style='color: #999999 !important; font-size: 23px;text-align: center'>LOTE</h5> -->
                    <button class="btn btn-lote" value="CONLOTE">CONLOTE</button>
                    <button class="btn btn-lote" value="SINLOTE">SINLOTE</button>
                </div>

                <form id="formIngresoMasivoPv" method="post">
                    <textarea readonly id="pasteAreaPv" class="form-control" style="background-color: black; color: #00ff00; font-size: 25px;" placeholder="Pegue aquí los datos de Excel" rows="21"></textarea>
                    <button type="button" id='btnProcesarDatosUltm' class="btn btn-default" onclick="processDataPv()">Procesar Datos</button>
                    <table class="table table-bordered" id="tablaIngresoMasivoPv">
                        <thead>
                            <tr>
                                <th>CÓDIGO</th>
                                <th>PRODUCTO</th>
                                <th>STOCK</th>
                                <th>ALMACÉN</th>
                                <th>PRECIO DE COMPRA</th>
                                <th>PRECIO DE VENTA SIN IGV</th>
                                <th>CATEGORÍA</th>
                                <th>SERIE DE COMPROBANTE</th>
                                <th>CORRELATIVO DE COMPROBANTE</th>
                                <th>N° DOC. IDENTIDAD PROVEEDOR</th>
                                <th>LOTE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Las filas se agregarán dinámicamente aquí -->
                        </tbody>
                    </table>
                    <button type="submit" id='btnGuardarDatosUltm' class="btn btn-primary">Guardar Datos</button>
                </form>
                <button type="submit" id='descargarenexcelinventary'>Descargar Inventario</button>
            </div>
        </div>
    </div>
</div>



<!-- Modal para Ingreso Masivo de Mercadería -->
<div id="modalIngresoMasivo" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Gestión masiva de mercadería</h4>
            </div>
            <div class="modal-body">
                <form id="formIngresoMasivo" method="post">
                    <textarea id="pasteArea" class="form-control" style="background-color: black; color: white;" placeholder="Pegue aquí los datos de Excel" rows="4"></textarea>
                    <button type="button" class="btn btn-default" onclick="processData()">Procesar Datos</button>
                    <table class="table table-bordered" id="tablaIngresoMasivo">
                        <thead>
                            <tr>
                                <th>CÓDIGO</th>
                                <th>PRODUCTO</th>
                                <th>STOCK</th>
                                <th>ALMACÉN</th>
                                <th>PRECIO DE COMPRA</th>
                                <th>PRECIO DE VENTA SIN IGV</th>
                                <th>CATEGORÍA</th>
                                <th>SERIE DE COMPROBANTE</th>
                                <th>CORRELATIVO DE COMPROBANTE</th>
                                <th>N° DOC. IDENTIDAD PROVEEDOR</th>
                                <th>LOTE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Las filas se agregarán dinámicamente aquí -->
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary">Guardar Datos</button>
                </form>
            </div>
        </div>
    </div>
</div>








<script type="text/javascript">
    // function PulsarTecla(event){/*Acciones al persionar teclas*/switch (tecla = event.keyCode){case 33:location.href="file-the-control-inventory";break;case 36:location.href="almacenes";break;

    // case 27: $('input[type="search"]').val('');break;case 8:$('input[type="search"]').val('');break;}}window.onkeydown=PulsarTecla;







    $(document).ready(function() {
        /*Inicializamos */


        $("#inpBuscadoris").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#main_avz_prestaciones tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });





        $('#tablota').DataTable({
            dom: 'Bfrtip',
            paging: false, // Desactivar la paginación
            buttons: [
                'excelHtml5'
            ],
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });


        // Data table

        var table = $('#tblStockB').DataTable({
            dom: 'Bfrtip',
            paging: false, // Desactivar la paginación
            buttons: [
                'excelHtml5'
            ],
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            pageLength: 600, // Establecer registros iniciales mostrados a 600
            lengthMenu: [
                [600, 1000, 2000, -1],
                [600, 1000, 2000, "Todos"]
            ] // Personalizar opciones de menú
        });




        // Evaluar valor de stock para indicador color

        setTimeout(function() {

            var celdas = document.getElementById("tblStock").getElementsByTagName("td");

            for (var x = 1; x < celdas.length; x++) {



                var txt = document.getElementById(x).innerHTML;

                if (txt <= 20) {

                    document.getElementById(x).style.background = "#dd4b39";

                    document.getElementById(x).style.color = "white";

                } else if (txt > 20 && txt < 50) {

                    document.getElementById(x).style.background = "#eea236";

                    document.getElementById(x).style.color = "white";

                } else {

                    document.getElementById(x).style.background = "#00a65a";

                    document.getElementById(x).style.color = "white";

                }

            }



            var celdasD = document.getElementById("tblStockB").getElementsByTagName("td");

            for (var i = 1; i < celdasD.length; i++) {



                var txtD = document.getElementById(i).innerHTML;

                if (txtD <= 20) {

                    document.getElementById(i).style.background = "#dd4b39";

                    document.getElementById(i).style.color = "white";

                } else if (txtD > 20 && txtD < 50) {

                    document.getElementById(i).style.background = "#eea236";

                    document.getElementById(i).style.color = "white";

                } else {

                    document.getElementById(i).style.background = "#00a65a";

                    document.getElementById(i).style.color = "white";

                }

            }

        }, 1000);



    });



    //REFRESH TABLE ON CLIC al cerrar modal

    function refreshtable() {

        location.reload();

        $('input[type="text"]').val('');

    }

    $(".modal").on('hidden.bs.modal', function() {

        refreshtable();

    });

    $(document).on('click', '#openModalAgregarProduct', function(e) {
        e.preventDefault();
        openModalAndFullscreen();
        $('#modalAgregarProductu').modal('show');
        console.log('click');
        cargarDataCodigo();
    })

    function cargarDataCodigo() {
        var formData = new FormData();
        formData.append('accion', 'cargarData')
        $.ajax({
            url: 'modelos/productos.modelo.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(respuesta) {
                console.log(respuesta);

                // Asegúrate de parsear la respuesta si es una cadena JSON
                try {
                    var datos = JSON.parse(respuesta);
                } catch (error) {
                    console.error('Error al parsear la respuesta JSON:', error);
                    return;
                }
                // Limpiar la tabla antes de agregar nuevas filas
                $('#tabla_datos_maestros tbody').empty();
                // Verificar que los datos existen y no están vacíos
                if (datos && datos.length > 0) {
                    // Iterar sobre los registros
                    $.each(datos, function(index, registro) {
                        var fila = '<tr>' +
                            '<td>' + registro.id + '</td>' +
                            '<td>' + registro.nombre_producto + '</td>' +
                            '<td>' + registro.descripccion + '</td>' +
                            '<td class="bar-code">' + registro.bar_code + '</td>' + // Añadimos la clase para identificar el bar_code
                            '<td>' + registro.fecha + '</td>' +
                            '</tr>';
                        // Agregar la fila a la tabla
                        $('#tabla_datos_maestros tbody').append(fila);
                    });
                } else {
                    console.log('No hay registros para mostrar.');
                }

                // Evento de clic en cualquier <td> del <tr>
                $('#tabla_datos_maestros tbody').on('click', 'tr', function() {
                    // Obtener el valor de <td> que contiene el bar_code
                    var barCode = $(this).find('.bar-code').text(); // Seleccionamos el <td> que contiene el código de barras
                    // Añadir el valor al input con id 'nuevoCodigo'
                    $('#nuevoCodigo').val(barCode);
                    // Simular los eventos de input y change para que reaccione al nuevo valor
                    $('#nuevoCodigo').trigger('input').trigger('change');
                });

                // Funcionalidad de búsqueda
                $('#buscarProducto').on('keyup', function() {
                    var valorBusqueda = $(this).val().toLowerCase(); // Convertir a minúsculas para una búsqueda no sensible a mayúsculas/minúsculas

                    // Filtrar las filas de la tabla
                    $('#tabla_datos_maestros tbody tr').filter(function() {
                        // Mostrar o esconder la fila dependiendo si coincide con la búsqueda
                        $(this).toggle($(this).text().toLowerCase().indexOf(valorBusqueda) > -1);
                    });
                });

            },
            error: function(xhr, status, error) {
                console.error('Error en la solicitud AJAX:', status, error);
            }
        });
    }



    $("#imgDowloadExcel").click(function() {
        $('#cargandoespeb').removeClass('d-none');
        $('#imgDowloadExcel').addClass('d-none');

        // Redirige a la URL que genera y descarga el archivo
        window.location.href = 'controladores/inventario.controlador.php?accion=reportExistenciasDeAlmacenMaestro';

        $('#imgDowloadExcel').removeClass('d-none');
        $('#cargandoespeb').addClass('d-none');

        return false;
    });





    // $('#nuevaCategoria').change(function() {
    //         // Cuando se cambia la selección del dropdown, removemos la propiedad disabled del input
    //         $('#nuevoStock').prop('disabled', false);
    // });



    //LIMPIADOR DE INPUT TEXT CON CARACTERES RAROS
    document.addEventListener('blur', function(e) {
        // Verificar si el evento se disparó desde un input de tipo texto
        if (e.target.tagName === 'INPUT' && e.target.type === 'text') {
            console.log('CUIDADO, EL TEXTO ESCRITO DEBE CONTENER ÚNICAMENTE LETROS Y/O NÚMEROS');
            var texto = e.target.value.trim();
            texto = texto.replace(/\\/g, "");
            texto = texto.replace(/["']/g, function(match) {
                return '\\' + match;
            });
            e.target.value = texto;
        }
    }, true); // El tercer argumento true indica que el evento se captura durante la fase de captura




    function processDataPv() {
        var pasteData = document.getElementById('pasteAreaPv').value;
        var rows = pasteData.split('\n');
        var table = document.getElementById("tablaIngresoMasivoPv").getElementsByTagName('tbody')[0];

        // Limpiar el cuerpo de la tabla antes de procesar los datos
        table.innerHTML = '';

        rows.forEach(function(row) {
            var columns = row.split('|').filter(item => item.trim() !== ''); // Elimina las columnas vacías y los espacios extra
            if (columns.length === 11) { // Asegurarse que hay 11 columnas llenas
                var newRow = table.insertRow();
                columns.forEach(function(column, index) {
                    var cell = newRow.insertCell(index);
                    cell.innerHTML = '<input type="text" class="form-control" name="' + getColumnName(index) + '[]" value="' + column.trim() + '" style="width: 100%;">';
                });
            }
        });

        // Limpiar el área de pegado después de procesar
        document.getElementById('pasteAreaPv').value = '';
    }




    function processData() {
        var pasteData = document.getElementById('pasteArea').value;
        var rows = pasteData.split('\n');
        var table = document.getElementById("tablaIngresoMasivo").getElementsByTagName('tbody')[0];

        // Limpiar el cuerpo de la tabla antes de procesar los datos
        table.innerHTML = '';

        rows.forEach(function(row) {
            var columns = row.split('\t').filter(item => item.trim() !== ''); // Elimina las columnas vacías y los espacios extra
            if (columns.length === 11) { // Asegurarse que hay 11 columnas llenas
                var newRow = table.insertRow();
                for (let i = 0; i < columns.length; i++) {
                    var cell = newRow.insertCell(i);

                    cell.innerHTML = '<input type="text" class="form-control" name="' + getColumnName(i) + '[]" value="' + columns[i] + '" style="width: 100%;">';

                }
            }
        });

        // Limpiar el área de pegado después de procesar
        document.getElementById('pasteArea').value = '';
    }

    function getColumnName(index) {
        switch (index) {
            case 0:
                return 'codigo';
            case 1:
                return 'producto';
            case 2:
                return 'stock';
            case 3:
                return 'almacen';
            case 4:
                return 'precioCompra';
            case 5:
                return 'precioVentaSinIGV';
            case 6:
                return 'categoria';
            case 7:
                return 'serieComprobante';
            case 8:
                return 'correlativoComprobante';
            case 9:
                return 'numDocIdentidadProveedor';
            case 10:
                return 'lote';
            default:
                return '';
        }
    }

    document.getElementById('formIngresoMasivo').onsubmit = function(e) {
        e.preventDefault();
        console.log('Formulario enviado');
    };


    //  --------------------------------------------------------------------------
    // ingreso masivo
    // --------------------------------------------------------------------------
    // RECOGEMOS LO DE LA TABLA Y LO ENVIAMOS AL CONTROLER formIngresoMasivoPv 
    $('#formIngresoMasivo').submit(function(e) {
        e.preventDefault(); // Prevenir el envío normal del formulario

        let rowsValid = true;
        let formData = [];

        $('#tablaIngresoMasivo tbody tr').each(function() {
            let row = {};
            let isValidRow = true;
            $(this).find('input').each(function() {
                if ($(this).val().trim() === '') {
                    rowsValid = false;
                    isValidRow = false;
                    return false; // Salir del bucle
                }
                row[$(this).attr('name').replace('[]', '')] = $(this).val();
            });
            if (isValidRow) {
                formData.push(row);
            }
        });

        if (!rowsValid || formData.length === 0) {
            Swal.fire('Error', 'Por favor complete todos los campos en al menos una fila.', 'error');
            return;
        }

        Swal.fire({
            title: '¿Está seguro de realizar este registro?',
            text: "¡Si no lo está puede cancelar la acción!",
            // icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Sí, modificar inventario!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: 'modelos/productosAbadModelo.php',
                    data: {
                        data: JSON.stringify(formData),
                        accionar: 'formNewPromasivo' // Añade la variable extra aquí
                    },
                    success: function(response) {
                        Swal.fire('Registrado', 'El inventario ha sido modificado exitosamente.', 'success');
                        $('#tablaIngresoMasivo tbody').empty(); // Limpiar la tabla después del envío exitoso
                    },
                    error: function() {
                        Swal.fire('Error', 'Hubo un problema al enviar los datos. Intente nuevamente.', 'error');
                    }
                });
            }
        });
    });







    document.getElementById('formIngresoMasivoPv').onsubmit = function(z) {
        z.preventDefault();
        console.log('Formulario enviado');
    };


    //  --------------------------------------------------------------------------
    // ingreso masivo igual que metro HERLU 102107           HERLU 119107
    // --------------------------------------------------------------------------
    $('#formIngresoMasivoPv').submit(function(z) {
        z.preventDefault(); // Prevenir el envío normal del formulario

        let rowsValid = true;
        let formData = [];

        $('#tablaIngresoMasivoPv tbody tr').each(function() {
            let row = {};
            let isValidRow = true;
            $(this).find('input').each(function() {
                let inputValue = $(this).val().trim();
                if (inputValue === '') {
                    rowsValid = false;
                    isValidRow = false;
                    return false; // Salir del bucle
                }
                // Asegúrate de que el valor no sea undefined antes de usar replace
                if (inputValue !== undefined && inputValue !== null) {
                    let inputName = $(this).attr('name');
                    if (inputName) {
                        row[inputName.replace('[]', '')] = inputValue;
                    } else {
                        rowsValid = false;
                        isValidRow = false;
                        return false; // Salir del bucle
                    }
                } else {
                    rowsValid = false;
                    isValidRow = false;
                    return false; // Salir del bucle
                }
            });
            if (isValidRow) {
                formData.push(row);
            }
        });

        if (!rowsValid || formData.length === 0) {
            Swal.fire('Error', 'Por favor complete todos los campos en al menos una fila.', 'error');
            return;
        }

        Swal.fire({
            title: '¿Está seguro de realizar este registro?',
            text: "¡Si no lo está puede cancelar la acción!",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Sí, modificar inventario!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: 'modelos/productosAbadModelo.php',
                    data: {
                        data: JSON.stringify(formData),
                        accionar: 'formNewPromasivo' // Añade la variable extra aquí
                    },
                    success: function(response) {
                        Swal.fire('Registrado', 'El inventario ha sido modificado exitosamente.', 'success');
                        $('#miSpanfilero').text(0);
                        $('#tablaIngresoMasivoPv tbody').empty(); // Limpiar la tabla después del envío exitoso
                    },
                    error: function() {
                        Swal.fire('Error', 'Hubo un problema al enviar los datos. Intente nuevamente.', 'error');
                    }
                });
            }
        });
    });



    //  --------------------------------------------------------------------------
    // ingreso unitario
    // --------------------------------------------------------------------------
    $('#formNewPro').submit(function() {
        var inputValita = $('#nuevaDescripcion').val();
        // Reemplaza todas las ocurrencias de '/' por ' al '
        var newVal = inputValita.replace(/\//g, ' al ');
        // Reproduce el texto
        speak(newVal);


        // ==========================================================================
        // Obtener los valores de los campos
        var bar_codeO = $("#nuevoCodigo").val();
        var nuevaDescripcionO = $("#nuevaDescripcion").val();

        // Validar que los campos no estén vacíos
        if (!bar_codeO || !nuevaDescripcionO) {
            alert("Todos los campos deben contener datos.");
            event.preventDefault();
            return false;
        }

        // Validar que el campo bar_codeO no contenga la palabra "HERLU" más de una vez
        var HERLUCountO = (bar_codeO.match(/HERLU/gi) || []).length;
        if (HERLUCountO > 1) {
            alert("El campo 'Código de Barras' no debe contener la palabra 'HERLU' más de una vez. Por favor, revise el dato.");
            event.preventDefault();
            return false;
        }
        // ==========================================================================

        swal.fire({
            title: '¿Está seguro de reaizar este registro heee?',
            text: "¡Si no lo está puede cancelar la accíón!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, modificar inventario!'
        }).then((result) => {
            if (result.value) {
                $("#btnSave").addClass("d-none");

                var tipo_moneda_compra = $("#tipo_moneda_compra").val();
                var tipo_moneda_venta = $("#tipo_moneda_venta").val();
                var tipo_cambio = $("#tipo_cambio").val();

                var bar_code = $("#nuevoCodigo").val();
                var fk_dm_productos = $("#fk_dm_productos").val();
                var nuevaDescripcion = $("#nuevaDescripcion").val();
                var nuevaCategoria = $("#nuevaCategoria").val();
                var nuevaalmacenes = $("#nuevaalmacenes").val();

                var serieComprobante = $("#serieComprobante").val();
                var correlativoComprobante = $("#correlativoComprobante").val();
                var numDocIdentidadProveedor = $("#numDocIdentidadProveedor").val();

                var nuevoLote = $("#nuevoLote").val();
                var nuevaFechaVencimiento = $("#nuevaFechaVencimiento").val();
                var nuevoStock = $("#nuevoStock").val();
                var nuevoPrecioCompra = $("#nuevoPrecioCompra").val();
                var nuevoPrecioVenta = $("#nuevoPrecioVenta").val();
                var porcentajeRi = $("#porcentajeRi").val();
                var accionar = "formNewPro";
                var dataen = 'bar_code=' + bar_code + '&nuevaalmacenes=' + nuevaalmacenes + '&serieComprobante=' + serieComprobante + '&correlativoComprobante=' + correlativoComprobante + '&numDocIdentidadProveedor=' + numDocIdentidadProveedor + '&nuevoLote=' + nuevoLote + '&nuevaFechaVencimiento=' + nuevaFechaVencimiento + '&porcentajeRi=' + porcentajeRi + '&fk_dm_productos=' + fk_dm_productos + '&nuevaDescripcion=' + nuevaDescripcion + '&nuevaCategoria=' + nuevaCategoria + '&nuevoStock=' + nuevoStock + '&nuevoPrecioCompra=' + nuevoPrecioCompra + '&nuevoPrecioVenta=' + nuevoPrecioVenta + '&tipo_moneda_compra=' + tipo_moneda_compra + '&tipo_moneda_venta=' + tipo_moneda_venta + '&tipo_cambio=' + tipo_cambio + '&accionar=' + accionar;
                $.ajax({
                    type: 'post',
                    url: 'modelos/productosAbadModelo.php',
                    data: dataen,
                    success: function(resp) {
                        Swal.fire({
                            icon: 'success',
                            title: '¡Genial, registro exitoso!',
                            text: 'El registro se ha realizado correctamente.',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Aceptar'
                        });
                        $('#alertForm2').html(resp);
                        setTimeout(function() {
                            // $("#formNewPro")[0].reset();
                            // Restaurar el valor del select
                            $('#nuevoCodigo').val('');
                            $('#nuevaDescripcion').val('');
                            $('#nombProduct').val('');
                            $("#nuevoCodigo").focus();

                        }, 3000);
                    }
                });
                return false;
            }
        })
        return false;
    })



    function filterTable() {
        var select = document.getElementById("padreSelect");
        var padre = select.value.toLowerCase();
        var table = document.getElementById("tblStockC");
        var tr = table.getElementsByTagName("tr");

        for (var i = 1; i < tr.length; i++) {
            var td = tr[i].getElementsByTagName("td")[1]; // Cambia el índice a la columna "Categoría"
            if (td) {
                var txtValue = td.textContent || td.innerText;
                if (txtValue.toLowerCase().indexOf(padre) > -1 || padre === "") {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }




    function searchProduct() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("productSearch");
        filter = input.value.toUpperCase();
        table = document.getElementById("tblStockC");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 1; i < tr.length; i++) { // start from 1 to skip the table header
            td = tr[i].getElementsByTagName("td")[2]; // column index 2 for "Producto"
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }


    function searchProduct2() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("productSearchcode");
        filter = input.value.toUpperCase();
        table = document.getElementById("tblStockC");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 1; i < tr.length; i++) { // start from 1 to skip the table header
            td = tr[i].getElementsByTagName("td")[0]; // column index 0 for "Código de barra"
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase() === filter) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }



    $(document).ready(function() {
        // Inicializa DataTables con botones de exportación
        var table = $('#tblStockC').DataTable({
            dom: 'Bfrtip',
            paging: false,
            searching: false,
            ordering: false,
            info: false,
            buttons: [{
                extend: 'excelHtml5',
                text: 'Exportar a Excel Existencias',
                className: 'btn btn-primary',
                exportOptions: {
                    columns: ':visible'
                }
            }]
        });

        // Manejo del botón de exportación personalizado
        $('#exportButton').on('click', function() {
            table.button('.buttons-excel').trigger();
        });
    });



    function openModalAndFullscreen() {
        // Poner el navegador en pantalla completa
        var docElm = document.documentElement;
        if (docElm.requestFullscreen) {
            docElm.requestFullscreen();
        } else if (docElm.mozRequestFullScreen) {
            docElm.mozRequestFullScreen();
        } else if (docElm.webkitRequestFullscreen) {
            docElm.webkitRequestFullscreen();
        } else if (docElm.msRequestFullscreen) {
            docElm.msRequestFullscreen();
        }
    }







    function ajustarEspacio(input) {
        // // Obtener el valor del input
        // let texto = input.value;    
        // // Usar expresión regular para agregar espacio entre texto y números
        // texto = texto.replace(/([a-zA-Z])(\d)/g, '$1 $2');
        // // Establecer el valor ajustado al input
        // input.value = texto;

        // // Abrir el select automáticamente
        // const select = document.getElementById('nuevaalmacenes');
        // if (select) {
        //     // Intentar abrir el menú desplegable
        //     select.focus(); // Enfocar el select
        //     // Crear y disparar un evento 'mousedown' para intentar abrir el menú
        //     const event = new MouseEvent('mousedown', {
        //         view: window,
        //         bubbles: true,
        //         cancelable: true
        //     });
        //     select.dispatchEvent(event);
        // }



    }










    function ajustarStock() {
        var stockInput = document.getElementById('nuevoStock');
        var selectedRadio = document.querySelector('input[name="movimientot"]:checked');
        var btnSave = document.getElementById('btnSave');

        // Ajustar el valor del stock
        if (selectedRadio) {
            var stockValue = parseFloat(stockInput.value);
            if (!isNaN(stockValue)) {
                var adjustedValue = selectedRadio.value === 'salidat' ? -Math.abs(stockValue) : Math.abs(stockValue);
                stockInput.value = adjustedValue;

                // Cambiar el texto del botón según el tipo de movimiento
                if (selectedRadio.value === 'ingresot') {
                    btnSave.textContent = 'REGISTRAR INGRESO';
                } else if (selectedRadio.value === 'salidat') {
                    btnSave.textContent = 'REGISTRAR SALIDA';
                }

                console.log('Adjusted Stock Value:', adjustedValue); // Depuración
            } else {
                console.error('Invalid stock value:', stockInput.value); // Depuración
            }
        } else {
            console.error('No movement type selected'); // Depuración
        }
    }

// Constante para almacenar el tipo de cambio
const TIPO_CAMBIO = {
    precioCompra: null
};

// Función para obtener el tipo de cambio usando el proxy PHP
function obtenerTipoCambioActual() {
    if (TIPO_CAMBIO.precioCompra !== null) {
        // Formatear el tipo de cambio
        var tipoCambioFormateado = parseFloat(TIPO_CAMBIO.precioCompra).toFixed(2);
        if (!isNaN(tipoCambioFormateado)) {
            document.getElementById('tipo_cambio').value = tipoCambioFormateado;
            console.log('Tipo de cambio obtenido del cache:', tipoCambioFormateado);
        } else {
            console.error('El tipo de cambio en cache no es un número válido.');
        }
    } else {
        fetch('controladores/proxy.php')
            .then(response => {
                if (!response.ok) throw new Error('Error en la respuesta del servidor');
                return response.json();
            })
            .then(data => {
                if (data && data.precioCompra) {
                    TIPO_CAMBIO.precioCompra = data.precioCompra;
                    var tipoCambioFormateado = parseFloat(TIPO_CAMBIO.precioCompra).toFixed(2);
                    if (!isNaN(tipoCambioFormateado)) {
                        document.getElementById('tipo_cambio').value = tipoCambioFormateado;
                        console.log('Tipo de cambio obtenido del servidor:', tipoCambioFormateado);
                    } else {
                        console.error('El tipo de cambio obtenido no es un número válido.');
                        alert('Error al procesar el tipo de cambio recibido.');
                    }
                } else {
                    alert('No se encontró el tipo de cambio.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('No se pudo obtener el tipo de cambio. Inténtelo más tarde.');
            });
    }
}


// Evento para ejecutar la función al cambiar el select de almacenes
document.getElementById('nuevaalmacenes').addEventListener('change', obtenerTipoCambioActual);

    function selectRadio(id) {
        $('#btnSave').removeClass('d-none');
        var radios = document.querySelectorAll('.custom-radio');

        // Desmarcar todos los radios y quitar la clase 'selected'
        radios.forEach(function (radio) {
            radio.classList.remove('selected');
        });

        // Seleccionar el radio correspondiente
        var radio = document.getElementById(id);
        if (radio) {
            radio.checked = true;
            var selectedDiv = radio.parentElement;
            selectedDiv.classList.add('selected');
            ajustarStock(); // Llama a la función para ajustar el stock

            // Verificar si se selecciona "Salida"
            if (radio.value === 'salidat') {
                if (validarAlmacenSeleccionado()) { 
                    ejecutarAjaxSalida(); // Ejecuta AJAX si la validación es exitosa
                }
            } 
        }
    }


// Validar que el almacén esté seleccionado
function validarAlmacenSeleccionado() {
    var almacenes = $('#nuevaalmacenes').val();
    if (!almacenes) {
        Swal.fire({
            icon: 'warning',
            title: 'Atención',
            text: 'Debe seleccionar un almacén antes de continuar.'
        });
        return false;
    }
    return true;
}

// Función para resetear campos del formulario si no es "Salida"
function resetFormulario() {
    $('#tipo_cambio').val('');
    $('#tipo_moneda_compra').prop('selectedIndex', 0);
    $('#tipo_moneda_venta').prop('selectedIndex', 0);
    $('#nuevoPrecioCompra').val(0);
    $('#nuevoPrecioVenta').val(0);
}

// Función AJAX para obtener datos en caso de "Salida"
function ejecutarAjaxSalida() {
    var nuevoCodigo = $('#nuevoCodigo').val();
    var nuevaalmacenes = $('#nuevaalmacenes').val();
    var nuevoStock = $('#nuevoStock').val();

    var dataen = {
        nuevoCodigo: nuevoCodigo,
        nuevaalmacenes: nuevaalmacenes,
        nuevoStock: nuevoStock,
        accionar: 'salidatMovimiento'
    };

    $.ajax({
        type: 'POST',
        url: 'modelos/productosAbadModelo.php',
        data: dataen,
        dataType: 'json',
        success: function (resp) {
            console.log('Respuesta del servidor:', resp); // Verificar en la consola

            // Verificar que la respuesta tenga la estructura esperada
            if (resp && resp.status === 'success' && resp.data) {
                // Procesar respuesta exitosa
                autoCompletarFormulario(resp.data); // Llenar los campos del formulario
            } else if (resp && resp.status === 'error') {
                // Mostrar la alerta con el mensaje de error y el stock actual
                Swal.fire({
                    icon: 'error',
                    title: 'Stock insuficiente',
                    text: resp.message + ' Actualmente hay ' + resp.current_stock + ' unidades en stock.'
                });
            } else {
                console.warn('Respuesta inesperada:', resp);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Respuesta inesperada del servidor'
                });
            }
        },
        error: function (xhr, status, error) {
            console.error('Error en la solicitud AJAX:', xhr.responseText, status, error);

            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Hubo un problema con la solicitud.'
            });
        }
    });
}



// Función para generar el HTML del mensaje
function generarHTML(data) {
    return `
        <div class="toastAbad">
            Genial!. Ahora tienes un stock de ${data.stock}
            <span style="color: green"><i class="fa fa-angle-double-left" aria-hidden="true"></i></span> 
            ${data.descripcion}
        </div>`;
}

// Función para autocompletar los campos del formulario
function autoCompletarFormulario(data) {
    $('#serieComprobante').val(data.serie_comprobante_compra);
    $('#correlativoComprobante').val(data.correlativo_comprobante_compra);
    $('#numDocIdentidadProveedor').val(data.num_documento_identidad);
    $('#nuevoLote').val(data.lote);
    $('#nuevaFechaVencimiento').val(data.fecha_vencimiento);
    $('#nuevoPrecioCompra').val(data.precio_compra);
    $('#nuevoPrecioVenta').val(data.precio_venta);
}



    document.querySelector('#linkCartaInterna').addEventListener('click', function(event) {
        event.preventDefault(); // Evita que el enlace se abra de inmediato
        const selectValue = document.querySelector('#padreSelect').value;
        if (selectValue === '') {
            alert('Por favor, seleccione una opción.');
        } else {
            const href = `/controladores/pdf.controlador.php?deque=pdf_carta_inventario&extra=${encodeURIComponent(selectValue)}`;
            window.open(href, '_blank');
        }
    });
    // --------------------------------------------------------------------------------------------------------------------------------------------------
    document.querySelector('#linkCartaPublica').addEventListener('click', function(event) {
        event.preventDefault(); // Evita que el enlace se abra de inmediato
        const selectValue = document.querySelector('#padreSelect').value;
        if (selectValue === '') {
            alert('Por favor, seleccione una opción.');
        } else {
            const href = `/controladores/pdf.controlador.php?deque=pdf_carta&extra=${encodeURIComponent(selectValue)}`;
            window.open(href, '_blank');
        }
    });





    $(document).ready(function() {
        // Inicializa la variable global productos
        window.productos = [];

        // Maneja el clic en el botón de gestión masiva
        $('#btnGestionMasiva').on('click', function() {
            document.documentElement.requestFullscreen();

            var accion = 'consultar_datamaestra_productos'; // Acción para enviar al controlador

            // Solicitud AJAX al controlador
            $.ajax({
                url: 'controladores/inventario.controlador.php', // URL del controlador
                method: 'POST',
                data: {
                    accion: accion
                },
                dataType: 'json',
                success: function(response) {
                    if (response && response.productos) {
                        window.productos = response.productos; // Actualiza la variable global productos



                        const productSelect = $('#productSelect');
                        // Initialize Select2 on the product select
                        productSelect.select2();

                        // Function to populate the select options
                        function populateProductOptions() {
                            productSelect.empty();
                            productSelect.append(new Option('Open this select menu', '', true, true));

                            window.productos.forEach(producto => {
                                productSelect.append(new Option(producto.nombre_producto, producto.bar_code));
                            });

                            // Trigger Select2 update
                            productSelect.trigger('change');
                        }

                        // Populate options on document ready
                        $(document).ready(function() {
                            populateProductOptions();
                        });

                        // Handle the change event of the select
                        productSelect.on('change', function() {
                            const selectedValue = $(this).val();
                            const pasteArea = $('#pasteAreaPv');
                            pasteArea.val((index, val) => {
                                return val + (val ? '\n' : '') + selectedValue;
                            });
                        });



                        // Abre el modal después de actualizar la variable global productos
                        $('#modalIngresoMasivoPrevista').modal('show');

                    } else {
                        console.error('Error: La respuesta no contiene datos de productos.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error en la solicitud AJAX:', status, error);
                }
            });
        });

        // Convierte todo el texto a mayúsculas al escribir en el textarea
        $('#pasteAreaPv').on('input', function() {
            this.value = this.value.toUpperCase();
        });

        // Maneja el evento de presionar Enter en el textarea
        $('#pasteAreaPv').on('keydown', function(e) {
            if (e.key === 'Enter') {
                // e.preventDefault(); // Previene el salto de línea por defecto
                var query = $(this).val().trim().toUpperCase(); // Obtiene el texto del textarea y elimina los espacios, convirtiéndolo a mayúsculas


                // Verifica si el textarea está vacío
                if (query === '') {
                    alert('Debe introducir algún dato.');
                    return;
                }

                var resultado = buscarProducto(getLastLineWithContent(query)); // Busca el producto
                $(this).val(function(index, val) {
                    return val + '|' + resultado; // Agrega el resultado al final del contenido existente en el textarea
                });
            }
        });




        function getLastLineWithContent(textareaValue) {
            var lines = textareaValue.split('\n'); // Divide el contenido en líneas
            var lastLine = '';

            // Iterar de atrás hacia adelante para encontrar la última línea con contenido
            for (var i = lines.length - 1; i >= 0; i--) {
                if (lines[i].trim() !== '') {
                    lastLine = lines[i].trim(); // Tomar la última línea con contenido
                    break;
                }
            }

            return lastLine;
        }


        // Función para buscar el producto en la variable global
        // Función para buscar el producto en la variable global
        function buscarProducto(query) {
            var resultados = [];

            console.log('Búsqueda de código de barras:', query); // Muestra el query en la consola

            for (var i = 0; i < window.productos.length; i++) {
                var producto = window.productos[i];

                // Asegúrate de que el producto y la primera columna existan
                if (producto && producto.bar_code) {
                    var barCode = producto.bar_code.toUpperCase(); // Normaliza el bar_code a mayúsculas

                    console.log('Comparando con producto:', barCode); // Muestra el código de barras en la consola

                    // Si el valor del código de barras coincide con el query, añade el producto a los resultados
                    if (barCode === query) {
                        var valores = Object.values(producto).slice(1); // Omitir el primer valor

                        // Reemplazar el cuarto valor
                        valores[2] = getSelectedButtonAlmacenValue();

                        // Evaluar y asignar el tercer valor según getSelectedButtonAccionValue()
                        if (getSelectedButtonAccionValue() === 'Entrada') {
                            valores[1] = 1;
                        } else if (getSelectedButtonAccionValue() === 'Salida') {
                            valores[1] = -1;
                        } else if (getSelectedButtonAccionValue() === 'Inventario') {
                            valores[1] = 1;
                        }


                        // Reemplazar el valor 11
                        if (valores.length >= 9) {
                            valores[9] = getSelectedButtonLotsValue();
                            document.getElementById('miSpanfilero').innerText = parseInt(document.getElementById('miSpanfilero').innerText) + 1;
                        } else {
                            console.log('El producto no tiene suficientes valores para reemplazar el valor 11:', producto);
                        }

                        // Unir los valores en una cadena, separada por ' | '
                        resultados.push(valores.join(' | '));
                    }
                } else {
                    console.log('Producto o barCode no definido en la fila:', i, producto); // Muestra información si el producto o barCode no está definido
                }
            }

            console.log('Resultados encontrados:', resultados); // Muestra los resultados encontrados

            return resultados.length > 0 ? resultados.join('\n') : 'Producto no encontrado'; // Retorna resultados o un mensaje si no se encuentra
        }

        // BOTONERA de almacenes 
        $('.btn-stack .btn').on('click', function() {
            $('.btn-stack .btn').removeClass('active');
            $(this).addClass('active');
            toggleActive();
        });

        // Función para obtener el valor del botón seleccionado
        function getSelectedButtonAlmacenValue() {
            return $('.btn-stack .btn.active').val();
        }

        // BOTONERA DE MOVIMIENTO
        $('.btn-duo .btn').on('click', function() {

            $('.btn-duo .btn').removeClass('active');
            $(this).addClass('active');
            toggleActive();

            let actionbtnd = $('.btn-duo .btn.active').text();
            if (actionbtnd == 'Inventario') {
                $('#tablaIngresoMasivoPv, #btnProcesarDatosUltm, #btnGuardarDatosUltm').addClass('d-none');
                // $('#descargarenexcelinventary').removeClass('d-none');
            } else {
                // $('#descargarenexcelinventary').addClass('d-none');
                $('#tablaIngresoMasivoPv, #btnProcesarDatosUltm, #btnGuardarDatosUltm').removeClass('d-none');
            }
        });

        // Función para obtener el valor del botón seleccionado
        function getSelectedButtonAccionValue() {
            return $('.btn-duo .btn.active').val();
        }


        // BOTONERA LOTES
        $('.btn-lote').on('click', function() {
            $('.btn-lote').removeClass('active');
            $(this).addClass('active');
            toggleActive();
        });

        // Función para obtener el valor del botón seleccionado
        function getSelectedButtonLotsValue() {
            return $('.btn-lote.active').val();
        }




        function toggleActive() {
            var stackValue = getSelectedButtonAlmacenValue();
            var duoValue = getSelectedButtonAccionValue();
            var loteValue = getSelectedButtonLotsValue();

            if (stackValue && duoValue && loteValue) {
                var textarea = document.getElementById('pasteAreaPv');
                textarea.readOnly = false; // Make the textarea editable
                textarea.focus(); // Focus on the textarea

            }
        }




        // PARA DESCARGAR TOMA DE INVENTARIOS
        // PARA DESCARGAR TOMA DE INVENTARIOS
        $('#descargarenexcelinventary').on('click', function() {
            var content = $('#pasteAreaPv').val();
            if (!content) {
                alert('El textarea está vacío');
                return;
            }

            // Convert the content into an array of arrays, splitting by '|'
            var rows = content.split('\n').map(function(row) {
                return row.split('|');
            });

            // Create a new workbook and a new worksheet
            var wb = XLSX.utils.book_new();

            // Get current date and time
            var currentDate = new Date();
            var formattedDate = currentDate.toLocaleString();

            // Title and header
            var title = [
                ["TOMA DE INVENTARIO " + formattedDate],
                []
            ];
            var header = [
                ["CÓDIGO", "PRODUCTO", "STOCK", "ALMACÉN", "PRECIO DE COMPRA", "PRECIO DE VENTA SIN IGV", "CATEGORÍA", "SERIE DE COMPROBANTE", "CORRELATIVO DE COMPROBANTE", "N° DOC. IDENTIDAD PROVEEDOR", "LOTE"]
            ];

            // Combine title, header, and data
            var data = title.concat(header, rows);

            var ws = XLSX.utils.aoa_to_sheet(data);

            // Add the worksheet to the workbook
            XLSX.utils.book_append_sheet(wb, ws, 'Datos');

            // Write the workbook and trigger the download
            XLSX.writeFile(wb, 'Datos.xlsx');
        });




    });
</script>

<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>




<script>
    $(document).ready(function() {
        // Abre el modal
        $("#calculateOrderButton").click(function() {
            $("#orderModal").show();
        });

        // Cierra el modal
        $(".close").click(function() {
            $("#orderModal").hide();
        });

        // Procesar el textarea
        $("#processButton").click(function() {
            var orderName = $("#orderName").val().trim();
            var orderData = $("#orderTextarea").val().trim();
            var rows = orderData.split('\n');
            var table = $("#tblStockC");
            var tbody = table.find('tbody');
            var thead = table.find('thead');
            var codesInTable = {};

            if (!orderName) {
                alert("Por favor, ingresa un nombre para el pedido.");
                return;
            }

            // Guardar las filas de la tabla en un objeto para fácil acceso por código
            tbody.find('tr').each(function() {
                var code = $(this).find('td:eq(2)').text().trim();
                codesInTable[code] = $(this);
            });

            var newColumn = [];
            var invalidCodes = [];
            var columnSum = 0;

            // Crear una nueva cabecera para la columna en ambas filas de la cabecera
            thead.find('tr:first').append('<th class="new-column-header">Total</th>');
            thead.find('tr:last').append('<th class="new-column-header">' + orderName + '</th>');

            // Procesar los datos pegados y calcular la sumatoria
            rows.forEach(function(row) {
                var cols = row.split('\t');
                if (cols.length < 2) return; // Saltar filas inválidas
                var code = cols[0].trim();
                var value = parseFloat(cols[1].trim());

                if (codesInTable[code]) {
                    codesInTable[code].append('<td>' + value + '</td>'); // No aplicar estilos aquí
                    columnSum += value;
                } else {
                    invalidCodes.push(code);
                }
            });

            if (invalidCodes.length > 0) {
                alert("Los siguientes códigos no existen en la tabla: " + invalidCodes.join(', '));
                return;
            }

            // Añadir celdas con 0 para filas que no fueron actualizadas y calcular sumatoria
            tbody.find('tr').each(function() {
                if ($(this).find('td').length == thead.find('tr:last th').length - 1) {
                    $(this).append('<td class="new-column-cell">0</td>');
                }
            });

            // Añadir la sumatoria en la cabecera
            thead.find('tr:first th:last').text(columnSum);

            alert("Datos procesados correctamente.");
            $("#orderModal").hide(); // Cerrar el modal
        });

    });


    function downloadTableAsExcel() {
        var table = document.getElementById("tblStockC");
        var workbook = XLSX.utils.table_to_book(table, {
            sheet: "Sheet1"
        });
        var workbookOut = XLSX.write(workbook, {
            bookType: 'xlsx',
            bookSST: true,
            type: 'binary'
        });

        function s2ab(s) {
            var buf = new ArrayBuffer(s.length);
            var view = new Uint8Array(buf);
            for (var i = 0; i < s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
            return buf;
        }

        saveAs(new Blob([s2ab(workbookOut)], {
            type: "application/octet-stream"
        }), 'table.xlsx');
    }
    $(document).on('submit', '#_editarProduct', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('accion', 'EdiatarProducto');

        $.ajax({
            url: 'controladores/productos.controlador.php',
            method: "POST",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(resp) {

                if (resp == "ok") {
                    Swal.fire({
                        icon: 'success', // 'type' en versiones anteriores
                        title: 'El producto ha sido editado correctamente',
                        showConfirmButton: true,
                        confirmButtonText: 'Cerrar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = "productos";
                        }
                    });

                } else if (resp == 'campos_vacios') {
                    Swal.fire({
                        icon: 'error', // Cambiar a 'error' para mensajes de error
                        title: "¡El producto no puede ir con los campos vacíos o llevar caracteres especiales!",
                        text: '¡Problema a cargar campos vacíos.',
                        showConfirmButton: true,
                        confirmButtonText: 'Cerrar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = "productos"; // Si deseas redirigir después de cerrar
                        }
                    });
                    
                } else {

                    alert("Erro al Actualizar el producto");
                }
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX:", status, error);
            }
        });
    })
    
    function change_(){
        $('#tipo_cambio').val();
        $('#tipo_moneda_compra').val();
        $('#tipo_cambio').val();
        $('#tipo_cambio').val();
        $('#tipo_cambio').val();
        $('#tipo_cambio').val();
    }





    
</script>