<?php

/* NO TOCAR */
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/third_party/fpdf17/fpdf.php";

class SalidasSubAlmacenMP extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->model('SalidasSubAlmacenMP_model')
                ->helper('reportesalmacen_helper')->helper('file');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');

            switch ($this->session->userdata["TipoAcceso"]) {
                case 'SUPER ADMINISTRADOR':
                    $this->load->view('vNavGeneral');
                    $this->load->view('vMenuMateriales');
                    break;
                case 'ALMACEN':
                    $this->load->view('vMenuMateriales');
                    break;
            }

            $this->load->view('vFondo');
            $this->load->view('vSalidasSubAlmacenMP');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getRecords() {
        try {


            print json_encode($this->SalidasSubAlmacenMP_model->getRecordsSubAlmacen($this->input->post('DocMov')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDatosByArticulo() {
        try {
            print json_encode($this->SalidasSubAlmacenMP_model->getDatosByArticulo($this->input->get('Articulo'), $this->input->get('Maquila')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getArticulos() {
        try {
            print json_encode($this->SalidasSubAlmacenMP_model->getArticulos());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarSemanasProduccion() {
        try {
            print json_encode($this->SalidasSubAlmacenMP_model->onComprobarSemanasProduccion($this->input->get('Clave'), $this->input->get('Ano')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onVerificarSemanaProdCerrada() {
        try {

            print json_encode($this->SalidasSubAlmacenMP_model->onVerificarSemanaProdCerrada(
                                    $this->input->get('Ano'), $this->input->get('Maq'), $this->input->get('Sem')
            ));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarMaquilas() {
        try {
            print json_encode($this->SalidasSubAlmacenMP_model->onComprobarMaquilas($this->input->get('Clave')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $x = $this->input;

            $maq = $x->post('Maq');
            $mov = $x->post('TipoMov');
            $datosSalidaMovArtFabrica = array(
                'Articulo' => $x->post('Articulo'),
                'PrecioMov' => $x->post('PrecioMov'),
                'CantidadMov' => $x->post('CantidadMov'),
                'FechaMov' => $x->post('FechaMov'),
                'EntradaSalida' => '2',
                'TipoMov' => $x->post('TipoMov'),
                'DocMov' => $x->post('DocMov'),
                'Tp' => '',
                'Maq' => '1',
                'Sem' => $x->post('Sem'),
                'OrdenCompra' => '',
                'Subtotal' => $x->post('Subtotal')
            );
            $datosEntradaMovArt = array(
                'Articulo' => $x->post('Articulo'),
                'PrecioMov' => $x->post('PrecioMov'),
                'CantidadMov' => $x->post('CantidadMov'),
                'FechaMov' => $x->post('FechaMov'),
                'EntradaSalida' => '1',
                'TipoMov' => 'EDV',
                'DocMov' => $x->post('DocMov'),
                'Tp' => '',
                'Maq' => '97',
                'Sem' => $x->post('Sem'),
                'OrdenCompra' => '',
                'Subtotal' => $x->post('Subtotal'),
            );

//Agrega Salida en mov art fabrica
            $this->SalidasSubAlmacenMP_model->onAgregarSubAlmacen($datosSalidaMovArtFabrica);

//Si es devolucion al almacen general lo agregamos en mov art como entrada
            if ($mov === 'SDV') {
                $this->SalidasSubAlmacenMP_model->onAgregar($datosEntradaMovArt);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarDetalleByID() {
        try {
            $this->SalidasSubAlmacenMP_model->onEliminarDetalleByID($this->input->post('ID'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /* REPORTES */

    public function onImprimirValeEntrada() {
        $Doc = $this->SalidasSubAlmacenMP_model->onImprimirReporte($this->input->post('Doc'));
        if (!empty($Doc)) {
            $pdf = new PDFSalidaAlm('P', 'mm', array(215.9, 279.4));

            $pdf->Doc = $Doc[0]->DocMov;
            $pdf->Sem = $Doc[0]->Sem;
            $pdf->Maq = $Doc[0]->Maq;


            $pdf->AddPage();
            $pdf->SetAutoPageBreak(true, 7);

            $Subtotal = 0;
            foreach ($Doc as $keyFT => $F) {
                $pdf->SetLineWidth(0.25);

                $pdf->SetX(5);
                $pdf->SetFont('Calibri', '', 8);


                $pdf->Row(array(
                    utf8_decode($F->Clave),
                    mb_strimwidth(utf8_decode($F->Descripcion), 0, 70, "..."),
                    number_format($F->CantidadMov, 2, ".", ","),
                    utf8_decode($F->Unidad),
                    '$' . number_format($F->PrecioMov, 2, ".", ","),
                    '$' . number_format($F->Subtotal, 2, ".", ","),
                    utf8_decode($F->FechaMov),
                    utf8_decode($F->TipoMov)
                ));
                $Subtotal += $F->Subtotal;
            }
            $pdf->SetY($pdf->GetY() + 4);
            $pdf->SetFont('Calibri', 'B', 9);
            $pdf->SetX(125);
            $pdf->Cell(15, 4, utf8_decode("Total "), 0/* BORDE */, 0, 'L');
            $pdf->SetX(140);
            $pdf->SetFont('Calibri', '', 9);
            $pdf->Cell(20, 4, '$' . number_format($Subtotal, 2, ".", ","), 0/* BORDE */, 1, 'L');



            /* FIN RESUMEN */
            $path = 'uploads/Reportes/SalidasAlmacen';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file_name = "SALIDA AL ALMACEN DIVERSA " . date("d-m-Y his");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */
            if (delete_files('uploads/Reportes/SalidasAlmacen/')) {
                /* ELIMINA LA EXISTENCIA DE CUALQUIER ARCHIVO EN EL DIRECTORIO */
            }
            $pdf->Output($url);
            print base_url() . $url;
        }
    }

}
