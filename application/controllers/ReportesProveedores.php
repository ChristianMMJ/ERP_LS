<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/third_party/fpdf17/fpdf.php";

class ReportesProveedores extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session')->model('ReportesProveedores_model')
                ->helper('Reportesproveedores_helper')->helper('file');
    }

    public function getProveedores() {
        try {
            print json_encode($this->ReportesProveedores_model->getProveedores());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onReporteAntiguedadSaldos() {
        $Tp = $this->input->post('Tp');
        $Prov = $this->input->post('Proveedor');
        $aProv = $this->input->post('aProveedor');

        $fecha = $this->input->post('FechaIni');
        $aFecha = $this->input->post('FechaFin');

        $cm = $this->ReportesProveedores_model;
        $Proveedores = $cm->getProveedoresReporteAntiguedad($Prov, $aProv, $Tp, $fecha, $aFecha);
        $Doctos = $cm->getDoctosByProveedorTpAntiguedad($Prov, $aProv, $Tp, $fecha, $aFecha);


        if (!empty($Proveedores)) {

            $pdf = new PDFAntiguedadProv('L', 'mm', array(215.9, 279.4));
            $pdf->Proveedor = $Prov;
            $pdf->Aproveedor = $aProv;
            $pdf->fecha = $fecha;
            $pdf->Afecha = $aFecha;

            $pdf->AddPage();
            $pdf->SetAutoPageBreak(true, 10);

            $TP_IMPORTE_G = 0;
            $TP_PAGOS_G = 0;
            $TP_SALDO_G = 0;

            $GTOTAL_1 = 0;
            $GTOTAL_2 = 0;
            $GTOTAL_3 = 0;
            $GTOTAL_4 = 0;
            $GTOTAL_5 = 0;
            $GTOTAL_6 = 0;

            foreach ($Proveedores as $key => $G) {
                $pdf->SetX(5);
                $pdf->SetFont('Calibri', '', 8);
                $pdf->Cell(45, 5, utf8_decode(mb_strimwidth(utf8_decode($G->ProveedorF), 0, 35, "...")), 'B'/* BORDE */, 0, 'L');
                $pdf->SetX(50);
                $pdf->Cell(10, 5, utf8_decode($G->Plazo), 'B'/* BORDE */, 1, 'C');

                $TP_IMPORTE = 0;
                $TP_PAGOS = 0;
                $TP_SALDO = 0;

                $TOTAL_1 = 0;
                $TOTAL_2 = 0;
                $TOTAL_3 = 0;
                $TOTAL_4 = 0;
                $TOTAL_5 = 0;
                $TOTAL_6 = 0;
                foreach ($Doctos as $key => $D) {

                    if ($G->ClaveNum === $D->ClaveNum) {
                        $pdf->Row(array(
                            utf8_decode($D->Tp),
                            mb_strimwidth(utf8_decode($D->Doc), 0, 6, ""),
                            utf8_decode($D->FechaDoc),
                            '$' . number_format($D->ImporteDoc, 2, ".", ","),
                            '$' . number_format($D->Pagos_Doc, 2, ".", ","),
                            '$' . number_format($D->Saldo_Doc, 2, ".", ","),
                            utf8_decode($D->Dias),
                            ($D->UNO > 0) ? '$' . number_format($D->UNO, 2, ".", ",") : '',
                            ($D->DOS > 0) ? '$' . number_format($D->DOS, 2, ".", ",") : '',
                            ($D->TRES > 0) ? '$' . number_format($D->TRES, 2, ".", ",") : '',
                            ($D->CUATRO > 0) ? '$' . number_format($D->CUATRO, 2, ".", ",") : '',
                            ($D->CINCO > 0) ? '$' . number_format($D->CINCO, 2, ".", ",") : '',
                            ($D->SEIS > 0) ? '$' . number_format($D->SEIS, 2, ".", ",") : ''
                        ));

                        $TP_IMPORTE += $D->ImporteDoc;
                        $TP_PAGOS += $D->Pagos_Doc;
                        $TP_SALDO += $D->Saldo_Doc;
                        $TP_IMPORTE_G += $D->ImporteDoc;
                        $TP_PAGOS_G += $D->Pagos_Doc;
                        $TP_SALDO_G += $D->Saldo_Doc;
                        $TOTAL_1 += $D->UNO;
                        $TOTAL_2 += $D->DOS;
                        $TOTAL_3 += $D->TRES;
                        $TOTAL_4 += $D->CUATRO;
                        $TOTAL_5 += $D->CINCO;
                        $TOTAL_6 += $D->SEIS;
                        $GTOTAL_1 += $D->UNO;
                        $GTOTAL_2 += $D->DOS;
                        $GTOTAL_3 += $D->TRES;
                        $GTOTAL_4 += $D->CUATRO;
                        $GTOTAL_5 += $D->CINCO;
                        $GTOTAL_6 += $D->SEIS;
                    }
                }
                $pdf->SetX(60);
                $pdf->SetFont('Calibri', 'B', 8);
                $pdf->Cell(70, 5, utf8_decode('TOTAL POR PROVEEDOR: '), 0/* BORDE */, 0, 'L');

                $pdf->RowNoBorder(array(
                    '',
                    '',
                    '',
                    '$' . number_format($TP_IMPORTE, 2, ".", ","),
                    '$' . number_format($TP_PAGOS, 2, ".", ","),
                    '$' . number_format($TP_SALDO, 2, ".", ","),
                    '',
                    ($TOTAL_1 > 0) ? '$' . number_format($TOTAL_1, 2, ".", ",") : '',
                    ($TOTAL_2 > 0) ? '$' . number_format($TOTAL_2, 2, ".", ",") : '',
                    ($TOTAL_3 > 0) ? '$' . number_format($TOTAL_3, 2, ".", ",") : '',
                    ($TOTAL_4 > 0) ? '$' . number_format($TOTAL_4, 2, ".", ",") : '',
                    ($TOTAL_5 > 0) ? '$' . number_format($TOTAL_5, 2, ".", ",") : '',
                    ($TOTAL_6 > 0) ? '$' . number_format($TOTAL_6, 2, ".", ",") : ''
                ));
                $pdf->SetLineWidth(0.8);
                $pdf->Line(5, $pdf->GetY(), 274.9, $pdf->GetY());
                $pdf->SetLineWidth(0.2);
            }
            $pdf->SetX(60);
            $pdf->SetFont('Calibri', 'B', 8);
            $pdf->Cell(70, 5, utf8_decode('TOTAL GENERAL: '), 0/* BORDE */, 0, 'L');

            $pdf->RowNoBorder(array(
                '',
                '',
                '',
                '$' . number_format($TP_IMPORTE_G, 2, ".", ","),
                '$' . number_format($TP_PAGOS_G, 2, ".", ","),
                '$' . number_format($TP_SALDO_G, 2, ".", ","),
                '',
                ($GTOTAL_1 > 0) ? '$' . number_format($GTOTAL_1, 2, ".", ",") : '',
                ($GTOTAL_2 > 0) ? '$' . number_format($GTOTAL_2, 2, ".", ",") : '',
                ($GTOTAL_3 > 0) ? '$' . number_format($GTOTAL_3, 2, ".", ",") : '',
                ($GTOTAL_4 > 0) ? '$' . number_format($GTOTAL_4, 2, ".", ",") : '',
                ($GTOTAL_5 > 0) ? '$' . number_format($GTOTAL_5, 2, ".", ",") : '',
                ($GTOTAL_6 > 0) ? '$' . number_format($GTOTAL_6, 2, ".", ",") : ''
            ));


            /* FIN RESUMEN */
            $path = 'uploads/Reportes/Proveedores';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file_name = "ANTIGUEDAD SALDOS " . ' ' . date("d-m-Y his");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */
            if (delete_files('uploads/Reportes/Proveedores/')) {
                /* ELIMINA LA EXISTENCIA DE CUALQUIER ARCHIVO EN EL DIRECTORIO */
            }
            $pdf->Output($url);
            print base_url() . $url;
        }
    }

    public function onReporteEdosCuentaDesgloce() {
        $Tp = $this->input->post('Tp');
        $Prov = $this->input->post('Proveedor');
        $aProv = $this->input->post('aProveedor');


        $cm = $this->ReportesProveedores_model;
        $Proveedores = $cm->getProveedoresReporte($Prov, $aProv, $Tp);
        $Doctos = $cm->getDoctosByProveedorTp($Prov, $aProv, $Tp);


        if (!empty($Proveedores)) {

            $pdf = new PDFEdoCtaProv('P', 'mm', array(215.9, 279.4));
            $pdf->Proveedor = $Prov;
            $pdf->Aproveedor = $aProv;

            $pdf->AddPage();
            $pdf->SetAutoPageBreak(true, 10);

            $TP_IMPORTE_G = 0;
            $TP_PAGOS_G = 0;
            $TP_SALDO_G = 0;
            foreach ($Proveedores as $key => $G) {
                $pdf->SetX(5);
                $pdf->SetFont('Calibri', '', 8);
                $pdf->Cell(70, 5, utf8_decode(mb_strimwidth(utf8_decode($G->ProveedorF), 0, 60, "")), 'B'/* BORDE */, 0, 'L');
                $pdf->SetX(75);
                $pdf->SetFont('Calibri', '', 8);
                $pdf->Cell(10, 5, utf8_decode($G->Plazo), 'B'/* BORDE */, 1, 'C');

                $TP_IMPORTE = 0;
                $TP_PAGOS = 0;
                $TP_SALDO = 0;
                foreach ($Doctos as $key => $D) {

                    if ($G->ClaveNum === $D->ClaveNum) {
                        $pdf->Row(array(
                            utf8_decode($D->Tp),
                            utf8_decode($D->Doc),
                            utf8_decode($D->FechaDoc),
                            '$' . number_format($D->ImporteDoc, 2, ".", ","),
                            '$' . number_format($D->Pagos_Doc, 2, ".", ","),
                            '$' . number_format($D->Saldo_Doc, 2, ".", ","),
                            utf8_decode($D->Dias)
                        ));

                        $TP_IMPORTE += $D->ImporteDoc;
                        $TP_PAGOS += $D->Pagos_Doc;
                        $TP_SALDO += $D->Saldo_Doc;
                        $TP_IMPORTE_G += $D->ImporteDoc;
                        $TP_PAGOS_G += $D->Pagos_Doc;
                        $TP_SALDO_G += $D->Saldo_Doc;
                    }
                }
                $pdf->SetX(95);
                $pdf->SetFont('Calibri', 'B', 8);
                $pdf->Cell(70, 5, utf8_decode('TOTAL POR PROVEEDOR: '), 0/* BORDE */, 0, 'L');

                $pdf->RowNoBorder(array(
                    '',
                    '',
                    '',
                    '$' . number_format($TP_IMPORTE, 2, ".", ","),
                    '$' . number_format($TP_PAGOS, 2, ".", ","),
                    '$' . number_format($TP_SALDO, 2, ".", ","),
                    '',
                ));
            }
            $pdf->SetX(95);
            $pdf->SetFont('Calibri', 'B', 8);
            $pdf->Cell(70, 5, utf8_decode('TOTAL GENERAL: '), 0/* BORDE */, 0, 'L');

            $pdf->RowNoBorder(array(
                '',
                '',
                '',
                '$' . number_format($TP_IMPORTE_G, 2, ".", ","),
                '$' . number_format($TP_PAGOS_G, 2, ".", ","),
                '$' . number_format($TP_SALDO_G, 2, ".", ","),
                '',
            ));


            /* FIN RESUMEN */
            $path = 'uploads/Reportes/Proveedores';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file_name = "EDO CTA PROVEEDORES DESGLOSADO " . ' ' . date("d-m-Y his");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */
            if (delete_files('uploads/Reportes/Proveedores/')) {
                /* ELIMINA LA EXISTENCIA DE CUALQUIER ARCHIVO EN EL DIRECTORIO */
            }
            $pdf->Output($url);
            print base_url() . $url;
        }
    }

    public function onReporteEdosCuenta() {
        $Tp = $this->input->post('Tp');
        $Prov = $this->input->post('Proveedor');
        $aProv = $this->input->post('aProveedor');


        $cm = $this->ReportesProveedores_model;
        $Proveedores = $cm->getProveedoresReporte($Prov, $aProv, $Tp);
        $Doctos = $cm->getDoctosByProveedorTp($Prov, $aProv, $Tp);


        if (!empty($Proveedores)) {

            $pdf = new PDFEdoCtaProvSinDesgloce('P', 'mm', array(215.9, 279.4));
            $pdf->Proveedor = $Prov;
            $pdf->Aproveedor = $aProv;

            $pdf->AddPage();
            $pdf->SetAutoPageBreak(true, 10);

            $TP_IMPORTE_G = 0;
            $TP_PAGOS_G = 0;
            $TP_SALDO_G = 0;
            foreach ($Proveedores as $key => $G) {
                $pdf->SetX(5);
                $pdf->SetFont('Calibri', '', 8);
                $pdf->Cell(70, 5, utf8_decode(mb_strimwidth(utf8_decode($G->ProveedorF), 0, 60, "")), 'B'/* BORDE */, 0, 'L');
                $pdf->SetX(75);
                $pdf->SetFont('Calibri', '', 8);
                $pdf->Cell(10, 5, utf8_decode($G->Plazo), 'B'/* BORDE */, 0, 'C');

                $TP_IMPORTE = 0;
                $TP_PAGOS = 0;
                $TP_SALDO = 0;
                foreach ($Doctos as $key => $D) {

                    if ($G->ClaveNum === $D->ClaveNum) {


                        $TP_IMPORTE += $D->ImporteDoc;
                        $TP_PAGOS += $D->Pagos_Doc;
                        $TP_SALDO += $D->Saldo_Doc;
                        $TP_IMPORTE_G += $D->ImporteDoc;
                        $TP_PAGOS_G += $D->Pagos_Doc;
                        $TP_SALDO_G += $D->Saldo_Doc;
                    }
                }
                $pdf->SetX(55);
                $pdf->SetFont('Calibri', 'B', 8);


                $pdf->Row(array(
                    '',
                    '',
                    '',
                    '$' . number_format($TP_IMPORTE, 2, ".", ","),
                    '$' . number_format($TP_PAGOS, 2, ".", ","),
                    '$' . number_format($TP_SALDO, 2, ".", ","),
                    '',
                ));
            }
            $pdf->SetX(75);
            $pdf->SetFont('Calibri', 'B', 8);
            $pdf->Cell(70, 5, utf8_decode('TOTAL: '), 0/* BORDE */, 0, 'L');

            $pdf->RowNoBorder(array(
                '',
                '',
                '',
                '$' . number_format($TP_IMPORTE_G, 2, ".", ","),
                '$' . number_format($TP_PAGOS_G, 2, ".", ","),
                '$' . number_format($TP_SALDO_G, 2, ".", ","),
                '',
            ));


            /* FIN RESUMEN */
            $path = 'uploads/Reportes/Proveedores';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file_name = "EDO CTA PROVEEDORES " . ' ' . date("d-m-Y his");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */
            if (delete_files('uploads/Reportes/Proveedores/')) {
                /* ELIMINA LA EXISTENCIA DE CUALQUIER ARCHIVO EN EL DIRECTORIO */
            }
            $pdf->Output($url);
            print base_url() . $url;
        }
    }

}
