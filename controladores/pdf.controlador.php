<?php

/**
 * Abad Esquen Leyner Adan
 * Tratamiento de PDF
 */
# code...
/*===================================================================================================*/

require 'PDF/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
// use Tecnickcom\Tcpdf\Tcpdf;


/*===================================================================================================*/

class abadPdf
{
    public $contenidoR;
    public $nomPdfR;
    public function __construct($contenidoR, $nomPdfR)
    {

        $this->contenidoR = $contenidoR;
        $this->nomPdfR    = $nomPdfR;
    }

    public function newPdfV()
    {
        ob_start();
        require $this->contenidoR;
        $html = ob_get_clean();

        $Html2Pdf = new Html2Pdf('P', 'A4', 'es', 'true', 'UTF8-8', array(14, 14, 14, 0));
        $Html2Pdf->writeHTML($html);
        $Html2Pdf->output($this->nomPdfR . '.pdf');
    }

    public function newPdfVsinmargen()
    {
        ob_start();
        require $this->contenidoR;
        $html = ob_get_clean();

        $Html2Pdf = new Html2Pdf('P', 'A4', 'es', 'true', 'UTF8-8', array(14, 14, 14, 0));

        $Html2Pdf->writeHTML($html);
        $Html2Pdf->output($this->nomPdfR . '.pdf');
    }
    // public function newPdfVsinmargen_()
    // {
    //     ob_start();
    //     require $this->contenidoR;
    //     $html = ob_get_clean();

    //     $Html2Pdf = new Html2Pdf('P', 'A4', 'es', 'true', 'UTF-8', array(0, 0, 0, 0));
    //     // $Html2Pdf->addFont('NunitoSans', '', '/vistas/dist/css/Nunito_Sans/NunitoSans-Italic-VariableFont_YTLC,opsz,wdth,wght.ttf');
    //     $Html2Pdf->writeHTML($html);
    //     $Html2Pdf->output($this->nomPdfR . '.pdf');
    // }

    // public function newPdfVsinmargen_2()
    // {
    //     ob_start();
    //     require $this->contenidoR;
    //     $html = ob_get_clean();

    //     $Html2Pdf = new Html2Pdf('P', 'A4', 'es', true, 'UTF-8', array(0, 0, 0, 0));

    //     $fontFile = 'PDF/vendor/spipu/html2pdf/fonts/NunitoSans.php';
    //     if (file_exists($fontFile)) {
    //         $Html2Pdf->addFont('NunitoSans', '', $fontFile);
    //         // $html2pdf->setDefaultFont('NunitoSans');
    //     }

    //     $html = '
    //     <style>
    //         .m{
    //             font-family: "NunitoSans", sans-serif;
    //         }
    //     </style>

    //     <div>
    //         Hello, this is a sample text using a default Pdf font!
    //     </div>
    //     <br>
    //     <div class="m">
    //         Hello, this is a sample text using Nunito font!
    //     </div>';

    //     $Html2Pdf->writeHTML($html);
    //     $Html2Pdf->output($this->nomPdfR . '.pdf');
    // }

    public function newPdfVsinmargen_2()
    {
        try {
            ob_start();
            require $this->contenidoR;
            $html = ob_get_clean();

            $Html2Pdf = new Html2Pdf('P', 'A4', 'es', true, 'UTF-8', array(0, 0, 0, 0));
            $fontFile = 'PDF/vendor/spipu/html2pdf/fonts/nunitosans.php';
            $Html2Pdf->addFont('nunitosans', '', $fontFile);
            $Html2Pdf->setDefaultFont('DejaVu Sans');

            $Html2Pdf->writeHTML($html);
            $Html2Pdf->output($this->nomPdfR . '.pdf');
        } catch (Exception $e) {
            // Captura cualquier error y lo muestra o lo registra
            echo "Se produjo un error al generar el PDF:: " . $e->getMessage();
        }
    }

    public function newPdfVsinmargen_horizontal()
    {
        ob_start();
        require $this->contenidoR;
        $html = ob_get_clean();

        $Html2Pdf = new Html2Pdf('L', 'A4', 'es', 'true', 'UTF8-8', array(14, 14, 14, 0)); // 'L' para formato horizontal

        $Html2Pdf->writeHTML($html);
        $Html2Pdf->output($this->nomPdfR . '.pdf');
    }

    public function newPdfH()
    {
        ob_start();
        require $this->contenidoR;
        $html = ob_get_clean();

        $Html2Pdf = new Html2Pdf('L', 'A4', 'es', 'true', 'UTF8-8', array(14, 14, 14, 14));
        $Html2Pdf->writeHTML($html);
        $Html2Pdf->output($this->nomPdfR . '.pdf');
    }
}



switch ($_GET['deque']) {

    case 'view_laboratoriofisico':
        # code...
        $obji = new abadPdf('PDF/reportes/print_laboratorio_fisico.php', 'laboratoriofisico');
        echo $obji->newPdfV();
        break;

    case 'view_laboratoriosensorial':
        # code...
        $obji = new abadPdf('PDF/reportes/print_laboratorio_sensorial.php', 'laboratoriosensorial');
        echo $obji->newPdfV();
        break;

    case 'view_laboratorio':
        # code...
        $obji = new abadPdf('PDF/reportes/print_laboratorio.php', 'laboratorio');
        echo $obji->newPdfH();
        break;

    case 'bpm_con_precio':
        # code...
        $obji = new abadPdf('PDF/reportes/print_view_bpm_cp.php', 'bpm');
        echo $obji->newPdfH();
        break;

    case 'bpm_sin_precio':
        # code...
        $obji = new abadPdf('PDF/reportes/print_view_bpm_cp_sp.php', 'bpm');
        echo $obji->newPdfH();
        break;

    case 'pdf_comprobante':
        # code...

        $obji = new abadPdf('PDF/reportes/comprobante_venta.php', 'comprobante');
        echo $obji->newPdfVsinmargen_2();
        // echo $obji->newPdfV();
        break;

    case 'pdf_ficha_entrega':
        # code...
        $obji = new abadPdf('PDF/reportes/print_view_bpm_fe.php', 'fichaentrega');
        //$obji = new abadPdf('PDF/reportes/print_view_bpm_fe.php', 'fichaentrega');
        echo $obji->newPdfV();
        break;

    case 'pdf_comprobante_NOTASC':
        # code...
        $obji = new abadPdf('PDF/reportes/comprobante_venta_nc.php', 'notac');
        echo $obji->newPdfV();
        break;

    case 'pdf_analisis_sensorial_de_productos_terminados':
        # code...
        $obji = new abadPdf('PDF/reportes/print_analisis_sensorial_de_productos_terminados.php', 'aspt');
        echo $obji->newPdfV();
        break;

    case 'libro_venta':
        # code...
        $obji = new abadPdf('PDF/reportes/print_view_libro_venta.php', 'lv');
        echo $obji->newPdfH();
        break;

    case 'pdf_cotizacion':
        # code...
        $obji = new abadPdf('PDF/reportes/print_view_cotizacion.php', 'cotizacion');
        // echo $obji->newPdfVsinmargen();
        echo $obji->newPdfVsinmargen_2();

        break;

    case 'pdf_comprobante_detalle_compra':
        $obji = new abadPdf('PDF/reportes/print_view_reporte_comp_gasto.php', 'comprobante_detalle_compra');
        //echo $obji->newPdfVsinmargen_2();
        echo $obji->newPdfVsinmargen();
		//echo $obji->newPdfVsinmargen_horizontal();
        break;

    case 'pdf_guia_remision':
        $obji = new abadPdf('PDF/reportes/print_view_guia_remision.php', 'guia_remision');
        echo $obji->newPdfVsinmargen_2();
        break;
}
