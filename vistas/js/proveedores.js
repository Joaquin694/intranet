/*=============================================

EDITAR CLIENTE

=============================================*/




$(".tablas").on("click", ".btnEditarProveedor", function () {

  var idProveedor = $(this).attr("idProveedor");

  var datos = new FormData();

  datos.append("idProveedor", idProveedor);

  $.ajax({

    url: "ajax/proveedores.ajax.php",

    method: "POST",

    data: datos,

    cache: false,

    contentType: false,

    processData: false,

    dataType: "json",

    success: function (respuesta) {
      console.log(respuesta);

      $("#idProveedor").val(respuesta["proveedor_pk"]);

      $("#idfkpersona").val(respuesta["fk_persona"]);

      $("#editarrazonsocial").val(respuesta["razon_social"]);

      $("#editarruc").val(respuesta["ruc"]);



      $("#ideditarProveedor").val(respuesta["nombres"]);

      $("#editartipodocuident").val(respuesta["fk_tipo_documento"]);

      $("#editarnumidentidad").val(respuesta["num_documento"]);

      $("#editarnuevaDireccion").val(respuesta["direccion_prov"]);

      $("#editarnuevoTelefono").val(respuesta["telefono"]);

      $("#editarnuevoEmail").val(respuesta["email"]);

      // $("#categoriaDB").val(respuesta["categoria"]).on("change")
      $("#categoriaDB").val(respuesta.categoria).trigger("change");
      // $("#categoriaDB").val(respuesta["categoria"]).trigger("change");


      $("#UpcvDb").val(respuesta["cv"]);
      $("#UpmodalidadPago").val(respuesta["modalidad_pago"]);
      $("#Upmonto").val(respuesta["monto"]);
      $("#Uprubro").val(respuesta["rubro"]);
      

    }
  })

})

$("#agregar_proveedor_form").on("submit", function (e) {
  e.preventDefault();
  var form = document.getElementById('agregar_proveedor_form'); // Asegúrate de poner el ID de tu formulario aquí
  // var formData = new FormData(form);
  var formData = new FormData(this);
  formData.append('accionar', 'guardar')

  $.ajax({

    type: 'POST',
    url: 'controladores/proveedoresEditNew.controler.php',
    data: formData,
    processData: false,  // Evitar que jQuery transforme la data del `formData`
    contentType: false,
    success: function (resp) {
      console.log(resp);
      $("#newokedit").html(resp);

      // Limpiar campos si es necesario aquí
      // form.reset();
      window.location='proveedores';


    },
    error: function () {
      alert("Error en la carga del archivo");
    }
  });

  // return false;
});

// ENIANDO DATOS SIN REFRSH  
$("#actualizar_proveedor_form").on("submit", function(e){
  e.preventDefault();
  var form = document.getElementById('actualizar_proveedor_form');
  var formData = new FormData(form);
  $.ajax({

    type: 'POST',
    url: 'controladores/proveedoresEditNew.controler.php',
    data: formData,
    processData: false,
    contentType: false,
    success: function(resp){
      $("#okedit").html(resp);
      // form.reset();
      window.location='proveedores';
    },
    error: function(){
      alert("Error en la carga del archivo");
    }
  });
  
});
// $("#actualizar_proveedor_form").on("submit", fun)
// function enviarmetaedit() {


//   var ideditarProveedor = document.getElementById('ideditarProveedor').value;

//   var idProveedor = document.getElementById('idProveedor').value;

//   var idfkpersona = document.getElementById('idfkpersona').value;

//   var editartipodocuident = document.getElementById('editartipodocuident').value;

//   var editarnumidentidad = document.getElementById('editarnumidentidad').value;

//   var editarnuevoTelefono = document.getElementById('editarnuevoTelefono').value;

//   var editarnuevoEmail = document.getElementById('editarnuevoEmail').value;

//   var editarrazonsocial = document.getElementById('editarrazonsocial').value;

//   var editarruc = document.getElementById('editarruc').value;

//   var editarnuevaDireccion = document.getElementById('editarnuevaDireccion').value;

//   var accionar = document.getElementById('accionar').value;





//   var dataen =
//   {
//     ideditarProveedor: ideditarProveedor,
//     idProveedor: idProveedor,
//     idfkpersona: idfkpersona,
//     editartipodocuident: editartipodocuident,
//     editarnumidentidad: editarnumidentidad,
//     editarnuevoTelefono: editarnuevoTelefono,
//     editarnuevoEmail: editarnuevoEmail,
//     editarrazonsocial: editarrazonsocial,
//     editarruc: editarruc,
//     editarnuevaDireccion: editarnuevaDireccion,
//     accionar: accionar
//   };





//   $.ajax({

//     type: 'post',

//     url: 'controladores/proveedoresEditNew.controler.php',

//     data: dataen,

//     success: function (resp) {



//       $("#okedit").html(resp);

//     }

//   });

//   return false;

// }





/*=============================================

ELIMINAR CLIENTE

=============================================*/



$(".tablas").on("click", ".btnEliminarProveedor", function () {



  var idProveedor = $(this).attr("idProveedor");



  swal({

    title: '¿Está seguro de borrar el proveedor?',

    text: "¡Si no lo está puede cancelar la acción!",

    type: 'warning',

    showCancelButton: true,

    confirmButtonColor: '#3085d6',

    cancelButtonColor: '#d33',

    cancelButtonText: 'Cancelar',

    confirmButtonText: 'Si, borrar proveedor!'

  }).then((result) => {

    if (result.value) {



      window.location = "index.php?ruta=proveedores&idProveedor=" + idProveedor;

    }



  })



})