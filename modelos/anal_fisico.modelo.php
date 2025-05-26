<?php
/**
 * Created by PhpStorm.
 * User: LABAD
 * Date: 22/01/2019
 * Time: 09:44 PM
 insert into t1 select max(id)+1 from t1  <-- Para a«Ğadir sum a un campo in insert into

 ***MOMORY:
 A ver creaste....
 */
	require_once "config.php";
	$accion=$_POST['accion'];
	switch ($accion) {
		/*------------------------------------------------------------------------------------*/
	    case "Newad":	
	    		$fecha_recepcion=$_POST['fecha_recepcion'];
					$fecha_analisis=$_POST['fecha_analisis'];
					$codigo_interno=$_POST['codigo_interno'];
					$varidad=$_POST['varidad'];

					
					$cosecha=$_POST['cosecha'];
					
					$analisis_de_pergamino=$_POST['analisis_de_pergamino'];
					$proceso_organico=$_POST['proceso_organico'];
					$proceso_convencional=$_POST['proceso_convencional'];

					$peso_pergamino=$_POST['peso_pergamino'];
					$h_pergamino=$_POST['h_pergamino'];
					$normal_pergamino=$_POST['normal_pergamino'];
					$disparejo_pergamino=$_POST['disparejo_pergamino'];
					$manchado_pergamino=$_POST['manchado_pergamino'];
					$negruzco_pergamino=$_POST['negruzco_pergamino'];
					$otros_pergamino=$_POST['otros_pergamino'];
					$fresco_pergamino=$_POST['fresco_pergamino'];
					$viejo_pergamino=$_POST['viejo_pergamino'];
					$fermento_pergamino=$_POST['fermento_pergamino'];
					$terroso_pergamino=$_POST['terroso_pergamino'];
					$hierbas_pergamino=$_POST['hierbas_pergamino'];
					$moho_pergamino=$_POST['moho_pergamino'];
					$peso_oro=$_POST['peso_oro'];
					$h_oro=$_POST['h_oro'];
					$normal_oro=$_POST['normal_oro'];
					$blanqueado_oro=$_POST['blanqueado_oro'];
					$disparejo_oro=$_POST['disparejo_oro'];
					$amarillo_oro=$_POST['amarillo_oro'];
					$traslucido_oro=$_POST['traslucido_oro'];
					$azulado_oro=$_POST['azulado_oro'];
					$fresco_oro=$_POST['fresco_oro'];
					$viejo_oro=$_POST['viejo_oro'];
					$fermento_oro=$_POST['fermento_oro'];
					$terroso_oro=$_POST['terroso_oro'];
					$hierbas_oro=$_POST['hierbas_oro'];
					$moho_oro=$_POST['moho_oro'];
					$observaciones=$_POST['observaciones'];
					$peso_cascarilla=$_POST['peso_cascarilla'];
					$porcentaje_cascarilla=$_POST['porcentaje_cascarilla'];
					$peso1_granulometria=$_POST['peso1_granulometria'];
					$peso2_granulometria=$_POST['peso2_granulometria'];
					$peso3_granulometria=$_POST['peso3_granulometria'];
					$peso4_granulometria=$_POST['peso4_granulometria'];
					$peso5_granulometria=$_POST['peso5_granulometria'];
					$peso6_granulometria=$_POST['peso6_granulometria'];
					$peso7_granulometria=$_POST['peso7_granulometria'];
					$peso_total_granulometria=$_POST['peso_total_granulometria'];
					$porcentaje1_granulometria=$_POST['porcentaje1_granulometria'];
					$porcentaje2_granulometria=$_POST['porcentaje2_granulometria'];
					$porcentaje3_granulometria=$_POST['porcentaje3_granulometria'];
					$porcentaje4_granulometria=$_POST['porcentaje4_granulometria'];
					$porcentaje5_granulometria=$_POST['porcentaje5_granulometria'];
					$porcentaje6_granulometria=$_POST['porcentaje6_granulometria'];
					$porcentaje7_granulometria=$_POST['porcentaje7_granulometria'];
					$porcentaje_total_granulometria=$_POST['porcentaje_total_granulometria'];
					$grano1_muestra=$_POST['grano1_muestra'];
					$grano2_muestra=$_POST['grano2_muestra'];
					$grano3_muestra=$_POST['grano3_muestra'];
					$grano4_muestra=$_POST['grano4_muestra'];
					$grano5_muestra=$_POST['grano5_muestra'];
					$grano6_muestra=$_POST['grano6_muestra'];
					$grano7_muestra=$_POST['grano7_muestra'];
					$grano8_muestra=$_POST['grano8_muestra'];
					$grano9_muestra=$_POST['grano9_muestra'];
					$grano10_muestra=$_POST['grano10_muestra'];
					$grano11_muestra=$_POST['grano11_muestra'];
					$grano12_muestra=$_POST['grano12_muestra'];
					$grano13_muestra=$_POST['grano13_muestra'];
					$grano14_muestra=$_POST['grano14_muestra'];
					$grano15_muestra=$_POST['grano15_muestra'];
					$grano16_muestra=$_POST['grano16_muestra'];
					$defecto1_muestra=$_POST['defecto1_muestra'];
					$defecto2_muestra=$_POST['defecto2_muestra'];
					$defecto3_muestra=$_POST['defecto3_muestra'];
					$defecto4_muestra=$_POST['defecto4_muestra'];
					$defecto5_muestra=$_POST['defecto5_muestra'];
					$defecto6_muestra=$_POST['defecto6_muestra'];
					$defecto7_muestra=$_POST['defecto7_muestra'];
					$defecto8_muestra=$_POST['defecto8_muestra'];
					$defecto9_muestra=$_POST['defecto9_muestra'];
					$defecto10_muestra=$_POST['defecto10_muestra'];
					$defecto11_muestra=$_POST['defecto11_muestra'];
					$defecto12_muestra=$_POST['defecto12_muestra'];
					$defecto13_muestra=$_POST['defecto13_muestra'];
					$defecto14_muestra=$_POST['defecto14_muestra'];
					$defecto15_muestra=$_POST['defecto15_muestra'];
					$defecto16_muestra=$_POST['defecto16_muestra'];
					$suma_total_defectos=$_POST['suma_total_defectos'];
					$peso_defectos_total=$_POST['peso_defectos_total'];
					$porcentaje_defectos=$_POST['porcentaje_defectos'];
					$rendimiento_exportable=$_POST['rendimiento_exportable'];
					$idcliente=$_POST['idcliente'];
					$correlativo=$_POST['correlativo'];
					

	    			
	    			mysqli_query($conexion,"INSERT INTO `anal_fisico` (`pk_anal_fisico`, `fecha_recepcion`, `fecha_analisis`, 
					`codigo_interno`, `varidad`, `cosecha`, `analisis_de_pergamino`, 
					`proceso_organico`, `proceso_convencional`, `peso_pergamino`, `h_pergamino`, 
					`normal_pergamino`, `disparejo_pergamino`, `manchado_pergamino`, `negruzco_pergamino`, `otros_pergamino`, `fresco_pergamino`, `viejo_pergamino`, 
					`fermento_pergamino`, `terroso_pergamino`, `hierbas_pergamino`, `moho_pergamino`, 
					`peso_oro`, `h_oro`, `normal_oro`, `blanqueado_oro`, `disparejo_oro`, `amarillo_oro`, `traslucido_oro`, 
					`azulado_oro`, `fresco_oro`, `viejo_oro`, `fermento_oro`, 
					`terroso_oro`, `hierbas_oro`, `moho_oro`, `observaciones`, `peso_cascarilla`, `porcentaje_cascarilla`, `peso1_granulometria`, 
					`peso2_granulometria`, `peso3_granulometria`, `peso4_granulometria`, `peso5_granulometria`, 
					`peso6_granulometria`, `peso7_granulometria`, `peso_total_granulometria`, `porcentaje1_granulometria`, `porcentaje2_granulometria`, `porcentaje3_granulometria`, `porcentaje4_granulometria`, 
					`porcentaje5_granulometria`, `porcentaje6_granulometria`, `porcentaje7_granulometria`, `porcentaje_total_granulometria`, 
					`grano1_muestra`, `grano2_muestra`, `grano3_muestra`, `grano4_muestra`, `grano5_muestra`, `grano6_muestra`, `grano7_muestra`, 
					`grano8_muestra`, `grano9_muestra`, `grano10_muestra`, `grano11_muestra`, 
					`grano12_muestra`, `grano13_muestra`, `grano14_muestra`, `grano15_muestra`, `grano16_muestra`, `defecto1_muestra`, `defecto2_muestra`, 
					`defecto3_muestra`, `defecto4_muestra`, `defecto5_muestra`, `defecto6_muestra`, 
					`defecto7_muestra`, `defecto8_muestra`, `defecto9_muestra`, `defecto10_muestra`, `defecto11_muestra`, `defecto12_muestra`, `defecto13_muestra`, 
					`defecto14_muestra`, `defecto15_muestra`, `defecto16_muestra`, `suma_total_defectos`, 
					`peso_defectos_total`, `porcentaje_defectos`, `rendimiento_exportable`, `idcliente`, `correlativo`) VALUES (NULL, '$fecha_recepcion', '$fecha_analisis', '$codigo_interno', 
					'$varidad', '$cosecha', '$analisis_de_pergamino', '$proceso_organico', '$proceso_convencional'
					, '$peso_pergamino', '$h_pergamino', '$normal_pergamino', 
					'$disparejo_pergamino', '$manchado_pergamino', '$negruzco_pergamino', '$otros_pergamino', '$fresco_pergamino', '$viejo_pergamino', '$fermento_pergamino', '$terroso_pergamino'
					, '$hierbas_pergamino', '$moho_pergamino', '$peso_oro', 
					'$h_oro', '$normal_oro', '$blanqueado_oro', '$disparejo_oro', '$amarillo_oro', '$traslucido_oro', '$azulado_oro', '$fresco_oro', '$viejo_oro'
					, '$fermento_oro', '$terroso_oro', '$hierbas_oro', 
					'$moho_oro', '$observaciones', '$peso_cascarilla', '$porcentaje_cascarilla', '$peso1_granulometria', '$peso2_granulometria', '$peso3_granulometria', '$peso4_granulometria'
					, '$peso5_granulometria', '$peso6_granulometria', '$peso7_granulometria', 
					'$peso_total_granulometria', '$porcentaje1_granulometria', '$porcentaje2_granulometria', '$porcentaje3_granulometria', '$porcentaje4_granulometria', '$porcentaje5_granulometria', '$porcentaje6_granulometria', '$porcentaje7_granulometria'
					, '$porcentaje_total_granulometria', '$grano1_muestra', '$grano2_muestra', 
					'$grano3_muestra', '$grano4_muestra', '$grano5_muestra', '$grano6_muestra', '$grano7_muestra', '$grano8_muestra', '$grano9_muestra', '$grano10_muestra'
					, '$grano11_muestra', '$grano12_muestra', '$grano13_muestra', 
					'$grano14_muestra', '$grano15_muestra', '$grano16_muestra', '$defecto1_muestra', '$defecto2_muestra', '$defecto3_muestra', '$defecto4_muestra', '$defecto5_muestra'
					, '$defecto6_muestra', '$defecto7_muestra', '$defecto8_muestra', 
					'$defecto9_muestra', '$defecto10_muestra', '$defecto11_muestra', '$defecto12_muestra', '$defecto13_muestra', '$defecto14_muestra', '$defecto15_muestra', '$defecto16_muestra'
					, '$suma_total_defectos', '$peso_defectos_total', '$porcentaje_defectos', 
					'$rendimiento_exportable','$idcliente','$correlativo');");

					echo 1;
					
			/*echo "$fecha_recepcion".", "."$fecha_analisis".", "."$codigo_interno"
			  .", "."$varidad".", "."$nombre_cliente".", "."$productor".", "."$cosecha"
			  .", "."$ubicacion".", "."$analisis_de_pergamino".", "."$proceso_organico".", "."$proceso_convencional";*/
			      

      				break;
	    /*------------------------------------------------------------------------------------*/
			case "updatad":
					$idGetValor=$_POST['idGetValor'];

					//$sql= "SELECT * FROM anal_fisico WHERE pk_anal_fisico='$idGetValor'";
					$sql= "SELECT anal_fisico.pk_anal_fisico, anal_fisico.fecha_recepcion, anal_fisico.fecha_analisis, 
					anal_fisico.codigo_interno, anal_fisico.varidad, anal_fisico.idcliente, clientes.asoc_coop, anal_fisico.cosecha, clientes.direccion, anal_fisico.analisis_de_pergamino, 
					anal_fisico.proceso_organico, anal_fisico.proceso_convencional, anal_fisico.peso_pergamino, anal_fisico.h_pergamino, 
					anal_fisico.normal_pergamino, anal_fisico.disparejo_pergamino, anal_fisico.manchado_pergamino, anal_fisico.negruzco_pergamino, anal_fisico.otros_pergamino, anal_fisico.fresco_pergamino, anal_fisico.viejo_pergamino, 
					anal_fisico.fermento_pergamino, anal_fisico.terroso_pergamino, anal_fisico.hierbas_pergamino, anal_fisico.moho_pergamino, 
					anal_fisico.peso_oro, anal_fisico.h_oro, anal_fisico.normal_oro, anal_fisico.blanqueado_oro, anal_fisico.disparejo_oro, anal_fisico.amarillo_oro, anal_fisico.traslucido_oro, 
					anal_fisico.azulado_oro, anal_fisico.fresco_oro, anal_fisico.viejo_oro, anal_fisico.fermento_oro, anal_fisico.
					terroso_oro, anal_fisico.hierbas_oro, anal_fisico.moho_oro, anal_fisico.observaciones, anal_fisico.peso_cascarilla, anal_fisico.porcentaje_cascarilla, anal_fisico.peso1_granulometria, anal_fisico.
					peso2_granulometria, anal_fisico.peso3_granulometria, anal_fisico.peso4_granulometria, anal_fisico.peso5_granulometria, anal_fisico.
					peso6_granulometria, anal_fisico.peso7_granulometria, anal_fisico.peso_total_granulometria, anal_fisico.porcentaje1_granulometria, anal_fisico.porcentaje2_granulometria, anal_fisico.porcentaje3_granulometria, anal_fisico.porcentaje4_granulometria, anal_fisico.
					porcentaje5_granulometria, anal_fisico.porcentaje6_granulometria, anal_fisico.porcentaje7_granulometria, anal_fisico.porcentaje_total_granulometria, anal_fisico.
					grano1_muestra, anal_fisico.grano2_muestra, anal_fisico.grano3_muestra, anal_fisico.grano4_muestra, anal_fisico.grano5_muestra, anal_fisico.grano6_muestra, anal_fisico.grano7_muestra, anal_fisico.
					grano8_muestra, anal_fisico.grano9_muestra, anal_fisico.grano10_muestra, anal_fisico.grano11_muestra, anal_fisico.
					grano12_muestra, anal_fisico.grano13_muestra, anal_fisico.grano14_muestra, anal_fisico.grano15_muestra, anal_fisico.grano16_muestra, anal_fisico.defecto1_muestra, anal_fisico.defecto2_muestra, anal_fisico.
					defecto3_muestra, anal_fisico.defecto4_muestra, anal_fisico.defecto5_muestra, anal_fisico.defecto6_muestra, anal_fisico.
					defecto7_muestra, anal_fisico.defecto8_muestra, anal_fisico.defecto9_muestra, anal_fisico.defecto10_muestra, anal_fisico.defecto11_muestra, anal_fisico.defecto12_muestra, anal_fisico.defecto13_muestra, anal_fisico.
					defecto14_muestra, anal_fisico.defecto15_muestra, anal_fisico.defecto16_muestra, anal_fisico.suma_total_defectos, anal_fisico.
					peso_defectos_total, anal_fisico.porcentaje_defectos, anal_fisico.rendimiento_exportable FROM anal_fisico inner join clientes
					on anal_fisico.idcliente=clientes.id WHERE pk_anal_fisico='$idGetValor'";

					$result=mysqli_query($conexion,$sql);

					while($mostrar=mysqli_fetch_row($result)){
						$pk_anal_fisico = $mostrar[0];
						$fecha_recepcion =$mostrar[1];
						$fecha_analisis =$mostrar[2];
						$codigo_interno =$mostrar[3];
						$varidad =$mostrar[4];
						$idcliente =$mostrar[5];
						$asoc_coop =$mostrar[6];
						$cosecha =$mostrar[7];
						$ubicacion =$mostrar[8];
						$analisis_de_pergamino =$mostrar[9];
						$proceso_organico =$mostrar[10];
						$proceso_convencional =$mostrar[11];

						$peso_pergamino=$mostrar[12];
						$h_pergamino=$mostrar[13];
						$normal_pergamino=$mostrar[14];
						$disparejo_pergamino=$mostrar[15];
						$manchado_pergamino=$mostrar[16];
						$negruzco_pergamino=$mostrar[17];
						$otros_pergamino=$mostrar[18];
						$fresco_pergamino=$mostrar[19];
						$viejo_pergamino=$mostrar[20];
						$fermento_pergamino=$mostrar[21];
						$terroso_pergamino=$mostrar[22];
						$hierbas_pergamino=$mostrar[23];
						$moho_pergamino=$mostrar[24];
						$peso_oro=$mostrar[25];
						$h_oro=$mostrar[26];
						$normal_oro=$mostrar[27];
						$blanqueado_oro=$mostrar[28];
						$disparejo_oro=$mostrar[29];
						$amarillo_oro=$mostrar[30];
						$traslucido_oro=$mostrar[31];
						$azulado_oro=$mostrar[32];
						$fresco_oro=$mostrar[33];
						$viejo_oro=$mostrar[34];
						$fermento_oro=$mostrar[35];
						$terroso_oro=$mostrar[36];
						$hierbas_oro=$mostrar[37];
						$moho_oro=$mostrar[38];
						$observaciones=$mostrar[39];
						$peso_cascarilla=$mostrar[40];
						$porcentaje_cascarilla=$mostrar[41];
						$peso1_granulometria=$mostrar[42];
						$peso2_granulometria=$mostrar[43];
						$peso3_granulometria=$mostrar[44];
						$peso4_granulometria=$mostrar[45];
						$peso5_granulometria=$mostrar[46];
						$peso6_granulometria=$mostrar[47];
						$peso7_granulometria=$mostrar[48];
						$peso_total_granulometria=$mostrar[49];
						$porcentaje1_granulometria=$mostrar[50];
						$porcentaje2_granulometria=$mostrar[51];
						$porcentaje3_granulometria=$mostrar[52];
						$porcentaje4_granulometria=$mostrar[53];
						$porcentaje5_granulometria=$mostrar[54];
						$porcentaje6_granulometria=$mostrar[55];
						$porcentaje7_granulometria=$mostrar[56];
						$porcentaje_total_granulometria=$mostrar[57];
						$grano1_muestra=$mostrar[58];
						$grano2_muestra=$mostrar[59];
						$grano3_muestra=$mostrar[60];
						$grano4_muestra=$mostrar[61];
						$grano5_muestra=$mostrar[62];
						$grano6_muestra=$mostrar[63];
						$grano7_muestra=$mostrar[64];
						$grano8_muestra=$mostrar[65];
						$grano9_muestra=$mostrar[66];
						$grano10_muestra=$mostrar[67];
						$grano11_muestra=$mostrar[68];
						$grano12_muestra=$mostrar[69];
						$grano13_muestra=$mostrar[70];
						$grano14_muestra=$mostrar[71];
						$grano15_muestra=$mostrar[72];
						$grano16_muestra=$mostrar[73];
						$defecto1_muestra=$mostrar[74];
						$defecto2_muestra=$mostrar[75];
						$defecto3_muestra=$mostrar[76];
						$defecto4_muestra=$mostrar[77];
						$defecto5_muestra=$mostrar[78];
						$defecto6_muestra=$mostrar[79];
						$defecto7_muestra=$mostrar[80];
						$defecto8_muestra=$mostrar[81];
						$defecto9_muestra=$mostrar[82];
						$defecto10_muestra=$mostrar[83];
						$defecto11_muestra=$mostrar[84];
						$defecto12_muestra=$mostrar[85];
						$defecto13_muestra=$mostrar[86];
						$defecto14_muestra=$mostrar[87];
						$defecto15_muestra=$mostrar[88];
						$defecto16_muestra=$mostrar[89];
						$suma_total_defectos=$mostrar[90];
						$peso_defectos_total=$mostrar[91];
						$porcentaje_defectos=$mostrar[92];
						$rendimiento_exportable=$mostrar[93];
					}
					
					require_once "render/render.anal_fisico.modelo.php";
					
					
					
								
								//mysqli_query($conexion,"UPDATE `anal_fisico` SET `fecha_analisis` = '2018-01-02' WHERE `anal_fisico`.`pk_anal_fisico` = 28;");
								
								break;
			/*------------------------------------------------------------------------------------*/
		
			case "updatadinsert":
					$idGetValor=$_POST['idGetValor'];
					$fecha_recepcion=$_POST['fecha_recepcion'];
					$fecha_analisis=$_POST['fecha_analisis'];
					$codigo_interno=$_POST['codigo_interno'];
					$varidad=$_POST['varidad'];
					$idcliente=$_POST['idcliente'];

					$cosecha=$_POST['cosecha'];

					$analisis_de_pergamino=$_POST['analisis_de_pergamino'];
					$proceso_organico=$_POST['proceso_organico'];
					$proceso_convencional=$_POST['proceso_convencional'];

					$peso_pergamino=$_POST['peso_pergamino'];
					$h_pergamino=$_POST['h_pergamino'];
					$normal_pergamino=$_POST['normal_pergamino'];
					$disparejo_pergamino=$_POST['disparejo_pergamino'];
					$manchado_pergamino=$_POST['manchado_pergamino'];
					$negruzco_pergamino=$_POST['negruzco_pergamino'];
					$otros_pergamino=$_POST['otros_pergamino'];
					$fresco_pergamino=$_POST['fresco_pergamino'];
					$viejo_pergamino=$_POST['viejo_pergamino'];
					$fermento_pergamino=$_POST['fermento_pergamino'];
					$terroso_pergamino=$_POST['terroso_pergamino'];
					$hierbas_pergamino=$_POST['hierbas_pergamino'];
					$moho_pergamino=$_POST['moho_pergamino'];
					$peso_oro=$_POST['peso_oro'];
					$h_oro=$_POST['h_oro'];
					$normal_oro=$_POST['normal_oro'];
					$blanqueado_oro=$_POST['blanqueado_oro'];
					$disparejo_oro=$_POST['disparejo_oro'];
					$amarillo_oro=$_POST['amarillo_oro'];
					$traslucido_oro=$_POST['traslucido_oro'];
					$azulado_oro=$_POST['azulado_oro'];
					$fresco_oro=$_POST['fresco_oro'];
					$viejo_oro=$_POST['viejo_oro'];
					$fermento_oro=$_POST['fermento_oro'];
					$terroso_oro=$_POST['terroso_oro'];
					$hierbas_oro=$_POST['hierbas_oro'];
					$moho_oro=$_POST['moho_oro'];
					$observaciones=$_POST['observaciones'];
					$peso_cascarilla=$_POST['peso_cascarilla'];
					$porcentaje_cascarilla=$_POST['porcentaje_cascarilla'];
					$peso1_granulometria=$_POST['peso1_granulometria'];
					$peso2_granulometria=$_POST['peso2_granulometria'];
					$peso3_granulometria=$_POST['peso3_granulometria'];
					$peso4_granulometria=$_POST['peso4_granulometria'];
					$peso5_granulometria=$_POST['peso5_granulometria'];
					$peso6_granulometria=$_POST['peso6_granulometria'];
					$peso7_granulometria=$_POST['peso7_granulometria'];
					$peso_total_granulometria=$_POST['peso_total_granulometria'];
					$porcentaje1_granulometria=$_POST['porcentaje1_granulometria'];
					$porcentaje2_granulometria=$_POST['porcentaje2_granulometria'];
					$porcentaje3_granulometria=$_POST['porcentaje3_granulometria'];
					$porcentaje4_granulometria=$_POST['porcentaje4_granulometria'];
					$porcentaje5_granulometria=$_POST['porcentaje5_granulometria'];
					$porcentaje6_granulometria=$_POST['porcentaje6_granulometria'];
					$porcentaje7_granulometria=$_POST['porcentaje7_granulometria'];
					$porcentaje_total_granulometria=$_POST['porcentaje_total_granulometria'];
					$grano1_muestra=$_POST['grano1_muestra'];
					$grano2_muestra=$_POST['grano2_muestra'];
					$grano3_muestra=$_POST['grano3_muestra'];
					$grano4_muestra=$_POST['grano4_muestra'];
					$grano5_muestra=$_POST['grano5_muestra'];
					$grano6_muestra=$_POST['grano6_muestra'];
					$grano7_muestra=$_POST['grano7_muestra'];
					$grano8_muestra=$_POST['grano8_muestra'];
					$grano9_muestra=$_POST['grano9_muestra'];
					$grano10_muestra=$_POST['grano10_muestra'];
					$grano11_muestra=$_POST['grano11_muestra'];
					$grano12_muestra=$_POST['grano12_muestra'];
					$grano13_muestra=$_POST['grano13_muestra'];
					$grano14_muestra=$_POST['grano14_muestra'];
					$grano15_muestra=$_POST['grano15_muestra'];
					$grano16_muestra=$_POST['grano16_muestra'];
					$defecto1_muestra=$_POST['defecto1_muestra'];
					$defecto2_muestra=$_POST['defecto2_muestra'];
					$defecto3_muestra=$_POST['defecto3_muestra'];
					$defecto4_muestra=$_POST['defecto4_muestra'];
					$defecto5_muestra=$_POST['defecto5_muestra'];
					$defecto6_muestra=$_POST['defecto6_muestra'];
					$defecto7_muestra=$_POST['defecto7_muestra'];
					$defecto8_muestra=$_POST['defecto8_muestra'];
					$defecto9_muestra=$_POST['defecto9_muestra'];
					$defecto10_muestra=$_POST['defecto10_muestra'];
					$defecto11_muestra=$_POST['defecto11_muestra'];
					$defecto12_muestra=$_POST['defecto12_muestra'];
					$defecto13_muestra=$_POST['defecto13_muestra'];
					$defecto14_muestra=$_POST['defecto14_muestra'];
					$defecto15_muestra=$_POST['defecto15_muestra'];
					$defecto16_muestra=$_POST['defecto16_muestra'];
					$suma_total_defectos=$_POST['suma_total_defectos'];
					$peso_defectos_total=$_POST['peso_defectos_total'];
					$porcentaje_defectos=$_POST['porcentaje_defectos'];
					$rendimiento_exportable=$_POST['rendimiento_exportable'];
							
              	mysqli_query($conexion,"UPDATE anal_fisico SET fecha_recepcion = '$fecha_recepcion', fecha_analisis='$fecha_analisis', 
				  codigo_interno='$codigo_interno', varidad='$varidad', idcliente='$idcliente', cosecha='$cosecha', analisis_de_pergamino='$analisis_de_pergamino', 
				  proceso_organico='$proceso_organico', proceso_convencional='$proceso_convencional', peso_pergamino='$peso_pergamino', h_pergamino='$h_pergamino', 
				  normal_pergamino='$normal_pergamino', disparejo_pergamino='$disparejo_pergamino', manchado_pergamino='$manchado_pergamino', negruzco_pergamino='$negruzco_pergamino', otros_pergamino='$otros_pergamino', fresco_pergamino='$fresco_pergamino', viejo_pergamino='$viejo_pergamino', 
				  fermento_pergamino='$fermento_pergamino', terroso_pergamino='$terroso_pergamino', hierbas_pergamino='$hierbas_pergamino', moho_pergamino='$moho_pergamino', 
				  peso_oro='$peso_oro', h_oro='$h_oro', normal_oro='$normal_oro', blanqueado_oro='$blanqueado_oro', disparejo_oro='$disparejo_oro', amarillo_oro='$amarillo_oro', traslucido_oro='$traslucido_oro', 
				  azulado_oro='$azulado_oro', fresco_oro='$fresco_oro', viejo_oro='$viejo_oro', fermento_oro='$fermento_oro', 
				  terroso_oro='$terroso_oro', hierbas_oro='$hierbas_oro', moho_oro='$moho_oro', observaciones='$observaciones', peso_cascarilla='$peso_cascarilla', porcentaje_cascarilla='$porcentaje_cascarilla', peso1_granulometria='$peso1_granulometria', 
				  peso2_granulometria='$peso2_granulometria', peso3_granulometria='$peso3_granulometria', peso4_granulometria='$peso4_granulometria', peso5_granulometria='$peso5_granulometria', 
				  peso6_granulometria='$peso6_granulometria', peso7_granulometria='$peso7_granulometria', peso_total_granulometria='$peso_total_granulometria', porcentaje1_granulometria='$porcentaje1_granulometria', porcentaje2_granulometria='$porcentaje2_granulometria', porcentaje3_granulometria='$porcentaje3_granulometria', porcentaje4_granulometria='$porcentaje4_granulometria', 
				  porcentaje5_granulometria='$porcentaje5_granulometria', porcentaje6_granulometria='$porcentaje6_granulometria', porcentaje7_granulometria='$porcentaje7_granulometria', porcentaje_total_granulometria='$porcentaje_total_granulometria', 
				  grano1_muestra='$grano1_muestra', grano2_muestra='$grano2_muestra', grano3_muestra='$grano3_muestra', grano4_muestra='$grano4_muestra', grano5_muestra='$grano5_muestra', grano6_muestra='$grano6_muestra', grano7_muestra='$grano7_muestra', 
				  grano8_muestra='$grano8_muestra', grano9_muestra='$grano9_muestra', grano10_muestra='$grano10_muestra', grano11_muestra='$grano11_muestra', 
				  grano12_muestra='$grano12_muestra', grano13_muestra='$grano13_muestra', grano14_muestra='$grano14_muestra', grano15_muestra='$grano15_muestra', grano16_muestra='$grano16_muestra', defecto1_muestra='$defecto1_muestra', defecto2_muestra='$defecto2_muestra', 
				  defecto3_muestra='$defecto3_muestra', defecto4_muestra='$defecto4_muestra', defecto5_muestra='$defecto5_muestra', defecto6_muestra='$defecto6_muestra', 
				  defecto7_muestra='$defecto7_muestra', defecto8_muestra='$defecto8_muestra', defecto9_muestra='$defecto9_muestra', defecto10_muestra='$defecto10_muestra', defecto11_muestra='$defecto11_muestra', defecto12_muestra='$defecto12_muestra', defecto13_muestra='$defecto13_muestra', 
				  defecto14_muestra='$defecto14_muestra', defecto15_muestra='$defecto15_muestra', defecto16_muestra='$defecto16_muestra', suma_total_defectos='$suma_total_defectos', 
				  peso_defectos_total='$peso_defectos_total', porcentaje_defectos='$porcentaje_defectos', rendimiento_exportable='$rendimiento_exportable' WHERE pk_anal_fisico = $idGetValor;");
					
					echo 1;
	        		break;
	    /*------------------------------------------------------------------------------------*/
			case "Deletad":
							$idGetValor=$_POST['idGetValor'];
							mysqli_query($conexion, "DELETE FROM anal_fisico WHERE pk_anal_fisico= $idGetValor");

	        		echo 1;
	        		break;
			/*------------------------------------------------------------------------------------*/
			case "consulta_asoc":
				$idGetValor=$_POST['idGetValor'];

				//$sql= "SELECT * FROM anal_fisico WHERE pk_anal_fisico='$idGetValor'";
				$sql= "SELECT id, nombre, fecha_nacimiento, documento, direccion,
				telefono, email, asoc_coop FROM clientes WHERE id='$idGetValor'";

				$result=mysqli_query($conexion,$sql);

				while($mostrar=mysqli_fetch_row($result)){
					$id_cliente = $mostrar[0];
					$nombre_cliente =$mostrar[1];
					$tipo_documento =$mostrar[2];
					$num_documento =$mostrar[3];
					$ubicacion =$mostrar[4];
					$telefono =$mostrar[5];
					$email =$mostrar[6];
					$asoc_coop =$mostrar[7];

				}
				
				echo $id_cliente;
				break;
			/*------------------------------------------------------------------------------------*/
			case "consulta_ubicacion":
				$idGetValor=$_POST['idGetValor'];

				//$sql= "SELECT * FROM anal_fisico WHERE pk_anal_fisico='$idGetValor'";
				$sql= "SELECT id, nombre, fecha_nacimiento, documento, direccion,
				telefono, email, asoc_coop FROM clientes WHERE id='$idGetValor'";

				$result=mysqli_query($conexion,$sql);

				while($mostrar=mysqli_fetch_row($result)){
					$id_cliente = $mostrar[0];
					$nombre_cliente =$mostrar[1];
					$tipo_documento =$mostrar[2];
					$num_documento =$mostrar[3];
					$ubicacion =$mostrar[4];
					$telefono =$mostrar[5];
					$email =$mostrar[6];
					$asoc_coop =$mostrar[7];

				}
				
				echo $id_cliente;
							break;
			/*------------------------------------------------------------------------------------*/
			/*------------------------------------------------------------------------------------*/
			case "generarCodigo":

				$result=mysqli_query($conexion, "SELECT  correlativo FROM `anal_fisico` ORDER by   correlativo  DESC  LIMIT 1");
				while($mostrar=mysqli_fetch_row($result)){
					$valorultimocorrelativo=$mostrar[0];
				}
			
				
				if (isset($valorultimocorrelativo)){ 
					$ok_valorultimocorrelativo=$valorultimocorrelativo+1;
				}
				else{ 
					$ok_valorultimocorrelativo='1000';
				}
					
					/*-------------- FECHA ACTUAL ----------------------*/
					date_default_timezone_set('America/Lima');
					$hoydi=date('d');
						$hoydia=str_pad($hoydi, 2, "0", STR_PAD_LEFT);
					$hoyme=date('n');
						$hoymes=str_pad($hoyme, 2, "0", STR_PAD_LEFT);
					$hoyano=date('y');
						$hoyano2=str_pad($hoyano, 2, "0", STR_PAD_LEFT);

					echo 'Lab-'.$ok_valorultimocorrelativo.''.$hoydi. '' . $hoymes. '' . $hoyano2;

					break;
			
			/*------------------------------------------------------------------------------------*/
			case "mostrarCorrelativo":

				$result=mysqli_query($conexion, "SELECT  correlativo FROM `anal_fisico` ORDER by   correlativo  DESC  LIMIT 1");
				while($mostrar=mysqli_fetch_row($result)){
					$valorultimocorrelativo=$mostrar[0];
				}
					if (isset($valorultimocorrelativo)){
						$ok_valorultimocorrelativo= $valorultimocorrelativo;
					}else{
						$ok_valorultimocorrelativo= 999;
					}

					echo $ok_valorultimocorrelativo+1;

					break;

	    case "Existad":
		        	echo "<p style='color: red;background: yellow'>Usted ya se encuentra registrado*</p>";
	        		break;
	    /*------------------------------------------------------------------------------------*/
	    default:
	        		echo "----   -- ^ --   ----";
	    /*------------------------------------------------------------------------------------*/
	}



