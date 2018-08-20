<?php

header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');

class Generos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->model('generos_model')->model('series_model');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');

            switch ($this->session->userdata["TipoAcceso"]) {
                case 'SUPER ADMINISTRADOR':
                    $this->load->view('vNavegacion');
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
            $this->load->view('vGeneros');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getSeries() {
        try {
            extract($this->input->post());
            $data = $this->series_model->getSeries();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->generos_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getID() {
        try {
            print json_encode($this->generos_model->getID());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getGeneroByID() {
        try {
            print json_encode($this->generos_model->getGeneroByID($this->input->get('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarClave() {
        try {
            print json_encode($this->generos_model->onComprobarClave($this->input->get('Clave')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $x = $this->input;
            $this->generos_model->onAgregar(array(
                'Clave' => ($x->post('Clave') !== NULL) ? $x->post('Clave') : NULL,
                'Nombre' => ($x->post('Nombre') !== NULL) ? $x->post('Nombre') : NULL,
                'Serie' => ($x->post('Serie') !== NULL) ? $x->post('Serie') : NULL,
                'Descripcion1' => ($x->post('Descripcion1') !== NULL) ? $x->post('Descripcion1') : NULL,
                'Descripcion2' => ($x->post('Descripcion2') !== NULL) ? $x->post('Descripcion2') : NULL,
                'Descripcion3' => ($x->post('Descripcion3') !== NULL) ? $x->post('Descripcion3') : NULL,
                'ClaveProductoSAT' => ($x->post('ClaveProductoSAT') !== NULL) ? $x->post('ClaveProductoSAT') : NULL,
                'Estatus' => 'ACTIVO'
            ));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            $x = $this->input;
            $this->generos_model->onModificar($x->post('ID'), array(
                'Nombre' => ($x->post('Nombre') !== NULL) ? $x->post('Nombre') : NULL,
                'Serie' => ($x->post('Serie') !== NULL) ? $x->post('Serie') : NULL,
                'Descripcion1' => ($x->post('Descripcion1') !== NULL) ? $x->post('Descripcion1') : NULL,
                'Descripcion2' => ($x->post('Descripcion2') !== NULL) ? $x->post('Descripcion2') : NULL,
                'Descripcion3' => ($x->post('Descripcion3') !== NULL) ? $x->post('Descripcion3') : NULL,
                'ClaveProductoSAT' => ($x->post('ClaveProductoSAT') !== NULL) ? $x->post('ClaveProductoSAT') : NULL,
            ));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            $this->generos_model->onEliminar($this->input->post('ID'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
