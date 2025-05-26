<script>

// NEW update USER

function senDita(nomElemnt,getId,nomAccion){     //Capturamos datos contenidos en id      

      var nomElemnt= nomElemnt;
      var getId= document.getElementById(getId).innerHTML;
      var accion=nomAccion;

      var dataen =        
                 {nomElemnt:nomElemnt,
                  getId:getId,
                  accion:accion};

      $.ajax({
        type: 'post',
        url:'modelos/tostado.modelo.php',
        data:dataen,

        success:function(resp){
            $("#request_idOjo").html(resp);
          }
      });

      return false;
}


//CONTROLADOR PARA ABRIR ACTUALIZAR FORMULARIO BPM
function actualizar(idGetValor){
  var idGetValor= idGetValor;
      
      document.getElementById('idEditBPMTitle').innerHTML = "<i class='fa fa-coffee' aria-hidden='true'></i> Procesamiento de tostado";  
      
      var accion='actualizar';

      var dataen =
      'idGetValor=' +idGetValor+
      '&accion='+accion;

      $.ajax({
              type: 'post',
              url: 'modelos/tostado.modelo.php',
              data:dataen,
              success:function(resp){
                  $("#actualizarContenidoBpm").html(resp);
              }
      });
      return false;
      
  }








</script>