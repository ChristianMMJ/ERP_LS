<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Series extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('series_model');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            if (in_array($this->session->userdata["TipoAcceso"], array("SUPER ADMINISTRADOR"))) {
                $this->load->view('vEncabezado');
                $this->load->view('vNavegacion');
                $this->load->view('vSeries');
                $this->load->view('vFooter');
            } else {
                $this->load->view('vEncabezado');
                $this->load->view('vNavegacion');
                $this->load->view('vFooter');
            }
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getUltimoRegistro() {
        try {
            print json_encode($this->series_model->getUltimoRegistro());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getRecords() {
        try {
            extract($this->input->post());


            $data = $this->series_model->getRecords();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSerieByID() {
        try {
            extract($this->input->post());
            $data = $this->series_model->getSerieByID($ID);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $data = array(
                'Clave' => ($this->input->post('Clave') !== NULL) ? $this->input->post('Clave') : NULL,
                'PuntoInicial' => ($this->input->post('PuntoInicial') !== NULL) ? $this->input->post('PuntoInicial') : NULL,
                'PuntoFinal' => ($this->input->post('PuntoFinal') !== NULL) ? $this->input->post('PuntoFinal') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL,
                'T1' => ($this->input->post('T1') !== NULL) ? $this->input->post('T1') : 0,
                'T2' => ($this->input->post('T2') !== NULL) ? $this->input->post('T2') : 0,
                'T3' => ($this->input->post('T3') !== NULL) ? $this->input->post('T3') : 0,
                'T4' => ($this->input->post('T4') !== NULL) ? $this->input->post('T4') : 0,
                'T5' => ($this->input->post('T5') !== NULL) ? $this->input->post('T5') : 0,
                'T6' => ($this->input->post('T6') !== NULL) ? $this->input->post('T6') : 0,
                'T7' => ($this->input->post('T7') !== NULL) ? $this->input->post('T7') : 0,
                'T8' => ($this->input->post('T8') !== NULL) ? $this->input->post('T8') : 0,
                'T9' => ($this->input->post('T9') !== NULL) ? $this->input->post('T9') : 0,
                'T10' => ($this->input->post('T10') !== NULL) ? $this->input->post('T10') : 0,
                'T11' => ($this->input->post('T11') !== NULL) ? $this->input->post('T11') : 0,
                'T12' => ($this->input->post('T12') !== NULL) ? $this->input->post('T12') : 0,
                'T13' => ($this->input->post('T13') !== NULL) ? $this->input->post('T13') : 0,
                'T14' => ($this->input->post('T14') !== NULL) ? $this->input->post('T14') : 0,
                'T15' => ($this->input->post('T15') !== NULL) ? $this->input->post('T15') : 0,
                'T16' => ($this->input->post('T16') !== NULL) ? $this->input->post('T16') : 0,
                'T17' => ($this->input->post('T17') !== NULL) ? $this->input->post('T17') : 0,
                'T18' => ($this->input->post('T18') !== NULL) ? $this->input->post('T18') : 0,
                'T19' => ($this->input->post('T19') !== NULL) ? $this->input->post('T19') : 0,
                'T20' => ($this->input->post('T20') !== NULL) ? $this->input->post('T20') : 0,
                'T21' => ($this->input->post('T21') !== NULL) ? $this->input->post('T21') : 0,
                'T22' => ($this->input->post('T22') !== NULL) ? $this->input->post('T22') : 0
            );
            $ID = $this->series_model->onAgregar($data);
            echo $ID;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            extract($this->input->post());

            $DATA = array(
                'Clave' => ($this->input->post('Clave') !== NULL) ? $this->input->post('Clave') : NULL,
                'PuntoInicial' => ($this->input->post('PuntoInicial') !== NULL) ? $this->input->post('PuntoInicial') : NULL,
                'PuntoFinal' => ($this->input->post('PuntoFinal') !== NULL) ? $this->input->post('PuntoFinal') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL
            );

            $this->series_model->onModificar($ID, $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            extract($this->input->post());
            $this->series_model->onEliminar($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
