/*=============================================

CARGAR LA TABLA DINÁMICA

=============================================*/



var table2 = $('.tablaVentas').DataTable({



	"ajax":"ajax/datatable-ventas.ajax.php",

	"columnDefs": [



		{

			"targets": -5,

			 "data": null,

			 "defaultContent": '<img class="img-thumbnail imgTablaVenta" width="60px">'



		},



		{

			"targets": -2,

			 "data": null,

			 "defaultContent": '<div class="btn-group"><button class="btn btn-success limiteStock"></button></div>'



		},



		{

			"targets": -1,

			 "data": null,

			 "defaultContent": '<div class="btn-group"><button class="btn btn-primary agregarProducto recuperarBoton" idProducto>Agregar</button></div>'



		}



	],



	"language": {



		"sProcessing":     "Procesando...",

		"sLengthMenu":     "Mostrar _MENU_ registros",

		"sZeroRecords":    "No se encontraron resultados",

		"sEmptyTable":     "Ningún dato disponible en esta tabla",

		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",

		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",

		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",

		"sInfoPostFix":    "",

		"sSearch":         "Buscar:",

		"sUrl":            "",

		"sInfoThousands":  ",",

		"sLoadingRecords": "Cargando...",

		"oPaginate": {

		"sFirst":    "Primero",

		"sLast":     "Último",

		"sNext":     "Siguiente",

		"sPrevious": "Anterior"

		},

		"oAria": {

			"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",

			"sSortDescending": ": Activar para ordenar la columna de manera descendente"

		}



	}



})



/*=============================================

ACTIVAR LOS BOTONES CON LOS ID CORRESPONDIENTES

=============================================*/



$(".tablaVentas tbody").on( 'click', 'button.agregarProducto', function () {



	var data = table2.row( $(this).parents('tr') ).data();



	$(this).attr("idProducto",data[5]);



})



/*=============================================

FUNCIÓN PARA CARGAR LAS IMÁGENES CON EL PAGINADOR Y EL FILTRO

=============================================*/



function cargarImagenesProductos(){



	 var imgTabla = $(".imgTablaVenta");



	 var limiteStock = $(".limiteStock");



	 for(var i = 0; i < imgTabla.length; i ++){



	    var data = table2.row( $(imgTabla[i]).parents('tr') ).data();

	    

	    $(imgTabla[i]).attr("src",data[1]);



	    if(data[4] <= 10){



	    	$(limiteStock[i]).addClass("btn-danger");

	    	$(limiteStock[i]).html(data[4]);



	    }else if(data[4] > 11 && data[4] <= 15){



	    	$(limiteStock[i]).addClass("btn-warning");

	    	$(limiteStock[i]).html(data[4]);

	    

	    }else{



	    	$(limiteStock[i]).addClass("btn-success");

	    	$(limiteStock[i]).html(data[4]);

	    }



  	}





}



setTimeout(function(){



  cargarImagenesProductos()



},500);



/*=============================================

CARGAMOS LAS IMÁGENES CUANDO INTERACTUAMOS CON EL PAGINADOR

=============================================*/



$(".dataTables_paginate").click(function(){



	cargarImagenesProductos()

})



/*=============================================

CARGAMOS LAS IMÁGENES CUANDO INTERACTUAMOS CON EL BUSCADOR

=============================================*/

$("input[aria-controls='DataTables_Table_0']").focus(function(){



	$(document).keyup(function(event){



		event.preventDefault();



		cargarImagenesProductos()



	})





})



/*=============================================

CARGAMOS LAS IMÁGENES CUANDO INTERACTUAMOS CON EL FILTRO DE CANTIDAD

=============================================*/



$("select[name='DataTables_Table_0_length']").change(function(){



	cargarImagenesProductos()



})



/*=============================================

CARGAMOS LAS IMÁGENES CUANDO INTERACTUAMOS CON EL FILTRO DE ORDENAR

=============================================*/



$(".sorting").click(function(){



	cargarImagenesProductos()



})



/*=============================================

AGREGANDO PRODUCTOS A LA VENTA DESDE LA TABLA

=============================================*/



$(".tablaVentas tbody").on("click", "button.agregarProducto", function(){



	var idProducto = $(this).attr("idProducto");



	$(this).removeClass("btn-primary agregarProducto");



	$(this).addClass("btn-default");



	var datos = new FormData();

    datos.append("idProducto", idProducto);



     $.ajax({



     	url:"ajax/productos.ajax.php",

      	method: "POST",

      	data: datos,

      	cache: false,

      	contentType: false,

      	processData: false,

      	dataType:"json",

      	success:function(respuesta){



      	    var descripcion = respuesta["descripcion"];

          	var stock = respuesta["stock"];

          	var precio = respuesta["precio_venta"];



          	$(".nuevoProducto").append(



          	'<div class="row" style="padding:5px 15px">'+



			  '<!-- Descripción del producto -->'+

	          

	          '<div class="col-xs-6" style="padding-right:0px">'+

	          

	            '<div class="input-group">'+

	              

	              '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="'+idProducto+'"><i class="fa fa-times"></i></button></span>'+



	              '<input type="text" class="form-control nuevaDescripcionProducto" idProducto="'+idProducto+'" name="agregarProducto" value="'+descripcion+'" readonly required>'+



	            '</div>'+



	          '</div>'+



	          '<!-- Cantidad del producto -->'+



	          '<div class="col-xs-3">'+

	            

	             '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" stock="'+stock+'" nuevoStock="'+Number(stock-1)+'" required>'+



	          '</div>' +



	          '<!-- Precio del producto -->'+



	          '<div class="col-xs-3 ingresoPrecio" style="padding-left:0px">'+



	            '<div class="input-group">'+



	              '<span class="input-group-addon">S/</span>'+

	                 

	              '<input type="text" class="form-control nuevoPrecioProducto" precioReal="'+precio+'" name="nuevoPrecioProducto" value="'+precio+'" readonly required>'+

	 

	            '</div>'+

	             

	          '</div>'+



	        '</div>') 



	        // SUMAR TOTAL DE PRECIOS



	        sumarTotalPrecios()



	        // AGREGAR IMPUESTO



	        agregarImpuesto()



	        // AGRUPAR PRODUCTOS EN FORMATO JSON



	        listarProductos()



	        // PONER FORMATO AL PRECIO DE LOS PRODUCTOS



	        $(".nuevoPrecioProducto").number(true, 2);



      	}



     })



});



/*=============================================

QUITAR PRODUCTOS DE LA VENTA Y RECUPERAR BOTÓN

=============================================*/



$(".formularioVenta").on("click", "button.quitarProducto", function(){



	$(this).parent().parent().parent().parent().remove();



	var idProducto = $(this).attr("idProducto");



	$("button.recuperarBoton[idProducto='"+idProducto+"']").removeClass('btn-default');



	$("button.recuperarBoton[idProducto='"+idProducto+"']").addClass('btn-primary agregarProducto');



	if($(".nuevoProducto").children().length == 0){



		$("#nuevoImpuestoVenta").val(0);

		$("#nuevoTotalVenta").val(0);

		$("#totalVenta").val(0);

		$("#nuevoTotalVenta").attr("total",0);



	}else{



		// SUMAR TOTAL DE PRECIOS



    	sumarTotalPrecios()



    	// AGREGAR IMPUESTO

	        

        agregarImpuesto()



        // AGRUPAR PRODUCTOS EN FORMATO JSON



        listarProductos()



	}



})



/*=============================================

AGREGANDO PRODUCTOS DESDE EL BOTÓN PARA DISPOSITIVOS

=============================================*/



$(".btnAgregarProducto").click(function(){



	var datos = new FormData();

	datos.append("traerProductos", "ok");



	$.ajax({



		url:"ajax/productos.ajax.php",

      	method: "POST",

      	data: datos,

      	cache: false,

      	contentType: false,

      	processData: false,

      	dataType:"json",

      	success:function(respuesta){

      	    

      	    	$(".nuevoProducto").append(



          	'<div class="row" style="padding:5px 15px">'+



			  '<!-- Descripción del producto -->'+

	          

	          '<div class="col-xs-6" style="padding-right:0px">'+

	          

	            '<div class="input-group">'+

	              

	              '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto><i class="fa fa-times"></i></button></span>'+



	              '<select class="form-control nuevaDescripcionProducto" idProducto name="nuevaDescripcionProducto" required>'+



	              '<option>Seleccione el producto</option>'+



	              '</select>'+  



	            '</div>'+



	          '</div>'+



	          '<!-- Cantidad del producto -->'+



	          '<div class="col-xs-3 ingresoCantidad">'+

	            

	             '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" stock nuevoStock required>'+



	          '</div>' +



	          '<!-- Precio del producto -->'+



	          '<div class="col-xs-3 ingresoPrecio" style="padding-left:0px">'+



	            '<div class="input-group">'+



	              '<span class="input-group-addon">S/</span>'+

	                 

	              '<input type="text" class="form-control nuevoPrecioProducto" precioReal="" name="nuevoPrecioProducto" readonly required>'+

	 

	            '</div>'+

	             

	          '</div>'+



	        '</div>');





	        // AGREGAR LOS PRODUCTOS AL SELECT 



	         respuesta.forEach(funcionForEach);



	         function funcionForEach(item, index){



	         	$(".nuevaDescripcionProducto").append(



					'<option idProducto="'+item.id+'" value="'+item.descripcion+'">'+item.descripcion+'</option>'

	         	)



	         }



	         // SUMAR TOTAL DE PRECIOS



    		sumarTotalPrecios()



    		// AGREGAR IMPUESTO

	        

	        agregarImpuesto()



	        // PONER FORMATO AL PRECIO DE LOS PRODUCTOS



	        $(".nuevoPrecioProducto").number(true, 2);



      	}





	})



})



/*=============================================

SELECCIONAR PRODUCTO

=============================================*/



$(".formularioVenta").on("change", "select.nuevaDescripcionProducto", function(){



	var nombreProducto = $(this).val();



	var nuevoPrecioProducto = $(this).parent().parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");



	var nuevaCantidadProducto = $(this).parent().parent().parent().children(".ingresoCantidad").children(".nuevaCantidadProducto");



	var datos = new FormData();

    datos.append("nombreProducto", nombreProducto);





	  $.ajax({



     	url:"ajax/productos.ajax.php",

      	method: "POST",

      	data: datos,

      	cache: false,

      	contentType: false,

      	processData: false,

      	dataType:"json",

      	success:function(respuesta){

      	    

      	    $(nuevaCantidadProducto).attr("stock", respuesta["stock"]);

      	    $(nuevaCantidadProducto).attr("nuevoStock", Number(respuesta["stock"])-1);

      	    $(nuevoPrecioProducto).val(respuesta["precio_venta"]);

      	    $(nuevoPrecioProducto).attr("precioReal", respuesta["precio_venta"]);



  	      // AGRUPAR PRODUCTOS EN FORMATO JSON



	        listarProductos()



      	}



      })

})



/*=============================================

MODIFICAR LA CANTIDAD

=============================================*/



$(".formularioVenta").on("change", "input.nuevaCantidadProducto", function(){



	var precio = $(this).parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");



	var precioFinal = $(this).val() * precio.attr("precioReal");

	

	precio.val(precioFinal);



	var nuevoStock = Number($(this).attr("stock")) - $(this).val();



	$(this).attr("nuevoStock", nuevoStock);



	if(Number($(this).val()) > Number($(this).attr("stock"))){



		$(this).val(1);



		swal({

	      title: "La cantidad supera el Stock",

	      text: "¡Sólo hay "+$(this).attr("stock")+" unidades!",

	      type: "error",

	      confirmButtonText: "¡Cerrar!"

	    });



	}



	// SUMAR TOTAL DE PRECIOS



	sumarTotalPrecios()



	// AGREGAR IMPUESTO

	        

    agregarImpuesto()



    // AGRUPAR PRODUCTOS EN FORMATO JSON



    listarProductos()



})



/*=============================================

SUMAR TODOS LOS PRECIOS

=============================================*/



function sumarTotalPrecios(){



	var precioItem = $(".nuevoPrecioProducto");

	var arraySumaPrecio = [];  



	for(var i = 0; i < precioItem.length; i++){



		 arraySumaPrecio.push(Number($(precioItem[i]).val()));

		 

	}



	function sumaArrayPrecios(total, numero){



		return total + numero;



	}



	var sumaTotalPrecio = arraySumaPrecio.reduce(sumaArrayPrecios);

	

	$("#nuevoTotalVenta").val(sumaTotalPrecio);

	$("#totalVenta").val(sumaTotalPrecio);

	$("#nuevoTotalVenta").attr("total",sumaTotalPrecio);





}



/*=============================================

FUNCIÓN AGREGAR IMPUESTO

=============================================*/



function agregarImpuesto(){



	var impuesto = $("#nuevoImpuestoVenta").val();

	var precioTotal = $("#nuevoTotalVenta").attr("total");



	var precioImpuesto = Number(precioTotal * impuesto/100);



	var totalConImpuesto = Number(precioImpuesto) + Number(precioTotal);

	

	$("#nuevoTotalVenta").val(totalConImpuesto);



	$("#totalVenta").val(totalConImpuesto);



	$("#nuevoPrecioImpuesto").val(precioImpuesto);



	$("#nuevoPrecioNeto").val(precioTotal);



}



/*=============================================

CUANDO CAMBIA EL IMPUESTO

=============================================*/



$("#nuevoImpuestoVenta").change(function(){



	agregarImpuesto();



});



/*=============================================

FORMATO AL PRECIO FINAL

=============================================*/



$("#nuevoTotalVenta").number(true, 2);



/*=============================================

SELECCIONAR MÉTODO DE PAGO

=============================================*/



$("#nuevoMetodoPago").change(function(){



	var metodo = $(this).val();



	if(metodo == "Efectivo"){



		$(this).parent().parent().removeClass("col-xs-6");



		$(this).parent().parent().addClass("col-xs-4");



		$(this).parent().parent().parent().children(".cajasMetodoPago").html(



			 '<div class="col-xs-4">'+ 



			 	'<div class="input-group">'+ 



			 		'<span class="input-group-addon">S/</span>'+ 



			 		'<input type="text" class="form-control" id="nuevoValorEfectivo" placeholder="000000" required>'+



			 	'</div>'+



			 '</div>'+



			 '<div class="col-xs-4" id="capturarCambioEfectivo" style="padding-left:0px">'+



			 	'<div class="input-group">'+



			 		'<span class="input-group-addon">S/</span>'+



			 		'<input type="text" class="form-control" id="nuevoCambioEfectivo" placeholder="000000" readonly required>'+



			 	'</div>'+



			 '</div>'



		 )



		// Agregar formato al precio



		$('#nuevoValorEfectivo').number( true, 2);

      	$('#nuevoCambioEfectivo').number( true, 2);





      	// Listar método en la entrada

      	listarMetodos()



	}else{



		$(this).parent().parent().removeClass('col-xs-4');



		$(this).parent().parent().addClass('col-xs-6');



		 $(this).parent().parent().parent().children('.cajasMetodoPago').html(



		 	'<div class="col-xs-6" style="padding-left:0px">'+

                        

                '<div class="input-group">'+

                     

                  '<input type="number" min="0" class="form-control" id="nuevoCodigoTransaccion" placeholder="Código transacción"  required>'+

                       

                  '<span class="input-group-addon"><i class="fa fa-lock"></i></span>'+

                  

                '</div>'+



              '</div>')



	}



	



})



/*=============================================

CAMBIO EN EFECTIVO

=============================================*/

$(".formularioVenta").on("change", "input#nuevoValorEfectivo", function(){



	var efectivo = $(this).val();



	var cambio =  Number(efectivo) - Number($('#nuevoTotalVenta').val());



	var nuevoCambioEfectivo = $(this).parent().parent().parent().children('#capturarCambioEfectivo').children().children('#nuevoCambioEfectivo');



	nuevoCambioEfectivo.val(cambio);



})



/*=============================================

CAMBIO TRANSACCIÓN

=============================================*/

$(".formularioVenta").on("change", "input#nuevoCodigoTransaccion", function(){



	// Listar método en la entrada

     listarMetodos()





})





/*=============================================

LISTAR TODOS LOS PRODUCTOS

=============================================*/



function listarProductos(){



	var listaProductos = [];



	var descripcion = $(".nuevaDescripcionProducto");



	var cantidad = $(".nuevaCantidadProducto");



	var precio = $(".nuevoPrecioProducto");



	for(var i = 0; i < descripcion.length; i++){



		listaProductos.push({ "id" : $(descripcion[i]).attr("idProducto"), 

							  "descripcion" : $(descripcion[i]).val(),

							  "cantidad" : $(cantidad[i]).val(),

							  "stock" : $(cantidad[i]).attr("nuevoStock"),

							  "precio" : $(precio[i]).attr("precioReal"),

							  "total" : $(precio[i]).val()})



	}



	$("#listaProductos").val(JSON.stringify(listaProductos)); 



}



/*=============================================

LISTAR MÉTODO DE PAGO

=============================================*/



function listarMetodos(){



	var listaMetodos = "";



	if($("#nuevoMetodoPago").val() == "Efectivo"){



		$("#listaMetodoPago").val("Efectivo");



	}else{



		$("#listaMetodoPago").val($("#nuevoMetodoPago").val()+"-"+$("#nuevoCodigoTransaccion").val());



	}



}



/*=============================================

BOTON EDITAR VENTA

=============================================*/



$(".tablas").on("click", ".btnEditarVenta", function(){



	var idVenta = $(this).attr("idVenta");



	window.location = "index.php?ruta=editar-venta&idVenta="+idVenta;





})





/*=============================================

BORRAR VENTA

=============================================*/

$(".tablas").on("click", ".btnEliminarVenta", function(){



  var idVenta = $(this).attr("idVenta");



  swal({

        title: '¿Está seguro de borrar la venta?',

        text: "¡Si no lo está puede cancelar la accíón!",

        type: 'warning',

        showCancelButton: true,

        confirmButtonColor: '#3085d6',

        cancelButtonColor: '#d33',

        cancelButtonText: 'Cancelar',

        confirmButtonText: 'Si, borrar venta!'

      }).then((result) => {

        if (result.value) {

          

            window.location = "index.php?ruta=ventas&idVenta="+idVenta;

        }



  })



})



/*=============================================
IMPRIMIR FACTURA
=============================================*/
$(".tablas").on("click", ".btnImprimirFactura", function(){
  var codigoVenta = $(this).attr("codigoVenta");
  window.open("extensiones/tcpdf/pdf/factura.php?codigo="+codigoVenta,'_blank');
});





/*=============================================

DATE RANGE

=============================================*/



$('#daterange-btn').daterangepicker(

  {

    ranges   : {

      'Hoy'       : [moment(), moment()],

      'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],

      'Últimos 7 días' : [moment().subtract(6, 'days'), moment()],

      'Últimos 30 días': [moment().subtract(29, 'days'), moment()],

      'Este mes'  : [moment().startOf('month'), moment().endOf('month')],

      'Último mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]

    },

    startDate: moment().subtract(29, 'days'),

    endDate  : moment()

  },

  function (start, end) {

    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))



    var fechaInicial = start.format('YYYY-M-D');



    var fechaFinal = end.format('YYYY-M-D');



    var datos = new FormData();

    datos.append("fechaInicial", fechaInicial);

    datos.append("fechaFinal", fechaFinal);



     $.ajax({



     	url:"ajax/ventas.ajax.php",

      	method: "POST",

      	data: datos,

      	cache: false,

      	contentType: false,

      	processData: false,

      	dataType:"json",

      	success:function(respuesta){



      		$(".rangoFechas tbody").html("");



	  	    respuesta.forEach(funcionForEach);



	        function funcionForEach(item, index){



		        var idCliente = item.id_cliente;



		        var datosCliente = new FormData();

	    		datosCliente.append("idCliente", idCliente);



	    		$.ajax({



			     	url:"ajax/clientes.ajax.php",

			      	method: "POST",

			      	data: datosCliente,

			      	cache: false,

			      	contentType: false,

			      	processData: false,

			      	dataType:"json",

			      	success:function(respuestaClientes){



			      		var idUsuario = item.id_vendedor;



				        var datosUsuario = new FormData();

			    		datosUsuario.append("idUsuario", idUsuario);



			    		$.ajax({



					     	url:"ajax/usuarios.ajax.php",

					      	method: "POST",

					      	data: datosUsuario,

					      	cache: false,

					      	contentType: false,

					      	processData: false,

					      	dataType:"json",

					      	success:function(respuestaUsuarios){



					      		if($(".perfilUsuario").val() == "Administrador"){

		      		

						      		$(".rangoFechas tbody").append( 



							  		 	'<tr>'+



								            '<td>'+(index+1)+'</td>'+



								            '<td>'+item.codigo+'</td>'+



								            '<td>'+respuestaClientes["nombre"]+'</td>'+



								            '<td>'+respuestaUsuarios["nombre"]+'</td>'+



								            '<td>'+item.metodo_pago+'</td>'+



								            '<td>$ '+item.neto+'</td>'+



								            '<td>$ '+item.total+'</td>'+



								            '<td>'+item.fecha+'</td>'+



								            '<td>'+



								              '<div class="btn-group">'+

								                  

								                '<button class="btn btn-info"><i class="fa fa-print btnImprimirFactura" codigoVenta="'+item.codigo+'"></i></button>'+



						                  		'<button class="btn btn-warning btnEditarVenta" idVenta="'+item.id+'"><i class="fa fa-pencil"></i></button>'+



						                  		'<button class="btn btn-danger btnEliminarVenta" idVenta="'+item.id+'"><i class="fa fa-times"></i></button>'+



								              '</div>'+  



								            '</td>'+



								          '</tr>'

				          			);



					      		}else{



					      			$(".rangoFechas tbody").append( 



							  		 	'<tr>'+



								            '<td>'+(index+1)+'</td>'+



								            '<td>'+item.codigo+'</td>'+



								            '<td>'+respuestaClientes["nombre"]+'</td>'+



								            '<td>'+respuestaUsuarios["nombre"]+'</td>'+



								            '<td>'+item.metodo_pago+'</td>'+



								            '<td>$ '+item.neto+'</td>'+



								            '<td>$ '+item.total+'</td>'+



								            '<td>'+item.fecha+'</td>'+



								            '<td>'+



								              '<div class="btn-group">'+

								                  

								                '<button class="btn btn-info"><i class="fa fa-print btnImprimirFactura" codigoVenta="'+item.codigo+'"></i></button>'+

	

								              '</div>'+  



								            '</td>'+



								          '</tr>');





					      		}



			          		}



			          	})



			      	}



			    })



			   



        	 	



	        }



      	}



     })





   

  }

)





