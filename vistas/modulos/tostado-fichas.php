<?php 

/*Evaluamos si el ultimo registro esta cerrado

*0=Incompleto

*1=Cerrado

*/

#CONSULT ULT PERS POR DNI Y TOMAMOS ID PERSONA    



$query = "SELECT * FROM `bpm`";

$result = $conexion->query($query);

$estadoUltimaFicha='2';

# code...

while ($rowt=mysqli_fetch_row($result)){$estadoUltimaFicha=$rowt[29];}

/* ----------------------------------------------------------------------*/

if (($estadoUltimaFicha==='1') OR ($estadoUltimaFicha==='2')) { 
  /*FICHA VIRGEN ya que el último registro fue guardado completo estado 1=cerrado*/ 

?>

<!-- ===========================================================================

======================  FICHA 1                                                                        ================================================= -->

        <style type="text/css">
          label{
            color: #c3c3c3 !important;;
          }
        </style>
        <div class="box container" id="ficha1" >            



              <div class="row" style="padding: 0px 10px">

                    <div class="col-xs-12">
                                    <i  style="border: 1px solid #c3c3c3;padding: 2px 4px; color: #c3c3c3"  data-toggle="tooltip" data-placement="top" title="Estado del documento" class="fa fa-circle navbar-right icoMano" aria-hidden="true"></i>
                                    <i  style="border: 1px solid #c3c3c3;padding: 2px 4px; color: #777"  data-toggle="tooltip" data-placement="top" title="Reportes e indicadores" class="fa fa-bar-chart navbar-right icoMano" aria-hidden="true"> Reportes</i>
                                    <i onclick="redireccionar('tostado')" style="border: 1px solid #c3c3c3;padding: 2px 4px; color: #777"  data-toggle="tooltip" data-placement="top" title="Crear" class="fa fa-plus-square-o navbar-right icoMano" aria-hidden="true"> Crear</i>
                                    <i onclick="redireccionar('bpmhistorial')" style="border: 1px solid #c3c3c3;padding: 2px 4px; color: #777"  data-toggle="tooltip" data-placement="top" title="Ver Histórico" class="fa fa-search navbar-right icoMano" aria-hidden="true"> Buscar</i>
                    </div>                   

                    <div class="col-xs-4 centrate">

                          <img id="logo" src="vistas/img/plantilla/A1logoMoali.png"  >

                    </div>

                    <div class="col-xs-4 centrate bordeDI">

                          <h4 id="titulof1">MANUAL DE BPM <br><span >RECEPCIÓN DE MATERIA PRIMA</span></h4>

                    </div>

                    <div class="col-xs-4 letra14" >

                          <b>Código:</b> LM-BPM-R-02<br>

                          <!-- -------------------------------------------------- -->

                          <b>Aprobado por:</b> RODAS MOALI, ALEX<br>

                          <!-- -------------------------------------------------- -->

                          <b>Fecha: </b> 

                          <?php echo $hoydia.'/'.$hoymes.'/'.date('Y') ?><br>

                          <!-- -------------------------------------------------- -->

                          <b>Página:</b> 01<br>

                    </div>

              </div>

              <!-- -------------------------------------------------- -->

              <!-- SUBCABEZA VERDE -->

              <!-- -------------------------------------------------- -->

              <div class="row  letra16" style="padding: 2px 10px; background: #528035;color: white">                   

                    <div class="col-xs-4 centrate" >

                          <b>LOTE </b>MP-000000000  

                    </div>

                    <!-- -------------------------------------------------- -->

                    <div class="col-xs-4 centrate" >

                          <b>RBPM </b>N°1  

                    </div>

                    <!-- -------------------------------------------------- -->

                    <div class="col-xs-4 centrate" >

                          <b class="bolitarayaderecha" style="border: 1px solid white">Ficha 1</b><a style="color: white;font-weight: 900;border: 1px solid white;border-radius: 0px 50px 50px 0px;padding-left: 6px;padding-right: 6px" href="#ficha2"> <i class="fa fa-hand-o-down" aria-hidden="true"></i>

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

                              <input disabled  type="date" name="1fecha" class="form-control letraFlaca">

                              <span class="glyphicon glyphicon-calendar form-control-feedback"></span>

                        </div>  

                    </div>

                    <!-- -------------------------------------------------- -->

                     <div class="col-xs-12 col-sm-4 col-md-3 ">

                          <div class="form-group has-feedback" data-toggle="modal" data-target="#modalFichaBpm">

                                <label >Nombre del cliente:</label>

                                <input  type="text" name="1nombrecliente" class="form-control letraFlaca">

                                <span class="glyphicon glyphicon-user form-control-feedback"></span>

                          </div>

                     </div>

                    <!-- -------------------------------------------------- -->

                     <div class="col-xs-12 col-sm-4 col-md-3 ">

                          <div class="form-group has-feedback" >

                                <label >Nombre de quien recibe:</label>

                                <input disabled type="text" name="1quienrecibe" class="form-control letraFlaca" value="<?php echo $_SESSION['nombre']; ?>"  disabled>

                                <span class="glyphicon glyphicon-user form-control-feedback"></span>

                          </div>

                    </div>

                    <!-- -------------------------------------------------- -->

                     <div class="col-xs-12 col-sm-4 col-md-3 ">

                          <div class="form-group has-feedback" >

                                <label >Tipo de café:</label>

                                <select disabled  class="form-control letraFlaca" name="1cafe" required>

                                     <option value="" disabled="" selected="">Seleccione un tipo</option>

                                    <option value="Café Pergamino">Café Pergamino</option>

                                    <option value="Café Oro">Café Oro</option>

                                    <option value="Café Tostado">Café Tostado</option>

                                    <option value="Café  Natural">Café  Natural</option>              

                                </select>

                                <span class="glyphicon glyphicon-shopping-cart form-control-feedback"></span>

                          </div>

                    </div> 

                    <!-- -------------------------------------------------- -->

                    <div class="col-xs-12 col-sm-4 col-md-3 ">

                          <div class="form-group has-feedback" >

                                <label >Presencia de materia extraña:</label>

                                <input disabled type="text" name="1materiaextrana" class="form-control letraFlaca" >

                                <span class="glyphicon glyphicon-alert form-control-feedback"></span>

                          </div>                  

                    </div>

                    <!-- -------------------------------------------------- -->

                    <div class="col-xs-12 col-sm-4 col-md-3 ">

                          <div class="form-group has-feedback" >

                                <label >Plagas enfermedades:</label>

                                <input disabled type="text" name="1materiaextrana" class="form-control letraFlaca" >

                                <span class="glyphicon glyphicon-alert form-control-feedback"></span>

                          </div>                  

                    </div>

                    <!-- -------------------------------------------------- -->

                    <div class="col-xs-12 col-sm-4 col-md-3 ">

                          <div class="form-group has-feedback" >

                                <label >Lugar de Procedencia:</label>

                                <input disabled type="text" name="1procedencia" class="form-control letraFlaca" autocomplete="on" required>

                                <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>

                          </div>                  

                    </div>

                    <!-- -------------------------------------------------- -->

                    <div class="col-xs-12 col-sm-4 col-md-3 ">

                          <div class="form-group has-feedback" >

                                <label >Peso:</label>

                                <input disabled  id='idTipCaf'  type='number' step='any' max='9999999' min='0' placeholder='Ingrese la cantidad' style='background:transparent; text-align: left;' class='form-control'>

                                <span class="form-control-feedback"><b>Kg.</b></span>

                          </div>                  

                    </div>

                    <!-- -------------------------------------------------- -->

                    <div class="col-xs-12 col-sm-4 col-md-3 ">

                          <div class="form-group has-feedback" >

                                <label >Presentación:</label>

                                <select disabled  class="form-control letraFlaca" name="1cafe" required>

                                     <option value="" disabled="" selected="">Seleccione un tipo</option>

                                    <option value="Bolsa">Bolsa</option>

                                    <option value="Saco">Saco</option>

                                    <option value="Yute">Yute</option>              

                                    <option value="Yute">Otros</option>              

                                </select>

                                <span class="glyphicon glyphicon-oil  form-control-feedback"></span> 

                          </div>                  

                    </div>

                    <!-- -------------------------------------------------- -->

                    <div class="col-xs-12 col-sm-4 col-md-3 ">

                          <div class="form-group has-feedback" >

                                <label >Variedad/Altitud:</label>

                                <input disabled type="text" name="1altitud" class="form-control letraFlaca" autocomplete="on" required>

                                <span class="glyphicon glyphicon-indent-left form-control-feedback"></span>

                          </div>                  

                    </div>

                    <!-- -------------------------------------------------- -->

                    <div class="col-xs-12 col-sm-4 col-md-3 ">

                          <div class="form-group has-feedback" >

                                <label >Condicion de transporte:</label>

                                <input disabled type="text" name="1altitud" class="form-control letraFlaca" autocomplete="on" required>

                                <span class="glyphicon glyphicon-plane form-control-feedback"></span>

                          </div>                  

                    </div>

                    <!-- -------------------------------------------------- -->

                    <div class="col-xs-12 col-sm-4 col-md-3 ">

                          <div class="form-group has-feedback" >

                                <label >Envases:</label>

                                <select disabled  class="form-control letraFlaca" name="1cafe" required>

                                     <option value="" disabled="" selected="">Seleccione un tipo</option>

                                    <option value="Hermetico">Hermético</option>

                                    <option value="Limpio">Limpio</option>

                                    <option value="Integro">Íntegro</option>

                                </select>

                                <span class="glyphicon glyphicon-oil  form-control-feedback"></span> 

                          </div>                  

                    </div>

                   


                   

                    

                  

                    <input disabled type="text" name="doc_identidad" class="hidden">

                    <input disabled type="text" name="cod_maquina" class="hidden">

              </div>            

        </div>


        <!-- =================================   TOAST  ABAD :v   ====================== -->

        <div id="toastAlert" class="toastAbad">

            Para iniciar elija un cliente <span><i class="fa fa-angle-double-left" aria-hidden="true"></i>Nueva ficha</span> 

        </div>

        <script src="vistas/js/tostado.js"></script>

        

        <!-- =================================---------------------====================== -->

        

<?php 

}elseif ($estadoUltimaFicha==='0'){ /*FICHA VIRGEN ya que el último registro fue guardado incompleto*/?>

        <!-- ===========================================================================

======================  FICHA 1                                                                                                                                                   ================================================= -->

        <div class="box container" id="ficha1">

              <div class="row" style="padding: 0px 10px">

                    <div class="col-xs-12">

                            <i style="border: 1px solid #c3c3c3;padding: 2px 4px; color: #777"  data-toggle="tooltip" data-placement="top" title="Buscar ficha" class="fa fa-search-plus navbar-right" aria-hidden="true"></i>

                            <i style="border: 1px solid #c3c3c3;padding: 2px 4px; color: #777"  data-toggle="tooltip" data-placement="top" title="Eliminar ficha" class="fa fa-window-close navbar-right" aria-hidden="true"></i>

                    </div>

                    <div class="col-xs-4 centrate">

                          <img id="logo" src="vistas/img/plantilla/A1logoMoali.png"  >

                    </div>

                    <div class="col-xs-4 centrate bordeDI">

                          <h4 id="titulof1">MANUAL DE BPM <br><span >RECEPCIÓN DE MATERIA PRIMA</span> <b>*Informar a Leyner</b></h4>

                    </div>

                    <div class="col-xs-4 letra14" >

                          <b>Código:</b> LM-BPM-R-02<br>

                          <!-- -------------------------------------------------- -->

                          <b>Aprobado por:</b> RODAS MOALI, ALEX<br>

                          <!-- -------------------------------------------------- -->

                          <b>Fecha: </b> 

                          <?php echo $hoydia.'/'.$hoymes.'/'.date('Y') ?><br>

                          <!-- -------------------------------------------------- -->

                          <b>Página:</b> 01<br>

                    </div>

              </div>

              <!-- -------------------------------------------------- -->

              <!-- SUBCABEZA VERDE -->

              <!-- -------------------------------------------------- -->

              <div class="row  letra16" style="padding: 2px 10px; background: #528035;color: white">

                    <div class="col-xs-4 centrate" >

                          <b>LOTE </b>MP-101140219  

                    </div>

                    <!-- -------------------------------------------------- -->

                    <div class="col-xs-4 centrate" >

                          <b>RBPM </b>N°1  

                    </div>

                    <!-- -------------------------------------------------- -->

                    <div class="col-xs-4 centrate" >

                          <b class="bolitarayaderecha" style="border: 1px solid white">Ficha 1</b><a style="color: white;font-weight: 900;border: 1px solid white;border-radius: 0px 50px 50px 0px;padding-left: 6px;padding-right: 6px" href="#ficha2"> <i class="fa fa-hand-o-down" aria-hidden="true"></i></a>

                    </div>

              </div>  

              <!-- -------------------------------------------------- -->

              <!-- CUERPO -->

              <!-- -------------------------------------------------- -->

              <div class="row" style="padding: 17px 10px">

                    <div class="col-xs-12 col-sm-4 col-md-3 ">

                        <div class="form-group has-feedback">

                              <label >Fecha de recepción: </label>

                              <input  type="date" name="1fecha" class="form-control letraFlaca">

                              <span class="glyphicon glyphicon-calendar form-control-feedback"></span>

                        </div>  

                    </div>

                    <!-- -------------------------------------------------- -->

                     <div class="col-xs-12 col-sm-4 col-md-3 ">

                          <div class="form-group has-feedback" >

                                <label >Nombre del cliente:</label>

                                <input type="text" name="1nombrecliente" class="form-control letraFlaca">

                                <span class="glyphicon glyphicon-user form-control-feedback"></span>

                          </div>

                     </div>

                    <!-- -------------------------------------------------- -->

                     <div class="col-xs-12 col-sm-4 col-md-3 ">

                          <div class="form-group has-feedback" >

                                <label >Nombre de quien recibe:</label>

                                <input type="text" name="1quienrecibe" class="form-control letraFlaca" value="<?php echo $_SESSION["nombre"]; ?>"  disabled>

                                <span class="glyphicon glyphicon-user form-control-feedback"></span>

                          </div>

                    </div>

                    <!-- -------------------------------------------------- -->

                     <div class="col-xs-12 col-sm-4 col-md-3 ">

                          <div class="form-group has-feedback" >

                                <label >Tipo de café:</label>

                                <select  class="form-control letraFlaca" name="1cafe" required>

                                     <option value="" disabled="" selected="">Seleccione un tipo</option>

                                    <option value="Café Pergamino">Café Pergamino</option>

                                    <option value="Café Oro">Café Oro</option>

                                    <option value="Café Tostado">Café Tostado</option>

                                    <option value="Café  Natural">Café  Natural</option>              

                                </select>

                                <span class="glyphicon glyphicon-shopping-cart form-control-feedback"></span>

                          </div>

                    </div> 

                    <!-- -------------------------------------------------- -->

                    <div class="col-xs-12 col-sm-4 col-md-3 ">

                          <div class="form-group has-feedback" >

                                <label >Presencia de materia extraña:</label>

                                <input type="text" name="1materiaextrana" class="form-control letraFlaca" >

                                <span class="glyphicon glyphicon-alert form-control-feedback"></span>

                          </div>                  

                    </div>

                    <!-- -------------------------------------------------- -->

                    <div class="col-xs-12 col-sm-4 col-md-3 ">

                          <div class="form-group has-feedback" >

                                <label >Plagas enfermedades:</label>

                                <input type="text" name="1materiaextrana" class="form-control letraFlaca" >

                                <span class="glyphicon glyphicon-alert form-control-feedback"></span>

                          </div>                  

                    </div>

                    <!-- -------------------------------------------------- -->

                    <div class="col-xs-12 col-sm-4 col-md-3 ">

                          <div class="form-group has-feedback" >

                                <label >Lugar de Procedencia:</label>

                                <input type="text" name="1procedencia" class="form-control letraFlaca" autocomplete="on" required>

                                <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>

                          </div>                  

                    </div>

                    <!-- -------------------------------------------------- -->

                    <div class="col-xs-12 col-sm-4 col-md-3 ">

                          <div class="form-group has-feedback" >

                                <label >Peso:</label>

                                <input  id='idTipCaf'  type='number' step='any' max='9999999' min='0' placeholder='Ingrese la cantidad' style='background:transparent; text-align: left;' class='form-control'>

                                <span class="form-control-feedback"><b>Kg.</b></span>

                          </div>                  

                    </div>

                    <!-- -------------------------------------------------- -->

                    <div class="col-xs-12 col-sm-4 col-md-3 ">

                          <div class="form-group has-feedback" >

                                <label >Presentación:</label>

                                <select  class="form-control letraFlaca" name="1cafe" required>

                                     <option value="" disabled="" selected="">Seleccione un tipo</option>

                                    <option value="Bolsa">Bolsa</option>

                                    <option value="Saco">Saco</option>

                                    <option value="Yute">Yute</option>              

                                    <option value="Yute">Otros</option>              

                                </select>

                                <span class="glyphicon glyphicon-oil  form-control-feedback"></span> 

                          </div>                  

                    </div>

                    <!-- -------------------------------------------------- -->

                    <div class="col-xs-12 col-sm-4 col-md-3 ">

                          <div class="form-group has-feedback" >

                                <label >Variedad/Altitud:</label>

                                <input type="text" name="1altitud" class="form-control letraFlaca" autocomplete="on" required>

                                <span class="glyphicon glyphicon-indent-left form-control-feedback"></span>

                          </div>                  

                    </div>

                    <!-- -------------------------------------------------- -->

                    <div class="col-xs-12 col-sm-4 col-md-3 ">

                          <div class="form-group has-feedback" >

                                <label >Condicion de transporte:</label>

                                <input type="text" name="1altitud" class="form-control letraFlaca" autocomplete="on" required>

                                <span class="glyphicon glyphicon-plane form-control-feedback"></span>

                          </div>                  

                    </div>

                    <!-- -------------------------------------------------- -->

                    <div class="col-xs-12 col-sm-4 col-md-3 ">

                          <div class="form-group has-feedback" >

                                <label >Envases:</label>

                                <select  class="form-control letraFlaca" name="1cafe" required>

                                     <option value="" disabled="" selected="">Seleccione un tipo</option>

                                    <option value="Hermetico">Hermético</option>

                                    <option value="Limpio">Limpio</option>

                                    <option value="Integro">Íntegro</option>

                                </select>

                                <span class="glyphicon glyphicon-oil  form-control-feedback"></span> 

                          </div>                  

                    </div>

                    <!-- -------------------------------------------------- -->

                    <div class="col-xs-12 col-sm-4 col-md-3 centrate">

                          <div class="form-group has-feedback" style="border-radius: 20px; border: 1px solid #c3c3c3">

                                <div class="radio">

                                <label>

                                     <input type="radio" value="Si" name="1rechazo"  >

                                      Con Certificación (Orgánica)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                </label>                                

                                <label><input type="radio" value="No" name="1rechazo" checked="checked">
                                Sin Certificación (Convencional)</label></div>

                          </div>                  

                    </div>

                    <!-- -------------------------------------------------- -->

                    <div class="col-xs-12 col-sm-4 col-md-3 ">

                          <div class="form-group has-feedback" >

                                 <label >*Fecha de entrega:</label>

                                 <input  oninput="codrb(),codmapri()" id="idfechaentrega"   style="color: red; font-weight: 700" type="datetime-local" name="1fechaentrega" class="form-control letraFlaca" required>

                                  <span class="glyphicon glyphicon-calendar form-control-feedback"></span>  

                          </div>                  

                    </div>

                    <!-- -------------------------------------------------- -->

                    <div class="col-xs-12 col-sm-4 col-md-3 ">

                          <div class="form-group has-feedback" >

                                  <label >*Humedad:</label>

                                  <input type="text" name="1humedad" class="form-control letraFlaca" autocomplete="on" required>

                                  <span class="glyphicon glyphicon-tasks form-control-feedback"></span>

                          </div>                  

                    </div>

                    <!-- -------------------------------------------------- -->

                    <div class="col-xs-12 col-sm-4 col-md-3">

                          <div class="form-group has-feedback" style="border-radius: 20px; border: 1px solid #c3c3c3">

                                <div class="radio">

                                  <label><b>Conclusión:</b></label><br>

                                  <center>

                                <label>

                                     <input type="radio" value="Si" name="1rechazo"  checked="checked">

                                      Aceptado

                                </label> &nbsp;&nbsp;|&nbsp;&nbsp;   

                                <label><input type="radio" value="No" name="1rechazo" >Rechazado</label></center></div>

                          </div>                  

                    </div>

                    <!-- -------------------------------------------------- -->

                    <div class="col-xs-12 col-sm-12 col-md-12 ">

                          <div class="form-group has-feedback" >

                                <label class="lablgnrl">Observaciones</label>

                                <textarea type="text" name="1observaciones" class="form-control letraFlaca" rows="1"></textarea>

                                <span class="glyphicon glyphicon-pencil form-control-feedback"></span>

                          </div>                  

                    </div>

                    <!-- -------------------------------------------------- -->

                    <div class="col-xs-12 col-sm-6 col-md-6 centrate">

                          <div class="form-group has-feedback " >

                                <img src="vistas/img/firmas/liz.png" style="width: 170px">

                                <center><div class="rayavertical"></div></center>

                                Ejecutor asistente de planta

                          </div>                  

                    </div>

                    <!-- -------------------------------------------------- -->

                    <div class="col-xs-12 col-sm-6 col-md-6 centrate">

                          <div class="form-group has-feedback " >

                                <img src="vistas/img/firmas/liz.png" style="width: 170px">

                                <center><div class="rayavertical"></div></center>

                                Jefe de planta

                          </div>                  

                    </div>

                    <input type="text" name="doc_identidad" class="hidden">

                    <input type="text" name="cod_maquina" class="hidden">

              </div>            

        </div>

<!-- ===========================================================================

======================  FICHA 2 >>>>>>>>>>>    =================================

============================================================================== -->
        <div  class="toastAbad">
            Completar datos 
            <span style="color: red"><i class="fa fa-angle-double-left" aria-hidden="true"></i>Ficha abierta</span> 
        </div>
        <script type="text/javascript">$(document).ready(function(){view_toast('.toastAbad');});</script>
        <!-- =================================---------------------====================== -->
<?php

}       

?>
