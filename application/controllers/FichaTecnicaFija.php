<?php

header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');

class FichaTecnicaFija extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->model('fichatecnicafija_model')->model('piezas_model')->model('articulos_model');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');

            switch ($this->session->userdata["TipoAcceso"]) {
                case 'SUPER ADMINISTRADOR':
                    $this->load->view('vNavGeneral');
                    $this->load->view('vMenuFichasTecnicas');
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
            $this->load->view('vFichaTecnicaFija');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getSeries() {
        try {
            print json_encode($this->series_model->getSeries());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaquilas() {
        try {
            print json_encode($this->maquilas_model->getMaquilas());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->fichatecnicafija_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $x = $this->input;
            $this->hormas_model->onAgregar(array(
                'Pieza' => ($x->post('Pieza') !== NULL) ? $x->post('Pieza') : NULL,
                'Articulo' => ($x->post('Articulo') !== NULL) ? $x->post('Articulo') : NULL,
                'Consumo' => ($x->post('Consumo') !== NULL) ? $x->post('Consumo') : NULL
            ));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            $this->fichatecnicafija_model->onEliminar($this->input->post('ID'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
