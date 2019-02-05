<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/third_party/fpdf17/fpdf.php";

class AvanceTejido extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->model('AvanceTejido_model', 'avtm');
    }

    public function index() {
        try {
            $is_valid = false;
            if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
                $this->load->view('vEncabezado');
                switch ($this->session->userdata["TipoAcceso"]) {
                    case 'SUPER ADMINISTRADOR':
                        $this->load->view('vNavGeneral')->view('vMenuProduccion');
                        $is_valid = true;
                        break;
                    case 'ADMINISTRACION':
                        $this->load->view('vMenuAdministracion');
                        $is_valid = true;
                        break;
                    case 'PRODUCCION':
                        $this->load->view('vMenuProduccion');
                        $is_valid = true;
                        break;
                }
                $dt["TYPE"] = 2;
                $this->load->view('vFondo')->view('vAvanceTejido')->view('vWatermark', $dt)->view('vFooter');
            }
            if (!$is_valid) {
                $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getChoferes() {
        try {
            print json_encode($this->avtm->getChoferes());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getColoresXEstilo() {
        try {
            print json_encode($this->avtm->getColoresXEstilo($this->input->get('ESTILO')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getTejedoras() {
        try {
            print json_encode($this->avtm->getTejedoras());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
