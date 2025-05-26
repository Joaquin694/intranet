<style type="text/css">

      /*GENERICOS*/
      input#bpm_cantidad {
    width: 80px !important;
}
      .centrate

      {

        text-align: center !important;

        justify-content: centrate !important;

      }

      .bordeDI{

        border-left: 1px solid #c3c3c3; 

        border-right: 1px solid #c3c3c3; 

      }

      .letra11{font-size: 11px;}.letra12{font-size: 12px;}.letra13{font-size: 13px;}

      .{font-size: 15px;}.letra16{font-size: 16px;}

      .rayavertical{width: 250px; border-top: 1px solid #c3c3c3}

      /*---------------------------------------*/

      #titulof1

            {

                  font-size: 23px;

            }

                .{font-size: 15px;}.letra16{font-size: 16px;}

      #titulof1>span

            {

                  font-weight: 900;

            }

      .has-feedback,.has-feedback>input

            {

                  color: #2d462e; font-weight: 700;

            }

      .bolitarayaderecha{background: white;border-radius: 10px 0px 0px 10px;color: #528035;padding: 0px;padding-left: 8px;padding-left: 8px; }

      /*==========================================================================*/

      /* On screens that are 992px wide or less, the background color is blue */

      @media screen and (max-width: 992px) {

            #logo

            {

                  width: 150px;       

            }

            #titulof1

            {

                  font-size: 18px;

            }            

      }



      /* On screens that are 600px wide or less, the background color is olive */

      @media screen and (max-width: 600px) {

            #logo

            {

                  width: 85px;       

            }

            #titulof1

            {

                  font-size: 12px;

            }

            .letra14,.letra16

            {

              font-size: 9px;

            }

            .has-feedback,.has-feedback>input

            {

                  color: #2d462e; font-weight: 100;font-size: 10px;

            }

      }

</style>

<div class="content-wrapper" >



  <section class="content-header">

    

    <h1 style="color: #c3c3c3">      

      <i class="fa fa-coffee" aria-hidden="true"></i> Procesamiento de tostado    

    </h1>



    <ol class="breadcrumb">

      

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      

      <li class="active">Procesamiento de tostado</li>

    

    </ol>



  </section>

<!-- ================================================================== -->

<!-- ===================================================  INI CONTENIDO --> 

<!-- ================================================================== -->

  <section class="content" id="request_idOjo">
        <?php require_once "tostado-fichas.php"; ?>     
</section>
<div id='datito_render'></div>
<!-- Modal clientes-->
          <div id="modalFichaBpm" class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title letraNegra"><i onclick="redireccionar('clientes')" class="fa fa-users"></i> Clientes</h4>
                </div>
                <center>
                  <div class="labelLoading">
                        <!-- <i class="fa fa-refresh fa-spin" style="font-size:24px"></i> -->
                  </div>
                </center>
                <div class="modal-body table-responsive" id="idViwTblClientes" >
                  <table class="table table-bordered table-striped dt-responsive tablas" style="width: 100% !important">
                    <thead>
                      <tr>
                        <th class="desaparece">sapo</th>
                        <th>Nombre</th>
                        <th>Documento ID</th>           
                        <th>Dirección</th> 
                        <!-- <th>Última compra</th>    -->        
                      </tr> 
                    </thead>
                    <tbody >
                      <?php
                      $item = null;
                      $valor = null;
                      $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
                      $pio=0;
                      foreach ($clientes as $key => $value) { $pio=$value["id"];?>
                        <tr  onclick="senDita('id','<?php echo $pio ?>','Newad')" class="icoMano">
                                <td id="<?php echo $pio; ?>" class='desaparece'><?php echo  $value["id"];?></td>
                                <td ><?php echo  $value["nombre"];?></td>
                                <td><?php echo $value["documento"]; ?></td>
                                <td><?php echo $value["direccion"]; ?></td>
                                <!-- <td> --><?php /*echo $value["ultima_compra"]; */?><!-- </td> -->
                        </tr>
                      <?php }
                      ?>     
                    </tbody>
                  </table>  
                </div>
                <div class="modal-footer">
                  <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                  <h5 onclick="redireccionar('bpmhistorial')" style="float: right;color: #5e5e5e" class="modal-title letraNegra icoMano"><i  class="fa fa-search-plus "></i> BPM Historial</h5>
                </div>
              </div>
            </div>
          </div>

<!-- ================================================================== -->

<!-- =================================================== FIN CONTENIDO -->

<!-- ================================================================== -->



<!-- ===================================================  INI CONTENIDO --> 

<!-- ================================================================== -->



<!-- ================================================================== -->

<!-- =================================================== FIN CONTENIDO -->

<!-- ================================================================== -->

</div>



































<!-- TABLA PARA EDITAR Modal BPM-->


<script type="text/javascript">

 
  //dinamismo a servicios scheck

  function crpse(a,b,c,d,e){

    //initializacion
    
    

      if (totalservmatr) {
      var okok;
      }else{
        var totalservmatr=0;
      }



    var preciov=parseFloat(a);//Recogemos Precio

    var cantidadv=b;   

    var idtotalv="#"+c; 
    
    var idtotalvsinhash=c;
    

    var ns= d; //Id de servicio para jalar nombre

    var recojeidservices= e; //Id de servicio 
    

    var nombre_servicio = document.getElementById(ns).innerHTML;

    var recidtotalv=document.getElementById(idtotalvsinhash).innerHTML; //total de servicio por fila

    



    var cantidadvx = document.getElementById(cantidadv).innerHTML; //Recogemos cantidad kg a dar el servicio

    var totalfinal= preciov*cantidadvx; //total de servicio por fila

    var sinocheckbox="."+cantidadv; //PARA MARCAR O DESMAR SCHECK

    

    var ftotalsrvciss=document.getElementById("totalsrvciss").innerHTML; //Cantidad impreso en el total

    var idbpm = document.getElementById("idbpm").value; // ID DEL BPM

    var idservices = document.getElementById(recojeidservices).innerHTML; // ID DEL SERVICES

    if(recidtotalv){

      $(sinocheckbox).prop( "checked", false );

      $(idtotalv).text("");


        
        //CAPTURAR EL ID DE LA FICHA MEDIANTE EL VALUE
        var totalservmatr=ftotalsrvciss-recidtotalv;

        $("#totalsrvciss").text(totalservmatr);

        //alert(nombre_servicio+' '+idbpm);

        //ACIONAR SOBRE DB DELETED
        var accion= 'eliminarservicio';

        var dataen =        

        'nombre_servicio=' +nombre_servicio+
        '&idbpm=' +idbpm+

        '&accion=' +accion;

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

        if(cantidadvx){

            var otal=parseFloat(preciov)*parseFloat(cantidadvx);

            $(idtotalv).text(otal);  

             // Check #x

            $(sinocheckbox).prop( "checked", true );

            

            // ==============================================        

              var totalservmatr=parseFloat(ftotalsrvciss)+otal;
              
              $("#totalsrvciss").text(totalservmatr); 
              //alert(nombre_servicio+' '+preciov+' '+cantidadvx +' '+totalfinal+' '+idservices);
            // ==============================================
            //ACIONAR SOBRE DB GUARDAR
            var accion= 'guardaservicio';

            var dataen = 
                         {nombre_servicio:nombre_servicio,
                          preciov:preciov,
                          cantidadvx:cantidadvx,
                          totalfinal:totalfinal,
                          idbpm:idbpm,
                          idservices:idservices,
                          accion:accion};

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

            $(sinocheckbox).prop( "checked", false );

            $(sinocantidadv).focus();

        } 

    }

  }



</script>

