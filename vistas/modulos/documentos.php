<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<style>
   body {
      background: #DCDCDC;
   }

   .card-box {
      padding: 20px;
      border-radius: 3px;
      margin-bottom: 30px;
      background-color: #fff;
   }

   .file-man-box {
      padding: 20px;
      border: 1px solid #e3eaef;
      border-radius: 5px;
      position: relative;
      margin-bottom: 20px;
   }

   .file-man-box .file-close {
      color: #f1556c;
      position: absolute;
      line-height: 24px;
      font-size: 24px;
      right: 10px;
      top: 10px;
      visibility: hidden;
   }

   .file-man-box .file-img-box {
      line-height: 120px;
      text-align: center;
   }

   .file-man-box .file-img-box img {
      height: 64px;
   }

   .file-man-box .file-download {
      font-size: 32px;
      color: #98a6ad;
      position: absolute;
      right: 10px;
   }

   .file-man-box .file-download:hover {
      color: #313a46;
   }

   .file-man-box .file-man-title {
      padding-right: 25px;
   }

   .file-man-box:hover {
      -webkit-box-shadow: 0 0 24px 0 rgba(0, 0, 0, .06), 0 1px 0 0 rgba(0, 0, 0, .02);
      box-shadow: 0 0 24px 0 rgba(0, 0, 0, .06), 0 1px 0 0 rgba(0, 0, 0, .02);
   }

   .file-man-box:hover .file-close {
      visibility: visible;
   }

   .text-overflow {
      text-overflow: ellipsis;
      white-space: nowrap;
      display: block;
      width: 100%;
      overflow: hidden;
   }

   h5 {
      font-size: 15px;
   }

   .main-footer {
      display: none !important;
   }

   .url-copy {
    position: relative;
    cursor: pointer;
    color: #007bff;
    text-decoration: underline;
}

.url-copy:hover {
    color: #0056b3;
}

.copy-notification {
    display: none;
    position: absolute;
    bottom: 0;
    right: 0;
    background-color: #28a745;
    color: white;
    padding: 5px;
    border-radius: 3px;
    font-size: 12px;
}



</style>
<div class="content">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <div class="card-box">
               <div class="row">
                  <div class="col-lg-6 col-xl-6">
                     <h4 class="header-title m-b-30">Mis Documentos</h4>
                  </div>
               </div>
               <?php
               require_once "controladores/ftp.controlador.php";
               require_once "modelos/ftp.modelo.php";
               $ControladorFtp = new ControladorFtp();
               ?>

               <div class="row">
                  <div class="col-lg-12 col-xl-12">
                     <br>
                  </div>
                  <div class="col-lg-4 col-xl-4 text-right">
                     <button class="btn btn-primary" data-toggle="modal" data-target="#uploadModal">Cargar
                        Documento</button>
                  </div>
                  <div class="col-lg-8 col-xl-8 text-right">
                     <input type="text" id="searchFiles" class="form-control" placeholder="Buscar">
                  </div>
                  <div class="col-lg-12 col-xl-12">
                     <hr><br>
                  </div>
               </div>
               <div id="files-container" class="row">
                  <!-- Aquí se cargarán los archivos -->
               </div>
               <div class="text-center mt-3">
                  <button type="button" class="btn btn-outline-danger w-md waves-effect waves-light"><i
                        class="mdi mdi-refresh"></i> Load More Files</button>
               </div>
            </div>
         </div>
         <!-- end col -->
      </div>
      <!-- end row -->
   </div>
   <!-- container -->
</div>

<!-- Modal para cargar archivo -->
<div id="uploadModal" class="modal fade" role="dialog">
   <div class="modal-dialog modal-lg">
      <!-- Contenido del modal -->
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Cargar Archivo PDF</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body">
            <form id="uploadForm" method="POST" enctype="multipart/form-data">
               <div class="form-group">
                  <label for="fileName">Nombre del archivo:</label>
                  <input type="text" class="form-control" id="fileName" name="fileName" required>
               </div>
               <div class="form-group">
                  <label for="fileUpload">Seleccionar archivo:</label>
                  <input type="file" class="form-control-file" id="fileUpload" name="fileUpload" accept=".pdf" required>
               </div>
               <button type="submit" class="btn btn-primary">Cargar</button>
               <div id="uploadError" style="color: red; display: none;">El nombre del archivo ya existe. Por favor,
                  elige otro nombre.</div>
               <?php
               $ControladorFtp->ctrCrearFtp($_POST);
               ?>
            </form>
         </div>
      </div>
   </div>
</div>
<div id="ActualizarModal" class="modal fade" role="dialog">
   <div class="modal-dialog modal-lg">
      <!-- Contenido del modal -->
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Cargar Archivo PDF</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body">
            <form id="ActualizarForm" method="POST" enctype="multipart/form-data">
               <div class="form-group">
                  <label for="ActualizarFileName">Nombre del archivo:</label>
                  <input type="text" class="form-control" id="ActualizarFileName" name="ActualizarFileName" required>
                  <input type="hidden" id="idFtp" name="idFtp">
                  <input type="hidden" id="nameDb" name="nameDb">
               </div>
               <div class="form-group">
                  <label for="fileActualizar">Seleccionar archivo:</label>
                  <input type="file" class="form-control-file" id="fileActualizar" name="fileActualizar" accept=".pdf">
                  <input type="hidden" id="fileActualizarDb" name="fileActualizarDb">
               </div>
               <button type="submit" class="btn btn-primary">Cargar</button>
               <div id="uploadError" style="color: red; display: none;">El nombre del archivo ya existe. Por favor,
                  elige otro nombre.</div>
               <?php
               if(isset($_POST['idFtp'])&& !empty($_POST['idFtp'])){
                  $ControladorFtp->ctrActualizarFtp($_POST);
               }
               ?>
            </form>
         </div>
      </div>
   </div>
</div>


<script>
   let list = [];
   $(document).ready(function () {
      cargarDatos();

      // Validar nombre del archivo antes de la carga
      $("#uploadForm").submit(function (event) {
         if (!validarNombre()) {
            event.preventDefault();
            $("#uploadError").show();
         } else {
            $("#uploadError").hide();
         }
      });

      // Manejar evento de eliminar documento
      $(document).on('click', '.btnEliminarDocumento', function () {
         var idA = $(this).data('id');
         var ruta = $(this).data('ruta');
         var confirmar = confirm("¿Estás seguro de que quieres eliminar este documento?");
         if (confirmar) {
            var datos = new FormData();
            datos.append("idEliminar", idA);
            datos.append("rutaEliminar", ruta);
            datos.append("ajaxservice", 'eliminar');

            $.ajax({
               url: "modelos/ftp.modelo.php",
               method: "POST",
               data: datos,
               cache: false,
               contentType: false,
               processData: false,
               dataType: "json",
               success: function (respuesta) {
                  if (respuesta == "ok") {
                     alert("Documento eliminado correctamente");
                     cargarDatos();
                  } else {
                     alert("Error al eliminar el documento. Por favor, inténtalo de nuevo.");
                  }
               }
            });
         }
      });

      // Filtrar archivos por nombre
      $('#searchFiles').on('keyup', function () {
         var searchTerm = $(this).val().toLowerCase();
         $('.file-man-box').each(function () {
            var fileName = $(this).find('.file-man-title h5').text().toLowerCase();
            $(this).toggle(fileName.includes(searchTerm));
         });
      });

      // Manejar evento de clic en la imagen para abrir el archivo en una nueva pestaña
      $(document).on('click', '.file-img-box img', function () {
         var ruta = $(this).closest('.file-man-box').find('.file-download').attr('href');
         window.open(ruta, '_blank');
      });
   });
   function cargarDatos() {
      $.ajax({
         url: "modelos/ftp.modelo.php",
         method: "POST",
         data: { ajaxservice: 'loadData' },
         dataType: "json",
         success: function (respuesta) {
            var container = $("#files-container");
            container.empty(); // Limpiar los elementos anteriores
            list = []; // Limpiar la lista de nombres
            $.each(respuesta, function (index, registro) {
               var fileBox = `
                     <div class="col-lg-4 col-xl-3">
                        <div class="file-man-box">
                           <a href="javascript:void(0)" class="file-close btnEliminarDocumento" data-id="${registro.id}" data-ruta="${registro.ruta}"><i class="fa fa-times-circle"></i></a>
                           <div class="file-img-box">
                              <img src="https://images.vexels.com/media/users/3/142874/isolated/lists/7db99d46d3568fe5b985e529b133cddb-icono-de-lupa-de-ojo.png" alt="icon">
                           </div>
                           <a href="${registro.ruta}" download class="file-download"><i class="fa fa-download"></i></a>
                           <div class="file-man-title" data-id="${registro.id}">
                              <h5 class="mb-0 text-overflow" data-id="${registro.id}">${registro.name}</h5>
                              <p class="mb-0 url-copy"><small>https://localhost/intranet/${registro.ruta}</small></p>
                              <span class="copy-notification" id="copyNotification-${registro.id}">¡Copiado!</span>
                          </div>
                        </div>
                     </div>
                  `;
               container.append(fileBox);
               list.push(registro.name);
            });
         },
         error: function () {
            alert("Error cargando datos.");
         }
      });
   }

   function validarNombre() {
      var fileName = $("#fileName").val();
      return !list.includes(fileName);
   }
   $(document).on('click', '.file-man-title h5', function () {
      var idA = $(this).data('id');
      console.log(idA);
      var datos = new FormData();
      datos.append("idaa", idA);
      datos.append("ajaxservice", 'loadEdit');
      $("#idFtp").val($(this).data('id'));
      $.ajax({
         url: "modelos/ftp.modelo.php",
         method: "POST",
         data: datos,
         cache: false,
         contentType: false,
         processData: false,
         dataType: "json",
         success: function (item) {
            var name = item.name;
            
            $("#idFtp").val(item.id);
            $("#nameDb").val(name);
            $("#ActualizarFileName").val(name);
            $("#fileActualizarDb").val(item.ruta);
            $("#ActualizarModal").modal('show');
         }
      })
   });

   $(document).on('click', '.url-copy', function () {
        var urlText = $(this).text();
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val(urlText).select();
        document.execCommand("copy");
        $temp.remove();

        var notificationId = $(this).siblings('.copy-notification').attr('id');
        $('#' + notificationId).fadeIn(200).delay(1000).fadeOut(200);
    });
</script>
