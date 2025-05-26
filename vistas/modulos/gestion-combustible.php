<!-- AÑADES CAMBIOS Y CON CONTROL S GUARDAS Y DIRECTO SE DISPARA A LA NUBE -->


<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<style>
   .modal-dialog-wide {
      width: 90%;
      max-width: none;
   }

   .content-section {
      display: flex;
      width: 100%;
   }

   #chartdiv {
      width: 30%;
      height: 500px;
   }

   .table-container {
      width: 70%;
      overflow-y: auto;
   }
</style>

<div class="content-wrapper">
   <section class="content-header">
      <h1>Registro de Abastecimiento de Combustible<small>Control de combustible para conductores</small></h1>
   </section>
   <?php
   require_once "controladores/gestion-combustible.controlador.php";
   //require_once "modelos/gestion-combustible.modelo.php";
   require_once "modelos/gestion-combustible.modelo.php";
   $ControladorGestionCombustible = new ControladorGestionCombustible();
   ?>

   <section class="content">
      <div class="row">
         <div class="col-xs-12">
            <div class="box">
               <div class="box-header">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#modalAbastecimiento">
                     <i class="fa fa-plus-square"></i> Agregar Registro
                  </button>
               </div>
               <div class="box-body">
                  <div class="content-section">
                     <div id="chartdiv"></div>
                     <div class="table-container">
                        <BR>
                        <input type="text" id="searchInput" placeholder="Buscar en la tabla..." class="form-control" style='width: 300px;float: right; margin-bottom: 10px'>
                        <table id="tablaAbastecimiento" class="table table-bordered table-hover">
                           <thead>
                              <tr>
                                 <th>id</th>
                                 <th>Fecha</th>
                                 <th>Hora</th>
                                 <th>Estación de Servicio</th>
                                 <th>Litros Cargados</th>
                                 <th>Costo por Litro</th>
                                 <th>Total Pagado</th>
                                 <th>Placa Vehículo</th>
                                 <th>Tipo de Combustibel</th>
                                 <th>Ruc Proveedor</th>
                                 <th>Kilometros Recorridos</th>
                                 <th>Forma de Pago</th>
                                 <th>Notas</th>
                                 <th>Doc</th>
                                 <th>Acciones</th>
                              </tr>
                           </thead>
                           <tbody></tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>

<!-- Modal para agregar/editar registro de abastecimiento -->
<div id="modalAbastecimiento" class="modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-wide">

      <div class="modal-content">
         <form id="formAbastecimiento" method="post" enctype="multipart/form-data">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Agregar/Editar Registro de Abastecimiento</h4>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-lg-6 form-group">
                     <label>Fecha:</label>
                     <input type="date" class="form-control" id="fechaAbastecimiento" name="fechaAbastecimiento" required>
                  </div>
                  <div class="col-lg-6 form-group">
                     <label>Hora:</label>
                     <input type="time" class="form-control" id="horaAbastecimiento" name="horaAbastecimiento" required>
                  </div>
                  <div class="col-lg-6 form-group">
                     <label>Estación de Servicio:</label>
                     <input type="text" class="form-control" id="estacionServicio" name="estacionServicio" required>
                  </div>
                  <div class="col-lg-6 form-group">
                     <label>Litros Cargados:</label>
                     <input type="number" class="form-control" id="litrosCargados" step="0.01" name="litrosCargados" required>
                  </div>
                  <div class="col-lg-6 form-group">
                     <label>Costo por Litro:</label>
                     <input type="number" class="form-control" id="costoPorLitro" step="0.01" name="costoPorLitro" required>
                  </div>
                  <div class="col-lg-6 form-group">
                     <label>Total Pagado:</label>
                     <input type="number" class="form-control" id="totalPagado" step="0.01" name="totalPagado" required>
                  </div>
                  <div class="col-lg-6 form-group">
                     <label>Placa del Vehículo:</label>
                     <input type="text" class="form-control" id="placaVehiculo" name="placaVehiculo" required>
                  </div>
                  <div class="col-lg-6 form-group">
                     <label>Tipo de Combustible:</label>
                     <select class="form-control" id="tipoCombustible" name="tipoCombustible">
                        <option value="Gasolina">Gasolina</option>
                        <option value="Diesel">Diésel</option>
                        <option value="GLP">GLP</option>
                        <option value="GNB">GNB</option>
                     </select>
                  </div>
                  <div class="col-lg-6 form-group">
                     <label>RUC del Proveedor:</label>
                     <input type="text" class="form-control" id="rucProveedor" name="rucProveedor" required>
                  </div>
                  <div class="col-lg-6 form-group">
                     <label>Kilómetros Recorridos:</label>
                     <input type="number" class="form-control" id="kilometrosRecorridos" name="kilometrosRecorridos" step="0.01" required>
                  </div>
                  <div class="col-lg-6 form-group">
                     <label>Forma de Pago:</label>
                     <select class="form-control" id="formaPago" name="formaPago">
                        <option value="Efectivo">Efectivo</option>
                        <option value="Credito">Crédito</option>
                     </select>
                  </div>
                  <div class="col-lg-12 form-group">
                     <label>Notas Adicionales:</label>
                     <textarea class="form-control" id="notasAdicionales" name="notasAdicionales" rows="3"></textarea>
                  </div>
                  <div class="col-lg-12 form-group">
                     <label>Documentos de Evidencia (hasta 4):</label>
                     <input type="file" class="form-control-file" id="documento1" name="documento1" accept=".pdf">
                     <input type="file" class="form-control-file" id="documento2" name="documento2" accept=".pdf">
                     <input type="file" class="form-control-file" id="documento3" name="documento3" accept=".pdf">
                     <input type="file" class="form-control-file" id="documento4" name="documento4" accept=".pdf">
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
               <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            <?php
            $ControladorGestionCombustible->ctrCrearGestionCombustible($_POST);
            ?>

         </form>
      </div>
   </div>
</div>

<!-- Modal para editar registro de abastecimiento -->

<div id="modalEditarGestionCombustible" class="modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-wide">

      <div class="modal-content">
         <form id="formEditarGestionCombustible" method="post" enctype="multipart/form-data">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Editar Registro de Abastecimiento</h4>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-lg-6 form-group">
                     <label>Fecha:</label>
                     <input type="hidden" id="idGestionCombustibleEditar" name="idGestionCombustibleEditar" value="">
                     <input type="date" class="form-control" id="editarFechaAbastecimiento" name="editarFechaAbastecimiento" required>
                  </div>
                  <div class="col-lg-6 form-group">
                     <label>Hora:</label>
                     <input type="time" class="form-control" id="editarHoraAbastecimiento" name="editarHoraAbastecimiento" required>
                  </div>
                  <div class="col-lg-6 form-group">
                     <label>Estación de Servicio:</label>
                     <input type="text" class="form-control" id="editarEstacionServicio" name="editarEstacionServicio" required>
                  </div>
                  <div class="col-lg-6 form-group">
                     <label>Litros Cargados:</label>
                     <input type="number" class="form-control" id="editarLitrosCargados" step="0.01" name="editarLitrosCargados" required>
                  </div>
                  <div class="col-lg-6 form-group">
                     <label>Costo por Litro:</label>
                     <input type="number" class="form-control" id="editarCostoPorLitro" step="0.01" name="editarCostoPorLitro" required>
                  </div>
                  <div class="col-lg-6 form-group">
                     <label>Total Pagado:</label>
                     <input type="number" class="form-control" id="editarTotalPagado" step="0.01" name="editarTotalPagado" required>
                  </div>
                  <div class="col-lg-6 form-group">
                     <label>Placa del Vehículo:</label>
                     <input type="text" class="form-control" id="editarPlacaVehiculo" name="editarPlacaVehiculo" required>
                  </div>
                  <div class="col-lg-6 form-group">
                     <label>Tipo de Combustible:</label>
                     <select class="form-control" id="editarTipoCombustible" name="editarTipoCombustible">
                        <option value="Gasolina">Gasolina</option>
                        <option value="Diesel">Diésel</option>
                        <option value="GLP">GLP</option>
                        <option value="GNB">GNB</option>
                     </select>
                  </div>
                  <div class="col-lg-6 form-group">
                     <label>RUC del Proveedor:</label>
                     <input type="text" class="form-control" id="editarRucProveedor" name="editarRucProveedor" required>
                  </div>
                  <div class="col-lg-6 form-group">
                     <label>Kilómetros Recorridos:</label>
                     <input type="number" class="form-control" id="editarKilometrosRecorridos" name="editarKilometrosRecorridos" step="0.01" required>
                  </div>
                  <div class="col-lg-6 form-group">
                     <label>Forma de Pago:</label>
                     <select class="form-control" id="editarFormaPago" name="editarFormaPago">
                        <option value="Efectivo">Efectivo</option>
                        <option value="Credito">Crédito</option>
                     </select>
                  </div>
                  <div class="col-lg-12 form-group">
                     <label>Notas Adicionales:</label>
                     <textarea class="form-control" id="editarNotasAdicionales" name="editarNotasAdicionales" rows="3"></textarea>
                  </div>
                  <div class="col-lg-12 form-group">
                     <label>Documentos de Evidencia (hasta 4):</label>
                     <input type="hidden" id="editarDocumento1Db" name="editarDocumento1Db">
                     <input type="file" class="form-control-file" id="editarDocumento1" name="editarDocumento1" accept=".pdf">

                     <input type="hidden" id="editarDocumento2Db" name="editarDocumento2Db">
                     <input type="file" class="form-control-file" id="editarDocumento2" name="editarDocumento2" accept=".pdf">

                     <input type="hidden" id="editarDocumento3Db" name="editarDocumento3Db">
                     <input type="file" class="form-control-file" id="editarDocumento3" name="editarDocumento3" accept=".pdf">

                     <input type="hidden" id="editarDocumento4Db" name="editarDocumento4Db">
                     <input type="file" class="form-control-file" id="editarDocumento4" name="editarDocumento4" accept=".pdf">
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
               <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            <?php
            if (isset($_POST['idGestionCombustibleEditar']) && !empty($_POST['idGestionCombustibleEditar'])) {
               echo json_encode($_POST);

               $ControladorGestionCombustible->ctrActualizarGestionCombustible($_POST);

               echo '<script>
                     document.getElementById("idGestionCombustibleEditar").value = "";
                     </script>';
            }
            ?>
         </form>
      </div>
   </div>
</div>

<script>
   am4core.ready(function() {
      var chart;

      am4core.useTheme(am4themes_animated);
      chart = am4core.create("chartdiv", am4charts.XYChart);
      chart.data = [{
         estacion: "Estación Inicial",
         costoLitro: 3.65
      }];

      var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
      categoryAxis.dataFields.category = "estacion";
      categoryAxis.renderer.grid.template.location = 0;
      categoryAxis.renderer.minGridDistance = 30;

      var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

      var series = chart.series.push(new am4charts.ColumnSeries());
      series.dataFields.valueY = "costoLitro";
      series.dataFields.categoryX = "estacion";
      series.name = "Costo por Litro";
      series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
      series.columns.template.fillOpacity = .8;

      var columnTemplate = series.columns.template;
      columnTemplate.strokeWidth = 2;
      columnTemplate.strokeOpacity = 1;

      function addChartData(chart, data) {
         chart.addData(data);
         chart.invalidateData();
      }

      function cargarDatos() {
         $.ajax({
            url: "modelos/gestion-combustible.modelo.php",
            method: "POST",
            data: {
               ajaxservice: 'loadData'
            },
            dataType: "json",
            success: function(respuesta) {
               $('#tablaAbastecimiento tbody').empty();
               if (respuesta && respuesta.length > 0) {
                  $.each(respuesta, function(index, registro) {
                     var fila = '<tr>' +
                        '<td>' + registro.id + '</td>' +
                        '<td>' + registro.fecha_abastecimiento + '</td>' +
                        '<td>' + registro.hora_abastecimiento + '</td>' +
                        '<td>' + registro.estacion_servicio + '</td>' +
                        '<td>' + registro.litros_cargados + '</td>' +
                        '<td>' + registro.costo_litro + '</td>' +
                        '<td>' + registro.total_pagado + '</td>' +
                        '<td>' + registro.placa_vehiculo + '</td>' +
                        '<td>' + registro.tipo_combustible + '</td>' +
                        '<td>' + registro.ruc_probeedor + '</td>' +
                        '<td>' + registro.kilometros_recorridos + '</td>' +
                        '<td>' + registro.forma_pago + '</td>' +
                        '<td>' + registro.notas_adicionales + '</td>' +
                        '<td>';

                           // Crear hipervínculos o íconos deshabilitados según el contenido de los documentos
                           var documentos = [registro.doc1, registro.doc2, registro.doc3, registro.doc4];
                           documentos.forEach(function(doc) {
                              if (doc) {
                                 fila += '<a href="' + doc + '" target="_blank">  <i class="fa fa-file"> Documento</i></a> <br>';

                              } else {
                                 fila += '<i class="fa fa-file text-muted"> Documento </i> <br>';

                              }
                           });

                     fila += '</td>' +
                        '<td>' +
                        '<center>' +
                        '<a style="margin-top: 4px !important" href="javascript:void(0);" class="btn btn-info btn-xs btnEditarGestionCombustible" data-id="' + registro.id + '"  data-toggle="modal" data-target="#modalEditarGestionCombustible"><i class="fa fa-pencil"></i> Editar</a>' +
                        '<a style="margin-top: 4px !important" href="javascript:void(0);" class="btn btn-danger btn-xs btnEliminarGestionCombustible" data-id="' + registro.id + '"  data-toggle="modal" data-target="#modallEliminarGestionCombustible"><i class="fa fa-pencil"></i> Eliminar</a>' +
                        '</center>' +
                        '<br>' +
                        '</td>' +
                        '</tr>';
                     $('#tablaAbastecimiento tbody').append(fila);
                  })
                  let list2 = respuesta.map(e => ({
                     estacion: e.estacion_servicio,
                     costoLitro: parseFloat(e.costo_litro)
                  }));
                  rederGrafico(list2);
               }

            },
            error: function(xhr, status, error) {
               console.error("Error en la solicitud AJAX:", error);
            }
         });
      };

      function rederGrafico(list) {
         chart.data = list;
         chart.invalidateData;
      }

      function cargarGrafico(chart, estacion, costo_litro) {
         var newData1 = {
            estacion: estacion,
            costoLitro: costo_litro
         };
         addChartData(chart, newData1);
      }
      $(document).ready(function() {
         cargarDatos();
      });

      $(document).on('click', '.btnEditarGestionCombustible', function() {
         var idA = $(this).data('id');
         var datos = new FormData();
         datos.append("idaa", idA);
         datos.append("ajaxservice", 'loadEdit');
         $("#idGestionCombustibleEditar").val($(this).data('id'));
         $.ajax({
            url: "modelos/gestion-combustible.modelo.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(item) {
               $("#idGestionCombustibleEditar").val(item.id);
               $("#editarFechaAbastecimiento").val(item.fecha_abastecimiento);
               $("#editarHoraAbastecimiento").val((item.hora_abastecimiento ?? "").substring(0, 5));
               $("#editarEstacionServicio").val(item.estacion_servicio);
               $("#editarLitrosCargados").val(item.litros_cargados);
               $("#editarCostoPorLitro").val(item.costo_litro);
               $("#editarTotalPagado").val(item.total_pagado);
               $("#editarPlacaVehiculo").val(item.placa_vehiculo);
               $("#editarTipoCombustible").val(item.tipo_combustible);
               $("#editarRucProveedor").val(item.ruc_probeedor);
               $("#editarKilometrosRecorridos").val(item.kilometros_recorridos);
               $("#editarFormaPago").val(item.forma_pago);
               $("#editarNotasAdicionales").val(item.notas_adicionales);
               $("#editarDocumento1Db").val(item.doc1);
               $("#editarDocumento2Db").val(item.doc2);
               $("#editarDocumento3Db").val(item.doc3);
               $("#editarDocumento4Db").val(item.doc4);
            }
         })
      });

      $(document).on('click', '.btnEliminarGestionCombustible', function() {
         var idA = $(this).data('id');
         var confirmar = confirm("¿Estás seguro de que quieres eliminar esta gestion de combustible?");
         if (confirmar) {
            var datos = new FormData();
            datos.append("idEliminar", idA);
            datos.append("ajaxservice", 'eliminarGestionCombustible');
            $("#idGestionCombustibleEditar").val($(this).data('id'));

            $.ajax({
               url: "modelos/gestion-combustible.modelo.php",
               method: "POST",
               data: datos,
               cache: false,
               contentType: false,
               processData: false,
               dataType: "json",
               success: function(respuesta) {
                  if (respuesta == "ok") {
                     alert("Gestion de combustible eliminado correctamente");
                     cargarDatos();
                  } else {
                     alert("Error al eliminar el activo fijo. Por favor, inténtalo de nuevo.");
                  }
               }
            });
         }
      });
   });

   function limpiarFormulario() {
      // Seleccionar el formulario por su ID
      var form = document.getElementById("formEditarGestionCombustible");

      // Recorrer todos los elementos del formulario
      for (var i = 0; i < form.elements.length; i++) {
         var element = form.elements[i];

         // Limpiar el valor de los campos de texto, select y textarea
         if (element.tagName === "INPUT" || element.tagName === "SELECT" || element.tagName === "TEXTAREA") {
            element.value = "";
         }

         // Limpiar el valor de los campos de archivo (input type="file")
         if (element.type === "file") {
            element.value = null;
         }
      }
   }

   $("#searchInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#tablaAbastecimiento tbody tr").filter(function() {
         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
   });
</script>