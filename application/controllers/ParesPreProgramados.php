<?php

require_once APPPATH . "/third_party/fpdf17/fpdf.php";

/* NO TOCAR */
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');

class ParesPreProgramados extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->model('ParesPreProgramados_model', 'pam');
    }

    public function getParesPreProgramadosCliente() {
        try {
            $x = $this->input;
            $CLIENTES = $this->pam->getClientes();
            $bordes = 0;
            $alto_celda = 4;
            $TIPO = $x->post('TIPO');
            $pdf = new FPDF('L', 'mm', array(215.9, 279.4));
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
            $pdf->Rect(10, 10, 259, 195);
            $pdf->SetX(40);
            $pdf->Cell(229, $alto_celda, utf8_decode($_SESSION["EMPRESA_RAZON"]), $bordes/* BORDE */, 1/* SALTO */, 'L');
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
                $pdf->MultiCell(40, $alto_celda, $v->CLAVE_CLIENTE . " " . $v->CLIENTE, $bordes/* BORDE */, 'C');
                $YY = $pdf->GetY() > $YY ? $pdf->GetY() : $YY;

                $pdf->SetY($Y);
                $pdf->SetX(50);
                $pdf->MultiCell(40, $alto_celda, $v->CLAVE_AGENTE . " " . $v->AGENTE, $bordes/* BORDE */, 'C');
                $YY = $pdf->GetY() > $YY ? $pdf->GetY() : $YY;

                $pdf->SetY($Y);
                $pdf->SetX(90);
                $pdf->MultiCell(20, (strlen($v->ESTADO) <= 12) ? $alto_celda : $alto_celda - .5, utf8_decode($v->ESTADO), $bordes/* BORDE */, 'C');
                $YY = $pdf->GetY() > $YY ? $pdf->GetY() : $YY;
                $pdf->Line(10, $YY, 110, $YY);

                $pdf->SetY($YY);
                $pdf->SetFont('Calibri', 'B', 7);
                $YF = $pdf->GetY();
                $PARES_PREPROGRAMADOS = $this->pam->getParesPreProgramados($v->CLAVE_CLIENTE);
                $bordes = 0;
                foreach ($PARES_PREPROGRAMADOS as $kk => $vv) {
                    $Y = $pdf->GetY();
                    $pdf->SetX($spacex);
                    $pdf->Cell($anchos[1], $alto_celda, $vv->PEDIDO, $bordes/* BORDE */, 0/* SALTO */, 'C');

                    $spacex += $anchos[1];
                    $pdf->SetX($spacex);
                    $pdf->MultiCell($anchos[1], (strlen($vv->CLAVE_LINEA . " " . $vv->LINEA) <= 22) ? $alto_celda : $alto_celda - .5, utf8_decode($vv->CLAVE_LINEA . " " . $vv->LINEA), $bordes/* BORDE */, 'C');
                    $YY = $pdf->GetY() > $YY ? $pdf->GetY() : $YY;

                    $pdf->SetY($Y);
                    $spacex += $anchos[1];
                    $pdf->SetX($spacex);
                    $pdf->Cell($anchos[1], $alto_celda, $vv->CLAVE_ESTILO, $bordes/* BORDE */, 0/* SALTO */, 'C');

                    $spacex += $anchos[1];
                    $pdf->SetX($spacex);
                    $pdf->MultiCell($anchos[2], (strlen($vv->COLOR) <= 22) ? $alto_celda : $alto_celda - .5, utf8_decode($vv->COLOR), $bordes/* BORDE */, 'C');
                    $YY = $pdf->GetY() > $YY ? $pdf->GetY() : $YY;

                    $pdf->SetY($Y);
                    $spacex += $anchos[2];
                    $pdf->SetX($spacex);
                    $pdf->Cell($anchos[1], $alto_celda, $vv->FECHA_ENTREGA, $bordes/* BORDE */, 0/* SALTO */, 'C');

                    $pdf->SetY($Y);
                    $spacex += $anchos[1];
                    $pdf->SetX($spacex);
                    $pdf->Cell($anchos[5], $alto_celda, $vv->PARES, $bordes/* BORDE */, 0/* SALTO */, 'C');

                    $pdf->SetY($Y);
                    $spacex += $anchos[5];
                    $pdf->SetX($spacex);
                    $pdf->Cell($anchos[4], $alto_celda, $vv->MAQUILA, $bordes/* BORDE */, 0/* SALTO */, 'C');

                    $pdf->SetY($Y);
                    $spacex += $anchos[4];
                    $pdf->SetX($spacex);
                    $pdf->Cell($anchos[4], $alto_celda, $vv->SEMANA, $bordes/* BORDE */, 0/* SALTO */, 'C');

                    $pdf->Line(110, $YY, 269, $YY);
                    $pdf->SetY($YY);
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
            $file_name = "ParesPreProgramados" . date("d_m_Y_his");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */

            $pdf->Output($url);
            print base_url() . $url;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
