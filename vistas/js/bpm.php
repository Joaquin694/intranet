<script>




  $(document).ready(function(){

    function inpEsp(inpReflejo,inpEspejo){ //Input espejo 

      var inpReflejo = document.getElementById(inpReflejo).value;      

      document.getElementById(inpEspejo).value = inpReflejo;

    }
    // ----------------------------------------------------------------------------

    //view_abad('idViwTblClientes');



    // ||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| 

        /*----------------------------------------------------------*/

        //view_toast('.toastAbad');

        /*----------------------------------------------------------*/

        //$('#modalFichaBpm').modal('toggle');

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

       

      /*-------------------------------------------------------------*/

    



  });

function crpse(a,b,c,d,e,f){

    //initializacion



    if (totalservmatr) {
    var okok;
    }else{
      var totalservmatr=0;
    }



    var preciov=parseFloat(a);//Recogemos Precio

    var cantidadv=b;   

    var idtotalv="#"+c;

    var cantidadz="#"+b;

    var idtotalvsinhash=c;


    var ns= d; //Id de servicio para jalar nombre

    var recojeidservices= e; //Id de servicio 

    var recojeid_sab= f; //Id de servicio_anexo


    var nombre_servicio = document.getElementById(ns).innerHTML;

    var recidtotalv=document.getElementById(idtotalvsinhash).innerHTML; //total de servicio por fila





    var cantidadvx = document.getElementById(cantidadv).innerHTML; //Recogemos cantidad kg a dar el servicio

    var totalfinal= preciov*cantidadvx; //total de servicio por fila

    var sinocheckbox="."+cantidadv; //PARA MARCAR O DESMAR SCHECK



    var ftotalsrvciss=document.getElementById("totalsrvciss").innerHTML; //Cantidad impreso en el total

    var idbpm = document.getElementById("idbpm").value; // ID DEL BPM

    var idservices = document.getElementById(recojeidservices).innerHTML; // ID DEL SERVICES

    var idsab = document.getElementById(recojeid_sab).innerHTML; // ID DEL SEVICIO_ANEXOS

    if(recidtotalv){

      $(sinocheckbox).prop( "checked", false );

      $(idtotalv).text("");
      
      if(cantidadvx !=1){
        $(cantidadz).text("");
      }


        
        //CAPTURAR EL ID DE LA FICHA MEDIANTE EL VALUE
        var totalservmatr=ftotalsrvciss-recidtotalv;

        $("#totalsrvciss").text(totalservmatr);

        //alert(nombre_servicio+' '+idbpm+' '+idsab);

        //ACIONAR SOBRE DB DELETED
        var accion= 'eliminarservicio';

        var dataen =        
                   {nombre_servicio: nombre_servicio,
                    idbpm: idbpm,
                    accion: accion};

        $.ajax({
          type: 'post',
          url:'modelos/tostado.modelo.php',
          data:dataen,
          success:function(resp){
            
          }
        });
        return false;
        


    }else{

        if(cantidadvx){

            var otal=parseFloat(preciov)*parseFloat(cantidadvx);

            $(idtotalv).text(otal);  

            // Check #x

            $(sinocheckbox).prop( "checked", true );

            

            // ==============================================        

              var totalservmatr=parseFloat(ftotalsrvciss)+otal;
              
              $("#totalsrvciss").text(totalservmatr); 
              //alert(nombre_servicio+' '+preciov+' '+cantidadvx +' '+totalfinal+' '+idservices+' '+idsab);
            // ==============================================
            //ACIONAR SOBRE DB GUARDAR
            var accion= 'guardaservicio';

            var dataen =    
                       {nombre_servicio: nombre_servicio,
                        preciov: preciov,
                        cantidadvx: cantidadvx,
                        totalfinal: totalfinal,
                        idbpm: idbpm,
                        idservices: idservices,
                        accion: accion};

            $.ajax({
              type: 'post',
              url:'modelos/tostado.modelo.php',
              data:dataen,
              success:function(resp){
                //alert(resp);
              }
            });
            return false;


        }else{

            alert("Antes de nada en este caso debes ingresar la cantidad");

            var sinocantidadv="#"+cantidadv;

            

            // Uncheck #x

            $(sinocheckbox).prop( "checked", false);

            $(sinocantidadv).focus();

        } 

    }

}   


</script>