<?php
/**
*PRODUCTOS PISTOLEADOS EN FICHA BPM
 * Created by PhpStorm.
 * User: LABAD
 * Date: 22/01/2019
 * Time: 09:44 PM
*insert into t1 select max(id)+1 from t1  <-- Para añadir sum a un campo in insert into

 ***MOMORY:
*A ver creaste.... saveNewBolsa
 */
	require_once "config.php";
	$accion=$_POST['action'];
  $bar_code=$_POST['bar_code'];
	switch ($accion) {
      /*------------------------------------------------------------------------------------*/
      case "add_producto_pistoleo": 
            //VERIFICAMOS STOCK DEL PRODUCTO 
            $script = "SELECT sum(stock) FROM `productos` WHERE codigo='$bar_code'";
            $reconsul = $conexion->query($script);
            $arrayi=mysqli_fetch_row($reconsul);
            $stockp=$arrayi[0];
      ?>    
           
                  <?php 
                    if ($stockp<1 and $bar_code !='todo') 
                    {
                      echo "<center>
                      <img src='https://damianfeijoo.files.wordpress.com/2012/08/pregunta.jpg'>
                      <h4>El articulo <b>$bar_code</b>, no se encuentra disponible<br>Puedes revisar tu inventario dando click en <a href='productos' target='_blank'> Almacen</a></h4></center>";
                    }else{ 
                   ?>
                   <br>
                   
                   
                   <?php 
                            if($bar_code=='todo'){
                              echo '<input id="myInput" type="text" placeholder="Search..">';
                            }
                      ?>

                  <table class="table table-bordered table-striped dt-responsive tablas" style="width: 100% !important">
                    <thead>
                      <tr>
                        <th style="width: 100px !important">Cod. Barra</th>
                        <th>Descripción de articulo</th>
                        <th>Capacidad</th>           
                        <th>Stock Actual</th>
                        <th title="Precio de venta">P. venta</th> 
                        <th>Foto</th>
                      </tr> 
                    </thead>
                    <tbody id="myTable">   
                        <?php 
                            if($bar_code=='todo'){
                              $vsbx = "SELECT * FROM `datos_maestros_productos` as a
                              INNER JOIN productos AS b ON a.bar_code=b.codigo
                              WHERE estado='1'  and stock>0 ";
                            }else{
                              $vsbx = "SELECT * FROM `datos_maestros_productos` as a
                              INNER JOIN productos AS b ON a.bar_code=b.codigo
                              WHERE a.bar_code='$bar_code' AND estado='1'  and stock>0 ";
                            }
                             
  

                              $vsbxx = $conexion->query($vsbx);  
                              # code...
                              while ($rowtz=mysqli_fetch_row($vsbxx))
                              {
                              ?>
                                    <tr  onclick='addProdBpm("<?php echo $rowtz[6];?>","<?php echo $rowtz[1];?>","<?php echo $rowtz[13];?>","<?php echo $rowtz[2];?>");$("#bpm_inp_barcode").val("<?php echo $rowtz[5]; ?>")' class="icoMano">
                                            <td><?php echo $rowtz[5]; ?></td>
                                            <td><?php echo $rowtz[1]; ?></td>
                                            <td><?php echo $rowtz[2]; ?></td>
                                            <td><?php echo $rowtz[11]; ?></td>
                                            <td><?php echo $rowtz[13]; ?></td>
                                            <td><img src="<?php echo $rowtz[10]; ?>" ></td>
                                    </tr> 
                              <?php
                              }
                        ?>                   
                    </tbody>
                  </table> 
                    <?php } ?>
                
            <script type="text/javascript">
              $(document).ready(function(){
                $("#myInput").on("keyup", function() {
                  var value = $(this).val().toLowerCase();
                  $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                  });
                });
              });

                $("#modalProPistoleado").modal("show");
                
                function addProdBpm(vari,nomprod,precvent,capacidad) {
                  
                      $("#modalProPistoleado").modal("hide");
                      $("#bpm_keyprod").text(vari);
                      $("#bpm_nomproduct").text(nomprod,);
                      $("#bpm_precventa").text(precvent);
                      $("#bpm_capacidad").text(capacidad);
                      $('#bpm_cantidad').attr('readonly', false);
                        /*Capacidad de la bolsa seleccionada*/
                        // var cast_capacidad=capacidad.slice(0, -1);
                        var cast_capacidad=capacidad.match(/\d+/);
                        
                        /*Kilos que debemos embolsar - convertimos a gramos - Render Kg residuales*/
                        var krsls=parseFloat($("#krsls").val());
                        var kggresiduales=(krsls*1000);
                        $("#kggresiduales").val(kggresiduales);                

                        var gram_empacados= parseFloat($("#subGramosTotalProductoAnexos").val());     

                        if (gram_empacados>0) 
                        {

                          var cantBolsSugrd=Math.ceil((kggresiduales-gram_empacados)/cast_capacidad);
                          
                        }else{
                          /*Sugerencia de cuantas bolsas usar de las seleccionadas*/
                          var cantBolsSugrd=Math.ceil(kggresiduales/cast_capacidad);
                        }
                        

                      $('#bpm_cantidad').attr('placeholder', cantBolsSugrd+" sugeridos");



                      $('#bpm_cantidad').focus();
                }

                
            </script>
      <?php
      break;
      /*------------------------------------------------------------------------------------*/
      case "add_producto_pistoleoDb":
              /*INSERT INTO PRODUCTO PISTOLEADO A PRODUCTOS PRODUCTOS ANEXOS productos_anexos_bpm2*/
              $codIdBpm____________=$_POST['codIdBpm'];
              $vIdProducto_________=$_POST['vIdProducto'];
              $vBarcodeProduct_____=$_POST['vBarcodeProduct'];
              $vNombreProducto_____=$_POST['vNombreProducto'];
              $vPrecioVentaPro_____=$_POST['vPrecioVentaPro'];
              $vCapacidadProdu_____=$_POST['vCapacidadProdu'];
              $vCantidProducto_____=$_POST['vCantidProducto'];
              $bpm_tipo_molido_pab_=$_POST['bpm_tipo_molido_pab'];
              $bpm_tipo_tostado_pab=$_POST['bpm_tipo_tostado_pab'];
              $bpm_subtotal________=$_POST['bpm_subtotal'];
              $action______________=$_POST['action'];

              mysqli_query($conexion,"INSERT INTO `productos_anexos__bpm` (`codBpm`,`fk_producto`,`barcode_producto`,`nombre_producto`,`precio_venta_producto`,`capacidad_producto`,`cantidad_producto`,`bpm_tipo_molido_pab`,`bpm_tipo_tostado_pab`,`product_sub_total`) 
              VALUES ('$codIdBpm____________','$vIdProducto_________','$vBarcodeProduct_____','$vNombreProducto_____','$vPrecioVentaPro_____','$vCapacidadProdu_____','$vCantidProducto_____','$bpm_tipo_molido_pab_','$bpm_tipo_tostado_pab','$bpm_subtotal________');");

              /*SELECT * FROM DE productos_anexos_bpm2 para render en BPM*/
              $slfr_productos_anexos = "SELECT * FROM `productos_anexos__bpm`
              WHERE codBpm='$codIdBpm____________' ";
              $slfr_productos_anexosx = $conexion->query($slfr_productos_anexos);  
              # code...
                $__subSolesTotalProductoAnexos=0;
                $_subGramosTotalProductoAnexos=0;  
              while ($rowpa=mysqli_fetch_row($slfr_productos_anexosx))
                /*$rowpa[1]*/
              {

                      $__subSolesTotalProductoAnexos=$__subSolesTotalProductoAnexos+$rowpa[10];

                      $gramos_x_bolsa=substr($rowpa[6], 0, -1);
                      $capacidad_g_por_bolsas=$rowpa[7]*$gramos_x_bolsa;

                      $_subGramosTotalProductoAnexos=$_subGramosTotalProductoAnexos+$capacidad_g_por_bolsas;      
              ?>
                    <tr class="icoMano">
                            <td style="display: none;"></td>
                            <td style="width: 30px !important"><?php echo  $rowpa[3];?></td>
                            <td style="width: 65px;"><?php echo  $rowpa[4];?></td>
                            <td ><?php echo  $rowpa[5];?></td>
                            <td ><?php echo  $rowpa[6];?></td>
                            <td style="width: 10px !important"><?php echo  $rowpa[7];?></td>
                            <td><?php echo  $rowpa[8];?></td>
                            <td><?php echo  $rowpa[9];?></td>
                            <td><?php echo  $rowpa[10];?></td></td>
                            <td>
                              <span>
                                <img onclick="delete__articulo_de_bpm('<?php echo $rowpa[0]; ?>','<?php echo $rowpa[1]; ?>','<?php echo $capacidad_g_por_bolsas; ?>')" title="Remover artículo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRRq6P5aQAo5BZtxKn3CC-TmkjVtqJGok6_7AGqIRfPNScRhlah&s" style="width: 30px !important">
                              </span>
                            </td>
                    </tr> 
              <?php
              }
              ?>
                <script type="text/javascript">

                          /*SEND REGULARATION X DELETE BOLSA IN BPM subSolesTotalProductoAnexos,subGramosTotalProductoAnexos,totalcobbls*/
                                var subSolesTotalProductoAnexos="<?php echo  $__subSolesTotalProductoAnexos;?>";
                                var subGramosTotalProductoAnexos= "<?php echo  $_subGramosTotalProductoAnexos;?>";
                                var codIdBpm="<?php echo  $codIdBpm____________;?>";
                                var action='update_totales_x_delet_producto_pistoleoDb';
                                var dataen = 'subSolesTotalProductoAnexos=' +subSolesTotalProductoAnexos+
                                              '&subGramosTotalProductoAnexos=' +subGramosTotalProductoAnexos+
                                              '&codIdBpm='+codIdBpm+
                                              '&action=' +action;

                              $.ajax({
                                    type: 'post',
                                    url:'modelos/productos_pistoleados.modelo.php',
                                    data:dataen,
                                    success:function(resp)
                                    {
                                        // $("#renderProductAdd").html(resp);
                                        console.log("Update correcto");
                                    }
                              });
                              /*_____________________________________________________________________*/

                          $("#subSolesTotalProductoAnexos").val("<?php echo  $__subSolesTotalProductoAnexos;?>");
                          $("#subGramosTotalProductoAnexos").val("<?php echo  $_subGramosTotalProductoAnexos;?>");
                          $("#imgLoading").addClass("d-none");
                          $('#bpm_inp_barcode').prop('readonly', false);
                          $('#bpm_inp_barcode').focus();
                          function delete__articulo_de_bpm(idArticle,codIdBpm,capacidadDeBolsa)
                          {
                                
                                swal({
                                        title: '¿Está seguro de borrar este artículo de tu BPM?',
                                        text: "¡Si no lo está, puede cancelar la acción!",
                                        type: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        cancelButtonText: 'Cancelar',
                                        confirmButtonText: 'Si, borrar artículo!'
                                      }).then((result) => {
                                        if (result.value) {
                                                var idArticulo_anexo=idArticle;
                                                var codIdBpm___anexo= codIdBpm;
                                                var capacidad_Bolsa=capacidadDeBolsa
                                                var action='delet_producto_pistoleoDb';
                                                var dataen = 'idArticulo_anexo=' +idArticulo_anexo+
                                                              '&codIdBpm=' +codIdBpm___anexo+
                                                              '&capacidad_Bolsa=' +capacidad_Bolsa+
                                                              '&action=' +action;

                                                $.ajax({
                                                      type: 'post',
                                                      url:'modelos/productos_pistoleados.modelo.php',
                                                      data:dataen,
                                                      success:function(resp)
                                                      {
                                                          $("#renderProductAdd").html(resp);
                                                      }
                                                });
                                            return false;
                                        }
                                  })
                          }
                    </script>
              <?php
      break;
      /*------------------------------------------------------------------------------------*/
      case "delet_producto_pistoleoDb":
                $idArticulo_anexo=$_POST['idArticulo_anexo'];
                $codIdBpm=$_POST['codIdBpm'];
                $capacidad_Bolsa= $_POST['capacidad_Bolsa'];
                
                mysqli_query($conexion, "DELETE FROM `productos_anexos__bpm` WHERE id= '$idArticulo_anexo'");

                /*SELECT * FROM DE productos_anexos_bpm2 para render en BPM*/
                    $slfr_productos_anexos = "SELECT * FROM `productos_anexos__bpm`
                    WHERE codBpm='$codIdBpm' ";
                    $slfr_productos_anexosx = $conexion->query($slfr_productos_anexos);  
                    # code...
                      $__subSolesTotalProductoAnexos=0;
                      $_subGramosTotalProductoAnexos=0; 

                      $cunt_select_from=0; 


                    while ($rowpa=mysqli_fetch_row($slfr_productos_anexosx))
                      /*$rowpa[1]*/
                    {
                            $cunt_select_from=$cunt_select_from+1;
                            $__subSolesTotalProductoAnexos=$__subSolesTotalProductoAnexos+$rowpa[10];

                            $gramos_x_bolsa=substr($rowpa[6], 0, -1);
                            $capacidad_g_por_bolsas=$rowpa[7]*$gramos_x_bolsa;

                            $_subGramosTotalProductoAnexos=$_subGramosTotalProductoAnexos+$capacidad_g_por_bolsas;      
                    ?>
                          <tr class="icoMano">
                                  <td style="display: none;"></td>
                                  <td style="width: 30px !important"><?php echo  $rowpa[3];?></td>
                                  <td style="width: 65px;"><?php echo  $rowpa[4];?></td>
                                  <td ><?php echo  $rowpa[5];?></td>
                                  <td ><?php echo  $rowpa[6];?></td>
                                  <td style="width: 10px !important"><?php echo  $rowpa[7];?></td>
                                  <td><?php echo  $rowpa[8];?></td>
                                  <td><?php echo  $rowpa[9];?></td>
                                  <td><?php echo  $rowpa[10];?></td></td>
                                  <td>
                                    <span>
                                    <img onclick="delete__articulo_de_bpm('<?php echo $rowpa[0]; ?>','<?php echo $rowpa[1]; ?>')" title="Remover artículo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRRq6P5aQAo5BZtxKn3CC-TmkjVtqJGok6_7AGqIRfPNScRhlah&s" style="width: 30px !important">
                                    </span>
                                  </td>
                          </tr> 
                          
                    <?php 
                    } 
                    
                    ?>
                    <script type="text/javascript">
                                /*SEND REGULARATION X DELETE BOLSA IN BPM subSolesTotalProductoAnexos,subGramosTotalProductoAnexos,totalcobbls*/
                                var subSolesTotalProductoAnexos="<?php echo  $__subSolesTotalProductoAnexos;?>";
                                var subGramosTotalProductoAnexos= "<?php echo  $_subGramosTotalProductoAnexos;?>";
                                var codIdBpm="<?php echo  $codIdBpm;?>";
                                var action='update_totales_x_delet_producto_pistoleoDb';
                                var dataen = 'subSolesTotalProductoAnexos=' +subSolesTotalProductoAnexos+
                                              '&subGramosTotalProductoAnexos=' +subGramosTotalProductoAnexos+
                                              '&codIdBpm='+codIdBpm+
                                              '&action=' +action;

                              $.ajax({
                                    type: 'post',
                                    url:'modelos/productos_pistoleados.modelo.php',
                                    data:dataen,
                                    success:function(resp)
                                    {
                                        // $("#renderProductAdd").html(resp);
                                        console.log("Update correcto");
                                    }
                              });
                              /*_____________________________________________________________________*/



                                $("#subSolesTotalProductoAnexos").val("<?php echo  $__subSolesTotalProductoAnexos;?>");
                                $("#subGramosTotalProductoAnexos").val("<?php echo  $_subGramosTotalProductoAnexos;?>");
                                $("#imgLoading").addClass("d-none");
                                $('#bpm_inp_barcode').prop('readonly', false);
                                $('#bpm_inp_barcode').focus();


                                function delete__articulo_de_bpm (idArticle,codIdBpm,capacidadDeBolsa)
                                {
                                      
                                      swal({
                                              title: '¿Está seguro de borrar este artículo de tu BPM?',
                                              text: "¡Si no lo está, puede cancelar la acción!",
                                              type: 'warning',
                                              showCancelButton: true,
                                              confirmButtonColor: '#3085d6',
                                              cancelButtonColor: '#d33',
                                              cancelButtonText: 'Cancelar',
                                              confirmButtonText: 'Si, borrar artículo!'
                                            }).then((result) => {
                                              if (result.value) {
                                                       var idArticulo_anexo=idArticle;
                                                        var codIdBpm___anexo= codIdBpm;
                                                        var capacidad_Bolsa=capacidadDeBolsa
                                                        var action='delet_producto_pistoleoDb';
                                                        var dataen = 'idArticulo_anexo=' +idArticulo_anexo+
                                                                      '&codIdBpm=' +codIdBpm___anexo+
                                                                      '&capacidad_Bolsa=' +capacidad_Bolsa+
                                                                      '&action=' +action;

                                                      $.ajax({
                                                            type: 'post',
                                                            url:'modelos/productos_pistoleados.modelo.php',
                                                            data:dataen,
                                                            success:function(resp)
                                                            {
                                                                $("#renderProductAdd").html(resp);
                                                            }
                                                      });
                                                  return false;
                                              }
                                        })
                                }
                          
                          var cunt_select_from=  '<?php echo $cunt_select_from ;?>';
                          if (cunt_select_from==0) {
                                                    $("#subGramosTotalProductoAnexos,#subSolesTotalProductoAnexos").val('0');
                                                    
                                                   }
                      </script>
      <?php                    
      break;
      /*------------------------------------------------------------------------------------*/
      case "update_totales_x_delet_producto_pistoleoDb":
                $subSolesTotalProductoAnexos_=$_POST['subSolesTotalProductoAnexos'];
                $subGramosTotalProductoAnexos_=$_POST['subGramosTotalProductoAnexos'];
                $codIdBpm=$_POST['codIdBpm'];

                 mysqli_query($conexion,"UPDATE bpm 
                                          SET  subSolesTotalProductoAnexos   = '$subSolesTotalProductoAnexos_', 
                                                subGramosTotalProductoAnexos ='$subGramosTotalProductoAnexos_',
                                                totalcobbls='$subSolesTotalProductoAnexos_' 
                                          WHERE `pk_bpm`='$codIdBpm';"); 

      break;
      /*------------------------------------------------------------------------------------*/
      case "val_stock_producto_pistoleoDb":
            //VERIFICAMOS STOCK DEL PRODUCTO 
            $script = "SELECT sum(stock) FROM `productos` WHERE codigo='$bar_code'";
            $reconsul = $conexion->query($script);
            $arrayi=mysqli_fetch_row($reconsul);
            $stockp=$arrayi[0];
     
                    if ($stockp<$_POST['stock_cantidad_pretendida']) 
                    {
                        echo "no_tienes_stock";
                    }else{
                        echo "si_tienes_stock";
                    }
      break;
      /*------------------------------------------------------------------------------------*/
      case "Existad":
        echo "<p style='color: red;background: yellow'>Usted ya se encuentra registrado*</p>";
      break;
      /*------------------------------------------------------------------------------------*/
      default:
                echo ":V";
      /*------------------------------------------------------------------------------------*/
  }



