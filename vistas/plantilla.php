<?php

require_once "modelos/config.php";

?>



<!DOCTYPE html>

<html>

<head>

<link  rel="manifest" href="vistas/dist/jsn/manifest.json">

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">


      <meta property="og:site_name" content="HERMOZA LUZ"/>
      <meta property="og:title"   content="HERMOZA LUZ" />
      <meta property="og:description"        content="📌 HERMOZA LUZ" />
      
      <meta property="og:image" content="<?php echo URLMAIN; ?>/vistas/img/plantilla/gren.png?<?php echo time(); ?>" />

      <meta property="og:type" content="website"/>
      <meta property="og:updated_time" content="1440432930" />
      <meta property="og:url"       content="<?php echo URLMAIN; ?>/" />
      <meta property="og:image:secure_url" content="<?php echo URLMAIN; ?>/vistas/img/plantilla/?<?php echo time(); ?>" />
      <link itemprop="thumbnailUrl" href="<?php echo URLMAIN; ?>/vistas/img/plantilla/?<?php echo time(); ?>" />
      <meta property="og:image:type" content="image/jpeg">
      <meta property="og:locale" content="en_GB" />



  <title>Hermoza Luz</title>



  <!-- Tell the browser to be responsive to screen width -->

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">



  <link rel="icon" href="<?php echo URLMAIN; ?>/vistas/img/plantilla/icono-blanco.png">



   <!--=====================================

  PLUGINS DE CSS

  ======================================-->



  <!-- Bootstrap 3.3.7 -->

  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css" media="all">



  <!-- Font Awesome -->

  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css" media="all">



  <!-- Ionicons -->

  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css" media="all">



  <!-- Theme style -->

  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css?ver=7777">



  <!-- AdminLTE Skins -->

  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css" media="all">



  <!-- Google Font -->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">



   <!-- DataTables -->

  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" media="all">

  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css" media="all">



  <!-- iCheck for checkboxes and radio inputs -->

  <link rel="stylesheet" href="vistas/plugins/iCheck/all.css" media="all">



  <!-- Daterange picker -->

  <link rel="stylesheet" href="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.css" media="all">



  <!-- Morris chart -->

  <link rel="stylesheet" href="vistas/bower_components/morris.js/morris.css" media="all">


  <link rel="stylesheet" href="ApiAbad/api_abad.css" media="all">



  <!-- JANC GRAFICO SENSOARIAL -->
  <link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" type="text/css" rel="stylesheet">
  <link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css" type="text/css" rel="stylesheet">
 


  <!--=====================================

  PLUGINS DE JAVASCRIPT

  ======================================-->

<!-- JANC GRAFICO SENSORIAL -->
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-sunburst.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-data-adapter.min.js"></script>
  



  <!-- jQuery 3 -->

  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>



  <!-- Bootstrap 3.3.7 -->

  <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>



  <!-- FastClick -->

  <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>



  <!-- AdminLTE App -->

  <script src="vistas/dist/js/adminlte.min.js"></script>



  <!-- DataTables -->

  <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>

  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>

  <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>



  <!-- SweetAlert 2 -->

  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>



  <!-- iCheck 1.0.1 -->

  <script src="vistas/plugins/iCheck/icheck.min.js"></script>



  <!-- InputMask -->

  <script src="vistas/plugins/input-mask/jquery.inputmask.js"></script>

  <script src="vistas/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>

  <script src="vistas/plugins/input-mask/jquery.inputmask.extensions.js"></script>



  <!-- jQuery Number -->

  <script src="vistas/plugins/jqueryNumber/jquerynumber.min.js"></script>



  <!-- daterangepicker -->

  <script src="vistas/bower_components/moment/min/moment.min.js"></script>

  <script src="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>



  <!-- Morris.js charts -->
  <script src="vistas/bower_components/raphael/raphael.min.js"></script>
  <script src="vistas/bower_components/morris.js/morris.min.js"></script>



  <!-- ChartJS -->
<!--
  <script src="vistas/bower_components/Chartjs/Chart.js"></script> -->
  <script src="vistas/bower_components/chartjsv3/chartjsv3.js"></script>
  <!-- generar pdf -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>


<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>


  <!-- ======================================================================================================== -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" rel="stylesheet"/>





<meta name="theme-color" content="#63a03c">
<style type="text/css">
 
    .theadcentrado>tr>th{
      text-align: center;
      justify-content: center
    }
    
    .theadcentrado_negro>tr>td,.theadcentrado>tr>th{
      border: 1px solid #9e9e9e !important;
    }
    
    .theadcentrado_negro>tr>td,.theadcentrado_negro>tr{
        padding: 0px !important;
    }

    /*LOADING PRINCIPAL*/
   .spinerGiration2{
       background: rgba(0, 0, 0, 0.44);
                width: 100%;
                height: 939px;
                position: fixed;
                z-index: 9999999 !important; color: white;text-align: center;

     }

     .bolaRoja{color: #ff6259 !important;}
     .bolaAmarilla{color: #fdb525 !important;}
     .bolaVerde{color: #25c83a !important;}
     .bolaBlanca{color: #ecf0f5 !important;}


     fieldset.bordered {
    border: 1px groove #ddd !important;
    padding: 0 1em 1em 1em !important;
    margin: 0 0 1em 0 !important;
    }
    legend.bordered {
      border-style: none;
      border-width: 0;
      font-size: 11px;
      line-height: 20px;
      margin-bottom: 0;
      border-bottom:none;
    }
    legend {
      font-size: 12.5px !important
    }
    .btn.active, .btn:active {
    background: #fe9e23 !important;
}
</style>
</head>



<!--=====================================

CUERPO DOCUMENTO

======================================-->



<body class="hold-transition skin-blue-light sidebar-collapse sidebar-mini login-page" style="min-height: 1% !important">
<div class="spinerGiration2 d-none" >
         <i class="fa fa-spinner fa-pulse fa-3x fa-fw margin-bottom" ></i>
         <span class="sr-only">Cargando...</span>
</div>


  <?php

if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {

    echo '<div class="wrapper">';

    /*=============================================

    CABEZOTE

    =============================================*/

    include "modulos/cabezote.php";

    /*=============================================

    MENU

    =============================================*/

    include "modulos/menu.php";

    /*=============================================
    CONTENIDO
    =============================================*/
  
  
    if (isset($_GET["ruta"])) {

        if (
           
            // -------------------------------------------------------
            ( $_SESSION["perfil"]=='Asistente')||
            
            
            (($_GET["ruta"] == "iperc"  &&  (strpos($_SESSION["acceso"], "iperc") !== false)  )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "activos-fijos"  &&  (strpos($_SESSION["acceso"], "activos_fijos") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "gestion-transporte"  &&  (strpos($_SESSION["acceso"], "gestion-transporte") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            
            (($_GET["ruta"] == "plan-mantenimiento"  &&  (strpos($_SESSION["acceso"], "plan_mantenimiento") !== false) )|| $_SESSION["perfil"]=='Administrador')||

            (($_GET["ruta"] == "guia-remision"  &&  (strpos($_SESSION["acceso"], "guia_remision") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "guia-remision-lista"  &&  (strpos($_SESSION["acceso"], "guia_remision_lista") !== false) )|| $_SESSION["perfil"]=='Administrador')||


            (($_GET["ruta"] == "log-mantenimiento"  &&  (strpos($_SESSION["acceso"], "log_mantenimiento") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            // (($_GET["ruta"] == "gestion-combustible"  &&  (strpos($_SESSION["acceso"], "gestion_combustible") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            // (($_GET["ruta"] == "gastos-conductor"  &&  (strpos($_SESSION["acceso"], "gastos_conductor") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "check-list-conductor"  &&  (strpos($_SESSION["acceso"], "check_list_conductor") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "inicio"  &&  (strpos($_SESSION["acceso"], "inicio") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "report-bi"  &&  (strpos($_SESSION["acceso"], "report_bi") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "compras"  &&  (strpos($_SESSION["acceso"], "compras") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "habilitaciones"  &&  (strpos($_SESSION["acceso"], "habilitaciones") !== false) )|| $_SESSION["perfil"]=='Administrador')||

            (($_GET["ruta"] == "servicesadm"  &&  (strpos($_SESSION["acceso"], "servicesadm") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "compras-lista"  &&  (strpos($_SESSION["acceso"], "compras_lista") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            // (($_GET["ruta"] == "compras-lista"  &&  (strpos($_SESSION["acceso"], "compras_lista") !== false) ||) $_SESSION["perfil"]=='Administrador')  ||

            (($_GET["ruta"] == "categorias"  &&  (strpos($_SESSION["acceso"], "categorias") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "marcacion"  &&  (strpos($_SESSION["acceso"], "marcacion") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "marcacionadmin"  &&  (strpos($_SESSION["acceso"], "marcacionadmin") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "conductorgps"  &&  (strpos($_SESSION["acceso"], "conductorgps") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "bia"  &&  (strpos($_SESSION["acceso"], "bia") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            // ( $_GET["ruta"] == "almacenes"    &&    ltrim(rtrim($_SESSION["nombre"]))=='Liz Dimas Navarro')
            (($_GET["ruta"] == "almacenes"     &&  (strpos($_SESSION["acceso"], "almacenes"  ) !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "orden-salida-inventario"   &&  (strpos($_SESSION["acceso"], "orden_salida_inventario") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "datos-maestros-de-productos"  &&  (strpos($_SESSION["acceso"], "datos_maestros_de_productos") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "refreshBarcode"  &&  (strpos($_SESSION["acceso"], "refreshBarcode") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "file-the-control-inventory"  &&  (strpos($_SESSION["acceso"], "file_the_control_inventory") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "proveedores"  &&  (strpos($_SESSION["acceso"], "proveedores") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "productos"  &&  (strpos($_SESSION["acceso"], "productos") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "clientes"  &&  (strpos($_SESSION["acceso"], "clientes") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "ventas"  &&  (strpos($_SESSION["acceso"], "ventas") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "crear-venta"  &&  (strpos($_SESSION["acceso"], "crear_venta") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "new-venta"  &&  (strpos($_SESSION["acceso"], "new_venta") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "new-cotizacion"  &&  (strpos($_SESSION["acceso"], "new_cotizacion") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "cotizacion-lista"  &&  (strpos($_SESSION["acceso"], "cotizacion_lista") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "editar-venta"  &&  (strpos($_SESSION["acceso"], "editar_venta") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "facturaproveedor"  &&  (strpos($_SESSION["acceso"], "facturaproveedor") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "reportes"  &&  (strpos($_SESSION["acceso"], "reportes") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "tostado"  &&  (strpos($_SESSION["acceso"], "tostado") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "bpmhistorial"  &&  (strpos($_SESSION["acceso"], "bpmhistorial") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "laboratorio"  &&  (strpos($_SESSION["acceso"], "laboratorio") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "histolaboratorio"  &&  (strpos($_SESSION["acceso"], "histolaboratorio") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "laboratoria"  &&  (strpos($_SESSION["acceso"], "laboratoria") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "laboratoriaupdate"  &&  (strpos($_SESSION["acceso"], "laboratoriaupdate") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "usuarios"  &&  (strpos($_SESSION["acceso"], "usuarios") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "kanban"  &&  (strpos($_SESSION["acceso"], "kanban") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "documentos"  &&  (strpos($_SESSION["acceso"], "documentos") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "emprimir"  &&  (strpos($_SESSION["acceso"], "emprimir") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "deploy"  &&  (strpos($_SESSION["acceso"], "deploy") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "facturador"  &&  (strpos($_SESSION["acceso"], "facturador") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "liberar-productos-bpm"  &&  (strpos($_SESSION["acceso"], "liberar_productos_bpm") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "aspt"  &&  (strpos($_SESSION["acceso"], "aspt") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "facturacion"  &&  (strpos($_SESSION["acceso"], "facturacion") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "crear-solicitud"  &&  (strpos($_SESSION["acceso"], "crear_solicitud") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "adm"  &&  (strpos($_SESSION["acceso"], "adm") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "area-logistica"  &&  (strpos($_SESSION["acceso"], "area_logistica") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "area-almacen"  &&  (strpos($_SESSION["acceso"], "area_almacen") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "factura-proveedores"  &&  (strpos($_SESSION["acceso"], "factura_proveedores") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            (($_GET["ruta"] == "area-tesoreria"  &&  (strpos($_SESSION["acceso"], "area-tesoreria") !== false) )|| $_SESSION["perfil"]=='Administrador')||
            // -------------------------------------------------------

            $_GET["ruta"] == "salir") {

            include "modulos/" . $_GET["ruta"] . ".php";

        } else {

            include "modulos/404.php";

        }

    } else {

        include "modulos/inicio.php";

    }

    /*=============================================

    FOOTER

    =============================================*/

    include "modulos/footer.php";

    echo '</div>';

} else {

    include "modulos/login.php";

}

?>







<script src="vistas/js/almacenes.js"></script>

<script src="vistas/js/categorias.js"></script>

<script src="vistas/js/clientes.js"></script>

<script src="vistas/js/plantilla.js"></script>

<script src="vistas/js/productos.js"></script>

<script src="vistas/js/proveedores.js"></script>

<script src="vistas/js/reportes.js"></script>

<script src="vistas/js/usuarios.js"></script>

<script src="vistas/js/ventas.js"></script>



<!-- API ABAD ESQUEN -->

  <script src="ApiAbad/api_abad.js"></script>



<script src="vistas/js/main.js" ></script>
<style>
  .btn-primary {
    color: #fff ;
    background-color: #FE9E23 ;
    border-color: #FE9E23 ;
}

.btn-primary.active.focus, .btn-primary.active:focus, .btn-primary.active:hover, .btn-primary:active.focus, .btn-primary:active:focus, .btn-primary:active:hover, .open>.dropdown-toggle.btn-primary.focus, .open>.dropdown-toggle.btn-primary:focus, .open>.dropdown-toggle.btn-primary:hover {
    color: #fff;
    background-color: #39023b;
    border-color: #39023b;
}
.btn-primary:hover, .btn-primary:active, .btn-primary.hover {
    background-color: #39023b;
    border: 1px solid #39023b;
}
.btn-primary.focus, .btn-primary:focus {
    color: #fff;
    background-color: #39023b;
    border-color: #39023b;
}
.close {
    float: right !important;
    font-size: 25px !important;
    font-weight: 700 !important;
    line-height: 1 !important;
    color: #fff !important;
    /* text-shadow: 0 1px 0 #fff !important; */
    filter: alpha(opacity = 20) !important;
    opacity: 9 !important;
}
</style>
</body>



</html>

