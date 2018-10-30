<?php

require_once APPPATH . "/third_party/fpdf17/fpdf.php";

/* NO TOCAR */
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');

class ParesAsignados extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->model('ParesAsignados_model', 'pam');
    }

    public function getParesAsignados() {
        try {
            $x = $this->input;

            $PARES_ASIGNADOS = ($this->pam->getParesAsignados(
                            $x->post('MAQUILA_INICIAL'), $x->post('MAQUILA_FINAL'), $x->post('SEMANA_INICIAL'), $x->post('SEMANA_FINAL'), $x->post('ANIO'), $x->post('TIPO')));

            $MAQUILAS = array();
            foreach ($PARES_ASIGNADOS as $k => $v) {
                if (!in_array($v->MAQUILA, $MAQUILAS)) {
                    array_push($MAQUILAS, $v->MAQUILA);
                }
            }
            sort($MAQUILAS);

            $bordes = 1;
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
            $pdf->SetX(40);
            $pdf->Cell(40, $alto_celda, utf8_decode("Pares asignados a maquila"), $bordes/* BORDE */, 0/* SALTO */, 'L');
            $pdf->SetX(80);
            $pdf->Cell(5, $alto_celda, $x->post('MAQUILA_INICIAL') !== '' ? $x->post('MAQUILA_INICIAL') : '', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $pdf->SetX(85);
            $pdf->Cell(20, $alto_celda, "A la maquila ", $bordes/* BORDE */, 0/* SALTO */, 'L');
            $pdf->SetX(105);
            $pdf->Cell(5, $alto_celda, $x->post('MAQUILA_FINAL') !== '' ? $x->post('MAQUILA_FINAL') : '', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $pdf->SetX(110);
            $pdf->Cell(20, $alto_celda, utf8_decode("De la sem"), $bordes/* BORDE */, 0/* SALTO */, 'L');
            $pdf->SetX(130);
            $pdf->Cell(5, $alto_celda, $x->post('SEMANA_INICIAL') !== '' ? $x->post('SEMANA_INICIAL') : '', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $pdf->SetX(135);
            $pdf->Cell(20, $alto_celda, "A la sem ", $bordes/* BORDE */, 0/* SALTO */, 'L');
            $pdf->SetX(155);
            $pdf->Cell(5, $alto_celda, $x->post('SEMANA_FINAL') !== '' ? $x->post('SEMANA_FINAL') : '', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $pdf->SetX(160);
            $pdf->Cell(20, $alto_celda, "Fecha ", $bordes/* BORDE */, 0/* SALTO */, 'R');
            $pdf->SetX(180);
            $pdf->Cell(20, $alto_celda, Date('d/m/y'), $bordes/* BORDE */, 1/* SALTO */, 'C');

            /* SUB ENCABEZADO */
            $pdf->SetY($pdf->GetY() + $alto_celda + .5);
            $pdf->SetX(10);
            $pdf->Cell(20, $alto_celda, 'Pedido', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $pdf->SetX(30);
            $pdf->Cell(20, $alto_celda, 'Estilo', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $pdf->SetX(50);
            $pdf->Cell(20, $alto_celda, 'Color', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $pdf->SetX(70);
            $pdf->Cell(50, $alto_celda, '-', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $pdf->SetX(120);
            $pdf->Cell(15, $alto_celda, 'Cliente', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $pdf->SetX(135);
            $pdf->Cell(50, $alto_celda, '-', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $pdf->SetX(185);
            $pdf->Cell(20, $alto_celda, 'Fecha-ent', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $bordes = 1;
            $pdf->SetX(205);
            $pdf->Cell(20, $alto_celda, 'Sem', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $pdf->SetX(225);
            $pdf->Cell(20, $alto_celda, 'Pares', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $pdf->SetX(245);
            $pdf->Cell(20, $alto_celda, 'Obs1.', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $pdf->SetX(265);
            $pdf->Cell(20, $alto_celda, 'Obs2.', $bordes/* BORDE */, 0/* SALTO */, 'C');
            $pdf->SetX(285);
            $pdf->Cell(20, $alto_celda, 'Obs.C', $bordes/* BORDE */, 1/* SALTO */, 'C');
            /* FIN SUB ENCABEZADO */
            /* FIN ENCABEZADO FIJO */

            $pdf->SetFont('Calibri', 'B', 8);
            $Y = 0;
            $YY = 0;
            $bordes = 0;
            $PARES = 0;
            $TOTAL_PARES = 0;
            $alto_celda = 3.375;
            $pdf->SetDrawColor(226, 226, 226);
            foreach ($MAQUILAS as $k => $v) {
                $pdf->SetFont('Calibri', 'B', 10);
                $pdf->SetX(10);
                $pdf->Cell(20, $alto_celda, 'Maquila ', $bordes/* BORDE */, 0/* SALTO */, 'L');
                $pdf->SetX(30);
                $pdf->Cell(20, $alto_celda, intval($v), $bordes/* BORDE */, 1/* SALTO */, 'C');
                $pdf->Line(10, $pdf->GetY(), 269, $pdf->GetY());
                $pdf->SetFont('Calibri', 'B', 7);
                foreach ($PARES_ASIGNADOS as $kk => $vv) {
                    if ($v === $vv->MAQUILA) {
                        $Y = $pdf->GetY();
                        $pdf->SetX(10);
                        $pdf->Cell(20, $alto_celda, $vv->CLAVE_PEDIDO, $bordes/* BORDE */, 0/* SALTO */, 'C');
                        $pdf->SetX(30);
                        $pdf->Cell(20, $alto_celda, $vv->ESTILO, $bordes/* BORDE */, 0/* SALTO */, 'C');
                        $pdf->SetX(50);
                        $pdf->Cell(20, $alto_celda, $vv->CLAVE_COLOR, $bordes/* BORDE */, 0/* SALTO */, 'C');

                        $pdf->SetX(70);
                        $pdf->MultiCell(50, $alto_celda, utf8_decode($vv->COLOR), $bordes/* BORDE */, 'C');
                        $YY = $pdf->GetY();
                        $pdf->SetY($Y);

                        $pdf->SetX(120);
                        $pdf->Cell(15, $alto_celda, $vv->CLAVE_CLIENTE, $bordes/* BORDE */, 0/* SALTO */, 'C');

                        $pdf->SetX(135);
                        $pdf->MultiCell(50, $alto_celda, utf8_decode($vv->CLIENTE), $bordes/* BORDE */, 'C');
                        $YY = $pdf->GetY() > $YY ? $pdf->GetY() : $YY;
                        $pdf->SetY($Y);
                        $bordes = 1;
                        $pdf->SetX(185);
                        $pdf->Cell(20, $alto_celda, $vv->FECHA_ENTREGA, $bordes/* BORDE */, 0/* SALTO */, 'C');
                        $pdf->SetX(205);
                        $pdf->Cell(20, $alto_celda, $vv->SEMANA, $bordes/* BORDE */, 0/* SALTO */, 'C');
                        $pdf->SetX(225);
                        $pdf->Cell(20, $alto_celda, $vv->PARES, $bordes/* BORDE */, 1/* SALTO */, 'C');

                        $pdf->SetX(245);
                        $pdf->MultiCell(50, $alto_celda, utf8_decode($vv->OBSERVACION_UNO), $bordes/* BORDE */, 'C');
                        $YY = $pdf->GetY() > $YY ? $pdf->GetY() : $YY;
                        $pdf->SetY($Y);

                        $pdf->SetX(295);
                        $pdf->MultiCell(50, $alto_celda, utf8_decode($vv->OBSERVACION_DOS), $bordes/* BORDE */, 'C');
                        $YY = $pdf->GetY() > $YY ? $pdf->GetY() : $YY;
                        $pdf->SetY($Y);

                        $pdf->SetX(345);
                        $pdf->MultiCell(50, $alto_celda, utf8_decode($vv->OBSERVACIONES_CLIENTE), $bordes/* BORDE */, 'C');
                        $YY = $pdf->GetY() > $YY ? $pdf->GetY() : $YY;

                        $pdf->SetY($YY);
                        $pdf->Line(10, $YY, 269, $YY);
                        $PARES += $vv->PARES;
                        $TOTAL_PARES += $vv->PARES;
                    }
                }
                $bordes = 0;
                $pdf->SetFont('Calibri', 'B', 10);
                $pdf->SetX(195);
                $pdf->Cell(30, $alto_celda, "Pares por maquila", $bordes/* BORDE */, 0/* SALTO */, 'C');
                $pdf->SetX(225);
                $pdf->Cell(20, $alto_celda, $PARES, $bordes/* BORDE */, 1/* SALTO */, 'C');
                $PARES = 0;
            }
            $bordes = 0;
            $pdf->SetFont('Calibri', 'B', 10);
            $pdf->SetX(195);
            $pdf->Cell(30, $alto_celda, "Total pares", $bordes/* BORDE */, 0/* SALTO */, 'C');
            $pdf->SetX(225);
            $pdf->Cell(20, $alto_celda, $TOTAL_PARES, $bordes/* BORDE */, 0/* SALTO */, 'C');
            /* FIN RESUMEN */
            $path = 'uploads/Reportes/ParesAsignados';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            if (delete_files('uploads/Reportes/ParesAsignados/')) {
                /* ELIMINA LA EXISTENCIA DE CUALQUIER ARCHIVO EN EL DIRECTORIO */
            }
            $file_name = "ParesAsignados" . date("d_m_Y_his");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */

            $pdf->Output($url);
            print base_url() . $url;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
