<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ReasignarControles extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->model('reasignarcontroles_model');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            switch ($this->session->userdata["TipoAcceso"]) {
                case 'SUPER ADMINISTRADOR':
                    $this->load->view('vNavGeneral')->view('vMenuProduccion');
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
            $this->load->view('vFondo')->view('vReasignarControles')->view('vFooter');
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->reasignarcontroles_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaquilas() {
        try {
            print json_encode($this->reasignarcontroles_model->getMaquilas());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getHistorialDeControles() {
        try {
            print json_encode($this->reasignarcontroles_model->getHistorialDeControles());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onReAsignarControles() {
        try {
            $controles = json_decode($this->input->post('Controles'));
            foreach ($controles as $k => $v) {
                $Y = substr(Date('Y'), 2);
                $M = str_pad($v->Maquila, 2, '0', STR_PAD_LEFT);
                $S = str_pad($v->Semana, 2, '0', STR_PAD_LEFT);
                $IDN = $this->reasignarcontroles_model->getMaximoConsecutivo($v->Maquila, $v->Semana, 0);

                print "\n" . $v->Maquila . ", " . $v->Semana . "; " . $v->ID . " \n";

                print_r($IDN);
                if (count($IDN) > 0) {
                    $C = str_pad($IDN[0]->MAX, 3, '0', STR_PAD_LEFT);
                    print "\n consecutivo\n";
                    print_r($IDN);
                    print "\n";
                    $this->db->set('Control', $Y . $S . $M . ($C > 0) ? $C : str_pad(1, 3, '0', STR_PAD_LEFT))->where('ID', $v->PedidoDetalle)->update('pedidodetalle');
                } else {
                    $Y = substr(Date('Y'), 2);
                    $M = str_pad($v->Maquila, 2, '0', STR_PAD_LEFT);
                    $S = str_pad($v->Semana, 2, '0', STR_PAD_LEFT);
                    $C = str_pad($this->reasignarcontroles_model->getMaximoConsecutivoZero($v->Maquila, $v->Semana, 0)[0]->MAX, 3, '0', STR_PAD_LEFT);
                    $this->db->set('Control', $Y . $S . $M . ($C > 0) ? $C : str_pad(1, 3, '0', STR_PAD_LEFT))->where('ID', $v->PedidoDetalle)->update('pedidodetalle'); 
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
