
<script type="text/javascript">
// -------------------------------------------------
function gnr_comprobante_bpm(tipo_comp_a_generar,idBpm) {
      $("#request_idOjo").removeClass("d-none");
      $("#listViewHistBpm").addClass("d-none");
      $("tr").removeClass("painttr");
      $("#"+idBpm+"painttr").addClass("painttr");
      $("#listViewHistBpm").addClass("d-none");
      

      var nomElemnt= tipo_comp_a_generar;
      var idBpm= idBpm;
      var accion="generar_comprobant__bpm";

      var dataen =        
                  {nomElemnt:nomElemnt,
                  idBpm:idBpm,
                  accion:accion};

      $.ajax({
        type: 'post',
        url:'controladores/facturador.controlador.php',
        data:dataen,

        success:function(resp){
            $("#request_idOjo").html(resp);
          }
      });

      return false;

}

 function desapare(id) {
        $('#'+id).hide();
 }
</script>
<style type="text/css">
  .painttr{background: rgba(99, 160, 60, 0.45) !important;}
</style>
<div class="content-wrapper" id="listViewHistBpm">
  <section class="content-header" >
    <h1 id="idEditBPMTitle" style='color: #c3c3c3'>
      Retornar stock
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Retornar stock</li>
    </ol>
  </section>
  <section class="content" id="actualizarContenidoBpm">
    <div class="box">
      <!-- <div class="box-header with-border">
        <button class="btn btn-primary" onclick="redireccionar('tostado')">
         <i class="fa fa-chevron-right" aria-hidden="true"></i> Nuevo BPM
        </button>
      </div> -->
      <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Más opciones
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href="tostado" ><i class="fa fa-chevron-right" aria-hidden="true"></i> Nuevo BPM</a></li>
          <li><a href="liberar-productos-bpm" target="_blank"><i class="fa fa-chevron-right" aria-hidden="true"></i> Liberar articulos</a></li>
        </ul>
      </div>

      <div class="box-body" >


                <div class="input-group" style="float: right;margin-bottom: 10px;">
                           <input id="inpBuscador" type="search" placeholder="Escribe tu búsqueda" aria-describedby="button-addon1" class="form-control border-0 bg-light ">                           
                </div>
            
       <table class="table table-bordered table-striped dt-responsive" style="width: 100% !important;margin-top: 10px !important">          
          <thead>
            <tr>
              <th></th>
              <th class="desaparece">sapo</th>

              <th>Fecha</th>

              <th>Código</th>

              <th>Producto</th>           

              <th>Cantidad</th> 

              <th>Precio V.U</th>  
              <th>Sub total</th>  
              <th>Control</th>     

            </tr> 
          </thead>

          <tbody class="buscar">

            <?php

          

            $bpmIcompletas = ControladorClientes::ctrMostrarRegistroBpmIncompletas();

            $pio=0;



            foreach ($bpmIcompletas as $key => $value) { 
                  
                  $pio=$pio+1;        
              			

              ?>

              <tr  class="icoMano" id="<?php echo $pio."painttr"; ?>">   

                      <td style="color: #c3c3c3">
                        <?php echo $value["id"]; ?>
                      </td>
                      <td id='<?php echo $value["id"]; ?>' class='desaparece'><?php echo  $value["id"];?></td>

                      <td ><?php echo date("d/m/Y g:i A", strtotime($value["fecha_creacion"]) ); ?></td>

                      <td ><?php echo   "LOTE: ".$value["fk_producto"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$value["barcode_producto"];  ?></td>

                      <td><?php echo $value["nombre_producto"]; ?></td>

                      <td><?php echo $value["cantidad_producto"]; ?></td>

                      <td><?php echo $value["precio_venta_producto"]; ?></td>
                      <td><?php echo $value["product_sub_total"]; ?></td>
                      <td style="justify-content: center;text-align: center;width: 200px !important">
                      	 <button type="button" class="btn btn-default btn-xs" id="btnRetornar" onclick="desapare('<?php echo $pio."painttr"; ?>')">Retornar</button>
                      </td>
              </tr>

            

            <?php }

            ?>        



          </tbody>


        </table>           

        <br><br>

      </div>



    </div>
  </section>
</div>
 <div id="request_idOjo"></div>

 <script type="text/javascript">
   $(document).ready(function () {

    

    

 
    (function ($) {
 
        $('#inpBuscador').keyup(function () {
 
             var rex = new RegExp($(this).val(), 'i');
 
             $('.buscar tr').hide();
 
             $('.buscar tr').filter(function () {
               return rex.test($(this).text());
             }).show();
 
        })
 
    }(jQuery));
 
});
 </script>









