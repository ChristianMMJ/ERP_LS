<?php

header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');

class Estilos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')
                ->model('estilos_model')
                ->model('hormas_model')
                ->model('generos_model')
                ->model('maquilas_model')
                ->model('maqplantillas_model')
                ->model('temporadas_model')
                ->model('lineas_model')
                ->model('series_model');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            if (in_array($this->session->userdata["TipoAcceso"], array("SUPER ADMINISTRADOR"))) {
                $this->load->view('vEncabezado')->view('vNavegacion')->view('vEstilos')->view('vFooter');
            } else {
                $this->load->view('vEncabezado')->view('vNavegacion')->view('vFooter');
            }
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function getLineas() {
        try {
            extract($this->input->post());
            $data = $this->lineas_model->getLineas();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getHormas() {
        try {
            extract($this->input->post());
            $data = $this->hormas_model->getHormas();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getGeneros() {
        try {
            extract($this->input->post());
            $data = $this->generos_model->getGeneros();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getTemporadas() {
        try {
            extract($this->input->post());
            $data = $this->temporadas_model->getTemporadas();
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

    public function getMaqPlantillas() {
        try {
            extract($this->input->post());
            $data = $this->maqplantillas_model->getMaqPlantillas();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
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
            print json_encode($this->estilos_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstiloByID() {
        try {
            print json_encode($this->estilos_model->getEstiloByID($this->input->get('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $x = $this->input;
            $this->estilos_model->onAgregar(array(
                'Clave' => ($x->post('Clave') !== NULL) ? $x->post('Clave') : NULL,
                'Descripcion' => ($x->post('Descripcion') !== NULL) ? $x->post('Descripcion') : NULL,
                'Linea' => ($x->post('Linea') !== NULL) ? $x->post('Linea') : NULL,
                'Horma' => ($x->post('Horma') !== NULL) ? $x->post('Horma') : NULL,
                'FechaAlta' => ($x->post('FechaAlta') !== NULL) ? $x->post('FechaAlta') : NULL,
                'FechaBaja' => ($x->post('FechaBaja') !== NULL) ? $x->post('FechaBaja') : NULL,
                'Genero' => ($x->post('Genero') !== NULL) ? $x->post('Genero') : NULL,
                'GdoDif' => ($x->post('GdoDif') !== NULL) ? $x->post('GdoDif') : NULL,
                'Serie' => ($x->post('Serie') !== NULL) ? $x->post('Serie') : NULL,
                'Corrida' => ($x->post('Corrida') !== NULL) ? $x->post('Corrida') : NULL,
                'ConsumoPiel' => ($x->post('ConsumoPiel') !== NULL) ? $x->post('ConsumoPiel') : NULL,
                'ConsumoForro' => ($x->post('ConsumoForro') !== NULL) ? $x->post('ConsumoForro') : NULL,
                'PiezasCorte' => ($x->post('PiezasCorte') !== NULL) ? $x->post('PiezasCorte') : NULL,
                'GolpesCortePiel' => ($x->post('GolpesCortePiel') !== NULL) ? $x->post('GolpesCortePiel') : NULL,
                'GolpesCorteForro' => ($x->post('GolpesCorteForro') !== NULL) ? $x->post('GolpesCorteForro') : NULL,
                'CmPespunte' => ($x->post('CmPespunte') !== NULL) ? $x->post('CmPespunte') : NULL,
                'CmRebajado' => ($x->post('CmRebajado') !== NULL) ? $x->post('CmRebajado') : NULL,
                'Liberado' => ($x->post('Liberado') !== NULL) ? $x->post('Liberado') : NULL,
                'Costos' => ($x->post('Costos') !== NULL) ? $x->post('Costos') : NULL,
                'Herramental' => ($x->post('Herramental') !== NULL) ? $x->post('Herramental') : NULL,
                'Maquila' => ($x->post('Maquila') !== NULL) ? $x->post('Maquila') : NULL,
                'Observaciones' => ($x->post('Observaciones') !== NULL) ? $x->post('Observaciones') : NULL,
                'Ano' => ($x->post('Ano') !== NULL) ? $x->post('Ano') : NULL,
                'Temporada' => ($x->post('Temporada') !== NULL) ? $x->post('Temporada') : NULL,
                'PuntoCentral' => ($x->post('PuntoCentral') !== NULL) ? $x->post('PuntoCentral') : NULL,
                'EstatusEstilo' => ($x->post('EstatusEstilo') !== NULL) ? $x->post('EstatusEstilo') : NULL,
                'MaqPlant1' => ($x->post('MaqPlant1') !== NULL) ? $x->post('MaqPlant1') : NULL,
                'MaqPlant2' => ($x->post('MaqPlant2') !== NULL) ? $x->post('MaqPlant2') : NULL,
                'MaqPlant3' => ($x->post('MaqPlant3') !== NULL) ? $x->post('MaqPlant3') : NULL,
                'MaqPlant4' => ($x->post('MaqPlant4') !== NULL) ? $x->post('MaqPlant4') : NULL,
                'TipoConstruccion' => ($x->post('TipoConstruccion') !== NULL) ? $x->post('TipoConstruccion') : NULL,
                'Estatus' => 'ACTIVO'
            ));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            $x = $this->input;
            $this->estilos_model->onModificar($x->post('ID'), array(
                'Descripcion' => ($x->post('Descripcion') !== NULL) ? $x->post('Descripcion') : NULL,
                'Linea' => ($x->post('Linea') !== NULL) ? $x->post('Linea') : NULL,
                'Horma' => ($x->post('Horma') !== NULL) ? $x->post('Horma') : NULL,
                'FechaBaja' => ($x->post('FechaBaja') !== NULL) ? $x->post('FechaBaja') : NULL,
                'Genero' => ($x->post('Genero') !== NULL) ? $x->post('Genero') : NULL,
                'GdoDif' => ($x->post('GdoDif') !== NULL) ? $x->post('GdoDif') : NULL,
                'Serie' => ($x->post('Serie') !== NULL) ? $x->post('Serie') : NULL,
                'Corrida' => ($x->post('Corrida') !== NULL) ? $x->post('Corrida') : NULL,
                'ConsumoPiel' => ($x->post('ConsumoPiel') !== NULL) ? $x->post('ConsumoPiel') : NULL,
                'ConsumoForro' => ($x->post('ConsumoForro') !== NULL) ? $x->post('ConsumoForro') : NULL,
                'PiezasCorte' => ($x->post('PiezasCorte') !== NULL) ? $x->post('PiezasCorte') : NULL,
                'GolpesCortePiel' => ($x->post('GolpesCortePiel') !== NULL) ? $x->post('GolpesCortePiel') : NULL,
                'GolpesCorteForro' => ($x->post('GolpesCorteForro') !== NULL) ? $x->post('GolpesCorteForro') : NULL,
                'CmPespunte' => ($x->post('CmPespunte') !== NULL) ? $x->post('CmPespunte') : NULL,
                'CmRebajado' => ($x->post('CmRebajado') !== NULL) ? $x->post('CmRebajado') : NULL,
                'Liberado' => ($x->post('Liberado') !== NULL) ? $x->post('Liberado') : NULL,
                'Costos' => ($x->post('Costos') !== NULL) ? $x->post('Costos') : NULL,
                'Herramental' => ($x->post('Herramental') !== NULL) ? $x->post('Herramental') : NULL,
                'Maquila' => ($x->post('Maquila') !== NULL) ? $x->post('Maquila') : NULL,
                'Observaciones' => ($x->post('Observaciones') !== NULL) ? $x->post('Observaciones') : NULL,
                'Ano' => ($x->post('Ano') !== NULL) ? $x->post('Ano') : NULL,
                'Temporada' => ($x->post('Temporada') !== NULL) ? $x->post('Temporada') : NULL,
                'PuntoCentral' => ($x->post('PuntoCentral') !== NULL) ? $x->post('PuntoCentral') : NULL,
                'EstatusEstilo' => ($x->post('EstatusEstilo') !== NULL) ? $x->post('EstatusEstilo') : NULL,
                'MaqPlant1' => ($x->post('MaqPlant1') !== NULL) ? $x->post('MaqPlant1') : NULL,
                'MaqPlant2' => ($x->post('MaqPlant2') !== NULL) ? $x->post('MaqPlant2') : NULL,
                'MaqPlant3' => ($x->post('MaqPlant3') !== NULL) ? $x->post('MaqPlant3') : NULL,
                'MaqPlant4' => ($x->post('MaqPlant4') !== NULL) ? $x->post('MaqPlant4') : NULL,
                'TipoConstruccion' => ($x->post('TipoConstruccion') !== NULL) ? $x->post('TipoConstruccion') : NULL,
            ));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            $this->estilos_model->onEliminar($this->input->post('ID'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
