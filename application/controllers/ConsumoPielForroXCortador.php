<?php

/* NO TOCAR */
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');

class ConsumoPielForroXCortador extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->model('ConsumoPielForroXCortador_model', 'cpfxc')->helper('consumopielforro_helper');
    }

    public function getCortadores() {
        try {
            print json_encode($this->cpfxc->getCortadores());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getArticulos() {
        try {
            print json_encode($this->cpfxc->getArticulos());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarMaquilas() {
        try {
            print json_encode($this->cpfxc->onComprobarMaquilas($this->input->get('MAQUILA')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onChecarSemanaValida() {
        try {
            print json_encode($this->cpfxc->onChecarSemanaValida($this->input->post('SEMANA')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function getReporte() {
        try {
            $pdf = new PDF('L', 'mm', array(215.9, 279.4));
            $pdf->AddFont('Calibri', '');
            $pdf->AddFont('Calibri', 'I');
            $pdf->AddFont('Calibri', 'B');
            $pdf->AddFont('Calibri', 'BI');
            $MAQUILA = $this->input->post('MAQUILA');
            $SEMANA_INICIAL = $this->input->post('SEMANA_INICIAL');
            $SEMANA_FINAL = $this->input->post('SEMANA_FINAL');
            $ANIO = $this->input->post('ANIO');
            $CORTADOR = $this->input->post('CORTADOR');
            $ARTICULO = $this->input->post('ARTICULO');
            $FECHAINICIAL = $this->input->post('FECHA_INICIAL');
            $FECHAFINAL = $this->input->post('FECHA_FINAL');
            $CONEMPLEADO = $this->input->post('CON_EMPLEADO');

            $pdf->AddPage();
            $pdf->SetAutoPageBreak(true, 10);

            $anchos = array(35, 40, 8, 10, 10, 35, 40, 8, 10, 10);
            $aligns = array('L', 'L', 'L', 'L', 'L');
            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetFont('Calibri', 'B', 10);
            $RESUMEN = $this->cpfxc->getConsumosPielForroXMaquilaSemanaAnioCortadorArticuloFechaInicialFechaFinal(str_pad($MAQUILA, 2, "0", STR_PAD_LEFT), $SEMANA_INICIAL, $SEMANA_FINAL, $ANIO, $CORTADOR, $ARTICULO, $FECHAINICIAL, $FECHAFINAL, $CONEMPLEADO);
            $base = 6;
            $alto_celda = 4;

            /* ANCHO DESPUÉS DE LOS MARGENES = 259, ES DE 215, PERO SON 10 DE MARGEN IZQ Y 10 DE MARGEN DER */
            $bordes = 0;
            $pdf->SetY(10);
            $pdf->Image($_SESSION["LOGO"], /* LEFT */ 10, 10/* TOP */, /* ANCHO */ 30, 12.5);
            $pdf->SetX(10);
            $pdf->Rect(10, 10, 259, 195);
            $pdf->SetX(40);
            $pdf->Cell(90, $alto_celda, utf8_decode($_SESSION["EMPRESA_RAZON"]), $bordes/* BORDE */, 0/* SALTO */, 'L');
            $pdf->SetX(130);
            $pdf->Cell(139, $alto_celda, utf8_decode("< Piel por control >"), $bordes/* BORDE */, 1/* SALTO */, 'L');
            $pdf->SetX(40);
            $pdf->Cell(45, $alto_celda, utf8_decode("Consumo real de la semana"), $bordes/* BORDE */, 0/* SALTO */, 'L');
            $pdf->SetX(85);
            $pdf->Cell(10, $alto_celda, utf8_decode($SEMANA_INICIAL), $bordes/* BORDE */, 0/* SALTO */, 'C');
            $pdf->SetX(95);
            $pdf->Cell(25, $alto_celda, utf8_decode("A la semana"), $bordes/* BORDE */, 0/* SALTO */, 'L');
            $pdf->SetX(120);
            $pdf->Cell(10, $alto_celda, utf8_decode($SEMANA_INICIAL), $bordes/* BORDE */, 0/* SALTO */, 'C');
            $pdf->SetX(130);
            $pdf->Cell(70, $alto_celda, utf8_decode("Fecha " . Date('d/m/Y')), $bordes/* BORDE */, 0/* SALTO */, 'C');
            $pdf->SetX(200);
            $pdf->Cell(69, $alto_celda, utf8_decode("Página " . $pdf->PageNo()), $bordes/* BORDE */, 1/* SALTO */, 'C');

            $pdf->SetX(40);
            $pdf->Cell(90, $alto_celda, utf8_decode("Cons ord.produ"), $bordes/* BORDE */, 0/* SALTO */, 'R');
            $pdf->SetX(130);
            $pdf->Cell(45, $alto_celda, utf8_decode("Consumo"), $bordes/* BORDE */, 0/* SALTO */, 'R');
            $pdf->SetX(175);
            $pdf->Cell(30, $alto_celda, utf8_decode("Consumo real"), $bordes/* BORDE */, 0/* SALTO */, 'C');
            $pdf->SetX(205);
            $pdf->Cell(64, $alto_celda, utf8_decode("Pesos"), $bordes/* BORDE */, 1/* SALTO */, 'C');
            $bordes = 1;
            $pdf->SetFont('Calibri', 'B', 7.5);
            $pdf->SetY($pdf->GetY() + .5);
            $base = 10;
            $pdf->SetX($base);
            $pdf->Cell(15, $alto_celda, utf8_decode("Control"), $bordes/* BORDE */, 0/* SALTO */, 'C');
            $base += 15;
            $pdf->SetX($base);
            $pdf->Cell(15, $alto_celda, utf8_decode("Estilo"), $bordes/* BORDE */, 0/* SALTO */, 'C');
            $base += 15;
            $pdf->SetX($base);
            $pdf->Cell(10, $alto_celda, utf8_decode("Color"), $bordes/* BORDE */, 0/* SALTO */, 'C');
            $base += 10;
            $pdf->SetX($base);
            $pdf->Cell(50, $alto_celda, utf8_decode("Articulo"), $bordes/* BORDE */, 0/* SALTO */, 'C');
            $base += 50;
            $pdf->SetX($base);
            $pdf->Cell(10, $alto_celda, utf8_decode("Precio"), $bordes/* BORDE */, 0/* SALTO */, 'C');
            $base += 10;
            $pdf->SetX($base);
            $pdf->Cell(10, $alto_celda, utf8_decode("Pares"), $bordes/* BORDE */, 0/* SALTO */, 'C');
            $base += 10;
            $pdf->SetX($base);
            $pdf->Cell(10, $alto_celda, utf8_decode("X esti"), $bordes/* BORDE */, 0/* SALTO */, 'C');
            $base += 10;
            $pdf->SetX($base);
            $pdf->Cell(15, $alto_celda, utf8_decode("X control"), $bordes/* BORDE */, 0/* SALTO */, 'C');
            $base += 15;
            $pdf->SetX($base);
            $pdf->Cell(15, $alto_celda, utf8_decode("Entregado"), $bordes/* BORDE */, 0/* SALTO */, 'C');
            $base += 15;
            $pdf->SetX($base);
            $pdf->Cell(15, $alto_celda, utf8_decode("Devolu"), $bordes/* BORDE */, 0/* SALTO */, 'C');
            $base += 15;
            $pdf->SetX($base);
            $pdf->Cell(15, $alto_celda, utf8_decode("Basura"), $bordes/* BORDE */, 0/* SALTO */, 'C');
            $base += 15;
            $pdf->SetX($base);
            $pdf->Cell(15, $alto_celda, utf8_decode("Difere"), $bordes/* BORDE */, 0/* SALTO */, 'C');
            $base += 15;
            $pdf->SetX($base);
            $pdf->Cell(15, $alto_celda, utf8_decode("Dcm2"), $bordes/* BORDE */, 0/* SALTO */, 'C');
            $base += 15;
            $pdf->SetX($base);
            $pdf->Cell(7, $alto_celda, utf8_decode("%"), $bordes/* BORDE */, 0/* SALTO */, 'C');
            $base += 7;
            $pdf->SetX($base);
            $pdf->Cell(12, $alto_celda, utf8_decode("Sistema"), $bordes/* BORDE */, 0/* SALTO */, 'C');
            $base += 12;
            $pdf->SetX($base);
            $pdf->Cell(15, $alto_celda, utf8_decode("Real"), $bordes/* BORDE */, 0/* SALTO */, 'C');
            $base += 15;
            $pdf->SetX($base);
            $pdf->Cell(15, $alto_celda, utf8_decode("Difere"), $bordes/* BORDE */, 1/* SALTO */, 'C');
            
            $bordes = 0;
            $pdf->SetFont('Calibri', 'B', 6.5);
            foreach ($RESUMEN as $k => $v) {
                $base = 10;
                $pdf->SetX($base);
                $pdf->Cell(15, $alto_celda, utf8_decode($v->Control), $bordes/* BORDE */, 0/* SALTO */, 'C');
                $base += 15;
                $pdf->SetX($base);
                $pdf->Cell(15, $alto_celda, utf8_decode($v->Estilo), $bordes/* BORDE */, 0/* SALTO */, 'C');
                $base += 15;
                $pdf->SetX($base);
                $pdf->Cell(10, $alto_celda, utf8_decode($v->Color), $bordes/* BORDE */, 0/* SALTO */, 'C');
                $base += 10;
                $pdf->SetX($base);
                $pdf->Cell(50, $alto_celda, utf8_decode($v->Articulo . " " . $v->Descripcion), $bordes/* BORDE */, 0/* SALTO */, 'L');
                $base += 50;
                $pdf->SetX($base);
                $pdf->Cell(10, $alto_celda, utf8_decode($v->PrecioActual), $bordes/* BORDE */, 0/* SALTO */, 'C');
                $base += 10;
                $pdf->SetX($base);
                $pdf->Cell(10, $alto_celda, utf8_decode($v->Pares), $bordes/* BORDE */, 0/* SALTO */, 'C');
                $base += 10;
                $pdf->SetX($base);
                $pdf->Cell(10, $alto_celda, utf8_decode("X esti"), $bordes/* BORDE */, 0/* SALTO */, 'C');
                $base += 10;
                $pdf->SetX($base);
                $pdf->Cell(15, $alto_celda, utf8_decode("X control"), $bordes/* BORDE */, 0/* SALTO */, 'C');
                $base += 15;
                $pdf->SetX($base);
                $pdf->Cell(15, $alto_celda, utf8_decode("Entregado"), $bordes/* BORDE */, 0/* SALTO */, 'C');
                $base += 15;
                $pdf->SetX($base);
                $pdf->Cell(15, $alto_celda, utf8_decode("Devolu"), $bordes/* BORDE */, 0/* SALTO */, 'C');
                $base += 15;
                $pdf->SetX($base);
                $pdf->Cell(15, $alto_celda, utf8_decode("Basura"), $bordes/* BORDE */, 0/* SALTO */, 'C');
                $base += 15;
                $pdf->SetX($base);
                $pdf->Cell(15, $alto_celda, utf8_decode("Difere"), $bordes/* BORDE */, 0/* SALTO */, 'C');
                $base += 15;
                $pdf->SetX($base);
                $pdf->Cell(15, $alto_celda, utf8_decode("Dcm2"), $bordes/* BORDE */, 0/* SALTO */, 'C');
                $base += 15;
                $pdf->SetX($base);
                $pdf->Cell(7, $alto_celda, utf8_decode("%"), $bordes/* BORDE */, 0/* SALTO */, 'C');
                $base += 7;
                $pdf->SetX($base);
                $pdf->Cell(12, $alto_celda, utf8_decode("Sistema"), $bordes/* BORDE */, 0/* SALTO */, 'C');
                $base += 12;
                $pdf->SetX($base);
                $pdf->Cell(15, $alto_celda, utf8_decode("Real"), $bordes/* BORDE */, 0/* SALTO */, 'C');
                $base += 15;
                $pdf->SetX($base);
                $pdf->Cell(15, $alto_celda, utf8_decode("Difere"), $bordes/* BORDE */, 1/* SALTO */, 'C');
            }

            /* FIN RESUMEN */
            $path = 'uploads/Reportes/ConsumosDePielYForro';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            if (delete_files('uploads/Reportes/ConsumosDePielYForro/')) {
                /* ELIMINA LA EXISTENCIA DE CUALQUIER ARCHIVO EN EL DIRECTORIO */
            }
            $file_name = "ConsumoPielForro" . date("d_m_Y_his");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */

            $pdf->Output($url);
            print base_url() . $url;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
