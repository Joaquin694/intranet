/* --------------------------------------------------------------------------------------------------*/
/*EN EL BOTON EDITAR DE PRODUCTOS METEREMOS ESTA FUNCION QUE TOMARA EL CAMPO codigo DE 

LA TABLA PRODUCTO A FIN DE CRUZARLA CON LA TABLA INGRESOS Y FINALMENTE DELIVERAR SI DEBE

PRECARGAR LA PARTE DEL MODAL DE EDICION QUE TIENE LOS CAMPOS DE INGRESOS CON DATA O SIN DATA



ADEMAS TOMARA EL NOMBRE DEL PRODUCTO CONTENIDO EN LA COLUMNA DESCRIPCION DE LA TABLA PRODUCTOS 

PARA CRUZARLA CON LA TABLA DATOS MAESTROS Y FINALMENTE LLENAR EL CAMPO fk_dm_productos DE LA TABLA

PRODUCTOS ESTA HACE REFERENCIA A BARCODE ---> MOALI + correlativo de producto datos maestros + 07 */
function precargProdFormAndBarcode(idcodigoProducto) {
    var idcodigoProducto = idcodigoProducto;
    var accionar = 'renderEdit';
    var dataen = 'idcodigoProducto=' + idcodigoProducto + '&accionar=' + accionar;
    $.ajax({
        type: 'post',
        url: 'modelos/logistica.modelo.php',
        data: dataen,
        success: function (resp) {
            $("#AcaS").html(resp);
        }
    });
    return false;
}
/* --------------------------------------------------------------------------------------------------*/
function mdlModalDat(idEdita) { /*LANZAR ID AND MODAL EDITABLE*/
    var idEdita = idEdita;
    var sellecionar = 'sellecionar';
    var dataen = 'idEdita=' + idEdita + '&accionar=' + sellecionar;
    $.ajax({
        type: 'post',
        url: 'modelos/productosAbadModelo.php',
        data: dataen,
        success: function (resp) {
            $("#successSidmdpEdit").html(resp);
        }
    });
    return false;
}
/* --------------------------------------------------------------------------------------------------*/
function mdlModalEliminDat(idEdita) {
    var dataen = { idEdita: idEdita, accionar: 'deletear' };

    // Uso correcto de SweetAlert2
    Swal.fire({
        title: '¿Está seguro de borrar el producto?',
        text: "¡Si no lo está puede cancelar la acción!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sí, borrar producto!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'post',
                url: 'modelos/productosAbadModelo.php',
                data: dataen,
                success: function (resp) {
                    $("#alertdelete1").html(resp);

                    // Mostrar alerta de éxito
                    Swal.fire({
                        title: '¡Producto eliminado!',
                        text: 'El producto ha sido eliminado correctamente.',
                        icon: 'success',
                        confirmButtonText: 'Cerrar'
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error en la solicitud AJAX:', status, error);
                    Swal.fire({
                        title: 'Error',
                        text: 'Ocurrió un error al procesar la solicitud.',
                        icon: 'error',
                        confirmButtonText: 'Cerrar'
                    });
                }
            });
        }
    });
}

/*=============================================

SEND SAVE EDITION 

=============================================*/
function sendSaveEditionPDM() {
    var pk_producto_dmi = document.getElementById('f3t3').value;
    var nombre_producto_dm = document.getElementById('f1t1').value;
    var descripccion_dm = document.getElementById('f2t2').value;
    var sellecionar = 'editar';
    var dataen = { pk_producto_dm: pk_producto_dmi, nombre_producto_dm: nombre_producto_dm, descripccion_dm: descripccion_dm, accionar: sellecionar };
    $.ajax({
        type: 'post',
        url: 'modelos/productosAbadModelo.php',
        data: dataen,
        success: function (resp) {
            $("#alertaDmdp").html(resp);
        }
    });
    return false;
}
/*=============================================

SEND INSVENTARIOS DATA MAESTRA DE PRODUCTOS

=============================================*/
function sendFormProductosDm() {
    var nombre_producto_dm = document.getElementById('nombre_producto_dm').value;
    var descripccion_dm = document.getElementById('descripccion_dm').value;
    var SidmdpAccion = document.getElementById('SidmdpAccion').value;
    var dataen = { nombre_producto_dm: nombre_producto_dm, descripccion_dm: descripccion_dm, accionar: SidmdpAccion };
    $.ajax({
        type: 'post',
        url: 'modelos/productosAbadModelo.php',
        data: dataen,
        success: function (resp) {
            $("#successSidmdp").html(resp);
            $('input[type="text"]').val('');
        }
    });
    return false;
}
/*=============================================

SEND LOGISTICA SIN REWFRESH FALTA ENVIAR AL MODELO

=============================================*/
function onChangeSelect(a1, a2, a3, a4, a5, a6, a7, a8, a9) {
    var a1 = document.getElementById(a1).value;
    var a2 = document.getElementById(a2).value;
    var a3 = document.getElementById(a3).value;
    var a4 = document.getElementById(a4).value;
    var a5 = document.getElementById(a5).value;
    var a6 = document.getElementById(a6).value;
    var a7 = document.getElementById(a7).value;
    var a8 = document.getElementById(a8).value;
    var accionar = document.getElementById(a9).value;
    var dataen = 'a1=' + a1 + '&a2=' + a2 + '&a3=' + a3 + '&a4=' + a4 + '&a5=' + a5 + '&a6=' + a6 + '&a7=' + a7 + '&a8=' + a8 + '&accionar=' + accionar;
    $.ajax({
        type: 'post',
        url: 'modelos/logistica.modelo.php',
        data: dataen,
        success: function (resp) {
            $("#AcaS").html(resp);
        }
    });
    return false;
}
/*=============================================

ACTIVAR LOS BOTONES CON LOS ID CORRESPONDIENTES

=============================================*/
// $('.tablaProductos tbody').on( 'click', 'button', function () {
//  var data = table.row( $(this).parents('tr') ).data();
//  $(this).attr("idProducto", data[9]) 
//  $(this).attr("codigo", data[2]) 
//  $(this).attr("imagen", data[1]) 
// } );
/*=============================================

FUNCIÓN PARA CARGAR LAS IMÁGENES

=============================================*/
function cargarImagenes() {
    var imgTabla = $(".imgTabla");
    var limiteStock = $(".limiteStock");
    for (var i = 0; i < imgTabla.length; i++) {
        var data = table.row($(imgTabla[i]).parents("tr")).data();
        $(imgTabla[i]).attr("src", data[1]);
        if (data[5] <= 10) {
            $(limiteStock[i]).addClass("btn-danger");
            $(limiteStock[i]).html(data[5]);
        } else if (data[5] > 11 && data[5] <= 15) {
            $(limiteStock[i]).addClass("btn-warning");
            $(limiteStock[i]).html(data[5]);
        } else {
            $(limiteStock[i]).addClass("btn-success");
            $(limiteStock[i]).html(data[5]);
        }
    }
}
/*=============================================

CARGAMOS LAS IMÁGENES CUANDO ENTRAMOS A LA PÁGINA POR PRIMERA VEZ

=============================================*/
setTimeout(function () {
    cargarImagenes();
    if ($(".perfilUsuario").val() != "Administrador") {
        $('.btnEliminarProducto').remove();
    }
}, 300)
/*=============================================

CARGAMOS LAS IMÁGENES CUANDO INTERACTUAMOS CON EL PAGINADOR

=============================================*/
$(".dataTables_paginate").click(function () {
    cargarImagenes();
})
/*=============================================

CARGAMOS LAS IMÁGENES CUANDO INTERACTUAMOS CON EL BUSCADOR

=============================================*/
$("input[aria-controls='DataTables_Table_0']").focus(function () {
    $(document).keyup(function (event) {
        event.preventDefault();
        cargarImagenes();
    })
})
/*=============================================

CARGAMOS LAS IMÁGENES CUANDO INTERACTUAMOS CON EL FILTRO DE CANTIDAD

=============================================*/
$("select[name='DataTables_Table_0_length']").change(function () {
    cargarImagenes();
})
/*=============================================

CARGAMOS LAS IMÁGENES CUANDO INTERACTUAMOS CON EL FILTRO DE ORDENAR

=============================================*/
$(".sorting").click(function () {
    cargarImagenes();
})
/*=============================================

CAPTURANDO LA CATEGORIA PARA ASIGNAR CÓDIGO

=============================================*/
// $("#nuevaCategoria").change(function(){
//  var idCategoria = $(this).val();
//  var datos = new FormData();
//    datos.append("idCategoria", idCategoria);
//    $.ajax({
//       url:"ajax/productos.ajax.php",
//       method: "POST",
//       data: datos,
//       cache: false,
//       contentType: false,
//       processData: false,
//       dataType:"json",
//       success:function(respuesta){
//        if(!respuesta){
//          var nuevoCodigo = idCategoria+"01";
//          $("#nuevoCodigo").val(nuevoCodigo);
//        }else{
//          var nuevoCodigo = Number(respuesta["codigo"]) + 1;
//            $("#nuevoCodigo").val(nuevoCodigo);
//        }
//       }
//    })
// })
/*=============================================
AGREGANDO PRECIO DE VENTA
=============================================*/
// Evento que se desencadena al cambiar los campos relacionados
$("#nuevoPrecioCompra, #editarPrecioCompra, #porcentajeRi, input[name='tipoPorcentaje'], #tipo_cambio, #tipo_moneda_compra, #tipo_moneda_venta").change(function () {
    // Obtener los valores de los campos
    var tipoCambio = parseFloat($("#tipo_cambio").val());
    var monedaCompra = $("#tipo_moneda_compra").val();
    var monedaVenta = $("#tipo_moneda_venta").val();
    var precioCompra = parseFloat($("#nuevoPrecioCompra").val());

    // Verificar si los campos tienen valores válidos
    if (!isNaN(precioCompra) && !isNaN(tipoCambio) && tipoCambio > 0) {
        
        // Condición 1: Si se compra en dólares y se vende en soles
        if (monedaCompra === "dolares" && monedaVenta === "soles") {
            // Convertir el precio de compra de dólares a soles
            precioCompra = precioCompra * tipoCambio;
        }
        // Condición 2: Si se compra en soles y se vende en dólares
        else if (monedaCompra === "soles" && monedaVenta === "dolares") {
            // Convertir el precio de compra de soles a dólares
            precioCompra = precioCompra / tipoCambio;
        }

        // Calcular el nuevo precio de venta
        if ($(".porcentaje").prop("checked")) {
            var valorPorcentaje = parseFloat($("#porcentajeRi").val());
            var tipoPorcentaje = $("input[name='tipoPorcentaje']:checked").val();
            var nuevoPrecioVenta;

            // Aplicar el porcentaje dependiendo de si es "alza" o "baja"
            if (tipoPorcentaje === "alza") {
                nuevoPrecioVenta = precioCompra + (precioCompra * valorPorcentaje / 100);
            } else if (tipoPorcentaje === "baja") {
                nuevoPrecioVenta = precioCompra - (precioCompra * valorPorcentaje / 100);
            }

            // Actualizar el valor del campo de nuevo precio de venta
            $("#nuevoPrecioVenta").val(nuevoPrecioVenta.toFixed(2));
            $("#nuevoPrecioVenta").prop("readonly", true);
        }
    }
});

/*=============================================

CAMBIO DE PORCENTAJE

=============================================*/
$(".nuevoPorcentaje").change(function () {
    // Obtener el porcentaje y el valor de compra actual
    var valorPorcentaje = parseFloat($(this).val());
    var precioCompra = parseFloat($("#nuevoPrecioCompra").val());
    var tipoCambio = parseFloat($("#tipo_cambio").val());
    var monedaCompra = $("#tipo_moneda_compra").val();
    var monedaVenta = $("#tipo_moneda_venta").val();

    // Verificar si los valores son válidos
    if (!isNaN(precioCompra) && !isNaN(tipoCambio) && tipoCambio > 0) {

        // Aplicar la lógica de conversión de moneda
        if (monedaCompra === "dolares" && monedaVenta === "soles") {
            precioCompra = precioCompra * tipoCambio;
        } else if (monedaCompra === "soles" && monedaVenta === "dolares") {
            precioCompra = precioCompra / tipoCambio;
        }

        // Verificar si el porcentaje está activado
        if ($(".porcentaje").prop("checked")) {
            var tipoPorcentaje = $("input[name='tipoPorcentaje']:checked").val();
            var nuevoPrecioVenta;

            // Aplicar el porcentaje de aumento o disminución
            if (tipoPorcentaje === "alza") {
                nuevoPrecioVenta = precioCompra + (precioCompra * valorPorcentaje / 100);
            } else if (tipoPorcentaje === "baja") {
                nuevoPrecioVenta = precioCompra - (precioCompra * valorPorcentaje / 100);
            }

            // Actualizar el precio de venta con dos decimales
            $("#nuevoPrecioVenta").val(nuevoPrecioVenta.toFixed(2));
            $("#nuevoPrecioVenta").prop("readonly", true);
        }
    }
});

/*=============================================
MANEJO DE LA SELECCIÓN DE PORCENTAJE
=============================================*/
$(".porcentaje").on("ifUnchecked", function () {
    $("#nuevoPrecioVenta").prop("readonly", false);
    $("#editarPrecioVenta").prop("readonly", false);
});

$(".porcentaje").on("ifChecked", function () {
    $("#nuevoPrecioVenta").prop("readonly", true);
    $("#editarPrecioVenta").prop("readonly", true);
});
/*=============================================

SUBIENDO LA FOTO DEL PRODUCTO

=============================================*/
$(".nuevaImagen").change(function () {
    var imagen = this.files[0];
    /*=============================================

    VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG

    =============================================*/
    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
        $(".nuevaImagen").val("");
        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
    } else if (imagen["size"] > 2000000) {
        $(".nuevaImagen").val("");
        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar más de 2MB!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
    } else {
        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);
        $(datosImagen).on("load", function (event) {
            var rutaImagen = event.target.result;
            $(".previsualizar").attr("src", rutaImagen);
        })
    }
})
/*=============================================

EDITAR PRODUCTO

=============================================*/
$(".tablaProduct tbody").on("click", "button.btnEditarProducto", function () {
    var idProducto = $(this).attr("idProducto");
    var datos = new FormData();
    datos.append("idProducto", idProducto);
    $.ajax({
        url: "ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            var datosCategoria = new FormData();
            datosCategoria.append("idCategoria", respuesta["id_categoria"]);
            $.ajax({
                url: "ajax/categorias.ajax.php",
                method: "POST",
                data: datosCategoria,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {
                    $("#editarCategoria").val(respuesta["id"]);
                    $("#editarCategoria").html(respuesta["categoria"]);
                }
            })
            $("#editarCodigo").val(respuesta["codigo"]);
            $("#editarDescripcion").val(respuesta["descripcion"]);
            $("#editarStock").val(respuesta["stock"]);
            $("#editarPrecioCompra").val(respuesta["precio_compra"]);
            $("#editarPrecioVenta").val(respuesta["precio_venta"]);
            if (respuesta["imagen"] != "") {
                $("#imagenActual").val(respuesta["imagen"]);
                $(".previsualizar").attr("src", respuesta["imagen"]);
            }
        }
    })
})
/*=============================================

ELIMINAR PRODUCTO

=============================================*/
$(".tablaProduct tbody").on("click", "button.btnEliminarProducto", function () {
    var idProducto = $(this).attr("idProducto");
    var codigo = $(this).attr("codigo");
    var imagen = $(this).attr("imagen");
    swal({
        title: '¿Está seguro de borrar el producto?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar producto!'
    }).then((result) => {
        if (result.value) {
            window.location = "index.php?ruta=productos&idProducto=" + idProducto + "&imagen=" + imagen + "&codigo=" + codigo;
        }
    })
})
/*=============================================

CREANDO PRODUCTO CONSULT BARCODE DATO MAESTRO

=============================================*/
$("#modalAgregarProductu").on("change", "#nuevoCodigo", function () {
    var bar_code = $(this).val().toUpperCase(); // Convertir a mayúsculas antes de enviar
    var accionar = "nuevoCodigo";
    var dataen = 'bar_code=' + bar_code + '&accionar=' + accionar;
    $.ajax({
        type: 'post',
        url: 'modelos/productosAbadModelo.php',
        data: dataen,
        success: function (resp) {
            $('#nuevaDescripcion').html(resp);
        }
    });
    return false;
});

$("#nuevoCodigo").on("input", function () {
    $(this).val($(this).val().trim().toUpperCase());
});

/*=============================================

GUARDADO DE NUEVO PRODUCTO ABAD
=============================================*/
$('#formNewProxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx').submit(function () {
    swal({
        title: '¿Está seguro de reaizar este registro? 2',
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
            var tipo_compra = $("#tipo_compra").val();
            var tipo_venta = $("#tipo_venta").val();
            var accionar = "formNewPro";
            var dataen = 'bar_code=' + bar_code + '&nuevaalmacenes=' + nuevaalmacenes + '&serieComprobante=' + serieComprobante + '&correlativoComprobante=' + correlativoComprobante + '&numDocIdentidadProveedor=' + numDocIdentidadProveedor + '&nuevoLote=' + nuevoLote + '&nuevaFechaVencimiento=' + nuevaFechaVencimiento + '&porcentajeRi=' + porcentajeRi + '&fk_dm_productos=' + fk_dm_productos + '&nuevaDescripcion=' + nuevaDescripcion + '&nuevaCategoria=' + nuevaCategoria + '&nuevoStock=' + nuevoStock + '&nuevoPrecioCompra=' + nuevoPrecioCompra + '&nuevoPrecioVenta=' + nuevoPrecioVenta + '&tipo_venta' + tipo_venta + '&tipo_compra'+ tipo_compra +'&accionar=' + accionar;
            $.ajax({
                type: 'post',
                url: 'modelos/productosAbadModelo.php',
                data: dataen,
                success: function (resp) {
                    $('#alertForm').html(resp);
                    setTimeout(function () {
                        $("#formNewPro")[0].reset();
                    }, 3000);
                }
            });
            return false;
        }
    })
    return false;
})