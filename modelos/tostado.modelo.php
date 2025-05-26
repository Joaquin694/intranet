<?php
/**
 * Created by PhpStorm.
 * User: LABAD
 * Date: 22/01/2019
 * Time: 09:44 PM
* insert into t1 select max(id)+1 from t1  <-- Para añadir sum a un campo in insert into

 ***MOMORY:
**A ver creaste....
 */

require_once "config.php";
$accion = $_POST['accion'];
switch ($accion) {
    /*------------------------------------------------------------------------------------*/
    case "Newad":

        $nomElemnt = $_POST['nomElemnt'];
        $getId     = $_POST['getId'];
        $accion    = $_POST['accion'];
        /*---------------------  FRONEAMOS AL INDIVIDUO CLIENTE  -----------------*/
        $frnCliFich1    = "SELECT * FROM clientes where id='$getId'";
        $resultCliFich1 = $conexion->query($frnCliFich1);
        while ($rowt = mysqli_fetch_row($resultCliFich1)) {
            $nomCli              = $rowt[1];
            $docuIdentiCli       = $rowt[2];
            $emailCli            = $rowt[3];
            $telefCli            = $rowt[4];
            $direCli             = $rowt[5];
            $fechaNaciCli        = $rowt[6];
            $compraCli           = $rowt[7]; /*Sum total productos comprados por cada unid*/
            $fechaUltimCompraCli = $rowt[8];
            $variedad_altitud    = $rowt[10];
        }
        /*------------------------------------------------------------------------*/

        $diaMesAno;

        /*-------------  INICIALIZAMOS FICHA BPM INDIVIDUO CLIENTE  --------------*/
        $matserv   = "SELECT pk_bpm FROM `bpm` WHERE estado='2'";
        $mataservE = $conexion->query($matserv);
        $rowt      = mysqli_fetch_row($mataservE);
        $ipk_bpm   = $rowt[0];

        if ($ipk_bpm) {
            # code...
            mysqli_query($conexion, "DELETE FROM `bpm` WHERE pk_bpm= '$ipk_bpm'");
            mysqli_query($conexion, "DELETE FROM `servicios_anexos_bpm` WHERE `fk_bpm`='$ipk_bpm'");
            mysqli_query($conexion, "DELETE FROM `productos_anexos__bpm` WHERE `codBpm`='$ipk_bpm'");
        }

        $maxiCorrelativoQ = 'SELECT MAX(correlativo) FROM bpm';
        $maxiCorrelativoE = $conexion->query($maxiCorrelativoQ);
        $rowt             = mysqli_fetch_row($maxiCorrelativoE);
        $maxiCorrelativoV = $rowt[0];
        if ($maxiCorrelativoV === null) {$maxiCorrelativoV = '4718';} else { $maxiCorrelativoV = $maxiCorrelativoV + 1;} /*Inicio correlativo*/

        mysqli_query($conexion, "INSERT INTO `bpm` (
            `pk_bpm`,
            `correlativo`,
            `codigo`,
            `aprobado_por`,
            `fecha_registro_documento`,
            `pagina`,
            `lote`,
            `titulo`,
            `subtitulo`,
            `fecha_atencion`,
            `nombre_cliente`,
            `nombre_usuario`,
            `tipo_cafe`,
            `materia_extraña`,
            `plagas_enfermedades`,
            `lugar_procedencia`,
            `peso`,
            `presentacion`,
            `variedad`,
            `condicion_de_transporte`,
            `envase`,
            `certificacion`,
            `fecha_entrega`,
            `humedad`,
            `conclusion`,
            `observaciones`,
            `ejecutor_asistente`,
            `jefe_planta`,
            `doc_identidad`,
            `estado`) VALUES (
            NULL,
             '$maxiCorrelativoV',
              NULL,
             NULL,
             NULL,
             NULL,
             NULL,
             NULL,
             NULL,
             NULL,
             NULL,
             NULL,
             NULL,
             NULL,
             NULL,
             NULL,
             NULL,
             NULL,
             NULL,
             NULL,
             NULL,
             NULL,
             NULL,
             NULL,
             NULL,
             NULL,
             NULL,
             NULL,
             '$docuIdentiCli',
             '2')");
        /*------------------------------------------------------------------------*/
        $sql1 = "SELECT pk_bpm FROM bpm order by pk_bpm desc limit 1";

        $result = mysqli_query($conexion, $sql1);

        while ($mostrar = mysqli_fetch_row($result)) {
            $idbpm = $mostrar[0];

        }

        ?>
                  <style type="text/css">
                    .icoMano>td>input,.icoMano>td>select{width: 100% !important;border: 1px solid white !important;height: 20px !important;padding: 1px !important}
                    .borderojo{border: 1px solid red !important}

                  </style>

                  <form id="idNewBPM" method="POST" onsubmit="return updatadinsert(<?php echo $idbpm ?>);" autocomplete="off">
                        <input class="auto" type="text" onclick="updatadinsert(<?php echo $idbpm ?>)" value="<?php echo $idbpm ?>" id="idbpm" style='display:none'>
                        <div class="box container" id="ficha1" >

                        <div class="row" style="padding: 0px 10px">
                              <div class="col-xs-12">
                                    <i  style="border: 1px solid #c3c3c3;padding: 2px 4px; color: #ffc107"  data-toggle="tooltip" data-placement="top" title="Estado del documento" class="fa fa-circle navbar-right icoMano" aria-hidden="true"></i>
                                    <i  style="border: 1px solid #c3c3c3;padding: 2px 4px; color: #777"  data-toggle="tooltip" data-placement="top" title="Reportes e indicadores" class="fa fa-bar-chart navbar-right icoMano" aria-hidden="true"> Reportes</i>
                                    <i onclick="redireccionar('tostado')" style="border: 1px solid #c3c3c3;padding: 2px 4px; color: #777"  data-toggle="tooltip" data-placement="top" title="Crear" class="fa fa-plus-square-o navbar-right icoMano" aria-hidden="true"> Crear</i>
                                    <i onclick="redireccionar('bpmhistorial')" style="border: 1px solid #c3c3c3;padding: 2px 4px; color: #777"  data-toggle="tooltip" data-placement="top" title="Ver Histórico" class="fa fa-search navbar-right icoMano" aria-hidden="true"> Buscar</i>
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
                                    <span id="fecha_registro_documento"><?php echo $hoydia . '/' . $hoymes . '/' . $hoyano; ?></span><br>
                                    <!-- -------------------------------------------------- -->
                                    <b>Página:</b> <span id="pagina">01</span><br>
                              </div>
                        </div>
                        <!-- -------------------------------------------------- -->
                        <!-- SUBCABEZA VERDE -->
                        <!-- -------------------------------------------------- -->
                        <div class="row  letra16" style="padding: 2px 10px; background: #528035;color: white">
                              <div class="col-xs-4 centrate">
                                    <b>LOTE </b>MP-<span id="idLoteA"><?php echo $maxiCorrelativoV . $hoydia . $hoymes . date('y'); ?></span>
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
                                    <input type="text" value="<?php echo $maxiCorrelativoV; ?>" style="display: none;" id='newBpmCorrelativoA'>
                                    <input id="fechaReceA"  type="date" name="1fecha" class="form-control letraFlaca" value="<?php echo $hoyano . '-' . $hoymes . '-' . $hoydia; ?>">
                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                              </div>
                              </div>
                              <!-- -------------------------------------------------- -->
                              <div class="col-xs-12 col-sm-4 col-md-3 ">
                                    <div class="form-group has-feedback" >
                                          <label >Nombre del cliente:</label>
                                          <input id="nombClieA" type="text" name="1nombrecliente" class="form-control letraFlaca" disabled value="<?php echo $nomCli; ?>">
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
                                          <select id="tipoCafeA" class="form-control letraFlaca" name="1cafe" required>
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
                                          <input id="presMateExtrA" type="text" name="1materiaextrana" class="form-control letraFlaca" value="Sin m.e">
                                          <span class="glyphicon glyphicon-alert form-control-feedback"></span>
                                    </div>
                              </div>
                              <!-- -------------------------------------------------- -->
                              <div class="col-xs-12 col-sm-4 col-md-3 ">
                                    <div class="form-group has-feedback" >
                                          <label >Plagas enfermedades:</label>
                                          <input id="plagEnfeA" value="Sin p.e" type="text" name="1materiaextrana" class="form-control letraFlaca" >
                                          <span class="glyphicon glyphicon-alert form-control-feedback"></span>
                                    </div>
                              </div>
                              <!-- -------------------------------------------------- -->
                              <div class="col-xs-12 col-sm-4 col-md-3 ">
                                    <div class="form-group has-feedback" >
                                          <label >Lugar de Procedencia:</label>
                                          <input id="lugaProcA" type="text" name="1procedencia" class="form-control letraFlaca" autocomplete="on" value="<?php echo $direCli; ?>"  disabled>
                                          <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
                                    </div>
                              </div>
                              <!-- -------------------------------------------------- -->
                              <div class="col-xs-12 col-sm-4 col-md-3 ">
                                    <div class="form-group has-feedback" >
                                          <label >Peso:</label>
                                          <input id="pesoA" onkeyup="inpEsp('pesoA','idCantProdA')"   type='number' step='any' max='9999999' min='0' placeholder='Ingrese la cantidad' style='background:transparent; text-align: left;' class='form-control' >
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
                                          <option selected value="Otros">Otros</option>
                                          </select>
                                          <span class="glyphicon glyphicon-oil  form-control-feedback"></span>
                                    </div>
                              </div>
                              <!-- -------------------------------------------------- -->
                              <div class="col-xs-12 col-sm-4 col-md-3 ">
                                    <div class="form-group has-feedback" >
                                          <label >Variedad/Altitud:</label>
                                          <input id="newBpmVariedadAltitud"
                                          onchange="updatead('variedad_altitud','newBpmVariedadAltitud','Variedad/Altitud:','ratide','Fch2rucdni','#mainAlert')" type="text" name="1altitud" class="form-control letraFlaca" autocomplete="on" value="<?php echo $variedad_altitud; ?>" required>
                                          <span class="glyphicon glyphicon-indent-left form-control-feedback"></span>
                                    </div>
                              </div>
                              <!-- -------------------------------------------------- -->
                              <div class="col-xs-12 col-sm-4 col-md-3 ">
                                    <div class="form-group has-feedback" >
                                          <label >Condicion de transporte:</label>
                                          <input id="condTranA" value="Buenas c.t" type="text" name="1altitud" class="form-control letraFlaca" autocomplete="on" required>
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
                                          <option value="Hermetico">Hermético</option>
                                          <option value="Integro">Íntegro</option>
                                          </select>
                                          <span class="glyphicon glyphicon-oil  form-control-feedback"></span>
                                    </div>
                              </div>
                              <!-- -------------------------------------------------- -->
                              <div class="col-xs-12 col-sm-4 col-md-3 centrate">
                                    <div class="form-group has-feedback" style="border-radius: 20px; border: 1px solid #c3c3c3">
                                          <div class="radio" id="">
                                                <label>
                                                <input type="radio" value="Si" id="rdbtTipoCertA" name="rdbtTipoCertA"  >
                                                Con Certificación (Orgánica)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </label>
                                                <!-- ---------------------------------- -->
                                                <label>
                                                <input type="radio" value="No" id="rdbtTipoCertA" name="rdbtTipoCertA" checked="checked">
                                                Sin Certificación (Convencional)
                                                </label>
                                          </div>
                                    </div>
                              </div>
                              <!-- -------------------------------------------------- -->
                              <div class="col-xs-12 col-sm-4 col-md-3 ">
                                    <div class="form-group has-feedback" >
                                          <label >Fecha de entrega:</label>
                                          <input  value="<?php echo date('Y-m-d');
        echo 'T';
        echo date('H');
        echo ':';
        echo date('i'); ?>"  id="fechEntrA"   style="color: red; font-weight: 700" type="datetime-local" name="1fechaentrega" class="form-control letraFlaca" required>
                                          <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                    </div>
                              </div>
                              <!-- -------------------------------------------------- -->
                              <div class="col-xs-12 col-sm-4 col-md-3 ">
                                    <div class="form-group has-feedback" >
                                          <label >Humedad:</label>
                                          <input id="humeA" type="text" name="1humedad" class="form-control letraFlaca borderojo" autocomplete="on"  required>
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
                                                <input type="radio" value="Si" name="conclusionA"  checked="checked">
                                                      Aceptado
                                                </label> &nbsp;&nbsp;|&nbsp;&nbsp;
                                                <label>
                                                      <input type="radio" value="No" name="conclusionA" >Rechazado
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
                                          <textarea id="observacionesF1A" type="text" name="1observaciones" class="form-control letraFlaca" rows="1"></textarea>
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
                        <div class="box container" id="ficha2" style="display: none;">
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
                                          <span id="fecha_registro_documento_rbpm2"><?php echo $hoydia . '/' . $hoymes . '/' . date('Y') ?></span><br>
                                          <!-- -------------------------------------------------- -->
                                          <b>Página:</b> <span id="pagina_rbpm2">02</span><br>
                                    </div>
                              </div>
                              <!-- -------------------------------------------------- -->
                              <!-- SUBCABEZA VERDE -->
                              <!-- -------------------------------------------------- -->
                              <div class="row  letra16" style="padding: 2px 10px; background: #a51c0b!important;color: white">
                                    <div class="col-xs-4 centrate" >
                                          <b>LOTE </b>PT-<span id="lote_rbpm2"><?php echo $maxiCorrelativoV . $hoydia . $hoymes . date('y'); ?>
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
                                                <input type="text" name="Fch2nombrecliente" class="form-control letraFlaca" value="<?php echo $nomCli; ?>" disabled>
                                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                          </div>
                                    </div>
                                    <!-- -------------------------------------------------- -->
                                    <div class="col-xs-12 col-sm-4 col-md-3 ">
                                          <div class="form-group has-feedback" >
                                                <label class="lablgnrl">RUC/DNI:</label>
                                                <input value="<?php echo $docuIdentiCli; ?>" type="text" id="Fch2rucdni" class="form-control letraFlaca"  disabled>
                                                <span class="glyphicon glyphicon-list-alt form-control-feedback"></span>
                                          </div>
                                    </div>
                                    <!-- -------------------------------------------------- -->
                                    <div class="col-xs-12 col-sm-4 col-md-3 ">
                                          <div class="form-group has-feedback" >
                                                <label class="lablgnrl">Codigo de materia prima:</label>
                                                <input id="codmatpri" type="text" name="Fch2codigomateriaprima" class="form-control letraFlaca" value="<?php echo "MP-" . $maxiCorrelativoV . $hoydia . $hoymes . date('y'); ?>" disabled >
                                                <span class="form-control-feedback">Cod.</span>
                                          </div>
                                    </div>
                                    <!-- -------------------------------------------------- -->
                                    <div class="col-xs-12 col-sm-4 col-md-3 ">
                                          <div class="form-group has-feedback" >
                                                <label class="lablgnrl">Teléfono del cliente:</label>
                                                <input value="<?php echo $telefCli; ?>" type="text" id="Fch2telefonocliente" name="Fch2telefonocliente" class="form-control letraFlaca" disabled>
                                                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                                          </div>
                                    </div>
                                    <!-- -------------------------------------------------- -->
                                    <div class="col-xs-12 col-sm-4 col-md-3 ">
                                          <div class="form-group has-feedback" >
                                                <label class="lablgnrl">Cantidad del producto:</label>
                                                <input id="idCantProdA" type="text" name="Fch2cantidadpro" class="form-control letraFlaca"  disabled>
                                                <span class="form-control-feedback"><b>Kg.</b></span>
                                          </div>
                                    </div>
                                    <!-- -------------------------------------------------- -->
                                    <div class="col-xs-12 col-sm-4 col-md-3 ">
                                          <div class="form-group has-feedback" >
                                                <label class="lablgnrl">Correo electrónico:</label>
                                                <input value="<?php echo $emailCli; ?>" type="email" id="Fch2correo" name="Fch2correo" class="form-control letraFlaca"  disabled>
                                                <span class="form-control-feedback">@</span>
                                          </div>
                                    </div>
                                    <!-- -------------------------------------------------- -->
                                    <div class="col-xs-12 col-sm-8 col-md-6 ">
                                          <div class="form-group has-feedback" >
                                                <label class="lablgnrl">Observaciones</label>
                                                <textarea type="text" id="Fch2observaciones" name="Fch2observaciones" class="form-control letraFlaca" rows="1"></textarea>
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
                                                      <tr>
                                                      <th>#</th>
                                                      <th>Servicio</th>
                                                      <th>Precio</th>
                                                      <th>Cantidad</th>
                                                      <th>Total</th>
                                                      </tr>
                                                      </thead>
                                                      <tbody class="tbodyabad">
                                                      <?php
# code...
        $scservic = "SELECT * FROM `service`
                                                                  WHERE activador='Activo'
                                                                  order by nameService ";
        $ejserv = $conexion->query($scservic);

        $recojeidservices = 9999;
        $countis          = 999;
        $cunqa            = 100;
        $idparajalarnom   = 9999999;
        # code...
        while ($rows = mysqli_fetch_row($ejserv)) {

            $punqa   = $rows[2];
            $cunqa   = $cunqa + 1;
            $countis = $countis + 1;

            $idparajalarnom   = $idparajalarnom + 1;
            $recojeidservices = $recojeidservices + 1;

            if ($rows[3] === "Costo fijo") {
                # code...
                $tipocobro = "<p id='$cunqa'>1</p>";
            } else {
                $tipocobro = "<p id='$cunqa' contenteditable='true'></p>";
            }
            ?>
                                                                  <tr class='icoMano'>
                                                                  <td >
                                                                        <input class="<?php echo $cunqa; ?>" type='checkbox' class='form-check-input' id='checksrvs' name='checksrvs' value='<?php echo $rows[0]; ?>'
                                                                        onclick="crpse('<?php echo $punqa ?>','<?php echo $cunqa ?>','<?php echo $countis ?>','<?php echo $idparajalarnom ?>','<?php echo $recojeidservices; ?>')" >
                                                                  </td>
                                                                  <td style="display:none !important;" id="<?php echo $recojeidservices; ?>"><?php echo $rows[0]; ?></td>
                                                                  <td id='<?php echo $idparajalarnom ?>'><?php echo $rows[1]; ?></td>
                                                                  <td>S/ <?php echo $rows[2]; ?></td>
                                                                  <td ><?php echo $tipocobro; ?></td>
                                                                  <td><p id='<?php echo $countis ?>'></p></td>
                                                                  </tr>
                                                            <?php
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
                                                <H2  title='Monto cobrar por bolsas' style='float: right !important;'><B id='enviarsexi'>TOTAL</B> S/ <span id="totalsrvciss">0</span></H2>

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
                                                <input value="0.00" id="idTostAuto" type="text" name="Fch2cantidadpro" class="form-control letraFlaca"  disabled>
                                                <span class="glyphicon glyphicon-scale form-control-feedback"></span>
                                          </div>
                                    </div>
                                          <!-- -------------------------------------------------- -->
                                    <div class="col-xs-12 col-sm-3 col-md-2 ">
                                          <div class="form-group has-feedback">
                                                <label class="lablgnrl">Cantidad en Kilos:</label>
                                                <input value="0.00" id="krsls" type="text" name="krsls" class="form-control letraFlaca" disabled style="border-radius: 0px 15px  15px 0px;border: 1px solid red">
                                                <span class="glyphicon glyphicon-equalizer  form-control-feedback"></span>
                                          </div>
                                          </div>
                                    <!-- -------------------------------------------------- -->
                                    <div class="col-xs-12 col-sm-2 col-md-2 ">
                                          <div class="form-group has-feedback">
                                                <label class="lablgnrl">Cantidad en gramos:</label>
                                                <input id="kggresiduales" type="text"   value="0" class="form-control letraFlaca" disabled style="border-radius: 0px 15px  15px 0px;border: 1px solid red">
                                                <span class="glyphicon glyphicon-equalizer  form-control-feedback"></span>
                                          </div>
                                    </div>
                                    <!-- -------------------------------------------------- -->
                                     <div class="col-xs-12 col-sm-2 col-md-2 d-none">
                                          <div class="form-group has-feedback">
                                                <label class="lablgnrl">g. Pendiente de empaque:</label>
                                                <input value="0.00" id="gramosPendientes" type="text" name="gramosPendientes" class="form-control letraFlaca" disabled style="border-radius: 0px 15px  15px 0px;border: 1px solid red">
                                                <span class="glyphicon glyphicon-equalizer  form-control-feedback"></span>
                                          </div>
                                    </div>

                                    <input type="text" id="subSolesTotalProductoAnexos" value="0.00" style="display: none;">

                                    <!-- -------------------------------------------------- -->
                                     <div class="col-xs-12 col-sm-2 col-md-2 ">
                                          <div class="form-group has-feedback">
                                                <label class="lablgnrl">g. Empacados:</label>
                                                <input type="text" id="subGramosTotalProductoAnexos" value="0.00" class="form-control letraFlaca" disabled style="border-radius: 0px 15px  15px 0px;border: 1px solid blue">
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
                                                      <th >Cod. barra: OPEN</th>
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
                                                        <td style="width: 30px !important;background: white"><input style="width: 100px !important" type="text" id="bpm_inp_barcode"></td>
                                                        <td style="width: 65px;background-color: #eee;"><p id="bpm_nomproduct"></p></td>
                                                        <td style="background-color: #eee;" id="bpm_precventa">S/ 0.00</td>
                                                        <td style="background-color: #eee;" id="bpm_capacidad">0.00g  </td>
                                                        <td style="width: 13px !important;background: white"><input type="text" id="bpm_cantidad" readonly ></td>
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
                                                <tfoot id="renderProductAdd"></tfoot>
                                          </table>
                                          </div>
                                    </div>
                                    </div>
                              </div>
                              <!-- --------------------MODULO PRODUCTOS------------------------------ -->




                              <!-- -------------------------------------------------- -->
                              <div class="col-xs-12 col-sm-12 col-md-12 ">
                                    <center> <p id="enpaquetado" style="font-size: 20px; padding: 12px 6px; border: 2px dashed #c3c3c3;display: table;color: #c3c3c3;margin-bottom: 5px;font-weight: 100;display: none;" class="rotar13n">Enpaquetado exitoso</p></center>
                                    <H2 title='Monto cobrar por artículos' style="text-align: right;" ><B>TOTAL</B> S/ <span id="totalcobbls">0</span></H2>
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

                                          $('#idNewBPM').on('keyup keypress', function(e) { var keyCode = e.keyCode || e.which; if (keyCode === 13) { e.preventDefault(); return false; } });

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
                                                                                                // Tu código aquí...
                                                                                                      /*Mostrar icono loading*/
                                                                                                      // $("#imgLoading").removeClass("d-none");  

                                                                                                      /*Limpiar linea*/
                                                                                                      $("#bpm_keyprod,#bpm_nomproduct,#bpm_precventa,#bpm_capacidad,#bpm_subtotal,#totalcobbls").text("");
                                                                                                      $("#bpm_inp_barcode,#bpm_cantidad,#bpm_tipo_molido_pab, #bpm_tipo_tostado_pab").val("");
                                                                                                      $('#bpm_cantidad').attr('placeholder',"");
                                                                                                      $('#bpm_inp_barcode').focus();

                                                                                                      var dataen =   {codIdBpm :codIdBpm,
                                                                                                                  vIdProducto :vIdProducto,
                                                                                                                  vBarcodeProduct :vBarcodeProduct,
                                                                                                                  vNombreProducto :vNombreProducto,
                                                                                                                  vPrecioVentaPro :vPrecioVentaPro,
                                                                                                                  vCapacidadProdu :vCapacidadProdu,
                                                                                                                  vCantidProducto :vCantidProducto,
                                                                                                                  bpm_tipo_molido_pab :bpm_tipo_molido_pab,
                                                                                                                  bpm_tipo_tostado_pab :bpm_tipo_tostado_pab,
                                                                                                                  bpm_subtotal :bpm_subtotal,
                                                                                                                  action :action};

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
                                                    
                                                    // else if(vBarcodeProduct="MOALI 4707")
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
                        <span style="color: #81f33a"><i class="fa fa-angle-double-left" aria-hidden="true"></i>Ficha abierta para </span> <?php echo $nomCli; ?>
                        </div>
                        <!-- --------------- toast dato invalido -------- -->
                        <div   id="datoErrado">
                        Ingresar un dato
                        <span style="color: red"><i class="fa fa-angle-double-left" aria-hidden="true"></i></span>
                        </div>

                        <div style="width: 50px; position: fixed; z-index: 9000;bottom: 6px;right:  10px;color: #ecf0f5" onclick="$('#humeA').focus();">
                          <i class="fa fa-angle-double-up fa-4x" aria-hidden="true"></i>
                        </div>
                  </form>


            <script src="vistas/js/tostado.js"></script>
            <?php
include '../controladores/bpm.controlador.php';
//

        ?>
            <!-- =========================---------------------============== -->

            <?php break;

    /*------------------------------------------------------------------------------------*/
    case "guardaservicio":
        $nombre_servicio = $_POST['nombre_servicio'];
        $preciov         = $_POST['preciov'];
        $cantidadvx      = $_POST['cantidadvx'];
        $totalfinal      = $_POST['totalfinal'];
        $idbpm           = $_POST['idbpm'];
        $idservices      = $_POST['idservices'];

        mysqli_query($conexion, "INSERT INTO `servicios_anexos_bpm` (`servicio`, `precio`, `cantidad`,
            `total`, `fk_bpm`, `fk_services`) VALUES ('$nombre_servicio', '$preciov', '$cantidadvx', '$totalfinal',
            '$idbpm','$idservices');");

        /*SELECT * FROM DE productos_anexos_bpm2 para render en BPM*/
        $sql_serv_anex = "SELECT SUM(total) as 'cobrar' FROM `servicios_anexos_bpm`
              WHERE fk_bpm='$idbpm' ";
        $sql_serv_anexx = $conexion->query($sql_serv_anex);
        # code...

        while ($rowpaq = mysqli_fetch_row($sql_serv_anexx))
        /*$rowpa[1]*/ {
            $sub_total_sols_residual = $rowpaq[0];
        }

        mysqli_query($conexion, "UPDATE bpm
                                          SET  totalsrvciss  = '$sub_total_sols_residual'
                                          WHERE `pk_bpm`='$idbpm';");

        echo "Se guardo correctamente";
        break;
    /*------------------------------------------------------------------------------------*/
    case "eliminarservicio":
        $nombre_servicio = $_POST['nombre_servicio'];
        $idbpm           = $_POST['idbpm'];
        mysqli_query($conexion, "DELETE FROM `servicios_anexos_bpm` WHERE servicio= '$nombre_servicio' AND fk_bpm= '$idbpm'");

        /*SELECT * FROM DE productos_anexos_bpm2 para render en BPM*/
        $sql_serv_anex = "SELECT SUM(total) as 'cobrar' FROM `servicios_anexos_bpm`
              WHERE fk_bpm='$idbpm' ";
        $sql_serv_anexx = $conexion->query($sql_serv_anex);
        # code...

        while ($rowpaq = mysqli_fetch_row($sql_serv_anexx))
        /*$rowpa[1]*/ {
            $sub_total_sols_residual = $rowpaq[0];
        }

        mysqli_query($conexion, "UPDATE bpm
                                          SET  totalsrvciss  = '$sub_total_sols_residual'
                                          WHERE `pk_bpm`='$idbpm';");

        echo "Se elimino correctamente";
        break;

    /*------------------------------------------------------------------------------------*/
    case "actualizar_servicio_anexo":
        $nombre_servicio = $_POST['nombre_servicio'];
        $preciov         = $_POST['preciov'];
        $cantidadvx      = $_POST['cantidadvx'];
        $totalfinal      = $_POST['totalfinal'];
        $idbpm           = $_POST['idbpm'];
        $idservices      = $_POST['idservices'];
        $idsab           = $_POST['idsab'];

        mysqli_query($conexion, "UPDATE servicios_anexos_bpm SET

            servicio = '$nombre_servicio', precio='$preciov', cantidad='$cantidadvx',
            total='$totalfinal', fk_bpm='$idbpm',fk_services='$idservices' WHERE pk_sab = '$idsab';");

        echo "Se actualizo correctamente";
        break;
/*------------------------------------------------------------------------------------*/

    case "actualizar":
        $idGetValor = $_POST['idGetValor'];

        // ================================  CONSULTAS A BASE DE DATOS  SEGUN CORREPONDA ====  -->

        //$sql= "SELECT * FROM anal_fisico WHERE pk_anal_fisico='$idGetValor'";
        $sql = "SELECT * FROM bpm  WHERE pk_bpm='$idGetValor'";

        $result = mysqli_query($conexion, $sql);

        while ($mostrar = mysqli_fetch_row($result)) {
            $pk_bpm                   = $mostrar[0];
            $correlativo              = $mostrar[1];
            $codigo                   = $mostrar[2];
            $aprobado_por             = $mostrar[3];
            $fecha_registro_documento = $mostrar[4];
            $pagina                   = $mostrar[5];
            $lote                     = $mostrar[6];
            $titulo                   = $mostrar[7];
            $subtitulo                = $mostrar[8];
            $fecha_atencion           = $mostrar[9];
            $nombre_cliente           = $mostrar[10];
            $nombre_usuario           = $mostrar[11];
            $tipo_cafe                = $mostrar[12];

            $materia_extraña        = $mostrar[13];
            $plagas_enfermedades     = $mostrar[14];
            $lugar_procedencia       = $mostrar[15];
            $peso                    = $mostrar[16];
            $presentacion            = $mostrar[17];
            $variedad                = $mostrar[18];
            $condicion_de_transporte = $mostrar[19];
            $envase                  = $mostrar[20];
            $certificacion           = $mostrar[21];
            $fecha_entrega           = $mostrar[22];
            $humedad                 = $mostrar[23];
            $conclusion              = $mostrar[24];
            $observaciones           = $mostrar[25];
            $ejecutor_asistente      = $mostrar[26];
            $jefe_planta             = $mostrar[27];
            $doc_identidad           = $mostrar[28];

            $titulof1                       = $mostrar[30];
            $subtitulo_rbpm2                = $mostrar[31];
            $codigo_rbpm2                   = $mostrar[32];
            $aprobado_por_rbpm2             = $mostrar[33];
            $fecha_registro_documento_rbpm2 = $mostrar[34];
            $pagina_rbpm2                   = $mostrar[35];
            $lote_rbpm2                     = $mostrar[36];
            $codmatpri                      = $mostrar[37];
            $Fch2telefonocliente            = $mostrar[38];
            $idCantProdA                    = $mostrar[39];
            $Fch2correo                     = $mostrar[40];
            $Fch2observaciones              = $mostrar[41];

            $idTostAuto                   = $mostrar[42];
            $krsls                        = $mostrar[43];
            $kggresiduales                = $mostrar[44];
            $gramosPendientes             = $mostrar[45];
            $subSolesTotalProductoAnexos  = $mostrar[46];
            $subGramosTotalProductoAnexos = $mostrar[47];

            $totalsrvciss = $mostrar[48];
            $totalcobbls  = $mostrar[49];
            $totalgeneral = $mostrar[50];

        }
        /* ========================= CUERPO DE RENDER -============== -*/

        require_once 'render/render.bpmhistorial.php';
        include '../controladores/bpm.controlador.php';
        // include '../vistas/js/bpm.php';
        break;
    /*------------------------------------------------------------------------------------*/
    case "insertIntoBpm":

        $_getId                          = $_POST['getId'];
        $_newBpmCorrelativoA             = $_POST['newBpmCorrelativoA'];
        $_codigo                         = $_POST['codigo'];
        $_aprobado_por                   = $_POST['aprobado_por'];
        $_fecha_registro_documento       = $_POST['fecha_registro_documento'];
        $_pagina                         = $_POST['pagina'];
        $_lote                           = $_POST['lote'];
        $_titulo                         = $_POST['titulo'];
        $_subtitulo                      = $_POST['subtitulo'];
        $_fecha_atencion                 = $_POST['fecha_atencion'];
        $_nombre_cliente                 = $_POST['nombre_cliente'];
        
       

        
        $_nombre_usuario                 = $_POST['nombre_usuario'];
        


        $_tipo_cafe                      = $_POST['tipo_cafe'];
        $_materia_extraña               = $_POST['materia_extraña'];
        $_plagas_enfermedades            = $_POST['plagas_enfermedades'];
        $_lugar_procedencia              = $_POST['lugar_procedencia'];
        $_peso                           = $_POST['peso'];
        $_presentacion                   = $_POST['presentacion'];
        $_variedad                       = $_POST['variedad'];
        $_condicion_de_transporte        = $_POST['condicion_de_transporte'];
        $_envase                         = $_POST['envase'];
        $_certificacion                  = $_POST['certificacion'];
        $_fecha_entrega                  = $_POST['fecha_entrega'];
        $_humedad                        = $_POST['humedad'];
        $_conclusion                     = $_POST['conclusion'];
        $_observaciones                  = $_POST['observaciones'];
        $_ejecutor_asistente             = $_POST['ejecutor_asistente'];
        $_jefe_planta                    = $_POST['jefe_planta'];
        $_titulof1                       = $_POST['titulof1'];
        $_subtitulo_rbpm2                = $_POST['subtitulo_rbpm2'];
        $_codigo_rbpm2                   = $_POST['codigo_rbpm2'];
        $_aprobado_por_rbpm2             = $_POST['aprobado_por_rbpm2'];
        $_fecha_registro_documento_rbpm2 = $_POST['fecha_registro_documento_rbpm2'];
        $_pagina_rbpm2                   = $_POST['pagina_rbpm2'];
        $_lote_rbpm2                     = $_POST['lote_rbpm2'];
        $_doc_identidad                  = $_POST['doc_identidad'];
        $_codmatpri                      = $_POST['codmatpri'];
        $_Fch2telefonocliente            = $_POST['Fch2telefonocliente'];
        $_idCantProdA                    = $_POST['idCantProdA'];
        $_Fch2correo                     = $_POST['Fch2correo'];
        $_Fch2observaciones              = $_POST['Fch2observaciones'];

        $_idTostAuto = $_POST['idTostAuto'];
        $_krsls      = $_POST['krsls'];
        if (strlen($_POST['kggresiduales']) > 0) {$_kggresiduales = $_POST['kggresiduales'];} else { $_kggresiduales = "0.00";}

        $_gramosPendientes             = $_POST['gramosPendientes'];
        $_subSolesTotalProductoAnexos  = $_POST['subSolesTotalProductoAnexos'];
        $_subGramosTotalProductoAnexos = $_POST['subGramosTotalProductoAnexos'];

        $_totalsrvciss = $_POST['totalsrvciss'];
        $_totalcobbls  = $_POST['totalcobbls'];
        $_totalgeneral = $_POST['totalgeneral'];
        $_fk_bpm       = $_POST['fk_bpm'];
        $_accion       = $_POST['accion'];

        
        mysqli_query($conexion, "UPDATE `bpm`
                  SET
                   `codigo`='$_codigo',
                   `aprobado_por` = '$_aprobado_por',
                   `fecha_registro_documento` = '$_fecha_registro_documento',
                   `pagina` = '$_pagina',
                   `lote` = '$_lote',
                   `titulo` = '$_titulo',
                   `subtitulo` = '$_subtitulo',
                   `fecha_atencion` = '$_fecha_atencion',
                   `nombre_cliente` = '$_nombre_cliente',
                   `nombre_usuario` = '$_nombre_usuario',
                   `tipo_cafe` = '$_tipo_cafe',
                   `materia_extraña` = '$_materia_extraña',
                   `plagas_enfermedades` = '$_plagas_enfermedades',
                   `lugar_procedencia` = '$_lugar_procedencia',
                   `peso` = '$_peso',
                   `presentacion` = '$_presentacion',
                   `variedad` = '$_variedad',
                   `condicion_de_transporte` = '$_condicion_de_transporte',
                   `envase` = '$_envase',
                   `certificacion` = '$_certificacion',
                   `fecha_entrega` = '$_fecha_entrega',
                   `humedad` = '$_humedad',
                   `conclusion` = '$_conclusion',

                   `observaciones` = '$_observaciones',
                   `ejecutor_asistente` = '$_ejecutor_asistente',
                   `jefe_planta` = '$_jefe_planta',
                   `estado` = '1',
                   `titulof1` = '$_titulof1',
                   `subtitulo_rbpm2` = '$_subtitulo_rbpm2',
                   `codigo_rbpm2` = '$_codigo_rbpm2',
                   `aprobado_por_rbpm2` = '$_aprobado_por_rbpm2',
                   `fecha_registro_documento_rbpm2` = '$_fecha_registro_documento_rbpm2',
                   `pagina_rbpm2` = '$_pagina_rbpm2',
                   `lote_rbpm2` = '$_lote_rbpm2',

                   `codmatpri` = '$_codmatpri',
                   `Fch2telefonocliente` = '$_Fch2telefonocliente',
                   `idCantProdA` = '$_idCantProdA',
                   `Fch2correo` = '$_Fch2correo',
                   `Fch2observaciones` = '$_Fch2observaciones',

                   `idTostAuto` = '$_idTostAuto',
                   `krsls` = '$_krsls',
                   `kggresiduales` = '$_kggresiduales',
                   `gramosPendientes` = '$_gramosPendientes',
                   `subSolesTotalProductoAnexos` = '$_subSolesTotalProductoAnexos',
                   `subGramosTotalProductoAnexos` = '$_subGramosTotalProductoAnexos',
                   `totalsrvciss` = '$_totalsrvciss',
                   `totalcobbls` = '$_totalcobbls',
                   `totalgeneral` = '$_totalgeneral'


                   WHERE `pk_bpm` = '$_getId';");

        ?><script type="text/javascript">

                  $("#okguardadabpm").removeClass("d-none");
                  setTimeout(function() {
                        $("#okguardadabpm").fadeOut(1500);
                    },2000);
                    setTimeout(function() {
                        location.reload();
                  },3000);
                </script><?php
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
    case "Deletad":
        echo "----   -- ^ --   ----";
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
