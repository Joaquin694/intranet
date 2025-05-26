<form method="POST" onsubmit="return updatadinsert(<?php echo $pk_anal_fisico?>);" autocomplete="off">
            <input class="auto" type="text" value="<?php echo $pk_anal_fisico?>" id="pk_anal_fisico">
            <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 align="center" class="box-title"><b>Datos</b></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Fecha Recepción:</label>
                        
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="date" class="form-control pull-right" id="fecha_recepcion" value="<?php echo $fecha_recepcion ?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Fecha de Analisis:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="date" class="form-control pull-right" id="fecha_analisis"  value="<?php echo $fecha_analisis ?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Codigo Interno:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-code"></i>
                                        </div>
                                        <input readonly type="text" class="form-control pull-right" id="codigo_interno" value="<?php echo $codigo_interno ?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Varidad:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-pencil"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="varidad" value="<?php echo $varidad ?>">
                                    </div>
                                </div>

                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Asoc./Coop:</label>
                        
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-users"></i>
                                        </div>
                                        <select disabled class="form-control pull-right" id="asoc_coop" required>
                                            <option value=""  disabled >--SELECCIONE--</option>
                                            <option selected value="<?php echo $idcliente ?>" selected disabled ><?php echo $asoc_coop?></option>
                                            <?php
                                            ////CONSULTA PARA EL SELECT ASOC_COOP TABLA CLIENTE
                                            $sql3= "SELECT * FROM cliente";
                                            $result3=mysqli_query($conexion,$sql3);

                                                while($mostrar3=mysqli_fetch_row($result3)){
                                            ?>
                                                <option value="<?php echo $mostrar3[0] ?>"><?php echo $mostrar3[7] ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Productor:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-bank"></i>
                                        </div>
                                        <?php
                                            //require_once "../config.php";
                                                //CONSULTA TABLA CLIENTE
                                            $sql3= "SELECT * FROM cliente";

                                            $result3=mysqli_query($conexion,$sql3);
                                        ?>
                                        <select class="form-control pull-right" onchange="getselect(), getselect2();" id="idcliente" required>
                                            <option value="" selected disabled >--SELECCIONE--</option>
                                            <?php
                                                while($mostrar3=mysqli_fetch_object($result3)){
                                                     
                                                     if($mostrar3->id_cliente == $idcliente){
                                                         
                                            ?>
                                                <option value="<?php echo $mostrar3->id_cliente; ?>" selected><?php echo $mostrar3->nombre_cliente; ?></option>
                                            <?php
                                                     }

                                                     else{

                                                ?>
                                                <option value="<?php echo $mostrar3->id_cliente; ?>"><?php echo $mostrar3->nombre_cliente; ?></option>
                                                <?php
                                                         
                                                     }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Cosecha:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-hourglass-2 "></i>
                                        </div>
                                        <input value="<?php echo $cosecha; ?>" type="text" class="form-control pull-right" id="cosecha">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Ubicación:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-map-marker"></i>
                                        </div>
                                        <select disabled class="form-control pull-right" id="ubicacion" required>
                                            <option value=""  disabled >--SELECCIONE--</option>
                                            <option selected value="<?php echo $idcliente ?>" selected disabled ><?php echo $ubicacion?></option>
                                            <?php
                                            ////CONSULTA PARA EL SELECT ASOC_COOP TABLA CLIENTE
                                            $sql5= "SELECT * FROM cliente";
                                            $result5=mysqli_query($conexion,$sql5);

                                                while($mostrar5=mysqli_fetch_row($result5)){
                                            ?>
                                                <option value="<?php echo $mostrar5[0] ?>"><?php echo $mostrar5[4] ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                    <!-- /.row -->
                    </div>

            </div>


            <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><b>I. ANÁLISIS FÍSICO</b></h3>
                    </div>
                    <!-- check box -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- checkbox -->
                                <div class="col-lg-4">
                                <div class="input-group date">
                                    <label type="text" class="form-control pull-right">
                                    Análisis de Pergamino
                                    </label>
                                    <?php if($analisis_de_pergamino == "Análisis de Pergamino"){?>
                                    <div class="input-group-addon">
                                        <input type="checkbox" checked="true" id="analisis_de_pergamino" value="Análisis de Pergamino"
                                        >
                                    </div>
                                    <?php } else {?>

                                     
                                    <div class="input-group-addon">
                                        <input type="checkbox" id="analisis_de_pergamino" value="Análisis de Pergamino"
                                        >
                                    </div>
                                    <?php } ?>
                                </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group date">
                                        <label type="text" class="form-control pull-right">
                                            Proceso Organico
                                        </label>
                                        <?php if($proceso_organico == "Proceso Organico"){?>
                                        <div class="input-group-addon">
                                            <input type="checkbox" checked="true" id="proceso_organico" value="Proceso Organico"
                                            >
                                        </div>
                                        <?php } else {?>

                                        
                                        <div class="input-group-addon">
                                            <input type="checkbox" id="proceso_organico" value="Proceso Organico"
                                            >
                                        </div>
                                        <?php } ?>
                                    
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group date">
                                    <label type="text" class="form-control pull-right">
                                        Proceso Convencional
                                    </label>
                                    <?php if($proceso_convencional == "Proceso Convencional"){?>
                                        <div class="input-group-addon">
                                            <input type="checkbox" checked="true" id="proceso_convencional" value="Proceso Convencional"
                                            >
                                        </div>
                                        <?php } else {?>

                                        
                                        <div class="input-group-addon">
                                            <input type="checkbox" id="proceso_convencional" value="Proceso Convencional"
                                            >
                                        </div>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><b>Café Pergamino</b></h3>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                    <label>Peso</label>
                                                    </div>
                                                    <input onkeypress="return soloNumeros(event)" value="<?php echo $peso_pergamino; ?>" type="text" class="form-control pull-right" id="peso_pergamino"
                                                    onkeyup="calcular_peso_oro('peso_pergamino','peso_cascarilla','peso_oro');calcular_porcentaje_cascarilla('peso_cascarilla','peso_pergamino','porcentaje_cascarilla')">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                    <label>H° (%)</label>
                                                    </div>
                                                    <input onkeypress="return soloNumeros(event)" value="<?php echo $h_pergamino; ?>" type="text" class="form-control pull-right" id="h_pergamino">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Color:</label>
                                                <div class="input-group date">
                                                    <label type="text" class="form-control pull-right">Normal</label>                      
                                                    <?php if($normal_pergamino == "normal"){?>
                                                    <div class="input-group-addon">
                                                        <input type="checkbox" checked="true" id="normal_pergamino" value="normal"
                                                        >
                                                    </div>
                                                    <?php } else {?>
                                                    <div class="input-group-addon">
                                                        <input type="checkbox" id="normal_pergamino" value="normal"
                                                        >
                                                    </div>
                                                    <?php } ?>
                                                </div>

                                                <div class="input-group date">
                                                    <label type="text" class="form-control pull-right">Disparejo</label>                      
                                                    <?php if($disparejo_pergamino == "disparejo"){?>
                                                    <div class="input-group-addon">
                                                        <input type="checkbox" checked="true" id="disparejo_pergamino" value="disparejo"
                                                        >
                                                    </div>
                                                    <?php } else {?>

                                                    
                                                    <div class="input-group-addon">
                                                        <input type="checkbox" id="disparejo_pergamino" value="disparejo"
                                                        >
                                                    </div>
                                                    <?php } ?>
                                                </div>

                                                <div class="input-group date">
                                                        <label type="text" class="form-control pull-right">Manchado</label>                      
                                                        <?php if($manchado_pergamino == "manchado"){?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" checked="true" id="manchado_pergamino" value="manchado"
                                                            >
                                                        </div>
                                                        <?php } else {?>

                                                        
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" id="manchado_pergamino" value="manchado"
                                                            >
                                                        </div>
                                                        <?php } ?>
                                                </div>

                                                <div class="input-group date">
                                                    <label type="text" class="form-control pull-right">Negruzco</label>                      
                                                    <?php if($negruzco_pergamino == "negruzco"){?>
                                                    <div class="input-group-addon">
                                                        <input type="checkbox" checked="true" id="negruzco_pergamino" value="negruzco"
                                                        >
                                                    </div>
                                                    <?php } else {?>

                                                    
                                                    <div class="input-group-addon">
                                                        <input type="checkbox" id="negruzco_pergamino" value="negruzco"
                                                        >
                                                    </div>
                                                    <?php } ?>
                                                </div>

                                                <div class="input-group date">
                                                    <label type="text" class="form-control pull-right">Otros</label>                      
                                                    <?php if($otros_pergamino == "otros"){?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" checked="true" id="otros_pergamino" value="otros"
                                                            >
                                                        </div>
                                                        <?php } else {?>

                                                        
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" id="otros_pergamino" value="otros"
                                                            >
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Olor:</label>
                                                <div class="input-group date">
                                                    <label type="text" class="form-control pull-right">fresco</label>                      
                                                    <?php if($fresco_pergamino == "fresco"){?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" checked="true" id="fresco_pergamino" value="fresco"
                                                            >
                                                        </div>
                                                        <?php } else {?>

                                                        
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" id="fresco_pergamino" value="fresco"
                                                            >
                                                        </div>
                                                    <?php } ?>
                                                </div>

                                                <div class="input-group date">
                                                    <label type="text" class="form-control pull-right">Viejo</label>                      
                                                    <?php if($viejo_pergamino == "viejo"){?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" checked="true" id="viejo_pergamino" value="viejo"
                                                            >
                                                        </div>
                                                        <?php } else {?>

                                                        
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" id="viejo_pergamino" value="viejo"
                                                            >
                                                        </div>
                                                    <?php } ?>
                                                    </div>

                                                    <div class="input-group date">
                                                        <label type="text" class="form-control pull-right">Fermento</label>                      
                                                        <?php if($fermento_pergamino == "fermento"){?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" checked="true" id="fermento_pergamino" value="fermento"
                                                            >
                                                        </div>
                                                        <?php } else {?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" id="fermento_pergamino" value="fermento"
                                                            >
                                                        </div>
                                                        <?php } ?>
                                                    </div>

                                                    <div class="input-group date">
                                                        <label type="text" class="form-control pull-right">Terroso</label>                      
                                                        <?php if($terroso_pergamino == "terroso"){?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" checked="true" id="terroso_pergamino" value="terroso"
                                                            >
                                                        </div>
                                                        <?php } else {?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" id="terroso_pergamino" value="terroso"
                                                            >
                                                        </div>
                                                        <?php } ?>
                                                    </div>

                                                    <div class="input-group date">
                                                        <label type="text" class="form-control pull-right">Hierbas</label>                      
                                                        <?php if($hierbas_pergamino == "hierbas"){?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" checked="true" id="hierbas_pergamino" value="hierbas"
                                                            >
                                                        </div>
                                                        <?php } else {?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" id="hierbas_pergamino" value="hierbas"
                                                            >
                                                        </div>
                                                        <?php } ?>
                                                    </div>

                                                    <div class="input-group date">
                                                        <label type="text" class="form-control pull-right">Moho</label>                      
                                                        <?php if($moho_pergamino == "moho"){?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" checked="true" id="moho_pergamino" value="moho"
                                                            >
                                                        </div>
                                                        <?php } else {?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" id="moho_pergamino" value="moho"
                                                            >
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--CAFE ORO-->
                            <div class="col-md-6">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><b>Café Oro</b></h3>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                    <label>Peso</label>
                                                    </div>
                                                    <input value="<?php echo $peso_oro ?>" type="text" readonly class="form-control pull-right" id="peso_oro"
                                                    onkeyup="calcular_porcentaje1_granulometria('peso1_granulometria','peso_oro','porcentaje1_granulometria');
                                                    calcular_porcentaje2_granulometria('peso2_granulometria','peso_oro','porcentaje2_granulometria');
                                                    calcular_porcentaje3_granulometria('peso3_granulometria','peso_oro','porcentaje3_granulometria');
                                                    calcular_porcentaje4_granulometria('peso4_granulometria','peso_oro','porcentaje4_granulometria');
                                                    calcular_porcentaje5_granulometria('peso5_granulometria','peso_oro','porcentaje5_granulometria');
                                                    calcular_porcentaje6_granulometria('peso6_granulometria','peso_oro','porcentaje6_granulometria');
                                                    calcular_porcentaje7_granulometria('peso7_granulometria','peso_oro','porcentaje7_granulometria')">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                    <label>H° (%)</label>
                                                    </div>
                                                    <input value="<?php echo $h_oro ?>" readonly type="text" class="form-control pull-right" value="15.10" id="h_oro">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Color:</label>
                                                <div class="input-group date">
                                                    <label type="text" class="form-control pull-right">Normal</label>                      
                                                    <?php if($normal_oro == "normal"){?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" checked="true" id="normal_oro" value="normal"
                                                            >
                                                        </div>
                                                        <?php } else {?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" id="normal_oro" value="normal"
                                                            >
                                                        </div>
                                                    <?php } ?>
                                                </div>

                                                <div class="input-group date">
                                                    <label type="text" class="form-control pull-right">Blanqueado</label>                      
                                                    <?php if($blanqueado_oro == "blanqueado"){?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" checked="true" id="blanqueado_oro" value="blanqueado"
                                                            >
                                                        </div>
                                                        <?php } else {?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" id="blanqueado_oro" value="blanqueado"
                                                            >
                                                        </div>
                                                    <?php } ?>
                                                </div>

                                                <div class="input-group date">
                                                    <label type="text" class="form-control pull-right">Disparejo</label>                      
                                                    <?php if($disparejo_oro == "disparejo"){?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" checked="true" id="disparejo_oro" value="disparejo"
                                                            >
                                                        </div>
                                                        <?php } else {?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" id="disparejo_oro" value="disparejo"
                                                            >
                                                        </div>
                                                    <?php } ?>
                                                </div>

                                                <div class="input-group date">
                                                    <label type="text" class="form-control pull-right">Amarillo</label>                      
                                                    <?php if($amarillo_oro == "amarillo"){?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" checked="true" id="amarillo_oro" value="amarillo"
                                                            >
                                                        </div>
                                                        <?php } else {?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" id="amarillo_oro" value="amarillo"
                                                            >
                                                        </div>
                                                    <?php } ?>
                                                </div>

                                                <div class="input-group date">
                                                    <label type="text" class="form-control pull-right">Traslucido</label>                      
                                                    <?php if($traslucido_oro == "traslucido"){?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" checked="true" id="traslucido_oro" value="traslucido"
                                                            >
                                                        </div>
                                                        <?php } else {?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" id="traslucido_oro" value="traslucido"
                                                            >
                                                        </div>
                                                    <?php } ?>
                                                </div>

                                                <div class="input-group date">
                                                    <label type="text" class="form-control pull-right">Azulado</label>                      
                                                    <?php if($azulado_oro == "azulado"){?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" checked="true" id="azulado_oro" value="azulado"
                                                            >
                                                        </div>
                                                        <?php } else {?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" id="azulado_oro" value="azulado"
                                                            >
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Olor:</label>
                                                <div class="input-group date">
                                                    <label type="text" class="form-control pull-right">fresco</label>                      
                                                    <?php if($fresco_oro == "fresco"){?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" checked="true" id="fresco_oro" value="fresco"
                                                            >
                                                        </div>
                                                        <?php } else {?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" id="fresco_oro" value="fresco"
                                                            >
                                                        </div>
                                                    <?php } ?>
                                                </div>

                                                <div class="input-group date">
                                                    <label type="text" class="form-control pull-right">Viejo</label>                      
                                                    <?php if($viejo_oro == "viejo"){?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" checked="true" id="viejo_oro" value="viejo"
                                                            >
                                                        </div>
                                                        <?php } else {?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" id="viejo_oro" value="viejo"
                                                            >
                                                        </div>
                                                    <?php } ?>
                                                </div>

                                                <div class="input-group date">
                                                    <label type="text" class="form-control pull-right">Fermento</label>                      
                                                    <?php if($fermento_oro == "fermento"){?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" checked="true" id="fermento_oro" value="fermento"
                                                            >
                                                        </div>
                                                        <?php } else {?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" id="fermento_oro" value="fermento"
                                                            >
                                                        </div>
                                                    <?php } ?>
                                                </div>

                                                <div class="input-group date">
                                                    <label type="text" class="form-control pull-right">Terroso</label>                      
                                                    <?php if($terroso_oro == "terroso"){?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" checked="true" id="terroso_oro" value="terroso"
                                                            >
                                                        </div>
                                                        <?php } else {?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" id="terroso_oro" value="terroso"
                                                            >
                                                        </div>
                                                    <?php } ?>
                                                </div>

                                                <div class="input-group date">
                                                    <label type="text" class="form-control pull-right">Hierbas</label>                      
                                                    <?php if($hierbas_oro == "hierbas"){?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" checked="true" id="hierbas_oro" value="hierbas"
                                                            >
                                                        </div>
                                                        <?php } else {?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" id="hierbas_oro" value="hierbas"
                                                            >
                                                        </div>
                                                    <?php } ?>
                                                </div>

                                                <div class="input-group date">
                                                    <label type="text" class="form-control pull-right">Moho</label>                      
                                                    <?php if($moho_oro == "moho"){?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" checked="true" id="moho_oro" value="moho"
                                                            >
                                                        </div>
                                                        <?php } else {?>
                                                        <div class="input-group-addon">
                                                            <input type="checkbox" id="moho_oro" value="moho"
                                                            >
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="col-md-12">
                                <div class="box-body with-border">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <label>Observaciones:</label>
                                        </div>
                                        <input value="<?php echo $observaciones ?>" type="text" class="form-control pull-right" id="observaciones">                      
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><b>Cascarilla</b></h3>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <label>Peso (g)</label>
                                                </div>
                                                <input onkeypress="return soloNumeros(event)" type="text" class="form-control pull-right" value="<?php echo $peso_cascarilla?>" id="peso_cascarilla"
                                                onkeyup="calcular_peso_oro('peso_pergamino','peso_cascarilla','peso_oro');calcular_porcentaje_cascarilla('peso_cascarilla','peso_pergamino','porcentaje_cascarilla')">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <label>Porcentaje (%)</label>
                                                </div>
                                                <input type="text" readonly class="form-control pull-right" value="<?php echo $porcentaje_cascarilla?>" id="porcentaje_cascarilla">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!--GRANULOMETRIA-->
                                <div class="box-header with-border">
                                    <h3 class="box-title"><b>Granulometría</b></h3>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <center><label>Malla N°:</label></center>
                                                <div class="form-group text-center">
                                                    <label type="text" class="form-control">19</label>                      
                                                </div>

                                                <div class="form-group text-center">
                                                    <label type="text" class="form-control">18</label>                      
                                                </div>

                                                <div class="form-group text-center">
                                                    <label type="text" class="form-control">17</label>                      
                                                </div>

                                                <div class="form-group text-center">
                                                    <label type="text" class="form-control">16</label>                      
                                                </div>

                                                <div class="form-group text-center">
                                                    <label type="text" class="form-control">15</label>                      
                                                </div>

                                                <div class="form-group text-center">
                                                    <label type="text" class="form-control">14</label>                      
                                                </div>
                                                <div class="form-group text-center">
                                                    <label type="text" class="form-control">13</label>                      
                                                </div>
                                                <div class="form-group text-center">
                                                    <label type="text" class="form-control">TOTAL</label>                      
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <center><label>Peso (g):</label></center>
                                                <div class="form-group">
                                                    <input onkeypress="return soloNumeros(event)" type="text" value="<?php echo $peso1_granulometria?>" class="form-control text-center" id="peso1_granulometria"
                                                    onkeyup="calcular_porcentaje1_granulometria('peso1_granulometria','peso_oro','porcentaje1_granulometria');
                                                    calcular_peso_total('peso1_granulometria','peso2_granulometria','peso3_granulometria','peso4_granulometria',
                                                    'peso5_granulometria','peso6_granulometria','peso7_granulometria','peso_total_granulometria');
                                                    suma_porcentaje_total_granulometria()">                      
                                                </div>
                                                <div class="form-group">
                                                    <input onkeypress="return soloNumeros(event)" type="text" value="<?php echo $peso2_granulometria?>" class="form-control text-center" id="peso2_granulometria"
                                                    onkeyup="calcular_porcentaje2_granulometria('peso2_granulometria','peso_oro','porcentaje2_granulometria');
                                                    calcular_peso_total('peso1_granulometria','peso2_granulometria','peso3_granulometria','peso4_granulometria',
                                                    'peso5_granulometria','peso6_granulometria','peso7_granulometria','peso_total_granulometria');
                                                    suma_porcentaje_total_granulometria()">                      
                                                </div>
                                                <div class="form-group">
                                                    <input onkeypress="return soloNumeros(event)" type="text" value="<?php echo $peso3_granulometria?>" class="form-control text-center" id="peso3_granulometria"
                                                    onkeyup="calcular_porcentaje3_granulometria('peso3_granulometria','peso_oro','porcentaje3_granulometria');
                                                    calcular_peso_total('peso1_granulometria','peso2_granulometria','peso3_granulometria','peso4_granulometria',
                                                    'peso5_granulometria','peso6_granulometria','peso7_granulometria','peso_total_granulometria');
                                                    suma_porcentaje_total_granulometria()">                      
                                                </div>
                                                <div class="form-group">
                                                    <input onkeypress="return soloNumeros(event)" type="text" value="<?php echo $peso4_granulometria?>" class="form-control text-center" id="peso4_granulometria"
                                                    onkeyup="calcular_porcentaje4_granulometria('peso4_granulometria','peso_oro','porcentaje4_granulometria');
                                                    calcular_peso_total('peso1_granulometria','peso2_granulometria','peso3_granulometria','peso4_granulometria',
                                                    'peso5_granulometria','peso6_granulometria','peso7_granulometria','peso_total_granulometria');
                                                    suma_porcentaje_total_granulometria()">                      
                                                </div>
                                                <div class="form-group">
                                                    <input onkeypress="return soloNumeros(event)" type="text" value="<?php echo $peso5_granulometria?>" class="form-control text-center" id="peso5_granulometria"
                                                    onkeyup="calcular_porcentaje5_granulometria('peso5_granulometria','peso_oro','porcentaje5_granulometria');
                                                    calcular_peso_total('peso1_granulometria','peso2_granulometria','peso3_granulometria','peso4_granulometria',
                                                    'peso5_granulometria','peso6_granulometria','peso7_granulometria','peso_total_granulometria');
                                                    suma_porcentaje_total_granulometria()">                      
                                                </div>
                                                <div class="form-group">
                                                    <input onkeypress="return soloNumeros(event)" type="text" value="<?php echo $peso6_granulometria?>" class="form-control text-center" id="peso6_granulometria"
                                                    onkeyup="calcular_porcentaje6_granulometria('peso6_granulometria','peso_oro','porcentaje6_granulometria');
                                                    calcular_peso_total('peso1_granulometria','peso2_granulometria','peso3_granulometria','peso4_granulometria',
                                                    'peso5_granulometria','peso6_granulometria','peso7_granulometria','peso_total_granulometria');
                                                    suma_porcentaje_total_granulometria()">                      
                                                </div>
                                                <div class="form-group">
                                                    <input onkeypress="return soloNumeros(event)" type="text" value="<?php echo $peso7_granulometria?>" class="form-control text-center" id="peso7_granulometria"
                                                    onkeyup="calcular_porcentaje7_granulometria('peso7_granulometria','peso_oro','porcentaje7_granulometria');
                                                    calcular_peso_total('peso1_granulometria','peso2_granulometria','peso3_granulometria','peso4_granulometria',
                                                    'peso5_granulometria','peso6_granulometria','peso7_granulometria','peso_total_granulometria');
                                                    suma_porcentaje_total_granulometria()">                      
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $peso_total_granulometria?>" readonly class="form-control text-center" id="peso_total_granulometria">                      
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <center><label>%:</label></center>
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $porcentaje1_granulometria?>" readonly class="form-control text-center" id="porcentaje1_granulometria">                      
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $porcentaje2_granulometria?>" readonly class="form-control text-center" id="porcentaje2_granulometria">                      
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $porcentaje3_granulometria?>" readonly class="form-control text-center" id="porcentaje3_granulometria">                      
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $porcentaje4_granulometria?>" readonly class="form-control text-center" id="porcentaje4_granulometria">                      
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $porcentaje5_granulometria?>" readonly class="form-control text-center" id="porcentaje5_granulometria">                      
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $porcentaje6_granulometria?>" readonly class="form-control text-center" id="porcentaje6_granulometria">                      
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $porcentaje7_granulometria?>" readonly class="form-control text-center" id="porcentaje7_granulometria">                      
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $porcentaje_total_granulometria?>" readonly class="form-control text-center" id="porcentaje_total_granulometria">                  
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--DEFECTOS SOLO EN CASO DE EXPORTACION-->
                            <div class="col-md-6">

                                <!--MUESTRA-->
                                <div class="box-header with-border text-center">
                                    <h3 class="box-title"><b>Defectos solo en caso de exportación</b></h3>
                                    <h3 class="box-title"><b>Muestra</b></h3>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <center><label>Primarios:</label></center>
                                                <div class="form-group text-center">
                                                    <label type="text" class="form-control">Grano Negro</label>                      
                                                </div>

                                                <div class="form-group text-center">
                                                    <label type="text" class="form-control">Grao Agrio</label>                      
                                                </div>

                                                <div class="form-group text-center">
                                                    <label type="text" class="form-control">Cereza Seca</label>                      
                                                </div>

                                                <div class="form-group text-center">
                                                    <label type="text" class="form-control">Daño Hongo</label>                      
                                                </div>

                                                <div class="form-group text-center">
                                                    <label type="text" class="form-control">Materia Extraña</label>                      
                                                </div>

                                                <div class="form-group text-center">
                                                    <label type="text" class="form-control">Brocado Severo</label>                      
                                                </div>
                                                <center><label>Secundarios:</label></center>
                                                <div class="form-group text-center">
                                                    <label type="text" class="form-control">Parcial Negro</label>                      
                                                </div>
                                                <div class="form-group text-center">
                                                    <label type="text" class="form-control">Parcial Agrio</label>                      
                                                </div>
                                                <div class="form-group text-center">
                                                    <label type="text" class="form-control">Pergamino</label>                      
                                                </div>
                                                <div class="form-group text-center">
                                                    <label type="text" class="form-control">Flotador/Blanq</label>                      
                                                </div>
                                                <div class="form-group text-center">
                                                    <label type="text" class="form-control">Inmaduro</label>                      
                                                </div>
                                                <div class="form-group text-center">
                                                    <label type="text" class="form-control">Avarenado/Arrug</label>                      
                                                </div>
                                                <div class="form-group text-center">
                                                    <label type="text" class="form-control">Mordidos Maq.</label>                      
                                                </div>
                                                <div class="form-group text-center">
                                                    <label type="text" class="form-control">Rotos</label>                      
                                                </div>
                                                <div class="form-group text-center">
                                                    <label type="text" class="form-control">Granos Humedos</label>                      
                                                </div>
                                                <div class="form-group text-center">
                                                    <label type="text" class="form-control">Brocado Leve</label>                      
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <center><label>GRANOS:</label></center>
                                                <div class="form-group">
                                                    <input type="text" class="form-control text-center" value="<?php echo $grano1_muestra?>"  onkeypress="return soloNumeros2(event)" id="grano1_muestra">                      
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control text-center" value="<?php echo $grano2_muestra?>"  onkeypress="return soloNumeros2(event)" 
                                                    id="grano2_muestra">                      
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control text-center" value="<?php echo $grano3_muestra?>"  onkeypress="return soloNumeros2(event)" 
                                                    id="grano3_muestra">                      
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control text-center" value="<?php echo $grano4_muestra?>"  onkeypress="return soloNumeros2(event)" 
                                                    id="grano4_muestra">                      
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control text-center" value="<?php echo $grano5_muestra?>"  onkeypress="return soloNumeros2(event)" 
                                                    id="grano5_muestra">                      
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control text-center" value="<?php echo $grano6_muestra?>"  onkeypress="return soloNumeros2(event)" 
                                                    id="grano6_muestra">                      
                                                </div>
                                                <center><label>GRANOS:</label></center>
                                                <div class="form-group">
                                                    <input type="text" class="form-control text-center" value="<?php echo $grano7_muestra?>"  onkeypress="return soloNumeros2(event)" 
                                                    id="grano7_muestra">                      
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control text-center" value="<?php echo $grano8_muestra?>"  onkeypress="return soloNumeros2(event)"
                                                    id="grano8_muestra">                      
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control text-center" value="<?php echo $grano9_muestra?>"  onkeypress="return soloNumeros2(event)" 
                                                    id="grano9_muestra">                      
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control text-center" value="<?php echo $grano10_muestra?>"  onkeypress="return soloNumeros2(event)" 
                                                    id="grano10_muestra">                      
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control text-center" value="<?php echo $grano11_muestra?>"  onkeypress="return soloNumeros2(event)" 
                                                    id="grano11_muestra">                      
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control text-center" value="<?php echo $grano12_muestra?>"  onkeypress="return soloNumeros2(event)" 
                                                    id="grano12_muestra">                      
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control text-center" value="<?php echo $grano13_muestra?>"  onkeypress="return soloNumeros2(event)" 
                                                    id="grano13_muestra">                      
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control text-center" value="<?php echo $grano14_muestra?>"  onkeypress="return soloNumeros2(event)" 
                                                    id="grano14_muestra">                      
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control text-center" value="<?php echo $grano15_muestra?>"  onkeypress="return soloNumeros2(event)" 
                                                    id="grano15_muestra">                      
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control text-center" value="<?php echo $grano16_muestra?>"  onkeypress="return soloNumeros2(event)" 
                                                    id="grano16_muestra">                      
                                                </div>
                                                <div class="form-group">
                                                    <label type="text" class="form-control text-center">Nº total defectos</label>                      
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <center><label>DEFECTOS:</label></center>
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $defecto1_muestra?>" readonly class="form-control text-center" id="defecto1_muestra">                   
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $defecto2_muestra?>" readonly class="form-control text-center" id="defecto2_muestra">                    
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $defecto3_muestra?>" readonly class="form-control text-center" id="defecto3_muestra">                
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $defecto4_muestra?>" readonly class="form-control text-center" id="defecto4_muestra">                     
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $defecto5_muestra?>" readonly class="form-control text-center" id="defecto5_muestra">                     
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $defecto6_muestra?>" readonly class="form-control text-center" id="defecto6_muestra">                     
                                                </div>
                                                <center><label>DEFECTOS:</label></center>
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $defecto7_muestra?>" readonly class="form-control text-center" id="defecto7_muestra">                     
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $defecto8_muestra?>" readonly class="form-control text-center" id="defecto8_muestra">                     
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $defecto9_muestra?>" readonly class="form-control text-center" id="defecto9_muestra">                     
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $defecto10_muestra?>" readonly class="form-control text-center" id="defecto10_muestra">                     
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $defecto11_muestra?>" readonly class="form-control text-center" id="defecto11_muestra">                     
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $defecto12_muestra?>" readonly class="form-control text-center" id="defecto12_muestra">                     
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $defecto13_muestra?>" readonly class="form-control text-center" id="defecto13_muestra">                     
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $defecto14_muestra?>" readonly class="form-control text-center" id="defecto14_muestra">                     
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $defecto15_muestra?>" readonly class="form-control text-center" id="defecto15_muestra">                     
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $defecto16_muestra?>" readonly class="form-control text-center" id="defecto16_muestra">                     
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $suma_total_defectos?>" readonly class="form-control text-center" id="suma_total_defectos">                      
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!--ULTIMA PARTE-->
                            <div class="col-md-12">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><b>Calculos Final</b></h3>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <label>Peso defectos total (g)</label>
                                                    </div>
                                                    <input type="text" value="<?php echo $peso_defectos_total?>" onblur="if(this.value == ''){this.value='0.000'}" class="form-control pull-right" id="peso_defectos_total">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <label>Porcentaje defectos (%)</label>
                                                    </div>
                                                    <input type="text" value="<?php echo $porcentaje_defectos?>" readonly onblur="if(this.value == ''){this.value='0.000'}" class="form-control pull-right" id="porcentaje_defectos">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!--GRANULOMETRIA-->
                            <div class="col-md-12">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><b>Rendimiento Exportable</b></h3>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <label>Rendimiento Exportable</label>
                                                    </div>
                                                    <input type="text" value="<?php echo $rendimiento_exportable?>" readonly class="form-control pull-right" id="rendimiento_exportable">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    <!-- /.row -->
                    </div>
                
            </div>

            <div class="box box-primary">
                    <div class="box-header with-border text-center">                 
                        <button id="btnGuardar" type="submit" class="btn btn-success btn-lg">Editar</button>
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Ver Listado</button>
                    </div>   
            </div>

            <div id="request_idOjo">

            </div>
        </form>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#myModal').modal('toggle');
                //$("#pk_anal_fisico").hide();

                //DETERMINAR AUTOMATICAMENTE EL VALOR DEL DEFECTO
                $('#grano1_muestra').on('keyup', function(){
                    if($('#grano1_muestra').val().length==0){
                        $('#defecto1_muestra').val(0);
                    }else if($('#grano1_muestra').val()<10){
                        $('#defecto1_muestra').val(1);
                    }
                    especiales="8-37-38-46";//Array
                    teclado_especial=false;
                    //bucle de encontrar un caracter especial
                    for(var i in especiales){
                        if(key==especiales[i]){
                            teclado_especial=true;;
                        }
                    }

                    if($('#grano1_muestra').val()<10 && $('#grano1_muestra').val()!=teclado_especial){
                        $('#defecto1_muestra').val(1);
                    }else if($('#grano1_muestra').val()>=10 && $('#grano1_muestra').val()!=teclado_especial){
                        $('#defecto1_muestra').val(2);
                    }else{
                        $('#defecto1_muestra').val(0);
                    }

                    });
                
                $('#grano2_muestra').on('keyup', function(){
                    if($('#grano2_muestra').val().length==0){
                        $('#defecto2_muestra').val(0);
                    }else if($('#grano2_muestra').val()<10){
                        $('#defecto2_muestra').val(1);
                    }
                    especiales="8-37-38-46";//Array
                    teclado_especial=false;
                    //bucle de encontrar un caracter especial
                    for(var i in especiales){
                        if(key==especiales[i]){
                            teclado_especial=true;;
                        }
                    }
                    if($('#grano2_muestra').val()<10 && $('#grano2_muestra').val()!=teclado_especial){
                        $('#defecto2_muestra').val(1);
                    }else if($('#grano2_muestra').val()>=10 && $('#grano2_muestra').val()!=teclado_especial){
                        $('#defecto2_muestra').val(2);
                    }else{
                        $('#defecto2_muestra').val(0);
                    }

                });
                $('#grano3_muestra').on('keyup', function(){
                    if($('#grano3_muestra').val().length==0){
                        $('#defecto3_muestra').val(0);
                    }else if($('#grano3_muestra').val()<10){
                        $('#defecto3_muestra').val(1);
                    }
                    especiales="8-37-38-46";//Array
                    teclado_especial=false;
                    //bucle de encontrar un caracter especial
                    for(var i in especiales){
                        if(key==especiales[i]){
                            teclado_especial=true;;
                        }
                    }
                    if($('#grano3_muestra').val()<10 && $('#grano3_muestra').val()!=teclado_especial){
                        $('#defecto3_muestra').val(1);
                    }else if($('#grano3_muestra').val()>=10 && $('#grano3_muestra').val()!=teclado_especial){
                        $('#defecto3_muestra').val(2);
                    }else{
                        $('#defecto3_muestra').val(0);
                    }

                });
                $('#grano4_muestra').on('keyup', function(){
                    if($('#grano4_muestra').val().length==0){
                        $('#defecto4_muestra').val(0);
                    }else if($('#grano4_muestra').val()<10){
                        $('#defecto4_muestra').val(1);
                    }
                    especiales="8-37-38-46";//Array
                    teclado_especial=false;
                    //bucle de encontrar un caracter especial
                    for(var i in especiales){
                        if(key==especiales[i]){
                            teclado_especial=true;;
                        }
                    }
                    if($('#grano4_muestra').val()<10 && $('#grano4_muestra').val()!=teclado_especial){
                        $('#defecto4_muestra').val(1);
                    }else if($('#grano4_muestra').val()>=10 && $('#grano4_muestra').val()!=teclado_especial){
                        $('#defecto4_muestra').val(2);
                    }else{
                        $('#defecto4_muestra').val(0);
                    }

                });
                $('#grano5_muestra').on('keyup', function(){
                    if($('#grano5_muestra').val().length==0){
                        $('#defecto5_muestra').val(0);
                    }else if($('#grano5_muestra').val()<10){
                        $('#defecto5_muestra').val(1);
                    }
                    especiales="8-37-38-46";//Array
                    teclado_especial=false;
                    //bucle de encontrar un caracter especial
                    for(var i in especiales){
                        if(key==especiales[i]){
                            teclado_especial=true;;
                        }
                    }
                    if($('#grano5_muestra').val()<10 && $('#grano5_muestra').val()!=teclado_especial){
                        $('#defecto5_muestra').val(1);
                    }else if($('#grano5_muestra').val()>=10 && $('#grano5_muestra').val()!=teclado_especial){
                        $('#defecto5_muestra').val(2);
                    }else{
                        $('#defecto5_muestra').val(0);
                    }

                });
                $('#grano6_muestra').on('keyup', function(){
                    if($('#grano6_muestra').val().length==0){
                        $('#defecto6_muestra').val(0);
                    }else if($('#grano6_muestra').val()<10){
                        $('#defecto6_muestra').val(1);
                    }
                    especiales="8-37-38-46";//Array
                    teclado_especial=false;
                    //bucle de encontrar un caracter especial
                    for(var i in especiales){
                        if(key==especiales[i]){
                            teclado_especial=true;;
                        }
                    }
                    if($('#grano6_muestra').val()<10 && $('#grano6_muestra').val()!=teclado_especial){
                        $('#defecto6_muestra').val(1);
                    }else if($('#grano6_muestra').val()>=10 && $('#grano6_muestra').val()!=teclado_especial){
                        $('#defecto6_muestra').val(2);
                    }else{
                        $('#defecto6_muestra').val(0);
                    }

                });
                $('#grano7_muestra').on('keyup', function(){
                    if($('#grano7_muestra').val().length==0){
                        $('#defecto7_muestra').val(0);
                    }else if($('#grano7_muestra').val()<10){
                        $('#defecto7_muestra').val(1);
                    }
                    especiales="8-37-38-46";//Array
                    teclado_especial=false;
                    //bucle de encontrar un caracter especial
                    for(var i in especiales){
                        if(key==especiales[i]){
                            teclado_especial=true;;
                        }
                    }
                    if($('#grano7_muestra').val()<10 && $('#grano7_muestra').val()!=teclado_especial){
                        $('#defecto7_muestra').val(1);
                    }else if($('#grano7_muestra').val()>=10 && $('#grano7_muestra').val()!=teclado_especial){
                        $('#defecto7_muestra').val(2);
                    }else{
                        $('#defecto7_muestra').val(0);
                    }

                });
                $('#grano8_muestra').on('keyup', function(){
                    if($('#grano8_muestra').val().length==0){
                        $('#defecto8_muestra').val(0);
                    }else if($('#grano8_muestra').val()<10){
                        $('#defecto8_muestra').val(1);
                    }
                    especiales="8-37-38-46";//Array
                    teclado_especial=false;
                    //bucle de encontrar un caracter especial
                    for(var i in especiales){
                        if(key==especiales[i]){
                            teclado_especial=true;;
                        }
                    }
                    if($('#grano8_muestra').val()<10 && $('#grano8_muestra').val()!=teclado_especial){
                        $('#defecto8_muestra').val(1);
                    }else if($('#grano8_muestra').val()>=10 && $('#grano8_muestra').val()!=teclado_especial){
                        $('#defecto8_muestra').val(2);
                    }else{
                        $('#defecto8_muestra').val(0);
                    }

                });
                $('#grano9_muestra').on('keyup', function(){
                    if($('#grano9_muestra').val().length==0){
                        $('#defecto9_muestra').val(0);
                    }else if($('#grano9_muestra').val()<10){
                        $('#defecto9_muestra').val(1);
                    }
                    especiales="8-37-38-46";//Array
                    teclado_especial=false;
                    //bucle de encontrar un caracter especial
                    for(var i in especiales){
                        if(key==especiales[i]){
                            teclado_especial=true;;
                        }
                    }
                    if($('#grano9_muestra').val()<10 && $('#grano9_muestra').val()!=teclado_especial){
                        $('#defecto9_muestra').val(1);
                    }else if($('#grano9_muestra').val()>=10 && $('#grano9_muestra').val()!=teclado_especial){
                        $('#defecto9_muestra').val(2);
                    }else{
                        $('#defecto9_muestra').val(0);
                    }

                });
                $('#grano10_muestra').on('keyup', function(){
                    if($('#grano10_muestra').val().length==0){
                        $('#defecto10_muestra').val(0);
                    }else if($('#grano10_muestra').val()<10){
                        $('#defecto10_muestra').val(1);
                    }
                    especiales="8-37-38-46";//Array
                    teclado_especial=false;
                    //bucle de encontrar un caracter especial
                    for(var i in especiales){
                        if(key==especiales[i]){
                            teclado_especial=true;;
                        }
                    }
                    if($('#grano10_muestra').val()<10 && $('#grano10_muestra').val()!=teclado_especial){
                        $('#defecto10_muestra').val(1);
                    }else if($('#grano10_muestra').val()>=10 && $('#grano10_muestra').val()!=teclado_especial){
                        $('#defecto10_muestra').val(2);
                    }else{
                        $('#defecto10_muestra').val(0);
                    }

                });
                $('#grano11_muestra').on('keyup', function(){
                    if($('#grano11_muestra').val().length==0){
                        $('#defecto11_muestra').val(0);
                    }else if($('#grano11_muestra').val()<10){
                        $('#defecto11_muestra').val(1);
                    }
                    especiales="8-37-38-46";//Array
                    teclado_especial=false;
                    //bucle de encontrar un caracter especial
                    for(var i in especiales){
                        if(key==especiales[i]){
                            teclado_especial=true;;
                        }
                    }
                    if($('#grano11_muestra').val()<10 && $('#grano11_muestra').val()!=teclado_especial){
                        $('#defecto11_muestra').val(1);
                    }else if($('#grano11_muestra').val()>=10 && $('#grano11_muestra').val()!=teclado_especial){
                        $('#defecto11_muestra').val(2);
                    }else{
                        $('#defecto11_muestra').val(0);
                    }

                });
                $('#grano12_muestra').on('keyup', function(){
                    if($('#grano12_muestra').val().length==0){
                        $('#defecto12_muestra').val(0);
                    }else if($('#grano12_muestra').val()<10){
                        $('#defecto12_muestra').val(1);
                    }
                    especiales="8-37-38-46";//Array
                    teclado_especial=false;
                    //bucle de encontrar un caracter especial
                    for(var i in especiales){
                        if(key==especiales[i]){
                            teclado_especial=true;;
                        }
                    }
                    if($('#grano12_muestra').val()<10 && $('#grano12_muestra').val()!=teclado_especial){
                        $('#defecto12_muestra').val(1);
                    }else if($('#grano12_muestra').val()>=10 && $('#grano12_muestra').val()!=teclado_especial){
                        $('#defecto12_muestra').val(2);
                    }else{
                        $('#defecto12_muestra').val(0);
                    }

                });
                $('#grano13_muestra').on('keyup', function(){
                    if($('#grano13_muestra').val().length==0){
                        $('#defecto13_muestra').val(0);
                    }else if($('#grano13_muestra').val()<10){
                        $('#defecto13_muestra').val(1);
                    }
                    especiales="8-37-38-46";//Array
                    teclado_especial=false;
                    //bucle de encontrar un caracter especial
                    for(var i in especiales){
                        if(key==especiales[i]){
                            teclado_especial=true;;
                        }
                    }
                    if($('#grano13_muestra').val()<10 && $('#grano13_muestra').val()!=teclado_especial){
                        $('#defecto13_muestra').val(1);
                    }else if($('#grano13_muestra').val()>=10 && $('#grano13_muestra').val()!=teclado_especial){
                        $('#defecto13_muestra').val(2);
                    }else{
                        $('#defecto13_muestra').val(0);
                    }

                });
                $('#grano14_muestra').on('keyup', function(){
                    if($('#grano14_muestra').val().length==0){
                        $('#defecto14_muestra').val(0);
                    }else if($('#grano14_muestra').val()<10){
                        $('#defecto14_muestra').val(1);
                    }
                    especiales="8-37-38-46";//Array
                    teclado_especial=false;
                    //bucle de encontrar un caracter especial
                    for(var i in especiales){
                        if(key==especiales[i]){
                            teclado_especial=true;;
                        }
                    }
                    if($('#grano14_muestra').val()<10 && $('#grano14_muestra').val()!=teclado_especial){
                        $('#defecto14_muestra').val(1);
                    }else if($('#grano14_muestra').val()>=10 && $('#grano14_muestra').val()!=teclado_especial){
                        $('#defecto14_muestra').val(2);
                    }else{
                        $('#defecto14_muestra').val(0);
                    }

                });
                $('#grano15_muestra').on('keyup', function(){
                    if($('#grano15_muestra').val().length==0){
                        $('#defecto15_muestra').val(0);
                    }
                    else if($('#grano15_muestra').val()<10){
                        $('#defecto15_muestra').val(1);
                    }
                    especiales="8-37-38-46";//Array
                    teclado_especial=false;
                    //bucle de encontrar un caracter especial
                    for(var i in especiales){
                        if(key==especiales[i]){
                            teclado_especial=true;;
                        }
                    }
                    if($('#grano15_muestra').val()<10 && $('#grano15_muestra').val()!=teclado_especial){
                        $('#defecto15_muestra').val(1);
                    }else if($('#grano15_muestra').val()>=10 && $('#grano15_muestra').val()!=teclado_especial){
                        $('#defecto15_muestra').val(2);
                    }else{
                        $('#defecto15_muestra').val(0);
                    }

                });

                $('#grano16_muestra').on('keyup', function(){
                    if($('#grano16_muestra').val().length==0){
                        $('#defecto16_muestra').val(0);
                    }
                    else if($('#grano16_muestra').val()<10){
                        $('#defecto16_muestra').val(1);
                    }
                    especiales="8-37-38-46";//Array
                    teclado_especial=false;
                    //bucle de encontrar un caracter especial
                    for(var i in especiales){
                        if(key==especiales[i]){
                            teclado_especial=true;;
                        }
                    }
                    if($('#grano16_muestra').val()<10 && $('#grano16_muestra').val()!=teclado_especial){
                        $('#defecto16_muestra').val(1);
                    }else if($('#grano16_muestra').val()>=10 && $('#grano16_muestra').val()!=teclado_especial){
                        $('#defecto16_muestra').val(2);
                    }else{
                        $('#defecto16_muestra').val(0);
                    }

                });

                //CALCULAR SUMA TOTAL DE DEFECTOS - PORCENTAJE DEFECTOS
                function suma_total_defectos(){
                    var sumatotal= (parseFloat($('#defecto1_muestra').val())+parseFloat($('#defecto2_muestra').val())
                    +parseFloat($('#defecto3_muestra').val())+parseFloat($('#defecto4_muestra').val())+parseFloat($('#defecto5_muestra').val())
                    +parseFloat($('#defecto6_muestra').val())+parseFloat($('#defecto7_muestra').val())+parseFloat($('#defecto8_muestra').val())
                    +parseFloat($('#defecto9_muestra').val())+parseFloat($('#defecto10_muestra').val())+parseFloat($('#defecto11_muestra').val())
                    +parseFloat($('#defecto12_muestra').val())+parseFloat($('#defecto13_muestra').val())+parseFloat($('#defecto14_muestra').val())
                    +parseFloat($('#defecto15_muestra').val())+parseFloat($('#defecto16_muestra').val())).toFixed(2);
                
                    $('#suma_total_defectos').val(sumatotal);
                }
                $("#grano1_muestra").on("keyup", suma_total_defectos);
                $("#grano2_muestra").on("keyup", suma_total_defectos);
                $("#grano3_muestra").on("keyup", suma_total_defectos);
                $("#grano4_muestra").on("keyup", suma_total_defectos);
                $("#grano5_muestra").on("keyup", suma_total_defectos);
                $("#grano6_muestra").on("keyup", suma_total_defectos);
                $("#grano7_muestra").on("keyup", suma_total_defectos);
                $("#grano8_muestra").on("keyup", suma_total_defectos);
                $("#grano9_muestra").on("keyup", suma_total_defectos);
                $("#grano10_muestra").on("keyup", suma_total_defectos);
                $("#grano11_muestra").on("keyup", suma_total_defectos);
                $("#grano12_muestra").on("keyup", suma_total_defectos);
                $("#grano13_muestra").on("keyup", suma_total_defectos);
                $("#grano14_muestra").on("keyup", suma_total_defectos);
                $("#grano15_muestra").on("keyup", suma_total_defectos);
                $("#grano16_muestra").on("keyup", suma_total_defectos);

                /*CALCULOS FINAL */

                $("#peso_defectos_total").on("keyup", calcular_porcentaje_defectos);
                $("#peso_pergamino").on("keyup", calcular_porcentaje_defectos);

                function calcular_porcentaje_defectos(){
                    var calculo= ((parseFloat($('#peso_defectos_total').val())*100)/parseFloat($('#peso_pergamino').val())).toFixed(2);

                    $('#porcentaje_defectos').val(!isNaN(calculo) ? calculo : '0.00');
                    
                }

                /*RENDIMIENTO EXPORTABLE */
                $("#peso_defectos_total").on("keyup", calcular_rendimiento_exportable);
                $("#peso_cascarilla").on("keyup", calcular_rendimiento_exportable);
                $("#peso_pergamino").on("keyup", calcular_rendimiento_exportable);

                function calcular_rendimiento_exportable(){
                    var calculo= (100 - parseFloat($('#porcentaje_cascarilla').val()) - parseFloat($('#porcentaje_defectos').val())).toFixed(2);

                    $('#rendimiento_exportable').val(!isNaN(calculo) ? calculo: '0.00');
                }




            });

        </script>
        <style>
            /*
            Los estilos puedes ponerlos al inicio de tu documento HTML o puedes 
            meterlos en un archivo por separado
            */
            .auto{
                display: none !important;
            }
        </style>