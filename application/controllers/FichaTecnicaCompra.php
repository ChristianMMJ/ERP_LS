<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/third_party/fpdf17/fpdf.php";

class FichaTecnicaCompra extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session')->model('fichaTecnicaCompra_model')
                ->helper('reportesFichaTecnica_helper')->helper('file')->helper('array');
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

    public function onImprimirFichaTecnicaCompra() {
        $cm = $this->fichaTecnicaCompra_model;

        $DatosEmpresa = $cm->getDatosEmpresa();
        $Encabezado = $cm->getEncabezadoFT($this->input->post('Estilo'), $this->input->post('Color'));

        //$Departamentos = $cm->getDeptosFXE($this->input->get('Estilo'));
        //$Fracciones = $cm->getFraccionesFXE($this->input->get('Estilo'));

        if (!empty($Encabezado)) {

            $pdf = new PDF('P', 'mm', array(215.9, 279.4));
            $pdf->Logo = $DatosEmpresa[0]->Logo;
            $pdf->Empresa = $DatosEmpresa[0]->Empresa;
            $pdf->Estilo = $Encabezado[0]->ESTILO;
            $pdf->Clinea = $Encabezado[0]->CLINEA;
            $pdf->Dlinea = $Encabezado[0]->DLINEA;
            $pdf->Ccolor = $Encabezado[0]->CCOLOR;
            $pdf->Dcolor = $Encabezado[0]->DCOLOR;
            $pdf->Maquila = $this->input->post('NomMaquila');
            $pdf->desperdicio = $this->input->post('Desperdicio') * 100;

            $pdf->AddPage();
            $pdf->SetAutoPageBreak(true, 25);


            /* FIN RESUMEN */
            $path = 'uploads/Reportes/FichaTecnica';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file_name = "FICHA TECNICA PARA COMPRAS " . date("d-m-Y his");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */
            if (delete_files('uploads/Reportes/FichaTecnica/')) {
                /* ELIMINA LA EXISTENCIA DE CUALQUIER ARCHIVO EN EL DIRECTORIO */
            }
            $pdf->Output($url);
            print base_url() . $url;
        }
    }

}
