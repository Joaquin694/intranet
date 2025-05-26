<?php

	$tabla = "analisis_sensorial_de_productos_terminados";
	$item = "fk_bpm";
	$item_update = "pk_aspt";
	$resp = ModeloAnalisisSPT::mdlGetAnalisisSPT($tabla, $item, $_POST["pk_bpm"]);
	
	//echo $accion;
	//print_r($resp);
?>
<style type="text/css">
	body{
	/*     overflow-y: auto; */
	font-size: 10pt;
	/*overflow-y:hidden; */

	}
	th{
	background: #616161;
	color: white;
	border: #999999 1px solid;
	text-align: center;
	padding: 2px 3px;

	}
	td{
	background: #f5f5f5;
	border: #4e95f4 1px solid;
	padding: 4px 2px;

	}
	.letranegruda{
	font-weight: 900;
	}
	#scrollcito{

	overflow-y: auto; /**El scroll verticalmente cuando sea necesario*/
	overflow-x: auto;/*Sin scroll horizontal*/
	width: 102%;
	height: 560px;

	}

	#scrollcito  table {
	width: auto;

	}
	.fut{background: transparent;border: transparent 1px solid; }

	.btnMod{
	border-radius: 8px;
	margin-bottom: 8px;
	}
	/*
	*  STYLE 7 ABAD
	*/

	::-webkit-scrollbar-track
	{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	background-color: #c3c3c3;
	border-radius: 10px;
	}

	::-webkit-scrollbar
	{
	width: 10px;
	background-color: #c3c3c3;
	}

	::-webkit-scrollbar-thumb
	{
	border-radius: 10px;
	background-image: -webkit-gradient(linear,
	left bottom,
	left top,
	color-stop(0.44, rgb(144, 148, 151)),
	color-stop(0.72, rgb(95, 106, 106)),
	color-stop(0.86, rgb(77, 86, 86)));
	}
	.lablgnrl{
	color: #607d8b;
	}
	.has-feedback>input{
	color: black;
	font-weight: 500;
	}
	.inputCabe {
	border-radius: 2px;
	background: transparent;
	text-align: left;
	border: none;
	outline: 0;
	}
	.h3ti{
	font-size: 15pt !important;
	}

	input[type=radio] {
	border: 0px;

	width: 1.2em;
	height: 1.2em;
	}


	input[type=checkbox] {
	border: 0px;
	width: 1.6em;
	height: 1.6em;
	background: white !important;
	color: white !important;
	}
	.capsul{
	background: #30678e;color: white; padding: 0px 4px;border-radius: 10px;margin: 1px 0px;border: 1px solid #e8eaf6;
	}
	.cab_marron{
	background: #bf360c;color: white;font-weight: 800;
	}
	.volt_texto {
	writing-mode: vertical-lr;
	transform: rotate(180deg);
	}
	.total_rata{
	background: #f5f5f5;
	color: black;
	font-weight: 700;
	}
	.scale1{
	background: #76422a;
	}
	.scale2{
	background: #915136;
	}
	.scale3{
	background: #ad5b29;
	}
	.scale4{
	background: #b96c34;
	}

	/*body{
	background: #f5f5f5 !important;
	}*/
	canvas#marksCharti {
		background: white !important;
		max-width:  580px;

	}

	@media screen and (min-width: 800px) {
		canvas#marksCharti {
		background: white !important;
		min-width: 850px ;
		}
	}



	div.scrollmenu {
		margin-right: 30px !important;
		overflow: auto;
		white-space: nowrap;
	}

	div.scrollmenu a {
		display: inline-block;
		color: white;
		text-align: center;
		padding: 1px;
		text-decoration: none;
	}

	div.scrollmenu a:hover {
		background-color: #777;
	}
</style>
 <div class="content-wrapper">
  <section class="content-header"> 
   															 <h3>    
      Análisis sensorial de productos terminados
    </h3>



    <ol class="breadcrumb">     
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar productos</li>
    </ol>

  </section>

  <section class="content">
	<div class="box">
		<div class="box-header with-border">        
			<div class="btn-group">
				<div class="btn-group">
					<button type="button" class="btn btn-primary " onclick='ir("bpmhistorial")'>
					<i class="fa fa-undo" aria-hidden="true"></i> Historial BPM
					</button>
				</div>
			</div>
		</div>
		
       <div class="box-body" >
			<form method="post" id="asptForm" onsubmit="return false;">
				<input type="hidden" value="ingAnalisisSPT" name="ingAnalisisSPT" id="ingAnalisisSPT">
				<input type="hidden" value="ingASPT" name="accion" id="accion">
				<input type="hidden" value="<?php echo $_POST['pk_bpm'];?>" name="pk_bpm" id="pk_bpm">
				<!--<span style="font-size: 20pt !important; font-weight: 800 !important; color: #667071">Número de catadores: <input placeholder="1" id="samplenumero" style="width: 30pt;height: 31px !important;font-size: 20pt!important;font-weight: 900 !important;" type="number" step="0.05" name="samplenumero" required=""></span>-->
				<div class="scrollmenu">
						<table style="margin-bottom: 20px; margin-top: 60px; display: block; width: 100% !important;" id="delmirafox">
							<tbody>
								<tr>
									<td class="letranegruda">
										<center>
											Roast<br>Level or<br>Sample
											<table> <tbody><tr> <td class="scale4"> &nbsp;&nbsp;&nbsp; </td> <td class="scale4"> &nbsp;&nbsp;&nbsp; </td> </tr> <tr> <td class="scale3"> &nbsp;&nbsp;&nbsp; </td> <td class="scale3"> &nbsp;&nbsp;&nbsp; </td> </tr> <tr> <td class="scale2"> &nbsp;&nbsp;&nbsp; </td> <td class="scale2"> &nbsp;&nbsp;&nbsp; </td> </tr> <tr> <td class="scale1"> &nbsp;&nbsp;&nbsp; </td> <td class="scale1"> &nbsp;&nbsp;&nbsp; </td> </tr> </tbody></table> 
										</center>
									</td>
									<td class="letranegruda">
											<div class="form-group" style="font-weight: 100">
											Score: <!-- $albert[7] -->
											<input value="<?php echo isset($resp["fragancia_aroma"]) ? $resp["fragancia_aroma"] : "" ?>" placeholder="0" onkeyup="arana();intrumento_anasensorial();" id="fragancia_aroma" name="fragancia_aroma" class="form-control" type="number" step="0.05" min="0" max="9999" style="float: right;width: 60pt; font-size: 11pt;font-weight: 300" required="">
											</div>

											<center>
											Fragancia / Aroma<br>
											<div>
												<img src="vistas/img/iconos/regla.png" style="width: 90pt; height: 90pt">
											</div></center>
										</td>
										<!-- ------------------------------------------------------------------------------------- -->							            		
											<td class="letranegruda">
											<div class="form-group" style="font-weight: 100;margin-top: -60px !important;">
											Score: <!-- $albert[7] -->
											<input value="<?php echo isset($resp["sabor"]) ? $resp["sabor"] : "" ?>" placeholder="0" onkeyup="arana();intrumento_anasensorial();" id="sabor" name="sabor" class="form-control" type="number" step="0.05" min="0" max="9999" style="float: right;width: 60pt; font-size: 11pt;font-weight: 300" required="">
											</div>

											<center>
											Sabor<br>
											<div>
												<img src="vistas/img/iconos/reglasola.png" style="width: 100pt; height: 40%; ">
											</div></center>
										</td>
											<!-- ------------------------------------------------------------------------------------- -->							            		
											<td class="letranegruda">
											<div class="form-group" style="font-weight: 100;margin-top: -60px !important;">
											Score: <!-- $albert[7] -->
											<input value="<?php echo isset($resp["sabor_residual"]) ? $resp["sabor_residual"] : "" ?>" placeholder="0" onkeyup="arana();intrumento_anasensorial();" id="sabor_residual" name="sabor_residual" class="form-control" type="number" step="0.05" min="0" max="9999" style="float: right;width: 60pt; font-size: 11pt;font-weight: 300" required="">
											</div>
											&nbsp;&nbsp;&nbsp;&nbsp;Sabor&nbsp;&nbsp;residual<br>
											<center>
											<div>
												<img src="vistas/img/iconos/reglasola.png" style="width: 100pt; height: 40%; ">
											</div></center>
										</td>
										
												<!-- ------------------------------------------------------------------------------------- -->							            		
										<td class="letranegruda">
											<div class="form-group" style="font-weight: 100">
											Score:
											<input value="<?php echo isset($resp["acidez"]) ? $resp["acidez"] : "" ?>" placeholder="0" onkeyup="arana();intrumento_anasensorial()" id="acidez" name="acidez" class="form-control" type="number" step="0.05" min="0" max="9999" style="float: right;width: 60pt; font-size: 11pt;font-weight: 300" required="">
											</div>
											&nbsp;&nbsp;&nbsp;&nbsp;Acidez <br>
											<center>
											<div>
											<img src="vistas/img/iconos/intensidad.png" style="width: 100pt; height: 40%; ">
											</div>
											</center>
										</td>
												<!-- ------------------------------------------------------------------------------------- -->							            		
										
												<!-- ------------------------------------------------------------------------------------- -->							            		
										<td class="letranegruda">
											<div class="form-group" style="font-weight: 100;margin-top: 5px !important;">
											Score: <!-- $albert[7] -->
											<input value="<?php echo isset($resp["cuerpo"]) ? $resp["cuerpo"] : "" ?>" placeholder="0" onkeyup="arana();intrumento_anasensorial();" id="cuerpo" name="cuerpo" class="form-control" type="number" step="0.05" min="0" max="9999" style="float: right;width: 60pt; font-size: 11pt;font-weight: 300" required="">
											</div>
											&nbsp;&nbsp;&nbsp;&nbsp;Cuerpo<br>
											<center>
											<div>
												<img src="vistas/img/iconos/nivel.png" style="width: 100pt; height: 40%; ">
											</div></center>
										</td>
												<!-- ------------------------------------------------------------------------------------- -->	
													<td class="letranegruda">
														<div class="form-group" style="font-weight: 100;margin-top: 5px !important;">
														Score: <!-- $albert[7] -->
														<input value="<?php echo isset($resp["dulzura"]) ? $resp["dulzura"] : "" ?>" placeholder="0" onkeyup="arana();intrumento_anasensorial();" id="dulzura" name="dulzura" class="form-control" type="number" step="0.05" min="0" max="9999" style="float: right;width: 60pt; font-size: 11pt;font-weight: 300" required="">
														</div>
														&nbsp;&nbsp;&nbsp;&nbsp;Dulzura<br>
														<center>
														<div>
															<img src="vistas/img/iconos/desarrollo.png" style="width: 100pt; height: 40%; ">
														</div></center>
													</td>						            		
												<!-- ------------------------------------------------------------------------------------- -->		
													<td class="letranegruda">
															<div class="form-group" style="font-weight: 100;margin-top: -60px !important;">
															Score: <!-- $albert[7] -->
															<input value="<?php echo isset($resp["balance"]) ? $resp["balance"] : "" ?>" placeholder="0" onkeyup="arana();intrumento_anasensorial();" id="balance" name="balance" class="form-control" type="number" step="0.05" min="0" max="9999" style="float: right;width: 60pt; font-size: 11pt;font-weight: 300" required="">
															</div>

															&nbsp;&nbsp;&nbsp;&nbsp;Balance<br>
															<center>
															<div>
																<img src="vistas/img/iconos/reglasola.png" style="width: 100pt; height: 40%; ">
															</div></center>
														</td>		
												<!-- ------------------------------------------------------------------------------------- -->	
													<!-- ------------------------------------------------------------------------------------- -->		
													<td class="letranegruda">
															<div class="form-group" style="font-weight: 100;margin-top: -60px !important;">
															Score: <!-- $albert[7] -->
															<input value="<?php echo isset($resp["taza_a_perfil"]) ? $resp["taza_a_perfil"] : "" ?>" placeholder="0" onkeyup="arana();intrumento_anasensorial();" id="taza_a_perfil" name="taza_a_perfil" class="form-control" type="number" step="0.05" min="0" max="9999" style="float: right;width: 60pt; font-size: 11pt;font-weight: 300" required="">
															</div>
															<br>
															&nbsp;&nbsp;&nbsp;&nbsp;Taza-a-Perfil<br>
															<center>
															<div>
																<img src="vistas/img/iconos/reglasola.png" style="width: 100pt; height: 40%; ">
															</div></center>
														</td>		
												<!-- ------------------------------------------------------------------------------------- -->		
												<!-- ------------------------------------------------------------------------------------- -->		
													<td class="letranegruda">
															<div class="form-group" style="font-weight: 100;margin-top: -60px !important;">
															
															<input value="<?php echo isset($resp["puntaje_total"]) ? $resp["puntaje_total"] : "" ?>" placeholder="0" onkeyup="arana();intrumento_anasensorial();" id="puntaje_total" name="puntaje_total" class="form-control" type="number" step="0.05" min="0" max="9999" style="float: right;width: 60pt; font-size: 11pt;font-weight: 300" required="">
															</div>
															<br>
															&nbsp;&nbsp;&nbsp;&nbsp;Puntaje total<br>
														</td>		
												<!-- ------------------------------------------------------------------------------------- -->	
																			
								</tr>
								<tr>
									<td colspan="10">
										<center>
										<!--<div id="chartDiv" style="max-width: 420px;height: 380px;margin: 0px auto">
										</div>-->
										<div id="chartDiv">
											<canvas id="myChart" style="max-width: 460px;height: 380px;margin: 0px auto"></canvas>
										</div>
										</center>
									</td>
								</tr>
								<tr >
									<td colspan="9" style="border-bottom: 1px solid #f5f5f5 !important;">
										Defectos de torrefacción (Restar del puntaje total)<br>
									</td>
									<td colspan="1" rowspan="2" style="width: 200px !important">
										<div class="col-auto">
											<label for="staticEmail2" class="visually-hidden">Puntaje total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
											<input  value="<?php echo isset($resp["puntaje_total"]) ? $resp["puntaje_total"] : "" ?>" placeholder="0" style="width: 90px !important; margin-bottom: 10px !important;" type="number" step="0.05" name="puntaje_total_espejo" id="puntaje_total_espejo" readonly class="form-control-lg">
										</div>
										<div class="col-auto">
											<label for="staticEmail2" class="visually-hidden">- Defectos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
											<input  value="<?php echo isset($resp["defectos"]) ? $resp["defectos"] : "" ?>" placeholder="0" style="width: 90px !important; margin-bottom: 10px !important;" type="number" step="0.05" name="defectos" id="defectos" readonly class="form-control-lg">
										</div>
										<div class="col-auto">
											<label for="staticEmail2" class="visually-hidden">=PUNTAJE FINAL</label>
											<input  value="<?php echo isset($resp["puntaje_final"]) ? $resp["puntaje_final"] : "" ?>" placeholder="0" style="width: 90px !important; margin-bottom: 10px !important;" type="number" step="0.05" name="puntaje_final" id="puntaje_final" readonly class="form-control-lg">
										</div>
									</td>	
								</tr>
								<tr>									
									<td colspan="1" style="border-right: 1px solid #f5f5f5 !important;width: 150px !important;">
										<img src="vistas/img/iconos/subdesarrollo.png" style="width: 90pt !important; height: auto; ">
										<input type="number" step="0.05" value="<?php echo isset($resp["subdesarrollo"]) ? $resp["subdesarrollo"] : "" ?>" placeholder="0" onkeyup="arana();intrumento_anasensorial();" name="subdesarrollo" id="subdesarrollo" style="margin-top:4px !important; width: 80px !important;">
									</td>
									<td colspan="1" style="border-right: 1px solid #f5f5f5 !important;width: 150px !important;">
										<img src="vistas/img/iconos/sobredesarrollo.png" style="width: 90pt !important; height: auto; ">
										<input type="number" step="0.05" value="<?php echo isset($resp["sobre_desarrollo"]) ? $resp["sobre_desarrollo"] : "" ?>" placeholder="0" onkeyup="arana();intrumento_anasensorial();" name="sobre_desarrollo" id="sobre_desarrollo" style="margin-top:4px !important; width: 80px !important;">
									</td>
									<td colspan="1" style="border-right: 1px solid #f5f5f5 !important;width: 150px !important;">
										<img src="vistas/img/iconos/horneado.png" style="width: 90pt !important; height: auto; ">
										<input type="number" step="0.05" value="<?php echo isset($resp["horneado"]) ? $resp["horneado"] : "" ?>" placeholder="0" onkeyup="arana();intrumento_anasensorial();" name="horneado" id="horneado" style="margin-top:4px !important; width: 80px !important;">
									</td>
									<td colspan="1" style="border-right: 1px solid #f5f5f5 !important;width: 150px !important;">
										<img src="vistas/img/iconos/quemado.png" style="width: 90pt !important; height: auto; ">
										<input type="number" step="0.05" value="<?php echo isset($resp["quemado"]) ? $resp["quemado"] : "" ?>" placeholder="0" onkeyup="arana();intrumento_anasensorial();" name="quemado" id="quemado" style="margin-top:4px !important; width: 80px !important;">
									</td>
									<td colspan="5" >
										<div class="mb-3">
											<label for="exampleFormControlTextarea1" class="form-label">Defectos de torrefacción <b>NOTAS:</b></label>
											<textarea class="form-control" name="defectos_notas" id="defectos_notas" rows="9"><?php echo isset($resp["defectos_notas"]) ? $resp["defectos_notas"] : "" ?></textarea>
										</div>
									</td>

									
								</tr>
							</tbody>    	
							</table>

				</div>
				<div class="box-footer with-border pull-right" style="margin-right: 20px !important;">        
					<div class="btn-group">
						<div class="btn-group">
							<button type="submit" id="submit" class="btn btn-primary">
								<i class="fa fa-save" aria-hidden="true"></i> Guardar Historial BPM
							</button>
						</div>
					</div>
				</div>
				
			</form>
      </div>
	  <div id="respMsj">

		</div>
    </div>
  </section>
</div>

<script type="text/javascript">
/*=================================== instrumento sensorial ficha new ====================================*/
  function intrumento_anasensorial(){

    var fragancia_aroma= document.getElementById("fragancia_aroma").value == '' ?  "0" : document.getElementById("fragancia_aroma").value;
    var sabor= document.getElementById("sabor").value == '' ?  "0" : document.getElementById("sabor").value;
	var sabor_residual= document.getElementById("sabor_residual").value == '' ?  "0" : document.getElementById("sabor_residual").value;
	var acidez= document.getElementById("acidez").value == '' ?  "0" : document.getElementById("acidez").value;
	var cuerpo= document.getElementById("cuerpo").value == '' ?  "0" : document.getElementById("cuerpo").value;
	var dulzura= document.getElementById("dulzura").value == '' ?  "0" : document.getElementById("dulzura").value;
	var balance= document.getElementById("balance").value == '' ?  "0" : document.getElementById("balance").value;
	var taza_a_perfil= document.getElementById("taza_a_perfil").value == '' ?  "0" : document.getElementById("taza_a_perfil").value;

	let puntaje_total = parseFloat(fragancia_aroma)+parseFloat(sabor)+parseFloat(sabor_residual)+parseFloat(acidez)+parseFloat(cuerpo)+parseFloat(dulzura)+parseFloat(balance)+parseFloat(taza_a_perfil);
    document.getElementById("puntaje_total").value = puntaje_total.toFixed(2);
	document.getElementById("puntaje_total_espejo").value = puntaje_total.toFixed(2);
	console.log(puntaje_total);

    var subdesarrollo= document.getElementById("subdesarrollo").value == '' ?  "0" : document.getElementById("subdesarrollo").value;
    var sobre_desarrollo= document.getElementById("sobre_desarrollo").value == '' ?  "0" : document.getElementById("sobre_desarrollo").value;
	var horneado= document.getElementById("horneado").value == '' ?  "0" : document.getElementById("horneado").value;
	var quemado= document.getElementById("quemado").value == '' ?  "0" : document.getElementById("quemado").value;

	let defectos = parseFloat(subdesarrollo)+parseFloat(sobre_desarrollo)+parseFloat(horneado)+parseFloat(quemado);
    document.getElementById("defectos").value = defectos.toFixed(2);

	let puntaje_final = parseFloat(puntaje_total)-parseFloat(defectos);
    document.getElementById("puntaje_final").value = puntaje_final.toFixed(2);


  }
  var marksCanvas = document.getElementById("myChart");
  $(document).ready(function(){
	  arana();
  });
  function arana() {
		var fragancia_aroma= document.getElementById("fragancia_aroma").value == '' ?  "0" : document.getElementById("fragancia_aroma").value;
		var sabor= document.getElementById("sabor").value == '' ?  "0" : document.getElementById("sabor").value;
		var sabor_residual= document.getElementById("sabor_residual").value == '' ?  "0" : document.getElementById("sabor_residual").value;
		var acidez= document.getElementById("acidez").value == '' ?  "0" : document.getElementById("acidez").value;
		var cuerpo= document.getElementById("cuerpo").value == '' ?  "0" : document.getElementById("cuerpo").value;
		var dulzura= document.getElementById("dulzura").value == '' ?  "0" : document.getElementById("dulzura").value;
		var balance= document.getElementById("balance").value == '' ?  "0" : document.getElementById("balance").value;
		var taza_a_perfil= document.getElementById("taza_a_perfil").value == '' ?  "0" : document.getElementById("taza_a_perfil").value;

		let puntaje_total = parseFloat(fragancia_aroma)+parseFloat(sabor)+parseFloat(sabor_residual)+parseFloat(acidez)+parseFloat(cuerpo)+parseFloat(dulzura)+parseFloat(balance)+parseFloat(taza_a_perfil);
		document.getElementById("puntaje_total").value = puntaje_total.toFixed(2);
		document.getElementById("puntaje_total_espejo").value = puntaje_total.toFixed(2);
		console.log(puntaje_total);

		var subdesarrollo= document.getElementById("subdesarrollo").value == '' ?  "0" : document.getElementById("subdesarrollo").value;
		var sobre_desarrollo= document.getElementById("sobre_desarrollo").value == '' ?  "0" : document.getElementById("sobre_desarrollo").value;
		var horneado= document.getElementById("horneado").value == '' ?  "0" : document.getElementById("horneado").value;
		var quemado= document.getElementById("quemado").value == '' ?  "0" : document.getElementById("quemado").value;

		let defectos = parseFloat(subdesarrollo)+parseFloat(sobre_desarrollo)+parseFloat(horneado)+parseFloat(quemado);
		document.getElementById("defectos").value = defectos.toFixed(2);

		let puntaje_final = parseFloat(puntaje_total)-parseFloat(defectos);
		document.getElementById("puntaje_final").value = puntaje_final.toFixed(2);
		
		const data = {
		labels: [
			'Fragancia / Aroma', 
			'Sabor',
			'Sabor residual',
			'Acidez',
			'Cuerpo',
			'Dulzura',
			'Balance',
			'Taza a Perfil'
		],
		datasets: [
			/*{
			label: 'My First Dataset',
			data: [65, 59, 90, 81, 56, 55, 40],
			fill: true,
			backgroundColor: 'rgba(255, 99, 132, 0.2)',
			borderColor: 'rgb(255, 99, 132)',
			pointBackgroundColor: 'rgb(255, 99, 132)',
			pointBorderColor: '#fff',
			pointHoverBackgroundColor: '#fff',
			pointHoverBorderColor: 'rgb(255, 99, 132)'
			}, */{
			label: 'Análisis sensorial de productos terminados',
			data: [
				fragancia_aroma, 
				sabor, 
				sabor_residual, 
				acidez, 
				cuerpo, 
				dulzura, 
				balance, 
				taza_a_perfil
			],
			fill:true,
			radius: 5,
            pointRadius: 5,
			pointBorderWidth: 1,
			backgroundColor: 'rgba(92, 184, 92, 0.2)',
            borderColor: 'rgb(92, 184, 92)',
            pointBackgroundColor: 'rgb(92, 184, 92)',
            pointBorderColor: '#fff',
            pointHoverBackgroundColor: '#fff',
            pointHoverBorderColor: 'rgb(92, 184, 92)'
			}
		]
		};

		const config = {
		type: 'radar',
		data: data,
		options: {
			elements: {
				line: {
					borderWidth: 3
				}
			},
			scales: {
				r: {
					alignToPixels: true,
					grid: {
						color: ['rgb(160, 160, 160)'],
						lineWidth: 1
					},
					angleLines: {
						color: ['rgb(160, 160, 160)'],
						lineWidth: 1
					},
					suggestedMin: 0,
					suggestedMax: 10,
					pointLabels: {
						font: {
							family: 'Source Sans Pro',
							weight: '900',
							size: 12
						}
					}
				}
			},
			
			plugins: {
				legend: {
					labels: {
						// This more specific font property overrides the global property
						font: {
							family: 'Source Sans Pro',
							weight: '900',
							size: 14
						}
					}
				}
			}
		},
		};

		$('#myChart').remove();
		$('#chartDiv').append('<canvas id="myChart" style="max-width: 460px;height: 380px;margin: 0px auto"></canvas>');

		const myChart = new Chart(
			document.getElementById('myChart'),
			config
		);
		
  	}

  jQuery('#asptForm').on('submit', function (e) {
		//SET IMAGE CANVAS
		var fecha = new Date();
		var nombre_imagen = fecha.getHours() + "_" + fecha.getMinutes() + "_" + fecha.getSeconds() + "_" + fecha.getMilliseconds()+".png";
		var canvas = document.getElementById("myChart");
		image = canvas.toDataURL("image/png");

    if (document.getElementById("asptForm").checkValidity()) {
		var url_link = 'controladores/analisis_sensorial_de_productos_terminados.controlador.php';
        e.preventDefault();

		var data = jQuery('#asptForm').serializeArray();// convert form to array
		data.push({name: "nombre_imagen", value: nombre_imagen}, {name: "image", value: image});

        jQuery.ajax({
            url: url_link,
            method: 'POST',
            data: $.param(data),
            success: function (response) {
                //do stuff with response
				console.log("hola"+response);
				$('#respMsj').html(response)
				
				$("#success-alert").fadeTo(3000, 500).slideUp(500, function(){
					$("#success-alert").slideUp(500);
				});
            }
        })
    }
    return true;
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

<script>

    
</script>




