<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FraccionesXEstilo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session')->model('fraccionesXEstilo_model');
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

}
