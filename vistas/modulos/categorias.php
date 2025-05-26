<div class="content-wrapper">



  <section class="content-header">

    

    <h1>

      

      Inventario

    

    </h1>

    <center>

      <div class="btn-group btn-group btn-group-toggle shadow-lg" data-toggle="buttons" style="background: white;color: #0086d4; border-radius: 0px; font-weight: 800; border: 7px solid #1d23402e;">

        <label class="btn btn-secondary" onclick="redireccionar('almacenes')">

          <input type="radio" name="options" id="option1" autocomplete="off" > Almacenes

        </label>

        <label style="background: #1d2340;color: white !important" class="btn btn-secondary active" onclick="redireccionar('categorias')">

          <input type="radio" name="options" id="option2" autocomplete="off" checked><i class="fa fa-search" aria-hidden="true"></i>

 Categorías

        </label>

        <label class="btn btn-secondary" onclick="redireccionar('datos-maestros-de-productos')">

          <input type="radio" name="options" id="option2" autocomplete="off" > Datos maestros productos

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



    <ol class="breadcrumb">

      

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      

      <li class="active">Administrar categorías</li>

    

    </ol>



  </section>



  <section class="content">



    <div class="box">



      <div class="box-header with-border">

  

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">

          

          <i class="fa fa-chevron-right" aria-hidden="true"></i> Agregar categoría



        </button>



      </div>



      <div class="box-body table-responsive">

        

       <table class="table table-bordered table-striped dt-responsive tablas">

         

        <thead>

         

         <tr>

           

           <th style="width:10px">#</th>

           <th>Categoria</th>

           <th>Acciones</th>



         </tr> 



        </thead>



        <tbody>



        <?php



          $item = null;

          $valor = null;



          $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);



          foreach ($categorias as $key => $value) {

           

            echo ' <tr>



                    <td>'.($key+1).'</td>



                    <td class="text-uppercase">'.$value["categoria"].'</td>



                    <td>



                      <div class="btn-group">

                          

                        <button class="btn btn-warning btnEditarCategoria" idCategoria="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fa fa-pencil"></i></button>';



                        if($_SESSION["perfil"] == "Administrador"){



                          echo '<button class="btn btn-danger btnEliminarCategoria" idCategoria="'.$value["id"].'"><i class="fa fa-times"></i></button>';



                        } 



                      echo '</div>  



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

MODAL AGREGAR CATEGORÍA

======================================-->



<div id="modalAgregarCategoria" class="modal fade" role="dialog">

  

  <div class="modal-dialog">



    <div class="modal-content">



      <form role="form" method="post">



        <!--=====================================

        CABEZA DEL MODAL

        ======================================-->



        <div class="modal-header" style="background:#3c8dbc; color:white">



          <button type="button" class="close" data-dismiss="modal">&times;</button>



          <h4 class="modal-title">Agregar categoría</h4>



        </div>



        <!--=====================================

        CUERPO DEL MODAL

        ======================================-->



        <div class="modal-body">



          <div class="box-body">



            <!-- ENTRADA PARA EL NOMBRE -->

            

            <div class="form-group">

              

              <div class="input-group">

              

                <span class="input-group-addon"><i class="fa fa-th"></i></span> 



                <input type="text" class="form-control input-lg" name="nuevaCategoria" placeholder="Ingresar categoría" required>



              </div>



            </div>

  

          </div>



        </div>



        <!--=====================================

        PIE DEL MODAL

        ======================================-->



        <div class="modal-footer">



          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>



          <button type="submit" class="btn btn-primary">Guardar categoría</button>



        </div>



        <?php



          $crearCategoria = new ControladorCategorias();

          $crearCategoria -> ctrCrearCategoria();



        ?>



      </form>



    </div>



  </div>



</div>



<!--=====================================

MODAL EDITAR CATEGORÍA

======================================-->



<div id="modalEditarCategoria" class="modal fade" role="dialog">

  

  <div class="modal-dialog">



    <div class="modal-content">



      <form role="form" method="post">



        <!--=====================================

        CABEZA DEL MODAL

        ======================================-->



        <div class="modal-header" style="background:#3c8dbc; color:white">



          <button type="button" class="close" data-dismiss="modal">&times;</button>



          <h4 class="modal-title">Editar categoría</h4>



        </div>



        <!--=====================================

        CUERPO DEL MODAL

        ======================================-->



        <div class="modal-body">



          <div class="box-body">



            <!-- ENTRADA PARA EL NOMBRE -->

            

            <div class="form-group">

              

              <div class="input-group">

              

                <span class="input-group-addon"><i class="fa fa-th"></i></span> 



                <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria" required>



                 <input type="hidden"  name="idCategoria" id="idCategoria" required>



              </div>



            </div>

  

          </div>



        </div>



        <!--=====================================

        PIE DEL MODAL

        ======================================-->



        <div class="modal-footer">



          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>



          <button type="submit" class="btn btn-primary">Guardar cambios</button>



        </div>



      <?php



          $editarCategoria = new ControladorCategorias();

          $editarCategoria -> ctrEditarCategoria();



        ?> 



      </form>



    </div>



  </div>



</div>



<?php



  $borrarCategoria = new ControladorCategorias();

  $borrarCategoria -> ctrBorrarCategoria();



?>





<script>
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