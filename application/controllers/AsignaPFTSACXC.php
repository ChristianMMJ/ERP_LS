<?php

/* NO TOCAR */
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');

class AsignaPFTSACXC extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->model('AsignaPFTSACXC_model');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');

            switch ($this->session->userdata["TipoAcceso"]) {
                case 'SUPER ADMINISTRADOR':
                    $this->load->view('vNavGeneral')->view('vMenuProduccion');
                    break;
                case 'DISEÑO Y DESARROLLO':
                    $this->load->view('vMenuFichasTecnicas');
                    break;
                case 'ALMACEN':
                    $this->load->view('vMenuMateriales');
                    break;
            }
            $this->load->view('vAsignaPFTSACXC')->view('vFooter');
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function onChecarSemanaValida() {
        try {
            print json_encode($this->AsignaPFTSACXC_model->onChecarSemanaValida($this->input->get('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getControlesAsignados() {
        try {
            print json_encode($this->AsignaPFTSACXC_model->getControlesAsignados());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPieles() {
        try {
            print json_encode($this->AsignaPFTSACXC_model->getPieles($this->input->get('SEMANA'), $this->input->get('CONTROL')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getForros() {
        try {
            print json_encode($this->AsignaPFTSACXC_model->getForros($this->input->get('SEMANA'), $this->input->get('CONTROL')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getTextiles() {
        try {
            print json_encode($this->AsignaPFTSACXC_model->getTextiles($this->input->get('SEMANA'), $this->input->get('CONTROL')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSinteticos() {
        try {
            print json_encode($this->AsignaPFTSACXC_model->getSinteticos($this->input->get('SEMANA'), $this->input->get('CONTROL')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getExplosionXSemanaControlFraccionArticulo() {
        try {
            print json_encode($this->AsignaPFTSACXC_model->getExplosionXSemanaControlFraccionArticulo($this->input->get('SEMANA'), $this->input->get('CONTROL'), $this->input->get('FRACCION'), $this->input->get('ARTICULO'), $this->input->get('GRUPO')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEntregarPielForroTextilSintetico() {
        try {
            $x = $this->input;
            /* COMPROBAR SI YA EXISTE EL REGISTRO POR EMPLEADO,SEMANA, CONTROL, FRACCION, ARTICULO */
            $DT = $this->AsignaPFTSACXC_model->onComprobarEntrega($x->post('SEMANA'), $x->post('CONTROL'), $x->post('ARTICULO'), $x->post('FRACCION'));
            /* EXISTE LA POSIBILIDAD DE QUE LA FRACCION SEA DIFERENTE Y QUE HAGA UN NUEVO REGISTRO */
            if (count($DT) > 0) {
                $this->db->set('Cargo', ( $DT[0]->Cargo + $x->post('ENTREGA')))->where('ID', $DT[0]->ID)->update('asignapftsacxc');
            } else {
                $data = array(
                    'OrdenProduccion' => $x->post('ORDENDEPRODUCCION'),
                    'Pares' => $x->post('PARES'),
                    'Semana' => $x->post('SEMANA'),
                    'Control' => $x->post('CONTROL'),
                    'Fraccion' => $x->post('FRACCION'),
                    'Empleado' => 0,
                    'Articulo' => $x->post('ARTICULO'),
                    'Descripcion' => $x->post('ARTICULOT'),
                    'Fecha' => Date('d/m/Y h:i:s a'),
                    'Explosion' => $x->post('EXPLOSION'),
                    'Cargo' => $x->post('EXPLOSION'),
                    'Abono' => $x->post('ENTREGA'),
                    'Devolucion' => 0,
                    'Estatus' => 'A',
                    'Extra' => $x->post('MATERIAL_EXTRA'),
                    'ExtraT' => ($x->post('MATERIAL_EXTRA') > 0 && $x->post('EXPLOSION') < $x->post('ENTREGA')) ? $x->post('ENTREGA') - $x->post('EXPLOSION') : 0
                );
                $this->db->insert('asignapftsacxc', $data);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
