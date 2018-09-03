<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Semanas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('semanasnomina_model');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');

            switch ($this->session->userdata["TipoAcceso"]) {
                case 'SUPER ADMINISTRADOR':
                    $this->load->view('vNavGeneral');
                    $this->load->view('vMenuNominas');
                    break;
                case 'RECURSOS HUMANOS':
                    $this->load->view('vMenuNominas');
                    break;
            }

            $this->load->view('vFondo');
            $this->load->view('vSemanas');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            $data = $this->semanasnomina_model->getRecords();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onValidarExisteAno() {
        try {
            print json_encode($this->semanasnomina_model->onValidarExisteAno($this->input->post('Ano')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSemanaNominaByAno() {
        try {
            extract($this->input->post());
            $data = $this->semanasnomina_model->getSemanaNominaByAno($this->input->post('Ano'));
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSemanasNominaByAno() {
        try {
            print json_encode($this->semanasnomina_model->getSemanasNominaByAno($this->input->post('Ano')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $Detalle = json_decode($this->input->post("Detalle"));
            foreach ($Detalle as $key => $v) {
                $data = array(
                    'Ano' => $v->Ano,
                    'Sem' => $v->Sem,
                    'FechaIni' => $v->FechaIni,
                    'FechaFin' => $v->FechaFin,
                    'Estatus' => 'ACTIVO'
                );
                $this->semanasnomina_model->onAgregar($data);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarExtra() {
        try {
            $data = array(
                'Ano' => $this->input->post('Ano'),
                'Sem' => $this->input->post('Sem'),
                'FechaIni' => $this->input->post('FechaIni'),
                'FechaFin' => $this->input->post('FechaFin'),
                'Estatus' => 'ACTIVO'
            );
            $this->semanasnomina_model->onAgregar($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            extract($this->input->post());
            unset($_POST['ID']);
            $this->semanasnomina_model->onModificar($ID, $this->input->post());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            extract($this->input->post());
            $this->semanasnomina_model->onEliminar($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
