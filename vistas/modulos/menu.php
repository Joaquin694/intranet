<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">


<?php

// Verificar si la palabra 'logeo' está presente en la URL

   $imagina="background_sistema_information.png";
   $bgprimarycabe="#39023b";
   $logo="plantilla/gren.png"; 
   $imgbn="plantilla/icono-blanco.png";
   $dodo2="display: none !important";

?>

<style>
    .popodos{
        <?php echo $dodo2;?>;
    }
    .popo{
        <?php echo $dodo;?>;
    }
  body {
            margin: 0 !important;
            font-family: Arial, sans-serif !important;
            background-color: #f4f4f4 !important;
            overflow-x: hidden !important;
        }

        .main-sidebar {
            width: 230px  !important;
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            height: 100% !important;
            background-color: #ffffff !important;
            overflow-y: auto !important;
            z-index: 1000 !important;
            transition: all 0.3s ease !important;
        }

        .main-sidebar img {
            display: block !important;
            margin: 20px auto !important;
            max-width: 80% !important;
            height: auto !important;
        }

        .sidebar {
            padding: 10px 0 !important;
        }

        .sidebar-menu,
        .treeview-menu {
            list-style: none !important;
            padding: 0 !important;
            margin: 0 !important;
            color: #39023b !important;
        }

        .sidebar-menu > li,
        .treeview-menu > li {
            position: relative !important;
        }

        .sidebar-menu li a,
        .treeview-menu li a {
            display: flex !important;
            align-items: center !important;
            text-decoration: none !important;
            color: #39023b !important;
            padding: 10px 15px !important;
            border-left: 3px solid transparent !important;
            white-space: nowrap !important;
            word-wrap: break-word !important;
        }

        .sidebar-menu li a:hover,
        .treeview-menu li a:hover {
            background-color: #f0f0f0 !important;
        }

        .treeview-menu {
            display: none !important;
            background-color: #ffffff !important;
            padding-left: 20px !important;
        }

        .treeview.active > .treeview-menu {
            display: block !important;
        }

        .pull-right-container {
            margin-left: auto !important;
        }

        @media (max-width: 768px) {
            .main-sidebar {
                width: 100% !important;
                height: auto !important;
                position: relative !important;
            }
            .treeview-menu {
                position: static !important;
                box-shadow: none !important;
            }
        }





        /* CSS para dispositivos con ancho de pantalla de 720px o menos */
@media (max-width: 760px) {
    .main-sidebar {
        padding-top: 115px !important;
        width: 200px !important;
        position: absolute !important;
    }
}

</style>

<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="viewspinerloading popodos">
                <a style="border-left-width: 0px;" href="atendercola" class="viewspinerloading">
                    <i class="fa fa-users"></i> 
                    <span class="viewspinerloading">Registro de actividades</span>
                </a>
            </li>


            <li class="viewspinerloading popodos">
                <a style="border-left-width: 0px;" href="historialactividades" class="viewspinerloading">
                    <i class="fa fa-tasks"></i> 
                    <span class="viewspinerloading">Historial de actividades</span>
                </a>
            </li>


            
            <li class="viewspinerloading popo">
                <a style="border-left-width: 0px;" href="inicio" class="viewspinerloading">
                    <i class="fa fa-home"></i>
                    <span class="viewspinerloading">Inicio</span>
                </a>
            </li>
            <li class="viewspinerloading popo">
                <a style="border-left-width: 0px;" href="report-bi">
                    <i class="fa fa-sliders" aria-hidden="true"></i>
                    <span class="viewspinerloading">Indicadores</span>
                </a>
            </li>
            <li class="treeview popo">
                <a style="border-left-width: 0px;" href="#">
                    <i class="fa fa-list-ul"></i>
                    <span class="viewspinerloading">Existencias</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="viewspinerloading">
                        <a style="border-left-width: 0px;" href="activos-fijos">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                            <span class="viewspinerloading">Activos Fijos</span>
                        </a>
                    </li>
                    <li class="viewspinerloading">
                        <a style="border-left-width: 0px;" href="guia-remision">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                            <span class="viewspinerloading">Guía de Remisión</span>
                        </a>
                    </li>
                    <li class="viewspinerloading">
                        <a style="border-left-width: 0px;" href="almacenes">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                            <span class="viewspinerloading">Gestión de Inventarios</span>
                        </a>
                    </li>
                    <li class="viewspinerloading">
                        <a style="border-left-width: 0px;" href="orden-salida-inventario">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                            <span class="viewspinerloading">Solicitud de Salida</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview popo">
                <a style="border-left-width: 0px;" href="#">
                    <i class="fa fa-list-ul"></i>
                    <span class="viewspinerloading">SATCP</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="viewspinerloading">
                        <a style="border-left-width: 0px;" href="iperc">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                            <span class="viewspinerloading">IPERC</span>
                        </a>
                    </li>
                    <li class="viewspinerloading">
                        <a style="border-left-width: 0px;" href="plan-mantenimiento">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                            <span class="viewspinerloading">Gestión mantenimiento</span>
                        </a>
                    </li>
                    <li class="viewspinerloading d-none">
                        <a style="border-left-width: 0px;" href="log-mantenimiento">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                            <span class="viewspinerloading">Log Mantenimiento</span>
                        </a>
                    </li>
                    <!-- <li class="viewspinerloading">
                        <a style="border-left-width: 0px;" href="gestion-combustible">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                            <span class="viewspinerloading">Gestión Combustible</span>
                        </a>
                    </li>
                    <li class="viewspinerloading">
                        <a style="border-left-width: 0px;" href="gastos-conductor">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                            <span class="viewspinerloading">Gastos Conductor</span>
                        </a>
                    </li> -->
                    <li class="viewspinerloading">
                        <a style="border-left-width: 0px;" href="check-list-conductor">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                            <span class="viewspinerloading">Check List Conductor</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- <li class="viewspinerloading popo">
                <a style="border-left-width: 0px;" href="gestion-transporte">
                    <i class="fa fa-truck" aria-hidden="true"></i>
                    <span class="viewspinerloading">Gestion de Transporte</span>
                </a>
            </li> -->
            <li class="viewspinerloading popo">
                <a style="border-left-width: 0px;" href="proveedores">
                    <i class="fa fa-address-book" aria-hidden="true"></i>
                    <span class="viewspinerloading">Proveedores</span>
                </a>
            </li>
            <li class="viewspinerloading popo">
                <a style="border-left-width: 0px;" href="clientes">
                    <i class="fa fa-users"></i>
                    <span class="viewspinerloading">Clientes</span>
                </a>
            </li>
            <li class="treeview popo">
                <a style="border-left-width: 0px;" href="#">
                    <i class="fa fa-list-ul"></i>
                    <span class="viewspinerloading">Gastos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="viewspinerloading">
                        <a style="border-left-width: 0px;" href="compras">
                            <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                            <span class="viewspinerloading">Nuevo Gasto</span>
                        </a>
                    </li>
                    <li class="viewspinerloading">
                        <a style="border-left-width: 0px;" href="compras-lista">
                            <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                            <span class="viewspinerloading">Administrar Gastos</span>
                        </a>
                    </li>
                    <li class="viewspinerloading">
                        <a style="border-left-width: 0px;" href="habilitaciones">
                            <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                            <span class="viewspinerloading">Habilitaciones</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview popo">
                <a style="border-left-width: 0px;" href="#">
                    <i class="fa fa-list-ul"></i>
                    <span class="viewspinerloading">Ventas</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="viewspinerloading">
                        <a style="border-left-width: 0px;" href="facturacion">
                            <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                            <span class="viewspinerloading">Administrar Ventas</span>
                        </a>
                    </li>
                    <li class="viewspinerloading">
                        <a style="border-left-width: 0px;" href="new-venta">
                            <i class="fa fa-cart-plus" aria-hidden="true"></i>
                            <span class="viewspinerloading">Nueva Venta</span>
                        </a>
                    </li>
                    <li class="viewspinerloading">
                        <a style="border-left-width: 0px;" href="new-cotizacion">
                            <i class="fa fa-cart-plus" aria-hidden="true"></i>
                            <span class="viewspinerloading">Nueva Cotización</span>
                        </a>
                    </li>
                    <li class="viewspinerloading">
                        <a style="border-left-width: 0px;" href="cotizacion-lista">
                            <i class="fa fa-cart-plus" aria-hidden="true"></i>
                            <span class="viewspinerloading">Listar Cotizaciones</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview ">
                <a style="border-left-width: 0px;" href="#" title="Configuración Del Sistema">
                    <i class="fa fa-wrench" aria-hidden="true"></i>
                    <span class="viewspinerloading">Conf. Del Sistema</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="viewspinerloading">
                        <a style="border-left-width: 0px;" href="usuarios">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span class="viewspinerloading">Usuarios</span>
                        </a>
                    </li>
                    <li class="viewspinerloading">
                        <a style="border-left-width: 0px;" href="file-the-control-inventory">
                            <i class="fa fa-barcode" aria-hidden="true"></i>
                            <span class="viewspinerloading">Códigos De Barra</span>
                        </a>
                    </li>
                </ul>
            </li> 
            <li class="treeview">
                <a style="border-left-width: 0px;" href="#" title="Configuración Del Sistema">
                    <i class="fa fa-chain-broken" aria-hidden="true"></i>
                    <span class="viewspinerloading">App's Gestión</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="viewspinerloading">
                        <a style="border-left-width: 0px;" href="https://meet.jit.si/Hermoza.Luz" target="_blank">
                            <i class="fa fa-video-camera" aria-hidden="true"></i>
                            <span class="viewspinerloading">Videoconferencia</span>
                        </a>
                    </li>
                    <li class="viewspinerloading">
                        <a style="border-left-width: 0px;" href="documentos">
                            <i class="fa fa-book" aria-hidden="true"></i>
                            <span class="viewspinerloading">Gestor Documental</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview d-none">
                <a style="border-left-width: 0px;" href="#" onclick="return false;" title="Configuración Del Sistema">
                    <i class="fa fa-deviantart" aria-hidden="true"></i>
                    <span class="viewspinerloading">DEV</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="viewspinerloading">
                        <a style="border-left-width: 0px;" href="crear-solicitud">
                            <i class="fa fa-deviantart" aria-hidden="true"></i>
                            <span class="viewspinerloading">Crear Solicitud</span>
                        </a>
                    </li>
                    <li class="viewspinerloading">
                        <a style="border-left-width: 0px;" href="adm">
                            <i class="fa fa-deviantart" aria-hidden="true"></i>
                            <span class="viewspinerloading">Adm</span>
                        </a>
                    </li>
                    <li class="viewspinerloading">
                        <a style="border-left-width: 0px;" href="area-logistica">
                            <i class="fa fa-deviantart" aria-hidden="true"></i>
                            <span class="viewspinerloading">Área Logística</span>
                        </a>
                    </li>
                    <li class="viewspinerloading">
                        <a style="border-left-width: 0px;" href="area-almacen">
                            <i class="fa fa-deviantart" aria-hidden="true"></i>
                            <span class="viewspinerloading">Área De Almacén</span>
                        </a>
                    </li>
                    <li class="viewspinerloading">
                        <a style="border-left-width: 0px;" href="factura-proveedores">
                            <i class="fa fa-deviantart" aria-hidden="true"></i>
                            <span class="viewspinerloading">Factura Proveedores</span>
                        </a>
                    </li>
                    <li class="viewspinerloading">
                        <a style="border-left-width: 0px;" href="area-tesoreria">
                            <i class="fa fa-deviantart" aria-hidden="true"></i>
                            <span class="viewspinerloading">Área De Tesorería</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
</aside>


<script>
    // JavaScript para manejar la expansión y colapso de los menús
    document.addEventListener('DOMContentLoaded', function() {
        var treeviews = document.querySelectorAll('.treeview > a');
        treeviews.forEach(function(treeview) {
            treeview.addEventListener('click', function(e) {
                e.preventDefault();
                var parentLi = this.parentNode;
                var submenu = parentLi.querySelector('.treeview-menu');
                if (parentLi.classList.contains('active')) {
                    parentLi.classList.remove('active');
                } else {
                    document.querySelectorAll('.treeview').forEach(function(el) {
                        el.classList.remove('active');
                    });
                    parentLi.classList.add('active');
                }
            });
        });
    });
</script>
