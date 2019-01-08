<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/third_party/fpdf17/fpdf.php";

class ReporteCapturaFisica extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session')->model('ReporteCapturaFisica_model')
                ->helper('Reportecapturafisica_helper')->helper('file');
        date_default_timezone_set('America/Mexico_City');

        setlocale(LC_ALL, "");
        setlocale(LC_TIME, 'spanish');
    }

    /* REPORTES */

    public function onReporteConteoCapturaFisica() {
        $Grupos = $this->ReporteCapturaFisica_model->getGrupos();
        $Articulos = $this->ReporteCapturaFisica_model->getArticulos();
        if (!empty($Grupos)) {
            $pdf = new PDF('P', 'mm', array(215.9, 279.4));


            $pdf->SetAutoPageBreak(true, 5);

            foreach ($Grupos as $key => $D) {
                $pdf->AddPage();
                $pdf->SetY(24);
                $pdf->SetX(5);
                $pdf->SetLineWidth(0.5);
                $pdf->SetFont('Calibri', 'B', 7.5);
                $pdf->Cell(15, 4, 'Grupo:', 'B'/* BORDE */, 0, 'L');
                $pdf->SetX(20);
                $pdf->SetFont('Calibri', '', 7.5);
                $pdf->Cell(40, 4, utf8_decode($D->Clave) . '    ' . utf8_decode($D->Nombre), 'B'/* BORDE */, 1, 'L');

                $Cont = 0;
                $COL = 1;
                $valida1 = true;
                $valida2 = true;
                $valida3 = true;
                $valida4 = true;
                $pdf->SetLineWidth(0.2);
                $pdf->SetFont('Calibri', 'B', 5.5);
                foreach ($Articulos as $keyA => $F) {

                    if ($F->Grupo === $D->Clave) {

                        if ($Cont > 81) {
                            $COL = 2;
                        } if ($Cont > 163) {
                            $COL = 3;
                        } if ($Cont > 245) {
                            $COL = 4;
                        }if ($Cont > 327) {
                            $COL = 1;
                            $valida1 = true;
                            $valida2 = true;
                            $valida3 = true;
                            $valida4 = true;
                            $Cont = 0;
                        }
                        switch ($COL) {
                            case 1:
                                $pdf->SetX(5);
                                $pdf->Cell(6, 3, $F->Clave, 'B'/* BORDE */, 0, 'R');
                                $pdf->SetX(11);
                                $pdf->Cell(32, 3, mb_strimwidth(utf8_decode($F->Descripcion), 0, 29, ""), 'B'/* BORDE */, 0, 'L');
                                $pdf->SetX(43);
                                $pdf->Cell(13, 3, utf8_decode($F->Unidad), 'BR'/* BORDE */, 1, 'L');

                                break;
                            case 2:
                                if ($valida2) {
                                    $pdf->SetY(28);
                                }
                                $pdf->SetX(56);
                                $pdf->Cell(6, 3, $F->Clave, 'B'/* BORDE */, 0, 'R');
                                $pdf->SetX(62);
                                $pdf->Cell(32, 3, mb_strimwidth(utf8_decode($F->Descripcion), 0, 29, ""), 'B'/* BORDE */, 0, 'L');
                                $pdf->SetX(94);
                                $pdf->Cell(13, 3, utf8_decode($F->Unidad), 'BR'/* BORDE */, 1, 'L');
                                $pdf->SetY($pdf->GetY());
                                $valida2 = false;
                                break;
                            case 3:
                                if ($valida3) {
                                    $pdf->SetY(28);
                                }
                                $pdf->SetX(107);
                                $pdf->Cell(6, 3, $F->Clave, 'B'/* BORDE */, 0, 'R');
                                $pdf->SetX(113);
                                $pdf->Cell(32, 3, mb_strimwidth(utf8_decode($F->Descripcion), 0, 29, ""), 'B'/* BORDE */, 0, 'L');
                                $pdf->SetX(145);
                                $pdf->Cell(13, 3, utf8_decode($F->Unidad), 'BR'/* BORDE */, 1, 'L');
                                $pdf->SetY($pdf->GetY());
                                $valida3 = false;
                                break;
                            case 4:
                                if ($valida4) {
                                    $pdf->SetY(28);
                                }
                                $pdf->SetX(158);
                                $pdf->Cell(6, 3, $F->Clave, 'B'/* BORDE */, 0, 'R');
                                $pdf->SetX(164);
                                $pdf->Cell(32, 3, mb_strimwidth(utf8_decode($F->Descripcion), 0, 29, ""), 'B'/* BORDE */, 0, 'L');
                                $pdf->SetX(196);
                                $pdf->Cell(13, 3, utf8_decode($F->Unidad), 'BR'/* BORDE */, 1, 'L');
                                $pdf->SetY($pdf->GetY());
                                $valida4 = false;
                                break;
                        }

                        $Cont ++;
                    }
                }
            }
            /* FIN RESUMEN */
            $path = 'uploads/Reportes/Inventario';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file_name = "REPORTE PARA CAPTURA FISICA INVENTARIO " . date("d-m-Y his");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */
            if (delete_files('uploads/Reportes/Inventario/')) {
                /* ELIMINA LA EXISTENCIA DE CUALQUIER ARCHIVO EN EL DIRECTORIO */
            }
            $pdf->Output($url);
            print base_url() . $url;
        }
    }

}
