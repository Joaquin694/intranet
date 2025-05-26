<style>
	.textLeft{
		text-align: left !important;
	}
</style>
<div class="content-wrapper">
	<section class="content-header">
		<h1>LISTA DE SOLICITUDES (APROBADAS) DE COMPRA O SERVICIO</h1>
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
							<th>TIPO</th>
							<th>COMENTARIO</th>
							<th>ESTADO</th>
							<th>GENERAR ORDEN(TIPO)</th>
							<th>STATUS</th>
							<th>DESCARGAS</th>
							<th>CIERRE</th>
		                </tr>
		                <tr>
							<td>JUAN</td>
							<td>12/12/2022</td>
							<td>software</td>
							<td>software</td>
							<td>producto</td>
							<td>.</td>
							<td>.</td>
							<td>
								<button type="button" class="btn btn-primary btn-sm">ORDEN DE COMPRA</button>
							</td>
							<td>ORDEN GENERADA</td>
							<td>
								<button type="button" class="btn btn-default"><i class="fa fa-cloud-download"></i></button>
								<button type="button" class="btn btn-default"><i class="fa fa-cloud-download"></i></button>
							</td>
							<td>
								<button type="button" class="btn btn-block btn-primary btn-sm">CIERRE MANUAL</button>
							</td>
		                </tr>
		                <tr>
							<td>JUAN</td>
							<td>12/12/2022</td>
							<td>software</td>
							<td>software</td>
							<td>producto</td>
							<td>.</td>
							<td>.</td>
							<td>
								<button type="button" class="btn btn-primary btn-sm">ORDEN DE COMPRA</button>
							</td>
							<td>ORDEN GENERADA</td>
							<td>
								<button type="button" class="btn btn-default"><i class="fa fa-cloud-download"></i></button>
								<button type="button" class="btn btn-default"><i class="fa fa-cloud-download"></i></button>
							</td>
							<td>
								<button type="button" class="btn btn-block btn-primary btn-sm">CIERRE MANUAL</button>
							</td>
		                </tr>
		                <tr>
							<td>JUAN</td>
							<td>12/12/2022</td>
							<td>software</td>
							<td>software</td>
							<td>producto</td>
							<td>.</td>
							<td>.</td>
							<td>
								<button type="button" class="btn btn-primary btn-sm">ORDEN DE COMPRA</button>
							</td>
							<td>ORDEN GENERADA</td>
							<td>
								<button type="button" class="btn btn-default"><i class="fa fa-cloud-download"></i></button>
								<button type="button" class="btn btn-default"><i class="fa fa-cloud-download"></i></button>
							</td>
							<td>
								<button type="button" class="btn btn-block btn-primary btn-sm">CIERRE MANUAL</button>
							</td>
		                </tr>
		                <tr>
							<td>JUAN</td>
							<td>12/12/2022</td>
							<td>software</td>
							<td>software</td>
							<td>producto</td>
							<td>.</td>
							<td>.</td>
							<td>
								<button type="button" class="btn btn-primary btn-sm">ORDEN DE COMPRA</button>
							</td>
							<td>ORDEN GENERADA</td>
							<td>
								<button type="button" class="btn btn-default"><i class="fa fa-cloud-download"></i></button>
								<button type="button" class="btn btn-default"><i class="fa fa-cloud-download"></i></button>
							</td>
							<td>
								<button type="button" class="btn btn-block btn-primary btn-sm">CIERRE MANUAL</button>
							</td>
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