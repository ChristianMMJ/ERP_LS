<?php

/* NO TOCAR */
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/third_party/fpdf17/fpdf.php";

class InicialMaterialPrima extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->model('InicialMateriaPrima_model')
                ->helper('Explosiones_helper')->helper('file');
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
            $this->load->view('vInicialMateriaPrima');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function onModificar() {
        try {
            $x = $this->input;
            $datos = array(
                'Pinvini' => $x->post('Pinvini'),
                'Invini' => $x->post('Invini')
            );
            $this->InicialMateriaPrima_model->onModificar($x->post('Clave'), $datos);
            $this->InicialMateriaPrima_model->onModificarArt_Fabrica($x->post('Clave'), $datos);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onCerrarInv() {
        try {
            $x = $this->input;
            $PMes = 'P' . $x->post('Mes');
            $this->InicialMateriaPrima_model->onCerrarInv($x->post('Mes'), $PMes);
            $this->InicialMateriaPrima_model->onCerrarInv_Fabrica($x->post('Mes'), $PMes);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDatosByMaterial() {
        try {
            print json_encode($this->InicialMateriaPrima_model->getDatosByMaterial($this->input->get('Material')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMateriales() {
        try {
            print json_encode($this->InicialMateriaPrima_model->getMateriales());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
