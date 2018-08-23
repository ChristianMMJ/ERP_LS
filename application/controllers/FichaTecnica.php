<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FichaTecnica extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session')->model('fichatecnica_model');
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
            $this->load->view('vFichaTecnica');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->fichatecnica_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getArticulosRequeridos() {
        try {
            print json_encode($this->fichatecnica_model->getArticulosRequeridos($this->input->get('Grupo')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getGrupos() {
        try {
            print json_encode($this->fichatecnica_model->getGrupos());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPiezas() {
        try {
            print json_encode($this->fichatecnica_model->getPiezas());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarExisteEstiloColor() {
        try {
            print json_encode($this->fichatecnica_model->onComprobarExisteEstiloColor($this->input->get('Estilo'), $this->input->get('Color')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstilos() {
        try {
            print json_encode($this->fichatecnica_model->getEstilos());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstiloByID() {
        try {
            print json_encode($this->fichatecnica_model->getEstiloByID($this->input->get('Estilo')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getColoresXEstilo() {
        try {
            print json_encode($this->fichatecnica_model->getColoresXEstilo($this->input->get('Estilo')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFichaTecnicaDetalleByID() {
        try {
            print json_encode($this->fichatecnica_model->getFichaTecnicaDetalleByID($this->input->get('Estilo'), $this->input->get('Color')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFichaTecnicaByEstiloByColor() {
        try {
            print json_encode($this->fichatecnica_model->getFichaTecnicaByEstiloByColor($this->input->get('Estilo'), $this->input->get('Color')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $x = $this->input;
            $PRECIO = $this->fichatecnica_model->getPrecioPorArticuloByID($x->post('Articulo'));
            $data = array(
                'Estilo' => ($x->post('Estilo') !== NULL) ? $x->post('Estilo') : NULL,
                'Color' => ($x->post('Color') !== NULL) ? $x->post('Color') : NULL,
                'Pieza' => ($x->post('Pieza') !== NULL) ? $x->post('Pieza') : NULL,
                'Articulo' => ($x->post('Articulo') !== NULL) ? $x->post('Articulo') : NULL,
                'Consumo' => ($x->post('Consumo') !== NULL) ? $x->post('Consumo') : 0,
                'PzXPar' => ($x->post('PzXPar') !== NULL) ? $x->post('PzXPar') : NULL,
                'Estatus' => 'ACTIVO'
            );
            if (isset($PRECIO[0])) {
                $data["Precio"] = $PRECIO[0]->PRECIO;
            } else {
                $data["Precio"] = 0;
            }
            $ID = $this->fichatecnica_model->onAgregar($data);
            print $ID;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarDetalle() {
        try {
            unset($_POST['ID']);
            $this->fichatecnica_model->onModificar($this->input->post('ID'), $this->input->post());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            $this->fichatecnica_model->onEliminar($this->input->post('ID'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarRenglonDetalle() {
        try {
            $this->fichatecnica_model->onEliminarRenglonDetalle($this->input->post('ID'));
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

    public function onEditarFichaTecnicaDetalle() {
        try {
            $x = $this->input;
            $d = $this->db;
            switch ($x->post('CELDA')) {
                case 'CONSUMO':
                    $d->set('Consumo', $x->post('VALOR'));
                    break;
                case 'PRECIO':
                    $d->set('Precio', $x->post('VALOR'));
                    break;
                case 'PZAXPAR':
                    $d->set('PzXPar', $x->post('VALOR'));
                    break;
            }
            $d->where('ID', $x->post('ID'))->update('FichaTecnica');
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
