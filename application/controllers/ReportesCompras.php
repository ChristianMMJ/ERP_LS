<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/third_party/fpdf17/fpdf.php";

class ReportesCompras extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session')->model('ReportesCompras_model')
                ->helper('Reportesgeneralcompras_helper')->helper('file');
        date_default_timezone_set('America/Mexico_City');

        setlocale(LC_ALL, "");
        setlocale(LC_TIME, 'spanish');
    }

    public function onReporteComprasGeneralDesglose() {
        $FechaIni = $this->input->post('FechaIni');
        $FechaFin = $this->input->post('FechaFin');
        $Tp = $this->input->post('Tp');
        $Tipo = $this->input->post('Tipo');

        $cm = $this->ReportesCompras_model;
        $Proveedores = $cm->getProveedoresReporte($FechaIni, $FechaFin, $Tp, $Tipo);
        $Documentos = $cm->getDocumentosReporte($FechaIni, $FechaFin, $Tp, $Tipo);
        if (!empty($Proveedores)) {

            $pdf = new PDFComprasDesgloce('L', 'mm', array(215.9, 279.4));

            $TipoE = '';
            switch ($Tipo) {
                case '':
                    $TipoE = '******* GENERAL *******';
                    break;
                case '0':
                    $TipoE = '******* DIRECTOS *******';
                    break;
                case '10':
                    $TipoE = '******* PIEL Y FORRO *******';
                    break;
                case '80':
                    $TipoE = '******* SUELA *******';
                    break;
                case '90':
                    $TipoE = '******* INDIRECTOS *******';
                    break;
            }

            $pdf->setFechaFin($FechaFin);
            $pdf->setFechaIni($FechaIni);
            $pdf->setTp($Tp);
            $pdf->setReporte($TipoE);
            $pdf->AddPage();
            $pdf->SetAutoPageBreak(true, 6);
            $pdf->SetLineWidth(0.2);

            $GTotal_Importe = 0;
            $GTotal_Abonos = 0;
            $GTotal_Saldo = 0;

            $GDTotal_Cantidad = 0;
            $GDTotal_Sub = 0;
            $GDTotal_Iva = 0;
            $GDTotal = 0;
            foreach ($Proveedores as $key => $G) {

                $pdf->SetLineWidth(0.5);
                $pdf->SetX(5);
                $pdf->SetFont('Calibri', 'B', 10);
                $pdf->Cell(55, 6, utf8_decode($G->ClaveProveedor . '    ' . $G->NombreProveedor), 0/* BORDE */, 0, 'L');


                $Total_Importe = 0;
                $Total_Abonos = 0;
                $Total_Saldo = 0;

                $DTotal_Cantidad = 0;
                $DTotal_Sub = 0;
                $DTotal_Iva = 0;
                $DTotal = 0;
                foreach ($Documentos as $key => $D) {
                    if ($G->ClaveProveedor === $D->ClaveProveedor) {
                        $anchos = array(18/* 3 */, 20/* 4 */, 20/* 5 */, 20/* 6 */, 20/* 7 */);
                        $aligns = array('L', 'L', 'R', 'R', 'R');
                        $pdf->SetAligns($aligns);
                        $pdf->SetWidths($anchos);
                        $pdf->SetFont('Calibri', 'B', 10);
                        $pdf->Row(array(
                            $D->Doc,
                            $D->FechaDoc,
                            ($D->ImporteDoc <> 0) ? '$' . number_format($D->ImporteDoc, 2, ".", ",") : '',
                            ($D->Pagos_Doc <> 0) ? '$' . number_format($D->Pagos_Doc, 2, ".", ",") : '',
                            ($D->Saldo_Doc <> 0) ? '$' . number_format($D->Saldo_Doc, 2, ".", ",") : ''
                                ), 0, 6);

                        $Articulos = $cm->getArticulosReporteGeneralDesgloce($D->Doc, $D->ClaveProveedor, $Tp);
                        $Total_Cantidad = 0;
                        $Total_Sub = 0;
                        $Total_Iva = 0;
                        $Total = 0;
                        foreach ($Articulos as $key => $A) {
                            $pdf->SetLineWidth(0.2);
                            $pdf->SetX(105);
                            $pdf->SetFont('Calibri', '', 9);
                            $pdf->Cell(10, 4, utf8_decode($A->Clave), 'B'/* BORDE */, 0, 'R');
                            $pdf->SetX($pdf->GetX());
                            $pdf->Cell(60, 4, mb_strimwidth(utf8_decode($A->Articulo), 0, 45, ""), 'B'/* BORDE */, 0, 'L');
                            $pdf->SetX($pdf->GetX());
                            $pdf->Cell(12, 4, utf8_decode($A->Unidad), 'B'/* BORDE */, 0, 'C');
                            $pdf->SetX($pdf->GetX());
                            $pdf->Cell(18, 4, number_format($A->Cantidad, 2, ".", ","), 'B'/* BORDE */, 0, 'R');
                            $pdf->SetX($pdf->GetX());
                            $pdf->Cell(15, 4, '$' . number_format($A->Precio, 2, ".", ","), 'B'/* BORDE */, 0, 'R');
                            $pdf->SetX($pdf->GetX());
                            $pdf->Cell(19, 4, '$' . number_format($A->Subtotal, 2, ".", ","), 'B'/* BORDE */, 0, 'R');
                            $pdf->SetX($pdf->GetX());
                            $pdf->Cell(16, 4, '$' . number_format($A->Iva, 2, ".", ","), 'B'/* BORDE */, 0, 'R');
                            $pdf->SetX($pdf->GetX());
                            $pdf->Cell(19, 4, '$' . number_format($A->Total, 2, ".", ","), 'B'/* BORDE */, 1, 'R');

                            $Total_Cantidad += $A->Cantidad;
                            $Total_Sub += $A->Subtotal;
                            $Total_Iva += $A->Iva;
                            $Total += $A->Total;

                            $DTotal_Cantidad += $A->Cantidad;
                            $DTotal_Sub += $A->Subtotal;
                            $DTotal_Iva += $A->Iva;
                            $DTotal += $A->Total;

                            $GDTotal_Cantidad += $A->Cantidad;
                            $GDTotal_Sub += $A->Subtotal;
                            $GDTotal_Iva += $A->Iva;
                            $GDTotal += $A->Total;
                        }
                        //TOTALES POR DOCUMENTO ARTICULOS
                        $pdf->SetLineWidth(0.4);
                        $pdf->SetX(105);
                        $pdf->SetFont('Calibri', 'B', 9.5);
                        $pdf->Cell(70, 5, 'Total por Documento', 'B'/* BORDE */, 0, 'R');
                        $pdf->SetX($pdf->GetX());
                        $pdf->Cell(12, 5, '', 'B'/* BORDE */, 0, 'C');
                        $pdf->SetX($pdf->GetX());
                        $pdf->Cell(18, 5, number_format($Total_Cantidad, 2, ".", ","), 'B'/* BORDE */, 0, 'R');
                        $pdf->SetX($pdf->GetX());
                        $pdf->Cell(15, 5, '', 'B'/* BORDE */, 0, 'R');
                        $pdf->SetX($pdf->GetX());
                        $pdf->Cell(19, 5, '$' . number_format($Total_Sub, 2, ".", ","), 'B'/* BORDE */, 0, 'R');
                        $pdf->SetX($pdf->GetX());
                        $pdf->Cell(16, 5, '$' . number_format($Total_Iva, 2, ".", ","), 'B'/* BORDE */, 0, 'R');
                        $pdf->SetX($pdf->GetX());
                        $pdf->Cell(19, 5, '$' . number_format($Total, 2, ".", ","), 'B'/* BORDE */, 1, 'R');


                        $Total_Importe += $D->ImporteDoc;
                        $Total_Abonos += $D->Pagos_Doc;
                        $Total_Saldo += $D->Saldo_Doc;
                        $GTotal_Importe += $D->ImporteDoc;
                        $GTotal_Abonos += $D->Pagos_Doc;
                        $GTotal_Saldo += $D->Saldo_Doc;
                    }
                }


                /* Total por proveedor */
                $pdf->SetX(65);
                $pdf->SetLineWidth(0.9);
                $pdf->SetFont('Calibri', 'B', 10);
                //TOTALES POR DOCUMENTO ARTICULOS
                $pdf->Cell(58, 6, 'Total por Proveedor', 'B'/* BORDE */, 0, 'L');
                $pdf->SetX($pdf->GetX());
                $pdf->Cell(20, 6, '$' . number_format($Total_Importe, 2, ".", ","), 'B'/* BORDE */, 0, 'R');
                $pdf->SetX($pdf->GetX());
                $pdf->Cell(20, 6, '$' . number_format($Total_Abonos, 2, ".", ","), 'B'/* BORDE */, 0, 'R');
                $pdf->SetX($pdf->GetX());
                $pdf->Cell(20, 6, '$' . number_format($Total_Saldo, 2, ".", ","), 'B'/* BORDE */, 0, 'R');
                $pdf->SetX($pdf->GetX());
                $pdf->Cell(4, 6, '', 'B'/* BORDE */, 0, 'R');
                $pdf->SetX($pdf->GetX());
                $pdf->Cell(18, 6, number_format($DTotal_Cantidad, 2, ".", ","), 'B'/* BORDE */, 0, 'R');
                $pdf->SetX($pdf->GetX());
                $pdf->Cell(15, 6, '', 'B'/* BORDE */, 0, 'R');
                $pdf->SetX($pdf->GetX());
                $pdf->Cell(19, 6, '', 'B'/* BORDE */, 0, 'R');
                $pdf->SetX($pdf->GetX());
                $pdf->Cell(16, 6, '', 'B'/* BORDE */, 0, 'R');
                $pdf->SetX($pdf->GetX());
                $pdf->Cell(19, 6, '$' . number_format($DTotal, 2, ".", ","), 'B'/* BORDE */, 1, 'R');
            }
            /* Total general */
            $pdf->SetX(65);
            $pdf->SetLineWidth(0.9);
            $pdf->SetFont('Calibri', 'B', 10);
            //TOTALES POR DOCUMENTO ARTICULOS
            $pdf->Cell(58, 6, 'Total general', 'B'/* BORDE */, 0, 'L');
            $pdf->SetX($pdf->GetX());
            $pdf->Cell(20, 6, '$' . number_format($GTotal_Importe, 2, ".", ","), 'B'/* BORDE */, 0, 'R');
            $pdf->SetX($pdf->GetX());
            $pdf->Cell(20, 6, '$' . number_format($GTotal_Abonos, 2, ".", ","), 'B'/* BORDE */, 0, 'R');
            $pdf->SetX($pdf->GetX());
            $pdf->Cell(20, 6, '$' . number_format($GTotal_Saldo, 2, ".", ","), 'B'/* BORDE */, 0, 'R');
            $pdf->SetX($pdf->GetX());
            $pdf->Cell(4, 6, '', 'B'/* BORDE */, 0, 'R');
            $pdf->SetX($pdf->GetX());
            $pdf->Cell(18, 6, number_format($GDTotal_Cantidad, 2, ".", ","), 'B'/* BORDE */, 0, 'R');
            $pdf->SetX($pdf->GetX());
            $pdf->Cell(15, 6, '', 'B'/* BORDE */, 0, 'R');
            $pdf->SetX($pdf->GetX());
            $pdf->Cell(19, 6, '', 'B'/* BORDE */, 0, 'R');
            $pdf->SetX($pdf->GetX());
            $pdf->Cell(16, 6, '', 'B'/* BORDE */, 0, 'R');
            $pdf->SetX($pdf->GetX());
            $pdf->Cell(19, 6, '$' . number_format($GDTotal, 2, ".", ","), 'B'/* BORDE */, 1, 'R');



            /* FIN RESUMEN */
            $path = 'uploads/Reportes/ComprasGeneral';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file_name = "REPORTE GENERAL DE COMPRAS DESGLOSE " . ' ' . date("d-m-Y his");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */
            if (delete_files('uploads/Reportes/ComprasGeneral/')) {
                /* ELIMINA LA EXISTENCIA DE CUALQUIER ARCHIVO EN EL DIRECTORIO */
            }
            $pdf->Output($url);
            print base_url() . $url;
        }
    }

    public function onReporteComprasGeneralSinDesglose() {
        $FechaIni = $this->input->post('FechaIni');
        $FechaFin = $this->input->post('FechaFin');
        $Tp = $this->input->post('Tp');
        $Tipo = $this->input->post('Tipo');

        $cm = $this->ReportesCompras_model;
        $Proveedores = $cm->getProveedoresReporte($FechaIni, $FechaFin, $Tp, $Tipo);
        $Documentos = $cm->getDocumentosReporte($FechaIni, $FechaFin, $Tp, $Tipo);
        if (!empty($Proveedores)) {

            $pdf = new PDFComprasSinDesgloce('P', 'mm', array(215.9, 279.4));

            $TipoE = '';
            switch ($Tipo) {
                case '':
                    $TipoE = '******* GENERAL *******';
                    break;
                case '0':
                    $TipoE = '******* DIRECTOS *******';
                    break;
                case '10':
                    $TipoE = '******* PIEL Y FORRO *******';
                    break;
                case '80':
                    $TipoE = '******* SUELA *******';
                    break;
                case '90':
                    $TipoE = '******* INDIRECTOS *******';
                    break;
            }

            $pdf->setFechaFin($FechaFin);
            $pdf->setFechaIni($FechaIni);
            $pdf->setTp($Tp);
            $pdf->setReporte($TipoE);
            $pdf->AddPage();
            $pdf->SetAutoPageBreak(true, 6);
            $pdf->SetLineWidth(0.2);

            $GTotal_Importe = 0;
            $GTotal_Abonos = 0;
            $GTotal_Saldo = 0;
            foreach ($Proveedores as $key => $G) {

                $pdf->SetLineWidth(0.5);
                $pdf->SetX(5);
                $pdf->SetFont('Calibri', 'B', 9);
                $pdf->Cell(55, 5, utf8_decode($G->ClaveProveedor . '    ' . $G->NombreProveedor), 'B'/* BORDE */, 1, 'L');


                $Total_Importe = 0;
                $Total_Abonos = 0;
                $Total_Saldo = 0;
                $pdf->SetLineWidth(0.2);
                $pdf->SetFont('Calibri', '', 9);

                foreach ($Documentos as $key => $D) {
                    if ($G->ClaveProveedor === $D->ClaveProveedor) {
                        $anchos = array(20/* 3 */, 18/* 4 */, 20/* 5 */, 20/* 6 */, 20/* 7 */);
                        $aligns = array('L', 'L', 'R', 'R', 'R');
                        $pdf->SetAligns($aligns);
                        $pdf->SetWidths($anchos);
                        $pdf->Row(array(
                            $D->FechaDoc,
                            $D->Doc,
                            ($D->ImporteDoc <> 0) ? '$' . number_format($D->ImporteDoc, 2, ".", ",") : '',
                            ($D->Pagos_Doc <> 0) ? '$' . number_format($D->Pagos_Doc, 2, ".", ",") : '',
                            ($D->Saldo_Doc <> 0) ? '$' . number_format($D->Saldo_Doc, 2, ".", ",") : ''
                                ), 'B');
                        $Total_Importe += $D->ImporteDoc;
                        $Total_Abonos += $D->Pagos_Doc;
                        $Total_Saldo += $D->Saldo_Doc;
                        $GTotal_Importe += $D->ImporteDoc;
                        $GTotal_Abonos += $D->Pagos_Doc;
                        $GTotal_Saldo += $D->Saldo_Doc;
                    }
                }


                /* Total por articulo */
                $pdf->SetX(70);
                $pdf->SetFont('Calibri', 'B', 9);
                $anchos = array(0/* 1 */, 38/* 2 */, 20/* 3 */, 20/* 3 */, 20/* 4 */);
                $aligns = array('R', 'L', 'R', 'R', 'R');
                $pdf->SetAligns($aligns);
                $pdf->SetWidths($anchos);
                $pdf->Row(array(
                    '',
                    utf8_decode('Total por Proveedor:'),
                    ($Total_Importe <> 0) ? '$' . number_format($Total_Importe, 2, ".", ",") : '',
                    ($Total_Abonos <> 0) ? '$' . number_format($Total_Abonos, 2, ".", ",") : '',
                    ($Total_Saldo <> 0) ? '$' . number_format($Total_Saldo, 2, ".", ",") : ''
                        ), 0);
            }
            /* Total general */
            $pdf->SetX(70);
            $pdf->SetFont('Calibri', 'B', 9);
            $anchos = array(0/* 1 */, 38/* 2 */, 20/* 3 */, 20/* 3 */, 20/* 4 */);
            $aligns = array('R', 'L', 'R', 'R', 'R');
            $pdf->SetAligns($aligns);
            $pdf->SetWidths($anchos);
            $pdf->Row(array(
                '',
                utf8_decode('Total general:'),
                ($GTotal_Importe <> 0) ? '$' . number_format($GTotal_Importe, 2, ".", ",") : '',
                ($GTotal_Abonos <> 0) ? '$' . number_format($GTotal_Abonos, 2, ".", ",") : '',
                ($GTotal_Saldo <> 0) ? '$' . number_format($GTotal_Saldo, 2, ".", ",") : ''
                    ), 0);


            /* FIN RESUMEN */
            $path = 'uploads/Reportes/ComprasGeneral';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file_name = "REPORTE GENERAL DE COMPRAS SIN DESGLOSE " . ' ' . date("d-m-Y his");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */
            if (delete_files('uploads/Reportes/ComprasGeneral/')) {
                /* ELIMINA LA EXISTENCIA DE CUALQUIER ARCHIVO EN EL DIRECTORIO */
            }
            $pdf->Output($url);
            print base_url() . $url;
        }
    }

    public function onReporteComprasPorArticulo() {
        $FechaIni = $this->input->post('FechaIni');
        $FechaFin = $this->input->post('FechaFin');
        $Tp = $this->input->post('Tp');

        $cm = $this->ReportesCompras_model;
        $Grupos = $cm->getGruposReporte($FechaIni, $FechaFin, $Tp);
        $Articulos = $cm->getArticulosReporte($FechaIni, $FechaFin, $Tp);
        if (!empty($Grupos)) {

            $pdf = new PDFComprasArticulos('P', 'mm', array(215.9, 279.4));
            $pdf->setFechaFin($FechaFin);
            $pdf->setFechaIni($FechaIni);
            $pdf->setTp($Tp);
            $pdf->AddPage();
            $pdf->SetAutoPageBreak(true, 6);
            $pdf->SetLineWidth(0.2);

            $Total_G = 0;
            foreach ($Grupos as $key => $G) {

                $pdf->SetLineWidth(0.5);
                $pdf->SetX(5);
                $pdf->SetFont('Calibri', 'B', 9);
                $pdf->Cell(15, 5, utf8_decode('Grupo: '), 'B'/* BORDE */, 0, 'L');
                $pdf->SetX(20);
                $pdf->SetFont('Calibri', '', 9);
                $pdf->Cell(38, 5, utf8_decode($G->ClaveGrupo . '    ' . $G->NombreGrupo), 'B'/* BORDE */, 1, 'L');


                $Total_M = 0;
                $pdf->SetLineWidth(0.2);

                $TotalGrupo = $cm->getTotalGrupoReporte($FechaIni, $FechaFin, $Tp, $G->ClaveGrupo)[0]->TotalGrupo;


                foreach ($Articulos as $key => $D) {
                    if ($G->ClaveGrupo === $D->ClaveGrupo) {

                        $Porcentaje = ($D->Cantidad / $TotalGrupo) * 100;

                        $pdf->SetFont('Calibri', '', 9);

                        $anchos = array(12/* 1 */, 118/* 2 */, 15/* 3 */, 15/* 3 */, 15/* 4 */);
                        $aligns = array('R', 'L', 'C', 'R', 'R');
                        $pdf->SetAligns($aligns);
                        $pdf->SetWidths($anchos);
                        $pdf->Row(array($D->Clave, $D->Descripcion, $D->Unidad, number_format($D->Cantidad, 2, ".", ","), number_format($Porcentaje, 2, ".", ",")), 'B');

                        $Total_M += $D->Cantidad;
                        $Total_G += $D->Cantidad;
                    }
                }


                /* Total por articulo */
                $pdf->SetX(70);
                $pdf->SetFont('Calibri', 'B', 9);
                $anchos = array(12/* 1 */, 118/* 2 */, 15/* 3 */, 15/* 3 */, 15/* 4 */);
                $aligns = array('R', 'R', 'C', 'R', 'C');
                $pdf->SetAligns($aligns);
                $pdf->SetWidths($anchos);
                $pdf->Row(array('', utf8_decode('Total por Grupo:'), '', number_format($Total_M, 2, ".", ","), ''), 0);
            }
            /* Total general */
            $pdf->SetX(70);
            $pdf->SetFont('Calibri', 'B', 9);
            $anchos = array(12/* 1 */, 118/* 2 */, 15/* 3 */, 15/* 3 */, 15/* 4 */);
            $aligns = array('R', 'R', 'C', 'R', 'C');
            $pdf->SetAligns($aligns);
            $pdf->SetWidths($anchos);
            $pdf->Row(array('', utf8_decode('Total general:'), '', number_format($Total_G, 2, ".", ","), ''), 0);


            /* FIN RESUMEN */
            $path = 'uploads/Reportes/ComprasGeneral';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file_name = "REPORTE ARTICULOS DE COMPRAS POR FECHAS Y TP " . ' ' . date("d-m-Y his");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */
            if (delete_files('uploads/Reportes/ComprasGeneral/')) {
                /* ELIMINA LA EXISTENCIA DE CUALQUIER ARCHIVO EN EL DIRECTORIO */
            }
            $pdf->Output($url);
            print base_url() . $url;
        }
    }

}
