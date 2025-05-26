<style>
	.textLeft{
		text-align: left !important;
	}
</style>
<div class="content-wrapper">
	<section class="content-header">
		<h1>REGISTRO DE SOLICITUD DE COMPRA O SERVICIO</h1>
	</section>
    <section class="content">
	    <div class="box">
	    	<div class="box-header with-border">
	    	</div>
	    	<div class="box-body">
	    		<div class="form-horizontal">
		    		<div class="col-md-4">
		    			<div class="form-group">
			                <label class="col-sm-6 control-label textLeft">NOMBRE Y APELLIDO JEFE INEMDIATO:</label><!-- // -->
			                <div class="col-sm-6">
			                 	<!-- <input type="text" class="form-control input-sm" id="jefeInmediato"> -->
			                 	<select class="form-control input-sm" id="nombreJefe">
				                    <option value="1">option 1</option>
				                    <option value="2">option 2</option>
				                </select>
			                 </div>
		                </div>

		                <div class="form-group">
			                <label class="col-sm-6 control-label textLeft">FECHA:</label>
			                <div class="col-sm-6">
			                 	<input type="date" class="form-control input-sm" id="fecha">
			                 </div>
		                </div>
		                <div class="form-group">
			                <label class="col-sm-6 control-label textLeft">DOCUMENTO ADJUNTO:</label>
			                <div class="col-sm-6">
			                 	<input type="file" class="input-sm" id="documento">
			                 </div>
		                </div>
		                <div class="form-group">
			                <label class="col-sm-6 control-label textLeft">ESPECIFICAR AREA:</label>
			                <div class="col-sm-6">
			                 	<!-- <input type="text" class="form-control input-sm" id="areaDestino"> -->
			                 	<select class="form-control input-sm" id="area">
				                    <option value="1">Area 1</option>
				                    <option value="2">Area 2</option>
				                </select>
			                 </div>
		                </div>
		                <div class="form-group">
			                <label class="col-sm-6 control-label textLeft">SELECCIONAR TIPO:</label>
			                <div class="col-sm-6">
			                 	<!-- <input type="text" class="form-control input-sm" id="tipo"> -->
			                 	<select class="form-control input-sm" id="tipo">
				                    <option value="1">Producto</option>
				                    <option value="2">Servicio</option>
				                </select>
			                 </div>
		                </div>
		                <br><br>
		                <div class="form-group">
			                <label class="col-sm-6 control-label textLeft">AGREGAR COMENTARIO:</label>
			                <div class="col-sm-6">
			                 	<textarea class="form-control" rows="3" placeholder="" id="comentario"></textarea>
			                 </div>
		                </div>
		    		</div>
	    		
		    		<div class="col-md-4">
		    			<div class="form-group">
		    				<label class="col-sm-6 control-label textLeft">GENERAR NUEVO ARTÍC:</label>
		                	<div class="col-sm-6">
		                		<button class="btn btn-info btn-block btn-sm pull-right">NUEVO ARTICULO</button>
		                	</div>
		                </div>
		                <form>
			    			<div class="form-group">
				                <label class="col-sm-6 control-label textLeft">SELECCIONAR ALAMECEN:</label>
				                <div class="col-sm-6">
				                 	<select class="form-control input-sm" id="almacenes">
					                </select>
				                 </div>
			                </div>
			                <div class="form-group">
				                <label class="col-sm-6 control-label textLeft">SELECCIONAR PRODUCTO:</label>
				                <div class="col-sm-6">
				                 	<select class="form-control input-sm" id="productos">
					                </select>
				                 </div>
			                </div>
			                <div class="form-group">
				                <label class="col-sm-6 control-label textLeft">CANTIDAD DE PRODUCTO:</label>
				                <div class="col-sm-6">
				                 	<input type="text" class="form-control input-sm" id="cantidad" placeholder="">
				                 </div>
			                </div>
			                <div class="form-group">
				                <label class="col-sm-6 control-label textLeft">PRESUPUESTO:</label>
				                <div class="col-sm-6">
				                 	<select class="form-control input-sm" id="presupuesto" >
				                 		<option ></option>
					                    <option value="1">Contabilidad</option>
					                    <option value="2">Planta</option>
					                </select>
				                 </div>
			                </div>
			                 <div class="form-group">
				                <label class="col-sm-6 control-label textLeft">RUBRO:</label>
				                <div class="col-sm-6">
				                 	<select class="form-control input-sm" id="rubro" >
				                 		<option ></option>
					                    <option value="1">Útiles de oficina</option>
					                    <option value="2">útiles de aseo</option>
					                </select>
				                 </div>
			                </div>
			                 <div class="form-group">
				                <label class="col-sm-6 control-label textLeft">PRECIO UNITARIO:</label>
				                <div class="col-sm-6">
				                 	<input type="text" class="form-control input-sm" id="precio_unitario" placeholder="" >
				                 </div>
			                </div>
			                 <div class="form-group">
				                <label class="col-sm-6 control-label textLeft">PRESUPUESTO DISPONIBLE:</label>
				                <div class="col-sm-6">
				                 	<input type="text" class="form-control input-sm" id="presupuesto_disponible"  onchange="changePresupuestoDisponible(this.value)">
				                 </div>
			                </div>
			                <div class="form-group">
			                	<div class="col-sm-offset-6 col-sm-6">
			                		<button  type="button" onclick="incluir()" class="btn btn-info btn-block btn-sm pull-right">AGREGAR PRODUCTO</button>
			                	</div>
			                </div>
		                </form>
		                <div class="form-group">
			                <label class="col-sm-12 control-label textLeft">Detalle de solicitud:</label>
			                <div class="col-sm-12">
			                 	<table class="table table-condensed">
			                 		<thead>
			                 			<tr>
											<th>Almacen</th>
											<th >Producto</th>
											<th>Cantidad</th>
											<th>Presupuesto</th>
											<th>Rubro</th>
											<th>Precio</th>
						                </tr>
			                 		</thead>
					                <tbody id="detalle_soli">
					              	</tbody>
				          		</table>
			                 </div>
		                </div>

		                <div class="form-group">
		                	<div class="col-sm-offset-3 col-sm-6">
		                		<button class="btn btn-info btn-block btn-sm pull-right">AGREGAR PRODUCTO</button>
		                	</div>
		                </div>
		    		</div>

		    		<div class="col-md-4">
		    			<div class="form-group">
			                <label class="col-sm-6 control-label">ESPECIFICAR SERVICIO</label>
			                <div class="col-sm-6">
			                 	<input type="text" class="form-control" id="servicio" placeholder="sin data">
			                 </div>
		                </div>
		    		</div>
	    		</div>

	    		<div class="col-sm-offset-7 col-sm-5" style="margin-top: 20px; margin-bottom: 15px;">
            		<div class="col-sm-4">
            			<input type="date" class="form-control input-sm" id="GGG" title="dd">
            		</div>
            		<div class="col-sm-4">
            			<input type="date" class="form-control input-sm" id="GGG" title="aa">
            		</div>

            		<div class="input-group col-sm-4">
		                <span class="input-group-addon"><i class="fa fa-search"></i></span>
		                <input type="text" class="form-control input-sm" title="buscar">
		            </div>
            	</div>


	    		<table class="table table-condensed">
	                <tbody>
	                	<tr>
							<th>N°</th>
							<th>JEFE INMEDIATO</th>
							<th>FECHA</th>
							<th>ESTADO</th>
							<th>COMENT. DE JEFE</th>
							<th>AREA</th>
							<th>TIPO</th>
							<th>SERVICIO</th>
							<th>ALMACEN</th>
							<th>PRODUCTO</th>
							<th>CANTIDAD</th>
							<th>PRESUPUESTO</th>
							<th>RUBRO</th>
							<th>PRECIO UNITARIO</th>
							<th>COMENTARIO</th>
		                </tr>
		                <tr>
							<td>1.</td>
							<td>Update software</td>
							<td>
								<div class="progress progress-xs">
								  <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
								</div>
							</td>
							<td><span class="badge bg-red">55%</span></td>
							<td>.</td>
							<td>.</td>
							<td>.</td>
							<td>.</td>
							<td>.</td>
							<td>.</td>
							<td>.</td>
							<td>.</td>
							<td>.</td>
							<td>.</td>
							<td>.</td>
		                </tr>
		                <tr>
							<td>2.</td>
							<td>Clean database</td>
							<td>
								<div class="progress progress-xs">
								  <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
								</div>
							</td>
							<td><span class="badge bg-yellow">70%</span></td>
							<td>.</td>
							<td>.</td>
							<td>.</td>
							<td>.</td>
							<td>.</td>
							<td>.</td>
							<td>.</td>
							<td>.</td>
							<td>.</td>
							<td>.</td>
							<td>.</td>
		                </tr>

	              	</tbody>
          		</table>
	    		
	    	</div>
	    </div>
    </section>
</div>

<script>
    window.onload = listar;
    function listar(){
    	listProduct();
    	listAlmacenes();
    }
	function listProduct(){
  		//  let id_curso= 'sds';
		var accion = "productos";
		// var dataen =  'id_curso=' + id_curso + 
		// '&accion=' + accion;
		var dataen =  'accion=' + accion;

		$.ajax({
			type: 'post',
			url: 'controladores/crear_solicitud.controlador.php',
			data: dataen,
			success: function(response) {
				$("#productos").html(response);
			}
		});
		return false;
    }

    function listAlmacenes(){
		var accion = "almacenes";
		var dataen =  'accion=' + accion;

		$.ajax({
			type: 'post',
			url: 'controladores/crear_solicitud.controlador.php',
			data: dataen,
			success: function(response) {
				$("#almacenes").html(response);
			}
		});
		return false;
    }

    function incluir() {
    	
    	var Ralmacenes = document.getElementById("almacenes").value
    	var Rproductos = document.getElementById("productos").value
    	var Rcantidad = document.getElementById("cantidad").value
    	var Rpresupuesto = document.getElementById("presupuesto").value
    	var Rrubro = document.getElementById("rubro").value
    	var Rprecio_unitario = document.getElementById("precio_unitario").value
    	var Rpresupuesto_disponible = document.getElementById("presupuesto_disponible").value

    	if (!Ralmacenes) {document.getElementById("almacenes").style.borderColor="red"}
    	if (!Rproductos) {document.getElementById("productos").style.borderColor="red"}
    	if (!Rcantidad) {document.getElementById("cantidad").style.borderColor="red"}
    	if (!Rpresupuesto) {document.getElementById("presupuesto").style.borderColor="red"}
    	if (!Rrubro) {document.getElementById("rubro").style.borderColor="red"}
    	if (!Rprecio_unitario) {document.getElementById("precio_unitario").style.borderColor="red"}
    	if (!Rpresupuesto_disponible) {document.getElementById("presupuesto_disponible").style.borderColor="red"}

    	if (!Ralmacenes || !Rproductos || !Rcantidad || !Rpresupuesto || !Rrubro || !Rprecio_unitario || !Rpresupuesto_disponible) {
    		alert('Completar campos');
    		return false;
    	}


    	var almacenes = $('#almacenes').find('option:selected').text();
    	var productos = $('#productos').find('option:selected').text();
    	var cantidad  =	$('#cantidad').val();
    	var presupuesto = $('#presupuesto').find('option:selected').text();
    	var rubro = $('#rubro').find('option:selected').text();
    	var precio_unitario = 	$('#precio_unitario').val();
    	var presupuesto_disponible = $('#presupuesto_disponible').val();


  		//	var combo = document.getElementById("almacenes");
		//  var almacenes = combo.options[combo.selectedIndex].text;
  		//  console.log(almacenes)


    	//var a =  document. getElementById('detalle_soli')

    	$("#detalle_soli").append(`<tr>
    									<td>${almacenes}</td>
    									<td>${productos}</td>
    									<td>${cantidad}</td>
    									<td>${presupuesto}</td>
    									<td>${rubro}</td>
    									<td>${precio_unitario}</td>
    								</tr>`);

    	document.getElementById("almacenes").value = '';
    	document.getElementById("productos").value = '';
    	document.getElementById("cantidad").value = '';
    	document.getElementById("presupuesto").value = '';
    	document.getElementById("rubro").value = '';
    	document.getElementById("precio_unitario").value = '';
    	document.getElementById("presupuesto_disponible").value = '';

	}

	document.getElementById('almacenes').addEventListener('change', changeAlmacenes);
	function changeAlmacenes(){
		document.getElementById("almacenes").style.borderColor="green"
	}
	document.getElementById('productos').addEventListener('change', changeProductos);
	function changeProductos(){
		document.getElementById("productos").style.borderColor="green"
	}
	document.getElementById('cantidad').addEventListener('change', changeCantidad);
	function changeCantidad(){
		document.getElementById("cantidad").style.borderColor="green"
	}
	document.getElementById('presupuesto').addEventListener('change', changePresupuesto);
	function changePresupuesto(){
		document.getElementById("presupuesto").style.borderColor="green"
	}
	document.getElementById('rubro').addEventListener('change', changeRubro);
	function changeRubro(){
		document.getElementById("rubro").style.borderColor="green"
	}
	document.getElementById('precio_unitario').addEventListener('change', changePrecioUnitario);
	function changePrecioUnitario(){
		document.getElementById("precio_unitario").style.borderColor="green"
	}
	// document.getElementById('presupuesto_disponible').addEventListener('change', changePresupuestoDisponible);
	// function changePresupuestoDisponible(){
	// 	document.getElementById("presupuesto_disponible").style.borderColor="green"
	// }
    function changePresupuestoDisponible(val) {
		document.getElementById("presupuesto_disponible").style.borderColor="green"
	}

</script>

