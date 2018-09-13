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
                $IDN = $this->reasignarcontroles_model->getMaximoConsecutivo($M, $S, 0);
                print $this->db->last_query();
                print "\n * * * IDN : $v->Maquila, $v->Semana * * * \n";
                print_r($v);
                print_r($IDN);
                print "\n * * * FIN IDN : $v->Maquila, $v->Semana * * * \n";
                if (count($IDN) > 0) {
                    $C = str_pad($IDN[0]->MAXIMO, 3, '0', STR_PAD_LEFT);
                    /* CAMBIAR EN CONTROLES; LA SEMANA, LA MAQUILA Y EL CONSECUTIVO EN 'N' */
                    $this->db->set('Semana', $S)->set('Maquila', $M)
                            ->set('Consecutivo', $C)
                            ->where('PedidoDetalle', $v->PedidoDetalle)->update('controles');
                    /* MODIFICAR EN EL PEDIDO (DETALLE), EL CONTROL */
                    $this->db->set('Control', $Y . $S . $M . $C)->where('ID', $v->PedidoDetalle)->update('pedidodetalle');
                } else {
                    //VACIO
                    /* CAMBIAR EN CONTROLES; LA SEMANA, LA MAQUILA Y EL CONSECUTIVO EN 001 */
                    $C = str_pad(1, 3, '0', STR_PAD_LEFT);
                    $this->db->set('Semana', $S)->set('Maquila', $M)
                            ->set('Consecutivo', $C)
                            ->where('PedidoDetalle', $v->PedidoDetalle)->update('controles');
                    /* MODIFICAR EN EL PEDIDO (DETALLE), EL CONTROL */
                    $this->db->set('Control', $Y . $S . $M . $C)->where('ID', $v->PedidoDetalle)->update('pedidodetalle');
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
