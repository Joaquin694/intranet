$(document).ready(function(){



// ----------------------------------------------------------------------------

// view_abad('idViwTblClientes');



// ||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| 

	/*----------------------------------------------------------*/

	view_toast('.toastAbad');

	/*----------------------------------------------------------*/

	$('#modalFichaBpm').modal('toggle');

	/*------------ Calcul kilos a tostar --------------------------*/

	function generate_kg_tost(){

				var tipo_cafe  = $('#tipoCafeA').val();

			    var peso =Peso = $('#pesoA').val();

			    if (peso==0) {

			    	view_toast('#datoErrado');

			    	 $("#pesoA").val("");

			    	 $("#pesoA").css('border-color', 'red');

			    }else{

			    	 $("#pesoA").css('border-color', '#c3c3c3');

			    	 if (tipo_cafe)

			    	 {			

			    	 			//funcion generator kg tostados

			    	 			switch (tipo_cafe) 

			    	 			{

										  case "Café Pergamino":

										  		var atostr=(peso/1.55).toFixed(3);

										  		$("#idTostAuto").val(atostr);

										  		$("#krsls").val(atostr);

										  		$("#krsls").css('border-color','#c3c3c3');

										    break;

										  case "Café Oro":

										  		var atostr=(peso/1.25).toFixed(3);

										  		$("#idTostAuto").val(atostr);

										  		$("#krsls").val(atostr);

										  		$("#krsls").css('border-color','#c3c3c3');

										    break;

										  case "Café Natural":

										   		var atostr=(peso/2.50).toFixed(3);

										   		$("#idTostAuto").val(atostr);

										   		$("#krsls").val(atostr);

										   		$("#krsls").css('border-color','#c3c3c3');

										    break;

										  case "Café Tostado":

										   		var atostr=peso;

										   		$("#idTostAuto").val(atostr);

										   		$("#krsls").val(atostr);

										   		$("#krsls").css('border-color','#c3c3c3');

										    break;

										  default:

    										alert("No hay formula");

								}

			    	 }else

			    	 {

			    	 			$("#tipoCafeA").css('border-color', 'red');

			    	 }

			    }

	}



    $("#pesoA").keyup(function(){

   				generate_kg_tost();

   				$('#ficha2').css('display','block');

   					



    });

                         /* -------------------------- */

	$("#tipoCafeA").change(function(){

			    $("#tipoCafeA").css('border-color', '#c3c3c3');

			    generate_kg_tost();

			    

	});                   

    /*----------------------------------------------------------*/



});
