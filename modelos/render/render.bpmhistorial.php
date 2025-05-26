<style type="text/css">

      /*GENERICOS*/

      .centrate

      {

        text-align: center !important;

        justify-content: centrate !important;

      }

      .bordeDI{

        border-left: 1px solid #c3c3c3;

        border-right: 1px solid #c3c3c3;

      }

      .letra11{font-size: 11px;}.letra12{font-size: 12px;}.letra13{font-size: 13px;}

      .{font-size: 15px;}.letra16{font-size: 16px;}

      .rayavertical{width: 250px; border-top: 1px solid #c3c3c3}

      /*---------------------------------------*/

      #titulof1

            {

                  font-size: 23px;

            }

                .{font-size: 15px;}.letra16{font-size: 16px;}

      #titulof1>span

            {

                  font-weight: 900;

            }

      .has-feedback,.has-feedback>input

            {

                  color: #2d462e; font-weight: 700;

            }

      .bolitarayaderecha{background: white;border-radius: 10px 0px 0px 10px;color: #528035;padding: 0px;padding-left: 8px;padding-left: 8px; }

      /*==========================================================================*/

      /* On screens that are 992px wide or less, the background color is blue */

      @media screen and (max-width: 992px) {

            #logo

            {

                  width: 150px;

            }

            #titulof1

            {

                  font-size: 18px;

            }

      }



      /* On screens that are 600px wide or less, the background color is olive */

      @media screen and (max-width: 600px) {

            #logo

            {

                  width: 85px;

            }

            #titulof1

            {

                  font-size: 12px;

            }

            .letra14,.letra16

            {

              font-size: 9px;

            }

            .has-feedback,.has-feedback>input

            {

                  color: #2d462e; font-weight: 100;font-size: 10px;

            }

      }

</style>
<?php $getId = $idGetValor;?>
                  <style type="text/css">
                    .icoMano>td>input,.icoMano>td>select{width: 100% !important;border: 1px solid white !important;height: 20px !important;padding: 1px !important}
                    .borderojo{border: 1px solid red !important}

                  </style>

                  <form id="idNewBPM" method="POST" onsubmit="return updatadinsert(<?php echo $pk_bpm ?>);" autocomplete="off">
                        <input class="auto" type="text" onclick="updatadinsert(<?php echo $pk_bpm ?>)" value="<?php echo $pk_bpm ?>" id="idbpm" style='display:none'>
                        <div class="box container" id="ficha1" >

                        <div class="row" style="padding: 0px 10px">
                              <div class="col-xs-12">
                                    <i  style="border: 1px solid #c3c3c3;padding: 2px 4px; color: #ffc107"  data-toggle="tooltip" data-placement="top" title="Estado del documento" class="fa fa-circle navbar-right icoMano" aria-hidden="true"></i>
                                    <i  style="border: 1px solid #c3c3c3;padding: 2px 4px; color: #777"  data-toggle="tooltip" data-placement="top" title="Reportes e indicadores" class="viewspinerloading fa fa-bar-chart navbar-right icoMano" aria-hidden="true"> Reportes</i>
                                    <i onclick="redireccionar('tostado')" style="border: 1px solid #c3c3c3;padding: 2px 4px; color: #777"  data-toggle="tooltip" data-placement="top" title="Crear" class="viewspinerloading fa fa-plus-square-o navbar-right icoMano" aria-hidden="true"> Crear</i>
                                    <i onclick="redireccionar('bpmhistorial')" style="border: 1px solid #c3c3c3;padding: 2px 4px; color: #777"  data-toggle="tooltip" data-placement="top" title="Ver Histórico"  class="viewspinerloading fa fa-search navbar-right icoMano" aria-hidden="true" > Buscar</i>
                              </div>
                              <div class="col-xs-4 centrate">
                                    <img id="logo" src="vistas/img/plantilla/A1logoMoali.png"  >
                              </div>
                              <div class="col-xs-4 centrate bordeDI">
                                    <h4><span id="titulo">MANUAL DE BPM </span><br><span id="subtitulo">RECEPCIÓN DE MATERIA PRIMA</span></h4>
                              </div>
                              <div class="col-xs-4 letra14" >
                                    <b>Código:</b> <span id="codigo">LM-BPM-R-02</span><br>
                                    <!-- -------------------------------------------------- -->
                                    <b>Aprobado por:</b><span id="aprobado_por"> RODAS MOALI, ALEX</span><br>
                                    <!-- -------------------------------------------------- -->
                                    <b>Fecha: </b>
                                    <span id="fecha_registro_documento"><?php echo $fecha_registro_documento; ?></span><br>
                                    <!-- -------------------------------------------------- -->
                                    <b>Página:</b> <span id="pagina"><?php echo $correlativo; ?></span><br>
                              </div>
                        </div>
                        <!-- -------------------------------------------------- -->
                        <!-- SUBCABEZA VERDE -->
                        <!-- -------------------------------------------------- -->
                        <div class="row  letra16" style="padding: 2px 10px; background: #528035;color: white">
                              <div class="col-xs-4 centrate">
                                    <b>LOTE </b>MP-<span id="idLoteA"><?php echo $lote; ?></span>
                              </div>
                              <!-- -------------------------------------------------- -->
                              <div class="col-xs-4 centrate" >
                                    <b>RBPM </b>N°1
                              </div>
                              <!-- -------------------------------------------------- -->
                              <div class="col-xs-4 centrate" >
                                    <b class="bolitarayaderecha" style="background: #528035;border: 1px solid white;color: white">Ficha 1 </b><a style="color: #528035;font-weight: 900;border: 1px solid white;border-radius: 0px 50px 50px 0px;padding-left: 6px;padding-right: 6px;background: white" href="#ficha2"> <i class="fa fa-hand-o-down" aria-hidden="true"></i>
                              </a>
                              </div>
                        </div>
                        <!-- -------------------------------------------------- -->
                        <!-- CUERPO -->
                        <!-- -------------------------------------------------- -->
                        <div class="row" style="padding: 17px 10px">
                              <div class="col-xs-12 col-sm-4 col-md-3 ">
                              <div class="form-group has-feedback">
                                    <label >Fecha de recepción: </label>
                                    <input type="text" value="<?php echo $correlativo; ?>" style="display: none;" id='newBpmCorrelativoA'>
                                    <input id="fechaReceA"  type="date" name="1fecha" class="form-control letraFlaca" value="<?php echo $fecha_atencion; ?>">
                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                              </div>
                              </div>
                              <!-- -------------------------------------------------- -->
                              <div class="col-xs-12 col-sm-4 col-md-3 ">
                                    <div class="form-group has-feedback" >
                                          <label >Nombre del cliente:</label>
                                          <input id="nombClieA" type="text" name="1nombrecliente" class="form-control letraFlaca" disabled value="<?php echo $nombre_cliente; ?>">
                                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    </div>
                              </div>
                              <!-- -------------------------------------------------- -->
                              <div class="col-xs-12 col-sm-4 col-md-3 ">
                                    <div class="form-group has-feedback" >
                                          <label >Nombre de quien recibe:</label>
                                          <input id="nombReciA" type="text" name="1quienrecibe" class="form-control letraFlaca" value="<?php echo $_SESSION["nombre"]; ?>"  disabled>
                                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    </div>
                              </div>
                              <!-- -------------------------------------------------- -->

                              <div class="col-xs-12 col-sm-4 col-md-3" >
                                    <div class="form-group has-feedback" >
                                          <label >Tipo de café:</label>
                                          <select id="tipoCafeA" class="form-control letraFlaca" name="1cafe" required  disabled>
                                          <option value="" disabled="" selected="">Seleccione un tipo</option>
                                          <option value="Café Pergamino">Café Pergamino</option>
                                          <option value="Café Oro">Café Oro</option>
                                          <option value="Café Tostado">Café Tostado</option>
                                          <option value="Café Natural">Café Natural</option>
                                          </select>
                                          <span class="glyphicon glyphicon-shopping-cart form-control-feedback"></span>
                                    </div>
                              </div>
                              <!-- -------------------------------------------------- -->
                              <div class="col-xs-12 col-sm-4 col-md-3 ">
                                    <div class="form-group has-feedback" >
                                          <label >Presencia de materia extraña:</label>
                                          <input id="presMateExtrA" type="text" name="1materiaextrana" class="form-control letraFlaca" value="<?php echo $materia_extraña; ?>">
                                          <span class="glyphicon glyphicon-alert form-control-feedback"></span>
                                    </div>
                              </div>
                              <!-- -------------------------------------------------- -->
                              <div class="col-xs-12 col-sm-4 col-md-3 ">
                                    <div class="form-group has-feedback" >
                                          <label >Plagas enfermedades:</label>
                                          <input id="plagEnfeA" value="<?php echo $plagas_enfermedades; ?>" type="text" name="1materiaextrana" class="form-control letraFlaca" >
                                          <span class="glyphicon glyphicon-alert form-control-feedback"></span>
                                    </div>
                              </div>
                              <!-- -------------------------------------------------- -->
                              <div class="col-xs-12 col-sm-4 col-md-3 ">
                                    <div class="form-group has-feedback" >
                                          <label >Lugar de Procedencia:</label>
                                          <input id="lugaProcA" type="text" name="1procedencia" class="form-control letraFlaca" autocomplete="on" value="<?php echo $lugar_procedencia; ?>"  disabled>
                                          <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
                                    </div>
                              </div>
                              <!-- -------------------------------------------------- -->
                              <div class="col-xs-12 col-sm-4 col-md-3 ">
                                    <div class="form-group has-feedback" >
                                          <label >Peso:</label>
                                          <input disabled id="pesoA" onkeyup="inpEsp('pesoA','idCantProdA')"   type='number' step='any' max='9999999' min='0' placeholder='Ingrese la cantidad' style='background: #eee; text-align: left;' class='form-control' value="<?php echo $peso; ?>">
                                          <span class="form-control-feedback"><b>Kg.</b></span>
                                    </div>
                              </div>
                              <!-- -------------------------------------------------- -->
                              <div class="col-xs-12 col-sm-4 col-md-3 ">
                                    <div class="form-group has-feedback" >
                                          <label >Presentación:</label>
                                          <select id="presenA"  class="form-control letraFlaca" name="1cafe" required>
                                          <option value="Bolsa">Bolsa</option>
                                          <option value="Saco">Saco</option>
                                          <option value="Yute">Yute</option>
                                          <option value="Otros">Otros</option>
                                          </select>
                                          <span class="glyphicon glyphicon-oil  form-control-feedback"></span>
                                    </div>
                              </div>
                              <!-- -------------------------------------------------- -->
                              <div class="col-xs-12 col-sm-4 col-md-3 ">
                                    <div class="form-group has-feedback" >
                                          <label >Variedad/Altitud:</label>
                                          <input id="newBpmVariedadAltitud"
                                           type="text" name="1altitud" class="form-control letraFlaca" autocomplete="on"
                                           value="<?php echo $variedad; ?>" required>
                                          <span class="glyphicon glyphicon-indent-left form-control-feedback"></span>
                                    </div>
                              </div>
                              <!-- -------------------------------------------------- -->
                              <div class="col-xs-12 col-sm-4 col-md-3 ">
                                    <div class="form-group has-feedback" >
                                          <label >Condicion de transporte:</label>
                                          <input id="condTranA" value="<?php echo $condicion_de_transporte; ?>" type="text" name="1altitud" class="form-control letraFlaca" autocomplete="on" required>
                                          <span class="glyphicon glyphicon-plane form-control-feedback"></span>
                                    </div>
                              </div>
                              <!-- -------------------------------------------------- -->
                              <div class="col-xs-12 col-sm-4 col-md-3 ">
                                    <div class="form-group has-feedback" >
                                          <label >Envases:</label>
                                          <select id="envaA"  class="form-control letraFlaca" name="1cafe" required>
                                          <!-- <option value="" disabled="" selected="">Seleccione un tipo</option> -->
                                          <option selected value="Limpio">Limpio</option>
                                          <option value="Hermético">Hermético</option>
                                          <option value="Íntegro">Íntegro</option>
                                          </select>
                                          <span class="glyphicon glyphicon-oil  form-control-feedback"></span>
                                    </div>
                              </div>
                              <!-- -------------------------------------------------- -->
                              <div class="col-xs-12 col-sm-4 col-md-3 centrate">
                                    <div class="form-group has-feedback" style="border-radius: 20px; border: 1px solid #c3c3c3">
                                          <div class="radio" id="">
                                                <label>
                                                <input class="Si" type="radio" value="Si" id="rdbtTipoCertA" name="rdbtTipoCertA"  >
                                                Con Certificación (Orgánica)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </label>
                                                <!-- ---------------------------------- -->
                                                <label>
                                                <input class="No" type="radio" value="No" id="rdbtTipoCertA" name="rdbtTipoCertA" checked="checked">
                                                Sin Certificación (Convencional)
                                                </label>
                                          </div>
                                    </div>
                              </div>
                              <!-- -------------------------------------------------- -->
                              <div class="col-xs-12 col-sm-4 col-md-3 ">
                                    <div class="form-group has-feedback" >
                                          <label >Fecha de entrega:</label>
                                          <input  value="<?php echo date("Y-m-d", strtotime($fecha_entrega));
echo 'T';
echo date("H:i", strtotime($fecha_entrega)); ?>"  id="fechEntrA"   style="color: red; font-weight: 700" type="datetime-local" name="1fechaentrega" class="form-control letraFlaca" required>
                                          <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                    </div>
                              </div>
                              <!-- -------------------------------------------------- -->
                              <div class="col-xs-12 col-sm-4 col-md-3 ">
                                    <div class="form-group has-feedback" >
                                          <label >Humedad:</label>
                                          <input id="humeA" type="text" name="1humedad" class="form-control letraFlaca borderojo" autocomplete="on" value="<?php echo $humedad; ?>"  required>
                                          <span class="glyphicon glyphicon-tasks form-control-feedback"></span>
                                    </div>
                              </div>
                              <!-- -------------------------------------------------- -->
                              <div class="col-xs-12 col-sm-4 col-md-3">
                                    <div class="form-group has-feedback" style="border-radius: 20px; border: 1px solid #c3c3c3">
                                    <div class="radio">
                                          <label><b>Conclusión:</b></label><br>
                                          <center>
                                          <div id="">
                                                <label>
                                                <input class="concluSi concluAceptado" type="radio" value="Aceptado" name="conclusionA" >
                                                      Aceptado
                                                </label> &nbsp;&nbsp;|&nbsp;&nbsp;
                                                <label>
                                                <input class="concluNo concluRechazado" type="radio" value="Rechazado" name="conclusionA" >
                                                      Rechazado
                                                </label>
                                          </div>
                                          </center>
                                    </div>
                                    </div>
                              </div>
                              <!-- -------------------------------------------------- -->
                              <div class="col-xs-12 col-sm-12 col-md-12 ">
                                    <div class="form-group has-feedback" >
                                          <label class="lablgnrl">Observaciones</label>
                                          <textarea id="observacionesF1A" type="text" name="1observaciones" class="form-control letraFlaca" rows="1"><?php echo $observaciones; ?></textarea>
                                          <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                                    </div>
                              </div>
                              <!-- -------------------------------------------------- -->
                              <div class="col-xs-12 col-sm-6 col-md-6 centrate">
                                    <div class="form-group has-feedback " >
                                          <img src="vistas/img/firmas/liz.png" style="width: 170px">
                                          <center><div class="rayavertical"></div></center>
                                          <span id="ejecutor_asistente">Ejecutor asistente de planta</span>
                                    </div>
                              </div>
                              <!-- -------------------------------------------------- -->
                              <div class="col-xs-12 col-sm-6 col-md-6 centrate">
                                    <div class="form-group has-feedback " >
                                          <img src="vistas/img/firmas/liz.png" style="width: 170px">
                                          <center><div class="rayavertical"></div></center>
                                          <span id="jefe_planta">Jefe de planta</span>
                                    </div>
                              </div>
                              <input type="text" name="doc_identidad" class="hidden">
                              <input type="text" name="cod_maquina" class="hidden">
                        </div>
                        </div>
                        <!-- ===========================================================================
                        ======================  FICHA 2 >>>>>>>>>>>    =================================
                        ============================================================================== -->
                        <div class="box container" id="ficha2" >
                              <div class="row" style="padding: 17px 10px">
                                    <div class="col-xs-4 centrate">
                                          <img id="logo" src="vistas/img/plantilla/A1logoMoali.png"  >
                                    </div>
                                    <div class="col-xs-4 centrate bordeDI">
                                          <h4 ><span id="titulof1">MANUAL DE BPM</span> <br><span id="subtitulo_rbpm2">ORDEN DE PROCESO</span></h4>
                                    </div>
                                    <div class="col-xs-4 letra14" >
                                          <b>Código:</b> <span id="codigo_rbpm2">LM-BPM-02A</span><br>
                                          <!-- -------------------------------------------------- -->
                                          <b>Aprobado por:</b> <span id="aprobado_por_rbpm2">RODAS MOALI, ALEX</span><br>
                                          <!-- -------------------------------------------------- -->
                                          <b>Fecha: </b>
                                          <span id="fecha_registro_documento_rbpm2"><?php echo $fecha_registro_documento; ?></span><br>
                                          <!-- -------------------------------------------------- -->
                                          <b>Página:</b> <span id="pagina_rbpm2"><?php echo $correlativo; ?></span><br>
                                    </div>
                              </div>
                              <!-- -------------------------------------------------- -->
                              <!-- SUBCABEZA VERDE -->
                              <!-- -------------------------------------------------- -->
                              <div class="row  letra16" style="padding: 2px 10px; background: #a51c0b!important;color: white">
                                    <div class="col-xs-4 centrate" >
                                          <b>LOTE </b>PT-<span id="lote_rbpm2"><?php echo $lote; ?>
                                          </span>
                                    </div>
                                    <!-- -------------------------------------------------- -->
                                    <div class="col-xs-4 centrate" >
                                          <b>RBPM </b>N°2
                                    </div>
                                    <!-- -------------------------------------------------- -->
                                    <div class="col-xs-4 centrate" >
                                          <b class="bolitarayaderecha" style="border: 1px solid white">Ficha 2</b><a style="color: white;font-weight: 900;border: 1px solid white;border-radius: 0px 50px 50px 0px;padding-left: 6px;padding-right: 6px" href="#ficha1"> <i class="fa  fa-hand-o-up fa-1x" aria-hidden="true"></i>
                                          </a>
                                    </div>
                              </div>
                              <!-- -------------------------------------------------- -->
                              <!-- CUERPO -->
                              <!-- -------------------------------------------------- -->
                              <div class="row" style="padding: 17px 10px">
                                    <div class="col-xs-12 col-sm-4 col-md-3 ">
                                          <div class="form-group has-feedback">
                                                <label class="lablgnrl">Nombre del solicitante:</label>
                                                <input type="text" name="Fch2nombrecliente" class="form-control letraFlaca" value="<?php echo $nombre_cliente; ?>" disabled>
                                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                          </div>
                                    </div>
                                    <!-- -------------------------------------------------- -->
                                    <div class="col-xs-12 col-sm-4 col-md-3 ">
                                          <div class="form-group has-feedback" >
                                                <label class="lablgnrl">RUC/DNI:</label>
                                                <input value="<?php echo $doc_identidad; ?>" type="text" id="Fch2rucdni" class="form-control letraFlaca"  disabled>
                                                <span class="glyphicon glyphicon-list-alt form-control-feedback"></span>
                                          </div>
                                    </div>
                                    <!-- -------------------------------------------------- -->
                                    <div class="col-xs-12 col-sm-4 col-md-3 ">
                                          <div class="form-group has-feedback" >
                                                <label class="lablgnrl">Codigo de materia prima:</label>
                                                <input id="codmatpri" type="text" name="Fch2codigomateriaprima" class="form-control letraFlaca" value="<?php echo $correlativo; ?>" disabled >
                                                <span class="form-control-feedback">Cod.</span>
                                          </div>
                                    </div>
                                    <!-- -------------------------------------------------- -->
                                    <div class="col-xs-12 col-sm-4 col-md-3 ">
                                          <div class="form-group has-feedback" >
                                                <label class="lablgnrl">Teléfono del cliente:</label>
                                                <input value="<?php echo $Fch2telefonocliente; ?>" type="text" id="Fch2telefonocliente" name="Fch2telefonocliente" class="form-control letraFlaca" disabled>
                                                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                                          </div>
                                    </div>
                                    <!-- -------------------------------------------------- -->
                                    <div class="col-xs-12 col-sm-4 col-md-3 ">
                                          <div class="form-group has-feedback" >
                                                <label class="lablgnrl">Cantidad del producto:</label>
                                                <input id="idCantProdA" type="text" name="Fch2cantidadpro" class="form-control letraFlaca"  value="<?php echo $idCantProdA; ?>" disabled>
                                                <span class="form-control-feedback"><b>Kg.</b></span>
                                          </div>
                                    </div>
                                    <!-- -------------------------------------------------- -->
                                    <div class="col-xs-12 col-sm-4 col-md-3 ">
                                          <div class="form-group has-feedback" >
                                                <label class="lablgnrl">Correo electrónico:</label>
                                                <input value='<?php echo $Fch2correo; ?>' type="email" id="Fch2correo" name="Fch2correo" class="form-control letraFlaca"  disabled>
                                                <span class="form-control-feedback">@</span>
                                          </div>
                                    </div>
                                    <!-- -------------------------------------------------- -->
                                    <div class="col-xs-12 col-sm-8 col-md-6 ">
                                          <div class="form-group has-feedback" >
                                                <label class="lablgnrl">Observaciones</label>
                                                <textarea type="text" id="Fch2observaciones" name="Fch2observaciones" class="form-control letraFlaca" rows="1"> <?php echo $Fch2observaciones; ?> </textarea>
                                                <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                                          </div>
                                    </div>
                                    <!-- ---------------------MODULO SERVICIOS----------------------------- -->
                                    <div class="col-xs-12 col-sm-12 col-md-12 ">
                                          <div class="form-group has-feedback" >
                                                <hr style="color: #c3c3c3">
                                                <h4 class="nubesubtitulo">SERVICIOS</h4>
                                          </div>
                                    </div>
                                    <!-- -------------------------------------------------- -->
                                    <div class="col-xs-12 col-sm-12 col-md-12 ">
                                          <div class="form-group has-feedback" >
                                                <div class="table-responsive-sm">
                                                <table class="table table-bordered" id="miTabla">
                                                      <thead>
                                                        <tr><th>#</th><th>Servicio</th><th>Precio</th><th>Cantidad</th><th>Total</th></tr>
                                                      </thead>
                                                      <tbody class="tbodyabad">
                                                      <?php
# code...
$scservic = "SELECT * FROM `service`
                                                                  WHERE activador='Activo'
                                                                  order by nameService ";
$ejserv = $conexion->query($scservic);

$pa___subtotal = 0;
# code...
while ($rows = mysqli_fetch_row($ejserv)) {
    $punqa = $rows[2];
    $cunqa = $rows[0];
    $rows[0] . 'CN';

    if ($rows[3] === "Costo fijo") {
        # code...
        $tipocobro    = "<p >1</p>";
        $sa__cantidad = 1;
    } else {
        $tipocobro    = "<p  contenteditable='true'></p>";
        $sa__cantidad = 0;
    }

    $scservic = "SELECT * FROM `servicios_anexos_bpm`
                                                                         WHERE fk_bpm='$pk_bpm'  AND fk_services='$cunqa' ";
    $ejservd          = $conexion->query($scservic);
    $conu_si_resltado = 0;

    while ($rowschk = mysqli_fetch_row($ejservd)) {
        $conu_si_resltado = $conu_si_resltado + 1;
        $sa__cantidad     = $rowschk[3];
        $sa_total_cobrar  = $rowschk[4];
        $pa___subtotal    = $pa___subtotal + $sa_total_cobrar;
    }
    if ($conu_si_resltado > 0) {
        # code... ?>
                                                                      <tr class='icoMano'>
                                                                        <td >
                                                <!-- service_autonomo(preciov,cantidadv,idtotalvsoles,nombre_servicio,idservices,idbpm) -->
                                                                                <input onclick='service_autonomo("<?php echo $rows[0]; ?>","<?php echo $pk_bpm; ?>")'  type='checkbox' class='form-check-input' id="<?php echo $rows[0] . 'A'; ?>" name='checksrvs'
                                                                                value='<?php echo $rows[0]; ?>'

                                                                                 checked >
                                                                          </td>
                                                                          <td style="display:none !important;" ><p id="<?php echo $rows[0] . 'B'; ?>">1</p></td> <!-- 1 ES QUE  YA LA HAN AÑADIDO -->
                                                                          <td id="<?php echo $rows[0] . 'C'; ?>"><?php echo $rows[1]; ?></td>
                                                                          <td id="<?php echo $rows[0] . 'D'; ?>">S/ <?php echo $rows[2]; ?></td>
                                                                          <td  id="<?php echo $rows[0] . 'CN'; ?>"><?php echo $sa__cantidad; ?></td>
                                                                          <td><p id="<?php echo $rows[0] . 'TS'; ?>"> <?php echo $sa_total_cobrar; ?> </p></td>
                                                                      </tr>
                                                                  <?php
} else {
        # code... ?>
                                                                      <tr class='icoMano'>
                                                                        <td >
                                                <!-- service_autonomo(preciov,cantidadv,idtotalvsoles,nombre_servicio,idservices,idbpm) -->
                                                                                <input onclick='service_autonomo("<?php echo $rows[0]; ?>","<?php echo $pk_bpm; ?>")'  type='checkbox' class='form-check-input' id="<?php echo $rows[0] . 'A'; ?>" name='checksrvs' value='<?php echo $rows[0]; ?>'
                                                                                  >
                                                                          </td>
                                                                          <td style="display:none !important;" ><p id="<?php echo $rows[0] . 'B'; ?>">0</p></td> <!-- 0 ES QUE LA HAN AÑADIDO -->
                                                                          <td id="<?php echo $rows[0] . 'C'; ?>"><?php echo $rows[1]; ?></td>
                                                                          <td id="<?php echo $rows[0] . 'D'; ?>">S/ <?php echo $rows[2]; ?></td>
                                                                          <td id="<?php echo $rows[0] . 'CN'; ?>"><?php echo $tipocobro; ?></td>
                                                                          <td><p id="<?php echo $rows[0] . 'TS'; ?>"></p></td>
                                                                      </tr>
                                                                  <?php
}
}
?>
                                                            <tr class='icoMano' >
                                                                  <td > </td>
                                                                  <td> </td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td style="color: #c3c3c3;font-size: 8px;font-weight: 900">Añadir servicios</td>
                                                                  </tr>
                                                      </tbody>
                                                </table>
                                                </div>
                                                <H2  title='Monto cobrar por bolsas' style='float: right !important;'><B id='enviarsexi'>TOTAL</B> S/ <span id="totalsrvciss"><?php echo $pa___subtotal; ?></span></H2>

                                          </div>
                                    </div>
                                    <!-- -------------------------------------------------- -->
                                    <div class="col-xs-12 col-sm-12 col-md-12 ">
                                          <div class="form-group has-feedback" >
                                                <hr style="color: #c3c3c3">
                                                <h4 class="nubesubtitulo" onclick="window.open('productos','_blank');">Productos</h4>
                                          </div>
                                    </div>

                                    <!-- -------------------------------------------------- -->
                                    <div class="col-xs-12 col-sm-3 col-md-2 ">
                                          <div class="form-group has-feedback" >
                                                <label class="lablgnrl">KG Tostado automático:</label>
                                                <input value="<?php echo $idTostAuto; ?>" id="idTostAuto" type="text" name="Fch2cantidadpro" class="form-control letraFlaca"  disabled>
                                                <span class="glyphicon glyphicon-scale form-control-feedback"></span>
                                          </div>
                                    </div>
                                          <!-- -------------------------------------------------- -->
                                    <div class="col-xs-12 col-sm-3 col-md-2 ">
                                          <div class="form-group has-feedback">
                                                <label class="lablgnrl">Cantidad en Kilos:</label>
                                                <input value="<?php echo $krsls; ?>" id="krsls" type="text" name="krsls" class="form-control letraFlaca" disabled style="border-radius: 0px 15px  15px 0px;border: 1px solid red">
                                                <span class="glyphicon glyphicon-equalizer  form-control-feedback"></span>
                                          </div>
                                          </div>
                                    <!-- -------------------------------------------------- -->
                                    <div class="col-xs-12 col-sm-2 col-md-2 ">
                                          <div class="form-group has-feedback">
                                                <label class="lablgnrl">Cantidad en gramos:</label>
                                                <input id="kggresiduales" type="text"   value="<?php echo $kggresiduales; ?>" class="form-control letraFlaca" disabled style="border-radius: 0px 15px  15px 0px;border: 1px solid red">
                                                <span class="glyphicon glyphicon-equalizer  form-control-feedback"></span>
                                          </div>
                                    </div>
                                    <!-- -------------------------------------------------- -->
                                     <div class="col-xs-12 col-sm-2 col-md-2 d-none">
                                          <div class="form-group has-feedback">
                                                <label class="lablgnrl">g. Pendiente de empaque:</label>
                                                <input value="<?php echo $gramosPendientes; ?>" id="gramosPendientes" type="text" name="gramosPendientes" class="form-control letraFlaca" disabled style="border-radius: 0px 15px  15px 0px;border: 1px solid red">
                                                <span class="glyphicon glyphicon-equalizer  form-control-feedback"></span>
                                          </div>
                                    </div>

                                    <input type="text" id="subSolesTotalProductoAnexos" value="<?php echo $subSolesTotalProductoAnexos; ?>" style="display: none;">

                                    <!-- -------------------------------------------------- -->
                                     <div class="col-xs-12 col-sm-2 col-md-2 ">
                                          <div class="form-group has-feedback">
                                                <label class="lablgnrl">g. Empacados:</label>
                                                <input type="text" id="subGramosTotalProductoAnexos" value="<?php echo $subGramosTotalProductoAnexos; ?>" class="form-control letraFlaca" disabled style="border-radius: 0px 15px  15px 0px;border: 1px solid blue">
                                                <span class="glyphicon glyphicon-equalizer  form-control-feedback"></span>
                                          </div>
                                    </div>


                                    <!-- -------------------------------------------------- -->
                                     <!-- --------------- toast dato invalido -------- -->
                                    <div class="col-xs-12 col-sm-2 col-md-2 ">
                                          <div   id="pasasDeBolsas" style="background: black;border-radius: 20px;padding: 10px;color: white; position: fixed;bottom: 10px !important;z-index: 9999999;font-size: 18px; animation: vibracion 0.9s ;" class="d-none">
                                            Reduce la cantidad de bolsas. Te estas excediendo
                                            <span style="color: red"><i class="fa fa-angle-double-left" aria-hidden="true"></i></span>
                                          </div>
                                    </div>

                                    <!-- ------------------  TOAST OK SAVE BPM ------------------------ -->
                                     <div class="col-xs-12 col-sm-6 col-md-6 ">
                                          <div   id="okguardadabpm" style="background: black;border-radius: 20px;padding: 20px;color: white; position: fixed;bottom: 10px !important;z-index: 9999999;font-size: 18px; animation: vibracion 0.9s ;" class="d-none">
                                            <center><img src="https://i.pinimg.com/originals/06/4a/a4/064aa47e41c1495d3d460edea3a39432.png" style="width: 60px"></center>
                                            BPM REGISTRADA CORRECTAMENTE
                                            <span style="color: #04ff00"><i class="fa fa-angle-double-left" aria-hidden="true"></i></span>
                                          </div>
                                    </div>


                              <!-- -----------------MODULO PRODUCTOS------------------------------ -->
                              <div id="newCalculate" class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 ">
                                    <div class="form-group has-feedback">
                                          <div class="table-responsive-sm">
                                          <table class="table table-bordered" id="miTabla">
                                                <thead>
                                                <tr>
                                                      <th style="display: none;">#</th>
                                                      <th >Cod. barra:</th>
                                                      <th>Descripción de articulo</th>
                                                      <th>Precio venta:</th>
                                                      <th>Capacidad:</th>
                                                      <th>Cantidad:</th>
                                                      <th>Tipo molido:</th>
                                                      <th>Tipo Tostado:</th>
                                                      <th>Subtotal <b>S/</b></th>
                                                      <th></th>
                                                </tr>
                                                </thead>
                                                <tbody class="tbodyabad">
                                                <tr class="icoMano">
                                                        <td style="display: none;" id="bpm_keyprod"></td>
                                                        <td style="width: 30px !important;background: white"><input style="width: 100px !important" placeholder="Buscar" type="text" id="bpm_inp_barcode"></td>
                                                        <td style="width: 65px;background-color: #eee;"><p id="bpm_nomproduct"></p></td>
                                                        <td style="background-color: #eee;" id="bpm_precventa">S/ 0.00</td>
                                                        <td style="background-color: #eee;" id="bpm_capacidad">0.00g  </td>
                                                        <td style="width: 10px !important;background: white"><input type="text" id="bpm_cantidad" readonly></td>
                                                        <td class="selectBpmMolTost" style="background-color: #eee;">
                                                                      <select class="form-control letraFlaca" id="bpm_tipo_molido_pab" name="1cafe">
                                                                            <option value="" disabled="" selected="">Seleccione un tipo</option>
                                                                            <option value="Molido Expreso">Molido Expreso</option>
                                                                            <option value="Molido fino">Molido fino</option>
                                                                            <option value="Molido medio">Molido medio</option>
                                                                            <option value="Molido Grueso">Molido Grueso</option>
                                                                            <option value="Grano">Grano</option>
                                                                            <option value="Otro">Otros</option>

                                                                      </select>
                                                        </td>
                                                        <td class="selectBpmMolTost" style="background-color: #eee;">
                                                                      <select  class="form-control letraFlaca" id="bpm_tipo_tostado_pab" name="1cafe" >
                                                                            <option value="" disabled="" selected="">Seleccione un tipo</option>
                                                                            <option value="Claro">Claro</option>
                                                                            <option value="Medio">Medio</option>
                                                                            <option value="Oscuro">Oscuro</option>
                                                                             <option value="Otro">Otros</option>

                                                                      </select>
                                                        </td>
                                                        <td><p id="bpm_subtotal"></p></td>
                                                        <td style="background: white !important">
                                                        <span>
                                                          <img title="Añadir artículo" id="saveNewBolsa" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRBSqtVpR3OGyb__AIYk3VX6cdLoVKFH5t9EJmOdrgR4IupzCxq&s" style="width: 30px !important" >
                                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                          <img title="Limpiar línea" id="cleaner_line" src="https://i1.wp.com/www.allaboutlean.com/wp-content/uploads/2015/03/Broom-Icon.png?fit=500%2C500&ssl=1" style="width: 30px !important">

                                                        </span>  </td>
                                                </tr>
                                                <tr class="icoMano">
                                                          <td id="imgLoading" colspan="9" class="d-none">
                                                            <center>
                                                                  <img src="https://acmarketingdigital.com/wp-content/uploads/2018/10/iconoCargando-1-.gif" style="width: 200px !important">
                                                            </center>
                                                          </td>
                                                  </tr>
                                                </tbody>
                                                <tfoot id="renderProductAdd">

                                                          <?php /*SELECT * FROM DE productos_anexos_bpm2 para render en BPM*/
$slfr_productos_anexos = "SELECT * FROM `productos_anexos__bpm`
                                                          WHERE codBpm='$pk_bpm' ";
$slfr_productos_anexosx = $conexion->query($slfr_productos_anexos);
# code...
$__subSolesTotalProductoAnexos = 0;
$_subGramosTotalProductoAnexos = 0;
while ($rowpa = mysqli_fetch_row($slfr_productos_anexosx))
/*$rowpa[1]*/ {

    $__subSolesTotalProductoAnexos = $__subSolesTotalProductoAnexos + $rowpa[10];

    $gramos_x_bolsa         = substr($rowpa[6], 0, -1);
    $capacidad_g_por_bolsas = $rowpa[7] * $gramos_x_bolsa;

    $_subGramosTotalProductoAnexos = $_subGramosTotalProductoAnexos + $capacidad_g_por_bolsas;
    ?>
                                                                <tr class="icoMano">
                                                                        <td style="display: none;"></td>
                                                                        <td style="width: 30px !important"><?php echo $rowpa[3]; ?></td>
                                                                        <td style="width: 65px;"><?php echo $rowpa[4]; ?></td>
                                                                        <td ><?php echo $rowpa[5]; ?></td>
                                                                        <td ><?php echo $rowpa[6]; ?></td>
                                                                        <td style="width: 10px !important"><?php echo $rowpa[7]; ?></td>
                                                                        <td><?php echo $rowpa[8]; ?></td>
                                                                        <td><?php echo $rowpa[9]; ?></td>
                                                                        <td><?php echo $rowpa[10]; ?></td></td>
                                                                        <td>
                                                                          <span>
                                                                            <img onclick="delete__articulo_de_bpm('<?php echo $rowpa[0]; ?>','<?php echo $rowpa[1]; ?>','<?php echo $capacidad_g_por_bolsas; ?>')" title="Remover artículo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRRq6P5aQAo5BZtxKn3CC-TmkjVtqJGok6_7AGqIRfPNScRhlah&s" style="width: 30px !important">
                                                                          </span>
                                                                        </td>
                                                                </tr>
                                                                <script type="text/javascript">
                                                                      $("#subSolesTotalProductoAnexos").val("<?php echo $__subSolesTotalProductoAnexos; ?>");
                                                                      $("#subGramosTotalProductoAnexos").val("<?php echo $_subGramosTotalProductoAnexos; ?>");
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
}
?>
                                                </tfoot>
                                          </table>
                                          </div>
                                    </div>
                                    </div>
                              </div>
                              <!-- --------------------MODULO PRODUCTOS------------------------------ -->




                              <!-- -------------------------------------------------- -->
                              <div class="col-xs-12 col-sm-12 col-md-12 ">
                                    <center> <p id="enpaquetado" style="font-size: 20px; padding: 12px 6px; border: 2px dashed #c3c3c3;display: table;color: #c3c3c3;margin-bottom: 5px;font-weight: 100;display: none;" class="rotar13n">Enpaquetado exitoso</p></center>
                                    <H2 title='Monto cobrar por artículos' style="text-align: right;" ><B>TOTAL</B> S/ <span id="totalcobbls"><?php echo $totalcobbls; ?></span></H2>
                                                            <hr style="color: #c3c3c3">
                              </div>

                              <!-- -------------------------------------------------- -->
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                    <center>
                                          <H2 title='Monto Total a cobrar'><B>TOTAL GENERAL</B> S/ <span id="totalgeneral"></span></H2>
                                    </center>
                              </div>

                              <!-- |||||||||||||||||||||||||||||||||| Modal productos ||||||||||||||||||||||||||||||||||-->
                              <div id="modalProPistoleado" class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
                                <div class="modal-dialog">
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title letraNegra"><i onclick="redireccionar('productos')" class="fa fa-archive"></i> Articulos</h4>
                                    </div>
                                    <center>
                                      <div class="labelLoading">
                                            <!-- <i class="fa fa-refresh fa-spin" style="font-size:24px"></i> -->
                                      </div>
                                    </center>
                                    <div class="modal-body table-responsive" id="idViwTblproductos" ></div>
                                  </div>
                                </div>
                              </div>
                              <script>
                                    $(document).ready(function(){
                                          /*QUITAMOS BORDE ROJO A INPUT Humedad*/
                                          $("#humeA").keyup(function(){
                                            $("#humeA").removeClass("borderojo");
                                          });

                                          setInterval(function(){
                                                var subSolesTotalProductoAnexos= $("#subSolesTotalProductoAnexos").val();
                                                $('#totalcobbls').text(subSolesTotalProductoAnexos);
                                                var totalproducto= parseFloat(document.getElementById("totalcobbls").innerHTML);
                                                var totalservicio= parseFloat(document.getElementById("totalsrvciss").innerHTML);
                                                var totalgeneral = (parseFloat(totalproducto+totalservicio)).toFixed(2);
                                                if(isNaN(totalgeneral)){
                                                      totalgeneral = totalservicio;
                                                }
                                                $('#totalgeneral').text(totalgeneral);
                                          }, 1000);


                                          $('#cleaner_line').click(function(event){
                                                /*Limpiar linea*/
                                                $("#bpm_keyprod,#bpm_nomproduct,#bpm_precventa,#bpm_capacidad,#bpm_subtotal,#totalcobbls").text("");
                                                $("#bpm_inp_barcode,#bpm_cantidad,#bpm_tipo_molido_pab, #bpm_tipo_tostado_pab").val("");
                                                $('#bpm_cantidad').attr('placeholder',"");
                                                $('#bpm_inp_barcode').prop('readonly', false);
                                                $('#bpm_inp_barcode').focus();
                                          });

                                          /*DETECTA  CLICK NEW PRODUCT SAVE BOLSA*/
                                          $('#saveNewBolsa').click(function(event){

                                                    var codIdBpm= $("#idbpm").val();
                                                    var vIdProducto= $("#bpm_keyprod").text();
                                                    var vBarcodeProduct= $("#bpm_inp_barcode").val();
                                                    var vNombreProducto= $("#bpm_nomproduct").text();
                                                    var vPrecioVentaPro= $("#bpm_precventa").text();
                                                    var vCapacidadProdu= $("#bpm_capacidad").text();
                                                    var vCantidProducto= $("#bpm_cantidad").val();
                                                    var bpm_tipo_molido_pab= $("#bpm_tipo_molido_pab").val();
                                                    var bpm_tipo_tostado_pab= $("#bpm_tipo_tostado_pab").val();
                                                    var bpm_subtotal= $("#bpm_subtotal").text();
                                                    var action='add_producto_pistoleoDb';

                                                    if ((vCantidProducto>0) && (bpm_tipo_molido_pab!=null) && (bpm_tipo_tostado_pab!=null))
                                                    {
                                                      //   /*Mostrar icono loading*/
                                                      //   $("#imgLoading").removeClass("d-none");


                                                                        var actiona='val_stock_producto_pistoleoDb';
                                                                        var dataena =   {bar_code :vBarcodeProduct,action :actiona,stock_cantidad_pretendida:vCantidProducto};
                                                                        $.ajax({
                                                                              type: 'post',
                                                                              url:'modelos/productos_pistoleados.modelo.php',
                                                                              data:dataena,
                                                                              success:function(respi){
                                                                                    // $("#datito_render").html(respi);
                                                                                    var variable_csd =  respi.trim();
                                                                                          // alert(variable_csd);
                                                                                          if(variable_csd == 'si_tienes_stock') {
                                                                                                                  /*Limpiar linea*/
                                                                                                                  $("#bpm_keyprod,#bpm_nomproduct,#bpm_precventa,#bpm_capacidad,#bpm_subtotal,#totalcobbls").text("");
                                                                                                                  $("#bpm_inp_barcode,#bpm_cantidad,#bpm_tipo_molido_pab, #bpm_tipo_tostado_pab").val("");
                                                                                                                  $('#bpm_cantidad').attr('placeholder',"");
                                                                                                                  $('#bpm_inp_barcode').focus();

                                                                                                                  var dataen ={codIdBpm: codIdBpm,
                                                                                                                              vIdProducto: vIdProducto,
                                                                                                                              vBarcodeProduct: vBarcodeProduct,
                                                                                                                              vNombreProducto: vNombreProducto,
                                                                                                                              vPrecioVentaPro: vPrecioVentaPro,
                                                                                                                              vCapacidadProdu: vCapacidadProdu,
                                                                                                                              vCantidProducto: vCantidProducto,
                                                                                                                              bpm_tipo_molido_pab: bpm_tipo_molido_pab,
                                                                                                                              bpm_tipo_tostado_pab: bpm_tipo_tostado_pab,
                                                                                                                              bpm_subtotal: bpm_subtotal,
                                                                                                                              action: action};

                                                                                                                              $.ajax({
                                                                                                                                          type: 'post',
                                                                                                                                          url:'modelos/productos_pistoleados.modelo.php',
                                                                                                                                          data:dataen,
                                                                                                                                          success:function(resp){
                                                                                                                                          $("#renderProductAdd").html(resp);
                                                                                                                                          }
                                                                                                                                    });
                                                                                                                              return false;
                                                                                          } else {
                                                                                                alert('No dispones de stock disponible en el producto que pretendes añadir, verifica la cantidad.');
                                                                                          }
                                                                              }
                                                                        });

                                                    }
                                                    // else if(vBarcodeProduct==="MOALI 4707")
                                                    // {
                                                    //          /*Mostrar icono loading*/
                                                    //           $("#imgLoading").removeClass("d-none");

                                                    //           /*Limpiar linea*/
                                                    //           $("#bpm_keyprod,#bpm_nomproduct,#bpm_precventa,#bpm_capacidad,#bpm_subtotal,#totalcobbls").text("");
                                                    //           $("#bpm_inp_barcode,#bpm_cantidad,#bpm_tipo_molido_pab, #bpm_tipo_tostado_pab").val("");
                                                    //           $('#bpm_cantidad').attr('placeholder',"");
                                                    //           $('#bpm_inp_barcode').focus();

                                                    //           var dataen = 'codIdBpm=' +codIdBpm+
                                                    //                        '&vIdProducto=' +vIdProducto+
                                                    //                        '&vBarcodeProduct=' +vBarcodeProduct+
                                                    //                        '&vNombreProducto=' +vNombreProducto+
                                                    //                        '&vPrecioVentaPro=' +vPrecioVentaPro+
                                                    //                        '&vCapacidadProdu=' +vCapacidadProdu+
                                                    //                        '&vCantidProducto=' +vCantidProducto+
                                                    //                        '&bpm_tipo_molido_pab=' +bpm_tipo_molido_pab+
                                                    //                        '&bpm_tipo_tostado_pab=' +bpm_tipo_tostado_pab+
                                                    //                        '&bpm_subtotal=' +bpm_subtotal+
                                                    //                        '&action=' +action;

                                                    //                        $.ajax({
                                                    //                                 type: 'post',
                                                    //                                 url:'modelos/productos_pistoleados.modelo.php',
                                                    //                                 data:dataen,
                                                    //                                 success:function(resp){
                                                    //                                     $("#renderProductAdd").html(resp);
                                                    //                                   }
                                                    //                               });
                                                    //                        return false;
                                                    // }
                                                    else{
                                                      alert("Para añadir un articulo debes llenar todos los datos.");
                                                    }

                                          });
                                          /*DETECTA  CLICK ON ENTER BARCODE  INPUT NEW PRODC*/
                                          $('#bpm_inp_barcode').keypress(function(event){
                                                var keycode = (event.keyCode ? event.keyCode : event.which);
                                                if(keycode == '13'){
                                                    //Capturamos datos contenidos en id
                                                          $('#bpm_inp_barcode').prop('readonly', true);
                                                          var bar_code= $("#bpm_inp_barcode").val();
                                                          var action='add_producto_pistoleo';
                                                          var dataen ='bar_code=' +bar_code+
                                                                      '&action=' +action;
                                                          $.ajax({
                                                            type: 'post',
                                                            url:'modelos/productos_pistoleados.modelo.php',
                                                            data:dataen,
                                                            success:function(resp){
                                                                $("#idViwTblproductos").html(resp);
                                                              }
                                                          });
                                                    return false;
                                                }
                                          });




                                          /*DETECTA  keyup EN CANTIDAD DE BOLSAS */
                                          $('#bpm_cantidad').keyup(function(event){
                                                //Capturamos datos contenidos en id
                                                      var cantidad= $("#bpm_cantidad").val();
                                                      var bpm_precventa=$("#bpm_precventa").text();

                                                      var monto_cobrar=cantidad*bpm_precventa;



                                                       $("#bpm_subtotal").text(monto_cobrar.toFixed(2));



                                                /*PENDIENTE DE EMPAQUE*/
                                                      /*Gramos a empacar*/
                                                      var kggresiduales= $("#kggresiduales").val();
                                                      /*Acapacidad que podemos abarcar con lo elegido*/
                                                      var capacidad=$("#bpm_capacidad").text();
                                                      var cast_capacidad=capacidad.slice(0, -1);
                                                      /*Calculo si quedan gramos pendientes*/
                                                      var gramosPendientes=(kggresiduales-(cantidad*cast_capacidad));
                                                      /*Gramos pendientes positivos*/
                                                      var gramosPendientesP=gramosPendientes*-1;

                                                      var gempacados=$("#subGramosTotalProductoAnexos").val();


                                          });

                                          /*DETECTOR DE CAMBIOS REACTIVOS*/
                                          $( "#tipoCafeA,#pesoA" ).change(function() {
                                                $("#bpm_subtotal,#totalcobbls").text("0.00");
                                                $("#kggresiduales,#bpm_inp_barcode,#bpm_cantidad").val("");
                                                $('#bpm_cantidad').attr('placeholder',"");
                                                $("#bpm_subtotal,#bpm_nomproduct,#bpm_precventa,#bpm_capacidad").text("");
                                                $('#bpm_inp_barcode').focus();
                                          });

                                          /*DETECTOR DE CAMBIOS TIPO MOLIDO O TOSTADO*/
                                          $( "#bpm_tipo_molido_pab" ).change(function() {
                                                $("#bpm_tipo_molido_pab,.selectBpmMolTost").css("background-color", "#eeeeee");
                                                $("#bpm_tipo_tostado_pab").focus();
                                          });

                                          $( "#bpm_tipo_tostado_pab" ).change(function() {
                                                $("#bpm_tipo_tostado_pab,.selectBpmMolTost").css("background-color", "#eeeeee");
                                          });

                                    });
                              </script>

                              <div class="col-xs-12 col-sm-12 col-md-12">
                                    <center>
                                          <button id="btnGuardar" type="submit" class="viewspinerloading btn btn-primary btn-lg">Guardar</button>
                                    </center>
                              </div>

                              <!-- -------------------------------------------------- -->
                              <div class="col-xs-12 col-sm-4 col-md-3 ">
                                    <div class="form-group has-feedback" id="responseNewBpm">

                                    </div>
                              </div>
                              <!-- -------------------------------------------------- -->
                              <div class="col-xs-12 col-sm-4 col-md-3 ">
                                    <div class="form-group has-feedback" >

                                    </div>
                              </div>
                              <section id="mainAlert"></section>
                              <!-- -------------------------------------------------- -->

                        </div>
                        <!-- =========================   TOAST  ABAD :v   ============== -->
                        <div  class="toastAbad">
                        Completar datos
                        <span style="color: #81f33a"><i class="fa fa-angle-double-left" aria-hidden="true"></i>Ficha abierta para </span> <?php echo $nombre_cliente; ?>
                        </div>
                        <!-- --------------- toast dato invalido -------- -->
                        <div   id="datoErrado">
                        Ingresar un dato
                        <span style="color: red"><i class="fa fa-angle-double-left" aria-hidden="true"></i></span>
                        </div>

                        <div style="width: 50px; position: fixed; z-index: 9000;bottom: 6px;right:  10px;color: #ecf0f5" onclick="$('#fechaReceA').focus();">
                          <i class="fa fa-angle-double-up fa-4x" aria-hidden="true"></i>
                        </div>
                  </form>


            <script type="text/javascript">
                      $(document).ready(function(){
                                  view_toast('.toastAbad');

  /*----------------------------------------------------------*/

  $('#modalFichaBpm').modal('toggle');


  // AUTOLOAD TIPO DE SELECT
  $('#tipoCafeA').val("<?php echo $tipo_cafe; ?>");
  $('#presenA').val("<?php echo $presentacion; ?>");
  $('#envaA').val("<?php echo $envase; ?>");
  $("<?php echo '.' . $certificacion; ?>").attr('checked', true);


  $("<?php echo '.conclu' . $conclusion; ?>").attr('checked', true);





  /*------------ Calcul kilos a tostar --------------------------*/

  function generate_kg_tost(){

                            var tipo_cafe  = $('#tipoCafeA').val();

                              var peso =Peso = $('#pesoA').val();

                              if (peso==0) {

                                view_toast('#datoErrado');

                                 $("#pesoA").val("");

                                 $("#pesoA").css('border-color', 'red');

                              }else{

                                 $("#pesoA").css('border-color', '#c3c3c3');

                                 if (tipo_cafe)

                                 {

                                      //funcion generator kg tostados

                                      switch (tipo_cafe)

                                      {

                                          case "Café Pergamino":

                                              var atostr=(peso/1.55).toFixed(3);

                                              $("#idTostAuto").val(atostr);

                                              $("#krsls").val(atostr);

                                              $("#krsls").css('border-color','#c3c3c3');

                                            break;

                                          case "Café Oro":

                                              var atostr=(peso/1.25).toFixed(3);

                                              $("#idTostAuto").val(atostr);

                                              $("#krsls").val(atostr);

                                              $("#krsls").css('border-color','#c3c3c3');

                                            break;

                                          case "Café Natural":

                                              var atostr=(peso/2.50).toFixed(3);

                                              $("#idTostAuto").val(atostr);

                                              $("#krsls").val(atostr);

                                              $("#krsls").css('border-color','#c3c3c3');

                                            break;

                                          case "Café Tostado":

                                              var atostr=peso;

                                              $("#idTostAuto").val(atostr);

                                              $("#krsls").val(atostr);

                                              $("#krsls").css('border-color','#c3c3c3');

                                            break;

                                          default:

                                            alert("No hay formula");

                                    }

                                 }else

                                 {

                                      $("#tipoCafeA").css('border-color', 'red');

                                 }

                              }

                      }


                                $("#pesoA").keyup(function(){
                                        generate_kg_tost();
                                        $('#ficha2').css('display','block');
                                  });
                                                       /* -------------------------- */
                                $("#tipoCafeA").change(function(){
                                        $("#tipoCafeA").css('border-color', '#c3c3c3');
                                        generate_kg_tost();
                                });


                      }) ;
















                      //dinamismo a servicios scheck

  function service_autonomo(idservices,idbpm){
       var idservices = idservices; // ID DEL SERVICES
       var idbpm = idbpm; // ID DEL BPM

       var checksrvs=$("#"+idservices+"A").val();
       var picd_0no_1ad=$("#"+idservices+"B").text();
       var nameServices=$("#"+idservices+"C").text();
       var cantidad_num=$("#"+idservices+"CN").text();
       var precio_unita=$("#"+idservices+"D").text();
           var precio_unita_castnum=precio_unita.substr(3);
               var monto_cobrar=parseFloat(precio_unita_castnum*cantidad_num);
       var total_cobrar=$("#"+idservices+"TS").text();
       var ftotalsrvciss=parseFloat($("#totalsrvciss").text());

      if (picd_0no_1ad==1) // DELETE IN DB
      {
          $("#"+idservices+"CN>p,#"+idservices+"CN").attr('contenteditable','true');
          $("#"+idservices+"B").text("0");
          $("#"+idservices+"A").prop( "checked", false );
          // alert("para eleminar");
          if (cantidad_num>1) {$("#"+idservices+"CN").text("");$("#"+idservices+"TS").text("");}else{$("#"+idservices+"TS").text("");}
          var totalservmatr=ftotalsrvciss-total_cobrar;
          if (totalservmatr>0) {$("#totalsrvciss").text(totalservmatr);}else{$("#totalsrvciss").text("0.00");}

            //ACIONAR SOBRE DB DELETED
            var accion= 'eliminarservicio';
            var dataen =
            {nombre_servicio:nameServices,
            idbpm:idbpm,
            accion:accion};

            $.ajax({
              type: 'post',
              url:'modelos/tostado.modelo.php',
              data:dataen,
              success:function(resp){
                //alert(resp);
              }
            });
            return false;

      }else
      {
          if (cantidad_num>0) // INSERT NEW IN DB
          {
            var otal=parseFloat(precio_unita_castnum)*parseFloat(cantidad_num);
            $("#"+idservices+"TS").text(otal);
            $("#"+idservices+"A").prop( "checked", true );
            $("#"+idservices+"B").text("1");
             var totalservmatr=ftotalsrvciss+monto_cobrar;
             $("#totalsrvciss").text(totalservmatr);
             $("#"+idservices+"CN>p,#"+idservices+"CN").attr('contenteditable','false');

              var accion= 'guardaservicio';
              var dataen =
              {nombre_servicio: nameServices,
              preciov: precio_unita_castnum,
              cantidadvx: cantidad_num,
              totalfinal: otal,
              idbpm: idbpm,
              idservices: idservices,
              accion: accion};

              $.ajax({
                type: 'post',
                url:'modelos/tostado.modelo.php',
                data:dataen,
                success:function(resp){
                  //alert(resp);
                }
              });
              return false;

          }
          else
          {
            alert("Antes de nada en este caso debes ingresar la cantidad");
            $("#"+idservices+"CN>p,#"+idservices+"CN").attr('contenteditable','true');
            $("#"+idservices+"A").prop( "checked", false );
            $("#"+idservices+"CN>p").focus();
          }
      }
  }


            </script>


