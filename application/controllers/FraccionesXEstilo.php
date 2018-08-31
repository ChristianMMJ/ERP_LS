<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/third_party/fpdf17/fpdf.php";

class FraccionesXEstilo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session')->model('fraccionesXEstilo_model')
                ->helper('reportesFracciones_helper')->helper('file')->helper('array');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');

            switch ($this->session->userdata["TipoAcceso"]) {
                case 'SUPER ADMINISTRADOR':
                    $this->load->view('vNavGeneral');
                    $this->load->view('vMenuNominas');
                    break;
                case 'ADMINISTRACION':
                    $this->load->view('vMenuAdministracion');
                    break;
                case 'CONTABILIDAD':
                    $this->load->view('vMenuContabilidad');
                    break;
                case 'RECURSOS HUMANOS':
                    $this->load->view('vMenuRecursosHumanos');
                    break;
                case 'INGENIERIA':
                    $this->load->view('vMenuIngenieria');
                    break;
                case 'DISEÑO Y DESARROLLO':
                    $this->load->view('vMenuDisDes');
                    break;
                case 'ALMACEN':
                    $this->load->view('vMenuAlmacen');
                    break;
                case 'PRODUCCION':
                    $this->load->view('vMenuProduccion');
                    break;
            }

            $this->load->view('vFondo');
            $this->load->view('vFraccionesXEstilo');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            //$this->fraccionesXEstilo_model->onLimpiarTabla();
            //$this->fraccionesXEstilo_model->onGenerarRecords();
            print json_encode($this->fraccionesXEstilo_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFraccionesXDepartamento() {
        try {
            print json_encode($this->fraccionesXEstilo_model->getFraccionesXDepartamento($this->input->get('Departamento')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDepartamentos() {
        try {
            print json_encode($this->fraccionesXEstilo_model->getDepartamentos());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarExisteEstilo() {
        try {
            print json_encode($this->fraccionesXEstilo_model->onComprobarExisteEstilo($this->input->get('Estilo')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstilos() {
        try {
            print json_encode($this->fraccionesXEstilo_model->getEstilos());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstiloByID() {
        try {
            print json_encode($this->fraccionesXEstilo_model->getEstiloByID($this->input->get('Estilo')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFraccionesXEstiloDetalleByID() {
        try {
            print json_encode($this->fraccionesXEstilo_model->getFraccionesXEstiloDetalleByID($this->input->get('Estilo')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFraccionXEstiloByEstilo() {
        try {
            print json_encode($this->fraccionesXEstilo_model->getFraccionXEstiloByEstilo($this->input->get('Estilo')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $x = $this->input;
            $data = array(
                'Estilo' => ($x->post('Estilo') !== NULL) ? $x->post('Estilo') : NULL,
                'FechaAlta' => ($x->post('FechaAlta') !== NULL) ? $x->post('FechaAlta') : NULL,
                'Fraccion' => ($x->post('Fraccion') !== NULL) ? $x->post('Fraccion') : NULL,
                'CostoMO' => ($x->post('CostoMO') !== NULL) ? $x->post('CostoMO') : 0,
                'CostoVTA' => ($x->post('CostoVTA') !== NULL) ? $x->post('CostoVTA') : 0,
                'AfectaCostoVTA' => ($x->post('AfectaCostoVTA') !== NULL) ? $x->post('AfectaCostoVTA') : 0,
                'Estatus' => 'ACTIVO'
            );
            $ID = $this->fraccionesXEstilo_model->onAgregar($data);
            print $ID;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarFraccion() {
        try {
            $this->fraccionesXEstilo_model->onEliminarFraccion($this->input->post('ID'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarArticuloID() {
        try {
            $this->db->where('ID', $this->input->post('ID'))->delete('FichaTecnica');
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onImprimirFraccionesXEstilo() {
        $cm = $this->fraccionesXEstilo_model;

        $DatosEmpresa = $cm->getDatosEmpresa();
        $Encabezado = $cm->getEncabezadoFXE($this->input->get('Estilo'));
        $Departamentos = $cm->getDeptosFXE($this->input->get('Estilo'));
        $Fracciones = $cm->getFraccionesFXE($this->input->get('Estilo'));

        if (!empty($Encabezado)) {

            $pdf = new PDF('P', 'mm', array(215.9, 279.4));

            $pdf->Logo = $DatosEmpresa[0]->Logo;
            $pdf->Empresa = $DatosEmpresa[0]->Empresa;
            $pdf->Estilo = $Encabezado[0]->ESTILO;
            $pdf->Clinea = $Encabezado[0]->CLINEA;
            $pdf->Dlinea = $Encabezado[0]->DLINEA;

            $pdf->AddPage();
            $pdf->SetAutoPageBreak(true, 10);

            $GTotalD_CVTA = 0;
            $GTotalD_CMO = 0;
            foreach ($Departamentos as $key => $D) {
                $pdf->SetX(5);
                $pdf->SetFont('Arial', 'BI', 8.5);
                $pdf->Cell(10, 5, utf8_decode($D->CDEPTO) . ' ' . utf8_decode($D->DDEPTO), 0/* BORDE */, 1, 'L');

                $TotalD_CVTA = 0;
                $TotalD_CMO = 0;
                foreach ($Fracciones as $key => $F) {
                    if ($F->CDEPTO === $D->CDEPTO) {

                        $pdf->SetFont('Arial', '', 7.5);
                        $anchos = array(10/* 0 */, 80/* 0 */, 30/* 1 */, 15/* 2 */);
                        $aligns = array('L', 'L', 'L', 'L');
                        $pdf->SetAligns($aligns);
                        $pdf->SetWidths($anchos);
                        $pdf->SetMarginLeft(70);
                        $pdf->RowX(array(
                            utf8_decode($F->CFRACCION),
                            utf8_decode($F->DFRACCION),
                            utf8_decode($F->COSTOMO),
                            utf8_decode($F->COSTOVTA)
                        ));

                        $TotalD_CVTA += $F->COSTOVTA;
                        $TotalD_CMO += $F->COSTOMO;

                        $GTotalD_CVTA += $F->COSTOVTA;
                        $GTotalD_CMO += $F->COSTOMO;
                    }
                }
                $pdf->SetX(110);
                $pdf->SetFont('Arial', 'BI', 8.5);
                $anchos = array(10/* 0 */, 80/* 0 */, 30/* 1 */, 15/* 2 */);
                $aligns = array('L', 'C', 'L', 'L');
                $pdf->SetAligns($aligns);
                $pdf->SetWidths($anchos);
                $pdf->SetMarginLeft(70);
                $pdf->RowNoBorder(array(
                    "",
                    "Total x Depto",
                    $TotalD_CMO,
                    $TotalD_CVTA
                ));
            }
            $pdf->SetX(110);
            $pdf->SetFont('Arial', 'BI', 9.5);
            $anchos = array(10/* 0 */, 80/* 0 */, 30/* 1 */, 15/* 2 */);
            $aligns = array('L', 'C', 'L', 'L');
            $pdf->SetAligns($aligns);
            $pdf->SetWidths($anchos);
            $pdf->SetMarginLeft(70);
            $pdf->RowNoBorder(array(
                "",
                "Total x Estilo",
                $GTotalD_CMO,
                $GTotalD_CVTA
            ));






            /* FIN RESUMEN */
            $path = 'uploads/Reportes/Nomina';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file_name = "FRACCIONES POR ESTILO " . date("d-m-Y his");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */
            if (delete_files('uploads/Reportes/Nomina/')) {
                /* ELIMINA LA EXISTENCIA DE CUALQUIER ARCHIVO EN EL DIRECTORIO */
            }
            $pdf->Output($url);
            print base_url() . $url;
        }
    }

}
