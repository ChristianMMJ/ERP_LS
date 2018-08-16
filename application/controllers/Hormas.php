<?php

header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');

class Hormas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->model('hormas_model')->model('series_model')->model('maquilas_model');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            if (in_array($this->session->userdata["TipoAcceso"], array("SUPER ADMINISTRADOR"))) {
                $this->load->view('vEncabezado')->view('vNavegacion')->view('vHormas')->view('vFooter');
            } else {
                $this->load->view('vEncabezado')->view('vNavegacion')->view('vFooter');
            }
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
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

    public function getMaquilas() {
        try {
            extract($this->input->post());
            $data = $this->maquilas_model->getMaquilas();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->hormas_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getID() {
        try {
            print json_encode($this->hormas_model->getID());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getHormaByID() {
        try {
            print json_encode($this->hormas_model->getHormaByID($this->input->get('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSerieXClave() {
        try {
            print json_encode($this->series_model->getSerieXClave($this->input->post('Clave')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $x = $this->input;
            $this->hormas_model->onAgregar(array(
                'Clave' => ($x->post('Clave') !== NULL) ? $x->post('Clave') : NULL,
                'Descripcion' => ($x->post('Descripcion') !== NULL) ? $x->post('Descripcion') : NULL,
                'Serie' => ($x->post('Serie') !== NULL) ? $x->post('Serie') : NULL,
                'Maquila' => ($x->post('Maquila') !== NULL) ? $x->post('Maquila') : NULL,
                'Ex1' => ($x->post('C1') !== NULL) ? $x->post('C1') : NULL,
                'Ex2' => ($x->post('C2') !== NULL) ? $x->post('C2') : NULL,
                'Ex3' => ($x->post('C3') !== NULL) ? $x->post('C3') : NULL,
                'Ex4' => ($x->post('C4') !== NULL) ? $x->post('C4') : NULL,
                'Ex5' => ($x->post('C5') !== NULL) ? $x->post('C5') : NULL,
                'Ex6' => ($x->post('C6') !== NULL) ? $x->post('C6') : NULL,
                'Ex7' => ($x->post('C7') !== NULL) ? $x->post('C7') : NULL,
                'Ex8' => ($x->post('C8') !== NULL) ? $x->post('C8') : NULL,
                'Ex9' => ($x->post('C9') !== NULL) ? $x->post('C9') : NULL,
                'Ex10' => ($x->post('C10') !== NULL) ? $x->post('C10') : NULL,
                'Ex11' => ($x->post('C11') !== NULL) ? $x->post('C11') : NULL,
                'Ex12' => ($x->post('C12') !== NULL) ? $x->post('C12') : NULL,
                'Ex13' => ($x->post('C13') !== NULL) ? $x->post('C13') : NULL,
                'Ex14' => ($x->post('C14') !== NULL) ? $x->post('C14') : NULL,
                'Ex15' => ($x->post('C15') !== NULL) ? $x->post('C15') : NULL,
                'Ex16' => ($x->post('C16') !== NULL) ? $x->post('C16') : NULL,
                'Ex17' => ($x->post('C17') !== NULL) ? $x->post('C17') : NULL,
                'Ex18' => ($x->post('C18') !== NULL) ? $x->post('C18') : NULL,
                'Ex19' => ($x->post('C19') !== NULL) ? $x->post('C19') : NULL,
                'Ex20' => ($x->post('C20') !== NULL) ? $x->post('C20') : NULL,
                'Ex21' => ($x->post('C21') !== NULL) ? $x->post('C21') : NULL,
                'Ex22' => ($x->post('C22') !== NULL) ? $x->post('C22') : NULL,
                'Estatus' => 'ACTIVO'
            ));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            $x = $this->input;
            $this->hormas_model->onModificar($x->post('ID'), array(
                'Descripcion' => ($x->post('Descripcion') !== NULL) ? $x->post('Descripcion') : NULL,
                'Serie' => ($x->post('Serie') !== NULL) ? $x->post('Serie') : NULL,
                'Maquila' => ($x->post('Maquila') !== NULL) ? $x->post('Maquila') : NULL,
                'Ex1' => ($x->post('Ex1') !== NULL) ? $x->post('Ex1') : NULL,
                'Ex2' => ($x->post('Ex2') !== NULL) ? $x->post('Ex2') : NULL,
                'Ex3' => ($x->post('Ex3') !== NULL) ? $x->post('Ex3') : NULL,
                'Ex4' => ($x->post('Ex4') !== NULL) ? $x->post('Ex4') : NULL,
                'Ex5' => ($x->post('Ex5') !== NULL) ? $x->post('Ex5') : NULL,
                'Ex6' => ($x->post('Ex6') !== NULL) ? $x->post('Ex6') : NULL,
                'Ex7' => ($x->post('Ex7') !== NULL) ? $x->post('Ex7') : NULL,
                'Ex8' => ($x->post('Ex8') !== NULL) ? $x->post('Ex8') : NULL,
                'Ex9' => ($x->post('Ex9') !== NULL) ? $x->post('Ex9') : NULL,
                'Ex10' => ($x->post('Ex10') !== NULL) ? $x->post('Ex10') : NULL,
                'Ex11' => ($x->post('Ex11') !== NULL) ? $x->post('Ex11') : NULL,
                'Ex12' => ($x->post('Ex12') !== NULL) ? $x->post('Ex12') : NULL,
                'Ex13' => ($x->post('Ex13') !== NULL) ? $x->post('Ex13') : NULL,
                'Ex14' => ($x->post('Ex14') !== NULL) ? $x->post('Ex14') : NULL,
                'Ex15' => ($x->post('Ex15') !== NULL) ? $x->post('Ex15') : NULL,
                'Ex16' => ($x->post('Ex16') !== NULL) ? $x->post('Ex16') : NULL,
                'Ex17' => ($x->post('Ex17') !== NULL) ? $x->post('Ex17') : NULL,
                'Ex18' => ($x->post('Ex18') !== NULL) ? $x->post('Ex18') : NULL,
                'Ex19' => ($x->post('Ex19') !== NULL) ? $x->post('Ex19') : NULL,
                'Ex20' => ($x->post('Ex20') !== NULL) ? $x->post('Ex20') : NULL,
                'Ex21' => ($x->post('Ex21') !== NULL) ? $x->post('Ex21') : NULL,
                'Ex22' => ($x->post('Ex22') !== NULL) ? $x->post('Ex22') : NULL
            ));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            $this->hormas_model->onEliminar($this->input->post('ID'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
