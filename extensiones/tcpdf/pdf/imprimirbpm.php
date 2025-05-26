<?php ob_start();

require_once "../../../modelos/config.php";
$codfi = $_GET['codfi'];

$sql= "SELECT bpm.pk_bpm, bpm.codigo, bpm.aprobado_por,
            bpm.fecha_registro_documento, bpm.pagina, bpm.lote, bpm.titulo, bpm.subtitulo, bpm.fecha_atencion, bpm.nombre_cliente,
            bpm.nombre_usuario, bpm.tipo_cafe, bpm.materia_extraña, bpm.plagas_enfermedades,
            bpm.lugar_procedencia, bpm.peso, bpm.presentacion, bpm.variedad, bpm.condicion_de_transporte, bpm.envase, bpm.certificacion,
            bpm.fecha_entrega, bpm.humedad, bpm.conclusion, bpm.observaciones,
            bpm.ejecutor_asistente, bpm.jefe_planta, bpm.doc_identidad, bpm.titulof1, bpm.subtitulo_rbpm2, bpm.codigo_rbpm2, bpm.aprobado_por_rbpm2,
            bpm.fecha_registro_documento_rbpm2, bpm.pagina_rbpm2, bpm.lote_rbpm2, bpm.codmatpri, bpm.
            Fch2telefonocliente, bpm.idCantProdA, bpm.Fch2correo, bpm.Fch2observaciones, bpm.totalsrvciss, bpm.totalcobbls, bpm.totalgeneral,
            productos_anexos_bpm.pk_pab, productos_anexos_bpm.idCobrarCjs, productos_anexos_bpm.idCantidadCjs, productos_anexos_bpm.capacidad_pab,
            productos_anexos_bpm.cajas_pab, productos_anexos_bpm.idTostAuto, productos_anexos_bpm.krsls, productos_anexos_bpm.kggresiduales,
            productos_anexos_bpm.tipo_molido_pab, productos_anexos_bpm.tipo_tostado_pab, productos_anexos_bpm.idprecioV, productos_anexos_bpm.capaBolsas,
            productos_anexos_bpm.idcntdblss, productos_anexos_bpm.idnombolaz, productos_anexos_bpm.idprecioV2, productos_anexos_bpm.capaBolsas2,
            productos_anexos_bpm.idcntdblss2, productos_anexos_bpm.idnombolaz2, productos_anexos_bpm.idprecioV3, productos_anexos_bpm.capaBolsas3,
            productos_anexos_bpm.idcntdblss3, productos_anexos_bpm.idnombolaz3, productos_anexos_bpm.idprecioV4, productos_anexos_bpm.capaBolsas4,
            productos_anexos_bpm.idcntdblss4, productos_anexos_bpm.idnombolaz4, productos_anexos_bpm.idprecioV5, productos_anexos_bpm.capaBolsas5,
            productos_anexos_bpm.idcntdblss5, productos_anexos_bpm.idnombolaz5 FROM bpm inner join productos_anexos_bpm
            on bpm.pk_bpm=productos_anexos_bpm.fk_bpm WHERE pk_bpm='$codfi'";
$result=mysqli_query($conexion,$sql);

while($mostrar=mysqli_fetch_row($result)){
                  $pk_bpm = $mostrar[0];
                  $codigo =$mostrar[1];
                  $aprobado_por =$mostrar[2];
                  $fecha_registro_documento =$mostrar[3];
                  $pagina =$mostrar[4];
                  $lote =$mostrar[5];
                  $titulo =$mostrar[6];
                  $subtitulo =$mostrar[7];
                  $fecha_atencion =$mostrar[8];
                  $nombre_cliente =$mostrar[9];
                  $nombre_usuario =$mostrar[10];
                  $tipo_cafe =$mostrar[11];

                  $materia_extraña=$mostrar[12];
                  $plagas_enfermedades=$mostrar[13];
                  $lugar_procedencia=$mostrar[14];
                  $peso=$mostrar[15];
                  $presentacion=$mostrar[16];
                  $variedad=$mostrar[17];
                  $condicion_de_transporte=$mostrar[18];
                  $envase=$mostrar[19];
                  $certificacion=$mostrar[20];
                  $fecha_entrega=$mostrar[21];
                  $humedad=$mostrar[22];
                  $conclusion=$mostrar[23];
                  $observaciones=$mostrar[24];
                  $ejecutor_asistente=$mostrar[25];
                  $jefe_planta=$mostrar[26];
                  $doc_identidad=$mostrar[27];
                  $titulof1=$mostrar[28];
                  $subtitulo_rbpm2=$mostrar[29];
                  $codigo_rbpm2=$mostrar[30];
                  $aprobado_por_rbpm2=$mostrar[31];
                  $fecha_registro_documento_rbpm2=$mostrar[32];
                  $pagina_rbpm2=$mostrar[33];
                  $lote_rbpm2=$mostrar[34];
                  $codmatpri=$mostrar[35];
                  $Fch2telefonocliente=$mostrar[36];
                  $idCantProdA=$mostrar[37];
                  $Fch2correo=$mostrar[38];
                  $Fch2observaciones=$mostrar[39];
                  $totalsrvciss=$mostrar[40];
                  $totalcobbls=$mostrar[41];
                  $totalgeneral=$mostrar[42];
                   
                  $pk_pab=$mostrar[43];
                  $idCobrarCjs=$mostrar[44];
                  $idCantidadCjs=$mostrar[45];
                  $capacidad_pab=$mostrar[46];
                  $cajas_pab=$mostrar[47];
                  $idTostAuto=$mostrar[48];
                  $krsls=$mostrar[49];
                  $kggresiduales=$mostrar[50];
                  $tipo_molido_pab=$mostrar[51];
                  $tipo_tostado_pab=$mostrar[52];
                  $idprecioV=$mostrar[53];
                  $capaBolsas=$mostrar[54];
                  $idcntdblss=$mostrar[55];
                  $idnombolaz=$mostrar[56];
                  $idprecioV2=$mostrar[57];
                  $capaBolsas2=$mostrar[58];
                  $idcntdblss2=$mostrar[59];
                  $idnombolaz2=$mostrar[60];
                  $idprecioV3=$mostrar[61];
                  $capaBolsas3=$mostrar[62];
                  $idcntdblss3=$mostrar[63];
                  $idnombolaz3=$mostrar[64];
                  $idprecioV4=$mostrar[65];
                  $capaBolsas4=$mostrar[66];
                  $idcntdblss4=$mostrar[67];
                  $idnombolaz4=$mostrar[68];
                  $idprecioV5=$mostrar[69];
                  $capaBolsas5=$mostrar[70];
                  $idcntdblss5=$mostrar[71];
                  $idnombolaz5=$mostrar[72];


}

  require_once('tcpdf_include.php');
        $pdf = new TCPDF ('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('MOALI');
        $pdf->SetTitle('Reporte BPM');
    
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetMargins(10,10,10, false);
        $pdf->SetAutoPageBreak(true, 20);
        $pdf->SetFont('Helvetica', '', 10);
        $pdf->addPage();




         $content = '';
        
        $content .= '
            <style type="text/css">
div.saltodepagina
{
page-break-after: always;
}

td.firma
{
border: 0px solid white;
text-align: center;
background:green;
}

td{
                    border: 1px solid #c3c3c3;
                    text-align: center;
                    padding: 20px 10px !important;
                        
                }
                th{
                    border: 2px solid #c3c3c3;
                    text-align: center;
                    padding: 2px !important
                        
                }


</style>
<div>
<table>
<tr>
<td style="padding: 4px !important"><img id="logo" style="width: 150px !important" src="https://www.mappeattive.com/wp-content/uploads/2017/05/logomoali2.jpg" ></td>
<td> <h4><span id="titulo">MANUAL DE BPM </span><br><span id="subtitulo">RECEPCIÓN DE MATERIA PRIMA</span></h4></td>
<td>
<b>Código:</b> <span id="codigo">LM-BPM-R-02</span><br>
<b>Aprobado por:</b><span id="aprobado_por"> RODAS MOALI, ALEX</span><br>
<b>Fecha: </b>
                        <span id="fecha_registro_documento">'.$fecha_registro_documento.'</span><br>
<b>Página:</b> <span id="pagina">01</span><br>
</td>
</tr>
</table>
</div>



<div>
<table width="100%" cellpadding="0" cellspacing="1" bordercolor="#000000" style="background:green;">
<tr>
<td align="center" style="color:black"><b>LOTE </b> MP- '.$lote.'</td>
<td align="center" style="color:black"><b>RBPM</b> N°1</td>
<td align="center" style="color:black"><b>Ficha 1</b></td>
</tr>
</table>
</div>

<div>
<table >

<tr>

    <td><b>Fecha de Recepcion</b></td>

    <td>'.$fecha_registro_documento.'</td>

    <td><b>Nombre del Cliente</b></td>

    <td>'.$nombre_cliente.'</td>

  </tr>

  <tr>

    <td><b>Nombre de quien Recibe</b></td>

    <td>'.$nombre_usuario.'</td>

    <td><b>Tipo de Café</b></td>

    <td>'.$tipo_cafe.'</td>

  </tr>

 <tr>

   <td><b>Presencia de materia extraña</b></td>

    <td>'.$materia_extraña.'</td>

    <td><b>Plagas enfermedades</b></td>

    <td>'.$plagas_enfermedades.'</td>

  </tr>

<tr>

   <td><b>Lugar de Procedencia</b></td>

    <td>'.$lugar_procedencia.'</td>

    <td><b>Peso</b></td>

    <td>'.$peso.'</td>

  </tr>
<tr>

   <td><b>Presentación</b></td>

    <td>'.$presentacion.'</td>

    <td><b>Variedad/Altitud</b></td>

    <td>'.$variedad.'</td>

  </tr>


<tr>

   <td><b>Condición de Transporte</b></td>

    <td>'.$condicion_de_transporte.'</td>

    <td><b>Envases</b></td>

    <td>'.$envase.'</td>

  </tr>

<tr> 

   <td><b>Fecha de Entrega</b></td>

    <td>'.$fecha_entrega.'</td>

    <td><b>Humedad</b></td>

    <td>'.$humedad.'</td>

  </tr>
';
                        if($certificacion=="No"){
                            $certf= "Certificación Orgánica";
                        }
                        else{
                            $certf="Certificación de calidad";
                        }

                        if($conclusion=="Si"){
                            $concl= "Aceptado";
                        }
                        else{
                            $concl="Rechasado'";
                        }

                         $content .= '

<tr>

   <td><b>Certificado</b></td>

    <td>'.$certf.'</td>

    <td><b>Conclusión</b></td>

    <td>'.$concl.'</td>

  </tr>

<tr>
<td><b>Observaciones</b></td>
<td colspan="3">'.$observaciones.'</td>
</tr>



  </table>
  </div>


      


<br><br><br><br><br><br><br>
<div class="saltodepagina">
<table width="100%">
<tr>
<td class="firma" style="border-bottom: 1px solid #ccc;"><img src="../../../vistas/img/firmas/liz.png" style="width: 170px"></td>
<td class="firma" style="color:#ffffff" ></td>
<td class="firma" style="border-bottom: 1px solid #ccc;"><img src="../../../vistas/img/firmas/liz.png" style="width: 170px"></td>
</tr>

<tr>
<td class="firma">Ejecutor asistente de planta</td>
<td class="firma"></td>
<td class="firma">Jefe de planta</td>
</tr>
</table>
</div>




<div>
<table>
<tr>
<td><img id="logo2"  style="width: 150px !important" src="https://www.mappeattive.com/wp-content/uploads/2017/05/logomoali2.jpg" ></td>
<td> <h4><span id="titulo2">MANUAL DE BPM </span><br><span id="subtitulo2">ORDEN DE PROCESO</span></h4></td>
<td>
<b>Código:</b> <span>'.$codigo_rbpm2.'</span><br>
<b>Aprobado por:</b><span id="aprobado_por2">'.$subtitulo_rbpm2.'</span><br>
<b>Fecha: </b>
                        <span id="fecha_registro_documento2">'.$fecha_registro_documento.'</span><br>
<b>Página:</b> <span id="pagina2">'.$pagina_rbpm2.'</span><br>
</td>
</tr>
</table>
</div>




<div>
<table width="100%" cellpadding="0" cellspacing="1" bordercolor="#000000" style="background:#B40404;">
<tr>
<td align="center" style="color:black"><b>LOTE </b>PT- '.$lote.'</td>
<td align="center" style="color:black"><b>RBPM</b> N°2</td>
<td align="center" style="color:black"><b>Ficha 2</b></td>
</tr>
</table>
</div>


<div>
<table >

<tr >

    <td><b>Nombre del solicitante</b></td>

    <td>'.$nombre_cliente.'</td>

    <td><b>RUC/DNI</b></td>

    <td>'.$doc_identidad.'</td>

  </tr>

  <tr>

    <td><b>Código de materia prima</b></td>

    <td>'.$codigo.'</td>

    <td><b>Teléfono del cliente</b></td>

    <td>'.$Fch2telefonocliente.'</td>

  </tr>
<tr>

   <td><b>Cantidad del producto</b></td>

    <td>'.$idCantProdA.' Kg.</td>

    <td><b>Correo electronico</b></td>

    <td>'.$Fch2correo.'</td>
</tr>
<tr>

   <td><b>Obserbaciones</b></td>

    <td colspan="3">'.$Fch2observaciones.'</td>

</tr>

</table>
</div>





<div>
<h1>Servicio</h1>
';

$sql="select * from servicios_anexos_bpm where fk_bpm=2";
$resServicios=mysqli_query($conexion,$sql);

$content .= '
<table>
<thead>
<tr>
<th><b>#</b></th>
<th><b>SERVICIO</b></th>
<th><b>PRECIO</b></th>
<th><b>CANTIDAD</b></th>
<th><b>TOTAL</b></th>
</tr>
</thead>


';
$total = 0;
foreach ($resServicios as $fila){

$total = $fila['total'] + $total;

$content .= '
<tr>
<td>'.$fila['pk_sab'].'</td>
<td>'.$fila['servicio'].'</td>
<td>'.$fila['precio'].'</td>
<td>'.$fila['cantidad'].'</td>
<td>'.$fila['total'].'</td>
</tr>
'; } $content .= '
<tr>
<td colspan="4" align="center"><b>Total</b></td>
<td>S/ '.$total.'</td>
</tr>
</table>
</div>


<div>
<h1>Productos</h1>
<table>

<tr>
<td><b>Precio Venta</b></td>
<td>S/ '. $idCobrarCjs .'</td>
<td><b>Cantidad</b></td>
<td>S/ '. $idCantidadCjs .'</td>
</tr>
<tr>
<td><b>Capacidad</b></td>
<td>'.$capacidad_pab.'</td>
<td><b>Cajas</b></td>
<td>'.$cajas_pab.'</td>
</tr>
<tr>
<td colspan="4"></td>
</tr>

<tr>
<td><b>KG Tostado automático</b></td>
<td>'.$idTostAuto.'</td>
<td><b>KG residuales</b></td>
<td>'.$krsls.'</td>
</tr>
<tr>
<td><b>KG->(g) residuales</b></td>
<td>'.$kggresiduales.'</td>
<td><b>Tipo molido</b></td>
<td>'.$tipo_molido_pab.'</td>
</tr>
<tr>
<td><b>Tipo tostado</b></td>
<td>'.$tipo_tostado_pab.'</td>
<td colspan="2"></td>
</tr>
<tr>
<td colspan="4"></td>
</tr>
'; if ($idprecioV > 0) {

$content .= '
<tr>
<td><b>Precio de venta</b></td>
<td>'.$idprecioV.'</td>
<td><b>Capacidad</b></td>
<td>'.$capaBolsas.'</td>
</tr>
<tr>
<td><b>Cantidad Bolsas</b></td>
<td>'.$idcntdblss.'</td>
<td><b>Nom. bolsa 1</b></td>
<td>'.$idnombolaz.'</td>
</tr>
'; } if ($idprecioV2 > 0) {

$content .= '
<tr>
<td><b>Precio de venta</b></td>
<td>'.$idprecioV2.'</td>
<td><b>Capacidad</b></td>
<td>'.$capaBolsas2.'</td>
</tr>
<tr>
<td><b>Cantidad Bolsas</b></td>
<td>'.$idcntdblss2.'</td>
<td><b>Nom. bolsa 2</b></td>
<td>'.$idnombolaz2.'</td>
</tr>
'; }
 if ($idprecioV3 > 0) {


$content .= '

<tr>
<td><b>Precio de venta</b></td>
<td>'.$idprecioV3.'</td>
<td><b>Capacidad</b></td>
<td>'.$capaBolsas3.'</td>
</tr>
<tr>
<td><b>Cantidad Bolsas</b></td>
<td>'.$idcntdblss3.'</td>
<td><strong>Nom. bolsa 3</strong></td>
<td>'.$idnombolaz3.'</td>
</tr>

'; } if ($idprecioV4 > 0) {

$content .= '
<tr>
<td><b>Precio de venta</b></td>
<td>'.$idprecioV4.'</td>
<td><b>Capacidad</b></td>
<td>'.$capaBolsas4.'</td>
</tr>
<tr>
<td><b>Cantidad Bolsas</b></td>
<td>'.$idcntdblss4.'</td>
<td><b>Nom. bolsa 4</b></td>
<td>'.$idnombolaz4.'</td>
</tr>
'; } if ($idprecioV5 > 0) {

$content .= '
<tr>
<td><b>Precio de venta</b></td>
<td>'.$idprecioV5.'</td>
<td><b>Capacidad</b></td>
<td>'.$capaBolsas5.'</td>
</tr>
<tr>
<td><b>Cantidad Bolsas</b></td>
<td>'.$idcntdblss5.'</td>
<td><b>Nom. bolsa 5</b></td>
<td>'.$idnombolaz5.'</td>
</tr>
'; }  $totalpar= $idprecioV5+$idprecioV4+$idprecioV3+$idprecioV2+$idprecioV;
$totalt=$total+$totalpar;

 $content .= '

<tr>
<td colspan="3" align="center"><b>Total</b></td>
<td>'.$totalpar.'</td>
</tr>
</table>
</div>

<br>

<div>
<table width="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse;border-color:#ddd;">

<tr>
<td colspan="4" align="center"><b>Total General</b> S/ '.$totalt.'</td>
</tr>

</table>
</div>
        ';

            $pdf->writeHTML($content, true, 0, true, 0);
        $pdf->lastpage();
        $pdf->output('Reporte-'.$mostrar2[3].'.pdf', 'I');
                                
                    


?>
