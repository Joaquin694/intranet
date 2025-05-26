<script type="text/javascript">
	function updatadinsert(getId){     //Capturamos datos contenidos en id      
		
		var getId = getId;
		var newBpmCorrelativoA= document.getElementById('newBpmCorrelativoA').value;
		var codigo= document.getElementById('codigo').innerHTML;
		var aprobado_por= document.getElementById('aprobado_por').innerHTML;
		var fecha_registro_documento= document.getElementById('fecha_registro_documento').innerHTML;
		var pagina= document.getElementById('pagina').innerHTML;
		var idLoteA= document.getElementById('idLoteA').innerHTML;
		var titulo= document.getElementById('titulo').innerHTML;
		var subtitulo= document.getElementById('subtitulo').innerHTML;
		var fechaReceA= document.getElementById('fechaReceA').value;
		var nombClieA= document.getElementById('nombClieA').value;
		var nombReciA= document.getElementById('nombReciA').value;
		var tipoCafeA= document.getElementById('tipoCafeA').value;
		var presMateExtrA= document.getElementById('presMateExtrA').value;
		var plagEnfeA= document.getElementById('plagEnfeA').value;
		var lugaProcA= document.getElementById('lugaProcA').value;
		var pesoA= document.getElementById('pesoA').value;
		var presenA= document.getElementById('presenA').value;
		var newBpmVariedadAltitud= document.getElementById('newBpmVariedadAltitud').value;
		var condTranA= document.getElementById('condTranA').value;
		var envaA= document.getElementById('envaA').value;
		var rdbtTipoCertA= $('input[id="rdbtTipoCertA"]:checked').val();
		var fechEntrA= document.getElementById('fechEntrA').value;
		var humeA= document.getElementById('humeA').value;
		var conclusionA= $('input[name="conclusionA"]:checked').val();
		var observacionesF1A= document.getElementById('observacionesF1A').value;
		var ejecutor_asistente= document.getElementById('ejecutor_asistente').innerHTML;
		var jefe_planta= document.getElementById('jefe_planta').innerHTML;
		var titulof1= document.getElementById('titulof1').innerHTML;
		var subtitulo_rbpm2= document.getElementById('subtitulo_rbpm2').innerHTML;
		var codigo_rbpm2= document.getElementById('codigo_rbpm2').innerHTML;
		var aprobado_por_rbpm2= document.getElementById('aprobado_por_rbpm2').innerHTML;
		var fecha_registro_documento_rbpm2= document.getElementById('fecha_registro_documento_rbpm2').innerHTML;
		var pagina_rbpm2= document.getElementById('pagina_rbpm2').innerHTML;
		var lote_rbpm2= document.getElementById('lote_rbpm2').innerHTML;
		var Fch2rucdni= document.getElementById('Fch2rucdni').value;
		var codmatpri= document.getElementById('codmatpri').value;
		var Fch2telefonocliente= document.getElementById('Fch2telefonocliente').value;
		var idCantProdA= document.getElementById('idCantProdA').value;
		var Fch2correo= document.getElementById('Fch2correo').value;
		var Fch2observaciones= document.getElementById('Fch2observaciones').value;

		
		var idTostAuto = document.getElementById('idTostAuto').value;
		var krsls = document.getElementById('krsls').value;
		var kggresiduales = document.getElementById('kggresiduales').value;
		var gramosPendientes = document.getElementById('gramosPendientes').value;
		var subSolesTotalProductoAnexos = document.getElementById('subSolesTotalProductoAnexos').value;
		var subGramosTotalProductoAnexos= document.getElementById('subGramosTotalProductoAnexos').value;		
		var totalsrvciss = document.getElementById('totalsrvciss').innerHTML;		
		var totalcobbls = document.getElementById('totalcobbls').innerHTML;		
		var totalgeneral = document.getElementById('totalgeneral').innerHTML;		
		var fk_bpm = document.getElementById('idbpm').value;
		var accion= "insertIntoBpm";

	

		// var dataen ='getId=' +getId+
		// 			'&newBpmCorrelativoA=' +newBpmCorrelativoA+
		// 			'&codigo=' +codigo+
		// 			'&aprobado_por=' +aprobado_por+
		// 			'&fecha_registro_documento=' +fecha_registro_documento+
		// 			'&pagina=' +pagina+
		// 			'&lote=' +idLoteA+
		// 			'&titulo=' +titulo+
		// 			'&subtitulo=' +subtitulo+
		// 			'&fecha_atencion=' +fechaReceA+
		// 			'&nombre_cliente=' +String(nombClieA)+
		// 			'&nombre_usuario=' +nombReciA+
		// 			'&tipo_cafe=' +tipoCafeA+
		// 			'&materia_extraña=' +presMateExtrA+
		// 			'&plagas_enfermedades=' +plagEnfeA+
		// 			'&lugar_procedencia=' +lugaProcA+
		// 			'&peso=' +pesoA+
		// 			'&presentacion=' +presenA+
		// 			'&variedad=' +newBpmVariedadAltitud+
		// 			'&condicion_de_transporte=' +condTranA+
		// 			'&envase=' +envaA+
		// 			'&certificacion=' +rdbtTipoCertA+
		// 			'&fecha_entrega=' +fechEntrA+
		// 			'&humedad=' +humeA+
		// 			'&conclusion=' +conclusionA+
		// 			'&observaciones=' +observacionesF1A+
		// 			'&ejecutor_asistente=' +ejecutor_asistente+
		// 			'&jefe_planta=' +jefe_planta+
		// 			'&titulof1=' +titulof1+
		// 			'&subtitulo_rbpm2=' +subtitulo_rbpm2+
		// 			'&codigo_rbpm2=' +codigo_rbpm2+
		// 			'&aprobado_por_rbpm2=' +aprobado_por_rbpm2+
		// 			'&fecha_registro_documento_rbpm2=' +fecha_registro_documento_rbpm2+
		// 			'&pagina_rbpm2=' +pagina_rbpm2+
		// 			'&lote_rbpm2=' +lote_rbpm2+
		// 			'&doc_identidad=' +Fch2rucdni+
		// 			'&codmatpri=' +codmatpri+
		// 			'&Fch2telefonocliente=' +Fch2telefonocliente+
		// 			'&idCantProdA=' +idCantProdA+
		// 			'&Fch2correo=' +Fch2correo+
		// 			'&Fch2observaciones=' +Fch2observaciones+
		// 			'&idTostAuto=' +idTostAuto+
		// 			'&krsls=' +krsls+
		// 			'&kggresiduales=' +kggresiduales+
		// 			'&gramosPendientes='+gramosPendientes+
		// 			'&subSolesTotalProductoAnexos='+subSolesTotalProductoAnexos+
		// 			'&subGramosTotalProductoAnexos='+subGramosTotalProductoAnexos+
		// 			'&totalsrvciss=' +totalsrvciss+
		// 			'&totalcobbls=' +totalcobbls+
		// 			'&totalgeneral=' +totalgeneral+
		// 			'&fk_bpm=' +fk_bpm+
		// 			'&accion=' +accion; 
					
		
		var dataen ={getId:getId,
					newBpmCorrelativoA:newBpmCorrelativoA,
					codigo:codigo,
					aprobado_por:aprobado_por,
					fecha_registro_documento:fecha_registro_documento,
					pagina:pagina,
					lote:idLoteA,
					titulo:titulo,
					subtitulo:subtitulo,
					fecha_atencion:fechaReceA,
					nombre_cliente:nombClieA,
					nombre_usuario:nombReciA,
					tipo_cafe:tipoCafeA,
					materia_extraña:presMateExtrA,
					plagas_enfermedades:plagEnfeA,
					lugar_procedencia:lugaProcA,
					peso:pesoA,
					presentacion:presenA,
					variedad:newBpmVariedadAltitud,
					condicion_de_transporte:condTranA,
					envase:envaA,
					certificacion:rdbtTipoCertA,
					fecha_entrega:fechEntrA,
					humedad:humeA,
					conclusion:conclusionA,
					observaciones:observacionesF1A,
					ejecutor_asistente:ejecutor_asistente,
					jefe_planta:jefe_planta,
					titulof1:titulof1,
					subtitulo_rbpm2:subtitulo_rbpm2,
					codigo_rbpm2:codigo_rbpm2,
					aprobado_por_rbpm2:aprobado_por_rbpm2,
					fecha_registro_documento_rbpm2:fecha_registro_documento_rbpm2,
					pagina_rbpm2:pagina_rbpm2,
					lote_rbpm2:lote_rbpm2,
					doc_identidad:Fch2rucdni,
					codmatpri:codmatpri,
					Fch2telefonocliente:Fch2telefonocliente,
					idCantProdA:idCantProdA,
					Fch2correo:Fch2correo,
					Fch2observaciones:Fch2observaciones,
					idTostAuto:idTostAuto,
					krsls:krsls,
					kggresiduales:kggresiduales,
					gramosPendientes:gramosPendientes,
					subSolesTotalProductoAnexos:subSolesTotalProductoAnexos,
					subGramosTotalProductoAnexos:subGramosTotalProductoAnexos,
					totalsrvciss:totalsrvciss,
					totalcobbls:totalcobbls,
					totalgeneral:totalgeneral,
					fk_bpm:fk_bpm,
					accion:accion}; 

					$.ajax({
		                      type: 'post',
		                      url:'modelos/tostado.modelo.php',
		                      data:dataen,
							  
		                      success:function(resp){
		                      	  // $("#idNewBPM").addClass("d-none");
		                          $("#responseNewBpm").html(resp);
		                        }
		                    });
		             return false;
	}





	function updatadinsertfinal(getId){     //Capturamos datos contenidos en id      

		var getId = getId;
		var newBpmCorrelativoA= document.getElementById('newBpmCorrelativoA').value;
		var codigo= document.getElementById('codigo').innerHTML;
		var aprobado_por= document.getElementById('aprobado_por').innerHTML;
		var fecha_registro_documento= document.getElementById('fecha_registro_documento').innerHTML;
		var pagina= document.getElementById('pagina').innerHTML;
		var idLoteA= document.getElementById('idLoteA').innerHTML;
		var titulo= document.getElementById('titulo').innerHTML;
		var subtitulo= document.getElementById('subtitulo').innerHTML;
		var fechaReceA= document.getElementById('fechaReceA').value;
		var nombClieA= document.getElementById('nombClieA').value;
		var nombReciA= document.getElementById('nombReciA').value;
		var tipoCafeA= document.getElementById('tipoCafeA').value;
		var presMateExtrA= document.getElementById('presMateExtrA').value;
		var plagEnfeA= document.getElementById('plagEnfeA').value;
		var lugaProcA= document.getElementById('lugaProcA').value;
		var pesoA= document.getElementById('pesoA').value;
		var presenA= document.getElementById('presenA').value;
		var newBpmVariedadAltitud= document.getElementById('newBpmVariedadAltitud').value;
		var condTranA= document.getElementById('condTranA').value;
		var envaA= document.getElementById('envaA').value;
		var rdbtTipoCertA= $('input[id="rdbtTipoCertA"]:checked').val();
		var fechEntrA= document.getElementById('fechEntrA').value;
		var humeA= document.getElementById('humeA').value;
		var conclusionA= $('input[name="conclusionA"]:checked').val();
		var observacionesF1A= document.getElementById('observacionesF1A').value;
		var ejecutor_asistente= document.getElementById('ejecutor_asistente').innerHTML;
		var jefe_planta= document.getElementById('jefe_planta').innerHTML;
		var titulof1= document.getElementById('titulof1').innerHTML;
		var subtitulo_rbpm2= document.getElementById('subtitulo_rbpm2').innerHTML;
		var codigo_rbpm2= document.getElementById('codigo_rbpm2').innerHTML;
		var aprobado_por_rbpm2= document.getElementById('aprobado_por_rbpm2').innerHTML;
		var fecha_registro_documento_rbpm2= document.getElementById('fecha_registro_documento_rbpm2').innerHTML;
		var pagina_rbpm2= document.getElementById('pagina_rbpm2').innerHTML;
		var lote_rbpm2= document.getElementById('lote_rbpm2').innerHTML;
		var Fch2rucdni= document.getElementById('Fch2rucdni').value;
		var codmatpri= document.getElementById('codmatpri').value;
		var Fch2telefonocliente= document.getElementById('Fch2telefonocliente').value;
		var idCantProdA= document.getElementById('idCantProdA').value;
		var Fch2correo= document.getElementById('Fch2correo').value;
		var Fch2observaciones= document.getElementById('Fch2observaciones').value;

		//DATOS DEL FORMULARIO PRODUCTO
		
		var idTostAuto = document.getElementById('idTostAuto').value;
		var krsls = document.getElementById('krsls').value;
		var kggresiduales = document.getElementById('kggresiduales').value;
		var tipo_molido_pab = document.getElementById('tipo_molido_pab').value;
		var tipo_tostado_pab = document.getElementById('tipo_tostado_pab').value;

		var idprecioV = document.getElementById('idprecioV').value;
		var capaBolsas = document.getElementById('capaBolsas').value;
		var idcntdblss = document.getElementById('idcntdblss').value;
		var idnombolaz = document.getElementById('idnombolaz').value;

		var idprecioV2 = document.getElementById('2idprecioV').value;
		var capaBolsas2 = document.getElementById('2capaBolsas').value;
		var idcntdblss2 = document.getElementById('2idcntdblss').value;
		var idnombolaz2 = document.getElementById('idnombolaz2').value;

		var idprecioV3 = document.getElementById('3idprecioV').value;
		var capaBolsas3 = document.getElementById('3capaBolsas').value;
		var idcntdblss3 = document.getElementById('3idcntdblss').value;
		var idnombolaz3 = document.getElementById('idnombolaz3').value;

		var idprecioV4 = document.getElementById('4idprecioV').value;
		var capaBolsas4 = document.getElementById('4capaBolsas').value;
		var idcntdblss4 = document.getElementById('4idcntdblss').value;
		var idnombolaz4 = document.getElementById('idnombolaz4').value;

		var idprecioV5 = document.getElementById('5idprecioV').value;
		var capaBolsas5 = document.getElementById('5capaBolsas').value;
		var idcntdblss5 = document.getElementById('5idcntdblss').value;
		var idnombolaz5 = document.getElementById('idnombolaz5').value;


		//CAPTURAR TOTAL DE SERVICIO
		var totalsrvciss = document.getElementById('totalsrvciss').innerHTML;

		//CAPTURAR TOTAL DEL PRODUCTO
		var totalcobbls = document.getElementById('totalcobbls').innerHTML;

		//CAPTURAR TOTAL GENERAL
		var totalgeneral = document.getElementById('totalgeneral').innerHTML;

		//CAPTURAR EL ID BPM

		var fk_bpm = document.getElementById('idbpm').value;

		var accion= 'updatadinsertfinal';

		// var dataen =        
		// 			'getId=' +getId+
		// 			'&newBpmCorrelativoA=' +newBpmCorrelativoA+
		// 			'&codigo=' +codigo+
		// 			'&aprobado_por=' +aprobado_por+
		// 			'&fecha_registro_documento=' +fecha_registro_documento+
		// 			'&pagina=' +pagina+
		// 			'&lote=' +idLoteA+
		// 			'&titulo=' +titulo+
		// 			'&subtitulo=' +subtitulo+
		// 			'&fecha_atencion=' +fechaReceA+
		// 			'&nombre_cliente=' +String(nombClieA)+
		// 			'&nombre_usuario=' +nombReciA+
		// 			'&tipo_cafe=' +tipoCafeA+
		// 			'&materia_extraña=' +presMateExtrA+
		// 			'&plagas_enfermedades=' +plagEnfeA+
		// 			'&lugar_procedencia=' +lugaProcA+
		// 			'&peso=' +pesoA+
		// 			'&presentacion=' +presenA+
		// 			'&variedad=' +newBpmVariedadAltitud+
		// 			'&condicion_de_transporte=' +condTranA+
		// 			'&envase=' +envaA+
		// 			'&certificacion=' +rdbtTipoCertA+
		// 			'&fecha_entrega=' +fechEntrA+
		// 			'&humedad=' +humeA+
		// 			'&conclusion=' +conclusionA+
		// 			'&observaciones=' +observacionesF1A+
		// 			'&ejecutor_asistente=' +ejecutor_asistente+
		// 			'&jefe_planta=' +jefe_planta+
		// 			'&titulof1=' +titulof1+
		// 			'&subtitulo_rbpm2=' +subtitulo_rbpm2+
		// 			'&codigo_rbpm2=' +codigo_rbpm2+
		// 			'&aprobado_por_rbpm2=' +aprobado_por_rbpm2+
		// 			'&fecha_registro_documento_rbpm2=' +fecha_registro_documento_rbpm2+
		// 			'&pagina_rbpm2=' +pagina_rbpm2+
		// 			'&lote_rbpm2=' +lote_rbpm2+
		// 			'&doc_identidad=' +Fch2rucdni+
		// 			'&codmatpri=' +codmatpri+
		// 			'&Fch2telefonocliente=' +Fch2telefonocliente+
		// 			'&idCantProdA=' +idCantProdA+
		// 			'&Fch2correo=' +Fch2correo+
		// 			'&Fch2observaciones=' +Fch2observaciones+
		// 			'&idTostAuto=' +idTostAuto+
		// 			'&krsls=' +krsls+
		// 			'&kggresiduales=' +kggresiduales+
		// 			'&tipo_molido_pab=' +tipo_molido_pab+
		// 			'&tipo_tostado_pab=' +tipo_tostado_pab+
		// 			'&idprecioV=' +idprecioV+
		// 			'&capaBolsas=' +capaBolsas+
		// 			'&idcntdblss=' +idcntdblss+
		// 			'&idnombolaz=' +idnombolaz+
		// 			'&idprecioV2=' +idprecioV2+
		// 			'&capaBolsas2=' +capaBolsas2+
		// 			'&idcntdblss2=' +idcntdblss2+
		// 			'&idnombolaz2=' +idnombolaz2+
		// 			'&idprecioV3=' +idprecioV3+
		// 			'&capaBolsas3=' +capaBolsas3+
		// 			'&idcntdblss3=' +idcntdblss3+
		// 			'&idnombolaz3=' +idnombolaz3+
		// 			'&idprecioV4=' +idprecioV4+
		// 			'&capaBolsas4=' +capaBolsas4+
		// 			'&idcntdblss4=' +idcntdblss4+
		// 			'&idnombolaz4=' +idnombolaz4+
		// 			'&idprecioV5=' +idprecioV5+
		// 			'&capaBolsas5=' +capaBolsas5+
		// 			'&idcntdblss5=' +idcntdblss5+
		// 			'&idnombolaz5=' +idnombolaz5+
		// 			'&totalsrvciss=' +totalsrvciss+
		// 			'&totalcobbls=' +totalcobbls+
		// 			'&totalgeneral=' +totalgeneral+
		// 			'&fk_bpm=' +fk_bpm+
		// 			'&accion=' +accion;

		var dataen =        
					{getId:getId,
					newBpmCorrelativoA:newBpmCorrelativoA,
					codigo:codigo,
					aprobado_por:aprobado_por,
					fecha_registro_documento:fecha_registro_documento,
					pagina:pagina,
					lote:idLoteA,
					titulo:titulo,
					subtitulo:subtitulo,
					fecha_atencion:fechaReceA,
					nombre_cliente:nombClieA,
					nombre_usuario:nombReciA,
					tipo_cafe:tipoCafeA,
					materia_extraña:presMateExtrA,
					plagas_enfermedades:plagEnfeA,
					lugar_procedencia:lugaProcA,
					peso:pesoA,
					presentacion:presenA,
					variedad:newBpmVariedadAltitud,
					condicion_de_transporte:condTranA,
					envase:envaA,
					certificacion:rdbtTipoCertA,
					fecha_entrega:fechEntrA,
					humedad:humeA,
					conclusion:conclusionA,
					observaciones:observacionesF1A,
					ejecutor_asistente:ejecutor_asistente,
					jefe_planta:jefe_planta,
					titulof1:titulof1,
					subtitulo_rbpm2:subtitulo_rbpm2,
					codigo_rbpm2:codigo_rbpm2,
					aprobado_por_rbpm2:aprobado_por_rbpm2,
					fecha_registro_documento_rbpm2:fecha_registro_documento_rbpm2,
					pagina_rbpm2:pagina_rbpm2,
					lote_rbpm2:lote_rbpm2,
					doc_identidad:Fch2rucdni,
					codmatpri:codmatpri,
					Fch2telefonocliente:Fch2telefonocliente,
					idCantProdA:idCantProdA,
					Fch2correo:Fch2correo,
					Fch2observaciones:Fch2observaciones,
					idTostAuto:idTostAuto,
					krsls:krsls,
					kggresiduales:kggresiduales,
					tipo_molido_pab:tipo_molido_pab,
					tipo_tostado_pab:tipo_tostado_pab,
					idprecioV:idprecioV,
					capaBolsas:capaBolsas,
					idcntdblss:idcntdblss,
					idnombolaz:idnombolaz,
					idprecioV2:idprecioV2,
					capaBolsas2:capaBolsas2,
					idcntdblss2:idcntdblss2,
					idnombolaz2:idnombolaz2,
					idprecioV3:idprecioV3,
					capaBolsas3:capaBolsas3,
					idcntdblss3:idcntdblss3,
					idnombolaz3:idnombolaz3,
					idprecioV4:idprecioV4,
					capaBolsas4:capaBolsas4,
					idcntdblss4:idcntdblss4,
					idnombolaz4:idnombolaz4,
					idprecioV5:idprecioV5,
					capaBolsas5:capaBolsas5,
					idcntdblss5:idcntdblss5,
					idnombolaz5:idnombolaz5,
					totalsrvciss:totalsrvciss,
					totalcobbls:totalcobbls,
					totalgeneral:totalgeneral,
					fk_bpm:fk_bpm,
					accion:accion};


						

		$.ajax({

			type: 'post',

			url:'modelos/tostado.modelo.php',

			data:dataen,

			success:function(resp){

				if(resp==1){
					swal({
					title: "Exito!",
					text: "Registro Guardado Correctamente!",
					icon: "success",
					buttons: { 
						aceptar: { text: "Aceptar!"
							
						},
					},
					}).then(function () {
						location.href ='bpmhistorial';
					})
					return false;
				}
			}

		});

		return false;
	}

</script>			