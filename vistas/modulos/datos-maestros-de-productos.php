

<script src="extensiones/bar_code_Abad/JsBarcode.all.min.js"></script>

<div class="content-wrapper">

  <section class="content-header">    

    <h1>      

      Inventario   

    </h1>

    <center>

      <div class="btn-group btn-group btn-group-toggle shadow-lg" data-toggle="buttons" style="background: white;color: #0086d4; border-radius: 0px; font-weight: 800; border: 7px solid #1d23402e;">

        <label class="btn btn-secondary " onclick="redireccionar('almacenes')">

          <input type="radio" name="options" id="option2" autocomplete="off" > Almacenes

        </label>

        <label  class="btn btn-secondary" onclick="redireccionar('categorias')">

          <input type="radio" name="options" id="option2" autocomplete="off" >

 Categorías

        </label>

        <label style="background: #1d2340;color: white !important" class="btn btn-secondary active" onclick="redireccionar('datos-maestros-de-productos')">

          <input type="radio" name="options" id="option2" autocomplete="off" checked><i class="fa fa-search" aria-hidden="true"></i> Datos maestros productos

        </label>

         <label class="btn btn-secondary" onclick="redireccionar('file-the-control-inventory')">

          <input type="radio" name="options" id="option2" autocomplete="off" > File para el control de códigos

        </label>

        <label class="btn btn-secondary" onclick="redireccionar('productos')">

          <input type="radio" name="options" id="option2" autocomplete="off" > Stock de Productos

        </label>

        <label  class="btn btn-secondary"  onclick="redireccionar('servicesadm')">
          <input type="radio" name="options" id="option2" autocomplete="off" checked> Servicios
        </label>

      </div>

    </center>

    <!-- CONSULTAR ENVIO DE FACTURAS VALOR 0 ? -->



    <ol class="breadcrumb">

      

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      

      <li class="active">Administrar datos maestros de productos</li>

    

    </ol>



  </section>



  <section class="content">



    <div class="box">



      <div class="box-header with-border">

  

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducts">

          

         <i class="fa fa-chevron-right" aria-hidden="true"></i> Agregar datos maestros de productos 



        </button>



      </div>



      <div class="box-body">

       <p id="alertdelete1"></p>

       <table class="table table-bordered table-striped dt-responsive tablas" style="width: 100% !important">

         

        <thead>

         

         <tr>

           

           <th style="width:10px">#</th>

           <th>Nombre producto</th>

           <th>Capacidad</th>

           <th><i data-toggle="tooltip" data-placement="right" title="Clic para generar el códigos de barra" onclick="redireccionar('refreshBarcode')" style="color: #08ff12" class="fa fa-gear" aria-hidden="true"></i>&nbsp; Código de barras &nbsp;<i data-toggle="tooltip" data-placement="right" title="Clic para generar el consolidado y ficha a imprimir de códigos de barra" onclick="redireccionar('file-the-control-inventory')" style="color: #89ff00" class="fa fa-book" aria-hidden="true"></i>
        
        </th>

           <th>Fecha de registro</th>

           <th>Acciones</th>



         </tr> 



        </thead>



        <tbody>

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

                          <tr>

                          <td>'.$cont.'</td>

                          <td>'.$rowt[1].'</td>

                          <td>'.$rowt[2].'</td>


                          <td>'.$rowt[5].'</td>
                          



                          <td>'.$rowt[3].'</td>

                          <td>



                            <div class="btn-group">

                                

                              <button onclick="mdlModalDat('.$idar.')" class="btn btn-warning" data-toggle="modal" data-target="#modalEditarProducts"><i class="fa fa-pencil"></i></button>

                              

                              <button style="display:none" onclick="mdlModalEliminDat('.$idar.')" class="btn btn-danger" ><i class="fa fa-times"></i></button>



                            </div>  



                          </td>



                        </tr>';

                   }

           ?>

          

         



          

        </tbody>



       </table>



      </div>



    </div>



  </section>



</div>



<!--=====================================

MODAL Agregar datos maestros de productos

======================================-->



<div id="modalAgregarProducts" class="modal fade" role="dialog">

  

  <div class="modal-dialog">



    <div class="modal-content">





        <!--=====================================

        CABEZA DEL MODAL

        ======================================-->



        <div class="modal-header" style="background:#3c8dbc; color:white">



          <button type="button" class="close" data-dismiss="modal">&times;</button>



          <h4 class="modal-title"><i class="fa fa-chevron-right" aria-hidden="true"></i> Agregar datos maestros de productos</h4>



        </div>



        <!--=====================================

        CUERPO DEL MODAL

        ======================================-->

      <form   method="POST" onsubmit="return sendFormProductosDm();" autocomplete="false" name="namefor"> 

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->            

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa fa-list-alt"></i></span> 

                <input type="text" class="form-control input-lg" id="nombre_producto_dm" name="nombre_producto_dm"  placeholder="Nombre de producto" required>

              </div>

            </div>



            <!-- ENTRADA PARA EL NOMBRE -->            

            <div class="form-group">
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-bars"></i></span> 
                  <!-- Campo autocompletable para unidad de medida -->
                  <input type="text" class="form-control input-lg" id="descripccion_dm" name="descripccion_dm" list="unidades-medida-productos" placeholder="Unidad de medida" required>
                  <datalist id="unidades-medida-productos">
                      <option value="Unidades" title="Para productos individuales como vehículos o herramientas específicas.">
                      <option value="Litros" title="Para líquidos como aceites y fluidos de vehículos.">
                      <option value="Kilogramos" title="Para cargas de peso, como ciertos insumos metálicos.">
                      <option value="Metros" title="Para artículos vendidos en longitud, como cables o mangueras.">
                      <option value="Juegos" title="Para sets de herramientas o kits de reparación.">
                      <option value="Pares" title="Para elementos que se venden en pares, como guantes o zapatos de seguridad.">
                      <option value="Cajas" title="Para agrupar pequeños componentes o accesorios, como tornillos o clavos.">
                      <option value="Baldes" title="Para productos que se venden en contenedores medianos, como pinturas o productos químicos.">
                      <option value="Barriles" title="Para grandes cantidades de líquidos o sustancias, como aceite industrial o químicos.">
                  </datalist>
                  <!-- Input oculto -->
                  <input type="hidden" name="SidmdpAccion" id="SidmdpAccion" value="guardar">
              </div>
          </div>


            <div  id="successSidmdp">

              <!-- nota alert -->

            </div> 

          </div>

        </div>



        <!--=====================================

        PIE DEL MODAL

        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar dato maestro de producto</button>

        </div>



      </form>



    </div>



  </div>



</div>





<!--=====================================

MODAL EDITAR datos maestros de productos

======================================-->



<div id="modalEditarProducts" class="modal fade" role="dialog">

  

  <div class="modal-dialog">



    <div class="modal-content">



      <form method="POST" onsubmit="return sendSaveEditionPDM();" autocomplete="false" name="frmAdmdp" id="frmAdmdp">



        <!--=====================================

        CABEZA DEL MODAL

        ======================================-->



        <div class="modal-header" style="background:#3c8dbc; color:white">



          <button type="button" class="close" data-dismiss="modal">&times;</button>



          <h4 class="modal-title">Agregar datos maestros de productos</h4>



        </div>



        <!--=====================================

        CUERPO DEL MODAL

        ======================================-->



        <div class="modal-body">

            <div class="modal-body">



          <div class="box-body" id="successSidmdpEdit">            

            <!-- -CUERPO DE FORM EDITANDO ESTA EN JS-- -->

          </div>

          <div id="alertaDmdp"></div>

        </div>

        </div>



        <!--=====================================

        PIE DEL MODAL

        ======================================-->



        <div class="modal-footer">



          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>



          <button type="submit" class="btn btn-primary">Guardar dato maestro de producto</button>



        </div>



      </form>



    </div>



  </div>



</div>

<script type="text/javascript">

// function PulsarTecla(event){     /*Acciones al persionar teclas*/switch (tecla = event.keyCode){case 33:

//         location.href="categorias";break;case 36:location.href="almacenes";

//         break;case 35:location.href="productos";break;case 34:location.href="file-the-control-inventory";break;case 27:location.href="inicio";break;}} 

// window.onkeydown=PulsarTecla;





//REFRESH TABLE ON CLIC al cerrar modal

function refreshtable(){

       location.reload();

       $('input[type="text"]').val('');   

}

$(".modal").on('hidden.bs.modal', function () {

       refreshtable()

});


//LIMPIADOR DE INPUT TEXT CON CARACTERES RAROS
document.addEventListener('blur', function(e) {
  // Verificar si el evento se disparó desde un input de tipo texto
  if (e.target.tagName === 'INPUT' && e.target.type === 'text') {
    console.log('CUIDADO, EL TEXTO ESCRITO DEBE CONTENER ÚNICAMENTE LETROS Y/O NÚMEROS');
    var texto = e.target.value.trim();
    texto = texto.replace(/\\/g, "");
    texto = texto.replace(/["']/g, function(match) {
      return '\\' + match;
    });
    e.target.value = texto;
  }
}, true); // El tercer argumento true indica que el evento se captura durante la fase de captura

</script>