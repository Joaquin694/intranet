<?php

    
    require_once '../../tcpdf/tcpdf.php';

    //if(isset($POST['create_pdf'])){
        
        $pdf = new TCPDF ('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Abad Esquen');
        $pdf->SetTitle('reporte_name');
    
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetMargins(20,20,20, false);
        $pdf->SetAutoPageBreak(true, 20);
        $pdf->SetFont('Helvetica', '', 10);
        $pdf->addPage();
    
        $content = '';
    
        $content .= '
            <div class="row">
                <div class="col-md-12">
                    <h1 style="text-align: center;">'.'reporte_name'.'</h1>
    
                        <div class="modal-body table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fecha de Recepción</th>
                                    <th>Fecha de Análisis</th>
                                    <th>Codigo Interno</th>
                                    <th>Varidad</th>
                                    <th>Nombre de Cliente</th>
                                    <th>Productor</th>
                                    <th>Cosecha</th>
                                    <th>Ubicación</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            
        ';
    
        
                                
                        
                            
    
                        $content .= '<tr>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    </tr>';
                                
                                
                            $content .= '</tbody>
                                </table>';
    
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
        $pdf->output('Reporte.pdf', 'I');
    //}





?>