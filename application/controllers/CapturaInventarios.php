<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/third_party/fpdf17/fpdf.php";

class CapturaInventarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session')->model('ReporteCapturaFisica_model')
                ->helper('Reportecapturafisica_helper')->helper('file');
        date_default_timezone_set('America/Mexico_City');

        setlocale(LC_ALL, "");
        setlocale(LC_TIME, 'spanish');
    }

    /* Para captura de conteo fisico del inventario */

    public function getArticulos() {
        try {
            print json_encode($this->ReporteCapturaFisica_model->getArticulosParaConteoFisico());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getInfoArticulo() {
        try {
            print json_encode($this->ReporteCapturaFisica_model->getInfoArticulo($this->input->get('Articulo'), $this->input->get('Maq'), $this->input->get('Mes')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onCapturarConteoInvFisico() {
        try {
            $Maq = $this->input->post('Maq');
            $Mes = $this->input->post('Mes');
            $Articulo = $this->input->post('Articulo');
            $Precio = $this->input->post('Precio');
            $ExistenciaFisica = $this->input->post('ExistenciaFisica');

            $this->db->set("P$Mes", $Precio)
                    ->set($Mes, $ExistenciaFisica)
                    ->where('Clave', $Articulo)
                    ->update($Maq);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /* Metodo que pone en 0s el mes a capturar */

    public function onPrepararMesCapturaInv() {
        try {
            $Maq = $this->input->post('Maq');
            $Mes = $this->input->post('Mes');

            $this->db->set("P$Mes", 0)
                    ->set($Mes, 0)
                    ->update($Maq);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /* REPORTES */

    public function onReporteMovAjuste() {
        $Maq = $this->input->post('Maq');
        $Mes = $this->input->post('Mes');
        $Ano = $this->input->post('Ano');

        $Grupos = $this->ReporteCapturaFisica_model->getGruposMovimientosAjuste($Maq, $Mes, $Ano);
        $Articulos = $this->ReporteCapturaFisica_model->getDetalleMovimientosAjuste($Maq, $Mes, $Ano);
        if (!empty($Grupos)) {
            $pdf = new PDF_Ajustes('P', 'mm', array(215.9, 279.4));
            $pdf->setMes($Mes);
            $pdf->setAno($Ano);
            $pdf->SetAutoPageBreak(true, 5);
            $pdf->AddPage();

            $GT_Entradas = 0;
            $GT_Salidas = 0;
            $GT_TEntradas = 0;
            $GT_TSalidas = 0;
            foreach ($Grupos as $key => $G) {

                $pdf->SetX(5);
                $pdf->SetLineWidth(0.5);
                $pdf->SetFont('Calibri', 'B', 8);
                $pdf->Cell(15, 4, 'Grupo:', 'B'/* BORDE */, 0, 'L');
                $pdf->SetX(20);
                $pdf->SetFont('Calibri', '', 8);
                $pdf->Cell(40, 4, utf8_decode($G->Clave) . '    ' . utf8_decode($G->Nombre), 'B'/* BORDE */, 1, 'L');

                $pdf->SetLineWidth(0.2);
                $pdf->SetFont('Calibri', '', 8);
                $T_Entradas = 0;
                $T_Salidas = 0;
                $T_TEntradas = 0;
                $T_TSalidas = 0;
                $Total_Entradas = 0;
                $Total_Salidas = 0;

                foreach ($Articulos as $keyA => $D) {

                    if ($D->ClaveGrupo === $G->Clave) {

                        $Total_Entradas = ($D->Entradas * $D->PrecioMov <> 0) ? '$' . number_format($D->Entradas * $D->PrecioMov, 2, ".", ",") : '';
                        $Total_Salidas = ($D->Salidas * $D->PrecioMov <> 0) ? '$' . number_format($D->Salidas * $D->PrecioMov, 2, ".", ",") : '';
                        $pdf->Row(array(
                            utf8_decode($D->ClaveArt),
                            mb_strimwidth(utf8_decode($D->Articulo), 0, 50, ""),
                            utf8_decode($D->Unidad),
                            utf8_decode($D->FechaMov),
                            utf8_decode($D->TipoMov),
                            ($D->Entradas <> 0) ? number_format($D->Entradas, 2, ".", ",") : '',
                            ($D->Salidas <> 0) ? number_format($D->Salidas, 2, ".", ",") : '',
                            '$' . number_format($D->PrecioMov, 2, ".", ","),
                            $Total_Entradas,
                            $Total_Salidas,
                            utf8_decode($D->Sem),
                            utf8_decode($D->Maq)
                                ), 'B');

                        $T_Entradas += $D->Entradas;
                        $T_Salidas += $D->Salidas;
                        $T_TEntradas += $D->Entradas * $D->PrecioMov;
                        $T_TSalidas += $D->Salidas * $D->PrecioMov;

                        $GT_Entradas += $D->Entradas;
                        $GT_Salidas += $D->Salidas;
                        $GT_TEntradas += $D->Entradas * $D->PrecioMov;
                        $GT_TSalidas += $D->Salidas * $D->PrecioMov;
                    }
                }

                $pdf->SetX(40);
                $pdf->SetFont('Calibri', 'B', 8);
                $pdf->Cell(25, 4, 'Total por Grupo:', 0/* BORDE */, 0, 'L');
                $pdf->SetX(65);
                $pdf->SetFont('Calibri', '', 8);
                $pdf->Cell(40, 4, utf8_decode($G->Clave) . ' ' . utf8_decode($G->Nombre), 0/* BORDE */, 0, 'L');

                $pdf->SetFont('Calibri', 'B', 8);
                $pdf->Row(array(
                    '',
                    '',
                    '',
                    '',
                    '',
                    number_format($T_Entradas, 2, ".", ","),
                    number_format($T_Salidas, 2, ".", ","),
                    '',
                    '$' . number_format($T_TEntradas, 2, ".", ","),
                    '$' . number_format($T_TSalidas, 2, ".", ","),
                    '',
                    ''
                        ), 0);
            }

            $pdf->SetX(40);
            $pdf->SetFont('Calibri', 'B', 8);
            $pdf->Cell(25, 4, 'Total general:', 0/* BORDE */, 0, 'L');

            $pdf->SetFont('Calibri', 'B', 8);
            $pdf->Row(array(
                '',
                '',
                '',
                '',
                '',
                number_format($GT_Entradas, 2, ".", ","),
                number_format($GT_Salidas, 2, ".", ","),
                '',
                '$' . number_format($GT_TEntradas, 2, ".", ","),
                '$' . number_format($GT_TSalidas, 2, ".", ","),
                '',
                ''
                    ), 0);
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

    public function onReporteComparativoInvFisInvSis() {
        $Tipo = $this->input->post('Tipo');
        $Mes = $this->input->post('Mes');
        $Maq = $this->input->post('Maq');
        $Ano = $this->input->post('Ano');
        $Alm = $this->input->post('Almacen');
        $Texto_Mes = '';
        $Texto_Mes_Anterior = '';
        $Mes_Anterior = intval($Mes - 1);

        switch ($Mes_Anterior) {
            case 0:
                $Texto_Mes_Anterior = 'Dic';

                break;
            case 1:
                $Texto_Mes_Anterior = 'Ene';

                break;
            case 2:
                $Texto_Mes_Anterior = 'Feb';

                break;
            case 3:
                $Texto_Mes_Anterior = 'Mar';

                break;
            case 4:
                $Texto_Mes_Anterior = 'Abr';

                break;
            case 5:
                $Texto_Mes_Anterior = 'May';

                break;
            case 6:
                $Texto_Mes_Anterior = 'Jun';

                break;
            case 7:
                $Texto_Mes_Anterior = 'Jul';

                break;
            case 8:
                $Texto_Mes_Anterior = 'Ago';

                break;
            case 9:
                $Texto_Mes_Anterior = 'Sep';

                break;
            case 10:
                $Texto_Mes_Anterior = 'Oct';

                break;
            case 11:
                $Texto_Mes_Anterior = 'Nov';

                break;
            case 12:
                $Texto_Mes_Anterior = 'Dic';

                break;
        }
        switch ($Mes) {
            case '1':
                $Texto_Mes = 'Ene';

                break;
            case '2':
                $Texto_Mes = 'Feb';

                break;
            case '3':
                $Texto_Mes = 'Mar';

                break;
            case '4':
                $Texto_Mes = 'Abr';

                break;
            case '5':
                $Texto_Mes = 'May';

                break;
            case '6':
                $Texto_Mes = 'Jun';

                break;
            case '7':
                $Texto_Mes = 'Jul';

                break;
            case '8':
                $Texto_Mes = 'Ago';

                break;
            case '9':
                $Texto_Mes = 'Sep';

                break;
            case '10':
                $Texto_Mes = 'Oct';

                break;
            case '11':
                $Texto_Mes = 'Nov';

                break;
            case '12':
                $Texto_Mes = 'Dic';

                break;
        }

        $Grupos = $this->ReporteCapturaFisica_model->getGruposReporteComparativo($Tipo, $Mes, $Maq, $Ano, $Texto_Mes);

        $Detalle = $this->ReporteCapturaFisica_model->getDetalleReporteComparativo($Tipo, $Mes, $Maq, $Ano, $Texto_Mes, $Texto_Mes_Anterior);


        if (!empty($Grupos)) {
            $pdf = new PDF_ComparativoInv('L', 'mm', array(215.9, 279.4));

            $pdf->setMes($Mes);
            $pdf->setMaq($Alm);

            $pdf->AddPage();
            $pdf->SetAutoPageBreak(true, 5);

            $GTot_Mes_Ant = 0;
            $GTot_Entradas = 0;
            $GTot_Salidas = 0;
            $GTot_Actual = 0;
            $GTot_Fisico = 0;
            $GTot_Diferencia = 0;
            $GTot_Act_Pre = 0;
            $GTot_Fis_Pre = 0;
            $GTot_Dif_Pre = 0;


            foreach ($Grupos as $key => $G) {
                $Departamento_bd = ($Tipo === '0') ? '0' : $G->Departamento;


                if ($Departamento_bd === $Tipo) {

                    $pdf->SetLineWidth(0.5);
                    $pdf->SetX(5);
                    $pdf->SetFont('Calibri', 'B', 7.5);
                    $pdf->Cell(15, 4, utf8_decode('Grupo: '), 'B'/* BORDE */, 0, 'L');
                    $pdf->SetX(20);
                    $pdf->SetFont('Calibri', '', 7.5);
                    $pdf->Cell(50, 4, utf8_decode($G->Clave . ' ' . $G->Nombre), 'B'/* BORDE */, 1, 'L');

                    $Tot_Mes_Ant = 0;
                    $Tot_Entradas = 0;
                    $Tot_Salidas = 0;
                    $Tot_Actual = 0;
                    $Tot_Fisico = 0;
                    $Tot_Diferencia = 0;
                    $Tot_Act_Pre = 0;
                    $Tot_Fis_Pre = 0;
                    $Tot_Dif_Pre = 0;

                    foreach ($Detalle as $key => $D) {

                        if ($G->Clave === $D->ClaveGrupo) {

                            $Actual = $D->MesAnterior + $D->Entradas - $D->Salidas;
                            $Diferencia = $Actual - $D->MesActual;
                            $Pre_Actual = $Actual * $D->Precio;
                            $Pre_Fisico = $D->MesActual * $D->Precio;
                            $Pre_Difer = ($Pre_Actual) - ($Pre_Fisico);

                            $pdf->SetLineWidth(0.2);
                            $pdf->SetTextColor(0, 0, 0);
                            $pdf->SetY($pdf->GetY());
                            $pdf->SetX(8);
                            $pdf->Cell(11, 4, utf8_decode($D->Codigo), 'B'/* BORDE */, 0, 'R');
                            $pdf->SetX($pdf->GetX());
                            $pdf->Cell(61, 4, mb_strimwidth(utf8_decode($D->Articulo), 0, 53, ""), 'B'/* BORDE */, 0, 'L');
                            $pdf->SetX($pdf->GetX());
                            $pdf->Cell(15, 4, utf8_decode($D->Unidad), 'B'/* BORDE */, 0, 'C');
                            $pdf->SetX($pdf->GetX());
                            $pdf->Cell(16, 4, ($D->MesAnterior <> 0) ? number_format($D->MesAnterior, 2, ".", ",") : '', 1/* BORDE */, 0, 'R');
                            $pdf->SetX($pdf->GetX());
                            $pdf->Cell(16, 4, ($D->Entradas <> 0) ? number_format($D->Entradas, 2, ".", ",") : '', 1/* BORDE */, 0, 'R');
                            $pdf->SetX($pdf->GetX());
                            $pdf->Cell(16, 4, ($D->Salidas <> 0) ? number_format($D->Salidas, 2, ".", ",") : '', 1/* BORDE */, 0, 'R');
                            $pdf->SetX($pdf->GetX());
                            $pdf->Cell(16, 4, ($Actual <> 0) ? number_format($Actual, 2, ".", ",") : '', 1/* BORDE */, 0, 'R');
                            $pdf->SetX($pdf->GetX());
                            $pdf->Cell(13, 4, utf8_decode($D->Codigo), 'B'/* BORDE */, 0, 'R');
                            $pdf->SetX($pdf->GetX());
                            $pdf->Cell(16, 4, ($D->MesActual <> 0) ? number_format($D->MesActual, 2, ".", ",") : '', 1/* BORDE */, 0, 'R');
                            $pdf->SetX($pdf->GetX());
                            $pdf->SetFont('Calibri', 'B', 7.5);
                            $pdf->SetTextColor(197, 43, 9);
                            $pdf->Cell(16, 4, ($Diferencia <> 0) ? number_format($Diferencia, 2, ".", ",") : '', 1/* BORDE */, 0, 'R');
                            $pdf->SetX($pdf->GetX());
                            $pdf->SetFont('Calibri', '', 7.5);
                            $pdf->SetTextColor(0, 0, 0);
                            $pdf->Cell(12, 4, '$' . number_format($D->Precio, 2, ".", ","), 1/* BORDE */, 0, 'R');
                            $pdf->SetX($pdf->GetX());
                            $pdf->Cell(19, 4, ($Pre_Actual <> 0) ? '$' . number_format($Pre_Actual, 2, ".", ",") : '', 1/* BORDE */, 0, 'R');
                            $pdf->SetX($pdf->GetX());
                            $pdf->Cell(19, 4, ($Pre_Fisico <> 0) ? '$' . number_format($Pre_Fisico, 2, ".", ",") : '', 1/* BORDE */, 0, 'R');
                            $pdf->SetX($pdf->GetX());
                            $pdf->SetFont('Calibri', 'B', 7.5);
                            $pdf->SetTextColor(197, 43, 9);
                            $pdf->Cell(19, 4, ($Pre_Difer <> 0) ? '$' . number_format($Pre_Difer, 2, ".", ",") : '', 1/* BORDE */, 0, 'R');
                            $pdf->SetY($pdf->GetY() + 4);
                            $pdf->SetFont('Calibri', '', 7.5);
                            $pdf->SetTextColor(0, 0, 0);

                            $Tot_Mes_Ant += $D->MesAnterior;
                            $Tot_Entradas += $D->Entradas;
                            $Tot_Salidas += $D->Salidas;
                            $Tot_Actual += $Actual;
                            $Tot_Fisico += $D->MesActual;
                            $Tot_Diferencia += $Diferencia;
                            $Tot_Act_Pre += $Pre_Actual;
                            $Tot_Fis_Pre += $Pre_Fisico;
                            $Tot_Dif_Pre += $Pre_Difer;
//Gran totales
                            $GTot_Mes_Ant += $D->MesAnterior;
                            $GTot_Entradas += $D->Entradas;
                            $GTot_Salidas += $D->Salidas;
                            $GTot_Actual += $Actual;
                            $GTot_Fisico += $D->MesActual;
                            $GTot_Diferencia += $Diferencia;
                            $GTot_Act_Pre += $Pre_Actual;
                            $GTot_Fis_Pre += $Pre_Fisico;
                            $GTot_Dif_Pre += $Pre_Difer;
                        }
                    }
                    $pdf->SetFont('Calibri', 'B', 7.5);
                    $pdf->SetTextColor(0, 0, 0);
                    $pdf->SetY($pdf->GetY());
                    $pdf->SetX(8);
                    $pdf->Cell(25, 4, 'Total por Grupo: ', 0/* BORDE */, 0, 'L');
                    $pdf->SetX($pdf->GetX());
                    $pdf->SetFont('Calibri', '', 7.5);
                    $pdf->Cell(47, 4, utf8_decode($G->Clave . ' ' . $G->Nombre), 0/* BORDE */, 0, 'L');
                    $pdf->SetX($pdf->GetX());
                    $pdf->SetFont('Calibri', 'B', 7.5);
                    $pdf->Cell(15, 4, '', 0/* BORDE */, 0, 'C');
                    $pdf->SetX($pdf->GetX());
                    $pdf->Cell(16, 4, number_format($Tot_Mes_Ant, 2, ".", ","), 0/* BORDE */, 0, 'R');
                    $pdf->SetX($pdf->GetX());
                    $pdf->Cell(16, 4, number_format($Tot_Entradas, 2, ".", ","), 0/* BORDE */, 0, 'R');
                    $pdf->SetX($pdf->GetX());
                    $pdf->Cell(16, 4, number_format($Tot_Salidas, 2, ".", ","), 0/* BORDE */, 0, 'R');
                    $pdf->SetX($pdf->GetX());
                    $pdf->Cell(16, 4, number_format($Tot_Actual, 2, ".", ","), 0/* BORDE */, 0, 'R');
                    $pdf->SetX($pdf->GetX());
                    $pdf->Cell(13, 4, '', 0/* BORDE */, 0, 'R');
                    $pdf->SetX($pdf->GetX());
                    $pdf->Cell(16, 4, number_format($Tot_Fisico, 2, ".", ","), 0/* BORDE */, 0, 'R');
                    $pdf->SetX($pdf->GetX());
                    $pdf->SetTextColor(197, 43, 9);
                    $pdf->Cell(16, 4, number_format($Tot_Diferencia, 2, ".", ","), 0/* BORDE */, 0, 'R');
                    $pdf->SetX($pdf->GetX());
                    $pdf->SetTextColor(0, 0, 0);
                    $pdf->Cell(12, 4, '', 0/* BORDE */, 0, 'R');
                    $pdf->SetX($pdf->GetX());
                    $pdf->Cell(19, 4, '$' . number_format($Tot_Act_Pre, 2, ".", ","), 0/* BORDE */, 0, 'R');
                    $pdf->SetX($pdf->GetX());
                    $pdf->Cell(19, 4, '$' . number_format($Tot_Fis_Pre, 2, ".", ","), 0/* BORDE */, 0, 'R');
                    $pdf->SetX($pdf->GetX());
                    $pdf->SetTextColor(197, 43, 9);
                    $pdf->Cell(19, 4, '$' . number_format($Tot_Dif_Pre, 2, ".", ","), 0/* BORDE */, 0, 'R');
                    $pdf->SetY($pdf->GetY() + 4);
                    $pdf->SetFont('Calibri', '', 7.5);
                    $pdf->SetTextColor(0, 0, 0);
                }
            }

            $pdf->SetFont('Calibri', 'B', 7.5);
            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetY($pdf->GetY());
            $pdf->SetX(8);
            $pdf->Cell(25, 4, '', 0/* BORDE */, 0, 'L');
            $pdf->SetX($pdf->GetX());
            $pdf->SetFont('Calibri', 'B', 7.5);
            $pdf->Cell(47, 4, 'Total general:', 0/* BORDE */, 0, 'R');
            $pdf->SetX($pdf->GetX());
            $pdf->Cell(15, 4, '', 0/* BORDE */, 0, 'C');
            $pdf->SetX($pdf->GetX());
            $pdf->Cell(16, 4, number_format($GTot_Mes_Ant, 2, ".", ","), 0/* BORDE */, 0, 'R');
            $pdf->SetX($pdf->GetX());
            $pdf->Cell(16, 4, number_format($GTot_Entradas, 2, ".", ","), 0/* BORDE */, 0, 'R');
            $pdf->SetX($pdf->GetX());
            $pdf->Cell(16, 4, number_format($GTot_Salidas, 2, ".", ","), 0/* BORDE */, 0, 'R');
            $pdf->SetX($pdf->GetX());
            $pdf->Cell(16, 4, number_format($GTot_Actual, 2, ".", ","), 0/* BORDE */, 0, 'R');
            $pdf->SetX($pdf->GetX());
            $pdf->Cell(13, 4, '', 0/* BORDE */, 0, 'R');
            $pdf->SetX($pdf->GetX());
            $pdf->Cell(16, 4, number_format($GTot_Fisico, 2, ".", ","), 0/* BORDE */, 0, 'R');
            $pdf->SetX($pdf->GetX());
            $pdf->SetTextColor(197, 43, 9);
            $pdf->Cell(16, 4, number_format($GTot_Diferencia, 2, ".", ","), 0/* BORDE */, 0, 'R');
            $pdf->SetX($pdf->GetX());
            $pdf->SetTextColor(0, 0, 0);
            $pdf->Cell(12, 4, '', 0/* BORDE */, 0, 'R');
            $pdf->SetX($pdf->GetX());
            $pdf->Cell(19, 4, '$' . number_format($GTot_Act_Pre, 2, ".", ","), 0/* BORDE */, 0, 'R');
            $pdf->SetX($pdf->GetX());
            $pdf->Cell(19, 4, '$' . number_format($GTot_Fis_Pre, 2, ".", ","), 0/* BORDE */, 0, 'R');
            $pdf->SetX($pdf->GetX());
            $pdf->SetTextColor(197, 43, 9);
            $pdf->Cell(19, 4, '$' . number_format($GTot_Dif_Pre, 2, ".", ","), 0/* BORDE */, 0, 'R');
            $pdf->SetY($pdf->GetY() + 4);
            $pdf->SetFont('Calibri', '', 7.5);
            $pdf->SetTextColor(0, 0, 0);


            /* FIN RESUMEN */
            $path = 'uploads/Reportes/Inventario';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file_name = "REPORTE COMPARACION INVENTARIO FIS_SIS " . date("d-m-Y his");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */
            if (delete_files('uploads/Reportes/Inventario/')) {
                /* ELIMINA LA EXISTENCIA DE CUALQUIER ARCHIVO EN EL DIRECTORIO */
            }
            $pdf->Output($url);
            print base_url() . $url;
        }
    }

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
