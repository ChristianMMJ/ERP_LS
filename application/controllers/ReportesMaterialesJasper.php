<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/third_party/JasperPHP/src/JasperPHP/JasperPHP.php";

class ReportesMaterialesJasper extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session')->helper('jaspercommand_helper')->helper('file');
        date_default_timezone_set('America/Mexico_City');

        setlocale(LC_ALL, "");
        setlocale(LC_TIME, 'spanish');
    }

    public function onReporteConsumoHiloMaquila() {
        $jc = new JasperCommand();
        $jc->setFolder('rpt/' . $this->session->USERNAME);
        $parametros = array();
        $parametros["logo"] = base_url() . $this->session->LOGO;
        $parametros["empresa"] = $this->session->EMPRESA_RAZON;
        $parametros["maq"] = $this->input->post('Maq');
        $parametros["ano"] = $this->input->post('Ano');
        $parametros["sem"] = $this->input->post('Sem');
        $parametros["Nmaq"] = 'CALZADO LOBO';
        $jc->setParametros($parametros);
        $jc->setJasperurl('jrxml\materiales\relacionCoreHiloTejido.jasper');
        $jc->setFilename('RELACION_HILO_TEJIDO_CONTROL_MAQ_SEM_' . Date('h_i_s'));
        $jc->setDocumentformat('pdf');
        PRINT $jc->getReport();
    }

    public function onImprimirValeEntradaOTROS() {
        $jc = new JasperCommand();
        $jc->setFolder('rpt/' . $this->session->USERNAME);
        $parametros = array();
        $parametros["logo"] = base_url() . $this->session->LOGO;
        $parametros["empresa"] = $this->session->EMPRESA_RAZON;
        $parametros["doc"] = $this->input->post('Doc');
        $parametros["tipo"] = $this->input->post('Tipo');
        $jc->setParametros($parametros);
        $jc->setJasperurl('jrxml\materiales\entradasDiversas.jasper');
        $jc->setFilename('VALE_ENTRADA_OTROS' . Date('h_i_s'));
        $jc->setDocumentformat('pdf');
        PRINT $jc->getReport();
    }

    public function onReporteCosteoMatMaqDocumento() {
        $jc = new JasperCommand();
        $jc->setFolder('rpt/' . $this->session->USERNAME);
        $parametros = array();
        $parametros["logo"] = base_url() . $this->session->LOGO;
        $parametros["empresa"] = $this->session->EMPRESA_RAZON;
        $parametros["doc"] = $this->input->post('DocMov');
        $parametros["maq"] = $this->input->post('Maq');
        $parametros["sem"] = $this->input->post('Sem');
        $parametros["ano"] = $this->input->post('Ano');
        $jc->setParametros($parametros);
        $jc->setJasperurl('jrxml\materiales\costoMatMaqSemDoc.jasper');
        $jc->setFilename('COSTO_MAT_MAQ_DOCUMENTO_' . Date('h_i_s'));
        $jc->setDocumentformat('pdf');
        PRINT $jc->getReport();
    }

    public function onReporteCosteoMatMaqSem() {
        $jc = new JasperCommand();
        $jc->setFolder('rpt/' . $this->session->USERNAME);
        $parametros = array();
        $parametros["logo"] = base_url() . $this->session->LOGO;
        $parametros["empresa"] = $this->session->EMPRESA_RAZON;
        $parametros["maq"] = $this->input->post('Maq');
        $parametros["sem"] = $this->input->post('Sem');
        $parametros["ano"] = $this->input->post('Ano');
        $jc->setParametros($parametros);
        $jc->setJasperurl('jrxml\materiales\costoMatMaqSem.jasper');
        $jc->setFilename('COSTO_MAT_MAQ_SEM_' . Date('h_i_s'));
        $jc->setDocumentformat('pdf');
        PRINT $jc->getReport();
    }

    public function onReporteCosteoMatMaqFecha() {
        $jc = new JasperCommand();
        $jc->setFolder('rpt/' . $this->session->USERNAME);
        $parametros = array();
        $parametros["logo"] = base_url() . $this->session->LOGO;
        $parametros["empresa"] = $this->session->EMPRESA_RAZON;
        $parametros["maq"] = $this->input->post('Maq');
        $parametros["sem"] = $this->input->post('Sem');
        $parametros["ano"] = $this->input->post('Ano');
        $parametros["fechaIni"] = $this->input->post('FechaIni');
        $parametros["fechaFin"] = $this->input->post('FechaFin');
        $jc->setParametros($parametros);
        $jc->setJasperurl('jrxml\materiales\costoMatMaqSemFechas.jasper');
        $jc->setFilename('COSTO_MAT_MAQ_SEM_FECHA_' . Date('h_i_s'));
        $jc->setDocumentformat('pdf');
        PRINT $jc->getReport();
    }

}
