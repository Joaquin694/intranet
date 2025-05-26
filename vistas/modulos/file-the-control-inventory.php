

<script src="extensiones/bar_code_Abad/JsBarcode.all.min.js"></script>

<div class="content-wrapper">



  <section class="content-header">

    

    <h1>

      

      Inventario

    

    </h1>

    <center>

      <div class="btn-group btn-group btn-group-toggle shadow-lg" data-toggle="buttons" style="background: white;color: #0086d4; border-radius: 0px; font-weight: 800; border: 7px solid #1d23402e;">

        <label  class="btn btn-secondary " onclick="redireccionar('almacenes')">

          <input type="radio" name="options" id="option2" autocomplete="off" >

 Almacenes

        </label>

        <label class="btn btn-secondary" onclick="redireccionar('categorias')">

          <input type="radio" name="options" id="option2" autocomplete="off"> Categorías

        </label>

        <label class="btn btn-secondary" onclick="redireccionar('datos-maestros-de-productos')">

          <input type="radio" name="options" id="option2" autocomplete="off" > Datos maestros productos

        </label>

        <label style="background: #1d2340;color: white !important" class="btn btn-secondary active" onclick="redireccionar('file-the-control-inventory')">

          <input type="radio" name="options" id="option2" autocomplete="off" checked><i class="fa fa-search" aria-hidden="true"></i> File para el control de códigos

        </label>

        <label class="btn btn-secondary" onclick="redireccionar('productos')">

          <input type="radio" name="options" id="option2" autocomplete="off" > Stock de Productos

        </label>

        <label  class="btn btn-secondary"  onclick="redireccionar('servicesadm')">
          <input type="radio" name="options" id="option2" autocomplete="off" checked> Servicios
        </label>

      </div>

    </center>

    <ol class="breadcrumb">

      

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      

      <li class="active">File para el control de códigos</li>

    

    </ol>



  </section>



  <section class="content">



    <div class="box">



      <div class="box-header with-border">

  



      </div>



      <div class="box-body" >

         <?php 

                #CONSULT ULT PERS POR DNI Y TOMAMOS ID PERSONA    

                $query = "SELECT * FROM datos_maestros_productos where estado='1' ORDER BY nombre_producto";

                $result = $conexion->query($query);

                $cont=0; 

                    

                   # code...

                   while ($rowt=mysqli_fetch_row($result)){  

                         $cont=$cont+1;

                         $idar=$rowt[0];

                   



                    echo ' 

                        



                          

                            <script>

                              $(document).ready(function(){

                                   $("#'.$rowt[0].'").JsBarcode("HERLU '.$rowt[0].'07",{displayValue:true,fontSize:20});

                                     

                            });    

                            </script>

                            

                              <div class="col-xs-12 col-sm-6 col-md-4" style="border: 1px solid rgba(0,0,0,.05);">

                                <p class="letraNegra">PRODUCTO: <spam class="letraFlaca">'.$rowt[1].'</spam></p>                                

                                 <canvas title="Clic para descargar" onclick="download_image('.$rowt[0].')"    id="'.$rowt[0].'" ></canvas>

                                 <p class="letraNegra;" style="text-align: right; color: #dcdcdc ">Fecha de registro: <spam class="letraFlaca">'.$rowt[3].'</spam></p>

                              </div>

                            

                            

                          





                          



                        ';

                   }

           ?>

      </div>



    </div>



  </section>



</div>

<script type="text/javascript">

    // function PulsarTecla(event){     /*Acciones al persionar teclas*/switch (tecla = event.keyCode){case 33:location.href="datos-maestros-de-productos";break;case 36:location.href="almacenes";break;

    //   case 35:location.href="productos";break;case 34:location.href="productos";

    //     break;case 27:location.href="inicio";break;}}window.onkeydown=PulsarTecla;

</script>