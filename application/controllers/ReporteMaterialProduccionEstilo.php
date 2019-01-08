<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/third_party/fpdf17/fpdf.php";

class ReporteMaterialProduccionEstilo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session')->model('ReporteMaterialProduccionEstilo_model')
                ->helper('Reportematerialsemanaprodestilo_helper')->helper('file');
        date_default_timezone_set('America/Mexico_City');

        setlocale(LC_ALL, "");
        setlocale(LC_TIME, 'spanish');
    }

    public function getArticulos() {
        try {
            print json_encode($this->ReporteMaterialProduccionEstilo_model->getArticulos());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /* REPORTES */

    public function onReporteMaterialSemanaProdEstilo() {
        $Controles = $this->ReporteMaterialProduccionEstilo_model->onImprimirReporte($this->input->post('Ano'), $this->input->post('Sem'), $this->input->post('Articulo'));
        if (!empty($Controles)) {
            $pdf = new PDF('P', 'mm', array(215.9, 279.4));

            $pdf->AddPage();
            $pdf->SetAutoPageBreak(true, 10);

            $Subtotal = 0;
            foreach ($Controles as $keyFT => $F) {
                $pdf->SetX(5);
                $pdf->SetFont('Calibri', '', 8.5);


                $pdf->Row(array(
                    utf8_decode($F->ControlT),
                    utf8_decode($F->Estilo),
                    utf8_decode($F->Color),
                    mb_strimwidth(utf8_decode($F->Articulo . '   ' . $F->ArticuloT), 0, 70, ""),
                    number_format($F->Cantidad, 2, ".", ","),
                    utf8_decode($F->UnidadMedidaT),
                    utf8_decode($F->Pares)
                        ), 'B');
                $Subtotal += $F->Cantidad;
            }
            $pdf->SetFont('Calibri', 'B', 8.5);
            $pdf->Row(array(
                '',
                '',
                '',
                'Total',
                number_format($Subtotal, 2, ".", ","),
                '',
                ''
                    ), 0);


            /* FIN RESUMEN */
            $path = 'uploads/Reportes/MaterialSemanaProdEstilo';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file_name = "MATERIAL DE LA SEMANA PROD POR ESTILO " . date("d-m-Y his");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */
            if (delete_files('uploads/Reportes/MaterialSemanaProdEstilo/')) {
                /* ELIMINA LA EXISTENCIA DE CUALQUIER ARCHIVO EN EL DIRECTORIO */
            }
            $pdf->Output($url);
            print base_url() . $url;
        }
    }

}
