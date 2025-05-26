<style type="text/css">
  .botontito{background:#63a03c !important; color: white !important;padding: 1px 3px !important; border-radius: 4px !important;}
</style>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.2.1/jquery.quicksearch.js"></script> -->
<div class="content-wrapper">



  <section class="content-header">



    <h1>



      Historial Laboratorio


    </h1>



    <ol class="breadcrumb">



      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>



      <li class="active">Administrar categorías</li>



    </ol>



  </section>



  <section class="content">



    <div class="box">



      <div class="box-header with-border">



        <button class="btn btn-primary" onclick="redireccionar('laboratoria')">



         <i class="fa fa-chevron-right" aria-hidden="true"></i> Recepcionar para laboratorio



       </button>



     </div>



     <div class="box-body">


      <ul class="nav nav-tabs">
        <!-- <li><a data-toggle="tab" href="#PA1"><b>PROCESAR</b></a></li> -->
        <li ><a onclick="cargarAnalisis('sianal','tabla_pendi')" data-toggle="tab"  href="#PA01">TODAS</a></li>
        <li><a onclick="cargarAnalisis('anasenso','tabla_analisis_sensorial')" data-toggle="tab"  href="#PA2">HIST. Análisis Sensorial</a></li>
        <li><a onclick="cargarAnalisis('anafisi','tabla_analisis_fisicos')" data-toggle="tab"  href="#PA3">HIST. Análisis Físico</a></li>
        <li><a onclick="cargarAnalisis('anasensoyfisi','tabla_analisis_senso_fisico')" data-toggle="tab"  href="#PA4">HIST. Análisis Sensorial y Físico</a></li>
      </ul>

      <div class="tab-content">
        <div id="PA1" class="tab-pane fade  text-center"> <br><br><br><br>
          <h1><b>Open the sheet</b></h1>
          <br>
          <center>
            <form action="laboratoriaupdate" method="POST">
              <div  style="width: 300px;display: flex;">
                <input required name="codigo_mp_o_ml" class="form-control input-lg" id="inputlg" type="text" style="width: 88%;font-size: 22px !important">
                <button type="submit" style="width: 12%;background: #333333; color: white; border-radius: 0px 9px 9px 0px"><i class="fa fa-angle-double-right fa-3x" aria-hidden="true"></i>
                </button>
              </div>
            </form>
          </center>
        </div>
        <div id="PA01" class="tab-pane fade ">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th  colspan="11">
                   <div class="input-group" style="float: left;width: 300px">
                    <input id="searchi" type="text" class="form-control" placeholder="Escribe para buscar...*" name="search" style="height: 33px;border-bottom:  1px solid black;background: #f4f4f4 !important;width: 360px">
                  </div>
                  <center><h5 style="font-size: 17px !important"> <span  id="sianal">0</span> PENDIENTES DE ANALIZAR </h5></center>
                </th>
              </tr>
              <tr>
                <th></th>
                <th style="width: 140px">CÓDIGO INTERNO</th>
                <th>ESTADO</th>
                <th>CORRELATIVO</th>
                <th>ORIGEN</th>
                <th>TIPO&nbsp;CAFÉ/ANÁLISIS</th>
                <th>FECHA RECEPCIÓN</th>
                <th>FECHA ANALISIS</th>
                <th>FECHA ENTREGA</th>
                <th>NUM. IDENTIDAD CLIENTE</th>
                <th>CLIENTE</th>
              </tr>
            </thead>
            <tbody id="tabla_pendi">
            </tbody>
          </table>
        </div>

      </div>
      <div id="PA2" class="tab-pane fade">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th  colspan="11">
                 <div class="input-group" style="float: left;width: 300px">
                  <input id="search" type="text" class="form-control" placeholder="Escribe para buscar..." name="search" style="height: 33px;border-bottom:  1px solid black;background: #f4f4f4 !important;width: 360px">
                </div>
                <center><h5 style="font-size: 17px !important"> <span  id="anasenso">0</span> ANÁLISIS SENSORIAL </h5></center>
              </th>
            </tr>
            <tr>
              <th></th>
              <th style="width: 140px">CÓDIGO INTERNO</th>
              <th>ESTADO</th>
              <th>CORRELATIVO</th>
              <th>ORIGEN</th>
              <th>TIPO</th>
              <th>FECHA RECEPCIÓN</th>
              <th>FECHA ANALISIS</th>
              <th>FECHA ENTREGA</th>
              <th>NUM. IDENTIDAD CLIENTE</th>
              <th>CLIENTE</th>
            </tr>
          </thead>
          <tbody id="tabla_analisis_sensorial">
          </tbody>
        </table>
      </div>

    </div>
    <div id="PA3" class="tab-pane fade">
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th  colspan="11">
               <div class="input-group" style="float: left;width: 300px">
                <input id="search" type="text" class="form-control" placeholder="Escribe para buscar..." name="search" style="height: 33px;border-bottom:  1px solid black;background: #f4f4f4 !important;width: 360px">
              </div>
              <center><h5 style="font-size: 17px !important"> <span  id="anafisi">0</span> ANÁLISIS FÍSICO </h5></center>
            </th>
          </tr>
          <tr>
            <th></th>
            <th style="width: 140px">CÓDIGO INTERNO</th>
            <th>ESTADO</th>
            <th>CORRELATIVO</th>
            <th>ORIGEN</th>
            <th>TIPO</th>
            <th>FECHA RECEPCIÓN</th>
            <th>FECHA ANALISIS</th>
            <th>FECHA ENTREGA</th>
            <th>NUM. IDENTIDAD CLIENTE</th>
            <th>CLIENTE</th>
          </tr>
        </thead>
        <tbody id="tabla_analisis_fisicos">
        </tbody>
      </table>
    </div>

  </div>
  <div id="PA4" class="tab-pane fade">
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th  colspan="11">
             <div class="input-group" style="float: left;width: 300px">
              <input id="search" type="text" class="form-control" placeholder="Escribe para buscar..." name="search" style="height: 33px;border-bottom:  1px solid black;background: #f4f4f4 !important;width: 360px">
            </div>
            <center><h5 style="font-size: 17px !important"> <span  id="anasensoyfisi">0</span> ANÁLISIS SENSORIAL Y FÍSICO </h5></center>
          </th>
        </tr>
        <tr>
          <th></th>
          <th style="width: 140px">CÓDIGO INTERNO</th>
          <th>ESTADO</th>
          <th>CORRELATIVO</th>
          <th>ORIGEN</th>
          <th>TIPO</th>
          <th>FECHA RECEPCIÓN</th>
          <th>FECHA ANALISIS</th>
          <th>FECHA ENTREGA</th>
          <th>NUM. IDENTIDAD CLIENTE</th>
          <th>CLIENTE</th>
        </tr>
      </thead>
      <tbody id="tabla_analisis_senso_fisico">
      </tbody>
    </table>
  </div>

</div>
</div>
</div>
</div>
</section>
</div>
<script type="text/javascript">
  


  function cargarAnalisis(any,main) {
    // body...
    var any  = any;
    var cod  = 'load_hist_labo';
    var dataen ='cod=' +cod+'&any='+any;

    $.ajax(
    {
      type: 'post',
      url:'controladores/histolaboratorio.controlador.php',
      data: dataen,
      success:function(resp){

        $('#'+main).html(resp);
      }
    });
    return false;
  }

  $(document).ready(function() {
  $('#searchi,#search').on('keyup', function() {
    var searchText = $(this).val().toLowerCase();
    $('#tabla_pendi tr,#tabla_analisis_sensorial tr, #tabla_analisis_fisicos tr, #tabla_analisis_senso_fisico tr').each(function() {
      var currentRow = $(this);
      var found = false;
      currentRow.find('td').each(function() {
        if ($(this).text().toLowerCase().indexOf(searchText) !== -1) {
          found = true;
          return false; // Sale del bucle interno cuando encuentra una coincidencia
        }
      });
      if (found) {
        currentRow.show();
      } else {
        currentRow.hide();
      }
    });
  });
});

</script>
