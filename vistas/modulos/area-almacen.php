<style>
	.textLeft{
		text-align: left !important;
	}
</style>
<div class="content-wrapper">
	<section class="content-header">
		<h1>LISTA DE SOLICITUDES (APROBADAS) DE COMPRA</h1>
	</section>
    <section class="content">
	    <div class="box">
	    	<!-- <div class="box-header with-border">
	    	</div> -->
	    	<div class="box-body">
	    		<div class="col-sm-offset-7 col-sm-5" style="margin-top: 20px; margin-bottom: 15px;">
            		<div class="col-sm-4">
            			<input type="date" class="form-control input-sm" id="" title="Fecha inicio">
            		</div>
            		<div class="col-sm-4">
            			<input type="date" class="form-control input-sm" id="" title="Fecha Fin">
            		</div>

            		<div class="input-group col-sm-4">
		                <span class="input-group-addon"><i class="fa fa-search"></i></span>
		                <input type="text" class="form-control input-sm" placeholder="Buscar">
		            </div>
            	</div>

	    		<table class="table table-condensed">
	                <tbody>
	                	<tr>
							<th>USUARIO</th>
							<th>FECHA</th>
							<th>DOCUMENTO ADJUNTO</th>
							<th>AREA</th>
							<th>COMENTARIO</th>
							<th>ESTADO</th>
							<th>GENERAR INGRESO ALMACEN</th>
							<th>STATUS</th>
		                </tr>
		                <tr>
							<td>JUAN.</td>
							<td>12/12/2022</td>
							<td>software</td>
							<td>software</td>
							<td>comentario</td>
							<td>atendido</td>
							<td>
								<button type="button" class="btn btn-primary btn-sm">GENERAR INGRESO</button>
							</td>
							<td>GENERADA</td>
		                </tr>
		                <tr>
							<td>JUAN.</td>
							<td>12/12/2022</td>
							<td>software</td>
							<td>software</td>
							<td>comentario</td>
							<td>pendiente</td>
							<td>
								<button type="button" class="btn btn-primary btn-sm">GENERAR INGRESO</button>
							</td>
							<td>NO GENERADA</td>
		                </tr>
		                <tr>
							<td>JUAN</td>
							<td>12/12/2022</td>
							<td>software</td>
							<td>software</td>
							<td>comentario</td>
							<td>pendiente</td>
							<td>
								<button type="button" class="btn btn-primary btn-sm">GENERAR INGRESO</button>
							</td>
							<td>NO GENERADA</td>
		                </tr>
		                <tr>
							<td>JUAN</td>
							<td>12/12/2022</td>
							<td>software</td>
							<td>software</td>
							<td>comentario</td>
							<td>pendiente</td>
							<td>
								<button type="button" class="btn btn-primary btn-sm">GENERAR INGRESO</button>
							</td>
							<td>NO GENERADA</td>
		                </tr>
		                <tr>
							<td>JUAN</td>
							<td>12/12/2022</td>
							<td>software</td>
							<td>software</td>
							<td>comentario</td>
							<td>pendiente</td>
							<td>
								<button type="button" class="btn btn-primary btn-sm">GENERAR INGRESO</button>
							</td>
							<td>NO GENERADA</td>
		                </tr>

	              	</tbody>
          		</table>
	    		
	    	</div>
	    </div>
    </section>
</div>

<script>
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