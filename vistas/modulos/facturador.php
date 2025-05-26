<style type="text/css">
  input[type=number],input[type=text]{outline:0px !important;background: transparent !important;border: 0px !important;border-bottom: 1px solid #3ec0ef !important;color: #1b65a5 !important;}
  #itemdid{background: white !important;padding: 15px;border-right:   12px solid #ecf0f5;border-top: 20px solid #ecf0f5; height:  500px}
  #itemdidClient{background: white;border-bottom:  1px solid #ecf0f5;width: 100%;margin-bottom: 20px }
  #totalescomp{background: white;padding: 15px;border-left:  12px solid #ecf0f5;border-top: 20px solid #ecf0f5;height:  500px}
  #totalescomp>div{background: #5e5e5e; width: 98%; color: white;padding: 17px 13px; font-size: 14px;border-radius: 7px}
  #totalescomp>div>p{margin-bottom: 2px !important}
  .viewAlertTd{background: #ecf0f5;width: 135!important}
  .viewAlertTd>input{width: 135px !important;}
  .theadTable{font-size: 18px !important;color: #5e5e5e  !important}

</style>
<div class="content-wrapper" >
  <section class="content-header d-none" >
    <h1 id="idBpm" style='color: #c3c3c3'><?php echo $idBpm; ?>
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Comprobante de venta electrónico</li>
    </ol>
  </section>
  <section class="content" id="actualizarContenidoBpm">
    <div class="box">
      <div class="box-header with-border">
        

    <div class="btn-group">
      <div class="btn-group">
        <button type="button" class="btn btn-primary " id="returnHistoailBpm">
        <i class="fa fa-undo" aria-hidden="true"></i> Historial BPM
        </button>
      </div>
      
      <div class="btn-group">
        <button type="button" class="btn btn-primary " id="returnHistoailFact">
        <i class="fa fa-list" aria-hidden="true"></i> Historial Facturación
        </button>
      </div>
    </div>
    <span style="float: right;">
      <i class="fa fa-circle bolaBlanca" id="bola_fact_bpm1" aria-hidden="true" ></i>
       <i class="fa fa-circle bolaAmarilla" id="bola_fact_bpm2" aria-hidden="true" ></i>
        <i class="fa fa-circle bolaBlanca" id="bola_fact_bpm3" aria-hidden="true" ></i>
        <span id="scripti"></span>
    </span>


      </div>
      <div class="box-body"  style="background: #ecf0f5 !important;padding: 0px !important">

            <div class="col-lg-10" id="itemdid" style="display: inline-table">
                  <div style="width: 100%;float: right;">
                        <span>
                         
                          Documento origen: <b id="idfDocuOrigen">MP- <?php echo $datBPM[0]["lote_bpm"]; ?></b><br>
                          Fecha de Emisión : <b id="idfFechaEmitido"><?php echo date('Y-m-d'); ?></b><br>
                          Fecha de Vencimiento : <b  id="idFFechaVencimiento" contentEditable="true"><?php echo date('Y-m-d',strtotime('+1 day', strtotime(date('Y-m-d')))); ?></b><br>
                          Tipo de moneda: <b>Soles</b><br>
                        </span>
                        <div class="input-group" style="width: 257px;float: right;margin-top: -80px">
                            <p style="width: 100%;text-align: center;font-size: 20px; border: 1px solid #c3c3c3;color: #c3c3c3;margin-bottom: 0px;border-bottom: 0px">
                              RUC: 20601012597
                            </p> 
                            <select id="selectTipoComprobante" class="form-control"  name="selectTipoComprobante" required style="background: white !important;color: #5e5e5e !important;border: 1px solid #c3c3c3 !important;justify-content: center !important;font-weight: 900">
                              <option  value="" >TIPO DE COMPROBANTE DE VENTA</option>
                              <option  value="BLT">BOLETA DE VENTA ELECTRÓNICA</option>
                              <option  value="FCT">FACTURA DE VENTA ELECTRÓNICA</option>
                              <option  value="NDC" disabled>NOTA DE CRÉDITO DE VENTA ELECT.</option>               
                            </select>  
                            <p style="width: 100%;text-align: center;font-size: 20px; border: 1px solid #c3c3c3;color: #c3c3c3">
                              Nro. <span id="serie_correlativo"></span>
                            </p>  
                        </div>
                  </div>
                  <div  id="itemdidClient" >
                      <article id="datosCliente"  style="margin-top: 10px;font-size: 15px;" >
                         <i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;<b>CLIENTE</b>&nbsp;<input style="border: none;font-size: 14px;width: 410px;padding-left: 10px;border: 0px !important" type="text"  value="<?php echo $datBPM[0]["nombre_cliente"]; ?>" id="idfNombreCliente"/>
                    
                         &nbsp;<i class="fa fa-id-card-o" aria-hidden="true"></i>&nbsp;<b id="tipoDocuIdentit">RUC</b>&nbsp;<input style="border: none;font-size: 14px;width: 150px;padding-left: 10px;border: 0px !important" type="text"  value="<?php echo $datBPM[0]["docu_cliente"]; ?>" id="inputDocuIdentidad"/>

                         &nbsp;&nbsp;&nbsp;<i class="fa fa-location-arrow" aria-hidden="true"></i>&nbsp;<b id="direccionClient">DIRECCIÓN</b>&nbsp;<input id="idfDireccion" style="border: none;font-size: 14px;width: 255px;padding-left: 10px;border: 0px !important" type="text"  value="<?php echo $datBPM[0]["direccion_cliente"]; ?>"/>
                      </article>
                  </div>
                  <h4 style="font-weight: 800">Item list</h4>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>CÓDIGO</th>
                        <th>DESCRIPCIÓN</th>
                        <th>CANTIDAD</th>
                        <th>VALOR UNITARIO(*)</th>
                        <th>PRECIO VENTA TOTAL</th>
                      </tr>
                    </thead>
                    <tbody id="idtbodyTableFactBpm">
                     
                      <?php 
                            $importe_total=0;
                            for ($i=0; $i < count($datBPMii); $i++)
                            { 
                                // $idPagos= $datBPMii[0]["idPagos"];
                                echo "<tr>
                                        <td>".$datBPMii[$i]["barcode"].$datBPMii[$i]["pk_dat_maestro_item"]."</td>
                                        <td>".$datBPMii[$i]["description"]."</td>
                                        <td>".$datBPMii[$i]["cantidad"]."</td>
                                        <td>".$datBPMii[$i]["pv_unidad"]."</td>
                                        <td style='text-align: right !important'>".number_format($datBPMii[$i]["sub_total"],2,"."," ")."</td>
                                      </tr>";
                                $importe_total=$importe_total+$datBPMii[$i]["sub_total"];
                            }
                       ?>
                    </tbody>
                    <thead>
                      <tr style="background: #fcfcfc; text-align: right;">
                        <td class="theadTable" colspan="4">IMPORTE TOTAL</td>
                        <td class="theadTable"><?php echo  number_format($importe_total,2,"."," "); ?></td>
                      </tr>
                    </thead>
                  </table>
                   <button type="button" class="btn btn-primary d-none" id="idRegistrarComprobante" style="float: right;">
                    <i class="fa fa-floppy-o" aria-hidden="true"></i> Registrar
                  </button>
            </div>

            <div class="col-lg-2" id="totalescomp" style="margin-top: 3px;">
              <!-- <h4 style="font-weight: 900">Tipo de operación</h4> -->
              <div>
                <center>
                <h4 style="margin-top: -4px;">TIPO DE OPERACIÓN</h4>
                </center>
                <div class="form-check form-check-inline labelradioso">
                      <input class="form-check-input" type="radio" name="rdbTipoOperacion" id="opGravada" value="opGravada" >
                      <label class="form-check-label" for="opGravada">Op. Gravada</label><span style="font-size: 16px;font-weight: 400 !important;    float: right;margin-top: 1.3px" id="idOpGravada"></span>
                </div>
                <div class="form-check form-check-inline labelradioso">
                      <input class="form-check-input" type="radio" name="rdbTipoOperacion" id="opExonerada" value="opExonerada" >
                      <label class="form-check-label" for="opExonerada">Op. Exonerada</label><span style="font-size: 16px;font-weight: 400 !important;    float: right;margin-top: 1.3px" id="idExonerada"></span>
                </div>
                <div class="form-check form-check-inline labelradioso">
                      <input class="form-check-input" type="radio" name="rdbTipoOperacion" id="opInafecta" value="opInafecta" disabled>
                      <label class="form-check-label" for="opInafecta" >Op. Inafecta</label>
                </div>
                <div class="form-check form-check-inline labelradioso">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="form-check-label" for="rbPagoM">ISC</label>
                </div>
                <div class="form-check form-check-inline labelradioso">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="form-check-label" for="rbPagoM">IGV</label><span style="font-size: 16px;font-weight: 400 !important;    float: right;margin-top: 1.5px" id="idIgv"></span>
                </div>
                <div class="form-check form-check-inline labelradioso">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="form-check-label" for="rbPagoM">ICBPER</label>
                </div>
                <div class="form-check form-check-inline labelradioso">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="form-check-label" for="rbPagoM">TOTAL</label><span style="font-size: 18px;font-weight: 200 !important;    float: right;margin-top: -4.5px" id="idPagoT"><?php echo $importe_total; ?></span>
                </div>                
              </div>
              <article class="d-none" style="width: 98%;margin-top: 10px;background: #00C865;border-radius: 7px;" id="tipoPagu">
                    <center>
                        <div class="input-group">
                            <select id="selectMetodoPago" class="form-control"  name="nuevoMetodoPago" required style="background: #00C865 !important;color: white !important;border: 1px solid #00C865 !important">
                              <option style="background: white;color: black" value="" >Método de pago</option>
                              <option style="background: white;color: black" value="Pendiente">Pago pendiente</option>
                              <!-- <option style="background: white;color: black" value="Efectivo">Efectivo</option>
                              <option style="background: white;color: black" value="TC">Transferencia</option>
                              <option style="background: white;color: black" value="TD">POS</option> 
                              <option style="background: white;color: black" value="TCE">Efectivo y transferencia</option>   
                              <option style="background: white;color: black" value="TDE">Efectivo y POS</option>                  -->
                            </select>    
                        </div>
                    </center>
              </article>
                    
                    <article id="dinerRecibido" class="inputCobrar d-none" style="width: 96%;margin-top: 10px;border: 1px solid #DDD;font-size: 18px" title="Dinero recibido">
                            &nbsp; S/&nbsp;<input class="inpCobration" style="border: none;font-size: 18px;width: 80%" type="text" id="inputEfectivo"   />
                    </article>
                    <article id="vueltoDeCobro" class="inputCobrar d-none" style="width: 96%;margin-top: 10px;border: 1px solid #DDD;font-size: 18px;background: #eee !important" title="Vuelto">
                      &nbsp; S/&nbsp;<input class="inpCobration" style="border: none;font-size: 18px;width: 80%;background: #eee !important" type="number" id="idvueltoDeCobro" readonly />
                    </article>
                    <article id="codigoTransaccion" class="inputCobrar d-none" style="width: 96%;margin-top: 10px;border: 1px solid #DDD;font-size: 18px;" title="Código de transacción">
                      &nbsp; <i class="fa fa-credit-card-alt" aria-hidden="true"></i>&nbsp;<input class="inpCobration" style="border: none;font-size: 18px;width: 80%;" id="idtarjcodeoperacion" type="text"  />
                    </article>

            </div>
            
      </div>
    </div>
  </section>
</div>

<script type="text/javascript">

function send_comprobante_venta() {
  // body...
  // send_data_comprobante_ventas        
              var fecha_creacion= $("#idfFechaEmitido").text();                       
              var fecha_contable= $("#idfFechaEmitido").text();                       
              var fecha_vencimiento= $("#idFFechaVencimiento").text();                
              var nombre_cliente= $("#idfNombreCliente").val();                       
              var num_docu_identidad= $("#inputDocuIdentidad").val();                 
              var direccion= $("#idfDireccion").val();                                
              var doc_org_de_comp=$("#idfDocuOrigen").text();                         
              var idBpm=$("#idBpm").text();                                           
              var estado_envio="No enviado";                                          
              var estado_tributatio="Libro si";                                       
              var tipo_operacion=$('input[name="rdbTipoOperacion"]:checked').val();   
                var total_gravada=$("#idOpGravada").text();                                                 
                if (total_gravada) {total_gravada=total_gravada;}else{total_gravada="0";} 

                var total_exonerada=$("#idExonerada").text();                           
                if (total_exonerada) {total_exonerada=total_exonerada;}else{total_exonerada="0";} 

                var total_inafecta="0";
                if (total_inafecta) {total_inafecta=total_inafecta;}else{total_inafecta="0";} 

                var igv=$("#idIgv").text();  
                if (igv) {igv=igv;}else{igv="0";} 
                                              
              var total=$("#idPagoT").text();                                         
              var tipo_pago=$('select[name=nuevoMetodoPago]').val();                  
                var efectivo_recibido=$('#inputEfectivo').val();                        
                if (efectivo_recibido) {efectivo_recibido=efectivo_recibido;}else{efectivo_recibido="0";} 

                var vuelto_entregado=$('#idvueltoDeCobro').val();                       
                if (vuelto_entregado) {vuelto_entregado=vuelto_entregado;}else{vuelto_entregado="0";} 

                var cod_transaccion=$('#idtarjcodeoperacion').val();                    
                if (cod_transaccion) {cod_transaccion=cod_transaccion;}else{cod_transaccion="0";} 

              // var cpe=;
              // var cdr=;
              // var data_send_json=;
              // var ruta_xml=;

              
              var accion="getComprobanteVenta";

              var dataen = {fecha_creacion: fecha_creacion,
                           fecha_contable: fecha_contable,
                           fecha_vencimiento: fecha_vencimiento,
                           nombre_cliente: nombre_cliente,
                           num_docu_identidad: num_docu_identidad,
                           direccion: direccion,
                           doc_org_de_comp: doc_org_de_comp,
                           idBpm: idBpm,
                           estado_envio: estado_envio,
                           estado_tributatio: estado_tributatio,
                           tipo_operacion: tipo_operacion,
                           total_gravada: total_gravada,
                           total_exonerada: total_exonerada,
                           total_inafecta: total_inafecta,
                           igv: igv,
                           total: total,
                           tipo_pago: tipo_pago,
                           efectivo_recibido: efectivo_recibido,
                           vuelto_entregado: vuelto_entregado,
                           cod_transaccion: cod_transaccion,
                           accion:  accion};

              $.ajax({
                type: 'post',
                url:'controladores/facturador.controlador.php',
                data:dataen,

                success:function(resp){
                    $("#scripti").html(resp);
                    alert("Comprobante registrado correctamente");
                  }
              });

              return false;
  }


$( document ).ready(function() {

    /*asiganar correlativo y serie*/
    var docuIdentidad=$("#inputDocuIdentidad").val();        
    var accion="add_cabecera_comprobante";

    var dataen =        
                'docuIdentidad=' +docuIdentidad+
                '&accion=' +accion;
    $.ajax({
      type: 'post',
      url:'controladores/facturador.controlador.php',
      data:dataen,

      success:function(resp){
          $("#serie_correlativo").html(resp);
        }
    });
    // return false;
    
   
      switch("<?php echo $nomElemnt;?>"){
        case "Boleta":
          $('#selectTipoComprobante option[value=BLT]').attr('selected','selected');
          $('#tipoDocuIdentit').text("DNI");
          var inputDocuIdentidad = $('#inputDocuIdentidad').val();
          if (inputDocuIdentidad.length>8) 
          {
             swal({
                title: 'CUIDADO',
                text: 'Pretendes usar N° RUC para una boleta. Eso es incorrecto! ',
                timer: 10000
              }) 
             $("#request_idOjo").addClass("d-none");
             $("#listViewHistBpm").removeClass("d-none");
          }

        break;
        case "Factura":
          $('#selectTipoComprobante option[value=FCT]').attr('selected','selected');
          $('#tipoDocuIdentit').text("RUC");
          var inputDocuIdentidad = $('#inputDocuIdentidad').val();
          if (inputDocuIdentidad.length<11) 
          {
             swal({
                title: 'CUIDADO',
                text: 'Pretendes usar N° DNI para una Factura. Eso es incorrecto! ',
                timer: 10000
              }) 
              $("#request_idOjo").addClass("d-none");
              $("#listViewHistBpm").removeClass("d-none");
          }
        break;
        default:
          swal({
              title: 'oops',
              text: 'Debes especificar un tipo de comprobante válido',
              timer: 4000
            })
      }



      $("#inputEfectivo").keyup(function(){
          var totalcomprobante = $('#idPagoT').text();
          var inputEfectivo = $('#inputEfectivo').val();



          var voltaje=inputEfectivo-totalcomprobante;

          $('#idvueltoDeCobro').val(voltaje.toFixed(2));
      });
});

 
 
$("input[name=rdbTipoOperacion]").click(function(){     
      var tipoOpecion = $('input[name="rdbTipoOperacion"]:checked').val();
      switch(tipoOpecion)
      {
        case "opGravada":
            $("#inputEfectivo,#idvueltoDeCobro,#idtarjcodeoperacion").val(""); /*LIMPIAR INPUT COBRATION*/
            $('#idExonerada,#idPagoT').text("");
            $('#idOpGravada').text('<?php echo  $importe_total; ?>');
            var igv='<?php echo  $importe_total; ?>' * 0.18;
            $('#idIgv').text(igv.toFixed(2));          
            var totalcomprobante= parseFloat('<?php echo  $importe_total; ?>')+parseFloat(igv);
            $('#idPagoT').text(totalcomprobante.toFixed(2));
            $("#tipoPagu").removeClass("d-none");
          break;
        case "opExonerada":
            $('#idOpGravada,#idIgv').text("");          
            $('#idExonerada,#idPagoT').text('<?php echo  $importe_total; ?>');
            $("#tipoPagu").removeClass("d-none");
          break;
      }
});



$("select[name=nuevoMetodoPago]").change(function()
{
      var tipoDePago = $('select[name=nuevoMetodoPago]').val();
      switch (tipoDePago) {
        case "Efectivo":
          $(".inpCobration").val("");
          $(".inputCobrar").addClass("d-none");
          $("#dinerRecibido,#vueltoDeCobro,#idRegistrarComprobante").removeClass("d-none");
          break;
        case "TC":
          $(".inpCobration").val("");
          $(".inputCobrar").addClass("d-none");
          $("#codigoTransaccion,#idRegistrarComprobante").removeClass("d-none");
          break;
        case "TD":
          $(".inpCobration").val("");
          $(".inputCobrar").addClass("d-none");
          $("#codigoTransaccion,#idRegistrarComprobante").removeClass("d-none");
          break;
        case "TCE":
          $(".inpCobration").val("");
          $(".inputCobrar,#idRegistrarComprobante").removeClass("d-none");
          break;
        case "TDE":
          $(".inpCobration").val("");
          $(".inputCobrar,#idRegistrarComprobante").removeClass("d-none");
          break;
        case "Pendiente":
          $("#vueltoDeCobro,#dinerRecibido,#codigoTransaccion").addClass("d-none");
          $("#idRegistrarComprobante").removeClass("d-none");
          break;
          
        default:
            swal({
              title: 'Hey',
              text: 'Debes especificar un método de pago',
              timer: 4000
            })
      }
});


$( "#returnHistoailBpm" ).click(function() {
      $("#request_idOjo,#idtbodyTableFactBpm").addClass("d-none");
      $("#listViewHistBpm").removeClass("d-none");
});




// CLICK BOTON GUARDAR
$( "#idRegistrarComprobante" ).click(function() {

  $( "#idRegistrarComprobante" ).addClass('d-none');
  
      var tipoDePago = $('select[name=nuevoMetodoPago]').val();
      var tipoOpecion = $('input[name="rdbTipoOperacion"]:checked').val();

   

      if (tipoDePago.length<1)
      {
        swal({
          title: 'Hey debes especificar:',
          text: 'Método de pago',
          timer: 9000
        })
      }else if (tipoOpecion=== undefined) {
        swal({
          title: 'Hey debes especificar:',
          text: 'Tipo de operación',
          timer: 9000
        })
      }

      else
      {
          switch (tipoDePago) 
        {
          // --------------------------------------------------------------------------------
          case "Efectivo":
            var inpEfectivo=$("#inputEfectivo").val();
                if(inpEfectivo.length>0){inpEfectivo=inpEfectivo;}else{inpEfectivo=0;}

            var idPagoTi=$("#idPagoT").text();
            var vuelto=inpEfectivo-idPagoTi;
            
            if (parseFloat(vuelto)<0) 
            {
              swal({
                title: 'Cuidado!',
                text: 'Estas cobrando menos de lo necesario :v',
                timer: 9000
              })
            }else{
                send_comprobante_venta();
            }
            
            break;
          // --------------------------------------------------------------------------------
          case "TC":
            var idtarjcodeoperacion=$("#idtarjcodeoperacion").val();

            if (idtarjcodeoperacion.length<1) 
            {
              swal({
                title: 'Cuidado!',
                text: 'Debes registrar el código de transacción',
                timer: 9000
              })
            }else{
               send_comprobante_venta();
            }
            break;
          // --------------------------------------------------------------------------------
          case "TD":            
            var idtarjcodeoperacion=$("#idtarjcodeoperacion").val();
            
            if (idtarjcodeoperacion.length<1) 
            {
              swal({
                title: 'Cuidado!',
                text: 'Debes registrar el código de transacción',
                timer: 9000
              })
            }else{
                send_comprobante_venta();
            }
            break;
          // --------------------------------------------------------------------------------
          case "TCE":
            
            var inpEfectivo=$("#inputEfectivo").val();
                if(inpEfectivo.length>0){inpEfectivo=inpEfectivo;}else{inpEfectivo=0;}
            var idPagoTi=$("#idPagoT").text();
            var idtarjcodeoperacion=$("#idtarjcodeoperacion").val();

            var vuelto=inpEfectivo-idPagoTi;
            
            
            if (parseFloat(vuelto)<0) 
            {
              swal({
                title: 'Cuidado!',
                text: 'Estas cobrando menos de lo necesario',
                timer: 9000
              })
            }else if (idtarjcodeoperacion.length<1) {
              swal({
                title: 'Cuidado!',
                text: 'Debes registrar el código de transacción',
                timer: 9000
              })
            }else{
                send_comprobante_venta();
            }
            break;
          // --------------------------------------------------------------------------------
          case "TDE":
            
             var inpEfectivo=$("#inputEfectivo").val();
                if(inpEfectivo.length>0){inpEfectivo=inpEfectivo;}else{inpEfectivo=0;}
            var idPagoTi=$("#idPagoT").text();
            var idtarjcodeoperacion=$("#idtarjcodeoperacion").val();
              
              var vueltoje= (inpEfectivo-idPagoTi);

            if (parseFloat(vueltoje)<0) 
            {
              swal({
                title: 'Cuidado!',
                text: 'Estas cobrando menos de lo necesarios',
                timer: 9000
              })
            }else if (idtarjcodeoperacion.length<1) {
              swal({
                title: 'Cuidado!',
                text: 'Debes registrar el código de transacción',
                timer: 9000
              })
            }else{
              send_comprobante_venta();
            }
            break;
            // --------------------------------------------------------------------------------
          case "Pendiente":
            send_comprobante_venta();
          break;

        }
      }

      
});



</script>





