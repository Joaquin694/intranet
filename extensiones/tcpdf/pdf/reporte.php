<?php
        require_once "../../../modelos/config.php";

        $id = $_GET["codigo"];
        
        //echo "<p>El id es: {$id}</p>";
        //CONSULTA PARA REPORTE PDF
        $sql2= "SELECT anal_fisico.pk_anal_fisico, anal_fisico.fecha_recepcion, anal_fisico.fecha_analisis, 
					anal_fisico.codigo_interno, anal_fisico.varidad, clientes.asoc_coop, clientes.nombre, anal_fisico.cosecha, clientes.direccion, anal_fisico.analisis_de_pergamino, 
					anal_fisico.proceso_organico, anal_fisico.proceso_convencional, anal_fisico.peso_pergamino, anal_fisico.h_pergamino, 
					anal_fisico.normal_pergamino, anal_fisico.disparejo_pergamino, anal_fisico.manchado_pergamino, anal_fisico.negruzco_pergamino, anal_fisico.otros_pergamino, anal_fisico.fresco_pergamino, anal_fisico.viejo_pergamino, 
					anal_fisico.fermento_pergamino, anal_fisico.terroso_pergamino, anal_fisico.hierbas_pergamino, anal_fisico.moho_pergamino, 
					anal_fisico.peso_oro, anal_fisico.h_oro, anal_fisico.normal_oro, anal_fisico.blanqueado_oro, anal_fisico.disparejo_oro, anal_fisico.amarillo_oro, anal_fisico.traslucido_oro, 
					anal_fisico.azulado_oro, anal_fisico.fresco_oro, anal_fisico.viejo_oro, anal_fisico.fermento_oro, anal_fisico.
					terroso_oro, anal_fisico.hierbas_oro, anal_fisico.moho_oro, anal_fisico.observaciones, anal_fisico.peso_cascarilla, anal_fisico.porcentaje_cascarilla, anal_fisico.peso1_granulometria, anal_fisico.
					peso2_granulometria, anal_fisico.peso3_granulometria, anal_fisico.peso4_granulometria, anal_fisico.peso5_granulometria, anal_fisico.
					peso6_granulometria, anal_fisico.peso7_granulometria, anal_fisico.peso_total_granulometria, anal_fisico.porcentaje1_granulometria, anal_fisico.porcentaje2_granulometria, anal_fisico.porcentaje3_granulometria, anal_fisico.porcentaje4_granulometria, anal_fisico.
					porcentaje5_granulometria, anal_fisico.porcentaje6_granulometria, anal_fisico.porcentaje7_granulometria, anal_fisico.porcentaje_total_granulometria, anal_fisico.
					grano1_muestra, anal_fisico.grano2_muestra, anal_fisico.grano3_muestra, anal_fisico.grano4_muestra, anal_fisico.grano5_muestra, anal_fisico.grano6_muestra, anal_fisico.grano7_muestra, anal_fisico.
					grano8_muestra, anal_fisico.grano9_muestra, anal_fisico.grano10_muestra, anal_fisico.grano11_muestra, anal_fisico.
					grano12_muestra, anal_fisico.grano13_muestra, anal_fisico.grano14_muestra, anal_fisico.grano15_muestra, anal_fisico.grano16_muestra, anal_fisico.defecto1_muestra, anal_fisico.defecto2_muestra, anal_fisico.
					defecto3_muestra, anal_fisico.defecto4_muestra, anal_fisico.defecto5_muestra, anal_fisico.defecto6_muestra, anal_fisico.
					defecto7_muestra, anal_fisico.defecto8_muestra, anal_fisico.defecto9_muestra, anal_fisico.defecto10_muestra, anal_fisico.defecto11_muestra, anal_fisico.defecto12_muestra, anal_fisico.defecto13_muestra, anal_fisico.
					defecto14_muestra, anal_fisico.defecto15_muestra, anal_fisico.defecto16_muestra, anal_fisico.suma_total_defectos, anal_fisico.
					peso_defectos_total, anal_fisico.porcentaje_defectos, anal_fisico.rendimiento_exportable FROM anal_fisico inner join clientes
					on anal_fisico.idcliente=clientes.id WHERE pk_anal_fisico='$id'";
        

        $result2=mysqli_query($conexion,$sql2);
        $mostrar2=mysqli_fetch_row($result2);

        require_once('tcpdf_include.php');
        $pdf = new TCPDF ('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Jhoan Manuel');
        $pdf->SetTitle('RESULTADOS ANALISIS FISICOS');
    
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetMargins(20,20,20, false);
        $pdf->SetAutoPageBreak(true, 20);
        $pdf->SetFont('Helvetica', '', 10);
        $pdf->addPage();

        
    
        $content = '';
        
        $content .= '
            <style>
                td{
                    border: 1px solid black;
                    text-align: center;
                        
                }
            </style>
            <div class="row">
                <div class="col-md-12">
                    <h1 style="text-align: center;">'.'RESULTADOS ANALISIS FISICOS'.'</h1>
                        <div class="modal-body table-responsive">
                        <table>
                            <tbody>
                            
        ';
    
        
                                
                        
                            
    
                        $content .= '
                                    <tr>
                                        <td><b>Fecha Recepción:</b></td>
                                        <td>'.$mostrar2[1].'</td>

                                        <td style="border:none;" rowspan="4"></td>

                                        <td><b>Asoc./Coop:</b></td>
                                        <td>'.$mostrar2[5].'</td>
                                    </tr>
                                    <tr>
                                        <td><b>Fecha de Analisis:</b></td>
                                        <td>'.$mostrar2[2].'</td>
                                        <td><b>Productor:</b></td>
                                        <td>'.$mostrar2[6].'</td>
                                        
                                    </tr>
                                    <tr>
                                        <td><b>Codigo Interno:</b></td>
                                        <td>'.$mostrar2[3].'</td>
                                        <td><b>Cosecha:</b></td>
                                        <td>'.$mostrar2[7].'</td>
                                        
                                    </tr>
                                    <tr>
                                        <td><b>Varidad:</b></td>
                                        <td>'.$mostrar2[4].'</td>
                                        <td><b>Ubicación:</b></td>
                                        <td>'.$mostrar2[8].'</td>
                                        
                                    </tr>
                                    
                                    ';
                                
                                
                            $content .= '</tbody>
                                </table>';

/**----------------------------------------------------------------------------------------------- */

                        $content .= '
                        <div class="row">
                            <div class="col-md-12">
                                <h3 style="text-align: center;">'.'I. ANÁLISIS FÍSICO'.'</h3>
                                    
                                    <div class="modal-body table-responsive">
                                    <table>
                                        <tbody>
                                        
                        ';
                        if($mostrar2[9]=="Análisis de Pergamino"){
                            $mostrar9= "X";
                        }
                        else{
                            $mostrar9=" ";
                        }

                        if($mostrar2[10]=="Proceso Organico"){
                            $mostrar10= "X";
                        }
                        else{
                            $mostrar10=" ";
                        }
                        if($mostrar2[11]=="Proceso Convencional"){
                            $mostrar11= "X";
                        }
                        else{
                            $mostrar11=" ";
                        }

                        $content .= '
                        <tr>
                            <td rowspan="2">Análisis de Pergamino:</td>
                            <td rowspan="2" align="center"><b>'.$mostrar9.'</b></td>
                            <td style="border:none;"></td>
                            <td rowspan="2">Proceso Organico:</td>
                            <td rowspan="2" align="center"><b>'.$mostrar10.'</b></td>
                            <td style="border:none;"></td>
                            <td rowspan="2">Proceso Convencional:</td>
                            <td rowspan="2" align="center"><b>'.$mostrar11.'</b></td>
                        </tr>
                        <tr>


                            <td style="border:none;"></td>

                            <td style="border:none;"></td>

                        </tr>
                        
                        
                        ';
                    
                    
                $content .= '</tbody>
                    </table>';

/**------------------------------------------------------------------------------------------------ */
                $content .= '
                <div class="row">
                    <div class="col-md-12">
                            
                            <div class="modal-body table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th style="border: 1px solid black;" colspan="4" align="center"><b>Café pergamino</b></th>
                                        <th></th>
                                        <th style="border: 1px solid black;" colspan="4" align="center"><b>Café Oro</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                ';

                            if($mostrar2[14]=="normal"){
                                $mostrar14= "X";
                            }
                            else{
                                $mostrar14=" ";
                            }
                            if($mostrar2[15]=="disparejo"){
                                $mostrar15= "X";
                            }
                            else{
                                $mostrar15=" ";
                            }
                            if($mostrar2[16]=="manchado"){
                                $mostrar16= "X";
                            }
                            else{
                                $mostrar16=" ";
                            }
                            if($mostrar2[17]=="negruzco"){
                                $mostrar17= "X";
                            }
                            else{
                                $mostrar17=" ";
                            }
                            if($mostrar2[18]=="otros"){
                                $mostrar18= "X";
                            }
                            else{
                                $mostrar18=" ";
                            }
                            if($mostrar2[19]=="fresco"){
                                $mostrar19= "X";
                            }
                            else{
                                $mostrar19=" ";
                            }
                            if($mostrar2[20]=="viejo"){
                                $mostrar20= "X";
                            }
                            else{
                                $mostrar20=" ";
                            }
                            if($mostrar2[21]=="fermento"){
                                $mostrar21= "X";
                            }
                            else{
                                $mostrar21=" ";
                            }     
                            if($mostrar2[22]=="terroso"){
                                $mostrar22= "X";
                            }
                            else{
                                $mostrar22=" ";
                            } 
                            if($mostrar2[23]=="hierbas"){
                                $mostrar23= "X";
                            }
                            else{
                                $mostrar23=" ";
                            }
                            if($mostrar2[24]=="moho"){
                                $mostrar24= "X";
                            }
                            else{
                                $mostrar24=" ";
                            }
                            /** */
                            if($mostrar2[27]=="normal"){
                                $mostrar27= "X";
                            }
                            else{
                                $mostrar27=" ";
                            } 
                            if($mostrar2[28]=="blanqueado"){
                                $mostrar28= "X";
                            }
                            else{
                                $mostrar28=" ";
                            } 
                            if($mostrar2[29]=="disparejo"){
                                $mostrar29= "X";
                            }
                            else{
                                $mostrar29=" ";
                            } 
                            if($mostrar2[30]=="amarillo"){
                                $mostrar30= "X";
                            }
                            else{
                                $mostrar30=" ";
                            } 
                            if($mostrar2[31]=="traslucido"){
                                $mostrar31= "X";
                            }
                            else{
                                $mostrar31=" ";
                            } 
                            if($mostrar2[32]=="azulado"){
                                $mostrar32= "X";
                            }
                            else{
                                $mostrar32=" ";
                            } 
                            if($mostrar2[33]=="fresco"){
                                $mostrar33= "X";
                            }
                            else{
                                $mostrar33=" ";
                            } 
                            if($mostrar2[34]=="viejo"){
                                $mostrar34= "X";
                            }
                            else{
                                $mostrar34=" ";
                            }
                            if($mostrar2[35]=="fermento"){
                                $mostrar35= "X";
                            }
                            else{
                                $mostrar35=" ";
                            } 
                            if($mostrar2[36]=="terroso"){
                                $mostrar36= "X";
                            }
                            else{
                                $mostrar36=" ";
                            } 
                            if($mostrar2[37]=="hierbas"){
                                $mostrar37= "X";
                            }
                            else{
                                $mostrar37=" ";
                            } 
                            if($mostrar2[38]=="moho"){
                                $mostrar38= "X";
                            }
                            else{
                                $mostrar38=" ";
                            }  
                            

                            $content .= '
                                        <tr>
                                            <td><b>Peso:</b></td>
                                            <td colspan="3">'.$mostrar2[12].'</td>
                                            <td style="border:none;"></td>

                                            <td><b>Peso:</b></td>
                                            <td colspan="3">'.$mostrar2[25].'</td>

                                        </tr>
                                        <tr>
                                            <td><b>Hº (%):</b></td>
                                            <td colspan="3">'.$mostrar2[13].'</td>
                                            <td style="border:none;"></td>

                                            <td><b>Hº (%):</b></td>
                                            <td colspan="3">'.$mostrar2[26].'</td>

                                            
                                        </tr>
                                        <tr>
                                            <td colspan="2"><b>Color:</b></td>
                                            <td colspan="2"><b>Olor:</b></td>

                                            <td style="border:none;"></td>

                                            <td colspan="2"><b>Color:</b></td>
                                            <td colspan="2"><b>Olor:</b></td>

                                            
                                        </tr>
                                        <tr>
                                            <td>Normal</td>
                                            <td align="center">'.$mostrar14.'</td>
                                            <td>Fresco</td>
                                            <td>'.$mostrar19.'</td>
                                            <td style="border:none;"></td>

                                            <td>Normal</td>
                                            <td>'.$mostrar27.'</td>
                                            <td>Fresco</td>
                                            <td>'.$mostrar33.'</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Disparejo</td>
                                            <td align="center">'.$mostrar15.'</td>
                                            <td>Viejo</td>
                                            <td>'.$mostrar20.'</td>
                                            <td style="border:none;"></td>
                                            
                                            <td>Blanqueado</td>
                                            <td>'.$mostrar28.'</td>
                                            <td>Viejo</td>
                                            <td>'.$mostrar34.'</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Manchado</td>
                                            <td align="center">'.$mostrar16.'</td>
                                            <td>Fermento</td>
                                            <td>'.$mostrar21.'</td>
                                            <td style="border:none;"></td>

                                            <td>Disparejo</td>
                                            <td>'.$mostrar29.'</td>
                                            <td>Fermento</td>
                                            <td>'.$mostrar35.'</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Negruzco</td>
                                            <td>'.$mostrar17.'</td>
                                            <td>Terroso</td>
                                            <td>'.$mostrar22.'</td>
                                            <td style="border:none;"></td>

                                            <td>Amarillo</td>
                                            <td>'.$mostrar30.'</td>
                                            <td>Terroso</td>
                                            <td>'.$mostrar36.'</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Otros</td>
                                            <td>'.$mostrar18.'</td>
                                            <td>Hierbas</td>
                                            <td>'.$mostrar23.'</td>
                                            <td style="border:none;"></td>

                                            <td>Traslucido</td>
                                            <td>'.$mostrar31.'</td>
                                            <td>Hierbas</td>
                                            <td>'.$mostrar37.'</td>
                                            
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>

                                            <td>Moho</td>
                                            <td>'.$mostrar24.'</td>
                                            <td style="border:none;"></td>
                                            
                                            <td>Azulado</td>
                                            <td>'.$mostrar32.'</td>
                                            <td>Moho</td>
                                            <td>'.$mostrar38.'</td>
                                            
                                        </tr>
                                        <tr>
                                            <td style="border:none;" colspan="2"></td>
                                            <td style="border:none;" colspan="7"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><b>Observaciones:</b></td>
                                            <td colspan="7">'.$mostrar2[39].'</td>
                                        </tr>
                                        
                                        ';
                                    
                                    
                                $content .= '</tbody>
                                    </table>';

/**----------------------------------------------------------------------------------------------- */

                            $content .= '
                            <div class="row">
                                <div class="col-md-12">
                                        
                                <div class="modal-body table-responsive">
                                <table>
                                    <tbody>
                                            
                            ';

                            $content .= '
                            <tr>
                                <td rowspan="2"><b>Cascarilla:</b></td>
                                <td colspan="2">Peso (g):</td>

                                <td colspan="2">'.$mostrar2[40].'</td>

                                <td style="border:none;"></td>

                                <td colspan="5"><b>Defectos solo en caso de exportacion</b></td>

                                
                            </tr>
                            <tr>
                                <td colspan="2">Porcentaje (%):</td>

                                <td colspan="2">'.$mostrar2[41].'</td>

                                <td style="border:none;"></td>

                                <td colspan="5"><b>Muestra</b></td>
                            </tr>
                            <tr>
                                <td style="border:none;"></td>
                                <td style="border:none;"></td>
                                <td style="border:none;"></td>
                                <td style="border:none;"></td>
                                <td style="border:none;"></td>

                                <td style="border:none;"></td>

                                <td colspan="2"><b>Primarios</b></td>
                                <td>Granos</td>

                                <td style="border:none;"></td>

                                <td>Defectos</td>

                            </tr>
                            <tr>
                                <td style="border:none;"></td>
                                <td style="border:none;"></td>
                                <td style="border:none;"></td>
                                <td style="border:none;"></td>
                                <td style="border:none;"></td>

                                <td style="border:none;"></td>

                                <td colspan="2">Grano negro</td>

                                <td>'.$mostrar2[58].'</td>
                                <td style="border:none;"></td>
                                <td>'.$mostrar2[74].'</td>
                            </tr>
                            <tr>
                                <td colspan="5"><b>Granulometría</b></td>


                                <td style="border:none;"></td>

                                <td colspan="2">Grano agrio</td>
                                <td>'.$mostrar2[59].'</td>
                                <td style="border:none;"></td>
                                <td>'.$mostrar2[75].'</td>
                            </tr>
                            
                            <tr>
                                <td>Malla Nº:</td>
                                <td style="border:none;"></td>

                                <td>Peso (g):</td>
                                <td style="border:none;"></td>

                                <td>%</td>

                                <td style="border:none;"></td>

                                <td colspan="2">Cereza seca</td>

                                <td>'.$mostrar2[60].'</td>
                                <td style="border:none;"></td>
                                <td>'.$mostrar2[76].'</td>
                            </tr>
                            <tr>
                                <td>19</td>
                                <td style="border:none;"></td>
                                <td>'.$mostrar2[42].'</td>

                                <td style="border:none;"></td>
                                <td>'.$mostrar2[50].'</td>

                                <td style="border:none;"></td>

                                <td colspan="2">Daño hongo</td>
                                <td>'.$mostrar2[61].'</td>
                                <td style="border:none;"></td>
                                <td>'.$mostrar2[77].'</td>
                            </tr>
                            <tr>
                                <td>18</td>
                                <td style="border:none;"></td>
                                <td>'.$mostrar2[43].'</td>

                                <td style="border:none;"></td>
                                <td>'.$mostrar2[51].'</td>

                                <td style="border:none;"></td>

                                <td colspan="2">Materia extraña</td>
                                <td>'.$mostrar2[62].'</td>
                                <td style="border:none;"></td>
                                <td>'.$mostrar2[78].'</td>
                            </tr>
                            <tr>
                                <td>17</td>
                                <td style="border:none;"></td>
                                <td>'.$mostrar2[44].'</td>
                                <td style="border:none;"></td>
                                <td>'.$mostrar2[52].'</td>

                                <td style="border:none;"></td>

                                <td colspan="2">Brocado severo</td>
                                <td>'.$mostrar2[63].'</td>
                                <td style="border:none;"></td>
                                <td>'.$mostrar2[79].'</td>
                            </tr>
                            <tr>
                                <td>16</td>
                                <td style="border:none;"></td>
                                <td>'.$mostrar2[45].'</td>
                                <td style="border:none;"></td>
                                <td>'.$mostrar2[53].'</td>

                                <td style="border:none;"></td>

                                <td colspan="2"><b>Secundarios</b></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>15</td>
                                <td style="border:none;"></td>
                                <td>'.$mostrar2[46].'</td>
                                <td style="border:none;"></td>
                                <td>'.$mostrar2[54].'</td>

                                <td style="border:none;"></td>

                                <td colspan="2">Parcial negro</td>
                                <td>'.$mostrar2[64].'</td>
                                <td style="border:none;"></td>
                                <td>'.$mostrar2[80].'</td>
                            </tr>
                            <tr>
                                <td>14</td>
                                <td style="border:none;"></td>
                                <td>'.$mostrar2[47].'</td>
                                <td style="border:none;"></td>
                                <td>'.$mostrar2[55].'</td>

                                <td style="border:none;"></td>

                                <td colspan="2">Parcial agrio</td>
                                <td>'.$mostrar2[65].'</td>
                                <td style="border:none;"></td>
                                <td>'.$mostrar2[81].'</td>
                            </tr>
                            <tr>
                                <td>13</td>
                                <td style="border:none;"></td>
                                <td>'.$mostrar2[48].'</td>
                                <td style="border:none;"></td>
                                <td>'.$mostrar2[56].'</td>

                                <td style="border:none;"></td>

                                <td colspan="2">Pergamino</td>
                                <td>'.$mostrar2[66].'</td>
                                <td style="border:none;"></td>
                                <td>'.$mostrar2[82].'</td>
                            </tr>
                            <tr>
                                <td colspan="2"><b>TOTAL</b></td>

                                <td>'.$mostrar2[49].'</td>
                                <td></td>
                                <td>'.$mostrar2[57].'</td>

                                <td style="border:none;"></td>

                                <td colspan="2">Flotador/blanq</td>
                                <td>'.$mostrar2[67].'</td>
                                <td style="border:none;"></td>
                                <td>'.$mostrar2[83].'</td>
                            </tr>
                            
                            <tr>
                                <td colspan="5" style="border:none;"></td>


                                <td style="border:none;"></td>

                                <td colspan="2">Inmaduro</td>
                                <td>'.$mostrar2[68].'</td>
                                <td style="border:none;"></td>
                                <td>'.$mostrar2[84].'</td>
                            </tr>
                            <tr>
                                <td colspan="5" style="border:none;"></td>
                                

                                <td style="border:none;"></td>

                                <td colspan="2">Averanado/Arrug</td>
                                <td>'.$mostrar2[69].'</td>
                                <td style="border:none;"></td>
                                <td>'.$mostrar2[85].'</td>
                            </tr>
                            <tr>
                                <td colspan="5" style="border:none;"></td>

                                <td style="border:none;"></td>

                                <td colspan="2">mordidos maq.</td>
                                <td>'.$mostrar2[70].'</td>
                                <td style="border:none;"></td>
                                <td>'.$mostrar2[86].'</td>
                            </tr>
                            <tr>
                                <td colspan="5" style="border:none;"></td>

                                <td style="border:none;"></td>

                                <td colspan="2">rotos</td>
                                <td>'.$mostrar2[71].'</td>
                                <td style="border:none;"></td>
                                <td>'.$mostrar2[87].'</td>
                            </tr>
                            <tr>
                                <td colspan="5" style="border:none;"></td>

                                <td style="border:none;"></td>

                                <td colspan="2">Granos humedos</td>
                                <td>'.$mostrar2[72].'</td>
                                <td style="border:none;"></td>
                                <td>'.$mostrar2[88].'</td>
                            </tr>
                            <tr>
                                <td colspan="5" style="border:none;"></td>

                                <td style="border:none;"></td>

                                <td colspan="2">Brocado leve</td>
                                <td>'.$mostrar2[73].'</td>
                                <td style="border:none;"></td>
                                <td>'.$mostrar2[89].'</td>
                            </tr>
                            <tr>
                                <td colspan="5" style="border:none;"></td>

                                <td style="border:none;"></td>

                                <td colspan="2" style="border:none;"></td>
                                <td colspan="2"><b>Porcentaje defectos</b></td>

                                <td>'.$mostrar2[90].'</td>
                            </tr>
                            


                            ';


                            $content .= '</tbody>
                            </table>';

/**----------------------------------------------------------------------------------------------- */

                            $content .= '
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 style="text-align: center;"></h3>
                                        
                                        <div class="modal-body table-responsive">
                                        <table>
                                            <tbody>
                                            
                            ';

                            $content .= '
                            <tr>
                                <td style="border:none;"></td>
                                <td colspan="4"><b>Peso defectos total (g)</b></td>

                                <td colspan="2">'.$mostrar2[91].'</td>

                                <td style="border:none;"></td>
                            </tr>
                            <tr>
                                <td style="border:none;"></td>
                                <td colspan="4"><b>Porcentaje defectos (%)</b></td>

                                <td colspan="2">'.$mostrar2[92].'</td>
                                <td style="border:none;"></td>
                            </tr>
                            <tr>
                                <td rowspan="2" colspan="3"><b>Rendimiento Exportable</b></td>

                                <td colspan="5">(100 - % Cascarilla - % Descarte - % defectos)</td>

                            </tr>
                            <tr>

                                <td colspan="5">'.$mostrar2[93].'</td>

                            </tr>

                            ';


                            $content .= '</tbody>
                            </table>';
/**------------------------------------------------------------------------------------------------- */

    
                        $content .= '
                                <div class="row padding">
                                    <div class="col-md-12" style="text-align: center;">
                                            <span>Pdf Creator</span> <a href="#">By Jhoan Manuel</a>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>';
        $pdf->writeHTML($content, true, 0, true, 0);
        $pdf->lastpage();
        $pdf->output('Reporte-'.$mostrar2[3].'.pdf', 'I');


    
    
    
?>