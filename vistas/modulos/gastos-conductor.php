<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<style>
  .modal-dialog-wide {
    width: 90%;
    max-width: none;
  }
  .foto-input {
    margin-bottom: 10px;
  }
  .img-thumbnail-custom {
    width: 10px;
    height: 40px;
    object-fit: cover; /* Ajusta la imagen para que se recorte o se ajuste, manteniendo su aspecto */
}
</style>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Registro de Gastos<small>Gestión integral de gastos de conductores</small></h1>
    </section>
    <?php 
        require_once "controladores/gastos-conductor.controlador.php";
        require_once "modelos/gastos-conductor.modelo.php";
        $ControladorGastosConductor = new ControladorGastosConductor();
    ?>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarGasto">
                            <i class="fa fa-plus-square"></i> Agregar Gasto
                        </button>
                    </div>
                    <div class="box-body">
                    <BR>


                    <input type="text" id="searchInput" placeholder="Buscar en la tabla..." class="form-control" style='width: 300px;float: right; margin-bottom: 10px'>


                        <table id="tablaGastos" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Fecha</th>
                                    <th>Lugar de Partida</th>
                                    <th>Lugar de Destino</th>
                                    <th>Tipo de Moneda</th>
                                    <th>Monto</th>
                                    <th>Comentarios</th>
                                    <th>Fotos</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal para agregar/editar gasto -->
<div id="modalAgregarGasto" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-wide">
        <div class="modal-content">
            <form id="formGasto" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar/Editar Gasto</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <label for="fechaGasto">Fecha:</label>
                            <input type="date" class="form-control" id="fechaGasto" name="fechaGasto" required>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="lugarPartida">Lugar de Partida:</label>
                            <input type="text" class="form-control" id="lugarPartida" name="lugarPartida" required>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="lugarDestino">Lugar de Destino:</label>
                            <input type="text" class="form-control" id="lugarDestino" name="lugarDestino" required>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="tipoMoneda">Tipo de Moneda:</label>
                            <select class="form-control select2" id="tipoMoneda" name="tipoMoneda" style="width: 100%;">
                                <option value="PEN">Sol (PEN)</option>
                                <option value="USD">Dólar (USD)</option>
                            </select>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="montoGasto">Monto:</label>
                            <input type="number" class="form-control" id="montoGasto" name="montoGasto" required step="0.01">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="comentariosGasto">Comentarios:</label>
                            <textarea class="form-control" id="comentariosGasto" name="comentariosGasto" rows="3"></textarea>
                        </div>
                        <div class="col-lg-12">
                            <label>Fotos de Evidencia:</label>
                            <input type="file" class="form-control-file foto-input" id="foto1" name="foto1" accept="image/*">
                            <input type="file" class="form-control-file foto-input" id="foto2" name="foto2" accept="image/*">
                            <input type="file" class="form-control-file foto-input" id="foto3" name="foto3" accept="image/*">
                            <input type="file" class="form-control-file foto-input" id="foto4" name="foto4" accept="image/*">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                <?php
                    $ControladorGastosConductor ->ctrCrearGastosConductor($_POST);
                ?>
            </form>
        </div>
    </div>
</div>

<!-- Modal para editar gasto -->
<div id="modalEditarGastosConductor" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-wide">
        <div class="modal-content">
            <form id="formEditarGasto" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar/Editar Gasto</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <label for="editarFechaGasto">Fecha:</label>
                            <input type="hidden" id="idGastosConductorEditar" name="idGastosConductorEditar" value="valorDeseado">
                            <input type="date" class="form-control" id="editarFechaGasto" name="editarFechaGasto" required>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="editarLugarPartida">Lugar de Partida:</label>
                            <input type="text" class="form-control" id="editarLugarPartida" name="editarLugarPartida" required>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="editarLugarDestino">Lugar de Destino:</label>
                            <input type="text" class="form-control" id="editarLugarDestino" name="editarLugarDestino" required>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="editarTipoMoneda">Tipo de Moneda:</label>
                            <select class="form-control select2" id="editarTipoMoneda" name="editarTipoMoneda" style="width: 100%;">
                                <option value="PEN">Sol (PEN)</option>
                                <option value="USD">Dólar (USD)</option>
                            </select>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="editarMontoGasto">Monto:</label>
                            <input type="number" class="form-control" id="editarMontoGasto" name="editarMontoGasto" required step="0.01">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="editarComentariosGasto">Comentarios:</label>
                            <textarea class="form-control" id="editarComentariosGasto" name="editarComentariosGasto" rows="3"></textarea>
                        </div>
                        <div class="col-lg-12">
                            <label>Fotos de Evidencia:</label>

                            <input type="hidden" id ="editarFoto1Db" name="editarFoto1Db">
                            <input type="file" class="form-control-file foto-input" id="editarfoto1" name="editarfoto1" accept="image/*">
                            <img id="previsualizarImagen1" src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                            
                            <input type="hidden" id ="editarFoto2Db" name="editarFoto2Db">
                            <input type="file" class="form-control-file foto-input" id="editarfoto2" name="editarfoto2" accept="image/*">
                            <img id="previsualizarImagen2" src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                            
                            <input type="hidden" id ="editarFoto3Db" name="editarFoto3Db">
                            <input type="file" class="form-control-file foto-input" id="editarfoto3" name="editarfoto3" accept="image/*">
                            <img id="previsualizarImagen3" src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                            
                            <input type="hidden" id ="editarFoto4Db" name="editarFoto4Db">
                            <input type="file" class="form-control-file foto-input" id="editarfoto4" name="editarfoto4" accept="image/*">
                            <img id="previsualizarImagen4" src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                <?php
                    if(isset($_POST['idGastosConductorEditar']) && !empty($_POST['idGastosConductorEditar'])){
                        $ControladorGastosConductor ->ctrActualizarGastosConductor($_POST);
                        
                        echo '<script>
                                document.getElementById("idGastosConductorEditar").value = "";
                             </script>';
                    }
                ?>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        cargarDato();
    });
    function cargarDato(){
        $.ajax({
            url: "modelos/gastos-conductor.modelo.php",
            method: "POST",
            data: {ajaxservice: 'loadData'},
            dataType: "json",
            success:function (respuesta){
                $('#tablaGastos tbody').empty();
                if(respuesta && respuesta.length > 0){
                    $.each(respuesta, function (index, registro){
                        var fila = '<tr>'+
                        '<td>'+registro.id+'</td>'+
                        '<td>'+registro.fecha_gasto+'</td>'+
                        '<td>'+registro.lugar_partida+'</td>'+
                        '<td>'+registro.lugar_destino+'</td>'+
                        '<td>'+registro.tipo_moneda+'</td>'+
                        '<td>'+registro.monto_gasto+'</td>'+
                        '<td>'+registro.comentarios_gasto+'</td>'+
                        '<td>'+
                            '<img src="'+registro.foto1+'" onerror="this.onerror=null;this.src=\'vistas/img/productos/default/anonymous.png\';" class="img-thumbnail-custom">'+
                            '<img src="'+registro.foto2+'" onerror="this.onerror=null;this.src=\'vistas/img/productos/default/anonymous.png\';" class="img-thumbnail-custom">'+
                            
                            '<img src="'+registro.foto3+'" onerror="this.onerror=null;this.src=\'vistas/img/productos/default/anonymous.png\';" class="img-thumbnail-custom">'+
                            '<img src="'+registro.foto4+'" onerror="this.onerror=null;this.src=\'vistas/img/productos/default/anonymous.png\';" class="img-thumbnail-custom">'+
                        '</td>'+
                        '<td>'+
                            '<center>'+
                                    '<a style="margin-top: 4px !important" href="javascript:void(0);" class="btn btn-info btn-xs btnEditarGastosConductor" data-id="' + registro.id + '"  data-toggle="modal" data-target="#modalEditarGastosConductor"><i class="fa fa-pencil"></i> Editar</a>'+
                                    '<a style="margin-top: 4px !important" href="javascript:void(0);" class="btn btn-danger btn-xs btnEliminarGastosConductor" data-id="' + registro.id + '"  data-toggle="modal" data-target="#modalEliminarGastosConductor"><i class="fa fa-pencil"></i> Eliminar</a>'+
                            '</center>'+
                            '<br>'+
                        '</td>'+
                        '</tr>';
                        $('#tablaGastos tbody').append(fila);
                    })
                }

            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
            }
        });
    };
    $(document).on('click', '.btnEditarGastosConductor', function(){
        var idA = $(this).data('id');
        var datos = new FormData();
        datos.append("idaa", idA);
        datos.append("ajaxservice", 'loadEdit');
        $("#idGastosConductorEditar").val($(this).data('id'));
        $.ajax({
            url: "modelos/gastos-conductor.modelo.php",
            method: "POST",
            data:datos,
            cache:false,
            contentType:false,
            processData:false,
            dataType: "json",
            success:function(item){
                $("#idGastosConductorEditar").val(item.id);
                $("#editarFechaGasto").val(item.fecha_gasto);
                $("#editarLugarPartida").val(item.lugar_partida);
                $("#editarLugarDestino").val(item.lugar_destino);
                $("#editarTipoMoneda").val(item.tipo_moneda);
                $("#editarMontoGasto").val(item.monto_gasto);
                $("#editarComentariosGasto").val(item.comentarios_gasto);
                $("#editarFoto1Db").val(item.foto1);
                $("#editarFoto2Db").val(item.foto2);
                $("#editarFoto3Db").val(item.foto3);
                $("#editarFoto4Db").val(item.foto4);

                if(item.foto1 && item.foto1.trim() !==""){
                    $('#previsualizarImagen1').attr('src', item.foto1);
                }else{
                    $('#previsualizarImagen1').attr('src', 'vistas/img/productos/default/anonymous.png');
                }

                if(item.foto2 && item.foto2.trim() !==""){
                    $('#previsualizarImagen2').attr('src', item.foto2);
                }else{
                    $('#previsualizarImagen2').attr('src', 'vistas/img/productos/default/anonymous.png');
                }

                if(item.foto3 && item.foto3.trim() !==""){
                    $('#previsualizarImagen3').attr('src', item.foto3);
                }else{
                    $('#previsualizarImagen3').attr('src', 'vistas/img/productos/default/anonymous.png');
                }

                if(item.foto4 && item.foto4.trim() !==""){
                    $('#previsualizarImagen4').attr('src', item.foto4);
                }else{
                    $('#previsualizarImagen4').attr('src', 'vistas/img/productos/default/anonymous.png');
                }
            }
        })
    });
    $(document).on('click', '.btnEliminarGastosConductor', function(){
        var idA = $(this).data('id');
        var confirmar =confirm("¿Estás seguro de que quieres eliminar este activo fijo?");
        if(confirmar){
            var datos = new FormData();
            datos.append("idEliminar", idA);
            datos.append("ajaxservice", 'eliminar');
            $("#idGastosConductorEditar").val($(this).data('id'));

            $.ajax({
                url: "modelos/gastos-conductor.modelo.php",
                method: "POST",
                data:datos,
                cache:false,
                contentType:false,
                processData:false,
                dataType: "json",
                success:function(respuesta){
                    if(respuesta == "ok"){
                        alert("Gasto de conductor eliminado correctamente");
                        cargarDato();
                    }else{
                        alert("Error al eliminar el Gato de conductor. Por favor, inténtalo de nuevo.");
                    }
                }
            })
        }
    })

    $("#searchInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#tablaGastos tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    
</script>
