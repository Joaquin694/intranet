<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Administrar clientes
		</h1>
		<ol class="breadcrumb">
			<li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li class="active">Administrar clientes</li>
		</ol>
	</section>
	<section class="content">
		<div class="box">
			<div class="box-header with-border">
				<button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
					<i class="fa fa-chevron-right" aria-hidden="true"></i> Agregar cliente
				</button>
			</div>
			<div class="box-body table-responsive">
				<table class="table table-bordered table-striped dt-responsive tablas" style="width: 100% !important">
					<thead>
						<tr>
							<th style="width:10px">#</th>
							<!-- <th>Call</th> -->
							<th>Documento ID</th>
							<th>Nombre</th>
							<th>Denominación</th>
							<th>Fecha nacimiento</th>
							<th>Email</th>
							<th>Teléfono</th>
							<th>Total compras</th>
							<th>Última compra</th>
							<th>Ingreso al sistema</th>
							<th>Tipo Cliente</th>
							<th>Marca</th>
							<th>Lugar de producción</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$item = null;
						$valor = null;
						$clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
						foreach ($clientes as $key => $value) {
							echo '<tr>
							<td>' . ($key + 1) . '</td>
						
							<td>' . $value["documento"] . '</td>
							<td>' . $value["nombre"] . '</td>
							<td>' . $value["sexo"] . '</td>
							<td>' . $value["fecha_nacimiento"] . '</td>             
							<td>' . $value["email"] . '</td>
							<td>' . $value["telefono"] . '</td>
							<td>' . $value["compras"] . '</td>
							<td>' . $value["ultima_compra"] . '</td>
							<td>' . $value["fecha"] . '</td>
							<td>' . $value["tipo_cliente"] . '</td>
							<td>' . $value["marca"] . '</td>
							<td>' . $value["direccion"] . '</td>
							<td>
							<div class="btn-group">



							<button class="btn btn-warning btnEditarCliente" data-toggle="modal" data-target="#modalEditarCliente" idCliente="' . $value["id"] . '"><i class="fa fa-pencil"></i></button>';

							if ($_SESSION["perfil"] == "Administrador") {
								echo '<button class="btn btn-danger btnEliminarCliente" idCliente="' . $value["id"] . '"><i class="fa fa-times"></i></button>';
							}
							echo '</div>  
							</td>
							</tr>';
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</section>
</div>
<!--=====================================
MODAL AGREGAR CLIENTE
======================================-->
<div id="modalAgregarCliente" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<form role="form" method="post">
				<!--=====================================
				CABEZA DEL MODAL
				======================================-->
				<div class="modal-header" style="background:#3c8dbc; color:white">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Agregar cliente</h4>
				</div>
				<!--=====================================
				CUERPO DEL MODAL
				======================================-->
				<div class="modal-body">
					<div class="box-body">
						<div class="form-group">
							<b>TIPO DE DOC. IDENTIDAD: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
							<label class="radio-inline">
								<input id="rdbDni" type="radio" name="optradio" checked>DNI
							</label>
							<label class="radio-inline">
								<input id="rdbRuc" type="radio" name="optradio">RUC
							</label>
						</div>
						<!-- ENTRADA PARA EL DOCUMENTO ID -->
						<!-- SI  ESCOGE DNI -->
						<div class="form-group" id="dvnumDNI">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-key"></i></span>
								<input type="text" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Ingresar número DNI" id="numDNI">
							</div>
						</div>

						<!-- SI  ESCOGE RUC -->
						<!--  <div class="form-group d-none" id="dvnumRuc">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-key"></i></span> 
									<input type="number" min="0" class="form-control input-lg " name="numRuc" placeholder="Ingresar número RUC" id="numRuc" >
							</div>
						</div> -->


						<!-- ENTRADA PARA EL NOMBRE -->
						<div class="form-group dh_docu_identidad d-none">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								<input type="text" class="form-control input-lg" id="nomUserRsv" name="nuevoCliente" placeholder="Ingresar nombre" required style="background: #eee">
							</div>
						</div>

						<!-- ENTRADA sexo -->
						<div class="form-group dh_docu_identidad d-none">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-th"></i></span>
								<select class="form-control input-lg" id="sexoCliente" name="sexo" style="background: #eee" required>
									<option selected="" value="" disabled="">GÉNERO</option>
									<option value='MA'>MASCULINO</option>
									<option value='FE'>FEMENINO</option>
									<option value='RU'>Registro Único de Contribuyentes</option>
								</select>
							</div>
						</div>

						<!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->
						<div class="form-group dh_docu_identidad d-none">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								<input type="date" class="form-control input-lg" name="nuevaFechaNacimiento" required style="background: #eee" id="idFechaNacRes">
							</div>
						</div>

						<!-- ENTRADA TIPO DE CLIENTE -->
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-th"></i></span>
								<select class="form-control input-lg" id="tipo_cliente" name="tipo_cliente" required>
									<option selected="" value="" disabled="">TIPO DE CLIENTE</option>
									<option value="Almacenadoras">Almacenadoras</option>
									<option value="Constructoras">Constructoras</option>
									<option value="Distribuidoras">Distribuidoras</option>
									<option value="Empresas Agrícolas">Empresas Agrícolas</option>
									<option value="Empresas de Transporte">Empresas de Transporte</option>
									<option value="Mineras">Mineras</option>
									<option value="Municipios">Municipios</option>
									<option value="Recicladores">Recicladores</option>
									<option value="Talleres Mecánicos">Talleres Mecánicos</option>
									<option value="Otros">Otros</option>
								</select>

							</div>
						</div>
						<!-- ENTRADA PARA EL EMAIL -->

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
								<input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" required>
							</div>
						</div>
						<!-- ENTRADA PARA EL TELÉFONO -->

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-phone"></i></span>
								<input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" required>
							</div>
						</div>

						<!-- ENTRADA PARA LA DIRECCIÓN -->
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
								<input id="direccionCliente" type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Lugar de producción" required>
							</div>
						</div>

						<!-- ENTRADA PARA LA marca -->
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-sticky-note"></i></span>
								<input type="text" class="form-control input-lg" name="marca" placeholder="Comentario" required>
							</div>
						</div>

					</div>
				</div>
				<!--=====================================
				PIE DEL MODAL
				======================================-->
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
					<button type="submit" class="btn btn-primary">Guardar cliente</button>
				</div>
			</form>
			<?php
			$crearCliente = new ControladorClientes();
			$crearCliente->ctrCrearCliente();
			?>
		</div>



	</div>



</div>



<!--=====================================

MODAL EDITAR CLIENTE

======================================-->



<div id="modalEditarCliente" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<form role="form" method="post">
				<!--=====================================
       CABEZA DEL MODAL
       ======================================-->
				<div class="modal-header" style="background:#3c8dbc; color:white">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Editar cliente</h4>
				</div>
				<!--=====================================
             CUERPO DEL MODAL
             ======================================-->
				<div class="modal-body">
					<div class="box-body">
						<!-- ENTRADA PARA EL DOCUMENTO ID -->

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-key"></i></span>
								<input type="text" class="form-control input-lg" name="editarDocumentoId" id="editarDocumentoId" required>
							</div>
						</div>
						<!-- ENTRADA PARA EL NOMBRE -->

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								<input type="text" class="form-control input-lg" name="editarCliente" id="editarCliente" required>
								<input type="hidden" id="idCliente" name="idCliente">
							</div>
						</div>


						<!-- <div class="form-group dh_docu_identidad ">
              <div class="input-group">
                <span  class="input-group-addon"><i class="fa fa-th"></i></span> 
                <select class="form-control input-lg" id="editarSexo" name="editarSexo" >
                  <option selected="" value="" disabled="">SEXO</option>
                  <option value='MA'>MASCULINO</option>
                  <option value='FE'>FEMENINO</option>
                </select>
              </div>
          </div> -->

						<!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->

						<!--     <div class="form-group">
              <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                    <input type="date" class="form-control input-lg" name="editarFechaNacimiento" id="editarFechaNacimiento"   required>
                  </div>
              </div> -->
						<!-- ENTRADA PARA EL EMAIL -->

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
								<input type="email" class="form-control input-lg" name="editarEmail" id="editarEmail" required>
							</div>
						</div>
						<!-- ENTRADA PARA EL TELÉFONO -->

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-phone"></i></span>
								<input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono" required>
							</div>
						</div>
						<!-- ENTRADA PARA LA DIRECCIÓN -->

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
								<input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion" required>
							</div>
						</div>


						<!-- ENTRADA TIPO DE CLIENTE -->
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-th"></i></span>
								<select class="form-control input-lg" id="editarTipo_cliente" name="editarTipo_cliente" required>
									<option selected="" value="" disabled="">TIPO DE CLIENTE</option>
									<option value="Almacenadoras">Almacenadoras</option>
									<option value="Constructoras">Constructoras</option>
									<option value="Distribuidoras">Distribuidoras</option>
									<option value="Empresas Agrícolas">Empresas Agrícolas</option>
									<option value="Empresas de Transporte">Empresas de Transporte</option>
									<option value="Mineras">Mineras</option>
									<option value="Municipios">Municipios</option>
									<option value="Recicladores">Recicladores</option>
									<option value="Talleres Mecánicos">Talleres Mecánicos</option>
									<option value="Otros">Otros</option>
								</select>
							</div>
						</div>
						<!-- ENTRADA PARA LA DIRECCIÓN -->


						<!-- ENTRADA PARA LA marca -->
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-sticky-note"></i></span>
								<input type="text" class="form-control input-lg" id="editarMarca" name="editarMarca" required>
							</div>
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
			$editarCliente = new ControladorClientes();
			$editarCliente->ctrEditarCliente();
			?>
		</div>



	</div>



</div>



<?php



$eliminarCliente = new ControladorClientes();

$eliminarCliente->ctrEliminarCliente();



?>




<div id="ok"></div>
<script type="text/javascript">
	//REFRESH TABLE ON CLIC al cerrar modal

	function refreshtable() {
		location.reload();
		$('input[type="text"]').val('');
	}

	// $(".modal").on('hidden.bs.modal', function() {
	// 	refreshtable()
	// });




	// |||||||||||||||||||||||||||||| CON APIS DNI Y  RUC ||||||||||||||||||||||||||||||

	// Di clican  rdb DNI
	$("#rdbDni").click(function() {
		$("input").val("");
		$("#sexoCliente").val("");


		$("#nomUserRsv").attr("placeholder", "Ingresar Nombre y Apellido");
		$("#numDNI").attr("placeholder", "Ingresar número DNI");


	});


	// Di clican  rdb RUC
	$("#rdbRuc").click(function() {

		$("input").val("");
		$("#sexoCliente").val("RU");


		$("#nomUserRsv").attr("placeholder", "Ingresar Razón Social");
		$("#numDNI").attr("placeholder", "Ingresar número RUC");




	});

	/* =======================================*/
	$("#numDNI").keyup(function() {
		var numDigDocu = $('#numDNI').val().length;
		switch (numDigDocu) {
			case 'no found':
				// code block
				var dni = $('#numDNI').val();
				var laaction = "view_person_dni";

				var dataen =
					'dni=' + dni +
					'&laaction=' + laaction;
				$.ajax({
					type: 'post',
					url: 'controladores/main.controlador.php',
					data: dataen,
					success: function(resp) {
						$("#nomUserRsv,#appUserRsv,#apmUserRsv,#idFechaNacRes,#sltSexoRsv,#sltDocIdentRsv,#numDocIdentRsv").css("background-color", "#e9ecef");
						$("#ok").html(resp);
					}
				});
				return false;
				break;

			case 8:

				var dni = $('#numDNI').val();
				var request = $.ajax({
					url: "https://facturalahoy.com/api/persona/" + dni + "/facturalaya_impares_3Y8ldHCnEkyZolL",
					method: "GET"
				});
				request.done(function(data) {
					$('#nomUserRsv').val(data.nombre);
					$('#idfDireccion').val('No especifica');
					$('#numDNI').val(dni.slice(0, 8));

					if (data.sexo === "Masculino") {
						$('#sexoCliente').val('MA');
					} else if (data.sexo === "Femenino") {
						$('#sexoCliente').val('FE');
					}
					var fechaNacimiento = data.fecha_nacimiento;
					var partesFecha = fechaNacimiento.split("/");
					var fechaFormateada = partesFecha[2] + "-" + partesFecha[1] + "-" + partesFecha[0];


					$('#idFechaNacRes').val(fechaFormateada);

					$('.dh_docu_identidad').removeClass('d-none');
				});
				return false;
				break;

			case 11:
				// code block 

				var ruc = $('#numDNI').val();


				var request = $.ajax({
					url: "https://dniruc.apisperu.com/api/v1/ruc/" + ruc + "?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImFiYWRlc3F1ZW5sZXluZXJAZ21haWwuY29tIn0.NTjj1t6MHEf8-2jIl3LNVF-nnLk1vaEHnmcC06QH54c",
					method: "GET"
				});
				request.done(function(data) {
					$('#nomUserRsv').val(data.razonSocial);
					$('#direccionCliente').val(data.direccion);

					$('#idFechaNacRes').val("<?php echo date("Y-m-d"); ?>");

					$('.dh_docu_identidad').removeClass('d-none');
					$('#numDNI').val(ruc.slice(0, 11));
				});
				return false;
				break;

				// case 11:
				//   // code block
				//    var ruc= $('#numDNI').val();
				//    var laaction="view_person_ruc";

				//    var dataen =
				//                'ruc=' +ruc+
				//                '&laaction=' +laaction;
				//    $.ajax({
				//        type: 'post',
				//        url:'controladores/main.controlador.php',
				//        data:dataen,
				//        success:function(resp){
				//          $("#nomUserRsv,#appUserRsv,#apmUserRsv,#idFechaNacRes,#sltSexoRsv,#sltDocIdentRsv,#numDocIdentRsv").css("background-color","#e9ecef");
				//            $("#ok").html(resp);
				//        }
				//    });
				//    return false;
				//   break;
		}
	});



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
</script>