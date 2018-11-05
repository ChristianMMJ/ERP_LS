<?php

require_once APPPATH . "/third_party/fpdf17/fpdf.php";

/* NO TOCAR */
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');

class ParesPreProgramados extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->model('ParesPreProgramados_model', 'pam')->helper('parespreprogramados_helper');
    }

    public function getParesPreProgramados() {
        try {
            $x = $this->input;
            switch ($x->post('TIPO')) {
                case 1:
                    $this->getParesPreProgramadosCliente();
                    break;
                case 2:
                    $this->getParesPreProgramadosEstilo();
                    break;
                case 3:
                    $this->getParesPreProgramadosLineas();
                    break;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getParesPreProgramadosCliente() {
        try {
            $x = $this->input;
            $CLIENTES = $this->pam->getClientes();
            $bordes = 0;
            $alto_celda = 4;
            $TIPO = $x->post('TIPO');
            $pdf = new PDF('L', 'mm', array(215.9, 279.4));
            $pdf->AddFont('Calibri', '');
            $pdf->AddFont('Calibri', 'I');
            $pdf->AddFont('Calibri', 'B');
            $pdf->AddFont('Calibri', 'BI');
            $pdf->AddPage();
            $pdf->SetAutoPageBreak(true, 10);
            /* ENCABEZADO FIJO */
            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetFont('Calibri', 'B', 10);
            $pdf->SetY(10);
            $pdf->Image($_SESSION["LOGO"], /* LEFT */ 10, 10/* TOP */, /* ANCHO */ 30, 12.5);
            $pdf->SetX(10);
//            $pdf->Rect(10, 10, 259, 195);/*DELIMITADOR DE MARGENES*/
            $pdf->SetX(40);
            $pdf->Cell(229, $alto_celda, utf8_decode($_SESSION["EMPRESA_RAZON"]), $bordes/* BORDE */, 1/* SALTO */, 'L');
            $pdf->SetX(40);
            $pdf->Cell(229, $alto_celda, utf8_decode("Pares preprogramados por cliente"), $bordes/* BORDE */, 1/* SALTO */, 'L');
            $pdf->SetX(160);
            $pdf->Cell(20, $alto_celda, "Fecha ", $bordes/* BORDE */, 0/* SALTO */, 'R');
            $pdf->SetX(180);
            $pdf->Cell(20, $alto_celda, Date('d/m/y'), $bordes/* BORDE */, 1/* SALTO */, 'C');

            $anchos = array(100/* 0 */, 20/* 1 */, 33/* 2 */, 30/* 3 */, 15/* 4 */, 16/* 5 */);
            $spacex = 10;
            $bordes = 1;
            /* SUB ENCABEZADO */
            $pdf->SetY($pdf->GetY() + $alto_celda + .5);
            $pdf->SetX($spacex);
            $pdf->Cell($anchos[0], $alto_celda, 'Cliente', $bordes/* BORDE */, 0/* SALTO */, 'L');
            $spacex += $anchos[0];
            $pdf->SetX($spacex);
            $pdf->Cell($anchos[1], $alto_celda, 'Pedido', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $spacex += $anchos[1];
            $pdf->SetX($spacex);
            $pdf->Cell($anchos[1], $alto_celda, 'Linea', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $spacex += $anchos[1];
            $pdf->SetX($spacex);
            $pdf->Cell($anchos[1], $alto_celda, 'Estilo', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $spacex += $anchos[1];
            $pdf->SetX($spacex);
            $pdf->Cell($anchos[2], $alto_celda, 'Color', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $spacex += $anchos[2];
            $pdf->SetX($spacex);
            $pdf->Cell($anchos[1], $alto_celda, 'Fecha-Ent', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $spacex += $anchos[1];
            $pdf->SetX($spacex);
            $pdf->Cell($anchos[5], $alto_celda, 'Pares', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $spacex += $anchos[5];
            $pdf->SetX($spacex);
            $pdf->Cell($anchos[4], $alto_celda, 'Maq', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $spacex += $anchos[4];
            $pdf->SetX($spacex);
            $pdf->Cell($anchos[4], $alto_celda, 'Sem', $bordes/* BORDE */, 1/* SALTO */, 'C');
            /* FIN SUB ENCABEZADO */
            /* FIN ENCABEZADO FIJO */

            $pdf->SetFont('Calibri', 'B', 8);
            $Y = 0;
            $YY = 0;
            $bordes = 0;
            $PARES = 0;
            $TOTAL_PARES = 0;
            $alto_celda = 3;
            $pdf->SetDrawColor(226, 226, 226);
            $pdf->SetDrawColor(0, 0, 0);
            $spacex = 110;
            $YF = 0;
            foreach ($CLIENTES as $k => $v) {
                $Y = $pdf->GetY();
                $pdf->SetFont('Calibri', 'B', 7);
                $pdf->SetX(10);
                $pdf->setFilled(0);
                $pdf->setBorders(0);
                $pdf->SetAligns(array('C', 'C', 'C'));
                $pdf->SetWidths(array(40/* 0 */, 40/* 1 */, 20/* 2 */));
                $pdf->RowNoBorder(array(utf8_decode($v->CLAVE_CLIENTE . " " . $v->CLIENTE)/* 0 */,
                    utf8_decode($v->CLAVE_AGENTE . " " . $v->AGENTE)/* 1 */,
                    utf8_decode($v->ESTADO)));
                $pdf->Line(10, $pdf->GetY(), 110, $pdf->GetY());
                $PARES_PREPROGRAMADOS = $this->pam->getParesPreProgramados($v->CLAVE_CLIENTE, 1);
                $bordes = 0;
                foreach ($PARES_PREPROGRAMADOS as $kk => $vv) {
                    $Y = $pdf->GetY();
                    $pdf->SetX($spacex);
                    $pdf->setFilled(0);
                    $pdf->setBorders(0);
                    $pdf->SetAligns(array('C'/* 0 */, 'L'/* 1 */, 'C'/* 2 */, 'L'/* 3 */, 'C'/* 4 */, 'C'/* 5 */, 'C'/* 6 */, 'C'/* 7 */));
                    $pdf->SetWidths(array(20/* 0 */, 20/* 1 */, 20/* 2 */, 33/* 3 */, 20/* 4 */, 16/* 5 */, 15/* 6 */, 15/* 7 */));
                    $pdf->RowNoBorder(array(utf8_decode($vv->PEDIDO)/* 0 */,
                        utf8_decode($vv->CLAVE_LINEA . " " . $vv->LINEA)/* 1 */,
                        utf8_decode($vv->CLAVE_ESTILO)/* 2 */,
                        utf8_decode($vv->COLOR)/* 3 */,
                        utf8_decode($vv->FECHA_ENTREGA)/* 4 */,
                        utf8_decode($vv->PARES)/* 5 */,
                        utf8_decode($vv->MAQUILA)/* 6 */,
                        utf8_decode($vv->SEMANA)/* 7 */));
                    $pdf->Line(110, $pdf->GetY(), 269, $pdf->GetY());
                    $spacex = 110;
                    $PARES += $vv->PARES;
                    $TOTAL_PARES += $vv->PARES;
                }

                $bordes = 0;
                $pdf->SetFont('Calibri', 'B', 8.5);
                $pdf->SetX(193);
                $pdf->Cell(30, $alto_celda, "Total por cliente", $bordes/* BORDE */, 0/* SALTO */, 'C');
                $pdf->SetX(223);
                $pdf->Cell(16, $alto_celda, $PARES, $bordes/* BORDE */, 1/* SALTO */, 'C');
                $PARES = 0;
            }
            $bordes = 0;
            $pdf->SetFont('Calibri', 'B', 8.5);
            $pdf->SetX(178);
            $pdf->Cell(45, $alto_celda, utf8_decode("Total pares en preprogramación"), $bordes/* BORDE */, 0/* SALTO */, 'C');
            $pdf->SetX(223);
            $pdf->Cell(16, $alto_celda, $TOTAL_PARES, $bordes/* BORDE */, 0/* SALTO */, 'C');
            /* FIN RESUMEN */
            $path = 'uploads/Reportes/ParesPreProgramados';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            if (delete_files('uploads/Reportes/ParesPreProgramados/')) {
                /* ELIMINA LA EXISTENCIA DE CUALQUIER ARCHIVO EN EL DIRECTORIO */
            }
            $file_name = "ParesPreProgramadosCliente" . date("d_m_Y_his");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */

            $pdf->Output($url);
            print base_url() . $url;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getParesPreProgramadosEstilo() {
        try {
            $x = $this->input;
            $ESTILOS = $this->pam->getEstilos();
            $bordes = 0;
            $alto_celda = 4;
            $TIPO = $x->post('TIPO');
            $pdf = new PDF('L', 'mm', array(215.9, 279.4));
            $pdf->AddFont('Calibri', '');
            $pdf->AddFont('Calibri', 'I');
            $pdf->AddFont('Calibri', 'B');
            $pdf->AddFont('Calibri', 'BI');
            $pdf->AddPage();
            $pdf->SetAutoPageBreak(true, 10);
            /* ENCABEZADO FIJO */
            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetFont('Calibri', 'B', 10);
            $pdf->SetY(10);
            $pdf->Image($_SESSION["LOGO"], /* LEFT */ 10, 10/* TOP */, /* ANCHO */ 30, 12.5);
            $pdf->SetX(10);
            //$pdf->Rect(10, 10, 259, 195); /* DELIMITADOR DE MARGENES */
            $pdf->SetX(40);
            $pdf->Cell(229, $alto_celda, utf8_decode($_SESSION["EMPRESA_RAZON"]), $bordes/* BORDE */, 1/* SALTO */, 'L');
            $pdf->SetX(40);
            $pdf->Cell(229, $alto_celda, utf8_decode("Pares preprogramados por estilo"), $bordes/* BORDE */, 1/* SALTO */, 'L');
            $pdf->SetX(160);
            $pdf->Cell(20, $alto_celda, "Fecha ", $bordes/* BORDE */, 0/* SALTO */, 'R');
            $pdf->SetX(180);
            $pdf->Cell(20, $alto_celda, Date('d/m/y'), $bordes/* BORDE */, 1/* SALTO */, 'C');

            $anchos = array(103/* 0 */, 15/* 1 */, 20/* 2 */, 30/* 3 */, 15/* 4 */, 16/* 5 */, 40/* 6 */);
            $spacex = 10;
            $bordes = 1;
            /* SUB ENCABEZADO */
            $pdf->SetY($pdf->GetY() + $alto_celda + .5);
            $pdf->SetX($spacex);
            $pdf->Cell($anchos[4], $alto_celda, 'Estilo', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $spacex += $anchos[4];
            $pdf->SetX($spacex);
            $pdf->Cell($anchos[6], $alto_celda, 'Color', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $spacex += $anchos[6];
            $pdf->SetX($spacex);
            $pdf->Cell($anchos[0], $alto_celda, 'Cliente', $bordes/* BORDE */, 0/* SALTO */, 'L');
            $spacex += $anchos[0];
            $pdf->SetX($spacex);
            $pdf->Cell($anchos[1], $alto_celda, 'Pedido', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $spacex += $anchos[1];
            $pdf->SetX($spacex);
            $pdf->Cell($anchos[2], $alto_celda, 'Linea', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $spacex += $anchos[2];
            $pdf->SetX($spacex);
            $pdf->Cell($anchos[2], $alto_celda, 'Fecha-Ent', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $spacex += $anchos[2];
            $pdf->SetX($spacex);
            $pdf->Cell($anchos[5], $alto_celda, 'Pares', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $spacex += $anchos[5];
            $pdf->SetX($spacex);
            $pdf->Cell($anchos[4], $alto_celda, 'Maq', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $spacex += $anchos[4];
            $pdf->SetX($spacex);
            $pdf->Cell($anchos[4], $alto_celda, 'Sem', $bordes/* BORDE */, 1/* SALTO */, 'C');
            /* FIN SUB ENCABEZADO */
            /* FIN ENCABEZADO FIJO */

            $pdf->SetFont('Calibri', 'B', 8);
            $Y = 0;
            $YY = 0;
            $bordes = 0;
            $PARES = 0;
            $TOTAL_PARES = 0;
            $alto_celda = 3;
            $pdf->SetDrawColor(226, 226, 226);
            $pdf->SetDrawColor(0, 0, 0);
            $spacex = 65;
            $YF = 0;
            foreach ($ESTILOS as $k => $v) {
                $Y = $pdf->GetY();
                $pdf->SetFont('Calibri', 'B', 7);
                $pdf->SetX(10);
                $pdf->setFilled(0);
                $pdf->setBorders(0);
                $pdf->SetAligns(array('C', 'L', 'C'));
                $pdf->SetWidths(array(15/* 0 */, 40/* 1 */, 20/* 2 */));
                $pdf->RowNoBorder(array(utf8_decode($v->CLAVE_ESTILO)/* 0 */, utf8_decode($v->COLOR)/* 1 */));
                $pdf->Line(10, $pdf->GetY(), 65, $pdf->GetY());
                $PARES_PREPROGRAMADOS = $this->pam->getParesPreProgramados($v->CLAVE_ESTILO, 2);
                $bordes = 0;
                $pdf->SetX(65);
                foreach ($PARES_PREPROGRAMADOS as $kk => $vv) {
                    $Y = $pdf->GetY();
                    $spacex = 65;
                    $pdf->SetX(10);
                    $pdf->setFilled(0);
                    $pdf->setBorders(0);
                    $pdf->SetAligns(array('C', 'L'/* 0 */, 'L'/* 1 */, 'C'/* 2 */, 'C'/* 3 */, 'C'/* 4 */, 'C'/* 5 */, 'C'/* 6 */, 'C'/* 7 */, 'C'/* 8 */, 'C'/* 9 */));
                    $pdf->SetWidths(array(55, 43/* 0 */, 35/* 1 */, 25/* 2 */, 15/* 3 */, 20/* 4 */, 20/* 5 */, 15/* 6 */, 16/* 7 */, 15/* 8 */, 15/* 9 */));
                    $pdf->RowNoBorder(array('', utf8_decode($vv->CLAVE_CLIENTE . " " . $vv->CLIENTE)/* 0 */,
                        utf8_decode($vv->AGENTE)/* 1 */,
                        utf8_decode($vv->ESTADO . "/" . $vv->PAIS)/* 2 */,
                        utf8_decode($vv->PEDIDO)/* 3 */,
                        utf8_decode($vv->CLAVE_LINEA . " " . $vv->LINEA)/* 4 OK */,
                        utf8_decode($vv->FECHA_ENTREGA)/* 5 */,
                        utf8_decode($vv->PARES)/* 6 */,
                        utf8_decode($vv->MAQUILA)/* 7 */,
                        utf8_decode($vv->SEMANA)/* 8 */));
                    $pdf->Line(65, $pdf->GetY(), 269, $pdf->GetY());
                    $spacex = 65;
                    $PARES += $vv->PARES;
                    $TOTAL_PARES += $vv->PARES;
                }

                $bordes = 0;
                $pdf->SetFont('Calibri', 'B', 8.5);
                $pdf->SetX(193);
                $pdf->Cell(30, $alto_celda, "Total por estilo", $bordes/* BORDE */, 0/* SALTO */, 'C');
                $pdf->SetX(223);
                $pdf->Cell(16, $alto_celda, $PARES, $bordes/* BORDE */, 1/* SALTO */, 'C');
                $PARES = 0;
            }
            $bordes = 0;
            $pdf->SetFont('Calibri', 'B', 8.5);
            $pdf->SetX(178);
            $pdf->Cell(45, $alto_celda, utf8_decode("Total pares en preprogramación"), $bordes/* BORDE */, 0/* SALTO */, 'C');
            $pdf->SetX(223);
            $pdf->Cell(16, $alto_celda, $TOTAL_PARES, $bordes/* BORDE */, 0/* SALTO */, 'C');
            /* FIN RESUMEN */
            $path = 'uploads/Reportes/ParesPreProgramados';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            if (delete_files('uploads/Reportes/ParesPreProgramados/')) {
                /* ELIMINA LA EXISTENCIA DE CUALQUIER ARCHIVO EN EL DIRECTORIO */
            }
            $file_name = "ParesPreProgramadosEstilo" . date("d_m_Y_his");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */

            $pdf->Output($url);
            print base_url() . $url;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getParesPreProgramadosLineas() {
        try {
            $x = $this->input;
            $CLIENTES = $this->pam->getClientes();
            $bordes = 0;
            $alto_celda = 4;
            $TIPO = $x->post('TIPO');
            $pdf = new PDF('L', 'mm', array(215.9, 279.4));
            $pdf->AddFont('Calibri', '');
            $pdf->AddFont('Calibri', 'I');
            $pdf->AddFont('Calibri', 'B');
            $pdf->AddFont('Calibri', 'BI');
            $pdf->AddPage();
            $pdf->SetAutoPageBreak(true, 10);
            /* ENCABEZADO FIJO */
            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetFont('Calibri', 'B', 10);
            $pdf->SetY(10);
            $pdf->Image($_SESSION["LOGO"], /* LEFT */ 10, 10/* TOP */, /* ANCHO */ 30, 12.5);
            $pdf->SetX(10);
//            $pdf->Rect(10, 10, 259, 195);/*DELIMITADOR DE MARGENES*/
            $pdf->SetX(40);
            $pdf->Cell(229, $alto_celda, utf8_decode($_SESSION["EMPRESA_RAZON"]), $bordes/* BORDE */, 1/* SALTO */, 'L');
            $pdf->SetX(40);
            $pdf->Cell(229, $alto_celda, utf8_decode("Pares preprogramados por linea"), $bordes/* BORDE */, 1/* SALTO */, 'L');
            $pdf->SetX(160);
            $pdf->Cell(20, $alto_celda, "Fecha ", $bordes/* BORDE */, 0/* SALTO */, 'R');
            $pdf->SetX(180);
            $pdf->Cell(20, $alto_celda, Date('d/m/y'), $bordes/* BORDE */, 1/* SALTO */, 'C');

            $anchos = array(100/* 0 */, 20/* 1 */, 33/* 2 */, 30/* 3 */, 15/* 4 */, 16/* 5 */);
            $spacex = 10;
            $bordes = 1;
            /* SUB ENCABEZADO */
            $pdf->SetY($pdf->GetY() + $alto_celda + .5);
            $pdf->SetX($spacex);
            $pdf->Cell($anchos[0], $alto_celda, 'Cliente', $bordes/* BORDE */, 0/* SALTO */, 'L');
            $spacex += $anchos[0];
            $pdf->SetX($spacex);
            $pdf->Cell($anchos[1], $alto_celda, 'Pedido', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $spacex += $anchos[1];
            $pdf->SetX($spacex);
            $pdf->Cell($anchos[1], $alto_celda, 'Linea', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $spacex += $anchos[1];
            $pdf->SetX($spacex);
            $pdf->Cell($anchos[1], $alto_celda, 'Estilo', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $spacex += $anchos[1];
            $pdf->SetX($spacex);
            $pdf->Cell($anchos[2], $alto_celda, 'Color', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $spacex += $anchos[2];
            $pdf->SetX($spacex);
            $pdf->Cell($anchos[1], $alto_celda, 'Fecha-Ent', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $spacex += $anchos[1];
            $pdf->SetX($spacex);
            $pdf->Cell($anchos[5], $alto_celda, 'Pares', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $spacex += $anchos[5];
            $pdf->SetX($spacex);
            $pdf->Cell($anchos[4], $alto_celda, 'Maq', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $spacex += $anchos[4];
            $pdf->SetX($spacex);
            $pdf->Cell($anchos[4], $alto_celda, 'Sem', $bordes/* BORDE */, 1/* SALTO */, 'C');
            /* FIN SUB ENCABEZADO */
            /* FIN ENCABEZADO FIJO */

            $pdf->SetFont('Calibri', 'B', 8);
            $Y = 0;
            $YY = 0;
            $bordes = 0;
            $PARES = 0;
            $TOTAL_PARES = 0;
            $alto_celda = 3;
            $pdf->SetDrawColor(226, 226, 226);
            $pdf->SetDrawColor(0, 0, 0);
            $spacex = 110;
            $YF = 0;
            foreach ($CLIENTES as $k => $v) {
                $Y = $pdf->GetY();
                $pdf->SetFont('Calibri', 'B', 7);
                $pdf->SetX(10);
                $pdf->setFilled(0);
                $pdf->setBorders(0);
                $pdf->SetAligns(array('C', 'C', 'C'));
                $pdf->SetWidths(array(40/* 0 */, 40/* 1 */, 20/* 2 */));
                $pdf->RowNoBorder(array(utf8_decode($v->CLAVE_CLIENTE . " " . $v->CLIENTE)/* 0 */,
                    utf8_decode($v->CLAVE_AGENTE . " " . $v->AGENTE)/* 1 */,
                    utf8_decode($v->ESTADO)));
                $pdf->Line(10, $pdf->GetY(), 110, $pdf->GetY());
                $PARES_PREPROGRAMADOS = $this->pam->getParesPreProgramados($v->CLAVE_CLIENTE, 3);
                $bordes = 0;
                foreach ($PARES_PREPROGRAMADOS as $kk => $vv) {
                    $Y = $pdf->GetY();
                    $pdf->SetX($spacex);
                    $pdf->setFilled(0);
                    $pdf->setBorders(0);
                    $pdf->SetAligns(array('C'/* 0 */, 'L'/* 1 */, 'C'/* 2 */, 'L'/* 3 */, 'C'/* 4 */, 'C'/* 5 */, 'C'/* 6 */, 'C'/* 7 */));
                    $pdf->SetWidths(array(20/* 0 */, 20/* 1 */, 20/* 2 */, 33/* 3 */, 20/* 4 */, 16/* 5 */, 15/* 6 */, 15/* 7 */));
                    $pdf->RowNoBorder(array(utf8_decode($vv->PEDIDO)/* 0 */,
                        utf8_decode($vv->CLAVE_LINEA . " " . $vv->LINEA)/* 1 */,
                        utf8_decode($vv->CLAVE_ESTILO)/* 2 */,
                        utf8_decode($vv->COLOR)/* 3 */,
                        utf8_decode($vv->FECHA_ENTREGA)/* 4 */,
                        utf8_decode($vv->PARES)/* 5 */,
                        utf8_decode($vv->MAQUILA)/* 6 */,
                        utf8_decode($vv->SEMANA)/* 7 */));
                    $pdf->Line(110, $pdf->GetY(), 269, $pdf->GetY());
                    $spacex = 110;
                    $PARES += $vv->PARES;
                    $TOTAL_PARES += $vv->PARES;
                }

                $bordes = 0;
                $pdf->SetFont('Calibri', 'B', 8.5);
                $pdf->SetX(193);
                $pdf->Cell(30, $alto_celda, "Total por estilo", $bordes/* BORDE */, 0/* SALTO */, 'C');
                $pdf->SetX(223);
                $pdf->Cell(16, $alto_celda, $PARES, $bordes/* BORDE */, 1/* SALTO */, 'C');
                $PARES = 0;
            }
            $bordes = 0;
            $pdf->SetFont('Calibri', 'B', 8.5);
            $pdf->SetX(178);
            $pdf->Cell(45, $alto_celda, utf8_decode("Total pares en preprogramación"), $bordes/* BORDE */, 0/* SALTO */, 'C');
            $pdf->SetX(223);
            $pdf->Cell(16, $alto_celda, $TOTAL_PARES, $bordes/* BORDE */, 0/* SALTO */, 'C');
            /* FIN RESUMEN */
            $path = 'uploads/Reportes/ParesPreProgramados';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            if (delete_files('uploads/Reportes/ParesPreProgramados/')) {
                /* ELIMINA LA EXISTENCIA DE CUALQUIER ARCHIVO EN EL DIRECTORIO */
            }
            $file_name = "ParesPreProgramadosLinea" . date("d_m_Y_his");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */

            $pdf->Output($url);
            print base_url() . $url;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
