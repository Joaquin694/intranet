<div class="content-wrapper">



  <section class="content-header">

    

    <h1>

      

      Administrar ventas

    

    </h1>



    <ol class="breadcrumb">

      

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      

      <li class="active">Administrar ventas</li>

    

    </ol>



  </section>



  <section class="content">



    <div class="box">



      <div class="box-header with-border">

  

        <a href="crear-venta">



          <button class="btn btn-primary">

            

            Agregar venta



          </button>



        </a>

                
<!-- 
        <button type="button" class="btn btn-default pull-right" id="daterange-btn">

          <span>

            <i class="fa fa-calendar"></i> Rango de fecha

          </span>

          <i class="fa fa-caret-down"></i>

        </button>   -->      



      </div>



      <div class="box-body table-responsive">

        

       <table class="table table-bordered table-striped dt-responsive tablas rangoFechas">

         

        <thead>

         

         <tr>

           

           <th style="width:10px">#</th>

           <th>Código factura</th>

           <th>Cliente</th>

           <th>Vendedor</th>

           <th>Forma de pago</th>

           <th>Neto</th>

           <th>Total</th> 

           <th>Fecha</th>

           <th>Acciones</th>



         </tr> 



        </thead>



        <tbody>



        <?php



          $item = null;

          $valor = null;



          $respuesta = ControladorVentas::ctrMostrarVentas($item, $valor);



          foreach ($respuesta as $key => $value) {

           



           echo '<tr>



                  <td>'.($key+1).'</td>



                  <td>'.$value["codigo"].'</td>';



                  $itemCliente = "id";

                  $valorCliente = $value["id_cliente"];



                  $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);



                  echo '<td>'.$respuestaCliente["nombre"].'</td>';



                  $itemUsuario = "id";

                  $valorUsuario = $value["id_vendedor"];



                  $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);



                  echo '<td>'.$respuestaUsuario["nombre"].'</td>



                  <td>'.$value["metodo_pago"].'</td>



                  <td>S/ '.number_format($value["neto"],2).'</td>



                  <td>S/ '.number_format($value["total"],2).'</td>



                  <td>'.$value["fecha"].'</td>



                  <td>



                    <div class="btn-group">

                        

                      <button class="btn btn-info"><i class="fa fa-print btnImprimirFactura" codigoVenta="'.$value["codigo"].'"></i></button>';





                      if($_SESSION["perfil"] == "Administrador"){



                        echo '<button class="btn btn-warning btnEditarVenta" idVenta="'.$value["id"].'"><i class="fa fa-pencil"></i></button>



                      <button class="btn btn-danger btnEliminarVenta" idVenta="'.$value["id"].'"><i class="fa fa-times"></i></button>';



                      }



                    echo '</div>  



                  </td>



                </tr>';

            }



        ?>

               

        </tbody>



       </table>



       <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" class="perfilUsuario">



       <?php



      $eliminarVenta = new ControladorVentas();

      $eliminarVenta -> ctrEliminarVenta();



      ?>

       



      </div>



    </div>



  </section>



</div>









