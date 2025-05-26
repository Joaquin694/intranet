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

<form method="POST" onsubmit="return updatadinsertfinal(<?php echo $idGetValor ?>);" autocomplete="off">
            <input style="display:none" class="auto" type="text" onclick="updatadinsertfiinal(<?php echo $idGetValor ?>)" value="<?php echo $pk_bpm ?>" id="idbpm">
            <div class="box container" id="ficha1" >            

            <div class="row" style="padding: 0px 10px">
                  <div class="col-xs-12">
                        <i style="border: 1px solid #c3c3c3;padding: 2px 4px; color: #777"  data-toggle="tooltip" data-placement="top" title="Eliminar ficha" class="fa fa-window-close navbar-right" aria-hidden="true"></i>
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
                        <span id="fecha_registro_documento"><?php echo $fecha_registro_documento?></span><br>
                        <!-- -------------------------------------------------- -->
                        <b>Página:</b> <span id="pagina">01</span><br>
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
                        <input id="fechaReceA"  type="date" name="1fecha" class="form-control letraFlaca" value="<?php echo $fecha_atencion;?>">
                        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                  </div>  
                  </div>
                  <!-- -------------------------------------------------- -->
                  <div class="col-xs-12 col-sm-4 col-md-3 ">
                        <div class="form-group has-feedback" >
                              <label >Nombre del cliente:</label>
                              <input id="nombClieA" type="text" name="1nombrecliente" class="form-control letraFlaca" disabled value="<?php echo $nombre_cliente;?>">
                              <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                  </div>
                  <!-- -------------------------------------------------- -->
                  <div class="col-xs-12 col-sm-4 col-md-3 ">
                        <div class="form-group has-feedback" >
                              <label >Nombre de quien recibe:</label>
                              <input id="nombReciA" type="text" name="1quienrecibe" class="form-control letraFlaca" value="<?php echo $nombre_usuario; ?>"  disabled>
                              <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                  </div>
                  <!-- -------------------------------------------------- -->
                  <div class="col-xs-12 col-sm-4 col-md-3 ">
                        <div class="form-group has-feedback" >
                              <label >Tipo de café:</label>
                              <select id="tipoCafeA" class="form-control letraFlaca" name="1cafe" required>
                              <option value="" disabled="" selected="">Seleccione un tipo</option>
                              <option value="Café Pergamino" <?php if($tipo_cafe=="Café Pergamino") {?>  selected <?php }?>>Café Pergamino</option>
                              <option value="Café Oro" <?php if($tipo_cafe=="Café Oro") {?>  selected <?php }?>>Café Oro</option>
                              <option value="Café Tostado" <?php if($tipo_cafe=="Café Tostado") {?>  selected <?php }?>>Café Tostado</option>
                              <option value="Café Natural" <?php if($tipo_cafe=="Café Natural") {?>  selected <?php }?>>Café Natural</option>
                              </select>
                              <span class="glyphicon glyphicon-shopping-cart form-control-feedback"></span>
                        </div>
                  </div> 
                  <!-- -------------------------------------------------- -->
                  <div class="col-xs-12 col-sm-4 col-md-3 ">
                        <div class="form-group has-feedback" >
                              <label >Presencia de materia extraña:</label>
                              <input id="presMateExtrA" type="text" name="1materiaextrana" class="form-control letraFlaca" value="<?php echo $materia_extraña ?>">
                              <span class="glyphicon glyphicon-alert form-control-feedback"></span>
                        </div>                  
                  </div>
                  <!-- -------------------------------------------------- -->
                  <div class="col-xs-12 col-sm-4 col-md-3 ">
                        <div class="form-group has-feedback" >
                              <label >Plagas enfermedades:</label>
                              <input id="plagEnfeA" value="<?php echo $plagas_enfermedades ?>" type="text" name="1materiaextrana" class="form-control letraFlaca" >
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
                              <input id="pesoA" value="<?php echo $peso ?>" onkeyup="inpEsp('pesoA','idCantProdA')"   type='number' step='any' max='9999999' min='0' placeholder='Ingrese la cantidad' style='background:transparent; text-align: left;' class='form-control' >
                              <span class="form-control-feedback"><b>Kg.</b></span>
                        </div>                  
                  </div>
                  <!-- -------------------------------------------------- -->
                  <div class="col-xs-12 col-sm-4 col-md-3 ">
                        <div class="form-group has-feedback" >
                              <label >Presentación:</label>
                              <select id="presenA"  class="form-control letraFlaca" name="1cafe" required>
                              <option value="" disabled="" selected="">Seleccione un tipo</option>
                              <option value="Bolsa" <?php if($presentacion == "Bolsa"){?> selected <?php }?> >Bolsa</option>
                              <option value="Saco" <?php if($presentacion == "Saco"){?> selected <?php }?>>Saco</option>
                              <option value="Yute" <?php if($presentacion == "Yute"){?> selected <?php }?>>Yute</option>              
                              <option value="Otros" <?php if($presentacion == "Otros"){?> selected <?php }?>>Otros</option>              
                              </select>
                              <span class="glyphicon glyphicon-oil  form-control-feedback"></span> 
                        </div>                  
                  </div>
                  <!-- -------------------------------------------------- -->
                  <div class="col-xs-12 col-sm-4 col-md-3 ">
                        <div class="form-group has-feedback" >
                              <label >Variedad/Altitud:</label>
                              <input id="newBpmVariedadAltitud" 
                              onchange="updatead('variedad_altitud','newBpmVariedadAltitud','Variedad/Altitud:','ratide','Fch2rucdni','#mainAlert')" type="text" name="1altitud" class="form-control letraFlaca" autocomplete="on" value="<?php echo $variedad; ?>" required>
                              <span class="glyphicon glyphicon-indent-left form-control-feedback"></span>
                        </div>                  
                  </div>
                  <!-- -------------------------------------------------- -->
                  <div class="col-xs-12 col-sm-4 col-md-3 ">
                        <div class="form-group has-feedback" >
                              <label >Condicion de transporte:</label>
                              <input id="condTranA" value="<?php echo $condicion_de_transporte ?>" type="text" name="1altitud" class="form-control letraFlaca" autocomplete="on" required>
                              <span class="glyphicon glyphicon-plane form-control-feedback"></span>
                        </div>                  
                  </div>
                  <!-- -------------------------------------------------- -->
                  <div class="col-xs-12 col-sm-4 col-md-3 ">
                        <div class="form-group has-feedback" >
                              <label >Envases:</label>
                              <select id="envaA"  class="form-control letraFlaca" name="1cafe" required>
                              <option value="" disabled="" selected="">Seleccione un tipo</option>
                              <option value="Hermetico" <?php if($envase == "Hermetico"){ ?> selected <?php } ?>>Hermético</option>
                              <option value="Limpio" <?php if($envase == "Limpio"){ ?> selected <?php } ?>>Limpio</option>
                              <option value="Integro" <?php if($envase == "Integro"){ ?> selected <?php } ?>>Íntegro</option>
                              </select>
                              <span class="glyphicon glyphicon-oil  form-control-feedback"></span> 
                        </div>                  
                  </div>
                  <!-- -------------------------------------------------- -->
                  <div class="col-xs-12 col-sm-4 col-md-3 centrate">
                        <div class="form-group has-feedback" style="border-radius: 20px; border: 1px solid #c3c3c3">
                              <div class="radio" id="">
                                    <label>
                                    <input type="radio" value="Si" id="rdbtTipoCertA" name="rdbtTipoCertA" <?php if($certificacion == "Si"){ ?> checked="checked" <?php }?>>
                                    Certificado de calidad
                                    </label>                                
                                    <!-- ---------------------------------- -->
                                    <label>
                                    <input type="radio" value="No" id="rdbtTipoCertA" name="rdbtTipoCertA" <?php if($certificacion == "No"){ ?> checked="checked" <?php }?>>Certificación orgánica
                                    </label>
                              </div>
                        </div>                  
                  </div>
                  <!-- -------------------------------------------------- -->
                  <div class="col-xs-12 col-sm-4 col-md-3 ">
                        <div class="form-group has-feedback" >
                              <label >Fecha de entrega:</label>
                              <input  oninput="codrb(),codmapri()" id="fechEntrA" value="<?php echo $fecha_entrega ?>"  style="color: red; font-weight: 700" type="datetime" name="1fechaentrega" class="form-control letraFlaca" required>
                              <span class="glyphicon glyphicon-calendar form-control-feedback"></span>  
                        </div>                  
                  </div>
                  <!-- -------------------------------------------------- -->
                  <div class="col-xs-12 col-sm-4 col-md-3 ">
                        <div class="form-group has-feedback" >
                              <label >Humedad:</label>
                              <input id="humeA" value="<?php echo $humedad ?>" type="text" name="1humedad" class="form-control letraFlaca" autocomplete="on" required>
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
                                        <input type="radio" value="Si" name="conclusionA" <?php if($conclusion == "Si"){?>checked="checked" <?php }?>>
                                          Aceptado
                                    </label> &nbsp;&nbsp;|&nbsp;&nbsp;   
                                    <label>
                                          <input type="radio" value="No" name="conclusionA" <?php if($conclusion == "No"){?>checked="checked" <?php }?>>
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
                              <input id="observacionesF1A" value="<?php echo $observaciones ?>" type="text" name="1observaciones" class="form-control letraFlaca" rows="1">
                              <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                        </div>                  
                  </div>
                  <!-- -------------------------------------------------- -->
                  <div class="col-xs-12 col-sm-6 col-md-6 centrate">
                        <div class="form-group has-feedback " >
                              <img src="vistas/img/firmas/alex.jpg" style="width: 170px">
                              <center><div class="rayavertical"></div></center>
                              <span id="ejecutor_asistente"><?php echo $ejecutor_asistente?></span>
                        </div>                  
                  </div>
                  <!-- -------------------------------------------------- -->
                  <div class="col-xs-12 col-sm-6 col-md-6 centrate">
                        <div class="form-group has-feedback " >
                              <img src="vistas/img/firmas/liz.png" style="width: 170px">
                              <center><div class="rayavertical"></div></center>
                              <span id="jefe_planta"><?php echo $jefe_planta?></span>
                        </div>                  
                  </div>
                  <input type="text" name="doc_identidad" value="<?php echo $doc_identidad?>" class="hidden">
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
                              <h4 ><span id="titulof1"><?php echo $titulof1?></span> <br><span id="subtitulo_rbpm2"><?php echo $subtitulo_rbpm2 ?></span></h4>
                        </div>
                        <div class="col-xs-4 letra14" >
                              <b>Código:</b> <span id="codigo_rbpm2"><?php echo $codigo_rbpm2?></span><br>
                              <!-- -------------------------------------------------- -->
                              <b>Aprobado por:</b> <span id="aprobado_por_rbpm2"><?php echo $subtitulo_rbpm2?></span><br>
                              <!-- -------------------------------------------------- -->
                              <b>Fecha: </b> 
                              <span id="fecha_registro_documento_rbpm2"><?php echo $fecha_registro_documento_rbpm2 ?></span><br>
                              <!-- -------------------------------------------------- -->
                              <b>Página:</b> <span id="pagina_rbpm2"><?php echo $pagina_rbpm2?></span><br>
                        </div>
                  </div>
                  <!-- -------------------------------------------------- -->
                  <!-- SUBCABEZA VERDE -->
                  <!-- -------------------------------------------------- -->
                  <div class="row  letra16" style="padding: 2px 10px; background: #a51c0b!important;color: white">                    
                        <div class="col-xs-4 centrate" >
                              <b>LOTE </b>PT-<span id="lote_rbpm2"><?php echo $lote_rbpm2; ?>
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
                                    <input type="text" name="Fch2nombrecliente" class="form-control letraFlaca" value="<?php echo $nombre_cliente;?>" disabled>
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                              </div>  
                        </div>
                        <!-- -------------------------------------------------- -->
                        <div class="col-xs-12 col-sm-4 col-md-3 ">
                              <div class="form-group has-feedback" >
                                    <label class="lablgnrl">RUC/DNI:</label>
                                    <input value="<?php echo $doc_identidad;?>" type="text" id="Fch2rucdni" class="form-control letraFlaca"  disabled>
                                    <span class="glyphicon glyphicon-list-alt form-control-feedback"></span>
                              </div>
                        </div>
                        <!-- -------------------------------------------------- -->
                        <div class="col-xs-12 col-sm-4 col-md-3 ">
                              <div class="form-group has-feedback" >
                                    <label class="lablgnrl">Codigo de materia prima:</label>
                                    <input id="codmatpri" type="text" name="Fch2codigomateriaprima" class="form-control letraFlaca" value="<?php echo $codmatpri ?>" disabled >
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
                                    <input id="idCantProdA" value="<?php echo $idCantProdA ?>" type="text" name="Fch2cantidadpro" class="form-control letraFlaca"  disabled>
                                    <span class="form-control-feedback"><b>Kg.</b></span>
                              </div>                  
                        </div>
                        <!-- -------------------------------------------------- -->                    
                        <div class="col-xs-12 col-sm-4 col-md-3 ">
                              <div class="form-group has-feedback" >
                                    <label class="lablgnrl">Correo electrónico:</label>
                                    <input value="<?php echo $Fch2correo; ?>" type="email" id="Fch2correo" name="Fch2correo" class="form-control letraFlaca"  disabled>
                                    <span class="form-control-feedback">@</span>
                              </div>                  
                        </div>
                        <!-- -------------------------------------------------- -->
                        <div class="col-xs-12 col-sm-8 col-md-6 ">
                              <div class="form-group has-feedback" >
                                    <label class="lablgnrl">Observaciones</label>
                                    <input type="text" id="Fch2observaciones" value="<?php echo $Fch2observaciones?>" name="Fch2observaciones" class="form-control letraFlaca" rows="1">
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
                                                            
                                                            $recojeidservices=9999;
                                                            $recojeid_sab=9;
                                                            $countis=999;
                                                            $countis2=66666;
                                                            $cunqa=100;
                                                            $idparajalarnom=9999999;
                                                            # code...
                                                            while ($rows=mysqli_fetch_row($ejserv)){
                                                                  
                                                                  $punqa=$rows[2];
                                                                  $cunqa=$cunqa+1;  
                                                                  $countis=$countis+1;
                                                                  $countis2=$countis2+1;
                                                                  $eliddelconsultadoservice=$rows[0];

                                                                  
                                                                  $idparajalarnom=$idparajalarnom+1;
                                                                  $recojeidservices=$recojeidservices+1;

                                                                  if ($rows[3]==="Costo fijo") {
                                                                  # code...
                                                                  $tipocobro="<p id='$cunqa'>1</p>";
                                                                  }else{
                                                                  $tipocobro="<p id='$cunqa' contenteditable='true'></p>";
                                                                  }
                                                                  // ======================  IDENTIFICANDO SERVI ANEXOS  ====
                                                                  $csab = "SELECT * FROM `servicios_anexos_bpm` INNER JOIN service ON fk_services=idService
                                                                        WHERE fk_bpm='$idGetValor' AND fk_services='$eliddelconsultadoservice'";
                                                                        
                                                                        $consulta_sab = $conexion->query($csab);
                                                                        $rows2 = mysqli_fetch_row($consulta_sab);

                                                                        $recojeid_sab=$recojeid_sab+1;
                                                                        $idFKservAnx= $rows2[6];
                                                                        $cantservanxx=$rows2[3];
                                                                        $ttlservanxx= $rows2[4];
                                                                              if ($rows2[10]==="Costo fijo") {
                                                                              # code...
                                                                              $tipocobro2="<p id='$countis2'>1</p>";
                                                                              }else{
                                                                              $tipocobro2="<p id='$countis2' contenteditable='true'>$cantservanxx</p>";
                                                                              }

                                                                        if ($idFKservAnx) {
                                                                              # code...
                                                                               ?>
                                                                              
                                                                                    <tr class="icoMano">
                                                                                    <td >      
                                                                                          <input checked="checked" class="<?php echo $countis2; ?>" type="checkbox" class="form-check-input" id="checksrvs" name="checksrvs" value="<?php echo $rows[0] ;?>" 
                                                                                          onclick="crpse(<?php echo $punqa ?>,<?php echo $countis2 ?>,<?php echo $countis ?>,<?php echo $idparajalarnom ?>,<?php echo $recojeidservices ;?>,<?php echo $recojeid_sab ;?>)" >
                                                                                    </td>
                                                                                    <td style="display:none !important;" id="<?php echo $recojeidservices ;?>"><?php echo $rows[0] ;?></td>
                                                                                    <td style="display:none !important;" id="<?php echo $recojeid_sab ;?>"><?php echo $rows2[0] ;?></td>
                                                                                    <td id="<?php echo $idparajalarnom ?>"><?php echo $rows[1] ;?></td>
                                                                                    <td>S/ <?php echo $rows[2] ;?></td>
                                                                                    <td ><?php echo $tipocobro2;?></td>
                                                                                    <td><p id="<?php echo $countis?>"><?php echo $ttlservanxx ?></p></td>       
                                                                                    </tr> 
                                                                  <?php
                                                                        }else{ ?>
                                                                              
                                                                                    <tr class="icoMano">
                                                                                    <td >      
                                                                                          <input class="<?php echo $cunqa; ?>" type="checkbox" class="form-check-input" id="checksrvs" name="checksrvs" value="<?php echo $rows[0] ;?>" 
                                                                                          onclick="crpse(<?php echo $punqa ?>,<?php echo $cunqa ?>,<?php echo $countis ?>,<?php echo $idparajalarnom ?>,<?php echo $recojeidservices ;?>,<?php echo $recojeid_sab ;?>)" >
                                                                                    </td>
                                                                                    <td style="display:none !important;" id="<?php echo $recojeidservices ;?>"><?php echo $rows[0] ;?></td>
                                                                                    <td style="display:none !important;" id="<?php echo $recojeid_sab ;?>"><?php echo $rows2[0] ;?></td>
                                                                                    <td id="<?php echo $idparajalarnom ?>"><?php echo $rows[1] ;?></td>
                                                                                    <td>S/ <?php echo $rows[2] ;?></td>
                                                                                    <td ><?php echo $tipocobro ;?></td>
                                                                                    <td><p id="<?php echo $countis?>"></p></td>       
                                                                                    </tr> 
                                                                  <?php
                                                                        }

                                                                  ?>
                                                                  
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
                                    <H2  title='Monto cobrar por bolsas' style='float: right !important;'><B id='enviarsexi'>TOTAL</B> S/ <span id="totalsrvciss"><?php echo $totalsrvciss?></span></H2>
                                    
                              </div>                  
                        </div>
                        <!-- -------------------------------------------------- -->
                        <div class="col-xs-12 col-sm-12 col-md-12 ">
                              <div class="form-group has-feedback" >
                                    <hr style="color: #c3c3c3">
                                    <h4 class="nubesubtitulo">Productos</h4>
                              </div>                  
                        </div>
                        <!-- -------------------------------------------------- -->
                        <div class="col-xs-12 col-sm-3 col-md-3 ">
                              <div class="form-group has-feedback" >
                                    <label class="lablgnrl">Precio venta:</label>
                                    <input id="idCobrarCjs" value="<?php echo $idCobrarCjs ?>" type="text" name="" class="form-control letraFlaca"  disabled>
                                    <span class="form-control-feedback"><b>S/</b></span>
                              </div>                  
                        </div>
                        <!-- -------------------------------------------------- -->
                        <div class="col-xs-12 col-sm-3 col-md-3 ">
                              <div class="form-group has-feedback" >
                                    <label class="lablgnrl">Cantidad:</label>
                                    <input id="idCantidadCjs" value="<?php echo $idCantidadCjs ?>" type="number" id="cantidad_pab" name="cantidad_pab" class="form-control letraFlaca"  >
                                    <span class="form-control-feedback"><b>N°</b></span>
                              </div>                  
                        </div>
                        <!-- -------------------------------------------------- -->
                        <div class="col-xs-12 col-sm-3 col-md-3 ">
                              <div class="form-group has-feedback" >
                                    <label >Capacidad:</label>
                                    <select  class="form-control letraFlaca" id="capacidad_pab" name="capacidad_pab" required>
                                          <option value="" disabled="" selected="">Seleccione un tipo</option>
                                          <option value="1kg" <?php if($capacidad_pab == "1kg"){ ?> selected <?php } ?>>1kg</option>
                                          <option value="5kg" <?php if($capacidad_pab == "5kg"){ ?> selected <?php } ?>>5kg</option>
                                    </select>
                                    <span class="glyphicon glyphicon-book  form-control-feedback"></span> 
                              </div>                  
                        </div>
                        <!-- -------------------------------------------------- -->
                        <div class="col-xs-12 col-sm-3 col-md-3 ">
                              <div class="form-group has-feedback" >
                                    <label >Cajas:</label>
                                    <select  class="form-control letraFlaca" id="cajas_pab" name="cajas_pab" required>
                                          <option value="" disabled="" selected="">Seleccione un tipo</option>
                                          <option value="Caja Tipo A" <?php if($cajas_pab == "Caja Tipo A"){ ?> selected <?php } ?>>Caja Tipo A</option>
                                          <option value="Caja Tipo B" <?php if($cajas_pab == "Caja Tipo B"){ ?> selected <?php } ?>>Caja Tipo B</option>
                                    </select>
                                    <span class="glyphicon glyphicon-book  form-control-feedback"></span> 
                              </div>                  
                        </div>
                        <!-- -------------------------------------------------- -->
                        <div class="col-xs-12 col-sm-12 col-md-12 ">
                              <div class="form-group has-feedback" >
                                    <hr style="color: #c3c3c3">
                              </div>                  
                        </div>
                        <!-- -------------------------------------------------- -->
                        <div class="col-xs-12 col-sm-3 col-md-2 ">
                              <div class="form-group has-feedback" >
                                    <label class="lablgnrl">KG Tostado automático:</label>
                                    <input id="idTostAuto" value="<?php echo $idTostAuto?>" type="text" name="Fch2cantidadpro" class="form-control letraFlaca"  disabled>
                                    <span class="glyphicon glyphicon-scale form-control-feedback"></span>
                              </div>                  
                        </div>
                              <!-- -------------------------------------------------- -->
                        <div class="col-xs-12 col-sm-3 col-md-2 ">
                              <div class="form-group has-feedback">
                                    <label class="lablgnrl">KG residuales:</label>
                                    <input id="krsls" value="<?php echo $krsls?>" type="text" name="krsls" class="form-control letraFlaca" disabled style="border-radius: 0px 15px  15px 0px;border: 1px solid red">
                                    <span class="glyphicon glyphicon-equalizer  form-control-feedback"></span>
                              </div>                  
                              </div>
                        <!-- -------------------------------------------------- -->
                        <div class="col-xs-12 col-sm-2 col-md-2 ">
                              <div class="form-group has-feedback">
                                    <label class="lablgnrl">KG->(g) residuales:</label>
                                    <input id="kggresiduales" value="<?php echo $kggresiduales?>" type="text" name="kggresiduales" class="form-control letraFlaca" disabled style="border-radius: 0px 15px  15px 0px;border: 1px solid red">
                                    <span class="glyphicon glyphicon-equalizer  form-control-feedback"></span>
                              </div>                  
                        </div>
                        <!-- -------------------------------------------------- -->
                        <!-- -------------------------------------------------- -->
                        <div class="col-xs-12 col-sm-4 col-md-3 ">
                              <div class="form-group has-feedback" >
                                    <label >Tipo molido:</label>
                                    <select  class="form-control letraFlaca" id="tipo_molido_pab" name="1cafe" required>
                                          <option value="" disabled="" selected="">Seleccione un tipo</option>
                                          <option value="Molido Expreso" <?php if($tipo_molido_pab == "Molido Expreso"){ ?> selected <?php } ?>>Molido Expreso</option>
                                          <option value="Molido fino" <?php if($tipo_molido_pab == "Molido fino"){ ?> selected <?php } ?>>Molido fino</option>
                                          <option value="Molido medio" <?php if($tipo_molido_pab == "Molido medio"){ ?> selected <?php } ?>>Molido medio</option>
                                          <option value="Molido Grueso" <?php if($tipo_molido_pab == "Molido Grueso"){ ?> selected <?php } ?>>Molido Grueso</option>
                                          <option value="Otro" <?php if($tipo_molido_pab == "Otro"){ ?> selected <?php } ?>>Otros</option>              
                                    </select>
                                    <span class="glyphicon glyphicon-oil  form-control-feedback"></span> 
                              </div>                  
                        </div>
                        <!-- -------------------------------------------------- -->
                        <div class="col-xs-12 col-sm-4 col-md-3 ">
                              <div class="form-group has-feedback" >
                                    <label >Tipo tostado:</label>
                                    <select  class="form-control letraFlaca" id="tipo_tostado_pab" name="1cafe" required>
                                          <option value="" disabled="" selected="">Seleccione un tipo</option>
                                          <option value="Claro" <?php if($tipo_tostado_pab == "Claro"){ ?> selected <?php } ?>>Claro</option>
                                          <option value="Medio" <?php if($tipo_tostado_pab == "Medio"){ ?> selected <?php } ?>>Medio</option>
                                          <option value="Oscuro" <?php if($tipo_tostado_pab == "Oscuro"){ ?> selected <?php } ?>>Oscuro</option>
                                    </select>
                                    <span class="glyphicon glyphicon-oil  form-control-feedback"></span> 
                              </div>                  
                        </div>
                  <!-- --------------------MODULO PRODUCTOS------------------------------ -->
                  <div id="newCalculate" class="row">
                        <div class="col-xs-12 col-sm-3 col-md-2 " >
                              <img class="rotar8" src="https://static.wixstatic.com/media/ba3b74_9e36c97c9dfe441ea37e8785f0401477~mv2.jpg" style="width: 90px">
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-2 ">
                              <div class="form-group has-feedback">
                                    <label class="lablgnrl">Precio venta:</label>
                                    <input type="text" name="precioV" id="idprecioV" value="<?php echo $idprecioV?>" class="form-control letraFlaca" disabled>
                                    <span class="form-control-feedback">S/</span>
                              </div>  
                        </div>
                        <!-- -------------------------------------------------- -->
                        <div class="col-xs-12 col-sm-3 col-md-2 ">
                              <div class="form-group has-feedback">
                                    <label class="lablgnrl">Capacidad:</label>
                                    <input type="text" name="capaBolsas" id="capaBolsas" value="<?php echo $capaBolsas?>" class="form-control letraFlaca" disabled>
                                    <span class="glyphicon glyphicon-tags form-control-feedback"></span>
                              </div>  
                        </div>
                        <!-- -------------------------------------------------- -->
                        <div class="col-xs-12 col-sm-3 col-md-2 ">
                              <div class="form-group has-feedback">
                                    <label class="lablgnrl">Cantidad bolsas:</label>
                                    <input autocomplete="off" type="text" tabindex="2" name="cntdblss" id="idcntdblss" value="<?php echo $idcntdblss?>" class="form-control letraFlaca focusNext"  required>
                                    <span class="form-control-feedback"><b>N°</b></span>
                              </div>  
                        </div>
                        <!-- -------------------------------------------------- -->
                        <div class="col-xs-12 col-sm-3 col-md-4 ">
                              <div class="form-group has-feedback">
                                    <label class="lablgnrl">Nom. bolsa 1:</label>
                                    <input type="text" tabindex="1" name="idnombolaz" id="idnombolaz" value="<?php echo $idnombolaz?>" class="form-control letraFlaca focusNext">
                                    <span class="glyphicon glyphicon-inbox form-control-feedback"></span>
                              </div>  
                        </div>
                  </div>
                  <div class="row"   id="repBls" >
                        <div class="col-xs-12 col-sm-3 col-md-2 " >
                              <img class="rotar8" src="https://http2.mlstatic.com/bolsa-para-cafe-molido-dif-colores-mate-500g-x100-pz-D_NQ_NP_15412-MLM20102244351_052014-F.jpg" style="width: 90px">
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-2 ">
                              <div class="form-group has-feedback">
                                    <label class="lablgnrl">Precio venta:</label>
                                    <input type="text" name="precioV" id="2idprecioV" value="<?php echo $idprecioV2?>" class="form-control letraFlaca" disabled>
                                    <span class="form-control-feedback">S/</span>
                              </div>  
                        </div>
                        <!-- -------------------------------------------------- -->
                        <div class="col-xs-12 col-sm-3 col-md-2 ">
                              <div class="form-group has-feedback">
                                    <label class="lablgnrl">Capacidad:</label>
                                    <input type="text" name="capaBolsas" id="2capaBolsas" value="<?php echo $capaBolsas2?>" class="form-control letraFlaca" disabled>
                                    <span class="glyphicon glyphicon-tags form-control-feedback"></span>
                              </div>  
                        </div>
                        <!-- -------------------------------------------------- -->
                        <div class="col-xs-12 col-sm-3 col-md-2 ">
                              <div class="form-group has-feedback">
                                    <label class="lablgnrl">Cantidad bolsas:</label>
                                    <input autocomplete="off" type="text" tabindex="4" name="cntdblss" id="2idcntdblss" value="<?php echo $idcntdblss2?>" class="form-control letraFlaca focusNext">
                                    <span class="form-control-feedback"><b>N°</b></span>
                              </div>  
                        </div>
                        <!-- -------------------------------------------------- -->
                        <div class="col-xs-12 col-sm-3 col-md-4 ">
                              <div class="form-group has-feedback">
                                    <label class="lablgnrl">Nom. bolsa 2:</label>
                                    <input type="text" tabindex="3" name="idnombolaz" id="idnombolaz2" value="<?php echo $idnombolaz2?>" class="form-control letraFlaca focusNext">
                                    <span class="glyphicon glyphicon-inbox form-control-feedback"></span>
                              </div>  
                        </div> 
                  </div>  
                  <!-- 3 -->        
                  <div class="row"   id="3inpclcbls" >
                        <div class="col-xs-12 col-sm-3 col-md-2 " >
                              <img class="rotar8" src="https://http2.mlstatic.com/bolsa-para-cafe-molido-dif-colores-mate-500g-x100-pz-D_NQ_NP_15412-MLM20102244351_052014-F.jpg" style="width: 90px">
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-2 ">
                              <div class="form-group has-feedback">
                                    <label class="lablgnrl">Precio venta:</label>
                                    <input type="text" name="precioV" id="3idprecioV" value="<?php echo $idprecioV3?>" class="form-control letraFlaca" disabled>
                                    <span class="form-control-feedback">S/</span>
                              </div>  
                        </div>
                        <!-- -------------------------------------------------- -->
                        <div class="col-xs-12 col-sm-3 col-md-2 ">
                              <div class="form-group has-feedback">
                                    <label class="lablgnrl">Capacidad:</label>
                                    <input type="text" name="capaBolsas" id="3capaBolsas" value="<?php echo $capaBolsas3?>" class="form-control letraFlaca" disabled>
                                    <span class="glyphicon glyphicon-tags form-control-feedback"></span>
                              </div>  
                        </div>
                        <!-- -------------------------------------------------- -->
                        <div class="col-xs-12 col-sm-3 col-md-2 ">
                              <div class="form-group has-feedback">
                                    <label class="lablgnrl">Cantidad bolsas:</label>
                                    <input autocomplete="off" type="text" tabindex="6" name="cntdblss" value="<?php echo $idcntdblss3?>" id="3idcntdblss" class="form-control letraFlaca focusNext" >
                                    <span class="form-control-feedback"><b>N°</b></span>
                              </div>  
                        </div>
                        <!-- -------------------------------------------------- -->
                        <div class="col-xs-12 col-sm-3 col-md-4 ">
                              <div class="form-group has-feedback">
                                    <label class="lablgnrl">Nom. bolsa 3:</label>
                                    <input type="text" tabindex="5" name="idnombolaz" id="idnombolaz3" value="<?php echo $idnombolaz3?>" class="form-control letraFlaca focusNext">
                                    <span class="glyphicon glyphicon-inbox form-control-feedback"></span>
                              </div>  
                        </div> 
                  </div>  
                  <!-- 4 -->
                  <div class="row"   id="4inpclcbls" >
                        <div class="col-xs-12 col-sm-3 col-md-2 " >
                              <img class="rotar8" src="https://http2.mlstatic.com/bolsa-para-cafe-molido-dif-colores-mate-500g-x100-pz-D_NQ_NP_15412-MLM20102244351_052014-F.jpg" style="width: 90px">
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-2 ">
                              <div class="form-group has-feedback">
                                    <label class="lablgnrl">Precio venta:</label>
                                    <input type="text" name="precioV" id="4idprecioV" value="<?php echo $idprecioV4?>" class="form-control letraFlaca" disabled>
                                    <span class="form-control-feedback">S/</span>
                              </div>  
                        </div>
                        <!-- -------------------------------------------------- -->
                        <div class="col-xs-12 col-sm-3 col-md-2 ">
                              <div class="form-group has-feedback">
                                    <label class="lablgnrl">Capacidad:</label>
                                    <input type="text" name="capaBolsas" id="4capaBolsas" value="<?php echo $capaBolsas4?>" class="form-control letraFlaca" disabled>
                                    <span class="glyphicon glyphicon-tags form-control-feedback"></span>
                              </div>  
                        </div>
                        <!-- -------------------------------------------------- -->
                        <div class="col-xs-12 col-sm-3 col-md-2 ">
                              <div class="form-group has-feedback">
                                    <label class="lablgnrl">Cantidad bolsas:</label>
                                    <input autocomplete="off" type="text" tabindex="8" name="cntdblss" id="4idcntdblss" value="<?php echo $idcntdblss4?>" class="form-control letraFlaca focusNext" >
                                    <span class="form-control-feedback"><b>N°</b></span>
                              </div>  
                        </div>
                        <!-- -------------------------------------------------- -->
                        <div class="col-xs-12 col-sm-3 col-md-4 ">
                              <div class="form-group has-feedback">
                                    <label class="lablgnrl">Nom. bolsa 4:</label>
                                    <input type="text" tabindex="7" name="idnombolaz" id="idnombolaz4" value="<?php echo $idnombolaz4?>" class="form-control letraFlaca focusNext">
                                    <span class="glyphicon glyphicon-inbox form-control-feedback"></span>
                              </div>  
                        </div> 
                  </div>  
                  <!-- 5 -->
                  <div class="row"   id="5inpclcbls" >
                        <div class="col-xs-12 col-sm-3 col-md-2 " >
                              <img class="rotar8" src="https://http2.mlstatic.com/bolsa-para-cafe-molido-dif-colores-mate-500g-x100-pz-D_NQ_NP_15412-MLM20102244351_052014-F.jpg" style="width: 90px">
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-2 ">
                              <div class="form-group has-feedback">
                                    <label class="lablgnrl">Precio venta:</label>
                                    <input type="text" name="precioV" id="5idprecioV" value="<?php echo $idprecioV5?>" class="form-control letraFlaca" disabled>
                                    <span class="form-control-feedback">S/</span>
                              </div>  
                        </div>
                        <!-- -------------------------------------------------- -->
                        <div class="col-xs-12 col-sm-3 col-md-2 ">
                              <div class="form-group has-feedback">
                                    <label class="lablgnrl">Capacidad:</label>
                                    <input type="text" name="capaBolsas" id="5capaBolsas" value="<?php echo $capaBolsas5?>" class="form-control letraFlaca" disabled>
                                    <span class="glyphicon glyphicon-tags form-control-feedback"></span>
                              </div>  
                        </div>
                        <!-- -------------------------------------------------- -->
                        <div class="col-xs-12 col-sm-3 col-md-2 ">
                              <div class="form-group has-feedback">
                                    <label class="lablgnrl">Cantidad bolsas:</label>
                                    <input autocomplete="off" type="text" tabindex="10" name="cntdblss" id="5idcntdblss" value="<?php echo $idcntdblss5?>" class="form-control letraFlaca focusNext" >
                                    <span class="form-control-feedback"><b>N°</b></span>
                              </div>  
                        </div>
                        <!-- -------------------------------------------------- -->
                        <div class="col-xs-12 col-sm-3 col-md-4 ">
                              <div class="form-group has-feedback">
                                    <label class="lablgnrl">Nom. bolsa 5:</label>
                                    <input type="text" tabindex="9" name="idnombolaz" id="idnombolaz5" value="<?php echo $idnombolaz5?>" class="form-control letraFlaca focusNext">
                                    <span class="glyphicon glyphicon-inbox form-control-feedback"></span>
                              </div>  
                        </div> 
                  </div>  
            
            

                  <!-- -------------------------------------------------- -->
                  <div class="col-xs-12 col-sm-12 col-md-12 ">
                        <center> <p id="enpaquetado" style="font-size: 20px; padding: 12px 6px; border: 2px dashed #c3c3c3;display: table;color: #c3c3c3;margin-bottom: 5px;font-weight: 100;display: none;" class="rotar13n">Enpaquetado exitoso</p></center>
                        <H2 title='Monto cobrar por bolsas'><B>TOTAL</B> S/ <span id="totalcobbls"><?php echo $totalcobbls?></span></H2>
                                                <hr style="color: #c3c3c3">
                  </div>
            
                  <!-- -------------------------------------------------- -->
                  <div class="col-xs-12 col-sm-12 col-md-12">
                        <center>
                              <H2 title='Monto cobrar por bolsas'><B>TOTAL GENERAL</B> S/ <span id="totalgeneral"><?php echo $totalgeneral?></span></H2>
                        </center>
                  </div>
                  <script>
                        $(document).ready(function(){
                              
                              
                              setInterval(function(){
                                    var totalproducto= parseFloat(document.getElementById("totalcobbls").innerHTML);
                                    var totalservicio= parseFloat(document.getElementById("totalsrvciss").innerHTML);

                                    var totalgeneral = (parseFloat(totalproducto+totalservicio)).toFixed(2);
                                    if(isNaN(totalgeneral)){
                                          totalgeneral = totalservicio;
                                    }

                                    $('#totalgeneral').text(totalgeneral);

                              }, 1000);

                              document.addEventListener('keypress', function(evt) {

                              // Si el evento NO es una tecla Enter
                              if (evt.key !== 'Enter') {
                              return;
                              }

                              let element = evt.target;

                              // Si el evento NO fue lanzado por un elemento con class "focusNext"
                              if (!element.classList.contains('focusNext')) {
                              return;
                              }

                              // AQUI logica para encontrar el siguiente
                              let tabIndex = element.tabIndex + 1;
                              var next = document.querySelector('[tabindex="'+tabIndex+'"]');

                              // Si encontramos un elemento
                              if (next) {
                              next.focus();
                              event.preventDefault();
                              }
                              });
                        });
                  </script>
            
                  <div class="col-xs-12 col-sm-12 col-md-12">
                        <center>
                              <input id="btnGuardar" onkeypress="return pulsar(event)" type="submit" value="Guardar" class="btn btn-primary btn-lg" >
                        </center>
                  </div>
            
                  <!-- -------------------------------------------------- -->
                  <div class="col-xs-12 col-sm-4 col-md-3 ">
                        <div class="form-group has-feedback" >
                              
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
</form>

